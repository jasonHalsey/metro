
<?php
/**
 * @package _s
 */

get_header(); ?>

<div class="container">

	<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php custom_breadcrumbs(); ?>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="entry-title single-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry-content">
				
					<?php the_content(); ?>
				</div>
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


</div><!-- #container -->
<?php get_footer(); ?>