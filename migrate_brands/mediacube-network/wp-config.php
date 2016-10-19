<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'mediacub_main' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'mediacub_main' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'se6Shabo' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', ':A@1HxMf|<>Kn`lKhq,`75GS6a1` rE}&D#r*e+Ot:- vhchrlq0zwu@l$8O%]K4' );
define( 'SECURE_AUTH_KEY', '~#{[E0F?nwd93L >}+oiTRu1oROS)8SzJy0Q}g3}cl$hs-M,aJ}/G{q~T}Rar8*x' );
define( 'LOGGED_IN_KEY', '.G6#}+2XeMR9p.LN}|-,MxM<~8Ftt6yD-uI5V4g}k_@B-4[2wL3`yXlHq(!et>c0' );
define( 'NONCE_KEY', '@eu>eW]oGhzW).u@ 8CGqH%Q5q4AIXlREz}@Ahw(HYMH--.[+Xf|p3=Gik5G%&9@' );
define( 'AUTH_SALT', 'S{{/b0[TFedGJuA-*3MCZOdz?.F6}?A@LTClKUMS&^?C-f9WjMkz|&%h{o>-xc^9' );
define( 'SECURE_AUTH_SALT', 'oY!{f,,T3Z!?-qr~Yp4U*;A-f[VaOH<J[/1IOPEBsSMGCUPEGOqg3<:(ZDK+~~Xx' );
define( 'LOGGED_IN_SALT', 'W!.O<@{kz`+jt#mH<gXcFIr5i!7@HS5o~p%-.+Y%rY;iNh0D-0ui5bs(2(ez![]+' );
define( 'NONCE_SALT', 'v|NJXS.?>CZFk`F/0kgVm4I~rS}MBPecZdtdoJXt{Lx+n>LxfDer5(7!v{]f+TGO' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', true);

define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
define( 'DOMAIN_CURRENT_SITE', 'mediacube.network' );
define( 'NOBLOGREDIRECT', false );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
