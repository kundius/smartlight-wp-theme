<?php
/*
Template Name: Проекты
*/
wp_enqueue_script('theme_projects', get_template_directory_uri() . '/dist/projects.js', ['theme_common'], false, true);

global $wp_query;

// $category = get_category();
print_r(get_query_var('cat'));

$tax_query = $_GET['terms'] ? [[
  'taxonomy' => 'project_category',
  'terms' => $_GET['terms']
]] : null;

$year = $_GET['years'] ? $_GET['years'] : null;

$projects = new WP_Query(array(
  'post_type' => 'project',
  'posts_per_page' => 27,
  'paged' => get_query_var('paged') ?: 1,
  'year' => $year,
	'tax_query' => $tax_query
));

$terms = get_terms('project_category', [
  'hide_empty' => true
]);

$canonical = wp_get_canonical_url();
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/projects.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="projects-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

          <h1 class="ui-headline"><span><?php the_title() ?></span></h1>

          <div class="projects-filter">
            <div class="projects-filter__categories">
              <a href="<?php echo $canonical ?>" class="ui-button-filter projects-filter__category<?php if (empty($_GET['terms'])): ?> _active<?php endif; ?>">Все</a>
              <?php foreach ($terms as $key => $term): ?>
              <a href="<?php echo $canonical ?>?terms=<?php echo $term->term_id ?>" class="ui-button-filter projects-filter__category<?php if ($term->term_id == $_GET['terms']): ?> _active<?php endif; ?>">
                <svg role='img'>
                  <use href="<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#<?php echo $term->slug ?>" />
                </svg>
                <?php echo $term->name ?>
              </a>
              <?php endforeach; ?>
            </div>
            <div class="projects-filter__years">
              <a href="<?php echo $canonical ?>" class="projects-filter__year<?php if (empty($_GET['years'])): ?> _active<?php endif; ?>">Все</a>
              <!-- <a href="<?php echo $canonical ?>?years=2017" class="projects-filter__year">2017</a>
              <a href="<?php echo $canonical ?>?years=2018" class="projects-filter__year">2018</a> -->
              <a href="<?php echo $canonical ?>?years=2019" class="projects-filter__year<?php if ($_GET['years'] == '2019'): ?> _active<?php endif; ?>">2019</a>
              <!-- <a href="<?php echo $canonical ?>?years=2020" class="projects-filter__year">2020</a> -->
            </div>
          </div>

          <?php if ($projects->have_posts()): ?>
          <div class="projects-list">
            <?php $wp_query = $projects ?>
            <?php while($projects->have_posts()): $projects->the_post(); ?>
            <div class="projects-list__cell">
              <div class="projects-item" data-project="<?php echo get_the_ID() ?>">
                <?php if ($image = get_the_post_thumbnail_url(get_the_ID(), 'large')): ?>
                <img class="projects-item__image" src="<?php echo $image ?>" alt="<?php the_title() ?>" loading="lazy">
                <?php else: ?>
                <img class="projects-item__image" src="https://via.placeholder.com/600" alt='' loading="lazy" />
                <?php endif; ?>
                <span class="projects-item__magnify">
                  <span class="ui-magnify-button">
                    <span class="ui-magnify-button__arrow"></span>
                    <span class="ui-magnify-button__text">Увеличить</span>
                  </span>
                </span>
              </div>
            </div>
            <?php endwhile; ?>
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
