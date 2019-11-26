<?php

add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr ($tag) {
	return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

add_post_type_support( 'page', 'excerpt' );

add_action('after_setup_theme', function() {
	register_nav_menus([
		'headermenu' => 'Меню в шапке',
		'sitemap' => 'Карта сайта'
	]);
});

add_theme_support('post-thumbnails', array('post', 'page', 'project'));
add_image_size('w480h480', 480, 480, true);
add_image_size('w500h400', 500, 400, true);

// function srcset($image, $wh) {
// 	$wh = !empty($wh) ? $wh : ['thumbnail', 'medium', 'large', 'w150h100', 'w560h308', 'w468h364', 'w560h308', 'w468h500', 'w800h600', 'w800h480'];

// 	$srcset = [];
// 	foreach ($wh as $size) {
// 		$srcset[] = $image['sizes'][$size] . ' ' . $image['sizes'][$size . '-width'] . 'w';
// 	}
// 	$srcset[] = $image['url'] . ' ' . $image['width'] . 'w';

// 	$sizes = [];
// 	foreach ($wh as $size) {
// 		$sizes[] = '(max-width: ' . $image['sizes'][$size . '-width'] . 'px) ' . $image['sizes'][$size . '-width'] . 'px';
// 	}
// 	$sizes[] = $image['width'] . 'px';

// 	return 'srcset="' . implode(', ', $srcset) . '" ' . 'sizes="' . implode(', ', $sizes) . '"';
// }

function icon($name, $scale = 1) {
	$width = $scale * 20;
	$height = $scale * 20;
	echo '<svg class="inline-svg-icon" width="' . $width . '" height="' . $height . '"><use xlink:href="' . get_bloginfo('template_url') . '/dist/img/sprite.svg#' . $name . '"></use></svg>';
}

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Параметры',
		'menu_title'	=> 'Параметры',
		'menu_slug' 	=> 'acf-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


class Sitemap_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$permalink = $item->url;
		$custom_hildren = '';

		if ($type == 'taxonomy' && $object == 'category') {
			$posts = new WP_Query([
			    'post_type' => 'post',
				'tax_query' => [[
			        'taxonomy' => 'category',
			        'terms'    => [$item->object_id]
			    ]]
			]);
			if ($posts->have_posts()) {
				$item->classes[] = 'menu-item-has-children';
				$custom_hildren .= '<ul>';
				while ($posts->have_posts()) {
					$posts->the_post();
					$custom_hildren .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$custom_hildren .= '</ul>';
			}
			wp_reset_query();
		}

		if ($type == 'post_type' && $object == 'page') {
			$pages = new WP_Query([
			    'post_type' => 'page',
			    'post_parent' => $item->object_id
			]);
			if ($pages->have_posts()) {
				$item->classes[] = 'menu-item-has-children';
				$custom_hildren .= '<ul>';
				while ($pages->have_posts()) {
					$pages->the_post();
					$subpages = new WP_Query([
					    'post_type' => 'page',
					    'post_parent' => get_the_ID()
					]);
					$cls = '';
					if ($subpages->have_posts()) {
						$cls .= 'menu-item-has-children';
					}
					$custom_hildren .= '<li class="' . $cls . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
					if ($subpages->have_posts()) {
						$custom_hildren .= '<ul>';
						while ($subpages->have_posts()) {
							$subpages->the_post();
							$custom_hildren .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
						}
						$custom_hildren .= '</ul>';
					}
					wp_reset_query();
					$custom_hildren .= '</li>';
				}
				$custom_hildren .= '</ul>';
			}
			wp_reset_query();
		}

		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
		if ($permalink && $permalink != '#') {
			$output .= '<a href="' . $permalink . '">';
		} else {
			$output .= '<span>';
		}
		$output .= $title;
		if ($permalink && $permalink != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

		if ($custom_hildren) {
			$output .= $custom_hildren;
		}
	}
}


add_shortcode('sitemap', function($atts) {
	if (!has_nav_menu('sitemap')) return;

	$output = '';

	$output .= wp_nav_menu([
		'theme_location' => 'sitemap',
		'menu_class' => 'sitemap',
		'walker' => new Sitemap_Walker()
	]);

	$output .= '<div class="sitemap-rules">';
	$output .= '<div class="sitemap-rules__grid">';
	$output .= '<div class="sitemap-rules__cell">';
	$output .= '<a href="' . get_the_permalink(231) . '">Пользовательское соглашение</a>';
	$output .= '</div>';
	$output .= '<div class="sitemap-rules__cell">';
	$output .= '<a href="' . get_the_permalink(3) . '">Политика конфиденциальности и обработка персональных данных</a>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;
});


add_action('init', function() {
	register_taxonomy('project_category', ['project'], array(
		'label' => '',
		'labels' => array(
			'name' => 'Категории',
			'singular_name' => 'Категория',
			'search_items' => 'Искать категории',
			'all_items' => 'Все категории',
			'view_item' => 'Смотреть категорию',
			'parent_item' => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item' => 'Редактировать категорию',
			'update_item' => 'Изменить категорию',
			'add_new_item' => 'Добавить новую категорию',
			'new_item_name' => 'Название новой категории',
			'menu_name' => 'Категории'
		),
		'description' => '',
		'public' => true,
		'hierarchical' => true,
		'meta_box_cb' => 'post_categories_meta_box'
	));
});


add_action('init', function() {
	register_post_type('project', array(
		'labels' => array(
			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый проект',
			'edit_item' => 'Редактировать проект',
			'new_item' => 'Новый проект',
			'view_item' => 'Посмотреть проект',
			'search_items' => 'Найти проект',
			'not_found' => 'Проектов не найдено',
			'not_found_in_trash' => 'В корзине проектов не найдено',
			'parent_item_colon' => '',
			'menu_name' => 'Проекты'
		),
		'public' => true,
		'menu_icon' => 'dashicons-portfolio',
		'menu_position' => 21,
		'taxonomies' => ['project_category'],
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	));
});


add_action('init', function() {
	register_taxonomy_for_object_type('project_category', 'project');
});


// function be_register_blocks() {
//     if( ! function_exists('acf_register_block') )
//         return;
//     acf_register_block( array(
//         'name' => 'list-reasons',
//         'title' => 'Список причин',
//         'render_template' => 'partials/blocks/list-reasons.php',
//         'category' => 'formatting',
//         'icon' => 'editor-ul',
//         'mode' => 'edit'
//     ));
//     acf_register_block( array(
//         'name' => 'list-questions',
//         'title' => 'Список вопрос-ответ',
//         'render_template' => 'partials/blocks/list-questions.php',
//         'category' => 'formatting',
//         'icon' => 'editor-ul',
//         'mode' => 'edit'
//     ));
//     acf_register_block( array(
//         'name' => 'content-prices',
//         'title' => 'Содержимое - Цены',
//         'render_template' => 'partials/blocks/content-prices.php',
//         'category' => 'formatting',
//         'icon' => 'editor-ul',
//         'mode' => 'edit'
//     ));
//     acf_register_block( array(
//         'name' => 'content-price',
//         'title' => 'Содержимое - Прайс',
//         'render_template' => 'partials/blocks/content-price.php',
//         'category' => 'formatting',
//         'icon' => 'editor-ul',
//         'mode' => 'edit'
//     ));
// }
// add_action('acf/init', 'be_register_blocks' );


function seo() {
	$title = '';
	$description = '';
	$keywords = '';

	if (is_archive()) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		if ($term) {
			$title = get_field('title', $term->taxonomy . '_' . $term->term_id);
			if (empty($title)) {
				$title = $term->name;
			}
			$description = get_field('description', $term->taxonomy . '_' . $term->term_id);
			$keywords = get_field('keywords', $term->taxonomy . '_' . $term->term_id);
		} elseif (is_post_type_archive()) {
			$title = get_queried_object()->labels->name;
		} elseif (is_day()) {
			$title = sprintf(__('Daily Archives: %s', 'roots'), get_the_date());
		} elseif (is_month()) {
			$title = sprintf(__('Monthly Archives: %s', 'roots'), get_the_date('F Y'));
		} elseif (is_year()) {
			$title = sprintf(__('Yearly Archives: %s', 'roots'), get_the_date('Y'));
		} elseif (is_author()) {
			$author = get_queried_object();
			$title = sprintf(__('Author Archives: %s', 'roots'), $author->display_name);
		} else {
			$title = single_cat_title('', false);
		}
	} elseif (is_search()) {
		$title = sprintf(__('Search Results for %s', 'roots'), get_search_query());
	} elseif (is_404()) {
		$title = 'Not Found';
	} else {
		$title = get_field('seo_title');
		if (empty($title)) {
			$title = get_the_title();
		}
		$description = get_field('seo_description');
		$keywords = get_field('seo_keywords');
	}

	echo '<title>' . $title . '</title>';
	if (!empty($description)) {
		echo '<meta name="keywords" content="' . $keywords . '">';
	}
	if (!empty($keywords)) {
		echo '<meta name="description" content="' . $description . '">';
	}

	echo '<meta property="og:title" content="' . $title . '" />';
	if (!empty($description)) {
		echo '<meta property="og:description" content="' . $description . '" />';
	}
	echo '<meta property="og:image" content="' . (get_the_post_thumbnail_url(null, 'full') ||  get_template_directory_uri() . '/dist/img/bg-intro.jpg') . '" />';
	echo '<meta property="og:type" content="website" />';
	echo '<meta property="og:url" content="' . wp_get_canonical_url() . '" />';
}


add_filter('navigation_markup_template', function ($template, $class) {
	return '<nav class="%1$s" role="navigation">%3$s</nav>';
}, 10, 2);


add_action('wp_enqueue_scripts', function () {
	wp_deregister_script('jquery');
	wp_enqueue_script('theme_common', get_template_directory_uri() . '/dist/common.js', [], false, true);

	wp_localize_script('theme_common', 'myajax', [
		'url' => admin_url('admin-ajax.php')
	]);
}, 99);


add_action('wp_ajax_get_project', 'ajax_get_project', 10, 2);
add_action('wp_ajax_nopriv_get_project', 'ajax_get_project', 10, 2);
function ajax_get_project() {
	$id = intval($_REQUEST['id']);
	$post = get_post($id, 'ARRAY_A');
	$gallery = get_field('gallery', $id);
	echo json_encode([
		'post' => $post,
		'gallery' => $gallery
	]);

	wp_die();
}
