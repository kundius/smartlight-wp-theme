<?php

$menu = [
  [
    'key' => 'about',
    'title' => 'О компании',
    'href' => '/about',
    'icon' => 'menu-about'
  ], [
    'key' => 'lighting',
    'title' => 'Освещение',
    'href' => '/',
    'icon' => 'menu-lighting',
    'children' => [[
      'key' => 'lighting-new-year',
      'title' => 'Новогоднее Освещение',
      'href' => '/osveshchenie/novogodnee-osveshchenie',
      'icon' => 'lighting-new-year'
    ], [
      'key' => 'lighting-architectural',
      'title' => 'Архитектурное Освещение',
      'href' => '/',
      'icon' => 'lighting-architectural'
    ], [
      'key' => 'lighting-street',
      'title' => 'Уличное Освещение',
      'href' => '/',
      'icon' => 'lighting-street'
    ]]
  ], [
    'key' => 'works',
    'title' => 'Наши работы',
    'href' => '/projects',
    'icon' => 'menu-works'
  ], [
    'key' => 'prices',
    'title' => 'Цены',
    'href' => '/prices',
    'icon' => 'menu-prices'
  ], [
    'key' => 'stocks',
    'title' => 'Акции',
    'href' => '/',
    'icon' => 'menu-stocks'
  ], [
    'key' => 'articles',
    'title' => 'Статьи',
    'href' => '/articles',
    'icon' => 'menu-articles'
  ], [
    'key' => 'contacts',
    'title' => 'Контакты',
    'href' => '/contacts',
    'icon' => 'menu-contacts'
  ]
];

function fn($array, $parent, $previous) {
  $new = [];
  foreach ($array as $row) {
    if (!empty($row['children'])) {
      $new = array_merge($new, fn($row['children'], $row['key'], $parent));
    }
    if (!$new[$parent]) {
      $new[$parent] = [
        'items' => [],
        'previous' => $previous
      ];
    }
    $new[$parent]['items'][] = array_merge($row, ['hasChildren' => !empty($row['children'])]);
  };
  return $new;
};
$flatMenu = fn($menu, 'root', null);
?>
<div class="header js-header">
  <div class="header__inner">
      <div class="header__drawer js-drawer">
        <?php foreach ($flatMenu as $parent => $row): ?>
        <div class="header-drawer<?php if ($parent == 'root'): ?> header-drawer_opened<?php endif; ?><?php if ($parent != 'root'): ?> header-drawer_deep<?php endif; ?>" data-parent="<?php echo $parent ?>">
          <div class="header-drawer__list">
            <?php if ($parent != 'root'): ?>
            <div class="header-drawer__listItem">
              <a class="header-drawer__link" data-next="<?php echo $row['previous'] ?>">
                <span class="header-drawer__linkIcon">
                  <button class="header-drawer__arrowPrevious"></button>
                </span>
                <span class="header-drawer__linkTitle">Назад</span>
              </a>
              <span class="header-drawer__listItemArrow"></span>
            </div>
            <?php endif; ?>
            <?php foreach ($row['items'] as $item): ?>
            <div class="header-drawer__listItem">
              <a href="<?php echo $item['href'] ?>" class="header-drawer__link">
                <span class="header-drawer__linkIcon">
                  <svg role='img'>
                    <use href="<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#<?php echo $item['icon'] ?>" />
                  </svg>
                </span>
                <span class="header-drawer__linkTitle"><?php echo $item['title'] ?></span>
              </a>
              <span class="header-drawer__listItemArrow">
                <?php if ($item['hasChildren']): ?>
                  <button class="header-drawer__arrowNext" data-next="<?php echo $item['key'] ?>"></button>
                <?php endif; ?>
              </span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <button class="header__toggle js-drawer-toggle">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <a href='/' class="header__logo">
        <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/logo.svg" />
      </a>

      <div class="header__phone">+7 (495) 928-15-15</div>

      <div class="header__menu">
        <ul class="header-menu__list">
          <li class="header-menu__item">
            <a href='/osveshchenie/novogodnee-osveshchenie' class="header-menu__link">Новогоднее освещение</a>
            <ul class="header-menu__list">
              <li class="header-menu__item">
                <a href='/osveshchenie/novogodnee-osveshchenie/houses' class="header-menu__link">Освещение домов, таунхаусов, коттеджей</a>
              </li>
              <li class="header-menu__item">
                <a href='/osveshchenie/novogodnee-osveshchenie/buildings' class="header-menu__link">Новогоднее освещение зданий, торговых центров, жилых комплексов, павильонов</a>
              </li>
            </ul>
          </li>
          <li class="header-menu__item">
            <a href='/' class="header-menu__link">Архитектурное освещение</a>
          </li>
          <li class="header-menu__item">
            <a href='/osveshchenie/osveshchenie-uchastka' class="header-menu__link">Уличное освещение</a>
          </li>
        </ul>
      </div>

      <button class="header__callback">
        <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#phone' /></svg>
      </button>

      <button class="header__feedback">
        <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#email' /></svg>
      </button>
      
      <div class="header__email">info@s-lights.ru</div>

      <div class="header__share">
        <!-- <FacebookShareButton url={location}>
            <FacebookIcon size={32} round={true} />
        </FacebookShareButton>
        <TwitterShareButton url={location}>
            <TwitterIcon size={32} round={true} />
        </TwitterShareButton>
        <PinterestShareButton url={location} media={'#'}>
            <PinterestIcon size={32} round={true} />
        </PinterestShareButton>
        <VKShareButton url={location}>
            <VKIcon size={32} round={true} />
        </VKShareButton>
        <OKShareButton url={location}>
            <OKIcon size={32} round={true} />
        </OKShareButton> -->
      </div>

      <button class="header__scrollup js-scroll"><span></span></button>

      <div class="header__sitemap">
        <svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#sitemap' /></svg>
      </div>
  </div>
</div>
<div class="header__placeholder"></div>
