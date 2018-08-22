<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

/* Start the Loop for homepage */
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
if ( have_posts() ) : the_post(); 

	$banner = get_field('banner');
	$boxIcon1 = get_field('box_1_icon');
	$boxText1 = get_field('box_1_text');
	$boxLink1 = get_field('box_1_link');
	$boxIcon2 = get_field('box_2_icon');
	$boxText2 = get_field('box_2_text');
	$boxLink2 = get_field('box_2_link');
	$boxIcon3 = get_field('box_3_icon');
	$boxText3 = get_field('box_3_text');
	$boxLink3 = get_field('box_3_link');

endif;

?>
<div class="banner">
	<img src="<?php echo $banner['url'] ?>" alt="<?php echo $banner['alt'] ?>">			
</div>

	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'testimonial',
		'posts_per_page' => 10,
	));
	if ($wp_query->have_posts()) : ?>
		<section class="testimonials">
			<div class="flexslider-container">
				<div class="flexslider">
					<ul class="slides">
					    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					    	<li>
					    		
				    			<div class="quote">
					    			<?php the_content(); ?>
					    		</div>
					    		<div class="signed">
					    			<?php the_title(); ?>
					    		</div>
					    		
					    	</li>
					    <?php endwhile; ?>
			    	</ul>
			   	</div>
		   	</div>
		</section>
	<?php endif; ?>

	<section class="home-boxes">
		<div class="box">
			<a href="<?php echo $boxLink1 ?>">
				<div class="icon">
					<img src="<?php echo $boxIcon1['url'] ?>" alt="<?php echo $boxIcon1['alt'] ?>">
				</div>
				<div class="desc">
					<?php echo $boxText1; ?>
				</div>
			</a>
		</div>
		<div class="box">
			<a href="<?php echo $boxLink2 ?>">
				<div class="icon">
					<img src="<?php echo $boxIcon2['url'] ?>" alt="<?php echo $boxIcon2['alt'] ?>">
				</div>
				<div class="desc">
					<?php echo $boxText2; ?>
				</div>
			</a>
		</div>
		<div class="box">
			<a href="<?php echo $boxLink3 ?>">
				<div class="icon">
					<img src="<?php echo $boxIcon3['url'] ?>" alt="<?php echo $boxIcon3['alt'] ?>">
				</div>
				<div class="desc">
					<?php echo $boxText3; ?>
				</div>
			</a>
		</div>
	</section>


<?php
get_footer();
