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

        $url = $urlGenerator->getUrl($query);

        $this->assertContains('search?q=hello', $url);
        $this->assertContains('https://search', $url);

        m::close();
    }

    public function urlProvider()
    {
        $base = 'search.aws.com/';
        $fullBase = 'https://' . $base;

        return array(
            array($base),
            array($base . 'search'),
            array($base . 'search?'),
            array($base . '/search?'),
            array($fullBase),
            array($fullBase . 'search'),
            array($fullBase . 'search?'),
            array($fullBase . '/search?')
        );
    }

}
