<?php
namespace BrightTALK\lib\ACSQueryBuilder\Tests\Expression\Factory;

use BrightTALK\lib\ACSQueryBuilder\Expression\Factory\CompositesFactory;

class CompositesFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function test_andx()
    {
        $this->assertInstanceOf('BrightTALK\lib\ACSQueryBuilder\Expression\Andx', $this->getFactory()->buildAndx(array()));
    }

    public function test_orx()
    {
        $this->assertInstanceOf('BrightTALK\lib\ACSQueryBuilder\Expression\Orx', $this->getFactory()->buildOrx(array()));
    }

    public function test_notx()
    {
        $this->assertInstanceOf('BrightTALK\lib\ACSQueryBuilder\Expression\Notx', $this->getFactory()->buildNotx(array()));
    }

    private function getFactory()
    {
        return new CompositesFactory();
    }

}
 