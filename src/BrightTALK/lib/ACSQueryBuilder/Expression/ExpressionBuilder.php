<?php

namespace BrightTALK\lib\ACSQueryBuilder\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory;
use BrightTALK\lib\ACSQueryBuilder\Expression\Factory\ComparisonFactory;
use BrightTALK\lib\ACSQueryBuilder\Expression\Factory\LiteralFactory;

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
     * @var \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\LiteralFactory
     */
    private $literalFactory;

    /**
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory $compositesFactory
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\ComparisonFactory $comparisonFactory
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\Factory\LiteralFactory    $literalFactory
     */
    public function __construct(CompositesFactory $compositesFactory, ComparisonFactory $comparisonFactory, LiteralFactory $literalFactory)
    {
        $this->compositesFactory = $compositesFactory;
        $this->comparisonFactory = $comparisonFactory;
        $this->literalFactory = $literalFactory;
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

    /**
     * @param string $term
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface
     */
    public function literal($term)
    {
        return $this->literalFactory->buildLiteral($term);
    }
}
