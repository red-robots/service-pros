<?php
/**
 * Template Name: About page
 *
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$section_1_image = get_field('section_1_image');
				$section_1_introduction = get_field('section_1_introduction');
				$section_1_description = get_field('section_1_description');
				$section1Style = '';
				if($section_1_image) {
					$section1Style = ' style="background-image:url('.$section_1_image['url'].')"';
				}
			?>

			<section class="section section_one clear">
				<div class="column column1"<?php echo $section1Style;?>>
					<div class="textwrap">
						<?php echo $section_1_introduction; ?>
					</div>
				</div>
				<div class="column column2">
					<div class="textwrap">
						<?php echo $section_1_description; ?>
					</div>
				</div>
			</section>

			<?php
				$timeline_title = get_field('timeline_title');
				$timelines = get_field('timeline_');
			?>
			<section class="section section_two clear">
				<div class="wrapper">
					<?php if($timeline_title) { ?>
						<h2 class="section-title"><?php echo $timeline_title;?></h2>
					<?php } ?>
					<?php if($timelines) { ?>
					<div class="timelines clear">
						<div class="vline"><span></span></div>
						<?php
							$count_timeline = count($timelines);
							$i=1; foreach($timelines as $tm) { 
							$is_align_center = ( isset($tm['align_center']) && $tm['align_center'] ) ? true : false;
							$divclass = ($i % 2) ? 'odd':'even';
							if($is_align_center) {
								$divclass = 'centered';
							}
							$i_date = $tm['date'];
							$i_description = $tm['description'];
							$i_timeline_image = $tm['timeline_image'];
							$i_image_position = $tm['image_position'];
							?>

							<div class="inforow<?php echo $i;?> info-wrapper<?php echo ($is_align_center) ? ' aligned-center':''; ?> <?php echo $i_image_position?>_image<?php echo ($i==1) ? ' first':'';?><?php echo ($i==$count_timeline) ? ' last':'';?>">
								<div class="info-outer <?php echo $divclass;?>">
									<div class="info <?php echo $divclass;?>">

									<?php if($i_image_position=='top') { ?>

										<?php if($i_timeline_image) { ?>
										<div class="timeline-image">
											<img src="<?php echo $i_timeline_image['url']; ?>" alt="<?php echo $i_timeline_image['title']; ?>" />
										</div>
										<?php } ?>

										<div class="details clear">
											<?php if($i_date) { ?>
												<div class="date"><span><?php echo $i_date ?></span></div>
											<?php } ?>

											<?php if($i_description) { ?>
												<div class="description clear"><div class="midtext"><?php echo $i_description ?></div></div>
											<?php } ?>
										</div>

									<?php } else { ?>

										<div class="details clear">
											<?php if($i_date) { ?>
												<div class="date"><span><?php echo $i_date ?></span></div>
											<?php } ?>

											<?php if($i_description) { ?>
												<div class="description clear"><div class="midtext"><?php echo $i_description ?></div></div>
											<?php } ?>
										</div>

										<?php if($i_timeline_image) { ?>
										<div class="timeline-image">
											<img src="<?php echo $i_timeline_image['url']; ?>" alt="<?php echo $i_timeline_image['title']; ?>" />
										</div>
										<?php } ?>

									<?php } ?>
									</div>
								</div>
								<span class="arrow-down"></span>
							</div>

						<?php $i++; } ?>
					</div>
					<?php } ?>
				</div>
			</section>


			<?php
				$section_3_image = get_field('section_3_image');
				$section_3_introduction = get_field('section_3_introduction');
				$section_3_description = get_field('section_3_description');
				$section3Style = '';
				if($section_3_image) {
					$section3Style = ' style="background-image:url('.$section_3_image['url'].')"';
				}
			?>

			<section class="section section_three clear">
				<div class="column column1"<?php echo $section3Style;?>>
					<div class="textwrap">
						<?php echo $section_3_introduction; ?>
					</div>
				</div>
				<div class="column column2">
					<div class="textwrap">
						<?php echo $section_3_description; ?>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
