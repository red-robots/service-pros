<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136611224-5"></script>
<script src="http://www.youtube.com/player_api"></script>
<?php //get_template_part('inc/chat-one'); ?>
<script type="text/javascript" charset="utf-8">
  (function (g, e, n, es, ys) {
    g['_genesysJs'] = e;
    g[e] = g[e] || function () {
      (g[e].q = g[e].q || []).push(arguments)
    };
    g[e].t = 1 * new Date();
    g[e].c = es;
    ys = document.createElement('script'); ys.async = 1; ys.src = n; ys.charset = 'utf-8'; document.head.appendChild(ys);
  })(window, 'Genesys', 'https://apps.usw2.pure.cloud/genesys-bootstrap/genesys.min.js', {
    environment: 'usw2',
    deploymentId: 'd97561dd-37fe-4ffd-8fe9-6d82a84cf7d7'
  });</script>
<?php if( $customScripts = get_field("customHeaderScripts","option") ) { echo $customScripts; } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	





<!-- <form id="chatForm">
        <h3>Participant Information- local</h3>

        <table class="webchat-config">
            <tbody>
                <tr>
                    <th>First Name:</th>
                    <td><input type="text" id="first-name" value="John" /></td>
                </tr>
                <tr>
                    <th>Last Name:</th>
                    <td><input type="text" id="last-name" value="Doe" /></td>
                </tr>
                <tr>
                    <th>Agent Email:</th>
                    <td><input type="text" id="agent-email" value="alex.agent@example.com" /></td>
                </tr>
            </tbody>
        </table>
        <button type="button" id="chat-button">Start Chat</button>
    </form> -->
   




<div id="page" class="site clear">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header clear" role="banner">
		
		<div class="top-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'top' )); ?>
		</div>		
		<div class="wrapper">
			
			<?php if(is_home()) { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		            </a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		            </a>
	            </div>
	        <?php } ?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
	</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php if(!is_home()) { ?>
		<?php get_template_part('template-parts/banner'); ?>
	<?php } ?>


	<div id="content" class="site-content clear">
