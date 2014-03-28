<?php

namespace BrightTALK\lib\ACSQueryBuilder;

use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder;
use BrightTALK\lib\ACSQueryBuilder\Query;
use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface;

class QueryBuilder
{
    /**
     * @var \BrightTALK\lib\ACSQueryBuilder\Query
     */
    private $query;

    /**
     * @var \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder
     */
    private $expressionBuilder;

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
     * @return \BrightTALK\lib\ACSQueryBuilder\Query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param integer $size
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function setSize($size)
    {
        $this->query->setSize($size);

        return $this;
    }

    /**
     * @param integer $start
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function setStart($start)
    {
        $this->query->setStart($start);

        return $this;
    }

    /**
     * @param string $fieldName
     * @param string $fieldValue
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function searchByFieldValue($fieldName, $fieldValue)
    {
        $expression = $this->expressionBuilder->eq($fieldName, $fieldValue);
        $this->query->setBq($expression->__toString());

        return $this;
    }

    /**
     * @return \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder
     */
    public function expr()
    {
        return $this->expressionBuilder;
    }

    /**
     * @param \BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface $expression
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function setSearchExpression(ExpressionInterface $expression)
    {
        $this->query->setBq($expression->__toString());

        return $this;
    }

    /**
     * @param string $rank
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\QueryBuilder
     */
    public function setRank($rank)
    {
        $this->query->setRank($rank);

        return $this;
    }

    /**
     * @param integer $pageNumber
     * @param integer $pageSize
     *
     * @return null
     */
    public function setPagination($pageNumber, $pageSize)
    {
        $pageNumber = (int) $pageNumber;
        $pageSize = (int) $pageSize;
        if ($pageNumber < 1) {
            throw new \InvalidArgumentException('A page number must be greater than 0');
        }

        if ($pageSize < 0) {
            throw new \InvalidArgumentException('A page size must be equal or greater to 0');
        }

        $this->query->setStart(($pageNumber-1)*$pageSize);
        $this->query->setSize($pageSize);

        return $this;
    }

    /**
     * @param $facet
     * @return $this
     */
    public function addFacet($facet)
    {
        $this->query->addFacet($facet);

        return $this;
    }
}