<?php
global $current_user;
get_currentuserinfo();
?>
<ul class="user-menu">
	<?php
	if ( !is_user_logged_in() ) {
		wp_register();
		?>
		<li><a href="<?php echo wp_login_url( home_url() ); ?>" ><?php _e( 'Login', 'bookpress' ); ?></a></li>
		<?php
	} else {
		?>
		<li>
			<a href="<?php echo get_edit_user_link(); ?>">
				<?php echo $current_user->user_firstname; ?>
			</a>		
		</li>
		<li>
			<a href="<?php echo wp_logout_url( home_url() ); ?>" >
				<?php _e( 'Logout', 'bookpress' ); ?>
			</a>
		</li>
		<?php
	}
	?>					

</ul>

