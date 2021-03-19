<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

$yTurl = get_field( 'youtube_url' );
// check by today's date
$date = date('m/d/Y');
// get url variables
if (isset($_GET['email'])) {
	$email = $_GET['email'];
}
if (isset($_GET['d'])) {
	$date = $_GET['d'];
}
// $url = get_bloginfo('url').'/services/store-services/store-service-videos/';
$url = get_field('store_service_videos_link', 'option');
$urls = get_field('store_service_videos_message_link', 'option');
// echo $url;
// echo "<br>";
// echo $urls;
// build the link for the single-customer_service.php check.
$link = $url . '/?email=' . $email . '&d=' . $date;



	if( $_GET['d'] == $date ) :
?>

<div id="primary" class="full-content-area wrapper articles-wrapper single-post clear">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
				<?php if( $yTurl ) { ?>
					<?php the_field('youtube_url'); ?>
				<?php } ?>
		</div>
	<?php endwhile;  ?>

	</main><!-- #main -->

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

<section class="more">
	<h2>More Videos</h2>
	<?php
				$currentID = array( get_the_ID() );
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'store_service',
				'posts_per_page' => 10,
				'paged' => $paged,
				'post__not_in' => $currentID
			));
				if ($wp_query->have_posts()) : ?>
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
					$link = get_the_permalink() . '/?email=' . $email . '&d=' . $date;
			    	?>
			    		<div class="service" >
							<div class="inner clear">
								<a class="boxlink" href="<?php echo $link; ?>">
								<!-- <a class="boxlink inline" href="#<?php echo $sani; ?>"> // for a lightbox option -->
									<span class="service-title"><?php the_title();?></span>
									<span class="bgimage" style="background-image:url('https://img.youtube.com/vi/<?php echo $vidId; ?>/hqdefault.jpg')" ></span>
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
</section>

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
<?php	endif; ?>
<?php
get_footer();
