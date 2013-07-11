<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionBuilder;
use BrightTALK\lib\ACSQueryBuilder\Expression\Comparison;

class ExpressionBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $expressionBuilder;
    private $compositesFactory;
    private $comparisonFactory;

    public function setUp()
    {
        $this->compositesFactory = \Mockery::mock('BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory');
        $this->comparisonFactory = \Mockery::mock('BrightTALK\lib\ACSQueryBuilder\Expression\Factory\ComparisonFactory');
        $this->expressionBuilder = new ExpressionBuilder($this->compositesFactory, $this->comparisonFactory);
    }

    public function test_andX_calls_buildAndx_from_CompositesFactory_with_passed_parameters()
    {
        $arg1 = 'test1';
        $arg2 = 'test2';
        $this->compositesFactory->shouldReceive('buildAndx')->with(array($arg1, $arg2))->times(1);
        $this->expressionBuilder->andX($arg1, $arg2);
    }

    public function test_orX_calls_buildOrx_from_CompositesFactory_with_passed_parameters()
    {
        $arg1 = 'test1';
        $arg2 = 'test2';
        $this->compositesFactory->shouldReceive('buildOrx')->with(array($arg1, $arg2))->times(1);
        $this->expressionBuilder->orX($arg1, $arg2);
    }

    public function test_notX_calls_buildNotx_from_CompositesFactory_with_passed_parameters()
    {
        $arg1 = 'test1';
        $arg2 = 'test2';
        $this->compositesFactory->shouldReceive('buildNotx')->with(array($arg1, $arg2))->times(1);
        $this->expressionBuilder->notX($arg1, $arg2);
    }

    public function test_eq_calls_buildComparison_from_ComparisonFactory_with_passed_parameters_and_EQ_operator()
    {
        $arg1 = 'test1';
        $eqOperator = Comparison::EQ;
        $arg2 = 'test2';
        $this->comparisonFactory->shouldReceive('buildComparison')->with($arg1, $eqOperator, $arg2)->times(1);
        $this->expressionBuilder->eq($arg1, $arg2);
    }
}
