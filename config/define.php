<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-component-creater
 */

!defined('DS') && define('DS', DIRECTORY_SEPARATOR);
// App name
!defined('APP_NAME') && define('APP_NAME', 'Swoft');
// Project base path
!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

// Register alias
$aliases = [
    '@root' => BASE_PATH,
    '@env' => '@root',
    '@app' => '@root/src',
    '@runtime' => '@root/runtime',
    '@configs' => '@root/config',
    '@resources' => '@root/resources',
    '@beans' => '@configs/beans',
    '@properties' => '@configs/properties',
    '@console' => '@beans/console.php',
    '@vendor' => '@root/vendor',
];

\Swoft\App::setAliases($aliases);
