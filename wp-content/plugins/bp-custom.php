<?php

/**
 * Disable Confimation Messages and E-mail.
 **/
function yzc_disable_bp_confirmation_email() {
    return false;
}

add_filter( 'bp_registration_needs_activation', 'yzc_disable_bp_confirmation_email' );
add_filter( 'bp_core_signup_send_activation_key', 'yzc_disable_bp_confirmation_email' );

/**
 * Change Resend Activation Email
 */
function yzc_resend_activation_email_msg() {
    return "Your account has not been activated yet. it's still pending approval";
}

add_filter( 'yz_get_inactive_account_message_resend_msg', 'yzc_resend_activation_email_msg' );

/**
 * Change Confirmation Message.
 */
function yzc_translate_account_activation_msg( $translated_text ) {
    switch ( $translated_text ) {
        case 'You have successfully created your account! Please log in using the username and password you have just created.' :
            $translated_text = __( 'Thanks for registering! Your account is now pending approval. We will send you an email to let you know when your account approved !', 'youzer' );
            break;
        case '<strong>ERROR</strong>: Your account has not been activated. Check your email for the activation link.' :
            $translated_text = __( "<strong>ERROR</strong>: Your account has not been activated yet. it's still pending approval.", 'youzer' );
            break;       
        case 'If you have not received an email yet, <a href="%s">click here to resend it</a>.':
            $translated_text = 'We will send you an email to let you know when your account approved !';
            break;
    }
    return $translated_text;
}

add_filter( 'gettext', 'yzc_translate_account_activation_msg', 30 );

/**
 * Send a welcome email when a user account is activated
 */
add_action( 'bp_core_activated_user', 'yzc_welcome_user_notification', 10, 3 );
 
function yzc_welcome_user_notification( $user_id, $key = false, $user = false ) {
 
    if ( is_multisite() ) {
        return ;// we don't need it for multisite
    }
    //send the welcome mail to user
    //welcome message
 
    $welcome_email = __( 'Dear USER_DISPLAY_NAME,
 
Your new account is approved.
 
You can log in with the following information:
Username: USERNAME
LOGINLINK
 
Thanks!
 
- SITE_NAME' );
 
    //get user details
    $user = get_userdata( $user_id );
    //get site name
    $site_name = get_bloginfo( 'name' );
    //update the details in the welcome email
    $welcome_email = str_replace( 'USER_DISPLAY_NAME', $user->first_name, $welcome_email );
    $welcome_email = str_replace( 'SITE_NAME', $site_name, $welcome_email );
    $welcome_email = str_replace( 'USERNAME', $user->user_login, $welcome_email );
    $welcome_email = str_replace( 'LOGINLINK', wp_login_url(), $welcome_email );
 
    //from email
    $admin_email = get_site_option( 'admin_email' );
 
    if ( empty( $admin_email ) ) {
        $admin_email = 'support@' . $_SERVER['SERVER_NAME'];
    }
 
    $from_name = $site_name . "<$admin_email>" ;//from
    $message_headers =  array(
        'from'          => $from_name,
        'content-type'  => 'text/plain; charset='. get_option('blog_charset')
    );
 
    //EMAIL SUBJECT
    $subject = sprintf( __( 'Welcome to   %1$s ' ), $site_name ) ;
    //SEND THE EMAIL
    wp_mail( $user->user_email, $subject, $welcome_email, $message_headers );
 
    return true;
}