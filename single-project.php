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
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
    $gallery = get_field('gallery');
    $cats = get_the_terms(get_the_ID(), 'project_category');
    ?>
    <div class="wrapper">
      <div class="project-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>

          <h1 class="ui-headline">
            <span><?php the_title() ?></span>
          </h1>

          <div class="project-main">
            <div class="project-main__left">
              <?php if ($cats): ?>
              <a href="<?php echo get_term_link($cats[0]->term_id) ?>" class="project-main__category">
                <svg role='img'>
                  <use href="<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#<?php echo $cats[0]->slug ?>" />
                </svg>
                <?php echo $cats[0]->name ?>
              </a>
              <?php endif; ?>
              <span class="project-main__year"><?php the_date('Y') ?></span>
              <?php if (has_excerpt()): ?>
              <div class="project-main__description"><div><?php the_excerpt() ?></div></div>
              <?php endif; ?>
            </div>
            <div class="project-main__center">
              <div class="project-main-gallery" id="project-gallery" data-slider>
                <div class="project-main-gallery__wrapper" data-slider-wrapper>
                  <?php foreach ($gallery as $item): ?>
                  <div class="project-main-gallery__item" data-slider-item>
                    <img src="<?php echo $item['url'] ?>">
                  </div>
                  <?php endforeach; ?>
                </div>
                <button class="ui-slider-nav ui-slider-nav_small project-main-gallery__previous" data-slider-control="previous">
                  <span class="ui-arrow-left"></span>
                </button>
                <button class="ui-slider-nav ui-slider-nav_small project-main-gallery__next" data-slider-control="next">
                  <span class="ui-arrow-right"></span>
                </button>
              </div>
            </div>
            <div class="project-main__right">
              
              <div class="project-main-thumbs" id="project-thumbs-vertical" data-slider="vertical: true; span: 4">
                <div class="project-main-thumbs__wrapper" data-slider-wrapper>
                  <?php foreach ($gallery as $key => $item): ?>
                  <div class="project-main-thumbs__item<?php if ($key == 0): ?> _active<?php endif; ?>" data-index="<?php echo $key ?>" data-slider-item>
                    <div class="project-main-thumbs__image">
                      <img src="<?php echo $item['url'] ?>">
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
                <button class="ui-slider-nav ui-slider-nav_small project-main-thumbs__previous" data-slider-control="previous">
                  <span class="ui-arrow-up"></span>
                </button>
                <button class="ui-slider-nav ui-slider-nav_small project-main-thumbs__next" data-slider-control="next">
                  <span class="ui-arrow-down"></span>
                </button>
              </div>

              <div class="project-main-thumbs" id="project-thumbs-horizontal" data-slider="span: 4">
                <div class="project-main-thumbs__wrapper" data-slider-wrapper>
                  <?php foreach ($gallery as $key => $item): ?>
                  <div class="project-main-thumbs__item<?php if ($key == 0): ?> _active<?php endif; ?>" data-index="<?php echo $key ?>" data-slider-item>
                    <div class="project-main-thumbs__image">
                      <img src="<?php echo $item['url'] ?>">
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
                <button class="ui-slider-nav ui-slider-nav_small project-main-thumbs__previous" data-slider-control="previous">
                  <span class="ui-arrow-left"></span>
                </button>
                <button class="ui-slider-nav ui-slider-nav_small project-main-thumbs__next" data-slider-control="next">
                  <span class="ui-arrow-right"></span>
                </button>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="article-body">
        <div class="container">
          <div class="article-body__content">
            <div class="content">
              <?php the_content() ?>
            </div>
            <?php if ($tags = get_the_tags('', '')): ?>
            <div class="article-body__tags">
              <div class="tags">
                <?php echo $tags ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="article-meta">
            <?php previous_post_link('<div class="article-meta__prev">%link</div>', '<span class="ui-arrow-left"></span>') ?>
            <div class="article-meta__share">
              <div class="article-meta__shareLabel">
                Понравился проект?<br />
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

      <?php
        $also_query = null;
        if ($related = get_field('related')) {
          $also_query = new WP_Query([
            'post_type' => 'project',
            'post__in' => array_map(function($row) { return $row->ID; }, $related)
          ]);
        } else if ($tags = wp_get_post_tags($post->ID)) {
          $tag_ids = [];
          foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
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
          <div class="project-also__grid">
            <div class="ui-grid ui-grid-medium@l ui-grid-large@xl">
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
      </div>
      <?php endif; ?>

      <div style="background-color: #2b303e">
        <?php get_template_part('partials/section-callback') ?>
      </div>

      <?php get_template_part('partials/footer') ?>
    </div>
    <?php endwhile; endif; ?>
  </body>
</html>
