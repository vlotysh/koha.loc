<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup -----------------Настройки окружения--------------------------------

// Load the core Kohana class
// Загрузка класса ядра
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
       //  Приложение расширяющее ядро
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
        // Загрузка пустого расширения ядра
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 * Установка часового пояса по-умолчанию
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Kiev');

/**
 * Set the default locale.
 * Установка локализации
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'ru_RU.utf-8');

/**
 * Enable the Kohana auto-loader.
 * Активация автозагрузчика Коханы
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 * Активация автозагрузчика для ансериализации
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 * Язык по-умолчанию
 */
//I18n::lang('ru-ru');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 * Установка [переменной] окружения Коханы
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 * Если задано не верное окружение, получим ошибку
 * DEVELOPMENT - окружение для разработки приложения
 * Другие константы PRODUCTION, STAGING, TESTING и DEVELOPMENT.
 * Готовый проект, подготовка, тестирование и разработка.
 */
//Kohana::$environment = Kohana::DEVELOPMENT;
/*if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}*/
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}
else
{
	Kohana::$environment = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' ? Kohana::DEVELOPMENT : Kohana::PRODUCTION);
}

/**
 * Initialize Kohana, setting the default options.
 * Инициализация настроек и их значения поумолчанию
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 *                        путь или дополнительный домен нашего приложения
 * - string   index_file  name of your index file, usually "index.php"       index.php
 *                        имя индексного файла, обычно "index.php"
 * - string   charset     internal character set used for input and output   utf-8
 *                        внутренняя кодировка приложения
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 *                        внутренняя директория с кешем
 * - boolean  errors      enable or disable error handling                   TRUE
 *                        включен или выключен обработчик ошибок
 * - boolean  profile     enable or disable internal profiling               TRUE
 *                        включено или выключено внутренее  профилирование
 * - boolean  caching     enable or disable internal caching                 FALSE
 *                        включено или выключено внутреннее кеширование
 */
//Kohana::init(array('base_url'   => '/kohana/',));
Kohana::init(array('base_url' => '/','index_file' =>'','profile'=>FALSE));


/**
 * Attach the file write to logging. Multiple writers are supported.
 */
//Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
* Cookie
*/
// Set the magic salt to add to a cookie
Cookie::$salt = Kohana::$config->load('ko32example.cookie_salt');
// Set the number of seconds before a cookie expires
Cookie::$expiration = Kohana::$config->load('ko32example.cookie_lifetime');
// Restrict the path that the cookie is available to
//Cookie::$path = '/';
// Restrict the domain that the cookie is available to
//Cookie::$domain = 'www.kerkness.ca';
// Only transmit cookies over secure connections
//Cookie::$secure = TRUE;
// Only transmit cookies over HTTP, disabling Javascript access
//Cookie::$httponly = TRUE;

/**
 * Session
 */
Session::$default = 'database';



/**
 * Set the default language
 */
// check cookie first
$lang = Cookie::get('lang');

// if no cookie, rely on accept_language
if(empty($lang)) {
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}

// default to en if language not supported or empty
if(!in_array($lang, Kohana::$config->load('ko32example.language'))) {
	$lang = 'ru';
}


// set language
I18n::lang($lang);
/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	 'auth'       => MODPATH.'auth',       // Basic authentication
	'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
         'pagination'=>MODPATH.'pagination',
	// 'psql'        => MODPATH.'psql',        // PostgreSQL
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 * Установка роутов (путей, маршрутов)
 */




Route::set('error', 'error/<action>(/<message>)', array('action' => '[0-9]++', 'message' => '.+'))
    ->defaults(array(
        'controller' => 'error'
    ));

Route::set('view', 'view/<id>(/page-<page>)', array('id' => '[0-9]+', 'page' => '[0-9]+'))
    ->defaults(array(
        'controller' => 'page',
        'action' => 'view',
    ));
Route::set('login', 'login')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'account',
		'action'     => 'login',
	));
	
Route::set('logout', 'logout')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'account',
		'action'     => 'logout',
	));
	
Route::set('noaccess', 'noaccess')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'account',
		'action'     => 'noaccess',
	));
	
///
Route::set('page', '<action>', array('action' => 'about|contact|why_site'))
        ->defaults(array(
            'controller' => 'page',
    ));

///
Route::set('signup', 'signup')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'account',
		'action'     => 'signup',
	)); 

Route::set('checkusername', 'checkusername')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'account',
		'action'     => 'checkusername',
	)); 

Route::set('language', '<lg>', array('lg' => 'ru|ua|en'))
    ->defaults(array(
    
        'controller' => 'welcome',
        'action' => 'language',
        
    ));

Route::set('profile-private', 'profile/private')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'profile',
		'action'     => 'private',
	));


Route::set('mail', 'mail(/<action>(/id))', array('id' => '[0-9]+'))
	->defaults(array(
                'controller' => 'mail',
		'action'     => 'index',
	));

Route::set('mail-view','mail/view/<id>',array('id' => '[0-9]+'))
        ->defaults(array(
                'controller' => 'mail',
		'action'     => 'view'
            
        ));

//Отправка личных сообщений

Route::set('profile-addpm', 'profile/addpm')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'profile',
		'action'     => 'addpm',
	));


Route::set('profile-admin', 'profile/admin')
	->defaults(array(
		'directory' => 'user',
		'controller' => 'profile',
		'action'     => 'admin',
	));

Route::set('profile', 'profile/<id>(/<optional>)', array(
		'id' => '[0-9]+', 
		'optional' => '.*'))
	->defaults(array(
		'directory' => 'user',
		'controller' => 'profile',
		'action'     => 'index',
	));

Route::set('profile', 'profile/user:(<id>)', array(
		'id' => '[0-9]+', 
		))
	->defaults(array(
		'directory' => 'user',
		'controller' => 'profile',
		'action'     => 'user',
	));


Route::set('pm','profile/pm/<id>',array('id' => '[0-9]+'))
        ->defaults(array(
                'directory' => 'user',
		'controller' => 'profile',
		'action'     => 'pm'
            
        ));

Route::set('get_pm','messages/get_pm/<id>(/<optional>)',array('id' => '[0-9]+','optional' => '.*'))
        ->defaults(array(
                'directory' => 'user',
		'controller' => 'messages',
		'action'     => 'get_pm',
            
        ));
        

Route::set('user-messages', 'messages/get_messages/<id>(/<optional>)', array(
		'id' => '[0-9]+', 
		'optional' => '.*'))
	->defaults(array(
		'directory' => 'user',
		'controller' => 'messages',
		'action'     => 'get_messages',
	));

Route::set('user-add-message', 'messages/add(/<id>)', array('id' => '[0-9]+'))
	->defaults(array(
		'directory' => 'user',
		'controller' => 'messages',
		'action'     => 'add'
	));

        
        
Route::set('user-edit-message', 'messages/edit(/<user_id>(/<message_id>))', array('user_id' => '[0-9]+'))
	->defaults(array(
                'directory' => 'user',
		'controller' => 'messages',
		'action'     => 'edit'
	));

Route::set('page-edit', 'page/edit(/<id>)')
	->defaults(array(
		
		'controller' => 'page',
		'action'     => 'edit'
	));
Route::set('user-delete-message', 'messages/delete(/<user_id>(/<message_id>))', array('id' => '[0-9]+'))
	->defaults(array(
		'directory' => 'user',
		'controller' => 'messages',
		'action'     => 'delete'
	));
	


Route::set('new-messages', 'new(/<user_id>(/<message_id>))', array('id' => '[0-9]+'))
->defaults(array(
	'directory' => 'user',
	'controller' => 'messages',
	'action'     => 'new'
));


Route::set('default', '(<controller>(/<action>(/<name>)))')
	->defaults(array(
		'controller' => 'welcome',
		'action'     => 'index',
	));
