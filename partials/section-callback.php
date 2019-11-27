<div class="section-callback">
  <div class="container">
    <div class="s-callback-wall">
      <div class="s-callback-wall__title">Заказать Обратный&nbsp;звонок</div>
      <div class="s-callback-wall__description">Заполните форму, и наш специалист свяжется с Вами в течение 15 минут</div>
      <form action="/wp-json/contact-form-7/v1/contact-forms/370/feedback" method="post" class="s-callback-form js-form">
        <div class="s-callback-form__success">
          Ваше сообщение успешно отправлено!
        </div>
        <div class="s-callback-form__rowField">
          <input type='text' name='your-name' placeholder='Имя' class="s-callback-form__input" />
        </div>
        <div class="s-callback-form__rowField">
          <span class="wpcf7-form-control-wrap your-phone">
            <input type='tel' name='your-phone' placeholder='Телефон*' class="s-callback-form__input" />
          </span>
        </div>
        <div class="s-callback-form__rowSubmit">
          <input type="hidden" name="referrer" value="<?php the_title() ?>">
          <input type="hidden" name="form" value="Форма внизу страницы">
          <span class="wpcf7-form-control-wrap submit">
            <button class="ui-button-primary s-callback-form__submit" type='submit'>
              <span>
                Отправить
                <span class="ui-arrow-right s-callback-form__submitArrow"></span>
              </span>
            </button>
          </span>
        </div>
        <div class="s-callback-form__rowRules">
          <label class="rules-field">
            <input type='checkbox' name='rules' value='1' class="rules-field__input" />
            <span class="rules-field__checkbox"></span>
            <span class="rules-field__text">
              Прочитал(-а) <a href='<?php the_permalink(360) ?>' target='_blank'>Пользовательское соглашение</a> и соглашаюсь с <a href='<?php the_permalink(3) ?>' target='_blank'>Политикой обработки персональных данных</a>
            </span>
          </label>
        </div>
      </form>
    </div>

    <div class="s-callback-contacts">
      <div class="s-callback-contacts__title">Контакты</div>
      <div class="s-callback-contacts__grid">
        <div class="s-callback-contacts__address">101000, Москва, ул. Покровка, д. 1/13/6, стр. 2, эт. 3, пом. 1, комн. 1, офис 2к.</div>
        <div class="s-callback-contacts__contacts">
          <div class="s-callback-contacts__contactsLeft">
            <div class="s-callback-contacts__phone">
              <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#phone-circle' /></svg>
              +7 (495) 928-15-15
            </div>
          </div>
          <div class="s-callback-contacts__contactsRight">
            <div class="s-callback-contacts__phone">
              +7 (977) 575-00-30
            </div>
          </div>
          <div class="s-callback-contacts__contactsLeft">
            <div class="s-callback-contacts__email">
              <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#email' /></svg>
              <a href='mailto:info@s-lights.ru'>info@s-lights.ru</a>
            </div>
          </div>
          <div class="s-callback-contacts__contactsRight">
            <div class="s-callback-contacts__whatsapp">
              <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#whatsapp' /></svg>
              +7 (906) 764-76-91 <small>(WhatsApp)</small>
            </div>
          </div>
        </div>
        <div class="s-callback-contacts__schedules">
          <div class="s-callback-contacts__schedulesLeft">
            <div class="s-callback-contacts__schedule">
              <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#time' /></svg>
              Пн-пт 09:00 – 21:00
            </div>
          </div>
          <div class="s-callback-contacts__schedulesRight">
            <div class="s-callback-contacts__schedule">
              Суббота  09:00 – 19:00
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
