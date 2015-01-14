<?php
namespace BrightTALK\lib\ACSQueryBuilder;

/**
 * Generate a url for the aws cloud search
 * @package BrightTALK\lib\ACSQueryBuilder
 */
class UrlGenerator
{

    /**
     * Search element of the url
     */
    const SEARCH = 'search';

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->setBaseUrl($url);
    }

    /**
     * Construct the base url
     *
     * @param Query $query
     * @return string
     */
    public function getUrl(Query $query)
    {
        return sprintf("https://%s/search?%s", $this->baseUrl, $query->encode());
    }

    /**
     * @param $url
     */
    private function setBaseUrl($url)
    {
        if ($this->endsWith($url, '?')) {
            $url = $this->removeFromEnd($url, '?');
        }

        if ($this->endsWith($url, self::SEARCH)) {
            $url = $this->removeFromEnd($url, self::SEARCH);
        }

        if ($this->endsWith($url, '/')) {
            $url = $this->removeFromEnd($url, '/');
        }

        $this->baseUrl = $url;
    }

    /**
     * Test if the string ends with a value
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    private function endsWith($haystack, $needle)
    {
        $needleLengthInverse = mb_strlen($needle) * -1;

        return mb_substr($haystack, $needleLengthInverse) === $needle;
    }

    /**
     * Remove a string from the end of another string
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    private function removeFromEnd($haystack, $needle)
    {
        $remainingLength = mb_strlen($haystack) - mb_strlen($needle);

        return mb_substr($haystack, 0, $remainingLength);
    }
}