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
				<h4>Metro Self Storage</h4>
				<p class="phone"><?php echo $GLOBALS['phone_number'] ?></p>
				<p class="email"><a href="<?php echo $GLOBALS['email_url'] ?>">Email Us</a></p>
			</div>

			<div class="RightContain">
			<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://metrostorage.g5dns.com/#footer-icon-facebook"></use>
				<span class="nav"><a href="">Privacy Policy</a>&nbsp;|&nbsp;<a href="">Find Local Storage</a></span>
				<span>Copyright &copy; <?php echo date("Y"); ?> Metro Self Storage</span>
			</div>

		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
