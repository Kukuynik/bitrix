<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пресс центр");?>
<?$APPLICATION -> IncludeComponent(
    "mycompany:presscenter",
    "presscenter_main",
    [
        'IBLOCK_TYPE' => 'news',
        'IBLOCK_TYPE' => 'news',
        'IBLOCK_ID' => '1',
        'SEF_MODE' => 'Y',
        'SEF_FOLDER' => '/news/',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => '3600',
    ],
    false
);?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>