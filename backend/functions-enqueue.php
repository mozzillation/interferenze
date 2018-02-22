<?php
/**
 *
 * @package una
 * @since una 1.0.2
 * @license GPL 2.0
 *
 */

#-------------------------------------------------------------
# Enqueue Styles
#-------------------------------------------------------------

function interferenze_enqueue_styles() {

	# Main stylesheet
  	wp_register_style( 'interferenze-main-styles' , get_template_directory_uri(). "/style.css" , array(), una_theme_version, 'screen' );
  	wp_enqueue_style( 'interferenze-main-styles' );

}

add_action( 'wp_enqueue_scripts' , 'interferenze_enqueue_styles' );

#-------------------------------------------------------------
# Enqueue Scripts
#-------------------------------------------------------------

# False = Header
# True = Footer

function interferenze_enqueue_scripts() {

  # Jquery
  wp_register_script  ( 'jquery-2.2.4.min' , get_template_directory_uri().'/frontend/js/jquery-2.2.4.min.js' , array(), interferenze_theme_version, false );
  wp_enqueue_script ( 'jquery-2.2.4.min' );

  # Jquery Lazy
  wp_register_script  ( 'jquery.lazy.min' , get_template_directory_uri().'/frontend/js/jquery.lazy.min.js' , array(), interferenze_theme_version, false );
  wp_enqueue_script ( 'jquery.lazy.min' );

  # Jquery Validate
  wp_register_script  ( 'jquery.validate.min' , get_template_directory_uri().'/frontend/js/jquery.validate.min.js' , array(), interferenze_theme_version, false );
  wp_enqueue_script ( 'jquery.validate.min' );

	# Custom Scripts
	wp_register_script  ( 'interferenze-custom-code' , get_template_directory_uri().'/frontend/js/custom-code.js' , array(), interferenze_theme_version, false );
	wp_enqueue_script ( 'interferenze-custom-code' );

}

add_action( 'wp_enqueue_scripts' , 'interferenze_enqueue_scripts'   );


#-------------------------------------------------------------
# Menu
#-------------------------------------------------------------

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header' ),
      'contacts-menu' => __( 'Contacts' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

#-------------------------------------------------------------
# Thumbnail
#-------------------------------------------------------------

add_theme_support( 'post-thumbnails' );

#-------------------------------------------------------------
# Mailchimp
#------------------------------------------------------------

function rudr_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
	$data = array(
		'apikey'        => $api_key,
    'email_address' => $email,
		'status'        => $status,
		'merge_fields'  => $merge_fields
	);
	$mch_api = curl_init(); // initialize cURL connection

	curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
	curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
	curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
	curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
	curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch_api, CURLOPT_POST, true);
	curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json

	$result = curl_exec($mch_api);
  $json = json_decode($result);
  //echo $json->{'status'};
	return $result;
}

function rudr_mch_subscribe(){
	$list_id = '90e3ce7a46';
	$api_key = 'ffef9ef00895cd23d0604523c64b341d-us17';

  	$result = json_decode( rudr_mailchimp_subscriber_status($_POST['email'], 'subscribed', $list_id, $api_key, array('FNAME' => $_POST['fname'],'LNAME' => $_POST['lname']) ) );
  	//print_r( $result );

  	if( $result->status == 400 ){
  		foreach( $result->errors as $error ) {
  			echo '<p>Error: ' . $error->message . '</p>';
  		}
  	} elseif( $result->status == 'subscribed' ){

  		echo 'Thank you for your submission, ' . $result->merge_fields->FNAME . '.';
  	}
  	// $result['id'] - Subscription ID
  	// $result['ip_opt'] - Subscriber IP address
  	die;
  }

  add_action('wp_ajax_mailchimpsubscribe','rudr_mch_subscribe');
  add_action('wp_ajax_nopriv_mailchimpsubscribe','rudr_mch_subscribe');
