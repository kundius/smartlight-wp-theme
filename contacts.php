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
    <link rel="stylesheet" href="/wp-content/themes/smartlight/dist/contacts.css" type="text/css" />
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
                  <div class="contacts-content__left">
                    <div class="contacts-content__phone">
                      <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#phone-circle' /></svg>
                      +7 (495) 928-15-15
                    </div>
                  </div>
                  <div class="contacts-content__right">
                    <div class="contacts-content__phone">
                      +7 (977) 575-00-30
                    </div>
                  </div>
                  <div class="contacts-content__left">
                    <div class="contacts-content__email">
                      <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#email' /></svg>
                      <a href='mailto:info@s-lights.ru'>info@s-lights.ru</a>
                    </div>
                  </div>
                  <div class="contacts-content__right">
                    <div class="contacts-content__whatsapp">
                      <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#whatsapp' /></svg>
                      +7 (906) 764-76-91 <small>(WhatsApp)</small>
                    </div>
                  </div>
                </div>
                <hr class="contacts-content__separator" />
                <div class="contacts-content__schedules">
                  <div class="contacts-content__left">
                    <div class="contacts-content__schedule">
                      <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#time' /></svg>
                      Пн-пт 09:00 – 21:00
                    </div>
                  </div>
                  <div class="contacts-content__right">
                    <div class="contacts-content__schedule">
                      Суббота  09:00 – 19:00
                    </div>
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
                <form action='#' class="contacts-form">
                  <div class="contacts-form__description">Обязательно укажите телефон для связи</div>
                  <div class="contacts-form__fields">
                    <div class="contacts-form__row">
                      <input type='text' name='name' placeholder='Имя' class="contacts-form__input" />
                    </div>
                    <div class="contacts-form__row">
                      <input type='email' name='email' placeholder='E-mail' class="contacts-form__input" />
                    </div>
                    <div class="contacts-form__row">
                      <input type='tel' name='phone' placeholder='Телефон*' class="contacts-form__input" />
                    </div>
                    <div class="contacts-form__row">
                      <textarea name='message' placeholder='Текст сообщение' class="contacts-form__textarea"></textarea>
                    </div>
                    <div class="contacts-form__row contacts-form__row_rules">
                      <label class="rules-field">
                        <input type='checkbox' name='rules' value='1' class="rules-field__input" />
                        <span class="rules-field__checkbox"></span>
                        <span class="rules-field__text">
                          Прочитал(-а) <a href='#' target='_blank'>Пользовательское соглашение</a> и соглашаюсь с <a href='#' target='_blank'>Политикой обработки персональных данных</a>
                        </span>
                      </label>
                    </div>
                    <div class="contacts-form__rowSubmit">
                      <button class="ui-button-primary contacts-form__submit" type='submit'>
                        <span>
                          Отправить
                          <span class="ui-arrow-right contacts-form__submitArrow"></span>
                        </span>
                      </button>
                    </div>
                  </div>
                </form>
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
