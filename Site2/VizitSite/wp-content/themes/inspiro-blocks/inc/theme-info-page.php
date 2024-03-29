<?php
/**
 * Theme Info page
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Theme Page
 *
 * @return void
 */
function inspiro_theme_info_page() {
	add_theme_page(
		esc_html__( 'Inspiro Blocks Theme Dashboard', 'inspiro-blocks' ),
		esc_html__( 'Inspiro Blocks Theme', 'inspiro-blocks' ),
		'edit_theme_options',
		'inspiro',
		'inspiro_display_theme_page',
        1
	);
}
add_action( 'admin_menu', 'inspiro_theme_info_page' );

/**
 * Display HTML page for Theme
 *
 * @return void
 */
function inspiro_display_theme_page() {

    $parent = wp_get_theme();

	?>


    <script>

      jQuery(document).ready(function($){

            $( function() {
              $( "#tabs" ).tabs();
            } );

      });

      </script>

    <div class="wpz-onboard_wrapper">
        <div id="tabs">

                <div class="wpz-onboard_header">
                    <div class="wpz-onboard_title-wrapper">
                        <h1 class="wpz-onboard_title"><svg width="30" height="30" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23 46C35.7025 46 46 35.7025 46 23C46 10.2975 35.7025 0 23 0C10.2975 0 0 10.2975 0 23C0 35.7025 10.2975 46 23 46ZM19.4036 10.3152C19.4036 8.31354 21.0263 6.69091 23.0279 6.69091H26.2897C26.4899 6.69091 26.6521 6.85317 26.6521 7.05333V13.5025C26.6521 13.622 26.5884 13.7324 26.4848 13.7922L19.9055 17.5908C19.6824 17.7196 19.4036 17.5586 19.4036 17.3011V10.3152ZM19.5709 24.0613L26.1503 20.2627C26.3733 20.134 26.6521 20.2949 26.6521 20.5525V35.6849C26.6521 37.6865 25.0295 39.3091 23.0279 39.3091H19.7661C19.5659 39.3091 19.4036 39.1468 19.4036 38.9467V24.3511C19.4036 24.2316 19.4674 24.1211 19.5709 24.0613Z" fill="#242628"/></svg> Inspiro Blocks <span>Lite</span></h1>
                        <h2 class="wpz-onboard_framework-version">v <?php echo esc_html( $parent->get( 'Version' ) ); ?></h2>
                    </div>

                    <ul class="wpz-onboard_tabs">
                        <li class="wpz-onboard_tab wpz-onboard_tab-quick-start"><a href="#quick-start" title="Quick Start"><svg width="18" height="18" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.166992 14.5V0.333332H7.66699L8.00033 2H12.667V10.3333H6.83366L6.50033 8.66667H1.83366V14.5H0.166992ZM8.20866 8.66667H11.0003V3.66667H6.62533L6.29199 2H1.83366V7H7.87533L8.20866 8.66667Z" fill="#000"></path></svg> <?php esc_html_e( 'Quick Start', 'inspiro-blocks' ); ?></a></li>

                        <li class="wpz-onboard_tab wpz-onboard_tab-theme-child"><a href="#vs-pro" title="Free vs. PRO"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M15 5.75C11.5482 5.75 8.75 8.54822 8.75 12C8.75 15.4518 11.5482 18.25 15 18.25C15.9599 18.25 16.8674 18.0341 17.6782 17.6489C18.0523 17.4712 18.4997 17.6304 18.6774 18.0045C18.8552 18.3787 18.696 18.8261 18.3218 19.0038C17.3141 19.4825 16.1873 19.75 15 19.75C10.7198 19.75 7.25 16.2802 7.25 12C7.25 7.71979 10.7198 4.25 15 4.25C19.2802 4.25 22.75 7.71979 22.75 12C22.75 12.7682 22.638 13.5115 22.429 14.2139C22.3108 14.6109 21.8932 14.837 21.4962 14.7188C21.0992 14.6007 20.8731 14.1831 20.9913 13.7861C21.1594 13.221 21.25 12.6218 21.25 12C21.25 8.54822 18.4518 5.75 15 5.75Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M5.25 5C5.25 4.58579 5.58579 4.25 6 4.25H15C15.4142 4.25 15.75 4.58579 15.75 5C15.75 5.41421 15.4142 5.75 15 5.75H6C5.58579 5.75 5.25 5.41421 5.25 5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M4.75 8.5C4.75 8.08579 5.08579 7.75 5.5 7.75H8.5C8.91421 7.75 9.25 8.08579 9.25 8.5C9.25 8.91421 8.91421 9.25 8.5 9.25H5.5C5.08579 9.25 4.75 8.91421 4.75 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M1.25 8.5C1.25 8.08579 1.58579 7.75 2 7.75H3.5C3.91421 7.75 4.25 8.08579 4.25 8.5C4.25 8.91421 3.91421 9.25 3.5 9.25H2C1.58579 9.25 1.25 8.91421 1.25 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M3.25 12.5C3.25 12.0858 3.58579 11.75 4 11.75H8C8.41421 11.75 8.75 12.0858 8.75 12.5C8.75 12.9142 8.41421 13.25 8 13.25H4C3.58579 13.25 3.25 12.9142 3.25 12.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M12.376 8.58397C12.5151 8.37533 12.7492 8.25 13 8.25H17C17.2508 8.25 17.4849 8.37533 17.624 8.58397L19.624 11.584C19.792 11.8359 19.792 12.1641 19.624 12.416L17.624 15.416C17.4849 15.6247 17.2508 15.75 17 15.75H13C12.7492 15.75 12.5151 15.6247 12.376 15.416L10.376 12.416C10.208 12.1641 10.208 11.8359 10.376 11.584L12.376 8.58397ZM13.4014 9.75L11.9014 12L13.4014 14.25H16.5986L18.0986 12L16.5986 9.75H13.4014Z" fill="black" fill-rule="evenodd"/></svg> <?php esc_html_e( 'Free vs. PRO', 'inspiro-blocks' ); ?></a></li>

                        <li class="wpz-onboard_tab wpz-onboard_tab-debug"><a href="#demos" title="Demos"><svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M34 0H14C12.4087 0 10.8826 0.632141 9.75736 1.75736C8.63214 2.88258 8 4.4087 8 6V8H6C4.4087 8 2.88258 8.63214 1.75736 9.75736C0.632141 10.8826 0 12.4087 0 14V34C0 35.5913 0.632141 37.1174 1.75736 38.2426C2.88258 39.3679 4.4087 40 6 40H26C27.5913 40 29.1174 39.3679 30.2426 38.2426C31.3679 37.1174 32 35.5913 32 34V32H34C35.5913 32 37.1174 31.3679 38.2426 30.2426C39.3679 29.1174 40 27.5913 40 26V6C40 4.4087 39.3679 2.88258 38.2426 1.75736C37.1174 0.632141 35.5913 0 34 0ZM28 34C28 34.5304 27.7893 35.0391 27.4142 35.4142C27.0391 35.7893 26.5304 36 26 36H6C5.46957 36 4.96086 35.7893 4.58579 35.4142C4.21071 35.0391 4 34.5304 4 34V20H28V34ZM28 16H4V14C4 13.4696 4.21071 12.9609 4.58579 12.5858C4.96086 12.2107 5.46957 12 6 12H26C26.5304 12 27.0391 12.2107 27.4142 12.5858C27.7893 12.9609 28 13.4696 28 14V16ZM36 26C36 26.5304 35.7893 27.0391 35.4142 27.4142C35.0391 27.7893 34.5304 28 34 28H32V14C31.9946 13.3177 31.8728 12.6413 31.64 12H36V26ZM36 8H12V6C12 5.46957 12.2107 4.96086 12.5858 4.58579C12.9609 4.21071 13.4696 4 14 4H34C34.5304 4 35.0391 4.21071 35.4142 4.58579C35.7893 4.96086 36 5.46957 36 6V8Z" fill="#242628"/></svg> <?php esc_html_e( 'Premium Demos', 'inspiro-blocks' ); ?></a></li>
                    </ul>
                </div>

                <div class="wpz-onboard_content-wrapper">
                    <div class="wpz-onboard_content">

                        <div class="wpz-onboard_content-main">
                            <div id="quick-start" class="wpz-onboard_content-main-tab">

                                <div class="theme-info-wrap welcome-section">

                                    <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Welcome to Inspiro Blocks!', 'inspiro-blocks' ); ?> 👋</h3>
                                    <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Thank you for installing the free version of our theme! Below you can find quick links to different sections where you can configure and customize the theme. The free version includes limited features and block patterns, but if you need more flexibility and plan to take your website to the next level, make sure to check the PRO version.', 'inspiro-blocks' ); ?></p>

                                    <p class="section_footer">
                                        <a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" target="_blank" class="button button-primary">
                                            <?php esc_html_e( 'Go to Site Editor &rarr;', 'inspiro-blocks' ); ?>
                                        </a>

                                        <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-blocks-pro/', 'inspiro-blocks' ) ); ?>" target="_blank" class="button button-secondary">
                                            <?php esc_html_e( 'Get the PRO version &rarr;', 'inspiro-blocks' ); ?>
                                        </a>

                                    </p>

                                </div>

                                    <div class="theme-info-wrap">

                                        <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Customize & Configure', 'inspiro-blocks' ); ?></h3>

                                            <div class="wpz-grid-wrap">


                                                <div class="section">
                                                    <h4>
                                                        <svg height="26" viewBox="0 0 21 21" width="26" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="translate(3 3)"><path d="m14.4978951 12.4978973-.0105089-9.99999996c-.0011648-1.10374784-.8962548-1.99789734-2-1.99789734h-9.99999995c-1.0543629 0-1.91816623.81587779-1.99451537 1.85073766l-.00548463.151365.0105133 10.00000004c.0011604 1.1037478.89625045 1.9978973 1.99999889 1.9978973h9.99999776c1.0543618 0 1.9181652-.8158778 1.9945143-1.8507377z"/><path d="m4.5 4.5v9.817"/><path d="m7-2v14" transform="matrix(0 1 -1 0 12.5 -2.5)"/></g></svg> <?php esc_html_e( 'Site Editor', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Customize the design and templates of your website easily using the Site Editor.', 'inspiro-blocks' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Go to Site Editor &rarr;', 'inspiro-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="26" height="26" aria-hidden="true" focusable="false"><path d="M17.2 10.9c-.5-1-1.2-2.1-2.1-3.2-.6-.9-1.3-1.7-2.1-2.6L12 4l-1 1.1c-.6.9-1.3 1.7-2 2.6-.8 1.2-1.5 2.3-2 3.2-.6 1.2-1 2.2-1 3 0 3.4 2.7 6.1 6.1 6.1s6.1-2.7 6.1-6.1c0-.8-.3-1.8-1-3zm-5.1 7.6c-2.5 0-4.6-2.1-4.6-4.6 0-.3.1-1 .8-2.3.5-.9 1.1-1.9 2-3.1.7-.9 1.3-1.7 1.8-2.3.7.8 1.3 1.6 1.8 2.3.8 1.1 1.5 2.2 2 3.1.7 1.3.8 2 .8 2.3 0 2.5-2.1 4.6-4.6 4.6z"></path></svg> <?php esc_html_e( 'Colors & Fonts', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Set up your global colors and fonts to match your site with your brand.', 'inspiro-blocks' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <a href="<?php echo esc_url( admin_url( 'site-editor.php?canvas=edit' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Customize the Site &rarr;', 'inspiro-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>


                                                <div class="section">
                                                    <h4>
                                                        <svg height="26" viewBox="0 0 512 512" width="26" xmlns="http://www.w3.org/2000/svg"><title/><rect height="336" rx="57" ry="57" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px" width="336" x="128" y="128"/><path d="M383.5,128l.5-24a56.16,56.16,0,0,0-56-56H112a64.19,64.19,0,0,0-64,64V328a56.16,56.16,0,0,0,56,56h24" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="296" x2="296" y1="216" y2="376"/><line style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="376" x2="216" y1="296" y2="296"/></svg> <?php esc_html_e( 'Import Demo Pages using Block Patterns', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'You can quickly import pre-designed pages from the demo by inserting Block Patterns in pages.', 'inspiro-blocks' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="https://www.wpzoom.com/documentation/inspiro-blocks-pro/adding-block-patterns-with-demo-pages/" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'See instructions &rarr;', 'inspiro-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg id="Icons" style="enable-background:new 0 0 32 32;" width="26" height="26" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                                            .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                                                            .st1{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}
                                                            .st2{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:6,6;}
                                                            .st3{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:4,4;}
                                                            .st4{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;}
                                                            .st5{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-dasharray:3.1081,3.1081;}
                                                            .st6{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:4,3;}
                                                        </style><circle class="st0" cx="13" cy="13" r="1"/><polyline class="st0" points="7,21 16,16 20,19 25,16 "/><polyline class="st0" points="30,25 7,25 7,2 "/><polyline class="st0" points="7,7 25,7 25,25 "/><line class="st0" x1="7" x2="2" y1="7" y2="7"/><line class="st0" x1="25" x2="25" y1="30" y2="25"/></svg> <?php esc_html_e( 'Site Logo', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'If you have a logo image, you can upload it in the header using the Site Logo block.', 'inspiro-blocks' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="https://www.wpzoom.com/documentation/inspiro-blocks-pro/how-to-upload-your-logo-image-in-the-header/" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'See instructions &rarr;', 'inspiro-blocks' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg with="26" height="26" id="Lager_1" style="enable-background:new -265 388.9 64 64;" version="1.1" viewBox="-265 388.9 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M-244.5,411h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-242.9,410.3-243.6,411-244.5,411z"/><path d="M-228.1,411h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-226.4,410.3-227.2,411-228.1,411z"/><path d="M-211.6,411h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-210,410.3-210.7,411-211.6,411z"/><path d="M-244.5,427.5h-9.9c-0.9,0-1.6-0.7-1.6-1.6V416c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-242.9,426.7-243.6,427.5-244.5,427.5z"/><path d="M-228.1,427.5h-9.9c-0.9,0-1.6-0.7-1.6-1.6V416c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-226.4,426.7-227.2,427.5-228.1,427.5z"/><path d="M-211.6,427.5h-9.9c-0.9,0-1.6-0.7-1.6-1.6V416c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-210,426.7-210.7,427.5-211.6,427.5z"/><path d="M-244.5,443.9h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-242.9,443.2-243.6,443.9-244.5,443.9z"/><path d="M-228.1,443.9h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-226.4,443.2-227.2,443.9-228.1,443.9z"/><path d="M-211.6,443.9h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-210,443.2-210.7,443.9-211.6,443.9z"/></g></svg> <?php esc_html_e( 'Portfolio', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Using the free version of our WPZOOM Portfolio plugin, you can quickly create a Portfolio section on your website.', 'inspiro-blocks' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <?php if ( class_exists( 'WPZOOM_Portfolio_Custom_Posts' ) ) { ?>

                                                            <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=portfolio_item' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Add a Portfolio Post &rarr;', 'inspiro-blocks' ); ?>
                                                            </a>

                                                        <?php } else {  ?>

                                                            <a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=wpzoom%2520portfolio&tab=search&type=term' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Install WPZOOM Portfolio &rarr;', 'inspiro-blocks' ); ?>
                                                            </a>

                                                        <?php } ?>

                                                        <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-how-to-create-a-portfolio-section/', 'inspiro-blocks' ) ); ?>" target="_blank" class="button button-secondary">
                                                            <?php esc_html_e( 'How to Create a Portfolio?', 'inspiro-blocks' ); ?>
                                                        </a>
                                                    </p>
                                                </div>



                                            </div><!-- /.wpz-grid-wrap -->

                                    </div><!-- /.theme-info-wrap -->


                                    <div class="theme-info-wrap">

                                        <h3 class="wpz-onboard_content-main-title"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M15 5.75C11.5482 5.75 8.75 8.54822 8.75 12C8.75 15.4518 11.5482 18.25 15 18.25C15.9599 18.25 16.8674 18.0341 17.6782 17.6489C18.0523 17.4712 18.4997 17.6304 18.6774 18.0045C18.8552 18.3787 18.696 18.8261 18.3218 19.0038C17.3141 19.4825 16.1873 19.75 15 19.75C10.7198 19.75 7.25 16.2802 7.25 12C7.25 7.71979 10.7198 4.25 15 4.25C19.2802 4.25 22.75 7.71979 22.75 12C22.75 12.7682 22.638 13.5115 22.429 14.2139C22.3108 14.6109 21.8932 14.837 21.4962 14.7188C21.0992 14.6007 20.8731 14.1831 20.9913 13.7861C21.1594 13.221 21.25 12.6218 21.25 12C21.25 8.54822 18.4518 5.75 15 5.75Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M5.25 5C5.25 4.58579 5.58579 4.25 6 4.25H15C15.4142 4.25 15.75 4.58579 15.75 5C15.75 5.41421 15.4142 5.75 15 5.75H6C5.58579 5.75 5.25 5.41421 5.25 5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M4.75 8.5C4.75 8.08579 5.08579 7.75 5.5 7.75H8.5C8.91421 7.75 9.25 8.08579 9.25 8.5C9.25 8.91421 8.91421 9.25 8.5 9.25H5.5C5.08579 9.25 4.75 8.91421 4.75 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M1.25 8.5C1.25 8.08579 1.58579 7.75 2 7.75H3.5C3.91421 7.75 4.25 8.08579 4.25 8.5C4.25 8.91421 3.91421 9.25 3.5 9.25H2C1.58579 9.25 1.25 8.91421 1.25 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M3.25 12.5C3.25 12.0858 3.58579 11.75 4 11.75H8C8.41421 11.75 8.75 12.0858 8.75 12.5C8.75 12.9142 8.41421 13.25 8 13.25H4C3.58579 13.25 3.25 12.9142 3.25 12.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M12.376 8.58397C12.5151 8.37533 12.7492 8.25 13 8.25H17C17.2508 8.25 17.4849 8.37533 17.624 8.58397L19.624 11.584C19.792 11.8359 19.792 12.1641 19.624 12.416L17.624 15.416C17.4849 15.6247 17.2508 15.75 17 15.75H13C12.7492 15.75 12.5151 15.6247 12.376 15.416L10.376 12.416C10.208 12.1641 10.208 11.8359 10.376 11.584L12.376 8.58397ZM13.4014 9.75L11.9014 12L13.4014 14.25H16.5986L18.0986 12L16.5986 9.75H13.4014Z" fill="black" fill-rule="evenodd"/></svg>  <?php esc_html_e( 'Premium Features', 'inspiro-blocks' ); ?></h3>

                                            <div class="wpz-grid-wrap">

                                                <div class="section premium-feature coming-soon">
                                                    <h4><svg height="24" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 1069 1069" width="24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><rect height="1066.67" id="Video-player" style="fill:none;" width="1066.67" x="1.515" y="0.143"/><g><path d="M653.802,660.183c9.682,-5.579 15.648,-15.903 15.648,-27.077c0,-11.174 -5.966,-21.498 -15.648,-27.077c-0,0 -207.519,-119.571 -207.519,-119.571c-9.669,-5.571 -21.576,-5.563 -31.238,0.021c-9.662,5.584 -15.613,15.897 -15.613,27.056c-0,0 -0,239.142 -0,239.142c-0,11.159 5.951,21.472 15.613,27.056c9.662,5.584 21.569,5.592 31.238,0.021c0,-0 207.519,-119.571 207.519,-119.571Zm-78.196,-27.077l-113.674,65.498c-0,0.001 -0,-130.996 -0,-130.996l113.674,65.498Z" style="fill-opacity:0.5;"/><path d="M45.265,325.143l-0,458.333c-0,52.49 20.852,102.831 57.968,139.948c37.117,37.117 87.458,57.969 139.949,57.969c165.508,-0 417.825,-0 583.333,-0c52.491,-0 102.832,-20.852 139.948,-57.969c37.117,-37.117 57.969,-87.458 57.969,-139.948l-0,-458.333c-0,-52.49 -20.852,-102.831 -57.969,-139.948c-37.116,-37.117 -87.457,-57.969 -139.948,-57.969c-165.508,0 -417.825,0 -583.333,0c-52.491,0 -102.832,20.852 -139.949,57.969c-37.116,37.117 -57.968,87.458 -57.968,139.948Zm62.5,56.213l-0,402.12c-0,35.915 14.267,70.358 39.662,95.754c25.396,25.396 59.84,39.663 95.755,39.663c165.508,-0 417.825,-0 583.333,-0c35.915,-0 70.359,-14.267 95.754,-39.663c25.396,-25.396 39.663,-59.839 39.663,-95.754l-0,-458.333c-0,-35.915 -14.267,-70.358 -39.663,-95.754c-25.395,-25.396 -59.839,-39.663 -95.754,-39.663c-165.508,0 -417.825,0 -583.333,0c-35.915,0 -70.359,14.267 -95.755,39.663c-23.909,23.91 -37.955,55.84 -39.516,89.467l676.937,0c17.248,0 31.25,14.003 31.25,31.25c0,17.248 -14.002,31.25 -31.25,31.25l-677.083,0Zm123.177,-160.38c18.253,0 33.073,14.82 33.073,33.073c-0,18.254 -14.82,33.074 -33.073,33.074c-18.254,-0 -33.074,-14.82 -33.074,-33.074c0,-18.253 14.82,-33.073 33.074,-33.073Zm104.166,0c18.254,0 33.074,14.82 33.074,33.073c-0,18.254 -14.82,33.074 -33.074,33.074c-18.253,-0 -33.073,-14.82 -33.073,-33.074c0,-18.253 14.82,-33.073 33.073,-33.073Zm104.167,0c18.254,0 33.073,14.82 33.073,33.073c0,18.254 -14.819,33.074 -33.073,33.074c-18.254,-0 -33.073,-14.82 -33.073,-33.074c-0,-18.253 14.819,-33.073 33.073,-33.073Z"/></g></svg> <?php esc_html_e( 'YouTube & Vimeo Video Backgrounds', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'In the free version, you can display only an image or self-hosted video in the background of the cover block, while in the PRO version, you will soon be able to display YouTube & Vimeo videos.', 'inspiro-blocks' ); ?>
                                                    </p>
                                                    <p class="section_footer">

                                                        <a href="#" class="button button-secondary">
                                                            <?php esc_html_e( 'Coming Soon', 'inspiro-blocks' ); ?>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg width="26" height="26" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 12.405L13.5 8.07C13.0442 7.80682 12.5271 7.66821 12.0008 7.66807C11.4744 7.66794 10.9573 7.80629 10.5013 8.06923C10.0454 8.33217 9.66661 8.71045 9.40308 9.16607C9.13956 9.6217 9.00054 10.1386 9 10.665V19.335C9.00054 19.8611 9.13942 20.3778 9.4027 20.8332C9.66597 21.2887 10.0444 21.667 10.5 21.93C10.9561 22.1933 11.4734 22.3319 12 22.3319C12.5266 22.3319 13.0439 22.1933 13.5 21.93L21 17.595C21.4546 17.3313 21.832 16.9528 22.0943 16.4973C22.3566 16.0419 22.4947 15.5256 22.4947 15C22.4947 14.4744 22.3566 13.9581 22.0943 13.5027C21.832 13.0472 21.4546 12.6687 21 12.405ZM19.5 15L12 19.335V10.665L19.5 15ZM15 0C12.0333 0 9.13319 0.879734 6.66645 2.52796C4.19971 4.17618 2.27713 6.51885 1.14181 9.25974C0.00649926 12.0006 -0.290551 15.0166 0.288227 17.9263C0.867006 20.8361 2.29562 23.5088 4.3934 25.6066C6.49119 27.7044 9.16394 29.133 12.0736 29.7118C14.9834 30.2905 17.9994 29.9935 20.7403 28.8582C23.4811 27.7229 25.8238 25.8003 27.472 23.3335C29.1203 20.8668 30 17.9667 30 15C30 13.0302 29.612 11.0796 28.8582 9.25974C28.1044 7.43986 26.9995 5.78628 25.6066 4.3934C24.2137 3.00052 22.5601 1.89563 20.7403 1.14181C18.9204 0.387986 16.9698 0 15 0ZM15 27C12.6266 27 10.3066 26.2962 8.33316 24.9776C6.35977 23.659 4.8217 21.7849 3.91345 19.5922C3.0052 17.3995 2.76756 14.9867 3.23058 12.6589C3.69361 10.3311 4.83649 8.19295 6.51472 6.51472C8.19295 4.83649 10.3311 3.6936 12.6589 3.23058C14.9867 2.76755 17.3995 3.00519 19.5922 3.91344C21.7849 4.8217 23.6591 6.35977 24.9776 8.33315C26.2962 10.3065 27 12.6266 27 15C27 18.1826 25.7357 21.2348 23.4853 23.4853C21.2348 25.7357 18.1826 27 15 27Z" fill="#242628"></path></svg> <?php esc_html_e( 'Portfolio with Video Integration', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Inspiro Blocks PRO is perfect for showing off your portfolio, images and videos. The PRO version includes video features, such as video background on hover, video popups, etc. More premium features will be added with every major update!', 'inspiro-blocks' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/inspiro-blocks-pro/portfolio/', 'inspiro-blocks' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Premium Portfolio Demo &rarr;', 'inspiro-blocks' ); ?>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg height="26" preserveAspectRatio="xMidYMid" version="1.1" viewBox="0 0 256 153" width="26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M23.7586644,0 L232.137438,0 C245.324643,0 256,10.6753566 256,23.8625617 L256,103.404434 C256,116.591639 245.324643,127.266996 232.137438,127.266996 L157.409942,127.266996 L167.666657,152.385482 L122.558043,127.266996 L23.8633248,127.266996 C10.6761196,127.266996 0.000763038458,116.591639 0.000763038458,103.404434 L0.000763038458,23.8625617 C-0.10389732,10.7800169 10.5714592,0 23.7586644,0 L23.7586644,0 Z" fill="#9B5C8F"/><path d="M14.5781994,21.7495935 C16.0351099,19.7723577 18.2204758,18.7317073 21.1342969,18.5235772 C26.441614,18.1073171 29.4595002,20.604878 30.1879555,26.0162602 C33.4139717,47.7658537 36.9521831,66.1853659 40.6985246,81.2747967 L63.4887685,37.8796748 C65.5700693,33.9252033 68.1716953,31.8439024 71.2936465,31.6357724 C75.8725083,31.3235772 78.6822644,34.2373984 79.8269798,40.3772358 C82.4286059,54.2178862 85.7586872,65.9772358 89.7131587,75.9674797 C92.4188498,49.5349593 96.9977116,30.4910569 103.449744,18.7317073 C105.01072,15.8178862 107.300151,14.3609756 110.318037,14.1528455 C112.711533,13.9447154 114.896899,14.6731707 116.874134,16.2341463 C118.85137,17.795122 119.89202,19.7723577 120.100151,22.1658537 C120.204216,24.0390244 119.89202,25.6 119.0595,27.1609756 C115.000964,34.6536585 111.670882,47.2455285 108.965191,64.7284553 C106.363565,81.6910569 105.42698,94.9073171 106.05137,104.377236 C106.2595,106.978862 105.84324,109.268293 104.80259,111.245528 C103.553809,113.534959 101.680638,114.78374 99.2871424,114.99187 C96.5814514,115.2 93.7716953,113.95122 91.0660042,111.141463 C81.3879555,101.255285 73.6871424,86.4780488 68.0676303,66.8097561 C61.3034026,80.1300813 56.3082807,90.1203252 53.0822644,96.7804878 C46.942427,108.539837 41.739175,114.57561 37.3684433,114.887805 C34.5586872,115.095935 32.1651912,112.702439 30.0838904,107.707317 C24.7765733,94.0747967 19.0529961,67.7463415 12.9131587,28.7219512 C12.4968985,26.0162602 13.1212888,23.6227642 14.5781994,21.7495935 Z M238.213972,38.0878049 C234.46763,31.5317073 228.952183,27.5772358 221.563565,26.0162602 C219.586329,25.6 217.713159,25.3918699 215.944053,25.3918699 C205.953809,25.3918699 197.836736,30.595122 191.488768,41.001626 C186.077386,49.8471545 183.371695,59.6292683 183.371695,70.3479675 C183.371695,78.3609756 185.036736,85.2292683 188.366817,90.9528455 C192.113159,97.5089431 197.628606,101.463415 205.017224,103.02439 C206.99446,103.44065 208.86763,103.64878 210.636736,103.64878 C220.731045,103.64878 228.848118,98.4455285 235.09202,88.0390244 C240.503403,79.0894309 243.209094,69.3073171 243.209094,58.5886179 C243.313159,50.4715447 241.544053,43.7073171 238.213972,38.0878049 Z M225.101777,66.9138211 C223.644866,73.7821138 221.04324,78.8813008 217.192834,82.3154472 C214.174947,85.0211382 211.365191,86.1658537 208.763565,85.6455285 C206.266004,85.1252033 204.184703,82.9398374 202.623728,78.8813008 C201.374947,75.6552846 200.750557,72.4292683 200.750557,69.4113821 C200.750557,66.8097561 200.958687,64.2081301 201.479012,61.8146341 C202.415598,57.5479675 204.184703,53.3853659 206.99446,49.4308943 C210.428606,44.3317073 214.070882,42.2504065 217.817224,42.9788618 C220.314785,43.499187 222.396086,45.6845528 223.957061,49.7430894 C225.205842,52.9691057 225.830232,56.195122 225.830232,59.2130081 C225.830232,61.9186992 225.622102,64.5203252 225.101777,66.9138211 Z M173.069256,38.0878049 C169.322915,31.5317073 163.703403,27.5772358 156.41885,26.0162602 C154.441614,25.6 152.568443,25.3918699 150.799338,25.3918699 C140.809094,25.3918699 132.69202,30.595122 126.344053,41.001626 C120.932671,49.8471545 118.22698,59.6292683 118.22698,70.3479675 C118.22698,78.3609756 119.89202,85.2292683 123.222102,90.9528455 C126.968443,97.5089431 132.48389,101.463415 139.872508,103.02439 C141.849744,103.44065 143.722915,103.64878 145.49202,103.64878 C155.586329,103.64878 163.703403,98.4455285 169.947305,88.0390244 C175.358687,79.0894309 178.064378,69.3073171 178.064378,58.5886179 C178.064378,50.4715447 176.399338,43.7073171 173.069256,38.0878049 Z M159.852996,66.9138211 C158.396086,73.7821138 155.79446,78.8813008 151.944053,82.3154472 C148.926167,85.0211382 146.116411,86.1658537 143.514785,85.6455285 C141.017224,85.1252033 138.935923,82.9398374 137.374947,78.8813008 C136.126167,75.6552846 135.501777,72.4292683 135.501777,69.4113821 C135.501777,66.8097561 135.709907,64.2081301 136.230232,61.8146341 C137.166817,57.5479675 138.935923,53.3853659 141.745679,49.4308943 C145.179825,44.3317073 148.822102,42.2504065 152.568443,42.9788618 C155.066004,43.499187 157.147305,45.6845528 158.708281,49.7430894 C159.957061,52.9691057 160.581451,56.195122 160.581451,59.2130081 C160.685516,61.9186992 160.373321,64.5203252 159.852996,66.9138211 L159.852996,66.9138211 L159.852996,66.9138211 Z" fill="#FFFFFF"/></g></svg> <?php esc_html_e( 'WooCommerce Support', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Need to sell something? With the Inspiro theme, you can build your shop and start selling anything easily! The theme is fully compatible with the WooCommerce plugin.', 'inspiro-blocks' ); ?>
                                                    </p>
                                                </div>


                                                <div class="section premium-feature">

                                                      <h4><svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M34 0H14C12.4087 0 10.8826 0.632141 9.75736 1.75736C8.63214 2.88258 8 4.4087 8 6V8H6C4.4087 8 2.88258 8.63214 1.75736 9.75736C0.632141 10.8826 0 12.4087 0 14V34C0 35.5913 0.632141 37.1174 1.75736 38.2426C2.88258 39.3679 4.4087 40 6 40H26C27.5913 40 29.1174 39.3679 30.2426 38.2426C31.3679 37.1174 32 35.5913 32 34V32H34C35.5913 32 37.1174 31.3679 38.2426 30.2426C39.3679 29.1174 40 27.5913 40 26V6C40 4.4087 39.3679 2.88258 38.2426 1.75736C37.1174 0.632141 35.5913 0 34 0ZM28 34C28 34.5304 27.7893 35.0391 27.4142 35.4142C27.0391 35.7893 26.5304 36 26 36H6C5.46957 36 4.96086 35.7893 4.58579 35.4142C4.21071 35.0391 4 34.5304 4 34V20H28V34ZM28 16H4V14C4 13.4696 4.21071 12.9609 4.58579 12.5858C4.96086 12.2107 5.46957 12 6 12H26C26.5304 12 27.0391 12.2107 27.4142 12.5858C27.7893 12.9609 28 13.4696 28 14V16ZM36 26C36 26.5304 35.7893 27.0391 35.4142 27.4142C35.0391 27.7893 34.5304 28 34 28H32V14C31.9946 13.3177 31.8728 12.6413 31.64 12H36V26ZM36 8H12V6C12 5.46957 12.2107 4.96086 12.5858 4.58579C12.9609 4.21071 13.4696 4 14 4H34C34.5304 4 35.0391 4.21071 35.4142 4.58579C35.7893 4.96086 36 5.46957 36 6V8Z" fill="#242628"/>
                                                        </svg> <?php esc_html_e( 'Multiple Starter Sites', 'inspiro-blocks' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'With the built-in demo importer, you can quickly import fully configured demos to help you get started. The theme includes beautiful demos to create a business or portfolio website.', 'inspiro-blocks' ); ?>
                                                        </p>
                                                        <p class="section_footer">
                                                            <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/inspiro-blocks-pro-demo', 'inspiro-blocks' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Inspiro Blocks PRO Demos &rarr;', 'inspiro-blocks' ); ?>
                                                            </a>

                                                        </p>
                                                </div>


                                                <div class="section premium-feature">

                                                      <h4><svg enable-background="new 0 0 26 26"  width="26" height="26" version="1.1" viewBox="0 0 26 26" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M6.75,18.5h-5C1.3359375,18.5,1,18.8359375,1,19.25v5C1,24.6640625,1.3359375,25,1.75,25h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C7.5,18.8359375,7.1640625,18.5,6.75,18.5z M6,23.5H2.5V20H6V23.5z" fill="#1D1D1B"/><path d="M24.25,18.5h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C25,18.8359375,24.6640625,18.5,24.25,18.5z M23.5,23.5H20V20h3.5V23.5z" fill="#1D1D1B"/><path d="M15.5,18.5h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C16.25,18.8359375,15.9140625,18.5,15.5,18.5z M14.75,23.5h-3.5V20h3.5V23.5z" fill="#1D1D1B"/><path d="M6.75,9.75h-5C1.3359375,9.75,1,10.0859375,1,10.5v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C7.5,10.0859375,7.1640625,9.75,6.75,9.75z M6,14.75H2.5v-3.5H6V14.75z" fill="#1D1D1B"/><path d="M24.25,9.75h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C25,10.0859375,24.6640625,9.75,24.25,9.75z M23.5,14.75H20v-3.5h3.5V14.75z" fill="#1D1D1B"/><path d="M15.5,9.75h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C16.25,10.0859375,15.9140625,9.75,15.5,9.75z M14.75,14.75h-3.5v-3.5h3.5V14.75z" fill="#1D1D1B"/><path d="M6.75,1h-5C1.3359375,1,1,1.3359375,1,1.75v5C1,7.1640625,1.3359375,7.5,1.75,7.5h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C7.5,1.3359375,7.1640625,1,6.75,1z M6,6H2.5V2.5H6V6z" fill="#1D1D1B"/><path d="M24.25,1h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   C24.6640625,7.5,25,7.1640625,25,6.75v-5C25,1.3359375,24.6640625,1,24.25,1z M23.5,6H20V2.5h3.5V6z" fill="#1D1D1B"/><path d="M15.5,1h-5c-0.4140625,0-0.75,0.3359375-0.75,0.75v5c0,0.4140625,0.3359375,0.75,0.75,0.75h5   c0.4140625,0,0.75-0.3359375,0.75-0.75v-5C16.25,1.3359375,15.9140625,1,15.5,1z M14.75,6h-3.5V2.5h3.5V6z" fill="#1D1D1B"/></g></svg> <?php esc_html_e( '40+ Block Patterns', 'inspiro-blocks' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'The PRO version includes additional block patterns to help you build unique page layouts. You can find different patterns to add sections like pricing tables, call-to-actions and more!', 'inspiro-blocks' ); ?>
                                                        </p>

                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg id="Icons" width="26" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">.st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line class="st0" x1="3" x2="29" y1="11" y2="11"/><g><path d="M7,9C6.7,9,6.5,8.9,6.3,8.7C6.1,8.5,6,8.3,6,8c0-0.3,0.1-0.5,0.3-0.7c0,0,0.1-0.1,0.1-0.1c0.1,0,0.1-0.1,0.2-0.1   C6.7,7,6.7,7,6.8,7c0.1,0,0.3,0,0.4,0c0.1,0,0.1,0,0.2,0.1c0.1,0,0.1,0.1,0.2,0.1c0,0,0.1,0.1,0.1,0.1c0.1,0.1,0.2,0.2,0.2,0.3   C8,7.7,8,7.9,8,8c0,0.1,0,0.3-0.1,0.4C7.9,8.5,7.8,8.6,7.7,8.7C7.5,8.9,7.3,9,7,9z"/></g><g><path d="M10,9C9.7,9,9.5,8.9,9.3,8.7C9.1,8.5,9,8.3,9,8c0-0.1,0-0.3,0.1-0.4c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.3-0.2   C10,6.9,10.4,7,10.7,7.3c0.1,0.1,0.2,0.2,0.2,0.3C11,7.7,11,7.9,11,8c0,0.3-0.1,0.5-0.3,0.7C10.5,8.9,10.3,9,10,9z"/></g><g><path d="M13,9c-0.1,0-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3C12,8.3,12,8.1,12,8c0-0.1,0-0.3,0.1-0.4   c0.1-0.1,0.1-0.2,0.2-0.3c0.4-0.4,1-0.4,1.4,0c0.1,0.1,0.2,0.2,0.2,0.3C14,7.7,14,7.9,14,8c0,0.1,0,0.3-0.1,0.4   c-0.1,0.1-0.1,0.2-0.2,0.3C13.5,8.9,13.3,9,13,9z"/></g><path class="st0" d="M27,5H5C3.9,5,3,5.9,3,7v18c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V7C29,5.9,28.1,5,27,5z"/><line class="st0" x1="3" x2="19" y1="19" y2="19"/><line class="st0" x1="19" x2="19" y1="11" y2="27"/></svg> <?php esc_html_e( 'Multiple Header & Footer Layouts', 'inspiro-blocks' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Upgrading to the Premium version, you will get access to Multiple Header & Footer Layouts.', 'inspiro-blocks' ); ?>
                                                    </p>

                                                </div>



                                            </div>

                                            <span class="many-more"><?php esc_html_e( 'And many other premium features...', 'inspiro-blocks' ); ?></span>

                                            <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-blocks-pro/', 'inspiro-blocks' ) ); ?>" target="_blank" class="button button-large button-primary">
                                                <?php esc_html_e( 'Get Inspiro Blocks PRO Today &rarr;', 'inspiro-blocks' ); ?>
                                            </a>

                                    </div>

                            </div>

                            <div id="vs-pro" class="wpz-onboard_content-main-tab">

                                <div class="theme-info-wrap">
                                <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Inspiro Blocks Lite vs. Inspiro Blocks PRO', 'inspiro-blocks' ); ?></h3>
                                <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Below is a comparison chart of the free and the premium versions.', 'inspiro-blocks' ); ?></p>

                                <div class="theme-comparison">

                                            <table>
                                                <thead class="theme-comparison-header">
                                                    <tr>
                                                        <th class="table-feature-title"><h3><?php esc_html_e( 'Feature', 'inspiro-blocks' ); ?></h3></th>
                                                        <th><h3><?php esc_html_e( 'Inspiro Blocks Lite', 'inspiro-blocks' ); ?></h3></th>
                                                        <th><h3><?php esc_html_e( 'Inspiro Blocks PRO', 'inspiro-blocks' ); ?></h3></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Responsive Layout', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Site Editor Support', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Block Patterns', 'inspiro-blocks' ); ?></h3></td>
                                                        <td>20</td>
                                                        <td>40+</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Advanced WooCommerce Integration', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Demo Content Importer', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>

                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Starter Sites', 'inspiro-blocks' ); ?></h3></td>
                                                        <td>1</td>
                                                        <td>3</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Portfolio with Video Integration', 'inspiro-blocks' ); ?></strong> <span class="table-new-promo">POPULAR FEATURE</span></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'YouTube & Vimeo Backgrounds', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><em>Coming Soon</em></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Video Background on Hover', 'inspiro-blocks' ); ?></strong> <span class="table-new-promo">POPULAR FEATURE</span></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Video & Image Lightbox for Portfolio Posts', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Theme Options', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Google Fonts (Hosted Locally)', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Typography Options', 'inspiro-blocks' ); ?></h3></td>
                                                        <td>Limited</td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Support', 'inspiro-blocks' ); ?></h3></td>
                                                        <td><?php esc_html_e( 'Support Forum', 'inspiro-blocks' ); ?></td>
                                                        <td><?php esc_html_e( 'Fast Email Support', 'inspiro-blocks' ); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="https://www.wpzoom.com/themes/inspiro-blocks-pro/" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Get Inspiro Blocks PRO Today!', 'inspiro-blocks' ); ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </div>

                            <div id="demos" class="wpz-onboard_content-main-tab wpz-onboard_content-main-theme-child">

                                <div class="theme-info-wrap">

                                    <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Inspiro Blocks PRO Demos', 'inspiro-blocks' ); ?></h3>
                                    <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Below you can demos available in the Inspiro Blocks PRO theme. You can get access to all of them by purchasing the PRO version of the theme.', 'inspiro-blocks' ); ?></p>

                                    <ol class="wpz-onboard_content-main-steps">

                                        <li id="step-choose-design" class="wpz-onboard_content-main-step step-1 step-choose-design">
                                            <div class="wpz-onboard_content-main-step-content">

                                                <form method="post" action="#">

                                                    <ul>
                                                        <li class="design_default-elementor">
                                                            <figure title="Portfolio (Default)">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.amazonaws.com/inspiro-blocks-pro/default.png')"><a href="https://demo.wpzoom.com/inspiro-blocks-pro/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Agency / Business</h5>
                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-blocks-pro/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_default-elementor">
                                                            <figure title="Portfolio (Default)">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.amazonaws.com/inspiro-blocks-pro/video.png')"><a href="https://demo.wpzoom.com/inspiro-blocks-pro-video/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Portfolio / Video</h5>
                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-blocks-pro-video/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_default-elementor">
                                                            <figure title="Portfolio (Default)">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.amazonaws.com/inspiro-blocks-pro/shop.png')"><a href="https://demo.wpzoom.com/inspiro-blocks-pro-shop/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>WooCommerce Shop</h5>
                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-blocks-pro-shop/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                    </ul>

                                                </form>
                                            </div>
                                        </li>

                                    </ol>




                                    <br />
                                    <br />
                                    <p class="wpz-onboard_content-main-intro"><em><?php esc_html_e( 'More demos are added with new major update!', 'inspiro-blocks' ); ?></em></p>

                                    <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-blocks-pro/', 'inspiro-blocks' ) ); ?>" target="_blank" class="button button-large button-primary">
                                        <?php esc_html_e( 'Get Inspiro Blocks PRO Today &rarr;', 'inspiro-blocks' ); ?>
                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="wpz-onboard_content-side">

                            <div class="wpz-onboard_content-side-section discover-premium">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_3409_3568" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                    <rect width="24" height="24" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_3409_3568)">
                                    <path d="M19 9L17.75 6.25L15 5L17.75 3.75L19 1L20.25 3.75L23 5L20.25 6.25L19 9ZM19 23L17.75 20.25L15 19L17.75 17.75L19 15L20.25 17.75L23 19L20.25 20.25L19 23ZM9 20L6.5 14.5L1 12L6.5 9.5L9 4L11.5 9.5L17 12L11.5 14.5L9 20ZM9 15.15L10 13L12.15 12L10 11L9 8.85L8 11L5.85 12L8 13L9 15.15Z" fill="white"/>
                                    </g>
                                    </svg> <?php esc_html_e( 'Inspiro Blocks PRO', 'inspiro-blocks' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Upgrade to the Premium version to get instant access to unique features and dozen of pre-built demos!', 'inspiro-blocks' ); ?></p>

                                <a href="https://www.wpzoom.com/themes/inspiro-blocks-pro/" title="Inspiro Blocks PRO" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-premium.png' ); ?>" width="300" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro-blocks' ); ?>" /></a>

                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://www.wpzoom.com/themes/inspiro-blocks-pro/" title="Inspiro Blocks PRO" target="_blank" class="button"><?php esc_html_e( 'Discover the PRO Version &rarr;', 'inspiro-blocks' ); ?></a>
                                </div>

                            </div>


                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.96074 2H19.9019C20.9965 2 21.8921 2.9 21.8921 4V16C21.8921 17.1 20.9965 18 19.9019 18H7.96074C6.86614 18 5.97055 17.1 5.97055 16V4C5.97055 2.9 6.86614 2 7.96074 2ZM1.99017 6H3.98036V20H17.9117V22H3.98036C2.88576 22 1.99017 21.1 1.99017 20V6ZM19.9019 16H7.96075V4H19.9019V16ZM17.9117 9H9.95093V11H17.9117V9ZM9.95093 12H13.9313V14H9.95093V12ZM17.9117 6H9.95093V8H17.9117V6Z"></path>
                                    </svg> <?php esc_html_e( 'Need help?', 'inspiro-blocks' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Documentation is the place where you’ll find the information needed to setup the theme quickly, and other details about theme-specific features. You can also get in touch with our team by contacting us through our website or using the Support Forum.', 'inspiro-blocks' ); ?></p>
                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://www.wpzoom.com/documentation/inspiro-blocks/" title="Read documentation" target="_blank" class="button"><?php esc_html_e( 'Documentation', 'inspiro-blocks' ); ?></a> <a href="https://wordpress.org/support/theme/inspiro-blocks/" title="Open Support Desk" target="_blank" class="button"><?php esc_html_e( 'Support Forums', 'inspiro-blocks' ); ?></a>

                                </div>

                            </div>

                            <div class="wpz-onboard_content-side-section">
                            <div class="section">
                                <div class="inner-section">
                                    <?php
                                    $current_user = wp_get_current_user();
                                    ?>

                                    <h3 class="wpz-onboard_content-side-section-title">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="21"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg> <?php esc_html_e( 'Subscribe for Tips & Tricks', 'inspiro-blocks' ); ?>
                                    </h3>
                                    <p class="about">
                                        <?php esc_html_e( 'To ease up the journey you’re starting with Inspiro, we’re sending you some useful tips & tricks to have the best experience building your website.', 'inspiro-blocks' ); ?>
                                    </p>
                                    <p>
                                        <div id="mlb2-5543648" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-5543648">
                                          <div class="ml-form-align-center">
                                            <div class="ml-form-embedWrapper embedForm">
                                              <div class="ml-form-embedBody ml-form-embedBodyDefault row-form">
                                                <form class="ml-block-form" action="https://static.mailerlite.com/webforms/submit/f1v8a3" data-code="f1v8a3" method="post" target="_blank">
                                                    <input aria-label="email" aria-required="true" type="email" value="<?php echo esc_attr($current_user->user_email); ?>" class="form-control" data-inputmask="" name="fields[email]" placeholder="Email" autocomplete="email">
                                                  <input type="hidden" name="ml-submit" value="1">
                                                  <span class="ml-form-embedSubmit">
                                                    <button type="submit" class="button button-primary">Subscribe</button>
                                                    <button disabled="disabled" style="display:none" type="button" class="loading button-primary"> <div class="ml-form-embedSubmitLoad"></div> <span class="sr-only">Loading...</span> </button>
                                                  </span>
                                                  <input type="hidden" name="anticsrf" value="true">
                                                </form>
                                              </div>
                                              <div class="ml-form-successBody row-success" style="display:none">
                                                <div class="ml-form-successContent">
                                                  <h3>Thank you!</h3>
                                                  <p>You have successfully joined our subscriber list.</p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <script>
                                          function ml_webform_success_5543648(){var r=ml_jQuery||jQuery;r(".ml-subscribe-form-5543648 .row-success").show(),r(".ml-subscribe-form-5543648 .row-form").hide()}
                                        </script>
                                        <img src="https://track.mailerlite.com/webforms/o/5543648/f1v8a3?v1646129865" width="1" height="1" style="max-width:1px;max-height:1px;visibility:hidden;padding:0;margin:0;display:block" alt="." border="0">
                                        <script src="https://static.mailerlite.com/js/w/webforms.min.js?v0c75f831c56857441820dcec3163967c" type="text/javascript"></script>                     </p>
                                </div>
                            </div>
                            </div>

                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-follow">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8971 9H14.618L15.5633 4.43L15.5932 4.11C15.5932 3.7 15.424 3.32 15.1553 3.05L14.1005 2L7.55281 8.59C7.18462 8.95 6.9657 9.45 6.9657 10V20C6.9657 21.1 7.86129 22 8.95589 22H17.9118C18.7377 22 19.4442 21.5 19.7427 20.78L22.7479 13.73C22.8375 13.5 22.8872 13.26 22.8872 13V11C22.8872 9.9 21.9917 9 20.8971 9ZM20.897 13L17.9117 20H8.95587V10L13.2746 5.66003L12.17 11H20.897V13ZM4.9755 10H0.995117V22H4.9755V10Z"></path>
                                    </svg> Follow WPZOOM
                                </h3>
                                <p class="wpz-onboard_content-side-section-content">Follow us on social media for news and updates on all your theme needs.</p>
                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://twitter.com/wpzoom" target="_blank" title="Twitter" class="button button-smaller button-rounded"><span class="dashicons dashicons-twitter"></span> <span class="icon-text">Twitter</span></a>
                                    <a href="https://facebook.com/wpzoom" target="_blank" title="Facebook" class="button button-smaller button-rounded"><svg width="18" height="18" fill="#fff" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg> <span class="icon-text">Facebook</span></a>
                                    <a href="https://instagram.com/wpzoom" target="_blank" title="Instagram" class="button button-smaller button-rounded"><span class="dashicons dashicons-instagram"></span> <span class="icon-text">Instagram</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div> <!-- /#tabs -->

            <div class="wpz-onboard_footer">
                <h3 class="wpz-onboard_footer-logo"><a href="https://wpzoom.com/" title="WPZOOM">WPZOOM</a></h3>

                <ul class="wpz-onboard_footer-links">
                    <li class="wpz-onboard_footer-links-themes"><a href="https://www.wpzoom.com/themes/" target="_blank" title="Themes">Premium Themes</a></li>
                    <li class="wpz-onboard_footer-links-plugins"><a href="https://www.wpzoom.com/plugins/" target="_blank" title="Plugins">Plugins</a></li>
                    <li class="wpz-onboard_footer-links-blog"><a href="https://www.wpzoom.com/blog/" target="_blank" title="Blog">Our Blog</a></li>
                    <li class="wpz-onboard_footer-links-support"><a href="https://www.wpzoom.com/support/" target="_blank" title="Support">Support</a></li>
                </ul>
            </div>
        </div>

    <?php
}

?>