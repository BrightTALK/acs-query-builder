<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface;

class Notx extends Composite
{
    /**
     * @var string
     */
    protected $preSeparator = '(not ';

    /**
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface $part
     */
    public function __construct(ExpressionInterface $part)
    {
        parent::__construct(array($part));
    }
}

