<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
  </head>
  <body>
    <div class="wrapper">
      <div class="ui-page-section">
        <?php get_template_part('partials/header') ?>

        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>

          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
          <h1 class="ui-headline"><span>404</span></h1>
          <?php endwhile; else: ?>
          <p>Извините, ничего не найдено.</p>
          <?php endif; ?>
        </div>
      </div>

      <?php get_template_part('partials/section-callback') ?>
      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
