<?php
/*
Template Name: О компании
*/
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/about.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="about-section-first">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
          <h1 class="about-headline"><span><?php the_title() ?></span></h1>
          <div class="about-logo">
            <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/main-logo.png' alt='' class="about-logo__image" />
          </div>
          <div class="about-history">
            <div class="about-history__item">
              <div class="about-history__itemYear"><span>2006</span></div>
              <div class="about-history__itemText">
                <p>Компания «Смарт Лайт» с 2006 года специализируется на проведении электромонтажных работ самого разного уровня и сложности. От прокладки электропитающих кабелей до реализации самых смелых  проектов по освещению зданий и территорий частного и муниципального назначения.</p>
              </div>
            </div>
            <div class="about-history__item">
              <div class="about-history__itemYear"><span>2015</span></div>
              <div class="about-history__itemText">
                С 2015 года<br /> мы разрабатываем архитектурные проекты с изготовлением светильников индивидуального назначения и применения.<br /><br /><br /><br />Так же мы реализуем проекты по новогоднему и праздничному освещению участков, зданий и парков с применением как обычных гирлянд, так и с изготовлением гирлянд непосредственно под желания клиентов с учетом архитектурных особенностей домов, зданий и парков.
              </div>
            </div>
          </div>
          <?php endwhile; else: ?>
              <p>Извините, ничего не найдено.</p>
          <?php endif; ?>
        </div>
      </div>

      <div class="about-section-second">
        <div class="container">
          <div class="about-projects">
            <div class="about-projects__item">
              <img class="about-projects__itemImage" src="https://via.placeholder.com/1000" alt='' />
              <span class="about-projects__itemMagnify">
                <span class="ui-magnify-button">
                  <span class="ui-magnify-button__arrow"></span>
                </span>
              </span>
            </div>
            <div class="about-projects__item">
              <img class="about-projects__itemImage" src="https://via.placeholder.com/1001" alt='' />
              <span class="about-projects__itemMagnify">
                <span class="ui-magnify-button">
                  <span class="ui-magnify-button__arrow"></span>
                </span>
              </span>
            </div>
            <div class="about-projects__item">
              <img class="about-projects__itemImage" src="https://via.placeholder.com/1002" alt='' />
              <span class="about-projects__itemMagnify">
                <span class="ui-magnify-button">
                  <span class="ui-magnify-button__arrow"></span>
                </span>
              </span>
            </div>
            <div class="about-projects__item">
              <img class="about-projects__itemImage" src="https://via.placeholder.com/1003" alt='' />
              <span class="about-projects__itemMagnify">
                <span class="ui-magnify-button">
                  <span class="ui-magnify-button__arrow"></span>
                </span>
              </span>
            </div>
            <div class="about-projects__item">
              <img class="about-projects__itemImage" src="https://via.placeholder.com/1004" alt='' />
              <span class="about-projects__itemMagnify">
                <span class="ui-magnify-button">
                  <span class="ui-magnify-button__arrow"></span>
                </span>
              </span>
            </div>
            <div class="about-projects__more">
              <a href='#' class="about-projects__moreButton">
                Больше работ<i></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/section-contacts') ?>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
