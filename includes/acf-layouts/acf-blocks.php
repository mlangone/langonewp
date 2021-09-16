<?php
/**
 *
 * ACF Blocks for use
 *
 */

function register_acf_blocks() {

    // register a board block.
    acf_register_block(array(
        'name'              => 'board-member',
        'title'             => __('Board Member Title'),
        'description'       => __('Information about board members.'),
        'render_template'   => get_template_directory().'/includes/acf-layouts/blocks/block-board-member-title.php',
        'enqueue_style'     => get_template_directory_uri() . '/includes/acf-layouts/blocks/css/board-member.css',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'supports'          => ['align' => false], // experimental remove align properties
        'keywords'          => array( 'board member', 'title' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block') ) {
    add_action('acf/init', 'register_acf_blocks');
}

add_action( 'acf/init', 'register_bannerslider_block' );
function register_bannerslider_block() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		// Register BannerSlider block
		acf_register_block_type( array(
			'name' 					=> 'bannerslider',
			'title' 				=> __( 'BannerSlider' ),
			'description' 			=> __( 'A custom BannerSlider block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'bannerslider' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			// 'align'				=> 'wide',
			'render_template'		=> get_template_directory().'/includes/acf-layouts/blocks/bannerslider.php',
			// 'render_callback'	=> 'bannerslider_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/bannerslider/bannerslider.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/bannerslider/bannerslider.js',
			// 'enqueue_assets' 	=> 'bannerslider_block_enqueue_assets',
		));

	}

}