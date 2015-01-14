<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">
		<?php the_post_thumbnail( 'medium' ); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
	</div>

</div>