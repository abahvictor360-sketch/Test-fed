<?php
/**
 * Homepage template helpers: page fields meta box, breadcrumbs, contact
 * details and social icons.
 *
 * @package CT_Custom
 */

/**
 * Editable fields shown in the "Homepage Sections" meta box.
 *
 * @return array Meta key => label.
 */
function ct_custom_homepage_fields() {
	return array(
		'_ct_heading'       => __( 'Page heading (defaults to the page title)', 'ct-custom' ),
		'_ct_contact_title' => __( 'Contact section title', 'ct-custom' ),
		'_ct_contact_form'  => __( 'Contact form shortcode', 'ct-custom' ),
		'_ct_reach_title'   => __( 'Reach us section title', 'ct-custom' ),
	);
}

/**
 * Register the meta box on pages using the Homepage template.
 *
 * @param WP_Post $post Current post.
 */
function ct_custom_add_homepage_meta_box( $post ) {
	if ( 'homepage.php' !== get_page_template_slug( $post ) ) {
		return;
	}
	add_meta_box( 'ct-homepage-sections', __( 'Homepage Sections', 'ct-custom' ), 'ct_custom_render_homepage_meta_box', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes_page', 'ct_custom_add_homepage_meta_box' );

/**
 * Render the meta box.
 *
 * @param WP_Post $post Current post.
 */
function ct_custom_render_homepage_meta_box( $post ) {
	wp_nonce_field( 'ct_custom_homepage_meta', 'ct_custom_homepage_nonce' );
	echo '<p>' . esc_html__( 'The editor content above is shown as the intro text. Address, phone, fax and social links come from Theme Settings.', 'ct-custom' ) . '</p>';
	foreach ( ct_custom_homepage_fields() as $key => $label ) {
		printf(
			'<p><label for="%1$s"><strong>%2$s</strong></label><br><input type="text" id="%1$s" name="%1$s" value="%3$s" class="widefat"></p>',
			esc_attr( $key ),
			esc_html( $label ),
			esc_attr( get_post_meta( $post->ID, $key, true ) )
		);
	}
}

/**
 * Save the meta box values.
 *
 * @param int $post_id Post ID.
 */
function ct_custom_save_homepage_meta( $post_id ) {
	if ( ! isset( $_POST['ct_custom_homepage_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['ct_custom_homepage_nonce'] ), 'ct_custom_homepage_meta' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}
	foreach ( array_keys( ct_custom_homepage_fields() ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
		}
	}
}
add_action( 'save_post_page', 'ct_custom_save_homepage_meta' );

/**
 * Get a homepage field with a fallback.
 *
 * @param string $key     Meta key.
 * @param string $default Fallback.
 * @return string
 */
function ct_custom_page_field( $key, $default = '' ) {
	$value = get_post_meta( get_the_ID(), $key, true );
	return '' !== $value ? $value : $default;
}

/**
 * Print the breadcrumb trail: Home / ancestors / current page.
 */
function ct_custom_breadcrumbs() {
	$items = array( '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'ct-custom' ) . '</a>' );

	if ( is_page() ) {
		foreach ( array_reverse( get_post_ancestors( get_the_ID() ) ) as $ancestor ) {
			$items[] = '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a>';
		}
		$items[] = '<span aria-current="page">' . esc_html( ct_custom_page_field( '_ct_heading', get_the_title() ) ) . '</span>';
	} elseif ( is_singular() || is_archive() || is_search() ) {
		$items[] = '<span aria-current="page">' . esc_html( is_singular() ? get_the_title() : wp_strip_all_tags( get_the_archive_title() ) ) . '</span>';
	}

	echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'ct-custom' ) . '">' . implode( ' <span class="sep">/</span> ', $items ) . '</nav>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Print the site logo from Theme Settings, or the site title as a fallback.
 */
function ct_custom_site_logo() {
	$logo_id = absint( ct_custom_get_option( 'logo', 0 ) );
	$tag     = is_front_page() ? 'h1' : 'p';

	printf( '<%s class="site-logo">', esc_attr( $tag ) );
	echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
	if ( $logo_id ) {
		echo wp_get_attachment_image( $logo_id, 'full', false, array( 'alt' => get_bloginfo( 'name' ) ) );
	} else {
		echo esc_html( get_bloginfo( 'name' ) );
	}
	echo '</a>';
	printf( '</%s>', esc_attr( $tag ) );
}

/**
 * Turn a phone number into a tel: link target.
 *
 * @param string $number Phone number as displayed.
 * @return string
 */
function ct_custom_tel( $number ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $number );
}

/**
 * SVG icons for the social networks.
 *
 * @param string $network Network key.
 * @return string
 */
function ct_custom_social_icon( $network ) {
	$paths = array(
		'facebook'  => 'M13.5 21v-8h2.7l.4-3.2h-3.1V7.8c0-.9.3-1.5 1.6-1.5h1.7V3.4c-.3 0-1.3-.1-2.4-.1-2.4 0-4 1.5-4 4.1v2.4H7.6V13h2.8v8h3.1z',
		'twitter'   => 'M21 6.3c-.7.3-1.4.5-2.1.6.8-.5 1.3-1.2 1.6-2-.7.4-1.5.7-2.3.9a3.7 3.7 0 0 0-6.3 3.4C8.8 9 6.1 7.6 4.3 5.4c-1 1.7-.5 3.8 1.1 4.9-.6 0-1.2-.2-1.7-.5 0 1.8 1.3 3.3 3 3.7-.5.2-1.1.2-1.7.1.5 1.5 1.9 2.5 3.5 2.6A7.4 7.4 0 0 1 3 17.7 10.5 10.5 0 0 0 19.1 8.3v-.5c.7-.5 1.4-1.1 1.9-1.5z',
		'linkedin'  => 'M6.9 20H3.6V9.3h3.3V20zM5.3 7.8a1.9 1.9 0 1 1 0-3.8 1.9 1.9 0 0 1 0 3.8zM20.4 20h-3.3v-5.2c0-1.2 0-2.8-1.7-2.8s-2 1.3-2 2.7V20H10V9.3h3.2v1.5c.4-.8 1.5-1.7 3.1-1.7 3.4 0 4 2.2 4 5.1V20z',
		'pinterest' => 'M12.3 3C7.4 3 4.8 6.2 4.8 9.7c0 1.6.9 3.6 2.3 4.3.2.1.3 0 .4-.2l.3-1.3c0-.1 0-.2-.1-.3-.5-.6-.8-1.5-.8-2.4 0-2.4 1.8-4.6 4.8-4.6 2.6 0 4.5 1.8 4.5 4.3 0 2.9-1.5 4.9-3.4 4.9-1 0-1.8-.9-1.6-1.9.3-1.3.9-2.6.9-3.5 0-.8-.4-1.5-1.3-1.5-1 0-1.9 1.1-1.9 2.5 0 .9.3 1.5.3 1.5l-1.3 5.3c-.3 1.5 0 3.5.1 3.7h.2c.2-.3 1.6-2.3 2-3.8l.7-2.7c.4.7 1.5 1.3 2.7 1.3 3.6 0 6.2-3.3 6.2-7.4C20 6 16.7 3 12.3 3z',
	);
	if ( ! isset( $paths[ $network ] ) ) {
		return '';
	}
	return '<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false"><path fill="currentColor" d="' . $paths[ $network ] . '"/></svg>';
}

/**
 * Print the social links saved in Theme Settings.
 */
function ct_custom_social_links() {
	$links = '';
	foreach ( ct_custom_social_networks() as $key => $label ) {
		$url = ct_custom_get_option( 'social_' . $key );
		if ( $url ) {
			$links .= sprintf(
				'<li><a class="social-%1$s" href="%2$s" target="_blank" rel="noopener noreferrer"><span class="screen-reader-text">%3$s</span>%4$s</a></li>',
				esc_attr( $key ),
				esc_url( $url ),
				esc_html( $label ),
				ct_custom_social_icon( $key )
			);
		}
	}
	if ( $links ) {
		echo '<ul class="social-links">' . $links . '</ul>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
