<?php
get_header();
?>
<div id="page" class="container">

	<?php
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			the_title( '<h2>', '</h2>' );
			edit_post_link();
			the_content();
			comments_template();
		}
	} else {
		_e( 'Nothing was found', 'bookpress' );
	}
	?>

</div>

	<?php
	get_footer();
	