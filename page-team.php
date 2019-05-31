<?php
/**
 * Template Name: Our Team
 */

get_header(); 
$banner = get_field('banner_image'); ?>

	<div id="primary" class="full-content-area team-page clear">
		<main id="main" class="site-main clear" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if( get_the_content() ) { ?>

					<?php if (!$banner) { ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title();?></h1>
					</header>
					<?php } ?>
					
					<div class="entry-content">
						<?php the_content();?>
					</div>
				<?php } ?>
			<?php endwhile; ?>

			<?php
			$args = array(
				'posts_per_page'   => -1,
				'post_type'        => 'team',
				'post_status'      => 'publish'
			);
			$items = new WP_Query($args);
			if ( $items->have_posts() ) { ?>
			<div class="team-list clear wrapper">
				<div class="row clear flex-container">
					<?php while ( $items->have_posts() ) : $items->the_post();
						$team_name = get_the_title();
						$photo = get_field('staff_image'); 
						$team_title = get_field('staff_title'); 
						$staff_phone = get_field('staff_phone'); 
						$staff_email = get_field('staff_email'); 
						$page_link = get_permalink();
						?>
						<div id="team_<?php the_ID();?>" data-id="<?php the_ID();?>" class="team <?php echo ($photo) ? 'has-photo':'no-photo';?>">
							<div class="inside clear">
								<div class="photo">
									<?php if($photo) { ?>
										<img src="<?php echo $photo['url'];?>" alt="<?php echo $photo['title'];?>" />
									<?php } else { ?>
										<img src="<?php echo get_bloginfo('template_url')?>/images/nophoto.jpg" alt="" />
									<?php } ?>
								</div>
								<div class="info text-center">
									<h3 class="staff-name"><?php echo $team_name; ?></h3>
									<?php if($team_title) { ?>
									<div class="jobtitle"><?php echo $team_title; ?></div>
									<?php } ?>
									<?php if ($staff_phone || $staff_email) { ?>
									<div class="staff-contact">
										<?php if ($staff_phone) { ?>
											<a class="phone" href="tel:<?php echo format_phone_number($staff_phone); ?>" title="Phone: <?php echo $staff_phone ?>"><i class="icon fas fa-phone" aria-hidden="true"></i><span class="screen-reader"><?php echo $staff_phone ?></span></a>
										<?php } ?>
										<?php if ($staff_email) { ?>
											<a class="email" href="mailto:<?php echo antispambot($staff_email,1); ?>" title="Email: <?php echo antispambot($staff_email); ?>"><i class="icon fas fa-envelope" aria-hidden="true"></i><span class="screen-reader"><?php echo antispambot($staff_email); ?></span></a>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
