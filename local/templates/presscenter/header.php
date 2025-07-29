<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/app.css" />
    <script src="<?= SITE_TEMPLATE_PATH ?>/vendor.js" async></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/app.js" async></script>
</head>

<body>
    <? $APPLICATION->ShowPanel(); ?>
    <div class="page">
        <div class="gos-header"></div>
        <div class="site-menu site-menu--sticky">
            <a class="site-menu__logotype" href="/">
                <svg class="site-menu__logotype-symbol-mobile" role="img">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/icons.svg#logotype-symbol-mobile" />
                </svg>
                <svg class="site-menu__logotype-symbol-desktop" role="img">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/icons.svg#logotype-symbol-desktop" />
                </svg>
            </a>
            <!-- Меню новостей -->
            <nav>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "news_menu",
                    [
                        "ROOT_MENU_TYPE" => "",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "USE_EXT" => "Y"
                    ],
                    false
                ); ?>
            </nav>
        </div>