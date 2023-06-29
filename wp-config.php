<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test_wp' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'wp-test-db' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'RRR`xctZ+%8Bm~Ao(*P/iwg(WowIZ$^cahP{bP(y55y75N2bSbc7|e(XxOp&bG0M' );
define( 'SECURE_AUTH_KEY',  'kdT[k%hjd[WQY/uJmlp:+t?<K`tJBJJM*[S_^|rmpZj<8]{OUW5=eU?EAM3.U1or' );
define( 'LOGGED_IN_KEY',    'ZkQxr;ojH@tUN. bX`dtISe[Gv(Y2&i%Nt+Wi:s3}C:f(]|xf%zNpp]<$[PB,}_i' );
define( 'NONCE_KEY',        'O:k;g5]q[q:[BTK,o&iFL}lkY?X 8$s}VTC_z1W9 jX6:8s[Be,Ijr>^&4i V~#n' );
define( 'AUTH_SALT',        '3I*FH`!&>OEsr=]eTX3I)IZk:M/r2ZS,6j>Vj]D]1MTay{D<8nnEo~%=!%?- wXc' );
define( 'SECURE_AUTH_SALT', 'pOe!5*xCKAFeh;m{]H8@`1v+[W-f%jhJyi:]vgxlS-:.tgE;dZQ<D:h{k:nqQRh{' );
define( 'LOGGED_IN_SALT',   'J6LVKGRa)J)649MaI.+[mk~R9kU{4Vp  <yNJQ_|_t5XI%aWF/X~YWD*5!*-_#;1' );
define( 'NONCE_SALT',       'Cu~w0Z:_}@<;+z(AM@5:YL3.I|JE@}?#u%h+$_GL+gvoR1<;of1w`(}l1E>!kJDS' );

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
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';