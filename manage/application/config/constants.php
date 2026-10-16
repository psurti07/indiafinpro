<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/**
 * Custom defines
 */

// Project details
define('PROJECT_NAME', 'indiafinpro');
define('COMPANY_NAME', 'Shree Ram Finhub Solutions LLp');
define('COMPANY_EMAIL', 'info@indiafinproo.com');
define('COMPANY_MOBILE', '+91-95127-63889');
define('COMPANY_CIN', 'ACP-2746');
define('COMPANY_GST', '24ACKFA3022A1Z8');
define('COMPANY_SITE', 'https://indiafinpro.com');
define('PARTNER_SITE', 'https://site.indiafinpro.com');
define('COMPANY_ADDRESS', '1st Flr, Plot 29, Parvati Nagar CHS2, Katargam Road, Katargam, Surat, Gujarat - 395004');
define('COMPANY_TIMING', '10 AM to 5 PM (Monday to Saturday)');

define('SECURE_SALT', 'verloopweb');

// Page PG details
define('PG_MAIN_PL', '#');
define('PG_MAIN_BL', '#');
define('PG_CARD_OFFER', '#'); // 3 fail payment page
define('PG_IVRPAYMENT_OFFER', '#'); // 4 
define('PG_SPECIAL_OFFER', '#'); // 5
define('PG_BUMPER_OFFER', '#'); // 6
define('PG_FESTIVAL_OFFER', '#'); // 7

//Social media
define('SM_GOOGLE', '#');
define('SM_FACEBOOK', '#');
define('SM_INSTAGRAM', '#');
define('SM_TWITTER', '#');
define('SM_LINKEDIN', '#');
define('SM_PINTEREST', '#');
define('SM_YOUTUBE', '#');

// Email SMTP details
define('SMTP_HOST', 'mail.indiafinpro.com');
define('SMTP_USER_INFO', 'info@indiafinpro.com');
define('SMTP_PASSWORD_INFO', 'Finbazar@4545');

define('SMTP_USER_SUPPORT', 'info@indiafinpro.com');
define('SMTP_PASSWORD_SUPPORT', 'Finbazar@4545');

define('SMTP_USER_HR', 'info@indiafinpro.com');
define('SMTP_PASSWORD_HR', 'Finbazar@4545');

// OBB - SMS details - m
define('SMS_OBB_API_KEY', '#');
define('SMS_OBB_USERNAME', '#');
define('SMS_OBB_PASSWORD', '#');
define('SMS_OBB_SENDER_ID', '#');

// SENDINBLUE details
define('SMTP_USER', 'info@indiafinpro.com');
define('SIB_NAME', 'indiafinpro.com');
define('SIB_EMAILID', 'info@indiafinpro.com');
define('SIB_APIKEY', '#');

// Whatsapp API
define('INTERAKT_KEY', '#');
define('AISENSY_KEY', '#');

//UAT Mobile Mumbers list
define('UAT_MOBILE_NUMBERS', serialize(array('9408881214', '9904466599')));

// Geoloc API Key
define('GEOLOC_API_KEY', '#');

// Facebook
define('ACCESS_TOKEN', '#');

define('COMPANY_CODE', '#');
define('LOCAL_IP', '190.92.174.183');
define('MASTER_API_KEY', '#');


