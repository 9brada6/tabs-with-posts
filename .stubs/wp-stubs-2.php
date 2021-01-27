<?php

/**
 * Exception for HTTP requests
 *
 * @package Requests
 */
/**
 * Exception for HTTP requests
 *
 * @package Requests
 */
class Requests_Exception extends \Exception
{
    /**
     * Type of exception
     *
     * @var string
     */
    protected $type;
    /**
     * Data associated with the exception
     *
     * @var mixed
     */
    protected $data;
    /**
     * Create a new exception
     *
     * @param string $message Exception message
     * @param string $type Exception type
     * @param mixed $data Associated data
     * @param integer $code Exception numerical code, if applicable
     */
    public function __construct($message, $type, $data = \null, $code = 0)
    {
    }
    /**
     * Like {@see getCode()}, but a string code.
     *
     * @codeCoverageIgnore
     * @return string
     */
    public function getType()
    {
    }
    /**
     * Gives any relevant data
     *
     * @codeCoverageIgnore
     * @return mixed
     */
    public function getData()
    {
    }
}
/**
 * Exception based on HTTP response
 *
 * @package Requests
 */
/**
 * Exception based on HTTP response
 *
 * @package Requests
 */
class Requests_Exception_HTTP extends \Requests_Exception
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 0;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Unknown';
    /**
     * Create a new exception
     *
     * There is no mechanism to pass in the status code, as this is set by the
     * subclass used. Reason phrases can vary, however.
     *
     * @param string|null $reason Reason phrase
     * @param mixed $data Associated data
     */
    public function __construct($reason = \null, $data = \null)
    {
    }
    /**
     * Get the status message
     */
    public function getReason()
    {
    }
    /**
     * Get the correct exception class for a given error code
     *
     * @param int|bool $code HTTP status code, or false if unavailable
     * @return string Exception class name to use
     */
    public static function get_class($code)
    {
    }
}
/**
 * Exception for 304 Not Modified responses
 *
 * @package Requests
 */
/**
 * Exception for 304 Not Modified responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_304 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 304;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Not Modified';
}
/**
 * Exception for 305 Use Proxy responses
 *
 * @package Requests
 */
/**
 * Exception for 305 Use Proxy responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_305 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 305;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Use Proxy';
}
/**
 * Exception for 306 Switch Proxy responses
 *
 * @package Requests
 */
/**
 * Exception for 306 Switch Proxy responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_306 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 306;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Switch Proxy';
}
/**
 * Exception for 400 Bad Request responses
 *
 * @package Requests
 */
/**
 * Exception for 400 Bad Request responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_400 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 400;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Bad Request';
}
/**
 * Exception for 401 Unauthorized responses
 *
 * @package Requests
 */
/**
 * Exception for 401 Unauthorized responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_401 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 401;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Unauthorized';
}
/**
 * Exception for 402 Payment Required responses
 *
 * @package Requests
 */
/**
 * Exception for 402 Payment Required responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_402 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 402;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Payment Required';
}
/**
 * Exception for 403 Forbidden responses
 *
 * @package Requests
 */
/**
 * Exception for 403 Forbidden responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_403 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 403;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Forbidden';
}
/**
 * Exception for 404 Not Found responses
 *
 * @package Requests
 */
/**
 * Exception for 404 Not Found responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_404 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 404;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Not Found';
}
/**
 * Exception for 405 Method Not Allowed responses
 *
 * @package Requests
 */
/**
 * Exception for 405 Method Not Allowed responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_405 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 405;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Method Not Allowed';
}
/**
 * Exception for 406 Not Acceptable responses
 *
 * @package Requests
 */
/**
 * Exception for 406 Not Acceptable responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_406 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 406;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Not Acceptable';
}
/**
 * Exception for 407 Proxy Authentication Required responses
 *
 * @package Requests
 */
/**
 * Exception for 407 Proxy Authentication Required responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_407 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 407;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Proxy Authentication Required';
}
/**
 * Exception for 408 Request Timeout responses
 *
 * @package Requests
 */
/**
 * Exception for 408 Request Timeout responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_408 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 408;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Request Timeout';
}
/**
 * Exception for 409 Conflict responses
 *
 * @package Requests
 */
/**
 * Exception for 409 Conflict responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_409 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 409;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Conflict';
}
/**
 * Exception for 410 Gone responses
 *
 * @package Requests
 */
/**
 * Exception for 410 Gone responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_410 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 410;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Gone';
}
/**
 * Exception for 411 Length Required responses
 *
 * @package Requests
 */
/**
 * Exception for 411 Length Required responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_411 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 411;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Length Required';
}
/**
 * Exception for 412 Precondition Failed responses
 *
 * @package Requests
 */
/**
 * Exception for 412 Precondition Failed responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_412 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 412;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Precondition Failed';
}
/**
 * Exception for 413 Request Entity Too Large responses
 *
 * @package Requests
 */
/**
 * Exception for 413 Request Entity Too Large responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_413 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 413;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Request Entity Too Large';
}
/**
 * Exception for 414 Request-URI Too Large responses
 *
 * @package Requests
 */
/**
 * Exception for 414 Request-URI Too Large responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_414 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 414;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Request-URI Too Large';
}
/**
 * Exception for 415 Unsupported Media Type responses
 *
 * @package Requests
 */
/**
 * Exception for 415 Unsupported Media Type responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_415 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 415;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Unsupported Media Type';
}
/**
 * Exception for 416 Requested Range Not Satisfiable responses
 *
 * @package Requests
 */
/**
 * Exception for 416 Requested Range Not Satisfiable responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_416 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 416;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Requested Range Not Satisfiable';
}
/**
 * Exception for 417 Expectation Failed responses
 *
 * @package Requests
 */
/**
 * Exception for 417 Expectation Failed responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_417 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 417;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Expectation Failed';
}
/**
 * Exception for 418 I'm A Teapot responses
 *
 * @see https://tools.ietf.org/html/rfc2324
 * @package Requests
 */
/**
 * Exception for 418 I'm A Teapot responses
 *
 * @see https://tools.ietf.org/html/rfc2324
 * @package Requests
 */
class Requests_Exception_HTTP_418 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 418;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = "I'm A Teapot";
}
/**
 * Exception for 428 Precondition Required responses
 *
 * @see https://tools.ietf.org/html/rfc6585
 * @package Requests
 */
/**
 * Exception for 428 Precondition Required responses
 *
 * @see https://tools.ietf.org/html/rfc6585
 * @package Requests
 */
class Requests_Exception_HTTP_428 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 428;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Precondition Required';
}
/**
 * Exception for 429 Too Many Requests responses
 *
 * @see https://tools.ietf.org/html/draft-nottingham-http-new-status-04
 * @package Requests
 */
/**
 * Exception for 429 Too Many Requests responses
 *
 * @see https://tools.ietf.org/html/draft-nottingham-http-new-status-04
 * @package Requests
 */
class Requests_Exception_HTTP_429 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 429;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Too Many Requests';
}
/**
 * Exception for 431 Request Header Fields Too Large responses
 *
 * @see https://tools.ietf.org/html/rfc6585
 * @package Requests
 */
/**
 * Exception for 431 Request Header Fields Too Large responses
 *
 * @see https://tools.ietf.org/html/rfc6585
 * @package Requests
 */
class Requests_Exception_HTTP_431 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 431;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Request Header Fields Too Large';
}
/**
 * Exception for 500 Internal Server Error responses
 *
 * @package Requests
 */
/**
 * Exception for 500 Internal Server Error responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_500 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 500;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Internal Server Error';
}
/**
 * Exception for 501 Not Implemented responses
 *
 * @package Requests
 */
/**
 * Exception for 501 Not Implemented responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_501 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 501;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Not Implemented';
}
/**
 * Exception for 502 Bad Gateway responses
 *
 * @package Requests
 */
/**
 * Exception for 502 Bad Gateway responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_502 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 502;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Bad Gateway';
}
/**
 * Exception for 503 Service Unavailable responses
 *
 * @package Requests
 */
/**
 * Exception for 503 Service Unavailable responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_503 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 503;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Service Unavailable';
}
/**
 * Exception for 504 Gateway Timeout responses
 *
 * @package Requests
 */
/**
 * Exception for 504 Gateway Timeout responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_504 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 504;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Gateway Timeout';
}
/**
 * Exception for 505 HTTP Version Not Supported responses
 *
 * @package Requests
 */
/**
 * Exception for 505 HTTP Version Not Supported responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_505 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 505;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'HTTP Version Not Supported';
}
/**
 * Exception for 511 Network Authentication Required responses
 *
 * @see https://tools.ietf.org/html/rfc6585
 * @package Requests
 */
/**
 * Exception for 511 Network Authentication Required responses
 *
 * @see https://tools.ietf.org/html/rfc6585
 * @package Requests
 */
class Requests_Exception_HTTP_511 extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer
     */
    protected $code = 511;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Network Authentication Required';
}
/**
 * Exception for unknown status responses
 *
 * @package Requests
 */
/**
 * Exception for unknown status responses
 *
 * @package Requests
 */
class Requests_Exception_HTTP_Unknown extends \Requests_Exception_HTTP
{
    /**
     * HTTP status code
     *
     * @var integer|bool Code if available, false if an error occurred
     */
    protected $code = 0;
    /**
     * Reason phrase
     *
     * @var string
     */
    protected $reason = 'Unknown';
    /**
     * Create a new exception
     *
     * If `$data` is an instance of {@see Requests_Response}, uses the status
     * code from it. Otherwise, sets as 0
     *
     * @param string|null $reason Reason phrase
     * @param mixed $data Associated data
     */
    public function __construct($reason = \null, $data = \null)
    {
    }
}
class Requests_Exception_Transport extends \Requests_Exception
{
}
class Requests_Exception_Transport_cURL extends \Requests_Exception_Transport
{
    const EASY = 'cURLEasy';
    const MULTI = 'cURLMulti';
    const SHARE = 'cURLShare';
    /**
     * cURL error code
     *
     * @var integer
     */
    protected $code = -1;
    /**
     * Which type of cURL error
     *
     * EASY|MULTI|SHARE
     *
     * @var string
     */
    protected $type = 'Unknown';
    /**
     * Clear text error message
     *
     * @var string
     */
    protected $reason = 'Unknown';
    public function __construct($message, $type, $data = \null, $code = 0)
    {
    }
    /**
     * Get the error message
     */
    public function getReason()
    {
    }
}
/**
 * Event dispatcher
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * Event dispatcher
 *
 * @package Requests
 * @subpackage Utilities
 */
interface Requests_Hooker
{
    /**
     * Register a callback for a hook
     *
     * @param string $hook Hook name
     * @param callback $callback Function/method to call on event
     * @param int $priority Priority number. <0 is executed earlier, >0 is executed later
     */
    public function register($hook, $callback, $priority = 0);
    /**
     * Dispatch a message
     *
     * @param string $hook Hook name
     * @param array $parameters Parameters to pass to callbacks
     * @return boolean Successfulness
     */
    public function dispatch($hook, $parameters = array());
}
/**
 * Handles adding and dispatching events
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * Handles adding and dispatching events
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_Hooks implements \Requests_Hooker
{
    /**
     * Registered callbacks for each hook
     *
     * @var array
     */
    protected $hooks = array();
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Register a callback for a hook
     *
     * @param string $hook Hook name
     * @param callback $callback Function/method to call on event
     * @param int $priority Priority number. <0 is executed earlier, >0 is executed later
     */
    public function register($hook, $callback, $priority = 0)
    {
    }
    /**
     * Dispatch a message
     *
     * @param string $hook Hook name
     * @param array $parameters Parameters to pass to callbacks
     * @return boolean Successfulness
     */
    public function dispatch($hook, $parameters = array())
    {
    }
}
/**
 * IDNA URL encoder
 *
 * Note: Not fully compliant, as nameprep does nothing yet.
 *
 * @package Requests
 * @subpackage Utilities
 * @see https://tools.ietf.org/html/rfc3490 IDNA specification
 * @see https://tools.ietf.org/html/rfc3492 Punycode/Bootstrap specification
 */
class Requests_IDNAEncoder
{
    /**
     * ACE prefix used for IDNA
     *
     * @see https://tools.ietf.org/html/rfc3490#section-5
     * @var string
     */
    const ACE_PREFIX = 'xn--';
    /**#@+
     * Bootstrap constant for Punycode
     *
     * @see https://tools.ietf.org/html/rfc3492#section-5
     * @var int
     */
    const BOOTSTRAP_BASE = 36;
    const BOOTSTRAP_TMIN = 1;
    const BOOTSTRAP_TMAX = 26;
    const BOOTSTRAP_SKEW = 38;
    const BOOTSTRAP_DAMP = 700;
    const BOOTSTRAP_INITIAL_BIAS = 72;
    const BOOTSTRAP_INITIAL_N = 128;
    /**#@-*/
    /**
     * Encode a hostname using Punycode
     *
     * @param string $string Hostname
     * @return string Punycode-encoded hostname
     */
    public static function encode($string)
    {
    }
    /**
     * Convert a UTF-8 string to an ASCII string using Punycode
     *
     * @throws Requests_Exception Provided string longer than 64 ASCII characters (`idna.provided_too_long`)
     * @throws Requests_Exception Prepared string longer than 64 ASCII characters (`idna.prepared_too_long`)
     * @throws Requests_Exception Provided string already begins with xn-- (`idna.provided_is_prefixed`)
     * @throws Requests_Exception Encoded string longer than 64 ASCII characters (`idna.encoded_too_long`)
     *
     * @param string $string ASCII or UTF-8 string (max length 64 characters)
     * @return string ASCII string
     */
    public static function to_ascii($string)
    {
    }
    /**
     * Check whether a given string contains only ASCII characters
     *
     * @internal (Testing found regex was the fastest implementation)
     *
     * @param string $string
     * @return bool Is the string ASCII-only?
     */
    protected static function is_ascii($string)
    {
    }
    /**
     * Prepare a string for use as an IDNA name
     *
     * @todo Implement this based on RFC 3491 and the newer 5891
     * @param string $string
     * @return string Prepared string
     */
    protected static function nameprep($string)
    {
    }
    /**
     * Convert a UTF-8 string to a UCS-4 codepoint array
     *
     * Based on Requests_IRI::replace_invalid_with_pct_encoding()
     *
     * @throws Requests_Exception Invalid UTF-8 codepoint (`idna.invalidcodepoint`)
     * @param string $input
     * @return array Unicode code points
     */
    protected static function utf8_to_codepoints($input)
    {
    }
    /**
     * RFC3492-compliant encoder
     *
     * @internal Pseudo-code from Section 6.3 is commented with "#" next to relevant code
     * @throws Requests_Exception On character outside of the domain (never happens with Punycode) (`idna.character_outside_domain`)
     *
     * @param string $input UTF-8 encoded string to encode
     * @return string Punycode-encoded string
     */
    public static function punycode_encode($input)
    {
    }
    /**
     * Convert a digit to its respective character
     *
     * @see https://tools.ietf.org/html/rfc3492#section-5
     * @throws Requests_Exception On invalid digit (`idna.invalid_digit`)
     *
     * @param int $digit Digit in the range 0-35
     * @return string Single character corresponding to digit
     */
    protected static function digit_to_char($digit)
    {
    }
    /**
     * Adapt the bias
     *
     * @see https://tools.ietf.org/html/rfc3492#section-6.1
     * @param int $delta
     * @param int $numpoints
     * @param bool $firsttime
     * @return int New bias
     */
    protected static function adapt($delta, $numpoints, $firsttime)
    {
    }
}
/**
 * Class to validate and to work with IPv6 addresses
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * Class to validate and to work with IPv6 addresses
 *
 * This was originally based on the PEAR class of the same name, but has been
 * entirely rewritten.
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_IPv6
{
    /**
     * Uncompresses an IPv6 address
     *
     * RFC 4291 allows you to compress consecutive zero pieces in an address to
     * '::'. This method expects a valid IPv6 address and expands the '::' to
     * the required number of zero pieces.
     *
     * Example:  FF01::101   ->  FF01:0:0:0:0:0:0:101
     *           ::1         ->  0:0:0:0:0:0:0:1
     *
     * @author Alexander Merz <alexander.merz@web.de>
     * @author elfrink at introweb dot nl
     * @author Josh Peck <jmp at joshpeck dot org>
     * @copyright 2003-2005 The PHP Group
     * @license http://www.opensource.org/licenses/bsd-license.php
     * @param string $ip An IPv6 address
     * @return string The uncompressed IPv6 address
     */
    public static function uncompress($ip)
    {
    }
    /**
     * Compresses an IPv6 address
     *
     * RFC 4291 allows you to compress consecutive zero pieces in an address to
     * '::'. This method expects a valid IPv6 address and compresses consecutive
     * zero pieces to '::'.
     *
     * Example:  FF01:0:0:0:0:0:0:101   ->  FF01::101
     *           0:0:0:0:0:0:0:1        ->  ::1
     *
     * @see uncompress()
     * @param string $ip An IPv6 address
     * @return string The compressed IPv6 address
     */
    public static function compress($ip)
    {
    }
    /**
     * Splits an IPv6 address into the IPv6 and IPv4 representation parts
     *
     * RFC 4291 allows you to represent the last two parts of an IPv6 address
     * using the standard IPv4 representation
     *
     * Example:  0:0:0:0:0:0:13.1.68.3
     *           0:0:0:0:0:FFFF:129.144.52.38
     *
     * @param string $ip An IPv6 address
     * @return string[] [0] contains the IPv6 represented part, and [1] the IPv4 represented part
     */
    protected static function split_v6_v4($ip)
    {
    }
    /**
     * Checks an IPv6 address
     *
     * Checks if the given IP is a valid IPv6 address
     *
     * @param string $ip An IPv6 address
     * @return bool true if $ip is a valid IPv6 address
     */
    public static function check_ipv6($ip)
    {
    }
}
/**
 * IRI parser/serialiser/normaliser
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * IRI parser/serialiser/normaliser
 *
 * Copyright (c) 2007-2010, Geoffrey Sneddon and Steve Minutillo.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *  * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 *
 *  * Neither the name of the SimplePie Team nor the names of its contributors
 *       may be used to endorse or promote products derived from this software
 *       without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package Requests
 * @subpackage Utilities
 * @author Geoffrey Sneddon
 * @author Steve Minutillo
 * @copyright 2007-2009 Geoffrey Sneddon and Steve Minutillo
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @link http://hg.gsnedders.com/iri/
 *
 * @property string $iri IRI we're working with
 * @property-read string $uri IRI in URI form, {@see to_uri}
 * @property string $scheme Scheme part of the IRI
 * @property string $authority Authority part, formatted for a URI (userinfo + host + port)
 * @property string $iauthority Authority part of the IRI (userinfo + host + port)
 * @property string $userinfo Userinfo part, formatted for a URI (after '://' and before '@')
 * @property string $iuserinfo Userinfo part of the IRI (after '://' and before '@')
 * @property string $host Host part, formatted for a URI
 * @property string $ihost Host part of the IRI
 * @property string $port Port part of the IRI (after ':')
 * @property string $path Path part, formatted for a URI (after first '/')
 * @property string $ipath Path part of the IRI (after first '/')
 * @property string $query Query part, formatted for a URI (after '?')
 * @property string $iquery Query part of the IRI (after '?')
 * @property string $fragment Fragment, formatted for a URI (after '#')
 * @property string $ifragment Fragment part of the IRI (after '#')
 */
class Requests_IRI
{
    /**
     * Scheme
     *
     * @var string
     */
    protected $scheme = \null;
    /**
     * User Information
     *
     * @var string
     */
    protected $iuserinfo = \null;
    /**
     * ihost
     *
     * @var string
     */
    protected $ihost = \null;
    /**
     * Port
     *
     * @var string
     */
    protected $port = \null;
    /**
     * ipath
     *
     * @var string
     */
    protected $ipath = '';
    /**
     * iquery
     *
     * @var string
     */
    protected $iquery = \null;
    /**
     * ifragment
     *
     * @var string
     */
    protected $ifragment = \null;
    /**
     * Normalization database
     *
     * Each key is the scheme, each value is an array with each key as the IRI
     * part and value as the default value for that part.
     */
    protected $normalization = array('acap' => array('port' => 674), 'dict' => array('port' => 2628), 'file' => array('ihost' => 'localhost'), 'http' => array('port' => 80), 'https' => array('port' => 443));
    /**
     * Return the entire IRI when you try and read the object as a string
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Overload __set() to provide access via properties
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
    }
    /**
     * Overload __get() to provide access via properties
     *
     * @param string $name Property name
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Overload __isset() to provide access via properties
     *
     * @param string $name Property name
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Overload __unset() to provide access via properties
     *
     * @param string $name Property name
     */
    public function __unset($name)
    {
    }
    /**
     * Create a new IRI object, from a specified string
     *
     * @param string|null $iri
     */
    public function __construct($iri = \null)
    {
    }
    /**
     * Create a new IRI object by resolving a relative IRI
     *
     * Returns false if $base is not absolute, otherwise an IRI.
     *
     * @param IRI|string $base (Absolute) Base IRI
     * @param IRI|string $relative Relative IRI
     * @return IRI|false
     */
    public static function absolutize($base, $relative)
    {
    }
    /**
     * Parse an IRI into scheme/authority/path/query/fragment segments
     *
     * @param string $iri
     * @return array
     */
    protected function parse_iri($iri)
    {
    }
    /**
     * Remove dot segments from a path
     *
     * @param string $input
     * @return string
     */
    protected function remove_dot_segments($input)
    {
    }
    /**
     * Replace invalid character with percent encoding
     *
     * @param string $string Input string
     * @param string $extra_chars Valid characters not in iunreserved or
     *                            iprivate (this is ASCII-only)
     * @param bool $iprivate Allow iprivate
     * @return string
     */
    protected function replace_invalid_with_pct_encoding($string, $extra_chars, $iprivate = \false)
    {
    }
    /**
     * Callback function for preg_replace_callback.
     *
     * Removes sequences of percent encoded bytes that represent UTF-8
     * encoded characters in iunreserved
     *
     * @param array $match PCRE match
     * @return string Replacement
     */
    protected function remove_iunreserved_percent_encoded($match)
    {
    }
    protected function scheme_normalization()
    {
    }
    /**
     * Check if the object represents a valid IRI. This needs to be done on each
     * call as some things change depending on another part of the IRI.
     *
     * @return bool
     */
    public function is_valid()
    {
    }
    /**
     * Set the entire IRI. Returns true on success, false on failure (if there
     * are any invalid characters).
     *
     * @param string $iri
     * @return bool
     */
    protected function set_iri($iri)
    {
    }
    /**
     * Set the scheme. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $scheme
     * @return bool
     */
    protected function set_scheme($scheme)
    {
    }
    /**
     * Set the authority. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $authority
     * @return bool
     */
    protected function set_authority($authority)
    {
    }
    /**
     * Set the iuserinfo.
     *
     * @param string $iuserinfo
     * @return bool
     */
    protected function set_userinfo($iuserinfo)
    {
    }
    /**
     * Set the ihost. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $ihost
     * @return bool
     */
    protected function set_host($ihost)
    {
    }
    /**
     * Set the port. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $port
     * @return bool
     */
    protected function set_port($port)
    {
    }
    /**
     * Set the ipath.
     *
     * @param string $ipath
     * @return bool
     */
    protected function set_path($ipath)
    {
    }
    /**
     * Set the iquery.
     *
     * @param string $iquery
     * @return bool
     */
    protected function set_query($iquery)
    {
    }
    /**
     * Set the ifragment.
     *
     * @param string $ifragment
     * @return bool
     */
    protected function set_fragment($ifragment)
    {
    }
    /**
     * Convert an IRI to a URI (or parts thereof)
     *
     * @param string|bool IRI to convert (or false from {@see get_iri})
     * @return string|false URI if IRI is valid, false otherwise.
     */
    protected function to_uri($string)
    {
    }
    /**
     * Get the complete IRI
     *
     * @return string
     */
    protected function get_iri()
    {
    }
    /**
     * Get the complete URI
     *
     * @return string
     */
    protected function get_uri()
    {
    }
    /**
     * Get the complete iauthority
     *
     * @return string
     */
    protected function get_iauthority()
    {
    }
    /**
     * Get the complete authority
     *
     * @return string
     */
    protected function get_authority()
    {
    }
}
/**
 * Proxy connection interface
 *
 * @package Requests
 * @subpackage Proxy
 * @since 1.6
 */
/**
 * Proxy connection interface
 *
 * Implement this interface to handle proxy settings and authentication
 *
 * Parameters should be passed via the constructor where possible, as this
 * makes it much easier for users to use your provider.
 *
 * @see Requests_Hooks
 * @package Requests
 * @subpackage Proxy
 * @since 1.6
 */
interface Requests_Proxy
{
    /**
     * Register hooks as needed
     *
     * This method is called in {@see Requests::request} when the user has set
     * an instance as the 'auth' option. Use this callback to register all the
     * hooks you'll need.
     *
     * @see Requests_Hooks::register
     * @param Requests_Hooks $hooks Hook system
     */
    public function register(\Requests_Hooks &$hooks);
}
/**
 * HTTP Proxy connection interface
 *
 * @package Requests
 * @subpackage Proxy
 * @since 1.6
 */
/**
 * HTTP Proxy connection interface
 *
 * Provides a handler for connection via an HTTP proxy
 *
 * @package Requests
 * @subpackage Proxy
 * @since 1.6
 */
class Requests_Proxy_HTTP implements \Requests_Proxy
{
    /**
     * Proxy host and port
     *
     * Notation: "host:port" (eg 127.0.0.1:8080 or someproxy.com:3128)
     *
     * @var string
     */
    public $proxy;
    /**
     * Username
     *
     * @var string
     */
    public $user;
    /**
     * Password
     *
     * @var string
     */
    public $pass;
    /**
     * Do we need to authenticate? (ie username & password have been provided)
     *
     * @var boolean
     */
    public $use_authentication;
    /**
     * Constructor
     *
     * @since 1.6
     * @throws Requests_Exception On incorrect number of arguments (`authbasicbadargs`)
     * @param array|null $args Array of user and password. Must have exactly two elements
     */
    public function __construct($args = \null)
    {
    }
    /**
     * Register the necessary callbacks
     *
     * @since 1.6
     * @see curl_before_send
     * @see fsockopen_remote_socket
     * @see fsockopen_remote_host_path
     * @see fsockopen_header
     * @param Requests_Hooks $hooks Hook system
     */
    public function register(\Requests_Hooks &$hooks)
    {
    }
    /**
     * Set cURL parameters before the data is sent
     *
     * @since 1.6
     * @param resource $handle cURL resource
     */
    public function curl_before_send(&$handle)
    {
    }
    /**
     * Alter remote socket information before opening socket connection
     *
     * @since 1.6
     * @param string $remote_socket Socket connection string
     */
    public function fsockopen_remote_socket(&$remote_socket)
    {
    }
    /**
     * Alter remote path before getting stream data
     *
     * @since 1.6
     * @param string $path Path to send in HTTP request string ("GET ...")
     * @param string $url Full URL we're requesting
     */
    public function fsockopen_remote_host_path(&$path, $url)
    {
    }
    /**
     * Add extra headers to the request before sending
     *
     * @since 1.6
     * @param string $out HTTP header string
     */
    public function fsockopen_header(&$out)
    {
    }
    /**
     * Get the authentication string (user:pass)
     *
     * @since 1.6
     * @return string
     */
    public function get_auth_string()
    {
    }
}
/**
 * HTTP response class
 *
 * Contains a response from Requests::request()
 * @package Requests
 */
/**
 * HTTP response class
 *
 * Contains a response from Requests::request()
 * @package Requests
 */
class Requests_Response
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Response body
     *
     * @var string
     */
    public $body = '';
    /**
     * Raw HTTP data from the transport
     *
     * @var string
     */
    public $raw = '';
    /**
     * Headers, as an associative array
     *
     * @var Requests_Response_Headers Array-like object representing headers
     */
    public $headers = array();
    /**
     * Status code, false if non-blocking
     *
     * @var integer|boolean
     */
    public $status_code = \false;
    /**
     * Protocol version, false if non-blocking
     * @var float|boolean
     */
    public $protocol_version = \false;
    /**
     * Whether the request succeeded or not
     *
     * @var boolean
     */
    public $success = \false;
    /**
     * Number of redirects the request used
     *
     * @var integer
     */
    public $redirects = 0;
    /**
     * URL requested
     *
     * @var string
     */
    public $url = '';
    /**
     * Previous requests (from redirects)
     *
     * @var array Array of Requests_Response objects
     */
    public $history = array();
    /**
     * Cookies from the request
     *
     * @var Requests_Cookie_Jar Array-like object representing a cookie jar
     */
    public $cookies = array();
    /**
     * Is the response a redirect?
     *
     * @return boolean True if redirect (3xx status), false if not.
     */
    public function is_redirect()
    {
    }
    /**
     * Throws an exception if the request was not successful
     *
     * @throws Requests_Exception If `$allow_redirects` is false, and code is 3xx (`response.no_redirects`)
     * @throws Requests_Exception_HTTP On non-successful status code. Exception class corresponds to code (e.g. {@see Requests_Exception_HTTP_404})
     * @param boolean $allow_redirects Set to false to throw on a 3xx as well
     */
    public function throw_for_status($allow_redirects = \true)
    {
    }
}
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_Utility_CaseInsensitiveDictionary implements \ArrayAccess, \IteratorAggregate
{
    /**
     * Actual item data
     *
     * @var array
     */
    protected $data = array();
    /**
     * Creates a case insensitive dictionary.
     *
     * @param array $data Dictionary/map to convert to case-insensitive
     */
    public function __construct(array $data = array())
    {
    }
    /**
     * Check if the given item exists
     *
     * @param string $key Item key
     * @return boolean Does the item exist?
     */
    public function offsetExists($key)
    {
    }
    /**
     * Get the value for the item
     *
     * @param string $key Item key
     * @return string Item value
     */
    public function offsetGet($key)
    {
    }
    /**
     * Set the given item
     *
     * @throws Requests_Exception On attempting to use dictionary as list (`invalidset`)
     *
     * @param string $key Item name
     * @param string $value Item value
     */
    public function offsetSet($key, $value)
    {
    }
    /**
     * Unset the given header
     *
     * @param string $key
     */
    public function offsetUnset($key)
    {
    }
    /**
     * Get an iterator for the data
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
    }
    /**
     * Get the headers as an array
     *
     * @return array Header data
     */
    public function getAll()
    {
    }
}
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 */
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 */
class Requests_Response_Headers extends \Requests_Utility_CaseInsensitiveDictionary
{
    /**
     * Get the given header
     *
     * Unlike {@see self::getValues()}, this returns a string. If there are
     * multiple values, it concatenates them with a comma as per RFC2616.
     *
     * Avoid using this where commas may be used unquoted in values, such as
     * Set-Cookie headers.
     *
     * @param string $key
     * @return string Header value
     */
    public function offsetGet($key)
    {
    }
    /**
     * Set the given item
     *
     * @throws Requests_Exception On attempting to use dictionary as list (`invalidset`)
     *
     * @param string $key Item name
     * @param string $value Item value
     */
    public function offsetSet($key, $value)
    {
    }
    /**
     * Get all values for a given header
     *
     * @param string $key
     * @return array Header values
     */
    public function getValues($key)
    {
    }
    /**
     * Flattens a value into a string
     *
     * Converts an array into a string by imploding values with a comma, as per
     * RFC2616's rules for folding headers.
     *
     * @param string|array $value Value to flatten
     * @return string Flattened value
     */
    public function flatten($value)
    {
    }
    /**
     * Get an iterator for the data
     *
     * Converts the internal
     * @return ArrayIterator
     */
    public function getIterator()
    {
    }
}
/**
 * SSL utilities for Requests
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * SSL utilities for Requests
 *
 * Collection of utilities for working with and verifying SSL certificates.
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_SSL
{
    /**
     * Verify the certificate against common name and subject alternative names
     *
     * Unfortunately, PHP doesn't check the certificate against the alternative
     * names, leading things like 'https://www.github.com/' to be invalid.
     * Instead
     *
     * @see https://tools.ietf.org/html/rfc2818#section-3.1 RFC2818, Section 3.1
     *
     * @throws Requests_Exception On not obtaining a match for the host (`fsockopen.ssl.no_match`)
     * @param string $host Host name to verify against
     * @param array $cert Certificate data from openssl_x509_parse()
     * @return bool
     */
    public static function verify_certificate($host, $cert)
    {
    }
    /**
     * Verify that a reference name is valid
     *
     * Verifies a dNSName for HTTPS usage, (almost) as per Firefox's rules:
     * - Wildcards can only occur in a name with more than 3 components
     * - Wildcards can only occur as the last character in the first
     *   component
     * - Wildcards may be preceded by additional characters
     *
     * We modify these rules to be a bit stricter and only allow the wildcard
     * character to be the full first component; that is, with the exclusion of
     * the third rule.
     *
     * @param string $reference Reference dNSName
     * @return boolean Is the name valid?
     */
    public static function verify_reference_name($reference)
    {
    }
    /**
     * Match a hostname against a dNSName reference
     *
     * @param string $host Requested host
     * @param string $reference dNSName to match against
     * @return boolean Does the domain match?
     */
    public static function match_domain($host, $reference)
    {
    }
}
/**
 * Session handler for persistent requests and default parameters
 *
 * @package Requests
 * @subpackage Session Handler
 */
/**
 * Session handler for persistent requests and default parameters
 *
 * Allows various options to be set as default values, and merges both the
 * options and URL properties together. A base URL can be set for all requests,
 * with all subrequests resolved from this. Base options can be set (including
 * a shared cookie jar), then overridden for individual requests.
 *
 * @package Requests
 * @subpackage Session Handler
 */
class Requests_Session
{
    /**
     * Base URL for requests
     *
     * URLs will be made absolute using this as the base
     * @var string|null
     */
    public $url = \null;
    /**
     * Base headers for requests
     * @var array
     */
    public $headers = array();
    /**
     * Base data for requests
     *
     * If both the base data and the per-request data are arrays, the data will
     * be merged before sending the request.
     *
     * @var array
     */
    public $data = array();
    /**
     * Base options for requests
     *
     * The base options are merged with the per-request data for each request.
     * The only default option is a shared cookie jar between requests.
     *
     * Values here can also be set directly via properties on the Session
     * object, e.g. `$session->useragent = 'X';`
     *
     * @var array
     */
    public $options = array();
    /**
     * Create a new session
     *
     * @param string|null $url Base URL for requests
     * @param array $headers Default headers for requests
     * @param array $data Default data for requests
     * @param array $options Default options for requests
     */
    public function __construct($url = \null, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Get a property's value
     *
     * @param string $key Property key
     * @return mixed|null Property value, null if none found
     */
    public function __get($key)
    {
    }
    /**
     * Set a property's value
     *
     * @param string $key Property key
     * @param mixed $value Property value
     */
    public function __set($key, $value)
    {
    }
    /**
     * Remove a property's value
     *
     * @param string $key Property key
     */
    public function __isset($key)
    {
    }
    /**
     * Remove a property's value
     *
     * @param string $key Property key
     */
    public function __unset($key)
    {
    }
    /**#@+
     * @see request()
     * @param string $url
     * @param array $headers
     * @param array $options
     * @return Requests_Response
     */
    /**
     * Send a GET request
     */
    public function get($url, $headers = array(), $options = array())
    {
    }
    /**
     * Send a HEAD request
     */
    public function head($url, $headers = array(), $options = array())
    {
    }
    /**
     * Send a DELETE request
     */
    public function delete($url, $headers = array(), $options = array())
    {
    }
    /**#@-*/
    /**#@+
     * @see request()
     * @param string $url
     * @param array $headers
     * @param array $data
     * @param array $options
     * @return Requests_Response
     */
    /**
     * Send a POST request
     */
    public function post($url, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Send a PUT request
     */
    public function put($url, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Send a PATCH request
     *
     * Note: Unlike {@see post} and {@see put}, `$headers` is required, as the
     * specification recommends that should send an ETag
     *
     * @link https://tools.ietf.org/html/rfc5789
     */
    public function patch($url, $headers, $data = array(), $options = array())
    {
    }
    /**#@-*/
    /**
     * Main interface for HTTP requests
     *
     * This method initiates a request and sends it via a transport before
     * parsing.
     *
     * @see Requests::request()
     *
     * @throws Requests_Exception On invalid URLs (`nonhttp`)
     *
     * @param string $url URL to request
     * @param array $headers Extra headers to send with the request
     * @param array|null $data Data to send either as a query string for GET/HEAD requests, or in the body for POST requests
     * @param string $type HTTP request type (use Requests constants)
     * @param array $options Options for the request (see {@see Requests::request})
     * @return Requests_Response
     */
    public function request($url, $headers = array(), $data = array(), $type = \Requests::GET, $options = array())
    {
    }
    /**
     * Send multiple HTTP requests simultaneously
     *
     * @see Requests::request_multiple()
     *
     * @param array $requests Requests data (see {@see Requests::request_multiple})
     * @param array $options Global and default options (see {@see Requests::request})
     * @return array Responses (either Requests_Response or a Requests_Exception object)
     */
    public function request_multiple($requests, $options = array())
    {
    }
    /**
     * Merge a request's data with the default data
     *
     * @param array $request Request data (same form as {@see request_multiple})
     * @param boolean $merge_options Should we merge options as well?
     * @return array Request data
     */
    protected function merge_request($request, $merge_options = \true)
    {
    }
}
/**
 * Base HTTP transport
 *
 * @package Requests
 * @subpackage Transport
 */
/**
 * Base HTTP transport
 *
 * @package Requests
 * @subpackage Transport
 */
interface Requests_Transport
{
    /**
     * Perform a request
     *
     * @param string $url URL to request
     * @param array $headers Associative array of request headers
     * @param string|array $data Data to send either as the POST body, or as parameters in the URL for a GET/HEAD
     * @param array $options Request options, see {@see Requests::response()} for documentation
     * @return string Raw HTTP result
     */
    public function request($url, $headers = array(), $data = array(), $options = array());
    /**
     * Send multiple requests simultaneously
     *
     * @param array $requests Request data (array of 'url', 'headers', 'data', 'options') as per {@see Requests_Transport::request}
     * @param array $options Global options, see {@see Requests::response()} for documentation
     * @return array Array of Requests_Response objects (may contain Requests_Exception or string responses as well)
     */
    public function request_multiple($requests, $options);
    /**
     * Self-test whether the transport can be used
     * @return bool
     */
    public static function test();
}
/**
 * cURL HTTP transport
 *
 * @package Requests
 * @subpackage Transport
 */
/**
 * cURL HTTP transport
 *
 * @package Requests
 * @subpackage Transport
 */
class Requests_Transport_cURL implements \Requests_Transport
{
    const CURL_7_10_5 = 0x70a05;
    const CURL_7_16_2 = 0x71002;
    /**
     * Raw HTTP data
     *
     * @var string
     */
    public $headers = '';
    /**
     * Raw body data
     *
     * @var string
     */
    public $response_data = '';
    /**
     * Information on the current request
     *
     * @var array cURL information array, see {@see https://secure.php.net/curl_getinfo}
     */
    public $info;
    /**
     * Version string
     *
     * @var long
     */
    public $version;
    /**
     * cURL handle
     *
     * @var resource
     */
    protected $handle;
    /**
     * Hook dispatcher instance
     *
     * @var Requests_Hooks
     */
    protected $hooks;
    /**
     * Have we finished the headers yet?
     *
     * @var boolean
     */
    protected $done_headers = \false;
    /**
     * If streaming to a file, keep the file pointer
     *
     * @var resource
     */
    protected $stream_handle;
    /**
     * How many bytes are in the response body?
     *
     * @var int
     */
    protected $response_bytes;
    /**
     * What's the maximum number of bytes we should keep?
     *
     * @var int|bool Byte count, or false if no limit.
     */
    protected $response_byte_limit;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Destructor
     */
    public function __destruct()
    {
    }
    /**
     * Perform a request
     *
     * @throws Requests_Exception On a cURL error (`curlerror`)
     *
     * @param string $url URL to request
     * @param array $headers Associative array of request headers
     * @param string|array $data Data to send either as the POST body, or as parameters in the URL for a GET/HEAD
     * @param array $options Request options, see {@see Requests::response()} for documentation
     * @return string Raw HTTP result
     */
    public function request($url, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Send multiple requests simultaneously
     *
     * @param array $requests Request data
     * @param array $options Global options
     * @return array Array of Requests_Response objects (may contain Requests_Exception or string responses as well)
     */
    public function request_multiple($requests, $options)
    {
    }
    /**
     * Get the cURL handle for use in a multi-request
     *
     * @param string $url URL to request
     * @param array $headers Associative array of request headers
     * @param string|array $data Data to send either as the POST body, or as parameters in the URL for a GET/HEAD
     * @param array $options Request options, see {@see Requests::response()} for documentation
     * @return resource Subrequest's cURL handle
     */
    public function &get_subrequest_handle($url, $headers, $data, $options)
    {
    }
    /**
     * Setup the cURL handle for the given data
     *
     * @param string $url URL to request
     * @param array $headers Associative array of request headers
     * @param string|array $data Data to send either as the POST body, or as parameters in the URL for a GET/HEAD
     * @param array $options Request options, see {@see Requests::response()} for documentation
     */
    protected function setup_handle($url, $headers, $data, $options)
    {
    }
    /**
     * Process a response
     *
     * @param string $response Response data from the body
     * @param array $options Request options
     * @return string HTTP response data including headers
     */
    public function process_response($response, $options)
    {
    }
    /**
     * Collect the headers as they are received
     *
     * @param resource $handle cURL resource
     * @param string $headers Header string
     * @return integer Length of provided header
     */
    public function stream_headers($handle, $headers)
    {
    }
    /**
     * Collect data as it's received
     *
     * @since 1.6.1
     *
     * @param resource $handle cURL resource
     * @param string $data Body data
     * @return integer Length of provided data
     */
    public function stream_body($handle, $data)
    {
    }
    /**
     * Format a URL given GET data
     *
     * @param string $url
     * @param array|object $data Data to build query using, see {@see https://secure.php.net/http_build_query}
     * @return string URL with data
     */
    protected static function format_get($url, $data)
    {
    }
    /**
     * Whether this transport is valid
     *
     * @codeCoverageIgnore
     * @return boolean True if the transport is valid, false otherwise.
     */
    public static function test($capabilities = array())
    {
    }
}
/**
 * fsockopen HTTP transport
 *
 * @package Requests
 * @subpackage Transport
 */
/**
 * fsockopen HTTP transport
 *
 * @package Requests
 * @subpackage Transport
 */
class Requests_Transport_fsockopen implements \Requests_Transport
{
    /**
     * Second to microsecond conversion
     *
     * @var integer
     */
    const SECOND_IN_MICROSECONDS = 1000000;
    /**
     * Raw HTTP data
     *
     * @var string
     */
    public $headers = '';
    /**
     * Stream metadata
     *
     * @var array Associative array of properties, see {@see https://secure.php.net/stream_get_meta_data}
     */
    public $info;
    /**
     * What's the maximum number of bytes we should keep?
     *
     * @var int|bool Byte count, or false if no limit.
     */
    protected $max_bytes = \false;
    protected $connect_error = '';
    /**
     * Perform a request
     *
     * @throws Requests_Exception On failure to connect to socket (`fsockopenerror`)
     * @throws Requests_Exception On socket timeout (`timeout`)
     *
     * @param string $url URL to request
     * @param array $headers Associative array of request headers
     * @param string|array $data Data to send either as the POST body, or as parameters in the URL for a GET/HEAD
     * @param array $options Request options, see {@see Requests::response()} for documentation
     * @return string Raw HTTP result
     */
    public function request($url, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Send multiple requests simultaneously
     *
     * @param array $requests Request data (array of 'url', 'headers', 'data', 'options') as per {@see Requests_Transport::request}
     * @param array $options Global options, see {@see Requests::response()} for documentation
     * @return array Array of Requests_Response objects (may contain Requests_Exception or string responses as well)
     */
    public function request_multiple($requests, $options)
    {
    }
    /**
     * Retrieve the encodings we can accept
     *
     * @return string Accept-Encoding header value
     */
    protected static function accept_encoding()
    {
    }
    /**
     * Format a URL given GET data
     *
     * @param array $url_parts
     * @param array|object $data Data to build query using, see {@see https://secure.php.net/http_build_query}
     * @return string URL with data
     */
    protected static function format_get($url_parts, $data)
    {
    }
    /**
     * Error handler for stream_socket_client()
     *
     * @param int $errno Error number (e.g. E_WARNING)
     * @param string $errstr Error message
     */
    public function connect_error_handler($errno, $errstr)
    {
    }
    /**
     * Verify the certificate against common name and subject alternative names
     *
     * Unfortunately, PHP doesn't check the certificate against the alternative
     * names, leading things like 'https://www.github.com/' to be invalid.
     * Instead
     *
     * @see https://tools.ietf.org/html/rfc2818#section-3.1 RFC2818, Section 3.1
     *
     * @throws Requests_Exception On failure to connect via TLS (`fsockopen.ssl.connect_error`)
     * @throws Requests_Exception On not obtaining a match for the host (`fsockopen.ssl.no_match`)
     * @param string $host Host name to verify against
     * @param resource $context Stream context
     * @return bool
     */
    public function verify_certificate_from_context($host, $context)
    {
    }
    /**
     * Whether this transport is valid
     *
     * @codeCoverageIgnore
     * @return boolean True if the transport is valid, false otherwise.
     */
    public static function test($capabilities = array())
    {
    }
}
/**
 * Iterator for arrays requiring filtered values
 *
 * @package Requests
 * @subpackage Utilities
 */
/**
 * Iterator for arrays requiring filtered values
 *
 * @package Requests
 * @subpackage Utilities
 */
class Requests_Utility_FilteredIterator extends \ArrayIterator
{
    /**
     * Callback to run as a filter
     *
     * @var callable
     */
    protected $callback;
    /**
     * Create a new iterator
     *
     * @param array $data
     * @param callable $callback Callback to be called on each value
     */
    public function __construct($data, $callback)
    {
    }
    /**
     * Get the current item's value after filtering
     *
     * @return string
     */
    public function current()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Manages all author-related data
 *
 * Used by {@see SimplePie_Item::get_author()} and {@see SimplePie::get_authors()}
 *
 * This class can be overloaded with {@see SimplePie::set_author_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Author
{
    /**
     * Author's name
     *
     * @var string
     * @see get_name()
     */
    var $name;
    /**
     * Author's link
     *
     * @var string
     * @see get_link()
     */
    var $link;
    /**
     * Author's email address
     *
     * @var string
     * @see get_email()
     */
    var $email;
    /**
     * Constructor, used to input the data
     *
     * @param string $name
     * @param string $link
     * @param string $email
     */
    public function __construct($name = \null, $link = \null, $email = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Author's name
     *
     * @return string|null
     */
    public function get_name()
    {
    }
    /**
     * Author's link
     *
     * @return string|null
     */
    public function get_link()
    {
    }
    /**
     * Author's email address
     *
     * @return string|null
     */
    public function get_email()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Used to create cache objects
 *
 * This class can be overloaded with {@see SimplePie::set_cache_class()},
 * although the preferred way is to create your own handler
 * via {@see register()}
 *
 * @package SimplePie
 * @subpackage Caching
 */
class SimplePie_Cache
{
    /**
     * Cache handler classes
     *
     * These receive 3 parameters to their constructor, as documented in
     * {@see register()}
     * @var array
     */
    protected static $handlers = array('mysql' => 'SimplePie_Cache_MySQL', 'memcache' => 'SimplePie_Cache_Memcache');
    /**
     * Don't call the constructor. Please.
     */
    private function __construct()
    {
    }
    /**
     * Create a new SimplePie_Cache object
     *
     * @param string $location URL location (scheme is used to determine handler)
     * @param string $filename Unique identifier for cache object
     * @param string $extension 'spi' or 'spc'
     * @return SimplePie_Cache_Base Type of object depends on scheme of `$location`
     */
    public static function get_handler($location, $filename, $extension)
    {
    }
    /**
     * Create a new SimplePie_Cache object
     *
     * @deprecated Use {@see get_handler} instead
     */
    public function create($location, $filename, $extension)
    {
    }
    /**
     * Register a handler
     *
     * @param string $type DSN type to register for
     * @param string $class Name of handler class. Must implement SimplePie_Cache_Base
     */
    public static function register($type, $class)
    {
    }
    /**
     * Parse a URL into an array
     *
     * @param string $url
     * @return array
     */
    public static function parse_URL($url)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Base for cache objects
 *
 * Classes to be used with {@see SimplePie_Cache::register()} are expected
 * to implement this interface.
 *
 * @package SimplePie
 * @subpackage Caching
 */
interface SimplePie_Cache_Base
{
    /**
     * Feed cache type
     *
     * @var string
     */
    const TYPE_FEED = 'spc';
    /**
     * Image cache type
     *
     * @var string
     */
    const TYPE_IMAGE = 'spi';
    /**
     * Create a new cache object
     *
     * @param string $location Location string (from SimplePie::$cache_location)
     * @param string $name Unique ID for the cache
     * @param string $type Either TYPE_FEED for SimplePie data, or TYPE_IMAGE for image data
     */
    public function __construct($location, $name, $type);
    /**
     * Save data to the cache
     *
     * @param array|SimplePie $data Data to store in the cache. If passed a SimplePie object, only cache the $data property
     * @return bool Successfulness
     */
    public function save($data);
    /**
     * Retrieve the data saved to the cache
     *
     * @return array Data for SimplePie::$data
     */
    public function load();
    /**
     * Retrieve the last modified time for the cache
     *
     * @return int Timestamp
     */
    public function mtime();
    /**
     * Set the last modified time to the current time
     *
     * @return bool Success status
     */
    public function touch();
    /**
     * Remove the cache
     *
     * @return bool Success status
     */
    public function unlink();
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Base class for database-based caches
 *
 * @package SimplePie
 * @subpackage Caching
 */
abstract class SimplePie_Cache_DB implements \SimplePie_Cache_Base
{
    /**
     * Helper for database conversion
     *
     * Converts a given {@see SimplePie} object into data to be stored
     *
     * @param SimplePie $data
     * @return array First item is the serialized data for storage, second item is the unique ID for this item
     */
    protected static function prepare_simplepie_object_for_cache($data)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Caches data to the filesystem
 *
 * @package SimplePie
 * @subpackage Caching
 */
class SimplePie_Cache_File implements \SimplePie_Cache_Base
{
    /**
     * Location string
     *
     * @see SimplePie::$cache_location
     * @var string
     */
    protected $location;
    /**
     * Filename
     *
     * @var string
     */
    protected $filename;
    /**
     * File extension
     *
     * @var string
     */
    protected $extension;
    /**
     * File path
     *
     * @var string
     */
    protected $name;
    /**
     * Create a new cache object
     *
     * @param string $location Location string (from SimplePie::$cache_location)
     * @param string $name Unique ID for the cache
     * @param string $type Either TYPE_FEED for SimplePie data, or TYPE_IMAGE for image data
     */
    public function __construct($location, $name, $type)
    {
    }
    /**
     * Save data to the cache
     *
     * @param array|SimplePie $data Data to store in the cache. If passed a SimplePie object, only cache the $data property
     * @return bool Successfulness
     */
    public function save($data)
    {
    }
    /**
     * Retrieve the data saved to the cache
     *
     * @return array Data for SimplePie::$data
     */
    public function load()
    {
    }
    /**
     * Retrieve the last modified time for the cache
     *
     * @return int Timestamp
     */
    public function mtime()
    {
    }
    /**
     * Set the last modified time to the current time
     *
     * @return bool Success status
     */
    public function touch()
    {
    }
    /**
     * Remove the cache
     *
     * @return bool Success status
     */
    public function unlink()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Caches data to memcache
 *
 * Registered for URLs with the "memcache" protocol
 *
 * For example, `memcache://localhost:11211/?timeout=3600&prefix=sp_` will
 * connect to memcache on `localhost` on port 11211. All tables will be
 * prefixed with `sp_` and data will expire after 3600 seconds
 *
 * @package SimplePie
 * @subpackage Caching
 * @uses Memcache
 */
class SimplePie_Cache_Memcache implements \SimplePie_Cache_Base
{
    /**
     * Memcache instance
     *
     * @var Memcache
     */
    protected $cache;
    /**
     * Options
     *
     * @var array
     */
    protected $options;
    /**
     * Cache name
     *
     * @var string
     */
    protected $name;
    /**
     * Create a new cache object
     *
     * @param string $location Location string (from SimplePie::$cache_location)
     * @param string $name Unique ID for the cache
     * @param string $type Either TYPE_FEED for SimplePie data, or TYPE_IMAGE for image data
     */
    public function __construct($location, $name, $type)
    {
    }
    /**
     * Save data to the cache
     *
     * @param array|SimplePie $data Data to store in the cache. If passed a SimplePie object, only cache the $data property
     * @return bool Successfulness
     */
    public function save($data)
    {
    }
    /**
     * Retrieve the data saved to the cache
     *
     * @return array Data for SimplePie::$data
     */
    public function load()
    {
    }
    /**
     * Retrieve the last modified time for the cache
     *
     * @return int Timestamp
     */
    public function mtime()
    {
    }
    /**
     * Set the last modified time to the current time
     *
     * @return bool Success status
     */
    public function touch()
    {
    }
    /**
     * Remove the cache
     *
     * @return bool Success status
     */
    public function unlink()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Caches data to a MySQL database
 *
 * Registered for URLs with the "mysql" protocol
 *
 * For example, `mysql://root:password@localhost:3306/mydb?prefix=sp_` will
 * connect to the `mydb` database on `localhost` on port 3306, with the user
 * `root` and the password `password`. All tables will be prefixed with `sp_`
 *
 * @package SimplePie
 * @subpackage Caching
 */
class SimplePie_Cache_MySQL extends \SimplePie_Cache_DB
{
    /**
     * PDO instance
     *
     * @var PDO
     */
    protected $mysql;
    /**
     * Options
     *
     * @var array
     */
    protected $options;
    /**
     * Cache ID
     *
     * @var string
     */
    protected $id;
    /**
     * Create a new cache object
     *
     * @param string $location Location string (from SimplePie::$cache_location)
     * @param string $name Unique ID for the cache
     * @param string $type Either TYPE_FEED for SimplePie data, or TYPE_IMAGE for image data
     */
    public function __construct($location, $name, $type)
    {
    }
    /**
     * Save data to the cache
     *
     * @param array|SimplePie $data Data to store in the cache. If passed a SimplePie object, only cache the $data property
     * @return bool Successfulness
     */
    public function save($data)
    {
    }
    /**
     * Retrieve the data saved to the cache
     *
     * @return array Data for SimplePie::$data
     */
    public function load()
    {
    }
    /**
     * Retrieve the last modified time for the cache
     *
     * @return int Timestamp
     */
    public function mtime()
    {
    }
    /**
     * Set the last modified time to the current time
     *
     * @return bool Success status
     */
    public function touch()
    {
    }
    /**
     * Remove the cache
     *
     * @return bool Success status
     */
    public function unlink()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles `<media:text>` captions as defined in Media RSS.
 *
 * Used by {@see SimplePie_Enclosure::get_caption()} and {@see SimplePie_Enclosure::get_captions()}
 *
 * This class can be overloaded with {@see SimplePie::set_caption_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Caption
{
    /**
     * Content type
     *
     * @var string
     * @see get_type()
     */
    var $type;
    /**
     * Language
     *
     * @var string
     * @see get_language()
     */
    var $lang;
    /**
     * Start time
     *
     * @var string
     * @see get_starttime()
     */
    var $startTime;
    /**
     * End time
     *
     * @var string
     * @see get_endtime()
     */
    var $endTime;
    /**
     * Caption text
     *
     * @var string
     * @see get_text()
     */
    var $text;
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     */
    public function __construct($type = \null, $lang = \null, $startTime = \null, $endTime = \null, $text = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the end time
     *
     * @return string|null Time in the format 'hh:mm:ss.SSS'
     */
    public function get_endtime()
    {
    }
    /**
     * Get the language
     *
     * @link http://tools.ietf.org/html/rfc3066
     * @return string|null Language code as per RFC 3066
     */
    public function get_language()
    {
    }
    /**
     * Get the start time
     *
     * @return string|null Time in the format 'hh:mm:ss.SSS'
     */
    public function get_starttime()
    {
    }
    /**
     * Get the text of the caption
     *
     * @return string|null
     */
    public function get_text()
    {
    }
    /**
     * Get the content type (not MIME type)
     *
     * @return string|null Either 'text' or 'html'
     */
    public function get_type()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Manages all category-related data
 *
 * Used by {@see SimplePie_Item::get_category()} and {@see SimplePie_Item::get_categories()}
 *
 * This class can be overloaded with {@see SimplePie::set_category_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Category
{
    /**
     * Category identifier
     *
     * @var string
     * @see get_term
     */
    var $term;
    /**
     * Categorization scheme identifier
     *
     * @var string
     * @see get_scheme()
     */
    var $scheme;
    /**
     * Human readable label
     *
     * @var string
     * @see get_label()
     */
    var $label;
    /**
     * Constructor, used to input the data
     *
     * @param string $term
     * @param string $scheme
     * @param string $label
     */
    public function __construct($term = \null, $scheme = \null, $label = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the category identifier
     *
     * @return string|null
     */
    public function get_term()
    {
    }
    /**
     * Get the categorization scheme identifier
     *
     * @return string|null
     */
    public function get_scheme()
    {
    }
    /**
     * Get the human readable label
     *
     * @return string|null
     */
    public function get_label()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Content-type sniffing
 *
 * Based on the rules in http://tools.ietf.org/html/draft-abarth-mime-sniff-06
 *
 * This is used since we can't always trust Content-Type headers, and is based
 * upon the HTML5 parsing rules.
 *
 *
 * This class can be overloaded with {@see SimplePie::set_content_type_sniffer_class()}
 *
 * @package SimplePie
 * @subpackage HTTP
 */
class SimplePie_Content_Type_Sniffer
{
    /**
     * File object
     *
     * @var SimplePie_File
     */
    var $file;
    /**
     * Create an instance of the class with the input file
     *
     * @param SimplePie_Content_Type_Sniffer $file Input file
     */
    public function __construct($file)
    {
    }
    /**
     * Get the Content-Type of the specified file
     *
     * @return string Actual Content-Type
     */
    public function get_type()
    {
    }
    /**
     * Sniff text or binary
     *
     * @return string Actual Content-Type
     */
    public function text_or_binary()
    {
    }
    /**
     * Sniff unknown
     *
     * @return string Actual Content-Type
     */
    public function unknown()
    {
    }
    /**
     * Sniff images
     *
     * @return string Actual Content-Type
     */
    public function image()
    {
    }
    /**
     * Sniff HTML
     *
     * @return string Actual Content-Type
     */
    public function feed_or_html()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Manages `<media:copyright>` copyright tags as defined in Media RSS
 *
 * Used by {@see SimplePie_Enclosure::get_copyright()}
 *
 * This class can be overloaded with {@see SimplePie::set_copyright_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Copyright
{
    /**
     * Copyright URL
     *
     * @var string
     * @see get_url()
     */
    var $url;
    /**
     * Attribution
     *
     * @var string
     * @see get_attribution()
     */
    var $label;
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     */
    public function __construct($url = \null, $label = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the copyright URL
     *
     * @return string|null URL to copyright information
     */
    public function get_url()
    {
    }
    /**
     * Get the attribution text
     *
     * @return string|null
     */
    public function get_attribution()
    {
    }
}
/**
 * SimplePie
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie
{
    /**
     * @var array Raw data
     * @access private
     */
    public $data = array();
    /**
     * @var mixed Error string
     * @access private
     */
    public $error;
    /**
     * @var object Instance of SimplePie_Sanitize (or other class)
     * @see SimplePie::set_sanitize_class()
     * @access private
     */
    public $sanitize;
    /**
     * @var string SimplePie Useragent
     * @see SimplePie::set_useragent()
     * @access private
     */
    public $useragent = \SIMPLEPIE_USERAGENT;
    /**
     * @var string Feed URL
     * @see SimplePie::set_feed_url()
     * @access private
     */
    public $feed_url;
    /**
     * @var object Instance of SimplePie_File to use as a feed
     * @see SimplePie::set_file()
     * @access private
     */
    public $file;
    /**
     * @var string Raw feed data
     * @see SimplePie::set_raw_data()
     * @access private
     */
    public $raw_data;
    /**
     * @var int Timeout for fetching remote files
     * @see SimplePie::set_timeout()
     * @access private
     */
    public $timeout = 10;
    /**
     * @var bool Forces fsockopen() to be used for remote files instead
     * of cURL, even if a new enough version is installed
     * @see SimplePie::force_fsockopen()
     * @access private
     */
    public $force_fsockopen = \false;
    /**
     * @var bool Force the given data/URL to be treated as a feed no matter what
     * it appears like
     * @see SimplePie::force_feed()
     * @access private
     */
    public $force_feed = \false;
    /**
     * @var bool Enable/Disable Caching
     * @see SimplePie::enable_cache()
     * @access private
     */
    public $cache = \true;
    /**
     * @var int Cache duration (in seconds)
     * @see SimplePie::set_cache_duration()
     * @access private
     */
    public $cache_duration = 3600;
    /**
     * @var int Auto-discovery cache duration (in seconds)
     * @see SimplePie::set_autodiscovery_cache_duration()
     * @access private
     */
    public $autodiscovery_cache_duration = 604800;
    // 7 Days.
    /**
     * @var string Cache location (relative to executing script)
     * @see SimplePie::set_cache_location()
     * @access private
     */
    public $cache_location = './cache';
    /**
     * @var string Function that creates the cache filename
     * @see SimplePie::set_cache_name_function()
     * @access private
     */
    public $cache_name_function = 'md5';
    /**
     * @var bool Reorder feed by date descending
     * @see SimplePie::enable_order_by_date()
     * @access private
     */
    public $order_by_date = \true;
    /**
     * @var mixed Force input encoding to be set to the follow value
     * (false, or anything type-cast to false, disables this feature)
     * @see SimplePie::set_input_encoding()
     * @access private
     */
    public $input_encoding = \false;
    /**
     * @var int Feed Autodiscovery Level
     * @see SimplePie::set_autodiscovery_level()
     * @access private
     */
    public $autodiscovery = \SIMPLEPIE_LOCATOR_ALL;
    /**
     * Class registry object
     *
     * @var SimplePie_Registry
     */
    public $registry;
    /**
     * @var int Maximum number of feeds to check with autodiscovery
     * @see SimplePie::set_max_checked_feeds()
     * @access private
     */
    public $max_checked_feeds = 10;
    /**
     * @var array All the feeds found during the autodiscovery process
     * @see SimplePie::get_all_discovered_feeds()
     * @access private
     */
    public $all_discovered_feeds = array();
    /**
     * @var string Web-accessible path to the handler_image.php file.
     * @see SimplePie::set_image_handler()
     * @access private
     */
    public $image_handler = '';
    /**
     * @var array Stores the URLs when multiple feeds are being initialized.
     * @see SimplePie::set_feed_url()
     * @access private
     */
    public $multifeed_url = array();
    /**
     * @var array Stores SimplePie objects when multiple feeds initialized.
     * @access private
     */
    public $multifeed_objects = array();
    /**
     * @var array Stores the get_object_vars() array for use with multifeeds.
     * @see SimplePie::set_feed_url()
     * @access private
     */
    public $config_settings = \null;
    /**
     * @var integer Stores the number of items to return per-feed with multifeeds.
     * @see SimplePie::set_item_limit()
     * @access private
     */
    public $item_limit = 0;
    /**
     * @var array Stores the default attributes to be stripped by strip_attributes().
     * @see SimplePie::strip_attributes()
     * @access private
     */
    public $strip_attributes = array('bgsound', 'class', 'expr', 'id', 'style', 'onclick', 'onerror', 'onfinish', 'onmouseover', 'onmouseout', 'onfocus', 'onblur', 'lowsrc', 'dynsrc');
    /**
     * @var array Stores the default tags to be stripped by strip_htmltags().
     * @see SimplePie::strip_htmltags()
     * @access private
     */
    public $strip_htmltags = array('base', 'blink', 'body', 'doctype', 'embed', 'font', 'form', 'frame', 'frameset', 'html', 'iframe', 'input', 'marquee', 'meta', 'noscript', 'object', 'param', 'script', 'style');
    /**
     * The SimplePie class contains feed level data and options
     *
     * To use SimplePie, create the SimplePie object with no parameters. You can
     * then set configuration options using the provided methods. After setting
     * them, you must initialise the feed using $feed->init(). At that point the
     * object's methods and properties will be available to you.
     *
     * Previously, it was possible to pass in the feed URL along with cache
     * options directly into the constructor. This has been removed as of 1.3 as
     * it caused a lot of confusion.
     *
     * @since 1.0 Preview Release
     */
    public function __construct()
    {
    }
    /**
     * Used for converting object to a string
     */
    public function __toString()
    {
    }
    /**
     * Remove items that link back to this before destroying this object
     */
    public function __destruct()
    {
    }
    /**
     * Force the given data/URL to be treated as a feed
     *
     * This tells SimplePie to ignore the content-type provided by the server.
     * Be careful when using this option, as it will also disable autodiscovery.
     *
     * @since 1.1
     * @param bool $enable Force the given data/URL to be treated as a feed
     */
    public function force_feed($enable = \false)
    {
    }
    /**
     * Set the URL of the feed you want to parse
     *
     * This allows you to enter the URL of the feed you want to parse, or the
     * website you want to try to use auto-discovery on. This takes priority
     * over any set raw data.
     *
     * You can set multiple feeds to mash together by passing an array instead
     * of a string for the $url. Remember that with each additional feed comes
     * additional processing and resources.
     *
     * @since 1.0 Preview Release
     * @see set_raw_data()
     * @param string|array $url This is the URL (or array of URLs) that you want to parse.
     */
    public function set_feed_url($url)
    {
    }
    /**
     * Set an instance of {@see SimplePie_File} to use as a feed
     *
     * @param SimplePie_File &$file
     * @return bool True on success, false on failure
     */
    public function set_file(&$file)
    {
    }
    /**
     * Set the raw XML data to parse
     *
     * Allows you to use a string of RSS/Atom data instead of a remote feed.
     *
     * If you have a feed available as a string in PHP, you can tell SimplePie
     * to parse that data string instead of a remote feed. Any set feed URL
     * takes precedence.
     *
     * @since 1.0 Beta 3
     * @param string $data RSS or Atom data as a string.
     * @see set_feed_url()
     */
    public function set_raw_data($data)
    {
    }
    /**
     * Set the the default timeout for fetching remote feeds
     *
     * This allows you to change the maximum time the feed's server to respond
     * and send the feed back.
     *
     * @since 1.0 Beta 3
     * @param int $timeout The maximum number of seconds to spend waiting to retrieve a feed.
     */
    public function set_timeout($timeout = 10)
    {
    }
    /**
     * Force SimplePie to use fsockopen() instead of cURL
     *
     * @since 1.0 Beta 3
     * @param bool $enable Force fsockopen() to be used
     */
    public function force_fsockopen($enable = \false)
    {
    }
    /**
     * Enable/disable caching in SimplePie.
     *
     * This option allows you to disable caching all-together in SimplePie.
     * However, disabling the cache can lead to longer load times.
     *
     * @since 1.0 Preview Release
     * @param bool $enable Enable caching
     */
    public function enable_cache($enable = \true)
    {
    }
    /**
     * Set the length of time (in seconds) that the contents of a feed will be
     * cached
     *
     * @param int $seconds The feed content cache duration
     */
    public function set_cache_duration($seconds = 3600)
    {
    }
    /**
     * Set the length of time (in seconds) that the autodiscovered feed URL will
     * be cached
     *
     * @param int $seconds The autodiscovered feed URL cache duration.
     */
    public function set_autodiscovery_cache_duration($seconds = 604800)
    {
    }
    /**
     * Set the file system location where the cached files should be stored
     *
     * @param string $location The file system location.
     */
    public function set_cache_location($location = './cache')
    {
    }
    /**
     * Set whether feed items should be sorted into reverse chronological order
     *
     * @param bool $enable Sort as reverse chronological order.
     */
    public function enable_order_by_date($enable = \true)
    {
    }
    /**
     * Set the character encoding used to parse the feed
     *
     * This overrides the encoding reported by the feed, however it will fall
     * back to the normal encoding detection if the override fails
     *
     * @param string $encoding Character encoding
     */
    public function set_input_encoding($encoding = \false)
    {
    }
    /**
     * Set how much feed autodiscovery to do
     *
     * @see SIMPLEPIE_LOCATOR_NONE
     * @see SIMPLEPIE_LOCATOR_AUTODISCOVERY
     * @see SIMPLEPIE_LOCATOR_LOCAL_EXTENSION
     * @see SIMPLEPIE_LOCATOR_LOCAL_BODY
     * @see SIMPLEPIE_LOCATOR_REMOTE_EXTENSION
     * @see SIMPLEPIE_LOCATOR_REMOTE_BODY
     * @see SIMPLEPIE_LOCATOR_ALL
     * @param int $level Feed Autodiscovery Level (level can be a combination of the above constants, see bitwise OR operator)
     */
    public function set_autodiscovery_level($level = \SIMPLEPIE_LOCATOR_ALL)
    {
    }
    /**
     * Get the class registry
     *
     * Use this to override SimplePie's default classes
     * @see SimplePie_Registry
     * @return SimplePie_Registry
     */
    public function &get_registry()
    {
    }
    /**#@+
     * Useful when you are overloading or extending SimplePie's default classes.
     *
     * @deprecated Use {@see get_registry()} instead
     * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends PHP5 extends documentation
     * @param string $class Name of custom class
     * @return boolean True on success, false otherwise
     */
    /**
     * Set which class SimplePie uses for caching
     */
    public function set_cache_class($class = 'SimplePie_Cache')
    {
    }
    /**
     * Set which class SimplePie uses for auto-discovery
     */
    public function set_locator_class($class = 'SimplePie_Locator')
    {
    }
    /**
     * Set which class SimplePie uses for XML parsing
     */
    public function set_parser_class($class = 'SimplePie_Parser')
    {
    }
    /**
     * Set which class SimplePie uses for remote file fetching
     */
    public function set_file_class($class = 'SimplePie_File')
    {
    }
    /**
     * Set which class SimplePie uses for data sanitization
     */
    public function set_sanitize_class($class = 'SimplePie_Sanitize')
    {
    }
    /**
     * Set which class SimplePie uses for handling feed items
     */
    public function set_item_class($class = 'SimplePie_Item')
    {
    }
    /**
     * Set which class SimplePie uses for handling author data
     */
    public function set_author_class($class = 'SimplePie_Author')
    {
    }
    /**
     * Set which class SimplePie uses for handling category data
     */
    public function set_category_class($class = 'SimplePie_Category')
    {
    }
    /**
     * Set which class SimplePie uses for feed enclosures
     */
    public function set_enclosure_class($class = 'SimplePie_Enclosure')
    {
    }
    /**
     * Set which class SimplePie uses for `<media:text>` captions
     */
    public function set_caption_class($class = 'SimplePie_Caption')
    {
    }
    /**
     * Set which class SimplePie uses for `<media:copyright>`
     */
    public function set_copyright_class($class = 'SimplePie_Copyright')
    {
    }
    /**
     * Set which class SimplePie uses for `<media:credit>`
     */
    public function set_credit_class($class = 'SimplePie_Credit')
    {
    }
    /**
     * Set which class SimplePie uses for `<media:rating>`
     */
    public function set_rating_class($class = 'SimplePie_Rating')
    {
    }
    /**
     * Set which class SimplePie uses for `<media:restriction>`
     */
    public function set_restriction_class($class = 'SimplePie_Restriction')
    {
    }
    /**
     * Set which class SimplePie uses for content-type sniffing
     */
    public function set_content_type_sniffer_class($class = 'SimplePie_Content_Type_Sniffer')
    {
    }
    /**
     * Set which class SimplePie uses item sources
     */
    public function set_source_class($class = 'SimplePie_Source')
    {
    }
    /**#@-*/
    /**
     * Set the user agent string
     *
     * @param string $ua New user agent string.
     */
    public function set_useragent($ua = \SIMPLEPIE_USERAGENT)
    {
    }
    /**
     * Set callback function to create cache filename with
     *
     * @param mixed $function Callback function
     */
    public function set_cache_name_function($function = 'md5')
    {
    }
    /**
     * Set options to make SP as fast as possible
     *
     * Forgoes a substantial amount of data sanitization in favor of speed. This
     * turns SimplePie into a dumb parser of feeds.
     *
     * @param bool $set Whether to set them or not
     */
    public function set_stupidly_fast($set = \false)
    {
    }
    /**
     * Set maximum number of feeds to check with autodiscovery
     *
     * @param int $max Maximum number of feeds to check
     */
    public function set_max_checked_feeds($max = 10)
    {
    }
    public function remove_div($enable = \true)
    {
    }
    public function strip_htmltags($tags = '', $encode = \null)
    {
    }
    public function encode_instead_of_strip($enable = \true)
    {
    }
    public function strip_attributes($attribs = '')
    {
    }
    /**
     * Set the output encoding
     *
     * Allows you to override SimplePie's output to match that of your webpage.
     * This is useful for times when your webpages are not being served as
     * UTF-8.  This setting will be obeyed by {@see handle_content_type()}, and
     * is similar to {@see set_input_encoding()}.
     *
     * It should be noted, however, that not all character encodings can support
     * all characters.  If your page is being served as ISO-8859-1 and you try
     * to display a Japanese feed, you'll likely see garbled characters.
     * Because of this, it is highly recommended to ensure that your webpages
     * are served as UTF-8.
     *
     * The number of supported character encodings depends on whether your web
     * host supports {@link http://php.net/mbstring mbstring},
     * {@link http://php.net/iconv iconv}, or both. See
     * {@link http://simplepie.org/wiki/faq/Supported_Character_Encodings} for
     * more information.
     *
     * @param string $encoding
     */
    public function set_output_encoding($encoding = 'UTF-8')
    {
    }
    public function strip_comments($strip = \false)
    {
    }
    /**
     * Set element/attribute key/value pairs of HTML attributes
     * containing URLs that need to be resolved relative to the feed
     *
     * Defaults to |a|@href, |area|@href, |blockquote|@cite, |del|@cite,
     * |form|@action, |img|@longdesc, |img|@src, |input|@src, |ins|@cite,
     * |q|@cite
     *
     * @since 1.0
     * @param array|null $element_attribute Element/attribute key/value pairs, null for default
     */
    public function set_url_replacements($element_attribute = \null)
    {
    }
    /**
     * Set the handler to enable the display of cached images.
     *
     * @param str $page Web-accessible path to the handler_image.php file.
     * @param str $qs The query string that the value should be passed to.
     */
    public function set_image_handler($page = \false, $qs = 'i')
    {
    }
    /**
     * Set the limit for items returned per-feed with multifeeds
     *
     * @param integer $limit The maximum number of items to return.
     */
    public function set_item_limit($limit = 0)
    {
    }
    /**
     * Initialize the feed object
     *
     * This is what makes everything happen.  Period.  This is where all of the
     * configuration options get processed, feeds are fetched, cached, and
     * parsed, and all of that other good stuff.
     *
     * @return boolean True if successful, false otherwise
     */
    public function init()
    {
    }
    /**
     * Fetch the data via SimplePie_File
     *
     * If the data is already cached, attempt to fetch it from there instead
     * @param SimplePie_Cache|false $cache Cache handler, or false to not load from the cache
     * @return array|true Returns true if the data was loaded from the cache, or an array of HTTP headers and sniffed type
     */
    protected function fetch_data(&$cache)
    {
    }
    /**
     * Get the error message for the occurred error.
     *
     * @return string|array Error message, or array of messages for multifeeds
     */
    public function error()
    {
    }
    /**
     * Get the raw XML
     *
     * This is the same as the old `$feed->enable_xml_dump(true)`, but returns
     * the data instead of printing it.
     *
     * @return string|boolean Raw XML data, false if the cache is used
     */
    public function get_raw_data()
    {
    }
    /**
     * Get the character encoding used for output
     *
     * @since Preview Release
     * @return string
     */
    public function get_encoding()
    {
    }
    /**
     * Send the content-type header with correct encoding
     *
     * This method ensures that the SimplePie-enabled page is being served with
     * the correct {@link http://www.iana.org/assignments/media-types/ mime-type}
     * and character encoding HTTP headers (character encoding determined by the
     * {@see set_output_encoding} config option).
     *
     * This won't work properly if any content or whitespace has already been
     * sent to the browser, because it relies on PHP's
     * {@link http://php.net/header header()} function, and these are the
     * circumstances under which the function works.
     *
     * Because it's setting these settings for the entire page (as is the nature
     * of HTTP headers), this should only be used once per page (again, at the
     * top).
     *
     * @param string $mime MIME type to serve the page as
     */
    public function handle_content_type($mime = 'text/html')
    {
    }
    /**
     * Get the type of the feed
     *
     * This returns a SIMPLEPIE_TYPE_* constant, which can be tested against
     * using {@link http://php.net/language.operators.bitwise bitwise operators}
     *
     * @since 0.8 (usage changed to using constants in 1.0)
     * @see SIMPLEPIE_TYPE_NONE Unknown.
     * @see SIMPLEPIE_TYPE_RSS_090 RSS 0.90.
     * @see SIMPLEPIE_TYPE_RSS_091_NETSCAPE RSS 0.91 (Netscape).
     * @see SIMPLEPIE_TYPE_RSS_091_USERLAND RSS 0.91 (Userland).
     * @see SIMPLEPIE_TYPE_RSS_091 RSS 0.91.
     * @see SIMPLEPIE_TYPE_RSS_092 RSS 0.92.
     * @see SIMPLEPIE_TYPE_RSS_093 RSS 0.93.
     * @see SIMPLEPIE_TYPE_RSS_094 RSS 0.94.
     * @see SIMPLEPIE_TYPE_RSS_10 RSS 1.0.
     * @see SIMPLEPIE_TYPE_RSS_20 RSS 2.0.x.
     * @see SIMPLEPIE_TYPE_RSS_RDF RDF-based RSS.
     * @see SIMPLEPIE_TYPE_RSS_SYNDICATION Non-RDF-based RSS (truly intended as syndication format).
     * @see SIMPLEPIE_TYPE_RSS_ALL Any version of RSS.
     * @see SIMPLEPIE_TYPE_ATOM_03 Atom 0.3.
     * @see SIMPLEPIE_TYPE_ATOM_10 Atom 1.0.
     * @see SIMPLEPIE_TYPE_ATOM_ALL Any version of Atom.
     * @see SIMPLEPIE_TYPE_ALL Any known/supported feed type.
     * @return int SIMPLEPIE_TYPE_* constant
     */
    public function get_type()
    {
    }
    /**
     * Get the URL for the feed
     *
     * May or may not be different from the URL passed to {@see set_feed_url()},
     * depending on whether auto-discovery was used.
     *
     * @since Preview Release (previously called `get_feed_url()` since SimplePie 0.8.)
     * @todo If we have a perm redirect we should return the new URL
     * @todo When we make the above change, let's support <itunes:new-feed-url> as well
     * @todo Also, |atom:link|@rel=self
     * @return string|null
     */
    public function subscribe_url()
    {
    }
    /**
     * Get data for an feed-level element
     *
     * This method allows you to get access to ANY element/attribute that is a
     * sub-element of the opening feed tag.
     *
     * The return value is an indexed array of elements matching the given
     * namespace and tag name. Each element has `attribs`, `data` and `child`
     * subkeys. For `attribs` and `child`, these contain namespace subkeys.
     * `attribs` then has one level of associative name => value data (where
     * `value` is a string) after the namespace. `child` has tag-indexed keys
     * after the namespace, each member of which is an indexed array matching
     * this same format.
     *
     * For example:
     * <pre>
     * // This is probably a bad example because we already support
     * // <media:content> natively, but it shows you how to parse through
     * // the nodes.
     * $group = $item->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'group');
     * $content = $group[0]['child'][SIMPLEPIE_NAMESPACE_MEDIARSS]['content'];
     * $file = $content[0]['attribs']['']['url'];
     * echo $file;
     * </pre>
     *
     * @since 1.0
     * @see http://simplepie.org/wiki/faq/supported_xml_namespaces
     * @param string $namespace The URL of the XML namespace of the elements you're trying to access
     * @param string $tag Tag name
     * @return array
     */
    public function get_feed_tags($namespace, $tag)
    {
    }
    /**
     * Get data for an channel-level element
     *
     * This method allows you to get access to ANY element/attribute in the
     * channel/header section of the feed.
     *
     * See {@see SimplePie::get_feed_tags()} for a description of the return value
     *
     * @since 1.0
     * @see http://simplepie.org/wiki/faq/supported_xml_namespaces
     * @param string $namespace The URL of the XML namespace of the elements you're trying to access
     * @param string $tag Tag name
     * @return array
     */
    public function get_channel_tags($namespace, $tag)
    {
    }
    /**
     * Get data for an channel-level element
     *
     * This method allows you to get access to ANY element/attribute in the
     * image/logo section of the feed.
     *
     * See {@see SimplePie::get_feed_tags()} for a description of the return value
     *
     * @since 1.0
     * @see http://simplepie.org/wiki/faq/supported_xml_namespaces
     * @param string $namespace The URL of the XML namespace of the elements you're trying to access
     * @param string $tag Tag name
     * @return array
     */
    public function get_image_tags($namespace, $tag)
    {
    }
    /**
     * Get the base URL value from the feed
     *
     * Uses `<xml:base>` if available, otherwise uses the first link in the
     * feed, or failing that, the URL of the feed itself.
     *
     * @see get_link
     * @see subscribe_url
     *
     * @param array $element
     * @return string
     */
    public function get_base($element = array())
    {
    }
    /**
     * Sanitize feed data
     *
     * @access private
     * @see SimplePie_Sanitize::sanitize()
     * @param string $data Data to sanitize
     * @param int $type One of the SIMPLEPIE_CONSTRUCT_* constants
     * @param string $base Base URL to resolve URLs against
     * @return string Sanitized data
     */
    public function sanitize($data, $type, $base = '')
    {
    }
    /**
     * Get the title of the feed
     *
     * Uses `<atom:title>`, `<title>` or `<dc:title>`
     *
     * @since 1.0 (previously called `get_feed_title` since 0.8)
     * @return string|null
     */
    public function get_title()
    {
    }
    /**
     * Get a category for the feed
     *
     * @since Unknown
     * @param int $key The category that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Category|null
     */
    public function get_category($key = 0)
    {
    }
    /**
     * Get all categories for the feed
     *
     * Uses `<atom:category>`, `<category>` or `<dc:subject>`
     *
     * @since Unknown
     * @return array|null List of {@see SimplePie_Category} objects
     */
    public function get_categories()
    {
    }
    /**
     * Get an author for the feed
     *
     * @since 1.1
     * @param int $key The author that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Author|null
     */
    public function get_author($key = 0)
    {
    }
    /**
     * Get all authors for the feed
     *
     * Uses `<atom:author>`, `<author>`, `<dc:creator>` or `<itunes:author>`
     *
     * @since 1.1
     * @return array|null List of {@see SimplePie_Author} objects
     */
    public function get_authors()
    {
    }
    /**
     * Get a contributor for the feed
     *
     * @since 1.1
     * @param int $key The contrbutor that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Author|null
     */
    public function get_contributor($key = 0)
    {
    }
    /**
     * Get all contributors for the feed
     *
     * Uses `<atom:contributor>`
     *
     * @since 1.1
     * @return array|null List of {@see SimplePie_Author} objects
     */
    public function get_contributors()
    {
    }
    /**
     * Get a single link for the feed
     *
     * @since 1.0 (previously called `get_feed_link` since Preview Release, `get_feed_permalink()` since 0.8)
     * @param int $key The link that you want to return.  Remember that arrays begin with 0, not 1
     * @param string $rel The relationship of the link to return
     * @return string|null Link URL
     */
    public function get_link($key = 0, $rel = 'alternate')
    {
    }
    /**
     * Get the permalink for the item
     *
     * Returns the first link available with a relationship of "alternate".
     * Identical to {@see get_link()} with key 0
     *
     * @see get_link
     * @since 1.0 (previously called `get_feed_link` since Preview Release, `get_feed_permalink()` since 0.8)
     * @internal Added for parity between the parent-level and the item/entry-level.
     * @return string|null Link URL
     */
    public function get_permalink()
    {
    }
    /**
     * Get all links for the feed
     *
     * Uses `<atom:link>` or `<link>`
     *
     * @since Beta 2
     * @param string $rel The relationship of links to return
     * @return array|null Links found for the feed (strings)
     */
    public function get_links($rel = 'alternate')
    {
    }
    public function get_all_discovered_feeds()
    {
    }
    /**
     * Get the content for the item
     *
     * Uses `<atom:subtitle>`, `<atom:tagline>`, `<description>`,
     * `<dc:description>`, `<itunes:summary>` or `<itunes:subtitle>`
     *
     * @since 1.0 (previously called `get_feed_description()` since 0.8)
     * @return string|null
     */
    public function get_description()
    {
    }
    /**
     * Get the copyright info for the feed
     *
     * Uses `<atom:rights>`, `<atom:copyright>` or `<dc:rights>`
     *
     * @since 1.0 (previously called `get_feed_copyright()` since 0.8)
     * @return string|null
     */
    public function get_copyright()
    {
    }
    /**
     * Get the language for the feed
     *
     * Uses `<language>`, `<dc:language>`, or @xml_lang
     *
     * @since 1.0 (previously called `get_feed_language()` since 0.8)
     * @return string|null
     */
    public function get_language()
    {
    }
    /**
     * Get the latitude coordinates for the item
     *
     * Compatible with the W3C WGS84 Basic Geo and GeoRSS specifications
     *
     * Uses `<geo:lat>` or `<georss:point>`
     *
     * @since 1.0
     * @link http://www.w3.org/2003/01/geo/ W3C WGS84 Basic Geo
     * @link http://www.georss.org/ GeoRSS
     * @return string|null
     */
    public function get_latitude()
    {
    }
    /**
     * Get the longitude coordinates for the feed
     *
     * Compatible with the W3C WGS84 Basic Geo and GeoRSS specifications
     *
     * Uses `<geo:long>`, `<geo:lon>` or `<georss:point>`
     *
     * @since 1.0
     * @link http://www.w3.org/2003/01/geo/ W3C WGS84 Basic Geo
     * @link http://www.georss.org/ GeoRSS
     * @return string|null
     */
    public function get_longitude()
    {
    }
    /**
     * Get the feed logo's title
     *
     * RSS 0.9.0, 1.0 and 2.0 feeds are allowed to have a "feed logo" title.
     *
     * Uses `<image><title>` or `<image><dc:title>`
     *
     * @return string|null
     */
    public function get_image_title()
    {
    }
    /**
     * Get the feed logo's URL
     *
     * RSS 0.9.0, 2.0, Atom 1.0, and feeds with iTunes RSS tags are allowed to
     * have a "feed logo" URL. This points directly to the image itself.
     *
     * Uses `<itunes:image>`, `<atom:logo>`, `<atom:icon>`,
     * `<image><title>` or `<image><dc:title>`
     *
     * @return string|null
     */
    public function get_image_url()
    {
    }
    /**
     * Get the feed logo's link
     *
     * RSS 0.9.0, 1.0 and 2.0 feeds are allowed to have a "feed logo" link. This
     * points to a human-readable page that the image should link to.
     *
     * Uses `<itunes:image>`, `<atom:logo>`, `<atom:icon>`,
     * `<image><title>` or `<image><dc:title>`
     *
     * @return string|null
     */
    public function get_image_link()
    {
    }
    /**
     * Get the feed logo's link
     *
     * RSS 2.0 feeds are allowed to have a "feed logo" width.
     *
     * Uses `<image><width>` or defaults to 88.0 if no width is specified and
     * the feed is an RSS 2.0 feed.
     *
     * @return int|float|null
     */
    public function get_image_width()
    {
    }
    /**
     * Get the feed logo's height
     *
     * RSS 2.0 feeds are allowed to have a "feed logo" height.
     *
     * Uses `<image><height>` or defaults to 31.0 if no height is specified and
     * the feed is an RSS 2.0 feed.
     *
     * @return int|float|null
     */
    public function get_image_height()
    {
    }
    /**
     * Get the number of items in the feed
     *
     * This is well-suited for {@link http://php.net/for for()} loops with
     * {@see get_item()}
     *
     * @param int $max Maximum value to return. 0 for no limit
     * @return int Number of items in the feed
     */
    public function get_item_quantity($max = 0)
    {
    }
    /**
     * Get a single item from the feed
     *
     * This is better suited for {@link http://php.net/for for()} loops, whereas
     * {@see get_items()} is better suited for
     * {@link http://php.net/foreach foreach()} loops.
     *
     * @see get_item_quantity()
     * @since Beta 2
     * @param int $key The item that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Item|null
     */
    public function get_item($key = 0)
    {
    }
    /**
     * Get all items from the feed
     *
     * This is better suited for {@link http://php.net/for for()} loops, whereas
     * {@see get_items()} is better suited for
     * {@link http://php.net/foreach foreach()} loops.
     *
     * @see get_item_quantity
     * @since Beta 2
     * @param int $start Index to start at
     * @param int $end Number of items to return. 0 for all items after `$start`
     * @return array|null List of {@see SimplePie_Item} objects
     */
    public function get_items($start = 0, $end = 0)
    {
    }
    /**
     * Set the favicon handler
     *
     * @deprecated Use your own favicon handling instead
     */
    public function set_favicon_handler($page = \false, $qs = 'i')
    {
    }
    /**
     * Get the favicon for the current feed
     *
     * @deprecated Use your own favicon handling instead
     */
    public function get_favicon()
    {
    }
    /**
     * Magic method handler
     *
     * @param string $method Method name
     * @param array $args Arguments to the method
     * @return mixed
     */
    public function __call($method, $args)
    {
    }
    /**
     * Sorting callback for items
     *
     * @access private
     * @param SimplePie $a
     * @param SimplePie $b
     * @return boolean
     */
    public static function sort_items($a, $b)
    {
    }
    /**
     * Merge items from several feeds into one
     *
     * If you're merging multiple feeds together, they need to all have dates
     * for the items or else SimplePie will refuse to sort them.
     *
     * @link http://simplepie.org/wiki/tutorial/sort_multiple_feeds_by_time_and_date#if_feeds_require_separate_per-feed_settings
     * @param array $urls List of SimplePie feed objects to merge
     * @param int $start Starting item
     * @param int $end Number of items to return
     * @param int $limit Maximum number of items per feed
     * @return array
     */
    public static function merge_items($urls, $start = 0, $end = 0, $limit = 0)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2009, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * SimplePie class.
 *
 * Class for backward compatibility.
 *
 * @deprecated Use {@see SimplePie} directly
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Core extends \SimplePie
{
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles `<media:credit>` as defined in Media RSS
 *
 * Used by {@see SimplePie_Enclosure::get_credit()} and {@see SimplePie_Enclosure::get_credits()}
 *
 * This class can be overloaded with {@see SimplePie::set_credit_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Credit
{
    /**
     * Credited role
     *
     * @var string
     * @see get_role()
     */
    var $role;
    /**
     * Organizational scheme
     *
     * @var string
     * @see get_scheme()
     */
    var $scheme;
    /**
     * Credited name
     *
     * @var string
     * @see get_name()
     */
    var $name;
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     */
    public function __construct($role = \null, $scheme = \null, $name = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the role of the person receiving credit
     *
     * @return string|null
     */
    public function get_role()
    {
    }
    /**
     * Get the organizational scheme
     *
     * @return string|null
     */
    public function get_scheme()
    {
    }
    /**
     * Get the credited person/entity's name
     *
     * @return string|null
     */
    public function get_name()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Decode HTML Entities
 *
 * This implements HTML5 as of revision 967 (2007-06-28)
 *
 * @deprecated Use DOMDocument instead!
 * @package SimplePie
 */
class SimplePie_Decode_HTML_Entities
{
    /**
     * Data to be parsed
     *
     * @access private
     * @var string
     */
    var $data = '';
    /**
     * Currently consumed bytes
     *
     * @access private
     * @var string
     */
    var $consumed = '';
    /**
     * Position of the current byte being parsed
     *
     * @access private
     * @var int
     */
    var $position = 0;
    /**
     * Create an instance of the class with the input data
     *
     * @access public
     * @param string $data Input data
     */
    public function __construct($data)
    {
    }
    /**
     * Parse the input data
     *
     * @access public
     * @return string Output data
     */
    public function parse()
    {
    }
    /**
     * Consume the next byte
     *
     * @access private
     * @return mixed The next byte, or false, if there is no more data
     */
    public function consume()
    {
    }
    /**
     * Consume a range of characters
     *
     * @access private
     * @param string $chars Characters to consume
     * @return mixed A series of characters that match the range, or false
     */
    public function consume_range($chars)
    {
    }
    /**
     * Unconsume one byte
     *
     * @access private
     */
    public function unconsume()
    {
    }
    /**
     * Decode an entity
     *
     * @access private
     */
    public function entity()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles everything related to enclosures (including Media RSS and iTunes RSS)
 *
 * Used by {@see SimplePie_Item::get_enclosure()} and {@see SimplePie_Item::get_enclosures()}
 *
 * This class can be overloaded with {@see SimplePie::set_enclosure_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Enclosure
{
    /**
     * @var string
     * @see get_bitrate()
     */
    var $bitrate;
    /**
     * @var array
     * @see get_captions()
     */
    var $captions;
    /**
     * @var array
     * @see get_categories()
     */
    var $categories;
    /**
     * @var int
     * @see get_channels()
     */
    var $channels;
    /**
     * @var SimplePie_Copyright
     * @see get_copyright()
     */
    var $copyright;
    /**
     * @var array
     * @see get_credits()
     */
    var $credits;
    /**
     * @var string
     * @see get_description()
     */
    var $description;
    /**
     * @var int
     * @see get_duration()
     */
    var $duration;
    /**
     * @var string
     * @see get_expression()
     */
    var $expression;
    /**
     * @var string
     * @see get_framerate()
     */
    var $framerate;
    /**
     * @var string
     * @see get_handler()
     */
    var $handler;
    /**
     * @var array
     * @see get_hashes()
     */
    var $hashes;
    /**
     * @var string
     * @see get_height()
     */
    var $height;
    /**
     * @deprecated
     * @var null
     */
    var $javascript;
    /**
     * @var array
     * @see get_keywords()
     */
    var $keywords;
    /**
     * @var string
     * @see get_language()
     */
    var $lang;
    /**
     * @var string
     * @see get_length()
     */
    var $length;
    /**
     * @var string
     * @see get_link()
     */
    var $link;
    /**
     * @var string
     * @see get_medium()
     */
    var $medium;
    /**
     * @var string
     * @see get_player()
     */
    var $player;
    /**
     * @var array
     * @see get_ratings()
     */
    var $ratings;
    /**
     * @var array
     * @see get_restrictions()
     */
    var $restrictions;
    /**
     * @var string
     * @see get_sampling_rate()
     */
    var $samplingrate;
    /**
     * @var array
     * @see get_thumbnails()
     */
    var $thumbnails;
    /**
     * @var string
     * @see get_title()
     */
    var $title;
    /**
     * @var string
     * @see get_type()
     */
    var $type;
    /**
     * @var string
     * @see get_width()
     */
    var $width;
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     *
     * @uses idna_convert If available, this will convert an IDN
     */
    public function __construct($link = \null, $type = \null, $length = \null, $javascript = \null, $bitrate = \null, $captions = \null, $categories = \null, $channels = \null, $copyright = \null, $credits = \null, $description = \null, $duration = \null, $expression = \null, $framerate = \null, $hashes = \null, $height = \null, $keywords = \null, $lang = \null, $medium = \null, $player = \null, $ratings = \null, $restrictions = \null, $samplingrate = \null, $thumbnails = \null, $title = \null, $width = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the bitrate
     *
     * @return string|null
     */
    public function get_bitrate()
    {
    }
    /**
     * Get a single caption
     *
     * @param int $key
     * @return SimplePie_Caption|null
     */
    public function get_caption($key = 0)
    {
    }
    /**
     * Get all captions
     *
     * @return array|null Array of {@see SimplePie_Caption} objects
     */
    public function get_captions()
    {
    }
    /**
     * Get a single category
     *
     * @param int $key
     * @return SimplePie_Category|null
     */
    public function get_category($key = 0)
    {
    }
    /**
     * Get all categories
     *
     * @return array|null Array of {@see SimplePie_Category} objects
     */
    public function get_categories()
    {
    }
    /**
     * Get the number of audio channels
     *
     * @return int|null
     */
    public function get_channels()
    {
    }
    /**
     * Get the copyright information
     *
     * @return SimplePie_Copyright|null
     */
    public function get_copyright()
    {
    }
    /**
     * Get a single credit
     *
     * @param int $key
     * @return SimplePie_Credit|null
     */
    public function get_credit($key = 0)
    {
    }
    /**
     * Get all credits
     *
     * @return array|null Array of {@see SimplePie_Credit} objects
     */
    public function get_credits()
    {
    }
    /**
     * Get the description of the enclosure
     *
     * @return string|null
     */
    public function get_description()
    {
    }
    /**
     * Get the duration of the enclosure
     *
     * @param string $convert Convert seconds into hh:mm:ss
     * @return string|int|null 'hh:mm:ss' string if `$convert` was specified, otherwise integer (or null if none found)
     */
    public function get_duration($convert = \false)
    {
    }
    /**
     * Get the expression
     *
     * @return string Probably one of 'sample', 'full', 'nonstop', 'clip'. Defaults to 'full'
     */
    public function get_expression()
    {
    }
    /**
     * Get the file extension
     *
     * @return string|null
     */
    public function get_extension()
    {
    }
    /**
     * Get the framerate (in frames-per-second)
     *
     * @return string|null
     */
    public function get_framerate()
    {
    }
    /**
     * Get the preferred handler
     *
     * @return string|null One of 'flash', 'fmedia', 'quicktime', 'wmedia', 'mp3'
     */
    public function get_handler()
    {
    }
    /**
     * Get a single hash
     *
     * @link http://www.rssboard.org/media-rss#media-hash
     * @param int $key
     * @return string|null Hash as per `media:hash`, prefixed with "$algo:"
     */
    public function get_hash($key = 0)
    {
    }
    /**
     * Get all credits
     *
     * @return array|null Array of strings, see {@see get_hash()}
     */
    public function get_hashes()
    {
    }
    /**
     * Get the height
     *
     * @return string|null
     */
    public function get_height()
    {
    }
    /**
     * Get the language
     *
     * @link http://tools.ietf.org/html/rfc3066
     * @return string|null Language code as per RFC 3066
     */
    public function get_language()
    {
    }
    /**
     * Get a single keyword
     *
     * @param int $key
     * @return string|null
     */
    public function get_keyword($key = 0)
    {
    }
    /**
     * Get all keywords
     *
     * @return array|null Array of strings
     */
    public function get_keywords()
    {
    }
    /**
     * Get length
     *
     * @return float Length in bytes
     */
    public function get_length()
    {
    }
    /**
     * Get the URL
     *
     * @return string|null
     */
    public function get_link()
    {
    }
    /**
     * Get the medium
     *
     * @link http://www.rssboard.org/media-rss#media-content
     * @return string|null Should be one of 'image', 'audio', 'video', 'document', 'executable'
     */
    public function get_medium()
    {
    }
    /**
     * Get the player URL
     *
     * Typically the same as {@see get_permalink()}
     * @return string|null Player URL
     */
    public function get_player()
    {
    }
    /**
     * Get a single rating
     *
     * @param int $key
     * @return SimplePie_Rating|null
     */
    public function get_rating($key = 0)
    {
    }
    /**
     * Get all ratings
     *
     * @return array|null Array of {@see SimplePie_Rating} objects
     */
    public function get_ratings()
    {
    }
    /**
     * Get a single restriction
     *
     * @param int $key
     * @return SimplePie_Restriction|null
     */
    public function get_restriction($key = 0)
    {
    }
    /**
     * Get all restrictions
     *
     * @return array|null Array of {@see SimplePie_Restriction} objects
     */
    public function get_restrictions()
    {
    }
    /**
     * Get the sampling rate (in kHz)
     *
     * @return string|null
     */
    public function get_sampling_rate()
    {
    }
    /**
     * Get the file size (in MiB)
     *
     * @return float|null File size in mebibytes (1048 bytes)
     */
    public function get_size()
    {
    }
    /**
     * Get a single thumbnail
     *
     * @param int $key
     * @return string|null Thumbnail URL
     */
    public function get_thumbnail($key = 0)
    {
    }
    /**
     * Get all thumbnails
     *
     * @return array|null Array of thumbnail URLs
     */
    public function get_thumbnails()
    {
    }
    /**
     * Get the title
     *
     * @return string|null
     */
    public function get_title()
    {
    }
    /**
     * Get mimetype of the enclosure
     *
     * @see get_real_type()
     * @return string|null MIME type
     */
    public function get_type()
    {
    }
    /**
     * Get the width
     *
     * @return string|null
     */
    public function get_width()
    {
    }
    /**
     * Embed the enclosure using `<embed>`
     *
     * @deprecated Use the second parameter to {@see embed} instead
     *
     * @param array|string $options See first paramter to {@see embed}
     * @return string HTML string to output
     */
    public function native_embed($options = '')
    {
    }
    /**
     * Embed the enclosure using Javascript
     *
     * `$options` is an array or comma-separated key:value string, with the
     * following properties:
     *
     * - `alt` (string): Alternate content for when an end-user does not have
     *    the appropriate handler installed or when a file type is
     *    unsupported. Can be any text or HTML. Defaults to blank.
     * - `altclass` (string): If a file type is unsupported, the end-user will
     *    see the alt text (above) linked directly to the content. That link
     *    will have this value as its class name. Defaults to blank.
     * - `audio` (string): This is an image that should be used as a
     *    placeholder for audio files before they're loaded (QuickTime-only).
     *    Can be any relative or absolute URL. Defaults to blank.
     * - `bgcolor` (string): The background color for the media, if not
     *    already transparent. Defaults to `#ffffff`.
     * - `height` (integer): The height of the embedded media. Accepts any
     *    numeric pixel value (such as `360`) or `auto`. Defaults to `auto`,
     *    and it is recommended that you use this default.
     * - `loop` (boolean): Do you want the media to loop when its done?
     *    Defaults to `false`.
     * - `mediaplayer` (string): The location of the included
     *    `mediaplayer.swf` file. This allows for the playback of Flash Video
     *    (`.flv`) files, and is the default handler for non-Odeo MP3's.
     *    Defaults to blank.
     * - `video` (string): This is an image that should be used as a
     *    placeholder for video files before they're loaded (QuickTime-only).
     *    Can be any relative or absolute URL. Defaults to blank.
     * - `width` (integer): The width of the embedded media. Accepts any
     *    numeric pixel value (such as `480`) or `auto`. Defaults to `auto`,
     *    and it is recommended that you use this default.
     * - `widescreen` (boolean): Is the enclosure widescreen or standard?
     *    This applies only to video enclosures, and will automatically resize
     *    the content appropriately.  Defaults to `false`, implying 4:3 mode.
     *
     * Note: Non-widescreen (4:3) mode with `width` and `height` set to `auto`
     * will default to 480x360 video resolution.  Widescreen (16:9) mode with
     * `width` and `height` set to `auto` will default to 480x270 video resolution.
     *
     * @todo If the dimensions for media:content are defined, use them when width/height are set to 'auto'.
     * @param array|string $options Comma-separated key:value list, or array
     * @param bool $native Use `<embed>`
     * @return string HTML string to output
     */
    public function embed($options = '', $native = \false)
    {
    }
    /**
     * Get the real media type
     *
     * Often, feeds lie to us, necessitating a bit of deeper inspection. This
     * converts types to their canonical representations based on the file
     * extension
     *
     * @see get_type()
     * @param bool $find_handler Internal use only, use {@see get_handler()} instead
     * @return string MIME type
     */
    public function get_real_type($find_handler = \false)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.4-dev
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * General SimplePie exception class
 *
 * @package SimplePie
 */
class SimplePie_Exception extends \Exception
{
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Used for fetching remote files and reading local files
 *
 * Supports HTTP 1.0 via cURL or fsockopen, with spotty HTTP 1.1 support
 *
 * This class can be overloaded with {@see SimplePie::set_file_class()}
 *
 * @package SimplePie
 * @subpackage HTTP
 * @todo Move to properly supporting RFC2616 (HTTP/1.1)
 */
class SimplePie_File
{
    var $url;
    var $useragent;
    var $success = \true;
    var $headers = array();
    var $body;
    var $status_code;
    var $redirects = 0;
    var $error;
    var $method = \SIMPLEPIE_FILE_SOURCE_NONE;
    public function __construct($url, $timeout = 10, $redirects = 5, $headers = \null, $useragent = \null, $force_fsockopen = \false)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * HTTP Response Parser
 *
 * @package SimplePie
 * @subpackage HTTP
 */
class SimplePie_HTTP_Parser
{
    /**
     * HTTP Version
     *
     * @var float
     */
    public $http_version = 0.0;
    /**
     * Status code
     *
     * @var int
     */
    public $status_code = 0;
    /**
     * Reason phrase
     *
     * @var string
     */
    public $reason = '';
    /**
     * Key/value pairs of the headers
     *
     * @var array
     */
    public $headers = array();
    /**
     * Body of the response
     *
     * @var string
     */
    public $body = '';
    /**
     * Current state of the state machine
     *
     * @var string
     */
    protected $state = 'http_version';
    /**
     * Input data
     *
     * @var string
     */
    protected $data = '';
    /**
     * Input data length (to avoid calling strlen() everytime this is needed)
     *
     * @var int
     */
    protected $data_length = 0;
    /**
     * Current position of the pointer
     *
     * @var int
     */
    protected $position = 0;
    /**
     * Name of the hedaer currently being parsed
     *
     * @var string
     */
    protected $name = '';
    /**
     * Value of the hedaer currently being parsed
     *
     * @var string
     */
    protected $value = '';
    /**
     * Create an instance of the class with the input data
     *
     * @param string $data Input data
     */
    public function __construct($data)
    {
    }
    /**
     * Parse the input data
     *
     * @return bool true on success, false on failure
     */
    public function parse()
    {
    }
    /**
     * Check whether there is data beyond the pointer
     *
     * @return bool true if there is further data, false if not
     */
    protected function has_data()
    {
    }
    /**
     * See if the next character is LWS
     *
     * @return bool true if the next character is LWS, false if not
     */
    protected function is_linear_whitespace()
    {
    }
    /**
     * Parse the HTTP version
     */
    protected function http_version()
    {
    }
    /**
     * Parse the status code
     */
    protected function status()
    {
    }
    /**
     * Parse the reason phrase
     */
    protected function reason()
    {
    }
    /**
     * Deal with a new line, shifting data around as needed
     */
    protected function new_line()
    {
    }
    /**
     * Parse a header name
     */
    protected function name()
    {
    }
    /**
     * Parse LWS, replacing consecutive LWS characters with a single space
     */
    protected function linear_whitespace()
    {
    }
    /**
     * See what state to move to while within non-quoted header values
     */
    protected function value()
    {
    }
    /**
     * Parse a header value while outside quotes
     */
    protected function value_char()
    {
    }
    /**
     * See what state to move to while within quoted header values
     */
    protected function quote()
    {
    }
    /**
     * Parse a header value while within quotes
     */
    protected function quote_char()
    {
    }
    /**
     * Parse an escaped character within quotes
     */
    protected function quote_escaped()
    {
    }
    /**
     * Parse the body
     */
    protected function body()
    {
    }
    /**
     * Parsed a "Transfer-Encoding: chunked" body
     */
    protected function chunked()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * IRI parser/serialiser/normaliser
 *
 * @package SimplePie
 * @subpackage HTTP
 * @author Geoffrey Sneddon
 * @author Steve Minutillo
 * @author Ryan McCue
 * @copyright 2007-2012 Geoffrey Sneddon, Steve Minutillo, Ryan McCue
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
class SimplePie_IRI
{
    /**
     * Scheme
     *
     * @var string
     */
    protected $scheme = \null;
    /**
     * User Information
     *
     * @var string
     */
    protected $iuserinfo = \null;
    /**
     * ihost
     *
     * @var string
     */
    protected $ihost = \null;
    /**
     * Port
     *
     * @var string
     */
    protected $port = \null;
    /**
     * ipath
     *
     * @var string
     */
    protected $ipath = '';
    /**
     * iquery
     *
     * @var string
     */
    protected $iquery = \null;
    /**
     * ifragment
     *
     * @var string
     */
    protected $ifragment = \null;
    /**
     * Normalization database
     *
     * Each key is the scheme, each value is an array with each key as the IRI
     * part and value as the default value for that part.
     */
    protected $normalization = array('acap' => array('port' => 674), 'dict' => array('port' => 2628), 'file' => array('ihost' => 'localhost'), 'http' => array('port' => 80, 'ipath' => '/'), 'https' => array('port' => 443, 'ipath' => '/'));
    /**
     * Return the entire IRI when you try and read the object as a string
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Overload __set() to provide access via properties
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
    }
    /**
     * Overload __get() to provide access via properties
     *
     * @param string $name Property name
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Overload __isset() to provide access via properties
     *
     * @param string $name Property name
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Overload __unset() to provide access via properties
     *
     * @param string $name Property name
     */
    public function __unset($name)
    {
    }
    /**
     * Create a new IRI object, from a specified string
     *
     * @param string $iri
     */
    public function __construct($iri = \null)
    {
    }
    /**
     * Create a new IRI object by resolving a relative IRI
     *
     * Returns false if $base is not absolute, otherwise an IRI.
     *
     * @param IRI|string $base (Absolute) Base IRI
     * @param IRI|string $relative Relative IRI
     * @return IRI|false
     */
    public static function absolutize($base, $relative)
    {
    }
    /**
     * Parse an IRI into scheme/authority/path/query/fragment segments
     *
     * @param string $iri
     * @return array
     */
    protected function parse_iri($iri)
    {
    }
    /**
     * Remove dot segments from a path
     *
     * @param string $input
     * @return string
     */
    protected function remove_dot_segments($input)
    {
    }
    /**
     * Replace invalid character with percent encoding
     *
     * @param string $string Input string
     * @param string $extra_chars Valid characters not in iunreserved or
     *                            iprivate (this is ASCII-only)
     * @param bool $iprivate Allow iprivate
     * @return string
     */
    protected function replace_invalid_with_pct_encoding($string, $extra_chars, $iprivate = \false)
    {
    }
    /**
     * Callback function for preg_replace_callback.
     *
     * Removes sequences of percent encoded bytes that represent UTF-8
     * encoded characters in iunreserved
     *
     * @param array $match PCRE match
     * @return string Replacement
     */
    protected function remove_iunreserved_percent_encoded($match)
    {
    }
    protected function scheme_normalization()
    {
    }
    /**
     * Check if the object represents a valid IRI. This needs to be done on each
     * call as some things change depending on another part of the IRI.
     *
     * @return bool
     */
    public function is_valid()
    {
    }
    /**
     * Set the entire IRI. Returns true on success, false on failure (if there
     * are any invalid characters).
     *
     * @param string $iri
     * @return bool
     */
    public function set_iri($iri)
    {
    }
    /**
     * Set the scheme. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $scheme
     * @return bool
     */
    public function set_scheme($scheme)
    {
    }
    /**
     * Set the authority. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $authority
     * @return bool
     */
    public function set_authority($authority)
    {
    }
    /**
     * Set the iuserinfo.
     *
     * @param string $iuserinfo
     * @return bool
     */
    public function set_userinfo($iuserinfo)
    {
    }
    /**
     * Set the ihost. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $ihost
     * @return bool
     */
    public function set_host($ihost)
    {
    }
    /**
     * Set the port. Returns true on success, false on failure (if there are
     * any invalid characters).
     *
     * @param string $port
     * @return bool
     */
    public function set_port($port)
    {
    }
    /**
     * Set the ipath.
     *
     * @param string $ipath
     * @return bool
     */
    public function set_path($ipath)
    {
    }
    /**
     * Set the iquery.
     *
     * @param string $iquery
     * @return bool
     */
    public function set_query($iquery)
    {
    }
    /**
     * Set the ifragment.
     *
     * @param string $ifragment
     * @return bool
     */
    public function set_fragment($ifragment)
    {
    }
    /**
     * Convert an IRI to a URI (or parts thereof)
     *
     * @return string
     */
    public function to_uri($string)
    {
    }
    /**
     * Get the complete IRI
     *
     * @return string
     */
    public function get_iri()
    {
    }
    /**
     * Get the complete URI
     *
     * @return string
     */
    public function get_uri()
    {
    }
    /**
     * Get the complete iauthority
     *
     * @return string
     */
    protected function get_iauthority()
    {
    }
    /**
     * Get the complete authority
     *
     * @return string
     */
    protected function get_authority()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Manages all item-related data
 *
 * Used by {@see SimplePie::get_item()} and {@see SimplePie::get_items()}
 *
 * This class can be overloaded with {@see SimplePie::set_item_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Item
{
    /**
     * Parent feed
     *
     * @access private
     * @var SimplePie
     */
    var $feed;
    /**
     * Raw data
     *
     * @access private
     * @var array
     */
    var $data = array();
    /**
     * Registry object
     *
     * @see set_registry
     * @var SimplePie_Registry
     */
    protected $registry;
    /**
     * Create a new item object
     *
     * This is usually used by {@see SimplePie::get_items} and
     * {@see SimplePie::get_item}. Avoid creating this manually.
     *
     * @param SimplePie $feed Parent feed
     * @param array $data Raw data
     */
    public function __construct($feed, $data)
    {
    }
    /**
     * Set the registry handler
     *
     * This is usually used by {@see SimplePie_Registry::create}
     *
     * @since 1.3
     * @param SimplePie_Registry $registry
     */
    public function set_registry(\SimplePie_Registry $registry)
    {
    }
    /**
     * Get a string representation of the item
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Remove items that link back to this before destroying this object
     */
    public function __destruct()
    {
    }
    /**
     * Get data for an item-level element
     *
     * This method allows you to get access to ANY element/attribute that is a
     * sub-element of the item/entry tag.
     *
     * See {@see SimplePie::get_feed_tags()} for a description of the return value
     *
     * @since 1.0
     * @see http://simplepie.org/wiki/faq/supported_xml_namespaces
     * @param string $namespace The URL of the XML namespace of the elements you're trying to access
     * @param string $tag Tag name
     * @return array
     */
    public function get_item_tags($namespace, $tag)
    {
    }
    /**
     * Get the base URL value from the parent feed
     *
     * Uses `<xml:base>`
     *
     * @param array $element
     * @return string
     */
    public function get_base($element = array())
    {
    }
    /**
     * Sanitize feed data
     *
     * @access private
     * @see SimplePie::sanitize()
     * @param string $data Data to sanitize
     * @param int $type One of the SIMPLEPIE_CONSTRUCT_* constants
     * @param string $base Base URL to resolve URLs against
     * @return string Sanitized data
     */
    public function sanitize($data, $type, $base = '')
    {
    }
    /**
     * Get the parent feed
     *
     * Note: this may not work as you think for multifeeds!
     *
     * @link http://simplepie.org/faq/typical_multifeed_gotchas#missing_data_from_feed
     * @since 1.0
     * @return SimplePie
     */
    public function get_feed()
    {
    }
    /**
     * Get the unique identifier for the item
     *
     * This is usually used when writing code to check for new items in a feed.
     *
     * Uses `<atom:id>`, `<guid>`, `<dc:identifier>` or the `about` attribute
     * for RDF. If none of these are supplied (or `$hash` is true), creates an
     * MD5 hash based on the permalink and title. If either of those are not
     * supplied, creates a hash based on the full feed data.
     *
     * @since Beta 2
     * @param boolean $hash Should we force using a hash instead of the supplied ID?
     * @return string
     */
    public function get_id($hash = \false)
    {
    }
    /**
     * Get the title of the item
     *
     * Uses `<atom:title>`, `<title>` or `<dc:title>`
     *
     * @since Beta 2 (previously called `get_item_title` since 0.8)
     * @return string|null
     */
    public function get_title()
    {
    }
    /**
     * Get the content for the item
     *
     * Prefers summaries over full content , but will return full content if a
     * summary does not exist.
     *
     * To prefer full content instead, use {@see get_content}
     *
     * Uses `<atom:summary>`, `<description>`, `<dc:description>` or
     * `<itunes:subtitle>`
     *
     * @since 0.8
     * @param boolean $description_only Should we avoid falling back to the content?
     * @return string|null
     */
    public function get_description($description_only = \false)
    {
    }
    /**
     * Get the content for the item
     *
     * Prefers full content over summaries, but will return a summary if full
     * content does not exist.
     *
     * To prefer summaries instead, use {@see get_description}
     *
     * Uses `<atom:content>` or `<content:encoded>` (RSS 1.0 Content Module)
     *
     * @since 1.0
     * @param boolean $content_only Should we avoid falling back to the description?
     * @return string|null
     */
    public function get_content($content_only = \false)
    {
    }
    /**
     * Get a category for the item
     *
     * @since Beta 3 (previously called `get_categories()` since Beta 2)
     * @param int $key The category that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Category|null
     */
    public function get_category($key = 0)
    {
    }
    /**
     * Get all categories for the item
     *
     * Uses `<atom:category>`, `<category>` or `<dc:subject>`
     *
     * @since Beta 3
     * @return array|null List of {@see SimplePie_Category} objects
     */
    public function get_categories()
    {
    }
    /**
     * Get an author for the item
     *
     * @since Beta 2
     * @param int $key The author that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Author|null
     */
    public function get_author($key = 0)
    {
    }
    /**
     * Get a contributor for the item
     *
     * @since 1.1
     * @param int $key The contrbutor that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Author|null
     */
    public function get_contributor($key = 0)
    {
    }
    /**
     * Get all contributors for the item
     *
     * Uses `<atom:contributor>`
     *
     * @since 1.1
     * @return array|null List of {@see SimplePie_Author} objects
     */
    public function get_contributors()
    {
    }
    /**
     * Get all authors for the item
     *
     * Uses `<atom:author>`, `<author>`, `<dc:creator>` or `<itunes:author>`
     *
     * @since Beta 2
     * @return array|null List of {@see SimplePie_Author} objects
     */
    public function get_authors()
    {
    }
    /**
     * Get the copyright info for the item
     *
     * Uses `<atom:rights>` or `<dc:rights>`
     *
     * @since 1.1
     * @return string
     */
    public function get_copyright()
    {
    }
    /**
     * Get the posting date/time for the item
     *
     * Uses `<atom:published>`, `<atom:updated>`, `<atom:issued>`,
     * `<atom:modified>`, `<pubDate>` or `<dc:date>`
     *
     * Note: obeys PHP's timezone setting. To get a UTC date/time, use
     * {@see get_gmdate}
     *
     * @since Beta 2 (previously called `get_item_date` since 0.8)
     *
     * @param string $date_format Supports any PHP date format from {@see http://php.net/date} (empty for the raw data)
     * @return int|string|null
     */
    public function get_date($date_format = 'j F Y, g:i a')
    {
    }
    /**
     * Get the update date/time for the item
     *
     * Uses `<atom:updated>`
     *
     * Note: obeys PHP's timezone setting. To get a UTC date/time, use
     * {@see get_gmdate}
     *
     * @param string $date_format Supports any PHP date format from {@see http://php.net/date} (empty for the raw data)
     * @return int|string|null
     */
    public function get_updated_date($date_format = 'j F Y, g:i a')
    {
    }
    /**
     * Get the localized posting date/time for the item
     *
     * Returns the date formatted in the localized language. To display in
     * languages other than the server's default, you need to change the locale
     * with {@link http://php.net/setlocale setlocale()}. The available
     * localizations depend on which ones are installed on your web server.
     *
     * @since 1.0
     *
     * @param string $date_format Supports any PHP date format from {@see http://php.net/strftime} (empty for the raw data)
     * @return int|string|null
     */
    public function get_local_date($date_format = '%c')
    {
    }
    /**
     * Get the posting date/time for the item (UTC time)
     *
     * @see get_date
     * @param string $date_format Supports any PHP date format from {@see http://php.net/date}
     * @return int|string|null
     */
    public function get_gmdate($date_format = 'j F Y, g:i a')
    {
    }
    /**
     * Get the update date/time for the item (UTC time)
     *
     * @see get_updated_date
     * @param string $date_format Supports any PHP date format from {@see http://php.net/date}
     * @return int|string|null
     */
    public function get_updated_gmdate($date_format = 'j F Y, g:i a')
    {
    }
    /**
     * Get the permalink for the item
     *
     * Returns the first link available with a relationship of "alternate".
     * Identical to {@see get_link()} with key 0
     *
     * @see get_link
     * @since 0.8
     * @return string|null Permalink URL
     */
    public function get_permalink()
    {
    }
    /**
     * Get a single link for the item
     *
     * @since Beta 3
     * @param int $key The link that you want to return.  Remember that arrays begin with 0, not 1
     * @param string $rel The relationship of the link to return
     * @return string|null Link URL
     */
    public function get_link($key = 0, $rel = 'alternate')
    {
    }
    /**
     * Get all links for the item
     *
     * Uses `<atom:link>`, `<link>` or `<guid>`
     *
     * @since Beta 2
     * @param string $rel The relationship of links to return
     * @return array|null Links found for the item (strings)
     */
    public function get_links($rel = 'alternate')
    {
    }
    /**
     * Get an enclosure from the item
     *
     * Supports the <enclosure> RSS tag, as well as Media RSS and iTunes RSS.
     *
     * @since Beta 2
     * @todo Add ability to prefer one type of content over another (in a media group).
     * @param int $key The enclosure that you want to return.  Remember that arrays begin with 0, not 1
     * @return SimplePie_Enclosure|null
     */
    public function get_enclosure($key = 0, $prefer = \null)
    {
    }
    /**
     * Get all available enclosures (podcasts, etc.)
     *
     * Supports the <enclosure> RSS tag, as well as Media RSS and iTunes RSS.
     *
     * At this point, we're pretty much assuming that all enclosures for an item
     * are the same content.  Anything else is too complicated to
     * properly support.
     *
     * @since Beta 2
     * @todo Add support for end-user defined sorting of enclosures by type/handler (so we can prefer the faster-loading FLV over MP4).
     * @todo If an element exists at a level, but it's value is empty, we should fall back to the value from the parent (if it exists).
     * @return array|null List of SimplePie_Enclosure items
     */
    public function get_enclosures()
    {
    }
    /**
     * Get the latitude coordinates for the item
     *
     * Compatible with the W3C WGS84 Basic Geo and GeoRSS specifications
     *
     * Uses `<geo:lat>` or `<georss:point>`
     *
     * @since 1.0
     * @link http://www.w3.org/2003/01/geo/ W3C WGS84 Basic Geo
     * @link http://www.georss.org/ GeoRSS
     * @return string|null
     */
    public function get_latitude()
    {
    }
    /**
     * Get the longitude coordinates for the item
     *
     * Compatible with the W3C WGS84 Basic Geo and GeoRSS specifications
     *
     * Uses `<geo:long>`, `<geo:lon>` or `<georss:point>`
     *
     * @since 1.0
     * @link http://www.w3.org/2003/01/geo/ W3C WGS84 Basic Geo
     * @link http://www.georss.org/ GeoRSS
     * @return string|null
     */
    public function get_longitude()
    {
    }
    /**
     * Get the `<atom:source>` for the item
     *
     * @since 1.1
     * @return SimplePie_Source|null
     */
    public function get_source()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Used for feed auto-discovery
 *
 *
 * This class can be overloaded with {@see SimplePie::set_locator_class()}
 *
 * @package SimplePie
 */
class SimplePie_Locator
{
    var $useragent;
    var $timeout;
    var $file;
    var $local = array();
    var $elsewhere = array();
    var $cached_entities = array();
    var $http_base;
    var $base;
    var $base_location = 0;
    var $checked_feeds = 0;
    var $max_checked_feeds = 10;
    protected $registry;
    public function __construct(\SimplePie_File $file, $timeout = 10, $useragent = \null, $max_checked_feeds = 10)
    {
    }
    public function set_registry(\SimplePie_Registry $registry)
    {
    }
    public function find($type = \SIMPLEPIE_LOCATOR_ALL, &$working)
    {
    }
    public function is_feed($file)
    {
    }
    public function get_base()
    {
    }
    public function autodiscovery()
    {
    }
    protected function search_elements_by_tag($name, &$done, $feeds)
    {
    }
    public function get_links()
    {
    }
    public function extension(&$array)
    {
    }
    public function body(&$array)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Miscellanous utilities
 *
 * @package SimplePie
 */
class SimplePie_Misc
{
    public static function time_hms($seconds)
    {
    }
    public static function absolutize_url($relative, $base)
    {
    }
    /**
     * Get a HTML/XML element from a HTML string
     *
     * @deprecated Use DOMDocument instead (parsing HTML with regex is bad!)
     * @param string $realname Element name (including namespace prefix if applicable)
     * @param string $string HTML document
     * @return array
     */
    public static function get_element($realname, $string)
    {
    }
    public static function element_implode($element)
    {
    }
    public static function error($message, $level, $file, $line)
    {
    }
    public static function fix_protocol($url, $http = 1)
    {
    }
    public static function parse_url($url)
    {
    }
    public static function compress_parse_url($scheme = '', $authority = '', $path = '', $query = '', $fragment = '')
    {
    }
    public static function normalize_url($url)
    {
    }
    public static function percent_encoding_normalization($match)
    {
    }
    /**
     * Converts a Windows-1252 encoded string to a UTF-8 encoded string
     *
     * @static
     * @param string $string Windows-1252 encoded string
     * @return string UTF-8 encoded string
     */
    public static function windows_1252_to_utf8($string)
    {
    }
    /**
     * Change a string from one encoding to another
     *
     * @param string $data Raw data in $input encoding
     * @param string $input Encoding of $data
     * @param string $output Encoding you want
     * @return string|boolean False if we can't convert it
     */
    public static function change_encoding($data, $input, $output)
    {
    }
    protected static function change_encoding_mbstring($data, $input, $output)
    {
    }
    protected static function change_encoding_iconv($data, $input, $output)
    {
    }
    /**
     * Normalize an encoding name
     *
     * This is automatically generated by create.php
     *
     * To generate it, run `php create.php` on the command line, and copy the
     * output to replace this function.
     *
     * @param string $charset Character set to standardise
     * @return string Standardised name
     */
    public static function encoding($charset)
    {
    }
    public static function get_curl_version()
    {
    }
    /**
     * Strip HTML comments
     *
     * @param string $data Data to strip comments from
     * @return string Comment stripped string
     */
    public static function strip_comments($data)
    {
    }
    public static function parse_date($dt)
    {
    }
    /**
     * Decode HTML entities
     *
     * @deprecated Use DOMDocument instead
     * @param string $data Input data
     * @return string Output data
     */
    public static function entities_decode($data)
    {
    }
    /**
     * Remove RFC822 comments
     *
     * @param string $data Data to strip comments from
     * @return string Comment stripped string
     */
    public static function uncomment_rfc822($string)
    {
    }
    public static function parse_mime($mime)
    {
    }
    public static function atom_03_construct_type($attribs)
    {
    }
    public static function atom_10_construct_type($attribs)
    {
    }
    public static function atom_10_content_construct_type($attribs)
    {
    }
    public static function is_isegment_nz_nc($string)
    {
    }
    public static function space_seperated_tokens($string)
    {
    }
    /**
     * Converts a unicode codepoint to a UTF-8 character
     *
     * @static
     * @param int $codepoint Unicode codepoint
     * @return string UTF-8 character
     */
    public static function codepoint_to_utf8($codepoint)
    {
    }
    /**
     * Similar to parse_str()
     *
     * Returns an associative array of name/value pairs, where the value is an
     * array of values that have used the same name
     *
     * @static
     * @param string $str The input string.
     * @return array
     */
    public static function parse_str($str)
    {
    }
    /**
     * Detect XML encoding, as per XML 1.0 Appendix F.1
     *
     * @todo Add support for EBCDIC
     * @param string $data XML data
     * @param SimplePie_Registry $registry Class registry
     * @return array Possible encodings
     */
    public static function xml_encoding($data, $registry)
    {
    }
    public static function output_javascript()
    {
    }
    /**
     * Get the SimplePie build timestamp
     *
     * Uses the git index if it exists, otherwise uses the modification time
     * of the newest file.
     */
    public static function get_build()
    {
    }
    /**
     * Format debugging information
     */
    public static function debug(&$sp)
    {
    }
    public static function silence_errors($num, $str)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Class to validate and to work with IPv6 addresses.
 *
 * @package SimplePie
 * @subpackage HTTP
 * @copyright 2003-2005 The PHP Group
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @link http://pear.php.net/package/Net_IPv6
 * @author Alexander Merz <alexander.merz@web.de>
 * @author elfrink at introweb dot nl
 * @author Josh Peck <jmp at joshpeck dot org>
 * @author Geoffrey Sneddon <geoffers@gmail.com>
 */
class SimplePie_Net_IPv6
{
    /**
     * Uncompresses an IPv6 address
     *
     * RFC 4291 allows you to compress concecutive zero pieces in an address to
     * '::'. This method expects a valid IPv6 address and expands the '::' to
     * the required number of zero pieces.
     *
     * Example:  FF01::101   ->  FF01:0:0:0:0:0:0:101
     *           ::1         ->  0:0:0:0:0:0:0:1
     *
     * @author Alexander Merz <alexander.merz@web.de>
     * @author elfrink at introweb dot nl
     * @author Josh Peck <jmp at joshpeck dot org>
     * @copyright 2003-2005 The PHP Group
     * @license http://www.opensource.org/licenses/bsd-license.php
     * @param string $ip An IPv6 address
     * @return string The uncompressed IPv6 address
     */
    public static function uncompress($ip)
    {
    }
    /**
     * Compresses an IPv6 address
     *
     * RFC 4291 allows you to compress concecutive zero pieces in an address to
     * '::'. This method expects a valid IPv6 address and compresses consecutive
     * zero pieces to '::'.
     *
     * Example:  FF01:0:0:0:0:0:0:101   ->  FF01::101
     *           0:0:0:0:0:0:0:1        ->  ::1
     *
     * @see uncompress()
     * @param string $ip An IPv6 address
     * @return string The compressed IPv6 address
     */
    public static function compress($ip)
    {
    }
    /**
     * Splits an IPv6 address into the IPv6 and IPv4 representation parts
     *
     * RFC 4291 allows you to represent the last two parts of an IPv6 address
     * using the standard IPv4 representation
     *
     * Example:  0:0:0:0:0:0:13.1.68.3
     *           0:0:0:0:0:FFFF:129.144.52.38
     *
     * @param string $ip An IPv6 address
     * @return array [0] contains the IPv6 represented part, and [1] the IPv4 represented part
     */
    private static function split_v6_v4($ip)
    {
    }
    /**
     * Checks an IPv6 address
     *
     * Checks if the given IP is a valid IPv6 address
     *
     * @param string $ip An IPv6 address
     * @return bool true if $ip is a valid IPv6 address
     */
    public static function check_ipv6($ip)
    {
    }
    /**
     * Checks if the given IP is a valid IPv6 address
     *
     * @codeCoverageIgnore
     * @deprecated Use {@see SimplePie_Net_IPv6::check_ipv6()} instead
     * @see check_ipv6
     * @param string $ip An IPv6 address
     * @return bool true if $ip is a valid IPv6 address
     */
    public static function checkIPv6($ip)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Date Parser
 *
 * @package SimplePie
 * @subpackage Parsing
 */
class SimplePie_Parse_Date
{
    /**
     * Input data
     *
     * @access protected
     * @var string
     */
    var $date;
    /**
     * List of days, calendar day name => ordinal day number in the week
     *
     * @access protected
     * @var array
     */
    var $day = array(
        // English
        'mon' => 1,
        'monday' => 1,
        'tue' => 2,
        'tuesday' => 2,
        'wed' => 3,
        'wednesday' => 3,
        'thu' => 4,
        'thursday' => 4,
        'fri' => 5,
        'friday' => 5,
        'sat' => 6,
        'saturday' => 6,
        'sun' => 7,
        'sunday' => 7,
        // Dutch
        'maandag' => 1,
        'dinsdag' => 2,
        'woensdag' => 3,
        'donderdag' => 4,
        'vrijdag' => 5,
        'zaterdag' => 6,
        'zondag' => 7,
        // French
        'lundi' => 1,
        'mardi' => 2,
        'mercredi' => 3,
        'jeudi' => 4,
        'vendredi' => 5,
        'samedi' => 6,
        'dimanche' => 7,
        // German
        'montag' => 1,
        'dienstag' => 2,
        'mittwoch' => 3,
        'donnerstag' => 4,
        'freitag' => 5,
        'samstag' => 6,
        'sonnabend' => 6,
        'sonntag' => 7,
        // Italian
        'lunedì' => 1,
        'martedì' => 2,
        'mercoledì' => 3,
        'giovedì' => 4,
        'venerdì' => 5,
        'sabato' => 6,
        'domenica' => 7,
        // Spanish
        'lunes' => 1,
        'martes' => 2,
        'miércoles' => 3,
        'jueves' => 4,
        'viernes' => 5,
        'sábado' => 6,
        'domingo' => 7,
        // Finnish
        'maanantai' => 1,
        'tiistai' => 2,
        'keskiviikko' => 3,
        'torstai' => 4,
        'perjantai' => 5,
        'lauantai' => 6,
        'sunnuntai' => 7,
        // Hungarian
        'hétfő' => 1,
        'kedd' => 2,
        'szerda' => 3,
        'csütörtok' => 4,
        'péntek' => 5,
        'szombat' => 6,
        'vasárnap' => 7,
        // Greek
        'Δευ' => 1,
        'Τρι' => 2,
        'Τετ' => 3,
        'Πεμ' => 4,
        'Παρ' => 5,
        'Σαβ' => 6,
        'Κυρ' => 7,
    );
    /**
     * List of months, calendar month name => calendar month number
     *
     * @access protected
     * @var array
     */
    var $month = array(
        // English
        'jan' => 1,
        'january' => 1,
        'feb' => 2,
        'february' => 2,
        'mar' => 3,
        'march' => 3,
        'apr' => 4,
        'april' => 4,
        'may' => 5,
        // No long form of May
        'jun' => 6,
        'june' => 6,
        'jul' => 7,
        'july' => 7,
        'aug' => 8,
        'august' => 8,
        'sep' => 9,
        'september' => 8,
        'oct' => 10,
        'october' => 10,
        'nov' => 11,
        'november' => 11,
        'dec' => 12,
        'december' => 12,
        // Dutch
        'januari' => 1,
        'februari' => 2,
        'maart' => 3,
        'april' => 4,
        'mei' => 5,
        'juni' => 6,
        'juli' => 7,
        'augustus' => 8,
        'september' => 9,
        'oktober' => 10,
        'november' => 11,
        'december' => 12,
        // French
        'janvier' => 1,
        'février' => 2,
        'mars' => 3,
        'avril' => 4,
        'mai' => 5,
        'juin' => 6,
        'juillet' => 7,
        'août' => 8,
        'septembre' => 9,
        'octobre' => 10,
        'novembre' => 11,
        'décembre' => 12,
        // German
        'januar' => 1,
        'februar' => 2,
        'märz' => 3,
        'april' => 4,
        'mai' => 5,
        'juni' => 6,
        'juli' => 7,
        'august' => 8,
        'september' => 9,
        'oktober' => 10,
        'november' => 11,
        'dezember' => 12,
        // Italian
        'gennaio' => 1,
        'febbraio' => 2,
        'marzo' => 3,
        'aprile' => 4,
        'maggio' => 5,
        'giugno' => 6,
        'luglio' => 7,
        'agosto' => 8,
        'settembre' => 9,
        'ottobre' => 10,
        'novembre' => 11,
        'dicembre' => 12,
        // Spanish
        'enero' => 1,
        'febrero' => 2,
        'marzo' => 3,
        'abril' => 4,
        'mayo' => 5,
        'junio' => 6,
        'julio' => 7,
        'agosto' => 8,
        'septiembre' => 9,
        'setiembre' => 9,
        'octubre' => 10,
        'noviembre' => 11,
        'diciembre' => 12,
        // Finnish
        'tammikuu' => 1,
        'helmikuu' => 2,
        'maaliskuu' => 3,
        'huhtikuu' => 4,
        'toukokuu' => 5,
        'kesäkuu' => 6,
        'heinäkuu' => 7,
        'elokuu' => 8,
        'suuskuu' => 9,
        'lokakuu' => 10,
        'marras' => 11,
        'joulukuu' => 12,
        // Hungarian
        'január' => 1,
        'február' => 2,
        'március' => 3,
        'április' => 4,
        'május' => 5,
        'június' => 6,
        'július' => 7,
        'augusztus' => 8,
        'szeptember' => 9,
        'október' => 10,
        'november' => 11,
        'december' => 12,
        // Greek
        'Ιαν' => 1,
        'Φεβ' => 2,
        'Μάώ' => 3,
        'Μαώ' => 3,
        'Απρ' => 4,
        'Μάι' => 5,
        'Μαϊ' => 5,
        'Μαι' => 5,
        'Ιούν' => 6,
        'Ιον' => 6,
        'Ιούλ' => 7,
        'Ιολ' => 7,
        'Αύγ' => 8,
        'Αυγ' => 8,
        'Σεπ' => 9,
        'Οκτ' => 10,
        'Νοέ' => 11,
        'Δεκ' => 12,
    );
    /**
     * List of timezones, abbreviation => offset from UTC
     *
     * @access protected
     * @var array
     */
    var $timezone = array('ACDT' => 37800, 'ACIT' => 28800, 'ACST' => 34200, 'ACT' => -18000, 'ACWDT' => 35100, 'ACWST' => 31500, 'AEDT' => 39600, 'AEST' => 36000, 'AFT' => 16200, 'AKDT' => -28800, 'AKST' => -32400, 'AMDT' => 18000, 'AMT' => -14400, 'ANAST' => 46800, 'ANAT' => 43200, 'ART' => -10800, 'AZOST' => -3600, 'AZST' => 18000, 'AZT' => 14400, 'BIOT' => 21600, 'BIT' => -43200, 'BOT' => -14400, 'BRST' => -7200, 'BRT' => -10800, 'BST' => 3600, 'BTT' => 21600, 'CAST' => 18000, 'CAT' => 7200, 'CCT' => 23400, 'CDT' => -18000, 'CEDT' => 7200, 'CEST' => 7200, 'CET' => 3600, 'CGST' => -7200, 'CGT' => -10800, 'CHADT' => 49500, 'CHAST' => 45900, 'CIST' => -28800, 'CKT' => -36000, 'CLDT' => -10800, 'CLST' => -14400, 'COT' => -18000, 'CST' => -21600, 'CVT' => -3600, 'CXT' => 25200, 'DAVT' => 25200, 'DTAT' => 36000, 'EADT' => -18000, 'EAST' => -21600, 'EAT' => 10800, 'ECT' => -18000, 'EDT' => -14400, 'EEST' => 10800, 'EET' => 7200, 'EGT' => -3600, 'EKST' => 21600, 'EST' => -18000, 'FJT' => 43200, 'FKDT' => -10800, 'FKST' => -14400, 'FNT' => -7200, 'GALT' => -21600, 'GEDT' => 14400, 'GEST' => 10800, 'GFT' => -10800, 'GILT' => 43200, 'GIT' => -32400, 'GST' => 14400, 'GST' => -7200, 'GYT' => -14400, 'HAA' => -10800, 'HAC' => -18000, 'HADT' => -32400, 'HAE' => -14400, 'HAP' => -25200, 'HAR' => -21600, 'HAST' => -36000, 'HAT' => -9000, 'HAY' => -28800, 'HKST' => 28800, 'HMT' => 18000, 'HNA' => -14400, 'HNC' => -21600, 'HNE' => -18000, 'HNP' => -28800, 'HNR' => -25200, 'HNT' => -12600, 'HNY' => -32400, 'IRDT' => 16200, 'IRKST' => 32400, 'IRKT' => 28800, 'IRST' => 12600, 'JFDT' => -10800, 'JFST' => -14400, 'JST' => 32400, 'KGST' => 21600, 'KGT' => 18000, 'KOST' => 39600, 'KOVST' => 28800, 'KOVT' => 25200, 'KRAST' => 28800, 'KRAT' => 25200, 'KST' => 32400, 'LHDT' => 39600, 'LHST' => 37800, 'LINT' => 50400, 'LKT' => 21600, 'MAGST' => 43200, 'MAGT' => 39600, 'MAWT' => 21600, 'MDT' => -21600, 'MESZ' => 7200, 'MEZ' => 3600, 'MHT' => 43200, 'MIT' => -34200, 'MNST' => 32400, 'MSDT' => 14400, 'MSST' => 10800, 'MST' => -25200, 'MUT' => 14400, 'MVT' => 18000, 'MYT' => 28800, 'NCT' => 39600, 'NDT' => -9000, 'NFT' => 41400, 'NMIT' => 36000, 'NOVST' => 25200, 'NOVT' => 21600, 'NPT' => 20700, 'NRT' => 43200, 'NST' => -12600, 'NUT' => -39600, 'NZDT' => 46800, 'NZST' => 43200, 'OMSST' => 25200, 'OMST' => 21600, 'PDT' => -25200, 'PET' => -18000, 'PETST' => 46800, 'PETT' => 43200, 'PGT' => 36000, 'PHOT' => 46800, 'PHT' => 28800, 'PKT' => 18000, 'PMDT' => -7200, 'PMST' => -10800, 'PONT' => 39600, 'PST' => -28800, 'PWT' => 32400, 'PYST' => -10800, 'PYT' => -14400, 'RET' => 14400, 'ROTT' => -10800, 'SAMST' => 18000, 'SAMT' => 14400, 'SAST' => 7200, 'SBT' => 39600, 'SCDT' => 46800, 'SCST' => 43200, 'SCT' => 14400, 'SEST' => 3600, 'SGT' => 28800, 'SIT' => 28800, 'SRT' => -10800, 'SST' => -39600, 'SYST' => 10800, 'SYT' => 7200, 'TFT' => 18000, 'THAT' => -36000, 'TJT' => 18000, 'TKT' => -36000, 'TMT' => 18000, 'TOT' => 46800, 'TPT' => 32400, 'TRUT' => 36000, 'TVT' => 43200, 'TWT' => 28800, 'UYST' => -7200, 'UYT' => -10800, 'UZT' => 18000, 'VET' => -14400, 'VLAST' => 39600, 'VLAT' => 36000, 'VOST' => 21600, 'VUT' => 39600, 'WAST' => 7200, 'WAT' => 3600, 'WDT' => 32400, 'WEST' => 3600, 'WFT' => 43200, 'WIB' => 25200, 'WIT' => 32400, 'WITA' => 28800, 'WKST' => 18000, 'WST' => 28800, 'YAKST' => 36000, 'YAKT' => 32400, 'YAPT' => 36000, 'YEKST' => 21600, 'YEKT' => 18000);
    /**
     * Cached PCRE for SimplePie_Parse_Date::$day
     *
     * @access protected
     * @var string
     */
    var $day_pcre;
    /**
     * Cached PCRE for SimplePie_Parse_Date::$month
     *
     * @access protected
     * @var string
     */
    var $month_pcre;
    /**
     * Array of user-added callback methods
     *
     * @access private
     * @var array
     */
    var $built_in = array();
    /**
     * Array of user-added callback methods
     *
     * @access private
     * @var array
     */
    var $user = array();
    /**
     * Create new SimplePie_Parse_Date object, and set self::day_pcre,
     * self::month_pcre, and self::built_in
     *
     * @access private
     */
    public function __construct()
    {
    }
    /**
     * Get the object
     *
     * @access public
     */
    public static function get()
    {
    }
    /**
     * Parse a date
     *
     * @final
     * @access public
     * @param string $date Date to parse
     * @return int Timestamp corresponding to date string, or false on failure
     */
    public function parse($date)
    {
    }
    /**
     * Add a callback method to parse a date
     *
     * @final
     * @access public
     * @param callable $callback
     */
    public function add_callback($callback)
    {
    }
    /**
     * Parse a superset of W3C-DTF (allows hyphens and colons to be omitted, as
     * well as allowing any of upper or lower case "T", horizontal tabs, or
     * spaces to be used as the time seperator (including more than one))
     *
     * @access protected
     * @return int Timestamp
     */
    public function date_w3cdtf($date)
    {
    }
    /**
     * Remove RFC822 comments
     *
     * @access protected
     * @param string $data Data to strip comments from
     * @return string Comment stripped string
     */
    public function remove_rfc2822_comments($string)
    {
    }
    /**
     * Parse RFC2822's date format
     *
     * @access protected
     * @return int Timestamp
     */
    public function date_rfc2822($date)
    {
    }
    /**
     * Parse RFC850's date format
     *
     * @access protected
     * @return int Timestamp
     */
    public function date_rfc850($date)
    {
    }
    /**
     * Parse C99's asctime()'s date format
     *
     * @access protected
     * @return int Timestamp
     */
    public function date_asctime($date)
    {
    }
    /**
     * Parse dates using strtotime()
     *
     * @access protected
     * @return int Timestamp
     */
    public function date_strtotime($date)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Parses XML into something sane
 *
 *
 * This class can be overloaded with {@see SimplePie::set_parser_class()}
 *
 * @package SimplePie
 * @subpackage Parsing
 */
class SimplePie_Parser
{
    var $error_code;
    var $error_string;
    var $current_line;
    var $current_column;
    var $current_byte;
    var $separator = ' ';
    var $namespace = array('');
    var $element = array('');
    var $xml_base = array('');
    var $xml_base_explicit = array(\false);
    var $xml_lang = array('');
    var $data = array();
    var $datas = array(array());
    var $current_xhtml_construct = -1;
    var $encoding;
    protected $registry;
    public function set_registry(\SimplePie_Registry $registry)
    {
    }
    public function parse(&$data, $encoding)
    {
    }
    public function get_error_code()
    {
    }
    public function get_error_string()
    {
    }
    public function get_current_line()
    {
    }
    public function get_current_column()
    {
    }
    public function get_current_byte()
    {
    }
    public function get_data()
    {
    }
    public function tag_open($parser, $tag, $attributes)
    {
    }
    public function cdata($parser, $cdata)
    {
    }
    public function tag_close($parser, $tag)
    {
    }
    public function split_ns($string)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles `<media:rating>` or `<itunes:explicit>` tags as defined in Media RSS and iTunes RSS respectively
 *
 * Used by {@see SimplePie_Enclosure::get_rating()} and {@see SimplePie_Enclosure::get_ratings()}
 *
 * This class can be overloaded with {@see SimplePie::set_rating_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Rating
{
    /**
     * Rating scheme
     *
     * @var string
     * @see get_scheme()
     */
    var $scheme;
    /**
     * Rating value
     *
     * @var string
     * @see get_value()
     */
    var $value;
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     */
    public function __construct($scheme = \null, $value = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the organizational scheme for the rating
     *
     * @return string|null
     */
    public function get_scheme()
    {
    }
    /**
     * Get the value of the rating
     *
     * @return string|null
     */
    public function get_value()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles creating objects and calling methods
 *
 * Access this via {@see SimplePie::get_registry()}
 *
 * @package SimplePie
 */
class SimplePie_Registry
{
    /**
     * Default class mapping
     *
     * Overriding classes *must* subclass these.
     *
     * @var array
     */
    protected $default = array('Cache' => 'SimplePie_Cache', 'Locator' => 'SimplePie_Locator', 'Parser' => 'SimplePie_Parser', 'File' => 'SimplePie_File', 'Sanitize' => 'SimplePie_Sanitize', 'Item' => 'SimplePie_Item', 'Author' => 'SimplePie_Author', 'Category' => 'SimplePie_Category', 'Enclosure' => 'SimplePie_Enclosure', 'Caption' => 'SimplePie_Caption', 'Copyright' => 'SimplePie_Copyright', 'Credit' => 'SimplePie_Credit', 'Rating' => 'SimplePie_Rating', 'Restriction' => 'SimplePie_Restriction', 'Content_Type_Sniffer' => 'SimplePie_Content_Type_Sniffer', 'Source' => 'SimplePie_Source', 'Misc' => 'SimplePie_Misc', 'XML_Declaration_Parser' => 'SimplePie_XML_Declaration_Parser', 'Parse_Date' => 'SimplePie_Parse_Date');
    /**
     * Class mapping
     *
     * @see register()
     * @var array
     */
    protected $classes = array();
    /**
     * Legacy classes
     *
     * @see register()
     * @var array
     */
    protected $legacy = array();
    /**
     * Constructor
     *
     * No-op
     */
    public function __construct()
    {
    }
    /**
     * Register a class
     *
     * @param string $type See {@see $default} for names
     * @param string $class Class name, must subclass the corresponding default
     * @param bool $legacy Whether to enable legacy support for this class
     * @return bool Successfulness
     */
    public function register($type, $class, $legacy = \false)
    {
    }
    /**
     * Get the class registered for a type
     *
     * Where possible, use {@see create()} or {@see call()} instead
     *
     * @param string $type
     * @return string|null
     */
    public function get_class($type)
    {
    }
    /**
     * Create a new instance of a given type
     *
     * @param string $type
     * @param array $parameters Parameters to pass to the constructor
     * @return object Instance of class
     */
    public function &create($type, $parameters = array())
    {
    }
    /**
     * Call a static method for a type
     *
     * @param string $type
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function &call($type, $method, $parameters = array())
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles `<media:restriction>` as defined in Media RSS
 *
 * Used by {@see SimplePie_Enclosure::get_restriction()} and {@see SimplePie_Enclosure::get_restrictions()}
 *
 * This class can be overloaded with {@see SimplePie::set_restriction_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Restriction
{
    /**
     * Relationship ('allow'/'deny')
     *
     * @var string
     * @see get_relationship()
     */
    var $relationship;
    /**
     * Type of restriction
     *
     * @var string
     * @see get_type()
     */
    var $type;
    /**
     * Restricted values
     *
     * @var string
     * @see get_value()
     */
    var $value;
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     */
    public function __construct($relationship = \null, $type = \null, $value = \null)
    {
    }
    /**
     * String-ified version
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Get the relationship
     *
     * @return string|null Either 'allow' or 'deny'
     */
    public function get_relationship()
    {
    }
    /**
     * Get the type
     *
     * @return string|null
     */
    public function get_type()
    {
    }
    /**
     * Get the list of restricted things
     *
     * @return string|null
     */
    public function get_value()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Used for data cleanup and post-processing
 *
 *
 * This class can be overloaded with {@see SimplePie::set_sanitize_class()}
 *
 * @package SimplePie
 * @todo Move to using an actual HTML parser (this will allow tags to be properly stripped, and to switch between HTML and XHTML), this will also make it easier to shorten a string while preserving HTML tags
 */
class SimplePie_Sanitize
{
    // Private vars
    var $base;
    // Options
    var $remove_div = \true;
    var $image_handler = '';
    var $strip_htmltags = array('base', 'blink', 'body', 'doctype', 'embed', 'font', 'form', 'frame', 'frameset', 'html', 'iframe', 'input', 'marquee', 'meta', 'noscript', 'object', 'param', 'script', 'style');
    var $encode_instead_of_strip = \false;
    var $strip_attributes = array('bgsound', 'class', 'expr', 'id', 'style', 'onclick', 'onerror', 'onfinish', 'onmouseover', 'onmouseout', 'onfocus', 'onblur', 'lowsrc', 'dynsrc');
    var $strip_comments = \false;
    var $output_encoding = 'UTF-8';
    var $enable_cache = \true;
    var $cache_location = './cache';
    var $cache_name_function = 'md5';
    var $timeout = 10;
    var $useragent = '';
    var $force_fsockopen = \false;
    var $replace_url_attributes = \null;
    public function __construct()
    {
    }
    public function remove_div($enable = \true)
    {
    }
    public function set_image_handler($page = \false)
    {
    }
    public function set_registry(\SimplePie_Registry $registry)
    {
    }
    public function pass_cache_data($enable_cache = \true, $cache_location = './cache', $cache_name_function = 'md5', $cache_class = 'SimplePie_Cache')
    {
    }
    public function pass_file_data($file_class = 'SimplePie_File', $timeout = 10, $useragent = '', $force_fsockopen = \false)
    {
    }
    public function strip_htmltags($tags = array('base', 'blink', 'body', 'doctype', 'embed', 'font', 'form', 'frame', 'frameset', 'html', 'iframe', 'input', 'marquee', 'meta', 'noscript', 'object', 'param', 'script', 'style'))
    {
    }
    public function encode_instead_of_strip($encode = \false)
    {
    }
    public function strip_attributes($attribs = array('bgsound', 'class', 'expr', 'id', 'style', 'onclick', 'onerror', 'onfinish', 'onmouseover', 'onmouseout', 'onfocus', 'onblur', 'lowsrc', 'dynsrc'))
    {
    }
    public function strip_comments($strip = \false)
    {
    }
    public function set_output_encoding($encoding = 'UTF-8')
    {
    }
    /**
     * Set element/attribute key/value pairs of HTML attributes
     * containing URLs that need to be resolved relative to the feed
     *
     * Defaults to |a|@href, |area|@href, |blockquote|@cite, |del|@cite,
     * |form|@action, |img|@longdesc, |img|@src, |input|@src, |ins|@cite,
     * |q|@cite
     *
     * @since 1.0
     * @param array|null $element_attribute Element/attribute key/value pairs, null for default
     */
    public function set_url_replacements($element_attribute = \null)
    {
    }
    public function sanitize($data, $type, $base = '')
    {
    }
    protected function preprocess($html, $type)
    {
    }
    public function replace_urls($document, $tag, $attributes)
    {
    }
    public function do_strip_htmltags($match)
    {
    }
    protected function strip_tag($tag, $document, $type)
    {
    }
    protected function strip_attr($attrib, $document)
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles `<atom:source>`
 *
 * Used by {@see SimplePie_Item::get_source()}
 *
 * This class can be overloaded with {@see SimplePie::set_source_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Source
{
    var $item;
    var $data = array();
    protected $registry;
    public function __construct($item, $data)
    {
    }
    public function set_registry(\SimplePie_Registry $registry)
    {
    }
    public function __toString()
    {
    }
    public function get_source_tags($namespace, $tag)
    {
    }
    public function get_base($element = array())
    {
    }
    public function sanitize($data, $type, $base = '')
    {
    }
    public function get_item()
    {
    }
    public function get_title()
    {
    }
    public function get_category($key = 0)
    {
    }
    public function get_categories()
    {
    }
    public function get_author($key = 0)
    {
    }
    public function get_authors()
    {
    }
    public function get_contributor($key = 0)
    {
    }
    public function get_contributors()
    {
    }
    public function get_link($key = 0, $rel = 'alternate')
    {
    }
    /**
     * Added for parity between the parent-level and the item/entry-level.
     */
    public function get_permalink()
    {
    }
    public function get_links($rel = 'alternate')
    {
    }
    public function get_description()
    {
    }
    public function get_copyright()
    {
    }
    public function get_language()
    {
    }
    public function get_latitude()
    {
    }
    public function get_longitude()
    {
    }
    public function get_image_url()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Parses the XML Declaration
 *
 * @package SimplePie
 * @subpackage Parsing
 */
class SimplePie_XML_Declaration_Parser
{
    /**
     * XML Version
     *
     * @access public
     * @var string
     */
    var $version = '1.0';
    /**
     * Encoding
     *
     * @access public
     * @var string
     */
    var $encoding = 'UTF-8';
    /**
     * Standalone
     *
     * @access public
     * @var bool
     */
    var $standalone = \false;
    /**
     * Current state of the state machine
     *
     * @access private
     * @var string
     */
    var $state = 'before_version_name';
    /**
     * Input data
     *
     * @access private
     * @var string
     */
    var $data = '';
    /**
     * Input data length (to avoid calling strlen() everytime this is needed)
     *
     * @access private
     * @var int
     */
    var $data_length = 0;
    /**
     * Current position of the pointer
     *
     * @var int
     * @access private
     */
    var $position = 0;
    /**
     * Create an instance of the class with the input data
     *
     * @access public
     * @param string $data Input data
     */
    public function __construct($data)
    {
    }
    /**
     * Parse the input data
     *
     * @access public
     * @return bool true on success, false on failure
     */
    public function parse()
    {
    }
    /**
     * Check whether there is data beyond the pointer
     *
     * @access private
     * @return bool true if there is further data, false if not
     */
    public function has_data()
    {
    }
    /**
     * Advance past any whitespace
     *
     * @return int Number of whitespace characters passed
     */
    public function skip_whitespace()
    {
    }
    /**
     * Read value
     */
    public function get_value()
    {
    }
    public function before_version_name()
    {
    }
    public function version_name()
    {
    }
    public function version_equals()
    {
    }
    public function version_value()
    {
    }
    public function encoding_name()
    {
    }
    public function encoding_equals()
    {
    }
    public function encoding_value()
    {
    }
    public function standalone_name()
    {
    }
    public function standalone_equals()
    {
    }
    public function standalone_value()
    {
    }
}
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Decode 'gzip' encoded HTTP data
 *
 * @package SimplePie
 * @subpackage HTTP
 * @link http://www.gzip.org/format.txt
 */
class SimplePie_gzdecode
{
    /**
     * Compressed data
     *
     * @access private
     * @var string
     * @see gzdecode::$data
     */
    var $compressed_data;
    /**
     * Size of compressed data
     *
     * @access private
     * @var int
     */
    var $compressed_size;
    /**
     * Minimum size of a valid gzip string
     *
     * @access private
     * @var int
     */
    var $min_compressed_size = 18;
    /**
     * Current position of pointer
     *
     * @access private
     * @var int
     */
    var $position = 0;
    /**
     * Flags (FLG)
     *
     * @access private
     * @var int
     */
    var $flags;
    /**
     * Uncompressed data
     *
     * @access public
     * @see gzdecode::$compressed_data
     * @var string
     */
    var $data;
    /**
     * Modified time
     *
     * @access public
     * @var int
     */
    var $MTIME;
    /**
     * Extra Flags
     *
     * @access public
     * @var int
     */
    var $XFL;
    /**
     * Operating System
     *
     * @access public
     * @var int
     */
    var $OS;
    /**
     * Subfield ID 1
     *
     * @access public
     * @see gzdecode::$extra_field
     * @see gzdecode::$SI2
     * @var string
     */
    var $SI1;
    /**
     * Subfield ID 2
     *
     * @access public
     * @see gzdecode::$extra_field
     * @see gzdecode::$SI1
     * @var string
     */
    var $SI2;
    /**
     * Extra field content
     *
     * @access public
     * @see gzdecode::$SI1
     * @see gzdecode::$SI2
     * @var string
     */
    var $extra_field;
    /**
     * Original filename
     *
     * @access public
     * @var string
     */
    var $filename;
    /**
     * Human readable comment
     *
     * @access public
     * @var string
     */
    var $comment;
    /**
     * Don't allow anything to be set
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
    }
    /**
     * Set the compressed string and related properties
     *
     * @param string $data
     */
    public function __construct($data)
    {
    }
    /**
     * Decode the GZIP stream
     *
     * @return bool Successfulness
     */
    public function parse()
    {
    }
}
/**
 * General API for generating and formatting diffs - the differences between
 * two sequences of strings.
 *
 * The original PHP version of this code was written by Geoffrey T. Dairiki
 * <dairiki@dairiki.org>, and is used/adapted with his permission.
 *
 * Copyright 2004 Geoffrey T. Dairiki <dairiki@dairiki.org>
 * Copyright 2004-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 */
class Text_Diff
{
    /**
     * Array of changes.
     *
     * @var array
     */
    var $_edits;
    /**
     * Computes diffs between sequences of strings.
     *
     * @param string $engine     Name of the diffing engine to use.  'auto'
     *                           will automatically select the best.
     * @param array $params      Parameters to pass to the diffing engine.
     *                           Normally an array of two arrays, each
     *                           containing the lines from a file.
     */
    function __construct($engine, $params)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_Diff($engine, $params)
    {
    }
    /**
     * Returns the array of differences.
     */
    function getDiff()
    {
    }
    /**
     * returns the number of new (added) lines in a given diff.
     *
     * @since Text_Diff 1.1.0
     *
     * @return integer The number of new lines
     */
    function countAddedLines()
    {
    }
    /**
     * Returns the number of deleted (removed) lines in a given diff.
     *
     * @since Text_Diff 1.1.0
     *
     * @return integer The number of deleted lines
     */
    function countDeletedLines()
    {
    }
    /**
     * Computes a reversed diff.
     *
     * Example:
     * <code>
     * $diff = new Text_Diff($lines1, $lines2);
     * $rev = $diff->reverse();
     * </code>
     *
     * @return Text_Diff  A Diff object representing the inverse of the
     *                    original diff.  Note that we purposely don't return a
     *                    reference here, since this essentially is a clone()
     *                    method.
     */
    function reverse()
    {
    }
    /**
     * Checks for an empty diff.
     *
     * @return boolean  True if two sequences were identical.
     */
    function isEmpty()
    {
    }
    /**
     * Computes the length of the Longest Common Subsequence (LCS).
     *
     * This is mostly for diagnostic purposes.
     *
     * @return integer  The length of the LCS.
     */
    function lcs()
    {
    }
    /**
     * Gets the original set of lines.
     *
     * This reconstructs the $from_lines parameter passed to the constructor.
     *
     * @return array  The original sequence of strings.
     */
    function getOriginal()
    {
    }
    /**
     * Gets the final set of lines.
     *
     * This reconstructs the $to_lines parameter passed to the constructor.
     *
     * @return array  The sequence of strings.
     */
    function getFinal()
    {
    }
    /**
     * Removes trailing newlines from a line of text. This is meant to be used
     * with array_walk().
     *
     * @param string $line  The line to trim.
     * @param integer $key  The index of the line in the array. Not used.
     */
    static function trimNewlines(&$line, $key)
    {
    }
    /**
     * Determines the location of the system temporary directory.
     *
     * @static
     *
     * @access protected
     *
     * @return string  A directory name which can be used for temp files.
     *                 Returns false if one could not be found.
     */
    function _getTempDir()
    {
    }
    /**
     * Checks a diff for validity.
     *
     * This is here only for debugging purposes.
     */
    function _check($from_lines, $to_lines)
    {
    }
}
/**
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 */
class Text_MappedDiff extends \Text_Diff
{
    /**
     * Computes a diff between sequences of strings.
     *
     * This can be used to compute things like case-insensitve diffs, or diffs
     * which ignore changes in white-space.
     *
     * @param array $from_lines         An array of strings.
     * @param array $to_lines           An array of strings.
     * @param array $mapped_from_lines  This array should have the same size
     *                                  number of elements as $from_lines.  The
     *                                  elements in $mapped_from_lines and
     *                                  $mapped_to_lines are what is actually
     *                                  compared when computing the diff.
     * @param array $mapped_to_lines    This array should have the same number
     *                                  of elements as $to_lines.
     */
    function __construct($from_lines, $to_lines, $mapped_from_lines, $mapped_to_lines)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_MappedDiff($from_lines, $to_lines, $mapped_from_lines, $mapped_to_lines)
    {
    }
}
/**
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 *
 * @access private
 */
class Text_Diff_Op
{
    var $orig;
    var $final;
    function &reverse()
    {
    }
    function norig()
    {
    }
    function nfinal()
    {
    }
}
/**
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 *
 * @access private
 */
class Text_Diff_Op_copy extends \Text_Diff_Op
{
    /**
     * PHP5 constructor.
     */
    function __construct($orig, $final = \false)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_Diff_Op_copy($orig, $final = \false)
    {
    }
    function &reverse()
    {
    }
}
/**
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 *
 * @access private
 */
class Text_Diff_Op_delete extends \Text_Diff_Op
{
    /**
     * PHP5 constructor.
     */
    function __construct($lines)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_Diff_Op_delete($lines)
    {
    }
    function &reverse()
    {
    }
}
/**
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 *
 * @access private
 */
class Text_Diff_Op_add extends \Text_Diff_Op
{
    /**
     * PHP5 constructor.
     */
    function __construct($lines)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_Diff_Op_add($lines)
    {
    }
    function &reverse()
    {
    }
}
/**
 * @package Text_Diff
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 *
 * @access private
 */
class Text_Diff_Op_change extends \Text_Diff_Op
{
    /**
     * PHP5 constructor.
     */
    function __construct($orig, $final)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_Diff_Op_change($orig, $final)
    {
    }
    function &reverse()
    {
    }
}
/**
 * Class used internally by Text_Diff to actually compute the diffs.
 *
 * This class is implemented using native PHP code.
 *
 * The algorithm used here is mostly lifted from the perl module
 * Algorithm::Diff (version 1.06) by Ned Konz, which is available at:
 * http://www.perl.com/CPAN/authors/id/N/NE/NEDKONZ/Algorithm-Diff-1.06.zip
 *
 * More ideas are taken from: http://www.ics.uci.edu/~eppstein/161/960229.html
 *
 * Some ideas (and a bit of code) are taken from analyze.c, of GNU
 * diffutils-2.7, which can be found at:
 * ftp://gnudist.gnu.org/pub/gnu/diffutils/diffutils-2.7.tar.gz
 *
 * Some ideas (subdivision by NCHUNKS > 2, and some optimizations) are from
 * Geoffrey T. Dairiki <dairiki@dairiki.org>. The original PHP version of this
 * code was written by him, and is used/adapted with his permission.
 *
 * Copyright 2004-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @author  Geoffrey T. Dairiki <dairiki@dairiki.org>
 * @package Text_Diff
 */
class Text_Diff_Engine_native
{
    function diff($from_lines, $to_lines)
    {
    }
    /**
     * Divides the Largest Common Subsequence (LCS) of the sequences (XOFF,
     * XLIM) and (YOFF, YLIM) into NCHUNKS approximately equally sized
     * segments.
     *
     * Returns (LCS, PTS).  LCS is the length of the LCS. PTS is an array of
     * NCHUNKS+1 (X, Y) indexes giving the diving points between sub
     * sequences.  The first sub-sequence is contained in (X0, X1), (Y0, Y1),
     * the second in (X1, X2), (Y1, Y2) and so on.  Note that (X0, Y0) ==
     * (XOFF, YOFF) and (X[NCHUNKS], Y[NCHUNKS]) == (XLIM, YLIM).
     *
     * This function assumes that the first lines of the specified portions of
     * the two files do not match, and likewise that the last lines do not
     * match.  The caller must trim matching lines from the beginning and end
     * of the portions it is going to specify.
     */
    function _diag($xoff, $xlim, $yoff, $ylim, $nchunks)
    {
    }
    function _lcsPos($ypos)
    {
    }
    /**
     * Finds LCS of two sequences.
     *
     * The results are recorded in the vectors $this->{x,y}changed[], by
     * storing a 1 in the element for each line that is an insertion or
     * deletion (ie. is not in the LCS).
     *
     * The subsequence of file 0 is (XOFF, XLIM) and likewise for file 1.
     *
     * Note that XLIM, YLIM are exclusive bounds.  All line numbers are
     * origin-0 and discarded lines are not counted.
     */
    function _compareseq($xoff, $xlim, $yoff, $ylim)
    {
    }
    /**
     * Adjusts inserts/deletes of identical lines to join changes as much as
     * possible.
     *
     * We do something when a run of changed lines include a line at one end
     * and has an excluded, identical line at the other.  We are free to
     * choose which identical line is included.  `compareseq' usually chooses
     * the one at the beginning, but usually it is cleaner to consider the
     * following identical line to be the "change".
     *
     * This is extracted verbatim from analyze.c (GNU diffutils-2.7).
     */
    function _shiftBoundaries($lines, &$changed, $other_changed)
    {
    }
}
/**
 * Class used internally by Diff to actually compute the diffs.
 *
 * This class uses the Unix `diff` program via shell_exec to compute the
 * differences between the two input arrays.
 *
 * Copyright 2007-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @author  Milian Wolff <mail@milianw.de>
 * @package Text_Diff
 * @since   0.3.0
 */
class Text_Diff_Engine_shell
{
    /**
     * Path to the diff executable
     *
     * @var string
     */
    var $_diffCommand = 'diff';
    /**
     * Returns the array of differences.
     *
     * @param array $from_lines lines of text from old file
     * @param array $to_lines   lines of text from new file
     *
     * @return array all changes made (array with Text_Diff_Op_* objects)
     */
    function diff($from_lines, $to_lines)
    {
    }
    /**
     * Get lines from either the old or new text
     *
     * @access private
     *
     * @param array $text_lines Either $from_lines or $to_lines (passed by reference).
     * @param int   $line_no    Current line number (passed by reference).
     * @param int   $end        Optional end line, when we want to chop more
     *                          than one line.
     *
     * @return array The chopped lines
     */
    function _getLines(&$text_lines, &$line_no, $end = \false)
    {
    }
}
/**
 * Parses unified or context diffs output from eg. the diff utility.
 *
 * Example:
 * <code>
 * $patch = file_get_contents('example.patch');
 * $diff = new Text_Diff('string', array($patch));
 * $renderer = new Text_Diff_Renderer_inline();
 * echo $renderer->render($diff);
 * </code>
 *
 * Copyright 2005 Örjan Persson <o@42mm.org>
 * Copyright 2005-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @author  Örjan Persson <o@42mm.org>
 * @package Text_Diff
 * @since   0.2.0
 */
class Text_Diff_Engine_string
{
    /**
     * Parses a unified or context diff.
     *
     * First param contains the whole diff and the second can be used to force
     * a specific diff type. If the second parameter is 'autodetect', the
     * diff will be examined to find out which type of diff this is.
     *
     * @param string $diff  The diff content.
     * @param string $mode  The diff mode of the content in $diff. One of
     *                      'context', 'unified', or 'autodetect'.
     *
     * @return array  List of all diff operations.
     */
    function diff($diff, $mode = 'autodetect')
    {
    }
    /**
     * Parses an array containing the unified diff.
     *
     * @param array $diff  Array of lines.
     *
     * @return array  List of all diff operations.
     */
    function parseUnifiedDiff($diff)
    {
    }
    /**
     * Parses an array containing the context diff.
     *
     * @param array $diff  Array of lines.
     *
     * @return array  List of all diff operations.
     */
    function parseContextDiff(&$diff)
    {
    }
}
/**
 * Class used internally by Diff to actually compute the diffs.
 *
 * This class uses the xdiff PECL package (http://pecl.php.net/package/xdiff)
 * to compute the differences between the two input arrays.
 *
 * Copyright 2004-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @author  Jon Parise <jon@horde.org>
 * @package Text_Diff
 */
class Text_Diff_Engine_xdiff
{
    /**
     */
    function diff($from_lines, $to_lines)
    {
    }
}
/**
 * A class to render Diffs in different formats.
 *
 * This class renders the diff in classic diff format. It is intended that
 * this class be customized via inheritance, to obtain fancier outputs.
 *
 * Copyright 2004-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @package Text_Diff
 */
class Text_Diff_Renderer
{
    /**
     * Number of leading context "lines" to preserve.
     *
     * This should be left at zero for this class, but subclasses may want to
     * set this to other values.
     */
    var $_leading_context_lines = 0;
    /**
     * Number of trailing context "lines" to preserve.
     *
     * This should be left at zero for this class, but subclasses may want to
     * set this to other values.
     */
    var $_trailing_context_lines = 0;
    /**
     * Constructor.
     */
    function __construct($params = array())
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Text_Diff_Renderer($params = array())
    {
    }
    /**
     * Get any renderer parameters.
     *
     * @return array  All parameters of this renderer object.
     */
    function getParams()
    {
    }
    /**
     * Renders a diff.
     *
     * @param Text_Diff $diff  A Text_Diff object.
     *
     * @return string  The formatted output.
     */
    function render($diff)
    {
    }
    function _block($xbeg, $xlen, $ybeg, $ylen, &$edits)
    {
    }
    function _startDiff()
    {
    }
    function _endDiff()
    {
    }
    function _blockHeader($xbeg, $xlen, $ybeg, $ylen)
    {
    }
    function _startBlock($header)
    {
    }
    function _endBlock()
    {
    }
    function _lines($lines, $prefix = ' ')
    {
    }
    function _context($lines)
    {
    }
    function _added($lines)
    {
    }
    function _deleted($lines)
    {
    }
    function _changed($orig, $final)
    {
    }
}
/**
 * "Inline" diff renderer.
 *
 * This class renders diffs in the Wiki-style "inline" format.
 *
 * @author  Ciprian Popovici
 * @package Text_Diff
 */
class Text_Diff_Renderer_inline extends \Text_Diff_Renderer
{
    /**
     * Number of leading context "lines" to preserve.
     *
     * @var integer
     */
    var $_leading_context_lines = 10000;
    /**
     * Number of trailing context "lines" to preserve.
     *
     * @var integer
     */
    var $_trailing_context_lines = 10000;
    /**
     * Prefix for inserted text.
     *
     * @var string
     */
    var $_ins_prefix = '<ins>';
    /**
     * Suffix for inserted text.
     *
     * @var string
     */
    var $_ins_suffix = '</ins>';
    /**
     * Prefix for deleted text.
     *
     * @var string
     */
    var $_del_prefix = '<del>';
    /**
     * Suffix for deleted text.
     *
     * @var string
     */
    var $_del_suffix = '</del>';
    /**
     * Header for each change block.
     *
     * @var string
     */
    var $_block_header = '';
    /**
     * Whether to split down to character-level.
     *
     * @var boolean
     */
    var $_split_characters = \false;
    /**
     * What are we currently splitting on? Used to recurse to show word-level
     * or character-level changes.
     *
     * @var string
     */
    var $_split_level = 'lines';
    function _blockHeader($xbeg, $xlen, $ybeg, $ylen)
    {
    }
    function _startBlock($header)
    {
    }
    function _lines($lines, $prefix = ' ', $encode = \true)
    {
    }
    function _added($lines)
    {
    }
    function _deleted($lines, $words = \false)
    {
    }
    function _changed($orig, $final)
    {
    }
    function _splitOnWords($string, $newlineEscape = "\n")
    {
    }
    function _encode(&$string)
    {
    }
}
/**
 * Atom Syndication Format PHP Library
 *
 * @package AtomLib
 * @link http://code.google.com/p/phpatomlib/
 *
 * @author Elias Torres <elias@torrez.us>
 * @version 0.4
 * @since 2.3.0
 */
/**
 * Structure that store common Atom Feed Properties
 *
 * @package AtomLib
 */
class AtomFeed
{
    /**
     * Stores Links
     * @var array
     * @access public
     */
    var $links = array();
    /**
     * Stores Categories
     * @var array
     * @access public
     */
    var $categories = array();
    /**
     * Stores Entries
     *
     * @var array
     * @access public
     */
    var $entries = array();
}
/**
 * Structure that store Atom Entry Properties
 *
 * @package AtomLib
 */
class AtomEntry
{
    /**
     * Stores Links
     * @var array
     * @access public
     */
    var $links = array();
    /**
     * Stores Categories
     * @var array
     * @access public
     */
    var $categories = array();
}
/**
 * AtomLib Atom Parser API
 *
 * @package AtomLib
 */
class AtomParser
{
    var $NS = 'http://www.w3.org/2005/Atom';
    var $ATOM_CONTENT_ELEMENTS = array('content', 'summary', 'title', 'subtitle', 'rights');
    var $ATOM_SIMPLE_ELEMENTS = array('id', 'updated', 'published', 'draft');
    var $debug = \false;
    var $depth = 0;
    var $indent = 2;
    var $in_content;
    var $ns_contexts = array();
    var $ns_decls = array();
    var $content_ns_decls = array();
    var $content_ns_contexts = array();
    var $is_xhtml = \false;
    var $is_html = \false;
    var $is_text = \true;
    var $skipped_div = \false;
    var $FILE = "php://input";
    var $feed;
    var $current;
    /**
     * PHP5 constructor.
     */
    function __construct()
    {
    }
    /**
     * PHP4 constructor.
     */
    public function AtomParser()
    {
    }
    /**
     * Map attributes to key="val"
     *
     * @param string $k Key
     * @param string $v Value
     * @return string
     */
    public static function map_attrs($k, $v)
    {
    }
    /**
     * Map XML namespace to string.
     *
     * @param indexish $p XML Namespace element index
     * @param array $n Two-element array pair. [ 0 => {namespace}, 1 => {url} ]
     * @return string 'xmlns="{url}"' or 'xmlns:{namespace}="{url}"'
     */
    public static function map_xmlns($p, $n)
    {
    }
    function _p($msg)
    {
    }
    function error_handler($log_level, $log_text, $error_file, $error_line)
    {
    }
    function parse()
    {
    }
    function start_element($parser, $name, $attrs)
    {
    }
    function end_element($parser, $name)
    {
    }
    function start_ns($parser, $prefix, $uri)
    {
    }
    function end_ns($parser, $prefix)
    {
    }
    function cdata($parser, $data)
    {
    }
    function _default($parser, $data)
    {
    }
    function ns_to_prefix($qname, $attr = \false)
    {
    }
    function is_declared_content_ns($new_mapping)
    {
    }
    function xml_escape($string)
    {
    }
}
/**
 * Core class that implements an object cache.
 *
 * The WordPress Object Cache is used to save on trips to the database. The
 * Object Cache stores all of the cache data to memory and makes the cache
 * contents available by using a key, which is used to name and later retrieve
 * the cache contents.
 *
 * The Object Cache can be replaced by other caching mechanisms by placing files
 * in the wp-content folder which is looked at in wp-settings. If that file
 * exists, then this file will not be included.
 *
 * @since 2.0.0
 */
class WP_Object_Cache
{
    /**
     * Holds the cached objects.
     *
     * @since 2.0.0
     * @var array
     */
    private $cache = array();
    /**
     * The amount of times the cache data was already stored in the cache.
     *
     * @since 2.5.0
     * @var int
     */
    public $cache_hits = 0;
    /**
     * Amount of times the cache did not have the request in cache.
     *
     * @since 2.0.0
     * @var int
     */
    public $cache_misses = 0;
    /**
     * List of global cache groups.
     *
     * @since 3.0.0
     * @var array
     */
    protected $global_groups = array();
    /**
     * The blog prefix to prepend to keys in non-global groups.
     *
     * @since 3.5.0
     * @var int
     */
    private $blog_prefix;
    /**
     * Holds the value of is_multisite().
     *
     * @since 3.5.0
     * @var bool
     */
    private $multisite;
    /**
     * Makes private properties readable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name Property to get.
     * @return mixed Property.
     */
    public function __get($name)
    {
    }
    /**
     * Makes private properties settable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name  Property to set.
     * @param mixed  $value Property value.
     * @return mixed Newly-set property.
     */
    public function __set($name, $value)
    {
    }
    /**
     * Makes private properties checkable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name Property to check if set.
     * @return bool Whether the property is set.
     */
    public function __isset($name)
    {
    }
    /**
     * Makes private properties un-settable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name Property to unset.
     */
    public function __unset($name)
    {
    }
    /**
     * Adds data to the cache if it doesn't already exist.
     *
     * @since 2.0.0
     *
     * @uses WP_Object_Cache::_exists() Checks to see if the cache already has data.
     * @uses WP_Object_Cache::set()     Sets the data after the checking the cache
     *		                            contents existence.
     *
     * @param int|string $key    What to call the contents in the cache.
     * @param mixed      $data   The contents to store in the cache.
     * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
     * @param int        $expire Optional. When to expire the cache contents. Default 0 (no expiration).
     * @return bool False if cache key and group already exist, true on success
     */
    public function add($key, $data, $group = 'default', $expire = 0)
    {
    }
    /**
     * Sets the list of global cache groups.
     *
     * @since 3.0.0
     *
     * @param array $groups List of groups that are global.
     */
    public function add_global_groups($groups)
    {
    }
    /**
     * Decrements numeric cache item's value.
     *
     * @since 3.3.0
     *
     * @param int|string $key    The cache key to decrement.
     * @param int        $offset Optional. The amount by which to decrement the item's value. Default 1.
     * @param string     $group  Optional. The group the key is in. Default 'default'.
     * @return false|int False on failure, the item's new value on success.
     */
    public function decr($key, $offset = 1, $group = 'default')
    {
    }
    /**
     * Removes the contents of the cache key in the group.
     *
     * If the cache key does not exist in the group, then nothing will happen.
     *
     * @since 2.0.0
     *
     * @param int|string $key        What the contents in the cache are called.
     * @param string     $group      Optional. Where the cache contents are grouped. Default 'default'.
     * @param bool       $deprecated Optional. Unused. Default false.
     * @return bool False if the contents weren't deleted and true on success.
     */
    public function delete($key, $group = 'default', $deprecated = \false)
    {
    }
    /**
     * Clears the object cache of all data.
     *
     * @since 2.0.0
     *
     * @return true Always returns true.
     */
    public function flush()
    {
    }
    /**
     * Retrieves the cache contents, if it exists.
     *
     * The contents will be first attempted to be retrieved by searching by the
     * key in the cache group. If the cache is hit (success) then the contents
     * are returned.
     *
     * On failure, the number of cache misses will be incremented.
     *
     * @since 2.0.0
     *
     * @param int|string $key    What the contents in the cache are called.
     * @param string     $group  Optional. Where the cache contents are grouped. Default 'default'.
     * @param string     $force  Optional. Unused. Whether to force a refetch rather than relying on the local
     *                           cache. Default false.
     * @param bool        $found  Optional. Whether the key was found in the cache (passed by reference).
     *                            Disambiguates a return of false, a storable value. Default null.
     * @return false|mixed False on failure to retrieve contents or the cache contents on success.
     */
    public function get($key, $group = 'default', $force = \false, &$found = \null)
    {
    }
    /**
     * Increments numeric cache item's value.
     *
     * @since 3.3.0
     *
     * @param int|string $key    The cache key to increment
     * @param int        $offset Optional. The amount by which to increment the item's value. Default 1.
     * @param string     $group  Optional. The group the key is in. Default 'default'.
     * @return false|int False on failure, the item's new value on success.
     */
    public function incr($key, $offset = 1, $group = 'default')
    {
    }
    /**
     * Replaces the contents in the cache, if contents already exist.
     *
     * @since 2.0.0
     *
     * @see WP_Object_Cache::set()
     *
     * @param int|string $key    What to call the contents in the cache.
     * @param mixed      $data   The contents to store in the cache.
     * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
     * @param int        $expire Optional. When to expire the cache contents. Default 0 (no expiration).
     * @return bool False if not exists, true if contents were replaced.
     */
    public function replace($key, $data, $group = 'default', $expire = 0)
    {
    }
    /**
     * Resets cache keys.
     *
     * @since 3.0.0
     *
     * @deprecated 3.5.0 Use switch_to_blog()
     * @see switch_to_blog()
     */
    public function reset()
    {
    }
    /**
     * Sets the data contents into the cache.
     *
     * The cache contents is grouped by the $group parameter followed by the
     * $key. This allows for duplicate ids in unique groups. Therefore, naming of
     * the group should be used with care and should follow normal function
     * naming guidelines outside of core WordPress usage.
     *
     * The $expire parameter is not used, because the cache will automatically
     * expire for each time a page is accessed and PHP finishes. The method is
     * more for cache plugins which use files.
     *
     * @since 2.0.0
     *
     * @param int|string $key    What to call the contents in the cache.
     * @param mixed      $data   The contents to store in the cache.
     * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
     * @param int        $expire Not Used.
     * @return true Always returns true.
     */
    public function set($key, $data, $group = 'default', $expire = 0)
    {
    }
    /**
     * Echoes the stats of the caching.
     *
     * Gives the cache hits, and cache misses. Also prints every cached group,
     * key and the data.
     *
     * @since 2.0.0
     */
    public function stats()
    {
    }
    /**
     * Switches the internal blog ID.
     *
     * This changes the blog ID used to create keys in blog specific groups.
     *
     * @since 3.5.0
     *
     * @param int $blog_id Blog ID.
     */
    public function switch_to_blog($blog_id)
    {
    }
    /**
     * Serves as a utility function to determine whether a key exists in the cache.
     *
     * @since 3.4.0
     *
     * @param int|string $key   Cache key to check for existence.
     * @param string     $group Cache group for the key existence check.
     * @return bool Whether the key exists in the cache for the given group.
     */
    protected function _exists($key, $group)
    {
    }
    /**
     * Sets up object properties; PHP 5 style constructor.
     *
     * @since 2.0.8
     */
    public function __construct()
    {
    }
    /**
     * Saves the object cache before object is completely destroyed.
     *
     * Called upon object destruction, which should be when PHP ends.
     *
     * @since 2.0.8
     *
     * @return true Always returns true.
     */
    public function __destruct()
    {
    }
}
/**
 * Core class used for managing HTTP transports and making HTTP requests.
 *
 * This class is used to consistently make outgoing HTTP requests easy for developers
 * while still being compatible with the many PHP configurations under which
 * WordPress runs.
 *
 * Debugging includes several actions, which pass different variables for debugging the HTTP API.
 *
 * @since 2.7.0
 */
class WP_Http
{
    // Aliases for HTTP response codes.
    const HTTP_CONTINUE = 100;
    const SWITCHING_PROTOCOLS = 101;
    const PROCESSING = 102;
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NON_AUTHORITATIVE_INFORMATION = 203;
    const NO_CONTENT = 204;
    const RESET_CONTENT = 205;
    const PARTIAL_CONTENT = 206;
    const MULTI_STATUS = 207;
    const IM_USED = 226;
    const MULTIPLE_CHOICES = 300;
    const MOVED_PERMANENTLY = 301;
    const FOUND = 302;
    const SEE_OTHER = 303;
    const NOT_MODIFIED = 304;
    const USE_PROXY = 305;
    const RESERVED = 306;
    const TEMPORARY_REDIRECT = 307;
    const PERMANENT_REDIRECT = 308;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const PAYMENT_REQUIRED = 402;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const NOT_ACCEPTABLE = 406;
    const PROXY_AUTHENTICATION_REQUIRED = 407;
    const REQUEST_TIMEOUT = 408;
    const CONFLICT = 409;
    const GONE = 410;
    const LENGTH_REQUIRED = 411;
    const PRECONDITION_FAILED = 412;
    const REQUEST_ENTITY_TOO_LARGE = 413;
    const REQUEST_URI_TOO_LONG = 414;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const EXPECTATION_FAILED = 417;
    const IM_A_TEAPOT = 418;
    const MISDIRECTED_REQUEST = 421;
    const UNPROCESSABLE_ENTITY = 422;
    const LOCKED = 423;
    const FAILED_DEPENDENCY = 424;
    const UPGRADE_REQUIRED = 426;
    const PRECONDITION_REQUIRED = 428;
    const TOO_MANY_REQUESTS = 429;
    const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    const UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    const INTERNAL_SERVER_ERROR = 500;
    const NOT_IMPLEMENTED = 501;
    const BAD_GATEWAY = 502;
    const SERVICE_UNAVAILABLE = 503;
    const GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const VARIANT_ALSO_NEGOTIATES = 506;
    const INSUFFICIENT_STORAGE = 507;
    const NOT_EXTENDED = 510;
    const NETWORK_AUTHENTICATION_REQUIRED = 511;
    /**
     * Send an HTTP request to a URI.
     *
     * Please note: The only URI that are supported in the HTTP Transport implementation
     * are the HTTP and HTTPS protocols.
     *
     * @since 2.7.0
     *
     * @param string       $url  The request URL.
     * @param string|array $args {
     *     Optional. Array or string of HTTP request arguments.
     *
     *     @type string       $method              Request method. Accepts 'GET', 'POST', 'HEAD', or 'PUT'.
     *                                             Some transports technically allow others, but should not be
     *                                             assumed. Default 'GET'.
     *     @type int          $timeout             How long the connection should stay open in seconds. Default 5.
     *     @type int          $redirection         Number of allowed redirects. Not supported by all transports
     *                                             Default 5.
     *     @type string       $httpversion         Version of the HTTP protocol to use. Accepts '1.0' and '1.1'.
     *                                             Default '1.0'.
     *     @type string       $user-agent          User-agent value sent.
     *                                             Default 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ).
     *     @type bool         $reject_unsafe_urls  Whether to pass URLs through wp_http_validate_url().
     *                                             Default false.
     *     @type bool         $blocking            Whether the calling code requires the result of the request.
     *                                             If set to false, the request will be sent to the remote server,
     *                                             and processing returned to the calling code immediately, the caller
     *                                             will know if the request succeeded or failed, but will not receive
     *                                             any response from the remote server. Default true.
     *     @type string|array $headers             Array or string of headers to send with the request.
     *                                             Default empty array.
     *     @type array        $cookies             List of cookies to send with the request. Default empty array.
     *     @type string|array $body                Body to send with the request. Default null.
     *     @type bool         $compress            Whether to compress the $body when sending the request.
     *                                             Default false.
     *     @type bool         $decompress          Whether to decompress a compressed response. If set to false and
     *                                             compressed content is returned in the response anyway, it will
     *                                             need to be separately decompressed. Default true.
     *     @type bool         $sslverify           Whether to verify SSL for the request. Default true.
     *     @type string       sslcertificates      Absolute path to an SSL certificate .crt file.
     *                                             Default ABSPATH . WPINC . '/certificates/ca-bundle.crt'.
     *     @type bool         $stream              Whether to stream to a file. If set to true and no filename was
     *                                             given, it will be droped it in the WP temp dir and its name will
     *                                             be set using the basename of the URL. Default false.
     *     @type string       $filename            Filename of the file to write to when streaming. $stream must be
     *                                             set to true. Default null.
     *     @type int          $limit_response_size Size in bytes to limit the response to. Default null.
     *
     * }
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'.
     *                        A WP_Error instance upon error.
     */
    public function request($url, $args = array())
    {
    }
    /**
     * Normalizes cookies for using in Requests.
     *
     * @since 4.6.0
     * @static
     *
     * @param array $cookies List of cookies to send with the request.
     * @return Requests_Cookie_Jar Cookie holder object.
     */
    public static function normalize_cookies($cookies)
    {
    }
    /**
     * Match redirect behaviour to browser handling.
     *
     * Changes 302 redirects from POST to GET to match browser handling. Per
     * RFC 7231, user agents can deviate from the strict reading of the
     * specification for compatibility purposes.
     *
     * @since 4.6.0
     * @static
     *
     * @param string            $location URL to redirect to.
     * @param array             $headers  Headers for the redirect.
     * @param string|array      $data     Body to send with the request.
     * @param array             $options  Redirect request options.
     * @param Requests_Response $original Response object.
     */
    public static function browser_redirect_compatibility($location, $headers, $data, &$options, $original)
    {
    }
    /**
     * Validate redirected URLs.
     *
     * @since 4.7.5
     *
     * @throws Requests_Exception On unsuccessful URL validation
     * @param string $location URL to redirect to.
     */
    public static function validate_redirects($location)
    {
    }
    /**
     * Tests which transports are capable of supporting the request.
     *
     * @since 3.2.0
     *
     * @param array $args Request arguments
     * @param string $url URL to Request
     *
     * @return string|false Class name for the first transport that claims to support the request. False if no transport claims to support the request.
     */
    public function _get_first_available_transport($args, $url = \null)
    {
    }
    /**
     * Dispatches a HTTP request to a supporting transport.
     *
     * Tests each transport in order to find a transport which matches the request arguments.
     * Also caches the transport instance to be used later.
     *
     * The order for requests is cURL, and then PHP Streams.
     *
     * @since 3.2.0
     *
     * @static
     *
     * @param string $url URL to Request
     * @param array $args Request arguments
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'. A WP_Error instance upon error
     */
    private function _dispatch_request($url, $args)
    {
    }
    /**
     * Uses the POST HTTP method.
     *
     * Used for sending data that is expected to be in the body.
     *
     * @since 2.7.0
     *
     * @param string       $url  The request URL.
     * @param string|array $args Optional. Override the defaults.
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'. A WP_Error instance upon error
     */
    public function post($url, $args = array())
    {
    }
    /**
     * Uses the GET HTTP method.
     *
     * Used for sending data that is expected to be in the body.
     *
     * @since 2.7.0
     *
     * @param string $url The request URL.
     * @param string|array $args Optional. Override the defaults.
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'. A WP_Error instance upon error
     */
    public function get($url, $args = array())
    {
    }
    /**
     * Uses the HEAD HTTP method.
     *
     * Used for sending data that is expected to be in the body.
     *
     * @since 2.7.0
     *
     * @param string $url The request URL.
     * @param string|array $args Optional. Override the defaults.
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'. A WP_Error instance upon error
     */
    public function head($url, $args = array())
    {
    }
    /**
     * Parses the responses and splits the parts into headers and body.
     *
     * @static
     * @since 2.7.0
     *
     * @param string $strResponse The full response string
     * @return array Array with 'headers' and 'body' keys.
     */
    public static function processResponse($strResponse)
    {
    }
    /**
     * Transform header string into an array.
     *
     * If an array is given then it is assumed to be raw header data with numeric keys with the
     * headers as the values. No headers must be passed that were already processed.
     *
     * @static
     * @since 2.7.0
     *
     * @param string|array $headers
     * @param string $url The URL that was requested
     * @return array Processed string headers. If duplicate headers are encountered,
     * 					Then a numbered array is returned as the value of that header-key.
     */
    public static function processHeaders($headers, $url = '')
    {
    }
    /**
     * Takes the arguments for a ::request() and checks for the cookie array.
     *
     * If it's found, then it upgrades any basic name => value pairs to WP_Http_Cookie instances,
     * which are each parsed into strings and added to the Cookie: header (within the arguments array).
     * Edits the array by reference.
     *
     * @since 2.8.0
     * @static
     *
     * @param array $r Full array of args passed into ::request()
     */
    public static function buildCookieHeader(&$r)
    {
    }
    /**
     * Decodes chunk transfer-encoding, based off the HTTP 1.1 specification.
     *
     * Based off the HTTP http_encoding_dechunk function.
     *
     * @link https://tools.ietf.org/html/rfc2616#section-19.4.6 Process for chunked decoding.
     *
     * @since 2.7.0
     * @static
     *
     * @param string $body Body content
     * @return string Chunked decoded body on success or raw body on failure.
     */
    public static function chunkTransferDecode($body)
    {
    }
    /**
     * Block requests through the proxy.
     *
     * Those who are behind a proxy and want to prevent access to certain hosts may do so. This will
     * prevent plugins from working and core functionality, if you don't include api.wordpress.org.
     *
     * You block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true in your wp-config.php
     * file and this will only allow localhost and your site to make requests. The constant
     * WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests. The format of the
     * WP_ACCESSIBLE_HOSTS constant is a comma separated list of hostnames to allow, wildcard domains
     * are supported, eg *.wordpress.org will allow for all subdomains of wordpress.org to be contacted.
     *
     * @since 2.8.0
     * @link https://core.trac.wordpress.org/ticket/8927 Allow preventing external requests.
     * @link https://core.trac.wordpress.org/ticket/14636 Allow wildcard domains in WP_ACCESSIBLE_HOSTS
     *
     * @staticvar array|null $accessible_hosts
     * @staticvar array      $wildcard_regex
     *
     * @param string $uri URI of url.
     * @return bool True to block, false to allow.
     */
    public function block_request($uri)
    {
    }
    /**
     * Used as a wrapper for PHP's parse_url() function that handles edgecases in < PHP 5.4.7.
     *
     * @deprecated 4.4.0 Use wp_parse_url()
     * @see wp_parse_url()
     *
     * @param string $url The URL to parse.
     * @return bool|array False on failure; Array of URL components on success;
     *                    See parse_url()'s return values.
     */
    protected static function parse_url($url)
    {
    }
    /**
     * Converts a relative URL to an absolute URL relative to a given URL.
     *
     * If an Absolute URL is provided, no processing of that URL is done.
     *
     * @since 3.4.0
     *
     * @static
     *
     * @param string $maybe_relative_path The URL which might be relative
     * @param string $url                 The URL which $maybe_relative_path is relative to
     * @return string An Absolute URL, in a failure condition where the URL cannot be parsed, the relative URL will be returned.
     */
    public static function make_absolute_url($maybe_relative_path, $url)
    {
    }
    /**
     * Handles HTTP Redirects and follows them if appropriate.
     *
     * @since 3.7.0
     * @static
     *
     * @param string $url The URL which was requested.
     * @param array $args The Arguments which were used to make the request.
     * @param array $response The Response of the HTTP request.
     * @return false|object False if no redirect is present, a WP_HTTP or WP_Error result otherwise.
     */
    public static function handle_redirects($url, $args, $response)
    {
    }
    /**
     * Determines if a specified string represents an IP address or not.
     *
     * This function also detects the type of the IP address, returning either
     * '4' or '6' to represent a IPv4 and IPv6 address respectively.
     * This does not verify if the IP is a valid IP, only that it appears to be
     * an IP address.
     *
     * @link http://home.deds.nl/~aeron/regex/ for IPv6 regex
     *
     * @since 3.7.0
     * @static
     *
     * @param string $maybe_ip A suspected IP address
     * @return integer|bool Upon success, '4' or '6' to represent a IPv4 or IPv6 address, false upon failure
     */
    public static function is_ip_address($maybe_ip)
    {
    }
}
/**
 * Converts to and from JSON format.
 *
 * Brief example of use:
 *
 * <code>
 * // create a new instance of Services_JSON
 * $json = new Services_JSON();
 *
 * // convert a complexe value to JSON notation, and send it to the browser
 * $value = array('foo', 'bar', array(1, 2, 'baz'), array(3, array(4)));
 * $output = $json->encode($value);
 *
 * print($output);
 * // prints: ["foo","bar",[1,2,"baz"],[3,[4]]]
 *
 * // accept incoming POST data, assumed to be in JSON notation
 * $input = file_get_contents('php://input', 1000000);
 * $value = $json->decode($input);
 * </code>
 */
class Services_JSON
{
    /**
     * constructs a new JSON instance
     *
     * @param    int     $use    object behavior flags; combine with boolean-OR
     *
     *                           possible values:
     *                           - SERVICES_JSON_LOOSE_TYPE:  loose typing.
     *                                   "{...}" syntax creates associative arrays
     *                                   instead of objects in decode().
     *                           - SERVICES_JSON_SUPPRESS_ERRORS:  error suppression.
     *                                   Values which can't be encoded (e.g. resources)
     *                                   appear as NULL instead of throwing errors.
     *                                   By default, a deeply-nested resource will
     *                                   bubble up with an error, so all return values
     *                                   from encode() should be checked with isError()
     *                           - SERVICES_JSON_USE_TO_JSON:  call toJSON when serializing objects
     *                                   It serializes the return value from the toJSON call rather
     *                                   than the object itself, toJSON can return associative arrays,
     *                                   strings or numbers, if you return an object, make sure it does
     *                                   not have a toJSON method, otherwise an error will occur.
     */
    function __construct($use = 0)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function Services_JSON($use = 0)
    {
    }
    // private - cache the mbstring lookup results..
    var $_mb_strlen = \false;
    var $_mb_substr = \false;
    var $_mb_convert_encoding = \false;
    /**
     * convert a string from one UTF-16 char to one UTF-8 char
     *
     * Normally should be handled by mb_convert_encoding, but
     * provides a slower PHP-only method for installations
     * that lack the multibye string extension.
     *
     * @param    string  $utf16  UTF-16 character
     * @return   string  UTF-8 character
     * @access   private
     */
    function utf162utf8($utf16)
    {
    }
    /**
     * convert a string from one UTF-8 char to one UTF-16 char
     *
     * Normally should be handled by mb_convert_encoding, but
     * provides a slower PHP-only method for installations
     * that lack the multibye string extension.
     *
     * @param    string  $utf8   UTF-8 character
     * @return   string  UTF-16 character
     * @access   private
     */
    function utf82utf16($utf8)
    {
    }
    /**
     * encodes an arbitrary variable into JSON format (and sends JSON Header)
     *
     * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.
     *                           see argument 1 to Services_JSON() above for array-parsing behavior.
     *                           if var is a strng, note that encode() always expects it
     *                           to be in ASCII or UTF-8 format!
     *
     * @return   mixed   JSON string representation of input var or an error if a problem occurs
     * @access   public
     */
    function encode($var)
    {
    }
    /**
     * encodes an arbitrary variable into JSON format without JSON Header - warning - may allow XSS!!!!)
     *
     * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.
     *                           see argument 1 to Services_JSON() above for array-parsing behavior.
     *                           if var is a strng, note that encode() always expects it
     *                           to be in ASCII or UTF-8 format!
     *
     * @return   mixed   JSON string representation of input var or an error if a problem occurs
     * @access   public
     */
    function encodeUnsafe($var)
    {
    }
    /**
     * PRIVATE CODE that does the work of encodes an arbitrary variable into JSON format
     *
     * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.
     *                           see argument 1 to Services_JSON() above for array-parsing behavior.
     *                           if var is a strng, note that encode() always expects it
     *                           to be in ASCII or UTF-8 format!
     *
     * @return   mixed   JSON string representation of input var or an error if a problem occurs
     * @access   public
     */
    function _encode($var)
    {
    }
    /**
     * array-walking function for use in generating JSON-formatted name-value pairs
     *
     * @param    string  $name   name of key to use
     * @param    mixed   $value  reference to an array element to be encoded
     *
     * @return   string  JSON-formatted name-value pair, like '"name":value'
     * @access   private
     */
    function name_value($name, $value)
    {
    }
    /**
     * reduce a string by removing leading and trailing comments and whitespace
     *
     * @param    $str    string      string value to strip of comments and whitespace
     *
     * @return   string  string value stripped of comments and whitespace
     * @access   private
     */
    function reduce_string($str)
    {
    }
    /**
     * decodes a JSON string into appropriate variable
     *
     * @param    string  $str    JSON-formatted string
     *
     * @return   mixed   number, boolean, string, array, or object
     *                   corresponding to given JSON input string.
     *                   See argument 1 to Services_JSON() above for object-output behavior.
     *                   Note that decode() always returns strings
     *                   in ASCII or UTF-8 format!
     * @access   public
     */
    function decode($str)
    {
    }
    /**
     * @todo Ultimately, this should just call PEAR::isError()
     */
    function isError($data, $code = \null)
    {
    }
    /**
     * Calculates length of string in bytes
     * @param string $str
     * @return int
     */
    function strlen8($str)
    {
    }
    /**
     * Returns part of a string, interpreting $start and $length as number of bytes.
     * @param string $string
     * @param int $start
     * @param int $length
     * @return int
     */
    function substr8($string, $start, $length = \false)
    {
    }
}
/**
 * API for fetching the HTML to embed remote content based on a provided URL
 *
 * Used internally by the WP_Embed class, but is designed to be generic.
 *
 * @link https://codex.wordpress.org/oEmbed oEmbed Codex Article
 * @link http://oembed.com/ oEmbed Homepage
 *
 * @package WordPress
 * @subpackage oEmbed
 */
/**
 * Core class used to implement oEmbed functionality.
 *
 * @since 2.9.0
 */
class WP_oEmbed
{
    /**
     * A list of oEmbed providers.
     *
     * @since 2.9.0
     * @var array
     */
    public $providers = array();
    /**
     * A list of an early oEmbed providers.
     *
     * @since 4.0.0
     * @static
     * @var array
     */
    public static $early_providers = array();
    /**
     * A list of private/protected methods, used for backward compatibility.
     *
     * @since 4.2.0
     * @var array
     */
    private $compat_methods = array('_fetch_with_format', '_parse_json', '_parse_xml', '_parse_xml_body');
    /**
     * Constructor.
     *
     * @since 2.9.0
     */
    public function __construct()
    {
    }
    /**
     * Exposes private/protected methods for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param callable $name      Method to call.
     * @param array    $arguments Arguments to pass when calling.
     * @return mixed|bool Return value of the callback, false otherwise.
     */
    public function __call($name, $arguments)
    {
    }
    /**
     * Takes a URL and returns the corresponding oEmbed provider's URL, if there is one.
     *
     * @since 4.0.0
     *
     * @see WP_oEmbed::discover()
     *
     * @param string        $url  The URL to the content.
     * @param string|array  $args Optional provider arguments.
     * @return false|string False on failure, otherwise the oEmbed provider URL.
     */
    public function get_provider($url, $args = '')
    {
    }
    /**
     * Adds an oEmbed provider.
     *
     * The provider is added just-in-time when wp_oembed_add_provider() is called before
     * the {@see 'plugins_loaded'} hook.
     *
     * The just-in-time addition is for the benefit of the {@see 'oembed_providers'} filter.
     *
     * @static
     * @since 4.0.0
     *
     * @see wp_oembed_add_provider()
     *
     * @param string $format   Format of URL that this provider can handle. You can use
     *                         asterisks as wildcards.
     * @param string $provider The URL to the oEmbed provider..
     * @param bool   $regex    Optional. Whether the $format parameter is in a regex format.
     *                         Default false.
     */
    public static function _add_provider_early($format, $provider, $regex = \false)
    {
    }
    /**
     * Removes an oEmbed provider.
     *
     * The provider is removed just-in-time when wp_oembed_remove_provider() is called before
     * the {@see 'plugins_loaded'} hook.
     *
     * The just-in-time removal is for the benefit of the {@see 'oembed_providers'} filter.
     *
     * @since 4.0.0
     * @static
     *
     * @see wp_oembed_remove_provider()
     *
     * @param string $format The format of URL that this provider can handle. You can use
     *                       asterisks as wildcards.
     */
    public static function _remove_provider_early($format)
    {
    }
    /**
     * Takes a URL and attempts to return the oEmbed data.
     *
     * @see WP_oEmbed::fetch()
     *
     * @since 4.8.0
     *
     * @param string       $url  The URL to the content that should be attempted to be embedded.
     * @param array|string $args Optional. Arguments, usually passed from a shortcode. Default empty.
     * @return false|object False on failure, otherwise the result in the form of an object.
     */
    public function get_data($url, $args = '')
    {
    }
    /**
     * The do-it-all function that takes a URL and attempts to return the HTML.
     *
     * @see WP_oEmbed::fetch()
     * @see WP_oEmbed::data2html()
     *
     * @since 2.9.0
     *
     * @param string       $url  The URL to the content that should be attempted to be embedded.
     * @param array|string $args Optional. Arguments, usually passed from a shortcode. Default empty.
     * @return false|string False on failure, otherwise the UNSANITIZED (and potentially unsafe) HTML that should be used to embed.
     */
    public function get_html($url, $args = '')
    {
    }
    /**
     * Attempts to discover link tags at the given URL for an oEmbed provider.
     *
     * @since 2.9.0
     *
     * @param string $url The URL that should be inspected for discovery `<link>` tags.
     * @return false|string False on failure, otherwise the oEmbed provider URL.
     */
    public function discover($url)
    {
    }
    /**
     * Connects to a oEmbed provider and returns the result.
     *
     * @since 2.9.0
     *
     * @param string       $provider The URL to the oEmbed provider.
     * @param string       $url      The URL to the content that is desired to be embedded.
     * @param array|string $args     Optional. Arguments, usually passed from a shortcode. Default empty.
     * @return false|object False on failure, otherwise the result in the form of an object.
     */
    public function fetch($provider, $url, $args = '')
    {
    }
    /**
     * Fetches result from an oEmbed provider for a specific format and complete provider URL
     *
     * @since 3.0.0
     *
     * @param string $provider_url_with_args URL to the provider with full arguments list (url, maxheight, etc.)
     * @param string $format Format to use
     * @return false|object|WP_Error False on failure, otherwise the result in the form of an object.
     */
    private function _fetch_with_format($provider_url_with_args, $format)
    {
    }
    /**
     * Parses a json response body.
     *
     * @since 3.0.0
     *
     * @param string $response_body
     * @return object|false
     */
    private function _parse_json($response_body)
    {
    }
    /**
     * Parses an XML response body.
     *
     * @since 3.0.0
     *
     * @param string $response_body
     * @return object|false
     */
    private function _parse_xml($response_body)
    {
    }
    /**
     * Serves as a helper function for parsing an XML response body.
     *
     * @since 3.6.0
     *
     * @param string $response_body
     * @return stdClass|false
     */
    private function _parse_xml_body($response_body)
    {
    }
    /**
     * Converts a data object from WP_oEmbed::fetch() and returns the HTML.
     *
     * @since 2.9.0
     *
     * @param object $data A data object result from an oEmbed provider.
     * @param string $url The URL to the content that is desired to be embedded.
     * @return false|string False on error, otherwise the HTML needed to embed.
     */
    public function data2html($data, $url)
    {
    }
    /**
     * Strips any new lines from the HTML.
     *
     * @since 2.9.0 as strip_scribd_newlines()
     * @since 3.0.0
     *
     * @param string $html Existing HTML.
     * @param object $data Data object from WP_oEmbed::data2html()
     * @param string $url The original URL passed to oEmbed.
     * @return string Possibly modified $html
     */
    public function _strip_newlines($html, $data, $url)
    {
    }
}
/**
 * Portable PHP password hashing framework.
 * @package phpass
 * @since 2.5.0
 * @version 0.3 / WordPress
 * @link http://www.openwall.com/phpass/
 */
#
# Written by Solar Designer <solar at openwall.com> in 2004-2006 and placed in
# the public domain.  Revised in subsequent years, still public domain.
#
# There's absolutely no warranty.
#
# Please be sure to update the Version line if you edit this file in any way.
# It is suggested that you leave the main version number intact, but indicate
# your project name (after the slash) and add your own revision information.
#
# Please do not change the "private" password hashing method implemented in
# here, thereby making your hashes incompatible.  However, if you must, please
# change the hash type identifier (the "$P$") to something different.
#
# Obviously, since this code is in the public domain, the above are not
# requirements (there can be none), but merely suggestions.
#
/**
 * Portable PHP password hashing framework.
 *
 * @package phpass
 * @version 0.3 / WordPress
 * @link http://www.openwall.com/phpass/
 * @since 2.5.0
 */
class PasswordHash
{
    var $itoa64;
    var $iteration_count_log2;
    var $portable_hashes;
    var $random_state;
    /**
     * PHP5 constructor.
     */
    function __construct($iteration_count_log2, $portable_hashes)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function PasswordHash($iteration_count_log2, $portable_hashes)
    {
    }
    function get_random_bytes($count)
    {
    }
    function encode64($input, $count)
    {
    }
    function gensalt_private($input)
    {
    }
    function crypt_private($password, $setting)
    {
    }
    function gensalt_extended($input)
    {
    }
    function gensalt_blowfish($input)
    {
    }
    function HashPassword($password)
    {
    }
    function CheckPassword($password, $stored_hash)
    {
    }
}
/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * PHPMailer - PHP email creation and transport class.
 * @package PHPMailer
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 */
class PHPMailer
{
    /**
     * The PHPMailer Version number.
     * @var string
     */
    public $Version = '5.2.22';
    /**
     * Email priority.
     * Options: null (default), 1 = High, 3 = Normal, 5 = low.
     * When null, the header is not set at all.
     * @var integer
     */
    public $Priority = \null;
    /**
     * The character set of the message.
     * @var string
     */
    public $CharSet = 'iso-8859-1';
    /**
     * The MIME Content-type of the message.
     * @var string
     */
    public $ContentType = 'text/plain';
    /**
     * The message encoding.
     * Options: "8bit", "7bit", "binary", "base64", and "quoted-printable".
     * @var string
     */
    public $Encoding = '8bit';
    /**
     * Holds the most recent mailer error message.
     * @var string
     */
    public $ErrorInfo = '';
    /**
     * The From email address for the message.
     * @var string
     */
    public $From = 'root@localhost';
    /**
     * The From name of the message.
     * @var string
     */
    public $FromName = 'Root User';
    /**
     * The Sender email (Return-Path) of the message.
     * If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
     * @var string
     */
    public $Sender = '';
    /**
     * The Return-Path of the message.
     * If empty, it will be set to either From or Sender.
     * @var string
     * @deprecated Email senders should never set a return-path header;
     * it's the receiver's job (RFC5321 section 4.4), so this no longer does anything.
     * @link https://tools.ietf.org/html/rfc5321#section-4.4 RFC5321 reference
     */
    public $ReturnPath = '';
    /**
     * The Subject of the message.
     * @var string
     */
    public $Subject = '';
    /**
     * An HTML or plain text message body.
     * If HTML then call isHTML(true).
     * @var string
     */
    public $Body = '';
    /**
     * The plain-text message body.
     * This body can be read by mail clients that do not have HTML email
     * capability such as mutt & Eudora.
     * Clients that can read HTML will view the normal Body.
     * @var string
     */
    public $AltBody = '';
    /**
     * An iCal message part body.
     * Only supported in simple alt or alt_inline message types
     * To generate iCal events, use the bundled extras/EasyPeasyICS.php class or iCalcreator
     * @link http://sprain.ch/blog/downloads/php-class-easypeasyics-create-ical-files-with-php/
     * @link http://kigkonsult.se/iCalcreator/
     * @var string
     */
    public $Ical = '';
    /**
     * The complete compiled MIME message body.
     * @access protected
     * @var string
     */
    protected $MIMEBody = '';
    /**
     * The complete compiled MIME message headers.
     * @var string
     * @access protected
     */
    protected $MIMEHeader = '';
    /**
     * Extra headers that createHeader() doesn't fold in.
     * @var string
     * @access protected
     */
    protected $mailHeader = '';
    /**
     * Word-wrap the message body to this number of chars.
     * Set to 0 to not wrap. A useful value here is 78, for RFC2822 section 2.1.1 compliance.
     * @var integer
     */
    public $WordWrap = 0;
    /**
     * Which method to use to send mail.
     * Options: "mail", "sendmail", or "smtp".
     * @var string
     */
    public $Mailer = 'mail';
    /**
     * The path to the sendmail program.
     * @var string
     */
    public $Sendmail = '/usr/sbin/sendmail';
    /**
     * Whether mail() uses a fully sendmail-compatible MTA.
     * One which supports sendmail's "-oi -f" options.
     * @var boolean
     */
    public $UseSendmailOptions = \true;
    /**
     * Path to PHPMailer plugins.
     * Useful if the SMTP class is not in the PHP include path.
     * @var string
     * @deprecated Should not be needed now there is an autoloader.
     */
    public $PluginDir = '';
    /**
     * The email address that a reading confirmation should be sent to, also known as read receipt.
     * @var string
     */
    public $ConfirmReadingTo = '';
    /**
     * The hostname to use in the Message-ID header and as default HELO string.
     * If empty, PHPMailer attempts to find one with, in order,
     * $_SERVER['SERVER_NAME'], gethostname(), php_uname('n'), or the value
     * 'localhost.localdomain'.
     * @var string
     */
    public $Hostname = '';
    /**
     * An ID to be used in the Message-ID header.
     * If empty, a unique id will be generated.
     * You can set your own, but it must be in the format "<id@domain>",
     * as defined in RFC5322 section 3.6.4 or it will be ignored.
     * @see https://tools.ietf.org/html/rfc5322#section-3.6.4
     * @var string
     */
    public $MessageID = '';
    /**
     * The message Date to be used in the Date header.
     * If empty, the current date will be added.
     * @var string
     */
    public $MessageDate = '';
    /**
     * SMTP hosts.
     * Either a single hostname or multiple semicolon-delimited hostnames.
     * You can also specify a different port
     * for each host by using this format: [hostname:port]
     * (e.g. "smtp1.example.com:25;smtp2.example.com").
     * You can also specify encryption type, for example:
     * (e.g. "tls://smtp1.example.com:587;ssl://smtp2.example.com:465").
     * Hosts will be tried in order.
     * @var string
     */
    public $Host = 'localhost';
    /**
     * The default SMTP server port.
     * @var integer
     * @TODO Why is this needed when the SMTP class takes care of it?
     */
    public $Port = 25;
    /**
     * The SMTP HELO of the message.
     * Default is $Hostname. If $Hostname is empty, PHPMailer attempts to find
     * one with the same method described above for $Hostname.
     * @var string
     * @see PHPMailer::$Hostname
     */
    public $Helo = '';
    /**
     * What kind of encryption to use on the SMTP connection.
     * Options: '', 'ssl' or 'tls'
     * @var string
     */
    public $SMTPSecure = '';
    /**
     * Whether to enable TLS encryption automatically if a server supports it,
     * even if `SMTPSecure` is not set to 'tls'.
     * Be aware that in PHP >= 5.6 this requires that the server's certificates are valid.
     * @var boolean
     */
    public $SMTPAutoTLS = \true;
    /**
     * Whether to use SMTP authentication.
     * Uses the Username and Password properties.
     * @var boolean
     * @see PHPMailer::$Username
     * @see PHPMailer::$Password
     */
    public $SMTPAuth = \false;
    /**
     * Options array passed to stream_context_create when connecting via SMTP.
     * @var array
     */
    public $SMTPOptions = array();
    /**
     * SMTP username.
     * @var string
     */
    public $Username = '';
    /**
     * SMTP password.
     * @var string
     */
    public $Password = '';
    /**
     * SMTP auth type.
     * Options are CRAM-MD5, LOGIN, PLAIN, attempted in that order if not specified
     * @var string
     */
    public $AuthType = '';
    /**
     * SMTP realm.
     * Used for NTLM auth
     * @var string
     */
    public $Realm = '';
    /**
     * SMTP workstation.
     * Used for NTLM auth
     * @var string
     */
    public $Workstation = '';
    /**
     * The SMTP server timeout in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @var integer
     */
    public $Timeout = 300;
    /**
     * SMTP class debug output mode.
     * Debug output level.
     * Options:
     * * `0` No output
     * * `1` Commands
     * * `2` Data and commands
     * * `3` As 2 plus connection status
     * * `4` Low-level data output
     * @var integer
     * @see SMTP::$do_debug
     */
    public $SMTPDebug = 0;
    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @var string|callable
     * @see SMTP::$Debugoutput
     */
    public $Debugoutput = 'echo';
    /**
     * Whether to keep SMTP connection open after each message.
     * If this is set to true then to close the connection
     * requires an explicit call to smtpClose().
     * @var boolean
     */
    public $SMTPKeepAlive = \false;
    /**
     * Whether to split multiple to addresses into multiple messages
     * or send them all in one message.
     * Only supported in `mail` and `sendmail` transports, not in SMTP.
     * @var boolean
     */
    public $SingleTo = \false;
    /**
     * Storage for addresses when SingleTo is enabled.
     * @var array
     * @TODO This should really not be public
     */
    public $SingleToArray = array();
    /**
     * Whether to generate VERP addresses on send.
     * Only applicable when sending via SMTP.
     * @link https://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Postfix VERP info
     * @var boolean
     */
    public $do_verp = \false;
    /**
     * Whether to allow sending messages with an empty body.
     * @var boolean
     */
    public $AllowEmpty = \false;
    /**
     * The default line ending.
     * @note The default remains "\n". We force CRLF where we know
     *        it must be used via self::CRLF.
     * @var string
     */
    public $LE = "\n";
    /**
     * DKIM selector.
     * @var string
     */
    public $DKIM_selector = '';
    /**
     * DKIM Identity.
     * Usually the email address used as the source of the email.
     * @var string
     */
    public $DKIM_identity = '';
    /**
     * DKIM passphrase.
     * Used if your key is encrypted.
     * @var string
     */
    public $DKIM_passphrase = '';
    /**
     * DKIM signing domain name.
     * @example 'example.com'
     * @var string
     */
    public $DKIM_domain = '';
    /**
     * DKIM private key file path.
     * @var string
     */
    public $DKIM_private = '';
    /**
     * DKIM private key string.
     * If set, takes precedence over `$DKIM_private`.
     * @var string
     */
    public $DKIM_private_string = '';
    /**
     * Callback Action function name.
     *
     * The function that handles the result of the send email action.
     * It is called out by send() for each email sent.
     *
     * Value can be any php callable: http://www.php.net/is_callable
     *
     * Parameters:
     *   boolean $result        result of the send action
     *   string  $to            email address of the recipient
     *   string  $cc            cc email addresses
     *   string  $bcc           bcc email addresses
     *   string  $subject       the subject
     *   string  $body          the email body
     *   string  $from          email address of sender
     * @var string
     */
    public $action_function = '';
    /**
     * What to put in the X-Mailer header.
     * Options: An empty string for PHPMailer default, whitespace for none, or a string to use
     * @var string
     */
    public $XMailer = '';
    /**
     * Which validator to use by default when validating email addresses.
     * May be a callable to inject your own validator, but there are several built-in validators.
     * @see PHPMailer::validateAddress()
     * @var string|callable
     * @static
     */
    public static $validator = 'auto';
    /**
     * An instance of the SMTP sender class.
     * @var SMTP
     * @access protected
     */
    protected $smtp = \null;
    /**
     * The array of 'to' names and addresses.
     * @var array
     * @access protected
     */
    protected $to = array();
    /**
     * The array of 'cc' names and addresses.
     * @var array
     * @access protected
     */
    protected $cc = array();
    /**
     * The array of 'bcc' names and addresses.
     * @var array
     * @access protected
     */
    protected $bcc = array();
    /**
     * The array of reply-to names and addresses.
     * @var array
     * @access protected
     */
    protected $ReplyTo = array();
    /**
     * An array of all kinds of addresses.
     * Includes all of $to, $cc, $bcc
     * @var array
     * @access protected
     * @see PHPMailer::$to @see PHPMailer::$cc @see PHPMailer::$bcc
     */
    protected $all_recipients = array();
    /**
     * An array of names and addresses queued for validation.
     * In send(), valid and non duplicate entries are moved to $all_recipients
     * and one of $to, $cc, or $bcc.
     * This array is used only for addresses with IDN.
     * @var array
     * @access protected
     * @see PHPMailer::$to @see PHPMailer::$cc @see PHPMailer::$bcc
     * @see PHPMailer::$all_recipients
     */
    protected $RecipientsQueue = array();
    /**
     * An array of reply-to names and addresses queued for validation.
     * In send(), valid and non duplicate entries are moved to $ReplyTo.
     * This array is used only for addresses with IDN.
     * @var array
     * @access protected
     * @see PHPMailer::$ReplyTo
     */
    protected $ReplyToQueue = array();
    /**
     * The array of attachments.
     * @var array
     * @access protected
     */
    protected $attachment = array();
    /**
     * The array of custom headers.
     * @var array
     * @access protected
     */
    protected $CustomHeader = array();
    /**
     * The most recent Message-ID (including angular brackets).
     * @var string
     * @access protected
     */
    protected $lastMessageID = '';
    /**
     * The message's MIME type.
     * @var string
     * @access protected
     */
    protected $message_type = '';
    /**
     * The array of MIME boundary strings.
     * @var array
     * @access protected
     */
    protected $boundary = array();
    /**
     * The array of available languages.
     * @var array
     * @access protected
     */
    protected $language = array();
    /**
     * The number of errors encountered.
     * @var integer
     * @access protected
     */
    protected $error_count = 0;
    /**
     * The S/MIME certificate file path.
     * @var string
     * @access protected
     */
    protected $sign_cert_file = '';
    /**
     * The S/MIME key file path.
     * @var string
     * @access protected
     */
    protected $sign_key_file = '';
    /**
     * The optional S/MIME extra certificates ("CA Chain") file path.
     * @var string
     * @access protected
     */
    protected $sign_extracerts_file = '';
    /**
     * The S/MIME password for the key.
     * Used only if the key is encrypted.
     * @var string
     * @access protected
     */
    protected $sign_key_pass = '';
    /**
     * Whether to throw exceptions for errors.
     * @var boolean
     * @access protected
     */
    protected $exceptions = \false;
    /**
     * Unique ID used for message ID and boundaries.
     * @var string
     * @access protected
     */
    protected $uniqueid = '';
    /**
     * Error severity: message only, continue processing.
     */
    const STOP_MESSAGE = 0;
    /**
     * Error severity: message, likely ok to continue processing.
     */
    const STOP_CONTINUE = 1;
    /**
     * Error severity: message, plus full stop, critical error reached.
     */
    const STOP_CRITICAL = 2;
    /**
     * SMTP RFC standard line ending.
     */
    const CRLF = "\r\n";
    /**
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @var integer
     */
    const MAX_LINE_LENGTH = 998;
    /**
     * Constructor.
     * @param boolean $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = \null)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * Call mail() in a safe_mode-aware fashion.
     * Also, unless sendmail_path points to sendmail (or something that
     * claims to be sendmail), don't pass params (not a perfect fix,
     * but it will do)
     * @param string $to To
     * @param string $subject Subject
     * @param string $body Message Body
     * @param string $header Additional Header(s)
     * @param string $params Params
     * @access private
     * @return boolean
     */
    private function mailPassthru($to, $subject, $body, $header, $params)
    {
    }
    /**
     * Output debugging info via user-defined method.
     * Only generates output if SMTP debug output is enabled (@see SMTP::$do_debug).
     * @see PHPMailer::$Debugoutput
     * @see PHPMailer::$SMTPDebug
     * @param string $str
     */
    protected function edebug($str)
    {
    }
    /**
     * Sets message type to HTML or plain.
     * @param boolean $isHtml True for HTML mode.
     * @return void
     */
    public function isHTML($isHtml = \true)
    {
    }
    /**
     * Send messages using SMTP.
     * @return void
     */
    public function isSMTP()
    {
    }
    /**
     * Send messages using PHP's mail() function.
     * @return void
     */
    public function isMail()
    {
    }
    /**
     * Send messages using $Sendmail.
     * @return void
     */
    public function isSendmail()
    {
    }
    /**
     * Send messages using qmail.
     * @return void
     */
    public function isQmail()
    {
    }
    /**
     * Add a "To" address.
     * @param string $address The email address to send to
     * @param string $name
     * @return boolean true on success, false if address already used or invalid in some way
     */
    public function addAddress($address, $name = '')
    {
    }
    /**
     * Add a "CC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address The email address to send to
     * @param string $name
     * @return boolean true on success, false if address already used or invalid in some way
     */
    public function addCC($address, $name = '')
    {
    }
    /**
     * Add a "BCC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address The email address to send to
     * @param string $name
     * @return boolean true on success, false if address already used or invalid in some way
     */
    public function addBCC($address, $name = '')
    {
    }
    /**
     * Add a "Reply-To" address.
     * @param string $address The email address to reply to
     * @param string $name
     * @return boolean true on success, false if address already used or invalid in some way
     */
    public function addReplyTo($address, $name = '')
    {
    }
    /**
     * Add an address to one of the recipient arrays or to the ReplyTo array. Because PHPMailer
     * can't validate addresses with an IDN without knowing the PHPMailer::$CharSet (that can still
     * be modified after calling this function), addition of such addresses is delayed until send().
     * Addresses that have been added already return false, but do not throw exceptions.
     * @param string $kind One of 'to', 'cc', 'bcc', or 'ReplyTo'
     * @param string $address The email address to send, resp. to reply to
     * @param string $name
     * @throws phpmailerException
     * @return boolean true on success, false if address already used or invalid in some way
     * @access protected
     */
    protected function addOrEnqueueAnAddress($kind, $address, $name)
    {
    }
    /**
     * Add an address to one of the recipient arrays or to the ReplyTo array.
     * Addresses that have been added already return false, but do not throw exceptions.
     * @param string $kind One of 'to', 'cc', 'bcc', or 'ReplyTo'
     * @param string $address The email address to send, resp. to reply to
     * @param string $name
     * @throws phpmailerException
     * @return boolean true on success, false if address already used or invalid in some way
     * @access protected
     */
    protected function addAnAddress($kind, $address, $name = '')
    {
    }
    /**
     * Parse and validate a string containing one or more RFC822-style comma-separated email addresses
     * of the form "display name <address>" into an array of name/address pairs.
     * Uses the imap_rfc822_parse_adrlist function if the IMAP extension is available.
     * Note that quotes in the name part are removed.
     * @param string $addrstr The address list string
     * @param bool $useimap Whether to use the IMAP extension to parse the list
     * @return array
     * @link http://www.andrew.cmu.edu/user/agreen1/testing/mrbs/web/Mail/RFC822.php A more careful implementation
     */
    public function parseAddresses($addrstr, $useimap = \true)
    {
    }
    /**
     * Set the From and FromName properties.
     * @param string $address
     * @param string $name
     * @param boolean $auto Whether to also set the Sender address, defaults to true
     * @throws phpmailerException
     * @return boolean
     */
    public function setFrom($address, $name = '', $auto = \true)
    {
    }
    /**
     * Return the Message-ID header of the last email.
     * Technically this is the value from the last time the headers were created,
     * but it's also the message ID of the last sent message except in
     * pathological cases.
     * @return string
     */
    public function getLastMessageID()
    {
    }
    /**
     * Check that a string looks like an email address.
     * @param string $address The email address to check
     * @param string|callable $patternselect A selector for the validation pattern to use :
     * * `auto` Pick best pattern automatically;
     * * `pcre8` Use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14;
     * * `pcre` Use old PCRE implementation;
     * * `php` Use PHP built-in FILTER_VALIDATE_EMAIL;
     * * `html5` Use the pattern given by the HTML5 spec for 'email' type form input elements.
     * * `noregex` Don't use a regex: super fast, really dumb.
     * Alternatively you may pass in a callable to inject your own validator, for example:
     * PHPMailer::validateAddress('user@example.com', function($address) {
     *     return (strpos($address, '@') !== false);
     * });
     * You can also set the PHPMailer::$validator static to a callable, allowing built-in methods to use your validator.
     * @return boolean
     * @static
     * @access public
     */
    public static function validateAddress($address, $patternselect = \null)
    {
    }
    /**
     * Tells whether IDNs (Internationalized Domain Names) are supported or not. This requires the
     * "intl" and "mbstring" PHP extensions.
     * @return bool "true" if required functions for IDN support are present
     */
    public function idnSupported()
    {
    }
    /**
     * Converts IDN in given email address to its ASCII form, also known as punycode, if possible.
     * Important: Address must be passed in same encoding as currently set in PHPMailer::$CharSet.
     * This function silently returns unmodified address if:
     * - No conversion is necessary (i.e. domain name is not an IDN, or is already in ASCII form)
     * - Conversion to punycode is impossible (e.g. required PHP functions are not available)
     *   or fails for any reason (e.g. domain has characters not allowed in an IDN)
     * @see PHPMailer::$CharSet
     * @param string $address The email address to convert
     * @return string The encoded address in ASCII form
     */
    public function punyencodeAddress($address)
    {
    }
    /**
     * Create a message and send it.
     * Uses the sending method specified by $Mailer.
     * @throws phpmailerException
     * @return boolean false on error - See the ErrorInfo property for details of the error.
     */
    public function send()
    {
    }
    /**
     * Prepare a message for sending.
     * @throws phpmailerException
     * @return boolean
     */
    public function preSend()
    {
    }
    /**
     * Actually send a message.
     * Send the email via the selected mechanism
     * @throws phpmailerException
     * @return boolean
     */
    public function postSend()
    {
    }
    /**
     * Send mail using the $Sendmail program.
     * @param string $header The message headers
     * @param string $body The message body
     * @see PHPMailer::$Sendmail
     * @throws phpmailerException
     * @access protected
     * @return boolean
     */
    protected function sendmailSend($header, $body)
    {
    }
    /**
     * Fix CVE-2016-10033 and CVE-2016-10045 by disallowing potentially unsafe shell characters.
     *
     * Note that escapeshellarg and escapeshellcmd are inadequate for our purposes, especially on Windows.
     * @param string $string The string to be validated
     * @see https://github.com/PHPMailer/PHPMailer/issues/924 CVE-2016-10045 bug report
     * @access protected
     * @return boolean
     */
    protected static function isShellSafe($string)
    {
    }
    /**
     * Send mail using the PHP mail() function.
     * @param string $header The message headers
     * @param string $body The message body
     * @link http://www.php.net/manual/en/book.mail.php
     * @throws phpmailerException
     * @access protected
     * @return boolean
     */
    protected function mailSend($header, $body)
    {
    }
    /**
     * Get an instance to use for SMTP operations.
     * Override this function to load your own SMTP implementation
     * @return SMTP
     */
    public function getSMTPInstance()
    {
    }
    /**
     * Send mail via SMTP.
     * Returns false if there is a bad MAIL FROM, RCPT, or DATA input.
     * Uses the PHPMailerSMTP class by default.
     * @see PHPMailer::getSMTPInstance() to use a different class.
     * @param string $header The message headers
     * @param string $body The message body
     * @throws phpmailerException
     * @uses SMTP
     * @access protected
     * @return boolean
     */
    protected function smtpSend($header, $body)
    {
    }
    /**
     * Initiate a connection to an SMTP server.
     * Returns false if the operation failed.
     * @param array $options An array of options compatible with stream_context_create()
     * @uses SMTP
     * @access public
     * @throws phpmailerException
     * @return boolean
     */
    public function smtpConnect($options = \null)
    {
    }
    /**
     * Close the active SMTP session if one exists.
     * @return void
     */
    public function smtpClose()
    {
    }
    /**
     * Set the language for error messages.
     * Returns false if it cannot load the language file.
     * The default language is English.
     * @param string $langcode ISO 639-1 2-character language code (e.g. French is "fr")
     * @param string $lang_path Path to the language file directory, with trailing separator (slash)
     * @return boolean
     * @access public
     */
    public function setLanguage($langcode = 'en', $lang_path = '')
    {
    }
    /**
     * Get the array of strings for the current language.
     * @return array
     */
    public function getTranslations()
    {
    }
    /**
     * Create recipient headers.
     * @access public
     * @param string $type
     * @param array $addr An array of recipient,
     * where each recipient is a 2-element indexed array with element 0 containing an address
     * and element 1 containing a name, like:
     * array(array('joe@example.com', 'Joe User'), array('zoe@example.com', 'Zoe User'))
     * @return string
     */
    public function addrAppend($type, $addr)
    {
    }
    /**
     * Format an address for use in a message header.
     * @access public
     * @param array $addr A 2-element indexed array, element 0 containing an address, element 1 containing a name
     *      like array('joe@example.com', 'Joe User')
     * @return string
     */
    public function addrFormat($addr)
    {
    }
    /**
     * Word-wrap message.
     * For use with mailers that do not automatically perform wrapping
     * and for quoted-printable encoded messages.
     * Original written by philippe.
     * @param string $message The message to wrap
     * @param integer $length The line length to wrap to
     * @param boolean $qp_mode Whether to run in Quoted-Printable mode
     * @access public
     * @return string
     */
    public function wrapText($message, $length, $qp_mode = \false)
    {
    }
    /**
     * Find the last character boundary prior to $maxLength in a utf-8
     * quoted-printable encoded string.
     * Original written by Colin Brown.
     * @access public
     * @param string $encodedText utf-8 QP text
     * @param integer $maxLength Find the last character boundary prior to this length
     * @return integer
     */
    public function utf8CharBoundary($encodedText, $maxLength)
    {
    }
    /**
     * Apply word wrapping to the message body.
     * Wraps the message body to the number of chars set in the WordWrap property.
     * You should only do this to plain-text bodies as wrapping HTML tags may break them.
     * This is called automatically by createBody(), so you don't need to call it yourself.
     * @access public
     * @return void
     */
    public function setWordWrap()
    {
    }
    /**
     * Assemble message headers.
     * @access public
     * @return string The assembled headers
     */
    public function createHeader()
    {
    }
    /**
     * Get the message MIME type headers.
     * @access public
     * @return string
     */
    public function getMailMIME()
    {
    }
    /**
     * Returns the whole MIME message.
     * Includes complete headers and body.
     * Only valid post preSend().
     * @see PHPMailer::preSend()
     * @access public
     * @return string
     */
    public function getSentMIMEMessage()
    {
    }
    /**
     * Create unique ID
     * @return string
     */
    protected function generateId()
    {
    }
    /**
     * Assemble the message body.
     * Returns an empty string on failure.
     * @access public
     * @throws phpmailerException
     * @return string The assembled message body
     */
    public function createBody()
    {
    }
    /**
     * Return the start of a message boundary.
     * @access protected
     * @param string $boundary
     * @param string $charSet
     * @param string $contentType
     * @param string $encoding
     * @return string
     */
    protected function getBoundary($boundary, $charSet, $contentType, $encoding)
    {
    }
    /**
     * Return the end of a message boundary.
     * @access protected
     * @param string $boundary
     * @return string
     */
    protected function endBoundary($boundary)
    {
    }
    /**
     * Set the message type.
     * PHPMailer only supports some preset message types, not arbitrary MIME structures.
     * @access protected
     * @return void
     */
    protected function setMessageType()
    {
    }
    /**
     * Format a header line.
     * @access public
     * @param string $name
     * @param string $value
     * @return string
     */
    public function headerLine($name, $value)
    {
    }
    /**
     * Return a formatted mail line.
     * @access public
     * @param string $value
     * @return string
     */
    public function textLine($value)
    {
    }
    /**
     * Add an attachment from a path on the filesystem.
     * Never use a user-supplied path to a file!
     * Returns false if the file could not be found or read.
     * @param string $path Path to the attachment.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @throws phpmailerException
     * @return boolean
     */
    public function addAttachment($path, $name = '', $encoding = 'base64', $type = '', $disposition = 'attachment')
    {
    }
    /**
     * Return the array of attachments.
     * @return array
     */
    public function getAttachments()
    {
    }
    /**
     * Attach all file, string, and binary attachments to the message.
     * Returns an empty string on failure.
     * @access protected
     * @param string $disposition_type
     * @param string $boundary
     * @return string
     */
    protected function attachAll($disposition_type, $boundary)
    {
    }
    /**
     * Encode a file attachment in requested format.
     * Returns an empty string on failure.
     * @param string $path The full path to the file
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @throws phpmailerException
     * @access protected
     * @return string
     */
    protected function encodeFile($path, $encoding = 'base64')
    {
    }
    /**
     * Encode a string in requested format.
     * Returns an empty string on failure.
     * @param string $str The text to encode
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @access public
     * @return string
     */
    public function encodeString($str, $encoding = 'base64')
    {
    }
    /**
     * Encode a header string optimally.
     * Picks shortest of Q, B, quoted-printable or none.
     * @access public
     * @param string $str
     * @param string $position
     * @return string
     */
    public function encodeHeader($str, $position = 'text')
    {
    }
    /**
     * Check if a string contains multi-byte characters.
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @return boolean
     */
    public function hasMultiBytes($str)
    {
    }
    /**
     * Does a string contain any 8-bit chars (in any charset)?
     * @param string $text
     * @return boolean
     */
    public function has8bitChars($text)
    {
    }
    /**
     * Encode and wrap long multibyte strings for mail headers
     * without breaking lines within a character.
     * Adapted from a function by paravoid
     * @link http://www.php.net/manual/en/function.mb-encode-mimeheader.php#60283
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @param string $linebreak string to use as linefeed/end-of-line
     * @return string
     */
    public function base64EncodeWrapMB($str, $linebreak = \null)
    {
    }
    /**
     * Encode a string in quoted-printable format.
     * According to RFC2045 section 6.7.
     * @access public
     * @param string $string The text to encode
     * @param integer $line_max Number of chars allowed on a line before wrapping
     * @return string
     * @link http://www.php.net/manual/en/function.quoted-printable-decode.php#89417 Adapted from this comment
     */
    public function encodeQP($string, $line_max = 76)
    {
    }
    /**
     * Backward compatibility wrapper for an old QP encoding function that was removed.
     * @see PHPMailer::encodeQP()
     * @access public
     * @param string $string
     * @param integer $line_max
     * @param boolean $space_conv
     * @return string
     * @deprecated Use encodeQP instead.
     */
    public function encodeQPphp($string, $line_max = 76, $space_conv = \false)
    {
    }
    /**
     * Encode a string using Q encoding.
     * @link http://tools.ietf.org/html/rfc2047
     * @param string $str the text to encode
     * @param string $position Where the text is going to be used, see the RFC for what that means
     * @access public
     * @return string
     */
    public function encodeQ($str, $position = 'text')
    {
    }
    /**
     * Add a string or binary attachment (non-filesystem).
     * This method can be used to attach ascii or binary data,
     * such as a BLOB record from a database.
     * @param string $string String attachment data.
     * @param string $filename Name of the attachment.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @return void
     */
    public function addStringAttachment($string, $filename, $encoding = 'base64', $type = '', $disposition = 'attachment')
    {
    }
    /**
     * Add an embedded (inline) attachment from a file.
     * This can include images, sounds, and just about any other document type.
     * These differ from 'regular' attachments in that they are intended to be
     * displayed inline with the message, not just attached for download.
     * This is used in HTML messages that embed the images
     * the HTML refers to using the $cid value.
     * Never use a user-supplied path to a file!
     * @param string $path Path to the attachment.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File MIME type.
     * @param string $disposition Disposition to use
     * @return boolean True on successfully adding an attachment
     */
    public function addEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = '', $disposition = 'inline')
    {
    }
    /**
     * Add an embedded stringified attachment.
     * This can include images, sounds, and just about any other document type.
     * Be sure to set the $type to an image type for images:
     * JPEG images use 'image/jpeg', GIF uses 'image/gif', PNG uses 'image/png'.
     * @param string $string The attachment binary data.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type MIME type.
     * @param string $disposition Disposition to use
     * @return boolean True on successfully adding an attachment
     */
    public function addStringEmbeddedImage($string, $cid, $name = '', $encoding = 'base64', $type = '', $disposition = 'inline')
    {
    }
    /**
     * Check if an inline attachment is present.
     * @access public
     * @return boolean
     */
    public function inlineImageExists()
    {
    }
    /**
     * Check if an attachment (non-inline) is present.
     * @return boolean
     */
    public function attachmentExists()
    {
    }
    /**
     * Check if this message has an alternative body set.
     * @return boolean
     */
    public function alternativeExists()
    {
    }
    /**
     * Clear queued addresses of given kind.
     * @access protected
     * @param string $kind 'to', 'cc', or 'bcc'
     * @return void
     */
    public function clearQueuedAddresses($kind)
    {
    }
    /**
     * Clear all To recipients.
     * @return void
     */
    public function clearAddresses()
    {
    }
    /**
     * Clear all CC recipients.
     * @return void
     */
    public function clearCCs()
    {
    }
    /**
     * Clear all BCC recipients.
     * @return void
     */
    public function clearBCCs()
    {
    }
    /**
     * Clear all ReplyTo recipients.
     * @return void
     */
    public function clearReplyTos()
    {
    }
    /**
     * Clear all recipient types.
     * @return void
     */
    public function clearAllRecipients()
    {
    }
    /**
     * Clear all filesystem, string, and binary attachments.
     * @return void
     */
    public function clearAttachments()
    {
    }
    /**
     * Clear all custom headers.
     * @return void
     */
    public function clearCustomHeaders()
    {
    }
    /**
     * Add an error message to the error container.
     * @access protected
     * @param string $msg
     * @return void
     */
    protected function setError($msg)
    {
    }
    /**
     * Return an RFC 822 formatted date.
     * @access public
     * @return string
     * @static
     */
    public static function rfcDate()
    {
    }
    /**
     * Get the server hostname.
     * Returns 'localhost.localdomain' if unknown.
     * @access protected
     * @return string
     */
    protected function serverHostname()
    {
    }
    /**
     * Get an error message in the current language.
     * @access protected
     * @param string $key
     * @return string
     */
    protected function lang($key)
    {
    }
    /**
     * Check if an error occurred.
     * @access public
     * @return boolean True if an error did occur.
     */
    public function isError()
    {
    }
    /**
     * Ensure consistent line endings in a string.
     * Changes every end of line from CRLF, CR or LF to $this->LE.
     * @access public
     * @param string $str String to fixEOL
     * @return string
     */
    public function fixEOL($str)
    {
    }
    /**
     * Add a custom header.
     * $name value can be overloaded to contain
     * both header name and value (name:value)
     * @access public
     * @param string $name Custom header name
     * @param string $value Header value
     * @return void
     */
    public function addCustomHeader($name, $value = \null)
    {
    }
    /**
     * Returns all custom headers.
     * @return array
     */
    public function getCustomHeaders()
    {
    }
    /**
     * Create a message body from an HTML string.
     * Automatically inlines images and creates a plain-text version by converting the HTML,
     * overwriting any existing values in Body and AltBody.
     * Do not source $message content from user input!
     * $basedir is prepended when handling relative URLs, e.g. <img src="/images/a.png"> and must not be empty
     * will look for an image file in $basedir/images/a.png and convert it to inline.
     * If you don't provide a $basedir, relative paths will be left untouched (and thus probably break in email)
     * If you don't want to apply these transformations to your HTML, just set Body and AltBody directly.
     * @access public
     * @param string $message HTML message string
     * @param string $basedir Absolute path to a base directory to prepend to relative paths to images
     * @param boolean|callable $advanced Whether to use the internal HTML to text converter
     *    or your own custom converter @see PHPMailer::html2text()
     * @return string $message The transformed message Body
     */
    public function msgHTML($message, $basedir = '', $advanced = \false)
    {
    }
    /**
     * Convert an HTML string into plain text.
     * This is used by msgHTML().
     * Note - older versions of this function used a bundled advanced converter
     * which was been removed for license reasons in #232.
     * Example usage:
     * <code>
     * // Use default conversion
     * $plain = $mail->html2text($html);
     * // Use your own custom converter
     * $plain = $mail->html2text($html, function($html) {
     *     $converter = new MyHtml2text($html);
     *     return $converter->get_text();
     * });
     * </code>
     * @param string $html The HTML text to convert
     * @param boolean|callable $advanced Any boolean value to use the internal converter,
     *   or provide your own callable for custom conversion.
     * @return string
     */
    public function html2text($html, $advanced = \false)
    {
    }
    /**
     * Get the MIME type for a file extension.
     * @param string $ext File extension
     * @access public
     * @return string MIME type of file.
     * @static
     */
    public static function _mime_types($ext = '')
    {
    }
    /**
     * Map a file name to a MIME type.
     * Defaults to 'application/octet-stream', i.e.. arbitrary binary data.
     * @param string $filename A file name or full path, does not need to exist as a file
     * @return string
     * @static
     */
    public static function filenameToType($filename)
    {
    }
    /**
     * Multi-byte-safe pathinfo replacement.
     * Drop-in replacement for pathinfo(), but multibyte-safe, cross-platform-safe, old-version-safe.
     * Works similarly to the one in PHP >= 5.2.0
     * @link http://www.php.net/manual/en/function.pathinfo.php#107461
     * @param string $path A filename or path, does not need to exist as a file
     * @param integer|string $options Either a PATHINFO_* constant,
     *      or a string name to return only the specified piece, allows 'filename' to work on PHP < 5.2
     * @return string|array
     * @static
     */
    public static function mb_pathinfo($path, $options = \null)
    {
    }
    /**
     * Set or reset instance properties.
     * You should avoid this function - it's more verbose, less efficient, more error-prone and
     * harder to debug than setting properties directly.
     * Usage Example:
     * `$mail->set('SMTPSecure', 'tls');`
     *   is the same as:
     * `$mail->SMTPSecure = 'tls';`
     * @access public
     * @param string $name The property name to set
     * @param mixed $value The value to set the property to
     * @return boolean
     * @TODO Should this not be using the __set() magic function?
     */
    public function set($name, $value = '')
    {
    }
    /**
     * Strip newlines to prevent header injection.
     * @access public
     * @param string $str
     * @return string
     */
    public function secureHeader($str)
    {
    }
    /**
     * Normalize line breaks in a string.
     * Converts UNIX LF, Mac CR and Windows CRLF line breaks into a single line break format.
     * Defaults to CRLF (for message bodies) and preserves consecutive breaks.
     * @param string $text
     * @param string $breaktype What kind of line break to use, defaults to CRLF
     * @return string
     * @access public
     * @static
     */
    public static function normalizeBreaks($text, $breaktype = "\r\n")
    {
    }
    /**
     * Set the public and private key files and password for S/MIME signing.
     * @access public
     * @param string $cert_filename
     * @param string $key_filename
     * @param string $key_pass Password for private key
     * @param string $extracerts_filename Optional path to chain certificate
     */
    public function sign($cert_filename, $key_filename, $key_pass, $extracerts_filename = '')
    {
    }
    /**
     * Quoted-Printable-encode a DKIM header.
     * @access public
     * @param string $txt
     * @return string
     */
    public function DKIM_QP($txt)
    {
    }
    /**
     * Generate a DKIM signature.
     * @access public
     * @param string $signHeader
     * @throws phpmailerException
     * @return string The DKIM signature value
     */
    public function DKIM_Sign($signHeader)
    {
    }
    /**
     * Generate a DKIM canonicalization header.
     * @access public
     * @param string $signHeader Header
     * @return string
     */
    public function DKIM_HeaderC($signHeader)
    {
    }
    /**
     * Generate a DKIM canonicalization body.
     * @access public
     * @param string $body Message Body
     * @return string
     */
    public function DKIM_BodyC($body)
    {
    }
    /**
     * Create the DKIM header and body in a new message header.
     * @access public
     * @param string $headers_line Header lines
     * @param string $subject Subject
     * @param string $body Body
     * @return string
     */
    public function DKIM_Add($headers_line, $subject, $body)
    {
    }
    /**
     * Detect if a string contains a line longer than the maximum line length allowed.
     * @param string $str
     * @return boolean
     * @static
     */
    public static function hasLineLongerThanMax($str)
    {
    }
    /**
     * Allows for public read access to 'to' property.
     * @note: Before the send() call, queued addresses (i.e. with IDN) are not yet included.
     * @access public
     * @return array
     */
    public function getToAddresses()
    {
    }
    /**
     * Allows for public read access to 'cc' property.
     * @note: Before the send() call, queued addresses (i.e. with IDN) are not yet included.
     * @access public
     * @return array
     */
    public function getCcAddresses()
    {
    }
    /**
     * Allows for public read access to 'bcc' property.
     * @note: Before the send() call, queued addresses (i.e. with IDN) are not yet included.
     * @access public
     * @return array
     */
    public function getBccAddresses()
    {
    }
    /**
     * Allows for public read access to 'ReplyTo' property.
     * @note: Before the send() call, queued addresses (i.e. with IDN) are not yet included.
     * @access public
     * @return array
     */
    public function getReplyToAddresses()
    {
    }
    /**
     * Allows for public read access to 'all_recipients' property.
     * @note: Before the send() call, queued addresses (i.e. with IDN) are not yet included.
     * @access public
     * @return array
     */
    public function getAllRecipientAddresses()
    {
    }
    /**
     * Perform a callback.
     * @param boolean $isSent
     * @param array $to
     * @param array $cc
     * @param array $bcc
     * @param string $subject
     * @param string $body
     * @param string $from
     */
    protected function doCallback($isSent, $to, $cc, $bcc, $subject, $body, $from)
    {
    }
}
/**
 * PHPMailer exception handler
 * @package PHPMailer
 */
class phpmailerException extends \Exception
{
    /**
     * Prettify error message output
     * @return string
     */
    public function errorMessage()
    {
    }
}
/**
 * mail_fetch/setup.php
 *
 * Copyright (c) 1999-2011 CDI (cdi@thewebmasters.net) All Rights Reserved
 * Modified by Philippe Mingo 2001-2009 mingo@rotedic.com
 * An RFC 1939 compliant wrapper class for the POP3 protocol.
 *
 * Licensed under the GNU GPL. For full terms see the file COPYING.
 *
 * POP3 class
 *
 * @copyright 1999-2011 The SquirrelMail Project Team
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package plugins
 * @subpackage mail_fetch
 */
class POP3
{
    var $ERROR = '';
    //  Error string.
    var $TIMEOUT = 60;
    //  Default timeout before giving up on a
    //  network operation.
    var $COUNT = -1;
    //  Mailbox msg count
    var $BUFFER = 512;
    //  Socket buffer for socket fgets() calls.
    //  Per RFC 1939 the returned line a POP3
    //  server can send is 512 bytes.
    var $FP = '';
    //  The connection to the server's
    //  file descriptor
    var $MAILSERVER = '';
    // Set this to hard code the server name
    var $DEBUG = \FALSE;
    // set to true to echo pop3
    // commands and responses to error_log
    // this WILL log passwords!
    var $BANNER = '';
    //  Holds the banner returned by the
    //  pop server - used for apop()
    var $ALLOWAPOP = \FALSE;
    //  Allow or disallow apop()
    //  This must be set to true
    //  manually
    /**
     * PHP5 constructor.
     */
    function __construct($server = '', $timeout = '')
    {
    }
    /**
     * PHP4 constructor.
     */
    public function POP3($server = '', $timeout = '')
    {
    }
    function update_timer()
    {
    }
    function connect($server, $port = 110)
    {
    }
    function user($user = "")
    {
    }
    function pass($pass = "")
    {
    }
    function apop($login, $pass)
    {
    }
    function login($login = "", $pass = "")
    {
    }
    function top($msgNum, $numLines = "0")
    {
    }
    function pop_list($msgNum = "")
    {
    }
    function get($msgNum)
    {
    }
    function last($type = "count")
    {
    }
    function reset()
    {
    }
    function send_cmd($cmd = "")
    {
    }
    function quit()
    {
    }
    function popstat()
    {
    }
    function uidl($msgNum = "")
    {
    }
    function delete($msgNum = "")
    {
    }
    //  *********************************************************
    //  The following methods are internal to the class.
    function is_ok($cmd = "")
    {
    }
    function strip_clf($text = "")
    {
    }
    function parse_banner($server_text)
    {
    }
}