<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<section class="page-section events-page">
    <div class="page-section__heading">
        <h1>Пресс центр</h1>
        
    </div>

    <div class="tabs">
        <div class="tabs__buttons-scroll-wrapper">
            <div class="tabs__buttons-wrapper">
                <button data-tabs-target="button" data-controller="wave" class="tabs__button active">
                    <span class="tabs__button-text"> Все </span>
                </button>
            </div>
        </div>

                <div class="news-list event-list" data-view-more-target="container">

                    <?php // Главные новости 
                    ?>
                    <?php if (!empty($arResult['ELEMENTS_MAIN'])): ?>
                        <?php foreach ($arResult['ELEMENTS_MAIN'] as $news): ?>
                            <article class="news news--main">
                                <?php if ($news["PREVIEW_PICTURE"]): ?>
                                    <div class="news__illustration">
                                        <img
                                            src="<?= CFile::GetPath($news["PREVIEW_PICTURE"]) ?>"
                                            alt="<?= htmlspecialchars($news['NAME']) ?>"
                                            class="news__illustration-image">
                                    </div>
                                <?php endif; ?>
                                <a class="news__link" href="<?= $news["DETAIL_PAGE_URL"] ?>">
                                    <h2 class="news__title"><?= htmlspecialchars($news["NAME"]) ?></h2>
                                </a>
                                <?php if ($news["PROPERTY_THEME_VALUE"]): ?>
                                    <div class="news__publication-info">
                                        <?php foreach ((array)$news["PROPERTY_THEME_VALUE"] as $theme): ?>
                                            <span class="news__topic-link"><?= htmlspecialchars($theme) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="news__publication-detail">
                                    <svg class="icon" role="img">
                                        <use xlink:href="/local/templates/presscenter/icons.svg#clock"></use>
                                    </svg>
                                    <?= FormatDate("d F Y", MakeTimeStamp($news["DATE_ACTIVE_FROM"])) ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php // Остальные новости 
                    ?>
                    <?php if (!empty($arResult['ELEMENTS_OTHERS'])): ?>
                        <?php foreach ($arResult['ELEMENTS_OTHERS'] as $news): ?>
                            <article class="news">
                                <?php if ($news["PREVIEW_PICTURE"]): ?>
                                    <div class="news__illustration">
                                        <img
                                            src="<?= CFile::GetPath($news["PREVIEW_PICTURE"]) ?>"
                                            alt="<?= htmlspecialchars($news['NAME']) ?>"
                                            class="news__illustration-image">
                                    </div>
                                <?php endif; ?>
                                <a class="news__link" href="<?= $news["DETAIL_PAGE_URL"] ?>">
                                    <h2 class="news__title"><?= htmlspecialchars($news["NAME"]) ?></h2>
                                </a>
                                <?php if ($news["PROPERTY_THEME_VALUE"]): ?>
                                    <div class="news__publication-info">
                                        <?php foreach ((array)$news["PROPERTY_THEME_VALUE"] as $theme): ?>
                                            <span class="news__topic-link"><?= htmlspecialchars($theme) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="news__publication-detail">
                                    <svg class="icon" role="img">
                                        <use xlink:href="/local/templates/presscenter/icons.svg#clock"></use>
                                    </svg>
                                    <?= FormatDate("d F Y", MakeTimeStamp($news["DATE_ACTIVE_FROM"])) ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
 
    </div>
</section>