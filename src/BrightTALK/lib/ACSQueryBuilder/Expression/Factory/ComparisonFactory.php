<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression\Factory;

use BrightTALK\lib\ACSQueryBuilder\Expression\Comparison;

class ComparisonFactory
{
    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\Comparison
     */
    public function buildComparison($leftPart, $operator, $rightPart)
    {
        return new Comparison($leftPart, $operator, $rightPart);
    }
}