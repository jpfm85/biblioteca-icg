<?php
/**
 * Template Name: Search Page
 */
__( 'Search Page', 'bookpress' );
$current_year	 = date( 'Y' );
get_header();
?>
<div id="page" class="container">
	<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
		<input type="hidden" id="post_type" name="post_type" value="item" />
		<p>
			<label>
				<span class="screen-reader-text">Título:</span>
				<input type="search" class="search-field" placeholder="Digite título de uma obra" value="<?php echo get_search_query(); ?>" name="s" title="Pesquisar por:" />
			</label>
		</p>
		<p>
			<label>
				Autor:
				<input type="text" placeholder="Digite o nome de um autor" name="author_like" title="Digite o nome de um autor" />

			</label>
		</p>
		<p>
			<label>
				Categoria:
				<?php
				$category_args	 = array(
					'show_option_all'	 => 'Buscar em todas Categorias',
					'orderby'			 => 'NAME',
					'order'				 => 'ASC',
					'hide_empty'		 => true,
					'name'				 => 'cat',
					'id'				 => 'cat',
					'taxonomy'			 => 'category',
				);
				wp_dropdown_categories( $category_args );
				?>
			</label>
		</p>

		<p>
			<label for="meta_year">
				<?php _e( 'Year published', 'bookpress' ) ?>
			</label>
			<input		
				id ="meta_year"
				max ="<?php echo $current_year ?>"
				name ="meta_year"
				step ="1"
				type ="number"
				value =""
				/>
		</p>


		<input type="submit" class="search-submit" value="Pesquisar" />
	</form>
</div>
<?php
get_footer();
