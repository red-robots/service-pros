<?php
$banner_image = get_field('banner_image');
?>
<?php if($banner_image) { ?>
<div class="banner clear">
	<img src="<?php echo $banner_image['url']?>" alt="<?php echo $banner_image['title']?>" />
</div>
<?php } ?>