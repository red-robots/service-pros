<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

<div id="primary" class="full-content-area wrapper articles-wrapper single-post clear">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content"><?php the_content(); ?></div>
	<?php endwhile;  ?>

	</main><!-- #main -->

	<?php get_sidebar(); ?>
</div><!-- #primary -->

<?php
get_footer();
