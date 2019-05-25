<?php
/**
 * Template Name: What to Expect
 *
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="content-centered clear">
				<?php the_content(); ?>
			</div>


			<?php
				$steps[] = array(
						'title' => get_field('step_1_title'),
						'description' => get_field('step_1_description')
					);
				$steps[] = array(
						'title' => get_field('step_2_title'),
						'description' => get_field('step_2_description')
					);
				$steps[] = array(
						'title' => get_field('step_3_title'),
						'description' => get_field('step_3_description')
					);
				$steps[] = array(
						'title' => get_field('step_4_title'),
						'description' => get_field('step_4_description')
					);
			?>

			<div class="wrapper">
				<div class="steps-wrapper clear">
				<?php $ctr=1; foreach($steps as $s) { 
					$step_title = $s['title'];
					$step_description = $s['description'];
					$second = $ctr+2;
					if( $step_title && $step_description ) { ?>
						<div class="step wow animated fadeInDown" data-wow-delay="0.<?php echo $second?>s">
							<div class="number"><span><?php echo $ctr; ?></span></div>
							<div class="desc">
								<h3 class="title"><?php echo $step_title; ?></h3>
								<?php echo $step_description; ?>
							</div>
						</div>
					<?php $ctr++; } ?>
				<?php } ?>
				</div>
			</div>

		<?php endwhile; ?>
	</div><!-- #primary -->

<?php
get_footer();
