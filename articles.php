<?php
/*
Template Name: Статьи
*/
wp_enqueue_script('theme_article', get_template_directory_uri() . '/dist/article.js', ['theme_common'], false, true);

global $wp_query;

$rubric = get_field('rubric');

$favorite = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 2,
	'tax_query' => !empty($rubric) ? [[
    'taxonomy' => 'category',
    'terms' => $rubric
  ]] : null,
  'meta_query' => [[
    'key' => 'favorite',
    'value' => '1',
    'compare' => '='
  ]]
));
$exclude_ids = [];
$favorite_posts = [];
while ($favorite->have_posts()) : $favorite->the_post();
  $exclude_ids[] = get_the_ID();
  $favorite_posts[] = $favorite->post;
endwhile; wp_reset_query();

$articles = new WP_Query(array(
  'post__not_in' => $exclude_ids,
	'tax_query' => !empty($rubric) ? [[
    'taxonomy' => 'category',
    'terms' => $rubric
  ]] : null,
  'post_type' => 'post',
  'posts_per_page' => 12,
  'paged' => get_query_var('paged') ?: 1
));

$types = [
  'articles' => 'Статья',
  'news' => 'Новость',
  'actions' => 'Акция'
];
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/articles.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="articles-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

          <h1 class="articles-headline"><span><?php the_title() ?></span></h1>
    
          <?php if ($articles->have_posts()): ?>
          <div class="articles-list">
            <div class="articles-list__grid">
              <?php if (!empty($favorite_posts[0])): ?>
              <?php $preview = get_field('preview', $favorite_posts[0]->ID) ?>
              <div class="articles-list__cell articles-list__cell_first">
                <div class="articles-favorite">
                  <?php if ($image = get_the_post_thumbnail_url($favorite_posts[0]->ID, 'large')): ?>
                  <img class="articles-favorite__image" src="<?php echo $image ?>" alt="" loading="lazy">
                  <?php else: ?>
                  <img class="articles-favorite__image" src="https://via.placeholder.com/1024" alt="" loading="lazy" />
                  <?php endif; ?>
                  <div class="articles-favorite__inner">
                    <div class="articles-favorite__subject"><?php echo $preview['subject'] ?></div>
                    <a href="<?php the_permalink($favorite_posts[0]->ID) ?>" class="articles-favorite__title">
                      <?php echo $favorite_posts[0]->post_title ?>
                    </a>
                    <div class="articles-favorite__description"><?php echo $preview['description'] ?></div>
                    <div class="articles-favorite__discount"><?php echo $preview['discount'] ?></div>
                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php while($articles->have_posts()): $articles->the_post(); ?>
              <?php $cats = get_the_category(get_the_ID()) ?>
              <div class="articles-list__cell">
                <div class="articles-item">
                  <div class="articles-item__inner">
                    <?php if ($image = get_the_post_thumbnail_url(get_the_ID(), 'w480h480')): ?>
                    <img class="articles-item__image" src="<?php echo $image ?>" alt="<?php the_title() ?>" loading="lazy">
                    <?php else: ?>
                    <img class="articles-item__image" src="https://via.placeholder.com/600" alt='' loading="lazy" />
                    <?php endif; ?>
                    <div class="articles-item__date"><?php the_date('j F Y') ?></div>
                    <a href="<?php the_permalink() ?>" class="articles-item__title"><?php the_title() ?></a>
                    <?php if ($cats): ?>
                    <div class="articles-item__type articles-item__type_<?php echo $cats[0]->slug ?>">
                      <?php echo !empty($types[$cats[0]->slug]) ? $types[$cats[0]->slug] : $cats[0]->name ?>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>

              <?php if (!empty($favorite_posts[1])): ?>
              <?php $preview = get_field('preview', $favorite_posts[0]->ID) ?>
              <div class="articles-list__cell articles-list__cell_last">
                <div class="articles-favorite-alt">
                  <?php if ($image = get_the_post_thumbnail_url($favorite_posts[1]->ID, 'large')): ?>
                  <img class="articles-favorite-alt__image" src="<?php echo $image ?>" alt="" loading="lazy">
                  <?php else: ?>
                  <img class="articles-favorite-alt__image" src="https://via.placeholder.com/1024" alt="" loading="lazy" />
                  <?php endif; ?>
                  <div class="articles-favorite-alt__inner">
                    <div class="articles-favorite-alt__subject"><?php echo $preview['subject'] ?></div>
                    <a href="<?php the_permalink($favorite_posts[1]->ID) ?>" class="articles-favorite-alt__title"><?php echo $favorite_posts[1]->post_title ?></a>
                    <div class="articles-favorite-alt__description"><?php echo $preview['description'] ?></div>
                  </div>
                  <div class="articles-favorite-alt__discount"><?php echo $preview['discount'] ?></div>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>

          <?php the_posts_pagination([
            'prev_text' => '<span class="ui-arrow-left"></span>',
            'next_text' => '<span class="ui-arrow-right"></span>'
          ]) ?>

          <?php endif; wp_reset_query(); ?>

          <?php endwhile; else: ?>
              <p>Извините, ничего не найдено.</p>
          <?php endif; ?>
        </div>
      </div>

      <?php get_template_part('partials/section-contacts') ?>
      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
