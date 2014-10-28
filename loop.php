<header>
	<?php
	the_title( '<h2>', '</h2>' );
	?>
<p> <?php edit_post_link(); ?> </p>
<?php \Biblioteca_ICG\Theme::the_overall_rating() ?>
</header>
<?php
the_content();
comments_template();



