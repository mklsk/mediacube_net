<?php

define( 'IO_THEME_NAME', 'mediacube-network' );
define( 'IO_THEME_URI', get_theme_root_uri() . '/' . IO_THEME_NAME . '/' );
define( 'IO_THEME_ROOT', get_theme_root() . '/' . IO_THEME_NAME . '/' );

update_option( 'image_default_link_type', 'none' );
load_theme_textdomain( IO_THEME_NAME, get_template_directory() . '/languages' );

// LOAD COMPONENTS
require_once 'components/acf.php';
require_once 'components/admin.php';
require_once 'components/ahoy.php';
require_once 'components/categories.php';
require_once 'components/comments.php';
require_once 'components/load_more.php';
require_once 'components/menu.php';
require_once 'components/queries.php';
require_once 'components/theme_support.php';
require_once 'components/thumbnails.php';
