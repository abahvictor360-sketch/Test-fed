<?php
/**
 * Theme Settings page (built with the Settings API, no plugin).
 *
 * Stores logo, phone, address, fax and social media links in a single
 * option: ct_custom_theme_options.
 *
 * @package CT_Custom
 */

/**
 * Option name used to store the theme settings.
 */
define( 'CT_CUSTOM_OPTIONS', 'ct_custom_theme_options' );

/**
 * Social networks supported by the theme settings page.
 *
 * @return array Key => label.
 */
function ct_custom_social_networks() {
	return array(
		'facebook'  => __( 'Facebook', 'ct-custom' ),
		'twitter'   => __( 'Twitter', 'ct-custom' ),
		'linkedin'  => __( 'LinkedIn', 'ct-custom' ),
		'pinterest' => __( 'Pinterest', 'ct-custom' ),
	);
}

/**
 * Get one theme setting.
 *
 * @param string $key     Setting key.
 * @param mixed  $default Fallback value.
 * @return mixed
 */
function ct_custom_get_option( $key, $default = '' ) {
	$options = get_option( CT_CUSTOM_OPTIONS, array() );
	return isset( $options[ $key ] ) && '' !== $options[ $key ] ? $options[ $key ] : $default;
}

/**
 * Add the "Theme Settings" admin page.
 */
function ct_custom_add_settings_page() {
	add_menu_page(
		__( 'Theme Settings', 'ct-custom' ),
		__( 'Theme Settings', 'ct-custom' ),
		'manage_options',
		'ct-theme-settings',
		'ct_custom_render_settings_page',
		'dashicons-admin-generic',
		61
	);
}
add_action( 'admin_menu', 'ct_custom_add_settings_page' );

/**
 * Register the setting, sections and fields.
 */
function ct_custom_register_settings() {
	register_setting(
		'ct_custom_settings',
		CT_CUSTOM_OPTIONS,
		array( 'sanitize_callback' => 'ct_custom_sanitize_options' )
	);

	add_settings_section( 'ct_custom_branding', __( 'Branding', 'ct-custom' ), '__return_false', 'ct-theme-settings' );
	add_settings_field( 'logo', __( 'Logo', 'ct-custom' ), 'ct_custom_field_logo', 'ct-theme-settings', 'ct_custom_branding' );

	add_settings_section( 'ct_custom_contact', __( 'Contact Information', 'ct-custom' ), '__return_false', 'ct-theme-settings' );
	$contact_fields = array(
		'company' => array( __( 'Company Name', 'ct-custom' ), 'text' ),
		'address' => array( __( 'Address', 'ct-custom' ), 'textarea' ),
		'phone'   => array( __( 'Phone Number', 'ct-custom' ), 'tel' ),
		'fax'     => array( __( 'Fax Number', 'ct-custom' ), 'tel' ),
	);
	foreach ( $contact_fields as $key => $field ) {
		add_settings_field(
			$key,
			$field[0],
			'ct_custom_field_input',
			'ct-theme-settings',
			'ct_custom_contact',
			array(
				'key'       => $key,
				'type'      => $field[1],
				'label_for' => 'ct-' . $key,
			)
		);
	}

	add_settings_section( 'ct_custom_social', __( 'Social Media Links', 'ct-custom' ), '__return_false', 'ct-theme-settings' );
	foreach ( ct_custom_social_networks() as $key => $label ) {
		add_settings_field(
			'social_' . $key,
			$label,
			'ct_custom_field_input',
			'ct-theme-settings',
			'ct_custom_social',
			array(
				'key'       => 'social_' . $key,
				'type'      => 'url',
				'label_for' => 'ct-social_' . $key,
			)
		);
	}
}
add_action( 'admin_init', 'ct_custom_register_settings' );

/**
 * Sanitize the submitted settings.
 *
 * @param array $input Raw input.
 * @return array
 */
function ct_custom_sanitize_options( $input ) {
	$input = is_array( $input ) ? $input : array();
	$clean = array(
		'logo'    => isset( $input['logo'] ) ? absint( $input['logo'] ) : 0,
		'company' => isset( $input['company'] ) ? sanitize_text_field( $input['company'] ) : '',
		'address' => isset( $input['address'] ) ? sanitize_textarea_field( $input['address'] ) : '',
		'phone'   => isset( $input['phone'] ) ? sanitize_text_field( $input['phone'] ) : '',
		'fax'     => isset( $input['fax'] ) ? sanitize_text_field( $input['fax'] ) : '',
	);
	foreach ( array_keys( ct_custom_social_networks() ) as $key ) {
		$clean[ 'social_' . $key ] = isset( $input[ 'social_' . $key ] ) ? esc_url_raw( $input[ 'social_' . $key ] ) : '';
	}
	return $clean;
}

/**
 * Render the logo upload field (uses the WordPress media library).
 */
function ct_custom_field_logo() {
	$logo_id  = absint( ct_custom_get_option( 'logo', 0 ) );
	$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'medium' ) : '';
	?>
	<div class="ct-logo-field">
		<img class="ct-logo-preview" src="<?php echo esc_url( $logo_url ); ?>" alt="" style="max-width:240px;height:auto;display:<?php echo $logo_url ? 'block' : 'none'; ?>;margin-bottom:10px;background:#f9f9f9;padding:8px;border:1px solid #ddd;">
		<input type="hidden" id="ct-logo" name="<?php echo esc_attr( CT_CUSTOM_OPTIONS ); ?>[logo]" value="<?php echo esc_attr( $logo_id ); ?>">
		<button type="button" class="button ct-logo-upload"><?php esc_html_e( 'Upload / Select Logo', 'ct-custom' ); ?></button>
		<button type="button" class="button ct-logo-remove" style="display:<?php echo $logo_url ? 'inline-block' : 'none'; ?>;"><?php esc_html_e( 'Remove', 'ct-custom' ); ?></button>
		<p class="description"><?php esc_html_e( 'Shown in the site header. If empty, the site title is displayed.', 'ct-custom' ); ?></p>
	</div>
	<?php
}

/**
 * Render a text / tel / url / textarea field.
 *
 * @param array $args Field arguments.
 */
function ct_custom_field_input( $args ) {
	$key   = $args['key'];
	$name  = CT_CUSTOM_OPTIONS . '[' . $key . ']';
	$value = ct_custom_get_option( $key );

	if ( 'textarea' === $args['type'] ) {
		printf(
			'<textarea id="ct-%1$s" name="%2$s" rows="3" class="large-text">%3$s</textarea>',
			esc_attr( $key ),
			esc_attr( $name ),
			esc_textarea( $value )
		);
		return;
	}

	printf(
		'<input type="%1$s" id="ct-%2$s" name="%3$s" value="%4$s" class="regular-text">',
		esc_attr( $args['type'] ),
		esc_attr( $key ),
		esc_attr( $name ),
		'url' === $args['type'] ? esc_url( $value ) : esc_attr( $value )
	);
}

/**
 * Render the settings page.
 */
function ct_custom_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php settings_errors(); ?>
		<form action="options.php" method="post">
			<?php
			settings_fields( 'ct_custom_settings' );
			do_settings_sections( 'ct-theme-settings' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Load the media library and uploader script on the settings page only.
 *
 * @param string $hook Current admin page hook.
 */
function ct_custom_settings_assets( $hook ) {
	if ( 'toplevel_page_ct-theme-settings' !== $hook ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script( 'ct-custom-settings', get_template_directory_uri() . '/js/theme-settings.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'ct_custom_settings_assets' );
