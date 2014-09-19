<?php get_header(); ?>

<div id="search" class="container">
	<div class="title"><h2><?php _e( 'Search', 'bookpress' ) ?></h2></div>
	<?php 
	get_search_form();	
	?>	
</div>

<div id="page" class="container">
		<div class="column1">
			
				<?php
				the_post();
				the_title('<div class="title"><h2>', '</h2></div>' );
				the_content();
				?>
			
			
		</div>
		<div class="column2">
			<div class="title">
				<h2>Fusce ultrices</h2>
			</div>
			<img src="<?php echo get_stylesheet_directory_uri();?>/images/pic01.jpg" width="282" height="150" alt="" />
			<p>Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo. Aliquam lacinia metus.</p>
		</div>
		<div class="column3">
			<div class="title">
				<h2>Mauris vulputate</h2>
			</div>
			<img src="<?php echo get_stylesheet_directory_uri();?>/images/pic02.jpg" width="282" height="150" alt="" />
			<p>Phasellus tempor vehicula justo. Aliquam lacinia metus ut elit. Suspendisse iaculis mauris nec lorem.</p>
		</div>
		<div class="column4">
			<div class="title">
				<h2>Praesent scelerisque</h2>
			</div>
			<img src="<?php echo get_stylesheet_directory_uri();?>/images/pic03.jpg" width="282" height="150" alt="" />
			<p>Quisque eleifend. Phasellus tempor vehicula justo. Aliquam lacinia metus ut elit. Suspendisse iaculis mauris.</p>
		</div>
	</div>
	<div id="portfolio-wrapper">
		<div id="portfolio" class="container">
			<div class="title">
				<h2>Aenean elementum</h2>
				<span class="byline">Integer sit amet pede vel arcu aliquet pretium</span> </div>
			<div class="column1">
				<div class="box">
					<h3>Vestibulum venenatis</h3>
					<p>Fermentum nibh augue praesent a lacus at urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
			<div class="column2">
				<div class="box">
					<h3>Praesent scelerisque</h3>
					<p>Vivamus fermentum nibh in augue praesent urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
			<div class="column3">
				<div class="box">
					<h3>Donec dictum metus</h3>
					<p>Vivamus fermentum nibh in augue praesent urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
			<div class="column4">
				<div class="box">
					<h3>Mauris vulputate dolor</h3>
					<p>Rutrum fermentum nibh in augue praesent urna congue rutrum.</p>
					<a href="#" class="button">Etiam posuere</a> </div>
			</div>
		</div>
	</div>
<?php get_footer();
