<?php

namespace BrightTALK\lib\ACSQueryBuilder\Tests;

use BrightTALK\lib\ACSQueryBuilder\Query;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function testThatToStringReturnsHttpQueryStringBasedOnAttributes()
    {
        $query = new Query();
        $query->setBq('test');
        $this->assertSame('bq=test', $query->__toString());

        $query = new Query();
        $query->setBq('test')->setStart(0);
        $this->assertSame('bq=test&start=0', $query->__toString());

        $query = new Query();
        $query->setBq('test')->setStart(0)->setSize(1);
        $this->assertSame('bq=test&start=0&size=1', $query->__toString());

        $query = new Query();
        $query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank');
        $this->assertSame('bq=test&start=0&size=1&rank=test-rank', $query->__toString());

        $query = new Query();
        $query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword');
        $this->assertSame('bq=test&start=0&size=1&rank=test-rank&facet=keyword', $query->__toString());

        $query = new Query();
        $query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword')->addFacet('genre');
        $this->assertSame('bq=test&start=0&size=1&rank=test-rank&facet=keyword,genre', $query->__toString());
    }

    public function testAsArray()
    {
        $query = new Query();
        $expectedArray = array('bq' => 'test', 'start' => null, 'size' => null, 'rank' => null);
        $query->setBq('test');
        $this->assertSame($expectedArray, $query->asArray());

        $query = new Query();
        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => null, 'rank' => null);
        $query->setBq('test')->setStart(0);
        $this->assertSame($expectedArray, $query->asArray());

        $query = new Query();
        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => null);
        $query->setBq('test')->setStart(0)->setSize(1);
        $this->assertSame($expectedArray, $query->asArray());

        $query = new Query();
        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => 'test-rank');
        $query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank');
        $this->assertSame($expectedArray, $query->asArray());

        $query = new Query();
        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => 'test-rank', 'facet' => 'keyword');
        $query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword');
        $this->assertSame($expectedArray, $query->asArray());

        $query = new Query();
        $expectedArray = array('bq' => 'test', 'start' => 0, 'size' => 1, 'rank' => 'test-rank', 'facet' => 'keyword,genre');
        $query->setBq('test')->setStart(0)->setSize(1)->setRank('test-rank')->addFacet('keyword')->addFacet('genre');
        $this->assertSame($expectedArray, $query->asArray());
    }

    /**
     * @dataProvider invalidFacetDataProvider
     * @expectedException        \InvalidArgumentException
     */
    public function test_addFacet_only_accepts_strings($invalidFacet)
    {
        $query = new Query();
        $query->addFacet($invalidFacet);
    }

    public function invalidFacetDataProvider()
    {
        return array(
            array(null),
            array(2),
            array(new \stdClass()),
            array(array())
        );
    }

    public function testAsEncode()
    {
        $queryString = "(and type:'type' rating:1..10 (or user:'steve'))";

        $query = new Query();
        $query->setBq($queryString);
        $query->setSize(5);

        $encoded = $query->encode();

        $this->assertContains("&size=5", $encoded);
        $this->assertContains('bq=' . urlencode($queryString), $encoded);
    }
}
