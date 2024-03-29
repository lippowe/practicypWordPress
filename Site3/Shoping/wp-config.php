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
define( 'DB_NAME', 'shop' );

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
define( 'AUTH_KEY',         '/D-|#?T&CevxuUpohWXviS+lp*+SSu=/&k[+rvYN9!ZD1c)]Uq^@ZW3g$fWeqNo&' );
define( 'SECURE_AUTH_KEY',  '0/EY59[k>8^R<WF*yESQjp{q?6c+Y}JDYwmK3XX~i~oDv]c=]1jtP5:{T;8=`(iZ' );
define( 'LOGGED_IN_KEY',    'Gm>,loH+qmo}Z3MUYu%Sl|j|rf:k6m~3acwiRJkX?pb~)JWm^$pO$%>w#<M=ZT*Q' );
define( 'NONCE_KEY',        '%NYC[bD|?%F)<e<*!9T(sQ8S,>YHfqAX)WVDcNS=<?P>6|42Hk:km7Tb,~n%Lazx' );
define( 'AUTH_SALT',        '} M-(ey</S vc<J?]%|zrqd*Dz%{AWmwj9kRPfiKo59p3<+mRz=OjHA^]ZPut[iL' );
define( 'SECURE_AUTH_SALT', 'mlF^0+pF0GVRV#4Pad~ 3jGb7z@k,K8 [eMX(QIbpUw_z#;KLAD`<bq?IR;-Ou5B' );
define( 'LOGGED_IN_SALT',   'P&:5/{|ZMOBuuA uG<tKF*re[2%A^A@|t{28ih1TmJfz6M~3m|hv-M]&M7`CQ8JM' );
define( 'NONCE_SALT',       'e04$WaD@=& eLGM/Fas=U6g_j}XwpODeap2_2e~Jb12xGGCZ;TL%zZ/1OCbm([*z' );

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
