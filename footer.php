<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				&copy; <?php echo date('Y') . ' '.get_bloginfo('name'); ?> | <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a><br>
				Site by <a href="https://bellaworksweb.com">BW</a>
			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php 

wp_footer(); 

/*

	Pop up function for the Customer service 

*/
$pop = get_field( 'popup_after_video' );
if( $pop == 'show' ) {
?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			// Popup
			
		});
	</script>
<?php } ?>
<?php //get_template_part('inc/chat-footer'); ?>
     <!-- <div id="chat-container" ></div> -->
</body>
</html>
