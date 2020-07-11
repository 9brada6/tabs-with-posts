<?php

namespace Masterminds;

/**
 * This class offers convenience methods for parsing and serializing HTML5.
 * It is roughly designed to mirror the \DOMDocument native class.
 */
class HTML5
{
    /**
     * Global options for the parser and serializer.
     *
     * @var array
     */
    private $defaultOptions = array(
        // Whether the serializer should aggressively encode all characters as entities.
        'encode_entities' => false,
        // Prevents the parser from automatically assigning the HTML5 namespace to the DOM document.
        'disable_html_ns' => false,
    );
    protected $errors = array();
    public function __construct(array $defaultOptions = array())
    {
    }
    /**
     * Get the current default options.
     *
     * @return array
     */
    public function getOptions()
    {
    }
    /**
     * Load and parse an HTML file.
     *
     * This will apply the HTML5 parser, which is tolerant of many
     * varieties of HTML, including XHTML 1, HTML 4, and well-formed HTML
     * 3. Note that in these cases, not all of the old data will be
     * preserved. For example, XHTML's XML declaration will be removed.
     *
     * The rules governing parsing are set out in the HTML 5 spec.
     *
     * @param string|resource $file    The path to the file to parse. If this is a resource, it is
     *                                 assumed to be an open stream whose pointer is set to the first
     *                                 byte of input.
     * @param array           $options Configuration options when parsing the HTML.
     *
     * @return \DOMDocument A DOM document. These object type is defined by the libxml
     *                      library, and should have been included with your version of PHP.
     */
    public function load($file, array $options = array())
    {
    }
    /**
     * Parse a HTML Document from a string.
     *
     * Take a string of HTML 5 (or earlier) and parse it into a
     * DOMDocument.
     *
     * @param string $string  A html5 document as a string.
     * @param array  $options Configuration options when parsing the HTML.
     *
     * @return \DOMDocument A DOM document. DOM is part of libxml, which is included with
     *                      almost all distribtions of PHP.
     */
    public function loadHTML($string, array $options = array())
    {
    }
    /**
     * Convenience function to load an HTML file.
     *
     * This is here to provide backwards compatibility with the
     * PHP DOM implementation. It simply calls load().
     *
     * @param string $file    The path to the file to parse. If this is a resource, it is
     *                        assumed to be an open stream whose pointer is set to the first
     *                        byte of input.
     * @param array  $options Configuration options when parsing the HTML.
     *
     * @return \DOMDocument A DOM document. These object type is defined by the libxml
     *                      library, and should have been included with your version of PHP.
     */
    public function loadHTMLFile($file, array $options = array())
    {
    }
    /**
     * Parse a HTML fragment from a string.
     *
     * @param string $string  the HTML5 fragment as a string
     * @param array  $options Configuration options when parsing the HTML
     *
     * @return \DOMDocumentFragment A DOM fragment. The DOM is part of libxml, which is included with
     *                              almost all distributions of PHP.
     */
    public function loadHTMLFragment($string, array $options = array())
    {
    }
    /**
     * Return all errors encountered into parsing phase.
     *
     * @return array
     */
    public function getErrors()
    {
    }
    /**
     * Return true it some errors were encountered into parsing phase.
     *
     * @return bool
     */
    public function hasErrors()
    {
    }
    /**
     * Parse an input string.
     *
     * @param string $input
     * @param array  $options
     *
     * @return \DOMDocument
     */
    public function parse($input, array $options = array())
    {
    }
    /**
     * Parse an input stream where the stream is a fragment.
     *
     * Lower-level loading function. This requires an input stream instead
     * of a string, file, or resource.
     *
     * @param string $input   The input data to parse in the form of a string.
     * @param array  $options An array of options.
     *
     * @return \DOMDocumentFragment
     */
    public function parseFragment($input, array $options = array())
    {
    }
    /**
     * Save a DOM into a given file as HTML5.
     *
     * @param mixed           $dom     The DOM to be serialized.
     * @param string|resource $file    The filename to be written or resource to write to.
     * @param array           $options Configuration options when serializing the DOM. These include:
     *                                 - encode_entities: Text written to the output is escaped by default and not all
     *                                 entities are encoded. If this is set to true all entities will be encoded.
     *                                 Defaults to false.
     */
    public function save($dom, $file, $options = array())
    {
    }
    /**
     * Convert a DOM into an HTML5 string.
     *
     * @param mixed $dom     The DOM to be serialized.
     * @param array $options Configuration options when serializing the DOM. These include:
     *                       - encode_entities: Text written to the output is escaped by default and not all
     *                       entities are encoded. If this is set to true all entities will be encoded.
     *                       Defaults to false.
     *
     * @return string A HTML5 documented generated from the DOM.
     */
    public function saveHTML($dom, $options = array())
    {
    }
}