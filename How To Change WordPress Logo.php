/* Change wordpress logo code by InfoDecode Tech
 */
<?php
// WordPress Login Logo
if( !function_exists( 'custom_login_logo' ) ){
    function custom_login_logo() {
        echo '<style>
            h1 a { background-image: url("path/logo.png") !important; }
        </style>';
    }
    add_action( 'login_head', 'custom_login_logo' );
}

// Change the URL of the login logo on the login page
if( ! function_exists( 'custom_login_logo_url' ) ){
    add_filter( 'login_headerurl', 'custom_login_logo_url' );
    function custom_login_logo_url() {
        return 'https://#';
    }
}

//WordPress admin bar
if( !function_exists( 'custom_admin_bar_logo' ) ) {
    function custom_admin_bar_logo()
    {
        if(!is_user_logged_in()){
            return;
        }
        echo '
        <style>
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-image: url("path/logo.png") !important;
                background-position: 0 0;
                color:rgba(0, 0, 0, 0);
                background-size: contain;
            }
            #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
                background-position: 0 0;
            }
        </style>
        ';
    }
    add_action('admin_head', 'custom_admin_bar_logo'); // for the back-end
    add_action('wp_head', 'custom_admin_bar_logo'); // for the front end
}

// Change the link on the admin bar under the logo
if( !function_exists( 'custom_admin_bar_logo_link' ) ){
    function custom_admin_bar_logo_link() {
        if( !is_user_logged_in() ){
            return;
        }
        echo "
        <script type='text/javascript'>
            (function(){
                document
                    .getElementById('wp-admin-bar-wp-logo')
                    .children[0]
                    .setAttribute('href', 'https://#')
            })();
        </script>
        ";
    }
    add_action('admin_footer', 'custom_admin_bar_logo_link'); //Trigger on backend
    add_action('wp_footer', 'custom_admin_bar_logo_link'); //Trigger on front-end
}

// Remove the WordPress.org links from the WordPress admin bar
if( !function_exists('custom_remove_wp_links_under_the_logo') ) {
    function custom_remove_wp_links_under_the_logo() {
        if( !is_user_logged_in() ){
            return;
        }
        echo '
        <style>
            #wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper{
                display: none !important;
            }
        </style>
        ';
    }
    add_action('admin_head', 'custom_remove_wp_links_under_the_logo'); // Hide on backend
    add_action('wp_head', 'custom_remove_wp_links_under_the_logo'); // Hide on frontend
}