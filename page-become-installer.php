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
				$section1Style = '';
				if($introduction_image) {
					$section1Style = ' style="background-image:url('.$introduction_image['url'].')"';
				}
			?>

			<section class="section section_one clear">
				<div class="column column1"<?php echo $section1Style;?>>
					<div class="textwrap darkbg">
						<?php echo $introduction_text; ?>
					</div>
				</div>
				<div class="column column2 bullets-normal">
					<div class="textwrap">
						<?php echo $introduction_description; ?>
					</div>
				</div>
			</section>

			<?php if(get_the_content()) { ?>
			<section class="section-main-content">
				<div class="wrapper">
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</div>
			</section>
			<?php } ?>

		<?php endwhile; ?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
