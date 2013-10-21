<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface;

class Literal implements ExpressionInterface
{
    /**
     * @var string
     */
    private $term;

    /**
     * @return string
     */
    public function getTerm()
    {
        return $this->term;
    }

    public function __construct($term)
    {
        $this->term = (string) $term;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "'" . $this->term . "'";
    }

}
