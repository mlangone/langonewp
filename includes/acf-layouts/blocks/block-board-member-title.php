<?php

// create id attribute for specific styling
$id = 'board-member-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
// $align_class = $block['align'] ? 'align' . $block['align'] : '';

// Load values and assing defaults.
// $title = the_sub_field('title') ?: 'Board member title';
// $name = get_sub_field('name') ?: 'Members name';

?>
<?php if ( have_rows( 'member_information' ) ) : 
	while ( have_rows( 'member_information' ) ) : the_row(); ?>
		<div id="<?php echo $id; ?>" class="board">
			<?php if( get_sub_field('name') && get_sub_field('title') && get_sub_field('content') ): ?>
				<h2><?php the_sub_field('name'); ?> | <?php the_sub_field('title'); ?></h2>
				<p><?php the_sub_field('content'); ?></p>
			<?php endif; ?>
		</div>
<?php endwhile;  endif; ?>
<p><?php the_field('test_text'); ?></p>
