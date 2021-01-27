<?php

/**
 * Reads the contents of the file in the beginning.
 */
class POMO_CachedFileReader extends \POMO_StringReader
{
    /**
     * PHP5 constructor.
     */
    function __construct($filename)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function POMO_CachedFileReader($filename)
    {
    }
}
/**
 * Reads the contents of the file in the beginning.
 */
class POMO_CachedIntFileReader extends \POMO_CachedFileReader
{
    /**
     * PHP5 constructor.
     */
    public function __construct($filename)
    {
    }
    /**
     * PHP4 constructor.
     */
    function POMO_CachedIntFileReader($filename)
    {
    }
}
/**
 * Provides the same interface as Translations, but doesn't do anything
 */
class NOOP_Translations
{
    var $entries = array();
    var $headers = array();
    function add_entry($entry)
    {
    }
    /**
     *
     * @param string $header
     * @param string $value
     */
    function set_header($header, $value)
    {
    }
    /**
     *
     * @param array $headers
     */
    function set_headers($headers)
    {
    }
    /**
     * @param string $header
     * @return false
     */
    function get_header($header)
    {
    }
    /**
     * @param Translation_Entry $entry
     * @return false
     */
    function translate_entry(&$entry)
    {
    }
    /**
     * @param string $singular
     * @param string $context
     */
    function translate($singular, $context = \null)
    {
    }
    /**
     *
     * @param int $count
     * @return bool
     */
    function select_plural_form($count)
    {
    }
    /**
     * @return int
     */
    function get_plural_forms_count()
    {
    }
    /**
     * @param string $singular
     * @param string $plural
     * @param int    $count
     * @param string $context
     */
    function translate_plural($singular, $plural, $count, $context = \null)
    {
    }
    /**
     * @param object $other
     */
    function merge_with(&$other)
    {
    }
}
/**
 * REST API: WP_REST_Request class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.4.0
 */
/**
 * Core class used to implement a REST request object.
 *
 * Contains data from the request, to be passed to the callback.
 *
 * Note: This implements ArrayAccess, and acts as an array of parameters when
 * used in that manner. It does not use ArrayObject (as we cannot rely on SPL),
 * so be aware it may have non-array behaviour in some cases.
 *
 * Note: When using features provided by ArrayAccess, be aware that WordPress deliberately
 * does not distinguish between arguments of the same name for different request methods.
 * For instance, in a request with `GET id=1` and `POST id=2`, `$request['id']` will equal
 * 2 (`POST`) not 1 (`GET`). For more precision between request methods, use
 * WP_REST_Request::get_body_params(), WP_REST_Request::get_url_params(), etc.
 *
 * @since 4.4.0
 *
 * @see ArrayAccess
 */
class WP_REST_Request implements \ArrayAccess
{
    /**
     * HTTP method.
     *
     * @since 4.4.0
     * @var string
     */
    protected $method = '';
    /**
     * Parameters passed to the request.
     *
     * These typically come from the `$_GET`, `$_POST` and `$_FILES`
     * superglobals when being created from the global scope.
     *
     * @since 4.4.0
     * @var array Contains GET, POST and FILES keys mapping to arrays of data.
     */
    protected $params;
    /**
     * HTTP headers for the request.
     *
     * @since 4.4.0
     * @var array Map of key to value. Key is always lowercase, as per HTTP specification.
     */
    protected $headers = array();
    /**
     * Body data.
     *
     * @since 4.4.0
     * @var string Binary data from the request.
     */
    protected $body = \null;
    /**
     * Route matched for the request.
     *
     * @since 4.4.0
     * @var string
     */
    protected $route;
    /**
     * Attributes (options) for the route that was matched.
     *
     * This is the options array used when the route was registered, typically
     * containing the callback as well as the valid methods for the route.
     *
     * @since 4.4.0
     * @var array Attributes for the request.
     */
    protected $attributes = array();
    /**
     * Used to determine if the JSON data has been parsed yet.
     *
     * Allows lazy-parsing of JSON data where possible.
     *
     * @since 4.4.0
     * @var bool
     */
    protected $parsed_json = \false;
    /**
     * Used to determine if the body data has been parsed yet.
     *
     * @since 4.4.0
     * @var bool
     */
    protected $parsed_body = \false;
    /**
     * Constructor.
     *
     * @since 4.4.0
     *
     * @param string $method     Optional. Request method. Default empty.
     * @param string $route      Optional. Request route. Default empty.
     * @param array  $attributes Optional. Request attributes. Default empty array.
     */
    public function __construct($method = '', $route = '', $attributes = array())
    {
    }
    /**
     * Retrieves the HTTP method for the request.
     *
     * @since 4.4.0
     *
     * @return string HTTP method.
     */
    public function get_method()
    {
    }
    /**
     * Sets HTTP method for the request.
     *
     * @since 4.4.0
     *
     * @param string $method HTTP method.
     */
    public function set_method($method)
    {
    }
    /**
     * Retrieves all headers from the request.
     *
     * @since 4.4.0
     *
     * @return array Map of key to value. Key is always lowercase, as per HTTP specification.
     */
    public function get_headers()
    {
    }
    /**
     * Canonicalizes the header name.
     *
     * Ensures that header names are always treated the same regardless of
     * source. Header names are always case insensitive.
     *
     * Note that we treat `-` (dashes) and `_` (underscores) as the same
     * character, as per header parsing rules in both Apache and nginx.
     *
     * @link https://stackoverflow.com/q/18185366
     * @link https://www.nginx.com/resources/wiki/start/topics/tutorials/config_pitfalls/#missing-disappearing-http-headers
     * @link https://nginx.org/en/docs/http/ngx_http_core_module.html#underscores_in_headers
     *
     * @since 4.4.0
     * @static
     *
     * @param string $key Header name.
     * @return string Canonicalized name.
     */
    public static function canonicalize_header_name($key)
    {
    }
    /**
     * Retrieves the given header from the request.
     *
     * If the header has multiple values, they will be concatenated with a comma
     * as per the HTTP specification. Be aware that some non-compliant headers
     * (notably cookie headers) cannot be joined this way.
     *
     * @since 4.4.0
     *
     * @param string $key Header name, will be canonicalized to lowercase.
     * @return string|null String value if set, null otherwise.
     */
    public function get_header($key)
    {
    }
    /**
     * Retrieves header values from the request.
     *
     * @since 4.4.0
     *
     * @param string $key Header name, will be canonicalized to lowercase.
     * @return array|null List of string values if set, null otherwise.
     */
    public function get_header_as_array($key)
    {
    }
    /**
     * Sets the header on request.
     *
     * @since 4.4.0
     *
     * @param string $key   Header name.
     * @param string $value Header value, or list of values.
     */
    public function set_header($key, $value)
    {
    }
    /**
     * Appends a header value for the given header.
     *
     * @since 4.4.0
     *
     * @param string $key   Header name.
     * @param string $value Header value, or list of values.
     */
    public function add_header($key, $value)
    {
    }
    /**
     * Removes all values for a header.
     *
     * @since 4.4.0
     *
     * @param string $key Header name.
     */
    public function remove_header($key)
    {
    }
    /**
     * Sets headers on the request.
     *
     * @since 4.4.0
     *
     * @param array $headers  Map of header name to value.
     * @param bool  $override If true, replace the request's headers. Otherwise, merge with existing.
     */
    public function set_headers($headers, $override = \true)
    {
    }
    /**
     * Retrieves the content-type of the request.
     *
     * @since 4.4.0
     *
     * @return array Map containing 'value' and 'parameters' keys.
     */
    public function get_content_type()
    {
    }
    /**
     * Retrieves the parameter priority order.
     *
     * Used when checking parameters in get_param().
     *
     * @since 4.4.0
     *
     * @return array List of types to check, in order of priority.
     */
    protected function get_parameter_order()
    {
    }
    /**
     * Retrieves a parameter from the request.
     *
     * @since 4.4.0
     *
     * @param string $key Parameter name.
     * @return mixed|null Value if set, null otherwise.
     */
    public function get_param($key)
    {
    }
    /**
     * Sets a parameter on the request.
     *
     * @since 4.4.0
     *
     * @param string $key   Parameter name.
     * @param mixed  $value Parameter value.
     */
    public function set_param($key, $value)
    {
    }
    /**
     * Retrieves merged parameters from the request.
     *
     * The equivalent of get_param(), but returns all parameters for the request.
     * Handles merging all the available values into a single array.
     *
     * @since 4.4.0
     *
     * @return array Map of key to value.
     */
    public function get_params()
    {
    }
    /**
     * Retrieves parameters from the route itself.
     *
     * These are parsed from the URL using the regex.
     *
     * @since 4.4.0
     *
     * @return array Parameter map of key to value.
     */
    public function get_url_params()
    {
    }
    /**
     * Sets parameters from the route.
     *
     * Typically, this is set after parsing the URL.
     *
     * @since 4.4.0
     *
     * @param array $params Parameter map of key to value.
     */
    public function set_url_params($params)
    {
    }
    /**
     * Retrieves parameters from the query string.
     *
     * These are the parameters you'd typically find in `$_GET`.
     *
     * @since 4.4.0
     *
     * @return array Parameter map of key to value
     */
    public function get_query_params()
    {
    }
    /**
     * Sets parameters from the query string.
     *
     * Typically, this is set from `$_GET`.
     *
     * @since 4.4.0
     *
     * @param array $params Parameter map of key to value.
     */
    public function set_query_params($params)
    {
    }
    /**
     * Retrieves parameters from the body.
     *
     * These are the parameters you'd typically find in `$_POST`.
     *
     * @since 4.4.0
     *
     * @return array Parameter map of key to value.
     */
    public function get_body_params()
    {
    }
    /**
     * Sets parameters from the body.
     *
     * Typically, this is set from `$_POST`.
     *
     * @since 4.4.0
     *
     * @param array $params Parameter map of key to value.
     */
    public function set_body_params($params)
    {
    }
    /**
     * Retrieves multipart file parameters from the body.
     *
     * These are the parameters you'd typically find in `$_FILES`.
     *
     * @since 4.4.0
     *
     * @return array Parameter map of key to value
     */
    public function get_file_params()
    {
    }
    /**
     * Sets multipart file parameters from the body.
     *
     * Typically, this is set from `$_FILES`.
     *
     * @since 4.4.0
     *
     * @param array $params Parameter map of key to value.
     */
    public function set_file_params($params)
    {
    }
    /**
     * Retrieves the default parameters.
     *
     * These are the parameters set in the route registration.
     *
     * @since 4.4.0
     *
     * @return array Parameter map of key to value
     */
    public function get_default_params()
    {
    }
    /**
     * Sets default parameters.
     *
     * These are the parameters set in the route registration.
     *
     * @since 4.4.0
     *
     * @param array $params Parameter map of key to value.
     */
    public function set_default_params($params)
    {
    }
    /**
     * Retrieves the request body content.
     *
     * @since 4.4.0
     *
     * @return string Binary data from the request body.
     */
    public function get_body()
    {
    }
    /**
     * Sets body content.
     *
     * @since 4.4.0
     *
     * @param string $data Binary data from the request body.
     */
    public function set_body($data)
    {
    }
    /**
     * Retrieves the parameters from a JSON-formatted body.
     *
     * @since 4.4.0
     *
     * @return array Parameter map of key to value.
     */
    public function get_json_params()
    {
    }
    /**
     * Parses the JSON parameters.
     *
     * Avoids parsing the JSON data until we need to access it.
     *
     * @since 4.4.0
     * @since 4.7.0 Returns error instance if value cannot be decoded.
     * @return true|WP_Error True if the JSON data was passed or no JSON data was provided, WP_Error if invalid JSON was passed.
     */
    protected function parse_json_params()
    {
    }
    /**
     * Parses the request body parameters.
     *
     * Parses out URL-encoded bodies for request methods that aren't supported
     * natively by PHP. In PHP 5.x, only POST has these parsed automatically.
     *
     * @since 4.4.0
     */
    protected function parse_body_params()
    {
    }
    /**
     * Retrieves the route that matched the request.
     *
     * @since 4.4.0
     *
     * @return string Route matching regex.
     */
    public function get_route()
    {
    }
    /**
     * Sets the route that matched the request.
     *
     * @since 4.4.0
     *
     * @param string $route Route matching regex.
     */
    public function set_route($route)
    {
    }
    /**
     * Retrieves the attributes for the request.
     *
     * These are the options for the route that was matched.
     *
     * @since 4.4.0
     *
     * @return array Attributes for the request.
     */
    public function get_attributes()
    {
    }
    /**
     * Sets the attributes for the request.
     *
     * @since 4.4.0
     *
     * @param array $attributes Attributes for the request.
     */
    public function set_attributes($attributes)
    {
    }
    /**
     * Sanitizes (where possible) the params on the request.
     *
     * This is primarily based off the sanitize_callback param on each registered
     * argument.
     *
     * @since 4.4.0
     *
     * @return true|WP_Error True if parameters were sanitized, WP_Error if an error occurred during sanitization.
     */
    public function sanitize_params()
    {
    }
    /**
     * Checks whether this request is valid according to its attributes.
     *
     * @since 4.4.0
     *
     * @return bool|WP_Error True if there are no parameters to validate or if all pass validation,
     *                       WP_Error if required parameters are missing.
     */
    public function has_valid_params()
    {
    }
    /**
     * Checks if a parameter is set.
     *
     * @since 4.4.0
     *
     * @param string $offset Parameter name.
     * @return bool Whether the parameter is set.
     */
    public function offsetExists($offset)
    {
    }
    /**
     * Retrieves a parameter from the request.
     *
     * @since 4.4.0
     *
     * @param string $offset Parameter name.
     * @return mixed|null Value if set, null otherwise.
     */
    public function offsetGet($offset)
    {
    }
    /**
     * Sets a parameter on the request.
     *
     * @since 4.4.0
     *
     * @param string $offset Parameter name.
     * @param mixed  $value  Parameter value.
     */
    public function offsetSet($offset, $value)
    {
    }
    /**
     * Removes a parameter from the request.
     *
     * @since 4.4.0
     *
     * @param string $offset Parameter name.
     */
    public function offsetUnset($offset)
    {
    }
    /**
     * Retrieves a WP_REST_Request object from a full URL.
     *
     * @static
     * @since 4.5.0
     *
     * @param string $url URL with protocol, domain, path and query args.
     * @return WP_REST_Request|false WP_REST_Request object on success, false on failure.
     */
    public static function from_url($url)
    {
    }
}
/**
 * REST API: WP_REST_Response class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.4.0
 */
/**
 * Core class used to implement a REST response object.
 *
 * @since 4.4.0
 *
 * @see WP_HTTP_Response
 */
class WP_REST_Response extends \WP_HTTP_Response
{
    /**
     * Links related to the response.
     *
     * @since 4.4.0
     * @var array
     */
    protected $links = array();
    /**
     * The route that was to create the response.
     *
     * @since 4.4.0
     * @var string
     */
    protected $matched_route = '';
    /**
     * The handler that was used to create the response.
     *
     * @since 4.4.0
     * @var null|array
     */
    protected $matched_handler = \null;
    /**
     * Adds a link to the response.
     *
     * @internal The $rel parameter is first, as this looks nicer when sending multiple.
     *
     * @since 4.4.0
     *
     * @link https://tools.ietf.org/html/rfc5988
     * @link https://www.iana.org/assignments/link-relations/link-relations.xml
     *
     * @param string $rel        Link relation. Either an IANA registered type,
     *                           or an absolute URL.
     * @param string $href       Target URI for the link.
     * @param array  $attributes Optional. Link parameters to send along with the URL. Default empty array.
     */
    public function add_link($rel, $href, $attributes = array())
    {
    }
    /**
     * Removes a link from the response.
     *
     * @since 4.4.0
     *
     * @param  string $rel  Link relation. Either an IANA registered type, or an absolute URL.
     * @param  string $href Optional. Only remove links for the relation matching the given href.
     *                      Default null.
     */
    public function remove_link($rel, $href = \null)
    {
    }
    /**
     * Adds multiple links to the response.
     *
     * Link data should be an associative array with link relation as the key.
     * The value can either be an associative array of link attributes
     * (including `href` with the URL for the response), or a list of these
     * associative arrays.
     *
     * @since 4.4.0
     *
     * @param array $links Map of link relation to list of links.
     */
    public function add_links($links)
    {
    }
    /**
     * Retrieves links for the response.
     *
     * @since 4.4.0
     *
     * @return array List of links.
     */
    public function get_links()
    {
    }
    /**
     * Sets a single link header.
     *
     * @internal The $rel parameter is first, as this looks nicer when sending multiple.
     *
     * @since 4.4.0
     *
     * @link https://tools.ietf.org/html/rfc5988
     * @link https://www.iana.org/assignments/link-relations/link-relations.xml
     *
     * @param string $rel   Link relation. Either an IANA registered type, or an absolute URL.
     * @param string $link  Target IRI for the link.
     * @param array  $other Optional. Other parameters to send, as an assocative array.
     *                      Default empty array.
     */
    public function link_header($rel, $link, $other = array())
    {
    }
    /**
     * Retrieves the route that was used.
     *
     * @since 4.4.0
     *
     * @return string The matched route.
     */
    public function get_matched_route()
    {
    }
    /**
     * Sets the route (regex for path) that caused the response.
     *
     * @since 4.4.0
     *
     * @param string $route Route name.
     */
    public function set_matched_route($route)
    {
    }
    /**
     * Retrieves the handler that was used to generate the response.
     *
     * @since 4.4.0
     *
     * @return null|array The handler that was used to create the response.
     */
    public function get_matched_handler()
    {
    }
    /**
     * Retrieves the handler that was responsible for generating the response.
     *
     * @since 4.4.0
     *
     * @param array $handler The matched handler.
     */
    public function set_matched_handler($handler)
    {
    }
    /**
     * Checks if the response is an error, i.e. >= 400 response code.
     *
     * @since 4.4.0
     *
     * @return bool Whether the response is an error.
     */
    public function is_error()
    {
    }
    /**
     * Retrieves a WP_Error object from the response.
     *
     * @since 4.4.0
     *
     * @return WP_Error|null WP_Error or null on not an errored response.
     */
    public function as_error()
    {
    }
    /**
     * Retrieves the CURIEs (compact URIs) used for relations.
     *
     * @since 4.5.0
     *
     * @return array Compact URIs.
     */
    public function get_curies()
    {
    }
}
/**
 * REST API: WP_REST_Server class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.4.0
 */
/**
 * Core class used to implement the WordPress REST API server.
 *
 * @since 4.4.0
 */
class WP_REST_Server
{
    /**
     * Alias for GET transport method.
     *
     * @since 4.4.0
     * @var string
     */
    const READABLE = 'GET';
    /**
     * Alias for POST transport method.
     *
     * @since 4.4.0
     * @var string
     */
    const CREATABLE = 'POST';
    /**
     * Alias for POST, PUT, PATCH transport methods together.
     *
     * @since 4.4.0
     * @var string
     */
    const EDITABLE = 'POST, PUT, PATCH';
    /**
     * Alias for DELETE transport method.
     *
     * @since 4.4.0
     * @var string
     */
    const DELETABLE = 'DELETE';
    /**
     * Alias for GET, POST, PUT, PATCH & DELETE transport methods together.
     *
     * @since 4.4.0
     * @var string
     */
    const ALLMETHODS = 'GET, POST, PUT, PATCH, DELETE';
    /**
     * Namespaces registered to the server.
     *
     * @since 4.4.0
     * @var array
     */
    protected $namespaces = array();
    /**
     * Endpoints registered to the server.
     *
     * @since 4.4.0
     * @var array
     */
    protected $endpoints = array();
    /**
     * Options defined for the routes.
     *
     * @since 4.4.0
     * @var array
     */
    protected $route_options = array();
    /**
     * Instantiates the REST server.
     *
     * @since 4.4.0
     */
    public function __construct()
    {
    }
    /**
     * Checks the authentication headers if supplied.
     *
     * @since 4.4.0
     *
     * @return WP_Error|null WP_Error indicates unsuccessful login, null indicates successful
     *                       or no authentication provided
     */
    public function check_authentication()
    {
    }
    /**
     * Converts an error to a response object.
     *
     * This iterates over all error codes and messages to change it into a flat
     * array. This enables simpler client behaviour, as it is represented as a
     * list in JSON rather than an object/map.
     *
     * @since 4.4.0
     *
     * @param WP_Error $error WP_Error instance.
     * @return WP_REST_Response List of associative arrays with code and message keys.
     */
    protected function error_to_response($error)
    {
    }
    /**
     * Retrieves an appropriate error representation in JSON.
     *
     * Note: This should only be used in WP_REST_Server::serve_request(), as it
     * cannot handle WP_Error internally. All callbacks and other internal methods
     * should instead return a WP_Error with the data set to an array that includes
     * a 'status' key, with the value being the HTTP status to send.
     *
     * @since 4.4.0
     *
     * @param string $code    WP_Error-style code.
     * @param string $message Human-readable message.
     * @param int    $status  Optional. HTTP status code to send. Default null.
     * @return string JSON representation of the error
     */
    protected function json_error($code, $message, $status = \null)
    {
    }
    /**
     * Handles serving an API request.
     *
     * Matches the current server URI to a route and runs the first matching
     * callback then outputs a JSON representation of the returned value.
     *
     * @since 4.4.0
     *
     * @see WP_REST_Server::dispatch()
     *
     * @param string $path Optional. The request route. If not set, `$_SERVER['PATH_INFO']` will be used.
     *                     Default null.
     * @return false|null Null if not served and a HEAD request, false otherwise.
     */
    public function serve_request($path = \null)
    {
    }
    /**
     * Converts a response to data to send.
     *
     * @since 4.4.0
     *
     * @param WP_REST_Response $response Response object.
     * @param bool             $embed    Whether links should be embedded.
     * @return array {
     *     Data with sub-requests embedded.
     *
     *     @type array [$_links]    Links.
     *     @type array [$_embedded] Embeddeds.
     * }
     */
    public function response_to_data($response, $embed)
    {
    }
    /**
     * Retrieves links from a response.
     *
     * Extracts the links from a response into a structured hash, suitable for
     * direct output.
     *
     * @since 4.4.0
     * @static
     *
     * @param WP_REST_Response $response Response to extract links from.
     * @return array Map of link relation to list of link hashes.
     */
    public static function get_response_links($response)
    {
    }
    /**
     * Retrieves the CURIEs (compact URIs) used for relations.
     *
     * Extracts the links from a response into a structured hash, suitable for
     * direct output.
     *
     * @since 4.5.0
     * @static
     *
     * @param WP_REST_Response $response Response to extract links from.
     * @return array Map of link relation to list of link hashes.
     */
    public static function get_compact_response_links($response)
    {
    }
    /**
     * Embeds the links from the data into the request.
     *
     * @since 4.4.0
     *
     * @param array $data Data from the request.
     * @return array {
     *     Data with sub-requests embedded.
     *
     *     @type array [$_links]    Links.
     *     @type array [$_embedded] Embeddeds.
     * }
     */
    protected function embed_links($data)
    {
    }
    /**
     * Wraps the response in an envelope.
     *
     * The enveloping technique is used to work around browser/client
     * compatibility issues. Essentially, it converts the full HTTP response to
     * data instead.
     *
     * @since 4.4.0
     *
     * @param WP_REST_Response $response Response object.
     * @param bool             $embed    Whether links should be embedded.
     * @return WP_REST_Response New response with wrapped data
     */
    public function envelope_response($response, $embed)
    {
    }
    /**
     * Registers a route to the server.
     *
     * @since 4.4.0
     *
     * @param string $namespace  Namespace.
     * @param string $route      The REST route.
     * @param array  $route_args Route arguments.
     * @param bool   $override   Optional. Whether the route should be overridden if it already exists.
     *                           Default false.
     */
    public function register_route($namespace, $route, $route_args, $override = \false)
    {
    }
    /**
     * Retrieves the route map.
     *
     * The route map is an associative array with path regexes as the keys. The
     * value is an indexed array with the callback function/method as the first
     * item, and a bitmask of HTTP methods as the second item (see the class
     * constants).
     *
     * Each route can be mapped to more than one callback by using an array of
     * the indexed arrays. This allows mapping e.g. GET requests to one callback
     * and POST requests to another.
     *
     * Note that the path regexes (array keys) must have @ escaped, as this is
     * used as the delimiter with preg_match()
     *
     * @since 4.4.0
     *
     * @return array `'/path/regex' => array( $callback, $bitmask )` or
     *               `'/path/regex' => array( array( $callback, $bitmask ), ...)`.
     */
    public function get_routes()
    {
    }
    /**
     * Retrieves namespaces registered on the server.
     *
     * @since 4.4.0
     *
     * @return array List of registered namespaces.
     */
    public function get_namespaces()
    {
    }
    /**
     * Retrieves specified options for a route.
     *
     * @since 4.4.0
     *
     * @param string $route Route pattern to fetch options for.
     * @return array|null Data as an associative array if found, or null if not found.
     */
    public function get_route_options($route)
    {
    }
    /**
     * Matches the request to a callback and call it.
     *
     * @since 4.4.0
     *
     * @param WP_REST_Request $request Request to attempt dispatching.
     * @return WP_REST_Response Response returned by the callback.
     */
    public function dispatch($request)
    {
    }
    /**
     * Returns if an error occurred during most recent JSON encode/decode.
     *
     * Strings to be translated will be in format like
     * "Encoding error: Maximum stack depth exceeded".
     *
     * @since 4.4.0
     *
     * @return bool|string Boolean false or string error message.
     */
    protected function get_json_last_error()
    {
    }
    /**
     * Retrieves the site index.
     *
     * This endpoint describes the capabilities of the site.
     *
     * @since 4.4.0
     *
     * @param array $request {
     *     Request.
     *
     *     @type string $context Context.
     * }
     * @return array Index entity
     */
    public function get_index($request)
    {
    }
    /**
     * Retrieves the index for a namespace.
     *
     * @since 4.4.0
     *
     * @param WP_REST_Request $request REST request instance.
     * @return WP_REST_Response|WP_Error WP_REST_Response instance if the index was found,
     *                                   WP_Error if the namespace isn't set.
     */
    public function get_namespace_index($request)
    {
    }
    /**
     * Retrieves the publicly-visible data for routes.
     *
     * @since 4.4.0
     *
     * @param array  $routes  Routes to get data for.
     * @param string $context Optional. Context for data. Accepts 'view' or 'help'. Default 'view'.
     * @return array Route data to expose in indexes.
     */
    public function get_data_for_routes($routes, $context = 'view')
    {
    }
    /**
     * Retrieves publicly-visible data for the route.
     *
     * @since 4.4.0
     *
     * @param string $route     Route to get data for.
     * @param array  $callbacks Callbacks to convert to data.
     * @param string $context   Optional. Context for the data. Accepts 'view' or 'help'. Default 'view'.
     * @return array|null Data for the route, or null if no publicly-visible data.
     */
    public function get_data_for_route($route, $callbacks, $context = 'view')
    {
    }
    /**
     * Sends an HTTP status code.
     *
     * @since 4.4.0
     *
     * @param int $code HTTP status.
     */
    protected function set_status($code)
    {
    }
    /**
     * Sends an HTTP header.
     *
     * @since 4.4.0
     *
     * @param string $key Header key.
     * @param string $value Header value.
     */
    public function send_header($key, $value)
    {
    }
    /**
     * Sends multiple HTTP headers.
     *
     * @since 4.4.0
     *
     * @param array $headers Map of header name to header value.
     */
    public function send_headers($headers)
    {
    }
    /**
     * Removes an HTTP header from the current response.
     *
     * @since 4.8.0
     *
     * @param string $key Header key.
     */
    public function remove_header($key)
    {
    }
    /**
     * Retrieves the raw request entity (body).
     *
     * @since 4.4.0
     *
     * @global string $HTTP_RAW_POST_DATA Raw post data.
     *
     * @return string Raw request data.
     */
    public static function get_raw_data()
    {
    }
    /**
     * Extracts headers from a PHP-style $_SERVER array.
     *
     * @since 4.4.0
     *
     * @param array $server Associative array similar to `$_SERVER`.
     * @return array Headers extracted from the input.
     */
    public function get_headers($server)
    {
    }
}
/**
 * REST API: WP_REST_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core base controller for managing and interacting with REST API items.
 *
 * @since 4.7.0
 */
abstract class WP_REST_Controller
{
    /**
     * The namespace of this controller's route.
     *
     * @since 4.7.0
     * @var string
     */
    protected $namespace;
    /**
     * The base of this controller's route.
     *
     * @since 4.7.0
     * @var string
     */
    protected $rest_base;
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     */
    public function register_routes()
    {
    }
    /**
     * Checks if a given request has access to get items.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves a collection of items.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Checks if a given request has access to get a specific item.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool True if the request has read access for the item, WP_Error object otherwise.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Retrieves one item from the collection.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Checks if a given request has access to create items.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool True if the request has access to create items, WP_Error object otherwise.
     */
    public function create_item_permissions_check($request)
    {
    }
    /**
     * Creates one item from the collection.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function create_item($request)
    {
    }
    /**
     * Checks if a given request has access to update a specific item.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool True if the request has access to update the item, WP_Error object otherwise.
     */
    public function update_item_permissions_check($request)
    {
    }
    /**
     * Updates one item from the collection.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Checks if a given request has access to delete a specific item.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool True if the request has access to delete the item, WP_Error object otherwise.
     */
    public function delete_item_permissions_check($request)
    {
    }
    /**
     * Deletes one item from the collection.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function delete_item($request)
    {
    }
    /**
     * Prepares one item for create or update operation.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Request object.
     * @return WP_Error|object The prepared item, or WP_Error object on failure.
     */
    protected function prepare_item_for_database($request)
    {
    }
    /**
     * Prepares the item for the REST response.
     *
     * @since 4.7.0
     *
     * @param mixed           $item    WordPress representation of the item.
     * @param WP_REST_Request $request Request object.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function prepare_item_for_response($item, $request)
    {
    }
    /**
     * Prepares a response for insertion into a collection.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Response $response Response object.
     * @return array|mixed Response data, ready for insertion into collection data.
     */
    public function prepare_response_for_collection($response)
    {
    }
    /**
     * Filters a response based on the context defined in the schema.
     *
     * @since 4.7.0
     *
     * @param array  $data    Response data to fiter.
     * @param string $context Context defined in the schema.
     * @return array Filtered response.
     */
    public function filter_response_by_context($data, $context)
    {
    }
    /**
     * Retrieves the item's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the item's schema for display / public consumption purposes.
     *
     * @since 4.7.0
     *
     * @return array Public item schema data.
     */
    public function get_public_item_schema()
    {
    }
    /**
     * Retrieves the query params for the collections.
     *
     * @since 4.7.0
     *
     * @return array Query parameters for the collection.
     */
    public function get_collection_params()
    {
    }
    /**
     * Retrieves the magical context param.
     *
     * Ensures consistent descriptions between endpoints, and populates enum from schema.
     *
     * @since 4.7.0
     *
     * @param array $args Optional. Additional arguments for context parameter. Default empty array.
     * @return array Context parameter details.
     */
    public function get_context_param($args = array())
    {
    }
    /**
     * Adds the values from additional fields to a data object.
     *
     * @since 4.7.0
     *
     * @param array           $object  Data object.
     * @param WP_REST_Request $request Full details about the request.
     * @return array Modified data object with additional fields.
     */
    protected function add_additional_fields_to_object($object, $request)
    {
    }
    /**
     * Updates the values of additional fields added to a data object.
     *
     * @since 4.7.0
     *
     * @param array           $object  Data Object.
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True on success, WP_Error object if a field cannot be updated.
     */
    protected function update_additional_fields_for_object($object, $request)
    {
    }
    /**
     * Adds the schema from additional fields to a schema array.
     *
     * The type of object is inferred from the passed schema.
     *
     * @since 4.7.0
     *
     * @param array $schema Schema array.
     * @return array Modified Schema array.
     */
    protected function add_additional_fields_schema($schema)
    {
    }
    /**
     * Retrieves all of the registered additional fields for a given object-type.
     *
     * @since 4.7.0
     *
     * @param  string $object_type Optional. The object type.
     * @return array Registered additional fields (if any), empty array if none or if the object type could
     *               not be inferred.
     */
    protected function get_additional_fields($object_type = \null)
    {
    }
    /**
     * Retrieves the object type this controller is responsible for managing.
     *
     * @since 4.7.0
     *
     * @return string Object type for the controller.
     */
    protected function get_object_type()
    {
    }
    /**
     * Gets an array of fields to be included on the response.
     *
     * Included fields are based on item schema and `_fields=` request argument.
     *
     * @since 4.9.6
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return array Fields to be included in the response.
     */
    public function get_fields_for_response($request)
    {
    }
    /**
     * Retrieves an array of endpoint arguments from the item schema for the controller.
     *
     * @since 4.7.0
     *
     * @param string $method Optional. HTTP method of the request. The arguments for `CREATABLE` requests are
     *                       checked for required values and may fall-back to a given default, this is not done
     *                       on `EDITABLE` requests. Default WP_REST_Server::CREATABLE.
     * @return array Endpoint arguments.
     */
    public function get_endpoint_args_for_item_schema($method = \WP_REST_Server::CREATABLE)
    {
    }
    /**
     * Sanitizes the slug value.
     *
     * @since 4.7.0
     *
     * @internal We can't use sanitize_title() directly, as the second
     * parameter is the fallback title, which would end up being set to the
     * request object.
     *
     * @see https://github.com/WP-API/WP-API/issues/1585
     *
     * @todo Remove this in favour of https://core.trac.wordpress.org/ticket/34659
     *
     * @param string $slug Slug value passed in request.
     * @return string Sanitized value for the slug.
     */
    public function sanitize_slug($slug)
    {
    }
}
/**
 * REST API: WP_REST_Posts_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class to access posts via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Posts_Controller extends \WP_REST_Controller
{
    /**
     * Post type.
     *
     * @since 4.7.0
     * @var string
     */
    protected $post_type;
    /**
     * Instance of a post meta fields object.
     *
     * @since 4.7.0
     * @var WP_REST_Post_Meta_Fields
     */
    protected $meta;
    /**
     * Constructor.
     *
     * @since 4.7.0
     *
     * @param string $post_type Post type.
     */
    public function __construct($post_type)
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks if a given request has access to read posts.
     *
     * @since 4.7.0
     *
     * @param  WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves a collection of posts.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Get the post, if the ID is valid.
     *
     * @since 4.7.2
     *
     * @param int $id Supplied ID.
     * @return WP_Post|WP_Error Post object if ID is valid, WP_Error otherwise.
     */
    protected function get_post($id)
    {
    }
    /**
     * Checks if a given request has access to read a post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has read access for the item, WP_Error object otherwise.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Checks if the user can access password-protected content.
     *
     * This method determines whether we need to override the regular password
     * check in core with a filter.
     *
     * @since 4.7.0
     *
     * @param WP_Post         $post    Post to check against.
     * @param WP_REST_Request $request Request data to check.
     * @return bool True if the user can access password-protected content, otherwise false.
     */
    public function can_access_password_content($post, $request)
    {
    }
    /**
     * Retrieves a single post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Checks if a given request has access to create a post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to create items, WP_Error object otherwise.
     */
    public function create_item_permissions_check($request)
    {
    }
    /**
     * Creates a single post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function create_item($request)
    {
    }
    /**
     * Checks if a given request has access to update a post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to update the item, WP_Error object otherwise.
     */
    public function update_item_permissions_check($request)
    {
    }
    /**
     * Updates a single post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Checks if a given request has access to delete a post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to delete the item, WP_Error object otherwise.
     */
    public function delete_item_permissions_check($request)
    {
    }
    /**
     * Deletes a single post.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function delete_item($request)
    {
    }
    /**
     * Determines the allowed query_vars for a get_items() response and prepares
     * them for WP_Query.
     *
     * @since 4.7.0
     *
     * @param array           $prepared_args Optional. Prepared WP_Query arguments. Default empty array.
     * @param WP_REST_Request $request       Optional. Full details about the request.
     * @return array Items query arguments.
     */
    protected function prepare_items_query($prepared_args = array(), $request = \null)
    {
    }
    /**
     * Checks the post_date_gmt or modified_gmt and prepare any post or
     * modified date for single post output.
     *
     * @since 4.7.0
     *
     * @param string      $date_gmt GMT publication time.
     * @param string|null $date     Optional. Local publication time. Default null.
     * @return string|null ISO8601/RFC3339 formatted datetime.
     */
    protected function prepare_date_response($date_gmt, $date = \null)
    {
    }
    /**
     * Prepares a single post for create or update.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Request object.
     * @return stdClass|WP_Error Post object or WP_Error.
     */
    protected function prepare_item_for_database($request)
    {
    }
    /**
     * Determines validity and normalizes the given status parameter.
     *
     * @since 4.7.0
     *
     * @param string $post_status Post status.
     * @param object $post_type   Post type.
     * @return string|WP_Error Post status or WP_Error if lacking the proper permission.
     */
    protected function handle_status_param($post_status, $post_type)
    {
    }
    /**
     * Determines the featured media based on a request param.
     *
     * @since 4.7.0
     *
     * @param int $featured_media Featured Media ID.
     * @param int $post_id        Post ID.
     * @return bool|WP_Error Whether the post thumbnail was successfully deleted, otherwise WP_Error.
     */
    protected function handle_featured_media($featured_media, $post_id)
    {
    }
    /**
     * Check whether the template is valid for the given post.
     *
     * @since 4.9.0
     *
     * @param string          $template Page template filename.
     * @param WP_REST_Request $request  Request.
     * @return bool|WP_Error True if template is still valid or if the same as existing value, or false if template not supported.
     */
    public function check_template($template, $request)
    {
    }
    /**
     * Sets the template for a post.
     *
     * @since 4.7.0
     * @since 4.9.0 Introduced the $validate parameter.
     *
     * @param string  $template Page template filename.
     * @param integer $post_id  Post ID.
     * @param bool    $validate Whether to validate that the template selected is valid.
     */
    public function handle_template($template, $post_id, $validate = \false)
    {
    }
    /**
     * Updates the post's terms from a REST request.
     *
     * @since 4.7.0
     *
     * @param int             $post_id The post ID to update the terms form.
     * @param WP_REST_Request $request The request object with post and terms data.
     * @return null|WP_Error WP_Error on an error assigning any of the terms, otherwise null.
     */
    protected function handle_terms($post_id, $request)
    {
    }
    /**
     * Checks whether current user can assign all terms sent with the current request.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request The request object with post and terms data.
     * @return bool Whether the current user can assign the provided terms.
     */
    protected function check_assign_terms_permission($request)
    {
    }
    /**
     * Checks if a given post type can be viewed or managed.
     *
     * @since 4.7.0
     *
     * @param object|string $post_type Post type name or object.
     * @return bool Whether the post type is allowed in REST.
     */
    protected function check_is_post_type_allowed($post_type)
    {
    }
    /**
     * Checks if a post can be read.
     *
     * Correctly handles posts with the inherit status.
     *
     * @since 4.7.0
     *
     * @param object $post Post object.
     * @return bool Whether the post can be read.
     */
    public function check_read_permission($post)
    {
    }
    /**
     * Checks if a post can be edited.
     *
     * @since 4.7.0
     *
     * @param object $post Post object.
     * @return bool Whether the post can be edited.
     */
    protected function check_update_permission($post)
    {
    }
    /**
     * Checks if a post can be created.
     *
     * @since 4.7.0
     *
     * @param object $post Post object.
     * @return bool Whether the post can be created.
     */
    protected function check_create_permission($post)
    {
    }
    /**
     * Checks if a post can be deleted.
     *
     * @since 4.7.0
     *
     * @param object $post Post object.
     * @return bool Whether the post can be deleted.
     */
    protected function check_delete_permission($post)
    {
    }
    /**
     * Prepares a single post output for response.
     *
     * @since 4.7.0
     *
     * @param WP_Post         $post    Post object.
     * @param WP_REST_Request $request Request object.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($post, $request)
    {
    }
    /**
     * Overwrites the default protected title format.
     *
     * By default, WordPress will show password protected posts with a title of
     * "Protected: %s", as the REST API communicates the protected status of a post
     * in a machine readable format, we remove the "Protected: " prefix.
     *
     * @since 4.7.0
     *
     * @return string Protected title format.
     */
    public function protected_title_format()
    {
    }
    /**
     * Prepares links for the request.
     *
     * @since 4.7.0
     *
     * @param WP_Post $post Post object.
     * @return array Links for the given post.
     */
    protected function prepare_links($post)
    {
    }
    /**
     * Get the link relations available for the post and current user.
     *
     * @since 4.9.8
     *
     * @param WP_Post $post Post object.
     * @param WP_REST_Request Request object.
     *
     * @return array List of link relations.
     */
    protected function get_available_actions($post, $request)
    {
    }
    /**
     * Retrieves the post's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieve Link Description Objects that should be added to the Schema for the posts collection.
     *
     * @since 4.9.8
     *
     * @return array
     */
    protected function get_schema_links()
    {
    }
    /**
     * Retrieves the query params for the posts collection.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
    /**
     * Sanitizes and validates the list of post statuses, including whether the
     * user can query private statuses.
     *
     * @since 4.7.0
     *
     * @param  string|array    $statuses  One or more post statuses.
     * @param  WP_REST_Request $request   Full details about the request.
     * @param  string          $parameter Additional parameter to pass to validation.
     * @return array|WP_Error A list of valid statuses, otherwise WP_Error object.
     */
    public function sanitize_post_statuses($statuses, $request, $parameter)
    {
    }
}
/**
 * REST API: WP_REST_Attachments_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core controller used to access attachments via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Posts_Controller
 */
class WP_REST_Attachments_Controller extends \WP_REST_Posts_Controller
{
    /**
     * Determines the allowed query_vars for a get_items() response and
     * prepares for WP_Query.
     *
     * @since 4.7.0
     *
     * @param array           $prepared_args Optional. Array of prepared arguments. Default empty array.
     * @param WP_REST_Request $request       Optional. Request to prepare items for.
     * @return array Array of query arguments.
     */
    protected function prepare_items_query($prepared_args = array(), $request = \null)
    {
    }
    /**
     * Checks if a given request has access to create an attachment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|true Boolean true if the attachment may be created, or a WP_Error if not.
     */
    public function create_item_permissions_check($request)
    {
    }
    /**
     * Creates a single attachment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, WP_Error object on failure.
     */
    public function create_item($request)
    {
    }
    /**
     * Updates a single attachment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, WP_Error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Prepares a single attachment for create or update.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Request object.
     * @return WP_Error|stdClass $prepared_attachment Post object.
     */
    protected function prepare_item_for_database($request)
    {
    }
    /**
     * Prepares a single attachment output for response.
     *
     * @since 4.7.0
     *
     * @param WP_Post         $post    Attachment object.
     * @param WP_REST_Request $request Request object.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($post, $request)
    {
    }
    /**
     * Retrieves the attachment's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema as an array.
     */
    public function get_item_schema()
    {
    }
    /**
     * Handles an upload via raw POST data.
     *
     * @since 4.7.0
     *
     * @param array $data    Supplied file data.
     * @param array $headers HTTP headers from the request.
     * @return array|WP_Error Data from wp_handle_sideload().
     */
    protected function upload_from_data($data, $headers)
    {
    }
    /**
     * Parses filename from a Content-Disposition header value.
     *
     * As per RFC6266:
     *
     *     content-disposition = "Content-Disposition" ":"
     *                            disposition-type *( ";" disposition-parm )
     *
     *     disposition-type    = "inline" | "attachment" | disp-ext-type
     *                         ; case-insensitive
     *     disp-ext-type       = token
     *
     *     disposition-parm    = filename-parm | disp-ext-parm
     *
     *     filename-parm       = "filename" "=" value
     *                         | "filename*" "=" ext-value
     *
     *     disp-ext-parm       = token "=" value
     *                         | ext-token "=" ext-value
     *     ext-token           = <the characters in token, followed by "*">
     *
     * @since 4.7.0
     *
     * @link http://tools.ietf.org/html/rfc2388
     * @link http://tools.ietf.org/html/rfc6266
     *
     * @param string[] $disposition_header List of Content-Disposition header values.
     * @return string|null Filename if available, or null if not found.
     */
    public static function get_filename_from_disposition($disposition_header)
    {
    }
    /**
     * Retrieves the query params for collections of attachments.
     *
     * @since 4.7.0
     *
     * @return array Query parameters for the attachment collection as an array.
     */
    public function get_collection_params()
    {
    }
    /**
     * Validates whether the user can query private statuses.
     *
     * @since 4.7.0
     *
     * @param mixed           $value     Status value.
     * @param WP_REST_Request $request   Request object.
     * @param string          $parameter Additional parameter to pass for validation.
     * @return WP_Error|bool True if the user may query, WP_Error if not.
     */
    public function validate_user_can_query_private_statuses($value, $request, $parameter)
    {
    }
    /**
     * Handles an upload via multipart/form-data ($_FILES).
     *
     * @since 4.7.0
     *
     * @param array $files   Data from the `$_FILES` superglobal.
     * @param array $headers HTTP headers from the request.
     * @return array|WP_Error Data from wp_handle_upload().
     */
    protected function upload_from_file($files, $headers)
    {
    }
    /**
     * Retrieves the supported media types.
     *
     * Media types are considered the MIME type category.
     *
     * @since 4.7.0
     *
     * @return array Array of supported media types.
     */
    protected function get_media_types()
    {
    }
    /**
     * Determine if uploaded file exceeds space quota on multisite.
     *
     * Replicates check_upload_size().
     *
     * @since 4.9.8
     *
     * @param array $file $_FILES array for a given file.
     * @return true|WP_Error True if can upload, error for errors.
     */
    protected function check_upload_size($file)
    {
    }
}
/**
 * REST API: WP_REST_Comments_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core controller used to access comments via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Comments_Controller extends \WP_REST_Controller
{
    /**
     * Instance of a comment meta fields object.
     *
     * @since 4.7.0
     * @var WP_REST_Comment_Meta_Fields
     */
    protected $meta;
    /**
     * Constructor.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     */
    public function register_routes()
    {
    }
    /**
     * Checks if a given request has access to read comments.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has read access, error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves a list of comment items.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Get the comment, if the ID is valid.
     *
     * @since 4.7.2
     *
     * @param int $id Supplied ID.
     * @return WP_Comment|WP_Error Comment object if ID is valid, WP_Error otherwise.
     */
    protected function get_comment($id)
    {
    }
    /**
     * Checks if a given request has access to read the comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has read access for the item, error object otherwise.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Retrieves a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Checks if a given request has access to create a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has access to create items, error object otherwise.
     */
    public function create_item_permissions_check($request)
    {
    }
    /**
     * Creates a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or error object on failure.
     */
    public function create_item($request)
    {
    }
    /**
     * Checks if a given REST request has access to update a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has access to update the item, error object otherwise.
     */
    public function update_item_permissions_check($request)
    {
    }
    /**
     * Updates a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Checks if a given request has access to delete a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has access to delete the item, error object otherwise.
     */
    public function delete_item_permissions_check($request)
    {
    }
    /**
     * Deletes a comment.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or error object on failure.
     */
    public function delete_item($request)
    {
    }
    /**
     * Prepares a single comment output for response.
     *
     * @since 4.7.0
     *
     * @param WP_Comment      $comment Comment object.
     * @param WP_REST_Request $request Request object.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($comment, $request)
    {
    }
    /**
     * Prepares links for the request.
     *
     * @since 4.7.0
     *
     * @param WP_Comment $comment Comment object.
     * @return array Links for the given comment.
     */
    protected function prepare_links($comment)
    {
    }
    /**
     * Prepends internal property prefix to query parameters to match our response fields.
     *
     * @since 4.7.0
     *
     * @param string $query_param Query parameter.
     * @return string The normalized query parameter.
     */
    protected function normalize_query_param($query_param)
    {
    }
    /**
     * Checks comment_approved to set comment status for single comment output.
     *
     * @since 4.7.0
     *
     * @param string|int $comment_approved comment status.
     * @return string Comment status.
     */
    protected function prepare_status_response($comment_approved)
    {
    }
    /**
     * Prepares a single comment to be inserted into the database.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Request object.
     * @return array|WP_Error Prepared comment, otherwise WP_Error object.
     */
    protected function prepare_item_for_database($request)
    {
    }
    /**
     * Retrieves the comment's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Comments collection parameters.
     */
    public function get_collection_params()
    {
    }
    /**
     * Sets the comment_status of a given comment object when creating or updating a comment.
     *
     * @since 4.7.0
     *
     * @param string|int $new_status New comment status.
     * @param int        $comment_id Comment ID.
     * @return bool Whether the status was changed.
     */
    protected function handle_status_param($new_status, $comment_id)
    {
    }
    /**
     * Checks if the post can be read.
     *
     * Correctly handles posts with the inherit status.
     *
     * @since 4.7.0
     *
     * @param WP_Post         $post    Post object.
     * @param WP_REST_Request $request Request data to check.
     * @return bool Whether post can be read.
     */
    protected function check_read_post_permission($post, $request)
    {
    }
    /**
     * Checks if the comment can be read.
     *
     * @since 4.7.0
     *
     * @param WP_Comment      $comment Comment object.
     * @param WP_REST_Request $request Request data to check.
     * @return bool Whether the comment can be read.
     */
    protected function check_read_permission($comment, $request)
    {
    }
    /**
     * Checks if a comment can be edited or deleted.
     *
     * @since 4.7.0
     *
     * @param object $comment Comment object.
     * @return bool Whether the comment can be edited or deleted.
     */
    protected function check_edit_permission($comment)
    {
    }
    /**
     * Checks a comment author email for validity.
     *
     * Accepts either a valid email address or empty string as a valid comment
     * author email address. Setting the comment author email to an empty
     * string is allowed when a comment is being updated.
     *
     * @since 4.7.0
     *
     * @param string          $value   Author email value submitted.
     * @param WP_REST_Request $request Full details about the request.
     * @param string          $param   The parameter name.
     * @return WP_Error|string The sanitized email address, if valid,
     *                         otherwise an error.
     */
    public function check_comment_author_email($value, $request, $param)
    {
    }
}
/**
 * REST API: WP_REST_Post_Statuses_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to access post statuses via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Post_Statuses_Controller extends \WP_REST_Controller
{
    /**
     * Constructor.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks whether a given request has permission to read post statuses.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves all post statuses, depending on user context.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Checks if a given request has access to read a post status.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|bool True if the request has read access for the item, WP_Error object otherwise.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Checks whether a given post status should be visible.
     *
     * @since 4.7.0
     *
     * @param object $status Post status.
     * @return bool True if the post status is visible, otherwise false.
     */
    protected function check_read_permission($status)
    {
    }
    /**
     * Retrieves a specific post status.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Prepares a post status object for serialization.
     *
     * @since 4.7.0
     *
     * @param stdClass        $status  Post status data.
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response Post status data.
     */
    public function prepare_item_for_response($status, $request)
    {
    }
    /**
     * Retrieves the post status' schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
}
/**
 * REST API: WP_REST_Post_Types_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class to access post types via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Post_Types_Controller extends \WP_REST_Controller
{
    /**
     * Constructor.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks whether a given request has permission to read types.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|true True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves all public post types.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Retrieves a specific post type.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_Error|WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Prepares a post type object for serialization.
     *
     * @since 4.7.0
     *
     * @param stdClass        $post_type Post type data.
     * @param WP_REST_Request $request   Full details about the request.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($post_type, $request)
    {
    }
    /**
     * Retrieves the post type's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
}
/**
 * REST API: WP_REST_Revisions_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to access revisions via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Revisions_Controller extends \WP_REST_Controller
{
    /**
     * Parent post type.
     *
     * @since 4.7.0
     * @var string
     */
    private $parent_post_type;
    /**
     * Parent controller.
     *
     * @since 4.7.0
     * @var WP_REST_Controller
     */
    private $parent_controller;
    /**
     * The base of the parent controller's route.
     *
     * @since 4.7.0
     * @var string
     */
    private $parent_base;
    /**
     * Constructor.
     *
     * @since 4.7.0
     *
     * @param string $parent_post_type Post type of the parent.
     */
    public function __construct($parent_post_type)
    {
    }
    /**
     * Registers routes for revisions based on post types supporting revisions.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Get the parent post, if the ID is valid.
     *
     * @since 4.7.2
     *
     * @param int $id Supplied ID.
     * @return WP_Post|WP_Error Post object if ID is valid, WP_Error otherwise.
     */
    protected function get_parent($parent)
    {
    }
    /**
     * Checks if a given request has access to get revisions.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return true|WP_Error True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Get the revision, if the ID is valid.
     *
     * @since 4.7.2
     *
     * @param int $id Supplied ID.
     * @return WP_Post|WP_Error Revision post object if ID is valid, WP_Error otherwise.
     */
    protected function get_revision($id)
    {
    }
    /**
     * Gets a collection of revisions.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Checks if a given request has access to get a specific revision.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return bool|WP_Error True if the request has read access for the item, WP_Error object otherwise.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Retrieves one revision from the collection.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Checks if a given request has access to delete a revision.
     *
     * @since 4.7.0
     *
     * @param  WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has access to delete the item, WP_Error object otherwise.
     */
    public function delete_item_permissions_check($request)
    {
    }
    /**
     * Deletes a single revision.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True on success, or WP_Error object on failure.
     */
    public function delete_item($request)
    {
    }
    /**
     * Prepares the revision for the REST response.
     *
     * @since 4.7.0
     *
     * @param WP_Post         $post    Post revision object.
     * @param WP_REST_Request $request Request object.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($post, $request)
    {
    }
    /**
     * Checks the post_date_gmt or modified_gmt and prepare any post or
     * modified date for single post output.
     *
     * @since 4.7.0
     *
     * @param string      $date_gmt GMT publication time.
     * @param string|null $date     Optional. Local publication time. Default null.
     * @return string|null ISO8601/RFC3339 formatted datetime, otherwise null.
     */
    protected function prepare_date_response($date_gmt, $date = \null)
    {
    }
    /**
     * Retrieves the revision's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
    /**
     * Checks the post excerpt and prepare it for single post output.
     *
     * @since 4.7.0
     *
     * @param string  $excerpt The post excerpt.
     * @param WP_Post $post    Post revision object.
     * @return string Prepared excerpt or empty string.
     */
    protected function prepare_excerpt_response($excerpt, $post)
    {
    }
}
/**
 * REST API: WP_REST_Settings_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to manage a site's settings via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Settings_Controller extends \WP_REST_Controller
{
    /**
     * Constructor.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks if a given request has access to read and manage settings.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool True if the request has read access for the item, otherwise false.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Retrieves the settings.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return array|WP_Error Array on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Prepares a value for output based off a schema array.
     *
     * @since 4.7.0
     *
     * @param mixed $value  Value to prepare.
     * @param array $schema Schema to match.
     * @return mixed The prepared value.
     */
    protected function prepare_value($value, $schema)
    {
    }
    /**
     * Updates settings for the settings object.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return array|WP_Error Array on success, or error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Retrieves all of the registered options for the Settings API.
     *
     * @since 4.7.0
     *
     * @return array Array of registered options.
     */
    protected function get_registered_options()
    {
    }
    /**
     * Retrieves the site setting schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Custom sanitize callback used for all options to allow the use of 'null'.
     *
     * By default, the schema of settings will throw an error if a value is set to
     * `null` as it's not a valid value for something like "type => string". We
     * provide a wrapper sanitizer to whitelist the use of `null`.
     *
     * @since 4.7.0
     *
     * @param  mixed           $value   The value for the setting.
     * @param  WP_REST_Request $request The request object.
     * @param  string          $param   The parameter name.
     * @return mixed|WP_Error
     */
    public function sanitize_callback($value, $request, $param)
    {
    }
    /**
     * Recursively add additionalProperties = false to all objects in a schema.
     *
     * This is need to restrict properties of objects in settings values to only
     * registered items, as the REST API will allow additional properties by
     * default.
     *
     * @since 4.9.0
     *
     * @param array $schema The schema array.
     * @return array
     */
    protected function set_additional_properties_to_false($schema)
    {
    }
}
/**
 * REST API: WP_REST_Taxonomies_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to manage taxonomies via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Taxonomies_Controller extends \WP_REST_Controller
{
    /**
     * Constructor.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks whether a given request has permission to read taxonomies.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves all public taxonomies.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Checks if a given request has access to a taxonomy.
     *
     * @since 4.7.0
     *
     * @param  WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has read access for the item, otherwise false or WP_Error object.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Retrieves a specific taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Prepares a taxonomy object for serialization.
     *
     * @since 4.7.0
     *
     * @param stdClass        $taxonomy Taxonomy data.
     * @param WP_REST_Request $request  Full details about the request.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($taxonomy, $request)
    {
    }
    /**
     * Retrieves the taxonomy's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
}
/**
 * REST API: WP_REST_Terms_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to managed terms associated with a taxonomy via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Terms_Controller extends \WP_REST_Controller
{
    /**
     * Taxonomy key.
     *
     * @since 4.7.0
     * @var string
     */
    protected $taxonomy;
    /**
     * Instance of a term meta fields object.
     *
     * @since 4.7.0
     * @var WP_REST_Term_Meta_Fields
     */
    protected $meta;
    /**
     * Column to have the terms be sorted by.
     *
     * @since 4.7.0
     * @var string
     */
    protected $sort_column;
    /**
     * Number of terms that were found.
     *
     * @since 4.7.0
     * @var int
     */
    protected $total_terms;
    /**
     * Constructor.
     *
     * @since 4.7.0
     *
     * @param string $taxonomy Taxonomy key.
     */
    public function __construct($taxonomy)
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks if a request has access to read terms in the specified taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has read access, otherwise false or WP_Error object.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves terms associated with a taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Get the term, if the ID is valid.
     *
     * @since 4.7.2
     *
     * @param int $id Supplied ID.
     * @return WP_Term|WP_Error Term object if ID is valid, WP_Error otherwise.
     */
    protected function get_term($id)
    {
    }
    /**
     * Checks if a request has access to read or edit the specified term.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has read access for the item, otherwise false or WP_Error object.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Gets a single term from a taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Checks if a request has access to create a term.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has access to create items, false or WP_Error object otherwise.
     */
    public function create_item_permissions_check($request)
    {
    }
    /**
     * Creates a single term in a taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function create_item($request)
    {
    }
    /**
     * Checks if a request has access to update the specified term.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has access to update the item, false or WP_Error object otherwise.
     */
    public function update_item_permissions_check($request)
    {
    }
    /**
     * Updates a single term from a taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Checks if a request has access to delete the specified term.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return bool|WP_Error True if the request has access to delete the item, otherwise false or WP_Error object.
     */
    public function delete_item_permissions_check($request)
    {
    }
    /**
     * Deletes a single term from a taxonomy.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function delete_item($request)
    {
    }
    /**
     * Prepares a single term for create or update.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Request object.
     * @return object $prepared_term Term object.
     */
    public function prepare_item_for_database($request)
    {
    }
    /**
     * Prepares a single term output for response.
     *
     * @since 4.7.0
     *
     * @param obj             $item    Term object.
     * @param WP_REST_Request $request Request object.
     * @return WP_REST_Response $response Response object.
     */
    public function prepare_item_for_response($item, $request)
    {
    }
    /**
     * Prepares links for the request.
     *
     * @since 4.7.0
     *
     * @param object $term Term object.
     * @return array Links for the given term.
     */
    protected function prepare_links($term)
    {
    }
    /**
     * Retrieves the term's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
    /**
     * Checks that the taxonomy is valid.
     *
     * @since 4.7.0
     *
     * @param string $taxonomy Taxonomy to check.
     * @return bool Whether the taxonomy is allowed for REST management.
     */
    protected function check_is_taxonomy_allowed($taxonomy)
    {
    }
}
/**
 * REST API: WP_REST_Users_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to manage users via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Users_Controller extends \WP_REST_Controller
{
    /**
     * Instance of a user meta fields object.
     *
     * @since 4.7.0
     * @var WP_REST_User_Meta_Fields
     */
    protected $meta;
    /**
     * Constructor.
     *
     * @since 4.7.0
     */
    public function __construct()
    {
    }
    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes()
    {
    }
    /**
     * Checks for a valid value for the reassign parameter when deleting users.
     *
     * The value can be an integer, 'false', false, or ''.
     *
     * @since 4.7.0
     *
     * @param int|bool        $value   The value passed to the reassign parameter.
     * @param WP_REST_Request $request Full details about the request.
     * @param string          $param   The parameter that is being sanitized.
     *
     * @return int|bool|WP_Error
     */
    public function check_reassign($value, $request, $param)
    {
    }
    /**
     * Permissions check for getting all users.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has read access, otherwise WP_Error object.
     */
    public function get_items_permissions_check($request)
    {
    }
    /**
     * Retrieves all users.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_items($request)
    {
    }
    /**
     * Get the user, if the ID is valid.
     *
     * @since 4.7.2
     *
     * @param int $id Supplied ID.
     * @return WP_User|WP_Error True if ID is valid, WP_Error otherwise.
     */
    protected function get_user($id)
    {
    }
    /**
     * Checks if a given request has access to read a user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has read access for the item, otherwise WP_Error object.
     */
    public function get_item_permissions_check($request)
    {
    }
    /**
     * Retrieves a single user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_item($request)
    {
    }
    /**
     * Retrieves the current user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_current_item($request)
    {
    }
    /**
     * Checks if a given request has access create users.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to create items, WP_Error object otherwise.
     */
    public function create_item_permissions_check($request)
    {
    }
    /**
     * Creates a single user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function create_item($request)
    {
    }
    /**
     * Checks if a given request has access to update a user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to update the item, WP_Error object otherwise.
     */
    public function update_item_permissions_check($request)
    {
    }
    /**
     * Updates a single user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function update_item($request)
    {
    }
    /**
     * Checks if a given request has access to update the current user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to update the item, WP_Error object otherwise.
     */
    public function update_current_item_permissions_check($request)
    {
    }
    /**
     * Updates the current user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    function update_current_item($request)
    {
    }
    /**
     * Checks if a given request has access delete a user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to delete the item, WP_Error object otherwise.
     */
    public function delete_item_permissions_check($request)
    {
    }
    /**
     * Deletes a single user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function delete_item($request)
    {
    }
    /**
     * Checks if a given request has access to delete the current user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return true|WP_Error True if the request has access to delete the item, WP_Error object otherwise.
     */
    public function delete_current_item_permissions_check($request)
    {
    }
    /**
     * Deletes the current user.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    function delete_current_item($request)
    {
    }
    /**
     * Prepares a single user output for response.
     *
     * @since 4.7.0
     *
     * @param WP_User         $user    User object.
     * @param WP_REST_Request $request Request object.
     * @return WP_REST_Response Response object.
     */
    public function prepare_item_for_response($user, $request)
    {
    }
    /**
     * Prepares links for the user request.
     *
     * @since 4.7.0
     *
     * @param WP_Post $user User object.
     * @return array Links for the given user.
     */
    protected function prepare_links($user)
    {
    }
    /**
     * Prepares a single user for creation or update.
     *
     * @since 4.7.0
     *
     * @param WP_REST_Request $request Request object.
     * @return object $prepared_user User object.
     */
    protected function prepare_item_for_database($request)
    {
    }
    /**
     * Determines if the current user is allowed to make the desired roles change.
     *
     * @since 4.7.0
     *
     * @param integer $user_id User ID.
     * @param array   $roles   New user roles.
     * @return true|WP_Error True if the current user is allowed to make the role change,
     *                       otherwise a WP_Error object.
     */
    protected function check_role_update($user_id, $roles)
    {
    }
    /**
     * Check a username for the REST API.
     *
     * Performs a couple of checks like edit_user() in wp-admin/includes/user.php.
     *
     * @since 4.7.0
     *
     * @param  mixed            $value   The username submitted in the request.
     * @param  WP_REST_Request  $request Full details about the request.
     * @param  string           $param   The parameter name.
     * @return WP_Error|string The sanitized username, if valid, otherwise an error.
     */
    public function check_username($value, $request, $param)
    {
    }
    /**
     * Check a user password for the REST API.
     *
     * Performs a couple of checks like edit_user() in wp-admin/includes/user.php.
     *
     * @since 4.7.0
     *
     * @param  mixed            $value   The password submitted in the request.
     * @param  WP_REST_Request  $request Full details about the request.
     * @param  string           $param   The parameter name.
     * @return WP_Error|string The sanitized password, if valid, otherwise an error.
     */
    public function check_user_password($value, $request, $param)
    {
    }
    /**
     * Retrieves the user's schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Item schema data.
     */
    public function get_item_schema()
    {
    }
    /**
     * Retrieves the query params for collections.
     *
     * @since 4.7.0
     *
     * @return array Collection parameters.
     */
    public function get_collection_params()
    {
    }
}
/**
 * REST API: WP_REST_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class to manage meta values for an object via the REST API.
 *
 * @since 4.7.0
 */
abstract class WP_REST_Meta_Fields
{
    /**
     * Retrieves the object meta type.
     *
     * @since 4.7.0
     *
     * @return string One of 'post', 'comment', 'term', 'user', or anything
     *                else supported by `_get_meta_table()`.
     */
    protected abstract function get_meta_type();
    /**
     * Retrieves the object meta subtype.
     *
     * @since 4.9.8
     *
     * @return string Subtype for the meta type, or empty string if no specific subtype.
     */
    protected function get_meta_subtype()
    {
    }
    /**
     * Retrieves the object type for register_rest_field().
     *
     * @since 4.7.0
     *
     * @return string The REST field type, such as post type name, taxonomy name, 'comment', or `user`.
     */
    protected abstract function get_rest_field_type();
    /**
     * Registers the meta field.
     *
     * @since 4.7.0
     *
     * @see register_rest_field()
     */
    public function register_field()
    {
    }
    /**
     * Retrieves the meta field value.
     *
     * @since 4.7.0
     *
     * @param int             $object_id Object ID to fetch meta for.
     * @param WP_REST_Request $request   Full details about the request.
     * @return WP_Error|object Object containing the meta values by name, otherwise WP_Error object.
     */
    public function get_value($object_id, $request)
    {
    }
    /**
     * Prepares a meta value for a response.
     *
     * This is required because some native types cannot be stored correctly
     * in the database, such as booleans. We need to cast back to the relevant
     * type before passing back to JSON.
     *
     * @since 4.7.0
     *
     * @param mixed           $value   Meta value to prepare.
     * @param WP_REST_Request $request Current request object.
     * @param array           $args    Options for the field.
     * @return mixed Prepared value.
     */
    protected function prepare_value_for_response($value, $request, $args)
    {
    }
    /**
     * Updates meta values.
     *
     * @since 4.7.0
     *
     * @param array           $meta      Array of meta parsed from the request.
     * @param int             $object_id Object ID to fetch meta for.
     * @return WP_Error|null WP_Error if one occurs, null on success.
     */
    public function update_value($meta, $object_id)
    {
    }
    /**
     * Deletes a meta value for an object.
     *
     * @since 4.7.0
     *
     * @param int    $object_id Object ID the field belongs to.
     * @param string $meta_key  Key for the field.
     * @param string $name      Name for the field that is exposed in the REST API.
     * @return bool|WP_Error True if meta field is deleted, WP_Error otherwise.
     */
    protected function delete_meta_value($object_id, $meta_key, $name)
    {
    }
    /**
     * Updates multiple meta values for an object.
     *
     * Alters the list of values in the database to match the list of provided values.
     *
     * @since 4.7.0
     *
     * @param int    $object_id Object ID to update.
     * @param string $meta_key  Key for the custom field.
     * @param string $name      Name for the field that is exposed in the REST API.
     * @param array  $values    List of values to update to.
     * @return bool|WP_Error True if meta fields are updated, WP_Error otherwise.
     */
    protected function update_multi_meta_value($object_id, $meta_key, $name, $values)
    {
    }
    /**
     * Updates a meta value for an object.
     *
     * @since 4.7.0
     *
     * @param int    $object_id Object ID to update.
     * @param string $meta_key  Key for the custom field.
     * @param string $name      Name for the field that is exposed in the REST API.
     * @param mixed  $value     Updated value.
     * @return bool|WP_Error True if the meta field was updated, WP_Error otherwise.
     */
    protected function update_meta_value($object_id, $meta_key, $name, $value)
    {
    }
    /**
     * Retrieves all the registered meta fields.
     *
     * @since 4.7.0
     *
     * @return array Registered fields.
     */
    protected function get_registered_fields()
    {
    }
    /**
     * Retrieves the object's meta schema, conforming to JSON Schema.
     *
     * @since 4.7.0
     *
     * @return array Field schema data.
     */
    public function get_field_schema()
    {
    }
    /**
     * Prepares a meta value for output.
     *
     * Default preparation for meta fields. Override by passing the
     * `prepare_callback` in your `show_in_rest` options.
     *
     * @since 4.7.0
     *
     * @param mixed           $value   Meta value from the database.
     * @param WP_REST_Request $request Request object.
     * @param array           $args    REST-specific options for the meta key.
     * @return mixed Value prepared for output. If a non-JsonSerializable object, null.
     */
    public static function prepare_value($value, $request, $args)
    {
    }
    /**
     * Check the 'meta' value of a request is an associative array.
     *
     * @since 4.7.0
     *
     * @param  mixed           $value   The meta value submitted in the request.
     * @param  WP_REST_Request $request Full details about the request.
     * @param  string          $param   The parameter name.
     * @return WP_Error|string The meta array, if valid, otherwise an error.
     */
    public function check_meta_is_array($value, $request, $param)
    {
    }
}
/**
 * REST API: WP_REST_Comment_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class to manage comment meta via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_Comment_Meta_Fields extends \WP_REST_Meta_Fields
{
    /**
     * Retrieves the object type for comment meta.
     *
     * @since 4.7.0
     *
     * @return string The meta type.
     */
    protected function get_meta_type()
    {
    }
    /**
     * Retrieves the object meta subtype.
     *
     * @since 4.9.8
     *
     * @return string 'comment' There are no subtypes.
     */
    protected function get_meta_subtype()
    {
    }
    /**
     * Retrieves the type for register_rest_field() in the context of comments.
     *
     * @since 4.7.0
     *
     * @return string The REST field type.
     */
    public function get_rest_field_type()
    {
    }
}
/**
 * REST API: WP_REST_Post_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to manage meta values for posts via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_Post_Meta_Fields extends \WP_REST_Meta_Fields
{
    /**
     * Post type to register fields for.
     *
     * @since 4.7.0
     * @var string
     */
    protected $post_type;
    /**
     * Constructor.
     *
     * @since 4.7.0
     *
     * @param string $post_type Post type to register fields for.
     */
    public function __construct($post_type)
    {
    }
    /**
     * Retrieves the object meta type.
     *
     * @since 4.7.0
     *
     * @return string The meta type.
     */
    protected function get_meta_type()
    {
    }
    /**
     * Retrieves the object meta subtype.
     *
     * @since 4.9.8
     *
     * @return string Subtype for the meta type, or empty string if no specific subtype.
     */
    protected function get_meta_subtype()
    {
    }
    /**
     * Retrieves the type for register_rest_field().
     *
     * @since 4.7.0
     *
     * @see register_rest_field()
     *
     * @return string The REST field type.
     */
    public function get_rest_field_type()
    {
    }
}
/**
 * REST API: WP_REST_Term_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to manage meta values for terms via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_Term_Meta_Fields extends \WP_REST_Meta_Fields
{
    /**
     * Taxonomy to register fields for.
     *
     * @since 4.7.0
     * @var string
     */
    protected $taxonomy;
    /**
     * Constructor.
     *
     * @since 4.7.0
     *
     * @param string $taxonomy Taxonomy to register fields for.
     */
    public function __construct($taxonomy)
    {
    }
    /**
     * Retrieves the object meta type.
     *
     * @since 4.7.0
     *
     * @return string The meta type.
     */
    protected function get_meta_type()
    {
    }
    /**
     * Retrieves the object meta subtype.
     *
     * @since 4.9.8
     *
     * @return string Subtype for the meta type, or empty string if no specific subtype.
     */
    protected function get_meta_subtype()
    {
    }
    /**
     * Retrieves the type for register_rest_field().
     *
     * @since 4.7.0
     *
     * @return string The REST field type.
     */
    public function get_rest_field_type()
    {
    }
}
/**
 * REST API: WP_REST_User_Meta_Fields class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 4.7.0
 */
/**
 * Core class used to manage meta values for users via the REST API.
 *
 * @since 4.7.0
 *
 * @see WP_REST_Meta_Fields
 */
class WP_REST_User_Meta_Fields extends \WP_REST_Meta_Fields
{
    /**
     * Retrieves the object meta type.
     *
     * @since 4.7.0
     *
     * @return string The user meta type.
     */
    protected function get_meta_type()
    {
    }
    /**
     * Retrieves the object meta subtype.
     *
     * @since 4.9.8
     *
     * @return string 'user' There are no subtypes.
     */
    protected function get_meta_subtype()
    {
    }
    /**
     * Retrieves the type for register_rest_field().
     *
     * @since 4.7.0
     *
     * @return string The user REST field type.
     */
    public function get_rest_field_type()
    {
    }
}
class MagpieRSS
{
    var $parser;
    var $current_item = array();
    // item currently being parsed
    var $items = array();
    // collection of parsed items
    var $channel = array();
    // hash of channel fields
    var $textinput = array();
    var $image = array();
    var $feed_type;
    var $feed_version;
    // parser variables
    var $stack = array();
    // parser stack
    var $inchannel = \false;
    var $initem = \false;
    var $incontent = \false;
    // if in Atom <content mode="xml"> field
    var $intextinput = \false;
    var $inimage = \false;
    var $current_field = '';
    var $current_namespace = \false;
    //var $ERROR = "";
    var $_CONTENT_CONSTRUCTS = array('content', 'summary', 'info', 'title', 'tagline', 'copyright');
    /**
     * PHP5 constructor.
     */
    function __construct($source)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function MagpieRSS($source)
    {
    }
    function feed_start_element($p, $element, &$attrs)
    {
    }
    function feed_cdata($p, $text)
    {
    }
    function feed_end_element($p, $el)
    {
    }
    function concat(&$str1, $str2 = "")
    {
    }
    function append_content($text)
    {
    }
    // smart append - field and namespace aware
    function append($el, $text)
    {
    }
    function normalize()
    {
    }
    function is_rss()
    {
    }
    function is_atom()
    {
    }
    function map_attrs($k, $v)
    {
    }
    function error($errormsg, $lvl = \E_USER_WARNING)
    {
    }
}
class RSSCache
{
    var $BASE_CACHE;
    // where the cache files are stored
    var $MAX_AGE = 43200;
    // when are files stale, default twelve hours
    var $ERROR = '';
    // accumulate error messages
    /**
     * PHP5 constructor.
     */
    function __construct($base = '', $age = '')
    {
    }
    /**
     * PHP4 constructor.
     */
    public function RSSCache($base = '', $age = '')
    {
    }
    /*=======================================================================*\
    	Function:	set
    	Purpose:	add an item to the cache, keyed on url
    	Input:		url from which the rss file was fetched
    	Output:		true on success
    \*=======================================================================*/
    function set($url, $rss)
    {
    }
    /*=======================================================================*\
    	Function:	get
    	Purpose:	fetch an item from the cache
    	Input:		url from which the rss file was fetched
    	Output:		cached object on HIT, false on MISS
    \*=======================================================================*/
    function get($url)
    {
    }
    /*=======================================================================*\
    	Function:	check_cache
    	Purpose:	check a url for membership in the cache
    				and whether the object is older then MAX_AGE (ie. STALE)
    	Input:		url from which the rss file was fetched
    	Output:		cached object on HIT, false on MISS
    \*=======================================================================*/
    function check_cache($url)
    {
    }
    /*=======================================================================*\
    	Function:	serialize
    \*=======================================================================*/
    function serialize($rss)
    {
    }
    /*=======================================================================*\
    	Function:	unserialize
    \*=======================================================================*/
    function unserialize($data)
    {
    }
    /*=======================================================================*\
    	Function:	file_name
    	Purpose:	map url to location in cache
    	Input:		url from which the rss file was fetched
    	Output:		a file name
    \*=======================================================================*/
    function file_name($url)
    {
    }
    /*=======================================================================*\
    	Function:	error
    	Purpose:	register error
    \*=======================================================================*/
    function error($errormsg, $lvl = \E_USER_WARNING)
    {
    }
    function debug($debugmsg, $lvl = \E_USER_NOTICE)
    {
    }
}
/**
 * WP_User_Request class.
 *
 * Represents user request data loaded from a WP_Post object.
 *
 * @since 4.9.6
 */
final class WP_User_Request
{
    /**
     * Request ID.
     *
     * @var int
     */
    public $ID = 0;
    /**
     * User ID.
     *
     * @var int
     */
    public $user_id = 0;
    /**
     * User email.
     *
     * @var int
     */
    public $email = '';
    /**
     * Action name.
     *
     * @var string
     */
    public $action_name = '';
    /**
     * Current status.
     *
     * @var string
     */
    public $status = '';
    /**
     * Timestamp this request was created.
     *
     * @var int|null
     */
    public $created_timestamp = \null;
    /**
     * Timestamp this request was last modified.
     *
     * @var int|null
     */
    public $modified_timestamp = \null;
    /**
     * Timestamp this request was confirmed.
     *
     * @var int
     */
    public $confirmed_timestamp = \null;
    /**
     * Timestamp this request was completed.
     *
     * @var int
     */
    public $completed_timestamp = \null;
    /**
     * Misc data assigned to this request.
     *
     * @var array
     */
    public $request_data = array();
    /**
     * Key used to confirm this request.
     *
     * @var string
     */
    public $confirm_key = '';
    /**
     * Constructor.
     *
     * @since 4.9.6
     *
     * @param WP_Post|object $post Post object.
     */
    public function __construct($post)
    {
    }
}
/**
 * Widget API: WP_Nav_Menu_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement the Navigation Menu widget.
 *
 * @since 3.0.0
 *
 * @see WP_Widget
 */
class WP_Nav_Menu_Widget extends \WP_Widget
{
    /**
     * Sets up a new Navigation Menu widget instance.
     *
     * @since 3.0.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Navigation Menu widget instance.
     *
     * @since 3.0.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Navigation Menu widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Navigation Menu widget instance.
     *
     * @since 3.0.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Navigation Menu widget.
     *
     * @since 3.0.0
     *
     * @param array $instance Current settings.
     * @global WP_Customize_Manager $wp_customize
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Archives class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement the Archives widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Archives extends \WP_Widget
{
    /**
     * Sets up a new Archives widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Archives widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Archives widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Archives widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget_Archives::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Archives widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Calendar class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement the Calendar widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Calendar extends \WP_Widget
{
    /**
     * Ensure that the ID attribute only appears in the markup once
     *
     * @since 4.4.0
     *
     * @static
     * @var int
     */
    private static $instance = 0;
    /**
     * Sets up a new Calendar widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Calendar widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance The settings for the particular instance of the widget.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Calendar widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Calendar widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Categories class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Categories widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Categories extends \WP_Widget
{
    /**
     * Sets up a new Categories widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Categories widget instance.
     *
     * @since 2.8.0
     *
     * @staticvar bool $first_dropdown
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Categories widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Categories widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Categories widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Custom_HTML class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.1
 */
/**
 * Core class used to implement a Custom HTML widget.
 *
 * @since 4.8.1
 *
 * @see WP_Widget
 */
class WP_Widget_Custom_HTML extends \WP_Widget
{
    /**
     * Whether or not the widget has been registered yet.
     *
     * @since 4.9.0
     * @var bool
     */
    protected $registered = \false;
    /**
     * Default instance.
     *
     * @since 4.8.1
     * @var array
     */
    protected $default_instance = array('title' => '', 'content' => '');
    /**
     * Sets up a new Custom HTML widget instance.
     *
     * @since 4.8.1
     */
    public function __construct()
    {
    }
    /**
     * Add hooks for enqueueing assets when registering all widget instances of this widget class.
     *
     * @since 4.9.0
     *
     * @param integer $number Optional. The unique order number of this widget instance
     *                        compared to other instances of the same class. Default -1.
     */
    public function _register_one($number = -1)
    {
    }
    /**
     * Filter gallery shortcode attributes.
     *
     * Prevents all of a site's attachments from being shown in a gallery displayed on a
     * non-singular template where a $post context is not available.
     *
     * @since 4.9.0
     *
     * @param array $attrs Attributes.
     * @return array Attributes.
     */
    public function _filter_gallery_shortcode_attrs($attrs)
    {
    }
    /**
     * Outputs the content for the current Custom HTML widget instance.
     *
     * @since 4.8.1
     *
     * @global WP_Post $post
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Custom HTML widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Custom HTML widget instance.
     *
     * @since 4.8.1
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Loads the required scripts and styles for the widget control.
     *
     * @since 4.9.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Outputs the Custom HTML widget settings form.
     *
     * @since 4.8.1
     * @since 4.9.0 The form contains only hidden sync inputs. For the control UI, see `WP_Widget_Custom_HTML::render_control_template_scripts()`.
     *
     * @see WP_Widget_Custom_HTML::render_control_template_scripts()
     * @param array $instance Current instance.
     * @returns void
     */
    public function form($instance)
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.9.0
     */
    public static function render_control_template_scripts()
    {
    }
    /**
     * Add help text to widgets admin screen.
     *
     * @since 4.9.0
     */
    public static function add_help_text()
    {
    }
}
/**
 * Widget API: WP_Widget_Links class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Links widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Links extends \WP_Widget
{
    /**
     * Sets up a new Links widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Links widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Links widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Links widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Links widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Media_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.0
 */
/**
 * Core class that implements a media widget.
 *
 * @since 4.8.0
 *
 * @see WP_Widget
 */
abstract class WP_Widget_Media extends \WP_Widget
{
    /**
     * Translation labels.
     *
     * @since 4.8.0
     * @var array
     */
    public $l10n = array('add_to_widget' => '', 'replace_media' => '', 'edit_media' => '', 'media_library_state_multi' => '', 'media_library_state_single' => '', 'missing_attachment' => '', 'no_media_selected' => '', 'add_media' => '');
    /**
     * Whether or not the widget has been registered yet.
     *
     * @since 4.8.1
     * @var bool
     */
    protected $registered = \false;
    /**
     * Constructor.
     *
     * @since 4.8.0
     *
     * @param string $id_base         Base ID for the widget, lowercase and unique.
     * @param string $name            Name for the widget displayed on the configuration page.
     * @param array  $widget_options  Optional. Widget options. See wp_register_sidebar_widget() for
     *                                information on accepted arguments. Default empty array.
     * @param array  $control_options Optional. Widget control options. See wp_register_widget_control()
     *                                for information on accepted arguments. Default empty array.
     */
    public function __construct($id_base, $name, $widget_options = array(), $control_options = array())
    {
    }
    /**
     * Add hooks while registering all widget instances of this widget class.
     *
     * @since 4.8.0
     *
     * @param integer $number Optional. The unique order number of this widget instance
     *                        compared to other instances of the same class. Default -1.
     */
    public function _register_one($number = -1)
    {
    }
    /**
     * Get schema for properties of a widget instance (item).
     *
     * @since  4.8.0
     *
     * @see WP_REST_Controller::get_item_schema()
     * @see WP_REST_Controller::get_additional_fields()
     * @link https://core.trac.wordpress.org/ticket/35574
     * @return array Schema for properties.
     */
    public function get_instance_schema()
    {
    }
    /**
     * Determine if the supplied attachment is for a valid attachment post with the specified MIME type.
     *
     * @since 4.8.0
     *
     * @param int|WP_Post $attachment Attachment post ID or object.
     * @param string      $mime_type  MIME type.
     * @return bool Is matching MIME type.
     */
    public function is_attachment_with_mime_type($attachment, $mime_type)
    {
    }
    /**
     * Sanitize a token list string, such as used in HTML rel and class attributes.
     *
     * @since 4.8.0
     *
     * @link http://w3c.github.io/html/infrastructure.html#space-separated-tokens
     * @link https://developer.mozilla.org/en-US/docs/Web/API/DOMTokenList
     * @param string|array $tokens List of tokens separated by spaces, or an array of tokens.
     * @return string Sanitized token string list.
     */
    public function sanitize_token_list($tokens)
    {
    }
    /**
     * Displays the widget on the front-end.
     *
     * @since 4.8.0
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Display arguments including before_title, after_title, before_widget, and after_widget.
     * @param array $instance Saved setting from the database.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Sanitizes the widget form values as they are saved.
     *
     * @since 4.8.0
     *
     * @see WP_Widget::update()
     * @see WP_REST_Request::has_valid_params()
     * @see WP_REST_Request::sanitize_params()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $instance     Previously saved values from database.
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $instance)
    {
    }
    /**
     * Render the media on the frontend.
     *
     * @since 4.8.0
     *
     * @param array $instance Widget instance props.
     * @return string
     */
    public abstract function render_media($instance);
    /**
     * Outputs the settings update form.
     *
     * Note that the widget UI itself is rendered with JavaScript via `MediaWidgetControl#render()`.
     *
     * @since 4.8.0
     *
     * @see \WP_Widget_Media::render_control_template_scripts() Where the JS template is located.
     * @param array $instance Current settings.
     * @return void
     */
    public final function form($instance)
    {
    }
    /**
     * Filters the default media display states for items in the Media list table.
     *
     * @since 4.8.0
     *
     * @param array   $states An array of media states.
     * @param WP_Post $post   The current attachment object.
     * @return array
     */
    public function display_media_state($states, $post = \null)
    {
    }
    /**
     * Enqueue preview scripts.
     *
     * These scripts normally are enqueued just-in-time when a widget is rendered.
     * In the customizer, however, widgets can be dynamically added and rendered via
     * selective refresh, and so it is important to unconditionally enqueue them in
     * case a widget does get added.
     *
     * @since 4.8.0
     */
    public function enqueue_preview_scripts()
    {
    }
    /**
     * Loads the required scripts and styles for the widget control.
     *
     * @since 4.8.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.8.0
     */
    public function render_control_template_scripts()
    {
    }
    /**
     * Whether the widget has content to show.
     *
     * @since 4.8.0
     *
     * @param array $instance Widget instance props.
     * @return bool Whether widget has content.
     */
    protected function has_content($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Media_Audio class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.0
 */
/**
 * Core class that implements an audio widget.
 *
 * @since 4.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Media_Audio extends \WP_Widget_Media
{
    /**
     * Constructor.
     *
     * @since  4.8.0
     */
    public function __construct()
    {
    }
    /**
     * Get schema for properties of a widget instance (item).
     *
     * @since  4.8.0
     *
     * @see WP_REST_Controller::get_item_schema()
     * @see WP_REST_Controller::get_additional_fields()
     * @link https://core.trac.wordpress.org/ticket/35574
     * @return array Schema for properties.
     */
    public function get_instance_schema()
    {
    }
    /**
     * Render the media on the frontend.
     *
     * @since  4.8.0
     *
     * @param array $instance Widget instance props.
     * @return void
     */
    public function render_media($instance)
    {
    }
    /**
     * Enqueue preview scripts.
     *
     * These scripts normally are enqueued just-in-time when an audio shortcode is used.
     * In the customizer, however, widgets can be dynamically added and rendered via
     * selective refresh, and so it is important to unconditionally enqueue them in
     * case a widget does get added.
     *
     * @since 4.8.0
     */
    public function enqueue_preview_scripts()
    {
    }
    /**
     * Loads the required media files for the media manager and scripts for media widgets.
     *
     * @since 4.8.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.8.0
     */
    public function render_control_template_scripts()
    {
    }
}
/**
 * Widget API: WP_Widget_Media_Gallery class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.9.0
 */
/**
 * Core class that implements a gallery widget.
 *
 * @since 4.9.0
 *
 * @see WP_Widget
 */
class WP_Widget_Media_Gallery extends \WP_Widget_Media
{
    /**
     * Constructor.
     *
     * @since 4.9.0
     */
    public function __construct()
    {
    }
    /**
     * Get schema for properties of a widget instance (item).
     *
     * @since 4.9.0
     *
     * @see WP_REST_Controller::get_item_schema()
     * @see WP_REST_Controller::get_additional_fields()
     * @link https://core.trac.wordpress.org/ticket/35574
     * @return array Schema for properties.
     */
    public function get_instance_schema()
    {
    }
    /**
     * Render the media on the frontend.
     *
     * @since 4.9.0
     *
     * @param array $instance Widget instance props.
     * @return void
     */
    public function render_media($instance)
    {
    }
    /**
     * Loads the required media files for the media manager and scripts for media widgets.
     *
     * @since 4.9.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.9.0
     */
    public function render_control_template_scripts()
    {
    }
    /**
     * Whether the widget has content to show.
     *
     * @since 4.9.0
     * @access protected
     *
     * @param array $instance Widget instance props.
     * @return bool Whether widget has content.
     */
    protected function has_content($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Media_Image class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.0
 */
/**
 * Core class that implements an image widget.
 *
 * @since 4.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Media_Image extends \WP_Widget_Media
{
    /**
     * Constructor.
     *
     * @since  4.8.0
     */
    public function __construct()
    {
    }
    /**
     * Get schema for properties of a widget instance (item).
     *
     * @since  4.8.0
     *
     * @see WP_REST_Controller::get_item_schema()
     * @see WP_REST_Controller::get_additional_fields()
     * @link https://core.trac.wordpress.org/ticket/35574
     * @return array Schema for properties.
     */
    public function get_instance_schema()
    {
    }
    /**
     * Render the media on the frontend.
     *
     * @since  4.8.0
     *
     * @param array $instance Widget instance props.
     * @return void
     */
    public function render_media($instance)
    {
    }
    /**
     * Loads the required media files for the media manager and scripts for media widgets.
     *
     * @since 4.8.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.8.0
     */
    public function render_control_template_scripts()
    {
    }
}
/**
 * Widget API: WP_Widget_Media_Video class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.0
 */
/**
 * Core class that implements a video widget.
 *
 * @since 4.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Media_Video extends \WP_Widget_Media
{
    /**
     * Constructor.
     *
     * @since  4.8.0
     */
    public function __construct()
    {
    }
    /**
     * Get schema for properties of a widget instance (item).
     *
     * @since  4.8.0
     *
     * @see WP_REST_Controller::get_item_schema()
     * @see WP_REST_Controller::get_additional_fields()
     * @link https://core.trac.wordpress.org/ticket/35574
     * @return array Schema for properties.
     */
    public function get_instance_schema()
    {
    }
    /**
     * Render the media on the frontend.
     *
     * @since  4.8.0
     *
     * @param array $instance Widget instance props.
     *
     * @return void
     */
    public function render_media($instance)
    {
    }
    /**
     * Inject max-width and remove height for videos too constrained to fit inside sidebars on frontend.
     *
     * @since 4.8.0
     *
     * @param string $html Video shortcode HTML output.
     * @return string HTML Output.
     */
    public function inject_video_max_width_style($html)
    {
    }
    /**
     * Enqueue preview scripts.
     *
     * These scripts normally are enqueued just-in-time when a video shortcode is used.
     * In the customizer, however, widgets can be dynamically added and rendered via
     * selective refresh, and so it is important to unconditionally enqueue them in
     * case a widget does get added.
     *
     * @since 4.8.0
     */
    public function enqueue_preview_scripts()
    {
    }
    /**
     * Loads the required scripts and styles for the widget control.
     *
     * @since 4.8.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.8.0
     */
    public function render_control_template_scripts()
    {
    }
}
/**
 * Widget API: WP_Widget_Meta class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Meta widget.
 *
 * Displays log in/out, RSS feed links, etc.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Meta extends \WP_Widget
{
    /**
     * Sets up a new Meta widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Meta widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Meta widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Meta widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Meta widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Pages class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Pages widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Pages extends \WP_Widget
{
    /**
     * Sets up a new Pages widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Pages widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Pages widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Pages widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Pages widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Recent_Comments class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Recent Comments widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Recent_Comments extends \WP_Widget
{
    /**
     * Sets up a new Recent Comments widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the default styles for the Recent Comments widget.
     *
     * @since 2.8.0
     */
    public function recent_comments_style()
    {
    }
    /**
     * Outputs the content for the current Recent Comments widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Comments widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Recent Comments widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Recent Comments widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
    /**
     * Flushes the Recent Comments widget cache.
     *
     * @since 2.8.0
     *
     * @deprecated 4.4.0 Fragment caching was removed in favor of split queries.
     */
    public function flush_widget_cache()
    {
    }
}
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Recent_Posts extends \WP_Widget
{
    /**
     * Sets up a new Recent Posts widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_RSS class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a RSS widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_RSS extends \WP_Widget
{
    /**
     * Sets up a new RSS widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current RSS widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current RSS widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current RSS widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the settings form for the RSS widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Search class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Search widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Search extends \WP_Widget
{
    /**
     * Sets up a new Search widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Search widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Search widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Outputs the settings form for the Search widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
    /**
     * Handles updating settings for the current Search widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings.
     */
    public function update($new_instance, $old_instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Tag_Cloud class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Tag cloud widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Tag_Cloud extends \WP_Widget
{
    /**
     * Sets up a new Tag Cloud widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Outputs the content for the current Tag Cloud widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Tag Cloud widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Handles updating settings for the current Tag Cloud widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Outputs the Tag Cloud widget settings form.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
    }
    /**
     * Retrieves the taxonomy for the current Tag cloud widget instance.
     *
     * @since 4.4.0
     *
     * @param array $instance Current settings.
     * @return string Name of the current taxonomy if set, otherwise 'post_tag'.
     */
    public function _get_current_taxonomy($instance)
    {
    }
}
/**
 * Widget API: WP_Widget_Text class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Text widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Text extends \WP_Widget
{
    /**
     * Whether or not the widget has been registered yet.
     *
     * @since 4.8.1
     * @var bool
     */
    protected $registered = \false;
    /**
     * Sets up a new Text widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
    }
    /**
     * Add hooks for enqueueing assets when registering all widget instances of this widget class.
     *
     * @param integer $number Optional. The unique order number of this widget instance
     *                        compared to other instances of the same class. Default -1.
     */
    public function _register_one($number = -1)
    {
    }
    /**
     * Determines whether a given instance is legacy and should bypass using TinyMCE.
     *
     * @since 4.8.1
     *
     * @param array $instance {
     *     Instance data.
     *
     *     @type string      $text   Content.
     *     @type bool|string $filter Whether autop or content filters should apply.
     *     @type bool        $legacy Whether widget is in legacy mode.
     * }
     * @return bool Whether Text widget instance contains legacy data.
     */
    public function is_legacy_instance($instance)
    {
    }
    /**
     * Filter gallery shortcode attributes.
     *
     * Prevents all of a site's attachments from being shown in a gallery displayed on a
     * non-singular template where a $post context is not available.
     *
     * @since 4.9.0
     *
     * @param array $attrs Attributes.
     * @return array Attributes.
     */
    public function _filter_gallery_shortcode_attrs($attrs)
    {
    }
    /**
     * Outputs the content for the current Text widget instance.
     *
     * @since 2.8.0
     *
     * @global WP_Post $post
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Text widget instance.
     */
    public function widget($args, $instance)
    {
    }
    /**
     * Inject max-width and remove height for videos too constrained to fit inside sidebars on frontend.
     *
     * @since 4.9.0
     *
     * @see WP_Widget_Media_Video::inject_video_max_width_style()
     * @param array $matches Pattern matches from preg_replace_callback.
     * @return string HTML Output.
     */
    public function inject_video_max_width_style($matches)
    {
    }
    /**
     * Handles updating settings for the current Text widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    public function update($new_instance, $old_instance)
    {
    }
    /**
     * Enqueue preview scripts.
     *
     * These scripts normally are enqueued just-in-time when a playlist shortcode is used.
     * However, in the customizer, a playlist shortcode may be used in a text widget and
     * dynamically added via selective refresh, so it is important to unconditionally enqueue them.
     *
     * @since 4.9.3
     */
    public function enqueue_preview_scripts()
    {
    }
    /**
     * Loads the required scripts and styles for the widget control.
     *
     * @since 4.8.0
     */
    public function enqueue_admin_scripts()
    {
    }
    /**
     * Outputs the Text widget settings form.
     *
     * @since 2.8.0
     * @since 4.8.0 Form only contains hidden inputs which are synced with JS template.
     * @since 4.8.1 Restored original form to be displayed when in legacy mode.
     * @see WP_Widget_Visual_Text::render_control_template_scripts()
     * @see _WP_Editors::editor()
     *
     * @param array $instance Current settings.
     * @return void
     */
    public function form($instance)
    {
    }
    /**
     * Render form template scripts.
     *
     * @since 4.8.0
     * @since 4.9.0 The method is now static.
     */
    public static function render_control_template_scripts()
    {
    }
}
/**
 * WordPress Database Access Abstraction Object
 *
 * It is possible to replace this class with your own
 * by setting the $wpdb global variable in wp-content/db.php
 * file to your class. The wpdb class will still be included,
 * so you can extend it or simply use your own.
 *
 * @link https://codex.wordpress.org/Function_Reference/wpdb_Class
 *
 * @since 0.71
 */
class wpdb
{
    /**
     * Whether to show SQL/DB errors.
     *
     * Default behavior is to show errors if both WP_DEBUG and WP_DEBUG_DISPLAY
     * evaluated to true.
     *
     * @since 0.71
     * @var bool
     */
    var $show_errors = \false;
    /**
     * Whether to suppress errors during the DB bootstrapping.
     *
     * @since 2.5.0
     * @var bool
     */
    var $suppress_errors = \false;
    /**
     * The last error during query.
     *
     * @since 2.5.0
     * @var string
     */
    public $last_error = '';
    /**
     * Amount of queries made
     *
     * @since 1.2.0
     * @var int
     */
    public $num_queries = 0;
    /**
     * Count of rows returned by previous query
     *
     * @since 0.71
     * @var int
     */
    public $num_rows = 0;
    /**
     * Count of affected rows by previous query
     *
     * @since 0.71
     * @var int
     */
    var $rows_affected = 0;
    /**
     * The ID generated for an AUTO_INCREMENT column by the previous query (usually INSERT).
     *
     * @since 0.71
     * @var int
     */
    public $insert_id = 0;
    /**
     * Last query made
     *
     * @since 0.71
     * @var array
     */
    var $last_query;
    /**
     * Results of the last query made
     *
     * @since 0.71
     * @var array|null
     */
    var $last_result;
    /**
     * MySQL result, which is either a resource or boolean.
     *
     * @since 0.71
     * @var mixed
     */
    protected $result;
    /**
     * Cached column info, for sanity checking data before inserting
     *
     * @since 4.2.0
     * @var array
     */
    protected $col_meta = array();
    /**
     * Calculated character sets on tables
     *
     * @since 4.2.0
     * @var array
     */
    protected $table_charset = array();
    /**
     * Whether text fields in the current query need to be sanity checked.
     *
     * @since 4.2.0
     * @var bool
     */
    protected $check_current_query = \true;
    /**
     * Flag to ensure we don't run into recursion problems when checking the collation.
     *
     * @since 4.2.0
     * @see wpdb::check_safe_collation()
     * @var bool
     */
    private $checking_collation = \false;
    /**
     * Saved info on the table column
     *
     * @since 0.71
     * @var array
     */
    protected $col_info;
    /**
     * Saved queries that were executed
     *
     * @since 1.5.0
     * @var array
     */
    var $queries;
    /**
     * The number of times to retry reconnecting before dying.
     *
     * @since 3.9.0
     * @see wpdb::check_connection()
     * @var int
     */
    protected $reconnect_retries = 5;
    /**
     * WordPress table prefix
     *
     * You can set this to have multiple WordPress installations
     * in a single database. The second reason is for possible
     * security precautions.
     *
     * @since 2.5.0
     * @var string
     */
    public $prefix = '';
    /**
     * WordPress base table prefix.
     *
     * @since 3.0.0
     * @var string
     */
    public $base_prefix;
    /**
     * Whether the database queries are ready to start executing.
     *
     * @since 2.3.2
     * @var bool
     */
    var $ready = \false;
    /**
     * Blog ID.
     *
     * @since 3.0.0
     * @var int
     */
    public $blogid = 0;
    /**
     * Site ID.
     *
     * @since 3.0.0
     * @var int
     */
    public $siteid = 0;
    /**
     * List of WordPress per-blog tables
     *
     * @since 2.5.0
     * @see wpdb::tables()
     * @var array
     */
    var $tables = array('posts', 'comments', 'links', 'options', 'postmeta', 'terms', 'term_taxonomy', 'term_relationships', 'termmeta', 'commentmeta');
    /**
     * List of deprecated WordPress tables
     *
     * categories, post2cat, and link2cat were deprecated in 2.3.0, db version 5539
     *
     * @since 2.9.0
     * @see wpdb::tables()
     * @var array
     */
    var $old_tables = array('categories', 'post2cat', 'link2cat');
    /**
     * List of WordPress global tables
     *
     * @since 3.0.0
     * @see wpdb::tables()
     * @var array
     */
    var $global_tables = array('users', 'usermeta');
    /**
     * List of Multisite global tables
     *
     * @since 3.0.0
     * @see wpdb::tables()
     * @var array
     */
    var $ms_global_tables = array('blogs', 'signups', 'site', 'sitemeta', 'sitecategories', 'registration_log', 'blog_versions');
    /**
     * WordPress Comments table
     *
     * @since 1.5.0
     * @var string
     */
    public $comments;
    /**
     * WordPress Comment Metadata table
     *
     * @since 2.9.0
     * @var string
     */
    public $commentmeta;
    /**
     * WordPress Links table
     *
     * @since 1.5.0
     * @var string
     */
    public $links;
    /**
     * WordPress Options table
     *
     * @since 1.5.0
     * @var string
     */
    public $options;
    /**
     * WordPress Post Metadata table
     *
     * @since 1.5.0
     * @var string
     */
    public $postmeta;
    /**
     * WordPress Posts table
     *
     * @since 1.5.0
     * @var string
     */
    public $posts;
    /**
     * WordPress Terms table
     *
     * @since 2.3.0
     * @var string
     */
    public $terms;
    /**
     * WordPress Term Relationships table
     *
     * @since 2.3.0
     * @var string
     */
    public $term_relationships;
    /**
     * WordPress Term Taxonomy table
     *
     * @since 2.3.0
     * @var string
     */
    public $term_taxonomy;
    /**
     * WordPress Term Meta table.
     *
     * @since 4.4.0
     * @var string
     */
    public $termmeta;
    //
    // Global and Multisite tables
    //
    /**
     * WordPress User Metadata table
     *
     * @since 2.3.0
     * @var string
     */
    public $usermeta;
    /**
     * WordPress Users table
     *
     * @since 1.5.0
     * @var string
     */
    public $users;
    /**
     * Multisite Blogs table
     *
     * @since 3.0.0
     * @var string
     */
    public $blogs;
    /**
     * Multisite Blog Versions table
     *
     * @since 3.0.0
     * @var string
     */
    public $blog_versions;
    /**
     * Multisite Registration Log table
     *
     * @since 3.0.0
     * @var string
     */
    public $registration_log;
    /**
     * Multisite Signups table
     *
     * @since 3.0.0
     * @var string
     */
    public $signups;
    /**
     * Multisite Sites table
     *
     * @since 3.0.0
     * @var string
     */
    public $site;
    /**
     * Multisite Sitewide Terms table
     *
     * @since 3.0.0
     * @var string
     */
    public $sitecategories;
    /**
     * Multisite Site Metadata table
     *
     * @since 3.0.0
     * @var string
     */
    public $sitemeta;
    /**
     * Format specifiers for DB columns. Columns not listed here default to %s. Initialized during WP load.
     *
     * Keys are column names, values are format types: 'ID' => '%d'
     *
     * @since 2.8.0
     * @see wpdb::prepare()
     * @see wpdb::insert()
     * @see wpdb::update()
     * @see wpdb::delete()
     * @see wp_set_wpdb_vars()
     * @var array
     */
    public $field_types = array();
    /**
     * Database table columns charset
     *
     * @since 2.2.0
     * @var string
     */
    public $charset;
    /**
     * Database table columns collate
     *
     * @since 2.2.0
     * @var string
     */
    public $collate;
    /**
     * Database Username
     *
     * @since 2.9.0
     * @var string
     */
    protected $dbuser;
    /**
     * Database Password
     *
     * @since 3.1.0
     * @var string
     */
    protected $dbpassword;
    /**
     * Database Name
     *
     * @since 3.1.0
     * @var string
     */
    protected $dbname;
    /**
     * Database Host
     *
     * @since 3.1.0
     * @var string
     */
    protected $dbhost;
    /**
     * Database Handle
     *
     * @since 0.71
     * @var string
     */
    protected $dbh;
    /**
     * A textual description of the last query/get_row/get_var call
     *
     * @since 3.0.0
     * @var string
     */
    public $func_call;
    /**
     * Whether MySQL is used as the database engine.
     *
     * Set in WPDB::db_connect() to true, by default. This is used when checking
     * against the required MySQL version for WordPress. Normally, a replacement
     * database drop-in (db.php) will skip these checks, but setting this to true
     * will force the checks to occur.
     *
     * @since 3.3.0
     * @var bool
     */
    public $is_mysql = \null;
    /**
     * A list of incompatible SQL modes.
     *
     * @since 3.9.0
     * @var array
     */
    protected $incompatible_modes = array('NO_ZERO_DATE', 'ONLY_FULL_GROUP_BY', 'STRICT_TRANS_TABLES', 'STRICT_ALL_TABLES', 'TRADITIONAL');
    /**
     * Whether to use mysqli over mysql.
     *
     * @since 3.9.0
     * @var bool
     */
    private $use_mysqli = \false;
    /**
     * Whether we've managed to successfully connect at some point
     *
     * @since 3.9.0
     * @var bool
     */
    private $has_connected = \false;
    /**
     * Connects to the database server and selects a database
     *
     * PHP5 style constructor for compatibility with PHP5. Does
     * the actual setting up of the class properties and connection
     * to the database.
     *
     * @link https://core.trac.wordpress.org/ticket/3354
     * @since 2.0.8
     *
     * @global string $wp_version
     *
     * @param string $dbuser     MySQL database user
     * @param string $dbpassword MySQL database password
     * @param string $dbname     MySQL database name
     * @param string $dbhost     MySQL database host
     */
    public function __construct($dbuser, $dbpassword, $dbname, $dbhost)
    {
    }
    /**
     * PHP5 style destructor and will run when database object is destroyed.
     *
     * @see wpdb::__construct()
     * @since 2.0.8
     * @return true
     */
    public function __destruct()
    {
    }
    /**
     * Makes private properties readable for backward compatibility.
     *
     * @since 3.5.0
     *
     * @param string $name The private member to get, and optionally process
     * @return mixed The private member
     */
    public function __get($name)
    {
    }
    /**
     * Makes private properties settable for backward compatibility.
     *
     * @since 3.5.0
     *
     * @param string $name  The private member to set
     * @param mixed  $value The value to set
     */
    public function __set($name, $value)
    {
    }
    /**
     * Makes private properties check-able for backward compatibility.
     *
     * @since 3.5.0
     *
     * @param string $name  The private member to check
     *
     * @return bool If the member is set or not
     */
    public function __isset($name)
    {
    }
    /**
     * Makes private properties un-settable for backward compatibility.
     *
     * @since 3.5.0
     *
     * @param string $name  The private member to unset
     */
    public function __unset($name)
    {
    }
    /**
     * Set $this->charset and $this->collate
     *
     * @since 3.1.0
     */
    public function init_charset()
    {
    }
    /**
     * Determines the best charset and collation to use given a charset and collation.
     *
     * For example, when able, utf8mb4 should be used instead of utf8.
     *
     * @since 4.6.0
     *
     * @param string $charset The character set to check.
     * @param string $collate The collation to check.
     * @return array The most appropriate character set and collation to use.
     */
    public function determine_charset($charset, $collate)
    {
    }
    /**
     * Sets the connection's character set.
     *
     * @since 3.1.0
     *
     * @param resource $dbh     The resource given by mysql_connect
     * @param string   $charset Optional. The character set. Default null.
     * @param string   $collate Optional. The collation. Default null.
     */
    public function set_charset($dbh, $charset = \null, $collate = \null)
    {
    }
    /**
     * Change the current SQL mode, and ensure its WordPress compatibility.
     *
     * If no modes are passed, it will ensure the current MySQL server
     * modes are compatible.
     *
     * @since 3.9.0
     *
     * @param array $modes Optional. A list of SQL modes to set.
     */
    public function set_sql_mode($modes = array())
    {
    }
    /**
     * Sets the table prefix for the WordPress tables.
     *
     * @since 2.5.0
     *
     * @param string $prefix          Alphanumeric name for the new prefix.
     * @param bool   $set_table_names Optional. Whether the table names, e.g. wpdb::$posts, should be updated or not.
     * @return string|WP_Error Old prefix or WP_Error on error
     */
    public function set_prefix($prefix, $set_table_names = \true)
    {
    }
    /**
     * Sets blog id.
     *
     * @since 3.0.0
     *
     * @param int $blog_id
     * @param int $network_id Optional.
     * @return int previous blog id
     */
    public function set_blog_id($blog_id, $network_id = 0)
    {
    }
    /**
     * Gets blog prefix.
     *
     * @since 3.0.0
     * @param int $blog_id Optional.
     * @return string Blog prefix.
     */
    public function get_blog_prefix($blog_id = \null)
    {
    }
    /**
     * Returns an array of WordPress tables.
     *
     * Also allows for the CUSTOM_USER_TABLE and CUSTOM_USER_META_TABLE to
     * override the WordPress users and usermeta tables that would otherwise
     * be determined by the prefix.
     *
     * The scope argument can take one of the following:
     *
     * 'all' - returns 'all' and 'global' tables. No old tables are returned.
     * 'blog' - returns the blog-level tables for the queried blog.
     * 'global' - returns the global tables for the installation, returning multisite tables only if running multisite.
     * 'ms_global' - returns the multisite global tables, regardless if current installation is multisite.
     * 'old' - returns tables which are deprecated.
     *
     * @since 3.0.0
     * @uses wpdb::$tables
     * @uses wpdb::$old_tables
     * @uses wpdb::$global_tables
     * @uses wpdb::$ms_global_tables
     *
     * @param string $scope   Optional. Can be all, global, ms_global, blog, or old tables. Defaults to all.
     * @param bool   $prefix  Optional. Whether to include table prefixes. Default true. If blog
     *                        prefix is requested, then the custom users and usermeta tables will be mapped.
     * @param int    $blog_id Optional. The blog_id to prefix. Defaults to wpdb::$blogid. Used only when prefix is requested.
     * @return array Table names. When a prefix is requested, the key is the unprefixed table name.
     */
    public function tables($scope = 'all', $prefix = \true, $blog_id = 0)
    {
    }
    /**
     * Selects a database using the current database connection.
     *
     * The database name will be changed based on the current database
     * connection. On failure, the execution will bail and display an DB error.
     *
     * @since 0.71
     *
     * @param string        $db  MySQL database name
     * @param resource|null $dbh Optional link identifier.
     */
    public function select($db, $dbh = \null)
    {
    }
    /**
     * Do not use, deprecated.
     *
     * Use esc_sql() or wpdb::prepare() instead.
     *
     * @since 2.8.0
     * @deprecated 3.6.0 Use wpdb::prepare()
     * @see wpdb::prepare
     * @see esc_sql()
     *
     * @param string $string
     * @return string
     */
    function _weak_escape($string)
    {
    }
    /**
     * Real escape, using mysqli_real_escape_string() or mysql_real_escape_string()
     *
     * @see mysqli_real_escape_string()
     * @see mysql_real_escape_string()
     * @since 2.8.0
     *
     * @param  string $string to escape
     * @return string escaped
     */
    function _real_escape($string)
    {
    }
    /**
     * Escape data. Works on arrays.
     *
     * @uses wpdb::_real_escape()
     * @since  2.8.0
     *
     * @param  string|array $data
     * @return string|array escaped
     */
    public function _escape($data)
    {
    }
    /**
     * Do not use, deprecated.
     *
     * Use esc_sql() or wpdb::prepare() instead.
     *
     * @since 0.71
     * @deprecated 3.6.0 Use wpdb::prepare()
     * @see wpdb::prepare()
     * @see esc_sql()
     *
     * @param mixed $data
     * @return mixed
     */
    public function escape($data)
    {
    }
    /**
     * Escapes content by reference for insertion into the database, for security
     *
     * @uses wpdb::_real_escape()
     *
     * @since 2.3.0
     *
     * @param string $string to escape
     */
    public function escape_by_ref(&$string)
    {
    }
    /**
     * Prepares a SQL query for safe execution. Uses sprintf()-like syntax.
     *
     * The following placeholders can be used in the query string:
     *   %d (integer)
     *   %f (float)
     *   %s (string)
     *
     * All placeholders MUST be left unquoted in the query string. A corresponding argument MUST be passed for each placeholder.
     *
     * For compatibility with old behavior, numbered or formatted string placeholders (eg, %1$s, %5s) will not have quotes
     * added by this function, so should be passed with appropriate quotes around them for your usage.
     *
     * Literal percentage signs (%) in the query string must be written as %%. Percentage wildcards (for example,
     * to use in LIKE syntax) must be passed via a substitution argument containing the complete LIKE string, these
     * cannot be inserted directly in the query string. Also see {@see esc_like()}.
     *
     * Arguments may be passed as individual arguments to the method, or as a single array containing all arguments. A combination
     * of the two is not supported.
     *
     * Examples:
     *     $wpdb->prepare( "SELECT * FROM `table` WHERE `column` = %s AND `field` = %d OR `other_field` LIKE %s", array( 'foo', 1337, '%bar' ) );
     *     $wpdb->prepare( "SELECT DATE_FORMAT(`field`, '%%c') FROM `table` WHERE `column` = %s", 'foo' );
     *
     * @link https://secure.php.net/sprintf Description of syntax.
     * @since 2.3.0
     *
     * @param string      $query    Query statement with sprintf()-like placeholders
     * @param array|mixed $args     The array of variables to substitute into the query's placeholders if being called with an array of arguments,
     *                              or the first variable to substitute into the query's placeholders if being called with individual arguments.
     * @param mixed       $args,... further variables to substitute into the query's placeholders if being called wih individual arguments.
     * @return string|void Sanitized query string, if there is a query to prepare.
     */
    public function prepare($query, $args)
    {
    }
    /**
     * First half of escaping for LIKE special characters % and _ before preparing for MySQL.
     *
     * Use this only before wpdb::prepare() or esc_sql().  Reversing the order is very bad for security.
     *
     * Example Prepared Statement:
     *
     *     $wild = '%';
     *     $find = 'only 43% of planets';
     *     $like = $wild . $wpdb->esc_like( $find ) . $wild;
     *     $sql  = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_content LIKE %s", $like );
     *
     * Example Escape Chain:
     *
     *     $sql  = esc_sql( $wpdb->esc_like( $input ) );
     *
     * @since 4.0.0
     *
     * @param string $text The raw text to be escaped. The input typed by the user should have no
     *                     extra or deleted slashes.
     * @return string Text in the form of a LIKE phrase. The output is not SQL safe. Call $wpdb::prepare()
     *                or real_escape next.
     */
    public function esc_like($text)
    {
    }
    /**
     * Print SQL/DB error.
     *
     * @since 0.71
     * @global array $EZSQL_ERROR Stores error information of query and error string
     *
     * @param string $str The error to display
     * @return false|void False if the showing of errors is disabled.
     */
    public function print_error($str = '')
    {
    }
    /**
     * Enables showing of database errors.
     *
     * This function should be used only to enable showing of errors.
     * wpdb::hide_errors() should be used instead for hiding of errors. However,
     * this function can be used to enable and disable showing of database
     * errors.
     *
     * @since 0.71
     * @see wpdb::hide_errors()
     *
     * @param bool $show Whether to show or hide errors
     * @return bool Old value for showing errors.
     */
    public function show_errors($show = \true)
    {
    }
    /**
     * Disables showing of database errors.
     *
     * By default database errors are not shown.
     *
     * @since 0.71
     * @see wpdb::show_errors()
     *
     * @return bool Whether showing of errors was active
     */
    public function hide_errors()
    {
    }
    /**
     * Whether to suppress database errors.
     *
     * By default database errors are suppressed, with a simple
     * call to this function they can be enabled.
     *
     * @since 2.5.0
     * @see wpdb::hide_errors()
     * @param bool $suppress Optional. New value. Defaults to true.
     * @return bool Old value
     */
    public function suppress_errors($suppress = \true)
    {
    }
    /**
     * Kill cached query results.
     *
     * @since 0.71
     */
    public function flush()
    {
    }
    /**
     * Connect to and select database.
     *
     * If $allow_bail is false, the lack of database connection will need
     * to be handled manually.
     *
     * @since 3.0.0
     * @since 3.9.0 $allow_bail parameter added.
     *
     * @param bool $allow_bail Optional. Allows the function to bail. Default true.
     * @return bool True with a successful connection, false on failure.
     */
    public function db_connect($allow_bail = \true)
    {
    }
    /**
     * Parse the DB_HOST setting to interpret it for mysqli_real_connect.
     *
     * mysqli_real_connect doesn't support the host param including a port or
     * socket like mysql_connect does. This duplicates how mysql_connect detects
     * a port and/or socket file.
     *
     * @since 4.9.0
     *
     * @param string $host The DB_HOST setting to parse.
     * @return array|bool Array containing the host, the port, the socket and whether
     *                    it is an IPv6 address, in that order. If $host couldn't be parsed,
     *                    returns false.
     */
    public function parse_db_host($host)
    {
    }
    /**
     * Checks that the connection to the database is still up. If not, try to reconnect.
     *
     * If this function is unable to reconnect, it will forcibly die, or if after the
     * the {@see 'template_redirect'} hook has been fired, return false instead.
     *
     * If $allow_bail is false, the lack of database connection will need
     * to be handled manually.
     *
     * @since 3.9.0
     *
     * @param bool $allow_bail Optional. Allows the function to bail. Default true.
     * @return bool|void True if the connection is up.
     */
    public function check_connection($allow_bail = \true)
    {
    }
    /**
     * Perform a MySQL database query, using current database connection.
     *
     * More information can be found on the codex page.
     *
     * @since 0.71
     *
     * @param string $query Database query
     * @return int|false Number of rows affected/selected or false on error
     */
    public function query($query)
    {
    }
    /**
     * Internal function to perform the mysql_query() call.
     *
     * @since 3.9.0
     *
     * @see wpdb::query()
     *
     * @param string $query The query to run.
     */
    private function _do_query($query)
    {
    }
    /**
     * Generates and returns a placeholder escape string for use in queries returned by ::prepare().
     *
     * @since 4.8.3
     *
     * @return string String to escape placeholders.
     */
    public function placeholder_escape()
    {
    }
    /**
     * Adds a placeholder escape string, to escape anything that resembles a printf() placeholder.
     *
     * @since 4.8.3
     *
     * @param string $query The query to escape.
     * @return string The query with the placeholder escape string inserted where necessary.
     */
    public function add_placeholder_escape($query)
    {
    }
    /**
     * Removes the placeholder escape strings from a query.
     *
     * @since 4.8.3
     *
     * @param string $query The query from which the placeholder will be removed.
     * @return string The query with the placeholder removed.
     */
    public function remove_placeholder_escape($query)
    {
    }
    /**
     * Insert a row into a table.
     *
     *     wpdb::insert( 'table', array( 'column' => 'foo', 'field' => 'bar' ) )
     *     wpdb::insert( 'table', array( 'column' => 'foo', 'field' => 1337 ), array( '%s', '%d' ) )
     *
     * @since 2.5.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     * @param string       $table  Table name
     * @param array        $data   Data to insert (in column => value pairs).
     *                             Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                             Sending a null value will cause the column to be set to NULL - the corresponding format is ignored in this case.
     * @param array|string $format Optional. An array of formats to be mapped to each of the value in $data.
     *                             If string, that format will be used for all of the values in $data.
     *                             A format is one of '%d', '%f', '%s' (integer, float, string).
     *                             If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @return int|false The number of rows inserted, or false on error.
     */
    public function insert($table, $data, $format = \null)
    {
    }
    /**
     * Replace a row into a table.
     *
     *     wpdb::replace( 'table', array( 'column' => 'foo', 'field' => 'bar' ) )
     *     wpdb::replace( 'table', array( 'column' => 'foo', 'field' => 1337 ), array( '%s', '%d' ) )
     *
     * @since 3.0.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     * @param string       $table  Table name
     * @param array        $data   Data to insert (in column => value pairs).
     *                             Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                             Sending a null value will cause the column to be set to NULL - the corresponding format is ignored in this case.
     * @param array|string $format Optional. An array of formats to be mapped to each of the value in $data.
     *                             If string, that format will be used for all of the values in $data.
     *                             A format is one of '%d', '%f', '%s' (integer, float, string).
     *                             If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @return int|false The number of rows affected, or false on error.
     */
    public function replace($table, $data, $format = \null)
    {
    }
    /**
     * Helper function for insert and replace.
     *
     * Runs an insert or replace query based on $type argument.
     *
     * @since 3.0.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     * @param string       $table  Table name
     * @param array        $data   Data to insert (in column => value pairs).
     *                             Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                             Sending a null value will cause the column to be set to NULL - the corresponding format is ignored in this case.
     * @param array|string $format Optional. An array of formats to be mapped to each of the value in $data.
     *                             If string, that format will be used for all of the values in $data.
     *                             A format is one of '%d', '%f', '%s' (integer, float, string).
     *                             If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @param string $type         Optional. What type of operation is this? INSERT or REPLACE. Defaults to INSERT.
     * @return int|false The number of rows affected, or false on error.
     */
    function _insert_replace_helper($table, $data, $format = \null, $type = 'INSERT')
    {
    }
    /**
     * Update a row in the table
     *
     *     wpdb::update( 'table', array( 'column' => 'foo', 'field' => 'bar' ), array( 'ID' => 1 ) )
     *     wpdb::update( 'table', array( 'column' => 'foo', 'field' => 1337 ), array( 'ID' => 1 ), array( '%s', '%d' ), array( '%d' ) )
     *
     * @since 2.5.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     * @param string       $table        Table name
     * @param array        $data         Data to update (in column => value pairs).
     *                                   Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                                   Sending a null value will cause the column to be set to NULL - the corresponding
     *                                   format is ignored in this case.
     * @param array        $where        A named array of WHERE clauses (in column => value pairs).
     *                                   Multiple clauses will be joined with ANDs.
     *                                   Both $where columns and $where values should be "raw".
     *                                   Sending a null value will create an IS NULL comparison - the corresponding format will be ignored in this case.
     * @param array|string $format       Optional. An array of formats to be mapped to each of the values in $data.
     *                                   If string, that format will be used for all of the values in $data.
     *                                   A format is one of '%d', '%f', '%s' (integer, float, string).
     *                                   If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @param array|string $where_format Optional. An array of formats to be mapped to each of the values in $where.
     *                                   If string, that format will be used for all of the items in $where.
     *                                   A format is one of '%d', '%f', '%s' (integer, float, string).
     *                                   If omitted, all values in $where will be treated as strings.
     * @return int|false The number of rows updated, or false on error.
     */
    public function update($table, $data, $where, $format = \null, $where_format = \null)
    {
    }
    /**
     * Delete a row in the table
     *
     *     wpdb::delete( 'table', array( 'ID' => 1 ) )
     *     wpdb::delete( 'table', array( 'ID' => 1 ), array( '%d' ) )
     *
     * @since 3.4.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     * @param string       $table        Table name
     * @param array        $where        A named array of WHERE clauses (in column => value pairs).
     *                                   Multiple clauses will be joined with ANDs.
     *                                   Both $where columns and $where values should be "raw".
     *                                   Sending a null value will create an IS NULL comparison - the corresponding format will be ignored in this case.
     * @param array|string $where_format Optional. An array of formats to be mapped to each of the values in $where.
     *                                   If string, that format will be used for all of the items in $where.
     *                                   A format is one of '%d', '%f', '%s' (integer, float, string).
     *                                   If omitted, all values in $where will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @return int|false The number of rows updated, or false on error.
     */
    public function delete($table, $where, $where_format = \null)
    {
    }
    /**
     * Processes arrays of field/value pairs and field formats.
     *
     * This is a helper method for wpdb's CRUD methods, which take field/value
     * pairs for inserts, updates, and where clauses. This method first pairs
     * each value with a format. Then it determines the charset of that field,
     * using that to determine if any invalid text would be stripped. If text is
     * stripped, then field processing is rejected and the query fails.
     *
     * @since 4.2.0
     *
     * @param string $table  Table name.
     * @param array  $data   Field/value pair.
     * @param mixed  $format Format for each field.
     * @return array|false Returns an array of fields that contain paired values
     *                    and formats. Returns false for invalid values.
     */
    protected function process_fields($table, $data, $format)
    {
    }
    /**
     * Prepares arrays of value/format pairs as passed to wpdb CRUD methods.
     *
     * @since 4.2.0
     *
     * @param array $data   Array of fields to values.
     * @param mixed $format Formats to be mapped to the values in $data.
     * @return array Array, keyed by field names with values being an array
     *               of 'value' and 'format' keys.
     */
    protected function process_field_formats($data, $format)
    {
    }
    /**
     * Adds field charsets to field/value/format arrays generated by
     * the wpdb::process_field_formats() method.
     *
     * @since 4.2.0
     *
     * @param array  $data  As it comes from the wpdb::process_field_formats() method.
     * @param string $table Table name.
     * @return array|false The same array as $data with additional 'charset' keys.
     */
    protected function process_field_charsets($data, $table)
    {
    }
    /**
     * For string fields, record the maximum string length that field can safely save.
     *
     * @since 4.2.1
     *
     * @param array  $data  As it comes from the wpdb::process_field_charsets() method.
     * @param string $table Table name.
     * @return array|false The same array as $data with additional 'length' keys, or false if
     *                     any of the values were too long for their corresponding field.
     */
    protected function process_field_lengths($data, $table)
    {
    }
    /**
     * Retrieve one variable from the database.
     *
     * Executes a SQL query and returns the value from the SQL result.
     * If the SQL result contains more than one column and/or more than one row, this function returns the value in the column and row specified.
     * If $query is null, this function returns the value in the specified column and row from the previous SQL result.
     *
     * @since 0.71
     *
     * @param string|null $query Optional. SQL query. Defaults to null, use the result from the previous query.
     * @param int         $x     Optional. Column of value to return. Indexed from 0.
     * @param int         $y     Optional. Row of value to return. Indexed from 0.
     * @return string|null Database query result (as string), or null on failure
     */
    public function get_var($query = \null, $x = 0, $y = 0)
    {
    }
    /**
     * Retrieve one row from the database.
     *
     * Executes a SQL query and returns the row from the SQL result.
     *
     * @since 0.71
     *
     * @param string|null $query  SQL query.
     * @param string      $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
     *                            an stdClass object, an associative array, or a numeric array, respectively. Default OBJECT.
     * @param int         $y      Optional. Row to return. Indexed from 0.
     * @return array|object|null|void Database query result in format specified by $output or null on failure
     */
    public function get_row($query = \null, $output = \OBJECT, $y = 0)
    {
    }
    /**
     * Retrieve one column from the database.
     *
     * Executes a SQL query and returns the column from the SQL result.
     * If the SQL result contains more than one column, this function returns the column specified.
     * If $query is null, this function returns the specified column from the previous SQL result.
     *
     * @since 0.71
     *
     * @param string|null $query Optional. SQL query. Defaults to previous query.
     * @param int         $x     Optional. Column to return. Indexed from 0.
     * @return array Database query result. Array indexed from 0 by SQL result row number.
     */
    public function get_col($query = \null, $x = 0)
    {
    }
    /**
     * Retrieve an entire SQL result set from the database (i.e., many rows)
     *
     * Executes a SQL query and returns the entire SQL result.
     *
     * @since 0.71
     *
     * @param string $query  SQL query.
     * @param string $output Optional. Any of ARRAY_A | ARRAY_N | OBJECT | OBJECT_K constants.
     *                       With one of the first three, return an array of rows indexed from 0 by SQL result row number.
     *                       Each row is an associative array (column => value, ...), a numerically indexed array (0 => value, ...), or an object. ( ->column = value ), respectively.
     *                       With OBJECT_K, return an associative array of row objects keyed by the value of each row's first column's value.
     *                       Duplicate keys are discarded.
     * @return array|object|null Database query results
     */
    public function get_results($query = \null, $output = \OBJECT)
    {
    }
    /**
     * Retrieves the character set for the given table.
     *
     * @since 4.2.0
     *
     * @param string $table Table name.
     * @return string|WP_Error Table character set, WP_Error object if it couldn't be found.
     */
    protected function get_table_charset($table)
    {
    }
    /**
     * Retrieves the character set for the given column.
     *
     * @since 4.2.0
     *
     * @param string $table  Table name.
     * @param string $column Column name.
     * @return string|false|WP_Error Column character set as a string. False if the column has no
     *                               character set. WP_Error object if there was an error.
     */
    public function get_col_charset($table, $column)
    {
    }
    /**
     * Retrieve the maximum string length allowed in a given column.
     * The length may either be specified as a byte length or a character length.
     *
     * @since 4.2.1
     *
     * @param string $table  Table name.
     * @param string $column Column name.
     * @return array|false|WP_Error array( 'length' => (int), 'type' => 'byte' | 'char' )
     *                              false if the column has no length (for example, numeric column)
     *                              WP_Error object if there was an error.
     */
    public function get_col_length($table, $column)
    {
    }
    /**
     * Check if a string is ASCII.
     *
     * The negative regex is faster for non-ASCII strings, as it allows
     * the search to finish as soon as it encounters a non-ASCII character.
     *
     * @since 4.2.0
     *
     * @param string $string String to check.
     * @return bool True if ASCII, false if not.
     */
    protected function check_ascii($string)
    {
    }
    /**
     * Check if the query is accessing a collation considered safe on the current version of MySQL.
     *
     * @since 4.2.0
     *
     * @param string $query The query to check.
     * @return bool True if the collation is safe, false if it isn't.
     */
    protected function check_safe_collation($query)
    {
    }
    /**
     * Strips any invalid characters based on value/charset pairs.
     *
     * @since 4.2.0
     *
     * @param array $data Array of value arrays. Each value array has the keys
     *                    'value' and 'charset'. An optional 'ascii' key can be
     *                    set to false to avoid redundant ASCII checks.
     * @return array|WP_Error The $data parameter, with invalid characters removed from
     *                        each value. This works as a passthrough: any additional keys
     *                        such as 'field' are retained in each value array. If we cannot
     *                        remove invalid characters, a WP_Error object is returned.
     */
    protected function strip_invalid_text($data)
    {
    }
    /**
     * Strips any invalid characters from the query.
     *
     * @since 4.2.0
     *
     * @param string $query Query to convert.
     * @return string|WP_Error The converted query, or a WP_Error object if the conversion fails.
     */
    protected function strip_invalid_text_from_query($query)
    {
    }
    /**
     * Strips any invalid characters from the string for a given table and column.
     *
     * @since 4.2.0
     *
     * @param string $table  Table name.
     * @param string $column Column name.
     * @param string $value  The text to check.
     * @return string|WP_Error The converted string, or a WP_Error object if the conversion fails.
     */
    public function strip_invalid_text_for_column($table, $column, $value)
    {
    }
    /**
     * Find the first table name referenced in a query.
     *
     * @since 4.2.0
     *
     * @param string $query The query to search.
     * @return string|false $table The table name found, or false if a table couldn't be found.
     */
    protected function get_table_from_query($query)
    {
    }
    /**
     * Load the column metadata from the last query.
     *
     * @since 3.5.0
     *
     */
    protected function load_col_info()
    {
    }
    /**
     * Retrieve column metadata from the last query.
     *
     * @since 0.71
     *
     * @param string $info_type  Optional. Type one of name, table, def, max_length, not_null, primary_key, multiple_key, unique_key, numeric, blob, type, unsigned, zerofill
     * @param int    $col_offset Optional. 0: col name. 1: which table the col's in. 2: col's max length. 3: if the col is numeric. 4: col's type
     * @return mixed Column Results
     */
    public function get_col_info($info_type = 'name', $col_offset = -1)
    {
    }
    /**
     * Starts the timer, for debugging purposes.
     *
     * @since 1.5.0
     *
     * @return true
     */
    public function timer_start()
    {
    }
    /**
     * Stops the debugging timer.
     *
     * @since 1.5.0
     *
     * @return float Total time spent on the query, in seconds
     */
    public function timer_stop()
    {
    }
    /**
     * Wraps errors in a nice header and footer and dies.
     *
     * Will not die if wpdb::$show_errors is false.
     *
     * @since 1.5.0
     *
     * @param string $message    The Error message
     * @param string $error_code Optional. A Computer readable string to identify the error.
     * @return false|void
     */
    public function bail($message, $error_code = '500')
    {
    }
    /**
     * Closes the current database connection.
     *
     * @since 4.5.0
     *
     * @return bool True if the connection was successfully closed, false if it wasn't,
     *              or the connection doesn't exist.
     */
    public function close()
    {
    }
    /**
     * Whether MySQL database is at least the required minimum version.
     *
     * @since 2.5.0
     *
     * @global string $wp_version
     * @global string $required_mysql_version
     *
     * @return WP_Error|void
     */
    public function check_database_version()
    {
    }
    /**
     * Whether the database supports collation.
     *
     * Called when WordPress is generating the table scheme.
     *
     * Use `wpdb::has_cap( 'collation' )`.
     *
     * @since 2.5.0
     * @deprecated 3.5.0 Use wpdb::has_cap()
     *
     * @return bool True if collation is supported, false if version does not
     */
    public function supports_collation()
    {
    }
    /**
     * The database character collate.
     *
     * @since 3.5.0
     *
     * @return string The database character collate.
     */
    public function get_charset_collate()
    {
    }
    /**
     * Determine if a database supports a particular feature.
     *
     * @since 2.7.0
     * @since 4.1.0 Added support for the 'utf8mb4' feature.
     * @since 4.6.0 Added support for the 'utf8mb4_520' feature.
     *
     * @see wpdb::db_version()
     *
     * @param string $db_cap The feature to check for. Accepts 'collation',
     *                       'group_concat', 'subqueries', 'set_charset',
     *                       'utf8mb4', or 'utf8mb4_520'.
     * @return int|false Whether the database feature is supported, false otherwise.
     */
    public function has_cap($db_cap)
    {
    }
    /**
     * Retrieve the name of the function that called wpdb.
     *
     * Searches up the list of functions until it reaches
     * the one that would most logically had called this method.
     *
     * @since 2.5.0
     *
     * @return string|array The name of the calling function
     */
    public function get_caller()
    {
    }
    /**
     * Retrieves the MySQL server version.
     *
     * @since 2.7.0
     *
     * @return null|string Null on failure, version number on success.
     */
    public function db_version()
    {
    }
}
/**
 * Adds an action hook specific to this page.
 *
 * Fires on {@see 'wp_head'}.
 *
 * @since MU (3.0.0)
 */
function do_activate_header()
{
}
/**
 * Loads styles specific to this page.
 *
 * @since MU (3.0.0)
 */
function wpmu_activate_stylesheet()
{
}
/**
 * Display JavaScript on the page.
 *
 * @since 3.5.0
 */
function export_add_js()
{
}
/**
 * Create the date options fields for exporting a given post type.
 *
 * @global wpdb      $wpdb      WordPress database abstraction object.
 * @global WP_Locale $wp_locale Date and Time Locale object.
 *
 * @since 3.1.0
 *
 * @param string $post_type The post type. Default 'post'.
 */
function export_date_options($post_type = 'post')
{
}
/**
 * Administration API: Core Ajax handlers
 *
 * @package WordPress
 * @subpackage Administration
 * @since 2.1.0
 */
//
// No-privilege Ajax handlers.
//
/**
 * Ajax handler for the Heartbeat API in
 * the no-privilege context.
 *
 * Runs when the user is not logged in.
 *
 * @since 3.6.0
 */
function wp_ajax_nopriv_heartbeat()
{
}
//
// GET-based Ajax handlers.
//
/**
 * Ajax handler for fetching a list table.
 *
 * @since 3.1.0
 */
function wp_ajax_fetch_list()
{
}
/**
 * Ajax handler for tag search.
 *
 * @since 3.1.0
 */
function wp_ajax_ajax_tag_search()
{
}
/**
 * Ajax handler for compression testing.
 *
 * @since 3.1.0
 */
function wp_ajax_wp_compression_test()
{
}
/**
 * Ajax handler for image editor previews.
 *
 * @since 3.1.0
 */
function wp_ajax_imgedit_preview()
{
}
/**
 * Ajax handler for oEmbed caching.
 *
 * @since 3.1.0
 *
 * @global WP_Embed $wp_embed
 */
function wp_ajax_oembed_cache()
{
}
/**
 * Ajax handler for user autocomplete.
 *
 * @since 3.4.0
 */
function wp_ajax_autocomplete_user()
{
}
/**
 * Handles AJAX requests for community events
 *
 * @since 4.8.0
 */
function wp_ajax_get_community_events()
{
}
/**
 * Ajax handler for dashboard widgets.
 *
 * @since 3.4.0
 */
function wp_ajax_dashboard_widgets()
{
}
/**
 * Ajax handler for Customizer preview logged-in status.
 *
 * @since 3.4.0
 */
function wp_ajax_logged_in()
{
}
//
// Ajax helpers.
//
/**
 * Sends back current comment total and new page links if they need to be updated.
 *
 * Contrary to normal success Ajax response ("1"), die with time() on success.
 *
 * @access private
 * @since 2.7.0
 *
 * @param int $comment_id
 * @param int $delta
 */
function _wp_ajax_delete_comment_response($comment_id, $delta = -1)
{
}
//
// POST-based Ajax handlers.
//
/**
 * Ajax handler for adding a hierarchical term.
 *
 * @access private
 * @since 3.1.0
 */
function _wp_ajax_add_hierarchical_term()
{
}
/**
 * Ajax handler for deleting a comment.
 *
 * @since 3.1.0
 */
function wp_ajax_delete_comment()
{
}
/**
 * Ajax handler for deleting a tag.
 *
 * @since 3.1.0
 */
function wp_ajax_delete_tag()
{
}
/**
 * Ajax handler for deleting a link.
 *
 * @since 3.1.0
 */
function wp_ajax_delete_link()
{
}
/**
 * Ajax handler for deleting meta.
 *
 * @since 3.1.0
 */
function wp_ajax_delete_meta()
{
}
/**
 * Ajax handler for deleting a post.
 *
 * @since 3.1.0
 *
 * @param string $action Action to perform.
 */
function wp_ajax_delete_post($action)
{
}
/**
 * Ajax handler for sending a post to the trash.
 *
 * @since 3.1.0
 *
 * @param string $action Action to perform.
 */
function wp_ajax_trash_post($action)
{
}
/**
 * Ajax handler to restore a post from the trash.
 *
 * @since 3.1.0
 *
 * @param string $action Action to perform.
 */
function wp_ajax_untrash_post($action)
{
}
/**
 * @since 3.1.0
 *
 * @param string $action
 */
function wp_ajax_delete_page($action)
{
}
/**
 * Ajax handler to dim a comment.
 *
 * @since 3.1.0
 */
function wp_ajax_dim_comment()
{
}
/**
 * Ajax handler for adding a link category.
 *
 * @since 3.1.0
 *
 * @param string $action Action to perform.
 */
function wp_ajax_add_link_category($action)
{
}
/**
 * Ajax handler to add a tag.
 *
 * @since 3.1.0
 */
function wp_ajax_add_tag()
{
}
/**
 * Ajax handler for getting a tagcloud.
 *
 * @since 3.1.0
 */
function wp_ajax_get_tagcloud()
{
}
/**
 * Ajax handler for getting comments.
 *
 * @since 3.1.0
 *
 * @global int           $post_id
 *
 * @param string $action Action to perform.
 */
function wp_ajax_get_comments($action)
{
}
/**
 * Ajax handler for replying to a comment.
 *
 * @since 3.1.0
 *
 * @param string $action Action to perform.
 */
function wp_ajax_replyto_comment($action)
{
}
/**
 * Ajax handler for editing a comment.
 *
 * @since 3.1.0
 */
function wp_ajax_edit_comment()
{
}
/**
 * Ajax handler for adding a menu item.
 *
 * @since 3.1.0
 */
function wp_ajax_add_menu_item()
{
}
/**
 * Ajax handler for adding meta.
 *
 * @since 3.1.0
 */
function wp_ajax_add_meta()
{
}
/**
 * Ajax handler for adding a user.
 *
 * @since 3.1.0
 *
 * @param string $action Action to perform.
 */
function wp_ajax_add_user($action)
{
}
/**
 * Ajax handler for closed post boxes.
 *
 * @since 3.1.0
 */
function wp_ajax_closed_postboxes()
{
}
/**
 * Ajax handler for hidden columns.
 *
 * @since 3.1.0
 */
function wp_ajax_hidden_columns()
{
}
/**
 * Ajax handler for updating whether to display the welcome panel.
 *
 * @since 3.1.0
 */
function wp_ajax_update_welcome_panel()
{
}
/**
 * Ajax handler for retrieving menu meta boxes.
 *
 * @since 3.1.0
 */
function wp_ajax_menu_get_metabox()
{
}
/**
 * Ajax handler for internal linking.
 *
 * @since 3.1.0
 */
function wp_ajax_wp_link_ajax()
{
}
/**
 * Ajax handler for menu locations save.
 *
 * @since 3.1.0
 */
function wp_ajax_menu_locations_save()
{
}
/**
 * Ajax handler for saving the meta box order.
 *
 * @since 3.1.0
 */
function wp_ajax_meta_box_order()
{
}
/**
 * Ajax handler for menu quick searching.
 *
 * @since 3.1.0
 */
function wp_ajax_menu_quick_search()
{
}
/**
 * Ajax handler to retrieve a permalink.
 *
 * @since 3.1.0
 */
function wp_ajax_get_permalink()
{
}
/**
 * Ajax handler to retrieve a sample permalink.
 *
 * @since 3.1.0
 */
function wp_ajax_sample_permalink()
{
}
/**
 * Ajax handler for Quick Edit saving a post from a list table.
 *
 * @since 3.1.0
 *
 * @global string $mode List table view mode.
 */
function wp_ajax_inline_save()
{
}
/**
 * Ajax handler for quick edit saving for a term.
 *
 * @since 3.1.0
 */
function wp_ajax_inline_save_tax()
{
}
/**
 * Ajax handler for querying posts for the Find Posts modal.
 *
 * @see window.findPosts
 *
 * @since 3.1.0
 */
function wp_ajax_find_posts()
{
}
/**
 * Ajax handler for saving the widgets order.
 *
 * @since 3.1.0
 */
function wp_ajax_widgets_order()
{
}
/**
 * Ajax handler for saving a widget.
 *
 * @since 3.1.0
 *
 * @global array $wp_registered_widgets
 * @global array $wp_registered_widget_controls
 * @global array $wp_registered_widget_updates
 */
function wp_ajax_save_widget()
{
}
/**
 * Ajax handler for saving a widget.
 *
 * @since 3.9.0
 *
 * @global WP_Customize_Manager $wp_customize
 */
function wp_ajax_update_widget()
{
}
/**
 * Ajax handler for removing inactive widgets.
 *
 * @since 4.4.0
 */
function wp_ajax_delete_inactive_widgets()
{
}
/**
 * Ajax handler for uploading attachments
 *
 * @since 3.3.0
 */
function wp_ajax_upload_attachment()
{
}
/**
 * Ajax handler for image editing.
 *
 * @since 3.1.0
 */
function wp_ajax_image_editor()
{
}
/**
 * Ajax handler for setting the featured image.
 *
 * @since 3.1.0
 */
function wp_ajax_set_post_thumbnail()
{
}
/**
 * Ajax handler for retrieving HTML for the featured image.
 *
 * @since 4.6.0
 */
function wp_ajax_get_post_thumbnail_html()
{
}
/**
 * Ajax handler for setting the featured image for an attachment.
 *
 * @since 4.0.0
 *
 * @see set_post_thumbnail()
 */
function wp_ajax_set_attachment_thumbnail()
{
}
/**
 * Ajax handler for date formatting.
 *
 * @since 3.1.0
 */
function wp_ajax_date_format()
{
}
/**
 * Ajax handler for time formatting.
 *
 * @since 3.1.0
 */
function wp_ajax_time_format()
{
}
/**
 * Ajax handler for saving posts from the fullscreen editor.
 *
 * @since 3.1.0
 * @deprecated 4.3.0
 */
function wp_ajax_wp_fullscreen_save_post()
{
}
/**
 * Ajax handler for removing a post lock.
 *
 * @since 3.1.0
 */
function wp_ajax_wp_remove_post_lock()
{
}
/**
 * Ajax handler for dismissing a WordPress pointer.
 *
 * @since 3.1.0
 */
function wp_ajax_dismiss_wp_pointer()
{
}
/**
 * Ajax handler for getting an attachment.
 *
 * @since 3.5.0
 */
function wp_ajax_get_attachment()
{
}
/**
 * Ajax handler for querying attachments.
 *
 * @since 3.5.0
 */
function wp_ajax_query_attachments()
{
}
/**
 * Ajax handler for updating attachment attributes.
 *
 * @since 3.5.0
 */
function wp_ajax_save_attachment()
{
}
/**
 * Ajax handler for saving backward compatible attachment attributes.
 *
 * @since 3.5.0
 */
function wp_ajax_save_attachment_compat()
{
}
/**
 * Ajax handler for saving the attachment order.
 *
 * @since 3.5.0
 */
function wp_ajax_save_attachment_order()
{
}
/**
 * Ajax handler for sending an attachment to the editor.
 *
 * Generates the HTML to send an attachment to the editor.
 * Backward compatible with the {@see 'media_send_to_editor'} filter
 * and the chain of filters that follow.
 *
 * @since 3.5.0
 */
function wp_ajax_send_attachment_to_editor()
{
}
/**
 * Ajax handler for sending a link to the editor.
 *
 * Generates the HTML to send a non-image embed link to the editor.
 *
 * Backward compatible with the following filters:
 * - file_send_to_editor_url
 * - audio_send_to_editor_url
 * - video_send_to_editor_url
 *
 * @since 3.5.0
 *
 * @global WP_Post  $post
 * @global WP_Embed $wp_embed
 */
function wp_ajax_send_link_to_editor()
{
}
/**
 * Ajax handler for the Heartbeat API.
 *
 * Runs when the user is logged in.
 *
 * @since 3.6.0
 */
function wp_ajax_heartbeat()
{
}
/**
 * Ajax handler for getting revision diffs.
 *
 * @since 3.6.0
 */
function wp_ajax_get_revision_diffs()
{
}
/**
 * Ajax handler for auto-saving the selected color scheme for
 * a user's own profile.
 *
 * @since 3.8.0
 *
 * @global array $_wp_admin_css_colors
 */
function wp_ajax_save_user_color_scheme()
{
}
/**
 * Ajax handler for getting themes from themes_api().
 *
 * @since 3.9.0
 *
 * @global array $themes_allowedtags
 * @global array $theme_field_defaults
 */
function wp_ajax_query_themes()
{
}
/**
 * Apply [embed] Ajax handlers to a string.
 *
 * @since 4.0.0
 *
 * @global WP_Post    $post       Global $post.
 * @global WP_Embed   $wp_embed   Embed API instance.
 * @global WP_Scripts $wp_scripts
 * @global int        $content_width
 */
function wp_ajax_parse_embed()
{
}
/**
 * @since 4.0.0
 *
 * @global WP_Post    $post
 * @global WP_Scripts $wp_scripts
 */
function wp_ajax_parse_media_shortcode()
{
}
/**
 * Ajax handler for destroying multiple open sessions for a user.
 *
 * @since 4.1.0
 */
function wp_ajax_destroy_sessions()
{
}
/**
 * Ajax handler for cropping an image.
 *
 * @since 4.3.0
 */
function wp_ajax_crop_image()
{
}
/**
 * Ajax handler for generating a password.
 *
 * @since 4.4.0
 */
function wp_ajax_generate_password()
{
}
/**
 * Ajax handler for saving the user's WordPress.org username.
 *
 * @since 4.4.0
 */
function wp_ajax_save_wporg_username()
{
}
/**
 * Ajax handler for installing a theme.
 *
 * @since 4.6.0
 *
 * @see Theme_Upgrader
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 */
function wp_ajax_install_theme()
{
}
/**
 * Ajax handler for updating a theme.
 *
 * @since 4.6.0
 *
 * @see Theme_Upgrader
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 */
function wp_ajax_update_theme()
{
}
/**
 * Ajax handler for deleting a theme.
 *
 * @since 4.6.0
 *
 * @see delete_theme()
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 */
function wp_ajax_delete_theme()
{
}
/**
 * Ajax handler for installing a plugin.
 *
 * @since 4.6.0
 *
 * @see Plugin_Upgrader
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 */
function wp_ajax_install_plugin()
{
}
/**
 * Ajax handler for updating a plugin.
 *
 * @since 4.2.0
 *
 * @see Plugin_Upgrader
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 */
function wp_ajax_update_plugin()
{
}
/**
 * Ajax handler for deleting a plugin.
 *
 * @since 4.6.0
 *
 * @see delete_plugins()
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 */
function wp_ajax_delete_plugin()
{
}
/**
 * Ajax handler for searching plugins.
 *
 * @since 4.6.0
 *
 * @global string $s Search term.
 */
function wp_ajax_search_plugins()
{
}
/**
 * Ajax handler for searching plugins to install.
 *
 * @since 4.6.0
 */
function wp_ajax_search_install_plugins()
{
}
/**
 * Ajax handler for editing a theme or plugin file.
 *
 * @since 4.9.0
 * @see wp_edit_theme_plugin_file()
 */
function wp_ajax_edit_theme_plugin_file()
{
}
/**
 * Ajax handler for exporting a user's personal data.
 *
 * @since 4.9.6
 */
function wp_ajax_wp_privacy_export_personal_data()
{
}
/**
 * Ajax handler for erasing personal data.
 *
 * @since 4.9.6
 */
function wp_ajax_wp_privacy_erase_personal_data()
{
}
/**
 * WordPress Bookmark Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Add a link to using values provided in $_POST.
 *
 * @since 2.0.0
 *
 * @return int|WP_Error Value 0 or WP_Error on failure. The link ID on success.
 */
function add_link()
{
}
/**
 * Updates or inserts a link using values provided in $_POST.
 *
 * @since 2.0.0
 *
 * @param int $link_id Optional. ID of the link to edit. Default 0.
 * @return int|WP_Error Value 0 or WP_Error on failure. The link ID on success.
 */
function edit_link($link_id = 0)
{
}
/**
 * Retrieves the default link for editing.
 *
 * @since 2.0.0
 *
 * @return stdClass Default link object.
 */
function get_default_link_to_edit()
{
}
/**
 * Deletes a specified link from the database.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $link_id ID of the link to delete
 * @return true Always true.
 */
function wp_delete_link($link_id)
{
}
/**
 * Retrieves the link categories associated with the link specified.
 *
 * @since 2.1.0
 *
 * @param int $link_id Link ID to look up
 * @return array The requested link's categories
 */
function wp_get_link_cats($link_id = 0)
{
}
/**
 * Retrieves link data based on its ID.
 *
 * @since 2.0.0
 *
 * @param int|stdClass $link Link ID or object to retrieve.
 * @return object Link object for editing.
 */
function get_link_to_edit($link)
{
}
/**
 * Inserts/updates links into/in the database.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $linkdata Elements that make up the link to insert.
 * @param bool  $wp_error Optional. Whether to return a WP_Error object on failure. Default false.
 * @return int|WP_Error Value 0 or WP_Error on failure. The link ID on success.
 */
function wp_insert_link($linkdata, $wp_error = \false)
{
}
/**
 * Update link with the specified link categories.
 *
 * @since 2.1.0
 *
 * @param int   $link_id         ID of the link to update.
 * @param array $link_categories Array of link categories to add the link to.
 */
function wp_set_link_cats($link_id = 0, $link_categories = array())
{
}
/**
 * Updates a link in the database.
 *
 * @since 2.0.0
 *
 * @param array $linkdata Link data to update.
 * @return int|WP_Error Value 0 or WP_Error on failure. The updated link ID on success.
 */
function wp_update_link($linkdata)
{
}
/**
 * Outputs the 'disabled' message for the WordPress Link Manager.
 *
 * @since 3.5.0
 * @access private
 *
 * @global string $pagenow
 */
function wp_link_manager_disabled_message()
{
}
// End of class
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilPathReduction()
// Description :
// Parameters :
// Return Values :
// --------------------------------------------------------------------------------
function PclZipUtilPathReduction($p_dir)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilPathInclusion()
// Description :
//   This function indicates if the path $p_path is under the $p_dir tree. Or,
//   said in an other way, if the file or sub-dir $p_path is inside the dir
//   $p_dir.
//   The function indicates also if the path is exactly the same as the dir.
//   This function supports path with duplicated '/' like '//', but does not
//   support '.' or '..' statements.
// Parameters :
// Return Values :
//   0 if $p_path is not inside directory $p_dir
//   1 if $p_path is inside directory $p_dir
//   2 if $p_path is exactly the same as $p_dir
// --------------------------------------------------------------------------------
function PclZipUtilPathInclusion($p_dir, $p_path)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilCopyBlock()
// Description :
// Parameters :
//   $p_mode : read/write compression mode
//             0 : src & dest normal
//             1 : src gzip, dest normal
//             2 : src normal, dest gzip
//             3 : src & dest gzip
// Return Values :
// --------------------------------------------------------------------------------
function PclZipUtilCopyBlock($p_src, $p_dest, $p_size, $p_mode = 0)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilRename()
// Description :
//   This function tries to do a simple rename() function. If it fails, it
//   tries to copy the $p_src file in a new $p_dest file and then unlink the
//   first one.
// Parameters :
//   $p_src : Old filename
//   $p_dest : New filename
// Return Values :
//   1 on success, 0 on failure.
// --------------------------------------------------------------------------------
function PclZipUtilRename($p_src, $p_dest)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilOptionText()
// Description :
//   Translate option value in text. Mainly for debug purpose.
// Parameters :
//   $p_option : the option value.
// Return Values :
//   The option text value.
// --------------------------------------------------------------------------------
function PclZipUtilOptionText($p_option)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilTranslateWinPath()
// Description :
//   Translate windows path by replacing '\' by '/' and optionally removing
//   drive letter.
// Parameters :
//   $p_path : path to translate.
//   $p_remove_disk_letter : true | false
// Return Values :
//   The path translated.
// --------------------------------------------------------------------------------
function PclZipUtilTranslateWinPath($p_path, $p_remove_disk_letter = \true)
{
}
/**
 * Returns value of command line params.
 * Exits when a required param is not set.
 *
 * @param string $param
 * @param bool   $required
 * @return mixed
 */
function get_cli_args($param, $required = \false)
{
}
/**
 * WordPress Comment Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 2.3.0
 */
/**
 * Determine if a comment exists based on author and date.
 *
 * For best performance, use `$timezone = 'gmt'`, which queries a field that is properly indexed. The default value
 * for `$timezone` is 'blog' for legacy reasons.
 *
 * @since 2.0.0
 * @since 4.4.0 Added the `$timezone` parameter.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $comment_author Author of the comment.
 * @param string $comment_date   Date of the comment.
 * @param string $timezone       Timezone. Accepts 'blog' or 'gmt'. Default 'blog'.
 *
 * @return mixed Comment post ID on success.
 */
function comment_exists($comment_author, $comment_date, $timezone = 'blog')
{
}
/**
 * Update a comment with values provided in $_POST.
 *
 * @since 2.0.0
 */
function edit_comment()
{
}
/**
 * Returns a WP_Comment object based on comment ID.
 *
 * @since 2.0.0
 *
 * @param int $id ID of comment to retrieve.
 * @return WP_Comment|false Comment if found. False on failure.
 */
function get_comment_to_edit($id)
{
}
/**
 * Get the number of pending comments on a post or posts
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|array $post_id Either a single Post ID or an array of Post IDs
 * @return int|array Either a single Posts pending comments as an int or an array of ints keyed on the Post IDs
 */
function get_pending_comments_num($post_id)
{
}
/**
 * Add avatars to relevant places in admin, or try to.
 *
 * @since 2.5.0
 *
 * @param string $name User name.
 * @return string Avatar with Admin name.
 */
function floated_admin_avatar($name)
{
}
/**
 * @since 2.7.0
 */
function enqueue_comment_hotkeys_js()
{
}
/**
 * Display error message at bottom of comments.
 *
 * @param string $msg Error Message. Assumed to contain HTML and be sanitized.
 */
function comment_footer_die($msg)
{
}
/**
 * WordPress Credits Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Retrieve the contributor credits.
 *
 * @since 3.2.0
 *
 * @return array|false A list of all of the contributors, or false on error.
 */
function wp_credits()
{
}
/**
 * Retrieve the link to a contributor's WordPress.org profile page.
 *
 * @access private
 * @since 3.2.0
 *
 * @param string $display_name  The contributor's display name (passed by reference).
 * @param string $username      The contributor's username.
 * @param string $profiles      URL to the contributor's WordPress.org profile page.
 */
function _wp_credits_add_profile_link(&$display_name, $username, $profiles)
{
}
/**
 * Retrieve the link to an external library used in WordPress.
 *
 * @access private
 * @since 3.2.0
 *
 * @param string $data External library data (passed by reference).
 */
function _wp_credits_build_object_link(&$data)
{
}
/**
 * WordPress Dashboard Widget Administration Screen API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Registers dashboard widgets.
 *
 * Handles POST data, sets up filters.
 *
 * @since 2.5.0
 *
 * @global array $wp_registered_widgets
 * @global array $wp_registered_widget_controls
 * @global array $wp_dashboard_control_callbacks
 */
function wp_dashboard_setup()
{
}
/**
 * Adds a new dashboard widget.
 *
 * @since 2.7.0
 *
 * @global array $wp_dashboard_control_callbacks
 *
 * @param string   $widget_id        Widget ID  (used in the 'id' attribute for the widget).
 * @param string   $widget_name      Title of the widget.
 * @param callable $callback         Function that fills the widget with the desired content.
 *                                   The function should echo its output.
 * @param callable $control_callback Optional. Function that outputs controls for the widget. Default null.
 * @param array    $callback_args    Optional. Data that should be set as the $args property of the widget array
 *                                   (which is the second parameter passed to your callback). Default null.
 */
function wp_add_dashboard_widget($widget_id, $widget_name, $callback, $control_callback = \null, $callback_args = \null)
{
}
/**
 * Outputs controls for the current dashboard widget.
 *
 * @access private
 * @since 2.7.0
 *
 * @param mixed $dashboard
 * @param array $meta_box
 */
function _wp_dashboard_control_callback($dashboard, $meta_box)
{
}
/**
 * Displays the dashboard.
 *
 * @since 2.5.0
 */
function wp_dashboard()
{
}
//
// Dashboard Widgets
//
/**
 * Dashboard widget that displays some basic stats about the site.
 *
 * Formerly 'Right Now'. A streamlined 'At a Glance' as of 3.8.
 *
 * @since 2.7.0
 */
function wp_dashboard_right_now()
{
}
/**
 * @since 3.1.0
 */
function wp_network_dashboard_right_now()
{
}
/**
 * The Quick Draft widget display and creation of drafts.
 *
 * @since 3.8.0
 *
 * @global int $post_ID
 *
 * @param string $error_msg Optional. Error message. Default false.
 */
function wp_dashboard_quick_press($error_msg = \false)
{
}
/**
 * Show recent drafts of the user on the dashboard.
 *
 * @since 2.7.0
 *
 * @param array $drafts
 */
function wp_dashboard_recent_drafts($drafts = \false)
{
}
/**
 * Outputs a row for the Recent Comments widget.
 *
 * @access private
 * @since 2.7.0
 *
 * @global WP_Comment $comment
 *
 * @param WP_Comment $comment   The current comment.
 * @param bool       $show_date Optional. Whether to display the date.
 */
function _wp_dashboard_recent_comments_row(&$comment, $show_date = \true)
{
}
/**
 * Callback function for Activity widget.
 *
 * @since 3.8.0
 */
function wp_dashboard_site_activity()
{
}
/**
 * Generates Publishing Soon and Recently Published sections.
 *
 * @since 3.8.0
 *
 * @param array $args {
 *     An array of query and display arguments.
 *
 *     @type int    $max     Number of posts to display.
 *     @type string $status  Post status.
 *     @type string $order   Designates ascending ('ASC') or descending ('DESC') order.
 *     @type string $title   Section title.
 *     @type string $id      The container id.
 * }
 * @return bool False if no posts were found. True otherwise.
 */
function wp_dashboard_recent_posts($args)
{
}
/**
 * Show Comments section.
 *
 * @since 3.8.0
 *
 * @param int $total_items Optional. Number of comments to query. Default 5.
 * @return bool False if no comments were found. True otherwise.
 */
function wp_dashboard_recent_comments($total_items = 5)
{
}
/**
 * Display generic dashboard RSS widget feed.
 *
 * @since 2.5.0
 *
 * @param string $widget_id
 */
function wp_dashboard_rss_output($widget_id)
{
}
/**
 * Checks to see if all of the feed url in $check_urls are cached.
 *
 * If $check_urls is empty, look for the rss feed url found in the dashboard
 * widget options of $widget_id. If cached, call $callback, a function that
 * echoes out output for this widget. If not cache, echo a "Loading..." stub
 * which is later replaced by Ajax call (see top of /wp-admin/index.php)
 *
 * @since 2.5.0
 *
 * @param string $widget_id
 * @param callable $callback
 * @param array $check_urls RSS feeds
 * @return bool False on failure. True on success.
 */
function wp_dashboard_cached_rss_widget($widget_id, $callback, $check_urls = array())
{
}
//
// Dashboard Widgets Controls
//
/**
 * Calls widget control callback.
 *
 * @since 2.5.0
 *
 * @global array $wp_dashboard_control_callbacks
 *
 * @param int $widget_control_id Registered Widget ID.
 */
function wp_dashboard_trigger_widget_control($widget_control_id = \false)
{
}
/**
 * The RSS dashboard widget control.
 *
 * Sets up $args to be used as input to wp_widget_rss_form(). Handles POST data
 * from RSS-type widgets.
 *
 * @since 2.5.0
 *
 * @param string $widget_id
 * @param array $form_inputs
 */
function wp_dashboard_rss_control($widget_id, $form_inputs = array())
{
}
/**
 * Renders the Events and News dashboard widget.
 *
 * @since 4.8.0
 */
function wp_dashboard_events_news()
{
}
/**
 * Prints the markup for the Community Events section of the Events and News Dashboard widget.
 *
 * @since 4.8.0
 */
function wp_print_community_events_markup()
{
}
/**
 * Renders the events templates for the Event and News widget.
 *
 * @since 4.8.0
 */
function wp_print_community_events_templates()
{
}
/**
 * WordPress News dashboard widget.
 *
 * @since 2.7.0
 * @since 4.8.0 Removed popular plugins feed.
 */
function wp_dashboard_primary()
{
}
/**
 * Display the WordPress news feeds.
 *
 * @since 3.8.0
 * @since 4.8.0 Removed popular plugins feed.
 *
 * @param string $widget_id Widget ID.
 * @param array  $feeds     Array of RSS feeds.
 */
function wp_dashboard_primary_output($widget_id, $feeds)
{
}
/**
 * Display file upload quota on dashboard.
 *
 * Runs on the {@see 'activity_box_end'} hook in wp_dashboard_right_now().
 *
 * @since 3.0.0
 *
 * @return bool|null True if not multisite, user can't upload files, or the space check option is disabled.
 */
function wp_dashboard_quota()
{
}
// Display Browser Nag Meta Box
function wp_dashboard_browser_nag()
{
}
/**
 * @since 3.2.0
 *
 * @param array $classes
 * @return array
 */
function dashboard_browser_nag_class($classes)
{
}
/**
 * Check if the user needs a browser update
 *
 * @since 3.2.0
 *
 * @return array|bool False on failure, array of browser data on success.
 */
function wp_check_browser_version()
{
}
/**
 * Empty function usable by plugins to output empty dashboard widget (to be populated later by JS).
 */
function wp_dashboard_empty()
{
}
/**
 * Displays a welcome panel to introduce users to WordPress.
 *
 * @since 3.3.0
 */
function wp_welcome_panel()
{
}
/**
 * Deprecated admin functions from past WordPress versions. You shouldn't use these
 * functions and look for the alternatives instead. The functions will be removed
 * in a later version.
 *
 * @package WordPress
 * @subpackage Deprecated
 */
/*
 * Deprecated functions come here to die.
 */
/**
 * @since 2.1.0
 * @deprecated 2.1.0 Use wp_editor()
 * @see wp_editor()
 */
function tinymce_include()
{
}
/**
 * Unused Admin function.
 *
 * @since 2.0.0
 * @deprecated 2.5.0
 *
 */
function documentation_link()
{
}
/**
 * Calculates the new dimensions for a downsampled image.
 *
 * @since 2.0.0
 * @deprecated 3.0.0 Use wp_constrain_dimensions()
 * @see wp_constrain_dimensions()
 *
 * @param int $width Current width of the image
 * @param int $height Current height of the image
 * @param int $wmax Maximum wanted width
 * @param int $hmax Maximum wanted height
 * @return array Shrunk dimensions (width, height).
 */
function wp_shrink_dimensions($width, $height, $wmax = 128, $hmax = 96)
{
}
/**
 * Calculated the new dimensions for a downsampled image.
 *
 * @since 2.0.0
 * @deprecated 3.5.0 Use wp_constrain_dimensions()
 * @see wp_constrain_dimensions()
 *
 * @param int $width Current width of the image
 * @param int $height Current height of the image
 * @return array Shrunk dimensions (width, height).
 */
function get_udims($width, $height)
{
}
/**
 * Legacy function used to generate the categories checklist control.
 *
 * @since 0.71
 * @deprecated 2.6.0 Use wp_category_checklist()
 * @see wp_category_checklist()
 *
 * @param int $default       Unused.
 * @param int $parent        Unused.
 * @param array $popular_ids Unused.
 */
function dropdown_categories($default = 0, $parent = 0, $popular_ids = array())
{
}
/**
 * Legacy function used to generate a link categories checklist control.
 *
 * @since 2.1.0
 * @deprecated 2.6.0 Use wp_link_category_checklist()
 * @see wp_link_category_checklist()
 *
 * @param int $default Unused.
 */
function dropdown_link_categories($default = 0)
{
}
/**
 * Get the real filesystem path to a file to edit within the admin.
 *
 * @since 1.5.0
 * @deprecated 2.9.0
 * @uses WP_CONTENT_DIR Full filesystem path to the wp-content directory.
 *
 * @param string $file Filesystem path relative to the wp-content directory.
 * @return string Full filesystem path to edit.
 */
function get_real_file_to_edit($file)
{
}
/**
 * Legacy function used for generating a categories drop-down control.
 *
 * @since 1.2.0
 * @deprecated 3.0.0 Use wp_dropdown_categories()
 * @see wp_dropdown_categories()
 *
 * @param int $currentcat    Optional. ID of the current category. Default 0.
 * @param int $currentparent Optional. Current parent category ID. Default 0.
 * @param int $parent        Optional. Parent ID to retrieve categories for. Default 0.
 * @param int $level         Optional. Number of levels deep to display. Default 0.
 * @param array $categories  Optional. Categories to include in the control. Default 0.
 * @return bool|null False if no categories were found.
 */
function wp_dropdown_cats($currentcat = 0, $currentparent = 0, $parent = 0, $level = 0, $categories = 0)
{
}
/**
 * Register a setting and its sanitization callback
 *
 * @since 2.7.0
 * @deprecated 3.0.0 Use register_setting()
 * @see register_setting()
 *
 * @param string $option_group A settings group name. Should correspond to a whitelisted option key name.
 * 	Default whitelisted option key names include "general," "discussion," and "reading," among others.
 * @param string $option_name The name of an option to sanitize and save.
 * @param callable $sanitize_callback A callback function that sanitizes the option's value.
 */
function add_option_update_handler($option_group, $option_name, $sanitize_callback = '')
{
}
/**
 * Unregister a setting
 *
 * @since 2.7.0
 * @deprecated 3.0.0 Use unregister_setting()
 * @see unregister_setting()
 *
 * @param string $option_group
 * @param string $option_name
 * @param callable $sanitize_callback
 */
function remove_option_update_handler($option_group, $option_name, $sanitize_callback = '')
{
}
/**
 * Determines the language to use for CodePress syntax highlighting.
 *
 * @since 2.8.0
 * @deprecated 3.0.0
 *
 * @param string $filename
**/
function codepress_get_lang($filename)
{
}
/**
 * Adds JavaScript required to make CodePress work on the theme/plugin editors.
 *
 * @since 2.8.0
 * @deprecated 3.0.0
**/
function codepress_footer_js()
{
}
/**
 * Determine whether to use CodePress.
 *
 * @since 2.8.0
 * @deprecated 3.0.0
**/
function use_codepress()
{
}
/**
 * Get all user IDs.
 *
 * @deprecated 3.1.0 Use get_users()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return array List of user IDs.
 */
function get_author_user_ids()
{
}
/**
 * Gets author users who can edit posts.
 *
 * @deprecated 3.1.0 Use get_users()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $user_id User ID.
 * @return array|bool List of editable authors. False if no editable users.
 */
function get_editable_authors($user_id)
{
}
/**
 * Gets the IDs of any users who can edit posts.
 *
 * @deprecated 3.1.0 Use get_users()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int  $user_id       User ID.
 * @param bool $exclude_zeros Optional. Whether to exclude zeroes. Default true.
 * @return array Array of editable user IDs, empty array otherwise.
 */
function get_editable_user_ids($user_id, $exclude_zeros = \true, $post_type = 'post')
{
}
/**
 * Gets all users who are not authors.
 *
 * @deprecated 3.1.0 Use get_users()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function get_nonauthor_user_ids()
{
}
/**
 * Retrieves editable posts from other users.
 *
 * @since 2.3.0
 * @deprecated 3.1.0 Use get_posts()
 * @see get_posts()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $user_id User ID to not retrieve posts from.
 * @param string $type    Optional. Post type to retrieve. Accepts 'draft', 'pending' or 'any' (all).
 *                        Default 'any'.
 * @return array List of posts from others.
 */
function get_others_unpublished_posts($user_id, $type = 'any')
{
}
/**
 * Retrieve drafts from other users.
 *
 * @deprecated 3.1.0 Use get_posts()
 * @see get_posts()
 *
 * @param int $user_id User ID.
 * @return array List of drafts from other users.
 */
function get_others_drafts($user_id)
{
}
/**
 * Retrieve pending review posts from other users.
 *
 * @deprecated 3.1.0 Use get_posts()
 * @see get_posts()
 *
 * @param int $user_id User ID.
 * @return array List of posts with pending review post type from other users.
 */
function get_others_pending($user_id)
{
}
/**
 * Output the QuickPress dashboard widget.
 *
 * @since 3.0.0
 * @deprecated 3.2.0 Use wp_dashboard_quick_press()
 * @see wp_dashboard_quick_press()
 */
function wp_dashboard_quick_press_output()
{
}
/**
 * Outputs the TinyMCE editor.
 *
 * @since 2.7.0
 * @deprecated 3.3.0 Use wp_editor()
 * @see wp_editor()
 *
 * @staticvar int $num
 */
function wp_tiny_mce($teeny = \false, $settings = \false)
{
}
/**
 * Preloads TinyMCE dialogs.
 *
 * @deprecated 3.3.0 Use wp_editor()
 * @see wp_editor()
 */
function wp_preload_dialogs()
{
}
/**
 * Prints TinyMCE editor JS.
 *
 * @deprecated 3.3.0 Use wp_editor()
 * @see wp_editor()
 */
function wp_print_editor_js()
{
}
/**
 * Handles quicktags.
 *
 * @deprecated 3.3.0 Use wp_editor()
 * @see wp_editor()
 */
function wp_quicktags()
{
}
/**
 * Returns the screen layout options.
 *
 * @since 2.8.0
 * @deprecated 3.3.0 WP_Screen::render_screen_layout()
 * @see WP_Screen::render_screen_layout()
 */
function screen_layout($screen)
{
}
/**
 * Returns the screen's per-page options.
 *
 * @since 2.8.0
 * @deprecated 3.3.0 Use WP_Screen::render_per_page_options()
 * @see WP_Screen::render_per_page_options()
 */
function screen_options($screen)
{
}
/**
 * Renders the screen's help.
 *
 * @since 2.7.0
 * @deprecated 3.3.0 Use WP_Screen::render_screen_meta()
 * @see WP_Screen::render_screen_meta()
 */
function screen_meta($screen)
{
}
/**
 * Favorite actions were deprecated in version 3.2. Use the admin bar instead.
 *
 * @since 2.7.0
 * @deprecated 3.2.0 Use WP_Admin_Bar
 * @see WP_Admin_Bar
 */
function favorite_actions()
{
}
/**
 * Handles uploading an image.
 *
 * @deprecated 3.3.0 Use wp_media_upload_handler()
 * @see wp_media_upload_handler()
 *
 * @return null|string
 */
function media_upload_image()
{
}
/**
 * Handles uploading an audio file.
 *
 * @deprecated 3.3.0 Use wp_media_upload_handler()
 * @see wp_media_upload_handler()
 *
 * @return null|string
 */
function media_upload_audio()
{
}
/**
 * Handles uploading a video file.
 *
 * @deprecated 3.3.0 Use wp_media_upload_handler()
 * @see wp_media_upload_handler()
 *
 * @return null|string
 */
function media_upload_video()
{
}
/**
 * Handles uploading a generic file.
 *
 * @deprecated 3.3.0 Use wp_media_upload_handler()
 * @see wp_media_upload_handler()
 *
 * @return null|string
 */
function media_upload_file()
{
}
/**
 * Handles retrieving the insert-from-URL form for an image.
 *
 * @deprecated 3.3.0 Use wp_media_insert_url_form()
 * @see wp_media_insert_url_form()
 *
 * @return string
 */
function type_url_form_image()
{
}
/**
 * Handles retrieving the insert-from-URL form for an audio file.
 *
 * @deprecated 3.3.0 Use wp_media_insert_url_form()
 * @see wp_media_insert_url_form()
 *
 * @return string
 */
function type_url_form_audio()
{
}
/**
 * Handles retrieving the insert-from-URL form for a video file.
 *
 * @deprecated 3.3.0 Use wp_media_insert_url_form()
 * @see wp_media_insert_url_form()
 *
 * @return string
 */
function type_url_form_video()
{
}
/**
 * Handles retrieving the insert-from-URL form for a generic file.
 *
 * @deprecated 3.3.0 Use wp_media_insert_url_form()
 * @see wp_media_insert_url_form()
 *
 * @return string
 */
function type_url_form_file()
{
}
/**
 * Add contextual help text for a page.
 *
 * Creates an 'Overview' help tab.
 *
 * @since 2.7.0
 * @deprecated 3.3.0 Use WP_Screen::add_help_tab()
 * @see WP_Screen::add_help_tab()
 *
 * @param string    $screen The handle for the screen to add help to. This is usually the hook name returned by the add_*_page() functions.
 * @param string    $help   The content of an 'Overview' help tab.
 */
function add_contextual_help($screen, $help)
{
}
/**
 * Get the allowed themes for the current site.
 *
 * @since 3.0.0
 * @deprecated 3.4.0 Use wp_get_themes()
 * @see wp_get_themes()
 *
 * @return array $themes Array of allowed themes.
 */
function get_allowed_themes()
{
}
/**
 * Retrieves a list of broken themes.
 *
 * @since 1.5.0
 * @deprecated 3.4.0 Use wp_get_themes()
 * @see wp_get_themes()
 *
 * @return array
 */
function get_broken_themes()
{
}
/**
 * Retrieves information on the current active theme.
 *
 * @since 2.0.0
 * @deprecated 3.4.0 Use wp_get_theme()
 * @see wp_get_theme()
 *
 * @return WP_Theme
 */
function current_theme_info()
{
}
/**
 * This was once used to display an 'Insert into Post' button.
 *
 * Now it is deprecated and stubbed.
 *
 * @deprecated 3.5.0
 */
function _insert_into_post_button($type)
{
}
/**
 * This was once used to display a media button.
 *
 * Now it is deprecated and stubbed.
 *
 * @deprecated 3.5.0
 */
function _media_button($title, $icon, $type, $id)
{
}
/**
 * Gets an existing post and format it for editing.
 *
 * @since 2.0.0
 * @deprecated 3.5.0 Use get_post()
 * @see get_post()
 *
 * @param int $id
 * @return object
 */
function get_post_to_edit($id)
{
}
/**
 * Gets the default page information to use.
 *
 * @since 2.5.0
 * @deprecated 3.5.0 Use get_default_post_to_edit()
 * @see get_default_post_to_edit()
 *
 * @return WP_Post Post object containing all the default post data as attributes
 */
function get_default_page_to_edit()
{
}
/**
 * This was once used to create a thumbnail from an Image given a maximum side size.
 *
 * @since 1.2.0
 * @deprecated 3.5.0 Use image_resize()
 * @see image_resize()
 *
 * @param mixed $file Filename of the original image, Or attachment id.
 * @param int $max_side Maximum length of a single side for the thumbnail.
 * @param mixed $deprecated Never used.
 * @return string Thumbnail path on success, Error string on failure.
 */
function wp_create_thumbnail($file, $max_side, $deprecated = '')
{
}
/**
 * This was once used to display a meta box for the nav menu theme locations.
 *
 * Deprecated in favor of a 'Manage Locations' tab added to nav menus management screen.
 *
 * @since 3.0.0
 * @deprecated 3.6.0
 */
function wp_nav_menu_locations_meta_box()
{
}
/**
 * This was once used to kick-off the Core Updater.
 *
 * Deprecated in favor of instantating a Core_Upgrader instance directly,
 * and calling the 'upgrade' method.
 *
 * @since 2.7.0
 * @deprecated 3.7.0 Use Core_Upgrader
 * @see Core_Upgrader
 */
function wp_update_core($current, $feedback = '')
{
}
/**
 * This was once used to kick-off the Plugin Updater.
 *
 * Deprecated in favor of instantating a Plugin_Upgrader instance directly,
 * and calling the 'upgrade' method.
 * Unused since 2.8.0.
 *
 * @since 2.5.0
 * @deprecated 3.7.0 Use Plugin_Upgrader
 * @see Plugin_Upgrader
 */
function wp_update_plugin($plugin, $feedback = '')
{
}
/**
 * This was once used to kick-off the Theme Updater.
 *
 * Deprecated in favor of instantiating a Theme_Upgrader instance directly,
 * and calling the 'upgrade' method.
 * Unused since 2.8.0.
 *
 * @since 2.7.0
 * @deprecated 3.7.0 Use Theme_Upgrader
 * @see Theme_Upgrader
 */
function wp_update_theme($theme, $feedback = '')
{
}
/**
 * This was once used to display attachment links. Now it is deprecated and stubbed.
 *
 * @since 2.0.0
 * @deprecated 3.7.0
 *
 * @param int|bool $id
 */
function the_attachment_links($id = \false)
{
}
/**
 * Displays a screen icon.
 *
 * @since 2.7.0
 * @deprecated 3.8.0
 */
function screen_icon()
{
}
/**
 * Retrieves the screen icon (no longer used in 3.8+).
 *
 * @since 3.2.0
 * @deprecated 3.8.0
 *
 * @return string An HTML comment explaining that icons are no longer used.
 */
function get_screen_icon()
{
}
/**
 * Deprecated dashboard widget controls.
 *
 * @since 2.5.0
 * @deprecated 3.8.0
 */
function wp_dashboard_incoming_links_output()
{
}
/**
 * Deprecated dashboard secondary output.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_secondary_output()
{
}
/**
 * Deprecated dashboard widget controls.
 *
 * @since 2.7.0
 * @deprecated 3.8.0
 */
function wp_dashboard_incoming_links()
{
}
/**
 * Deprecated dashboard incoming links control.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_incoming_links_control()
{
}
/**
 * Deprecated dashboard plugins control.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_plugins()
{
}
/**
 * Deprecated dashboard primary control.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_primary_control()
{
}
/**
 * Deprecated dashboard recent comments control.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_recent_comments_control()
{
}
/**
 * Deprecated dashboard secondary section.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_secondary()
{
}
/**
 * Deprecated dashboard secondary control.
 *
 * @deprecated 3.8.0
 */
function wp_dashboard_secondary_control()
{
}
/**
 * Display plugins text for the WordPress news widget.
 *
 * @since 2.5.0
 * @deprecated 4.8.0
 *
 * @param string $rss  The RSS feed URL.
 * @param array  $args Array of arguments for this RSS feed.
 */
function wp_dashboard_plugins_output($rss, $args = array())
{
}
/**
 * This was once used to move child posts to a new parent.
 *
 * @since 2.3.0
 * @deprecated 3.9.0
 * @access private
 *
 * @param int $old_ID
 * @param int $new_ID
 */
function _relocate_children($old_ID, $new_ID)
{
}
/**
 * Add a top-level menu page in the 'objects' section.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @since 2.7.0
 *
 * @deprecated 4.5.0 Use add_menu_page()
 * @see add_menu_page()
 * @global int $_wp_last_object_menu
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @param string   $icon_url   The url to the icon to be used for this menu.
 * @return string The resulting page's hook_suffix.
 */
function add_object_page($page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '')
{
}
/**
 * Add a top-level menu page in the 'utility' section.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @since 2.7.0
 *
 * @deprecated 4.5.0 Use add_menu_page()
 * @see add_menu_page()
 * @global int $_wp_last_utility_menu
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @param string   $icon_url   The url to the icon to be used for this menu.
 * @return string The resulting page's hook_suffix.
 */
function add_utility_page($page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '')
{
}
/**
 * Disables autocomplete on the 'post' form (Add/Edit Post screens) for WebKit browsers,
 * as they disregard the autocomplete setting on the editor textarea. That can break the editor
 * when the user navigates to it with the browser's Back button. See #28037
 *
 * Replaced with wp_page_reload_on_back_button_js() that also fixes this problem.
 *
 * @since 4.0.0
 * @deprecated 4.6.0
 *
 * @link https://core.trac.wordpress.org/ticket/35852
 *
 * @global bool $is_safari
 * @global bool $is_chrome
 */
function post_form_autocomplete_off()
{
}
/**
 * Display JavaScript on the page.
 *
 * @since 3.5.0
 * @deprecated 4.9.0
 */
function options_permalink_add_js()
{
}
/**
 * Generates the WXR export file for download.
 *
 * Default behavior is to export all content, however, note that post content will only
 * be exported for post types with the `can_export` argument enabled. Any posts with the
 * 'auto-draft' status will be skipped.
 *
 * @since 2.1.0
 *
 * @global wpdb    $wpdb WordPress database abstraction object.
 * @global WP_Post $post Global `$post`.
 *
 * @param array $args {
 *     Optional. Arguments for generating the WXR export file for download. Default empty array.
 *
 *     @type string $content        Type of content to export. If set, only the post content of this post type
 *                                  will be exported. Accepts 'all', 'post', 'page', 'attachment', or a defined
 *                                  custom post. If an invalid custom post type is supplied, every post type for
 *                                  which `can_export` is enabled will be exported instead. If a valid custom post
 *                                  type is supplied but `can_export` is disabled, then 'posts' will be exported
 *                                  instead. When 'all' is supplied, only post types with `can_export` enabled will
 *                                  be exported. Default 'all'.
 *     @type string $author         Author to export content for. Only used when `$content` is 'post', 'page', or
 *                                  'attachment'. Accepts false (all) or a specific author ID. Default false (all).
 *     @type string $category       Category (slug) to export content for. Used only when `$content` is 'post'. If
 *                                  set, only post content assigned to `$category` will be exported. Accepts false
 *                                  or a specific category slug. Default is false (all categories).
 *     @type string $start_date     Start date to export content from. Expected date format is 'Y-m-d'. Used only
 *                                  when `$content` is 'post', 'page' or 'attachment'. Default false (since the
 *                                  beginning of time).
 *     @type string $end_date       End date to export content to. Expected date format is 'Y-m-d'. Used only when
 *                                  `$content` is 'post', 'page' or 'attachment'. Default false (latest publish date).
 *     @type string $status         Post status to export posts for. Used only when `$content` is 'post' or 'page'.
 *                                  Accepts false (all statuses except 'auto-draft'), or a specific status, i.e.
 *                                  'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', or
 *                                  'trash'. Default false (all statuses except 'auto-draft').
 * }
 */
function export_wp($args = array())
{
}
/**
 * Get the description for standard WordPress theme files and other various standard
 * WordPress files
 *
 * @since 1.5.0
 *
 * @global array $wp_file_descriptions Theme file descriptions.
 * @global array $allowed_files        List of allowed files.
 * @param string $file Filesystem path or filename
 * @return string Description of file from $wp_file_descriptions or basename of $file if description doesn't exist.
 *                Appends 'Page Template' to basename of $file if the file is a page template
 */
function get_file_description($file)
{
}
/**
 * Get the absolute filesystem path to the root of the WordPress installation
 *
 * @since 1.5.0
 *
 * @return string Full filesystem path to the root of the WordPress installation
 */
function get_home_path()
{
}
/**
 * Returns a listing of all files in the specified folder and all subdirectories up to 100 levels deep.
 * The depth of the recursiveness can be controlled by the $levels param.
 *
 * @since 2.6.0
 * @since 4.9.0 Added the `$exclusions` parameter.
 *
 * @param string $folder Optional. Full path to folder. Default empty.
 * @param int    $levels Optional. Levels of folders to follow, Default 100 (PHP Loop limit).
 * @param array  $exclusions Optional. List of folders and files to skip.
 * @return bool|array False on failure, Else array of files
 */
function list_files($folder = '', $levels = 100, $exclusions = array())
{
}
/**
 * Get list of file extensions that are editable in plugins.
 *
 * @since 4.9.0
 *
 * @param string $plugin Plugin.
 * @return array File extensions.
 */
function wp_get_plugin_file_editable_extensions($plugin)
{
}
/**
 * Get list of file extensions that are editable for a given theme.
 *
 * @param WP_Theme $theme Theme.
 * @return array File extensions.
 */
function wp_get_theme_file_editable_extensions($theme)
{
}
/**
 * Print file editor templates (for plugins and themes).
 *
 * @since 4.9.0
 */
function wp_print_file_editor_templates()
{
}
/**
 * Attempt to edit a file for a theme or plugin.
 *
 * When editing a PHP file, loopback requests will be made to the admin and the homepage
 * to attempt to see if there is a fatal error introduced. If so, the PHP change will be
 * reverted.
 *
 * @since 4.9.0
 *
 * @param array $args {
 *     Args. Note that all of the arg values are already unslashed. They are, however,
 *     coming straight from $_POST and are not validated or sanitized in any way.
 *
 *     @type string $file       Relative path to file.
 *     @type string $plugin     Plugin being edited.
 *     @type string $theme      Theme being edited.
 *     @type string $newcontent New content for the file.
 *     @type string $nonce      Nonce.
 * }
 * @return true|WP_Error True on success or `WP_Error` on failure.
 */
function wp_edit_theme_plugin_file($args)
{
}
/**
 * Returns a filename of a Temporary unique file.
 * Please note that the calling function must unlink() this itself.
 *
 * The filename is based off the passed parameter or defaults to the current unix timestamp,
 * while the directory can either be passed as well, or by leaving it blank, default to a writable temporary directory.
 *
 * @since 2.6.0
 *
 * @param string $filename Optional. Filename to base the Unique file off. Default empty.
 * @param string $dir      Optional. Directory to store the file in. Default empty.
 * @return string a writable filename
 */
function wp_tempnam($filename = '', $dir = '')
{
}
/**
 * Makes sure that the file that was requested to be edited is allowed to be edited.
 *
 * Function will die if you are not allowed to edit the file.
 *
 * @since 1.5.0
 *
 * @param string $file          File the user is attempting to edit.
 * @param array  $allowed_files Optional. Array of allowed files to edit, $file must match an entry exactly.
 * @return string|null
 */
function validate_file_to_edit($file, $allowed_files = array())
{
}
/**
 * Handle PHP uploads in WordPress, sanitizing file names, checking extensions for mime type,
 * and moving the file to the appropriate directory within the uploads directory.
 *
 * @access private
 * @since 4.0.0
 *
 * @see wp_handle_upload_error
 *
 * @param array       $file      Reference to a single element of $_FILES. Call the function once for each uploaded file.
 * @param array|false $overrides An associative array of names => values to override default variables. Default false.
 * @param string      $time      Time formatted in 'yyyy/mm'.
 * @param string      $action    Expected value for $_POST['action'].
 * @return array On success, returns an associative array of file attributes. On failure, returns
 *               $overrides['upload_error_handler'](&$file, $message ) or array( 'error'=>$message ).
 */
function _wp_handle_upload(&$file, $overrides, $time, $action)
{
}
/**
 * Wrapper for _wp_handle_upload().
 *
 * Passes the {@see 'wp_handle_upload'} action.
 *
 * @since 2.0.0
 *
 * @see _wp_handle_upload()
 *
 * @param array      $file      Reference to a single element of `$_FILES`. Call the function once for
 *                              each uploaded file.
 * @param array|bool $overrides Optional. An associative array of names=>values to override default
 *                              variables. Default false.
 * @param string     $time      Optional. Time formatted in 'yyyy/mm'. Default null.
 * @return array On success, returns an associative array of file attributes. On failure, returns
 *               $overrides['upload_error_handler'](&$file, $message ) or array( 'error'=>$message ).
 */
function wp_handle_upload(&$file, $overrides = \false, $time = \null)
{
}
/**
 * Wrapper for _wp_handle_upload().
 *
 * Passes the {@see 'wp_handle_sideload'} action.
 *
 * @since 2.6.0
 *
 * @see _wp_handle_upload()
 *
 * @param array      $file      An array similar to that of a PHP `$_FILES` POST array
 * @param array|bool $overrides Optional. An associative array of names=>values to override default
 *                              variables. Default false.
 * @param string     $time      Optional. Time formatted in 'yyyy/mm'. Default null.
 * @return array On success, returns an associative array of file attributes. On failure, returns
 *               $overrides['upload_error_handler'](&$file, $message ) or array( 'error'=>$message ).
 */
function wp_handle_sideload(&$file, $overrides = \false, $time = \null)
{
}
/**
 * Downloads a URL to a local temporary file using the WordPress HTTP Class.
 * Please note, That the calling function must unlink() the file.
 *
 * @since 2.5.0
 *
 * @param string $url the URL of the file to download
 * @param int $timeout The timeout for the request to download the file default 300 seconds
 * @return mixed WP_Error on failure, string Filename on success.
 */
function download_url($url, $timeout = 300)
{
}
/**
 * Calculates and compares the MD5 of a file to its expected value.
 *
 * @since 3.7.0
 *
 * @param string $filename The filename to check the MD5 of.
 * @param string $expected_md5 The expected MD5 of the file, either a base64 encoded raw md5, or a hex-encoded md5
 * @return bool|object WP_Error on failure, true on success, false when the MD5 format is unknown/unexpected
 */
function verify_file_md5($filename, $expected_md5)
{
}
/**
 * Unzips a specified ZIP file to a location on the Filesystem via the WordPress Filesystem Abstraction.
 * Assumes that WP_Filesystem() has already been called and set up. Does not extract a root-level __MACOSX directory, if present.
 *
 * Attempts to increase the PHP Memory limit to 256M before uncompressing,
 * However, The most memory required shouldn't be much larger than the Archive itself.
 *
 * @since 2.5.0
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param string $file Full path and filename of zip archive
 * @param string $to Full path on the filesystem to extract archive to
 * @return mixed WP_Error on failure, True on success
 */
function unzip_file($file, $to)
{
}
/**
 * This function should not be called directly, use unzip_file instead. Attempts to unzip an archive using the ZipArchive class.
 * Assumes that WP_Filesystem() has already been called and set up.
 *
 * @since 3.0.0
 * @see unzip_file
 * @access private
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param string $file Full path and filename of zip archive
 * @param string $to Full path on the filesystem to extract archive to
 * @param array $needed_dirs A partial list of required folders needed to be created.
 * @return mixed WP_Error on failure, True on success
 */
function _unzip_file_ziparchive($file, $to, $needed_dirs = array())
{
}
/**
 * This function should not be called directly, use unzip_file instead. Attempts to unzip an archive using the PclZip library.
 * Assumes that WP_Filesystem() has already been called and set up.
 *
 * @since 3.0.0
 * @see unzip_file
 * @access private
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param string $file Full path and filename of zip archive
 * @param string $to Full path on the filesystem to extract archive to
 * @param array $needed_dirs A partial list of required folders needed to be created.
 * @return mixed WP_Error on failure, True on success
 */
function _unzip_file_pclzip($file, $to, $needed_dirs = array())
{
}
/**
 * Copies a directory from one location to another via the WordPress Filesystem Abstraction.
 * Assumes that WP_Filesystem() has already been called and setup.
 *
 * @since 2.5.0
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param string $from source directory
 * @param string $to destination directory
 * @param array $skip_list a list of files/folders to skip copying
 * @return mixed WP_Error on failure, True on success.
 */
function copy_dir($from, $to, $skip_list = array())
{
}
/**
 * Initialises and connects the WordPress Filesystem Abstraction classes.
 * This function will include the chosen transport and attempt connecting.
 *
 * Plugins may add extra transports, And force WordPress to use them by returning
 * the filename via the {@see 'filesystem_method_file'} filter.
 *
 * @since 2.5.0
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param array|false  $args                         Optional. Connection args, These are passed directly to
 *                                                   the `WP_Filesystem_*()` classes. Default false.
 * @param string|false $context                      Optional. Context for get_filesystem_method(). Default false.
 * @param bool         $allow_relaxed_file_ownership Optional. Whether to allow Group/World writable. Default false.
 * @return null|bool false on failure, true on success.
 */
function WP_Filesystem($args = \false, $context = \false, $allow_relaxed_file_ownership = \false)
{
}
/**
 * Determines which method to use for reading, writing, modifying, or deleting
 * files on the filesystem.
 *
 * The priority of the transports are: Direct, SSH2, FTP PHP Extension, FTP Sockets
 * (Via Sockets class, or `fsockopen()`). Valid values for these are: 'direct', 'ssh2',
 * 'ftpext' or 'ftpsockets'.
 *
 * The return value can be overridden by defining the `FS_METHOD` constant in `wp-config.php`,
 * or filtering via {@see 'filesystem_method'}.
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php#WordPress_Upgrade_Constants
 *
 * Plugins may define a custom transport handler, See WP_Filesystem().
 *
 * @since 2.5.0
 *
 * @global callable $_wp_filesystem_direct_method
 *
 * @param array  $args                         Optional. Connection details. Default empty array.
 * @param string $context                      Optional. Full path to the directory that is tested
 *                                             for being writable. Default empty.
 * @param bool   $allow_relaxed_file_ownership Optional. Whether to allow Group/World writable.
 *                                             Default false.
 * @return string The transport to use, see description for valid return values.
 */
function get_filesystem_method($args = array(), $context = '', $allow_relaxed_file_ownership = \false)
{
}
/**
 * Displays a form to the user to request for their FTP/SSH details in order
 * to connect to the filesystem.
 *
 * All chosen/entered details are saved, excluding the password.
 *
 * Hostnames may be in the form of hostname:portnumber (eg: wordpress.org:2467)
 * to specify an alternate FTP/SSH port.
 *
 * Plugins may override this form by returning true|false via the {@see 'request_filesystem_credentials'} filter.
 *
 * @since 2.5.0
 * @since 4.6.0 The `$context` parameter default changed from `false` to an empty string.
 *
 * @global string $pagenow
 *
 * @param string $form_post                    The URL to post the form to.
 * @param string $type                         Optional. Chosen type of filesystem. Default empty.
 * @param bool   $error                        Optional. Whether the current request has failed to connect.
 *                                             Default false.
 * @param string $context                      Optional. Full path to the directory that is tested for being
 *                                             writable. Default empty.
 * @param array  $extra_fields                 Optional. Extra `POST` fields to be checked for inclusion in
 *                                             the post. Default null.
 * @param bool   $allow_relaxed_file_ownership Optional. Whether to allow Group/World writable. Default false.
 *
 * @return bool False on failure, true on success.
 */
function request_filesystem_credentials($form_post, $type = '', $error = \false, $context = '', $extra_fields = \null, $allow_relaxed_file_ownership = \false)
{
}
/**
 * Print the filesystem credentials modal when needed.
 *
 * @since 4.2.0
 */
function wp_print_request_filesystem_credentials_modal()
{
}
/**
 * Generate a single group for the personal data export report.
 *
 * @since 4.9.6
 *
 * @param array $group_data {
 *     The group data to render.
 *
 *     @type string $group_label  The user-facing heading for the group, e.g. 'Comments'.
 *     @type array  $items        {
 *         An array of group items.
 *
 *         @type array  $group_item_data  {
 *             An array of name-value pairs for the item.
 *
 *             @type string $name   The user-facing name of an item name-value pair, e.g. 'IP Address'.
 *             @type string $value  The user-facing value of an item data pair, e.g. '50.60.70.0'.
 *         }
 *     }
 * }
 * @return string The HTML for this group and its items.
 */
function wp_privacy_generate_personal_data_export_group_html($group_data)
{
}
/**
 * Generate the personal data export file.
 *
 * @since 4.9.6
 *
 * @param int $request_id The export request ID.
 */
function wp_privacy_generate_personal_data_export_file($request_id)
{
}
/**
 * Send an email to the user with a link to the personal data export file
 *
 * @since 4.9.6
 *
 * @param int $request_id The request ID for this personal data export.
 * @return true|WP_Error True on success or `WP_Error` on failure.
 */
function wp_privacy_send_personal_data_export_email($request_id)
{
}
/**
 * Intercept personal data exporter page ajax responses in order to assemble the personal data export file.
 * @see wp_privacy_personal_data_export_page
 * @since 4.9.6
 *
 * @param array  $response        The response from the personal data exporter for the given page.
 * @param int    $exporter_index  The index of the personal data exporter. Begins at 1.
 * @param string $email_address   The email address of the user whose personal data this is.
 * @param int    $page            The page of personal data for this exporter. Begins at 1.
 * @param int    $request_id      The request ID for this personal data export.
 * @param bool   $send_as_email   Whether the final results of the export should be emailed to the user.
 * @param string $exporter_key    The slug (key) of the exporter.
 * @return array The filtered response.
 */
function wp_privacy_process_personal_data_export_page($response, $exporter_index, $email_address, $page, $request_id, $send_as_email, $exporter_key)
{
}
/**
 * WordPress Image Editor
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Loads the WP image-editing interface.
 *
 * @param int         $post_id Post ID.
 * @param bool|object $msg     Optional. Message to display for image editor updates or errors.
 *                             Default false.
 */
function wp_image_editor($post_id, $msg = \false)
{
}
/**
 * Streams image in WP_Image_Editor to browser.
 *
 * @param WP_Image_Editor $image         The image editor instance.
 * @param string          $mime_type     The mime type of the image.
 * @param int             $attachment_id The image's attachment post ID.
 * @return bool True on success, false on failure.
 */
function wp_stream_image($image, $mime_type, $attachment_id)
{
}
/**
 * Saves Image to File
 *
 * @param string $filename
 * @param WP_Image_Editor $image
 * @param string $mime_type
 * @param int $post_id
 * @return bool
 */
function wp_save_image_file($filename, $image, $mime_type, $post_id)
{
}
/**
 * Image preview ratio. Internal use only.
 *
 * @since 2.9.0
 *
 * @ignore
 * @param int $w Image width in pixels.
 * @param int $h Image height in pixels.
 * @return float|int Image preview ratio.
 */
function _image_get_preview_ratio($w, $h)
{
}
/**
 * Returns an image resource. Internal use only.
 *
 * @since 2.9.0
 * @deprecated 3.5.0 Use WP_Image_Editor::rotate()
 * @see WP_Image_Editor::rotate()
 *
 * @ignore
 * @param resource  $img   Image resource.
 * @param float|int $angle Image rotation angle, in degrees.
 * @return resource|false GD image resource, false otherwise.
 */
function _rotate_image_resource($img, $angle)
{
}
/**
 * Flips an image resource. Internal use only.
 *
 * @since 2.9.0
 * @deprecated 3.5.0 Use WP_Image_Editor::flip()
 * @see WP_Image_Editor::flip()
 *
 * @ignore
 * @param resource $img  Image resource.
 * @param bool     $horz Whether to flip horizontally.
 * @param bool     $vert Whether to flip vertically.
 * @return resource (maybe) flipped image resource.
 */
function _flip_image_resource($img, $horz, $vert)
{
}
/**
 * Crops an image resource. Internal use only.
 *
 * @since 2.9.0
 *
 * @ignore
 * @param resource $img Image resource.
 * @param float    $x   Source point x-coordinate.
 * @param float    $y   Source point y-cooredinate.
 * @param float    $w   Source width.
 * @param float    $h   Source height.
 * @return resource (maybe) cropped image resource.
 */
function _crop_image_resource($img, $x, $y, $w, $h)
{
}
/**
 * Performs group of changes on Editor specified.
 *
 * @since 2.9.0
 *
 * @param WP_Image_Editor $image   WP_Image_Editor instance.
 * @param array           $changes Array of change operations.
 * @return WP_Image_Editor WP_Image_Editor instance with changes applied.
 */
function image_edit_apply_changes($image, $changes)
{
}
/**
 * Streams image in post to browser, along with enqueued changes
 * in $_REQUEST['history']
 *
 * @param int $post_id
 * @return bool
 */
function stream_preview_image($post_id)
{
}
/**
 * Restores the metadata for a given attachment.
 *
 * @since 2.9.0
 *
 * @param int $post_id Attachment post ID.
 * @return stdClass Image restoration message object.
 */
function wp_restore_image($post_id)
{
}
/**
 * Saves image to post along with enqueued changes
 * in $_REQUEST['history']
 *
 * @param int $post_id
 * @return \stdClass
 */
function wp_save_image($post_id)
{
}
/**
 * File contains all the administration image manipulation functions.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Crop an Image to a given size.
 *
 * @since 2.1.0
 *
 * @param string|int $src The source file or Attachment ID.
 * @param int $src_x The start x position to crop from.
 * @param int $src_y The start y position to crop from.
 * @param int $src_w The width to crop.
 * @param int $src_h The height to crop.
 * @param int $dst_w The destination width.
 * @param int $dst_h The destination height.
 * @param int $src_abs Optional. If the source crop points are absolute.
 * @param string $dst_file Optional. The destination file to write to.
 * @return string|WP_Error New filepath on success, WP_Error on failure.
 */
function wp_crop_image($src, $src_x, $src_y, $src_w, $src_h, $dst_w, $dst_h, $src_abs = \false, $dst_file = \false)
{
}
/**
 * Generate post thumbnail attachment meta data.
 *
 * @since 2.1.0
 *
 * @param int $attachment_id Attachment Id to process.
 * @param string $file Filepath of the Attached image.
 * @return mixed Metadata for attachment.
 */
function wp_generate_attachment_metadata($attachment_id, $file)
{
}
/**
 * Convert a fraction string to a decimal.
 *
 * @since 2.5.0
 *
 * @param string $str
 * @return int|float
 */
function wp_exif_frac2dec($str)
{
}
/**
 * Convert the exif date format to a unix timestamp.
 *
 * @since 2.5.0
 *
 * @param string $str
 * @return int
 */
function wp_exif_date2ts($str)
{
}
/**
 * Get extended image metadata, exif or iptc as available.
 *
 * Retrieves the EXIF metadata aperture, credit, camera, caption, copyright, iso
 * created_timestamp, focal_length, shutter_speed, and title.
 *
 * The IPTC metadata that is retrieved is APP13, credit, byline, created date
 * and time, caption, copyright, and title. Also includes FNumber, Model,
 * DateTimeDigitized, FocalLength, ISOSpeedRatings, and ExposureTime.
 *
 * @todo Try other exif libraries if available.
 * @since 2.5.0
 *
 * @param string $file
 * @return bool|array False on failure. Image metadata array on success.
 */
function wp_read_image_metadata($file)
{
}
/**
 * Validate that file is an image.
 *
 * @since 2.5.0
 *
 * @param string $path File path to test if valid image.
 * @return bool True if valid image, false if not valid image.
 */
function file_is_valid_image($path)
{
}
/**
 * Validate that file is suitable for displaying within a web page.
 *
 * @since 2.5.0
 *
 * @param string $path File path to test.
 * @return bool True if suitable, false if not suitable.
 */
function file_is_displayable_image($path)
{
}
/**
 * Load an image resource for editing.
 *
 * @since 2.9.0
 *
 * @param string $attachment_id Attachment ID.
 * @param string $mime_type Image mime type.
 * @param string $size Optional. Image size, defaults to 'full'.
 * @return resource|false The resulting image resource on success, false on failure.
 */
function load_image_to_edit($attachment_id, $mime_type, $size = 'full')
{
}
/**
 * Retrieve the path or url of an attachment's attached file.
 *
 * If the attached file is not present on the local filesystem (usually due to replication plugins),
 * then the url of the file is returned if url fopen is supported.
 *
 * @since 3.4.0
 * @access private
 *
 * @param string $attachment_id Attachment ID.
 * @param string $size Optional. Image size, defaults to 'full'.
 * @return string|false File path or url on success, false on failure.
 */
function _load_image_to_edit_path($attachment_id, $size = 'full')
{
}
/**
 * Copy an existing image file.
 *
 * @since 3.4.0
 * @access private
 *
 * @param string $attachment_id Attachment ID.
 * @return string|false New file path on success, false on failure.
 */
function _copy_image_file($attachment_id)
{
}
/**
 * WordPress Administration Importer API.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Retrieve list of importers.
 *
 * @since 2.0.0
 *
 * @global array $wp_importers
 * @return array
 */
function get_importers()
{
}
/**
 * Sorts a multidimensional array by first member of each top level member
 *
 * Used by uasort() as a callback, should not be used directly.
 *
 * @since 2.9.0
 * @access private
 *
 * @param array $a
 * @param array $b
 * @return int
 */
function _usort_by_first_member($a, $b)
{
}
/**
 * Register importer for WordPress.
 *
 * @since 2.0.0
 *
 * @global array $wp_importers
 *
 * @param string   $id          Importer tag. Used to uniquely identify importer.
 * @param string   $name        Importer name and title.
 * @param string   $description Importer description.
 * @param callable $callback    Callback to run.
 * @return WP_Error Returns WP_Error when $callback is WP_Error.
 */
function register_importer($id, $name, $description, $callback)
{
}
/**
 * Cleanup importer.
 *
 * Removes attachment based on ID.
 *
 * @since 2.0.0
 *
 * @param string $id Importer ID.
 */
function wp_import_cleanup($id)
{
}
/**
 * Handle importer uploading and add attachment.
 *
 * @since 2.0.0
 *
 * @return array Uploaded file's details on success, error message on failure
 */
function wp_import_handle_upload()
{
}
/**
 * Returns a list from WordPress.org of popular importer plugins.
 *
 * @since 3.5.0
 *
 * @return array Importers with metadata for each.
 */
function wp_get_popular_importers()
{
}
/**
 * Helper functions for displaying a list of items in an ajaxified HTML table.
 *
 * @package WordPress
 * @subpackage List_Table
 * @since 3.1.0
 */
/**
 * Fetch an instance of a WP_List_Table class.
 *
 * @access private
 * @since 3.1.0
 *
 * @global string $hook_suffix
 *
 * @param string $class The type of the list table, which is the class name.
 * @param array $args Optional. Arguments to pass to the class. Accepts 'screen'.
 * @return object|bool Object on success, false if the class does not exist.
 */
function _get_list_table($class, $args = array())
{
}
/**
 * Register column headers for a particular screen.
 *
 * @since 2.7.0
 *
 * @param string $screen The handle for the screen to add help to. This is usually the hook name returned by the add_*_page() functions.
 * @param array $columns An array of columns with column IDs as the keys and translated column names as the values
 * @see get_column_headers(), print_column_headers(), get_hidden_columns()
 */
function register_column_headers($screen, $columns)
{
}
/**
 * Prints column headers for a particular screen.
 *
 * @since 2.7.0
 *
 * @param string|WP_Screen $screen  The screen hook name or screen object.
 * @param bool             $with_id Whether to set the id attribute or not.
 */
function print_column_headers($screen, $with_id = \true)
{
}
/**
 * WordPress Administration Media API.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Defines the default media upload tabs
 *
 * @since 2.5.0
 *
 * @return array default tabs
 */
function media_upload_tabs()
{
}
/**
 * Adds the gallery tab back to the tabs array if post has image attachments
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $tabs
 * @return array $tabs with gallery if post has image attachment
 */
function update_gallery_tab($tabs)
{
}
/**
 * Outputs the legacy media upload tabs UI.
 *
 * @since 2.5.0
 *
 * @global string $redir_tab
 */
function the_media_upload_tabs()
{
}
/**
 * Retrieves the image HTML to send to the editor.
 *
 * @since 2.5.0
 *
 * @param int          $id      Image attachment id.
 * @param string       $caption Image caption.
 * @param string       $title   Image title attribute.
 * @param string       $align   Image CSS alignment property.
 * @param string       $url     Optional. Image src URL. Default empty.
 * @param bool|string  $rel     Optional. Value for rel attribute or whether to add a default value. Default false.
 * @param string|array $size    Optional. Image size. Accepts any valid image size, or an array of width
 *                              and height values in pixels (in that order). Default 'medium'.
 * @param string       $alt     Optional. Image alt attribute. Default empty.
 * @return string The HTML output to insert into the editor.
 */
function get_image_send_to_editor($id, $caption, $title, $align, $url = '', $rel = \false, $size = 'medium', $alt = '')
{
}
/**
 * Adds image shortcode with caption to editor
 *
 * @since 2.6.0
 *
 * @param string $html
 * @param integer $id
 * @param string $caption image caption
 * @param string $title image title attribute
 * @param string $align image css alignment property
 * @param string $url image src url
 * @param string $size image size (thumbnail, medium, large, full or added with add_image_size() )
 * @param string $alt image alt attribute
 * @return string
 */
function image_add_caption($html, $id, $caption, $title, $align, $url, $size, $alt = '')
{
}
/**
 * Private preg_replace callback used in image_add_caption()
 *
 * @access private
 * @since 3.4.0
 */
function _cleanup_image_add_caption($matches)
{
}
/**
 * Adds image html to editor
 *
 * @since 2.5.0
 *
 * @param string $html
 */
function media_send_to_editor($html)
{
}
/**
 * Save a file submitted from a POST request and create an attachment post for it.
 *
 * @since 2.5.0
 *
 * @param string $file_id   Index of the `$_FILES` array that the file was sent. Required.
 * @param int    $post_id   The post ID of a post to attach the media item to. Required, but can
 *                          be set to 0, creating a media item that has no relationship to a post.
 * @param array  $post_data Overwrite some of the attachment. Optional.
 * @param array  $overrides Override the wp_handle_upload() behavior. Optional.
 * @return int|WP_Error ID of the attachment or a WP_Error object on failure.
 */
function media_handle_upload($file_id, $post_id, $post_data = array(), $overrides = array('test_form' => \false))
{
}
/**
 * Handles a side-loaded file in the same way as an uploaded file is handled by media_handle_upload().
 *
 * @since 2.6.0
 *
 * @param array  $file_array Array similar to a `$_FILES` upload array.
 * @param int    $post_id    The post ID the media is associated with.
 * @param string $desc       Optional. Description of the side-loaded file. Default null.
 * @param array  $post_data  Optional. Post data to override. Default empty array.
 * @return int|object The ID of the attachment or a WP_Error on failure.
 */
function media_handle_sideload($file_array, $post_id, $desc = \null, $post_data = array())
{
}
/**
 * Adds the iframe to display content for the media upload page
 *
 * @since 2.5.0
 *
 * @global int $body_id
 *
 * @param string|callable $content_func
 */
function wp_iframe($content_func)
{
}
/**
 * Adds the media button to the editor
 *
 * @since 2.5.0
 *
 * @global int $post_ID
 *
 * @staticvar int $instance
 *
 * @param string $editor_id
 */
function media_buttons($editor_id = 'content')
{
}
/**
 *
 * @global int $post_ID
 * @param string $type
 * @param int $post_id
 * @param string $tab
 * @return string
 */
function get_upload_iframe_src($type = \null, $post_id = \null, $tab = \null)
{
}
/**
 * Handles form submissions for the legacy media uploader.
 *
 * @since 2.5.0
 *
 * @return mixed void|object WP_Error on failure
 */
function media_upload_form_handler()
{
}
/**
 * Handles the process of uploading media.
 *
 * @since 2.5.0
 *
 * @return null|string
 */
function wp_media_upload_handler()
{
}
/**
 * Downloads an image from the specified URL and attaches it to a post.
 *
 * @since 2.6.0
 * @since 4.2.0 Introduced the `$return` parameter.
 * @since 4.8.0 Introduced the 'id' option within the `$return` parameter.
 *
 * @param string $file    The URL of the image to download.
 * @param int    $post_id The post ID the media is to be associated with.
 * @param string $desc    Optional. Description of the image.
 * @param string $return  Optional. Accepts 'html' (image tag html) or 'src' (URL), or 'id' (attachment ID). Default 'html'.
 * @return string|WP_Error Populated HTML img tag on success, WP_Error object otherwise.
 */
function media_sideload_image($file, $post_id, $desc = \null, $return = 'html')
{
}
/**
 * Retrieves the legacy media uploader form in an iframe.
 *
 * @since 2.5.0
 *
 * @return string|null
 */
function media_upload_gallery()
{
}
/**
 * Retrieves the legacy media library form in an iframe.
 *
 * @since 2.5.0
 *
 * @return string|null
 */
function media_upload_library()
{
}
/**
 * Retrieve HTML for the image alignment radio buttons with the specified one checked.
 *
 * @since 2.7.0
 *
 * @param WP_Post $post
 * @param string $checked
 * @return string
 */
function image_align_input_fields($post, $checked = '')
{
}
/**
 * Retrieve HTML for the size radio buttons with the specified one checked.
 *
 * @since 2.7.0
 *
 * @param WP_Post $post
 * @param bool|string $check
 * @return array
 */
function image_size_input_fields($post, $check = '')
{
}
/**
 * Retrieve HTML for the Link URL buttons with the default link type as specified.
 *
 * @since 2.7.0
 *
 * @param WP_Post $post
 * @param string $url_type
 * @return string
 */
function image_link_input_fields($post, $url_type = '')
{
}
/**
 * Output a textarea element for inputting an attachment caption.
 *
 * @since 3.4.0
 *
 * @param WP_Post $edit_post Attachment WP_Post object.
 * @return string HTML markup for the textarea element.
 */
function wp_caption_input_textarea($edit_post)
{
}
/**
 * Retrieves the image attachment fields to edit form fields.
 *
 * @since 2.5.0
 *
 * @param array $form_fields
 * @param object $post
 * @return array
 */
function image_attachment_fields_to_edit($form_fields, $post)
{
}
/**
 * Retrieves the single non-image attachment fields to edit form fields.
 *
 * @since 2.5.0
 *
 * @param array   $form_fields An array of attachment form fields.
 * @param WP_Post $post        The WP_Post attachment object.
 * @return array Filtered attachment form fields.
 */
function media_single_attachment_fields_to_edit($form_fields, $post)
{
}
/**
 * Retrieves the post non-image attachment fields to edito form fields.
 *
 * @since 2.8.0
 *
 * @param array   $form_fields An array of attachment form fields.
 * @param WP_Post $post        The WP_Post attachment object.
 * @return array Filtered attachment form fields.
 */
function media_post_single_attachment_fields_to_edit($form_fields, $post)
{
}
/**
 * Filters input from media_upload_form_handler() and assigns a default
 * post_title from the file name if none supplied.
 *
 * Illustrates the use of the {@see 'attachment_fields_to_save'} filter
 * which can be used to add default values to any field before saving to DB.
 *
 * @since 2.5.0
 *
 * @param array $post       The WP_Post attachment object converted to an array.
 * @param array $attachment An array of attachment metadata.
 * @return array Filtered attachment post object.
 */
function image_attachment_fields_to_save($post, $attachment)
{
}
/**
 * Retrieves the media element HTML to send to the editor.
 *
 * @since 2.5.0
 *
 * @param string $html
 * @param integer $attachment_id
 * @param array $attachment
 * @return string
 */
function image_media_send_to_editor($html, $attachment_id, $attachment)
{
}
/**
 * Retrieves the attachment fields to edit form fields.
 *
 * @since 2.5.0
 *
 * @param WP_Post $post
 * @param array $errors
 * @return array
 */
function get_attachment_fields_to_edit($post, $errors = \null)
{
}
/**
 * Retrieve HTML for media items of post gallery.
 *
 * The HTML markup retrieved will be created for the progress of SWF Upload
 * component. Will also create link for showing and hiding the form to modify
 * the image attachment.
 *
 * @since 2.5.0
 *
 * @global WP_Query $wp_the_query
 *
 * @param int $post_id Optional. Post ID.
 * @param array $errors Errors for attachment, if any.
 * @return string
 */
function get_media_items($post_id, $errors)
{
}
/**
 * Retrieve HTML form for modifying the image attachment.
 *
 * @since 2.5.0
 *
 * @global string $redir_tab
 *
 * @param int $attachment_id Attachment ID for modification.
 * @param string|array $args Optional. Override defaults.
 * @return string HTML form for attachment.
 */
function get_media_item($attachment_id, $args = \null)
{
}
/**
 * @since 3.5.0
 *
 * @param int   $attachment_id
 * @param array $args
 * @return array
 */
function get_compat_media_markup($attachment_id, $args = \null)
{
}
/**
 * Outputs the legacy media upload header.
 *
 * @since 2.5.0
 */
function media_upload_header()
{
}
/**
 * Outputs the legacy media upload form.
 *
 * @since 2.5.0
 *
 * @global string $type
 * @global string $tab
 * @global bool   $is_IE
 * @global bool   $is_opera
 *
 * @param array $errors
 */
function media_upload_form($errors = \null)
{
}
/**
 * Outputs the legacy media upload form for a given media type.
 *
 * @since 2.5.0
 *
 * @param string $type
 * @param object $errors
 * @param integer $id
 */
function media_upload_type_form($type = 'file', $errors = \null, $id = \null)
{
}
/**
 * Outputs the legacy media upload form for external media.
 *
 * @since 2.7.0
 *
 * @param string $type
 * @param object $errors
 * @param integer $id
 */
function media_upload_type_url_form($type = \null, $errors = \null, $id = \null)
{
}
/**
 * Adds gallery form to upload iframe
 *
 * @since 2.5.0
 *
 * @global string $redir_tab
 * @global string $type
 * @global string $tab
 *
 * @param array $errors
 */
function media_upload_gallery_form($errors)
{
}
/**
 * Outputs the legacy media upload form for the media library.
 *
 * @since 2.5.0
 *
 * @global wpdb      $wpdb
 * @global WP_Query  $wp_query
 * @global WP_Locale $wp_locale
 * @global string    $type
 * @global string    $tab
 * @global array     $post_mime_types
 *
 * @param array $errors
 */
function media_upload_library_form($errors)
{
}
/**
 * Creates the form for external url
 *
 * @since 2.7.0
 *
 * @param string $default_view
 * @return string the form html
 */
function wp_media_insert_url_form($default_view = 'image')
{
}
/**
 * Displays the multi-file uploader message.
 *
 * @since 2.6.0
 *
 * @global int $post_ID
 */
function media_upload_flash_bypass()
{
}
/**
 * Displays the browser's built-in uploader message.
 *
 * @since 2.6.0
 */
function media_upload_html_bypass()
{
}
/**
 * Used to display a "After a file has been uploaded..." help message.
 *
 * @since 3.3.0
 */
function media_upload_text_after()
{
}
/**
 * Displays the checkbox to scale images.
 *
 * @since 3.3.0
 */
function media_upload_max_image_resize()
{
}
/**
 * Displays the out of storage quota message in Multisite.
 *
 * @since 3.5.0
 */
function multisite_over_quota_message()
{
}
/**
 * Displays the image and editor in the post editor
 *
 * @since 3.5.0
 *
 * @param WP_Post $post A post object.
 */
function edit_form_image_editor($post)
{
}
/**
 * Displays non-editable attachment metadata in the publish meta box.
 *
 * @since 3.5.0
 */
function attachment_submitbox_metadata()
{
}
/**
 * Parse ID3v2, ID3v1, and getID3 comments to extract usable data
 *
 * @since 3.6.0
 *
 * @param array $metadata An existing array with data
 * @param array $data Data supplied by ID3 tags
 */
function wp_add_id3_tag_data(&$metadata, $data)
{
}
/**
 * Retrieve metadata from a video file's ID3 tags
 *
 * @since 3.6.0
 *
 * @param string $file Path to file.
 * @return array|bool Returns array of metadata, if found.
 */
function wp_read_video_metadata($file)
{
}
/**
 * Retrieve metadata from a audio file's ID3 tags
 *
 * @since 3.6.0
 *
 * @param string $file Path to file.
 * @return array|bool Returns array of metadata, if found.
 */
function wp_read_audio_metadata($file)
{
}
/**
 * Parse creation date from media metadata.
 *
 * The getID3 library doesn't have a standard method for getting creation dates,
 * so the location of this data can vary based on the MIME type.
 *
 * @since 4.9.0
 *
 * @link https://github.com/JamesHeinrich/getID3/blob/master/structure.txt
 *
 * @param array $metadata The metadata returned by getID3::analyze().
 * @return int|bool A UNIX timestamp for the media's creation date if available
 *                  or a boolean FALSE if a timestamp could not be determined.
 */
function wp_get_media_creation_timestamp($metadata)
{
}
/**
 * Encapsulate logic for Attach/Detach actions
 *
 * @since 4.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $parent_id Attachment parent ID.
 * @param string $action    Optional. Attach/detach action. Accepts 'attach' or 'detach'.
 *                          Default 'attach'.
 */
function wp_media_attach_action($parent_id, $action = 'attach')
{
}
/**
 *
 * @param string $add
 * @param string $class
 * @return string
 */
function add_cssclass($add, $class)
{
}
/**
 *
 * @param array $menu
 * @return array
 */
function add_menu_classes($menu)
{
}
/**
 *
 * @global array $menu_order
 * @global array $default_menu_order
 *
 * @param array $a
 * @param array $b
 * @return int
 */
function sort_menu($a, $b)
{
}
// -- Post related Meta Boxes
/**
 * Displays post submit form fields.
 *
 * @since 2.7.0
 *
 * @global string $action
 *
 * @param WP_Post  $post Current post object.
 * @param array    $args {
 *     Array of arguments for building the post submit meta box.
 *
 *     @type string   $id       Meta box 'id' attribute.
 *     @type string   $title    Meta box title.
 *     @type callable $callback Meta box display callback.
 *     @type array    $args     Extra meta box arguments.
 * }
 */
function post_submit_meta_box($post, $args = array())
{
}
/**
 * Display attachment submit form fields.
 *
 * @since 3.5.0
 *
 * @param object $post
 */
function attachment_submit_meta_box($post)
{
}
/**
 * Display post format form elements.
 *
 * @since 3.1.0
 *
 * @param WP_Post $post Post object.
 * @param array   $box {
 *     Post formats meta box arguments.
 *
 *     @type string   $id       Meta box 'id' attribute.
 *     @type string   $title    Meta box title.
 *     @type callable $callback Meta box display callback.
 *     @type array    $args     Extra meta box arguments.
 * }
 */
function post_format_meta_box($post, $box)
{
}
/**
 * Display post tags form fields.
 *
 * @since 2.6.0
 *
 * @todo Create taxonomy-agnostic wrapper for this.
 *
 * @param WP_Post $post Post object.
 * @param array   $box {
 *     Tags meta box arguments.
 *
 *     @type string   $id       Meta box 'id' attribute.
 *     @type string   $title    Meta box title.
 *     @type callable $callback Meta box display callback.
 *     @type array    $args {
 *         Extra meta box arguments.
 *
 *         @type string $taxonomy Taxonomy. Default 'post_tag'.
 *     }
 * }
 */
function post_tags_meta_box($post, $box)
{
}
/**
 * Display post categories form fields.
 *
 * @since 2.6.0
 *
 * @todo Create taxonomy-agnostic wrapper for this.
 *
 * @param WP_Post $post Post object.
 * @param array   $box {
 *     Categories meta box arguments.
 *
 *     @type string   $id       Meta box 'id' attribute.
 *     @type string   $title    Meta box title.
 *     @type callable $callback Meta box display callback.
 *     @type array    $args {
 *         Extra meta box arguments.
 *
 *         @type string $taxonomy Taxonomy. Default 'category'.
 *     }
 * }
 */
function post_categories_meta_box($post, $box)
{
}
/**
 * Display post excerpt form fields.
 *
 * @since 2.6.0
 *
 * @param object $post
 */
function post_excerpt_meta_box($post)
{
}
/**
 * Display trackback links form fields.
 *
 * @since 2.6.0
 *
 * @param object $post
 */
function post_trackback_meta_box($post)
{
}
/**
 * Display custom fields form fields.
 *
 * @since 2.6.0
 *
 * @param object $post
 */
function post_custom_meta_box($post)
{
}
/**
 * Display comments status form fields.
 *
 * @since 2.6.0
 *
 * @param object $post
 */
function post_comment_status_meta_box($post)
{
}
/**
 * Display comments for post table header
 *
 * @since 3.0.0
 *
 * @param array $result table header rows
 * @return array
 */
function post_comment_meta_box_thead($result)
{
}
/**
 * Display comments for post.
 *
 * @since 2.8.0
 *
 * @param object $post
 */
function post_comment_meta_box($post)
{
}
/**
 * Display slug form fields.
 *
 * @since 2.6.0
 *
 * @param object $post
 */
function post_slug_meta_box($post)
{
}
/**
 * Display form field with list of authors.
 *
 * @since 2.6.0
 *
 * @global int $user_ID
 *
 * @param object $post
 */
function post_author_meta_box($post)
{
}
/**
 * Display list of revisions.
 *
 * @since 2.6.0
 *
 * @param object $post
 */
function post_revisions_meta_box($post)
{
}
// -- Page related Meta Boxes
/**
 * Display page attributes form fields.
 *
 * @since 2.7.0
 *
 * @param object $post
 */
function page_attributes_meta_box($post)
{
}
// -- Link related Meta Boxes
/**
 * Display link create form fields.
 *
 * @since 2.7.0
 *
 * @param object $link
 */
function link_submit_meta_box($link)
{
}
/**
 * Display link categories form fields.
 *
 * @since 2.6.0
 *
 * @param object $link
 */
function link_categories_meta_box($link)
{
}
/**
 * Display form fields for changing link target.
 *
 * @since 2.6.0
 *
 * @param object $link
 */
function link_target_meta_box($link)
{
}
/**
 * Display checked checkboxes attribute for xfn microformat options.
 *
 * @since 1.0.1
 *
 * @global object $link
 *
 * @param string $class
 * @param string $value
 * @param mixed $deprecated Never used.
 */
function xfn_check($class, $value = '', $deprecated = '')
{
}
/**
 * Display xfn form fields.
 *
 * @since 2.6.0
 *
 * @param object $link
 */
function link_xfn_meta_box($link)
{
}
/**
 * Display advanced link options form fields.
 *
 * @since 2.6.0
 *
 * @param object $link
 */
function link_advanced_meta_box($link)
{
}
/**
 * Display post thumbnail meta box.
 *
 * @since 2.9.0
 *
 * @param WP_Post $post A post object.
 */
function post_thumbnail_meta_box($post)
{
}
/**
 * Display fields for ID3 data
 *
 * @since 3.9.0
 *
 * @param WP_Post $post A post object.
 */
function attachment_id3_data_meta_box($post)
{
}
/**
 * Misc WordPress Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Returns whether the server is running Apache with the mod_rewrite module loaded.
 *
 * @since 2.0.0
 *
 * @return bool
 */
function got_mod_rewrite()
{
}
/**
 * Returns whether the server supports URL rewriting.
 *
 * Detects Apache's mod_rewrite, IIS 7.0+ permalink support, and nginx.
 *
 * @since 3.7.0
 *
 * @global bool $is_nginx
 *
 * @return bool Whether the server supports URL rewriting.
 */
function got_url_rewrite()
{
}
/**
 * Extracts strings from between the BEGIN and END markers in the .htaccess file.
 *
 * @since 1.5.0
 *
 * @param string $filename
 * @param string $marker
 * @return array An array of strings from a file (.htaccess ) from between BEGIN and END markers.
 */
function extract_from_markers($filename, $marker)
{
}
/**
 * Inserts an array of strings into a file (.htaccess ), placing it between
 * BEGIN and END markers.
 *
 * Replaces existing marked info. Retains surrounding
 * data. Creates file if none exists.
 *
 * @since 1.5.0
 *
 * @param string       $filename  Filename to alter.
 * @param string       $marker    The marker to alter.
 * @param array|string $insertion The new content to insert.
 * @return bool True on write success, false on failure.
 */
function insert_with_markers($filename, $marker, $insertion)
{
}
/**
 * Updates the htaccess file with the current rules if it is writable.
 *
 * Always writes to the file if it exists and is writable to ensure that we
 * blank out old rules.
 *
 * @since 1.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @return bool|null True on write success, false on failure. Null in multisite.
 */
function save_mod_rewrite_rules()
{
}
/**
 * Updates the IIS web.config file with the current rules if it is writable.
 * If the permalinks do not require rewrite rules then the rules are deleted from the web.config file.
 *
 * @since 2.8.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @return bool|null True on write success, false on failure. Null in multisite.
 */
function iis7_save_url_rewrite_rules()
{
}
/**
 * Update the "recently-edited" file for the plugin or theme editor.
 *
 * @since 1.5.0
 *
 * @param string $file
 */
function update_recently_edited($file)
{
}
/**
 * Makes a tree structure for the Theme Editor's file list.
 *
 * @since 4.9.0
 * @access private
 *
 * @param array $allowed_files List of theme file paths.
 * @return array Tree structure for listing theme files.
 */
function wp_make_theme_file_tree($allowed_files)
{
}
/**
 * Outputs the formatted file list for the Theme Editor.
 *
 * @since 4.9.0
 * @access private
 *
 * @param array|string $tree  List of file/folder paths, or filename.
 * @param int          $level The aria-level for the current iteration.
 * @param int          $size  The aria-setsize for the current iteration.
 * @param int          $index The aria-posinset for the current iteration.
 */
function wp_print_theme_file_tree($tree, $level = 2, $size = 1, $index = 1)
{
}
/**
 * Makes a tree structure for the Plugin Editor's file list.
 *
 * @since 4.9.0
 * @access private
 *
 * @param string $plugin_editable_files List of plugin file paths.
 * @return array Tree structure for listing plugin files.
 */
function wp_make_plugin_file_tree($plugin_editable_files)
{
}
/**
 * Outputs the formatted file list for the Plugin Editor.
 *
 * @since 4.9.0
 * @access private
 *
 * @param array|string $tree  List of file/folder paths, or filename.
 * @param string       $label Name of file or folder to print.
 * @param int          $level The aria-level for the current iteration.
 * @param int          $size  The aria-setsize for the current iteration.
 * @param int          $index The aria-posinset for the current iteration.
 */
function wp_print_plugin_file_tree($tree, $label = '', $level = 2, $size = 1, $index = 1)
{
}
/**
 * Flushes rewrite rules if siteurl, home or page_on_front changed.
 *
 * @since 2.1.0
 *
 * @param string $old_value
 * @param string $value
 */
function update_home_siteurl($old_value, $value)
{
}
/**
 * Resets global variables based on $_GET and $_POST
 *
 * This function resets global variables based on the names passed
 * in the $vars array to the value of $_POST[$var] or $_GET[$var] or ''
 * if neither is defined.
 *
 * @since 2.0.0
 *
 * @param array $vars An array of globals to reset.
 */
function wp_reset_vars($vars)
{
}
/**
 * Displays the given administration message.
 *
 * @since 2.1.0
 *
 * @param string|WP_Error $message
 */
function show_message($message)
{
}
/**
 * @since 2.8.0
 *
 * @param string $content
 * @return array
 */
function wp_doc_link_parse($content)
{
}
/**
 * Saves option for number of rows when listing posts, pages, comments, etc.
 *
 * @since 2.8.0
 */
function set_screen_options()
{
}
/**
 * Check if rewrite rule for WordPress already exists in the IIS 7+ configuration file
 *
 * @since 2.8.0
 *
 * @return bool
 * @param string $filename The file path to the configuration file
 */
function iis7_rewrite_rule_exists($filename)
{
}
/**
 * Delete WordPress rewrite rule from web.config file if it exists there
 *
 * @since 2.8.0
 *
 * @param string $filename Name of the configuration file
 * @return bool
 */
function iis7_delete_rewrite_rule($filename)
{
}
/**
 * Add WordPress rewrite rule to the IIS 7+ configuration file.
 *
 * @since 2.8.0
 *
 * @param string $filename The file path to the configuration file
 * @param string $rewrite_rule The XML fragment with URL Rewrite rule
 * @return bool
 */
function iis7_add_rewrite_rule($filename, $rewrite_rule)
{
}
/**
 * Saves the XML document into a file
 *
 * @since 2.8.0
 *
 * @param DOMDocument $doc
 * @param string $filename
 */
function saveDomDocument($doc, $filename)
{
}
/**
 * Display the default admin color scheme picker (Used in user-edit.php)
 *
 * @since 3.0.0
 *
 * @global array $_wp_admin_css_colors
 *
 * @param int $user_id User ID.
 */
function admin_color_scheme_picker($user_id)
{
}
/**
 *
 * @global array $_wp_admin_css_colors
 */
function wp_color_scheme_settings()
{
}
/**
 * @since 3.3.0
 */
function _ipad_meta()
{
}
/**
 * Check lock status for posts displayed on the Posts screen
 *
 * @since 3.6.0
 *
 * @param array  $response  The Heartbeat response.
 * @param array  $data      The $_POST data sent.
 * @param string $screen_id The screen id.
 * @return array The Heartbeat response.
 */
function wp_check_locked_posts($response, $data, $screen_id)
{
}
/**
 * Check lock status on the New/Edit Post screen and refresh the lock
 *
 * @since 3.6.0
 *
 * @param array  $response  The Heartbeat response.
 * @param array  $data      The $_POST data sent.
 * @param string $screen_id The screen id.
 * @return array The Heartbeat response.
 */
function wp_refresh_post_lock($response, $data, $screen_id)
{
}
/**
 * Check nonce expiration on the New/Edit Post screen and refresh if needed
 *
 * @since 3.6.0
 *
 * @param array  $response  The Heartbeat response.
 * @param array  $data      The $_POST data sent.
 * @param string $screen_id The screen id.
 * @return array The Heartbeat response.
 */
function wp_refresh_post_nonces($response, $data, $screen_id)
{
}
/**
 * Disable suspension of Heartbeat on the Add/Edit Post screens.
 *
 * @since 3.8.0
 *
 * @global string $pagenow
 *
 * @param array $settings An array of Heartbeat settings.
 * @return array Filtered Heartbeat settings.
 */
function wp_heartbeat_set_suspension($settings)
{
}
/**
 * Autosave with heartbeat
 *
 * @since 3.9.0
 *
 * @param array $response The Heartbeat response.
 * @param array $data     The $_POST data sent.
 * @return array The Heartbeat response.
 */
function heartbeat_autosave($response, $data)
{
}
/**
 * Remove single-use URL parameters and create canonical link based on new URL.
 *
 * Remove specific query string parameters from a URL, create the canonical link,
 * put it in the admin header, and change the current URL to match.
 *
 * @since 4.2.0
 */
function wp_admin_canonical_url()
{
}
/**
 * Send a referrer policy header so referrers are not sent externally from administration screens.
 *
 * @since 4.9.0
 */
function wp_admin_headers()
{
}
/**
 * Outputs JS that reloads the page if the user navigated to it with the Back or Forward button.
 *
 * Used on the Edit Post and Add New Post screens. Needed to ensure the page is not loaded from browser cache,
 * so the post title and editor content are the last saved versions. Ideally this script should run first in the head.
 *
 * @since 4.6.0
 */
function wp_page_reload_on_back_button_js()
{
}
/**
 * Send a confirmation request email when a change of site admin email address is attempted.
 *
 * The new site admin address will not become active until confirmed.
 *
 * @since 3.0.0
 * @since 4.9.0 This function was moved from wp-admin/includes/ms.php so it's no longer Multisite specific.
 *
 * @param string $old_value The old site admin email address.
 * @param string $value     The proposed new site admin email address.
 */
function update_option_new_admin_email($old_value, $value)
{
}
/**
 * Appends '(Draft)' to draft page titles in the privacy page dropdown
 * so that unpublished content is obvious.
 *
 * @since 4.9.8
 * @access private
 *
 * @param string  $title Page title.
 * @param WP_Post $page  Page data object.
 *
 * @return string Page title.
 */
function _wp_privacy_settings_filter_draft_page_titles($title, $page)
{
}
/**
 * Multisite: Deprecated admin functions from past versions and WordPress MU
 *
 * These functions should not be used and will be removed in a later version.
 * It is suggested to use for the alternatives instead when available.
 *
 * @package WordPress
 * @subpackage Deprecated
 * @since 3.0.0
 */
/**
 * Outputs the WPMU menu.
 *
 * @deprecated 3.0.0
 */
function wpmu_menu()
{
}
/**
 * Determines if the available space defined by the admin has been exceeded by the user.
 *
 * @deprecated 3.0.0 Use is_upload_space_available()
 * @see is_upload_space_available()
 */
function wpmu_checkAvailableSpace()
{
}
/**
 * WPMU options.
 *
 * @deprecated 3.0.0
 */
function mu_options($options)
{
}
/**
 * Deprecated functionality for activating a network-only plugin.
 *
 * @deprecated 3.0.0 Use activate_plugin()
 * @see activate_plugin()
 */
function activate_sitewide_plugin()
{
}
/**
 * Deprecated functionality for deactivating a network-only plugin.
 *
 * @deprecated 3.0.0 Use deactivate_plugin()
 * @see deactivate_plugin()
 */
function deactivate_sitewide_plugin($plugin = \false)
{
}
/**
 * Deprecated functionality for determining if the current plugin is network-only.
 *
 * @deprecated 3.0.0 Use is_network_only_plugin()
 * @see is_network_only_plugin()
 */
function is_wpmu_sitewide_plugin($file)
{
}
/**
 * Deprecated functionality for getting themes network-enabled themes.
 *
 * @deprecated 3.4.0 Use WP_Theme::get_allowed_on_network()
 * @see WP_Theme::get_allowed_on_network()
 */
function get_site_allowed_themes()
{
}
/**
 * Deprecated functionality for getting themes allowed on a specific site.
 *
 * @deprecated 3.4.0 Use WP_Theme::get_allowed_on_site()
 * @see WP_Theme::get_allowed_on_site()
 */
function wpmu_get_blog_allowedthemes($blog_id = 0)
{
}
/**
 * Deprecated functionality for determining whether a file is deprecated.
 *
 * @deprecated 3.5.0
 */
function ms_deprecated_blogs_file()
{
}
/**
 * Multisite administration functions.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */
/**
 * Determine if uploaded file exceeds space quota.
 *
 * @since 3.0.0
 *
 * @param array $file $_FILES array for a given file.
 * @return array $_FILES array with 'error' key set if file exceeds quota. 'error' is empty otherwise.
 */
function check_upload_size($file)
{
}
/**
 * Delete a site.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int  $blog_id Site ID.
 * @param bool $drop    True if site's database tables should be dropped. Default is false.
 */
function wpmu_delete_blog($blog_id, $drop = \false)
{
}
/**
 * Delete a user from the network and remove from all sites.
 *
 * @since 3.0.0
 *
 * @todo Merge with wp_delete_user() ?
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $id The user ID.
 * @return bool True if the user was deleted, otherwise false.
 */
function wpmu_delete_user($id)
{
}
/**
 * Check whether a site has used its allotted upload space.
 *
 * @since MU (3.0.0)
 *
 * @param bool $echo Optional. If $echo is set and the quota is exceeded, a warning message is echoed. Default is true.
 * @return bool True if user is over upload space quota, otherwise false.
 */
function upload_is_user_over_quota($echo = \true)
{
}
/**
 * Displays the amount of disk space used by the current site. Not used in core.
 *
 * @since MU (3.0.0)
 */
function display_space_usage()
{
}
/**
 * Get the remaining upload space for this site.
 *
 * @since MU (3.0.0)
 *
 * @param int $size Current max size in bytes
 * @return int Max size in bytes
 */
function fix_import_form_size($size)
{
}
/**
 * Displays the site upload space quota setting form on the Edit Site Settings screen.
 *
 * @since 3.0.0
 *
 * @param int $id The ID of the site to display the setting for.
 */
function upload_space_setting($id)
{
}
/**
 * Update the status of a user in the database.
 *
 * Used in core to mark a user as spam or "ham" (not spam) in Multisite.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $id         The user ID.
 * @param string $pref       The column in the wp_users table to update the user's status
 *                           in (presumably user_status, spam, or deleted).
 * @param int    $value      The new status for the user.
 * @param null   $deprecated Deprecated as of 3.0.2 and should not be used.
 * @return int   The initially passed $value.
 */
function update_user_status($id, $pref, $value, $deprecated = \null)
{
}
/**
 * Cleans the user cache for a specific user.
 *
 * @since 3.0.0
 *
 * @param int $id The user ID.
 * @return bool|int The ID of the refreshed user or false if the user does not exist.
 */
function refresh_user_details($id)
{
}
/**
 * Returns the language for a language code.
 *
 * @since 3.0.0
 *
 * @param string $code Optional. The two-letter language code. Default empty.
 * @return string The language corresponding to $code if it exists. If it does not exist,
 *                then the first two letters of $code is returned.
 */
function format_code_lang($code = '')
{
}
/**
 * Synchronize category and post tag slugs when global terms are enabled.
 *
 * @since 3.0.0
 *
 * @param object $term     The term.
 * @param string $taxonomy The taxonomy for `$term`. Should be 'category' or 'post_tag', as these are
 *                         the only taxonomies which are processed by this function; anything else
 *                         will be returned untouched.
 * @return object|array Returns `$term`, after filtering the 'slug' field with sanitize_title()
 *                      if $taxonomy is 'category' or 'post_tag'.
 */
function sync_category_tag_slugs($term, $taxonomy)
{
}
/**
 * Displays an access denied message when a user tries to view a site's dashboard they
 * do not have access to.
 *
 * @since 3.2.0
 * @access private
 */
function _access_denied_splash()
{
}
/**
 * Checks if the current user has permissions to import new users.
 *
 * @since 3.0.0
 *
 * @param string $permission A permission to be checked. Currently not used.
 * @return bool True if the user has proper permissions, false if they do not.
 */
function check_import_new_users($permission)
{
}
// See "import_allow_fetch_attachments" and "import_attachment_size_limit" filters too.
/**
 * Generates and displays a drop-down of available languages.
 *
 * @since 3.0.0
 *
 * @param array  $lang_files Optional. An array of the language files. Default empty array.
 * @param string $current    Optional. The current language code. Default empty.
 */
function mu_dropdown_languages($lang_files = array(), $current = '')
{
}
/**
 * Displays an admin notice to upgrade all sites after a core upgrade.
 *
 * @since 3.0.0
 *
 * @global int    $wp_db_version The version number of the database.
 * @global string $pagenow
 *
 * @return false False if the current user is not a super admin.
 */
function site_admin_notice()
{
}
/**
 * Avoids a collision between a site slug and a permalink slug.
 *
 * In a subdirectory installation this will make sure that a site and a post do not use the
 * same subdirectory by checking for a site with the same name as a new post.
 *
 * @since 3.0.0
 *
 * @param array $data    An array of post data.
 * @param array $postarr An array of posts. Not currently used.
 * @return array The new array of post data after checking for collisions.
 */
function avoid_blog_page_permalink_collision($data, $postarr)
{
}
/**
 * Handles the display of choosing a user's primary site.
 *
 * This displays the user's primary site and allows the user to choose
 * which site is primary.
 *
 * @since 3.0.0
 */
function choose_primary_blog()
{
}
/**
 * Whether or not we can edit this network from this page.
 *
 * By default editing of network is restricted to the Network Admin for that `$network_id`.
 * This function allows for this to be overridden.
 *
 * @since 3.1.0
 *
 * @param int $network_id The network ID to check.
 * @return bool True if network can be edited, otherwise false.
 */
function can_edit_network($network_id)
{
}
/**
 * Thickbox image paths for Network Admin.
 *
 * @since 3.1.0
 *
 * @access private
 */
function _thickbox_path_admin_subfolder()
{
}
/**
 *
 * @param array $users
 */
function confirm_delete_users($users)
{
}
/**
 * Print JavaScript in the header on the Network Settings screen.
 *
 * @since 4.1.0
 */
function network_settings_add_js()
{
}
/**
 * Outputs the HTML for a network's "Edit Site" tabular interface.
 *
 * @since 4.6.0
 *
 * @param $args {
 *     Optional. Array or string of Query parameters. Default empty array.
 *
 *     @type int    $blog_id  The site ID. Default is the current site.
 *     @type array  $links    The tabs to include with (label|url|cap) keys.
 *     @type string $selected The ID of the selected link.
 * }
 */
function network_edit_site_nav($args = array())
{
}
/**
 * Returns the arguments for the help tab on the Edit Site screens.
 *
 * @since 4.9.0
 *
 * @return array Help tab arguments.
 */
function get_site_screen_help_tab_args()
{
}
/**
 * Returns the content for the help sidebar on the Edit Site screens.
 *
 * @since 4.9.0
 *
 * @return string Help sidebar content.
 */
function get_site_screen_help_sidebar_content()
{
}
/**
 * Prints the appropriate response to a menu quick search.
 *
 * @since 3.0.0
 *
 * @param array $request The unsanitized request values.
 */
function _wp_ajax_menu_quick_search($request = array())
{
}
/**
 * Register nav menu meta boxes and advanced menu items.
 *
 * @since 3.0.0
 **/
function wp_nav_menu_setup()
{
}
/**
 * Limit the amount of meta boxes to pages, posts, links, and categories for first time users.
 *
 * @since 3.0.0
 *
 * @global array $wp_meta_boxes
 **/
function wp_initial_nav_menu_meta_boxes()
{
}
/**
 * Creates meta boxes for any post type menu item..
 *
 * @since 3.0.0
 */
function wp_nav_menu_post_type_meta_boxes()
{
}
/**
 * Creates meta boxes for any taxonomy menu item.
 *
 * @since 3.0.0
 */
function wp_nav_menu_taxonomy_meta_boxes()
{
}
/**
 * Check whether to disable the Menu Locations meta box submit button
 *
 * @since 3.6.0
 *
 * @global bool $one_theme_location_no_menus to determine if no menus exist
 *
 * @param int|string $nav_menu_selected_id (id, name or slug) of the currently-selected menu
 * @return string Disabled attribute if at least one menu exists, false if not
 */
function wp_nav_menu_disabled_check($nav_menu_selected_id)
{
}
/**
 * Displays a meta box for the custom links menu item.
 *
 * @since 3.0.0
 *
 * @global int        $_nav_menu_placeholder
 * @global int|string $nav_menu_selected_id
 */
function wp_nav_menu_item_link_meta_box()
{
}
/**
 * Displays a meta box for a post type menu item.
 *
 * @since 3.0.0
 *
 * @global int        $_nav_menu_placeholder
 * @global int|string $nav_menu_selected_id
 *
 * @param string $object Not used.
 * @param array  $box {
 *     Post type menu item meta box arguments.
 *
 *     @type string       $id       Meta box 'id' attribute.
 *     @type string       $title    Meta box title.
 *     @type string       $callback Meta box display callback.
 *     @type WP_Post_Type $args     Extra meta box arguments (the post type object for this meta box).
 * }
 */
function wp_nav_menu_item_post_type_meta_box($object, $box)
{
}
/**
 * Displays a meta box for a taxonomy menu item.
 *
 * @since 3.0.0
 *
 * @global int|string $nav_menu_selected_id
 *
 * @param string $object Not used.
 * @param array  $box {
 *     Taxonomy menu item meta box arguments.
 *
 *     @type string $id       Meta box 'id' attribute.
 *     @type string $title    Meta box title.
 *     @type string $callback Meta box display callback.
 *     @type object $args     Extra meta box arguments (the taxonomy object for this meta box).
 * }
 */
function wp_nav_menu_item_taxonomy_meta_box($object, $box)
{
}
/**
 * Save posted nav menu item data.
 *
 * @since 3.0.0
 *
 * @param int $menu_id The menu ID for which to save this item. $menu_id of 0 makes a draft, orphaned menu item.
 * @param array $menu_data The unsanitized posted menu item data.
 * @return array The database IDs of the items saved
 */
function wp_save_nav_menu_items($menu_id = 0, $menu_data = array())
{
}
/**
 * Adds custom arguments to some of the meta box object types.
 *
 * @since 3.0.0
 *
 * @access private
 *
 * @param object $object The post type or taxonomy meta-object.
 * @return object The post type of taxonomy object.
 */
function _wp_nav_menu_meta_box_object($object = \null)
{
}
/**
 * Returns the menu formatted to edit.
 *
 * @since 3.0.0
 *
 * @param int $menu_id Optional. The ID of the menu to format. Default 0.
 * @return string|WP_Error $output The menu formatted to edit or error object on failure.
 */
function wp_get_nav_menu_to_edit($menu_id = 0)
{
}
/**
 * Returns the columns for the nav menus page.
 *
 * @since 3.0.0
 *
 * @return array Columns.
 */
function wp_nav_menu_manage_columns()
{
}