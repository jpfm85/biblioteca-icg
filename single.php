<?php
get_header();
?>
<div id="page" class="container">

	<?php
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			?>
	<article <?php post_class(); ?>>
		<?php get_template_part('loop'); ?>
	</article>
	<?php
		}
	} else {
		_e( 'Nothing was found', 'bookpress' );
	}
	?>

</div>

	<?php
	get_footer();
	