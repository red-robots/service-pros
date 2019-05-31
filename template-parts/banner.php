<?php
global $post;
// $pages = array('about-us');
// $post_name = $post->post_name;
$banner_image = get_field('banner_image'); ?>

<?php if($banner_image) { ?>
<div class="banner clear">
	<h1 class="pagetoptitle"><span><?php echo get_the_title(); ?></span></h1>;
	<img src="<?php echo $banner_image['url']?>" alt="<?php echo $banner_image['title']?>" />
</div>
<?php } ?>