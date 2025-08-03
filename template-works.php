<?php
/*
Template Name: Наши работы
*/
wp_enqueue_script('theme_contacts', get_template_directory_uri() . '/dist/works.js', ['theme_common'], false, true);
$gallery = get_field('gallery');
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight-wp-theme/dist/works.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="works-section">
        <?php get_template_part('partials/header') ?>

        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>

          <h1 class="ui-headline"><span><?php the_title() ?></span></h1>

          <div class="works-content content"><?php the_content() ?></div>

          <div class="works-gallery">
          <?php foreach ($gallery as $key => $item): ?>
          <a href="<?php echo $item['url'] ?>" class="works-gallery__item">
            <img src="<?php echo $item['sizes']['thumbnail'] ?>">
          </a>
          <?php endforeach; ?>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/section-contacts') ?>
      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
