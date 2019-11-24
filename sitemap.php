<?php
/*
Template Name: Карта сайт
*/
wp_enqueue_script('theme_contacts', get_template_directory_uri() . '/dist/sitemap.js', ['theme_common'], false, true);


$articles = new WP_Query(array(
	'tax_query' => [[
    'taxonomy' => 'category',
    'terms' => [2, 3]
  ]],
  'post_type' => 'post',
  'posts_per_page' => 12,
  'paged' => get_query_var('paged') ?: 1
));

$actions = new WP_Query(array(
	'tax_query' => [[
    'taxonomy' => 'category',
    'terms' => [4]
  ]],
  'post_type' => 'post',
  'posts_per_page' => 12,
  'paged' => get_query_var('paged') ?: 1
));
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/sitemap.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="sitemap-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
          <h1 class="sitemap-headline"><span><?php the_title() ?></span></h1>
          <div class="sitemap-body">
            <div class="sitemap-grid">
              <div class="sitemap-grid__cell">
                <ul class="sitemap-list-first js-sitemap-list">
                  <li><a href="<?php the_permalink(2) ?>">Главная</a></li>
                  <li><a href="<?php the_permalink(7) ?>">О компании</a></li>
                  <li><a href="<?php the_permalink(39) ?>">Наши работы</a></li>
                  <li><a href="<?php the_permalink(11) ?>">Цены</a></li>
                  <li><a href="<?php the_permalink(9) ?>">Контакты</a></li>
                </ul>
              </div>
              <div class="sitemap-grid__cell">
                <ul class="sitemap-list-first js-sitemap-list">
                  <li class="_opened">
                    <a href="<?php the_permalink(85) ?>">Освещение</a>
                    <ul class="sitemap-list-second js-sitemap-list">
                      <li class="_opened">
                        <a href="#">Новогоднее освещение</a>
                        <ul class="sitemap-list-third js-sitemap-list">
                          <li><a href="<?php the_permalink(341) ?>">Освещение домов, коттеджей</a></li>
                          <li><a href="<?php the_permalink(287) ?>">Освещение зданий и объектов</a></li>
                        </ul>
                      </li>
                      <li><a href="<?php the_permalink(160) ?>">Архитектурное освещение</a></li>
                      <li><a href="<?php the_permalink(87) ?>">Уличное освещение</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="sitemap-grid__cell">
                <ul class="sitemap-list-first js-sitemap-list">
                  <li>
                    <a href="<?php the_permalink(76) ?>">Акции</a>
                    <ul class="sitemap-list-second js-sitemap-list">
                      <?php while($actions->have_posts()): $actions->the_post(); ?>
                      <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                      <?php endwhile; ?>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="sitemap-grid__cell">
                <ul class="sitemap-list-first js-sitemap-list">
                  <li>
                    <a href="<?php the_permalink(45) ?>">Статьи</a>
                    <ul class="sitemap-list-second js-sitemap-list">
                      <?php while($articles->have_posts()): $articles->the_post(); ?>
                      <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                      <?php endwhile; ?>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="sitemap-grid__cell">
                <ul class="sitemap-list-first js-sitemap-list">
                  <li>
                    <a href="<?php the_permalink(360) ?>">Пользовательское соглашение</a>
                  </li>
                </ul>
              </div>
              <div class="sitemap-grid__cell">
                <ul class="sitemap-list-first js-sitemap-list">
                  <li>
                    <a href="<?php the_permalink(3) ?>">Политика конфиденциальности и обработки персональных данных</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php endwhile; else: ?>
              <p>Извините, ничего не найдено.</p>
          <?php endif; ?>
        </div>
      </div>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
