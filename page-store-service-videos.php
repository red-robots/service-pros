<?php
/**
 * Template Name: Store Service Videos
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
// go back url
// $url = get_bloginfo('url').'/services/store-services';
$url = get_field('store_service_videos_link', 'option');
// check by today's date
$date = date('m/d/Y');
// get url variables
if (isset($_GET['email'])) {
	$email = $_GET['email'];
}
if (isset($_GET['d'])) {
	$date = $_GET['d'];
}

    if( $_GET['d'] == $date ) :


?>

	<div id="primary" class="full-content-area clear default-temp">
		<main id="main" class="site-main wrapper" role="main">

			<?php
			while ( have_posts() ) : the_post();
				
			endwhile; // End of the loop.
			?>
			<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'store_service',
				'posts_per_page' => 20,
				'paged' => $paged,
				'facetwp' => true
			));
				if ($wp_query->have_posts()) : ?>
					<div class="filter-wrapper" style="width: 100%;text-align: center;">
						<span class="filter-title" style="font-weight: bold; display: inline-block;width: auto;font-size: 16px;">FILTER BY: </span>
						<div class="filter" style="display: inline-block;width: auto;">
							<?php echo do_shortcode('[facetwp facet="service_categories"]'); ?>
						</div> 
					</div>
				<div class="services-wrapper">
					
			    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

			    	// get Oembed
					$yTurl = get_field( 'youtube_url' );
					// extract the url of the oembed
					preg_match('/src="(.+?)"/', $yTurl, $matches);
					$src = $matches[1];    
					// if the url has correct formatting   
					if (($pos = strpos($src, "embed/")) !== FALSE) { 
					    $whatIWant = substr($src, $pos+6); 
					} 
					// strip the rest
					$arr = explode("?", $whatIWant, 2);
					$vidId = $arr[0];
			    	$sani = sanitize_title_with_dashes( get_the_title() );
			    	// build the link for the single-customer_service.php check.
					$link = get_the_permalink() . '?email=' . $email . '&d=' . $date;

					$tile_thumbnail = get_field('tile_thumbnail');
			    	?>
			    		<div class="service" >
							<div class="inner clear">
								<a class="boxlink" href="<?php echo $link; ?>">
								<!-- <a class="boxlink inline" href="#<?php echo $sani; ?>"> // for a lightbox option -->
									<span class="service-title"><?php the_title();?></span>
									<?php if( $tile_thumbnail ) { ?>
										<span class="bgimage" style="background-image:url('<?php echo $tile_thumbnail['url']; ?>')" ></span>
									<?php } else { ?>
										<span class="bgimage" style="background-image:url('https://img.youtube.com/vi/<?php echo $vidId; ?>/hqdefault.jpg')" ></span>
									<?php } ?>
									<img src="https://img.youtube.com/vi/<?php echo $vidId; ?>/hqdefault.jpg" />
								</a>
							</div>
						</div>
						<!-- <div style="display: none;">
							<div id="<?php echo $sani; ?>" class="exit-popup">
								<?php the_field('youtube_url'); ?>
							</div>
						</div> -->
			    <?php endwhile; ?>
			</div><!-- ervices wrapper -->
			    <?php pagi_posts_nav(); ?>
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	else: ?>
		<div class="missing">
			<?php 
			$message = get_field('store_service_videos_message', 'option'); 
			$messageLink = get_field('store_service_videos_message_link', 'option'); 
			if( $message) { echo '<div class="mess">'.$message.'</div>'; }
			?> 
			<?php if( $messageLink ) { ?>
				<div class="bbutton">
					<a href="<?php echo $messageLink; ?>">Please visit here.</a>
				</div>
			<?php } ?>
		</div>
<?php	endif; // jsut to make sure ?>

<?php  
get_footer();