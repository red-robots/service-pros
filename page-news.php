<?php
/**
 * Template Name: News page	
 */

get_header(); ?>

<div id="primary" class="full-content-area wrapper articles-wrapper clear">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();
			if(get_the_content()) {
				get_template_part( 'template-parts/content', 'page' );
			}
		endwhile; ?>


		<?php  
			$perpage = 6;
			$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
			$args = array(
				'posts_per_page'   => $perpage,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				'paged'			   => $paged
				);
			$news = new WP_Query($args);
			if ( $news->have_posts() ) { ?>
			<div class="flex-container clear news-list">
				<?php while ( $news->have_posts() ) : $news->the_post(); ?>
				<div class="excerpt postcol">
					<div class="inside clear">
						<h3 class="post-title"><?php the_title(); ?></h3>
						<div class="post-excerpt">
							<?php if ($content = get_the_content()) {
								$p_id = get_the_ID();
								$s_content = strip_shortcodes($content);
								$s_content = strip_tags($s_content); 
								if( has_excerpt() ) {
									$excerpt_text = get_the_excerpt();
								} else {
									$excerpt_text = shortenText($s_content,180,',','...');
								}
								echo $excerpt_text;
								?>
							<?php } ?>
						</div>
						<div class="post-link"><a href="<?php echo get_permalink()?>">Continue Reading <span>&rarr;</span></a></div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<?php } ?>

			<?php
                $total_pages = $news->max_num_pages;
                if ($total_pages > 1){ ?>
                    <div id="pagination" class="pagination-wrapper clear assignment_pagination">
                        <div class="the_paginate_list clear">
                            <?php
                                $big = 999999999;
                                $pagination = array(
                                    'base' => @add_query_arg('pg','%#%'),
                                    'format' => '?paged=%#%',
                                    'current' => $paged,
                                    'total' => $total_pages,
                                    'prev_text' => __( '&laquo;', 'red_partners' ),
                                    'next_text' => __( '&raquo;', 'red_partners' ),
                                    'type' => 'plain'
                                );
                                echo paginate_links($pagination);
                            ?>
                        </div>
                    </div>
                    <?php
                }
            ?>

	</main><!-- #main -->


	<?php get_sidebar(); ?>
</div><!-- #primary -->

<?php
get_footer();
