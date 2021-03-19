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

	<?php get_sidebar('services'); ?>

	<section class="more">
	<h2>More Videos</h2>
	<?php
				$currentID = array( get_the_ID() );
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'customer_service',
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
get_footer();
