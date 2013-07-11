<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\Comparison;

class ComparisonTest extends \PHPUnit_Framework_TestCase
{
    private $comparison;

    public function setUp()
    {
        $this->comparison = new Comparison('testField', Comparison::EQ, "'testValue'");
    }

    public function test_toString()
    {
        $this->assertSame("testField:'testValue'", $this->comparison->__toString());
    }
}