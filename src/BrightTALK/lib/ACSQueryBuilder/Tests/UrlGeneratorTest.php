<?php
namespace BrightTALK\lib\ACSQueryBuilder\Tests;

use BrightTALK\lib\ACSQueryBuilder\UrlGenerator;
use Mockery as m;

class UrlGeneratorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider urlProvider
     */
    public function testGetUrl($baseUrl)
    {
        $query = m::mock('BrightTALK\lib\ACSQueryBuilder\Query');
        $query->shouldReceive('encode')->once()->andReturn('q=hello');

        $urlGenerator = new UrlGenerator($baseUrl);

        $this->assertContains('search?q=hello', $urlGenerator->getUrl($query));
    }

    public function urlProvider()
    {
        $base = 'search.aws.com/';

        return array(
            array($base),
            array($base . 'search'),
            array($base . 'search?'),
            array($base . '/search?')
        );
    }

}
