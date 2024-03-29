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
define( 'DB_NAME', 'site1' );

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
define( 'AUTH_KEY',         '^I2z5WhE/3ANWL|5J]VYATAA<gjvE-:1ZL]a3.zTvi`7z8u,  G|YEc|=TYm|[Jg' );
define( 'SECURE_AUTH_KEY',  '-6VbrMvlD]A1atXd-Z(,wk|95=M@9sosx|y4F~~zB>2fF2pR7[cs5rS6Jp@T6|MJ' );
define( 'LOGGED_IN_KEY',    '9);<G@Uh%MH.N&A!6k2p.#T]U?xVnp$h6Z|{Db%$sT&eBtPE-QVZzC36C|(yf@S&' );
define( 'NONCE_KEY',        'y0j[sq] vG4d#H lsoO,z3Nb@]5GWS 5, PF{:bf;mN%XU+a+z{E],2|Yl4JK8&d' );
define( 'AUTH_SALT',        'Nm4QVKCV+]mzMC:h[ a=U?7h>muu4mofoa8t+*KB`|+FJ{?k1AQ3hFcYw7a%wT>*' );
define( 'SECURE_AUTH_SALT', 'V`OjPGxYVJx:{;d*Mfxk!Ay4+2a{,F5`n6PgSVD~|iV*^+lFFFamW-zMy#sJwFJ3' );
define( 'LOGGED_IN_SALT',   'mBsWe#KM8HH26AcNm&b&`{Ox#qlMs3Jkjh]AS^gCy(raJ @.H4_j`8sVX??0&mPN' );
define( 'NONCE_SALT',       '[lIgVX[wi]X8WwpGE1Goj^,@:I{q[pT;oawC_9>Y8F%E1z`3ySu{N;mST}zOvKP<' );

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
