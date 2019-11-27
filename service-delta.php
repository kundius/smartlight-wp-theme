<?php
/*
Template Name: Шаблон услуги [4]
*/
wp_enqueue_script('theme_serviceMesozoic', get_template_directory_uri() . '/dist/serviceMesozoic.js', ['theme_common'], false, true);
wp_enqueue_script('theme_serviceDelta', get_template_directory_uri() . '/dist/serviceDelta.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/serviceMesozoic.css" type="text/css" />
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/serviceDelta.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
      <div class="service-delta-intro" style="background-image: url(<?php echo get_field('background')['url'] ?>)">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="service-delta-intro__title">
            <?php the_field('intro_title') ?>
            <small><?php the_field('intro_description') ?></small>
          </div>

          <button class="service-delta-intro__button" data-modal="#feedback"><span>Заказать консультацию</span></button>

          <?php if ($advantages = get_field('intro_advantages')): ?>
          <ul class="service-delta-intro__advantages">
            <?php foreach ($advantages as $item): ?>
            <li><?php echo $item['text'] ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>

          <div class="service-delta-actions">
            <?php if ($projects_small = get_field('projects_small')): ?>
            <div class="service-delta-actions__projects">
              <div class="simple-slideshow js-slider">
                <div class="simple-slideshow__items">
                  <div class="simple-slideshow__slider js-slider-wrapper">
                    <?php foreach ($projects_small as $item): ?>
                    <a href="<?php echo get_the_post_thumbnail_url($item->ID, 'full') ?>" class="simple-slideshow__item js-slider-item" data-project="<?php echo $item->ID ?>">
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

            <div class="service-delta-actions__actions">
              <?php if ($actions = get_field('actions_slider', 'option')): ?>
              <div class="actions-slider js-slider">
                <div class="actions-slider__slider">
                  <div class="actions-slider__items js-slider-wrapper">
                    <?php foreach ($actions as $action): ?>
                    <?php if ($action['link']): ?>
                    <a href="<?php echo $action['link'] ?>" class="actions-slider__item js-slider-item">
                    <?php else: ?>
                    <button class="actions-slider__item js-slider-item" data-modal="#calculation">
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

            <div class="service-delta-actions__offer">
              <button class="block-special-offer" data-modal="#calculation">
                <span class="block-special-offer__text">Выезд для замера и оценки в день обращения</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="service-delta-about">
        <div class="container">
          <div class="service-delta-about__title"><?php the_field('about_title') ?></div>
          <div class="service-delta-about__content"><?php the_field('about_description') ?></div>
        </div>
      </div>

      <div class="mesozoic-types mesozoic-types_<?php echo $post->post_name ?>">
        <div class="container">
          <div class="mesozoic-types__wrapper">
            <div class="mesozoic-types__title">
              <?php the_field('types_title') ?>
            </div>
            <div class="mesozoic-types__items">
              <div class="mesozoic-types__grid js-masonry-grid">
                <?php foreach (get_field('types_list') as $key => $item): ?>
                <?php if ($item['type'] == 'primary'): ?>
                <div class="mesozoic-types__cell">
                  <div class="mesozoic-types__item">
                    <div class="mesozoic-types__itemImage">
                      <img src="<?php echo $item['image']['sizes']['w500h400'] ?>" alt='' />
                    </div>
                    <div class="mesozoic-types__itemTitle"><?php echo $item['title'] ?></div>
                    <div class="mesozoic-types__itemDescription"><?php echo $item['description'] ?></div>
                    <?php if (!empty($item['content'])): ?>
                    <button class="ui-button-more mesozoic-types__itemMore" data-modal="#modal-type-<?php echo $key ?>">
                      <span class="ui-button-more__arrow"></span>
                      Читать больше
                    </button>
                    <?php endif; ?>
                  </div>
                </div>
                <?php else: ?>
                <div class="mesozoic-types__cell">
                  <div class="mesozoic-types__figures">
                    <div class="mesozoic-types__figuresImage">
                      <img src="<?php echo $item['image']['sizes']['w500h400'] ?>" alt='' />
                    </div>
                    <div class="mesozoic-types__figuresInner">
                      <div class="mesozoic-types__figuresTitle"><?php echo $item['title'] ?></div>
                      <div class="mesozoic-types__figuresDescription"><?php echo $item['description'] ?></div>
                      <?php if (!empty($item['content'])): ?>
                      <button class="ui-button-more mesozoic-types__figuresMore" data-modal="#modal-type-<?php echo $key ?>">
                        <span class="ui-button-more__arrow"></span>
                        Читать больше
                      </button>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php foreach (get_field('types_list') as $key => $item): ?>
      <div class="modal-type" id="modal-type-<?php echo $key ?>">
        <button class="modal-type__close" data-modal-close></button>
        <div class="modal-type__image" style="background-image: url(<?php echo $item['image']['url'] ?>)"></div>
        <div class="modal-type__body">
          <div class="modal-type__title"><span><?php echo $item['title'] ?></span></div>
          <div class="modal-type__content"><?php echo $item['content'] ?></div>
          <button class="ui-button-primary modal-type__order" data-modal="#feedback">
            <span>
              Заказать консультацию
              <span class="ui-arrow-right"></span>
            </span>
          </button>
        </div>
      </div>
      <?php endforeach; ?>

      <div class="principles-section">
        <div class="container">
          <div class="principles-section__title"><span><?php the_field('principles_title') ?></span></div>
          <div class="principles-section__items">
            <?php foreach (get_field('principles_list') as $key => $item): ?>
            <div class="principles-section__item">
              <div class="principles-section__itemIcon">
                <img src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['title'] ?>" />
                <div class="principles-section__itemNumber"><?php echo $key + 1 ?></div>
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
            <button class="ui-button-primary principles-section__resultsOrder" data-modal="#feedback"><span>Заказать консультацию</span></button>
          </div>
        </div>
      </div>

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

      <?php if ($projects_large = get_field('projects_large')): ?>
      <div class="service-objects service-objects_secondary js-slider">
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
                <div class="service-objects__grid js-slider-wrapper">
                  <?php foreach ($projects_large as $item): $image = get_the_post_thumbnail_url($item->ID, 'full'); ?>
                  <div class="service-objects__cell js-slider-item">
                    <div class="service-objects__item" data-project="<?php echo $item->ID ?>">
                      <img class="service-objects__itemImage" src="<?php echo $image ?>" alt='' />
                      <span class="service-objects__itemMagnify">
                        <a href="<?php echo $image ?>" class="ui-magnify-button">
                          <span class="ui-magnify-button__arrow"></span>
                          <span class="ui-magnify-button__text">Увеличить</span>
                        </a>
                      </span>
                    </div>
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
            <a href="<?php the_permalink(39) ?>" class="ui-button-secondary service-objects__more">
              Больше работ
              <span class="ui-arrow-right service-objects__moreArrow"></span>
            </a>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php get_template_part('partials/section-scheme') ?>

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
