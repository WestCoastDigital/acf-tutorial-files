<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_child_enqueue_scripts()
{
	if (is_rtl()) {
		wp_enqueue_style('generatepress-rtl', trailingslashit(get_template_directory_uri()) . 'rtl.css');
	}
	wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/animate/animate.min.css');
	wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/slick/slick.css');
	wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css');
	wp_enqueue_script('jquery');
	wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/slick/slick.min.js');
	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/script.js');
}
add_action('wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100);


function wcd_home_slider_shortcode()
{

	$slides = get_field('home_slides');
	$content = '';

	if ($slides) {

		$content .= '<div class="home-slider">';

		foreach ($slides as $slide) {
			$content .= '<div class="home-slide" style="background-image: url(' . $slide['image'] . ');">';
			$content .= '<div class="overlay">';
			$content .= '<div class="grid-container">';
			$content .= '<div class="grid-50 tablet-grid-50 mobile-grid-100">';
			$content .= '<h2>' . $slide['title'] . '</h2>';
			$content .= '<p>' . $slide['content'] . '</p>';
			$link = $slide['button'];
			if ($link) {
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				$content .= '<a class="button" href="' . $link_url . '" target="' . $link_target . '">' . $link_title . '</a>';
			}
			$content .= '</div>';
			$content .= '</div>';
			$content .= '</div>';
			$content .= '</div>';
		}

		$content .= '</div>';
	}

	return $content;
}
add_shortcode('home-slider', 'wcd_home_slider_shortcode');
