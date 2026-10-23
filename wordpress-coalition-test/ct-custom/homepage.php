<?php
/**
 * Template Name: Homepage
 *
 * Intro copy comes from the page editor, section titles and the form
 * shortcode from the "Homepage Sections" meta box, and the contact details
 * from Theme Settings.
 *
 * @package CT_Custom
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

		<?php
		while ( have_posts() ) :
			the_post();

			$ct_custom_form    = ct_custom_page_field( '_ct_contact_form' );
			$ct_custom_company = ct_custom_get_option( 'company' );
			$ct_custom_address = ct_custom_get_option( 'address' );
			$ct_custom_phone   = ct_custom_get_option( 'phone' );
			$ct_custom_fax     = ct_custom_get_option( 'fax' );
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'homepage' ); ?>>
				<?php ct_custom_breadcrumbs(); ?>

				<header class="entry-header">
					<h2 class="entry-title"><?php echo esc_html( ct_custom_page_field( '_ct_heading', get_the_title() ) ); ?></h2>
				</header>

				<div class="entry-content intro">
					<?php the_content(); ?>
				</div>

				<div class="contact-grid">
					<section class="contact-grid__form">
						<h3 class="section-title"><?php echo esc_html( ct_custom_page_field( '_ct_contact_title', __( 'Contact Us', 'ct-custom' ) ) ); ?></h3>
						<?php
						if ( $ct_custom_form ) {
							echo do_shortcode( $ct_custom_form ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
					</section>

					<section class="contact-grid__info">
						<h3 class="section-title"><?php echo esc_html( ct_custom_page_field( '_ct_reach_title', __( 'Reach Us', 'ct-custom' ) ) ); ?></h3>
						<address class="reach-us">
							<?php if ( $ct_custom_company ) : ?>
								<strong class="reach-us__company"><?php echo esc_html( $ct_custom_company ); ?></strong>
							<?php endif; ?>
							<?php if ( $ct_custom_address ) : ?>
								<span class="reach-us__address"><?php echo nl2br( esc_html( $ct_custom_address ) ); ?></span>
							<?php endif; ?>
							<?php if ( $ct_custom_phone || $ct_custom_fax ) : ?>
								<span class="reach-us__numbers">
									<?php if ( $ct_custom_phone ) : ?>
										<?php esc_html_e( 'Phone:', 'ct-custom' ); ?> <a href="<?php echo esc_attr( ct_custom_tel( $ct_custom_phone ) ); ?>"><?php echo esc_html( $ct_custom_phone ); ?></a><br>
									<?php endif; ?>
									<?php if ( $ct_custom_fax ) : ?>
										<?php esc_html_e( 'Fax:', 'ct-custom' ); ?> <?php echo esc_html( $ct_custom_fax ); ?>
									<?php endif; ?>
								</span>
							<?php endif; ?>
						</address>
						<?php ct_custom_social_links(); ?>
					</section>
				</div>
			</article>

		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
