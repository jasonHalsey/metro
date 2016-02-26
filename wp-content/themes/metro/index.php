<?php
/**
 * @package _s
 */

get_header(); ?>

<div class="container">

	<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry-content">
				
					<?php the_excerpt(); ?>
				</div>
				<footer class="entry-footer">
					<span class="cat-links">Posted in&nbsp;<?php the_category(); ?></span>
					<span class="tagged-links"><?php the_tags('Tagged '); ?></span>
				</footer>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div><!-- #container -->
<?php get_footer(); ?>
