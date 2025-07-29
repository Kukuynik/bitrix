<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
    ShowError('Модуль инфоблоков не установлен');
    return;
}

$iblockType = $arParams['IBLOCK_TYPE'] ?? 'news';
$iblockCode = $arParams['IBLOCK_CODE'] ?? 'news';
$iblockId = (int)($arParams['IBLOCK_ID'] ?? 0);

if (!$iblockId) {
    $res = CIBlock::GetList([], [
        'TYPE' => $iblockType,
        'ACTIVE' => 'Y',
        'CODE' => $iblockCode
    ]);
    if ($iblock = $res->Fetch()) {
        $iblockId = (int)$iblock['ID'];
    }
}

if(!$iblockId) {
    ShowError("Инфоблок не найден");
    return;
}

$arParams['SEF_FOLDER'] = trim((string)($arParams['SEF_FOLDER'] ?? '/news/'), '/').'/';
$sefFolder = '/'.$arParams['SEF_FOLDER'];
$arResult['FOLDER'] = $sefFolder;

$curPage = $APPLICATION->GetCurPage();
$relativeUrl = substr($curPage, strlen($sefFolder));
$relativeUrl = ltrim($relativeUrl, '/');

$arVariables = [];
$componentPage = 'list';

if ($relativeUrl !== '' && $relativeUrl !== 'index.php') {
    $componentPage = 'detail';
    $arVariables['ELEMENT_CODE'] = trim($relativeUrl, '/');
}

if ($componentPage == 'list') {
    $arSections = [];
    $rsSections = CIBlockSection::GetList(
        ['SORT'=>'ASC','NAME'=>'ASC'],
        ['IBLOCK_ID'=>$iblockId, 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y'],
        false,
        ['ID', 'NAME', 'SECTION_PAGE_URL', 'CODE']
    );
    while ($arSection = $rsSections->GetNext()) {
        $arSections[$arSection['ID']] = $arSection;
        $arSections[$arSection['ID']]['ELEMENTS'] = [];
    }
    $arResult['SECTIONS'] = $arSections;
}

$sectionId = isset($_GET['SECTION_ID']) ? (int)$_GET['SECTION_ID'] : 0;

$main = [];
$others = [];
$arSelect = ["ID", "NAME", "CODE", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE", "PROPERTY_THEME", "PROPERTY_MAIN", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"];

$arFilter = [
    "IBLOCK_ID" => $iblockId,
    "ACTIVE" => "Y"
];
if ($sectionId > 0) {
    $arFilter["SECTION_ID"] = $sectionId;
    $arFilter["INCLUDE_SUBSECTIONS"] = "N";
}

$rs = CIBlockElement::GetList(
    ["PROPERTY_MAIN" => "DESC", "ACTIVE_FROM" => "DESC"],
    $arFilter,
    false,
    false,
    $arSelect
);
while ($row = $rs->GetNext()) {
    $row["DETAIL_PAGE_URL"] = $arResult["FOLDER"] . $row["CODE"] . '/';
    if ($row['PROPERTY_MAIN_VALUE'] === 'Y') $main[] = $row;
    else $others[] = $row;
}
$arResult['ELEMENTS_MAIN'] = $main;
$arResult['ELEMENTS_OTHERS'] = $others;

$arResult['ELEMENTS_MAIN'] = $main;
$arResult['ELEMENTS_OTHERS'] = $others;
$arResult['FOLDER'] = $arParams['SEF_FOLDER'];

if ($componentPage == 'detail' && !empty($arVariables['ELEMENT_CODE'])) {
    $arSelect = ["ID", "NAME", "DETAIL_PICTURE", "DETAIL_TEXT", "DATE_ACTIVE_FROM", "PROPERTY_THEME"];
    $arFilter = [
        "IBLOCK_ID" => $iblockId,
        "ACTIVE" => "Y",
        "CODE" => $arVariables['ELEMENT_CODE']
    ];
    $rsElement = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
    if ($arElement = $rsElement->GetNext()) {
        $arResult['ELEMENT'] = $arElement;
    } else {
        ShowError("Новость не найдена");
        return;
    }
}

$this->IncludeComponentTemplate($componentPage);