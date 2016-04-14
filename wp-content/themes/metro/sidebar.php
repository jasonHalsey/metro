<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">

<div class="cta_button">
  <a href="<?php echo $GLOBALS['cta_url'] ?>">
    <?php echo $GLOBALS['cta_text'] ?>
  </a>
</div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div><!-- #secondary -->
