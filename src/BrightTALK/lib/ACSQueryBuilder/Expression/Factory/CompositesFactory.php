<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression\Factory;

use BrightTALK\lib\ACSQueryBuilder\Expression\Andx;
use BrightTALK\lib\ACSQueryBuilder\Expression\Orx;
use BrightTALK\lib\ACSQueryBuilder\Expression\Notx;

class CompositesFactory
{
    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\Composite
     */
    public function buildAndx(array $args)
    {
        return new Andx($args);
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\Composite
     */
    public function buildOrx(array $args)
    {
        return new Orx($args);
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\Composite
     */
    public function buildNotx(array $args)
    {
        return new Notx($args);
    }
}