<?php
$args = array(
	'comment_notes_after' => '',
);
?>
<h3>
	<?php _e('Comments', 'bookpress'); ?>
	
</h3>
<ul class="style1">
<?php
\wp_list_comments();
?>
</ul>
	<?php
	\paginate_comments_links();
	\comment_form( $args );
	if (function_exists('csr_get_rating_star_form')){
	echo csr_get_rating_star_form();
	}
	\Biblioteca_ICG\Theme::the_rating();


	