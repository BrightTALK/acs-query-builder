<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory;
use BrightTALK\lib\ACSQueryBuilder\Expression\Factory\ComparisonFactory;

class ExpressionBuilder
{
    /**
     * @var \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory
     */
    private $compositesFactory;

    /**
     * @var \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\ComparisonFactory
     */
    private $comparisonFactory;

    /**
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory $compositesFactory
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\ComparisonFactory $comparisonFactory
     */
    public function __construct(CompositesFactory $compositesFactory, ComparisonFactory $comparisonFactory)
    {
        $this->compositesFactory = $compositesFactory;
        $this->comparisonFactory = $comparisonFactory;
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface
     */
    public function andX()
    {
        return $this->compositesFactory->buildAndx(func_get_args());
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface
     */
    public function orX()
    {
        return $this->compositesFactory->buildOrx(func_get_args());
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface
     */
    public function notX()
    {
        return $this->compositesFactory->buildNotx(func_get_args());
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface
     */
    public function eq($x, $y)
    {
        return $this->comparisonFactory->buildComparison($x, Comparison::EQ, $y);
    }
}
