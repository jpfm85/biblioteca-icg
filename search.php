<?php
get_header();
?>
<div id="page" class="container">

	<?php
	get_template_part( 'searchform', 'item' );
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			?>
			<h2>
				<a href="<?php the_permalink(); ?>">
					<?php
					the_title();
					?>
				</a>
			</h2>
			<?php
			the_content();
		}
	} else {
		_e( 'Nothing was found', 'bookpress' );
	}
	?>

</div>

<?php
get_footer();
