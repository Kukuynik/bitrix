<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Пресс центр");
$APPLICATION->SetAdditionalCSS("/local/assets/css/app.css");
$APPLICATION->IncludeComponent(
    "mycompany:presscenter",
    "news",
    array(
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "1",
        "IBLOCK_CODE" => "press_center",
        "SEF_FOLDER" => "/press-center/",
        "SEF_URL_TEMPLATES" => array(
            "list"   => "",             
            "detail" => "#ELEMENT_CODE#/", 
        ),
    ),
    false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>