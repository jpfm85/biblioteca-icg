<?php
/**
 * Template Name: Profile Page
 */
__( 'Profile Page', 'bookpress' );

the_post();

if ( !is_user_logged_in() ) {
	$wp_login_url = wp_login_url( get_the_permalink() );
	wp_redirect( $wp_login_url, 302 );
	exit();
}
global $current_user;
get_currentuserinfo();

$last_search_queries = get_user_meta( get_current_user_id(), 'last_search_queries', true );
$last_search_queries = apply_filters( 'search_queries', $last_search_queries );

$last_visited_items_ids = get_user_meta( get_current_user_id(), 'last_visited_items', true );
if ( is_array( $last_visited_items_ids ) ) {
	$last_visited_items_ids = array_unique( $last_visited_items_ids );
} else {
	$last_visited_items_ids = array();
}


$last_visited_items_args = array(
	'post_per_page'	 => 10,
	'orderby'		 => 'post__in',
	'order'			 => 'ASC',
	'post__in'		 => $last_visited_items_ids,
	'post_type'		 => 'item',
);

$last_visited_items = new WP_Query( $last_visited_items_args );

get_header();
?>
<div id="page" class="container">
	<h2><?php the_title(); ?></h2>
	<?php
	dynamic_sidebar( 'profile-column' );
	?>

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
	<?php } else { ?>
		<p><?php _e( 'Você não procurou por nada ainda', 'bookpress' ); ?></p>
	<?php } ?>

	<h3><?php _e( 'Você já visitou os seguintes items do acervo: ', 'bookpress' ); ?></h3>
	<?php if ( count( $last_visited_items ) > 0 ) { ?>
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
	<?php } else { ?>
		<p><?php _e( 'Você não acessou nenhum item do acervo', 'bookpress' ); ?></p>
	<?php } ?>

</div>
<?php
get_footer();
