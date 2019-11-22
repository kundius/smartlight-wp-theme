<div class="footer__first">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__information">
        <div class="footer-information">
          <div class="footer-information__info">
            <div class="footer-information__infoLogo">
              <a href='/'><img src="<?php echo get_bloginfo('template_url') ?>/dist/img/logo.svg" /></a>
            </div>
            <div class="footer-information__infoContent">
              <div class="footer-information__infoName">
                SmartLight
              </div>
              <div class="footer-information__infoDescription">
                Освещение дома. Москва
              </div>
            </div>
          </div>
          <div class="footer-information__social">
            <div class="footer-information__socialItems">
              <a class="footer-information__socialsItem footer-information__socialsItem_vk" href='#'>
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#vk' /></svg>
              </a>
              <a class="footer-information__socialsItem footer-information__socialsItem_instagram" href='#'>
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#instagram' /></svg>
              </a>
              <a class="footer-information__socialsItem footer-information__socialsItem_ok" href='#'>
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#ok' /></svg>
              </a>
              <a class="footer-information__socialsItem footer-information__socialsItem_youtube" href='#'>
                <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#youtube' /></svg>
              </a>
            </div>
            <a class="footer-information__socialSitemap" href='#'>Карта сайта</a>
          </div>
        </div>
      </div>
      <div class="footer__services">
        <div class="footer-services">
          <div class="footer-services__group">
            <div class="footer-services__groupTitle">Освещение</div>
            <ul class="footer-services__menu">
              <li>
                <a href='#'><i></i><span>Коттеджей</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Домов</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Зданий</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Торговых центров</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Жилых комплексов</span></a>
              </li>
            </ul>
          </div>
          <div class="footer-services__group">
            <div class="footer-services__groupTitle">Подсветка</div>
            <ul class="footer-services__menu">
              <li>
                <a href='#'><i></i><span>Архитектурная</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Фасадов зданий</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Прочих объектов</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Ворота</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Входные группы</span></a>
              </li>
            </ul>
          </div>
          <div class="footer-services__group">
            <div class="footer-services__groupTitle">Уличное</div>
            <ul class="footer-services__menu">
              <li>
                <a href='#'><i></i><span>Территории</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Аллеи и парки</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Сады, деревья</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Заборы</span></a>
              </li>
              <li>
                <a href='#'><i></i><span>Детские площадки</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer__second">
  <div class="container">
    <div class="footer-minor">
      <div class="footer-minor__copyright">
        © 2006-2019, Все права защищены
      </div>
      <div class="footer-minor__rules">
        <a href="<?php the_permalink(360) ?>">Пользовательское соглашение</a>
      </div>
      <div class="footer-minor__policy">
        <a href="<?php the_permalink(3) ?>">Политика конфиденциальности и обработки персональных данных</a>
      </div>
      <div class="footer-minor__couters">
        <?php the_field('counters', 'option') ?>
      </div>
      <div class="footer-minor__creator">
        <a href='http://domenart-studio.ru/' target='_blank'>
          <img src='<?php echo get_bloginfo('template_url') ?>/dist/img/creator.png' alt='' />
        </a>
      </div>
    </div>
  </div>
</div>

<?php wp_footer() ?>
