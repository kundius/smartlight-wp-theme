<?php

// $menu = [
// 	[
// 		'key' => 'about',
// 		'title' => 'О компании',
// 		'href' => get_the_permalink(7),
// 		'icon' => 'menu-about'
// 	], [
// 		'key' => 'lighting',
// 		'title' => 'Освещение',
// 		'href' => get_the_permalink(85),
// 		'icon' => 'menu-lighting',
// 		'children' => [[
// 			'key' => 'lighting-new-year',
// 			'title' => 'Новогоднее Освещение',
// 			'href' => get_the_permalink(214),
// 			'icon' => 'novogodnee-osveshhenie',
// 			'children' => [
// 				[
// 					'key' => 'lighting-new-year',
// 					'title' => 'Новогоднее освещение домов',
// 					'href' => get_the_permalink(341),
// 					'icon' => 'novogodnee-osveshhenie'
// 				], [
// 					'key' => 'lighting-new-year',
// 					'title' => 'Новогоднее освещение зданий',
// 					'href' => get_the_permalink(287),
// 					'icon' => 'novogodnee-osveshhenie'
// 				]
// 			]
// 		], [
// 			'key' => 'lighting-architectural',
// 			'title' => 'Архитектурное Освещение',
// 			'href' => get_the_permalink(160),
// 			'icon' => 'arhitekturnoe-osveshhenie'
// 		], [
// 			'key' => 'lighting-street',
// 			'title' => 'Уличное Освещение',
// 			'href' => get_the_permalink(87),
// 			'icon' => 'ulichnoe-osveshhenie'
// 		]]
// 	], [
// 		'key' => 'works',
// 		'title' => 'Наши работы',
// 		'href' => get_term_link(14, 'project_category'),
// 		'icon' => 'menu-works'
// 	], [
// 		'key' => 'vizualizacii',
// 		'title' => 'Визуализации',
// 		'href' => get_the_permalink(962),
// 		'icon' => 'menu-works'
// 	], [
// 		'key' => 'prices',
// 		'title' => 'Цены',
// 		'href' => get_the_permalink(11),
// 		'icon' => 'menu-prices'
// 	], [
// 		'key' => 'stocks',
// 		'title' => 'Акции',
// 		'href' => get_term_link(4, 'category'),
// 		'icon' => 'menu-stocks'
// 	], [
// 		'key' => 'articles',
// 		'title' => 'Статьи',
// 		'href' => get_term_link(15, 'category'),
// 		'icon' => 'menu-articles'
// 	], [
// 		'key' => 'contacts',
// 		'title' => 'Контакты',
// 		'href' => get_the_permalink(9),
// 		'icon' => 'menu-contacts'
// 	]
// ];
$menu = [
	[
		'key' => 'about',
		'title' => 'О компании',
		'href' => get_the_permalink(7),
		'icon' => 'menu-about'
	], [
		'key' => 'lighting',
		'title' => 'Освещение',
		'href' => get_the_permalink(85),
		'icon' => 'menu-lighting',
		'children' => [[
			'key' => 'lighting-new-year',
			'title' => 'Праздничное Освещение',
			'href' => get_the_permalink(214),
			'icon' => 'novogodnee-osveshhenie',
		],
					   [
						   'key' => 'lighting-new-year',
						   'title' => 'Новогоднее освещение домов',
						   'href' => get_the_permalink(341),
						   'icon' => 'novogodnee-osveshhenie'
					   ], [
						   'key' => 'lighting-new-year',
						   'title' => 'Новогоднее освещение зданий',
						   'href' => get_the_permalink(287),
						   'icon' => 'novogodnee-osveshhenie'
					   ], [
						   'key' => 'lighting-architectural',
						   'title' => 'Архитектурное Освещение',
						   'href' => get_the_permalink(160),
						   'icon' => 'arhitekturnoe-osveshhenie'
					   ], [
						   'key' => 'lighting-street',
						   'title' => 'Уличное Освещение',
						   'href' => get_the_permalink(87),
						   'icon' => 'ulichnoe-osveshhenie'
					   ]]
	], [
		'key' => 'works',
		'title' => 'Наши работы',
		'href' => get_term_link(14, 'project_category'),
		'icon' => 'menu-works'
	], [
		'key' => 'vizualizacii',
		'title' => 'Визуализации',
		'href' => get_the_permalink(962),
		'icon' => 'menu-works'
	], [
		'key' => 'prices',
		'title' => 'Цены',
		'href' => get_the_permalink(11),
		'icon' => 'menu-prices'
	], [
		'key' => 'stocks',
		'title' => 'Акции',
		'href' => get_term_link(4, 'category'),
		'icon' => 'menu-stocks'
	], [
		'key' => 'articles',
		'title' => 'Статьи',
		'href' => get_term_link(15, 'category'),
		'icon' => 'menu-articles'
	], [
		'key' => 'contacts',
		'title' => 'Контакты',
		'href' => get_the_permalink(9),
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

		<a href="tel:+7 (919) 960-93-43" class="header__phone">+7 (919) 960-93-43</a>

		<?php wp_nav_menu([
	'container_class' => 'header__menu',
	'menu_class' => 'header-menu__list',
	'theme_location' => 'headermenu'
]) ?>

		<a href="whatsapp://send?text=Hello&phone=+79199609343" class="header__whatsapp">
			<svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#whatsapp' /></svg>
		</a>

		<button class="header__callback js-call-or-modal" data-modal-form="Кнопка в шапке" data-target="#callback" data-tel="+7 (919) 960-93-43">
			<svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#phone' /></svg>
		</button>

		<button class="header__feedback" data-modal-form="Кнопка в шапке" data-modal="#feedback">
			<svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#email' /></svg>
		</button>

		<div class="header__email">info@s-lights.ru</div>

		<div class="header__share share-btn">
			<a class="header__shareButton" data-id="fb">
				<?php icon('fb', .8) ?>
			</a>
			<a class="header__shareButton" data-id="tw">
				<?php icon('tw', .8) ?>
			</a>
			<a class="header__shareButton" data-id="pi">
				<?php icon('pi', .8) ?>
			</a>
			<a class="header__shareButton" data-id="vk">
				<?php icon('vk2', .8) ?>
			</a>
			<a class="header__shareButton" data-id="ok">
				<?php icon('ok2', .8) ?>
			</a>
		</div>

		<button class="header__scrollup js-scroll"><span></span></button>

		<a href="<?php the_permalink(367) ?>" class="header__sitemap">
			<svg role='img'><use href='<?php echo get_bloginfo('template_url') ?>/dist/img/sprite.svg#sitemap' /></svg>
		</a>
	</div>
</div>
<div class="header__placeholder"></div>
