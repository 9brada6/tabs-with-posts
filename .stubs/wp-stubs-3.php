<?php
/**
 * Requests for PHP
 *
 * Inspired by Requests for Python.
 *
 * Based on concepts from SimplePie_File, RequestCore and WP_Http.
 *
 * @package Requests
 */
/**
 * Requests for PHP
 *
 * Inspired by Requests for Python.
 *
 * Based on concepts from SimplePie_File, RequestCore and WP_Http.
 *
 * @package Requests
 */
class Requests
{
    /**
     * POST method
     *
     * @var string
     */
    const POST = 'POST';
    /**
     * PUT method
     *
     * @var string
     */
    const PUT = 'PUT';
    /**
     * GET method
     *
     * @var string
     */
    const GET = 'GET';
    /**
     * HEAD method
     *
     * @var string
     */
    const HEAD = 'HEAD';
    /**
     * DELETE method
     *
     * @var string
     */
    const DELETE = 'DELETE';
    /**
     * OPTIONS method
     *
     * @var string
     */
    const OPTIONS = 'OPTIONS';
    /**
     * TRACE method
     *
     * @var string
     */
    const TRACE = 'TRACE';
    /**
     * PATCH method
     *
     * @link https://tools.ietf.org/html/rfc5789
     * @var string
     */
    const PATCH = 'PATCH';
    /**
     * Default size of buffer size to read streams
     *
     * @var integer
     */
    const BUFFER_SIZE = 1160;
    /**
     * Current version of Requests
     *
     * @var string
     */
    const VERSION = '1.7';
    /**
     * Registered transport classes
     *
     * @var array
     */
    protected static $transports = array();
    /**
     * Selected transport name
     *
     * Use {@see get_transport()} instead
     *
     * @var array
     */
    public static $transport = array();
    /**
     * Default certificate path.
     *
     * @see Requests::get_certificate_path()
     * @see Requests::set_certificate_path()
     *
     * @var string
     */
    protected static $certificate_path;
    /**
     * This is a static class, do not instantiate it
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
    /**
     * Autoloader for Requests
     *
     * Register this with {@see register_autoloader()} if you'd like to avoid
     * having to create your own.
     *
     * (You can also use `spl_autoload_register` directly if you'd prefer.)
     *
     * @codeCoverageIgnore
     *
     * @param string $class Class name to load
     */
    public static function autoloader($class)
    {
    }
    /**
     * Register the built-in autoloader
     *
     * @codeCoverageIgnore
     */
    public static function register_autoloader()
    {
    }
    /**
     * Register a transport
     *
     * @param string $transport Transport class to add, must support the Requests_Transport interface
     */
    public static function add_transport($transport)
    {
    }
    /**
     * Get a working transport
     *
     * @throws Requests_Exception If no valid transport is found (`notransport`)
     * @return Requests_Transport
     */
    protected static function get_transport($capabilities = array())
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
    public static function get($url, $headers = array(), $options = array())
    {
    }
    /**
     * Send a HEAD request
     */
    public static function head($url, $headers = array(), $options = array())
    {
    }
    /**
     * Send a DELETE request
     */
    public static function delete($url, $headers = array(), $options = array())
    {
    }
    /**
     * Send a TRACE request
     */
    public static function trace($url, $headers = array(), $options = array())
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
    public static function post($url, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Send a PUT request
     */
    public static function put($url, $headers = array(), $data = array(), $options = array())
    {
    }
    /**
     * Send an OPTIONS request
     */
    public static function options($url, $headers = array(), $data = array(), $options = array())
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
    public static function patch($url, $headers, $data = array(), $options = array())
    {
    }
    /**#@-*/
    /**
     * Main interface for HTTP requests
     *
     * This method initiates a request and sends it via a transport before
     * parsing.
     *
     * The `$options` parameter takes an associative array with the following
     * options:
     *
     * - `timeout`: How long should we wait for a response?
     *    Note: for cURL, a minimum of 1 second applies, as DNS resolution
     *    operates at second-resolution only.
     *    (float, seconds with a millisecond precision, default: 10, example: 0.01)
     * - `connect_timeout`: How long should we wait while trying to connect?
     *    (float, seconds with a millisecond precision, default: 10, example: 0.01)
     * - `useragent`: Useragent to send to the server
     *    (string, default: php-requests/$version)
     * - `follow_redirects`: Should we follow 3xx redirects?
     *    (boolean, default: true)
     * - `redirects`: How many times should we redirect before erroring?
     *    (integer, default: 10)
     * - `blocking`: Should we block processing on this request?
     *    (boolean, default: true)
     * - `filename`: File to stream the body to instead.
     *    (string|boolean, default: false)
     * - `auth`: Authentication handler or array of user/password details to use
     *    for Basic authentication
     *    (Requests_Auth|array|boolean, default: false)
     * - `proxy`: Proxy details to use for proxy by-passing and authentication
     *    (Requests_Proxy|array|string|boolean, default: false)
     * - `max_bytes`: Limit for the response body size.
     *    (integer|boolean, default: false)
     * - `idn`: Enable IDN parsing
     *    (boolean, default: true)
     * - `transport`: Custom transport. Either a class name, or a
     *    transport object. Defaults to the first working transport from
     *    {@see getTransport()}
     *    (string|Requests_Transport, default: {@see getTransport()})
     * - `hooks`: Hooks handler.
     *    (Requests_Hooker, default: new Requests_Hooks())
     * - `verify`: Should we verify SSL certificates? Allows passing in a custom
     *    certificate file as a string. (Using true uses the system-wide root
     *    certificate store instead, but this may have different behaviour
     *    across transports.)
     *    (string|boolean, default: library/Requests/Transport/cacert.pem)
     * - `verifyname`: Should we verify the common name in the SSL certificate?
     *    (boolean: default, true)
     * - `data_format`: How should we send the `$data` parameter?
     *    (string, one of 'query' or 'body', default: 'query' for
     *    HEAD/GET/DELETE, 'body' for POST/PUT/OPTIONS/PATCH)
     *
     * @throws Requests_Exception On invalid URLs (`nonhttp`)
     *
     * @param string $url URL to request
     * @param array $headers Extra headers to send with the request
     * @param array|null $data Data to send either as a query string for GET/HEAD requests, or in the body for POST requests
     * @param string $type HTTP request type (use Requests constants)
     * @param array $options Options for the request (see description for more information)
     * @return Requests_Response
     */
    public static function request($url, $headers = array(), $data = array(), $type = self::GET, $options = array())
    {
    }
    /**
     * Send multiple HTTP requests simultaneously
     *
     * The `$requests` parameter takes an associative or indexed array of
     * request fields. The key of each request can be used to match up the
     * request with the returned data, or with the request passed into your
     * `multiple.request.complete` callback.
     *
     * The request fields value is an associative array with the following keys:
     *
     * - `url`: Request URL Same as the `$url` parameter to
     *    {@see Requests::request}
     *    (string, required)
     * - `headers`: Associative array of header fields. Same as the `$headers`
     *    parameter to {@see Requests::request}
     *    (array, default: `array()`)
     * - `data`: Associative array of data fields or a string. Same as the
     *    `$data` parameter to {@see Requests::request}
     *    (array|string, default: `array()`)
     * - `type`: HTTP request type (use Requests constants). Same as the `$type`
     *    parameter to {@see Requests::request}
     *    (string, default: `Requests::GET`)
     * - `cookies`: Associative array of cookie name to value, or cookie jar.
     *    (array|Requests_Cookie_Jar)
     *
     * If the `$options` parameter is specified, individual requests will
     * inherit options from it. This can be used to use a single hooking system,
     * or set all the types to `Requests::POST`, for example.
     *
     * In addition, the `$options` parameter takes the following global options:
     *
     * - `complete`: A callback for when a request is complete. Takes two
     *    parameters, a Requests_Response/Requests_Exception reference, and the
     *    ID from the request array (Note: this can also be overridden on a
     *    per-request basis, although that's a little silly)
     *    (callback)
     *
     * @param array $requests Requests data (see description for more information)
     * @param array $options Global and default options (see {@see Requests::request})
     * @return array Responses (either Requests_Response or a Requests_Exception object)
     */
    public static function request_multiple($requests, $options = array())
    {
    }
    /**
     * Get the default options
     *
     * @see Requests::request() for values returned by this method
     * @param boolean $multirequest Is this a multirequest?
     * @return array Default option values
     */
    protected static function get_default_options($multirequest = \false)
    {
    }
    /**
     * Get default certificate path.
     *
     * @return string Default certificate path.
     */
    public static function get_certificate_path()
    {
    }
    /**
     * Set default certificate path.
     *
     * @param string $path Certificate path, pointing to a PEM file.
     */
    public static function set_certificate_path($path)
    {
    }
    /**
     * Set the default values
     *
     * @param string $url URL to request
     * @param array $headers Extra headers to send with the request
     * @param array|null $data Data to send either as a query string for GET/HEAD requests, or in the body for POST requests
     * @param string $type HTTP request type
     * @param array $options Options for the request
     * @return array $options
     */
    protected static function set_defaults(&$url, &$headers, &$data, &$type, &$options)
    {
    }
    /**
     * HTTP response parser
     *
     * @throws Requests_Exception On missing head/body separator (`requests.no_crlf_separator`)
     * @throws Requests_Exception On missing head/body separator (`noversion`)
     * @throws Requests_Exception On missing head/body separator (`toomanyredirects`)
     *
     * @param string $headers Full response text including headers and body
     * @param string $url Original request URL
     * @param array $req_headers Original $headers array passed to {@link request()}, in case we need to follow redirects
     * @param array $req_data Original $data array passed to {@link request()}, in case we need to follow redirects
     * @param array $options Original $options array passed to {@link request()}, in case we need to follow redirects
     * @return Requests_Response
     */
    protected static function parse_response($headers, $url, $req_headers, $req_data, $options)
    {
    }
    /**
     * Callback for `transport.internal.parse_response`
     *
     * Internal use only. Converts a raw HTTP response to a Requests_Response
     * while still executing a multiple request.
     *
     * @param string $response Full response text including headers and body (will be overwritten with Response instance)
     * @param array $request Request data as passed into {@see Requests::request_multiple()}
     * @return null `$response` is either set to a Requests_Response instance, or a Requests_Exception object
     */
    public static function parse_multiple(&$response, $request)
    {
    }
    /**
     * Decoded a chunked body as per RFC 2616
     *
     * @see https://tools.ietf.org/html/rfc2616#section-3.6.1
     * @param string $data Chunked body
     * @return string Decoded body
     */
    protected static function decode_chunked($data)
    {
    }
    // @codeCoverageIgnoreEnd
    /**
     * Convert a key => value array to a 'key: value' array for headers
     *
     * @param array $array Dictionary of header values
     * @return array List of headers
     */
    public static function flatten($array)
    {
    }
    /**
     * Convert a key => value array to a 'key: value' array for headers
     *
     * @codeCoverageIgnore
     * @deprecated Misspelling of {@see Requests::flatten}
     * @param array $array Dictionary of header values
     * @return array List of headers
     */
    public static function flattern($array)
    {
    }
    /**
     * Decompress an encoded body
     *
     * Implements gzip, compress and deflate. Guesses which it is by attempting
     * to decode.
     *
     * @param string $data Compressed data in one of the above formats
     * @return string Decompressed string
     */
    public static function decompress($data)
    {
    }
    /**
     * Decompression of deflated string while staying compatible with the majority of servers.
     *
     * Certain Servers will return deflated data with headers which PHP's gzinflate()
     * function cannot handle out of the box. The following function has been created from
     * various snippets on the gzinflate() PHP documentation.
     *
     * Warning: Magic numbers within. Due to the potential different formats that the compressed
     * data may be returned in, some "magic offsets" are needed to ensure proper decompression
     * takes place. For a simple progmatic way to determine the magic offset in use, see:
     * https://core.trac.wordpress.org/ticket/18273
     *
     * @since 2.8.1
     * @link https://core.trac.wordpress.org/ticket/18273
     * @link https://secure.php.net/manual/en/function.gzinflate.php#70875
     * @link https://secure.php.net/manual/en/function.gzinflate.php#77336
     *
     * @param string $gzData String to decompress.
     * @return string|bool False on failure.
     */
    public static function compatible_gzinflate($gzData)
    {
    }
    public static function match_domain($host, $reference)
    {
    }
}
/**
 * PHPMailer RFC821 SMTP email transport class.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * PHPMailer RFC821 SMTP email transport class.
 * Implements RFC 821 SMTP commands and provides some utility methods for sending mail to an SMTP server.
 * @package PHPMailer
 * @author Chris Ryan
 * @author Marcus Bointon <phpmailer@synchromedia.co.uk>
 */
class SMTP
{
    /**
     * The PHPMailer SMTP version number.
     * @var string
     */
    const VERSION = '5.2.22';
    /**
     * SMTP line break constant.
     * @var string
     */
    const CRLF = "\r\n";
    /**
     * The SMTP port to use if one is not specified.
     * @var integer
     */
    const DEFAULT_SMTP_PORT = 25;
    /**
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @var integer
     */
    const MAX_LINE_LENGTH = 998;
    /**
     * Debug level for no output
     */
    const DEBUG_OFF = 0;
    /**
     * Debug level to show client -> server messages
     */
    const DEBUG_CLIENT = 1;
    /**
     * Debug level to show client -> server and server -> client messages
     */
    const DEBUG_SERVER = 2;
    /**
     * Debug level to show connection status, client -> server and server -> client messages
     */
    const DEBUG_CONNECTION = 3;
    /**
     * Debug level to show all messages
     */
    const DEBUG_LOWLEVEL = 4;
    /**
     * The PHPMailer SMTP Version number.
     * @var string
     * @deprecated Use the `VERSION` constant instead
     * @see SMTP::VERSION
     */
    public $Version = '5.2.22';
    /**
     * SMTP server port number.
     * @var integer
     * @deprecated This is only ever used as a default value, so use the `DEFAULT_SMTP_PORT` constant instead
     * @see SMTP::DEFAULT_SMTP_PORT
     */
    public $SMTP_PORT = 25;
    /**
     * SMTP reply line ending.
     * @var string
     * @deprecated Use the `CRLF` constant instead
     * @see SMTP::CRLF
     */
    public $CRLF = "\r\n";
    /**
     * Debug output level.
     * Options:
     * * self::DEBUG_OFF (`0`) No debug output, default
     * * self::DEBUG_CLIENT (`1`) Client commands
     * * self::DEBUG_SERVER (`2`) Client commands and server responses
     * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
     * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
     * @var integer
     */
    public $do_debug = self::DEBUG_OFF;
    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $smtp->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @var string|callable
     */
    public $Debugoutput = 'echo';
    /**
     * Whether to use VERP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Info on VERP
     * @var boolean
     */
    public $do_verp = \false;
    /**
     * The timeout value for connection, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * This needs to be quite high to function correctly with hosts using greetdelay as an anti-spam measure.
     * @link http://tools.ietf.org/html/rfc2821#section-4.5.3.2
     * @var integer
     */
    public $Timeout = 300;
    /**
     * How long to wait for commands to complete, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @var integer
     */
    public $Timelimit = 300;
    /**
     * @var array patterns to extract smtp transaction id from smtp reply
     * Only first capture group will be use, use non-capturing group to deal with it
     * Extend this class to override this property to fulfil your needs.
     */
    protected $smtp_transaction_id_patterns = array('exim' => '/[0-9]{3} OK id=(.*)/', 'sendmail' => '/[0-9]{3} 2.0.0 (.*) Message/', 'postfix' => '/[0-9]{3} 2.0.0 Ok: queued as (.*)/');
    /**
     * The socket for the server connection.
     * @var resource
     */
    protected $smtp_conn;
    /**
     * Error information, if any, for the last SMTP command.
     * @var array
     */
    protected $error = array('error' => '', 'detail' => '', 'smtp_code' => '', 'smtp_code_ex' => '');
    /**
     * The reply the server sent to us for HELO.
     * If null, no HELO string has yet been received.
     * @var string|null
     */
    protected $helo_rply = \null;
    /**
     * The set of SMTP extensions sent in reply to EHLO command.
     * Indexes of the array are extension names.
     * Value at index 'HELO' or 'EHLO' (according to command that was sent)
     * represents the server name. In case of HELO it is the only element of the array.
     * Other values can be boolean TRUE or an array containing extension options.
     * If null, no HELO/EHLO string has yet been received.
     * @var array|null
     */
    protected $server_caps = \null;
    /**
     * The most recent reply received from the server.
     * @var string
     */
    protected $last_reply = '';
    /**
     * Output debugging info via a user-selected method.
     * @see SMTP::$Debugoutput
     * @see SMTP::$do_debug
     * @param string $str Debug string to output
     * @param integer $level The debug level of this message; see DEBUG_* constants
     * @return void
     */
    protected function edebug($str, $level = 0)
    {
    }
    /**
     * Connect to an SMTP server.
     * @param string $host SMTP server IP or host name
     * @param integer $port The port number to connect to
     * @param integer $timeout How long to wait for the connection to open
     * @param array $options An array of options for stream_context_create()
     * @access public
     * @return boolean
     */
    public function connect($host, $port = \null, $timeout = 30, $options = array())
    {
    }
    /**
     * Initiate a TLS (encrypted) session.
     * @access public
     * @return boolean
     */
    public function startTLS()
    {
    }
    /**
     * Perform SMTP authentication.
     * Must be run after hello().
     * @see hello()
     * @param string $username The user name
     * @param string $password The password
     * @param string $authtype The auth type (PLAIN, LOGIN, CRAM-MD5)
     * @param string $realm The auth realm for NTLM
     * @param string $workstation The auth workstation for NTLM
     * @param null|OAuth $OAuth An optional OAuth instance (@see PHPMailerOAuth)
     * @return bool True if successfully authenticated.* @access public
     */
    public function authenticate($username, $password, $authtype = \null, $realm = '', $workstation = '', $OAuth = \null)
    {
    }
    /**
     * Calculate an MD5 HMAC hash.
     * Works like hash_hmac('md5', $data, $key)
     * in case that function is not available
     * @param string $data The data to hash
     * @param string $key  The key to hash with
     * @access protected
     * @return string
     */
    protected function hmac($data, $key)
    {
    }
    /**
     * Check connection state.
     * @access public
     * @return boolean True if connected.
     */
    public function connected()
    {
    }
    /**
     * Close the socket and clean up the state of the class.
     * Don't use this function without first trying to use QUIT.
     * @see quit()
     * @access public
     * @return void
     */
    public function close()
    {
    }
    /**
     * Send an SMTP DATA command.
     * Issues a data command and sends the msg_data to the server,
     * finializing the mail transaction. $msg_data is the message
     * that is to be send with the headers. Each header needs to be
     * on a single line followed by a <CRLF> with the message headers
     * and the message body being separated by and additional <CRLF>.
     * Implements rfc 821: DATA <CRLF>
     * @param string $msg_data Message data to send
     * @access public
     * @return boolean
     */
    public function data($msg_data)
    {
    }
    /**
     * Send an SMTP HELO or EHLO command.
     * Used to identify the sending server to the receiving server.
     * This makes sure that client and server are in a known state.
     * Implements RFC 821: HELO <SP> <domain> <CRLF>
     * and RFC 2821 EHLO.
     * @param string $host The host name or IP to connect to
     * @access public
     * @return boolean
     */
    public function hello($host = '')
    {
    }
    /**
     * Send an SMTP HELO or EHLO command.
     * Low-level implementation used by hello()
     * @see hello()
     * @param string $hello The HELO string
     * @param string $host The hostname to say we are
     * @access protected
     * @return boolean
     */
    protected function sendHello($hello, $host)
    {
    }
    /**
     * Parse a reply to HELO/EHLO command to discover server extensions.
     * In case of HELO, the only parameter that can be discovered is a server name.
     * @access protected
     * @param string $type - 'HELO' or 'EHLO'
     */
    protected function parseHelloFields($type)
    {
    }
    /**
     * Send an SMTP MAIL command.
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more recipient
     * commands may be called followed by a data command.
     * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
     * @param string $from Source address of this message
     * @access public
     * @return boolean
     */
    public function mail($from)
    {
    }
    /**
     * Send an SMTP QUIT command.
     * Closes the socket if there is no error or the $close_on_error argument is true.
     * Implements from rfc 821: QUIT <CRLF>
     * @param boolean $close_on_error Should the connection close if an error occurs?
     * @access public
     * @return boolean
     */
    public function quit($close_on_error = \true)
    {
    }
    /**
     * Send an SMTP RCPT command.
     * Sets the TO argument to $toaddr.
     * Returns true if the recipient was accepted false if it was rejected.
     * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
     * @param string $address The address the message is being sent to
     * @access public
     * @return boolean
     */
    public function recipient($address)
    {
    }
    /**
     * Send an SMTP RSET command.
     * Abort any transaction that is currently in progress.
     * Implements rfc 821: RSET <CRLF>
     * @access public
     * @return boolean True on success.
     */
    public function reset()
    {
    }
    /**
     * Send a command to an SMTP server and check its return code.
     * @param string $command The command name - not sent to the server
     * @param string $commandstring The actual command to send
     * @param integer|array $expect One or more expected integer success codes
     * @access protected
     * @return boolean True on success.
     */
    protected function sendCommand($command, $commandstring, $expect)
    {
    }
    /**
     * Send an SMTP SAML command.
     * Starts a mail transaction from the email address specified in $from.
     * Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more recipient
     * commands may be called followed by a data command. This command
     * will send the message to the users terminal if they are logged
     * in and send them an email.
     * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
     * @param string $from The address the message is from
     * @access public
     * @return boolean
     */
    public function sendAndMail($from)
    {
    }
    /**
     * Send an SMTP VRFY command.
     * @param string $name The name to verify
     * @access public
     * @return boolean
     */
    public function verify($name)
    {
    }
    /**
     * Send an SMTP NOOP command.
     * Used to keep keep-alives alive, doesn't actually do anything
     * @access public
     * @return boolean
     */
    public function noop()
    {
    }
    /**
     * Send an SMTP TURN command.
     * This is an optional command for SMTP that this class does not support.
     * This method is here to make the RFC821 Definition complete for this class
     * and _may_ be implemented in future
     * Implements from rfc 821: TURN <CRLF>
     * @access public
     * @return boolean
     */
    public function turn()
    {
    }
    /**
     * Send raw data to the server.
     * @param string $data The data to send
     * @access public
     * @return integer|boolean The number of bytes sent to the server or false on error
     */
    public function client_send($data)
    {
    }
    /**
     * Get the latest error.
     * @access public
     * @return array
     */
    public function getError()
    {
    }
    /**
     * Get SMTP extensions available on the server
     * @access public
     * @return array|null
     */
    public function getServerExtList()
    {
    }
    /**
     * A multipurpose method
     * The method works in three ways, dependent on argument value and current state
     *   1. HELO/EHLO was not sent - returns null and set up $this->error
     *   2. HELO was sent
     *     $name = 'HELO': returns server name
     *     $name = 'EHLO': returns boolean false
     *     $name = any string: returns null and set up $this->error
     *   3. EHLO was sent
     *     $name = 'HELO'|'EHLO': returns server name
     *     $name = any string: if extension $name exists, returns boolean True
     *       or its options. Otherwise returns boolean False
     * In other words, one can use this method to detect 3 conditions:
     *  - null returned: handshake was not or we don't know about ext (refer to $this->error)
     *  - false returned: the requested feature exactly not exists
     *  - positive value returned: the requested feature exists
     * @param string $name Name of SMTP extension or 'HELO'|'EHLO'
     * @return mixed
     */
    public function getServerExt($name)
    {
    }
    /**
     * Get the last reply from the server.
     * @access public
     * @return string
     */
    public function getLastReply()
    {
    }
    /**
     * Read the SMTP server's response.
     * Either before eof or socket timeout occurs on the operation.
     * With SMTP we can tell if we have more lines to read if the
     * 4th character is '-' symbol. If it is a space then we don't
     * need to read anything else.
     * @access protected
     * @return string
     */
    protected function get_lines()
    {
    }
    /**
     * Enable or disable VERP address generation.
     * @param boolean $enabled
     */
    public function setVerp($enabled = \false)
    {
    }
    /**
     * Get VERP address generation mode.
     * @return boolean
     */
    public function getVerp()
    {
    }
    /**
     * Set error messages and codes.
     * @param string $message The error message
     * @param string $detail Further detail on the error
     * @param string $smtp_code An associated SMTP error code
     * @param string $smtp_code_ex Extended SMTP code
     */
    protected function setError($message, $detail = '', $smtp_code = '', $smtp_code_ex = '')
    {
    }
    /**
     * Set debug output method.
     * @param string|callable $method The name of the mechanism to use for debugging output, or a callable to handle it.
     */
    public function setDebugOutput($method = 'echo')
    {
    }
    /**
     * Get debug output method.
     * @return string
     */
    public function getDebugOutput()
    {
    }
    /**
     * Set debug output level.
     * @param integer $level
     */
    public function setDebugLevel($level = 0)
    {
    }
    /**
     * Get debug output level.
     * @return integer
     */
    public function getDebugLevel()
    {
    }
    /**
     * Set SMTP timeout.
     * @param integer $timeout
     */
    public function setTimeout($timeout = 0)
    {
    }
    /**
     * Get SMTP timeout.
     * @return integer
     */
    public function getTimeout()
    {
    }
    /**
     * Reports an error number and string.
     * @param integer $errno The error number returned by PHP.
     * @param string $errmsg The error message returned by PHP.
     */
    protected function errorHandler($errno, $errmsg)
    {
    }
    /**
     * Will return the ID of the last smtp transaction based on a list of patterns provided
     * in SMTP::$smtp_transaction_id_patterns.
     * If no reply has been received yet, it will return null.
     * If no pattern has been matched, it will return false.
     * @return bool|null|string
     */
    public function getLastTransactionID()
    {
    }
}
/*************************************************

Snoopy - the PHP net client
Author: Monte Ohrt <monte@ispi.net>
Copyright (c): 1999-2008 New Digital Group, all rights reserved
Version: 1.2.4

 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

You may contact the author of Snoopy by e-mail at:
monte@ohrt.com

The latest version of Snoopy can be obtained from:
http://snoopy.sourceforge.net/

*************************************************/
class Snoopy
{
    /**** Public variables ****/
    /* user definable vars */
    var $host = "www.php.net";
    // host name we are connecting to
    var $port = 80;
    // port we are connecting to
    var $proxy_host = "";
    // proxy host to use
    var $proxy_port = "";
    // proxy port to use
    var $proxy_user = "";
    // proxy user to use
    var $proxy_pass = "";
    // proxy password to use
    var $agent = "Snoopy v1.2.4";
    // agent we masquerade as
    var $referer = "";
    // referer info to pass
    var $cookies = array();
    // array of cookies to pass
    // $cookies["username"]="joe";
    var $rawheaders = array();
    // array of raw headers to send
    // $rawheaders["Content-type"]="text/html";
    var $maxredirs = 5;
    // http redirection depth maximum. 0 = disallow
    var $lastredirectaddr = "";
    // contains address of last redirected address
    var $offsiteok = \true;
    // allows redirection off-site
    var $maxframes = 0;
    // frame content depth maximum. 0 = disallow
    var $expandlinks = \true;
    // expand links to fully qualified URLs.
    // this only applies to fetchlinks()
    // submitlinks(), and submittext()
    var $passcookies = \true;
    // pass set cookies back through redirects
    // NOTE: this currently does not respect
    // dates, domains or paths.
    var $user = "";
    // user for http authentication
    var $pass = "";
    // password for http authentication
    // http accept types
    var $accept = "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
    var $results = "";
    // where the content is put
    var $error = "";
    // error messages sent here
    var $response_code = "";
    // response code returned from server
    var $headers = array();
    // headers returned from server sent here
    var $maxlength = 500000;
    // max return data length (body)
    var $read_timeout = 0;
    // timeout on read operations, in seconds
    // supported only since PHP 4 Beta 4
    // set to 0 to disallow timeouts
    var $timed_out = \false;
    // if a read operation timed out
    var $status = 0;
    // http request status
    var $temp_dir = "/tmp";
    // temporary directory that the webserver
    // has permission to write to.
    // under Windows, this should be C:\temp
    var $curl_path = "/usr/local/bin/curl";
    // Snoopy will use cURL for fetching
    // SSL content if a full system path to
    // the cURL binary is supplied here.
    // set to false if you do not have
    // cURL installed. See http://curl.haxx.se
    // for details on installing cURL.
    // Snoopy does *not* use the cURL
    // library functions built into php,
    // as these functions are not stable
    // as of this Snoopy release.
    /**** Private variables ****/
    var $_maxlinelen = 4096;
    // max line length (headers)
    var $_httpmethod = "GET";
    // default http request method
    var $_httpversion = "HTTP/1.0";
    // default http request version
    var $_submit_method = "POST";
    // default submit method
    var $_submit_type = "application/x-www-form-urlencoded";
    // default submit type
    var $_mime_boundary = "";
    // MIME boundary for multipart/form-data submit type
    var $_redirectaddr = \false;
    // will be set if page fetched is a redirect
    var $_redirectdepth = 0;
    // increments on an http redirect
    var $_frameurls = array();
    // frame src urls
    var $_framedepth = 0;
    // increments on frame depth
    var $_isproxy = \false;
    // set if using a proxy server
    var $_fp_timeout = 30;
    // timeout for socket connection
    /*======================================================================*\
    	Function:	fetch
    	Purpose:	fetch the contents of a web page
    				(and possibly other protocols in the
    				future like ftp, nntp, gopher, etc.)
    	Input:		$URI	the location of the page to fetch
    	Output:		$this->results	the output text from the fetch
    \*======================================================================*/
    function fetch($URI)
    {
    }
    /*======================================================================*\
    	Function:	submit
    	Purpose:	submit an http form
    	Input:		$URI	the location to post the data
    				$formvars	the formvars to use.
    					format: $formvars["var"] = "val";
    				$formfiles  an array of files to submit
    					format: $formfiles["var"] = "/dir/filename.ext";
    	Output:		$this->results	the text output from the post
    \*======================================================================*/
    function submit($URI, $formvars = "", $formfiles = "")
    {
    }
    /*======================================================================*\
    	Function:	fetchlinks
    	Purpose:	fetch the links from a web page
    	Input:		$URI	where you are fetching from
    	Output:		$this->results	an array of the URLs
    \*======================================================================*/
    function fetchlinks($URI)
    {
    }
    /*======================================================================*\
    	Function:	fetchform
    	Purpose:	fetch the form elements from a web page
    	Input:		$URI	where you are fetching from
    	Output:		$this->results	the resulting html form
    \*======================================================================*/
    function fetchform($URI)
    {
    }
    /*======================================================================*\
    	Function:	fetchtext
    	Purpose:	fetch the text from a web page, stripping the links
    	Input:		$URI	where you are fetching from
    	Output:		$this->results	the text from the web page
    \*======================================================================*/
    function fetchtext($URI)
    {
    }
    /*======================================================================*\
    	Function:	submitlinks
    	Purpose:	grab links from a form submission
    	Input:		$URI	where you are submitting from
    	Output:		$this->results	an array of the links from the post
    \*======================================================================*/
    function submitlinks($URI, $formvars = "", $formfiles = "")
    {
    }
    /*======================================================================*\
    	Function:	submittext
    	Purpose:	grab text from a form submission
    	Input:		$URI	where you are submitting from
    	Output:		$this->results	the text from the web page
    \*======================================================================*/
    function submittext($URI, $formvars = "", $formfiles = "")
    {
    }
    /*======================================================================*\
    	Function:	set_submit_multipart
    	Purpose:	Set the form submission content type to
    				multipart/form-data
    \*======================================================================*/
    function set_submit_multipart()
    {
    }
    /*======================================================================*\
    	Function:	set_submit_normal
    	Purpose:	Set the form submission content type to
    				application/x-www-form-urlencoded
    \*======================================================================*/
    function set_submit_normal()
    {
    }
    /*======================================================================*\
    	Private functions
    \*======================================================================*/
    /*======================================================================*\
    	Function:	_striplinks
    	Purpose:	strip the hyperlinks from an html document
    	Input:		$document	document to strip.
    	Output:		$match		an array of the links
    \*======================================================================*/
    function _striplinks($document)
    {
    }
    /*======================================================================*\
    	Function:	_stripform
    	Purpose:	strip the form elements from an html document
    	Input:		$document	document to strip.
    	Output:		$match		an array of the links
    \*======================================================================*/
    function _stripform($document)
    {
    }
    /*======================================================================*\
    	Function:	_striptext
    	Purpose:	strip the text from an html document
    	Input:		$document	document to strip.
    	Output:		$text		the resulting text
    \*======================================================================*/
    function _striptext($document)
    {
    }
    /*======================================================================*\
    	Function:	_expandlinks
    	Purpose:	expand each link into a fully qualified URL
    	Input:		$links			the links to qualify
    				$URI			the full URI to get the base from
    	Output:		$expandedLinks	the expanded links
    \*======================================================================*/
    function _expandlinks($links, $URI)
    {
    }
    /*======================================================================*\
    	Function:	_httprequest
    	Purpose:	go get the http data from the server
    	Input:		$url		the url to fetch
    				$fp			the current open file pointer
    				$URI		the full URI
    				$body		body contents to send if any (POST)
    	Output:
    \*======================================================================*/
    function _httprequest($url, $fp, $URI, $http_method, $content_type = "", $body = "")
    {
    }
    /*======================================================================*\
    	Function:	_httpsrequest
    	Purpose:	go get the https data from the server using curl
    	Input:		$url		the url to fetch
    				$URI		the full URI
    				$body		body contents to send if any (POST)
    	Output:
    \*======================================================================*/
    function _httpsrequest($url, $URI, $http_method, $content_type = "", $body = "")
    {
    }
    /*======================================================================*\
    	Function:	setcookies()
    	Purpose:	set cookies for a redirection
    \*======================================================================*/
    function setcookies()
    {
    }
    /*======================================================================*\
    	Function:	_check_timeout
    	Purpose:	checks whether timeout has occurred
    	Input:		$fp	file pointer
    \*======================================================================*/
    function _check_timeout($fp)
    {
    }
    /*======================================================================*\
    	Function:	_connect
    	Purpose:	make a socket connection
    	Input:		$fp	file pointer
    \*======================================================================*/
    function _connect(&$fp)
    {
    }
    /*======================================================================*\
    	Function:	_disconnect
    	Purpose:	disconnect a socket connection
    	Input:		$fp	file pointer
    \*======================================================================*/
    function _disconnect($fp)
    {
    }
    /*======================================================================*\
    	Function:	_prepare_post_body
    	Purpose:	Prepare post body according to encoding type
    	Input:		$formvars  - form variables
    				$formfiles - form upload files
    	Output:		post body
    \*======================================================================*/
    function _prepare_post_body($formvars, $formfiles)
    {
    }
}
/**
 * Taxonomy API: Walker_CategoryDropdown class
 *
 * @package WordPress
 * @subpackage Template
 * @since 4.4.0
 */
/**
 * Core class used to create an HTML dropdown list of Categories.
 *
 * @since 2.1.0
 *
 * @see Walker
 */
class Walker_CategoryDropdown extends \Walker
{
    /**
     * What the class handles.
     *
     * @since 2.1.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'category';
    /**
     * Database fields to use.
     *
     * @since 2.1.0
     * @todo Decouple this
     * @var array
     *
     * @see Walker::$db_fields
     */
    public $db_fields = array('parent' => 'parent', 'id' => 'term_id');
    /**
     * Starts the element output.
     *
     * @since 2.1.0
     *
     * @see Walker::start_el()
     *
     * @param string $output   Used to append additional content (passed by reference).
     * @param object $category Category data object.
     * @param int    $depth    Depth of category. Used for padding.
     * @param array  $args     Uses 'selected', 'show_count', and 'value_field' keys, if they exist.
     *                         See wp_dropdown_categories().
     * @param int    $id       Optional. ID of the current category. Default 0 (unused).
     */
    public function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
    {
    }
}
/**
 * Taxonomy API: Walker_Category class
 *
 * @package WordPress
 * @subpackage Template
 * @since 4.4.0
 */
/**
 * Core class used to create an HTML list of categories.
 *
 * @since 2.1.0
 *
 * @see Walker
 */
class Walker_Category extends \Walker
{
    /**
     * What the class handles.
     *
     * @since 2.1.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'category';
    /**
     * Database fields to use.
     *
     * @since 2.1.0
     * @var array
     *
     * @see Walker::$db_fields
     * @todo Decouple this
     */
    public $db_fields = array('parent' => 'parent', 'id' => 'term_id');
    /**
     * Starts the list before the elements are added.
     *
     * @since 2.1.0
     *
     * @see Walker::start_lvl()
     *
     * @param string $output Used to append additional content. Passed by reference.
     * @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
     * @param array  $args   Optional. An array of arguments. Will only append content if style argument
     *                       value is 'list'. See wp_list_categories(). Default empty array.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @since 2.1.0
     *
     * @see Walker::end_lvl()
     *
     * @param string $output Used to append additional content. Passed by reference.
     * @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
     * @param array  $args   Optional. An array of arguments. Will only append content if style argument
     *                       value is 'list'. See wp_list_categories(). Default empty array.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Starts the element output.
     *
     * @since 2.1.0
     *
     * @see Walker::start_el()
     *
     * @param string $output   Used to append additional content (passed by reference).
     * @param object $category Category data object.
     * @param int    $depth    Optional. Depth of category in reference to parents. Default 0.
     * @param array  $args     Optional. An array of arguments. See wp_list_categories(). Default empty array.
     * @param int    $id       Optional. ID of the current category. Default 0.
     */
    public function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
    {
    }
    /**
     * Ends the element output, if needed.
     *
     * @since 2.1.0
     *
     * @see Walker::end_el()
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param object $page   Not used.
     * @param int    $depth  Optional. Depth of category. Not used.
     * @param array  $args   Optional. An array of arguments. Only uses 'list' for whether should append
     *                       to output. See wp_list_categories(). Default empty array.
     */
    public function end_el(&$output, $page, $depth = 0, $args = array())
    {
    }
}
/**
 * Comment API: Walker_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */
/**
 * Core walker class used to create an HTML list of comments.
 *
 * @since 2.7.0
 *
 * @see Walker
 */
class Walker_Comment extends \Walker
{
    /**
     * What the class handles.
     *
     * @since 2.7.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'comment';
    /**
     * Database fields to use.
     *
     * @since 2.7.0
     * @var array
     *
     * @see Walker::$db_fields
     * @todo Decouple this
     */
    public $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');
    /**
     * Starts the list before the elements are added.
     *
     * @since 2.7.0
     *
     * @see Walker::start_lvl()
     * @global int $comment_depth
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of the current comment. Default 0.
     * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of items after the elements are added.
     *
     * @since 2.7.0
     *
     * @see Walker::end_lvl()
     * @global int $comment_depth
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of the current comment. Default 0.
     * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
     *                       Default empty array.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Traverses elements to create list from elements.
     *
     * This function is designed to enhance Walker::display_element() to
     * display children of higher nesting levels than selected inline on
     * the highest depth level displayed. This prevents them being orphaned
     * at the end of the comment list.
     *
     * Example: max_depth = 2, with 5 levels of nested content.
     *     1
     *      1.1
     *        1.1.1
     *        1.1.1.1
     *        1.1.1.1.1
     *        1.1.2
     *        1.1.2.1
     *     2
     *      2.2
     *
     * @since 2.7.0
     *
     * @see Walker::display_element()
     * @see wp_list_comments()
     *
     * @param WP_Comment $element           Comment data object.
     * @param array      $children_elements List of elements to continue traversing. Passed by reference.
     * @param int        $max_depth         Max depth to traverse.
     * @param int        $depth             Depth of the current element.
     * @param array      $args              An array of arguments.
     * @param string     $output            Used to append additional content. Passed by reference.
     */
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
    }
    /**
     * Starts the element output.
     *
     * @since 2.7.0
     *
     * @see Walker::start_el()
     * @see wp_list_comments()
     * @global int        $comment_depth
     * @global WP_Comment $comment
     *
     * @param string     $output  Used to append additional content. Passed by reference.
     * @param WP_Comment $comment Comment data object.
     * @param int        $depth   Optional. Depth of the current comment in reference to parents. Default 0.
     * @param array      $args    Optional. An array of arguments. Default empty array.
     * @param int        $id      Optional. ID of the current comment. Default 0 (unused).
     */
    public function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
    {
    }
    /**
     * Ends the element output, if needed.
     *
     * @since 2.7.0
     *
     * @see Walker::end_el()
     * @see wp_list_comments()
     *
     * @param string     $output  Used to append additional content. Passed by reference.
     * @param WP_Comment $comment The current comment object. Default current comment.
     * @param int        $depth   Optional. Depth of the current comment. Default 0.
     * @param array      $args    Optional. An array of arguments. Default empty array.
     */
    public function end_el(&$output, $comment, $depth = 0, $args = array())
    {
    }
    /**
     * Outputs a pingback comment.
     *
     * @since 3.6.0
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment The comment object.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function ping($comment, $depth, $args)
    {
    }
    /**
     * Outputs a single comment.
     *
     * @since 3.6.0
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function comment($comment, $depth, $args)
    {
    }
    /**
     * Outputs a comment in the HTML5 format.
     *
     * @since 3.6.0
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function html5_comment($comment, $depth, $args)
    {
    }
}
/**
 * Post API: Walker_PageDropdown class
 *
 * @package WordPress
 * @subpackage Post
 * @since 4.4.0
 */
/**
 * Core class used to create an HTML drop-down list of pages.
 *
 * @since 2.1.0
 *
 * @see Walker
 */
class Walker_PageDropdown extends \Walker
{
    /**
     * What the class handles.
     *
     * @since 2.1.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'page';
    /**
     * Database fields to use.
     *
     * @since 2.1.0
     * @var array
     *
     * @see Walker::$db_fields
     * @todo Decouple this
     */
    public $db_fields = array('parent' => 'post_parent', 'id' => 'ID');
    /**
     * Starts the element output.
     *
     * @since 2.1.0
     *
     * @see Walker::start_el()
     *
     * @param string  $output Used to append additional content. Passed by reference.
     * @param WP_Post $page   Page data object.
     * @param int     $depth  Optional. Depth of page in reference to parent pages. Used for padding.
     *                        Default 0.
     * @param array   $args   Optional. Uses 'selected' argument for selected page to set selected HTML
     *                        attribute for option element. Uses 'value_field' argument to fill "value"
     *                        attribute. See wp_dropdown_pages(). Default empty array.
     * @param int     $id     Optional. ID of the current page. Default 0 (unused).
     */
    public function start_el(&$output, $page, $depth = 0, $args = array(), $id = 0)
    {
    }
}
/**
 * Post API: Walker_Page class
 *
 * @package WordPress
 * @subpackage Template
 * @since 4.4.0
 */
/**
 * Core walker class used to create an HTML list of pages.
 *
 * @since 2.1.0
 *
 * @see Walker
 */
class Walker_Page extends \Walker
{
    /**
     * What the class handles.
     *
     * @since 2.1.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'page';
    /**
     * Database fields to use.
     *
     * @since 2.1.0
     * @var array
     *
     * @see Walker::$db_fields
     * @todo Decouple this.
     */
    public $db_fields = array('parent' => 'post_parent', 'id' => 'ID');
    /**
     * Outputs the beginning of the current level in the tree before elements are output.
     *
     * @since 2.1.0
     *
     * @see Walker::start_lvl()
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
     * @param array  $args   Optional. Arguments for outputting the next level.
     *                       Default empty array.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Outputs the end of the current level in the tree after elements are output.
     *
     * @since 2.1.0
     *
     * @see Walker::end_lvl()
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
     * @param array  $args   Optional. Arguments for outputting the end of the current level.
     *                       Default empty array.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Outputs the beginning of the current element in the tree.
     *
     * @see Walker::start_el()
     * @since 2.1.0
     *
     * @param string  $output       Used to append additional content. Passed by reference.
     * @param WP_Post $page         Page data object.
     * @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
     * @param array   $args         Optional. Array of arguments. Default empty array.
     * @param int     $current_page Optional. Page ID. Default 0.
     */
    public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0)
    {
    }
    /**
     * Outputs the end of the current element in the tree.
     *
     * @since 2.1.0
     *
     * @see Walker::end_el()
     *
     * @param string  $output Used to append additional content. Passed by reference.
     * @param WP_Post $page   Page data object. Not used.
     * @param int     $depth  Optional. Depth of page. Default 0 (unused).
     * @param array   $args   Optional. Array of arguments. Default empty array.
     */
    public function end_el(&$output, $page, $depth = 0, $args = array())
    {
    }
}
/**
 * Toolbar API: WP_Admin_Bar class
 *
 * @package WordPress
 * @subpackage Toolbar
 * @since 3.1.0
 */
/**
 * Core class used to implement the Toolbar API.
 *
 * @since 3.1.0
 */
class WP_Admin_Bar
{
    private $nodes = array();
    private $bound = \false;
    public $user;
    /**
     * @param string $name
     * @return string|array|void
     */
    public function __get($name)
    {
    }
    /**
     */
    public function initialize()
    {
    }
    /**
     * @param array $node
     */
    public function add_menu($node)
    {
    }
    /**
     * @param string $id
     */
    public function remove_menu($id)
    {
    }
    /**
     * Adds a node to the menu.
     *
     * @since 3.1.0
     * @since 4.5.0 Added the ability to pass 'lang' and 'dir' meta data.
     *
     * @param array $args {
     *     Arguments for adding a node.
     *
     *     @type string $id     ID of the item.
     *     @type string $title  Title of the node.
     *     @type string $parent Optional. ID of the parent node.
     *     @type string $href   Optional. Link for the item.
     *     @type bool   $group  Optional. Whether or not the node is a group. Default false.
     *     @type array  $meta   Meta data including the following keys: 'html', 'class', 'rel', 'lang', 'dir',
     *                          'onclick', 'target', 'title', 'tabindex'. Default empty.
     * }
     */
    public function add_node($args)
    {
    }
    /**
     * @param array $args
     */
    protected final function _set_node($args)
    {
    }
    /**
     * Gets a node.
     *
     * @param string $id
     * @return object Node.
     */
    public final function get_node($id)
    {
    }
    /**
     * @param string $id
     * @return object|void
     */
    protected final function _get_node($id)
    {
    }
    /**
     * @return array|void
     */
    public final function get_nodes()
    {
    }
    /**
     * @return array|void
     */
    protected final function _get_nodes()
    {
    }
    /**
     * Add a group to a menu node.
     *
     * @since 3.3.0
     *
     * @param array $args {
     *     Array of arguments for adding a group.
     *
     *     @type string $id     ID of the item.
     *     @type string $parent Optional. ID of the parent node. Default 'root'.
     *     @type array  $meta   Meta data for the group including the following keys:
     *                         'class', 'onclick', 'target', and 'title'.
     * }
     */
    public final function add_group($args)
    {
    }
    /**
     * Remove a node.
     *
     * @param string $id The ID of the item.
     */
    public function remove_node($id)
    {
    }
    /**
     * @param string $id
     */
    protected final function _unset_node($id)
    {
    }
    /**
     */
    public function render()
    {
    }
    /**
     * @return object|void
     */
    protected final function _bind()
    {
    }
    /**
     *
     * @global bool $is_IE
     * @param object $root
     */
    protected final function _render($root)
    {
    }
    /**
     * @param object $node
     */
    protected final function _render_container($node)
    {
    }
    /**
     * @param object $node
     */
    protected final function _render_group($node)
    {
    }
    /**
     * @param object $node
     */
    protected final function _render_item($node)
    {
    }
    /**
     * Renders toolbar items recursively.
     *
     * @since 3.1.0
     * @deprecated 3.3.0 Use WP_Admin_Bar::_render_item() or WP_Admin_bar::render() instead.
     * @see WP_Admin_Bar::_render_item()
     * @see WP_Admin_Bar::render()
     *
     * @param string $id    Unused.
     * @param object $node
     */
    public function recursive_render($id, $node)
    {
    }
    /**
     */
    public function add_menus()
    {
    }
}
/**
 * Send XML response back to Ajax request.
 *
 * @package WordPress
 * @since 2.1.0
 */
class WP_Ajax_Response
{
    /**
     * Store XML responses to send.
     *
     * @since 2.1.0
     * @var array
     */
    public $responses = array();
    /**
     * Constructor - Passes args to WP_Ajax_Response::add().
     *
     * @since 2.1.0
     * @see WP_Ajax_Response::add()
     *
     * @param string|array $args Optional. Will be passed to add() method.
     */
    public function __construct($args = '')
    {
    }
    /**
     * Appends data to an XML response based on given arguments.
     *
     * With `$args` defaults, extra data output would be:
     *
     *     <response action='{$action}_$id'>
     *      <$what id='$id' position='$position'>
     *          <response_data><![CDATA[$data]]></response_data>
     *      </$what>
     *     </response>
     *
     * @since 2.1.0
     *
     * @param string|array $args {
     *     Optional. An array or string of XML response arguments.
     *
     *     @type string          $what         XML-RPC response type. Used as a child element of `<response>`.
     *                                         Default 'object' (`<object>`).
     *     @type string|false    $action       Value to use for the `action` attribute in `<response>`. Will be
     *                                         appended with `_$id` on output. If false, `$action` will default to
     *                                         the value of `$_POST['action']`. Default false.
     *     @type int|WP_Error    $id           The response ID, used as the response type `id` attribute. Also
     *                                         accepts a `WP_Error` object if the ID does not exist. Default 0.
     *     @type int|false       $old_id       The previous response ID. Used as the value for the response type
     *                                         `old_id` attribute. False hides the attribute. Default false.
     *     @type string          $position     Value of the response type `position` attribute. Accepts 1 (bottom),
     *                                         -1 (top), html ID (after), or -html ID (before). Default 1 (bottom).
     *     @type string|WP_Error $data         The response content/message. Also accepts a WP_Error object if the
     *                                         ID does not exist. Default empty.
     *     @type array           $supplemental An array of extra strings that will be output within a `<supplemental>`
     *                                         element as CDATA. Default empty array.
     * }
     * @return string XML response.
     */
    public function add($args = '')
    {
    }
    /**
     * Display XML formatted responses.
     *
     * Sets the content type header to text/xml.
     *
     * @since 2.1.0
     */
    public function send()
    {
    }
}
/**
 * Comment API: WP_Comment_Query class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */
/**
 * Core class used for querying comments.
 *
 * @since 3.1.0
 *
 * @see WP_Comment_Query::__construct() for accepted arguments.
 */
class WP_Comment_Query
{
    /**
     * SQL for database query.
     *
     * @since 4.0.1
     * @var string
     */
    public $request;
    /**
     * Metadata query container
     *
     * @since 3.5.0
     * @var object WP_Meta_Query
     */
    public $meta_query = \false;
    /**
     * Metadata query clauses.
     *
     * @since 4.4.0
     * @var array
     */
    protected $meta_query_clauses;
    /**
     * SQL query clauses.
     *
     * @since 4.4.0
     * @var array
     */
    protected $sql_clauses = array('select' => '', 'from' => '', 'where' => array(), 'groupby' => '', 'orderby' => '', 'limits' => '');
    /**
     * SQL WHERE clause.
     *
     * Stored after the {@see 'comments_clauses'} filter is run on the compiled WHERE sub-clauses.
     *
     * @since 4.4.2
     * @var string
     */
    protected $filtered_where_clause;
    /**
     * Date query container
     *
     * @since 3.7.0
     * @var object WP_Date_Query
     */
    public $date_query = \false;
    /**
     * Query vars set by the user.
     *
     * @since 3.1.0
     * @var array
     */
    public $query_vars;
    /**
     * Default values for query vars.
     *
     * @since 4.2.0
     * @var array
     */
    public $query_var_defaults;
    /**
     * List of comments located by the query.
     *
     * @since 4.0.0
     * @var array
     */
    public $comments;
    /**
     * The amount of found comments for the current query.
     *
     * @since 4.4.0
     * @var int
     */
    public $found_comments = 0;
    /**
     * The number of pages.
     *
     * @since 4.4.0
     * @var int
     */
    public $max_num_pages = 0;
    /**
     * Make private/protected methods readable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param callable $name      Method to call.
     * @param array    $arguments Arguments to pass when calling.
     * @return mixed|false Return value of the callback, false otherwise.
     */
    public function __call($name, $arguments)
    {
    }
    /**
     * Constructor.
     *
     * Sets up the comment query, based on the query vars passed.
     *
     * @since 4.2.0
     * @since 4.4.0 `$parent__in` and `$parent__not_in` were added.
     * @since 4.4.0 Order by `comment__in` was added. `$update_comment_meta_cache`, `$no_found_rows`,
     *              `$hierarchical`, and `$update_comment_post_cache` were added.
     * @since 4.5.0 Introduced the `$author_url` argument.
     * @since 4.6.0 Introduced the `$cache_domain` argument.
     * @since 4.9.0 Introduced the `$paged` argument.
     *
     * @param string|array $query {
     *     Optional. Array or query string of comment query parameters. Default empty.
     *
     *     @type string       $author_email              Comment author email address. Default empty.
     *     @type string       $author_url                Comment author URL. Default empty.
     *     @type array        $author__in                Array of author IDs to include comments for. Default empty.
     *     @type array        $author__not_in            Array of author IDs to exclude comments for. Default empty.
     *     @type array        $comment__in               Array of comment IDs to include. Default empty.
     *     @type array        $comment__not_in           Array of comment IDs to exclude. Default empty.
     *     @type bool         $count                     Whether to return a comment count (true) or array of
     *                                                   comment objects (false). Default false.
     *     @type array        $date_query                Date query clauses to limit comments by. See WP_Date_Query.
     *                                                   Default null.
     *     @type string       $fields                    Comment fields to return. Accepts 'ids' for comment IDs
     *                                                   only or empty for all fields. Default empty.
     *     @type int          $ID                        Currently unused.
     *     @type array        $include_unapproved        Array of IDs or email addresses of users whose unapproved
     *                                                   comments will be returned by the query regardless of
     *                                                   `$status`. Default empty.
     *     @type int          $karma                     Karma score to retrieve matching comments for.
     *                                                   Default empty.
     *     @type string       $meta_key                  Include comments with a matching comment meta key.
     *                                                   Default empty.
     *     @type string       $meta_value                Include comments with a matching comment meta value.
     *                                                   Requires `$meta_key` to be set. Default empty.
     *     @type array        $meta_query                Meta query clauses to limit retrieved comments by.
     *                                                   See WP_Meta_Query. Default empty.
     *     @type int          $number                    Maximum number of comments to retrieve.
     *                                                   Default empty (no limit).
     *     @type int          $paged                     When used with $number, defines the page of results to return.
     *                                                   When used with $offset, $offset takes precedence. Default 1.
     *     @type int          $offset                    Number of comments to offset the query. Used to build
     *                                                   LIMIT clause. Default 0.
     *     @type bool         $no_found_rows             Whether to disable the `SQL_CALC_FOUND_ROWS` query.
     *                                                   Default: true.
     *     @type string|array $orderby                   Comment status or array of statuses. To use 'meta_value'
     *                                                   or 'meta_value_num', `$meta_key` must also be defined.
     *                                                   To sort by a specific `$meta_query` clause, use that
     *                                                   clause's array key. Accepts 'comment_agent',
     *                                                   'comment_approved', 'comment_author',
     *                                                   'comment_author_email', 'comment_author_IP',
     *                                                   'comment_author_url', 'comment_content', 'comment_date',
     *                                                   'comment_date_gmt', 'comment_ID', 'comment_karma',
     *                                                   'comment_parent', 'comment_post_ID', 'comment_type',
     *                                                   'user_id', 'comment__in', 'meta_value', 'meta_value_num',
     *                                                   the value of $meta_key, and the array keys of
     *                                                   `$meta_query`. Also accepts false, an empty array, or
     *                                                   'none' to disable `ORDER BY` clause.
     *                                                   Default: 'comment_date_gmt'.
     *     @type string       $order                     How to order retrieved comments. Accepts 'ASC', 'DESC'.
     *                                                   Default: 'DESC'.
     *     @type int          $parent                    Parent ID of comment to retrieve children of.
     *                                                   Default empty.
     *     @type array        $parent__in                Array of parent IDs of comments to retrieve children for.
     *                                                   Default empty.
     *     @type array        $parent__not_in            Array of parent IDs of comments *not* to retrieve
     *                                                   children for. Default empty.
     *     @type array        $post_author__in           Array of author IDs to retrieve comments for.
     *                                                   Default empty.
     *     @type array        $post_author__not_in       Array of author IDs *not* to retrieve comments for.
     *                                                   Default empty.
     *     @type int          $post_ID                   Currently unused.
     *     @type int          $post_id                   Limit results to those affiliated with a given post ID.
     *                                                   Default 0.
     *     @type array        $post__in                  Array of post IDs to include affiliated comments for.
     *                                                   Default empty.
     *     @type array        $post__not_in              Array of post IDs to exclude affiliated comments for.
     *                                                   Default empty.
     *     @type int          $post_author               Post author ID to limit results by. Default empty.
     *     @type string|array $post_status               Post status or array of post statuses to retrieve
     *                                                   affiliated comments for. Pass 'any' to match any value.
     *                                                   Default empty.
     *     @type string       $post_type                 Post type or array of post types to retrieve affiliated
     *                                                   comments for. Pass 'any' to match any value. Default empty.
     *     @type string       $post_name                 Post name to retrieve affiliated comments for.
     *                                                   Default empty.
     *     @type int          $post_parent               Post parent ID to retrieve affiliated comments for.
     *                                                   Default empty.
     *     @type string       $search                    Search term(s) to retrieve matching comments for.
     *                                                   Default empty.
     *     @type string       $status                    Comment status to limit results by. Accepts 'hold'
     *                                                   (`comment_status=0`), 'approve' (`comment_status=1`),
     *                                                   'all', or a custom comment status. Default 'all'.
     *     @type string|array $type                      Include comments of a given type, or array of types.
     *                                                   Accepts 'comment', 'pings' (includes 'pingback' and
     *                                                   'trackback'), or anycustom type string. Default empty.
     *     @type array        $type__in                  Include comments from a given array of comment types.
     *                                                   Default empty.
     *     @type array        $type__not_in              Exclude comments from a given array of comment types.
     *                                                   Default empty.
     *     @type int          $user_id                   Include comments for a specific user ID. Default empty.
     *     @type bool|string  $hierarchical              Whether to include comment descendants in the results.
     *                                                   'threaded' returns a tree, with each comment's children
     *                                                   stored in a `children` property on the `WP_Comment`
     *                                                   object. 'flat' returns a flat array of found comments plus
     *                                                   their children. Pass `false` to leave out descendants.
     *                                                   The parameter is ignored (forced to `false`) when
     *                                                   `$fields` is 'ids' or 'counts'. Accepts 'threaded',
     *                                                   'flat', or false. Default: false.
     *     @type string       $cache_domain              Unique cache key to be produced when this query is stored in
     *                                                   an object cache. Default is 'core'.
     *     @type bool         $update_comment_meta_cache Whether to prime the metadata cache for found comments.
     *                                                   Default true.
     *     @type bool         $update_comment_post_cache Whether to prime the cache for comment posts.
     *                                                   Default false.
     * }
     */
    public function __construct($query = '')
    {
    }
    /**
     * Parse arguments passed to the comment query with default query parameters.
     *
     * @since 4.2.0 Extracted from WP_Comment_Query::query().
     *
     *
     * @param string|array $query WP_Comment_Query arguments. See WP_Comment_Query::__construct()
     */
    public function parse_query($query = '')
    {
    }
    /**
     * Sets up the WordPress query for retrieving comments.
     *
     * @since 3.1.0
     * @since 4.1.0 Introduced 'comment__in', 'comment__not_in', 'post_author__in',
     *              'post_author__not_in', 'author__in', 'author__not_in', 'post__in',
     *              'post__not_in', 'include_unapproved', 'type__in', and 'type__not_in'
     *              arguments to $query_vars.
     * @since 4.2.0 Moved parsing to WP_Comment_Query::parse_query().
     *
     * @param string|array $query Array or URL query string of parameters.
     * @return array|int List of comments, or number of comments when 'count' is passed as a query var.
     */
    public function query($query)
    {
    }
    /**
     * Get a list of comments matching the query vars.
     *
     * @since 4.2.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @return int|array List of comments or number of found comments if `$count` argument is true.
     */
    public function get_comments()
    {
    }
    /**
     * Used internally to get a list of comment IDs matching the query vars.
     *
     * @since 4.4.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     */
    protected function get_comment_ids()
    {
    }
    /**
     * Populates found_comments and max_num_pages properties for the current
     * query if the limit clause was used.
     *
     * @since 4.6.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     */
    private function set_found_comments()
    {
    }
    /**
     * Fetch descendants for located comments.
     *
     * Instead of calling `get_children()` separately on each child comment, we do a single set of queries to fetch
     * the descendant trees for all matched top-level comments.
     *
     * @since 4.4.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param array $comments Array of top-level comments whose descendants should be filled in.
     * @return array
     */
    protected function fill_descendants($comments)
    {
    }
    /**
     * Used internally to generate an SQL string for searching across multiple columns
     *
     * @since 3.1.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $string
     * @param array $cols
     * @return string
     */
    protected function get_search_sql($string, $cols)
    {
    }
    /**
     * Parse and sanitize 'orderby' keys passed to the comment query.
     *
     * @since 4.2.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $orderby Alias for the field to order by.
     * @return string|false Value to used in the ORDER clause. False otherwise.
     */
    protected function parse_orderby($orderby)
    {
    }
    /**
     * Parse an 'order' query variable and cast it to ASC or DESC as necessary.
     *
     * @since 4.2.0
     *
     * @param string $order The 'order' query variable.
     * @return string The sanitized 'order' query variable.
     */
    protected function parse_order($order)
    {
    }
}
/**
 * Comment API: WP_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */
/**
 * Core class used to organize comments as instantiated objects with defined members.
 *
 * @since 4.4.0
 */
final class WP_Comment
{
    /**
     * Comment ID.
     *
     * @since 4.4.0
     * @var int
     */
    public $comment_ID;
    /**
     * ID of the post the comment is associated with.
     *
     * @since 4.4.0
     * @var int
     */
    public $comment_post_ID = 0;
    /**
     * Comment author name.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_author = '';
    /**
     * Comment author email address.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_author_email = '';
    /**
     * Comment author URL.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_author_url = '';
    /**
     * Comment author IP address (IPv4 format).
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_author_IP = '';
    /**
     * Comment date in YYYY-MM-DD HH:MM:SS format.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_date = '0000-00-00 00:00:00';
    /**
     * Comment GMT date in YYYY-MM-DD HH::MM:SS format.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_date_gmt = '0000-00-00 00:00:00';
    /**
     * Comment content.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_content;
    /**
     * Comment karma count.
     *
     * @since 4.4.0
     * @var int
     */
    public $comment_karma = 0;
    /**
     * Comment approval status.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_approved = '1';
    /**
     * Comment author HTTP user agent.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_agent = '';
    /**
     * Comment type.
     *
     * @since 4.4.0
     * @var string
     */
    public $comment_type = '';
    /**
     * Parent comment ID.
     *
     * @since 4.4.0
     * @var int
     */
    public $comment_parent = 0;
    /**
     * Comment author ID.
     *
     * @since 4.4.0
     * @var int
     */
    public $user_id = 0;
    /**
     * Comment children.
     *
     * @since 4.4.0
     * @var array
     */
    protected $children;
    /**
     * Whether children have been populated for this comment object.
     *
     * @since 4.4.0
     * @var bool
     */
    protected $populated_children = \false;
    /**
     * Post fields.
     *
     * @since 4.4.0
     * @var array
     */
    protected $post_fields = array('post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_name', 'to_ping', 'pinged', 'post_modified', 'post_modified_gmt', 'post_content_filtered', 'post_parent', 'guid', 'menu_order', 'post_type', 'post_mime_type', 'comment_count');
    /**
     * Retrieves a WP_Comment instance.
     *
     * @since 4.4.0
     * @static
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param int $id Comment ID.
     * @return WP_Comment|false Comment object, otherwise false.
     */
    public static function get_instance($id)
    {
    }
    /**
     * Constructor.
     *
     * Populates properties with object vars.
     *
     * @since 4.4.0
     *
     * @param WP_Comment $comment Comment object.
     */
    public function __construct($comment)
    {
    }
    /**
     * Convert object to array.
     *
     * @since 4.4.0
     *
     * @return array Object as array.
     */
    public function to_array()
    {
    }
    /**
     * Get the children of a comment.
     *
     * @since 4.4.0
     *
     * @param array $args {
     *     Array of arguments used to pass to get_comments() and determine format.
     *
     *     @type string $format        Return value format. 'tree' for a hierarchical tree, 'flat' for a flattened array.
     *                                 Default 'tree'.
     *     @type string $status        Comment status to limit results by. Accepts 'hold' (`comment_status=0`),
     *                                 'approve' (`comment_status=1`), 'all', or a custom comment status.
     *                                 Default 'all'.
     *     @type string $hierarchical  Whether to include comment descendants in the results.
     *                                 'threaded' returns a tree, with each comment's children
     *                                 stored in a `children` property on the `WP_Comment` object.
     *                                 'flat' returns a flat array of found comments plus their children.
     *                                 Pass `false` to leave out descendants.
     *                                 The parameter is ignored (forced to `false`) when `$fields` is 'ids' or 'counts'.
     *                                 Accepts 'threaded', 'flat', or false. Default: 'threaded'.
     *     @type string|array $orderby Comment status or array of statuses. To use 'meta_value'
     *                                 or 'meta_value_num', `$meta_key` must also be defined.
     *                                 To sort by a specific `$meta_query` clause, use that
     *                                 clause's array key. Accepts 'comment_agent',
     *                                 'comment_approved', 'comment_author',
     *                                 'comment_author_email', 'comment_author_IP',
     *                                 'comment_author_url', 'comment_content', 'comment_date',
     *                                 'comment_date_gmt', 'comment_ID', 'comment_karma',
     *                                 'comment_parent', 'comment_post_ID', 'comment_type',
     *                                 'user_id', 'comment__in', 'meta_value', 'meta_value_num',
     *                                 the value of $meta_key, and the array keys of
     *                                 `$meta_query`. Also accepts false, an empty array, or
     *                                 'none' to disable `ORDER BY` clause.
     * }
     * @return array Array of `WP_Comment` objects.
     */
    public function get_children($args = array())
    {
    }
    /**
     * Add a child to the comment.
     *
     * Used by `WP_Comment_Query` when bulk-filling descendants.
     *
     * @since 4.4.0
     *
     * @param WP_Comment $child Child comment.
     */
    public function add_child(\WP_Comment $child)
    {
    }
    /**
     * Get a child comment by ID.
     *
     * @since 4.4.0
     *
     * @param int $child_id ID of the child.
     * @return WP_Comment|bool Returns the comment object if found, otherwise false.
     */
    public function get_child($child_id)
    {
    }
    /**
     * Set the 'populated_children' flag.
     *
     * This flag is important for ensuring that calling `get_children()` on a childless comment will not trigger
     * unneeded database queries.
     *
     * @since 4.4.0
     *
     * @param bool $set Whether the comment's children have already been populated.
     */
    public function populated_children($set)
    {
    }
    /**
     * Check whether a non-public property is set.
     *
     * If `$name` matches a post field, the comment post will be loaded and the post's value checked.
     *
     * @since 4.4.0
     *
     * @param string $name Property name.
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Magic getter.
     *
     * If `$name` matches a post field, the comment post will be loaded and the post's value returned.
     *
     * @since 4.4.0
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
    }
}
/**
 * WordPress Customize Control classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
/**
 * Customize Control class.
 *
 * @since 3.4.0
 */
class WP_Customize_Control
{
    /**
     * Incremented with each new class instantiation, then stored in $instance_number.
     *
     * Used when sorting two instances whose priorities are equal.
     *
     * @since 4.1.0
     *
     * @static
     * @var int
     */
    protected static $instance_count = 0;
    /**
     * Order in which this instance was created in relation to other instances.
     *
     * @since 4.1.0
     * @var int
     */
    public $instance_number;
    /**
     * Customizer manager.
     *
     * @since 3.4.0
     * @var WP_Customize_Manager
     */
    public $manager;
    /**
     * Control ID.
     *
     * @since 3.4.0
     * @var string
     */
    public $id;
    /**
     * All settings tied to the control.
     *
     * @since 3.4.0
     * @var array
     */
    public $settings;
    /**
     * The primary setting for the control (if there is one).
     *
     * @since 3.4.0
     * @var string
     */
    public $setting = 'default';
    /**
     * Capability required to use this control.
     *
     * Normally this is empty and the capability is derived from the capabilities
     * of the associated `$settings`.
     *
     * @since 4.5.0
     * @var string
     */
    public $capability;
    /**
     * Order priority to load the control in Customizer.
     *
     * @since 3.4.0
     * @var int
     */
    public $priority = 10;
    /**
     * Section the control belongs to.
     *
     * @since 3.4.0
     * @var string
     */
    public $section = '';
    /**
     * Label for the control.
     *
     * @since 3.4.0
     * @var string
     */
    public $label = '';
    /**
     * Description for the control.
     *
     * @since 4.0.0
     * @var string
     */
    public $description = '';
    /**
     * List of choices for 'radio' or 'select' type controls, where values are the keys, and labels are the values.
     *
     * @since 3.4.0
     * @var array
     */
    public $choices = array();
    /**
     * List of custom input attributes for control output, where attribute names are the keys and values are the values.
     *
     * Not used for 'checkbox', 'radio', 'select', 'textarea', or 'dropdown-pages' control types.
     *
     * @since 4.0.0
     * @var array
     */
    public $input_attrs = array();
    /**
     * Show UI for adding new content, currently only used for the dropdown-pages control.
     *
     * @since 4.7.0
     * @var bool
     */
    public $allow_addition = \false;
    /**
     * @deprecated It is better to just call the json() method
     * @since 3.4.0
     * @var array
     */
    public $json = array();
    /**
     * Control's Type.
     *
     * @since 3.4.0
     * @var string
     */
    public $type = 'text';
    /**
     * Callback.
     *
     * @since 4.0.0
     *
     * @see WP_Customize_Control::active()
     *
     * @var callable Callback is called with one argument, the instance of
     *               WP_Customize_Control, and returns bool to indicate whether
     *               the control is active (such as it relates to the URL
     *               currently being previewed).
     */
    public $active_callback = '';
    /**
     * Constructor.
     *
     * Supplied `$args` override class property defaults.
     *
     * If `$args['settings']` is not defined, use the $id as the setting ID.
     *
     * @since 3.4.0
     *
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string               $id      Control ID.
     * @param array                $args    {
     *     Optional. Arguments to override class property defaults.
     *
     *     @type int                  $instance_number Order in which this instance was created in relation
     *                                                 to other instances.
     *     @type WP_Customize_Manager $manager         Customizer bootstrap instance.
     *     @type string               $id              Control ID.
     *     @type array                $settings        All settings tied to the control. If undefined, `$id` will
     *                                                 be used.
     *     @type string               $setting         The primary setting for the control (if there is one).
     *                                                 Default 'default'.
     *     @type int                  $priority        Order priority to load the control. Default 10.
     *     @type string               $section         Section the control belongs to. Default empty.
     *     @type string               $label           Label for the control. Default empty.
     *     @type string               $description     Description for the control. Default empty.
     *     @type array                $choices         List of choices for 'radio' or 'select' type controls, where
     *                                                 values are the keys, and labels are the values.
     *                                                 Default empty array.
     *     @type array                $input_attrs     List of custom input attributes for control output, where
     *                                                 attribute names are the keys and values are the values. Not
     *                                                 used for 'checkbox', 'radio', 'select', 'textarea', or
     *                                                 'dropdown-pages' control types. Default empty array.
     *     @type array                $json            Deprecated. Use WP_Customize_Control::json() instead.
     *     @type string               $type            Control type. Core controls include 'text', 'checkbox',
     *                                                 'textarea', 'radio', 'select', and 'dropdown-pages'. Additional
     *                                                 input types such as 'email', 'url', 'number', 'hidden', and
     *                                                 'date' are supported implicitly. Default 'text'.
     * }
     */
    public function __construct($manager, $id, $args = array())
    {
    }
    /**
     * Enqueue control related scripts/styles.
     *
     * @since 3.4.0
     */
    public function enqueue()
    {
    }
    /**
     * Check whether control is active to current Customizer preview.
     *
     * @since 4.0.0
     *
     * @return bool Whether the control is active to the current preview.
     */
    public final function active()
    {
    }
    /**
     * Default callback used when invoking WP_Customize_Control::active().
     *
     * Subclasses can override this with their specific logic, or they may
     * provide an 'active_callback' argument to the constructor.
     *
     * @since 4.0.0
     *
     * @return true Always true.
     */
    public function active_callback()
    {
    }
    /**
     * Fetch a setting's value.
     * Grabs the main setting by default.
     *
     * @since 3.4.0
     *
     * @param string $setting_key
     * @return mixed The requested setting's value, if the setting exists.
     */
    public final function value($setting_key = 'default')
    {
    }
    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @since 3.4.0
     */
    public function to_json()
    {
    }
    /**
     * Get the data to export to the client via JSON.
     *
     * @since 4.1.0
     *
     * @return array Array of parameters passed to the JavaScript.
     */
    public function json()
    {
    }
    /**
     * Checks if the user can use this control.
     *
     * Returns false if the user cannot manipulate one of the associated settings,
     * or if one of the associated settings does not exist. Also returns false if
     * the associated section does not exist or if its capability check returns
     * false.
     *
     * @since 3.4.0
     *
     * @return bool False if theme doesn't support the control or user doesn't have the required permissions, otherwise true.
     */
    public final function check_capabilities()
    {
    }
    /**
     * Get the control's content for insertion into the Customizer pane.
     *
     * @since 4.1.0
     *
     * @return string Contents of the control.
     */
    public final function get_content()
    {
    }
    /**
     * Check capabilities and render the control.
     *
     * @since 3.4.0
     * @uses WP_Customize_Control::render()
     */
    public final function maybe_render()
    {
    }
    /**
     * Renders the control wrapper and calls $this->render_content() for the internals.
     *
     * @since 3.4.0
     */
    protected function render()
    {
    }
    /**
     * Get the data link attribute for a setting.
     *
     * @since 3.4.0
     * @since 4.9.0 Return a `data-customize-setting-key-link` attribute if a setting is not registered for the supplied setting key.
     *
     * @param string $setting_key
     * @return string Data link parameter, a `data-customize-setting-link` attribute if the `$setting_key` refers to a pre-registered setting,
     *                and a `data-customize-setting-key-link` attribute if the setting is not yet registered.
     */
    public function get_link($setting_key = 'default')
    {
    }
    /**
     * Render the data link attribute for the control's input element.
     *
     * @since 3.4.0
     * @uses WP_Customize_Control::get_link()
     *
     * @param string $setting_key
     */
    public function link($setting_key = 'default')
    {
    }
    /**
     * Render the custom attributes for the control's input element.
     *
     * @since 4.0.0
     */
    public function input_attrs()
    {
    }
    /**
     * Render the control's content.
     *
     * Allows the content to be overridden without having to rewrite the wrapper in `$this::render()`.
     *
     * Supports basic input types `text`, `checkbox`, `textarea`, `radio`, `select` and `dropdown-pages`.
     * Additional input types such as `email`, `url`, `number`, `hidden` and `date` are supported implicitly.
     *
     * Control content can alternately be rendered in JS. See WP_Customize_Control::print_template().
     *
     * @since 3.4.0
     */
    protected function render_content()
    {
    }
    /**
     * Render the control's JS template.
     *
     * This function is only run for control types that have been registered with
     * WP_Customize_Manager::register_control_type().
     *
     * In the future, this will also print the template for the control's container
     * element and be override-able.
     *
     * @since 4.1.0
     */
    public final function print_template()
    {
    }
    /**
     * An Underscore (JS) template for this control's content (but not its container).
     *
     * Class variables for this control class are available in the `data` JS object;
     * export custom variables by overriding WP_Customize_Control::to_json().
     *
     * @see WP_Customize_Control::print_template()
     *
     * @since 4.1.0
     */
    protected function content_template()
    {
    }
}
/**
 * WordPress Customize Manager classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
/**
 * Customize Manager class.
 *
 * Bootstraps the Customize experience on the server-side.
 *
 * Sets up the theme-switching process if a theme other than the active one is
 * being previewed and customized.
 *
 * Serves as a factory for Customize Controls and Settings, and
 * instantiates default Customize Controls and Settings.
 *
 * @since 3.4.0
 */
final class WP_Customize_Manager
{
    /**
     * An instance of the theme being previewed.
     *
     * @since 3.4.0
     * @var WP_Theme
     */
    protected $theme;
    /**
     * The directory name of the previously active theme (within the theme_root).
     *
     * @since 3.4.0
     * @var string
     */
    protected $original_stylesheet;
    /**
     * Whether this is a Customizer pageload.
     *
     * @since 3.4.0
     * @var bool
     */
    protected $previewing = \false;
    /**
     * Methods and properties dealing with managing widgets in the Customizer.
     *
     * @since 3.9.0
     * @var WP_Customize_Widgets
     */
    public $widgets;
    /**
     * Methods and properties dealing with managing nav menus in the Customizer.
     *
     * @since 4.3.0
     * @var WP_Customize_Nav_Menus
     */
    public $nav_menus;
    /**
     * Methods and properties dealing with selective refresh in the Customizer preview.
     *
     * @since 4.5.0
     * @var WP_Customize_Selective_Refresh
     */
    public $selective_refresh;
    /**
     * Registered instances of WP_Customize_Setting.
     *
     * @since 3.4.0
     * @var array
     */
    protected $settings = array();
    /**
     * Sorted top-level instances of WP_Customize_Panel and WP_Customize_Section.
     *
     * @since 4.0.0
     * @var array
     */
    protected $containers = array();
    /**
     * Registered instances of WP_Customize_Panel.
     *
     * @since 4.0.0
     * @var array
     */
    protected $panels = array();
    /**
     * List of core components.
     *
     * @since 4.5.0
     * @var array
     */
    protected $components = array('widgets', 'nav_menus');
    /**
     * Registered instances of WP_Customize_Section.
     *
     * @since 3.4.0
     * @var array
     */
    protected $sections = array();
    /**
     * Registered instances of WP_Customize_Control.
     *
     * @since 3.4.0
     * @var array
     */
    protected $controls = array();
    /**
     * Panel types that may be rendered from JS templates.
     *
     * @since 4.3.0
     * @var array
     */
    protected $registered_panel_types = array();
    /**
     * Section types that may be rendered from JS templates.
     *
     * @since 4.3.0
     * @var array
     */
    protected $registered_section_types = array();
    /**
     * Control types that may be rendered from JS templates.
     *
     * @since 4.1.0
     * @var array
     */
    protected $registered_control_types = array();
    /**
     * Initial URL being previewed.
     *
     * @since 4.4.0
     * @var string
     */
    protected $preview_url;
    /**
     * URL to link the user to when closing the Customizer.
     *
     * @since 4.4.0
     * @var string
     */
    protected $return_url;
    /**
     * Mapping of 'panel', 'section', 'control' to the ID which should be autofocused.
     *
     * @since 4.4.0
     * @var array
     */
    protected $autofocus = array();
    /**
     * Messenger channel.
     *
     * @since 4.7.0
     * @var string
     */
    protected $messenger_channel;
    /**
     * Whether the autosave revision of the changeset should be loaded.
     *
     * @since 4.9.0
     * @var bool
     */
    protected $autosaved = \false;
    /**
     * Whether the changeset branching is allowed.
     *
     * @since 4.9.0
     * @var bool
     */
    protected $branching = \true;
    /**
     * Whether settings should be previewed.
     *
     * @since 4.9.0
     * @var bool
     */
    protected $settings_previewed = \true;
    /**
     * Whether a starter content changeset was saved.
     *
     * @since 4.9.0
     * @var bool
     */
    protected $saved_starter_content_changeset = \false;
    /**
     * Unsanitized values for Customize Settings parsed from $_POST['customized'].
     *
     * @var array
     */
    private $_post_values;
    /**
     * Changeset UUID.
     *
     * @since 4.7.0
     * @var string
     */
    private $_changeset_uuid;
    /**
     * Changeset post ID.
     *
     * @since 4.7.0
     * @var int|false
     */
    private $_changeset_post_id;
    /**
     * Changeset data loaded from a customize_changeset post.
     *
     * @since 4.7.0
     * @var array
     */
    private $_changeset_data;
    /**
     * Constructor.
     *
     * @since 3.4.0
     * @since 4.7.0 Added $args param.
     *
     * @param array $args {
     *     Args.
     *
     *     @type null|string|false $changeset_uuid     Changeset UUID, the `post_name` for the customize_changeset post containing the customized state.
     *                                                 Defaults to `null` resulting in a UUID to be immediately generated. If `false` is provided, then
     *                                                 then the changeset UUID will be determined during `after_setup_theme`: when the
     *                                                 `customize_changeset_branching` filter returns false, then the default UUID will be that
     *                                                 of the most recent `customize_changeset` post that has a status other than 'auto-draft',
     *                                                 'publish', or 'trash'. Otherwise, if changeset branching is enabled, then a random UUID will be used.
     *     @type string            $theme              Theme to be previewed (for theme switch). Defaults to customize_theme or theme query params.
     *     @type string            $messenger_channel  Messenger channel. Defaults to customize_messenger_channel query param.
     *     @type bool              $settings_previewed If settings should be previewed. Defaults to true.
     *     @type bool              $branching          If changeset branching is allowed; otherwise, changesets are linear. Defaults to true.
     *     @type bool              $autosaved          If data from a changeset's autosaved revision should be loaded if it exists. Defaults to false.
     * }
     */
    public function __construct($args = array())
    {
    }
    /**
     * Return true if it's an Ajax request.
     *
     * @since 3.4.0
     * @since 4.2.0 Added `$action` param.
     *
     * @param string|null $action Whether the supplied Ajax action is being run.
     * @return bool True if it's an Ajax request, false otherwise.
     */
    public function doing_ajax($action = \null)
    {
    }
    /**
     * Custom wp_die wrapper. Returns either the standard message for UI
     * or the Ajax message.
     *
     * @since 3.4.0
     *
     * @param mixed $ajax_message Ajax return
     * @param mixed $message UI message
     */
    protected function wp_die($ajax_message, $message = \null)
    {
    }
    /**
     * Return the Ajax wp_die() handler if it's a customized request.
     *
     * @since 3.4.0
     * @deprecated 4.7.0
     *
     * @return callable Die handler.
     */
    public function wp_die_handler()
    {
    }
    /**
     * Start preview and customize theme.
     *
     * Check if customize query variable exist. Init filters to filter the current theme.
     *
     * @since 3.4.0
     *
     * @global string $pagenow
     */
    public function setup_theme()
    {
    }
    /**
     * Establish the loaded changeset.
     *
     * This method runs right at after_setup_theme and applies the 'customize_changeset_branching' filter to determine
     * whether concurrent changesets are allowed. Then if the Customizer is not initialized with a `changeset_uuid` param,
     * this method will determine which UUID should be used. If changeset branching is disabled, then the most saved
     * changeset will be loaded by default. Otherwise, if there are no existing saved changesets or if changeset branching is
     * enabled, then a new UUID will be generated.
     *
     * @since 4.9.0
     * @global string $pagenow
     */
    public function establish_loaded_changeset()
    {
    }
    /**
     * Callback to validate a theme once it is loaded
     *
     * @since 3.4.0
     */
    public function after_setup_theme()
    {
    }
    /**
     * If the theme to be previewed isn't the active theme, add filter callbacks
     * to swap it out at runtime.
     *
     * @since 3.4.0
     */
    public function start_previewing_theme()
    {
    }
    /**
     * Stop previewing the selected theme.
     *
     * Removes filters to change the current theme.
     *
     * @since 3.4.0
     */
    public function stop_previewing_theme()
    {
    }
    /**
     * Gets whether settings are or will be previewed.
     *
     * @since 4.9.0
     * @see WP_Customize_Setting::preview()
     *
     * @return bool
     */
    public function settings_previewed()
    {
    }
    /**
     * Gets whether data from a changeset's autosaved revision should be loaded if it exists.
     *
     * @since 4.9.0
     * @see WP_Customize_Manager::changeset_data()
     *
     * @return bool Is using autosaved changeset revision.
     */
    public function autosaved()
    {
    }
    /**
     * Whether the changeset branching is allowed.
     *
     * @since 4.9.0
     * @see WP_Customize_Manager::establish_loaded_changeset()
     *
     * @return bool Is changeset branching.
     */
    public function branching()
    {
    }
    /**
     * Get the changeset UUID.
     *
     * @since 4.7.0
     * @see WP_Customize_Manager::establish_loaded_changeset()
     *
     * @return string UUID.
     */
    public function changeset_uuid()
    {
    }
    /**
     * Get the theme being customized.
     *
     * @since 3.4.0
     *
     * @return WP_Theme
     */
    public function theme()
    {
    }
    /**
     * Get the registered settings.
     *
     * @since 3.4.0
     *
     * @return array
     */
    public function settings()
    {
    }
    /**
     * Get the registered controls.
     *
     * @since 3.4.0
     *
     * @return array
     */
    public function controls()
    {
    }
    /**
     * Get the registered containers.
     *
     * @since 4.0.0
     *
     * @return array
     */
    public function containers()
    {
    }
    /**
     * Get the registered sections.
     *
     * @since 3.4.0
     *
     * @return array
     */
    public function sections()
    {
    }
    /**
     * Get the registered panels.
     *
     * @since 4.0.0
     *
     * @return array Panels.
     */
    public function panels()
    {
    }
    /**
     * Checks if the current theme is active.
     *
     * @since 3.4.0
     *
     * @return bool
     */
    public function is_theme_active()
    {
    }
    /**
     * Register styles/scripts and initialize the preview of each setting
     *
     * @since 3.4.0
     */
    public function wp_loaded()
    {
    }
    /**
     * Prevents Ajax requests from following redirects when previewing a theme
     * by issuing a 200 response instead of a 30x.
     *
     * Instead, the JS will sniff out the location header.
     *
     * @since 3.4.0
     * @deprecated 4.7.0
     *
     * @param int $status Status.
     * @return int
     */
    public function wp_redirect_status($status)
    {
    }
    /**
     * Find the changeset post ID for a given changeset UUID.
     *
     * @since 4.7.0
     *
     * @param string $uuid Changeset UUID.
     * @return int|null Returns post ID on success and null on failure.
     */
    public function find_changeset_post_id($uuid)
    {
    }
    /**
     * Get changeset posts.
     *
     * @since 4.9.0
     *
     * @param array $args {
     *     Args to pass into `get_posts()` to query changesets.
     *
     *     @type int    $posts_per_page             Number of posts to return. Defaults to -1 (all posts).
     *     @type int    $author                     Post author. Defaults to current user.
     *     @type string $post_status                Status of changeset. Defaults to 'auto-draft'.
     *     @type bool   $exclude_restore_dismissed  Whether to exclude changeset auto-drafts that have been dismissed. Defaults to true.
     * }
     * @return WP_Post[] Auto-draft changesets.
     */
    protected function get_changeset_posts($args = array())
    {
    }
    /**
     * Dismiss all of the current user's auto-drafts (other than the present one).
     *
     * @since 4.9.0
     * @return int The number of auto-drafts that were dismissed.
     */
    protected function dismiss_user_auto_draft_changesets()
    {
    }
    /**
     * Get the changeset post id for the loaded changeset.
     *
     * @since 4.7.0
     *
     * @return int|null Post ID on success or null if there is no post yet saved.
     */
    public function changeset_post_id()
    {
    }
    /**
     * Get the data stored in a changeset post.
     *
     * @since 4.7.0
     *
     * @param int $post_id Changeset post ID.
     * @return array|WP_Error Changeset data or WP_Error on error.
     */
    protected function get_changeset_post_data($post_id)
    {
    }
    /**
     * Get changeset data.
     *
     * @since 4.7.0
     * @since 4.9.0 This will return the changeset's data with a user's autosave revision merged on top, if one exists and $autosaved is true.
     *
     * @return array Changeset data.
     */
    public function changeset_data()
    {
    }
    /**
     * Starter content setting IDs.
     *
     * @since 4.7.0
     * @var array
     */
    protected $pending_starter_content_settings_ids = array();
    /**
     * Import theme starter content into the customized state.
     *
     * @since 4.7.0
     *
     * @param array $starter_content Starter content. Defaults to `get_theme_starter_content()`.
     */
    function import_theme_starter_content($starter_content = array())
    {
    }
    /**
     * Prepare starter content attachments.
     *
     * Ensure that the attachments are valid and that they have slugs and file name/path.
     *
     * @since 4.7.0
     *
     * @param array $attachments Attachments.
     * @return array Prepared attachments.
     */
    protected function prepare_starter_content_attachments($attachments)
    {
    }
    /**
     * Save starter content changeset.
     *
     * @since 4.7.0
     */
    public function _save_starter_content_changeset()
    {
    }
    /**
     * Get dirty pre-sanitized setting values in the current customized state.
     *
     * The returned array consists of a merge of three sources:
     * 1. If the theme is not currently active, then the base array is any stashed
     *    theme mods that were modified previously but never published.
     * 2. The values from the current changeset, if it exists.
     * 3. If the user can customize, the values parsed from the incoming
     *    `$_POST['customized']` JSON data.
     * 4. Any programmatically-set post values via `WP_Customize_Manager::set_post_value()`.
     *
     * The name "unsanitized_post_values" is a carry-over from when the customized
     * state was exclusively sourced from `$_POST['customized']`. Nevertheless,
     * the value returned will come from the current changeset post and from the
     * incoming post data.
     *
     * @since 4.1.1
     * @since 4.7.0 Added $args param and merging with changeset values and stashed theme mods.
     *
     * @param array $args {
     *     Args.
     *
     *     @type bool $exclude_changeset Whether the changeset values should also be excluded. Defaults to false.
     *     @type bool $exclude_post_data Whether the post input values should also be excluded. Defaults to false when lacking the customize capability.
     * }
     * @return array
     */
    public function unsanitized_post_values($args = array())
    {
    }
    /**
     * Returns the sanitized value for a given setting from the current customized state.
     *
     * The name "post_value" is a carry-over from when the customized state was exclusively
     * sourced from `$_POST['customized']`. Nevertheless, the value returned will come
     * from the current changeset post and from the incoming post data.
     *
     * @since 3.4.0
     * @since 4.1.1 Introduced the `$default` parameter.
     * @since 4.6.0 `$default` is now returned early when the setting post value is invalid.
     *
     * @see WP_REST_Server::dispatch()
     * @see WP_REST_Request::sanitize_params()
     * @see WP_REST_Request::has_valid_params()
     *
     * @param WP_Customize_Setting $setting A WP_Customize_Setting derived object.
     * @param mixed                $default Value returned $setting has no post value (added in 4.2.0)
     *                                      or the post value is invalid (added in 4.6.0).
     * @return string|mixed $post_value Sanitized value or the $default provided.
     */
    public function post_value($setting, $default = \null)
    {
    }
    /**
     * Override a setting's value in the current customized state.
     *
     * The name "post_value" is a carry-over from when the customized state was
     * exclusively sourced from `$_POST['customized']`.
     *
     * @since 4.2.0
     *
     * @param string $setting_id ID for the WP_Customize_Setting instance.
     * @param mixed  $value      Post value.
     */
    public function set_post_value($setting_id, $value)
    {
    }
    /**
     * Print JavaScript settings.
     *
     * @since 3.4.0
     */
    public function customize_preview_init()
    {
    }
    /**
     * Filter the X-Frame-Options and Content-Security-Policy headers to ensure frontend can load in customizer.
     *
     * @since 4.7.0
     *
     * @param array $headers Headers.
     * @return array Headers.
     */
    public function filter_iframe_security_headers($headers)
    {
    }
    /**
     * Add customize state query params to a given URL if preview is allowed.
     *
     * @since 4.7.0
     * @see wp_redirect()
     * @see WP_Customize_Manager::get_allowed_url()
     *
     * @param string $url URL.
     * @return string URL.
     */
    public function add_state_query_params($url)
    {
    }
    /**
     * Prevent sending a 404 status when returning the response for the customize
     * preview, since it causes the jQuery Ajax to fail. Send 200 instead.
     *
     * @since 4.0.0
     * @deprecated 4.7.0
     */
    public function customize_preview_override_404_status()
    {
    }
    /**
     * Print base element for preview frame.
     *
     * @since 3.4.0
     * @deprecated 4.7.0
     */
    public function customize_preview_base()
    {
    }
    /**
     * Print a workaround to handle HTML5 tags in IE < 9.
     *
     * @since 3.4.0
     * @deprecated 4.7.0 Customizer no longer supports IE8, so all supported browsers recognize HTML5.
     */
    public function customize_preview_html5()
    {
    }
    /**
     * Print CSS for loading indicators for the Customizer preview.
     *
     * @since 4.2.0
     */
    public function customize_preview_loading_style()
    {
    }
    /**
     * Remove customize_messenger_channel query parameter from the preview window when it is not in an iframe.
     *
     * This ensures that the admin bar will be shown. It also ensures that link navigation will
     * work as expected since the parent frame is not being sent the URL to navigate to.
     *
     * @since 4.7.0
     */
    public function remove_frameless_preview_messenger_channel()
    {
    }
    /**
     * Print JavaScript settings for preview frame.
     *
     * @since 3.4.0
     */
    public function customize_preview_settings()
    {
    }
    /**
     * Prints a signature so we can ensure the Customizer was properly executed.
     *
     * @since 3.4.0
     * @deprecated 4.7.0
     */
    public function customize_preview_signature()
    {
    }
    /**
     * Removes the signature in case we experience a case where the Customizer was not properly executed.
     *
     * @since 3.4.0
     * @deprecated 4.7.0
     *
     * @param mixed $return Value passed through for {@see 'wp_die_handler'} filter.
     * @return mixed Value passed through for {@see 'wp_die_handler'} filter.
     */
    public function remove_preview_signature($return = \null)
    {
    }
    /**
     * Is it a theme preview?
     *
     * @since 3.4.0
     *
     * @return bool True if it's a preview, false if not.
     */
    public function is_preview()
    {
    }
    /**
     * Retrieve the template name of the previewed theme.
     *
     * @since 3.4.0
     *
     * @return string Template name.
     */
    public function get_template()
    {
    }
    /**
     * Retrieve the stylesheet name of the previewed theme.
     *
     * @since 3.4.0
     *
     * @return string Stylesheet name.
     */
    public function get_stylesheet()
    {
    }
    /**
     * Retrieve the template root of the previewed theme.
     *
     * @since 3.4.0
     *
     * @return string Theme root.
     */
    public function get_template_root()
    {
    }
    /**
     * Retrieve the stylesheet root of the previewed theme.
     *
     * @since 3.4.0
     *
     * @return string Theme root.
     */
    public function get_stylesheet_root()
    {
    }
    /**
     * Filters the current theme and return the name of the previewed theme.
     *
     * @since 3.4.0
     *
     * @param $current_theme {@internal Parameter is not used}
     * @return string Theme name.
     */
    public function current_theme($current_theme)
    {
    }
    /**
     * Validates setting values.
     *
     * Validation is skipped for unregistered settings or for values that are
     * already null since they will be skipped anyway. Sanitization is applied
     * to values that pass validation, and values that become null or `WP_Error`
     * after sanitizing are marked invalid.
     *
     * @since 4.6.0
     *
     * @see WP_REST_Request::has_valid_params()
     * @see WP_Customize_Setting::validate()
     *
     * @param array $setting_values Mapping of setting IDs to values to validate and sanitize.
     * @param array $options {
     *     Options.
     *
     *     @type bool $validate_existence  Whether a setting's existence will be checked.
     *     @type bool $validate_capability Whether the setting capability will be checked.
     * }
     * @return array Mapping of setting IDs to return value of validate method calls, either `true` or `WP_Error`.
     */
    public function validate_setting_values($setting_values, $options = array())
    {
    }
    /**
     * Prepares setting validity for exporting to the client (JS).
     *
     * Converts `WP_Error` instance into array suitable for passing into the
     * `wp.customize.Notification` JS model.
     *
     * @since 4.6.0
     *
     * @param true|WP_Error $validity Setting validity.
     * @return true|array If `$validity` was a WP_Error, the error codes will be array-mapped
     *                    to their respective `message` and `data` to pass into the
     *                    `wp.customize.Notification` JS model.
     */
    public function prepare_setting_validity_for_js($validity)
    {
    }
    /**
     * Handle customize_save WP Ajax request to save/update a changeset.
     *
     * @since 3.4.0
     * @since 4.7.0 The semantics of this method have changed to update a changeset, optionally to also change the status and other attributes.
     */
    public function save()
    {
    }
    /**
     * Save the post for the loaded changeset.
     *
     * @since 4.7.0
     *
     * @param array $args {
     *     Args for changeset post.
     *
     *     @type array  $data            Optional additional changeset data. Values will be merged on top of any existing post values.
     *     @type string $status          Post status. Optional. If supplied, the save will be transactional and a post revision will be allowed.
     *     @type string $title           Post title. Optional.
     *     @type string $date_gmt        Date in GMT. Optional.
     *     @type int    $user_id         ID for user who is saving the changeset. Optional, defaults to the current user ID.
     *     @type bool   $starter_content Whether the data is starter content. If false (default), then $starter_content will be cleared for any $data being saved.
     *     @type bool   $autosave        Whether this is a request to create an autosave revision.
     * }
     *
     * @return array|WP_Error Returns array on success and WP_Error with array data on error.
     */
    function save_changeset_post($args = array())
    {
    }
    /**
     * Trash or delete a changeset post.
     *
     * The following re-formulates the logic from `wp_trash_post()` as done in
     * `wp_publish_post()`. The reason for bypassing `wp_trash_post()` is that it
     * will mutate the the `post_content` and the `post_name` when they should be
     * untouched.
     *
     * @since 4.9.0
     * @global wpdb $wpdb WordPress database abstraction object.
     * @see wp_trash_post()
     *
     * @param int|WP_Post $post The changeset post.
     * @return mixed A WP_Post object for the trashed post or an empty value on failure.
     */
    public function trash_changeset_post($post)
    {
    }
    /**
     * Handle request to trash a changeset.
     *
     * @since 4.9.0
     */
    public function handle_changeset_trash_request()
    {
    }
    /**
     * Re-map 'edit_post' meta cap for a customize_changeset post to be the same as 'customize' maps.
     *
     * There is essentially a "meta meta" cap in play here, where 'edit_post' meta cap maps to
     * the 'customize' meta cap which then maps to 'edit_theme_options'. This is currently
     * required in core for `wp_create_post_autosave()` because it will call
     * `_wp_translate_postdata()` which in turn will check if a user can 'edit_post', but the
     * the caps for the customize_changeset post type are all mapping to the meta capability.
     * This should be able to be removed once #40922 is addressed in core.
     *
     * @since 4.9.0
     * @link https://core.trac.wordpress.org/ticket/40922
     * @see WP_Customize_Manager::save_changeset_post()
     * @see _wp_translate_postdata()
     *
     * @param array  $caps    Returns the user's actual capabilities.
     * @param string $cap     Capability name.
     * @param int    $user_id The user ID.
     * @param array  $args    Adds the context to the cap. Typically the object ID.
     * @return array Capabilities.
     */
    public function grant_edit_post_capability_for_changeset($caps, $cap, $user_id, $args)
    {
    }
    /**
     * Marks the changeset post as being currently edited by the current user.
     *
     * @since 4.9.0
     *
     * @param int  $changeset_post_id Changeset post id.
     * @param bool $take_over Take over the changeset, default is false.
     */
    public function set_changeset_lock($changeset_post_id, $take_over = \false)
    {
    }
    /**
     * Refreshes changeset lock with the current time if current user edited the changeset before.
     *
     * @since 4.9.0
     *
     * @param int $changeset_post_id Changeset post id.
     */
    public function refresh_changeset_lock($changeset_post_id)
    {
    }
    /**
     * Filter heartbeat settings for the Customizer.
     *
     * @since 4.9.0
     * @param array $settings Current settings to filter.
     * @return array Heartbeat settings.
     */
    public function add_customize_screen_to_heartbeat_settings($settings)
    {
    }
    /**
     * Get lock user data.
     *
     * @since 4.9.0
     *
     * @param int $user_id User ID.
     * @return array|null User data formatted for client.
     */
    protected function get_lock_user_data($user_id)
    {
    }
    /**
     * Check locked changeset with heartbeat API.
     *
     * @since 4.9.0
     *
     * @param array  $response  The Heartbeat response.
     * @param array  $data      The $_POST data sent.
     * @param string $screen_id The screen id.
     * @return array The Heartbeat response.
     */
    public function check_changeset_lock_with_heartbeat($response, $data, $screen_id)
    {
    }
    /**
     * Removes changeset lock when take over request is sent via Ajax.
     *
     * @since 4.9.0
     */
    public function handle_override_changeset_lock_request()
    {
    }
    /**
     * Whether a changeset revision should be made.
     *
     * @since 4.7.0
     * @var bool
     */
    protected $store_changeset_revision;
    /**
     * Filters whether a changeset has changed to create a new revision.
     *
     * Note that this will not be called while a changeset post remains in auto-draft status.
     *
     * @since 4.7.0
     *
     * @param bool    $post_has_changed Whether the post has changed.
     * @param WP_Post $last_revision    The last revision post object.
     * @param WP_Post $post             The post object.
     *
     * @return bool Whether a revision should be made.
     */
    public function _filter_revision_post_has_changed($post_has_changed, $last_revision, $post)
    {
    }
    /**
     * Publish changeset values.
     *
     * This will the values contained in a changeset, even changesets that do not
     * correspond to current manager instance. This is called by
     * `_wp_customize_publish_changeset()` when a customize_changeset post is
     * transitioned to the `publish` status. As such, this method should not be
     * called directly and instead `wp_publish_post()` should be used.
     *
     * Please note that if the settings in the changeset are for a non-activated
     * theme, the theme must first be switched to (via `switch_theme()`) before
     * invoking this method.
     *
     * @since 4.7.0
     * @see _wp_customize_publish_changeset()
     * @global wpdb $wpdb
     *
     * @param int $changeset_post_id ID for customize_changeset post. Defaults to the changeset for the current manager instance.
     * @return true|WP_Error True or error info.
     */
    public function _publish_changeset_values($changeset_post_id)
    {
    }
    /**
     * Update stashed theme mod settings.
     *
     * @since 4.7.0
     *
     * @param array $inactive_theme_mod_settings Mapping of stylesheet to arrays of theme mod settings.
     * @return array|false Returns array of updated stashed theme mods or false if the update failed or there were no changes.
     */
    protected function update_stashed_theme_mod_settings($inactive_theme_mod_settings)
    {
    }
    /**
     * Refresh nonces for the current preview.
     *
     * @since 4.2.0
     */
    public function refresh_nonces()
    {
    }
    /**
     * Delete a given auto-draft changeset or the autosave revision for a given changeset or delete changeset lock.
     *
     * @since 4.9.0
     */
    public function handle_dismiss_autosave_or_lock_request()
    {
    }
    /**
     * Add a customize setting.
     *
     * @since 3.4.0
     * @since 4.5.0 Return added WP_Customize_Setting instance.
     *
     * @param WP_Customize_Setting|string $id   Customize Setting object, or ID.
     * @param array                       $args {
     *  Optional. Array of properties for the new WP_Customize_Setting. Default empty array.
     *
     *  @type string       $type                  Type of the setting. Default 'theme_mod'.
     *                                            Default 160.
     *  @type string       $capability            Capability required for the setting. Default 'edit_theme_options'
     *  @type string|array $theme_supports        Theme features required to support the panel. Default is none.
     *  @type string       $default               Default value for the setting. Default is empty string.
     *  @type string       $transport             Options for rendering the live preview of changes in Theme Customizer.
     *                                            Using 'refresh' makes the change visible by reloading the whole preview.
     *                                            Using 'postMessage' allows a custom JavaScript to handle live changes.
     *                                            @link https://developer.wordpress.org/themes/customize-api
     *                                            Default is 'refresh'
     *  @type callable     $validate_callback     Server-side validation callback for the setting's value.
     *  @type callable     $sanitize_callback     Callback to filter a Customize setting value in un-slashed form.
     *  @type callable     $sanitize_js_callback  Callback to convert a Customize PHP setting value to a value that is
     *                                            JSON serializable.
     *  @type bool         $dirty                 Whether or not the setting is initially dirty when created.
     * }
     * @return WP_Customize_Setting             The instance of the setting that was added.
     */
    public function add_setting($id, $args = array())
    {
    }
    /**
     * Register any dynamically-created settings, such as those from $_POST['customized']
     * that have no corresponding setting created.
     *
     * This is a mechanism to "wake up" settings that have been dynamically created
     * on the front end and have been sent to WordPress in `$_POST['customized']`. When WP
     * loads, the dynamically-created settings then will get created and previewed
     * even though they are not directly created statically with code.
     *
     * @since 4.2.0
     *
     * @param array $setting_ids The setting IDs to add.
     * @return array The WP_Customize_Setting objects added.
     */
    public function add_dynamic_settings($setting_ids)
    {
    }
    /**
     * Retrieve a customize setting.
     *
     * @since 3.4.0
     *
     * @param string $id Customize Setting ID.
     * @return WP_Customize_Setting|void The setting, if set.
     */
    public function get_setting($id)
    {
    }
    /**
     * Remove a customize setting.
     *
     * @since 3.4.0
     *
     * @param string $id Customize Setting ID.
     */
    public function remove_setting($id)
    {
    }
    /**
     * Add a customize panel.
     *
     * @since 4.0.0
     * @since 4.5.0 Return added WP_Customize_Panel instance.
     *
     * @param WP_Customize_Panel|string $id   Customize Panel object, or Panel ID.
     * @param array                     $args {
     *  Optional. Array of properties for the new Panel object. Default empty array.
     *  @type int          $priority              Priority of the panel, defining the display order of panels and sections.
     *                                            Default 160.
     *  @type string       $capability            Capability required for the panel. Default `edit_theme_options`
     *  @type string|array $theme_supports        Theme features required to support the panel.
     *  @type string       $title                 Title of the panel to show in UI.
     *  @type string       $description           Description to show in the UI.
     *  @type string       $type                  Type of the panel.
     *  @type callable     $active_callback       Active callback.
     * }
     * @return WP_Customize_Panel             The instance of the panel that was added.
     */
    public function add_panel($id, $args = array())
    {
    }
    /**
     * Retrieve a customize panel.
     *
     * @since 4.0.0
     *
     * @param string $id Panel ID to get.
     * @return WP_Customize_Panel|void Requested panel instance, if set.
     */
    public function get_panel($id)
    {
    }
    /**
     * Remove a customize panel.
     *
     * @since 4.0.0
     *
     * @param string $id Panel ID to remove.
     */
    public function remove_panel($id)
    {
    }
    /**
     * Register a customize panel type.
     *
     * Registered types are eligible to be rendered via JS and created dynamically.
     *
     * @since 4.3.0
     *
     * @see WP_Customize_Panel
     *
     * @param string $panel Name of a custom panel which is a subclass of WP_Customize_Panel.
     */
    public function register_panel_type($panel)
    {
    }
    /**
     * Render JS templates for all registered panel types.
     *
     * @since 4.3.0
     */
    public function render_panel_templates()
    {
    }
    /**
     * Add a customize section.
     *
     * @since 3.4.0
     * @since 4.5.0 Return added WP_Customize_Section instance.
     *
     * @param WP_Customize_Section|string $id   Customize Section object, or Section ID.
     * @param array                     $args {
     *  Optional. Array of properties for the new Section object. Default empty array.
     *  @type int          $priority              Priority of the section, defining the display order of panels and sections.
     *                                            Default 160.
     *  @type string       $panel                 The panel this section belongs to (if any). Default empty.
     *  @type string       $capability            Capability required for the section. Default 'edit_theme_options'
     *  @type string|array $theme_supports        Theme features required to support the section.
     *  @type string       $title                 Title of the section to show in UI.
     *  @type string       $description           Description to show in the UI.
     *  @type string       $type                  Type of the section.
     *  @type callable     $active_callback       Active callback.
     *  @type bool         $description_hidden    Hide the description behind a help icon, instead of inline above the first control. Default false.
     * }
     * @return WP_Customize_Section             The instance of the section that was added.
     */
    public function add_section($id, $args = array())
    {
    }
    /**
     * Retrieve a customize section.
     *
     * @since 3.4.0
     *
     * @param string $id Section ID.
     * @return WP_Customize_Section|void The section, if set.
     */
    public function get_section($id)
    {
    }
    /**
     * Remove a customize section.
     *
     * @since 3.4.0
     *
     * @param string $id Section ID.
     */
    public function remove_section($id)
    {
    }
    /**
     * Register a customize section type.
     *
     * Registered types are eligible to be rendered via JS and created dynamically.
     *
     * @since 4.3.0
     *
     * @see WP_Customize_Section
     *
     * @param string $section Name of a custom section which is a subclass of WP_Customize_Section.
     */
    public function register_section_type($section)
    {
    }
    /**
     * Render JS templates for all registered section types.
     *
     * @since 4.3.0
     */
    public function render_section_templates()
    {
    }
    /**
     * Add a customize control.
     *
     * @since 3.4.0
     * @since 4.5.0 Return added WP_Customize_Control instance.
     *
     * @param WP_Customize_Control|string $id   Customize Control object, or ID.
     * @param array                       $args {
     *  Optional. Array of properties for the new Control object. Default empty array.
     *
     *  @type array        $settings              All settings tied to the control. If undefined, defaults to `$setting`.
     *                                            IDs in the array correspond to the ID of a registered `WP_Customize_Setting`.
     *  @type string       $setting               The primary setting for the control (if there is one). Default is 'default'.
     *  @type string       $capability            Capability required to use this control. Normally derived from `$settings`.
     *  @type int          $priority              Order priority to load the control. Default 10.
     *  @type string       $section               The section this control belongs to. Default empty.
     *  @type string       $label                 Label for the control. Default empty.
     *  @type string       $description           Description for the control. Default empty.
     *  @type array        $choices               List of choices for 'radio' or 'select' type controls, where values
     *                                            are the keys, and labels are the values. Default empty array.
     *  @type array        $input_attrs           List of custom input attributes for control output, where attribute
     *                                            names are the keys and values are the values. Default empty array.
     *  @type bool         $allow_addition        Show UI for adding new content, currently only used for the
     *                                            dropdown-pages control. Default false.
     *  @type string       $type                  The type of the control. Default 'text'.
     *  @type callback     $active_callback       Active callback.
     * }
     * @return WP_Customize_Control             The instance of the control that was added.
     */
    public function add_control($id, $args = array())
    {
    }
    /**
     * Retrieve a customize control.
     *
     * @since 3.4.0
     *
     * @param string $id ID of the control.
     * @return WP_Customize_Control|void The control object, if set.
     */
    public function get_control($id)
    {
    }
    /**
     * Remove a customize control.
     *
     * @since 3.4.0
     *
     * @param string $id ID of the control.
     */
    public function remove_control($id)
    {
    }
    /**
     * Register a customize control type.
     *
     * Registered types are eligible to be rendered via JS and created dynamically.
     *
     * @since 4.1.0
     *
     * @param string $control Name of a custom control which is a subclass of
     *                        WP_Customize_Control.
     */
    public function register_control_type($control)
    {
    }
    /**
     * Render JS templates for all registered control types.
     *
     * @since 4.1.0
     */
    public function render_control_templates()
    {
    }
    /**
     * Helper function to compare two objects by priority, ensuring sort stability via instance_number.
     *
     * @since 3.4.0
     * @deprecated 4.7.0 Use wp_list_sort()
     *
     * @param WP_Customize_Panel|WP_Customize_Section|WP_Customize_Control $a Object A.
     * @param WP_Customize_Panel|WP_Customize_Section|WP_Customize_Control $b Object B.
     * @return int
     */
    protected function _cmp_priority($a, $b)
    {
    }
    /**
     * Prepare panels, sections, and controls.
     *
     * For each, check if required related components exist,
     * whether the user has the necessary capabilities,
     * and sort by priority.
     *
     * @since 3.4.0
     */
    public function prepare_controls()
    {
    }
    /**
     * Enqueue scripts for customize controls.
     *
     * @since 3.4.0
     */
    public function enqueue_control_scripts()
    {
    }
    /**
     * Determine whether the user agent is iOS.
     *
     * @since 4.4.0
     *
     * @return bool Whether the user agent is iOS.
     */
    public function is_ios()
    {
    }
    /**
     * Get the template string for the Customizer pane document title.
     *
     * @since 4.4.0
     *
     * @return string The template string for the document title.
     */
    public function get_document_title_template()
    {
    }
    /**
     * Set the initial URL to be previewed.
     *
     * URL is validated.
     *
     * @since 4.4.0
     *
     * @param string $preview_url URL to be previewed.
     */
    public function set_preview_url($preview_url)
    {
    }
    /**
     * Get the initial URL to be previewed.
     *
     * @since 4.4.0
     *
     * @return string URL being previewed.
     */
    public function get_preview_url()
    {
    }
    /**
     * Determines whether the admin and the frontend are on different domains.
     *
     * @since 4.7.0
     *
     * @return bool Whether cross-domain.
     */
    public function is_cross_domain()
    {
    }
    /**
     * Get URLs allowed to be previewed.
     *
     * If the front end and the admin are served from the same domain, load the
     * preview over ssl if the Customizer is being loaded over ssl. This avoids
     * insecure content warnings. This is not attempted if the admin and front end
     * are on different domains to avoid the case where the front end doesn't have
     * ssl certs. Domain mapping plugins can allow other urls in these conditions
     * using the customize_allowed_urls filter.
     *
     * @since 4.7.0
     *
     * @returns array Allowed URLs.
     */
    public function get_allowed_urls()
    {
    }
    /**
     * Get messenger channel.
     *
     * @since 4.7.0
     *
     * @return string Messenger channel.
     */
    public function get_messenger_channel()
    {
    }
    /**
     * Set URL to link the user to when closing the Customizer.
     *
     * URL is validated.
     *
     * @since 4.4.0
     *
     * @param string $return_url URL for return link.
     */
    public function set_return_url($return_url)
    {
    }
    /**
     * Get URL to link the user to when closing the Customizer.
     *
     * @since 4.4.0
     *
     * @return string URL for link to close Customizer.
     */
    public function get_return_url()
    {
    }
    /**
     * Set the autofocused constructs.
     *
     * @since 4.4.0
     *
     * @param array $autofocus {
     *     Mapping of 'panel', 'section', 'control' to the ID which should be autofocused.
     *
     *     @type string [$control]  ID for control to be autofocused.
     *     @type string [$section]  ID for section to be autofocused.
     *     @type string [$panel]    ID for panel to be autofocused.
     * }
     */
    public function set_autofocus($autofocus)
    {
    }
    /**
     * Get the autofocused constructs.
     *
     * @since 4.4.0
     *
     * @return array {
     *     Mapping of 'panel', 'section', 'control' to the ID which should be autofocused.
     *
     *     @type string [$control]  ID for control to be autofocused.
     *     @type string [$section]  ID for section to be autofocused.
     *     @type string [$panel]    ID for panel to be autofocused.
     * }
     */
    public function get_autofocus()
    {
    }
    /**
     * Get nonces for the Customizer.
     *
     * @since 4.5.0
     *
     * @return array Nonces.
     */
    public function get_nonces()
    {
    }
    /**
     * Print JavaScript settings for parent window.
     *
     * @since 4.4.0
     */
    public function customize_pane_settings()
    {
    }
    /**
     * Returns a list of devices to allow previewing.
     *
     * @since 4.5.0
     *
     * @return array List of devices with labels and default setting.
     */
    public function get_previewable_devices()
    {
    }
    /**
     * Register some default controls.
     *
     * @since 3.4.0
     */
    public function register_controls()
    {
    }
    /**
     * Return whether there are published pages.
     *
     * Used as active callback for static front page section and controls.
     *
     * @since 4.7.0
     *
     * @returns bool Whether there are published (or to be published) pages.
     */
    public function has_published_pages()
    {
    }
    /**
     * Add settings from the POST data that were not added with code, e.g. dynamically-created settings for Widgets
     *
     * @since 4.2.0
     *
     * @see add_dynamic_settings()
     */
    public function register_dynamic_settings()
    {
    }
    /**
     * Load themes into the theme browsing/installation UI.
     *
     * @since 4.9.0
     */
    public function handle_load_themes_request()
    {
    }
    /**
     * Callback for validating the header_textcolor value.
     *
     * Accepts 'blank', and otherwise uses sanitize_hex_color_no_hash().
     * Returns default text color if hex color is empty.
     *
     * @since 3.4.0
     *
     * @param string $color
     * @return mixed
     */
    public function _sanitize_header_textcolor($color)
    {
    }
    /**
     * Callback for validating a background setting value.
     *
     * @since 4.7.0
     *
     * @param string $value Repeat value.
     * @param WP_Customize_Setting $setting Setting.
     * @return string|WP_Error Background value or validation error.
     */
    public function _sanitize_background_setting($value, $setting)
    {
    }
    /**
     * Export header video settings to facilitate selective refresh.
     *
     * @since 4.7.0
     *
     * @param array $response Response.
     * @param WP_Customize_Selective_Refresh $selective_refresh Selective refresh component.
     * @param array $partials Array of partials.
     * @return array
     */
    public function export_header_video_settings($response, $selective_refresh, $partials)
    {
    }
    /**
     * Callback for validating the header_video value.
     *
     * Ensures that the selected video is less than 8MB and provides an error message.
     *
     * @since 4.7.0
     *
     * @param WP_Error $validity
     * @param mixed $value
     * @return mixed
     */
    public function _validate_header_video($validity, $value)
    {
    }
    /**
     * Callback for validating the external_header_video value.
     *
     * Ensures that the provided URL is supported.
     *
     * @since 4.7.0
     *
     * @param WP_Error $validity
     * @param mixed $value
     * @return mixed
     */
    public function _validate_external_header_video($validity, $value)
    {
    }
    /**
     * Callback for sanitizing the external_header_video value.
     *
     * @since 4.7.1
     *
     * @param string $value URL.
     * @return string Sanitized URL.
     */
    public function _sanitize_external_header_video($value)
    {
    }
    /**
     * Callback for rendering the custom logo, used in the custom_logo partial.
     *
     * This method exists because the partial object and context data are passed
     * into a partial's render_callback so we cannot use get_custom_logo() as
     * the render_callback directly since it expects a blog ID as the first
     * argument. When WP no longer supports PHP 5.3, this method can be removed
     * in favor of an anonymous function.
     *
     * @see WP_Customize_Manager::register_controls()
     *
     * @since 4.5.0
     *
     * @return string Custom logo.
     */
    public function _render_custom_logo_partial()
    {
    }
}
/**
 * WordPress Customize Nav Menus classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.3.0
 */
/**
 * Customize Nav Menus class.
 *
 * Implements menu management in the Customizer.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Manager
 */
final class WP_Customize_Nav_Menus
{
    /**
     * WP_Customize_Manager instance.
     *
     * @since 4.3.0
     * @var WP_Customize_Manager
     */
    public $manager;
    /**
     * Original nav menu locations before the theme was switched.
     *
     * @since 4.9.0
     * @var array
     */
    protected $original_nav_menu_locations;
    /**
     * Constructor.
     *
     * @since 4.3.0
     *
     * @param object $manager An instance of the WP_Customize_Manager class.
     */
    public function __construct($manager)
    {
    }
    /**
     * Adds a nonce for customizing menus.
     *
     * @since 4.5.0
     *
     * @param array $nonces Array of nonces.
     * @return array $nonces Modified array of nonces.
     */
    public function filter_nonces($nonces)
    {
    }
    /**
     * Ajax handler for loading available menu items.
     *
     * @since 4.3.0
     */
    public function ajax_load_available_items()
    {
    }
    /**
     * Performs the post_type and taxonomy queries for loading available menu items.
     *
     * @since 4.3.0
     *
     * @param string $type   Optional. Accepts any custom object type and has built-in support for
     *                         'post_type' and 'taxonomy'. Default is 'post_type'.
     * @param string $object Optional. Accepts any registered taxonomy or post type name. Default is 'page'.
     * @param int    $page   Optional. The page number used to generate the query offset. Default is '0'.
     * @return WP_Error|array Returns either a WP_Error object or an array of menu items.
     */
    public function load_available_items_query($type = 'post_type', $object = 'page', $page = 0)
    {
    }
    /**
     * Ajax handler for searching available menu items.
     *
     * @since 4.3.0
     */
    public function ajax_search_available_items()
    {
    }
    /**
     * Performs post queries for available-item searching.
     *
     * Based on WP_Editor::wp_link_query().
     *
     * @since 4.3.0
     *
     * @param array $args Optional. Accepts 'pagenum' and 's' (search) arguments.
     * @return array Menu items.
     */
    public function search_available_items_query($args = array())
    {
    }
    /**
     * Enqueue scripts and styles for Customizer pane.
     *
     * @since 4.3.0
     */
    public function enqueue_scripts()
    {
    }
    /**
     * Filters a dynamic setting's constructor args.
     *
     * For a dynamic setting to be registered, this filter must be employed
     * to override the default false value with an array of args to pass to
     * the WP_Customize_Setting constructor.
     *
     * @since 4.3.0
     *
     * @param false|array $setting_args The arguments to the WP_Customize_Setting constructor.
     * @param string      $setting_id   ID for dynamic setting, usually coming from `$_POST['customized']`.
     * @return array|false
     */
    public function filter_dynamic_setting_args($setting_args, $setting_id)
    {
    }
    /**
     * Allow non-statically created settings to be constructed with custom WP_Customize_Setting subclass.
     *
     * @since 4.3.0
     *
     * @param string $setting_class WP_Customize_Setting or a subclass.
     * @param string $setting_id    ID for dynamic setting, usually coming from `$_POST['customized']`.
     * @param array  $setting_args  WP_Customize_Setting or a subclass.
     * @return string
     */
    public function filter_dynamic_setting_class($setting_class, $setting_id, $setting_args)
    {
    }
    /**
     * Add the customizer settings and controls.
     *
     * @since 4.3.0
     */
    public function customize_register()
    {
    }
    /**
     * Get the base10 intval.
     *
     * This is used as a setting's sanitize_callback; we can't use just plain
     * intval because the second argument is not what intval() expects.
     *
     * @since 4.3.0
     *
     * @param mixed $value Number to convert.
     * @return int Integer.
     */
    public function intval_base10($value)
    {
    }
    /**
     * Return an array of all the available item types.
     *
     * @since 4.3.0
     * @since 4.7.0  Each array item now includes a `$type_label` in addition to `$title`, `$type`, and `$object`.
     *
     * @return array The available menu item types.
     */
    public function available_item_types()
    {
    }
    /**
     * Add a new `auto-draft` post.
     *
     * @since 4.7.0
     *
     * @param array $postarr {
     *     Post array. Note that post_status is overridden to be `auto-draft`.
     *
     *     @var string $post_title   Post title. Required.
     *     @var string $post_type    Post type. Required.
     *     @var string $post_name    Post name.
     *     @var string $post_content Post content.
     * }
     * @return WP_Post|WP_Error Inserted auto-draft post object or error.
     */
    public function insert_auto_draft_post($postarr)
    {
    }
    /**
     * Ajax handler for adding a new auto-draft post.
     *
     * @since 4.7.0
     */
    public function ajax_insert_auto_draft_post()
    {
    }
    /**
     * Print the JavaScript templates used to render Menu Customizer components.
     *
     * Templates are imported into the JS use wp.template.
     *
     * @since 4.3.0
     */
    public function print_templates()
    {
    }
    /**
     * Print the html template used to render the add-menu-item frame.
     *
     * @since 4.3.0
     */
    public function available_items_template()
    {
    }
    /**
     * Print the markup for new menu items.
     *
     * To be used in the template #available-menu-items.
     *
     * @since 4.7.0
     *
     * @param array $available_item_type Menu item data to output, including title, type, and label.
     * @return void
     */
    protected function print_post_type_container($available_item_type)
    {
    }
    /**
     * Print the markup for available menu item custom links.
     *
     * @since 4.7.0
     *
     * @return void
     */
    protected function print_custom_links_available_menu_item()
    {
    }
    //
    // Start functionality specific to partial-refresh of menu changes in Customizer preview.
    //
    /**
     * Nav menu args used for each instance, keyed by the args HMAC.
     *
     * @since 4.3.0
     * @var array
     */
    public $preview_nav_menu_instance_args = array();
    /**
     * Filters arguments for dynamic nav_menu selective refresh partials.
     *
     * @since 4.5.0
     *
     * @param array|false $partial_args Partial args.
     * @param string      $partial_id   Partial ID.
     * @return array Partial args.
     */
    public function customize_dynamic_partial_args($partial_args, $partial_id)
    {
    }
    /**
     * Add hooks for the Customizer preview.
     *
     * @since 4.3.0
     */
    public function customize_preview_init()
    {
    }
    /**
     * Make the auto-draft status protected so that it can be queried.
     *
     * @since 4.7.0
     *
     * @global array $wp_post_statuses List of post statuses.
     */
    public function make_auto_draft_status_previewable()
    {
    }
    /**
     * Sanitize post IDs for posts created for nav menu items to be published.
     *
     * @since 4.7.0
     *
     * @param array $value Post IDs.
     * @returns array Post IDs.
     */
    public function sanitize_nav_menus_created_posts($value)
    {
    }
    /**
     * Publish the auto-draft posts that were created for nav menu items.
     *
     * The post IDs will have been sanitized by already by
     * `WP_Customize_Nav_Menu_Items::sanitize_nav_menus_created_posts()` to
     * remove any post IDs for which the user cannot publish or for which the
     * post is not an auto-draft.
     *
     * @since 4.7.0
     *
     * @param WP_Customize_Setting $setting Customizer setting object.
     */
    public function save_nav_menus_created_posts($setting)
    {
    }
    /**
     * Keep track of the arguments that are being passed to wp_nav_menu().
     *
     * @since 4.3.0
     * @see wp_nav_menu()
     * @see WP_Customize_Widgets_Partial_Refresh::filter_dynamic_sidebar_params()
     *
     * @param array $args An array containing wp_nav_menu() arguments.
     * @return array Arguments.
     */
    public function filter_wp_nav_menu_args($args)
    {
    }
    /**
     * Prepares wp_nav_menu() calls for partial refresh.
     *
     * Injects attributes into container element.
     *
     * @since 4.3.0
     *
     * @see wp_nav_menu()
     *
     * @param string $nav_menu_content The HTML content for the navigation menu.
     * @param object $args             An object containing wp_nav_menu() arguments.
     * @return string Nav menu HTML with selective refresh attributes added if partial can be refreshed.
     */
    public function filter_wp_nav_menu($nav_menu_content, $args)
    {
    }
    /**
     * Hashes (hmac) the nav menu arguments to ensure they are not tampered with when
     * submitted in the Ajax request.
     *
     * Note that the array is expected to be pre-sorted.
     *
     * @since 4.3.0
     *
     * @param array $args The arguments to hash.
     * @return string Hashed nav menu arguments.
     */
    public function hash_nav_menu_args($args)
    {
    }
    /**
     * Enqueue scripts for the Customizer preview.
     *
     * @since 4.3.0
     */
    public function customize_preview_enqueue_deps()
    {
    }
    /**
     * Exports data from PHP to JS.
     *
     * @since 4.3.0
     */
    public function export_preview_data()
    {
    }
    /**
     * Export any wp_nav_menu() calls during the rendering of any partials.
     *
     * @since 4.5.0
     *
     * @param array $response Response.
     * @return array Response.
     */
    public function export_partial_rendered_nav_menu_instances($response)
    {
    }
    /**
     * Render a specific menu via wp_nav_menu() using the supplied arguments.
     *
     * @since 4.3.0
     *
     * @see wp_nav_menu()
     *
     * @param WP_Customize_Partial $partial       Partial.
     * @param array                $nav_menu_args Nav menu args supplied as container context.
     * @return string|false
     */
    public function render_nav_menu_partial($partial, $nav_menu_args)
    {
    }
}
/**
 * WordPress Customize Panel classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.0.0
 */
/**
 * Customize Panel class.
 *
 * A UI container for sections, managed by the WP_Customize_Manager.
 *
 * @since 4.0.0
 *
 * @see WP_Customize_Manager
 */
class WP_Customize_Panel
{
    /**
     * Incremented with each new class instantiation, then stored in $instance_number.
     *
     * Used when sorting two instances whose priorities are equal.
     *
     * @since 4.1.0
     *
     * @static
     * @var int
     */
    protected static $instance_count = 0;
    /**
     * Order in which this instance was created in relation to other instances.
     *
     * @since 4.1.0
     * @var int
     */
    public $instance_number;
    /**
     * WP_Customize_Manager instance.
     *
     * @since 4.0.0
     * @var WP_Customize_Manager
     */
    public $manager;
    /**
     * Unique identifier.
     *
     * @since 4.0.0
     * @var string
     */
    public $id;
    /**
     * Priority of the panel, defining the display order of panels and sections.
     *
     * @since 4.0.0
     * @var integer
     */
    public $priority = 160;
    /**
     * Capability required for the panel.
     *
     * @since 4.0.0
     * @var string
     */
    public $capability = 'edit_theme_options';
    /**
     * Theme feature support for the panel.
     *
     * @since 4.0.0
     * @var string|array
     */
    public $theme_supports = '';
    /**
     * Title of the panel to show in UI.
     *
     * @since 4.0.0
     * @var string
     */
    public $title = '';
    /**
     * Description to show in the UI.
     *
     * @since 4.0.0
     * @var string
     */
    public $description = '';
    /**
     * Auto-expand a section in a panel when the panel is expanded when the panel only has the one section.
     *
     * @since 4.7.4
     * @var bool
     */
    public $auto_expand_sole_section = \false;
    /**
     * Customizer sections for this panel.
     *
     * @since 4.0.0
     * @var array
     */
    public $sections;
    /**
     * Type of this panel.
     *
     * @since 4.1.0
     * @var string
     */
    public $type = 'default';
    /**
     * Active callback.
     *
     * @since 4.1.0
     *
     * @see WP_Customize_Section::active()
     *
     * @var callable Callback is called with one argument, the instance of
     *               WP_Customize_Section, and returns bool to indicate whether
     *               the section is active (such as it relates to the URL currently
     *               being previewed).
     */
    public $active_callback = '';
    /**
     * Constructor.
     *
     * Any supplied $args override class property defaults.
     *
     * @since 4.0.0
     *
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string               $id      An specific ID for the panel.
     * @param array                $args    Panel arguments.
     */
    public function __construct($manager, $id, $args = array())
    {
    }
    /**
     * Check whether panel is active to current Customizer preview.
     *
     * @since 4.1.0
     *
     * @return bool Whether the panel is active to the current preview.
     */
    public final function active()
    {
    }
    /**
     * Default callback used when invoking WP_Customize_Panel::active().
     *
     * Subclasses can override this with their specific logic, or they may
     * provide an 'active_callback' argument to the constructor.
     *
     * @since 4.1.0
     *
     * @return bool Always true.
     */
    public function active_callback()
    {
    }
    /**
     * Gather the parameters passed to client JavaScript via JSON.
     *
     * @since 4.1.0
     *
     * @return array The array to be exported to the client as JSON.
     */
    public function json()
    {
    }
    /**
     * Checks required user capabilities and whether the theme has the
     * feature support required by the panel.
     *
     * @since 4.0.0
     *
     * @return bool False if theme doesn't support the panel or the user doesn't have the capability.
     */
    public final function check_capabilities()
    {
    }
    /**
     * Get the panel's content template for insertion into the Customizer pane.
     *
     * @since 4.1.0
     *
     * @return string Content for the panel.
     */
    public final function get_content()
    {
    }
    /**
     * Check capabilities and render the panel.
     *
     * @since 4.0.0
     */
    public final function maybe_render()
    {
    }
    /**
     * Render the panel container, and then its contents (via `this->render_content()`) in a subclass.
     *
     * Panel containers are now rendered in JS by default, see WP_Customize_Panel::print_template().
     *
     * @since 4.0.0
     */
    protected function render()
    {
    }
    /**
     * Render the panel UI in a subclass.
     *
     * Panel contents are now rendered in JS by default, see WP_Customize_Panel::print_template().
     *
     * @since 4.1.0
     */
    protected function render_content()
    {
    }
    /**
     * Render the panel's JS templates.
     *
     * This function is only run for panel types that have been registered with
     * WP_Customize_Manager::register_panel_type().
     *
     * @since 4.3.0
     *
     * @see WP_Customize_Manager::register_panel_type()
     */
    public function print_template()
    {
    }
    /**
     * An Underscore (JS) template for rendering this panel's container.
     *
     * Class variables for this panel class are available in the `data` JS object;
     * export custom variables by overriding WP_Customize_Panel::json().
     *
     * @see WP_Customize_Panel::print_template()
     *
     * @since 4.3.0
     */
    protected function render_template()
    {
    }
    /**
     * An Underscore (JS) template for this panel's content (but not its container).
     *
     * Class variables for this panel class are available in the `data` JS object;
     * export custom variables by overriding WP_Customize_Panel::json().
     *
     * @see WP_Customize_Panel::print_template()
     *
     * @since 4.3.0
     */
    protected function content_template()
    {
    }
}
/**
 * WordPress Customize Section classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
/**
 * Customize Section class.
 *
 * A UI container for controls, managed by the WP_Customize_Manager class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Manager
 */
class WP_Customize_Section
{
    /**
     * Incremented with each new class instantiation, then stored in $instance_number.
     *
     * Used when sorting two instances whose priorities are equal.
     *
     * @since 4.1.0
     *
     * @static
     * @var int
     */
    protected static $instance_count = 0;
    /**
     * Order in which this instance was created in relation to other instances.
     *
     * @since 4.1.0
     * @var int
     */
    public $instance_number;
    /**
     * WP_Customize_Manager instance.
     *
     * @since 3.4.0
     * @var WP_Customize_Manager
     */
    public $manager;
    /**
     * Unique identifier.
     *
     * @since 3.4.0
     * @var string
     */
    public $id;
    /**
     * Priority of the section which informs load order of sections.
     *
     * @since 3.4.0
     * @var integer
     */
    public $priority = 160;
    /**
     * Panel in which to show the section, making it a sub-section.
     *
     * @since 4.0.0
     * @var string
     */
    public $panel = '';
    /**
     * Capability required for the section.
     *
     * @since 3.4.0
     * @var string
     */
    public $capability = 'edit_theme_options';
    /**
     * Theme feature support for the section.
     *
     * @since 3.4.0
     * @var string|array
     */
    public $theme_supports = '';
    /**
     * Title of the section to show in UI.
     *
     * @since 3.4.0
     * @var string
     */
    public $title = '';
    /**
     * Description to show in the UI.
     *
     * @since 3.4.0
     * @var string
     */
    public $description = '';
    /**
     * Customizer controls for this section.
     *
     * @since 3.4.0
     * @var array
     */
    public $controls;
    /**
     * Type of this section.
     *
     * @since 4.1.0
     * @var string
     */
    public $type = 'default';
    /**
     * Active callback.
     *
     * @since 4.1.0
     *
     * @see WP_Customize_Section::active()
     *
     * @var callable Callback is called with one argument, the instance of
     *               WP_Customize_Section, and returns bool to indicate whether
     *               the section is active (such as it relates to the URL currently
     *               being previewed).
     */
    public $active_callback = '';
    /**
     * Show the description or hide it behind the help icon.
     *
     * @since 4.7.0
     *
     * @var bool Indicates whether the Section's description should be
     *           hidden behind a help icon ("?") in the Section header,
     *           similar to how help icons are displayed on Panels.
     */
    public $description_hidden = \false;
    /**
     * Constructor.
     *
     * Any supplied $args override class property defaults.
     *
     * @since 3.4.0
     *
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string               $id      An specific ID of the section.
     * @param array                $args    Section arguments.
     */
    public function __construct($manager, $id, $args = array())
    {
    }
    /**
     * Check whether section is active to current Customizer preview.
     *
     * @since 4.1.0
     *
     * @return bool Whether the section is active to the current preview.
     */
    public final function active()
    {
    }
    /**
     * Default callback used when invoking WP_Customize_Section::active().
     *
     * Subclasses can override this with their specific logic, or they may provide
     * an 'active_callback' argument to the constructor.
     *
     * @since 4.1.0
     *
     * @return true Always true.
     */
    public function active_callback()
    {
    }
    /**
     * Gather the parameters passed to client JavaScript via JSON.
     *
     * @since 4.1.0
     *
     * @return array The array to be exported to the client as JSON.
     */
    public function json()
    {
    }
    /**
     * Checks required user capabilities and whether the theme has the
     * feature support required by the section.
     *
     * @since 3.4.0
     *
     * @return bool False if theme doesn't support the section or user doesn't have the capability.
     */
    public final function check_capabilities()
    {
    }
    /**
     * Get the section's content for insertion into the Customizer pane.
     *
     * @since 4.1.0
     *
     * @return string Contents of the section.
     */
    public final function get_content()
    {
    }
    /**
     * Check capabilities and render the section.
     *
     * @since 3.4.0
     */
    public final function maybe_render()
    {
    }
    /**
     * Render the section UI in a subclass.
     *
     * Sections are now rendered in JS by default, see WP_Customize_Section::print_template().
     *
     * @since 3.4.0
     */
    protected function render()
    {
    }
    /**
     * Render the section's JS template.
     *
     * This function is only run for section types that have been registered with
     * WP_Customize_Manager::register_section_type().
     *
     * @since 4.3.0
     *
     * @see WP_Customize_Manager::render_template()
     */
    public function print_template()
    {
    }
    /**
     * An Underscore (JS) template for rendering this section.
     *
     * Class variables for this section class are available in the `data` JS object;
     * export custom variables by overriding WP_Customize_Section::json().
     *
     * @since 4.3.0
     *
     * @see WP_Customize_Section::print_template()
     */
    protected function render_template()
    {
    }
}
/**
 * WordPress Customize Setting classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */
/**
 * Customize Setting class.
 *
 * Handles saving and sanitizing of settings.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Manager
 */
class WP_Customize_Setting
{
    /**
     * Customizer bootstrap instance.
     *
     * @since 3.4.0
     * @var WP_Customize_Manager
     */
    public $manager;
    /**
     * Unique string identifier for the setting.
     *
     * @since 3.4.0
     * @var string
     */
    public $id;
    /**
     * Type of customize settings.
     *
     * @since 3.4.0
     * @var string
     */
    public $type = 'theme_mod';
    /**
     * Capability required to edit this setting.
     *
     * @since 3.4.0
     * @var string|array
     */
    public $capability = 'edit_theme_options';
    /**
     * Feature a theme is required to support to enable this setting.
     *
     * @since 3.4.0
     * @var string
     */
    public $theme_supports = '';
    /**
     * The default value for the setting.
     *
     * @since 3.4.0
     * @var string
     */
    public $default = '';
    /**
     * Options for rendering the live preview of changes in Theme Customizer.
     *
     * Set this value to 'postMessage' to enable a custom Javascript handler to render changes to this setting
     * as opposed to reloading the whole page.
     *
     * @link https://developer.wordpress.org/themes/customize-api
     *
     * @since 3.4.0
     * @var string
     */
    public $transport = 'refresh';
    /**
     * Server-side validation callback for the setting's value.
     *
     * @since 4.6.0
     * @var callable
     */
    public $validate_callback = '';
    /**
     * Callback to filter a Customize setting value in un-slashed form.
     *
     * @since 3.4.0
     * @var callable
     */
    public $sanitize_callback = '';
    /**
     * Callback to convert a Customize PHP setting value to a value that is JSON serializable.
     *
     * @since 3.4.0
     * @var string
     */
    public $sanitize_js_callback = '';
    /**
     * Whether or not the setting is initially dirty when created.
     *
     * This is used to ensure that a setting will be sent from the pane to the
     * preview when loading the Customizer. Normally a setting only is synced to
     * the preview if it has been changed. This allows the setting to be sent
     * from the start.
     *
     * @since 4.2.0
     * @var bool
     */
    public $dirty = \false;
    /**
     * ID Data.
     *
     * @since 3.4.0
     * @var array
     */
    protected $id_data = array();
    /**
     * Whether or not preview() was called.
     *
     * @since 4.4.0
     * @var bool
     */
    protected $is_previewed = \false;
    /**
     * Cache of multidimensional values to improve performance.
     *
     * @since 4.4.0
     * @static
     * @var array
     */
    protected static $aggregated_multidimensionals = array();
    /**
     * Whether the multidimensional setting is aggregated.
     *
     * @since 4.4.0
     * @var bool
     */
    protected $is_multidimensional_aggregated = \false;
    /**
     * Constructor.
     *
     * Any supplied $args override class property defaults.
     *
     * @since 3.4.0
     *
     * @param WP_Customize_Manager $manager
     * @param string               $id      An specific ID of the setting. Can be a
     *                                      theme mod or option name.
     * @param array                $args    Setting arguments.
     */
    public function __construct($manager, $id, $args = array())
    {
    }
    /**
     * Get parsed ID data for multidimensional setting.
     *
     * @since 4.4.0
     *
     * @return array {
     *     ID data for multidimensional setting.
     *
     *     @type string $base ID base
     *     @type array  $keys Keys for multidimensional array.
     * }
     */
    public final function id_data()
    {
    }
    /**
     * Set up the setting for aggregated multidimensional values.
     *
     * When a multidimensional setting gets aggregated, all of its preview and update
     * calls get combined into one call, greatly improving performance.
     *
     * @since 4.4.0
     */
    protected function aggregate_multidimensional()
    {
    }
    /**
     * Reset `$aggregated_multidimensionals` static variable.
     *
     * This is intended only for use by unit tests.
     *
     * @since 4.5.0
     * @ignore
     */
    public static function reset_aggregated_multidimensionals()
    {
    }
    /**
     * The ID for the current site when the preview() method was called.
     *
     * @since 4.2.0
     * @var int
     */
    protected $_previewed_blog_id;
    /**
     * Return true if the current site is not the same as the previewed site.
     *
     * @since 4.2.0
     *
     * @return bool If preview() has been called.
     */
    public function is_current_blog_previewed()
    {
    }
    /**
     * Original non-previewed value stored by the preview method.
     *
     * @see WP_Customize_Setting::preview()
     * @since 4.1.1
     * @var mixed
     */
    protected $_original_value;
    /**
     * Add filters to supply the setting's value when accessed.
     *
     * If the setting already has a pre-existing value and there is no incoming
     * post value for the setting, then this method will short-circuit since
     * there is no change to preview.
     *
     * @since 3.4.0
     * @since 4.4.0 Added boolean return value.
     *
     * @return bool False when preview short-circuits due no change needing to be previewed.
     */
    public function preview()
    {
    }
    /**
     * Clear out the previewed-applied flag for a multidimensional-aggregated value whenever its post value is updated.
     *
     * This ensures that the new value will get sanitized and used the next time
     * that `WP_Customize_Setting::_multidimensional_preview_filter()`
     * is called for this setting.
     *
     * @since 4.4.0
     *
     * @see WP_Customize_Manager::set_post_value()
     * @see WP_Customize_Setting::_multidimensional_preview_filter()
     */
    public final function _clear_aggregated_multidimensional_preview_applied_flag()
    {
    }
    /**
     * Callback function to filter non-multidimensional theme mods and options.
     *
     * If switch_to_blog() was called after the preview() method, and the current
     * site is now not the same site, then this method does a no-op and returns
     * the original value.
     *
     * @since 3.4.0
     *
     * @param mixed $original Old value.
     * @return mixed New or old value.
     */
    public function _preview_filter($original)
    {
    }
    /**
     * Callback function to filter multidimensional theme mods and options.
     *
     * For all multidimensional settings of a given type, the preview filter for
     * the first setting previewed will be used to apply the values for the others.
     *
     * @since 4.4.0
     *
     * @see WP_Customize_Setting::$aggregated_multidimensionals
     * @param mixed $original Original root value.
     * @return mixed New or old value.
     */
    public final function _multidimensional_preview_filter($original)
    {
    }
    /**
     * Checks user capabilities and theme supports, and then saves
     * the value of the setting.
     *
     * @since 3.4.0
     *
     * @return false|void False if cap check fails or value isn't set or is invalid.
     */
    public final function save()
    {
    }
    /**
     * Fetch and sanitize the $_POST value for the setting.
     *
     * During a save request prior to save, post_value() provides the new value while value() does not.
     *
     * @since 3.4.0
     *
     * @param mixed $default A default value which is used as a fallback. Default is null.
     * @return mixed The default value on failure, otherwise the sanitized and validated value.
     */
    public final function post_value($default = \null)
    {
    }
    /**
     * Sanitize an input.
     *
     * @since 3.4.0
     *
     * @param string|array $value    The value to sanitize.
     * @return string|array|null|WP_Error Sanitized value, or `null`/`WP_Error` if invalid.
     */
    public function sanitize($value)
    {
    }
    /**
     * Validates an input.
     *
     * @since 4.6.0
     *
     * @see WP_REST_Request::has_valid_params()
     *
     * @param mixed $value Value to validate.
     * @return true|WP_Error True if the input was validated, otherwise WP_Error.
     */
    public function validate($value)
    {
    }
    /**
     * Get the root value for a setting, especially for multidimensional ones.
     *
     * @since 4.4.0
     *
     * @param mixed $default Value to return if root does not exist.
     * @return mixed
     */
    protected function get_root_value($default = \null)
    {
    }
    /**
     * Set the root value for a setting, especially for multidimensional ones.
     *
     * @since 4.4.0
     *
     * @param mixed $value Value to set as root of multidimensional setting.
     * @return bool Whether the multidimensional root was updated successfully.
     */
    protected function set_root_value($value)
    {
    }
    /**
     * Save the value of the setting, using the related API.
     *
     * @since 3.4.0
     *
     * @param mixed $value The value to update.
     * @return bool The result of saving the value.
     */
    protected function update($value)
    {
    }
    /**
     * Deprecated method.
     *
     * @since 3.4.0
     * @deprecated 4.4.0 Deprecated in favor of update() method.
     */
    protected function _update_theme_mod()
    {
    }
    /**
     * Deprecated method.
     *
     * @since 3.4.0
     * @deprecated 4.4.0 Deprecated in favor of update() method.
     */
    protected function _update_option()
    {
    }
    /**
     * Fetch the value of the setting.
     *
     * @since 3.4.0
     *
     * @return mixed The value.
     */
    public function value()
    {
    }
    /**
     * Sanitize the setting's value for use in JavaScript.
     *
     * @since 3.4.0
     *
     * @return mixed The requested escaped value.
     */
    public function js_value()
    {
    }
    /**
     * Retrieves the data to export to the client via JSON.
     *
     * @since 4.6.0
     *
     * @return array Array of parameters passed to JavaScript.
     */
    public function json()
    {
    }
    /**
     * Validate user capabilities whether the theme supports the setting.
     *
     * @since 3.4.0
     *
     * @return bool False if theme doesn't support the setting or user can't change setting, otherwise true.
     */
    public final function check_capabilities()
    {
    }
    /**
     * Multidimensional helper function.
     *
     * @since 3.4.0
     *
     * @param $root
     * @param $keys
     * @param bool $create Default is false.
     * @return array|void Keys are 'root', 'node', and 'key'.
     */
    protected final function multidimensional(&$root, $keys, $create = \false)
    {
    }
    /**
     * Will attempt to replace a specific value in a multidimensional array.
     *
     * @since 3.4.0
     *
     * @param $root
     * @param $keys
     * @param mixed $value The value to update.
     * @return mixed
     */
    protected final function multidimensional_replace($root, $keys, $value)
    {
    }
    /**
     * Will attempt to fetch a specific value from a multidimensional array.
     *
     * @since 3.4.0
     *
     * @param $root
     * @param $keys
     * @param mixed $default A default value which is used as a fallback. Default is null.
     * @return mixed The requested value or the default value.
     */
    protected final function multidimensional_get($root, $keys, $default = \null)
    {
    }
    /**
     * Will attempt to check if a specific value in a multidimensional array is set.
     *
     * @since 3.4.0
     *
     * @param $root
     * @param $keys
     * @return bool True if value is set, false if not.
     */
    protected final function multidimensional_isset($root, $keys)
    {
    }
}
/**
 * WordPress Customize Widgets classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.9.0
 */
/**
 * Customize Widgets class.
 *
 * Implements widget management in the Customizer.
 *
 * @since 3.9.0
 *
 * @see WP_Customize_Manager
 */
final class WP_Customize_Widgets
{
    /**
     * WP_Customize_Manager instance.
     *
     * @since 3.9.0
     * @var WP_Customize_Manager
     */
    public $manager;
    /**
     * All id_bases for widgets defined in core.
     *
     * @since 3.9.0
     * @var array
     */
    protected $core_widget_id_bases = array('archives', 'calendar', 'categories', 'custom_html', 'links', 'media_audio', 'media_image', 'media_video', 'meta', 'nav_menu', 'pages', 'recent-comments', 'recent-posts', 'rss', 'search', 'tag_cloud', 'text');
    /**
     * @since 3.9.0
     * @var array
     */
    protected $rendered_sidebars = array();
    /**
     * @since 3.9.0
     * @var array
     */
    protected $rendered_widgets = array();
    /**
     * @since 3.9.0
     * @var array
     */
    protected $old_sidebars_widgets = array();
    /**
     * Mapping of widget ID base to whether it supports selective refresh.
     *
     * @since 4.5.0
     * @var array
     */
    protected $selective_refreshable_widgets;
    /**
     * Mapping of setting type to setting ID pattern.
     *
     * @since 4.2.0
     * @var array
     */
    protected $setting_id_patterns = array('widget_instance' => '/^widget_(?P<id_base>.+?)(?:\\[(?P<widget_number>\\d+)\\])?$/', 'sidebar_widgets' => '/^sidebars_widgets\\[(?P<sidebar_id>.+?)\\]$/');
    /**
     * Initial loader.
     *
     * @since 3.9.0
     *
     * @param WP_Customize_Manager $manager Customize manager bootstrap instance.
     */
    public function __construct($manager)
    {
    }
    /**
     * List whether each registered widget can be use selective refresh.
     *
     * If the theme does not support the customize-selective-refresh-widgets feature,
     * then this will always return an empty array.
     *
     * @since 4.5.0
     *
     * @global WP_Widget_Factory $wp_widget_factory
     *
     * @return array Mapping of id_base to support. If theme doesn't support
     *               selective refresh, an empty array is returned.
     */
    public function get_selective_refreshable_widgets()
    {
    }
    /**
     * Determines if a widget supports selective refresh.
     *
     * @since 4.5.0
     *
     * @param string $id_base Widget ID Base.
     * @return bool Whether the widget can be selective refreshed.
     */
    public function is_widget_selective_refreshable($id_base)
    {
    }
    /**
     * Retrieves the widget setting type given a setting ID.
     *
     * @since 4.2.0
     *
     * @staticvar array $cache
     *
     * @param string $setting_id Setting ID.
     * @return string|void Setting type.
     */
    protected function get_setting_type($setting_id)
    {
    }
    /**
     * Inspects the incoming customized data for any widget settings, and dynamically adds
     * them up-front so widgets will be initialized properly.
     *
     * @since 4.2.0
     */
    public function register_settings()
    {
    }
    /**
     * Determines the arguments for a dynamically-created setting.
     *
     * @since 4.2.0
     *
     * @param false|array $args       The arguments to the WP_Customize_Setting constructor.
     * @param string      $setting_id ID for dynamic setting, usually coming from `$_POST['customized']`.
     * @return false|array Setting arguments, false otherwise.
     */
    public function filter_customize_dynamic_setting_args($args, $setting_id)
    {
    }
    /**
     * Retrieves an unslashed post value or return a default.
     *
     * @since 3.9.0
     *
     * @param string $name    Post value.
     * @param mixed  $default Default post value.
     * @return mixed Unslashed post value or default value.
     */
    protected function get_post_value($name, $default = \null)
    {
    }
    /**
     * Override sidebars_widgets for theme switch.
     *
     * When switching a theme via the Customizer, supply any previously-configured
     * sidebars_widgets from the target theme as the initial sidebars_widgets
     * setting. Also store the old theme's existing settings so that they can
     * be passed along for storing in the sidebars_widgets theme_mod when the
     * theme gets switched.
     *
     * @since 3.9.0
     *
     * @global array $sidebars_widgets
     * @global array $_wp_sidebars_widgets
     */
    public function override_sidebars_widgets_for_theme_switch()
    {
    }
    /**
     * Filters old_sidebars_widgets_data Customizer setting.
     *
     * When switching themes, filter the Customizer setting old_sidebars_widgets_data
     * to supply initial $sidebars_widgets before they were overridden by retrieve_widgets().
     * The value for old_sidebars_widgets_data gets set in the old theme's sidebars_widgets
     * theme_mod.
     *
     * @since 3.9.0
     *
     * @see WP_Customize_Widgets::handle_theme_switch()
     *
     * @param array $old_sidebars_widgets
     * @return array
     */
    public function filter_customize_value_old_sidebars_widgets_data($old_sidebars_widgets)
    {
    }
    /**
     * Filters sidebars_widgets option for theme switch.
     *
     * When switching themes, the retrieve_widgets() function is run when the Customizer initializes,
     * and then the new sidebars_widgets here get supplied as the default value for the sidebars_widgets
     * option.
     *
     * @since 3.9.0
     *
     * @see WP_Customize_Widgets::handle_theme_switch()
     * @global array $sidebars_widgets
     *
     * @param array $sidebars_widgets
     * @return array
     */
    public function filter_option_sidebars_widgets_for_theme_switch($sidebars_widgets)
    {
    }
    /**
     * Ensures all widgets get loaded into the Customizer.
     *
     * Note: these actions are also fired in wp_ajax_update_widget().
     *
     * @since 3.9.0
     */
    public function customize_controls_init()
    {
    }
    /**
     * Ensures widgets are available for all types of previews.
     *
     * When in preview, hook to {@see 'customize_register'} for settings after WordPress is loaded
     * so that all filters have been initialized (e.g. Widget Visibility).
     *
     * @since 3.9.0
     */
    public function schedule_customize_register()
    {
    }
    /**
     * Registers Customizer settings and controls for all sidebars and widgets.
     *
     * @since 3.9.0
     *
     * @global array $wp_registered_widgets
     * @global array $wp_registered_widget_controls
     * @global array $wp_registered_sidebars
     */
    public function customize_register()
    {
    }
    /**
     * Determines whether the widgets panel is active, based on whether there are sidebars registered.
     *
     * @since 4.4.0
     *
     * @see WP_Customize_Panel::$active_callback
     *
     * @global array $wp_registered_sidebars
     * @return bool Active.
     */
    public function is_panel_active()
    {
    }
    /**
     * Converts a widget_id into its corresponding Customizer setting ID (option name).
     *
     * @since 3.9.0
     *
     * @param string $widget_id Widget ID.
     * @return string Maybe-parsed widget ID.
     */
    public function get_setting_id($widget_id)
    {
    }
    /**
     * Determines whether the widget is considered "wide".
     *
     * Core widgets which may have controls wider than 250, but can still be shown
     * in the narrow Customizer panel. The RSS and Text widgets in Core, for example,
     * have widths of 400 and yet they still render fine in the Customizer panel.
     *
     * This method will return all Core widgets as being not wide, but this can be
     * overridden with the {@see 'is_wide_widget_in_customizer'} filter.
     *
     * @since 3.9.0
     *
     * @global $wp_registered_widget_controls
     *
     * @param string $widget_id Widget ID.
     * @return bool Whether or not the widget is a "wide" widget.
     */
    public function is_wide_widget($widget_id)
    {
    }
    /**
     * Converts a widget ID into its id_base and number components.
     *
     * @since 3.9.0
     *
     * @param string $widget_id Widget ID.
     * @return array Array containing a widget's id_base and number components.
     */
    public function parse_widget_id($widget_id)
    {
    }
    /**
     * Converts a widget setting ID (option path) to its id_base and number components.
     *
     * @since 3.9.0
     *
     * @param string $setting_id Widget setting ID.
     * @return WP_Error|array Array containing a widget's id_base and number components,
     *                        or a WP_Error object.
     */
    public function parse_widget_setting_id($setting_id)
    {
    }
    /**
     * Calls admin_print_styles-widgets.php and admin_print_styles hooks to
     * allow custom styles from plugins.
     *
     * @since 3.9.0
     */
    public function print_styles()
    {
    }
    /**
     * Calls admin_print_scripts-widgets.php and admin_print_scripts hooks to
     * allow custom scripts from plugins.
     *
     * @since 3.9.0
     */
    public function print_scripts()
    {
    }
    /**
     * Enqueues scripts and styles for Customizer panel and export data to JavaScript.
     *
     * @since 3.9.0
     *
     * @global WP_Scripts $wp_scripts
     * @global array $wp_registered_sidebars
     * @global array $wp_registered_widgets
     */
    public function enqueue_scripts()
    {
    }
    /**
     * Renders the widget form control templates into the DOM.
     *
     * @since 3.9.0
     */
    public function output_widget_control_templates()
    {
    }
    /**
     * Calls admin_print_footer_scripts and admin_print_scripts hooks to
     * allow custom scripts from plugins.
     *
     * @since 3.9.0
     */
    public function print_footer_scripts()
    {
    }
    /**
     * Retrieves common arguments to supply when constructing a Customizer setting.
     *
     * @since 3.9.0
     *
     * @param string $id        Widget setting ID.
     * @param array  $overrides Array of setting overrides.
     * @return array Possibly modified setting arguments.
     */
    public function get_setting_args($id, $overrides = array())
    {
    }
    /**
     * Ensures sidebar widget arrays only ever contain widget IDS.
     *
     * Used as the 'sanitize_callback' for each $sidebars_widgets setting.
     *
     * @since 3.9.0
     *
     * @param array $widget_ids Array of widget IDs.
     * @return array Array of sanitized widget IDs.
     */
    public function sanitize_sidebar_widgets($widget_ids)
    {
    }
    /**
     * Builds up an index of all available widgets for use in Backbone models.
     *
     * @since 3.9.0
     *
     * @global array $wp_registered_widgets
     * @global array $wp_registered_widget_controls
     * @staticvar array $available_widgets
     *
     * @see wp_list_widgets()
     *
     * @return array List of available widgets.
     */
    public function get_available_widgets()
    {
    }
    /**
     * Naturally orders available widgets by name.
     *
     * @since 3.9.0
     *
     * @param array $widget_a The first widget to compare.
     * @param array $widget_b The second widget to compare.
     * @return int Reorder position for the current widget comparison.
     */
    protected function _sort_name_callback($widget_a, $widget_b)
    {
    }
    /**
     * Retrieves the widget control markup.
     *
     * @since 3.9.0
     *
     * @param array $args Widget control arguments.
     * @return string Widget control form HTML markup.
     */
    public function get_widget_control($args)
    {
    }
    /**
     * Retrieves the widget control markup parts.
     *
     * @since 4.4.0
     *
     * @param array $args Widget control arguments.
     * @return array {
     *     @type string $control Markup for widget control wrapping form.
     *     @type string $content The contents of the widget form itself.
     * }
     */
    public function get_widget_control_parts($args)
    {
    }
    /**
     * Adds hooks for the Customizer preview.
     *
     * @since 3.9.0
     */
    public function customize_preview_init()
    {
    }
    /**
     * Refreshes the nonce for widget updates.
     *
     * @since 4.2.0
     *
     * @param  array $nonces Array of nonces.
     * @return array $nonces Array of nonces.
     */
    public function refresh_nonces($nonces)
    {
    }
    /**
     * When previewing, ensures the proper previewing widgets are used.
     *
     * Because wp_get_sidebars_widgets() gets called early at {@see 'init' } (via
     * wp_convert_widget_settings()) and can set global variable `$_wp_sidebars_widgets`
     * to the value of `get_option( 'sidebars_widgets' )` before the Customizer preview
     * filter is added, it has to be reset after the filter has been added.
     *
     * @since 3.9.0
     *
     * @param array $sidebars_widgets List of widgets for the current sidebar.
     * @return array
     */
    public function preview_sidebars_widgets($sidebars_widgets)
    {
    }
    /**
     * Enqueues scripts for the Customizer preview.
     *
     * @since 3.9.0
     */
    public function customize_preview_enqueue()
    {
    }
    /**
     * Inserts default style for highlighted widget at early point so theme
     * stylesheet can override.
     *
     * @since 3.9.0
     */
    public function print_preview_css()
    {
    }
    /**
     * Communicates the sidebars that appeared on the page at the very end of the page,
     * and at the very end of the wp_footer,
     *
     * @since 3.9.0
     *
     * @global array $wp_registered_sidebars
     * @global array $wp_registered_widgets
     */
    public function export_preview_data()
    {
    }
    /**
     * Tracks the widgets that were rendered.
     *
     * @since 3.9.0
     *
     * @param array $widget Rendered widget to tally.
     */
    public function tally_rendered_widgets($widget)
    {
    }
    /**
     * Determine if a widget is rendered on the page.
     *
     * @since 4.0.0
     *
     * @param string $widget_id Widget ID to check.
     * @return bool Whether the widget is rendered.
     */
    public function is_widget_rendered($widget_id)
    {
    }
    /**
     * Determines if a sidebar is rendered on the page.
     *
     * @since 4.0.0
     *
     * @param string $sidebar_id Sidebar ID to check.
     * @return bool Whether the sidebar is rendered.
     */
    public function is_sidebar_rendered($sidebar_id)
    {
    }
    /**
     * Tallies the sidebars rendered via is_active_sidebar().
     *
     * Keep track of the times that is_active_sidebar() is called in the template,
     * and assume that this means that the sidebar would be rendered on the template
     * if there were widgets populating it.
     *
     * @since 3.9.0
     *
     * @param bool   $is_active  Whether the sidebar is active.
     * @param string $sidebar_id Sidebar ID.
     * @return bool Whether the sidebar is active.
     */
    public function tally_sidebars_via_is_active_sidebar_calls($is_active, $sidebar_id)
    {
    }
    /**
     * Tallies the sidebars rendered via dynamic_sidebar().
     *
     * Keep track of the times that dynamic_sidebar() is called in the template,
     * and assume this means the sidebar would be rendered on the template if
     * there were widgets populating it.
     *
     * @since 3.9.0
     *
     * @param bool   $has_widgets Whether the current sidebar has widgets.
     * @param string $sidebar_id  Sidebar ID.
     * @return bool Whether the current sidebar has widgets.
     */
    public function tally_sidebars_via_dynamic_sidebar_calls($has_widgets, $sidebar_id)
    {
    }
    /**
     * Retrieves MAC for a serialized widget instance string.
     *
     * Allows values posted back from JS to be rejected if any tampering of the
     * data has occurred.
     *
     * @since 3.9.0
     *
     * @param string $serialized_instance Widget instance.
     * @return string MAC for serialized widget instance.
     */
    protected function get_instance_hash_key($serialized_instance)
    {
    }
    /**
     * Sanitizes a widget instance.
     *
     * Unserialize the JS-instance for storing in the options. It's important that this filter
     * only get applied to an instance *once*.
     *
     * @since 3.9.0
     *
     * @param array $value Widget instance to sanitize.
     * @return array|void Sanitized widget instance.
     */
    public function sanitize_widget_instance($value)
    {
    }
    /**
     * Converts a widget instance into JSON-representable format.
     *
     * @since 3.9.0
     *
     * @param array $value Widget instance to convert to JSON.
     * @return array JSON-converted widget instance.
     */
    public function sanitize_widget_js_instance($value)
    {
    }
    /**
     * Strips out widget IDs for widgets which are no longer registered.
     *
     * One example where this might happen is when a plugin orphans a widget
     * in a sidebar upon deactivation.
     *
     * @since 3.9.0
     *
     * @global array $wp_registered_widgets
     *
     * @param array $widget_ids List of widget IDs.
     * @return array Parsed list of widget IDs.
     */
    public function sanitize_sidebar_widgets_js_instance($widget_ids)
    {
    }
    /**
     * Finds and invokes the widget update and control callbacks.
     *
     * Requires that `$_POST` be populated with the instance data.
     *
     * @since 3.9.0
     *
     * @global array $wp_registered_widget_updates
     * @global array $wp_registered_widget_controls
     *
     * @param  string $widget_id Widget ID.
     * @return WP_Error|array Array containing the updated widget information.
     *                        A WP_Error object, otherwise.
     */
    public function call_widget_update($widget_id)
    {
    }
    /**
     * Updates widget settings asynchronously.
     *
     * Allows the Customizer to update a widget using its form, but return the new
     * instance info via Ajax instead of saving it to the options table.
     *
     * Most code here copied from wp_ajax_save_widget().
     *
     * @since 3.9.0
     *
     * @see wp_ajax_save_widget()
     */
    public function wp_ajax_update_widget()
    {
    }
    /*
     * Selective Refresh Methods
     */
    /**
     * Filters arguments for dynamic widget partials.
     *
     * @since 4.5.0
     *
     * @param array|false $partial_args Partial arguments.
     * @param string      $partial_id   Partial ID.
     * @return array (Maybe) modified partial arguments.
     */
    public function customize_dynamic_partial_args($partial_args, $partial_id)
    {
    }
    /**
     * Adds hooks for selective refresh.
     *
     * @since 4.5.0
     */
    public function selective_refresh_init()
    {
    }
    /**
     * Inject selective refresh data attributes into widget container elements.
     *
     * @param array $params {
     *     Dynamic sidebar params.
     *
     *     @type array $args        Sidebar args.
     *     @type array $widget_args Widget args.
     * }
     * @see WP_Customize_Nav_Menus_Partial_Refresh::filter_wp_nav_menu_args()
     *
     * @return array Params.
     */
    public function filter_dynamic_sidebar_params($params)
    {
    }
    /**
     * List of the tag names seen for before_widget strings.
     *
     * This is used in the {@see 'filter_wp_kses_allowed_html'} filter to ensure that the
     * data-* attributes can be whitelisted.
     *
     * @since 4.5.0
     * @var array
     */
    protected $before_widget_tags_seen = array();
    /**
     * Ensures the HTML data-* attributes for selective refresh are allowed by kses.
     *
     * This is needed in case the `$before_widget` is run through wp_kses() when printed.
     *
     * @since 4.5.0
     *
     * @param array $allowed_html Allowed HTML.
     * @return array (Maybe) modified allowed HTML.
     */
    public function filter_wp_kses_allowed_data_attributes($allowed_html)
    {
    }
    /**
     * Keep track of the number of times that dynamic_sidebar() was called for a given sidebar index.
     *
     * This helps facilitate the uncommon scenario where a single sidebar is rendered multiple times on a template.
     *
     * @since 4.5.0
     * @var array
     */
    protected $sidebar_instance_count = array();
    /**
     * The current request's sidebar_instance_number context.
     *
     * @since 4.5.0
     * @var int
     */
    protected $context_sidebar_instance_number;
    /**
     * Current sidebar ID being rendered.
     *
     * @since 4.5.0
     * @var array
     */
    protected $current_dynamic_sidebar_id_stack = array();
    /**
     * Begins keeping track of the current sidebar being rendered.
     *
     * Insert marker before widgets are rendered in a dynamic sidebar.
     *
     * @since 4.5.0
     *
     * @param int|string $index Index, name, or ID of the dynamic sidebar.
     */
    public function start_dynamic_sidebar($index)
    {
    }
    /**
     * Finishes keeping track of the current sidebar being rendered.
     *
     * Inserts a marker after widgets are rendered in a dynamic sidebar.
     *
     * @since 4.5.0
     *
     * @param int|string $index Index, name, or ID of the dynamic sidebar.
     */
    public function end_dynamic_sidebar($index)
    {
    }
    /**
     * Current sidebar being rendered.
     *
     * @since 4.5.0
     * @var string
     */
    protected $rendering_widget_id;
    /**
     * Current widget being rendered.
     *
     * @since 4.5.0
     * @var string
     */
    protected $rendering_sidebar_id;
    /**
     * Filters sidebars_widgets to ensure the currently-rendered widget is the only widget in the current sidebar.
     *
     * @since 4.5.0
     *
     * @param array $sidebars_widgets Sidebars widgets.
     * @return array Filtered sidebars widgets.
     */
    public function filter_sidebars_widgets_for_rendering_widget($sidebars_widgets)
    {
    }
    /**
     * Renders a specific widget using the supplied sidebar arguments.
     *
     * @since 4.5.0
     *
     * @see dynamic_sidebar()
     *
     * @param WP_Customize_Partial $partial Partial.
     * @param array                $context {
     *     Sidebar args supplied as container context.
     *
     *     @type string $sidebar_id              ID for sidebar for widget to render into.
     *     @type int    $sidebar_instance_number Disambiguating instance number.
     * }
     * @return string|false
     */
    public function render_widget_partial($partial, $context)
    {
    }
    //
    // Option Update Capturing
    //
    /**
     * List of captured widget option updates.
     *
     * @since 3.9.0
     * @var array $_captured_options Values updated while option capture is happening.
     */
    protected $_captured_options = array();
    /**
     * Whether option capture is currently happening.
     *
     * @since 3.9.0
     * @var bool $_is_current Whether option capture is currently happening or not.
     */
    protected $_is_capturing_option_updates = \false;
    /**
     * Determines whether the captured option update should be ignored.
     *
     * @since 3.9.0
     *
     * @param string $option_name Option name.
     * @return bool Whether the option capture is ignored.
     */
    protected function is_option_capture_ignored($option_name)
    {
    }
    /**
     * Retrieves captured widget option updates.
     *
     * @since 3.9.0
     *
     * @return array Array of captured options.
     */
    protected function get_captured_options()
    {
    }
    /**
     * Retrieves the option that was captured from being saved.
     *
     * @since 4.2.0
     *
     * @param string $option_name Option name.
     * @param mixed  $default     Optional. Default value to return if the option does not exist. Default false.
     * @return mixed Value set for the option.
     */
    protected function get_captured_option($option_name, $default = \false)
    {
    }
    /**
     * Retrieves the number of captured widget option updates.
     *
     * @since 3.9.0
     *
     * @return int Number of updated options.
     */
    protected function count_captured_options()
    {
    }
    /**
     * Begins keeping track of changes to widget options, caching new values.
     *
     * @since 3.9.0
     */
    protected function start_capturing_option_updates()
    {
    }
    /**
     * Pre-filters captured option values before updating.
     *
     * @since 3.9.0
     *
     * @param mixed  $new_value   The new option value.
     * @param string $option_name Name of the option.
     * @param mixed  $old_value   The old option value.
     * @return mixed Filtered option value.
     */
    public function capture_filter_pre_update_option($new_value, $option_name, $old_value)
    {
    }
    /**
     * Pre-filters captured option values before retrieving.
     *
     * @since 3.9.0
     *
     * @param mixed $value Value to return instead of the option value.
     * @return mixed Filtered option value.
     */
    public function capture_filter_pre_get_option($value)
    {
    }
    /**
     * Undoes any changes to the options since options capture began.
     *
     * @since 3.9.0
     */
    protected function stop_capturing_option_updates()
    {
    }
    /**
     * {@internal Missing Summary}
     *
     * See the {@see 'customize_dynamic_setting_args'} filter.
     *
     * @since 3.9.0
     * @deprecated 4.2.0 Deprecated in favor of the {@see 'customize_dynamic_setting_args'} filter.
     */
    public function setup_widget_addition_previews()
    {
    }
    /**
     * {@internal Missing Summary}
     *
     * See the {@see 'customize_dynamic_setting_args'} filter.
     *
     * @since 3.9.0
     * @deprecated 4.2.0 Deprecated in favor of the {@see 'customize_dynamic_setting_args'} filter.
     */
    public function prepreview_added_sidebars_widgets()
    {
    }
    /**
     * {@internal Missing Summary}
     *
     * See the {@see 'customize_dynamic_setting_args'} filter.
     *
     * @since 3.9.0
     * @deprecated 4.2.0 Deprecated in favor of the {@see 'customize_dynamic_setting_args'} filter.
     */
    public function prepreview_added_widget_instance()
    {
    }
    /**
     * {@internal Missing Summary}
     *
     * See the {@see 'customize_dynamic_setting_args'} filter.
     *
     * @since 3.9.0
     * @deprecated 4.2.0 Deprecated in favor of the {@see 'customize_dynamic_setting_args'} filter.
     */
    public function remove_prepreview_filters()
    {
    }
}
/**
 * Dependencies API: _WP_Dependency class
 *
 * @since 4.7.0
 *
 * @package WordPress
 * @subpackage Dependencies
 */
/**
 * Class _WP_Dependency
 *
 * Helper class to register a handle and associated data.
 *
 * @access private
 * @since 2.6.0
 */
class _WP_Dependency
{
    /**
     * The handle name.
     *
     * @since 2.6.0
     * @var null
     */
    public $handle;
    /**
     * The handle source.
     *
     * @since 2.6.0
     * @var null
     */
    public $src;
    /**
     * An array of handle dependencies.
     *
     * @since 2.6.0
     * @var array
     */
    public $deps = array();
    /**
     * The handle version.
     *
     * Used for cache-busting.
     *
     * @since 2.6.0
     * @var bool|string
     */
    public $ver = \false;
    /**
     * Additional arguments for the handle.
     *
     * @since 2.6.0
     * @var null
     */
    public $args = \null;
    // Custom property, such as $in_footer or $media.
    /**
     * Extra data to supply to the handle.
     *
     * @since 2.6.0
     * @var array
     */
    public $extra = array();
    /**
     * Setup dependencies.
     *
     * @since 2.6.0
     */
    public function __construct()
    {
    }
    /**
     * Add handle data.
     *
     * @since 2.6.0
     *
     * @param string $name The data key to add.
     * @param mixed  $data The data value to add.
     * @return bool False if not scalar, true otherwise.
     */
    public function add_data($name, $data)
    {
    }
}
/**
 * Facilitates adding of the WordPress editor as used on the Write and Edit screens.
 *
 * @package WordPress
 * @since 3.3.0
 *
 * Private, not included by default. See wp_editor() in wp-includes/general-template.php.
 */
final class _WP_Editors
{
    public static $mce_locale;
    private static $mce_settings = array();
    private static $qt_settings = array();
    private static $plugins = array();
    private static $qt_buttons = array();
    private static $ext_plugins;
    private static $baseurl;
    private static $first_init;
    private static $this_tinymce = \false;
    private static $this_quicktags = \false;
    private static $has_tinymce = \false;
    private static $has_quicktags = \false;
    private static $has_medialib = \false;
    private static $editor_buttons_css = \true;
    private static $drag_drop_upload = \false;
    private static $old_dfw_compat = \false;
    private static $translation;
    private static $tinymce_scripts_printed = \false;
    private static $link_dialog_printed = \false;
    private function __construct()
    {
    }
    /**
     * Parse default arguments for the editor instance.
     *
     * @static
     * @param string $editor_id ID for the current editor instance.
     * @param array  $settings {
     *     Array of editor arguments.
     *
     *     @type bool       $wpautop           Whether to use wpautop(). Default true.
     *     @type bool       $media_buttons     Whether to show the Add Media/other media buttons.
     *     @type string     $default_editor    When both TinyMCE and Quicktags are used, set which
     *                                         editor is shown on page load. Default empty.
     *     @type bool       $drag_drop_upload  Whether to enable drag & drop on the editor uploading. Default false.
     *                                         Requires the media modal.
     *     @type string     $textarea_name     Give the textarea a unique name here. Square brackets
     *                                         can be used here. Default $editor_id.
     *     @type int        $textarea_rows     Number rows in the editor textarea. Default 20.
     *     @type string|int $tabindex          Tabindex value to use. Default empty.
     *     @type string     $tabfocus_elements The previous and next element ID to move the focus to
     *                                         when pressing the Tab key in TinyMCE. Default ':prev,:next'.
     *     @type string     $editor_css        Intended for extra styles for both Visual and Text editors.
     *                                         Should include `<style>` tags, and can use "scoped". Default empty.
     *     @type string     $editor_class      Extra classes to add to the editor textarea element. Default empty.
     *     @type bool       $teeny             Whether to output the minimal editor config. Examples include
     *                                         Press This and the Comment editor. Default false.
     *     @type bool       $dfw               Deprecated in 4.1. Since 4.3 used only to enqueue wp-fullscreen-stub.js
     *                                         for backward compatibility.
     *     @type bool|array $tinymce           Whether to load TinyMCE. Can be used to pass settings directly to
     *                                         TinyMCE using an array. Default true.
     *     @type bool|array $quicktags         Whether to load Quicktags. Can be used to pass settings directly to
     *                                         Quicktags using an array. Default true.
     * }
     * @return array Parsed arguments array.
     */
    public static function parse_settings($editor_id, $settings)
    {
    }
    /**
     * Outputs the HTML for a single instance of the editor.
     *
     * @static
     * @param string $content The initial content of the editor.
     * @param string $editor_id ID for the textarea and TinyMCE and Quicktags instances (can contain only ASCII letters and numbers).
     * @param array $settings See _WP_Editors()::parse_settings() for description.
     */
    public static function editor($content, $editor_id, $settings = array())
    {
    }
    /**
     * @static
     *
     * @global string $tinymce_version
     *
     * @param string $editor_id
     * @param array  $set
     */
    public static function editor_settings($editor_id, $set)
    {
    }
    /**
     *
     * @static
     * @param array $init
     * @return string
     */
    private static function _parse_init($init)
    {
    }
    /**
     *
     * @static
     *
     * @param bool $default_scripts Optional. Whether default scripts should be enqueued. Default false.
     */
    public static function enqueue_scripts($default_scripts = \false)
    {
    }
    /**
     * Enqueue all editor scripts.
     * For use when the editor is going to be initialized after page load.
     *
     * @since 4.8.0
     */
    public static function enqueue_default_editor()
    {
    }
    /**
     * Print (output) all editor scripts and default settings.
     * For use when the editor is going to be initialized after page load.
     *
     * @since 4.8.0
     *
     */
    public static function print_default_editor_scripts()
    {
    }
    public static function get_mce_locale()
    {
    }
    public static function get_baseurl()
    {
    }
    /**
     * Returns the default TinyMCE settings.
     * Doesn't include plugins, buttons, editor selector.
     *
     * @global string $tinymce_version
     *
     * @return array
     */
    private static function default_settings()
    {
    }
    private static function get_translation()
    {
    }
    /**
     * Translates the default TinyMCE strings and returns them as JSON encoded object ready to be loaded with tinymce.addI18n(),
     * or as JS snippet that should run after tinymce.js is loaded.
     *
     * @static
     * @param string $mce_locale The locale used for the editor.
     * @param bool $json_only optional Whether to include the JavaScript calls to tinymce.addI18n() and tinymce.ScriptLoader.markDone().
     * @return string Translation object, JSON encoded.
     */
    public static function wp_mce_translation($mce_locale = '', $json_only = \false)
    {
    }
    /**
     * Print (output) the main TinyMCE scripts.
     *
     * @since 4.8.0
     *
     * @static
     * @global string $tinymce_version
     * @global bool   $concatenate_scripts
     * @global bool   $compress_scripts
     */
    public static function print_tinymce_scripts()
    {
    }
    /**
     * Print (output) the TinyMCE configuration and initialization scripts.
     *
     * @static
     * @global string $tinymce_version
     */
    public static function editor_js()
    {
    }
    /**
     * Outputs the HTML for distraction-free writing mode.
     *
     * @since 3.2.0
     * @deprecated 4.3.0
     *
     * @static
     */
    public static function wp_fullscreen_html()
    {
    }
    /**
     * Performs post queries for internal linking.
     *
     * @since 3.1.0
     *
     * @static
     * @param array $args Optional. Accepts 'pagenum' and 's' (search) arguments.
     * @return false|array Results.
     */
    public static function wp_link_query($args = array())
    {
    }
    /**
     * Dialog for internal linking.
     *
     * @since 3.1.0
     *
     * @static
     */
    public static function wp_link_dialog()
    {
    }
}
/**
 * API for easily embedding rich media such as videos and images into content.
 *
 * @package WordPress
 * @subpackage Embed
 * @since 2.9.0
 */
class WP_Embed
{
    public $handlers = array();
    public $post_ID;
    public $usecache = \true;
    public $linkifunknown = \true;
    public $last_attr = array();
    public $last_url = '';
    /**
     * When a URL cannot be embedded, return false instead of returning a link
     * or the URL.
     *
     * Bypasses the {@see 'embed_maybe_make_link'} filter.
     *
     * @var bool
     */
    public $return_false_on_fail = \false;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Process the [embed] shortcode.
     *
     * Since the [embed] shortcode needs to be run earlier than other shortcodes,
     * this function removes all existing shortcodes, registers the [embed] shortcode,
     * calls do_shortcode(), and then re-registers the old shortcodes.
     *
     * @global array $shortcode_tags
     *
     * @param string $content Content to parse
     * @return string Content with shortcode parsed
     */
    public function run_shortcode($content)
    {
    }
    /**
     * If a post/page was saved, then output JavaScript to make
     * an Ajax request that will call WP_Embed::cache_oembed().
     */
    public function maybe_run_ajax_cache()
    {
    }
    /**
     * Registers an embed handler.
     *
     * Do not use this function directly, use wp_embed_register_handler() instead.
     *
     * This function should probably also only be used for sites that do not support oEmbed.
     *
     * @param string $id An internal ID/name for the handler. Needs to be unique.
     * @param string $regex The regex that will be used to see if this handler should be used for a URL.
     * @param callable $callback The callback function that will be called if the regex is matched.
     * @param int $priority Optional. Used to specify the order in which the registered handlers will be tested (default: 10). Lower numbers correspond with earlier testing, and handlers with the same priority are tested in the order in which they were added to the action.
     */
    public function register_handler($id, $regex, $callback, $priority = 10)
    {
    }
    /**
     * Unregisters a previously-registered embed handler.
     *
     * Do not use this function directly, use wp_embed_unregister_handler() instead.
     *
     * @param string $id The handler ID that should be removed.
     * @param int $priority Optional. The priority of the handler to be removed (default: 10).
     */
    public function unregister_handler($id, $priority = 10)
    {
    }
    /**
     * The do_shortcode() callback function.
     *
     * Attempts to convert a URL into embed HTML. Starts by checking the URL against the regex of
     * the registered embed handlers. If none of the regex matches and it's enabled, then the URL
     * will be given to the WP_oEmbed class.
     *
     * @param array $attr {
     *     Shortcode attributes. Optional.
     *
     *     @type int $width  Width of the embed in pixels.
     *     @type int $height Height of the embed in pixels.
     * }
     * @param string $url The URL attempting to be embedded.
     * @return string|false The embed HTML on success, otherwise the original URL.
     *                      `->maybe_make_link()` can return false on failure.
     */
    public function shortcode($attr, $url = '')
    {
    }
    /**
     * Delete all oEmbed caches. Unused by core as of 4.0.0.
     *
     * @param int $post_ID Post ID to delete the caches for.
     */
    public function delete_oembed_caches($post_ID)
    {
    }
    /**
     * Triggers a caching of all oEmbed results.
     *
     * @param int $post_ID Post ID to do the caching for.
     */
    public function cache_oembed($post_ID)
    {
    }
    /**
     * Passes any unlinked URLs that are on their own line to WP_Embed::shortcode() for potential embedding.
     *
     * @see WP_Embed::autoembed_callback()
     *
     * @param string $content The content to be searched.
     * @return string Potentially modified $content.
     */
    public function autoembed($content)
    {
    }
    /**
     * Callback function for WP_Embed::autoembed().
     *
     * @param array $match A regex match array.
     * @return string The embed HTML on success, otherwise the original URL.
     */
    public function autoembed_callback($match)
    {
    }
    /**
     * Conditionally makes a hyperlink based on an internal class variable.
     *
     * @param string $url URL to potentially be linked.
     * @return false|string Linked URL or the original URL. False if 'return_false_on_fail' is true.
     */
    public function maybe_make_link($url)
    {
    }
    /**
     * Find the oEmbed cache post ID for a given cache key.
     *
     * @since 4.9.0
     *
     * @param string $cache_key oEmbed cache key.
     * @return int|null Post ID on success, null on failure.
     */
    public function find_oembed_post_id($cache_key)
    {
    }
}
/**
 * WordPress Error API.
 *
 * Contains the WP_Error class and the is_wp_error() function.
 *
 * @package WordPress
 */
/**
 * WordPress Error class.
 *
 * Container for checking for WordPress errors and error messages. Return
 * WP_Error and use is_wp_error() to check if this class is returned. Many
 * core WordPress functions pass this class in the event of an error and
 * if not handled properly will result in code errors.
 *
 * @since 2.1.0
 */
class WP_Error
{
    /**
     * Stores the list of errors.
     *
     * @since 2.1.0
     * @var array
     */
    public $errors = array();
    /**
     * Stores the list of data for error codes.
     *
     * @since 2.1.0
     * @var array
     */
    public $error_data = array();
    /**
     * Initialize the error.
     *
     * If `$code` is empty, the other parameters will be ignored.
     * When `$code` is not empty, `$message` will be used even if
     * it is empty. The `$data` parameter will be used only if it
     * is not empty.
     *
     * Though the class is constructed with a single error code and
     * message, multiple codes can be added using the `add()` method.
     *
     * @since 2.1.0
     *
     * @param string|int $code Error code
     * @param string $message Error message
     * @param mixed $data Optional. Error data.
     */
    public function __construct($code = '', $message = '', $data = '')
    {
    }
    /**
     * Retrieve all error codes.
     *
     * @since 2.1.0
     *
     * @return array List of error codes, if available.
     */
    public function get_error_codes()
    {
    }
    /**
     * Retrieve first error code available.
     *
     * @since 2.1.0
     *
     * @return string|int Empty string, if no error codes.
     */
    public function get_error_code()
    {
    }
    /**
     * Retrieve all error messages or error messages matching code.
     *
     * @since 2.1.0
     *
     * @param string|int $code Optional. Retrieve messages matching code, if exists.
     * @return array Error strings on success, or empty array on failure (if using code parameter).
     */
    public function get_error_messages($code = '')
    {
    }
    /**
     * Get single error message.
     *
     * This will get the first message available for the code. If no code is
     * given then the first code available will be used.
     *
     * @since 2.1.0
     *
     * @param string|int $code Optional. Error code to retrieve message.
     * @return string
     */
    public function get_error_message($code = '')
    {
    }
    /**
     * Retrieve error data for error code.
     *
     * @since 2.1.0
     *
     * @param string|int $code Optional. Error code.
     * @return mixed Error data, if it exists.
     */
    public function get_error_data($code = '')
    {
    }
    /**
     * Add an error or append additional message to an existing error.
     *
     * @since 2.1.0
     *
     * @param string|int $code Error code.
     * @param string $message Error message.
     * @param mixed $data Optional. Error data.
     */
    public function add($code, $message, $data = '')
    {
    }
    /**
     * Add data for error code.
     *
     * The error code can only contain one error data.
     *
     * @since 2.1.0
     *
     * @param mixed $data Error data.
     * @param string|int $code Error code.
     */
    public function add_data($data, $code = '')
    {
    }
    /**
     * Removes the specified error.
     *
     * This function removes all error messages associated with the specified
     * error code, along with any error data for that code.
     *
     * @since 4.1.0
     *
     * @param string|int $code Error code.
     */
    public function remove($code)
    {
    }
}
/**
 * Feed API: WP_Feed_Cache_Transient class
 *
 * @package WordPress
 * @subpackage Feed
 * @since 4.7.0
 */
/**
 * Core class used to implement feed cache transients.
 *
 * @since 2.8.0
 */
class WP_Feed_Cache_Transient
{
    /**
     * Holds the transient name.
     *
     * @since 2.8.0
     * @var string
     */
    public $name;
    /**
     * Holds the transient mod name.
     *
     * @since 2.8.0
     * @var string
     */
    public $mod_name;
    /**
     * Holds the cache duration in seconds.
     *
     * Defaults to 43200 seconds (12 hours).
     *
     * @since 2.8.0
     * @var int
     */
    public $lifetime = 43200;
    /**
     * Constructor.
     *
     * @since 2.8.0
     * @since 3.2.0 Updated to use a PHP5 constructor.
     *
     * @param string $location  URL location (scheme is used to determine handler).
     * @param string $filename  Unique identifier for cache object.
     * @param string $extension 'spi' or 'spc'.
     */
    public function __construct($location, $filename, $extension)
    {
    }
    /**
     * Sets the transient.
     *
     * @since 2.8.0
     *
     * @param SimplePie $data Data to save.
     * @return true Always true.
     */
    public function save($data)
    {
    }
    /**
     * Gets the transient.
     *
     * @since 2.8.0
     *
     * @return mixed Transient value.
     */
    public function load()
    {
    }
    /**
     * Gets mod transient.
     *
     * @since 2.8.0
     *
     * @return mixed Transient value.
     */
    public function mtime()
    {
    }
    /**
     * Sets mod transient.
     *
     * @since 2.8.0
     *
     * @return bool False if value was not set and true if value was set.
     */
    public function touch()
    {
    }
    /**
     * Deletes transients.
     *
     * @since 2.8.0
     *
     * @return true Always true.
     */
    public function unlink()
    {
    }
}
/**
 * Feed API: WP_Feed_Cache class
 *
 * @package WordPress
 * @subpackage Feed
 * @since 4.7.0
 */
/**
 * Core class used to implement a feed cache.
 *
 * @since 2.8.0
 *
 * @see SimplePie_Cache
 */
class WP_Feed_Cache extends \SimplePie_Cache
{
    /**
     * Creates a new SimplePie_Cache object.
     *
     * @since 2.8.0
     *
     * @param string $location  URL location (scheme is used to determine handler).
     * @param string $filename  Unique identifier for cache object.
     * @param string $extension 'spi' or 'spc'.
     * @return WP_Feed_Cache_Transient Feed cache handler object that uses transients.
     */
    public function create($location, $filename, $extension)
    {
    }
}
/**
 * Plugin API: WP_Hook class
 *
 * @package WordPress
 * @subpackage Plugin
 * @since 4.7.0
 */
/**
 * Core class used to implement action and filter hook functionality.
 *
 * @since 4.7.0
 *
 * @see Iterator
 * @see ArrayAccess
 */
final class WP_Hook implements \Iterator, \ArrayAccess
{
    /**
     * Hook callbacks.
     *
     * @since 4.7.0
     * @var array
     */
    public $callbacks = array();
    /**
     * The priority keys of actively running iterations of a hook.
     *
     * @since 4.7.0
     * @var array
     */
    private $iterations = array();
    /**
     * The current priority of actively running iterations of a hook.
     *
     * @since 4.7.0
     * @var array
     */
    private $current_priority = array();
    /**
     * Number of levels this hook can be recursively called.
     *
     * @since 4.7.0
     * @var int
     */
    private $nesting_level = 0;
    /**
     * Flag for if we're current doing an action, rather than a filter.
     *
     * @since 4.7.0
     * @var bool
     */
    private $doing_action = \false;
    /**
     * Hooks a function or method to a specific filter action.
     *
     * @since 4.7.0
     *
     * @param string   $tag             The name of the filter to hook the $function_to_add callback to.
     * @param callable $function_to_add The callback to be run when the filter is applied.
     * @param int      $priority        The order in which the functions associated with a
     *                                  particular action are executed. Lower numbers correspond with
     *                                  earlier execution, and functions with the same priority are executed
     *                                  in the order in which they were added to the action.
     * @param int      $accepted_args   The number of arguments the function accepts.
     */
    public function add_filter($tag, $function_to_add, $priority, $accepted_args)
    {
    }
    /**
     * Handles reseting callback priority keys mid-iteration.
     *
     * @since 4.7.0
     *
     * @param bool|int $new_priority     Optional. The priority of the new filter being added. Default false,
     *                                   for no priority being added.
     * @param bool     $priority_existed Optional. Flag for whether the priority already existed before the new
     *                                   filter was added. Default false.
     */
    private function resort_active_iterations($new_priority = \false, $priority_existed = \false)
    {
    }
    /**
     * Unhooks a function or method from a specific filter action.
     *
     * @since 4.7.0
     *
     * @param string   $tag                The filter hook to which the function to be removed is hooked. Used
     *                                     for building the callback ID when SPL is not available.
     * @param callable $function_to_remove The callback to be removed from running when the filter is applied.
     * @param int      $priority           The exact priority used when adding the original filter callback.
     * @return bool Whether the callback existed before it was removed.
     */
    public function remove_filter($tag, $function_to_remove, $priority)
    {
    }
    /**
     * Checks if a specific action has been registered for this hook.
     *
     * @since 4.7.0
     *
     * @param string        $tag               Optional. The name of the filter hook. Used for building
     *                                         the callback ID when SPL is not available. Default empty.
     * @param callable|bool $function_to_check Optional. The callback to check for. Default false.
     * @return bool|int The priority of that hook is returned, or false if the function is not attached.
     */
    public function has_filter($tag = '', $function_to_check = \false)
    {
    }
    /**
     * Checks if any callbacks have been registered for this hook.
     *
     * @since 4.7.0
     *
     * @return bool True if callbacks have been registered for the current hook, otherwise false.
     */
    public function has_filters()
    {
    }
    /**
     * Removes all callbacks from the current filter.
     *
     * @since 4.7.0
     *
     * @param int|bool $priority Optional. The priority number to remove. Default false.
     */
    public function remove_all_filters($priority = \false)
    {
    }
    /**
     * Calls the callback functions added to a filter hook.
     *
     * @since 4.7.0
     *
     * @param mixed $value The value to filter.
     * @param array $args  Arguments to pass to callbacks.
     * @return mixed The filtered value after all hooked functions are applied to it.
     */
    public function apply_filters($value, $args)
    {
    }
    /**
     * Executes the callback functions hooked on a specific action hook.
     *
     * @since 4.7.0
     *
     * @param mixed $args Arguments to pass to the hook callbacks.
     */
    public function do_action($args)
    {
    }
    /**
     * Processes the functions hooked into the 'all' hook.
     *
     * @since 4.7.0
     *
     * @param array $args Arguments to pass to the hook callbacks. Passed by reference.
     */
    public function do_all_hook(&$args)
    {
    }
    /**
     * Return the current priority level of the currently running iteration of the hook.
     *
     * @since 4.7.0
     *
     * @return int|false If the hook is running, return the current priority level. If it isn't running, return false.
     */
    public function current_priority()
    {
    }
    /**
     * Normalizes filters set up before WordPress has initialized to WP_Hook objects.
     *
     * @since 4.7.0
     * @static
     *
     * @param array $filters Filters to normalize.
     * @return WP_Hook[] Array of normalized filters.
     */
    public static function build_preinitialized_hooks($filters)
    {
    }
    /**
     * Determines whether an offset value exists.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset An offset to check for.
     * @return bool True if the offset exists, false otherwise.
     */
    public function offsetExists($offset)
    {
    }
    /**
     * Retrieves a value at a specified offset.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset The offset to retrieve.
     * @return mixed If set, the value at the specified offset, null otherwise.
     */
    public function offsetGet($offset)
    {
    }
    /**
     * Sets a value at a specified offset.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     */
    public function offsetSet($offset, $value)
    {
    }
    /**
     * Unsets a specified offset.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset The offset to unset.
     */
    public function offsetUnset($offset)
    {
    }
    /**
     * Returns the current element.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/iterator.current.php
     *
     * @return array Of callbacks at current priority.
     */
    public function current()
    {
    }
    /**
     * Moves forward to the next element.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/iterator.next.php
     *
     * @return array Of callbacks at next priority.
     */
    public function next()
    {
    }
    /**
     * Returns the key of the current element.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/iterator.key.php
     *
     * @return mixed Returns current priority on success, or NULL on failure
     */
    public function key()
    {
    }
    /**
     * Checks if current position is valid.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/iterator.valid.php
     *
     * @return boolean
     */
    public function valid()
    {
    }
    /**
     * Rewinds the Iterator to the first element.
     *
     * @since 4.7.0
     *
     * @link https://secure.php.net/manual/en/iterator.rewind.php
     */
    public function rewind()
    {
    }
}
/**
 * HTTP API: WP_Http_Cookie class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */
/**
 * Core class used to encapsulate a single cookie object for internal use.
 *
 * Returned cookies are represented using this class, and when cookies are set, if they are not
 * already a WP_Http_Cookie() object, then they are turned into one.
 *
 * @todo The WordPress convention is to use underscores instead of camelCase for function and method
 * names. Need to switch to use underscores instead for the methods.
 *
 * @since 2.8.0
 */
class WP_Http_Cookie
{
    /**
     * Cookie name.
     *
     * @since 2.8.0
     * @var string
     */
    public $name;
    /**
     * Cookie value.
     *
     * @since 2.8.0
     * @var string
     */
    public $value;
    /**
     * When the cookie expires.
     *
     * @since 2.8.0
     * @var string
     */
    public $expires;
    /**
     * Cookie URL path.
     *
     * @since 2.8.0
     * @var string
     */
    public $path;
    /**
     * Cookie Domain.
     *
     * @since 2.8.0
     * @var string
     */
    public $domain;
    /**
     * Sets up this cookie object.
     *
     * The parameter $data should be either an associative array containing the indices names below
     * or a header string detailing it.
     *
     * @since 2.8.0
     *
     * @param string|array $data {
     *     Raw cookie data as header string or data array.
     *
     *     @type string     $name    Cookie name.
     *     @type mixed      $value   Value. Should NOT already be urlencoded.
     *     @type string|int $expires Optional. Unix timestamp or formatted date. Default null.
     *     @type string     $path    Optional. Path. Default '/'.
     *     @type string     $domain  Optional. Domain. Default host of parsed $requested_url.
     *     @type int        $port    Optional. Port. Default null.
     * }
     * @param string       $requested_url The URL which the cookie was set on, used for default $domain
     *                                    and $port values.
     */
    public function __construct($data, $requested_url = '')
    {
    }
    /**
     * Confirms that it's OK to send this cookie to the URL checked against.
     *
     * Decision is based on RFC 2109/2965, so look there for details on validity.
     *
     * @since 2.8.0
     *
     * @param string $url URL you intend to send this cookie to
     * @return bool true if allowed, false otherwise.
     */
    public function test($url)
    {
    }
    /**
     * Convert cookie name and value back to header string.
     *
     * @since 2.8.0
     *
     * @return string Header encoded cookie name and value.
     */
    public function getHeaderValue()
    {
    }
    /**
     * Retrieve cookie header for usage in the rest of the WordPress HTTP API.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function getFullHeader()
    {
    }
    /**
     * Retrieves cookie attributes.
     *
     * @since 4.6.0
     *
     * @return array {
     *    List of attributes.
     *
     *    @type string $expires When the cookie expires.
     *    @type string $path    Cookie URL path.
     *    @type string $domain  Cookie domain.
     * }
     */
    public function get_attributes()
    {
    }
}
/**
 * HTTP API: WP_Http_Curl class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */
/**
 * Core class used to integrate Curl as an HTTP transport.
 *
 * HTTP request method uses Curl extension to retrieve the url.
 *
 * Requires the Curl extension to be installed.
 *
 * @since 2.7.0
 */
class WP_Http_Curl
{
    /**
     * Temporary header storage for during requests.
     *
     * @since 3.2.0
     * @var string
     */
    private $headers = '';
    /**
     * Temporary body storage for during requests.
     *
     * @since 3.6.0
     * @var string
     */
    private $body = '';
    /**
     * The maximum amount of data to receive from the remote server.
     *
     * @since 3.6.0
     * @var int
     */
    private $max_body_length = \false;
    /**
     * The file resource used for streaming to file.
     *
     * @since 3.6.0
     * @var resource
     */
    private $stream_handle = \false;
    /**
     * The total bytes written in the current request.
     *
     * @since 4.1.0
     * @var int
     */
    private $bytes_written_total = 0;
    /**
     * Send a HTTP request to a URI using cURL extension.
     *
     * @since 2.7.0
     *
     * @param string $url The request URL.
     * @param string|array $args Optional. Override the defaults.
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'. A WP_Error instance upon error
     */
    public function request($url, $args = array())
    {
    }
    /**
     * Grabs the headers of the cURL request.
     *
     * Each header is sent individually to this callback, so we append to the `$header` property
     * for temporary storage
     *
     * @since 3.2.0
     *
     * @param resource $handle  cURL handle.
     * @param string   $headers cURL request headers.
     * @return int Length of the request headers.
     */
    private function stream_headers($handle, $headers)
    {
    }
    /**
     * Grabs the body of the cURL request.
     *
     * The contents of the document are passed in chunks, so we append to the `$body`
     * property for temporary storage. Returning a length shorter than the length of
     * `$data` passed in will cause cURL to abort the request with `CURLE_WRITE_ERROR`.
     *
     * @since 3.6.0
     *
     * @param resource $handle  cURL handle.
     * @param string   $data    cURL request body.
     * @return int Total bytes of data written.
     */
    private function stream_body($handle, $data)
    {
    }
    /**
     * Determines whether this class can be used for retrieving a URL.
     *
     * @static
     * @since 2.7.0
     *
     * @param array $args Optional. Array of request arguments. Default empty array.
     * @return bool False means this class can not be used, true means it can.
     */
    public static function test($args = array())
    {
    }
}
/**
 * HTTP API: WP_Http_Encoding class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */
/**
 * Core class used to implement deflate and gzip transfer encoding support for HTTP requests.
 *
 * Includes RFC 1950, RFC 1951, and RFC 1952.
 *
 * @since 2.8.0
 */
class WP_Http_Encoding
{
    /**
     * Compress raw string using the deflate format.
     *
     * Supports the RFC 1951 standard.
     *
     * @since 2.8.0
     *
     * @static
     *
     * @param string $raw String to compress.
     * @param int $level Optional, default is 9. Compression level, 9 is highest.
     * @param string $supports Optional, not used. When implemented it will choose the right compression based on what the server supports.
     * @return string|false False on failure.
     */
    public static function compress($raw, $level = 9, $supports = \null)
    {
    }
    /**
     * Decompression of deflated string.
     *
     * Will attempt to decompress using the RFC 1950 standard, and if that fails
     * then the RFC 1951 standard deflate will be attempted. Finally, the RFC
     * 1952 standard gzip decode will be attempted. If all fail, then the
     * original compressed string will be returned.
     *
     * @since 2.8.0
     *
     * @static
     *
     * @param string $compressed String to decompress.
     * @param int $length The optional length of the compressed data.
     * @return string|bool False on failure.
     */
    public static function decompress($compressed, $length = \null)
    {
    }
    /**
     * Decompression of deflated string while staying compatible with the majority of servers.
     *
     * Certain Servers will return deflated data with headers which PHP's gzinflate()
     * function cannot handle out of the box. The following function has been created from
     * various snippets on the gzinflate() PHP documentation.
     *
     * Warning: Magic numbers within. Due to the potential different formats that the compressed
     * data may be returned in, some "magic offsets" are needed to ensure proper decompression
     * takes place. For a simple progmatic way to determine the magic offset in use, see:
     * https://core.trac.wordpress.org/ticket/18273
     *
     * @since 2.8.1
     * @link https://core.trac.wordpress.org/ticket/18273
     * @link https://secure.php.net/manual/en/function.gzinflate.php#70875
     * @link https://secure.php.net/manual/en/function.gzinflate.php#77336
     *
     * @static
     *
     * @param string $gzData String to decompress.
     * @return string|bool False on failure.
     */
    public static function compatible_gzinflate($gzData)
    {
    }
    /**
     * What encoding types to accept and their priority values.
     *
     * @since 2.8.0
     *
     * @static
     *
     * @param string $url
     * @param array  $args
     * @return string Types of encoding to accept.
     */
    public static function accept_encoding($url, $args)
    {
    }
    /**
     * What encoding the content used when it was compressed to send in the headers.
     *
     * @since 2.8.0
     *
     * @static
     *
     * @return string Content-Encoding string to send in the header.
     */
    public static function content_encoding()
    {
    }
    /**
     * Whether the content be decoded based on the headers.
     *
     * @since 2.8.0
     *
     * @static
     *
     * @param array|string $headers All of the available headers.
     * @return bool
     */
    public static function should_decode($headers)
    {
    }
    /**
     * Whether decompression and compression are supported by the PHP version.
     *
     * Each function is tested instead of checking for the zlib extension, to
     * ensure that the functions all exist in the PHP version and aren't
     * disabled.
     *
     * @since 2.8.0
     *
     * @static
     *
     * @return bool
     */
    public static function is_available()
    {
    }
}
/**
 * WP_HTTP_IXR_Client
 *
 * @package WordPress
 * @since 3.1.0
 *
 */
class WP_HTTP_IXR_Client extends \IXR_Client
{
    public $scheme;
    /**
     * @var IXR_Error
     */
    public $error;
    /**
     * @param string $server
     * @param string|bool $path
     * @param int|bool $port
     * @param int $timeout
     */
    public function __construct($server, $path = \false, $port = \false, $timeout = 15)
    {
    }
    /**
     * @return bool
     */
    public function query()
    {
    }
}
/**
 * HTTP API: WP_HTTP_Proxy class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */
/**
 * Core class used to implement HTTP API proxy support.
 *
 * There are caveats to proxy support. It requires that defines be made in the wp-config.php file to
 * enable proxy support. There are also a few filters that plugins can hook into for some of the
 * constants.
 *
 * Please note that only BASIC authentication is supported by most transports.
 * cURL MAY support more methods (such as NTLM authentication) depending on your environment.
 *
 * The constants are as follows:
 * <ol>
 * <li>WP_PROXY_HOST - Enable proxy support and host for connecting.</li>
 * <li>WP_PROXY_PORT - Proxy port for connection. No default, must be defined.</li>
 * <li>WP_PROXY_USERNAME - Proxy username, if it requires authentication.</li>
 * <li>WP_PROXY_PASSWORD - Proxy password, if it requires authentication.</li>
 * <li>WP_PROXY_BYPASS_HOSTS - Will prevent the hosts in this list from going through the proxy.
 * You do not need to have localhost and the site host in this list, because they will not be passed
 * through the proxy. The list should be presented in a comma separated list, wildcards using * are supported, eg. *.wordpress.org</li>
 * </ol>
 *
 * An example can be as seen below.
 *
 *     define('WP_PROXY_HOST', '192.168.84.101');
 *     define('WP_PROXY_PORT', '8080');
 *     define('WP_PROXY_BYPASS_HOSTS', 'localhost, www.example.com, *.wordpress.org');
 *
 * @link https://core.trac.wordpress.org/ticket/4011 Proxy support ticket in WordPress.
 * @link https://core.trac.wordpress.org/ticket/14636 Allow wildcard domains in WP_PROXY_BYPASS_HOSTS
 *
 * @since 2.8.0
 */
class WP_HTTP_Proxy
{
    /**
     * Whether proxy connection should be used.
     *
     * @since 2.8.0
     *
     * @use WP_PROXY_HOST
     * @use WP_PROXY_PORT
     *
     * @return bool
     */
    public function is_enabled()
    {
    }
    /**
     * Whether authentication should be used.
     *
     * @since 2.8.0
     *
     * @use WP_PROXY_USERNAME
     * @use WP_PROXY_PASSWORD
     *
     * @return bool
     */
    public function use_authentication()
    {
    }
    /**
     * Retrieve the host for the proxy server.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function host()
    {
    }
    /**
     * Retrieve the port for the proxy server.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function port()
    {
    }
    /**
     * Retrieve the username for proxy authentication.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function username()
    {
    }
    /**
     * Retrieve the password for proxy authentication.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function password()
    {
    }
    /**
     * Retrieve authentication string for proxy authentication.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function authentication()
    {
    }
    /**
     * Retrieve header string for proxy authentication.
     *
     * @since 2.8.0
     *
     * @return string
     */
    public function authentication_header()
    {
    }
    /**
     * Whether URL should be sent through the proxy server.
     *
     * We want to keep localhost and the site URL from being sent through the proxy server, because
     * some proxies can not handle this. We also have the constant available for defining other
     * hosts that won't be sent through the proxy.
     *
     * @since 2.8.0
     *
     * @staticvar array|null $bypass_hosts
     * @staticvar array      $wildcard_regex
     *
     * @param string $uri URI to check.
     * @return bool True, to send through the proxy and false if, the proxy should not be used.
     */
    public function send_through_proxy($uri)
    {
    }
}
/**
 * HTTP API: Requests hook bridge class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.7.0
 */
/**
 * Bridge to connect Requests internal hooks to WordPress actions.
 *
 * @since 4.7.0
 *
 * @see Requests_Hooks
 */
class WP_HTTP_Requests_Hooks extends \Requests_Hooks
{
    /**
     * Requested URL.
     *
     * @var string Requested URL.
     */
    protected $url;
    /**
     * WordPress WP_HTTP request data.
     *
     * @var array Request data in WP_Http format.
     */
    protected $request = array();
    /**
     * Constructor.
     *
     * @param string $url URL to request.
     * @param array $request Request data in WP_Http format.
     */
    public function __construct($url, $request)
    {
    }
    /**
     * Dispatch a Requests hook to a native WordPress action.
     *
     * @param string $hook Hook name.
     * @param array $parameters Parameters to pass to callbacks.
     * @return boolean True if hooks were run, false if nothing was hooked.
     */
    public function dispatch($hook, $parameters = array())
    {
    }
}
/**
 * HTTP API: WP_HTTP_Response class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */
/**
 * Core class used to prepare HTTP responses.
 *
 * @since 4.4.0
 */
class WP_HTTP_Response
{
    /**
     * Response data.
     *
     * @since 4.4.0
     * @var mixed
     */
    public $data;
    /**
     * Response headers.
     *
     * @since 4.4.0
     * @var array
     */
    public $headers;
    /**
     * Response status.
     *
     * @since 4.4.0
     * @var int
     */
    public $status;
    /**
     * Constructor.
     *
     * @since 4.4.0
     *
     * @param mixed $data    Response data. Default null.
     * @param int   $status  Optional. HTTP status code. Default 200.
     * @param array $headers Optional. HTTP header map. Default empty array.
     */
    public function __construct($data = \null, $status = 200, $headers = array())
    {
    }
    /**
     * Retrieves headers associated with the response.
     *
     * @since 4.4.0
     *
     * @return array Map of header name to header value.
     */
    public function get_headers()
    {
    }
    /**
     * Sets all header values.
     *
     * @since 4.4.0
     *
     * @param array $headers Map of header name to header value.
     */
    public function set_headers($headers)
    {
    }
    /**
     * Sets a single HTTP header.
     *
     * @since 4.4.0
     *
     * @param string $key     Header name.
     * @param string $value   Header value.
     * @param bool   $replace Optional. Whether to replace an existing header of the same name.
     *                        Default true.
     */
    public function header($key, $value, $replace = \true)
    {
    }
    /**
     * Retrieves the HTTP return code for the response.
     *
     * @since 4.4.0
     *
     * @return int The 3-digit HTTP status code.
     */
    public function get_status()
    {
    }
    /**
     * Sets the 3-digit HTTP status code.
     *
     * @since 4.4.0
     *
     * @param int $code HTTP status.
     */
    public function set_status($code)
    {
    }
    /**
     * Retrieves the response data.
     *
     * @since 4.4.0
     *
     * @return mixed Response data.
     */
    public function get_data()
    {
    }
    /**
     * Sets the response data.
     *
     * @since 4.4.0
     *
     * @param mixed $data Response data.
     */
    public function set_data($data)
    {
    }
    /**
     * Retrieves the response data for JSON serialization.
     *
     * It is expected that in most implementations, this will return the same as get_data(),
     * however this may be different if you want to do custom JSON data handling.
     *
     * @since 4.4.0
     *
     * @return mixed Any JSON-serializable value.
     */
    public function jsonSerialize()
    {
    }
}
/**
 * HTTP API: WP_HTTP_Requests_Response class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.6.0
 */
/**
 * Core wrapper object for a Requests_Response for standardisation.
 *
 * @since 4.6.0
 *
 * @see WP_HTTP_Response
 */
class WP_HTTP_Requests_Response extends \WP_HTTP_Response
{
    /**
     * Requests Response object.
     *
     * @since 4.6.0
     * @var Requests_Response
     */
    protected $response;
    /**
     * Filename the response was saved to.
     *
     * @since 4.6.0
     * @var string|null
     */
    protected $filename;
    /**
     * Constructor.
     *
     * @since 4.6.0
     *
     * @param Requests_Response $response HTTP response.
     * @param string            $filename Optional. File name. Default empty.
     */
    public function __construct(\Requests_Response $response, $filename = '')
    {
    }
    /**
     * Retrieves the response object for the request.
     *
     * @since 4.6.0
     *
     * @return Requests_Response HTTP response.
     */
    public function get_response_object()
    {
    }
    /**
     * Retrieves headers associated with the response.
     *
     * @since 4.6.0
     *
     * @see \Requests_Utility_CaseInsensitiveDictionary
     *
     * @return \Requests_Utility_CaseInsensitiveDictionary Map of header name to header value.
     */
    public function get_headers()
    {
    }
    /**
     * Sets all header values.
     *
     * @since 4.6.0
     *
     * @param array $headers Map of header name to header value.
     */
    public function set_headers($headers)
    {
    }
    /**
     * Sets a single HTTP header.
     *
     * @since 4.6.0
     *
     * @param string $key     Header name.
     * @param string $value   Header value.
     * @param bool   $replace Optional. Whether to replace an existing header of the same name.
     *                        Default true.
     */
    public function header($key, $value, $replace = \true)
    {
    }
    /**
     * Retrieves the HTTP return code for the response.
     *
     * @since 4.6.0
     *
     * @return int The 3-digit HTTP status code.
     */
    public function get_status()
    {
    }
    /**
     * Sets the 3-digit HTTP status code.
     *
     * @since 4.6.0
     *
     * @param int $code HTTP status.
     */
    public function set_status($code)
    {
    }
    /**
     * Retrieves the response data.
     *
     * @since 4.6.0
     *
     * @return mixed Response data.
     */
    public function get_data()
    {
    }
    /**
     * Sets the response data.
     *
     * @since 4.6.0
     *
     * @param mixed $data Response data.
     */
    public function set_data($data)
    {
    }
    /**
     * Retrieves cookies from the response.
     *
     * @since 4.6.0
     *
     * @return WP_HTTP_Cookie[] List of cookie objects.
     */
    public function get_cookies()
    {
    }
    /**
     * Converts the object to a WP_Http response array.
     *
     * @since 4.6.0
     *
     * @return array WP_Http response array, per WP_Http::request().
     */
    public function to_array()
    {
    }
}
/**
 * HTTP API: WP_Http_Streams class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */
/**
 * Core class used to integrate PHP Streams as an HTTP transport.
 *
 * @since 2.7.0
 * @since 3.7.0 Combined with the fsockopen transport and switched to `stream_socket_client()`.
 */
class WP_Http_Streams
{
    /**
     * Send a HTTP request to a URI using PHP Streams.
     *
     * @see WP_Http::request For default options descriptions.
     *
     * @since 2.7.0
     * @since 3.7.0 Combined with the fsockopen transport and switched to stream_socket_client().
     *
     * @param string $url The request URL.
     * @param string|array $args Optional. Override the defaults.
     * @return array|WP_Error Array containing 'headers', 'body', 'response', 'cookies', 'filename'. A WP_Error instance upon error
     */
    public function request($url, $args = array())
    {
    }
    /**
     * Verifies the received SSL certificate against its Common Names and subjectAltName fields.
     *
     * PHP's SSL verifications only verify that it's a valid Certificate, it doesn't verify if
     * the certificate is valid for the hostname which was requested.
     * This function verifies the requested hostname against certificate's subjectAltName field,
     * if that is empty, or contains no DNS entries, a fallback to the Common Name field is used.
     *
     * IP Address support is included if the request is being made to an IP address.
     *
     * @since 3.7.0
     * @static
     *
     * @param stream $stream The PHP Stream which the SSL request is being made over
     * @param string $host The hostname being requested
     * @return bool If the cerficiate presented in $stream is valid for $host
     */
    public static function verify_ssl_certificate($stream, $host)
    {
    }
    /**
     * Determines whether this class can be used for retrieving a URL.
     *
     * @static
     * @since 2.7.0
     * @since 3.7.0 Combined with the fsockopen transport and switched to stream_socket_client().
     *
     * @param array $args Optional. Array of request arguments. Default empty array.
     * @return bool False means this class can not be used, true means it can.
     */
    public static function test($args = array())
    {
    }
}
/**
 * Deprecated HTTP Transport method which used fsockopen.
 *
 * This class is not used, and is included for backward compatibility only.
 * All code should make use of WP_Http directly through its API.
 *
 * @see WP_HTTP::request
 *
 * @since 2.7.0
 * @deprecated 3.7.0 Please use WP_HTTP::request() directly
 */
class WP_HTTP_Fsockopen extends \WP_HTTP_Streams
{
}
/**
 * Base WordPress Image Editor
 *
 * @package WordPress
 * @subpackage Image_Editor
 */
/**
 * Base image editor class from which implementations extend
 *
 * @since 3.5.0
 */
abstract class WP_Image_Editor
{
    protected $file = \null;
    protected $size = \null;
    protected $mime_type = \null;
    protected $default_mime_type = 'image/jpeg';
    protected $quality = \false;
    protected $default_quality = 82;
    /**
     * Each instance handles a single file.
     *
     * @param string $file Path to the file to load.
     */
    public function __construct($file)
    {
    }
    /**
     * Checks to see if current environment supports the editor chosen.
     * Must be overridden in a sub-class.
     *
     * @since 3.5.0
     *
     * @static
     * @abstract
     *
     * @param array $args
     * @return bool
     */
    public static function test($args = array())
    {
    }
    /**
     * Checks to see if editor supports the mime-type specified.
     * Must be overridden in a sub-class.
     *
     * @since 3.5.0
     *
     * @static
     * @abstract
     *
     * @param string $mime_type
     * @return bool
     */
    public static function supports_mime_type($mime_type)
    {
    }
    /**
     * Loads image from $this->file into editor.
     *
     * @since 3.5.0
     * @abstract
     *
     * @return bool|WP_Error True if loaded; WP_Error on failure.
     */
    public abstract function load();
    /**
     * Saves current image to file.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param string $destfilename
     * @param string $mime_type
     * @return array|WP_Error {'path'=>string, 'file'=>string, 'width'=>int, 'height'=>int, 'mime-type'=>string}
     */
    public abstract function save($destfilename = \null, $mime_type = \null);
    /**
     * Resizes current image.
     *
     * At minimum, either a height or width must be provided.
     * If one of the two is set to null, the resize will
     * maintain aspect ratio according to the provided dimension.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param  int|null $max_w Image width.
     * @param  int|null $max_h Image height.
     * @param  bool     $crop
     * @return bool|WP_Error
     */
    public abstract function resize($max_w, $max_h, $crop = \false);
    /**
     * Resize multiple images from a single source.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param array $sizes {
     *     An array of image size arrays. Default sizes are 'small', 'medium', 'large'.
     *
     *     @type array $size {
     *         @type int  $width  Image width.
     *         @type int  $height Image height.
     *         @type bool $crop   Optional. Whether to crop the image. Default false.
     *     }
     * }
     * @return array An array of resized images metadata by size.
     */
    public abstract function multi_resize($sizes);
    /**
     * Crops Image.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param int $src_x The start x position to crop from.
     * @param int $src_y The start y position to crop from.
     * @param int $src_w The width to crop.
     * @param int $src_h The height to crop.
     * @param int $dst_w Optional. The destination width.
     * @param int $dst_h Optional. The destination height.
     * @param bool $src_abs Optional. If the source crop points are absolute.
     * @return bool|WP_Error
     */
    public abstract function crop($src_x, $src_y, $src_w, $src_h, $dst_w = \null, $dst_h = \null, $src_abs = \false);
    /**
     * Rotates current image counter-clockwise by $angle.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param float $angle
     * @return bool|WP_Error
     */
    public abstract function rotate($angle);
    /**
     * Flips current image.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param bool $horz Flip along Horizontal Axis
     * @param bool $vert Flip along Vertical Axis
     * @return bool|WP_Error
     */
    public abstract function flip($horz, $vert);
    /**
     * Streams current image to browser.
     *
     * @since 3.5.0
     * @abstract
     *
     * @param string $mime_type The mime type of the image.
     * @return bool|WP_Error True on success, WP_Error object or false on failure.
     */
    public abstract function stream($mime_type = \null);
    /**
     * Gets dimensions of image.
     *
     * @since 3.5.0
     *
     * @return array {'width'=>int, 'height'=>int}
     */
    public function get_size()
    {
    }
    /**
     * Sets current image size.
     *
     * @since 3.5.0
     *
     * @param int $width
     * @param int $height
     * @return true
     */
    protected function update_size($width = \null, $height = \null)
    {
    }
    /**
     * Gets the Image Compression quality on a 1-100% scale.
     *
     * @since 4.0.0
     *
     * @return int $quality Compression Quality. Range: [1,100]
     */
    public function get_quality()
    {
    }
    /**
     * Sets Image Compression quality on a 1-100% scale.
     *
     * @since 3.5.0
     *
     * @param int $quality Compression Quality. Range: [1,100]
     * @return true|WP_Error True if set successfully; WP_Error on failure.
     */
    public function set_quality($quality = \null)
    {
    }
    /**
     * Returns preferred mime-type and extension based on provided
     * file's extension and mime, or current file's extension and mime.
     *
     * Will default to $this->default_mime_type if requested is not supported.
     *
     * Provides corrected filename only if filename is provided.
     *
     * @since 3.5.0
     *
     * @param string $filename
     * @param string $mime_type
     * @return array { filename|null, extension, mime-type }
     */
    protected function get_output_format($filename = \null, $mime_type = \null)
    {
    }
    /**
     * Builds an output filename based on current file, and adding proper suffix
     *
     * @since 3.5.0
     *
     * @param string $suffix
     * @param string $dest_path
     * @param string $extension
     * @return string filename
     */
    public function generate_filename($suffix = \null, $dest_path = \null, $extension = \null)
    {
    }
    /**
     * Builds and returns proper suffix for file based on height and width.
     *
     * @since 3.5.0
     *
     * @return false|string suffix
     */
    public function get_suffix()
    {
    }
    /**
     * Either calls editor's save function or handles file as a stream.
     *
     * @since 3.5.0
     *
     * @param string|stream $filename
     * @param callable $function
     * @param array $arguments
     * @return bool
     */
    protected function make_image($filename, $function, $arguments)
    {
    }
    /**
     * Returns first matched mime-type from extension,
     * as mapped from wp_get_mime_types()
     *
     * @since 3.5.0
     *
     * @static
     *
     * @param string $extension
     * @return string|false
     */
    protected static function get_mime_type($extension = \null)
    {
    }
    /**
     * Returns first matched extension from Mime-type,
     * as mapped from wp_get_mime_types()
     *
     * @since 3.5.0
     *
     * @static
     *
     * @param string $mime_type
     * @return string|false
     */
    protected static function get_extension($mime_type = \null)
    {
    }
}
/**
 * WordPress GD Image Editor
 *
 * @package WordPress
 * @subpackage Image_Editor
 */
/**
 * WordPress Image Editor Class for Image Manipulation through GD
 *
 * @since 3.5.0
 *
 * @see WP_Image_Editor
 */
class WP_Image_Editor_GD extends \WP_Image_Editor
{
    /**
     * GD Resource.
     *
     * @var resource
     */
    protected $image;
    public function __destruct()
    {
    }
    /**
     * Checks to see if current environment supports GD.
     *
     * @since 3.5.0
     *
     * @static
     *
     * @param array $args
     * @return bool
     */
    public static function test($args = array())
    {
    }
    /**
     * Checks to see if editor supports the mime-type specified.
     *
     * @since 3.5.0
     *
     * @static
     *
     * @param string $mime_type
     * @return bool
     */
    public static function supports_mime_type($mime_type)
    {
    }
    /**
     * Loads image from $this->file into new GD Resource.
     *
     * @since 3.5.0
     *
     * @return bool|WP_Error True if loaded successfully; WP_Error on failure.
     */
    public function load()
    {
    }
    /**
     * Sets or updates current image size.
     *
     * @since 3.5.0
     *
     * @param int $width
     * @param int $height
     * @return true
     */
    protected function update_size($width = \false, $height = \false)
    {
    }
    /**
     * Resizes current image.
     * Wraps _resize, since _resize returns a GD Resource.
     *
     * At minimum, either a height or width must be provided.
     * If one of the two is set to null, the resize will
     * maintain aspect ratio according to the provided dimension.
     *
     * @since 3.5.0
     *
     * @param  int|null $max_w Image width.
     * @param  int|null $max_h Image height.
     * @param  bool     $crop
     * @return true|WP_Error
     */
    public function resize($max_w, $max_h, $crop = \false)
    {
    }
    /**
     *
     * @param int $max_w
     * @param int $max_h
     * @param bool|array $crop
     * @return resource|WP_Error
     */
    protected function _resize($max_w, $max_h, $crop = \false)
    {
    }
    /**
     * Resize multiple images from a single source.
     *
     * @since 3.5.0
     *
     * @param array $sizes {
     *     An array of image size arrays. Default sizes are 'small', 'medium', 'medium_large', 'large'.
     *
     *     Either a height or width must be provided.
     *     If one of the two is set to null, the resize will
     *     maintain aspect ratio according to the provided dimension.
     *
     *     @type array $size {
     *         Array of height, width values, and whether to crop.
     *
     *         @type int  $width  Image width. Optional if `$height` is specified.
     *         @type int  $height Image height. Optional if `$width` is specified.
     *         @type bool $crop   Optional. Whether to crop the image. Default false.
     *     }
     * }
     * @return array An array of resized images' metadata by size.
     */
    public function multi_resize($sizes)
    {
    }
    /**
     * Crops Image.
     *
     * @since 3.5.0
     *
     * @param int  $src_x   The start x position to crop from.
     * @param int  $src_y   The start y position to crop from.
     * @param int  $src_w   The width to crop.
     * @param int  $src_h   The height to crop.
     * @param int  $dst_w   Optional. The destination width.
     * @param int  $dst_h   Optional. The destination height.
     * @param bool $src_abs Optional. If the source crop points are absolute.
     * @return bool|WP_Error
     */
    public function crop($src_x, $src_y, $src_w, $src_h, $dst_w = \null, $dst_h = \null, $src_abs = \false)
    {
    }
    /**
     * Rotates current image counter-clockwise by $angle.
     * Ported from image-edit.php
     *
     * @since 3.5.0
     *
     * @param float $angle
     * @return true|WP_Error
     */
    public function rotate($angle)
    {
    }
    /**
     * Flips current image.
     *
     * @since 3.5.0
     *
     * @param bool $horz Flip along Horizontal Axis
     * @param bool $vert Flip along Vertical Axis
     * @return true|WP_Error
     */
    public function flip($horz, $vert)
    {
    }
    /**
     * Saves current in-memory image to file.
     *
     * @since 3.5.0
     *
     * @param string|null $filename
     * @param string|null $mime_type
     * @return array|WP_Error {'path'=>string, 'file'=>string, 'width'=>int, 'height'=>int, 'mime-type'=>string}
     */
    public function save($filename = \null, $mime_type = \null)
    {
    }
    /**
     * @param resource $image
     * @param string|null $filename
     * @param string|null $mime_type
     * @return WP_Error|array
     */
    protected function _save($image, $filename = \null, $mime_type = \null)
    {
    }
    /**
     * Returns stream of current image.
     *
     * @since 3.5.0
     *
     * @param string $mime_type The mime type of the image.
     * @return bool True on success, false on failure.
     */
    public function stream($mime_type = \null)
    {
    }
    /**
     * Either calls editor's save function or handles file as a stream.
     *
     * @since 3.5.0
     *
     * @param string|stream $filename
     * @param callable $function
     * @param array $arguments
     * @return bool
     */
    protected function make_image($filename, $function, $arguments)
    {
    }
}
/**
 * WordPress Imagick Image Editor
 *
 * @package WordPress
 * @subpackage Image_Editor
 */
/**
 * WordPress Image Editor Class for Image Manipulation through Imagick PHP Module
 *
 * @since 3.5.0
 *
 * @see WP_Image_Editor
 */
class WP_Image_Editor_Imagick extends \WP_Image_Editor
{
    /**
     * Imagick object.
     *
     * @var Imagick
     */
    protected $image;
    public function __destruct()
    {
    }
    /**
     * Checks to see if current environment supports Imagick.
     *
     * We require Imagick 2.2.0 or greater, based on whether the queryFormats()
     * method can be called statically.
     *
     * @since 3.5.0
     *
     * @static
     *
     * @param array $args
     * @return bool
     */
    public static function test($args = array())
    {
    }
    /**
     * Checks to see if editor supports the mime-type specified.
     *
     * @since 3.5.0
     *
     * @static
     *
     * @param string $mime_type
     * @return bool
     */
    public static function supports_mime_type($mime_type)
    {
    }
    /**
     * Loads image from $this->file into new Imagick Object.
     *
     * @since 3.5.0
     *
     * @return true|WP_Error True if loaded; WP_Error on failure.
     */
    public function load()
    {
    }
    /**
     * Sets Image Compression quality on a 1-100% scale.
     *
     * @since 3.5.0
     *
     * @param int $quality Compression Quality. Range: [1,100]
     * @return true|WP_Error True if set successfully; WP_Error on failure.
     */
    public function set_quality($quality = \null)
    {
    }
    /**
     * Sets or updates current image size.
     *
     * @since 3.5.0
     *
     * @param int $width
     * @param int $height
     *
     * @return true|WP_Error
     */
    protected function update_size($width = \null, $height = \null)
    {
    }
    /**
     * Resizes current image.
     *
     * At minimum, either a height or width must be provided.
     * If one of the two is set to null, the resize will
     * maintain aspect ratio according to the provided dimension.
     *
     * @since 3.5.0
     *
     * @param  int|null $max_w Image width.
     * @param  int|null $max_h Image height.
     * @param  bool     $crop
     * @return bool|WP_Error
     */
    public function resize($max_w, $max_h, $crop = \false)
    {
    }
    /**
     * Efficiently resize the current image
     *
     * This is a WordPress specific implementation of Imagick::thumbnailImage(),
     * which resizes an image to given dimensions and removes any associated profiles.
     *
     * @since 4.5.0
     *
     * @param int    $dst_w       The destination width.
     * @param int    $dst_h       The destination height.
     * @param string $filter_name Optional. The Imagick filter to use when resizing. Default 'FILTER_TRIANGLE'.
     * @param bool   $strip_meta  Optional. Strip all profiles, excluding color profiles, from the image. Default true.
     * @return bool|WP_Error
     */
    protected function thumbnail_image($dst_w, $dst_h, $filter_name = 'FILTER_TRIANGLE', $strip_meta = \true)
    {
    }
    /**
     * Resize multiple images from a single source.
     *
     * @since 3.5.0
     *
     * @param array $sizes {
     *     An array of image size arrays. Default sizes are 'small', 'medium', 'medium_large', 'large'.
     *
     *     Either a height or width must be provided.
     *     If one of the two is set to null, the resize will
     *     maintain aspect ratio according to the provided dimension.
     *
     *     @type array $size {
     *         Array of height, width values, and whether to crop.
     *
     *         @type int  $width  Image width. Optional if `$height` is specified.
     *         @type int  $height Image height. Optional if `$width` is specified.
     *         @type bool $crop   Optional. Whether to crop the image. Default false.
     *     }
     * }
     * @return array An array of resized images' metadata by size.
     */
    public function multi_resize($sizes)
    {
    }
    /**
     * Crops Image.
     *
     * @since 3.5.0
     *
     * @param int  $src_x The start x position to crop from.
     * @param int  $src_y The start y position to crop from.
     * @param int  $src_w The width to crop.
     * @param int  $src_h The height to crop.
     * @param int  $dst_w Optional. The destination width.
     * @param int  $dst_h Optional. The destination height.
     * @param bool $src_abs Optional. If the source crop points are absolute.
     * @return bool|WP_Error
     */
    public function crop($src_x, $src_y, $src_w, $src_h, $dst_w = \null, $dst_h = \null, $src_abs = \false)
    {
    }
    /**
     * Rotates current image counter-clockwise by $angle.
     *
     * @since 3.5.0
     *
     * @param float $angle
     * @return true|WP_Error
     */
    public function rotate($angle)
    {
    }
    /**
     * Flips current image.
     *
     * @since 3.5.0
     *
     * @param bool $horz Flip along Horizontal Axis
     * @param bool $vert Flip along Vertical Axis
     * @return true|WP_Error
     */
    public function flip($horz, $vert)
    {
    }
    /**
     * Saves current image to file.
     *
     * @since 3.5.0
     *
     * @param string $destfilename
     * @param string $mime_type
     * @return array|WP_Error {'path'=>string, 'file'=>string, 'width'=>int, 'height'=>int, 'mime-type'=>string}
     */
    public function save($destfilename = \null, $mime_type = \null)
    {
    }
    /**
     *
     * @param Imagick $image
     * @param string $filename
     * @param string $mime_type
     * @return array|WP_Error
     */
    protected function _save($image, $filename = \null, $mime_type = \null)
    {
    }
    /**
     * Streams current image to browser.
     *
     * @since 3.5.0
     *
     * @param string $mime_type The mime type of the image.
     * @return bool|WP_Error True on success, WP_Error object on failure.
     */
    public function stream($mime_type = \null)
    {
    }
    /**
     * Strips all image meta except color profiles from an image.
     *
     * @since 4.5.0
     *
     * @return true|WP_Error True if stripping metadata was successful. WP_Error object on error.
     */
    protected function strip_meta()
    {
    }
    /**
     * Sets up Imagick for PDF processing.
     * Increases rendering DPI and only loads first page.
     *
     * @since 4.7.0
     *
     * @return string|WP_Error File to load or WP_Error on failure.
     */
    protected function pdf_setup()
    {
    }
}
/**
 * WordPress List utility class
 *
 * @package WordPress
 * @since 4.7.0
 */
/**
 * List utility.
 *
 * Utility class to handle operations on an array of objects.
 *
 * @since 4.7.0
 */
class WP_List_Util
{
    /**
     * The input array.
     *
     * @since 4.7.0
     * @var array
     */
    private $input = array();
    /**
     * The output array.
     *
     * @since 4.7.0
     * @var array
     */
    private $output = array();
    /**
     * Temporary arguments for sorting.
     *
     * @since 4.7.0
     * @var array
     */
    private $orderby = array();
    /**
     * Constructor.
     *
     * Sets the input array.
     *
     * @since 4.7.0
     *
     * @param array $input Array to perform operations on.
     */
    public function __construct($input)
    {
    }
    /**
     * Returns the original input array.
     *
     * @since 4.7.0
     *
     * @return array The input array.
     */
    public function get_input()
    {
    }
    /**
     * Returns the output array.
     *
     * @since 4.7.0
     *
     * @return array The output array.
     */
    public function get_output()
    {
    }
    /**
     * Filters the list, based on a set of key => value arguments.
     *
     * @since 4.7.0
     *
     * @param array  $args     Optional. An array of key => value arguments to match
     *                         against each object. Default empty array.
     * @param string $operator Optional. The logical operation to perform. 'AND' means
     *                         all elements from the array must match. 'OR' means only
     *                         one element needs to match. 'NOT' means no elements may
     *                         match. Default 'AND'.
     * @return array Array of found values.
     */
    public function filter($args = array(), $operator = 'AND')
    {
    }
    /**
     * Plucks a certain field out of each object in the list.
     *
     * This has the same functionality and prototype of
     * array_column() (PHP 5.5) but also supports objects.
     *
     * @since 4.7.0
     *
     * @param int|string $field     Field from the object to place instead of the entire object
     * @param int|string $index_key Optional. Field from the object to use as keys for the new array.
     *                              Default null.
     * @return array Array of found values. If `$index_key` is set, an array of found values with keys
     *               corresponding to `$index_key`. If `$index_key` is null, array keys from the original
     *               `$list` will be preserved in the results.
     */
    public function pluck($field, $index_key = \null)
    {
    }
    /**
     * Sorts the list, based on one or more orderby arguments.
     *
     * @since 4.7.0
     *
     * @param string|array $orderby       Optional. Either the field name to order by or an array
     *                                    of multiple orderby fields as $orderby => $order.
     * @param string       $order         Optional. Either 'ASC' or 'DESC'. Only used if $orderby
     *                                    is a string.
     * @param bool         $preserve_keys Optional. Whether to preserve keys. Default false.
     * @return array The sorted array.
     */
    public function sort($orderby = array(), $order = 'ASC', $preserve_keys = \false)
    {
    }
    /**
     * Callback to sort the list by specific fields.
     *
     * @since 4.7.0
     *
     * @see WP_List_Util::sort()
     *
     * @param object|array $a One object to compare.
     * @param object|array $b The other object to compare.
     * @return int 0 if both objects equal. -1 if second object should come first, 1 otherwise.
     */
    private function sort_callback($a, $b)
    {
    }
}
/**
 * Locale API: WP_Locale_Switcher class
 *
 * @package WordPress
 * @subpackage i18n
 * @since 4.7.0
 */
/**
 * Core class used for switching locales.
 *
 * @since 4.7.0
 */
class WP_Locale_Switcher
{
    /**
     * Locale stack.
     *
     * @since 4.7.0
     * @var string[]
     */
    private $locales = array();
    /**
     * Original locale.
     *
     * @since 4.7.0
     * @var string
     */
    private $original_locale;
    /**
     * Holds all available languages.
     *
     * @since 4.7.0
     * @var array An array of language codes (file names without the .mo extension).
     */
    private $available_languages = array();
    /**
     * Constructor.
     *
     * Stores the original locale as well as a list of all available languages.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Initializes the locale switcher.
     *
     * Hooks into the {@see 'locale'} filter to change the locale on the fly.
     */
    public function init()
    {
    }
    /**
     * Switches the translations according to the given locale.
     *
     * @since 4.7.0
     *
     * @param string $locale The locale to switch to.
     * @return bool True on success, false on failure.
     */
    public function switch_to_locale($locale)
    {
    }
    /**
     * Restores the translations according to the previous locale.
     *
     * @since 4.7.0
     *
     * @return string|false Locale on success, false on failure.
     */
    public function restore_previous_locale()
    {
    }
    /**
     * Restores the translations according to the original locale.
     *
     * @since 4.7.0
     *
     * @return string|false Locale on success, false on failure.
     */
    public function restore_current_locale()
    {
    }
    /**
     * Whether switch_to_locale() is in effect.
     *
     * @since 4.7.0
     *
     * @return bool True if the locale has been switched, false otherwise.
     */
    public function is_switched()
    {
    }
    /**
     * Filters the locale of the WordPress installation.
     *
     * @since 4.7.0
     *
     * @param string $locale The locale of the WordPress installation.
     * @return string The locale currently being switched to.
     */
    public function filter_locale($locale)
    {
    }
    /**
     * Load translations for a given locale.
     *
     * When switching to a locale, translations for this locale must be loaded from scratch.
     *
     * @since 4.7.0
     *
     * @global Mo[] $l10n An array of all currently loaded text domains.
     *
     * @param string $locale The locale to load translations for.
     */
    private function load_translations($locale)
    {
    }
    /**
     * Changes the site's locale to the given one.
     *
     * Loads the translations, changes the global `$wp_locale` object and updates
     * all post type labels.
     *
     * @since 4.7.0
     *
     * @global WP_Locale $wp_locale The WordPress date and time locale object.
     *
     * @param string $locale The locale to change to.
     */
    private function change_locale($locale)
    {
    }
}
/**
 * Locale API: WP_Locale class
 *
 * @package WordPress
 * @subpackage i18n
 * @since 4.6.0
 */
/**
 * Core class used to store translated data for a locale.
 *
 * @since 2.1.0
 * @since 4.6.0 Moved to its own file from wp-includes/locale.php.
 */
class WP_Locale
{
    /**
     * Stores the translated strings for the full weekday names.
     *
     * @since 2.1.0
     * @var array
     */
    public $weekday;
    /**
     * Stores the translated strings for the one character weekday names.
     *
     * There is a hack to make sure that Tuesday and Thursday, as well
     * as Sunday and Saturday, don't conflict. See init() method for more.
     *
     * @see WP_Locale::init() for how to handle the hack.
     *
     * @since 2.1.0
     * @var array
     */
    public $weekday_initial;
    /**
     * Stores the translated strings for the abbreviated weekday names.
     *
     * @since 2.1.0
     * @var array
     */
    public $weekday_abbrev;
    /**
     * Stores the default start of the week.
     *
     * @since 4.4.0
     * @var string
     */
    public $start_of_week;
    /**
     * Stores the translated strings for the full month names.
     *
     * @since 2.1.0
     * @var array
     */
    public $month;
    /**
     * Stores the translated strings for the month names in genitive case, if the locale specifies.
     *
     * @since 4.4.0
     * @var array
     */
    public $month_genitive;
    /**
     * Stores the translated strings for the abbreviated month names.
     *
     * @since 2.1.0
     * @var array
     */
    public $month_abbrev;
    /**
     * Stores the translated strings for 'am' and 'pm'.
     *
     * Also the capitalized versions.
     *
     * @since 2.1.0
     * @var array
     */
    public $meridiem;
    /**
     * The text direction of the locale language.
     *
     * Default is left to right 'ltr'.
     *
     * @since 2.1.0
     * @var string
     */
    public $text_direction = 'ltr';
    /**
     * The thousands separator and decimal point values used for localizing numbers.
     *
     * @since 2.3.0
     * @var array
     */
    public $number_format;
    /**
     * Constructor which calls helper methods to set up object variables.
     *
     * @since 2.1.0
     */
    public function __construct()
    {
    }
    /**
     * Sets up the translated strings and object properties.
     *
     * The method creates the translatable strings for various
     * calendar elements. Which allows for specifying locale
     * specific calendar names and text direction.
     *
     * @since 2.1.0
     *
     * @global string $text_direction
     */
    public function init()
    {
    }
    /**
     * Outputs an admin notice if the /build directory must be used for RTL.
     *
     * @since 3.8.0
     */
    public function rtl_src_admin_notice()
    {
    }
    /**
     * Retrieve the full translated weekday word.
     *
     * Week starts on translated Sunday and can be fetched
     * by using 0 (zero). So the week starts with 0 (zero)
     * and ends on Saturday with is fetched by using 6 (six).
     *
     * @since 2.1.0
     *
     * @param int $weekday_number 0 for Sunday through 6 Saturday
     * @return string Full translated weekday
     */
    public function get_weekday($weekday_number)
    {
    }
    /**
     * Retrieve the translated weekday initial.
     *
     * The weekday initial is retrieved by the translated
     * full weekday word. When translating the weekday initial
     * pay attention to make sure that the starting letter does
     * not conflict.
     *
     * @since 2.1.0
     *
     * @param string $weekday_name
     * @return string
     */
    public function get_weekday_initial($weekday_name)
    {
    }
    /**
     * Retrieve the translated weekday abbreviation.
     *
     * The weekday abbreviation is retrieved by the translated
     * full weekday word.
     *
     * @since 2.1.0
     *
     * @param string $weekday_name Full translated weekday word
     * @return string Translated weekday abbreviation
     */
    public function get_weekday_abbrev($weekday_name)
    {
    }
    /**
     * Retrieve the full translated month by month number.
     *
     * The $month_number parameter has to be a string
     * because it must have the '0' in front of any number
     * that is less than 10. Starts from '01' and ends at
     * '12'.
     *
     * You can use an integer instead and it will add the
     * '0' before the numbers less than 10 for you.
     *
     * @since 2.1.0
     *
     * @param string|int $month_number '01' through '12'
     * @return string Translated full month name
     */
    public function get_month($month_number)
    {
    }
    /**
     * Retrieve translated version of month abbreviation string.
     *
     * The $month_name parameter is expected to be the translated or
     * translatable version of the month.
     *
     * @since 2.1.0
     *
     * @param string $month_name Translated month to get abbreviated version
     * @return string Translated abbreviated month
     */
    public function get_month_abbrev($month_name)
    {
    }
    /**
     * Retrieve translated version of meridiem string.
     *
     * The $meridiem parameter is expected to not be translated.
     *
     * @since 2.1.0
     *
     * @param string $meridiem Either 'am', 'pm', 'AM', or 'PM'. Not translated version.
     * @return string Translated version
     */
    public function get_meridiem($meridiem)
    {
    }
    /**
     * Global variables are deprecated.
     *
     * For backward compatibility only.
     *
     * @deprecated For backward compatibility only.
     *
     * @global array $weekday
     * @global array $weekday_initial
     * @global array $weekday_abbrev
     * @global array $month
     * @global array $month_abbrev
     *
     * @since 2.1.0
     */
    public function register_globals()
    {
    }
    /**
     * Checks if current locale is RTL.
     *
     * @since 3.0.0
     * @return bool Whether locale is RTL.
     */
    public function is_rtl()
    {
    }
    /**
     * Register date/time format strings for general POT.
     *
     * Private, unused method to add some date/time formats translated
     * on wp-admin/options-general.php to the general POT that would
     * otherwise be added to the admin POT.
     *
     * @since 3.6.0
     */
    public function _strings_for_pot()
    {
    }
}
/**
 * WP_MatchesMapRegex helper class
 *
 * @package WordPress
 * @since 4.7.0
 */
/**
 * Helper class to remove the need to use eval to replace $matches[] in query strings.
 *
 * @since 2.9.0
 */
class WP_MatchesMapRegex
{
    /**
     * store for matches
     *
     * @var array
     */
    private $_matches;
    /**
     * store for mapping result
     *
     * @var string
     */
    public $output;
    /**
     * subject to perform mapping on (query string containing $matches[] references
     *
     * @var string
     */
    private $_subject;
    /**
     * regexp pattern to match $matches[] references
     *
     * @var string
     */
    public $_pattern = '(\\$matches\\[[1-9]+[0-9]*\\])';
    // magic number
    /**
     * constructor
     *
     * @param string $subject subject if regex
     * @param array  $matches data to use in map
     */
    public function __construct($subject, $matches)
    {
    }
    /**
     * Substitute substring matches in subject.
     *
     * static helper function to ease use
     *
     * @static
     *
     * @param string $subject subject
     * @param array  $matches data used for substitution
     * @return string
     */
    public static function apply($subject, $matches)
    {
    }
    /**
     * do the actual mapping
     *
     * @return string
     */
    private function _map()
    {
    }
    /**
     * preg_replace_callback hook
     *
     * @param  array $matches preg_replace regexp matches
     * @return string
     */
    public function callback($matches)
    {
    }
}
/**
 * Meta API: WP_Meta_Query class
 *
 * @package WordPress
 * @subpackage Meta
 * @since 4.4.0
 */
/**
 * Core class used to implement meta queries for the Meta API.
 *
 * Used for generating SQL clauses that filter a primary query according to metadata keys and values.
 *
 * WP_Meta_Query is a helper that allows primary query classes, such as WP_Query and WP_User_Query,
 *
 * to filter their results by object metadata, by generating `JOIN` and `WHERE` subclauses to be attached
 * to the primary SQL query string.
 *
 * @since 3.2.0
 */
class WP_Meta_Query
{
    /**
     * Array of metadata queries.
     *
     * See WP_Meta_Query::__construct() for information on meta query arguments.
     *
     * @since 3.2.0
     * @var array
     */
    public $queries = array();
    /**
     * The relation between the queries. Can be one of 'AND' or 'OR'.
     *
     * @since 3.2.0
     * @var string
     */
    public $relation;
    /**
     * Database table to query for the metadata.
     *
     * @since 4.1.0
     * @var string
     */
    public $meta_table;
    /**
     * Column in meta_table that represents the ID of the object the metadata belongs to.
     *
     * @since 4.1.0
     * @var string
     */
    public $meta_id_column;
    /**
     * Database table that where the metadata's objects are stored (eg $wpdb->users).
     *
     * @since 4.1.0
     * @var string
     */
    public $primary_table;
    /**
     * Column in primary_table that represents the ID of the object.
     *
     * @since 4.1.0
     * @var string
     */
    public $primary_id_column;
    /**
     * A flat list of table aliases used in JOIN clauses.
     *
     * @since 4.1.0
     * @var array
     */
    protected $table_aliases = array();
    /**
     * A flat list of clauses, keyed by clause 'name'.
     *
     * @since 4.2.0
     * @var array
     */
    protected $clauses = array();
    /**
     * Whether the query contains any OR relations.
     *
     * @since 4.3.0
     * @var bool
     */
    protected $has_or_relation = \false;
    /**
     * Constructor.
     *
     * @since 3.2.0
     * @since 4.2.0 Introduced support for naming query clauses by associative array keys.
     *
     *
     * @param array $meta_query {
     *     Array of meta query clauses. When first-order clauses or sub-clauses use strings as
     *     their array keys, they may be referenced in the 'orderby' parameter of the parent query.
     *
     *     @type string $relation Optional. The MySQL keyword used to join
     *                            the clauses of the query. Accepts 'AND', or 'OR'. Default 'AND'.
     *     @type array {
     *         Optional. An array of first-order clause parameters, or another fully-formed meta query.
     *
     *         @type string $key     Meta key to filter by.
     *         @type string $value   Meta value to filter by.
     *         @type string $compare MySQL operator used for comparing the $value. Accepts '=',
     *                               '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE',
     *                               'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'REGEXP',
     *                               'NOT REGEXP', 'RLIKE', 'EXISTS' or 'NOT EXISTS'.
     *                               Default is 'IN' when `$value` is an array, '=' otherwise.
     *         @type string $type    MySQL data type that the meta_value column will be CAST to for
     *                               comparisons. Accepts 'NUMERIC', 'BINARY', 'CHAR', 'DATE',
     *                               'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', or 'UNSIGNED'.
     *                               Default is 'CHAR'.
     *     }
     * }
     */
    public function __construct($meta_query = \false)
    {
    }
    /**
     * Ensure the 'meta_query' argument passed to the class constructor is well-formed.
     *
     * Eliminates empty items and ensures that a 'relation' is set.
     *
     * @since 4.1.0
     *
     * @param array $queries Array of query clauses.
     * @return array Sanitized array of query clauses.
     */
    public function sanitize_query($queries)
    {
    }
    /**
     * Determine whether a query clause is first-order.
     *
     * A first-order meta query clause is one that has either a 'key' or
     * a 'value' array key.
     *
     * @since 4.1.0
     *
     * @param array $query Meta query arguments.
     * @return bool Whether the query clause is a first-order clause.
     */
    protected function is_first_order_clause($query)
    {
    }
    /**
     * Constructs a meta query based on 'meta_*' query vars
     *
     * @since 3.2.0
     *
     * @param array $qv The query variables
     */
    public function parse_query_vars($qv)
    {
    }
    /**
     * Return the appropriate alias for the given meta type if applicable.
     *
     * @since 3.7.0
     *
     * @param string $type MySQL type to cast meta_value.
     * @return string MySQL type.
     */
    public function get_cast_for_type($type = '')
    {
    }
    /**
     * Generates SQL clauses to be appended to a main query.
     *
     * @since 3.2.0
     *
     * @param string $type              Type of meta, eg 'user', 'post'.
     * @param string $primary_table     Database table where the object being filtered is stored (eg wp_users).
     * @param string $primary_id_column ID column for the filtered object in $primary_table.
     * @param object $context           Optional. The main query object.
     * @return false|array {
     *     Array containing JOIN and WHERE SQL clauses to append to the main query.
     *
     *     @type string $join  SQL fragment to append to the main JOIN clause.
     *     @type string $where SQL fragment to append to the main WHERE clause.
     * }
     */
    public function get_sql($type, $primary_table, $primary_id_column, $context = \null)
    {
    }
    /**
     * Generate SQL clauses to be appended to a main query.
     *
     * Called by the public WP_Meta_Query::get_sql(), this method is abstracted
     * out to maintain parity with the other Query classes.
     *
     * @since 4.1.0
     *
     * @return array {
     *     Array containing JOIN and WHERE SQL clauses to append to the main query.
     *
     *     @type string $join  SQL fragment to append to the main JOIN clause.
     *     @type string $where SQL fragment to append to the main WHERE clause.
     * }
     */
    protected function get_sql_clauses()
    {
    }
    /**
     * Generate SQL clauses for a single query array.
     *
     * If nested subqueries are found, this method recurses the tree to
     * produce the properly nested SQL.
     *
     * @since 4.1.0
     *
     * @param array $query Query to parse (passed by reference).
     * @param int   $depth Optional. Number of tree levels deep we currently are.
     *                     Used to calculate indentation. Default 0.
     * @return array {
     *     Array containing JOIN and WHERE SQL clauses to append to a single query array.
     *
     *     @type string $join  SQL fragment to append to the main JOIN clause.
     *     @type string $where SQL fragment to append to the main WHERE clause.
     * }
     */
    protected function get_sql_for_query(&$query, $depth = 0)
    {
    }
    /**
     * Generate SQL JOIN and WHERE clauses for a first-order query clause.
     *
     * "First-order" means that it's an array with a 'key' or 'value'.
     *
     * @since 4.1.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param array  $clause       Query clause (passed by reference).
     * @param array  $parent_query Parent query array.
     * @param string $clause_key   Optional. The array key used to name the clause in the original `$meta_query`
     *                             parameters. If not provided, a key will be generated automatically.
     * @return array {
     *     Array containing JOIN and WHERE SQL clauses to append to a first-order query.
     *
     *     @type string $join  SQL fragment to append to the main JOIN clause.
     *     @type string $where SQL fragment to append to the main WHERE clause.
     * }
     */
    public function get_sql_for_clause(&$clause, $parent_query, $clause_key = '')
    {
    }
    /**
     * Get a flattened list of sanitized meta clauses.
     *
     * This array should be used for clause lookup, as when the table alias and CAST type must be determined for
     * a value of 'orderby' corresponding to a meta clause.
     *
     * @since 4.2.0
     *
     * @return array Meta clauses.
     */
    public function get_clauses()
    {
    }
    /**
     * Identify an existing table alias that is compatible with the current
     * query clause.
     *
     * We avoid unnecessary table joins by allowing each clause to look for
     * an existing table alias that is compatible with the query that it
     * needs to perform.
     *
     * An existing alias is compatible if (a) it is a sibling of `$clause`
     * (ie, it's under the scope of the same relation), and (b) the combination
     * of operator and relation between the clauses allows for a shared table join.
     * In the case of WP_Meta_Query, this only applies to 'IN' clauses that are
     * connected by the relation 'OR'.
     *
     * @since 4.1.0
     *
     * @param  array       $clause       Query clause.
     * @param  array       $parent_query Parent query of $clause.
     * @return string|bool Table alias if found, otherwise false.
     */
    protected function find_compatible_table_alias($clause, $parent_query)
    {
    }
    /**
     * Checks whether the current query has any OR relations.
     *
     * In some cases, the presence of an OR relation somewhere in the query will require
     * the use of a `DISTINCT` or `GROUP BY` keyword in the `SELECT` clause. The current
     * method can be used in these cases to determine whether such a clause is necessary.
     *
     * @since 4.3.0
     *
     * @return bool True if the query contains any `OR` relations, otherwise false.
     */
    public function has_or_relation()
    {
    }
}
/**
 * Meta API: WP_Metadata_Lazyloader class
 *
 * @package WordPress
 * @subpackage Meta
 * @since 4.5.0
 */
/**
 * Core class used for lazy-loading object metadata.
 *
 * When loading many objects of a given type, such as posts in a WP_Query loop, it often makes
 * sense to prime various metadata caches at the beginning of the loop. This means fetching all
 * relevant metadata with a single database query, a technique that has the potential to improve
 * performance dramatically in some cases.
 *
 * In cases where the given metadata may not even be used in the loop, we can improve performance
 * even more by only priming the metadata cache for affected items the first time a piece of metadata
 * is requested - ie, by lazy-loading it. So, for example, comment meta may not be loaded into the
 * cache in the comments section of a post until the first time get_comment_meta() is called in the
 * context of the comment loop.
 *
 * WP uses the WP_Metadata_Lazyloader class to queue objects for metadata cache priming. The class
 * then detects the relevant get_*_meta() function call, and queries the metadata of all queued objects.
 *
 * Do not access this class directly. Use the wp_metadata_lazyloader() function.
 *
 * @since 4.5.0
 */
class WP_Metadata_Lazyloader
{
    /**
     * Pending objects queue.
     *
     * @since 4.5.0
     * @var array
     */
    protected $pending_objects;
    /**
     * Settings for supported object types.
     *
     * @since 4.5.0
     * @var array
     */
    protected $settings = array();
    /**
     * Constructor.
     *
     * @since 4.5.0
     */
    public function __construct()
    {
    }
    /**
     * Adds objects to the metadata lazy-load queue.
     *
     * @since 4.5.0
     *
     * @param string $object_type Type of object whose meta is to be lazy-loaded. Accepts 'term' or 'comment'.
     * @param array  $object_ids  Array of object IDs.
     * @return bool|WP_Error True on success, WP_Error on failure.
     */
    public function queue_objects($object_type, $object_ids)
    {
    }
    /**
     * Resets lazy-load queue for a given object type.
     *
     * @since 4.5.0
     *
     * @param string $object_type Object type. Accepts 'comment' or 'term'.
     * @return bool|WP_Error True on success, WP_Error on failure.
     */
    public function reset_queue($object_type)
    {
    }
    /**
     * Lazy-loads term meta for queued terms.
     *
     * This method is public so that it can be used as a filter callback. As a rule, there
     * is no need to invoke it directly.
     *
     * @since 4.5.0
     *
     * @param mixed $check The `$check` param passed from the 'get_term_metadata' hook.
     * @return mixed In order not to short-circuit `get_metadata()`. Generally, this is `null`, but it could be
     *               another value if filtered by a plugin.
     */
    public function lazyload_term_meta($check)
    {
    }
    /**
     * Lazy-loads comment meta for queued comments.
     *
     * This method is public so that it can be used as a filter callback. As a rule, there is no need to invoke it
     * directly, from either inside or outside the `WP_Query` object.
     *
     * @since 4.5.0
     *
     * @param mixed $check The `$check` param passed from the {@see 'get_comment_metadata'} hook.
     * @return mixed The original value of `$check`, so as not to short-circuit `get_comment_metadata()`.
     */
    public function lazyload_comment_meta($check)
    {
    }
}
/**
 * Network API: WP_Network_Query class
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 4.6.0
 */
/**
 * Core class used for querying networks.
 *
 * @since 4.6.0
 *
 * @see WP_Network_Query::__construct() for accepted arguments.
 */
class WP_Network_Query
{
    /**
     * SQL for database query.
     *
     * @since 4.6.0
     * @var string
     */
    public $request;
    /**
     * SQL query clauses.
     *
     * @since 4.6.0
     * @var array
     */
    protected $sql_clauses = array('select' => '', 'from' => '', 'where' => array(), 'groupby' => '', 'orderby' => '', 'limits' => '');
    /**
     * Query vars set by the user.
     *
     * @since 4.6.0
     * @var array
     */
    public $query_vars;
    /**
     * Default values for query vars.
     *
     * @since 4.6.0
     * @var array
     */
    public $query_var_defaults;
    /**
     * List of networks located by the query.
     *
     * @since 4.6.0
     * @var array
     */
    public $networks;
    /**
     * The amount of found networks for the current query.
     *
     * @since 4.6.0
     * @var int
     */
    public $found_networks = 0;
    /**
     * The number of pages.
     *
     * @since 4.6.0
     * @var int
     */
    public $max_num_pages = 0;
    /**
     * Constructor.
     *
     * Sets up the network query, based on the query vars passed.
     *
     * @since 4.6.0
     *
     * @param string|array $query {
     *     Optional. Array or query string of network query parameters. Default empty.
     *
     *     @type array        $network__in          Array of network IDs to include. Default empty.
     *     @type array        $network__not_in      Array of network IDs to exclude. Default empty.
     *     @type bool         $count                Whether to return a network count (true) or array of network objects.
     *                                              Default false.
     *     @type string       $fields               Network fields to return. Accepts 'ids' (returns an array of network IDs)
     *                                              or empty (returns an array of complete network objects). Default empty.
     *     @type int          $number               Maximum number of networks to retrieve. Default empty (no limit).
     *     @type int          $offset               Number of networks to offset the query. Used to build LIMIT clause.
     *                                              Default 0.
     *     @type bool         $no_found_rows        Whether to disable the `SQL_CALC_FOUND_ROWS` query. Default true.
     *     @type string|array $orderby              Network status or array of statuses. Accepts 'id', 'domain', 'path',
     *                                              'domain_length', 'path_length' and 'network__in'. Also accepts false,
     *                                              an empty array, or 'none' to disable `ORDER BY` clause. Default 'id'.
     *     @type string       $order                How to order retrieved networks. Accepts 'ASC', 'DESC'. Default 'ASC'.
     *     @type string       $domain               Limit results to those affiliated with a given domain. Default empty.
     *     @type array        $domain__in           Array of domains to include affiliated networks for. Default empty.
     *     @type array        $domain__not_in       Array of domains to exclude affiliated networks for. Default empty.
     *     @type string       $path                 Limit results to those affiliated with a given path. Default empty.
     *     @type array        $path__in             Array of paths to include affiliated networks for. Default empty.
     *     @type array        $path__not_in         Array of paths to exclude affiliated networks for. Default empty.
     *     @type string       $search               Search term(s) to retrieve matching networks for. Default empty.
     *     @type bool         $update_network_cache Whether to prime the cache for found networks. Default true.
     * }
     */
    public function __construct($query = '')
    {
    }
    /**
     * Parses arguments passed to the network query with default query parameters.
     *
     * @since 4.6.0
     *
     *
     * @param string|array $query WP_Network_Query arguments. See WP_Network_Query::__construct()
     */
    public function parse_query($query = '')
    {
    }
    /**
     * Sets up the WordPress query for retrieving networks.
     *
     * @since 4.6.0
     *
     * @param string|array $query Array or URL query string of parameters.
     * @return array|int List of WP_Network objects, a list of network ids when 'fields' is set to 'ids',
     *                   or the number of networks when 'count' is passed as a query var.
     */
    public function query($query)
    {
    }
    /**
     * Gets a list of networks matching the query vars.
     *
     * @since 4.6.0
     *
     * @return array|int List of WP_Network objects, a list of network ids when 'fields' is set to 'ids',
     *                   or the number of networks when 'count' is passed as a query var.
     */
    public function get_networks()
    {
    }
    /**
     * Used internally to get a list of network IDs matching the query vars.
     *
     * @since 4.6.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @return int|array A single count of network IDs if a count query. An array of network IDs if a full query.
     */
    protected function get_network_ids()
    {
    }
    /**
     * Populates found_networks and max_num_pages properties for the current query
     * if the limit clause was used.
     *
     * @since 4.6.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     */
    private function set_found_networks()
    {
    }
    /**
     * Used internally to generate an SQL string for searching across multiple columns.
     *
     * @since 4.6.0
     *
     * @global wpdb  $wpdb WordPress database abstraction object.
     *
     * @param string $string  Search string.
     * @param array  $columns Columns to search.
     *
     * @return string Search SQL.
     */
    protected function get_search_sql($string, $columns)
    {
    }
    /**
     * Parses and sanitizes 'orderby' keys passed to the network query.
     *
     * @since 4.6.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $orderby Alias for the field to order by.
     * @return string|false Value to used in the ORDER clause. False otherwise.
     */
    protected function parse_orderby($orderby)
    {
    }
    /**
     * Parses an 'order' query variable and cast it to 'ASC' or 'DESC' as necessary.
     *
     * @since 4.6.0
     *
     * @param string $order The 'order' query variable.
     * @return string The sanitized 'order' query variable.
     */
    protected function parse_order($order)
    {
    }
}
/**
 * Network API: WP_Network class
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 4.4.0
 */
/**
 * Core class used for interacting with a multisite network.
 *
 * This class is used during load to populate the `$current_site` global and
 * setup the current network.
 *
 * This class is most useful in WordPress multi-network installations where the
 * ability to interact with any network of sites is required.
 *
 * @since 4.4.0
 *
 * @property int $id
 * @property int $site_id
 */
class WP_Network
{
    /**
     * Network ID.
     *
     * @since 4.4.0
     * @since 4.6.0 Converted from public to private to explicitly enable more intuitive
     *              access via magic methods. As part of the access change, the type was
     *              also changed from `string` to `int`.
     * @var int
     */
    private $id;
    /**
     * Domain of the network.
     *
     * @since 4.4.0
     * @var string
     */
    public $domain = '';
    /**
     * Path of the network.
     *
     * @since 4.4.0
     * @var string
     */
    public $path = '';
    /**
     * The ID of the network's main site.
     *
     * Named "blog" vs. "site" for legacy reasons. A main site is mapped to
     * the network when the network is created.
     *
     * A numeric string, for compatibility reasons.
     *
     * @since 4.4.0
     * @var string
     */
    private $blog_id = '0';
    /**
     * Domain used to set cookies for this network.
     *
     * @since 4.4.0
     * @var string
     */
    public $cookie_domain = '';
    /**
     * Name of this network.
     *
     * Named "site" vs. "network" for legacy reasons.
     *
     * @since 4.4.0
     * @var string
     */
    public $site_name = '';
    /**
     * Retrieve a network from the database by its ID.
     *
     * @since 4.4.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param int $network_id The ID of the network to retrieve.
     * @return WP_Network|bool The network's object if found. False if not.
     */
    public static function get_instance($network_id)
    {
    }
    /**
     * Create a new WP_Network object.
     *
     * Will populate object properties from the object provided and assign other
     * default properties based on that information.
     *
     * @since 4.4.0
     *
     * @param WP_Network|object $network A network object.
     */
    public function __construct($network)
    {
    }
    /**
     * Getter.
     *
     * Allows current multisite naming conventions when getting properties.
     *
     * @since 4.6.0
     *
     * @param string $key Property to get.
     * @return mixed Value of the property. Null if not available.
     */
    public function __get($key)
    {
    }
    /**
     * Isset-er.
     *
     * Allows current multisite naming conventions when checking for properties.
     *
     * @since 4.6.0
     *
     * @param string $key Property to check if set.
     * @return bool Whether the property is set.
     */
    public function __isset($key)
    {
    }
    /**
     * Setter.
     *
     * Allows current multisite naming conventions while setting properties.
     *
     * @since 4.6.0
     *
     * @param string $key   Property to set.
     * @param mixed  $value Value to assign to the property.
     */
    public function __set($key, $value)
    {
    }
    /**
     * Returns the main site ID for the network.
     *
     * Internal method used by the magic getter for the 'blog_id' and 'site_id'
     * properties.
     *
     * @since 4.9.0
     *
     * @return int The ID of the main site.
     */
    private function get_main_site_id()
    {
    }
    /**
     * Set the site name assigned to the network if one has not been populated.
     *
     * @since 4.4.0
     */
    private function _set_site_name()
    {
    }
    /**
     * Set the cookie domain based on the network domain if one has
     * not been populated.
     *
     * @todo What if the domain of the network doesn't match the current site?
     *
     * @since 4.4.0
     */
    private function _set_cookie_domain()
    {
    }
    /**
     * Retrieve the closest matching network for a domain and path.
     *
     * This will not necessarily return an exact match for a domain and path. Instead, it
     * breaks the domain and path into pieces that are then used to match the closest
     * possibility from a query.
     *
     * The intent of this method is to match a network during bootstrap for a
     * requested site address.
     *
     * @since 4.4.0
     * @static
     *
     * @param string   $domain   Domain to check.
     * @param string   $path     Path to check.
     * @param int|null $segments Path segments to use. Defaults to null, or the full path.
     * @return WP_Network|bool Network object if successful. False when no network is found.
     */
    public static function get_by_path($domain = '', $path = '', $segments = \null)
    {
    }
}
/**
 * WP_oEmbed_Controller class, used to provide an oEmbed endpoint.
 *
 * @package WordPress
 * @subpackage Embeds
 * @since 4.4.0
 */
/**
 * oEmbed API endpoint controller.
 *
 * Registers the API route and delivers the response data.
 * The output format (XML or JSON) is handled by the REST API.
 *
 * @since 4.4.0
 */
final class WP_oEmbed_Controller
{
    /**
     * Register the oEmbed REST API route.
     *
     * @since 4.4.0
     */
    public function register_routes()
    {
    }
    /**
     * Callback for the embed API endpoint.
     *
     * Returns the JSON object for the post.
     *
     * @since 4.4.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|array oEmbed response data or WP_Error on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Checks if current user can make a proxy oEmbed request.
     *
     * @since 4.8.0
     *
     * @return true|WP_Error True if the request has read access, WP_Error object otherwise.
     */
    public function get_proxy_item_permissions_check()
    {
    }
    /**
     * Callback for the proxy API endpoint.
     *
     * Returns the JSON object for the proxied item.
     *
     * @since 4.8.0
     *
     * @see WP_oEmbed::get_html()
     * @param WP_REST_Request $request Full data about the request.
     * @return object|WP_Error oEmbed response data or WP_Error on failure.
     */
    public function get_proxy_item($request)
    {
    }
}
/**
 * Post API: WP_Post_Type class
 *
 * @package WordPress
 * @subpackage Post
 * @since 4.6.0
 */
/**
 * Core class used for interacting with post types.
 *
 * @since 4.6.0
 *
 * @see register_post_type()
 */
final class WP_Post_Type
{
    /**
     * Post type key.
     *
     * @since 4.6.0
     * @var string $name
     */
    public $name;
    /**
     * Name of the post type shown in the menu. Usually plural.
     *
     * @since 4.6.0
     * @var string $label
     */
    public $label;
    /**
     * Labels object for this post type.
     *
     * If not set, post labels are inherited for non-hierarchical types
     * and page labels for hierarchical ones.
     *
     * @see get_post_type_labels()
     *
     * @since 4.6.0
     * @var object $labels
     */
    public $labels;
    /**
     * A short descriptive summary of what the post type is.
     *
     * Default empty.
     *
     * @since 4.6.0
     * @var string $description
     */
    public $description = '';
    /**
     * Whether a post type is intended for use publicly either via the admin interface or by front-end users.
     *
     * While the default settings of $exclude_from_search, $publicly_queryable, $show_ui, and $show_in_nav_menus
     * are inherited from public, each does not rely on this relationship and controls a very specific intention.
     *
     * Default false.
     *
     * @since 4.6.0
     * @var bool $public
     */
    public $public = \false;
    /**
     * Whether the post type is hierarchical (e.g. page).
     *
     * Default false.
     *
     * @since 4.6.0
     * @var bool $hierarchical
     */
    public $hierarchical = \false;
    /**
     * Whether to exclude posts with this post type from front end search
     * results.
     *
     * Default is the opposite value of $public.
     *
     * @since 4.6.0
     * @var bool $exclude_from_search
     */
    public $exclude_from_search = \null;
    /**
     * Whether queries can be performed on the front end for the post type as part of `parse_request()`.
     *
     * Endpoints would include:
     * - `?post_type={post_type_key}`
     * - `?{post_type_key}={single_post_slug}`
     * - `?{post_type_query_var}={single_post_slug}`
     *
     * Default is the value of $public.
     *
     * @since 4.6.0
     * @var bool $publicly_queryable
     */
    public $publicly_queryable = \null;
    /**
     * Whether to generate and allow a UI for managing this post type in the admin.
     *
     * Default is the value of $public.
     *
     * @since 4.6.0
     * @var bool $show_ui
     */
    public $show_ui = \null;
    /**
     * Where to show the post type in the admin menu.
     *
     * To work, $show_ui must be true. If true, the post type is shown in its own top level menu. If false, no menu is
     * shown. If a string of an existing top level menu (eg. 'tools.php' or 'edit.php?post_type=page'), the post type
     * will be placed as a sub-menu of that.
     *
     * Default is the value of $show_ui.
     *
     * @since 4.6.0
     * @var bool $show_in_menu
     */
    public $show_in_menu = \null;
    /**
     * Makes this post type available for selection in navigation menus.
     *
     * Default is the value $public.
     *
     * @since 4.6.0
     * @var bool $show_in_nav_menus
     */
    public $show_in_nav_menus = \null;
    /**
     * Makes this post type available via the admin bar.
     *
     * Default is the value of $show_in_menu.
     *
     * @since 4.6.0
     * @var bool $show_in_admin_bar
     */
    public $show_in_admin_bar = \null;
    /**
     * The position in the menu order the post type should appear.
     *
     * To work, $show_in_menu must be true. Default null (at the bottom).
     *
     * @since 4.6.0
     * @var int $menu_position
     */
    public $menu_position = \null;
    /**
     * The URL to the icon to be used for this menu.
     *
     * Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme.
     * This should begin with 'data:image/svg+xml;base64,'. Pass the name of a Dashicons helper class
     * to use a font icon, e.g. 'dashicons-chart-pie'. Pass 'none' to leave div.wp-menu-image empty
     * so an icon can be added via CSS.
     *
     * Defaults to use the posts icon.
     *
     * @since 4.6.0
     * @var string $menu_icon
     */
    public $menu_icon = \null;
    /**
     * The string to use to build the read, edit, and delete capabilities.
     *
     * May be passed as an array to allow for alternative plurals when using
     * this argument as a base to construct the capabilities, e.g.
     * array( 'story', 'stories' ). Default 'post'.
     *
     * @since 4.6.0
     * @var string $capability_type
     */
    public $capability_type = 'post';
    /**
     * Whether to use the internal default meta capability handling.
     *
     * Default false.
     *
     * @since 4.6.0
     * @var bool $map_meta_cap
     */
    public $map_meta_cap = \false;
    /**
     * Provide a callback function that sets up the meta boxes for the edit form.
     *
     * Do `remove_meta_box()` and `add_meta_box()` calls in the callback. Default null.
     *
     * @since 4.6.0
     * @var string $register_meta_box_cb
     */
    public $register_meta_box_cb = \null;
    /**
     * An array of taxonomy identifiers that will be registered for the post type.
     *
     * Taxonomies can be registered later with `register_taxonomy()` or `register_taxonomy_for_object_type()`.
     *
     * Default empty array.
     *
     * @since 4.6.0
     * @var array $taxonomies
     */
    public $taxonomies = array();
    /**
     * Whether there should be post type archives, or if a string, the archive slug to use.
     *
     * Will generate the proper rewrite rules if $rewrite is enabled. Default false.
     *
     * @since 4.6.0
     * @var bool|string $has_archive
     */
    public $has_archive = \false;
    /**
     * Sets the query_var key for this post type.
     *
     * Defaults to $post_type key. If false, a post type cannot be loaded at `?{query_var}={post_slug}`.
     * If specified as a string, the query `?{query_var_string}={post_slug}` will be valid.
     *
     * @since 4.6.0
     * @var string|bool $query_var
     */
    public $query_var;
    /**
     * Whether to allow this post type to be exported.
     *
     * Default true.
     *
     * @since 4.6.0
     * @var bool $can_export
     */
    public $can_export = \true;
    /**
     * Whether to delete posts of this type when deleting a user.
     *
     * If true, posts of this type belonging to the user will be moved to trash when then user is deleted.
     * If false, posts of this type belonging to the user will *not* be trashed or deleted.
     * If not set (the default), posts are trashed if post_type_supports( 'author' ).
     * Otherwise posts are not trashed or deleted. Default null.
     *
     * @since 4.6.0
     * @var bool $delete_with_user
     */
    public $delete_with_user = \null;
    /**
     * Whether this post type is a native or "built-in" post_type.
     *
     * Default false.
     *
     * @since 4.6.0
     * @var bool $_builtin
     */
    public $_builtin = \false;
    /**
     * URL segment to use for edit link of this post type.
     *
     * Default 'post.php?post=%d'.
     *
     * @since 4.6.0
     * @var string $_edit_link
     */
    public $_edit_link = 'post.php?post=%d';
    /**
     * Post type capabilities.
     *
     * @since 4.6.0
     * @var object $cap
     */
    public $cap;
    /**
     * Triggers the handling of rewrites for this post type.
     *
     * Defaults to true, using $post_type as slug.
     *
     * @since 4.6.0
     * @var array|false $rewrite
     */
    public $rewrite;
    /**
     * The features supported by the post type.
     *
     * @since 4.6.0
     * @var array|bool $supports
     */
    public $supports;
    /**
     * Whether this post type should appear in the REST API.
     *
     * Default false. If true, standard endpoints will be registered with
     * respect to $rest_base and $rest_controller_class.
     *
     * @since 4.7.4
     * @var bool $show_in_rest
     */
    public $show_in_rest;
    /**
     * The base path for this post type's REST API endpoints.
     *
     * @since 4.7.4
     * @var string|bool $rest_base
     */
    public $rest_base;
    /**
     * The controller for this post type's REST API endpoints.
     *
     * Custom controllers must extend WP_REST_Controller.
     *
     * @since 4.7.4
     * @var string|bool $rest_controller_class
     */
    public $rest_controller_class;
    /**
     * Constructor.
     *
     * Will populate object properties from the provided arguments and assign other
     * default properties based on that information.
     *
     * @since 4.6.0
     *
     * @see register_post_type()
     *
     * @param string       $post_type Post type key.
     * @param array|string $args      Optional. Array or string of arguments for registering a post type.
     *                                Default empty array.
     */
    public function __construct($post_type, $args = array())
    {
    }
    /**
     * Sets post type properties.
     *
     * @since 4.6.0
     *
     * @param array|string $args Array or string of arguments for registering a post type.
     */
    public function set_props($args)
    {
    }
    /**
     * Sets the features support for the post type.
     *
     * @since 4.6.0
     */
    public function add_supports()
    {
    }
    /**
     * Adds the necessary rewrite rules for the post type.
     *
     * @since 4.6.0
     *
     * @global WP_Rewrite $wp_rewrite WordPress Rewrite Component.
     * @global WP         $wp         Current WordPress environment instance.
     */
    public function add_rewrite_rules()
    {
    }
    /**
     * Registers the post type meta box if a custom callback was specified.
     *
     * @since 4.6.0
     */
    public function register_meta_boxes()
    {
    }
    /**
     * Adds the future post hook action for the post type.
     *
     * @since 4.6.0
     */
    public function add_hooks()
    {
    }
    /**
     * Registers the taxonomies for the post type.
     *
     * @since 4.6.0
     */
    public function register_taxonomies()
    {
    }
    /**
     * Removes the features support for the post type.
     *
     * @since 4.6.0
     *
     * @global array $_wp_post_type_features Post type features.
     */
    public function remove_supports()
    {
    }
    /**
     * Removes any rewrite rules, permastructs, and rules for the post type.
     *
     * @since 4.6.0
     *
     * @global WP_Rewrite $wp_rewrite          WordPress rewrite component.
     * @global WP         $wp                  Current WordPress environment instance.
     * @global array      $post_type_meta_caps Used to remove meta capabilities.
     */
    public function remove_rewrite_rules()
    {
    }
    /**
     * Unregisters the post type meta box if a custom callback was specified.
     *
     * @since 4.6.0
     */
    public function unregister_meta_boxes()
    {
    }
    /**
     * Removes the post type from all taxonomies.
     *
     * @since 4.6.0
     */
    public function unregister_taxonomies()
    {
    }
    /**
     * Removes the future post hook action for the post type.
     *
     * @since 4.6.0
     */
    public function remove_hooks()
    {
    }
}
/**
 * Post API: WP_Post class
 *
 * @package WordPress
 * @subpackage Post
 * @since 4.4.0
 */
/**
 * Core class used to implement the WP_Post object.
 *
 * @since 3.5.0
 *
 * @property string $page_template
 *
 * @property-read array  $ancestors
 * @property-read int    $post_category
 * @property-read string $tag_input
 *
 */
final class WP_Post
{
    /**
     * Post ID.
     *
     * @since 3.5.0
     * @var int
     */
    public $ID;
    /**
     * ID of post author.
     *
     * A numeric string, for compatibility reasons.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_author = 0;
    /**
     * The post's local publication time.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_date = '0000-00-00 00:00:00';
    /**
     * The post's GMT publication time.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_date_gmt = '0000-00-00 00:00:00';
    /**
     * The post's content.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_content = '';
    /**
     * The post's title.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_title = '';
    /**
     * The post's excerpt.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_excerpt = '';
    /**
     * The post's status.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_status = 'publish';
    /**
     * Whether comments are allowed.
     *
     * @since 3.5.0
     * @var string
     */
    public $comment_status = 'open';
    /**
     * Whether pings are allowed.
     *
     * @since 3.5.0
     * @var string
     */
    public $ping_status = 'open';
    /**
     * The post's password in plain text.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_password = '';
    /**
     * The post's slug.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_name = '';
    /**
     * URLs queued to be pinged.
     *
     * @since 3.5.0
     * @var string
     */
    public $to_ping = '';
    /**
     * URLs that have been pinged.
     *
     * @since 3.5.0
     * @var string
     */
    public $pinged = '';
    /**
     * The post's local modified time.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_modified = '0000-00-00 00:00:00';
    /**
     * The post's GMT modified time.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_modified_gmt = '0000-00-00 00:00:00';
    /**
     * A utility DB field for post content.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_content_filtered = '';
    /**
     * ID of a post's parent post.
     *
     * @since 3.5.0
     * @var int
     */
    public $post_parent = 0;
    /**
     * The unique identifier for a post, not necessarily a URL, used as the feed GUID.
     *
     * @since 3.5.0
     * @var string
     */
    public $guid = '';
    /**
     * A field used for ordering posts.
     *
     * @since 3.5.0
     * @var int
     */
    public $menu_order = 0;
    /**
     * The post's type, like post or page.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_type = 'post';
    /**
     * An attachment's mime type.
     *
     * @since 3.5.0
     * @var string
     */
    public $post_mime_type = '';
    /**
     * Cached comment count.
     *
     * A numeric string, for compatibility reasons.
     *
     * @since 3.5.0
     * @var string
     */
    public $comment_count = 0;
    /**
     * Stores the post object's sanitization level.
     *
     * Does not correspond to a DB field.
     *
     * @since 3.5.0
     * @var string
     */
    public $filter;
    /**
     * Retrieve WP_Post instance.
     *
     * @since 3.5.0
     * @static
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param int $post_id Post ID.
     * @return WP_Post|false Post object, false otherwise.
     */
    public static function get_instance($post_id)
    {
    }
    /**
     * Constructor.
     *
     * @since 3.5.0
     *
     * @param WP_Post|object $post Post object.
     */
    public function __construct($post)
    {
    }
    /**
     * Isset-er.
     *
     * @since 3.5.0
     *
     * @param string $key Property to check if set.
     * @return bool
     */
    public function __isset($key)
    {
    }
    /**
     * Getter.
     *
     * @since 3.5.0
     *
     * @param string $key Key to get.
     * @return mixed
     */
    public function __get($key)
    {
    }
    /**
     * {@Missing Summary}
     *
     * @since 3.5.0
     *
     * @param string $filter Filter.
     * @return self|array|bool|object|WP_Post
     */
    public function filter($filter)
    {
    }
    /**
     * Convert object to array.
     *
     * @since 3.5.0
     *
     * @return array Object as array.
     */
    public function to_array()
    {
    }
}
/**
 * Query API: WP_Query class
 *
 * @package WordPress
 * @subpackage Query
 * @since 4.7.0
 */
/**
 * The WordPress Query class.
 *
 * @link https://codex.wordpress.org/Function_Reference/WP_Query Codex page.
 *
 * @since 1.5.0
 * @since 4.5.0 Removed the `$comments_popup` property.
 */
class WP_Query
{
    /**
     * Query vars set by the user
     *
     * @since 1.5.0
     * @var array
     */
    public $query;
    /**
     * Query vars, after parsing
     *
     * @since 1.5.0
     * @var array
     */
    public $query_vars = array();
    /**
     * Taxonomy query, as passed to get_tax_sql()
     *
     * @since 3.1.0
     * @var object WP_Tax_Query
     */
    public $tax_query;
    /**
     * Metadata query container
     *
     * @since 3.2.0
     * @var object WP_Meta_Query
     */
    public $meta_query = \false;
    /**
     * Date query container
     *
     * @since 3.7.0
     * @var object WP_Date_Query
     */
    public $date_query = \false;
    /**
     * Holds the data for a single object that is queried.
     *
     * Holds the contents of a post, page, category, attachment.
     *
     * @since 1.5.0
     * @var object|array
     */
    public $queried_object;
    /**
     * The ID of the queried object.
     *
     * @since 1.5.0
     * @var int
     */
    public $queried_object_id;
    /**
     * Get post database query.
     *
     * @since 2.0.1
     * @var string
     */
    public $request;
    /**
     * List of posts.
     *
     * @since 1.5.0
     * @var array
     */
    public $posts;
    /**
     * The amount of posts for the current query.
     *
     * @since 1.5.0
     * @var int
     */
    public $post_count = 0;
    /**
     * Index of the current item in the loop.
     *
     * @since 1.5.0
     * @var int
     */
    public $current_post = -1;
    /**
     * Whether the loop has started and the caller is in the loop.
     *
     * @since 2.0.0
     * @var bool
     */
    public $in_the_loop = \false;
    /**
     * The current post.
     *
     * @since 1.5.0
     * @var WP_Post
     */
    public $post;
    /**
     * The list of comments for current post.
     *
     * @since 2.2.0
     * @var array
     */
    public $comments;
    /**
     * The amount of comments for the posts.
     *
     * @since 2.2.0
     * @var int
     */
    public $comment_count = 0;
    /**
     * The index of the comment in the comment loop.
     *
     * @since 2.2.0
     * @var int
     */
    public $current_comment = -1;
    /**
     * Current comment ID.
     *
     * @since 2.2.0
     * @var int
     */
    public $comment;
    /**
     * The amount of found posts for the current query.
     *
     * If limit clause was not used, equals $post_count.
     *
     * @since 2.1.0
     * @var int
     */
    public $found_posts = 0;
    /**
     * The amount of pages.
     *
     * @since 2.1.0
     * @var int
     */
    public $max_num_pages = 0;
    /**
     * The amount of comment pages.
     *
     * @since 2.7.0
     * @var int
     */
    public $max_num_comment_pages = 0;
    /**
     * Signifies whether the current query is for a single post.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_single = \false;
    /**
     * Signifies whether the current query is for a preview.
     *
     * @since 2.0.0
     * @var bool
     */
    public $is_preview = \false;
    /**
     * Signifies whether the current query is for a page.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_page = \false;
    /**
     * Signifies whether the current query is for an archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_archive = \false;
    /**
     * Signifies whether the current query is for a date archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_date = \false;
    /**
     * Signifies whether the current query is for a year archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_year = \false;
    /**
     * Signifies whether the current query is for a month archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_month = \false;
    /**
     * Signifies whether the current query is for a day archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_day = \false;
    /**
     * Signifies whether the current query is for a specific time.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_time = \false;
    /**
     * Signifies whether the current query is for an author archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_author = \false;
    /**
     * Signifies whether the current query is for a category archive.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_category = \false;
    /**
     * Signifies whether the current query is for a tag archive.
     *
     * @since 2.3.0
     * @var bool
     */
    public $is_tag = \false;
    /**
     * Signifies whether the current query is for a taxonomy archive.
     *
     * @since 2.5.0
     * @var bool
     */
    public $is_tax = \false;
    /**
     * Signifies whether the current query is for a search.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_search = \false;
    /**
     * Signifies whether the current query is for a feed.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_feed = \false;
    /**
     * Signifies whether the current query is for a comment feed.
     *
     * @since 2.2.0
     * @var bool
     */
    public $is_comment_feed = \false;
    /**
     * Signifies whether the current query is for trackback endpoint call.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_trackback = \false;
    /**
     * Signifies whether the current query is for the site homepage.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_home = \false;
    /**
     * Signifies whether the current query couldn't find anything.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_404 = \false;
    /**
     * Signifies whether the current query is for an embed.
     *
     * @since 4.4.0
     * @var bool
     */
    public $is_embed = \false;
    /**
     * Signifies whether the current query is for a paged result and not for the first page.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_paged = \false;
    /**
     * Signifies whether the current query is for an administrative interface page.
     *
     * @since 1.5.0
     * @var bool
     */
    public $is_admin = \false;
    /**
     * Signifies whether the current query is for an attachment page.
     *
     * @since 2.0.0
     * @var bool
     */
    public $is_attachment = \false;
    /**
     * Signifies whether the current query is for an existing single post of any post type
     * (post, attachment, page, custom post types).
     *
     * @since 2.1.0
     * @var bool
     */
    public $is_singular = \false;
    /**
     * Signifies whether the current query is for the robots.txt file.
     *
     * @since 2.1.0
     * @var bool
     */
    public $is_robots = \false;
    /**
     * Signifies whether the current query is for the page_for_posts page.
     *
     * Basically, the homepage if the option isn't set for the static homepage.
     *
     * @since 2.1.0
     * @var bool
     */
    public $is_posts_page = \false;
    /**
     * Signifies whether the current query is for a post type archive.
     *
     * @since 3.1.0
     * @var bool
     */
    public $is_post_type_archive = \false;
    /**
     * Stores the ->query_vars state like md5(serialize( $this->query_vars ) ) so we know
     * whether we have to re-parse because something has changed
     *
     * @since 3.1.0
     * @var bool|string
     */
    private $query_vars_hash = \false;
    /**
     * Whether query vars have changed since the initial parse_query() call. Used to catch modifications to query vars made
     * via pre_get_posts hooks.
     *
     * @since 3.1.1
     */
    private $query_vars_changed = \true;
    /**
     * Set if post thumbnails are cached
     *
     * @since 3.2.0
     * @var bool
     */
    public $thumbnails_cached = \false;
    /**
     * Cached list of search stopwords.
     *
     * @since 3.7.0
     * @var array
     */
    private $stopwords;
    private $compat_fields = array('query_vars_hash', 'query_vars_changed');
    private $compat_methods = array('init_query_flags', 'parse_tax_query');
    /**
     * Resets query flags to false.
     *
     * The query flags are what page info WordPress was able to figure out.
     *
     * @since 2.0.0
     */
    private function init_query_flags()
    {
    }
    /**
     * Initiates object properties and sets default values.
     *
     * @since 1.5.0
     */
    public function init()
    {
    }
    /**
     * Reparse the query vars.
     *
     * @since 1.5.0
     */
    public function parse_query_vars()
    {
    }
    /**
     * Fills in the query variables, which do not exist within the parameter.
     *
     * @since 2.1.0
     * @since 4.4.0 Removed the `comments_popup` public query variable.
     *
     * @param array $array Defined query variables.
     * @return array Complete query variables with undefined ones filled in empty.
     */
    public function fill_query_vars($array)
    {
    }
    /**
     * Parse a query string and set query type booleans.
     *
     * @since 1.5.0
     * @since 4.2.0 Introduced the ability to order by specific clauses of a `$meta_query`, by passing the clause's
     *              array key to `$orderby`.
     * @since 4.4.0 Introduced `$post_name__in` and `$title` parameters. `$s` was updated to support excluded
     *              search terms, by prepending a hyphen.
     * @since 4.5.0 Removed the `$comments_popup` parameter.
     *              Introduced the `$comment_status` and `$ping_status` parameters.
     *              Introduced `RAND(x)` syntax for `$orderby`, which allows an integer seed value to random sorts.
     * @since 4.6.0 Added 'post_name__in' support for `$orderby`. Introduced the `$lazy_load_term_meta` argument.
     * @since 4.9.0 Introduced the `$comment_count` parameter.
     *
     * @param string|array $query {
     *     Optional. Array or string of Query parameters.
     *
     *     @type int          $attachment_id           Attachment post ID. Used for 'attachment' post_type.
     *     @type int|string   $author                  Author ID, or comma-separated list of IDs.
     *     @type string       $author_name             User 'user_nicename'.
     *     @type array        $author__in              An array of author IDs to query from.
     *     @type array        $author__not_in          An array of author IDs not to query from.
     *     @type bool         $cache_results           Whether to cache post information. Default true.
     *     @type int|string   $cat                     Category ID or comma-separated list of IDs (this or any children).
     *     @type array        $category__and           An array of category IDs (AND in).
     *     @type array        $category__in            An array of category IDs (OR in, no children).
     *     @type array        $category__not_in        An array of category IDs (NOT in).
     *     @type string       $category_name           Use category slug (not name, this or any children).
     *     @type array|int    $comment_count           Filter results by comment count. Provide an integer to match
     *                                                 comment count exactly. Provide an array with integer 'value'
     *                                                 and 'compare' operator ('=', '!=', '>', '>=', '<', '<=' ) to
     *                                                 compare against comment_count in a specific way.
     *     @type string       $comment_status          Comment status.
     *     @type int          $comments_per_page       The number of comments to return per page.
     *                                                 Default 'comments_per_page' option.
     *     @type array        $date_query              An associative array of WP_Date_Query arguments.
     *                                                 See WP_Date_Query::__construct().
     *     @type int          $day                     Day of the month. Default empty. Accepts numbers 1-31.
     *     @type bool         $exact                   Whether to search by exact keyword. Default false.
     *     @type string|array $fields                  Which fields to return. Single field or all fields (string),
     *                                                 or array of fields. 'id=>parent' uses 'id' and 'post_parent'.
     *                                                 Default all fields. Accepts 'ids', 'id=>parent'.
     *     @type int          $hour                    Hour of the day. Default empty. Accepts numbers 0-23.
     *     @type int|bool     $ignore_sticky_posts     Whether to ignore sticky posts or not. Setting this to false
     *                                                 excludes stickies from 'post__in'. Accepts 1|true, 0|false.
     *                                                 Default 0|false.
     *     @type int          $m                       Combination YearMonth. Accepts any four-digit year and month
     *                                                 numbers 1-12. Default empty.
     *     @type string       $meta_compare            Comparison operator to test the 'meta_value'.
     *     @type string       $meta_key                Custom field key.
     *     @type array        $meta_query              An associative array of WP_Meta_Query arguments. See WP_Meta_Query.
     *     @type string       $meta_value              Custom field value.
     *     @type int          $meta_value_num          Custom field value number.
     *     @type int          $menu_order              The menu order of the posts.
     *     @type int          $monthnum                The two-digit month. Default empty. Accepts numbers 1-12.
     *     @type string       $name                    Post slug.
     *     @type bool         $nopaging                Show all posts (true) or paginate (false). Default false.
     *     @type bool         $no_found_rows           Whether to skip counting the total rows found. Enabling can improve
     *                                                 performance. Default false.
     *     @type int          $offset                  The number of posts to offset before retrieval.
     *     @type string       $order                   Designates ascending or descending order of posts. Default 'DESC'.
     *                                                 Accepts 'ASC', 'DESC'.
     *     @type string|array $orderby                 Sort retrieved posts by parameter. One or more options may be
     *                                                 passed. To use 'meta_value', or 'meta_value_num',
     *                                                 'meta_key=keyname' must be also be defined. To sort by a
     *                                                 specific `$meta_query` clause, use that clause's array key.
     *                                                 Accepts 'none', 'name', 'author', 'date', 'title',
     *                                                 'modified', 'menu_order', 'parent', 'ID', 'rand',
     *                                                 'relevance', 'RAND(x)' (where 'x' is an integer seed value),
     *                                                 'comment_count', 'meta_value', 'meta_value_num', 'post__in',
     *                                                 'post_name__in', 'post_parent__in', and the array keys
     *                                                 of `$meta_query`. Default is 'date', except when a search
     *                                                 is being performed, when the default is 'relevance'.
     *
     *     @type int          $p                       Post ID.
     *     @type int          $page                    Show the number of posts that would show up on page X of a
     *                                                 static front page.
     *     @type int          $paged                   The number of the current page.
     *     @type int          $page_id                 Page ID.
     *     @type string       $pagename                Page slug.
     *     @type string       $perm                    Show posts if user has the appropriate capability.
     *     @type string       $ping_status             Ping status.
     *     @type array        $post__in                An array of post IDs to retrieve, sticky posts will be included
     *     @type string       $post_mime_type          The mime type of the post. Used for 'attachment' post_type.
     *     @type array        $post__not_in            An array of post IDs not to retrieve. Note: a string of comma-
     *                                                 separated IDs will NOT work.
     *     @type int          $post_parent             Page ID to retrieve child pages for. Use 0 to only retrieve
     *                                                 top-level pages.
     *     @type array        $post_parent__in         An array containing parent page IDs to query child pages from.
     *     @type array        $post_parent__not_in     An array containing parent page IDs not to query child pages from.
     *     @type string|array $post_type               A post type slug (string) or array of post type slugs.
     *                                                 Default 'any' if using 'tax_query'.
     *     @type string|array $post_status             A post status (string) or array of post statuses.
     *     @type int          $posts_per_page          The number of posts to query for. Use -1 to request all posts.
     *     @type int          $posts_per_archive_page  The number of posts to query for by archive page. Overrides
     *                                                 'posts_per_page' when is_archive(), or is_search() are true.
     *     @type array        $post_name__in           An array of post slugs that results must match.
     *     @type string       $s                       Search keyword(s). Prepending a term with a hyphen will
     *                                                 exclude posts matching that term. Eg, 'pillow -sofa' will
     *                                                 return posts containing 'pillow' but not 'sofa'. The
     *                                                 character used for exclusion can be modified using the
     *                                                 the 'wp_query_search_exclusion_prefix' filter.
     *     @type int          $second                  Second of the minute. Default empty. Accepts numbers 0-60.
     *     @type bool         $sentence                Whether to search by phrase. Default false.
     *     @type bool         $suppress_filters        Whether to suppress filters. Default false.
     *     @type string       $tag                     Tag slug. Comma-separated (either), Plus-separated (all).
     *     @type array        $tag__and                An array of tag ids (AND in).
     *     @type array        $tag__in                 An array of tag ids (OR in).
     *     @type array        $tag__not_in             An array of tag ids (NOT in).
     *     @type int          $tag_id                  Tag id or comma-separated list of IDs.
     *     @type array        $tag_slug__and           An array of tag slugs (AND in).
     *     @type array        $tag_slug__in            An array of tag slugs (OR in). unless 'ignore_sticky_posts' is
     *                                                 true. Note: a string of comma-separated IDs will NOT work.
     *     @type array        $tax_query               An associative array of WP_Tax_Query arguments.
     *                                                 See WP_Tax_Query->queries.
     *     @type string       $title                   Post title.
     *     @type bool         $update_post_meta_cache  Whether to update the post meta cache. Default true.
     *     @type bool         $update_post_term_cache  Whether to update the post term cache. Default true.
     *     @type bool         $lazy_load_term_meta     Whether to lazy-load term meta. Setting to false will
     *                                                 disable cache priming for term meta, so that each
     *                                                 get_term_meta() call will hit the database.
     *                                                 Defaults to the value of `$update_post_term_cache`.
     *     @type int          $w                       The week number of the year. Default empty. Accepts numbers 0-53.
     *     @type int          $year                    The four-digit year. Default empty. Accepts any four-digit year.
     * }
     */
    public function parse_query($query = '')
    {
    }
    /**
     * Parses various taxonomy related query vars.
     *
     * For BC, this method is not marked as protected. See [28987].
     *
     * @since 3.1.0
     *
     * @param array $q The query variables. Passed by reference.
     */
    public function parse_tax_query(&$q)
    {
    }
    /**
     * Generates SQL for the WHERE clause based on passed search terms.
     *
     * @since 3.7.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param array $q Query variables.
     * @return string WHERE clause.
     */
    protected function parse_search(&$q)
    {
    }
    /**
     * Check if the terms are suitable for searching.
     *
     * Uses an array of stopwords (terms) that are excluded from the separate
     * term matching when searching for posts. The list of English stopwords is
     * the approximate search engines list, and is translatable.
     *
     * @since 3.7.0
     *
     * @param array $terms Terms to check.
     * @return array Terms that are not stopwords.
     */
    protected function parse_search_terms($terms)
    {
    }
    /**
     * Retrieve stopwords used when parsing search terms.
     *
     * @since 3.7.0
     *
     * @return array Stopwords.
     */
    protected function get_search_stopwords()
    {
    }
    /**
     * Generates SQL for the ORDER BY condition based on passed search terms.
     *
     * @since 3.7.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param array $q Query variables.
     * @return string ORDER BY clause.
     */
    protected function parse_search_order(&$q)
    {
    }
    /**
     * Converts the given orderby alias (if allowed) to a properly-prefixed value.
     *
     * @since 4.0.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $orderby Alias for the field to order by.
     * @return string|false Table-prefixed value to used in the ORDER clause. False otherwise.
     */
    protected function parse_orderby($orderby)
    {
    }
    /**
     * Parse an 'order' query variable and cast it to ASC or DESC as necessary.
     *
     * @since 4.0.0
     *
     * @param string $order The 'order' query variable.
     * @return string The sanitized 'order' query variable.
     */
    protected function parse_order($order)
    {
    }
    /**
     * Sets the 404 property and saves whether query is feed.
     *
     * @since 2.0.0
     */
    public function set_404()
    {
    }
    /**
     * Retrieve query variable.
     *
     * @since 1.5.0
     * @since 3.9.0 The `$default` argument was introduced.
     *
     *
     * @param string $query_var Query variable key.
     * @param mixed  $default   Optional. Value to return if the query variable is not set. Default empty.
     * @return mixed Contents of the query variable.
     */
    public function get($query_var, $default = '')
    {
    }
    /**
     * Set query variable.
     *
     * @since 1.5.0
     *
     * @param string $query_var Query variable key.
     * @param mixed  $value     Query variable value.
     */
    public function set($query_var, $value)
    {
    }
    /**
     * Retrieve the posts based on query variables.
     *
     * There are a few filters and actions that can be used to modify the post
     * database query.
     *
     * @since 1.5.0
     *
     * @return array List of posts.
     */
    public function get_posts()
    {
    }
    /**
     * Set up the amount of found posts and the number of pages (if limit clause was used)
     * for the current query.
     *
     * @since 3.5.0
     *
     * @param array  $q      Query variables.
     * @param string $limits LIMIT clauses of the query.
     */
    private function set_found_posts($q, $limits)
    {
    }
    /**
     * Set up the next post and iterate current post index.
     *
     * @since 1.5.0
     *
     * @return WP_Post Next post.
     */
    public function next_post()
    {
    }
    /**
     * Sets up the current post.
     *
     * Retrieves the next post, sets up the post, sets the 'in the loop'
     * property to true.
     *
     * @since 1.5.0
     *
     * @global WP_Post $post
     */
    public function the_post()
    {
    }
    /**
     * Determines whether there are more posts available in the loop.
     *
     * Calls the {@see 'loop_end'} action when the loop is complete.
     *
     * @since 1.5.0
     *
     * @return bool True if posts are available, false if end of loop.
     */
    public function have_posts()
    {
    }
    /**
     * Rewind the posts and reset post index.
     *
     * @since 1.5.0
     */
    public function rewind_posts()
    {
    }
    /**
     * Iterate current comment index and return WP_Comment object.
     *
     * @since 2.2.0
     *
     * @return WP_Comment Comment object.
     */
    public function next_comment()
    {
    }
    /**
     * Sets up the current comment.
     *
     * @since 2.2.0
     * @global WP_Comment $comment Current comment.
     */
    public function the_comment()
    {
    }
    /**
     * Whether there are more comments available.
     *
     * Automatically rewinds comments when finished.
     *
     * @since 2.2.0
     *
     * @return bool True, if more comments. False, if no more posts.
     */
    public function have_comments()
    {
    }
    /**
     * Rewind the comments, resets the comment index and comment to first.
     *
     * @since 2.2.0
     */
    public function rewind_comments()
    {
    }
    /**
     * Sets up the WordPress query by parsing query string.
     *
     * @since 1.5.0
     *
     * @param string|array $query URL query string or array of query arguments.
     * @return array List of posts.
     */
    public function query($query)
    {
    }
    /**
     * Retrieve queried object.
     *
     * If queried object is not set, then the queried object will be set from
     * the category, tag, taxonomy, posts page, single post, page, or author
     * query variable. After it is set up, it will be returned.
     *
     * @since 1.5.0
     *
     * @return object
     */
    public function get_queried_object()
    {
    }
    /**
     * Retrieve ID of the current queried object.
     *
     * @since 1.5.0
     *
     * @return int
     */
    public function get_queried_object_id()
    {
    }
    /**
     * Constructor.
     *
     * Sets up the WordPress query, if parameter is not empty.
     *
     * @since 1.5.0
     *
     * @param string|array $query URL query string or array of vars.
     */
    public function __construct($query = '')
    {
    }
    /**
     * Make private properties readable for backward compatibility.
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
     * Make private properties checkable for backward compatibility.
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
     * Make private/protected methods readable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param callable $name      Method to call.
     * @param array    $arguments Arguments to pass when calling.
     * @return mixed|false Return value of the callback, false otherwise.
     */
    public function __call($name, $arguments)
    {
    }
    /**
     * Is the query for an existing archive page?
     *
     * Month, Year, Category, Author, Post Type archive...
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_archive()
    {
    }
    /**
     * Is the query for an existing post type archive page?
     *
     * @since 3.1.0
     *
     * @param mixed $post_types Optional. Post type or array of posts types to check against.
     * @return bool
     */
    public function is_post_type_archive($post_types = '')
    {
    }
    /**
     * Is the query for an existing attachment page?
     *
     * @since 3.1.0
     *
     * @param mixed $attachment Attachment ID, title, slug, or array of such.
     * @return bool
     */
    public function is_attachment($attachment = '')
    {
    }
    /**
     * Is the query for an existing author archive page?
     *
     * If the $author parameter is specified, this function will additionally
     * check if the query is for one of the authors specified.
     *
     * @since 3.1.0
     *
     * @param mixed $author Optional. User ID, nickname, nicename, or array of User IDs, nicknames, and nicenames
     * @return bool
     */
    public function is_author($author = '')
    {
    }
    /**
     * Is the query for an existing category archive page?
     *
     * If the $category parameter is specified, this function will additionally
     * check if the query is for one of the categories specified.
     *
     * @since 3.1.0
     *
     * @param mixed $category Optional. Category ID, name, slug, or array of Category IDs, names, and slugs.
     * @return bool
     */
    public function is_category($category = '')
    {
    }
    /**
     * Is the query for an existing tag archive page?
     *
     * If the $tag parameter is specified, this function will additionally
     * check if the query is for one of the tags specified.
     *
     * @since 3.1.0
     *
     * @param mixed $tag Optional. Tag ID, name, slug, or array of Tag IDs, names, and slugs.
     * @return bool
     */
    public function is_tag($tag = '')
    {
    }
    /**
     * Is the query for an existing custom taxonomy archive page?
     *
     * If the $taxonomy parameter is specified, this function will additionally
     * check if the query is for that specific $taxonomy.
     *
     * If the $term parameter is specified in addition to the $taxonomy parameter,
     * this function will additionally check if the query is for one of the terms
     * specified.
     *
     * @since 3.1.0
     *
     * @global array $wp_taxonomies
     *
     * @param mixed $taxonomy Optional. Taxonomy slug or slugs.
     * @param mixed $term     Optional. Term ID, name, slug or array of Term IDs, names, and slugs.
     * @return bool True for custom taxonomy archive pages, false for built-in taxonomies (category and tag archives).
     */
    public function is_tax($taxonomy = '', $term = '')
    {
    }
    /**
     * Whether the current URL is within the comments popup window.
     *
     * @since 3.1.0
     * @deprecated 4.5.0
     *
     * @return bool
     */
    public function is_comments_popup()
    {
    }
    /**
     * Is the query for an existing date archive?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_date()
    {
    }
    /**
     * Is the query for an existing day archive?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_day()
    {
    }
    /**
     * Is the query for a feed?
     *
     * @since 3.1.0
     *
     * @param string|array $feeds Optional feed types to check.
     * @return bool
     */
    public function is_feed($feeds = '')
    {
    }
    /**
     * Is the query for a comments feed?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_comment_feed()
    {
    }
    /**
     * Is the query for the front page of the site?
     *
     * This is for what is displayed at your site's main URL.
     *
     * Depends on the site's "Front page displays" Reading Settings 'show_on_front' and 'page_on_front'.
     *
     * If you set a static page for the front page of your site, this function will return
     * true when viewing that page.
     *
     * Otherwise the same as @see WP_Query::is_home()
     *
     * @since 3.1.0
     *
     * @return bool True, if front of site.
     */
    public function is_front_page()
    {
    }
    /**
     * Is the query for the blog homepage?
     *
     * This is the page which shows the time based blog content of your site.
     *
     * Depends on the site's "Front page displays" Reading Settings 'show_on_front' and 'page_for_posts'.
     *
     * If you set a static page for the front page of your site, this function will return
     * true only on the page you set as the "Posts page".
     *
     * @see WP_Query::is_front_page()
     *
     * @since 3.1.0
     *
     * @return bool True if blog view homepage.
     */
    public function is_home()
    {
    }
    /**
     * Is the query for an existing month archive?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_month()
    {
    }
    /**
     * Is the query for an existing single page?
     *
     * If the $page parameter is specified, this function will additionally
     * check if the query is for one of the pages specified.
     *
     * @see WP_Query::is_single()
     * @see WP_Query::is_singular()
     *
     * @since 3.1.0
     *
     * @param int|string|array $page Optional. Page ID, title, slug, path, or array of such. Default empty.
     * @return bool Whether the query is for an existing single page.
     */
    public function is_page($page = '')
    {
    }
    /**
     * Is the query for paged result and not for the first page?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_paged()
    {
    }
    /**
     * Is the query for a post or page preview?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_preview()
    {
    }
    /**
     * Is the query for the robots file?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_robots()
    {
    }
    /**
     * Is the query for a search?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_search()
    {
    }
    /**
     * Is the query for an existing single post?
     *
     * Works for any post type excluding pages.
     *
     * If the $post parameter is specified, this function will additionally
     * check if the query is for one of the Posts specified.
     *
     * @see WP_Query::is_page()
     * @see WP_Query::is_singular()
     *
     * @since 3.1.0
     *
     * @param int|string|array $post Optional. Post ID, title, slug, path, or array of such. Default empty.
     * @return bool Whether the query is for an existing single post.
     */
    public function is_single($post = '')
    {
    }
    /**
     * Is the query for an existing single post of any post type (post, attachment, page,
     * custom post types)?
     *
     * If the $post_types parameter is specified, this function will additionally
     * check if the query is for one of the Posts Types specified.
     *
     * @see WP_Query::is_page()
     * @see WP_Query::is_single()
     *
     * @since 3.1.0
     *
     * @param string|array $post_types Optional. Post type or array of post types. Default empty.
     * @return bool Whether the query is for an existing single post of any of the given post types.
     */
    public function is_singular($post_types = '')
    {
    }
    /**
     * Is the query for a specific time?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_time()
    {
    }
    /**
     * Is the query for a trackback endpoint call?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_trackback()
    {
    }
    /**
     * Is the query for an existing year archive?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_year()
    {
    }
    /**
     * Is the query a 404 (returns no results)?
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function is_404()
    {
    }
    /**
     * Is the query for an embedded post?
     *
     * @since 4.4.0
     *
     * @return bool
     */
    public function is_embed()
    {
    }
    /**
     * Is the query the main query?
     *
     * @since 3.3.0
     *
     * @global WP_Query $wp_query Global WP_Query instance.
     *
     * @return bool
     */
    public function is_main_query()
    {
    }
    /**
     * Set up global post data.
     *
     * @since 4.1.0
     * @since 4.4.0 Added the ability to pass a post ID to `$post`.
     *
     * @global int             $id
     * @global WP_User         $authordata
     * @global string|int|bool $currentday
     * @global string|int|bool $currentmonth
     * @global int             $page
     * @global array           $pages
     * @global int             $multipage
     * @global int             $more
     * @global int             $numpages
     *
     * @param WP_Post|object|int $post WP_Post instance or Post ID/object.
     * @return true True when finished.
     */
    public function setup_postdata($post)
    {
    }
    /**
     * After looping through a nested query, this function
     * restores the $post global to the current post in this query.
     *
     * @since 3.7.0
     *
     * @global WP_Post $post
     */
    public function reset_postdata()
    {
    }
    /**
     * Lazyload term meta for posts in the loop.
     *
     * @since 4.4.0
     * @deprecated 4.5.0 See wp_queue_posts_for_term_meta_lazyload().
     *
     * @param mixed $check
     * @param int   $term_id
     * @return mixed
     */
    public function lazyload_term_meta($check, $term_id)
    {
    }
    /**
     * Lazyload comment meta for comments in the loop.
     *
     * @since 4.4.0
     * @deprecated 4.5.0 See wp_queue_comments_for_comment_meta_lazyload().
     *
     * @param mixed $check
     * @param int   $comment_id
     * @return mixed
     */
    public function lazyload_comment_meta($check, $comment_id)
    {
    }
}