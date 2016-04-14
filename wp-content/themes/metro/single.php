
<?php
/**
 * @package _s
 */

get_header(); ?>

<div class="container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} ?>
				<h1 class="entry-title single-title"><?php the_title(); ?></h1>
				<article class="entry-content">
					<?php the_content(); ?>
				</article>
				<footer class="entry-footer">
					<span class="cat-links">Posted in&nbsp;<?php the_category(); ?></span>
					<span class="tagged-links"><?php the_tags('Tagged '); ?></span>
				</footer>


			<?php
				// Previous/next post navigation.
				the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next:', 'twentyfifteen' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( '', 'twentyfifteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous:', 'twentyfifteen' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( '', 'twentyfifteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
				) );
			?>
			<?php endwhile; ?>

			

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php get_sidebar(); ?>

</div><!-- #container -->

<?php get_footer(); ?>