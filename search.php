<?php
//global $wp_query;
//$args = apply_filters( 'author_like_get_posts', $wp_query->query_vars );
//query_posts( $args );

get_header();
?>
<div id="page" class="container">

	<?php
	get_template_part( 'searchform', 'item' );
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			?>
			<li><?php get_template_part( 'loop', 'search' ); ?></li>
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
