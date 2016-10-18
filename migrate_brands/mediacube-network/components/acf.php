<?php

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page();
}

// register ACF options capability
if ( function_exists( 'acf_set_options_page_capability' ) ) {
    acf_set_options_page_capability( 'manage_options' );
}

// set ACF options page title
if ( function_exists( 'acf_set_options_page_title' ) ) {
    acf_set_options_page_title( 'Настройки сайта' );
    acf_set_options_page_menu( 'Настройки сайта' );
}

if ( function_exists( "register_field_group" ) ) {
}

