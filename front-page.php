<?php
$last_items_args = array(
	'post_type'		 => 'item',
	'post_per_page'	 => 7,
);
$last_items		 = new WP_Query( $last_items_args );
get_header();
?>

<div id="search" class="container">
	<div class="title"><h2><?php _e( '', 'bookpress' ) ?></h2></div>
	<?php
	get_template_part( 'searchform', 'item' );
	?>	
</div>

<div id="page" class="container">
	<div class="column1">

		<?php
		the_post();
		the_title( '<div class="title"><h2>', '</h2></div>' );
		the_content();
		?>


	</div>
	<div class="column2-3">
		<div class="title">
			<h2>Últimos items inseridos</h2>
		</div>
		<ul>
			<?php
			while ( $last_items->have_posts() ) {

				$last_items->the_post();
				?> <li>
					<a href="<?php the_permalink(); ?>"  >
						<?php the_title(); ?>
					</a>
				</li>
				<?php
			}
			wp_reset_postdata();
			?>
		</ul>
	</div>

	<?php dynamic_sidebar( 'home-column4' ); ?>
</div>
<div id="portfolio-wrapper">
	<div id="portfolio" class="container">
		<address>Instituto Casa da Glória, 298 – Centro – Diamantina – MG <br />			
			Fone: (38) 3531 1394<br />
			Fax: ( 38) 3531 2577<br />
			Cep: 39 100-000
		</address>
	</div>
</div>
<?php
get_footer();
