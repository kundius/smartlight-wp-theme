<?php
/*
Template Name: Шаблон услуги [1]
*/
wp_enqueue_script('theme_servicePrime', get_template_directory_uri() . '/dist/servicePrime.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight-wp-theme/dist/servicePrime.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
      <div class="service-prime-section" style="background-image: url(<?php echo get_field('background')['url'] ?>)">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="service-prime-intro">
            <div class="service-prime-intro__title">
              <span><?php the_field('intro_title') ?></span>
              <small><?php the_field('intro_description') ?></small>
            </div>
            <?php if ($advantages = get_field('intro_advantages')): ?>
            <ul class="service-prime-intro__advantages">
              <?php foreach ($advantages as $item): ?>
              <li><?php echo $item['text'] ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
			
          <?php echo do_shortcode('[contact-form-7 id="1091" title="Консультация по уличному освещению"]') ?>

          <div class="service-prime-actions">
            <?php if ($projects_small = get_field('projects_small')): ?>
            <div class="service-prime-actions__projects">
              <div class="simple-slideshow" data-slider>
                <div class="simple-slideshow__items">
                  <div class="simple-slideshow__slider" data-slider-wrapper>
                    <?php foreach ($projects_small as $item): ?>
                    <a href="<?php echo get_the_post_thumbnail_url($item->ID, 'full') ?>" class="simple-slideshow__item" data-slider-item data-project="<?php echo $item->ID ?>">
                      <img class="simple-slideshow__image" src="<?php echo get_the_post_thumbnail_url($item->ID, 'w480h480') ?>" alt="<?php echo $item->post_title ?>" loading="lazy">
                      <span class="ui-magnify-button simple-slideshow__magnify">
                        <span class="ui-magnify-button__arrow" ></span>
                        <span class="ui-magnify-button__text">Увеличить</span>
                      </span>
                    </a>
                    <?php endforeach; ?>
                  </div>
                </div>
                <button class="ui-slider-nav ui-slider-nav_small simple-slideshow__previous" data-slider-control="previous">
                  <span class="ui-arrow-left"></span>
                </button>
                <button class="ui-slider-nav ui-slider-nav_small simple-slideshow__next" data-slider-control="next">
                  <span class="ui-arrow-right"></span>
                </button>
              </div>
            </div>
            <?php endif; ?>

            <div class="service-prime-actions__actions">
              <?php if ($actions = get_field('actions_slider', 'option')): ?>
              <div class="actions-slider" data-slider>
                <div class="actions-slider__slider">
                  <div class="actions-slider__items" data-slider-wrapper>
                    <?php foreach ($actions as $action): ?>
                    <?php if ($action['link']): ?>
                    <a href="<?php echo $action['link'] ?>" class="actions-slider__item" data-slider-item>
                    <?php else: ?>
                    <button class="actions-slider__item" data-slider-item data-modal="#calculation">
                    <?php endif; ?>
                        <span class="actions-slider__date"><?php echo $action['date'] ?></span>
                        <span class="actions-slider__title"><?php echo $action['title'] ?></span>
                        <span class="actions-slider__description"><?php echo $action['description'] ?></span>
                    <?php if ($action['link']): ?>
                    </a>
                    <?php else: ?>
                    </button>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="actions-slider__dots">
                  <?php foreach ($actions as $key => $action): ?>
                    <button class="actions-slider__dot" data-slider-control="<?php echo $key ?>"></button>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endif; ?>
            </div>

            <div class="service-prime-actions__offer">
              <button class="block-special-offer" data-modal="#calculation">
                <span class="block-special-offer__text">Выезд для замера и оценки в день обращения</span>
              </button>
            </div>
          </div>

          <div class="service-prime-about">
            <div class="service-prime-about__title"><?php the_field('about_title') ?></div>
            <div class="service-prime-about__content"><?php the_field('about_description') ?></div>
          </div>

        </div>
      </div>

      <div class="principles-section">
        <div class="container">
          <div class="principles-section__title"><span><?php the_field('principles_title') ?></span></div>
          <div class="principles-section__items">
            <?php foreach (get_field('principles_list') as $key => $item): ?>
            <div class="principles-section__item">
              <div class="principles-section__itemIcon">
                <img src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['title'] ?>" />
                <div class="principles-section__itemNumber"><?php echo $key ?></div>
              </div>
              <div class="principles-section__itemTitle"><span><?php echo $item['title'] ?></span></div>
              <div class="principles-section__itemDescription">
                <?php echo $item['description'] ?>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="principles-section__results">
            <div class="principles-section__resultsText">
              <?php the_field('principles_description') ?>
            </div>
            <button class="ui-button-primary principles-section__resultsOrder" data-modal-form="Кнопка в принципах" data-modal="#consultation"><span>Заказать консультацию</span></button>
          </div>
        </div>
      </div>

      <div class="prime-types">
        <div class="container">
          <div class="prime-types__title"><?php the_field('types_title') ?></div>
          <div class="prime-types__grid">
            <?php foreach (get_field('types_list') as $item): ?>
              <div class="prime-types__cell">
                <div class="prime-types__item">
                  <div class="prime-types__itemImage"><img src="<?php echo $item['image']['url'] ?>" alt="" /></div>
                  <div class="prime-types__itemTitle"><?php echo $item['title'] ?></div>
                  <div class="prime-types__itemInner">
                    <div class="prime-types__itemInnerTitle"><?php echo $item['title'] ?></div>
                    <img src="<?php echo $item['icon']['url'] ?>" alt="" class="prime-types__itemInnerIcon" />
                    <div class="prime-types__itemInnerDesc"><?php echo $item['description'] ?></div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <?php if ($projects_large = get_field('projects_large')): ?>
      <div class="service-objects service-objects_secondary" data-slider>
        <div class="container">
          <div class="service-objects__wrapper">
            <div class="service-objects__title">Выполненные объекты</div>
            <div class="service-objects__filter">
                <!-- <button class="ui-button-filter service-objects__filterItem">
                  Все
                </button>
                <button class="ui-button-filter service-objects__filterItem">
                  <?php icon('house') ?>
                  Освещение домов, коттеджей
                </button>
                <button class="ui-button-filter service-objects__filterItem">
                  <?php icon('office') ?>
                  Освещение зданий и торговых центров
                </button> -->
            </div>
            <div class="service-objects__slider">
              <div class="service-objects__sliderItems">
                <div class="service-objects__grid" data-slider-wrapper>
                  <?php foreach ($projects_large as $item): $image = get_the_post_thumbnail_url($item->ID, 'full'); ?>
                  <div class="service-objects__cell" data-slider-item>
                    <a href="<?php the_permalink($item->ID) ?>" class="service-objects__item">
                      <img class="service-objects__itemImage" src="<?php echo $image ?>" alt='' />
                      <span class="service-objects__itemMagnify">
                        <button class="ui-magnify-button" data-project="<?php echo $item->ID ?>">
                          <span class="ui-magnify-button__arrow"></span>
                          <span class="ui-magnify-button__text">Увеличить</span>
                        </button>
                      </span>
                    </a>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <button class="ui-slider-nav service-objects__sliderPrev" data-slider-control="previous">
                <span class="ui-arrow-left"></span>
              </button>
              <button class="ui-slider-nav service-objects__sliderNext" data-slider-control="next">
                <span class="ui-arrow-right"></span>
              </button>
            </div>
            <a href="<?php echo get_term_link(14, 'project_category') ?>" class="ui-button-secondary service-objects__more">
              Больше работ
              <span class="ui-arrow-right service-objects__moreArrow"></span>
            </a>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php get_template_part('partials/section-scheme') ?>

      <div class="planning-section">
        <div class="container">
          <div class="planning-section__wrapper">
            <?php if ($image = get_field('planning_image')): ?>
            <div class="planning-section__image">
              <img src="<?php echo $image['url'] ?>" alt="" />
            </div>
            <?php endif; ?>
            <div class="planning-section__info">
              <div class="planning-section__title"><?php the_field('planning_title') ?></div>
              <div class="planning-section__content"><?php the_field('planning_description') ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="service-content">
        <div class="container">
          <div class="content">
            <?php the_content() ?>
          </div>
        </div>
      </div>

      <?php endwhile; endif; ?>

      <div style="background-color: #e6e7e9">
        <?php get_template_part('partials/section-callback') ?>
      </div>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
