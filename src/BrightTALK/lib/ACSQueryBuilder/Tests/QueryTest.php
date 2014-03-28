<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests;

use BrightTALK\lib\ACSQueryBuilder\Query;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    private $query;

    public function setUp()
    {
        $this->query = new Query();
    }

    public function testThatToStringReturnsHttpQueryStringBasedOnAttributes()
    {
        $this->query->setBq('test');
        $this->assertSame('bq=test', $this->query->__toString());

        $this->query->setBq('test')->setStart(0);
        $this->assertSame('bq=test&start=0', $this->query->__toString());

        $this->query->setBq('test')->setStart(0)->setSize(1);
        $this->assertSame('bq=test&start=0&size=1', $this->query->__toString());

        $this->query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank');
        $this->assertSame('bq=test&start=0&size=1&rank=test-rank', $this->query->__toString());

        $this->query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword');
        $this->assertSame('bq=test&start=0&size=1&rank=test-rank&facet=keyword', $this->query->__toString());

        $this->query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword')->addFacet('genre');
        $this->assertSame('bq=test&start=0&size=1&rank=test-rank&facet=keyword,genre', $this->query->__toString());
    }

    public function testAsArray()
    {
        $expectedArray = array('bq' => 'test', 'start' => null, 'size' => null, 'rank' => null, 'facet' => null);
        $this->query->setBq('test');
        $this->assertSame($expectedArray, $this->query->asArray());

        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => null, 'rank' => null, 'facet' => null);
        $this->query->setBq('test')->setStart(0);
        $this->assertSame($expectedArray, $this->query->asArray());

        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => null, 'facet' => null);
        $this->query->setBq('test')->setStart(0)->setSize(1);
        $this->assertSame($expectedArray, $this->query->asArray());

        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => 'test-rank', 'facet' => null);
        $this->query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank');
        $this->assertSame($expectedArray, $this->query->asArray());

        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => 'test-rank', 'facet' => array('keyword'));
        $this->query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword');
        $this->assertSame($expectedArray, $this->query->asArray());

        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => 'test-rank', 'facet' => array('keyword', 'genre'));
        $this->query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword')->addFacet('genre');
        $this->assertSame($expectedArray, $this->query->asArray());
    }
}
