<?php
/*
Template Name: Шаблон услуги [2]
*/
wp_enqueue_script('theme_serviceMesozoic', get_template_directory_uri() . '/dist/serviceMesozoic.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/serviceMesozoic.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
      <div class="service-mesozoic-section" style="background-image: url(<?php echo get_field('background')['url'] ?>)">
        <?php get_template_part('partials/header') ?>
        
        <div class="container">

          <div class="mesozoic-intro">
            <div class="mesozoic-intro__title">
              <?php the_field('intro_title') ?>
              <small><?php the_field('intro_description') ?></small>
            </div>
            <button class="mesozoic-intro__button" data-modal="#feedback"><span>Заказать консультацию</span></button>
            <?php if ($advantages = get_field('intro_advantages')): ?>
            <ul class="mesozoic-intro__advantages">
              <?php foreach ($advantages as $item): ?>
              <li><?php echo $item['text'] ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>

          <div class="mesozoic-categories">
            <a href="<?php the_permalink(341) ?>" class="mesozoic-categories__category">
              <span class="mesozoic-categories__categoryInner">
                <span class="mesozoic-categories__categoryIcons">
                  <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/lamp.svg' alt='' />
                  <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/cottage-lighting.svg" alt='' />
                </span>
                <span class="mesozoic-categories__categorySeparator"></span>
                <span class="mesozoic-categories__categoryTitle">Освещение коттеджей,<br />домов</span>
              </span>
              <span class="mesozoic-categories__categoryImage">
                <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/cottage-lighting.jpg" alt="Освещение коттеджей, домов" />
              </span>
            </a>
            <a href="<?php the_permalink(287) ?>" class="mesozoic-categories__category">
              <span class="mesozoic-categories__categoryInner">
                <span class="mesozoic-categories__categoryIcons">
                  <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/lamp.svg' alt='' />
                  <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/office-lighting.svg" alt='' />
                </span>
                <span class="mesozoic-categories__categorySeparator"></span>
                <span class="mesozoic-categories__categoryTitle">Освещение зданий, ЖК,<br />торговых центров и пр</span>
              </span>
              <span class="mesozoic-categories__categoryImage">
                <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/office-lighting.jpg" alt="Освещение зданий, ЖК, торговых центров и пр" />
              </span>
            </a>
          </div> 
        
          <div class="mesozoic-about">
            <div class="mesozoic-about__title"><span><?php the_field('about_title') ?></span></div>
            <div class="mesozoic-about__description"><?php the_field('about_description') ?></div>
            <div class="mesozoic-about__items">
              <?php foreach (get_field('about_list') as $key => $item): ?>
              <div class="mesozoic-about__item">
                <div class="mesozoic-about__itemIcon">
                  <img src='<?php echo $item['image']['url'] ?>' alt='' />
                  <div class="mesozoic-about__itemNumber"><?php echo $key ?></div>
                </div>
                <div class="mesozoic-about__itemTitle">
                  <?php echo $item['title'] ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="mesozoic-about__annotation"><?php the_field('about_annotation') ?></div>
          </div>

        </div>

        <div class="mesozoic-types mesozoic-types_primary">
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
                        <img src="<?php echo $item['image']['sizes']['w500h400'] ?>" alt='' />
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
                  <div class="modal" id="modal-type-<?php echo $key ?>">
                    <button class="modal__close" data-modal-close></button>
                    окно
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      
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

      <div class="mesozoic-arsenal js-slider">
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
                <div class="mesozoic-arsenal__grid js-slider-wrapper">

                  <?php foreach (get_field('ng_arsenal_list', 'option') as $item): ?>
                  <div class="mesozoic-arsenal__cell js-slider-item">
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

      <?php if ($portfolio_list = get_field('portfolio_list')): ?>
      <div class="service-objects service-objects_primary js-slider">
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
                  <?php foreach ($portfolio_list as $item): $image = get_the_post_thumbnail_url($item->ID, 'full'); ?>
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
