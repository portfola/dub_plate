<?php
/**
 * The home page for dub_plate
 *
 * 
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				<h1 class="entry-title">war report</h1>
				<?php $category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>'; ?>
				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts('category_name=war-report&posts_per_page=1&paged=' . $paged); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->

						<div class="entry-utility">
							<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-utility -->
					</div><!-- #post-## -->
				<?php endwhile; // End the loop. Whew. ?>
			 <div class="pagination"><?php posts_nav_link(' | ','previous page','next page'); ?></div>
			</div><!-- #home-content -->
		</div><!-- #home-container -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>