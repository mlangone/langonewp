<?php
/**
 * Block template file: /Users/langone/Lightning/karaspenco/app/public/wp-content/themes/karaskustoms-main/includes/acf-layouts/blocks/bannerslider.php
 *
 * Bannerslider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'bannerslider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-bannerslider';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

?>

<style type="text/css">
	<?php echo '#' . $id; ?> .item img {
		/* display: block;
		width: 100%;
		height: auto; */
		/* Add styles that use ACF values here */
	}
<?php echo '#' . $id; ?> .owl-carousel .owl-wrapper {
display: flex !important;
}
<?php echo '#' . $id; ?> .owl-carousel .owl-stage img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    max-width: initial;
}

/* #theOwlWrapper .owl-carousel .owl-item .image-item img{display:-ms-flexbox;display:flex;width:100%;height:800px;object-fit:cover;max-width:none;height:calc(183px - 1rem)} */
@media print,screen and (min-width:0px){#theOwlWrapper .owl-carousel .owl-item img {display: flex; object-fit: cover;}}
@media print,screen and (min-width:48em){#theOwlWrapper .owl-carousel .owl-item img {display: flex; object-fit: cover;height: 480px;}}
@media print,screen and (min-width:64em){#theOwlWrapper .owl-carousel .owl-item img {display: flex; object-fit: cover;height: 640px;}}
@media print,screen and (min-width:80em){#theOwlWrapper .owl-carousel .owl-item img {display: flex; object-fit: cover;height: 100%;}}

@media print, screen and (max-width: 40rem){
	#theOwlWrapper .owl-carousel .owl-item img {
		min-height: 180px;
	}
}
@media print, screen and (min-width: 641px){
	#theOwlWrapper .owl-carousel .owl-item img {
		object-position: center !important;
	}
}
#theOwlWrapper .owl-carousel .owl-stage {max-height: 800px !important;}
.owl-theme .custom-nav {
  position: absolute;
  top: 20%;
  left: 0;
  right: 0;
}
.owl-theme .custom-nav .owl-prev, .owl-theme .custom-nav .owl-next {
  position: absolute;
  height: 100px;
  color: inherit;
  background: none;
  border: none;
  z-index: 100;
}
.owl-theme .custom-nav .owl-prev i, .owl-theme .custom-nav .owl-next i {
  font-size: 2.5rem;
  color: #cecece;
}
.owl-theme .custom-nav .owl-prev {
  left: 0;
}
.owl-theme .custom-nav .owl-next {
  right: 0;
}
.owl-carousel .owl-stage{display: flex;}
.owl-item {
    display: flex;
    flex: 1;
    height: 100%;
	justify-content: center;
}
.image-item{
    position: relative;
    overflow: hidden;
    /* margin-bottom: 80px; *//*This is optional*/
    display: flex;
    flex-direction: column;
    align-items: stretch;
}
#theOwlWrapper .owl-carousel .owl-dots {
    position: absolute;
    bottom: 5px;
    width: 100%;
}
@media print,screen and (max-width:40em){#theOwlWrapper .owl-carousel .owl-dots {bottom: -5px;}}
</style>
<!-- v30 -->
<div id="theOwlWrapper" class="<?php echo esc_attr( $classes ); ?>">
	<?php if ( have_rows( 'block_banner_slider' ) ) : ?>
		<?php while ( have_rows( 'block_banner_slider' ) ) : the_row(); ?>

		<?php if ( have_rows( 'banner_images' ) ) : ?>
			<div id="owl-<?php echo esc_attr( $id ); ?>"  class="banner-slider owl-carousel <?php echo esc_attr( $classes ); ?> owl-theme" data-slider-id="<?php echo esc_attr( $id ); ?>">
				<?php while ( have_rows( 'banner_images' ) ) : the_row(); ?>
					<?php 
					$link 	= get_sub_field( 'link' );
					$img	= get_sub_field( 'image' );
					$mobilePosition = get_sub_field('mobile_position');
					?>

						<?php if ( $img && $link ) : ?>
							<a href="<?php echo esc_url( $link) ; ?>">
								<div class="image-item item">								
								<img id="newbannerImage" class="newbannerimage" style="object-position: <?php echo $mobilePosition;?>" src="<?php the_sub_field( 'image' ); ?>" />
								</div>
							</a>
						<?php endif; ?>
						<?php if ( $img && !$link ) : ?>
								<div class="image-item item">
								<img id="newbannerImage" class="newbannerimage" style="object-position: <?php echo $mobilePosition;?>" src="<?php the_sub_field( 'image' ); ?>" />
								</div>
						<?php endif; ?>
				<?php endwhile; ?>
				</div>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
<!-- <div class="owl-controls">
<div class="custom-nav owl-nav"></div>
</div> -->
				</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<script>
	jQuery(document).ready(function($){
	
		$('#owl-<?php echo esc_attr( $id ); ?>').owlCarousel({

			items: 1,
			dots: true,
			navigation : true,
			loop:true,
			autoplay:true,
			autoplayTimeout: 4000,
			autoplayHoverPause:true,
			animateOut: 'fadeOut',
			navText: [
				'<i class="fa fa-angle-left" aria-hidden="true"></i>',
				'<i class="fa fa-angle-right" aria-hidden="true"></i>'
			],
			navContainer: '.main-content .custom-nav',

		});

	});
</script>
<?php

// add_filter( 'smush_skip_image_from_cdn', function( $status, $src, $image ) {

	//array or URL's
	// global $post;
	// $posts = get_posts();
	// foreach ($posts as $post):
	// 	$url_list =  get_sub_field('image', $post->ID);
	// 	// $url_list = get_field( "text_field" );
	// endforeach;
	// $url_list = array(
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/edk-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/edk-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/edk-banner-3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/bolt-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/bolt-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/DECOGRAPH-BANNER_1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/DECOGRAPH-BANNER_2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/DECOGRAPH-BANNER_3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/customer-service-banner.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/faq-banner.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/fountain-k-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/fountain-k-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/fountain-k-banner-3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/fountain-k-banner-2-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/fountain-k-banner-3-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-fountain-pen-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-fountain-pen-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-fountain-pen-banner-3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-rollerballer-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-rollerballer-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-rollerballer-banner-2-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/ink-rollerballer-banner-3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/render-k-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/render-k-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/render-k-banner-2-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/render-k-banner-3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/retrakt-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/retrakt-banner-2.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/retrakt-banner-3.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/vertex-banner-1.png',
	// 	'https://karaskustoms.com/wp-content/uploads/2021/08/vertex-banner-2.png',	
	// );
	
	
	// // $url_list = get_sub_field('image', $post->ID);
	// foreach($url_list as $url) {
	
	// //compare the $src here and return true to skip
	
	// if ( $src == $url ) {
	
	// return true;
	
	// }
	
	// }
	
	// }, 10, 3 ); ?>