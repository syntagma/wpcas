<?php
/*
// Optional configuration file for wpCAS plugin
// 
// Settings in this file override any options set in the 
// wpCAS menu in Options and that menu will not be displayed
*/


// the configuration array
$wpcas_options = array(
	'cas_version' => 'SAML_VERSION_1_1',
        'include_path' => '/var/www/phpCAS/CAS.php',
        'server_hostname' => 'agora.adecco.com.ar',
        'server_port' => '8443',
        'server_path' => '/cas'
);

// this function gets executed 
// if the CAS username doesn't match a username in WordPress
function wpcas_nowpuser( $user_name, $email ){
        //echo $user_name.$email;
        $userid = wp_insert_user( array(
                user_login => $user_name,
                user_email => $email
        ));
	if (is_wp_error($userid)) {
		wp_die("Ha ocurrido un error al procesar su requerimiento: [wpcas_nowpuser] ".$userid->get_error_message());
	}
	else {
		wp_redirect(site_url('/'));
	}
}
?>
