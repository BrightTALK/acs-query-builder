<?php

namespace BrightTALK\lib\ACSQueryBuilder\Factory;

use BrightTALK\lib\ACSQueryBuilder\Query;

/**
 * Build queries
 *
 * @package BrightTALK\lib\ACSQueryBuilder\Factory
 */
class QueryFactory
{

    /**
     * @return Query
     */
    public static function buildQuery()
    {
        return new Query();
    }
}
