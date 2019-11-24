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

          <?php if (has_excerpt()): ?>
          <div class="prices-description">
            <?php the_excerpt() ?>
          </div>
          <?php endif; ?>

          <div class="prices-table-wrap">
            <table class="prices-table">
              <caption><?php the_field('caption') ?></caption>
              <tbody>
                <tr>
                  <th colspan="2">Материал</th>
                  <th>Описание</th>
                  <th>Цена за погонный метр, руб.</th>
                </tr>
                <?php foreach (get_field('list') as $row): ?>
                <tr>
                  <td><strong><?php echo $row['title'] ?></strong></td>
                  <td><img class="prices-table__image" src='<?php echo $row['image']['url'] ?>' alt='' /></td>
                  <td><?php echo $row['description'] ?></td>
                  <td><?php echo $row['price'] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="prices-download">
            <?php if ($price = get_field('price') && $price['file']): ?>
            <a href="<?php echo $price['file']['url'] ?>" class="ui-button-primary prices-download__button">
              <span>
                Скачать прайс
                <span class="ui-download-arrow prices-download__arrow"></span>
              </span>
            </a>
            <div class="prices-download__fileInfo"><?php echo $price['caption'] ?></div>
            <?php endif; ?>
            <div class="prices-download__description">
              <?php the_content() ?>
            </div>
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
