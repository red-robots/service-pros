<?php
/**
 * Template Name: About page
 *
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear aboutContent">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$section_1_image = get_field('section_1_image');
				$section_1_introduction = get_field('section_1_introduction');
			?>

			<section class="pp-intro-text pp-row1 text-center">
				<div class="wrapper">
					<?php echo $section_1_introduction ?>
				</div>
			</section>

			<section class="pp-row2">
				<div class="wrapper">
					<div class="flexrow">
						<?php  
						for($i=1; $i<=2; $i++) {
							$ftitle = get_field( "mv_column_".$i."_title" );
							$ftext = get_field( "mv_column_".$i."_text" ); ?>
							<?php if ($ftitle && $ftext) { ?>
							<div class="fbox">
								<div class="inside">
									<h3><?php echo $ftitle ?></h3>
									<?php echo $ftext ?>
								</div>
							</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</section>

			<?php 
				$va_title = get_field('va_title');
				$values = get_field('va_info');
			?>
			<?php if ($va_title || $values) { ?>
			<section class="pp-row3">
				<div class="wrapper">
					<?php if ($va_title) { ?>
						<h3 class="title"><span><?php echo $va_title ?></span></h3>
					<?php } ?>
					<?php if ($values) { ?>
					<div class="values-info">
						<div class="flexrow">
							<?php foreach ($values as $va) {
							$icon = $va['icon'];
							$title = $va['title'];
							$text = $va['text'];  
							if($title) {
								$title = trim(preg_replace('/\s+/',' ', $title));
								$firstChar = substr($title, 0, 1);
								$remain = str_replace($firstChar,'',$title);
								$title = '<strong>'.$firstChar.'</strong>' . $remain;
							}
							?>
								<?php if ($text) { ?>
								<div class="vbox">
									<div class="vinside">
										<?php if ($icon) { ?>
										<div class="icon">
											<span class="image" style="background-image:url('<?php echo $icon['url'] ?>')"></span>
										</div>	
										<?php } ?>
										<?php if ($title) { ?>
										<div class="vtitle"><?php echo $title ?></div>
										<?php } ?>
										<?php if ($text) { ?>
										<div class="vtext"><?php echo $text ?></div>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</section>
			<?php } ?>


			<?php 
			$timelineBg = get_field('timeline_image_bg'); 
			$timeline_title = get_field('timeline_title'); 
			$timelines = get_field('timeline_'); 
			$div_bg = '';
			if($timelineBg){
				$div_bg = ' style="background-image:url('.$timelineBg['url'].')"';
			}
			?>
			<section class="pp-row4 timeline-section"<?php echo $div_bg ?>>
				<div class="overlay"></div>
				<div class="wrapper">
					<?php if ($timeline_title) { ?>
						<h2 class="sctitle text-center"><?php echo $timeline_title ?></h2>
					<?php } ?>
					<?php if ($timelines) { ?>
					<div class="timelines-wrap">
						<div class="noflexrow clear">
						<?php $j=1; foreach ($timelines as $t) { 
							$date = $t['date']; 
							$description = $t['description']; ?>
							<div data-date="<?php echo $date ?>" class="timeline col<?php echo $j?> <?php echo ($j % 2) ? 'odd':'even'?>">
								<div class="tmwrap clear">
								<?php if ($date) { ?>
									<span class="timeline_date"><?php echo $date ?></span>
								<?php } ?>
								<?php if ($description) { ?>
									<div class="timeline_info"><?php echo $description ?></div>
								<?php } ?>
								</div>
							</div>
						<?php $j++; } ?>
						</div>
						<div class="hline"><div class="line"></div></div>
					</div>
					<?php } ?>
				</div>
			</section>

			<?php 
				$section_3_image = get_field('section_3_image');
				$section_3_introduction = get_field('section_3_introduction');
				$section_3_description = get_field('section_3_description');
			?>

			<section class="pp-row5 partnership-section">
				<div class="flexrow clear">
					<div class="imagecol flexbox">
						<?php if ($section_3_image) { ?>
							<div class="imagediv" style="background-image:url('<?php echo $section_3_image['url'];?>')"></div>
						<?php } ?>
						<?php if ($section_3_introduction) { ?>
							<div class="intro"><?php echo $section_3_introduction ?></div>
						<?php } ?>
					</div>
					<div class="textcol flexbox">
						<?php if ($section_3_description) { ?>
							<div class="inside">
								<div class="text"><?php echo $section_3_description ?></div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
	</div><!-- #primary -->

<?php
get_footer();
