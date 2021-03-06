<?php
/**
 * Template Name: Services Bak
 *
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
		<main id="main" class="site-main wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if( get_the_content() ) { ?>
					<div class="content-centered clear">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php } ?>

				<?php
					$services = get_field('service_type');
				?>
				<?php if($services) { ?>
				<div class="services-wrapper">
					<?php foreach($services as $sv) { 
					$svc_title = $sv['service_title'];
					$svc_link = ($sv['service_link']) ? $sv['service_link'] : '#';
					$svc_image = $sv['service_image']; ?>
						<?php if($svc_image) { ?>
						<div class="service" data-url="<?php echo $svc_link;?>">
							<div class="inner clear">
								<a class="boxlink" href="<?php echo $svc_link;?>" target="_blank">
									<span class="service-title"><?php echo $svc_title;?></span>
									<span class="bgimage" style="background-image:url('<?php echo $svc_image['url'];?>')" ></span>
									<img src="<?php echo $svc_image['url'];?>" alt="<?php echo $svc_image['title'];?>" />
								</a>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
				<?php } ?>

			<?php endwhile;  ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
