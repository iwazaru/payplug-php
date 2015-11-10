<?php
namespace Payplug\Core;
use Payplug\Exception;

/**
 * Minimal configuration to launch the script.
 */
class Config
{
    /**
     * The library version
     */
    const LIBRARY_VERSION = '2.1.0';

    /**
     * PHP minimal version required by this library
     */
    const PHP_MIN_VERSION = '5.3.0';

    /**
     * array   A dictionary whose keys are the name of the function required by this library and whose values are the
     * corresponding dependencies.
     * For instance:
     * <pre>
     *  'curl_version' => 'php5-curl'
     * </pre>
     * means that this program requires curl_version() function to work properly and that it corresponds to php5-curl
     * package.
     */
    public static $REQUIRED_FUNCTIONS = array(
        'json_decode'   => 'php5-json',
        'json_encode'   => 'php5-json',
        'curl_version'  => 'php5-curl'
    );
}

// Check PHP version
if (version_compare(phpversion(), Config::PHP_MIN_VERSION, "<")) {
    throw new \RuntimeException('This library requires PHP ' . Config::PHP_MIN_VERSION . ' or newer.');
}

// Check OpenSSL version
// http://blog.techstacks.com/2013/04/an-openssl-version-matrix.html
if (defined('OPENSSL_VERSION_NUMBER') && OPENSSL_VERSION_NUMBER < 0x10001001) {
    throw new \RuntimeException('This library requires OpenSSL 1.0.1 or newer. Please contact your webhoster or update your OpenSSL version.');
}

// Check PHP configuration
foreach(Config::$REQUIRED_FUNCTIONS as $key => $value) {
    if (!function_exists($key)) {
        throw new Exception\DependencyException('This library requires ' . $value . '.');
    }
}

// Check curl version
$curl_version = curl_version();
if ($curl_version['version_number'] < 0x71C00) {
    throw new \RuntimeException('This library requires Curl 7.28.0 or newer. Please contact your webhoster or update your curl version.');
}

// Prior to PHP 5.5, CURL_SSLVERSION_TLSv1 and CURL_SSLVERSION_DEFAULT didn't exist. Hence, we have to use a numeric value.
if (!defined('CURL_SSLVERSION_DEFAULT')) {
    define('CURL_SSLVERSION_DEFAULT', 0);
}
if (!defined('CURL_SSLVERSION_TLSv1')) {
    define('CURL_SSLVERSION_TLSv1', 1);
}
