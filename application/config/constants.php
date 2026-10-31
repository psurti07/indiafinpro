<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ') or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS') or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/**
 * Custom defines
 */

// Project details
define('PROJECT_NAME', 'indiafinpro');
define('COMPANY_NAME', '#');
define('COMPANY_EMAIL', 'info@indiafinpro.com');
define('COMPANY_MOBILE', '#');
define('COMPANY_CIN', '#');
define('COMPANY_GST', '#');
define('COMPANY_SITE', 'https://indiafinpro.com');
define('PARTNER_SITE', '#');
define('COMPANY_ADDRESS', '#');
define('COMPANY_TIMING', '10 AM to 5 PM (Monday to Saturday)');

define('SECURE_SALT', 'verloopweb');

//Social media
define('SM_GOOGLE', '#');
define('SM_FACEBOOK', '#');
define('SM_INSTAGRAM', '#');
define('SM_TWITTER', '#');
define('SM_LINKEDIN', '#');
define('SM_PINTEREST', '#');
define('SM_YOUTUBE', '#');

// Email SMTP details
define('SMTP_HOST', 'mail.indiafinproo.com');
define('SMTP_USER_INFO', 'info@indiafinpro.com');
define('SMTP_PASSWORD_INFO', '#');

define('SMTP_USER_SUPPORT', 'info@indiafinpro.com');
define('SMTP_PASSWORD_SUPPORT', '#');

define('SMTP_USER_HR', 'info@indiafinpro.com');
define('SMTP_PASSWORD_HR', '#');

// OBB - SMS details - m
define('SMS_OBB_API_KEY', '#');
define('SMS_OBB_USERNAME', '#');
define('SMS_OBB_PASSWORD', '#');
define('SMS_OBB_SENDER_ID', '#');

// SENDINBLUE details
define('SMTP_USER', 'info@indiafinpro.com');
define('SIB_NAME', '#');
define('SIB_EMAILID', 'info@indiafinpro.com');
define('SIB_APIKEY', '#');

// Phonepe details
define('PHONEPE_MODE', '#');
define('PHONEPE_MID', '#');
define('PHONEPE_KEY', '#');
define('PHONEPE_KEY_INDEX', '1');

// Razorpay details
define('RAZOR_KEY_ID_DEMO', '#');
define('RAZOR_KEY_ID', '#');
define('RAZOR_KEY_SECRET', '#');

// SabPaisa details
define('SABPAISA_MODE', '#');
define('SABPAISA_CLIENT_CODE', '#');
define('SABPAISA_USERNAME', '#');
define('SABPAISA_PASSWORD', '#');
define('SABPAISA_AUTH_KEY', '#');
define('SABPAISA_AUTH_IV', '#');

/*define('SABPAISA_MODE', 'TEST');
define('SABPAISA_CLIENT_CODE', 'DCRBP');
define('SABPAISA_USERNAME', 'userph.jha_3036');
define('SABPAISA_PASSWORD', 'DBOI1_SP3036');
define('SABPAISA_AUTH_KEY', '0jeOYcu3UnfmWyLC');
define('SABPAISA_AUTH_IV', 'C28LAmGxXTqmK0QJ');*/

// Airpay details
define('AIRPAY_MERCHANT', '#');
define('AIRPAY_USERNAME', '#');
define('AIRPAY_KEY_PASSWORD', '#');
define('AIRPAY_SECRET', '#');

// Zaakpay Detail
define('ZAAKPAY_MODE', 'PROD');
define('ZAAKPAY_MERCHANT_IDENTIFIER', '#');
define('ZAAKPAY_SECRET_KEY', '#');
// Lyra details
define('LYRA_MODE', 'TEST');
define('LYRA_LCO_ID', '#');
define('LYRA_SHOP_ID', '#');
define('LYRA_MCC', '#');
define('LYRA_SHOP_NAME', '#');
define('LYRA_API_KEY','#');

define('OPENMONEY_MODE', 'PROD');
define('OPENMONEY_URL', '#');
define('OPENMONEY_API_KEY', '#');
define('OPENMONEY_API_SECRET', '#');

// Easebuzz details
define('EASEBUZZ_ENV', 'PROD');
define('EASEBUZZ_MERCHANT_KEY', '#');
define('EASEBUZZ_SALT', '#');


// Whatsapp API
define('INTERAKT_KEY_UE_1', '#');
define('INTERAKT_KEY_RM', '#');


define('AISENSY_KEY', '#');

define('AISENSY_KEY_OFFER', '#');


define('AISENSY_OFFER_URL', '#');
define('AISENSY_OFFER_IMAGE', '#');

define('AISENSY_MARKETING_URL', '#');
define('AISENSY_MARKETING_IMAGE', '#');

define('AISENSY_SUCCESS_URL', '#');
define('AISENSY_SUCCESS_IMAGE', '#');

define('AISENSY_FAIL_URL', '#');
define('AISENSY_FAIL_IMAGE', '#');

//UAT Mobile Mumbers list
define('UAT_MOBILE_NUMBERS', serialize(array('9408881214', '9904466599')));

// Geoloc API Key
define('GEOLOC_API_KEY', '#');

// Facebook
define('ACCESS_TOKEN', '#');

// Remarketing Cycle Days Set
define('LOCK_DAYS', '-90 days');

// Snapchat Access token & Pixel ID
define('SNAP_ACCESS_TOKEN', '#');
define('SNAP_PIXEL_ID', '#');

define('COMPANY_CODE', '#');
define('LOCAL_IP', '190.92.174.183');
