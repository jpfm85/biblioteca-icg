<?php

/* 
 * Template Name: Map Page
 */
__('Map Page', 'bookpress');

get_header();
?>
<div id="page" class="container">
	
		<?php 
	
	if(  have_posts()){
		
		while(  have_posts()){
			the_post();
			the_title('<h2>', '</h2>' );
			the_content();
		}
	}
	
	?>
	
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3789.3097862322616!2d-43.601611999999996!3d-18.241615!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e3849e90d5975d8!2sUFMG+Instituto+Casa+da+Gl%C3%B3ria+Igc!5e0!3m2!1spt-BR!2sbr!4v1411080115614" frameborder="0" style="border:0; width:100%; height: 450px; "></iframe>
</div>
<?php
get_footer();
