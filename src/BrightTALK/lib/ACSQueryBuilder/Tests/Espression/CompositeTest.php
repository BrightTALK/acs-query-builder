<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\Composite;

class CompositeChildStub extends Composite
{

}

class CompositeTest extends \PHPUnit_Framework_TestCase
{
    private $compositeChild;

    public function setUp()
    {
        $this->compositeChild = new CompositeChildStub();
    }

    public function test_toString()
    {
        $this->compositeChild = new CompositeChildStub(array(1, 2, 3));

        $this->assertSame('(1 2 3)', $this->compositeChild->__toString());
    }
}