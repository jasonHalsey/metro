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
			<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
    
    <symbol id="footer-icon-facebook" viewbox="0 0 44.8 44.8">
      <path fill="#fff" d="M28.7 17.6h-4.3v-2.8c0-1.1.7-1.3 1.2-1.3h3V8.8h-4.2c-4.7 0-5.7 3.5-5.7 5.7v3.1H16v4.8h2.7V36h5.7V22.4h3.8l.5-4.8z"></path>
    </symbol>
    

    
    <symbol id="footer-icon-twitter" viewbox="0 0 44.8 44.8">
      <path fill="#fff" d="M36.2 13.8c-1 .4-2.1.8-3.3.9 1.2-.7 2.1-1.8 2.5-3.1-1.1.7-2.3 1.1-3.6 1.4-1-1.1-2.5-1.8-4.1-1.8-3.1 0-5.7 2.5-5.7 5.7 0 .4.1.9.1 1.3-4.7-.2-8.9-2.5-11.7-5.9-.4.7-.7 1.7-.7 2.8 0 2 1 3.7 2.5 4.7-.9 0-1.8-.3-2.6-.7v.1c0 2.7 2 5 4.5 5.6-.5.1-1 .2-1.5.2-.4 0-.7 0-1.1-.1.7 2.3 2.8 3.9 5.3 3.9-1.9 1.5-4.4 2.4-7 2.4-.5 0-.9 0-1.4-.1 2.5 1.6 5.5 2.5 8.7 2.5 10.4 0 16.1-8.6 16.1-16.1v-.7c1.3-.8 2.3-1.8 3-3z"></path>
    </symbol>
  </svg>
  
    
    <div class="social-links">
        <a href="<?php echo $GLOBALS['facebook_url'] ?>" class="facebook" rel="me" target="_blank">
          <svg class="icon" title="Facebook">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#footer-icon-facebook"></use>
          </svg>
        </a>
        <a href="<?php echo $GLOBALS['twitter_url'] ?>" class="twitter" title="Twitter" rel="me" target="_blank">
          <svg class="icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#footer-icon-twitter"></use>
          </svg>
        </a>      
    </div>
				<span class="nav"><a href="<?php echo $GLOBALS['privacy_url'] ?>">Privacy Policy</a></span>
				<span>Copyright &copy; <?php echo date("Y"); ?> Metro Self Storage</span>
				<span class="housing-icons">
			  	<span class="handicap-icon access">Handicap Friendly</span>
				</span>

		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
