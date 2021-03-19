<?php 
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

// get Oembed
$yTurl = get_field( 'youtube_url' );
// extract the url of the oembed
preg_match('/src="(.+?)"/', $yTurl, $matches);
$src = $matches[1];    
// if the url has correct formatting   
if (($pos = strpos($src, "embed/")) !== FALSE) { 
    $whatIWant = substr($src, $pos+6); 
} 
// strip the rest
$arr = explode("?", $whatIWant, 2);
$vidId = $arr[0];

// Show popup?
$pop = get_field( 'popup_after_video' );


// echo '<pre>';
// print_r($vidId);
// echo '</pre>';

?>

<div id="primary" class="full-content-area wrapper articles-wrapper single-post clear">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
			<?php the_content();  ?>
			<?php /*

					Player renders out of this div

			*/ ?>
			<div id="player"></div>
			<?php /*

					Script to render and add callbacks

			*/ ?>
			<script>

		        // create youtube player
		        var player;
		        function onYouTubePlayerAPIReady() {
		            player = new YT.Player('player', {
		              width: '640',
		              height: '390',
		              videoId: '<?php echo $vidId; ?>',
		              events: {
		                //onReady: onPlayerReady, // not sure if we need right now
		                onStateChange: onPlayerStateChange
		              }
		            });
		        }

		        // autoplay video
		        // function onPlayerReady(event) {
		        //     event.target.playVideo();
		        // }

		        
		        

		    </script>

		    <?php if( $pop == 'show') {  ?> 
			    <script type="text/javascript">
			    	// when video ends
			    	function onPlayerStateChange(event) {        
			            if(event.data === 0) {          
			                //alert('done');
			                $.colorbox({
								inline:true, 
								href:".exit-popup"
							});
			            }
			        }
			               
				</script>   
		    <?php  } ?>
		    <?php /*

					Popup div

			*/ ?>
			<div style="display: none;">
				<div class="exit-popup">
					<?php 
						echo do_shortcode('[gravityform id="4" title="false" description="true"]');

					 ?>
				</div>
			</div>
			</div>
	<?php endwhile;  ?>

	</main><!-- #main -->

	<?php get_sidebar(); ?>
</div><!-- #primary -->

<?php
get_footer();