<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

$ct_custom_phone = ct_custom_get_option( 'phone' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<div class="top-bar">
		<div class="container">
			<?php if ( $ct_custom_phone ) : ?>
				<p class="top-bar__phone">
					<span><?php esc_html_e( 'Call us now!', 'ct-custom' ); ?></span>
					<a href="<?php echo esc_attr( ct_custom_tel( $ct_custom_phone ) ); ?>"><?php echo esc_html( $ct_custom_phone ); ?></a>
				</p>
			<?php endif; ?>
			<p class="top-bar__account">
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Account', 'ct-custom' ); ?></a>
					<a class="is-strong" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Logout', 'ct-custom' ); ?></a>
				<?php else : ?>
					<a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( 'Login', 'ct-custom' ); ?></a>
					<a class="is-strong" href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e( 'Signup', 'ct-custom' ); ?></a>
				<?php endif; ?>
			</p>
		</div>
	</div>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php ct_custom_site_logo(); ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary', 'ct-custom' ); ?>">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="menu-toggle__bars" aria-hidden="true"></span>
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></span>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
