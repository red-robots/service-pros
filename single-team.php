<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

<div id="primary" class="full-content-area staff-detail-page clear">
	<main id="main" class="site-main wrapper" role="main">

	<?php while ( have_posts() ) : the_post(); 
		$team_name = get_the_title();
		$photo = get_field('staff_image'); 
		$staff_title = get_field('staff_title'); 
		$staff_phone = get_field('staff_phone'); 
		$staff_email = get_field('staff_email'); 
		$has_side = ($photo || $staff_phone || $staff_email || $staff_title)  ? true:false;
		?>

		<div class="staff-info <?php echo ($photo) ? 'has-photo':'no-photo'?>">
			<header class="entry-header">
				<h1 class="entry-title"><?php echo $team_name; ?></h1>
				<?php if($staff_title) { ?>
				<div class="staff-title">
					<?php echo $staff_title; ?>
				</div>
				<?php } ?>
			</header>
			<div class="entry-content"><?php the_content(); ?></div>
		</div>

		<?php if($has_side) { ?>
		<div class="side-right">
			<?php if($photo) { ?>
			<div class="staff-photo">
				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['title']; ?>" />
			</div>
			<?php } ?>

			<div class="contactdiv">
				<?php if($staff_phone) { ?>
				<div class="contact">
					<span class="icon"><i class="fa fa-phone"></i></span> <?php echo $staff_phone; ?>
				</div>
				<?php } ?>

				<?php if($staff_email) { ?>
				<div class="contact">
					<span class="icon"><i class="fa fa-envelope"></i></span><a href="mailto:<?php echo $staff_email; ?>"><?php echo $staff_email; ?></a>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>



	<?php endwhile;  ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
