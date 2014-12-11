<?php
namespace BrightTALK\lib\ACSQueryBuilder\Tests\Expression;

use BrightTALK\lib\ACSQueryBuilder\Expression\Notx;
use Mockery as m;

class NotxTest extends \PHPUnit_Framework_TestCase {


    /**
     * @dataProvider argProvider
     */
    public function test_constructor_args($arg){
        $notx = new Notx($arg);

        $this->assertEquals('(not ', $notx->getPreSeparator());
    }

    public function argProvider()
    {
        return array(
            array(m::mock('BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface')),
            array(array(m::mock('BrightTALK\lib\ACSQueryBuilder\Expression\ExpressionInterface')))
        );
    }

}
 