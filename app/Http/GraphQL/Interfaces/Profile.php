<?php

namespace App\Http\GraphQL\Interfaces;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Schema\TypeRegistry;

class Profile
{
    /** @var TypeRegistry */
    protected $typeRegistry;

    /**
     * @param TypeRegistry $typeRegistry
     */
    public function __construct(TypeRegistry $typeRegistry)
    {
        $this->typeRegistry = $typeRegistry;
    }

    /**
     * Decide which GraphQL type a resolved value has.
     *
     * @param $rootValue The value that was resolved by the field. Usually an Eloquent model.
     * @param $context
     * @param ResolveInfo $info
     *
     * @return Type
     */
    public function resolveType($rootValue, $context, ResolveInfo $info): Type
    {
        // Default to getting a type with the same name as the passed in root value
        // TODO implement your own resolver logic - if the default is fine, just delete this class
        return $this->typeRegistry->get(class_basename($rootValue));
    }
}
