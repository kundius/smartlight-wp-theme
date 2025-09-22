<?php
/*
Template Name: Контакты
*/
wp_enqueue_script('theme_contacts', get_template_directory_uri() . '/dist/contacts.js', ['theme_common'], false, true);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php get_template_part('partials/head') ?>
    <link rel="stylesheet" href="/wp-content/themes/smartlight-wp-theme/dist/contacts.css" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="contacts-section">
        <?php get_template_part('partials/header') ?>
        <div class="container">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display() ?>
          </div>
          <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
          <h1 class="ui-headline"><?php the_title() ?></h1>
          <div class="contacts-grid">
            <div class="contacts-grid__contacts">
              <div class="contacts-content">
                <div class="contacts-content__headline">
                  <div class="contacts-content__headlineTitle">Офис</div>
                  <div class="contacts-content__headlineDescription">
                    Приезжайте, будем рады видеть вас в&nbsp;офисе.
                  </div>
                </div>
                <div class="contacts-content__address">101000, Москва, ул. Покровка, д. 1/13/6, стр. 2, эт. 3, пом. 1, комн. 1, офис 2к.</div>
                <hr class="contacts-content__separator" />
                <div class="contacts-content__contacts">
                  <div class="contacts-content__phone">
                    <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#phone-circle' /></svg>
                    +7&nbsp;(919)&nbsp;960-93-43<br>
                    +7&nbsp;(495)&nbsp;928-15-15
                  </div>
                  <div class="contacts-content__email">
                    <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#email' /></svg>
                    <a href='mailto:infi5@mail.ru'>infi5@mail.ru</a>
                  </div>
                </div>
                <hr class="contacts-content__separator" />
                <div class="contacts-content__schedules">
                  <div class="contacts-content__schedule">
                    <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#time' /></svg>
                    Пн-пт 09:00 – 21:00<br>
                    Суббота  09:00 – 19:00
                  </div>
                </div>
                <div class="contacts-content__map">
                  <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A04aa5500e8ec675160eb622b570eadb34d9a751ec1518f14c644c2b9369c0d29&amp;source=constructor" width="100%" height="240" frameborder="0"></iframe>
                </div>
              </div>
            </div>
            <div class="contacts-grid__feedback">
              <div class="contacts-feedback">
                <div class="contacts-feedback__headline">
                  <div class="contacts-feedback__headlineTitle">Обратная связь</div>
                  <div class="contacts-feedback__headlineDescription">
                    Возникли вопросы или сложности? Напишите&nbsp;нам.
                  </div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="5" title="Обратная связь"]') ?>
              </div>
            </div>
          </div>
          <?php endwhile; else: ?>
              <p>Извините, ничего не найдено.</p>
          <?php endif; ?>
        </div>
      </div>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
