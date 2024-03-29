<?php
/**
 * Electronic Supermarket Theme Page
 *
 * @package Electronic Supermarket
 */

function electronic_supermarket_admin_scripts() {
	wp_dequeue_script('electronic-supermarket-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'electronic_supermarket_admin_scripts' );

if ( ! defined( 'ELECTRONIC_SUPERMARKET_FREE_THEME_URL' ) ) {
	define( 'ELECTRONIC_SUPERMARKET_FREE_THEME_URL', 'https://www.themespride.com/themes/free-electronic-wordpress-theme/' );
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_PRO_THEME_URL' ) ) {
	define( 'ELECTRONIC_SUPERMARKET_PRO_THEME_URL', 'https://www.themespride.com/themes/supermarket-wordpress-theme/' );
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_DEMO_THEME_URL' ) ) {
	define( 'ELECTRONIC_SUPERMARKET_DEMO_THEME_URL', 'https://www.themespride.com/electronic-supermarket/' );
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_DOCS_THEME_URL' ) ) {
    define( 'ELECTRONIC_SUPERMARKET_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/electronic-supermarket/' );
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_RATE_THEME_URL' ) ) {
    define( 'ELECTRONIC_SUPERMARKET_RATE_THEME_URL', 'https://wordpress.org/support/theme/electronic-supermarket/reviews/#new-post' );
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_SUPPORT_THEME_URL' ) ) {
    define( 'ELECTRONIC_SUPERMARKET_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/electronic-supermarket/' );
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_CHANGELOG_THEME_URL' ) ) {
    define( 'ELECTRONIC_SUPERMARKET_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}

/**
 * Add theme page
 */
function electronic_supermarket_menu() {
	add_theme_page( esc_html__( 'About Theme', 'electronic-supermarket' ), esc_html__( 'About Theme', 'electronic-supermarket' ), 'edit_theme_options', 'electronic-supermarket-about', 'electronic_supermarket_about_display' );
}
add_action( 'admin_menu', 'electronic_supermarket_menu' );

/**
 * Display About page
 */
function electronic_supermarket_about_display() {
	$electronic_supermarket_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $electronic_supermarket_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$electronic_supermarket_description = explode( '. ', $electronic_supermarket_theme->get( 'Description' ) );

					array_pop( $electronic_supermarket_description );

					$electronic_supermarket_description = implode( '. ', $electronic_supermarket_description );

					echo esc_html( $electronic_supermarket_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_SUPERMARKET_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'electronic-supermarket' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_SUPERMARKET_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'electronic-supermarket' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_SUPERMARKET_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'electronic-supermarket' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_SUPERMARKET_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'electronic-supermarket' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( ELECTRONIC_SUPERMARKET_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'electronic-supermarket' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $electronic_supermarket_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'electronic-supermarket' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-supermarket-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'electronic-supermarket-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'electronic-supermarket' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-supermarket-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'electronic-supermarket' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'electronic-supermarket-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'electronic-supermarket' ); ?></a>
		</nav>

		<?php
			electronic_supermarket_main_screen();

			electronic_supermarket_changelog_screen();

			electronic_supermarket_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'electronic-supermarket' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'electronic-supermarket' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'electronic-supermarket' ) : esc_html_e( 'Go to Dashboard', 'electronic-supermarket' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function electronic_supermarket_main_screen() {
	if ( isset( $_GET['page'] ) && 'electronic-supermarket-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'electronic-supermarket' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'electronic-supermarket' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'electronic-supermarket' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'electronic-supermarket' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'electronic-supermarket' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( ELECTRONIC_SUPERMARKET_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'electronic-supermarket' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'electronic-supermarket' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'electronic-supermarket' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'electronic-supermarket' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function electronic_supermarket_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'electronic-supermarket' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'electronic_supermarket_changelog_file', ELECTRONIC_SUPERMARKET_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = electronic_supermarket_parse_changelog( $changelog );

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
function electronic_supermarket_parse_changelog( $content ) {
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
function electronic_supermarket_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'electronic-supermarket' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'electronic-supermarket' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'electronic-supermarket' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'electronic-supermarket' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'electronic-supermarket' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(ELECTRONIC_SUPERMARKET_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'electronic-supermarket' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
