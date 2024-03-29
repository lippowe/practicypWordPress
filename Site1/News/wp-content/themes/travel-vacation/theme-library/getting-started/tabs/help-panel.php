<?php
/**
 * Help Panel.
 *
 * @package travel_vacation
 */
?>

<div id="help-panel" class="panel-left visible">
    <div id="#help-panel" class="steps">  
        <h4><?php esc_html_e( 'Quick Setup for Home Page', 'travel-vacation' ); ?></h4>
        <hr class="quick-set">
        <p><?php esc_html_e( '1) Go to the dashboard. navigate to pages, add a new one, and label it "home" or whatever else you like.The page has now been created.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '2) Go back to the dashboard and then select Settings.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '3) Then Go to readings in the setting.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '4) There are 2 options your latest post or static page.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '5) Select static page and select from the dropdown you wish to use as your home page, save changes.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '6) You can set the home page in this manner.', 'travel-vacation' ); ?></p>
        <hr>
        <h4><?php esc_html_e( 'Setup Slider Section', 'travel-vacation' ); ?></h4>
        <hr class="quick-set">
        <p><?php esc_html_e( '1) Go to dashboard > Go to appereance > then Go to customizer.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '2) In Customizer > Go to Front Page Options > Go to Banner Section.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '3) For Setup Banner Section you have to create post in dashbord first.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '4) In Banner Section > Enable the Toggle button > and fill the following details.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '5) In this way you can set Banner Section.', 'travel-vacation' ); ?></p>
        <hr>
        <h4><?php esc_html_e( 'Setup Places Section', 'travel-vacation' ); ?></h4>
        <hr class="quick-set">
        <p><?php esc_html_e( '1) Go to dashboard > Go to appereance > then Go to customizer.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '2) In Customizer > Go to Front Page Options > Go to Places Section.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '3) For Setup Places Section you have to create post in dashbord first.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '4) In Places Section > Enable the Toggle button > and fill the following details.', 'travel-vacation' ); ?></p>
        <p><?php esc_html_e( '5) In this way you can set Places Section.', 'travel-vacation' ); ?></p>
    </div>
    <hr>
    <div class="custom-setting">
        <h4><?php esc_html_e( 'Quick Customizer Settings', 'travel-vacation' ); ?></h4>
        <span><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a></span>
    </div>
    <hr>
   <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-site-alt3"></span>
            </div>
            <h5><?php esc_html_e( 'Site Logo', 'travel-vacation' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-color-picker"></span>
            </div>
            <h5><?php esc_html_e( 'Color', 'travel-vacation' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=primary_color' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-screenoptions"></span>
            </div>
            <h5><?php esc_html_e( 'Theme Options', 'travel-vacation' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=travel_vacation_theme_options' ) ); ?>"target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
            
        </div>
    </div>
    <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-format-image"></span>
            </div>
            <h5><?php esc_html_e( 'Header Image ', 'travel-vacation' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-align-full-width"></span>
            </div>
            <h5><?php esc_html_e( 'Footer Options ', 'travel-vacation' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=travel_vacation_footer_copyright_text' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-page"></span>
            </div>
            <h5><?php esc_html_e( 'Front Page Options', 'travel-vacation' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=travel_vacation_front_page_options' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'travel-vacation' ); ?></a>
            
        </div>
    </div>
</div>


