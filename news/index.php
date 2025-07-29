<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости тест");
?>

<?$APPLICATION->IncludeComponent(
    "mycompany:presscenter",
    "presscenter_main",  // название шаблона!
    [
        "IBLOCK_ID" => 1, // подставьте свой ID инфоблока с новостями!
    ]
);?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>