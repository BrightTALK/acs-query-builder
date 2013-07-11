<?php

namespace BrightTALK\lib\ACSQueryBuilder\Factory;

use BrightTALK\lib\ACSQueryBuilder\Query;

class QueryFactory
{
    public static function buildQuery()
    {
        return new Query();
    }
}
