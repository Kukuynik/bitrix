<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = [
    "PARAMETERS" => [
        "IBLOCK_TYPE" => [
            "PARENT" => "BASE",
            "NAME" => "Тип инфоблока",
            "TYPE" => "STRING",
            "DEFAULT" => "news"
        ],
        "IBLOCK_ID" => [
            "PARENT" => "BASE",
            "NAME" => "ID инфоблока",
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],
        "SEF_FOLDER" => [
            "PARENT" => "BASE",
            "NAME" => "Каталог ЧПУ",
            "TYPE" => "STRING",
            "DEFAULT" => "/press-center/"
        ],
    ]
];
?>