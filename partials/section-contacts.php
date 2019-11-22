<div class="section-contacts">
  <div class="container">
    <div class="section-contacts__grid">
      <div class="section-contacts__contacts">
        <div class="block-contacts">
          <div class="block-contacts__title">Контакты</div>
          <div class="block-contacts__address">101000, Москва,<br /> ул. Покровка, д. 1/13/6, стр. 2, эт. 3, пом. 1, комн. 1, офис 2к.</div>
          <hr class="block-contacts__separator" />
          <div class="block-contacts__contacts">
            <div class="block-contacts__left">
              <div class="block-contacts__phone">
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#phone-circle' /></svg>
                +7 (495) 928-15-15
              </div>
            </div>
            <div class="block-contacts__right">
              <div class="block-contacts__phone">
                +7 (977) 575-00-30
              </div>
            </div>
            <div class="block-contacts__left">
              <div class="block-contacts__email">
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#email' /></svg>
                <a href='mailto:info@s-lights.ru'>info@s-lights.ru</a>
              </div>
            </div>
            <div class="block-contacts__right">
              <div class="block-contacts__whatsapp">
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#whatsapp' /></svg>
                +7 (906) 764-76-91 <small>(WhatsApp)</small>
              </div>
            </div>
          </div>
          <hr class="block-contacts__separator" />
          <div class="block-contacts__schedules">
            <div class="block-contacts__left">
              <div class="block-contacts__schedule">
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#time' /></svg>
                Пн-пт 09:00 – 21:00
              </div>
            </div>
            <div class="block-contacts__right">
              <div class="block-contacts__schedule">
                Суббота  09:00 – 19:00
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-contacts__feedback">
        <form action="/wp-json/contact-form-7/v1/contact-forms/5/feedback" method="post" class="block-feedback js-form">
          <div class="block-feedback__success">
            Ваше сообщение<br /> успешно отправлено!
          </div>
          <div class="block-feedback__formFields">
            <input type='text' name='your-name' placeholder='Имя' class="block-feedback__input" />
            <input type='email' name='your-email' placeholder='E-mail' class="block-feedback__input" />
            <span class="wpcf7-form-control-wrap your-phone">
              <input type='tel' name='your-phone' placeholder='Телефон*' class="block-feedback__input" />
            </span>
          </div>
          <div class="block-feedback__formMessage">
            <textarea name='your-message' placeholder='Текст сообщение' class="block-feedback__textarea"></textarea>
          </div>
          <div class="block-feedback__formSubmit">
            <input type="hidden" name="referrer" value="<?php the_title() ?>">
            <span class="wpcf7-form-control-wrap submit">
              <button class="ui-button-primary block-feedback__submit" type='submit'>
                <span>
                  Отправить
                  <span class="ui-arrow-right block-feedback__submitArrow"></span>
                </span>
              </button>
            </span>
          </div>
          <div class="block-feedback__formRules">
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
    </div>
  </div>
</div>
