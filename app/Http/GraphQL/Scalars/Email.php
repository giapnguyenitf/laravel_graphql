<?php

namespace App\Http\GraphQL\Scalars;

use GraphQL\Language\AST\Node;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Utils\Utils;
use GraphQL\Error\Error;

/**
 * Read more about scalars here http://webonyx.github.io/graphql-php/type-system/scalar-types/
 */
class Email extends ScalarType
{
    public $name = 'Email';

    /**
     * Serializes an internal value to include in a response.
     *
     * @param string $value
     * @return string
     */
    public function serialize($value)
    {
        // Assuming the internal representation of the value is always correct
        return $value;

        // TODO validate if it might be incorrect
    }

    /**
     * Parses an externally provided value (query variable) to use as an input
     *
     * @param mixed $value
     * @return mixed
     */
    public function parseValue($value)
    {
        // TODO implement validation
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Error("Cannot represent following value as email: " . Utils::printSafeJson($value));
        }
        return $value;

        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * E.g.
     * {
     *   user(email: "user@example.com")
     * }
     *
     * @param Node $valueNode
     * @param array|null $variables
     *
     * @return mixed
     */
    public function parseLiteral($valueNode, array $variables = null)
    {
        // TODO implement validation
        if (!$valueNode instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
        }
        if (!filter_var($valueNode->value, FILTER_VALIDATE_EMAIL)) {
            throw new Error("Not a valid email", [$valueNode]);
        }
        return $valueNode->value;

        return $valueNode->value;
    }
}
