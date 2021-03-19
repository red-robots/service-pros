<?php
/**
 * Template Name: Services Portal
 *
 */

get_header(); 

$id = get_the_ID();
?>

	<div id="primary" class="full-content-area clear default-temp">
		<main id="main" class="site-main wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if( get_the_content() ) { ?>
					<div class="content-centered clear">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php } ?>
			<?php endwhile;  ?>
				<?php
				$args = array(
					'post_type' => 'page',
					'post_parent' => $id
				);
					// The Query
					$the_query = new WP_Query( $args );
					 
					// The Loop
					if ( $the_query->have_posts() ) {
				?>
				<div class="services-wrapper">
					<?php while ( $the_query->have_posts() ) { $the_query->the_post();
					$svc_image = wp_get_attachment_image_src( get_post_thumbnail_id() ); 
					// echo '<pre>';
					// print_r($svc_image);
					echo '</pre>';
					?>
						<?php if($svc_image) { ?>
						<div class="service" data-url="<?php echo $svc_link;?>">
							<div class="inner clear">
								<a class="boxlink" href="<?php the_permalink(); ?>">
									<span class="service-title"><?php the_title(); ?></span>
									<span class="bgimage" style="background-image:url('<?php echo $svc_image[0];?>')" ></span>
									<img src="<?php echo $svc_image[0];?>" alt="<?php //echo $svc_image['title'];?>" />
								</a>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
				<?php } ?>

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
