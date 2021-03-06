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

				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry-content">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} ?>
					<?php the_excerpt(); ?>
				</div>
				<footer class="entry-footer">
					<span class="cat-links"><span>Posted In:&nbsp;</span><?php the_category(); ?></span>
					<span class="tagged-links"><?php the_tags('Tags: '); ?></span>
				</footer>
			<?php endwhile; ?>

			<?php  
			      the_posts_pagination( array(
						  'mid_size'  => 2,
						  'prev_text' => __( 'Back', 'textdomain' ),
						  'next_text' => __( 'Next', 'textdomain' ),
						) );
			?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #container -->
<?php get_footer(); ?>
