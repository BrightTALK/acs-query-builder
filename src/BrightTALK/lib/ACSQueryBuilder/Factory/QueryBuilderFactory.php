<?php
namespace BrightTALK\lib\ACSQueryBuilder\Factory;

use BrightTALK\lib\ACSQueryBuilder\QueryBuilder;
use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder;
use BrightTALK\lib\ACSQueryBuilder\Query;
use BrightTALK\lib\ACSQueryBuilder\UrlGenerator;

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
     * @var UrlGenerator
     */
    private $urlGenerator;

    /**
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder $expressionBuilder
     * @param \BrightTALK\lib\ACSQueryBuilder\Query                        $query
     * @param UrlGenerator                                                 $urlGenerator
     */
    public function __construct(ExpressionBuilder $expressionBuilder, Query $query, UrlGenerator $urlGenerator = null)
    {
        $this->expressionBuilder = $expressionBuilder;
        $this->query = $query;
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function createQueryBuilder()
    {
        return new QueryBuilder($this->expressionBuilder, $this->query, $this->urlGenerator);
    }
}
