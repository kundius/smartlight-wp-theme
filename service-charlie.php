<?php
/*
Template Name: Шаблон услуги [3]
*/
wp_enqueue_script('theme_serviceMesozoic', get_template_directory_uri() . '/dist/serviceMesozoic.js', ['theme_common'], false, true);
wp_enqueue_script('theme_serviceCharlie', get_template_directory_uri() . '/dist/serviceCharlie.js', ['theme_common'], false, true);

global $post;
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/serviceMesozoic.css" type="text/css" />
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/serviceCharlie.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
      <div class="service-charlie-section" style="background-image: url(<?php echo get_field('background')['url'] ?>)">
        <?php get_template_part('partials/header') ?>

        <div class="sticky-action js-sticky-action">
          <div class="sticky-action__inner">
            <button class="sticky-action__close js-sticky-action-close"></button>
            <div class="sticky-action__discount">-25<span>%</span></div>
            <div class="sticky-action__date">только сегодня</div>
            <div class="sticky-action__title">На новогоднее освещение</div>
            <div class="sticky-action__description">Оставьте заявку или позвоните по тел: +7( 495) 928-15-15, скажите "по акции"</div>
          </div>
        </div>

        <div class="container">

          <div class="charlie-intro">
            <div class="charlie-intro__title">
              <?php the_field('intro_title') ?>
              <small><?php the_field('intro_description') ?></small>
            </div>
            <?php if ($advantages = get_field('intro_advantages')): ?>
            <ul class="charlie-intro__advantages">
              <?php foreach ($advantages as $item): ?>
              <li><?php echo $item['text'] ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
			
          <?php echo do_shortcode('[contact-form-7 id="1090" title="Готовимся к Новому году"]') ?>

          <div class="charlie-about">
            <div class="charlie-about__left">
              <div class="charlie-about__title"><?php the_field('about_title') ?></div>
              <?php if ($banner = get_field('about_banner')): ?>
              <div class="charlie-about__banner">
                <div class="charlie-about__bannerDate"><?php echo $banner['date'] ?></div>
                <div class="charlie-about__bannerTitle"><?php echo $banner['title'] ?></div>
                <div class="charlie-about__bannerDesc"><?php echo $banner['description'] ?></div>
              </div>
              <?php endif; ?>
            </div>
            <div class="charlie-about__right">
              <div class="charlie-about__content">
                <?php the_field('about_description') ?>
              </div>
            </div>
          </div>

        </div>

        <?php get_template_part('partials/section-quiz') ?>

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
                          <img src="<?php echo $item['image']['url'] ?>" alt='' />
                        </div>
                        <div class="mesozoic-types__itemTitle"><?php echo $item['title'] ?></div>
                        <div class="mesozoic-types__itemDescription"><?php echo $item['description'] ?></div>
                        <button class="ui-button-more mesozoic-types__itemMore" data-modal="#modal-type-<?php echo $key ?>">
                          <span class="ui-button-more__arrow"></span>
                          Читать больше
                        </button>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="mesozoic-types__cell">
                      <div class="mesozoic-types__figures">
                        <div class="mesozoic-types__figuresImage">
                          <img src="<?php echo $item['image']['url'] ?>" alt='' />
                        </div>
                        <div class="mesozoic-types__figuresInner">
                          <div class="mesozoic-types__figuresTitle"><?php echo $item['title'] ?></div>
                          <div class="mesozoic-types__figuresDescription"><?php echo $item['description'] ?></div>
                          <button class="ui-button-more mesozoic-types__figuresMore" data-modal="#modal-type-<?php echo $key ?>">
                            <span class="ui-button-more__arrow"></span>
                            Читать больше
                          </button>
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

      </div>

      <div class="mesozoic-videos">
        <div class="container">
          <div class="video-gallery">
            <?php foreach (get_field('videos_list') as $item): ?>
            <div class="video-gallery__item">
              <div class="video-gallery__title ui-hidden@s"><?php echo $item['title'] ?></div>
              <div class="video-gallery__video ui-hidden@s"><?php echo $item['video'] ?></div>
              <div class="video-gallery__description ui-hidden@s"><?php echo $item['description'] ?></div>

              <div class="video-gallery__info ui-visible@s">
                <div class="video-gallery__title"><?php echo $item['title'] ?></div>
                <div class="video-gallery__description"><?php echo $item['description'] ?></div>
              </div>
              <div class="video-gallery__video ui-visible@s"><?php echo $item['video'] ?></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <?php if ($portfolio_list = get_field('portfolio_list')): ?>
      <div class="service-objects service-objects_primary" data-slider>
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
                  <?php foreach ($portfolio_list as $item): $image = get_the_post_thumbnail_url($item->ID, 'full'); ?>
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

      <div class="mesozoic-arsenal" data-slider>
        <div class="container">
          <div class="mesozoic-arsenal__wrapper">
            <div class="mesozoic-arsenal__title"><?php the_field('ng_arsenal_title', 'option') ?></div>
            <div class="mesozoic-arsenal__slider">
              <button class="ui-slider-nav mesozoic-arsenal__sliderPrev" data-slider-control="previous">
                <span class="ui-arrow-left"></span>
              </button>
              <button class="ui-slider-nav mesozoic-arsenal__sliderNext" data-slider-control="next">
                <span class="ui-arrow-right"></span>
              </button>
              <div class="mesozoic-arsenal__sliderItems">
                <div class="mesozoic-arsenal__grid" data-slider-wrapper>

                  <?php foreach (get_field('ng_arsenal_list', 'option') as $item): ?>
                  <div class="mesozoic-arsenal__cell" data-slider-item>
                    <div class="mesozoic-arsenal-item">
                      <div class="mesozoic-arsenal-item__box js-cube">
                        <div class="mesozoic-arsenal-item__front js-cube-front">
                          <img class="mesozoic-arsenal-item__image" src="<?php echo $item['image']['url'] ?>" alt='' />
                          <div class="mesozoic-arsenal-item__info">
                            <div class="mesozoic-arsenal-item__infoTitle"><?php echo $item['title'] ?></div>
                            <div class="mesozoic-arsenal-item__infoPrice">Цена “под ключ”</div>
                          </div>
                          <div class="mesozoic-arsenal-item__price"><?php echo $item['price'] ?></div>
                        </div>
                        <div class="mesozoic-arsenal-item__back js-cube-back">
                          <div class="mesozoic-arsenal-item__inner">
                            <div class="mesozoic-arsenal-item__title"><?php echo $item['title'] ?></div>
                            <div class="mesozoic-arsenal-item__thumb">
                              <img src="<?php echo $item['icon']['url'] ?>" alt='' />
                            </div>
                            <div class="mesozoic-arsenal-item__description"><?php echo $item['description'] ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>

                </div>
              </div>
            </div>
            <div class="mesozoic-arsenal__content">
              <div class="mesozoic-arsenal__contentLeft">
                <?php the_field('ng_arsenal_content_left', 'option') ?>
              </div>
              <div class="mesozoic-arsenal__contentRight">
                <?php the_field('ng_arsenal_content_right', 'option') ?>
                <button class="ui-button-primary mesozoic-arsenal__contentButton" data-modal="#feedback"><span>Заказать консультацию</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>

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
