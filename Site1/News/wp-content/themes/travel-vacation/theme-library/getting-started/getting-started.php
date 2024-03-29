<?php
/**
 * Getting Started Page.
 *
 * @package travel_vacation
 */


if( ! function_exists( 'travel_vacation_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function travel_vacation_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'travel-vacation' ),
		__( 'Getting Started', 'travel-vacation' ),
		'manage_options',
		'travel-vacation-getting-started',
		'travel_vacation_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'travel_vacation_getting_started_menu' );

if( ! function_exists( 'travel_vacation_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function travel_vacation_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_travel-vacation-getting-started' != $hook ) return;

    wp_enqueue_style( 'travel-vacation-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, TRAVEL_VACATION_THEME_VERSION );

    wp_enqueue_script( 'travel-vacation-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), TRAVEL_VACATION_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'travel_vacation_getting_started_admin_scripts' );

if( ! function_exists( 'travel_vacation_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function travel_vacation_getting_started_page(){ 
	$travel_vacation_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'travel-vacation' );?> <span class="theme-name"><?php echo esc_html( TRAVEL_VACATION_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$travel_vacation_description = explode( '. ', $travel_vacation_theme->get( 'Description' ) );

						array_pop( $travel_vacation_description );

						$travel_vacation_description = implode( '. ', $travel_vacation_description );

						echo esc_html( $travel_vacation_description . '.' );
					?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/travel-vacation/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'travel-vacation' ); ?>" target="_blank">
			            <?php esc_html_e( 'REVIEW', 'travel-vacation' ); ?>
			        </a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/travel-vacation/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'travel-vacation' ); ?>" target="_blank">
			            <?php esc_html_e( 'CONTACT SUPPORT', 'travel-vacation' ); ?>
			        </a>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'travel-vacation' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'travel-vacation' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;