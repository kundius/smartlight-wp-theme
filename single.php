<?php
wp_enqueue_script('theme_articles', get_template_directory_uri() . '/dist/articles.js', ['theme_common'], false, true);
wp_enqueue_script('theme_article', get_template_directory_uri() . '/dist/article.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/articles.css" type="text/css" />
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/article.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
      <div class="article-headline-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <div class="article-headline">
            <h1 class="article-headline__title">
              <span><?php the_title() ?></span>
            </h1>
            <div class="article-headline__date"><?php the_date('j F Y') ?></div>
            <?php if (has_excerpt()): ?>
            <div class="article-headline__description"><?php the_excerpt() ?></div>
            <?php endif; ?>
            <?php if ($image = get_the_post_thumbnail_url(get_the_ID(), 'full')): ?>
            <div class="article-headline__image">
              <img src="<?php echo $image ?>" alt="<?php the_title() ?>" loading="lazy">
            </div>
            <?php endif; ?>
          </div>
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
        if ($related = get_field('related')) {
            $also_query = new wp_query([
                'orderby'=> 'rand',                
                'caller_get_posts'=> 1,            
                'post__in' => $related,
                'post__not_in' => [$post->ID],
                'showposts'=> 5   
            ]);
        } else {
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $tag_ids = [];
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $also_query = new wp_query([
                    'tag__in' => $tag_ids,       
                    'orderby'=> 'rand',                
                    'caller_get_posts'=> 1,            
                    'post__not_in' => [$post->ID],
                    'showposts'=> 5   
                ]);
            }
        }
      ?>
      <?php if ($also_query && $also_query->have_posts()): ?>
      <?php
        $favorite = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => 1,
          'meta_query' => [[
            'key' => 'favorite',
            'value' => '1',
            'compare' => '='
          ]]
        ));
      ?>
      <div class="article-also">
        <div class="container">
          <div class="article-also__title">Читайте также</div>
          <div class="article-also__grid">
            <?php while($favorite->have_posts()): $favorite->the_post(); ?>
            <?php $preview = get_field('preview') ?>
            <div class="article-also__cell">
              <div class="articles-favorite">
                <?php if ($image = get_the_post_thumbnail_url(get_the_ID(), 'large')): ?>
                <img class="articles-favorite__image" src="<?php echo $image ?>" alt="" loading="lazy">
                <?php else: ?>
                <img class="articles-favorite__image" src="https://via.placeholder.com/1024" alt="" loading="lazy" />
                <?php endif; ?>
                <div class="articles-favorite__inner">
                  <div class="articles-favorite__subject"><?php echo $preview['subject'] ?></div>
                  <a href="<?php the_permalink() ?>" class="articles-favorite__title">
                    <?php the_title() ?>
                  </a>
                  <div class="articles-favorite__description"><?php echo $preview['description'] ?></div>
                  <div class="articles-favorite__discount"><?php echo $preview['discount'] ?></div>
                </div>
              </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
            <?php while($also_query->have_posts()): $also_query->the_post(); ?>
            <div class="article-also__cell">
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
            <?php endwhile; wp_reset_query(); ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php get_template_part('partials/section-contacts') ?>
      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
