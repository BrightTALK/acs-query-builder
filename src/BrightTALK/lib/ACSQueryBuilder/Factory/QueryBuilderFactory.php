<?php

namespace BrightTALK\lib\ACSQueryBuilder\Factory;

use BrightTALK\lib\ACSQueryBuilder\QueryBuilder;
use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder;
use BrightTALK\lib\ACSQueryBuilder\Query;

class QueryBuilderFactory
{
    /**
     * @var ExpressionBuilder $expressionBuilder
     */
    private $expressionBuilder;

    /**
     * @var Query $query
     */
    private $query;

    /**
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder $expressionBuilder
     * @param \BrightTALK\lib\ACSQueryBuilder\Query                        $query
     */
    public function __construct(ExpressionBuilder $expressionBuilder, Query $query)
    {
        $this->expressionBuilder = $expressionBuilder;
        $this->query = $query;
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function createQueryBuilder()
    {
        return new QueryBuilder($this->expressionBuilder, $this->query);
    }
}
