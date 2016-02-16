<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Metro
 * @since Twenty Fifteen 1.0
 */
?>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="leftContain">
				<span>Metro Self Storage</span>
				<span><?php echo $GLOBALS['phone_number'] ?></span>
				<span><a href="">Email Us</a></span>
			</div>

			<div class="RightContain">
			<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://metrostorage.g5dns.com/#footer-icon-facebook"></use>
				<span><a href="">Privacy Policy</a>&nbsp;|&nbsp;<a href="">Find Local Storage</a></span>
				<span>Copyright &copy; <?php echo date("Y"); ?> Metro Self Storage</span>
			</div>

		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
