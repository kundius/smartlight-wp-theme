<?php
wp_enqueue_script('theme_article', get_template_directory_uri() . '/dist/article.js', ['theme_common'], false, true);
wp_enqueue_script('theme_project', get_template_directory_uri() . '/dist/project.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/article.css" type="text/css" />
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/project.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
      <div class="project-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <h1 class="ui-headline">
            <span><?php the_title() ?></span>
          </h1>
        </div>
      </div>

      <div class="article-body">
        <div class="container">
          <div class="article-body__content">
            <div class="content">
              <?php the_content() ?>
            </div>
            <div class="article-body__tags">
              <div class="tags">
                <?php the_tags('', '') ?>
              </div>
            </div>
          </div>
          <div class="article-meta">
            <?php previous_post_link('<div class="article-meta__prev">%link</div>', '<span class="ui-arrow-left"></span>') ?>
            <div class="article-meta__share">
              <div class="article-meta__shareLabel">
                Понравилась статья?<br />
                Поделись с друзьями:
              </div>
              <div class="article-meta__shareButtons share-btn">
                <a class="article-meta__shareButton article-meta__shareButton_fb" data-id="fb">
                  <?php icon('fb', .8) ?>
                </a>
                <a class="article-meta__shareButton article-meta__shareButton_tw" data-id="tw">
                  <?php icon('tw', .8) ?>
                </a>
                <a class="article-meta__shareButton article-meta__shareButton_pi" data-id="pi">
                  <?php icon('pi', .8) ?>
                </a>
                <a class="article-meta__shareButton article-meta__shareButton_vk" data-id="vk">
                  <?php icon('vk2', .8) ?>
                </a>
                <a class="article-meta__shareButton article-meta__shareButton_ok" data-id="ok">
                  <?php icon('ok2', .8) ?>
                </a>
              </div>
            </div>
            <?php next_post_link('<div class="article-meta__next">%link</div>', '<span class="ui-arrow-right"></span>') ?>
          </div>
        </div>
      </div>
      <?php endwhile; endif; ?>

      <?php
        $also_query = null;
        print_r(array_map(function($row) { return $row->ID; }, get_field('related')));
        if ($related = get_field('related')) {
          $also_query = new WP_Query([
            'post_type' => 'project',
            // 'meta_query' => [
            //   [
            //     'key' => 'ID',
            //     'value' => array_map(function($row) { return $row->ID; }, $related),
            //     'compare' => 'IN'
            //   ]
            // ],
            // 'caller_get_posts' => 1,
            'post__in' => array_map(function($row) { return $row->ID; }, $related)
          ]);

        } else if ($tags = wp_get_post_tags($post->ID)) {
          $tag_ids = [];
          foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
          $also_query = new WP_Query([
            'post_type' => 'project',
            'tag__in' => $tag_ids,
            'orderby' => 'rand',
            'caller_get_posts' => 1,
            'post__not_in' => [$post->ID],
            'showposts' => 3
          ]);
        }
      ?>
      <?php if ($also_query && $also_query->have_posts()): ?>
      <div class="project-also">
        <div class="container">
          <div class="project-also__title">Смотрите также</div>
          <div class="ui-grid">
            <?php while ($also_query->have_posts()): $also_query->the_post(); ?>
            <div class="ui-width-1-2@s ui-width-1-3@m">
              <div class="post-item">
                <div class="post-item__image">
                  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'w500h400') ?>" alt="" loading="lazy" />
                </div>
                <div class="post-item__title"><?php the_title() ?></div>
                <div class="post-item__description"><?php the_excerpt() ?></div>
                <a href="<?php the_permalink() ?>" class="ui-button-more post-item__more">
                  <span class="ui-button-more__arrow"></span>
                  Смотреть
                </a>
              </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div style="background-color: #2b303e">
        <?php get_template_part('partials/section-callback') ?>
      </div>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
