<?php 
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists
    if( function_exists('acf_register_block') ) {

        // register a testimonial block
        acf_register_block(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}

function my_acf_add_local_field_groups() {
	
acf_add_local_field_group(array(
	'key' => 'group_1',
	'title' => 'One Column Text Gutenberg',
	'fields' => array(
		array(
			'key' => 'field_5c0a4fd48b754',
			'label' => 'Headline',
			'name' => 'acf_gutenberg_onetextcolum_headline',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/testimonial',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
	
}

add_action('acf/init', 'my_acf_add_local_field_groups');

function my_acf_block_render_callback( $block, $content = '', $is_preview = false ) {
  /* print_r($block);
  print_r($content); */
  $headlinegt = get_field('acf_gutenberg_onetextcolum_headline');
  ?>
<section class="tp-text-onecolumn-gutenberg">
  <div class="container">
    <div class="row">
      <div class="col-12">
				<div class="headline-container">
					<h2 class="headline"><?php echo $headlinegt;?></h2>
				</div>
      </div>
    </div>
  </div>
</section>
  
<?php
  };
?>