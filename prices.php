<?php
/*
Template Name: Цены
*/
wp_enqueue_script('theme_prices', get_template_directory_uri() . '/dist/prices.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/prices.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="prices-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

          <h1 class="prices-headline"><span><?php the_title() ?></span></h1>

          <div class="prices-description">
            Точная смета определяется после выезда на объект специалиста и складывается из стоимости расходов на материалы и выполняемых работ.
          </div>

          <div class="prices-table-wrap">
            <table class="prices-table">
              <caption>Новогоднее освещение - материалы</caption>
              <tbody>
                <tr>
                  <th colspan="2">Материал</th>
                  <th>Описание</th>
                  <th>Цена за погонный метр, руб.</th>
                </tr>
                <tr>
                  <td><strong>ТВИНКЛ-ЛАЙт</strong></td>
                  <td><img class="prices-table__image" src='https://via.placeholder.com/66' alt='' /></td>
                  <td>Яркая и надёжная классическая гирлянда класса «премиум». Ресурс светодиодов составляет 100 000 ч</td>
                  <td>от 200 руб за пог.метр</td>
                </tr>
                <tr>
                  <td><strong>ТАЮЩИЕ СОСУЛЬКИ</strong></td>
                  <td><img class="prices-table__image" src='https://via.placeholder.com/66' alt='' /></td>
                  <td>Яркая и надёжная классическая гирлянда класса «премиум». Ресурс светодиодов составляет 100 000 ч</td>
                  <td>от 200 руб за пог.метр</td>
                </tr>
                <tr>
                  <td><strong>ТВИНКЛ-ЛАЙт</strong></td>
                  <td><img class="prices-table__image" src='https://via.placeholder.com/66' alt='' /></td>
                  <td>Яркая и надёжная классическая гирлянда класса «премиум». Ресурс светодиодов составляет 100 000 ч</td>
                  <td>от 200 руб за пог.метр</td>
                </tr>
                <tr>
                  <td><strong>ТВИНКЛ-ЛАЙт</strong></td>
                  <td><img class="prices-table__image" src='https://via.placeholder.com/66' alt='' /></td>
                  <td>Яркая и надёжная классическая гирлянда класса «премиум». Ресурс светодиодов составляет 100 000 ч</td>
                  <td>от 200 руб за пог.метр</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="prices-download">
            <a href="#" class="ui-button-primary prices-download__button">
              <span>
                Скачать прайс
                <span class="ui-download-arrow prices-download__arrow"></span>
              </span>
            </a>
            <div class="prices-download__fileInfo">price.xls (1,25 Mб)</div>
            <div class="prices-download__description">Свяжитесь с нашими менеджерами любым удобным способом – и Вы получите предварительную смету проекта. При необходимости, мы готовы дать детальные консультации относительно всего спектра нашей продукции и объяснить на объекте, что и где планируется разместить.</div>
          </div>

          <?php endwhile; else: ?>
              <p>Извините, ничего не найдено.</p>
          <?php endif; ?>
        </div>
      </div>

      <div style="background-color: #292f3f">
        <?php get_template_part('partials/section-callback') ?>
      </div>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
