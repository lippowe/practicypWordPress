<?php
/**
 * Luxury Hotels Theme Page
 *
 * @package Luxury Hotels
 */

function luxury_hotels_admin_scripts() {
	wp_dequeue_script('luxury-hotels-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'luxury_hotels_admin_scripts' );

if ( ! defined( 'LUXURY_HOTELS_FREE_THEME_URL' ) ) {
	define( 'LUXURY_HOTELS_FREE_THEME_URL', 'https://www.themespride.com/themes/free-hotels-wordpress-theme/' );
}
if ( ! defined( 'LUXURY_HOTELS_PRO_THEME_URL' ) ) {
	define( 'LUXURY_HOTELS_PRO_THEME_URL', 'https://www.themespride.com/themes/hotel-booking-wordpress-theme/' );
}
if ( ! defined( 'LUXURY_HOTELS_DEMO_THEME_URL' ) ) {
	define( 'LUXURY_HOTELS_DEMO_THEME_URL', 'https://www.themespride.com/luxury-hotels/' );
}
if ( ! defined( 'LUXURY_HOTELS_DOCS_THEME_URL' ) ) {
    define( 'LUXURY_HOTELS_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/luxury-hotels/' );
}
if ( ! defined( 'LUXURY_HOTELS_RATE_THEME_URL' ) ) {
    define( 'LUXURY_HOTELS_RATE_THEME_URL', 'https://wordpress.org/support/theme/luxury-hotels/reviews/#new-post' );
}
if ( ! defined( 'LUXURY_HOTELS_CHANGELOG_THEME_URL' ) ) {
    define( 'LUXURY_HOTELS_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'LUXURY_HOTELS_SUPPORT_THEME_URL' ) ) {
    define( 'LUXURY_HOTELS_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/luxury-hotels/' );
}

/**
 * Add theme page
 */
function luxury_hotels_menu() {
	add_theme_page( esc_html__( 'About Theme', 'luxury-hotels' ), esc_html__( 'About Theme', 'luxury-hotels' ), 'edit_theme_options', 'luxury-hotels-about', 'luxury_hotels_about_display' );
}
add_action( 'admin_menu', 'luxury_hotels_menu' );

/**
 * Display About page
 */
function luxury_hotels_about_display() {
	$luxury_hotels_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $luxury_hotels_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$luxury_hotels_description = explode( '. ', $luxury_hotels_theme->get( 'Description' ) );

					array_pop( $luxury_hotels_description );

					$luxury_hotels_description = implode( '. ', $luxury_hotels_description );

					echo esc_html( $luxury_hotels_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( LUXURY_HOTELS_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'luxury-hotels' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( LUXURY_HOTELS_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'luxury-hotels' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( LUXURY_HOTELS_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'luxury-hotels' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( LUXURY_HOTELS_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'luxury-hotels' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( LUXURY_HOTELS_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'luxury-hotels' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $luxury_hotels_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'luxury-hotels' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'luxury-hotels-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'luxury-hotels-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'luxury-hotels' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'luxury-hotels-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'luxury-hotels' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'luxury-hotels-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'luxury-hotels' ); ?></a>
		</nav>

		<?php
			luxury_hotels_main_screen();

			luxury_hotels_changelog_screen();

			luxury_hotels_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'luxury-hotels' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'luxury-hotels' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'luxury-hotels' ) : esc_html_e( 'Go to Dashboard', 'luxury-hotels' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function luxury_hotels_main_screen() {
	if ( isset( $_GET['page'] ) && 'luxury-hotels-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'luxury-hotels' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'luxury-hotels' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'luxury-hotels' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'luxury-hotels' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'luxury-hotels' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( LUXURY_HOTELS_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'luxury-hotels' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'luxury-hotels' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'luxury-hotels' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'luxury-hotels' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function luxury_hotels_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'luxury-hotels' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'luxury_hotels_changelog_file', LUXURY_HOTELS_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = luxury_hotels_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function luxury_hotels_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function luxury_hotels_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'luxury-hotels' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'luxury-hotels' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'luxury-hotels' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'luxury-hotels' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'luxury-hotels' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a  href="<?php echo esc_url( LUXURY_HOTELS_PRO_THEME_URL ); ?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'luxury-hotels' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
