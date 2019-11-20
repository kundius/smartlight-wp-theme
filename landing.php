<?php
/*
Template Name: Главная
*/
$actions = [[
  'date' => 'до 30 ноября 2019',
  'title' => 'При заказе от 50 м гирлянд',
  'description' => '2х-канальный пульт в подарок'
], [
  'date' => 'до 30 ноября 2019',
  'title' => 'При заказе от 50 м гирлянд 2',
  'description' => '2х-канальный пульт в подарок'
], [
  'date' => 'до 30 ноября 2019',
  'title' => 'При заказе от 50 м гирлянд 3',
  'description' => '2х-канальный пульт в подарок'
], [
  'date' => 'до 30 ноября 2019',
  'title' => 'При заказе от 50 м гирлянд 4',
  'description' => '2х-канальный пульт в подарок'
]];
$projects = [
  [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ], [
    'image' => 'https://via.placeholder.com/1000'
  ]
];
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head'); ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/main.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="main-intro__section">
        <div class="main-intro__header">
          <?php get_template_part('partials/header'); ?>
        </div>
        <div class="main-intro__container">
          <div class="main-intro__title">Новогодняя праздничная подсветка<br> Вашего дома</div>
          <div class="main-intro__description">под "ключ" в Москве и Московской области</div>
          <button class="main-intro__button">
            <span>Заказать расчет</span>
          </button>
        </div>
      </div>

      <div class="main-second-section">
        <div class="container">
          <div class="main-services">
            <div class="ui-grid">
              <div class="ui-width-1-2@m"></div>
              <div class="ui-width-1-2 ui-width-1-4@m">
                <div class="main-services__primary">
                  <a href="/" class="main-services-primary">
                    <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/cottage-lighting.jpg" alt="Освещение коттеджей" class="main-services-primary__image" />
                    <span class="main-services-primary__placeholder"></span>
                    <span class="main-services-primary__inner">
                      <span class="main-services-primary__icons">
                        <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/lamp.svg" alt='' />
                        <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/cottage-lighting.svg" alt='' />
                      </span>
                      <span class="main-services-primary__separator"></span>
                      <span class="main-services-primary__title">Освещение коттеджей</span>
                    </span>
                  </a>
                </div>
              </div>
              <div class="ui-width-1-2 ui-width-1-4@m">
                <div class="main-services__primary">
                  <a href="/" class="main-services-primary">
                    <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/office-lighting.jpg" alt="Освещение зданий и ТЦ" class="main-services-primary__image" />
                    <span class="main-services-primary__placeholder"></span>
                    <span class="main-services-primary__inner">
                      <span class="main-services-primary__icons">
                        <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/lamp.svg" alt='' />
                        <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/office-lighting.svg" alt='' />
                      </span>
                      <span class="main-services-primary__separator"></span>
                      <span class="main-services-primary__title">Освещение зданий и ТЦ</span>
                    </span>
                  </a>
                </div>
              </div>
              <div class="ui-width-1-4@m">
                <div class="ui-visible@m">
                  <div class="main-services-projects js-slider">
                    <div class="main-services-projects__items">
                      <div class="main-services-projects__slider js-slider-wrapper">
                        <a href="#" class="main-services-projects__item js-slider-item">
                          <span class="main-services-projects__image">
                            <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/office-lighting.jpg" alt="Полесье, 2018 название в 2 строки текст смещается" />
                          </span>
                          <span class="main-services-projects__magnify">
                            <span class="ui-magnify-button">
                              <span class="ui-magnify-button__arrow" ></span>
                              <span class="ui-magnify-button__text">Увеличить</span>
                            </span>
                          </span>
                          <span class="main-services-projects__info">
                            <span class="main-services-projects__title">Полесье, 2018 название в 2 строки текст смещается</span>
                            <span class="main-services-projects__description">Новогоднее освещение коттеджа и дворовой территории</span>
                          </span>
                        </a>
                        <a href="#" class="main-services-projects__item js-slider-item">
                          <span class="main-services-projects__image">
                            <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/cottage-lighting.jpg" alt="Полесье, 2018 название в 2 строки текст смещается" />
                          </span>
                          <span class="main-services-projects__magnify">
                            <span class="ui-magnify-button">
                              <span class="ui-magnify-button__arrow" ></span>
                              <span class="ui-magnify-button__text">Увеличить</span>
                            </span>
                          </span>
                          <span class="main-services-projects__info">
                            <span class="main-services-projects__title">Полесье, 2018 название в 2 строки текст смещается</span>
                            <span class="main-services-projects__description">Новогоднее освещение коттеджа и дворовой территории</span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <span class="main-services-projects__more">
                      <a href="#" class="ui-more-button">
                        <span class="ui-more-button__arrow"></span>
                        <span class="ui-more-button__text">Смотреть больше</span>
                      </a>
                    </span>
                    <div class="main-services-projects__nav">
                      <button class="main-services-projects__previous" data-slider-control="previous"></button>
                      <button class="main-services-projects__next" data-slider-control="next"></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ui-width-3-4@m">
                <div class="ui-grid">
                  <div class="ui-width-2-3@m">
                    <div class="main-actions-slider js-slider">
                      <div class="main-actions-slider__slider">
                        <div class="main-actions-slider__items js-slider-wrapper">
                          <?php foreach ($actions as $action): ?>
                            <a href="<?php echo $action['href'] ?>" class="main-actions-slider__item js-slider-item">
                              <span class="main-actions-slider__date"><?php echo $action['date'] ?></span>
                              <span class="main-actions-slider__title"><?php echo $action['title'] ?></span>
                              <span class="main-actions-slider__description"><?php echo $action['description'] ?></span>
                            </a>
                          <?php endforeach; ?>
                        </div>
                      </div>
                      <div class="main-actions-slider__dots">
                        <?php foreach ($actions as $key => $action): ?>
                          <button class="main-actions-slider__dot" data-slider-control="<?php echo $key ?>"></button>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                  <div class="ui-width-1-2 ui-width-1-3@m">
                    <a href="#" class="main-special-offer">
                      <span class="main-special-offer__text">Выезд для замера и оценки в день обращения</span>
                    </a>
                  </div>
                  <div class="ui-width-1-2 ui-width-1-3@m">
                    <a href="#" class="main-action">
                      <span class="main-action__inner">
                        <span class="main-action__date">до 28 октября 2019</span>
                        <span class="main-action__title">-30%</span>
                        <span class="main-action__description">на демонтаж</span>
                      </span>
                    </a>
                  </div>
                  <div class="ui-width-2-3@m">
                    <div class="main-h-service">
                      <a href="#" class="main-h-service__item">
                        <span class="main-h-service__image">
                          <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/street-lighting.jpg" alt="Уличное освещение" />
                        </span>
                        <span class="main-h-service__placeholder"></span>
                        <span class="main-h-service__title">
                          <span class="main-h-service__titleText">Уличное освещение</span>
                        </span>
                      </a>
                      <div class="main-h-service__moreWrap">
                        <span class="main-h-service__placeholder"></span>
                        <span class="main-h-service__moreButton">
                          <a href="#" class="ui-more-button">
                            <span class="ui-more-button__arrow"></span>
                            <span class="ui-more-button__text">Смотреть больше</span>
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="main-about">
            <div class="main-about__title">
              <span>
                SMART LIGHT -<br />
                архитектурное уличное освещение, быстрый монтаж 
              </span>
            </div>
            <div class="main-about__description">
              <p>Оперативный монтаж освещения на любых объектах: ЗАГОРОДНЫЕ ДОМА, УЛИЦЫ, АЛЛЕИ, ЗДАНИЯ, ТРК.</p>
              <ul>
                <li>Уникальные дизайн-проекты</li>
                <li>Широкий арсенал элементов освещения и другой иллюминации</li>
                <li>Постоянные скидки на монтаж и материалы</li>
              </ul>
            </div>
          </div>

          <div class="main-advantages">
            <div class="main-advantages__item">
              <div class="main-advantages__icon">
                <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/advantages-0.svg' alt='' />
                <div class="main-advantages__number">0</div>
              </div>
              <div class="main-advantages__title">
                Замер и оценка<br />
                в&nbsp;день обращения
              </div>
            </div>
            <div class="main-advantages__item">
              <div class="main-advantages__icon">
                <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/advantages-1.svg' alt=''X />
                <div class="main-advantages__number">1</div>
              </div>
              <div class="main-advantages__title">
                Монтаж за&nbsp;1&nbsp;день<sup>*</sup>
              </div>
            </div>
            <div class="main-advantages__item">
              <div class="main-advantages__icon">
                <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/advantages-2.svg' alt='' />
                <div class="main-advantages__number">2</div>
              </div>
              <div class="main-advantages__title">
                2 дизайн-концепции<br />
                освещения бесплатно
              </div>
            </div>
            <div class="main-advantages__item">
              <div class="main-advantages__icon">
                <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/advantages-3.svg' alt='' />
                <div class="main-advantages__number">3</div>
              </div>
              <div class="main-advantages__title">
                Гарантия<br />
                от&nbsp;1&nbsp;до&nbsp;3&nbsp;лет
              </div>
            </div>
            <div class="main-advantages__item">
              <div class="main-advantages__icon">
                <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/advantages-4.svg' alt='' />
                <div class="main-advantages__number">!</div>
              </div>
              <div class="main-advantages__title">
                Аккуратная работа<br />
                с&nbsp;объектом
              </div>
            </div>
          </div>

          <div class="main-projects js-main-projects">
            <div class="main-projects__headline">
              <div class="main-projects__title">Выполненные проекты</div>
              <div class="main-projects__filter">
                <button class="main-projects__filterItem _active">2017-`18</button>
              </div>
              <div class="main-projects__nav">
                <button class="main-projects__prev js-main-projects-prev"></button>
                <button class="main-projects__next js-main-projects-next"></button>
              </div>
            </div>
            <div class="main-projects__items">
              <?php foreach ($projects as $project): ?>
                <div class="main-projects__item js-main-projects-item">
                  <img class="main-projects__itemImage" src="<?php echo $project['image'] ?>" alt='' />
                  <span class="main-projects__itemMagnify">
                    <span class="ui-magnify-button">
                      <span class="ui-magnify-button__arrow"></span>
                    </span>
                  </span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </div>

      <div class="main-partners">
        <div class="container">
          <div class="main-partners__title"><span>Наши клиенты</span></div>
          <div class="main-partners__description">Нам доверяют:</div>
          <div class="main-partners__items">
            <div class="main-partners__item">
              <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/partner-1.png' alt='' />
            </div>
            <div class="main-partners__item">
              <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/partner-2.png' alt='' />
            </div>
            <div class="main-partners__item">
              <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/partner-3.png' alt='' />
            </div>
            <div class="main-partners__item">
              <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/partner-4.png' alt='' />
            </div>
            <div class="main-partners__item">
              <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/partner-5.png' alt='' />
            </div>
            <div class="main-partners__item">
              <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/partner-6.png' alt='' />
            </div>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/section-scheme'); ?>

      <div class="main-content">
        <div class="container">
          <h1>SMART LIGHT - архитектурное уличное освещение, (SEO-текст) (h1)</h1>
          <p class='paragraph_rightHand'>
            Оперативный монтаж освещения на любых объектах ЗАГОРОДНЫЕ ДОМА, УЛИЦЫ, АЛЛЕИ, ЗДАНИЯ, ТРК.<br />
            Уникальные дизайн-проекты.<br />
            Широкий арсенал элементов освещения и другой иллюминации.<br />
            Постоянные скидки на монтаж и материалы.
          </p>
          <h2>Новогодняя иллюминация (h2)</h2>
          <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/cottage-lighting.jpg' alt='' width='20%' class='image_leftHand' />
          <p>Используя P2P технологию, <a href='#'>Биткойн</a> (link) Если Вы хотите, чтобы предстоящий Новый год и Рождественские праздники запомнились надолго, яркие иллюминации от «SmartLight» - это именно то, что Вам нужно! Биткойн (hover link)</p>
          <h3>Установка новогоднего освещения ПОД КЛЮЧ (h3)</h3>
          <p>Новогодняя иллюминация фасада частного дома, ресторана, кафе или гостиницы – наиболее распространенный и простой метод придания праздничного вида сооружению.</p>
          <p>Профессиональная новогодняя подсветка дома начинается еще изнутри путем размещения на окнах ярких мерцающих или постоянно светящихся гирлянд (особенно хорошо, если они имеют несколько режимов работы).</p>
          <p>Они способны определять атмосферу как внутри комнаты, так и преображать фасад здания возможность (visited link) подсветка.</p>
        </div>
      </div>

      <?php get_template_part('partials/section-contacts'); ?>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
