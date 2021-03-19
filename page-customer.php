<?php
/**
 * Template Name: Customer Portal
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

get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
		<main id="main" class="site-main wrapper" role="main">

			<?php
			while ( have_posts() ) : the_post();
				
			endwhile; // End of the loop.
			?>
			<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'customer_service',
				'posts_per_page' => 20,
				'paged' => $paged
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
			    	//$sani = sanitize_title_with_dashes( get_the_title() );

			    	?>
			    		<div class="service" >
							<div class="inner clear">
								<a class="boxlink" href="<?php the_permalink(); ?>">
								<!-- <a class="boxlink" href="#<?php echo $sani; ?>"> -->
									<span class="service-title"><?php the_title();?></span>
									<span class="bgimage" style="background-image:url('https://img.youtube.com/vi/<?php echo $vidId; ?>/hqdefault.jpg')" ></span>
									<img src="https://img.youtube.com/vi/<?php echo $vidId; ?>/hqdefault.jpg" />
								</a>
							</div>
						</div>
						<div style="display: none;">
							<div id="<?php echo $sani; ?>" class="exit-popup">
								<div class="embed-container">
								    <?php the_field('youtube_url'); ?>
								</div>
							</div>
						</div>
			    <?php endwhile; ?>
			</div><!-- ervices wrapper -->
			    <?php pagi_posts_nav(); ?>
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();