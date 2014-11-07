<?php
/**
 * Template Name: Profile Page
 */
__( 'Profile Page', 'bookpress' );

if ( !is_user_logged_in() ) {
	$wp_login_url = wp_login_url( get_the_permalink() );
	wp_redirect( $wp_login_url, 302 );
	exit();
}

the_post();

$clean_last_visited	 = filter_input( INPUT_GET, 'clean-last-visited', FILTER_SANITIZE_NUMBER_INT );
$clean_last_queries	 = filter_input( INPUT_GET, 'clean-last-queries', FILTER_SANITIZE_NUMBER_INT );

global $current_user;
get_currentuserinfo();

if ( intval( $clean_last_visited ) === 1 ) {
	delete_user_meta( get_current_user_id(), 'last_visited_items' );
	$last_visited_items_ids = array();
} else {
	$last_visited_items_ids = get_user_meta( get_current_user_id(), 'last_visited_items', true );

	if ( is_array( $last_visited_items_ids ) ) {
		$last_visited_items_ids = array_unique( $last_visited_items_ids );
	} else {
		$last_visited_items_ids = array();
	}
}

if ( intval( $clean_last_queries ) === 1 ) {
	delete_user_meta( get_current_user_id(), 'last_search_queries' );
	$last_search_queries = array();
} else {
	$last_search_queries = get_user_meta( get_current_user_id(), 'last_search_queries', true );
	$last_search_queries = apply_filters( 'search_queries', $last_search_queries );
}

$user_last_categories_meta = get_user_meta( get_current_user_id(), 'user_last_categories', true );
if ( is_array( $user_last_categories_meta ) ) {
	$user_last_categories_meta = array_unique( $user_last_categories_meta );
} else {
	$user_last_categories_meta = array();
}

$last_visited_items_args = array(
	'posts_per_page' => 10,
	'orderby'		 => 'post__in',
	'order'			 => 'ASC',
	'post__in'		 => $last_visited_items_ids,
	'post_type'		 => 'item',
);

$last_visited_items = new WP_Query( $last_visited_items_args );

$user_suggestions_args	 = array(
	'post_type'		 => 'item',
	'posts_per_page' => 5,
	'category__in'	 => $user_last_categories_meta,
	'post__not_in'	 => $last_visited_items_ids,
);
$user_suggestions		 = new WP_Query( $user_suggestions_args );

get_header();
?>
<div id="page" class="container">

	<?php if ( intval( $clean_last_visited ) === 1 ) { ?>
		<p class="alert alert-info">
			<?php \_e( 'Your last visited items were removed succesfully' ); ?>
		</p>
	<?php } ?>

	<?php if ( intval( $clean_last_queries ) === 1 ) { ?>
		<p class="alert alert-info">
			<?php \_e( 'Your last visited items were removed succesfully' ); ?>
		</p>
	<?php } ?>

	<h2><?php the_title(); ?></h2>
	<?php
	dynamic_sidebar( 'profile-column' );
	?>

	<div class="column1">
		<h3><?php _e( 'Você pesquisou anteriormente por: ', 'bookpress' ); ?></h3>
		<?php if ( count( $last_search_queries ) > 0 ) { ?>
			<ul>
				<?php
				$arr_params = array(
					'post_type' => 'item' );
				foreach ( $last_search_queries as $search_query ) {
					$arr_params [ 's' ] = $search_query;
					?>
					<li> <a href="<?php echo add_query_arg( $arr_params, home_url() ) ?>">
							<?php echo esc_html( $search_query ); ?>
						</a></li>
				<?php } ?>

			</ul>
			<a class="button" href="<?php echo add_query_arg( array( 'clean-last-queries' => true ), get_the_permalink() ); ?>">
				<?php \_e( 'Clean last search queries' ); ?>
			</a>
		<?php } else { ?>
			<p><?php _e( 'Você não procurou por nada ainda', 'bookpress' ); ?></p>
		<?php } ?>
	</div>

	<div class="column2-3">
		<h3><?php _e( 'Você já visitou os seguintes items do acervo: ', 'bookpress' ); ?></h3>
		<?php if ( !empty( $last_visited_items_ids ) && count( $last_visited_items ) > 0 ) { ?>
			<ul>
				<?php
				$arr_params = array(
					'post_type' => 'item' );
				while ( $last_visited_items->have_posts() ) {
					$last_visited_items->the_post();
					?>
					<li> <a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a></li>
					<?php
				}
				wp_reset_postdata();
				?>
			</ul>
			<a class="button" href="<?php echo add_query_arg( array( 'clean-last-visited' => true ), get_the_permalink() ); ?>">
				<?php \_e( 'Clean last visited list' ); ?>
			</a>
		<?php } else { ?>
			<p><?php _e( 'Você não acessou nenhum item do acervo', 'bookpress' ); ?></p>
		<?php } ?>
	</div>

	<div class="column4">
		<h3>Itens que podem ser do seu interesse</h3>
		<?php if ( $user_last_categories_meta && $user_suggestions->have_posts() ) { ?>
			<ul>
				<?php
				while ( $user_suggestions->have_posts() ) {
					$user_suggestions->the_post();
					?>
					<li> <a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a></li>
					<?php
				}
				wp_reset_postdata();
				?>
			</ul>
		<?php } else { ?>
			<p>Até o momento não há sugestões para você. Sugestões surgirāo aqui à medida que você começar a navegar por nosso acervo.</p>
		<?php } ?>
	</div>

</div>
<?php
get_footer();
