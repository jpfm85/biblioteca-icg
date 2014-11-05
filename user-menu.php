<?php
global $current_user;

$my_page_args	 = array(
	'post_type'		 => 'page',
	'post_status'	 => 'publish',
	'meta_query'	 => array(
		array(
			'key'	 => '_wp_page_template',
			'value'	 => 'page-profile.php',
		)
	),
);
$my_page		 = new WP_Query( $my_page_args );

get_currentuserinfo();
?>
<ul class="user-menu">
	<?php
	if ( !is_user_logged_in() ) {
		wp_register();
		?>
		<li>
			<a href="<?php echo wp_login_url( home_url() ); ?>" >
				<?php _e( 'Login', 'bookpress' ); ?>
			</a>
		</li>
		<?php
	} else {
		?>
		<?php
		while ( $my_page->have_posts() ) {
			$my_page->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo $current_user->user_firstname; ?>
				</a>
			</li>
			<?php
		}
		?>
		<li>
			<a href="<?php echo wp_logout_url( home_url() ); ?>" >
				<?php _e( 'Logout', 'bookpress' ); ?>
			</a>
		</li>
		<?php
	}
	?>					

</ul>