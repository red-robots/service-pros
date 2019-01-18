<?php
/**
 * Template Name: Become an Installer
 *
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$introduction_image = get_field('introduction_image');
				$introduction_text = get_field('introduction_text');
				$introduction_description = get_field('introduction_description');
				$overlay_text = get_field('overlay_text');
				$section1Style = '';
				if($introduction_image) {
					$section1Style = ' style="background-image:url('.$introduction_image['url'].')"';
				}
			?>

			<section class="section section_one clear">
				<div class="column column1"<?php echo $section1Style;?>>
					<div class="textwrap<?php echo ($overlay_text=='yes') ? ' darkbg':'';?>">
						<?php echo $introduction_text; ?>
					</div>
				</div>
				<div class="column column2 bullets-normal">
					<div class="textwrap">
						<?php echo $introduction_description; ?>
					</div>
				</div>
			</section>

			<?php
				$form_title = get_field('form_title');
				$form_shortcode = get_field('form_shortcode');
				$has_content = get_the_content();
			?>

			<section class="section-main-content clear <?php echo ($has_content || $form_shortcode) ? 'has-copy':'no-copy';?>">

				<?php if(do_shortcode($form_shortcode)) { ?>

					<div class="formdiv <?php echo ($has_content) ? 'has-copy':'no-copy clear';?>">
						<div class="inside clear">
							<?php if( $form_title ) { ?>
								<h3 class="formtitle"><?php echo $form_title; ?></h3>
							<?php } ?>
							<?php echo do_shortcode($form_shortcode); ?>
						</div>
					</div>

					<?php if( $has_content ) { ?>
					<div class="copydiv clear">
						<div class="inside clear"><?php echo get_the_content(); ?></div>
					</div>
					<?php } ?>
					
				<?php } else { ?>

					<?php if( $has_content ) { ?>
					<div class="wrapper">
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
					</div>
					<?php } ?>

				<?php } ?>
			</section>
			

		<?php endwhile; ?>
	</div><!-- #primary -->
<?php
get_footer();
