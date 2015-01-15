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
     * @var string
     */
    private $scheme;

    /**
     * @param string $url
     * @param string $scheme
     */
    public function __construct($url, $scheme = 'https')
    {
        $this->setBaseUrl($url);
        $this->scheme = $scheme;
    }

    /**
     * Construct the base url
     *
     * @param Query $query
     * @return string
     */
    public function getUrl(Query $query)
    {
        return sprintf("%s://%s/search?%s", $this->scheme, $this->baseUrl, $query->encode());
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

        if($this->startsWith($url, 'https://')) {
            $url = $this->removeFromStart($url, 'https://');
        }

        if($this->startsWith($url, 'http://')) {
            $url = $this->removeFromStart($url, 'http://');
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
     * Test if the string ends with a value
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    private function startsWith($haystack, $needle)
    {
        $needleLength = mb_strlen($needle);

        return mb_substr($haystack, 0, $needleLength) === $needle;
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

    /**
     * Remove a string from the end of another string
     *
     * @param string $haystack
     * @param string $needle
     * @return string
     */
    private function removeFromStart($haystack, $needle)
    {
        $length = mb_strlen($needle);

        return mb_substr($haystack, $length);
    }
}