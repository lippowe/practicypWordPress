<?php
/**
 * Register admin menu elements.
 *
 * @since   1.0.5
 * @package WPZOOM_Portfolio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class for admin menu.
 */
class WPZOOM_Portfolio_Admin_Menu {

	/**
	 * Go Pro link.
	 *
	 * @var string
	 */
	private static $goProLink = 'https://www.wpzoom.com/plugins/portfolio-pro/?utm_source=wpadmin&utm_medium=portfolio-free&utm_campaign=go-pro-links';

	/**
	 * The Constructor.
	 */
	public function __construct() {

		// Let's add menu item with subitems
		add_action( 'admin_menu', array( $this, 'register_menus' ), 15 );
		add_action( 'plugin_action_links_' . WPZOOM_PORTFOLIO_PLUGIN_BASE, array( $this, 'plugin_action_links' ) );
		
		add_action( 'admin_menu', array( $this, 'plugin_add_go_pro_link_to_menu' ), 15 );

		add_action( 'admin_head', array( $this, 'add_css_go_pro_menu' ) );
		add_action( 'admin_footer', array( $this, 'add_target_blank_go_pro_menu' ) );

	}

	/**
	 * Add settings and go PRO link to plugin page.
	 *
	 * @param array $links Array of links.
	 * @return array
	 */
	public function plugin_action_links( $links ) {

		// Settings link
		$settings_link = '<a href="' . admin_url( 'edit.php?post_type=portfolio_item&page=wpzoom-portfolio-settings' ) . '">' . esc_html__( 'Settings', 'wpzoom-portfolio' ) . '</a>';

		// Add settings link to the array
		array_unshift( $links, $settings_link );

		// Add Go Pro link if the plugin is not active
		if( ! defined( 'WPZOOM_PORTFOLIO_PRO_VERSION' ) && ! wpzoom_theme_has_portfolio() ) {
			$links['go_pro'] = sprintf( 
				'<a href="%1$s" target="_blank" class="wpzoom-portfolio-gopro" style="color:#0BB4AA;font-weight:bold;">UPGRADE &rarr; <span class="rcb-premium-badge" style="background-color: #0BB4AA; color: #fff; margin-left: 5px; font-size: 11px; min-height: 16px;  border-radius: 8px; display: inline-block; font-weight: 600; line-height: 1.6; padding: 0 8px">%2$s</span></a>',
				self::$goProLink, 
				esc_html__( 'PRO', 'wpzoom-portfolio' )
			);
		}

		return $links;

	}

	// Add Go Pro link to the Portfolio menu
	public function plugin_add_go_pro_link_to_menu() {
		global $submenu;

		// Add Go Pro link to the Portfolio menu
		if( ! defined( 'WPZOOM_PORTFOLIO_PRO_VERSION' ) && ! wpzoom_theme_has_portfolio() ) {
			$submenu['edit.php?post_type=portfolio_item'][] = array( 
				'' . esc_html__( 'UPGRADE &rarr;', 'wpzoom-portfolio' ) . '',
				'manage_options', 
				self::$goProLink 
			);
		}
	}

	/**
	 * Register admin menus.
	 */
	public function register_menus() {
		
		$page_title = esc_html__( 'WPZOOM Portfolio Settings Page', 'wpzoom-portfolio' );

        // Remove Add New submenu item.
        remove_submenu_page( 'edit.php?post_type=portfolio_item', 'post-new.php?post_type=portfolio_item' );

		//WPZOOM Portfolio sub menu item.
		add_submenu_page(
			'edit.php?post_type=portfolio_item',
			$page_title,
			esc_html__( 'Settings', 'wpzoom-portfolio' ),
			'manage_options',
			'wpzoom-portfolio-settings',
			array( $this, 'admin_page' ),
			5
		);

	}

	/**
	 * Wrapper for the hook to render our custom settings pages.
	 *
	 * @since 1.0.5
	 */
	public function admin_page() {
		do_action( 'wpzoom_portfolio_admin_page' );
	}

	/**
	 * Add CSS to Go Pro link.
	 */
	public function add_css_go_pro_menu() {
		?>
		<style>
			#adminmenu #menu-posts-portfolio_item a[href="<?php echo self::$goProLink; ?>"] {
				color: #0BB4AA;
				font-weight: bold;
			}
		</style>
		<?php
	}

	/**
	 * Add target="_blank" to Go Pro link.
	 */
	public function add_target_blank_go_pro_menu() {
		?>
		<script>
			jQuery( document ).ready( function( $ ) {
				$('a[href$="<?php echo self::$goProLink; ?>"]').attr('target', '_blank');				
			});
		</script>
		<?php
	}

}

new WPZOOM_Portfolio_Admin_Menu();