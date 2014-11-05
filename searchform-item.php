<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
	<input type="hidden" id="post_type" name="post_type" value="item" />
	<label>
		<span class="screen-reader-text">Pesquisar por:</span>
		<input type="search" class="search-field" placeholder="Pesquisar &hellip;" value="<?php echo get_search_query(); ?>" name="s" title="Pesquisar por:" />
	</label>
	<input type="submit" class="search-submit" value="Pesquisar" />
</form>