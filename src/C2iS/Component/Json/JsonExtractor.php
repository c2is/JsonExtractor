<?php

namespace C2iS\Component\Json;

use Peekmo\JsonPath\JsonStore;

/**
 * Class JsonExtractor
 * @package C2iS\Component\Json
 */
class JsonExtractor
{
    /**
     * Extracts a portion of the Json passed as the first argument, defined by the jsonPath passed as the second argument..
     * Accepts both Array and ArrayAccess-objects. If a string is passed as the first argument, it must contain valid Json.
     * Returns a Array of extracted inputs.
     *
     * If a DomDocument was passed as the first argument, this function removes the nodes corresponding to the given XPath.
     * If a string was passed, this function removes the portion corresponding to the given XPath.
     *
     * In both cases, the string returned is equal to the removed portion.
     *
     * @param objects/arrays/ArrayAccess-objects $input string input, passed by reference
     * @param string $jsonpath The JSONPath to extract
     * @return Arrray Array of extracted $input(s)
     */
    public static function extract(&$input, $jsonpath)
    {
        $data = new JsonStore($input);

        $content = $data->get($jsonpath);
        $data->remove($jsonpath);

        $input = $data->toString();

        return json_encode($content);
    }
}
