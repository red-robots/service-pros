<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 	return;
// }
$link = get_bloginfo('url').'/services/customer-services/';
?>
<aside id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
	<div class="bbutton">
			<a href="<?php echo $link; ?>">
				Back to all Videos
			</a>
		</div>
	<?php if( have_rows('pdf_files') ) : ?>
		<div class="widget">
			<h3>Downloads</h3>
			<?php while( have_rows('pdf_files') ) : the_row(); 
					$fLink = get_sub_field('file');
					$fTitle = get_sub_field('file_title');
					// echo '<pre>';
					// print_r($fLink);
					// echo '</pre>';
				?>
				<div class="filelink">
					<a href="<?php echo $fLink['url']; ?>">
						<div class="file-wrapper">
							<div class="fileicon">
								<i class="fas fa-file-pdf fa-3x"></i>
							</div>
							<?php if( $fTitle ) { ?>
								<div class="filetitle"><?php echo $fTitle; ?></div>
							<?php } ?>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</aside><!-- #secondary -->