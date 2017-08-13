<?php
/**
 * Essays page for dub_plate
 *
 * 
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				<h1 class="entry-title">essays</h1>
				<?php $category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>'; ?>
				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts('category_name=essays&posts_per_page=10&paged=' . $paged); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="entry-meta">
						<?php twentyten_posted_on(); ?>
						</div><!-- .entry-meta -->
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div><!-- .entry-content -->

						<div class="entry-utility">
							<?php if ( count( get_the_category() ) ) : ?>
								<span class="cat-links">
									<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
								</span>
								<span class="meta-sep">|</span>
							<?php endif; ?>
							<?php
								$tags_list = get_the_tag_list( '', ', ' );
								if ( $tags_list ):
							?>
								<span class="tag-links">
									<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
								</span>

							<?php endif; ?>
							<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-utility -->
					</div><!-- #post-## -->
				<?php endwhile; // End the loop. Whew. ?>
			 <div class="pagination"><?php posts_nav_link(' | ','previous page','next page'); ?></div>
			</div><!-- #home-content -->
		</div><!-- #home-container -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>