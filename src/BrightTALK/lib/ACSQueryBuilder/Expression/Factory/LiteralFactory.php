<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression\Factory;

use BrightTALK\lib\ACSQueryBuilder\Expression\Literal;

class LiteralFactory
{
    /**
     * @param string $term
     *
     * @return BrightTALK\lib\ACSQueryBuilder\Expression\Literal
     */
    public function buildLiteral($term)
    {
        return new Literal($term);
    }
}
