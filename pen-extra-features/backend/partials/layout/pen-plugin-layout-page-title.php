<?php
/**
 * "Pen" WordPress plug-in.
 *
 * Layout page title.
 *
 * @link       https://www.htmlpie.com/products/pen-multipurpose-wordpress-theme/
 * @since      Pen Extra Features 1.0.0
 *
 * @package    Pen Extra Features
 * @subpackage Pen Extra Features/backend/partials
 */

// Prevents direct access.
defined( 'ABSPATH' ) || die();

if ( ! function_exists( 'pen_plugin_layout_page_title' ) ) {
	/**
	 * Returns a HTML title for the Layout page.
	 *
	 * @since Pen Extra Features 1.0.0
	 * @return void
	 */
	function pen_plugin_layout_page_title() {
		$page_title[] = sprintf(
			'<span class="hp_top">%1$s</span><a href="%2$s" class="hp_title">%3$s</a>',
			esc_html__( 'Pen Theme', 'pen-extra-features' ),
			esc_url( remove_query_arg( wp_removable_query_args(), filter_input( INPUT_SERVER, 'REQUEST_URI' ) ) ),
			esc_html__( 'Layout', 'pen-extra-features' )
		);

		if ( PEN_PLUGIN_HAS_THEME ) {
			$page_title[] = sprintf(
				'<a href="%1$s" class="page-title-action hp_shortcut_header">%2$s</a>',
				esc_url( add_query_arg( array( 'autofocus[panel]' => 'pen_panel_content' ), wp_customize_url() ) ),
				esc_html__( 'More Options', 'pen-extra-features' )
			);
		}
		if ( filter_input( INPUT_GET, 'hp_back' ) ) {
			$page_title[] = sprintf(
				'<a href="%1$s" class="page-title-action hp_shortcut_header">%2$s</a>',
				esc_url( rawurldecode( filter_input( INPUT_GET, 'hp_back' ) ) ),
				esc_html__( 'Back', 'pen-extra-features' )
			);
		}
		$page_title = implode( ' ', $page_title );
		?>
		<h1 class="wp-heading-inline pen_plugin_layout" id="hp_title">
		<?php
		echo wp_kses( $page_title, wp_kses_allowed_html( 'post' ) );
		?>
		</h2>
		<?php
	}
}
