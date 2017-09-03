<?php
/**
 * The home page for dub_plate
 *
 * 
 */

get_header(); ?>

	<div id="home-container">
		<div id="home-aside">
			<h1>briefly noted</h1>
				<?php query_posts('category_name=briefly&posts_per_page=1'); ?>
				<?php while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h3 class="aside-title"><?php the_title(); ?></h3>
						<div class="entry-content">
							<?php //show excerpt if it exists
								$excerpt = get_the_excerpt();
								if (!empty($excerpt) ) {
									the_excerpt();
								}
								else { //otherwise show the full content
									the_content( __( 'Finish reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) );
								}
							?>
						</div><!-- .entry-content -->
						<div class="entry-meta">
							<span class="entry-date"><?php the_time('F j, Y'); ?></span>
						</div><!-- .entry-meta -->
					</div><!-- #post-## -->
				<?php endwhile; ?>
		</div><!-- #home-aside -->
		<div id="home-content" role="main">
			<h1>latest essays</h1>
			<?php rewind_posts(); ?>
			<?php query_posts('category_name=essays&posts_per_page=3'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

					<div class="entry-meta">
						<?php twentyten_posted_on(); ?>
					</div><!-- .entry-meta -->
				
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->

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
		</div><!-- #home-content -->
	</div><!-- #home-container -->
<?php get_footer(); ?>