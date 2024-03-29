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
define( 'DB_NAME', 'site2' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'lippowe' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '123321' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ')~m 1rB*e78<XQa7X#dKIM/eUlbB8h+uHQ?~klI~Fa}jl$Gi4e?h#vmySDJN{O9`' );
define( 'SECURE_AUTH_KEY',  'u44?{07a#(E$~_fQus?ke/G%7XEJRv^|wx$>rJu1n<2xNSDA=49z~)IJF+E#G2R{' );
define( 'LOGGED_IN_KEY',    '(!P?ynd0uteps&a/#+XaqKl=K`#L$oK3J3LO5{XVrE23UTt%[@y]zujCsy<IV!^e' );
define( 'NONCE_KEY',        '<=;begLg%qkRSXO$aeDwO><64U+iY$L,w<|-18@8U,4}u1l|5pkeDN80Gn9$+!;:' );
define( 'AUTH_SALT',        '8*7PMuDb4swvf<-S$G&@?.j-[MY^>^4p_8fVq%Gh0/Psf6TDZ=W)TI}q,~(FmnQG' );
define( 'SECURE_AUTH_SALT', '8BkBgGC$gvG[2A={Nzn-MU#Rm/aTl#l*?+b(`[hQ-V6f:*Zv,UUcbi(bcOW:;$hD' );
define( 'LOGGED_IN_SALT',   'JR?C4ISJP9O;{7wEuiHYR#)UHRT1.IE}mJ+M;,qqCA{8mY?lXn:Nk,=+DOe^%%Ex' );
define( 'NONCE_SALT',       'jWcq3;{d)qv)A;2Q5h_Ng!kvE|X*__wM;}X8Bl6J6mV(!=@&(&u5TY3~d;m86a6Z' );

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
