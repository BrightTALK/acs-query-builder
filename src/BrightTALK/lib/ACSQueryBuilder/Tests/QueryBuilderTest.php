<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests;

use BrightTALK\lib\ACSQueryBuilder\QueryBuilder;

class QueryBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $expression;
    private $query;
    private $queryBuilder;
    private $expressionBuilder;

    public function setUp()
    {
        $this->expression = \Mockery::mock('BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface');
        $this->expression->shouldReceive('__toString')->andReturn('')->byDefault();
        $this->query = \Mockery::mock('BrightTALK\lib\ACSQueryBuilder\Query');
        $this->query->shouldReceive('setBq')->withAnyArgs()->byDefault();
        $this->expressionBuilder = \Mockery::mock('BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder');
        $this->expressionBuilder->shouldReceive('eq')->withAnyArgs()->andReturn($this->expression)->byDefault();
        $this->queryBuilder = new QueryBuilder($this->expressionBuilder, $this->query);
    }

    public function testThatSearchByFieldValueCallsEqMethodFromExpressionBuilderWithFieldNameAndFieldValue()
    {
        $fieldName = 'testField';
        $fieldValue = 'testValue';
        $this->expressionBuilder->shouldReceive('eq')->with($fieldName, $fieldValue)->times(1)->andReturn($this->expression);

        $this->queryBuilder->searchByFieldValue($fieldName, $fieldValue);
    }

    public function testThatSearchByFieldValueCallsSetBqMethodOfQueryWithValueReturnedFromToStringMethodOfExpression()
    {
        $this->expression->shouldReceive('__toString')->times(1)->andReturn('test');
        $this->query->shouldReceive('setBq')->with('test')->times(1);

        $this->queryBuilder->searchByFieldValue('', '');
    }

    public function testThatSetSearchExpressionCallsSetBqMethodOfQueryWithProvidedExpressionStringRepresentation()
    {
        $this->expression->shouldReceive('__toString')->times(1)->andReturn('test');
        $this->query->shouldReceive('setBq')->with('test')->times(1);

        $this->queryBuilder->setSearchExpression($this->expression);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThatSetPaginationThrowsInvalidArgumentExceptionIfPageNumberLessThanOne()
    {
        $this->queryBuilder->setPagination(0, 1);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThatSetPaginationThrowsInvalidArgumentExceptionIfPageSizeLessThanZero()
    {
        $this->queryBuilder->setPagination(1, -1);
    }

    /**
     * @dataProvider getPaginationTestCases
     */
    public function testThatSetPaginationCallsSetStartAndSetSizeMethodsFromQueryWithCorrectParameters($pageNumber, $pageSize, $expectedStart, $expectedSize)
    {
        $this->query->shouldReceive('setStart')->once()->with($expectedStart);
        $this->query->shouldReceive('setSize')->once()->with($expectedSize);

        $this->queryBuilder->setPagination($pageNumber, $pageSize);
    }

    public function test_addFacet_calls_addFacet_method_from_query_with_correct_parameters()
    {
        $this->query->shouldReceive('addFacet')->once()->with('keyword');
        $this->queryBuilder->addFacet('keyword');
    }

    public function getPaginationTestCases()
    {
        //$pageNumber, $pageSize, $expectedStart, $expectedSize
        return array(
            array(1, 10, 0, 10),
            array(2, 10, 10, 10),
            array(5, 8, 32, 8)
        );
    }
}
