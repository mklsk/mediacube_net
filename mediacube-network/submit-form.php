<?php

@set_time_limit( 0 );
//define( 'WP_USE_THEMES', false );

require( dirname( dirname( dirname( __DIR__ ) ) ) . '/wp-load.php' );

if ( isset( $_POST ) && isset( $_POST[ 'type' ] ) ) {
    if ( $_POST[ 'type' ] == 'contacts' ) {
        $message = __( 'Name', IO_THEME_NAME ) . ': ' . $_POST[ 'name' ] . PHP_EOL;
        $message .= __( 'Email', IO_THEME_NAME ) . ': ' . $_POST[ 'email' ] . PHP_EOL;
        $message .= __( 'Phone', IO_THEME_NAME ) . ': ' . $_POST[ 'phone' ] . PHP_EOL;
        $message .= __( 'How can we help you?', IO_THEME_NAME ) . ': ' . $_POST[ 'help' ] . PHP_EOL;
        $message .= __( 'Message', IO_THEME_NAME ) . ': ' . nl2br( $_POST[ 'message' ] );
        $message .= PHP_EOL . PHP_EOL . 'MediaCube Network';
        wp_mail( get_field( 'feedback_email', 'options' ), __( 'New message from MediaCube Network website', IO_THEME_NAME ), $message, 'From: no-reply@mediacube.network' );
    } elseif ( $_POST[ 'type' ] == 'partners' ) {
        $message = __( 'First Name', IO_THEME_NAME ) . ': ' . $_POST[ 'first_name' ] . PHP_EOL;
        $message .= __( 'Last Name', IO_THEME_NAME ) . ': ' . $_POST[ 'last_name' ] . PHP_EOL;
        $message .= __( 'Date of Birth', IO_THEME_NAME ) . ': ' . $_POST[ 'birthday' ] . PHP_EOL;
        $message .= __( 'Email', IO_THEME_NAME ) . ': ' . $_POST[ 'email' ] . PHP_EOL;
        $message .= __( 'Phone', IO_THEME_NAME ) . ': ' . $_POST[ 'phone' ] . PHP_EOL;
        $message .= __( 'Link to your profile in social networks', IO_THEME_NAME ) . ': ' . $_POST[ 'link' ] . PHP_EOL;
        $message .= __( 'Link to your YouTube-channel', IO_THEME_NAME ) . ': ' . $_POST[ 'link2' ] . PHP_EOL;
        $message .= PHP_EOL . PHP_EOL . 'MediaCube Network';
        wp_mail( get_field( 'feedback_email', 'options' ), __( 'New joining from MediaCube Network website', IO_THEME_NAME ), $message, 'From: no-reply@mediacube.network' );
    } elseif ( $_POST[ 'type' ] == 'subscribe' ) {
        $message .= __( 'Email', IO_THEME_NAME ) . ': ' . $_POST[ 'email' ] . PHP_EOL;
        $message .= PHP_EOL . PHP_EOL . 'MediaCube Network';
        wp_mail( get_field( 'feedback_email', 'options' ), __( 'New subscription from MediaCube Network', IO_THEME_NAME ), $message, 'From: no-reply@mediacube.network' );
    }
}
