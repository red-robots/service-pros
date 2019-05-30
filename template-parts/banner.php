<?php
global $post;
$pages = array('about-us');
$post_name = $post->post_name;
$banner_image = get_field('banner_image'); ?>

<?php if($banner_image) { ?>
<div class="banner clear">
	<?php if( in_array($post_name, $pages) ) { ?>
	<h1 class="pagetoptitle"><span><?php echo $post->post_title ?></span></h1>;
	<?php } ?>
	<img src="<?php echo $banner_image['url']?>" alt="<?php echo $banner_image['title']?>" />
</div>
<?php } ?>