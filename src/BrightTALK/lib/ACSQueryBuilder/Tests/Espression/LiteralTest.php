<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\Literal;

class LiteralTest extends \PHPUnit_Framework_TestCase
{
    private $literal;

    public function setUp()
    {
        $this->literal = new Literal('test');
    }

    public function test_contructor_casts_provided_term_into_string()
    {
        $this->literal = new Literal(1);
        $this->assertSame('1', $this->literal->getTerm());

        $this->literal = new Literal(false);
        $this->assertSame('', $this->literal->getTerm());
    }

    public function test_toString()
    {
        $this->assertSame("'test'", $this->literal->__toString());
    }
}
