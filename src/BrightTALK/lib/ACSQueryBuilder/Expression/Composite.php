<?php
namespace BrightTALK\lib\ACSQueryBuilder\Expression;

abstract class Composite implements ExpressionInterface
{
    /**
     * @var string
     */
    protected $preSeparator = '(';

    /**
     * @var string
     */
    protected $separator = ' ';

    /**
     * @var string
     */
    protected $postSeparator = ')';

    /**
     * @var array
     */
    protected $parts = array();

    /**
     * @param array $parts
     */
    public function __construct(array $parts = array())
    {
        $this->parts = $parts;
    }

    /**
     * @return string
     */
    public function getPreSeparator()
    {
        return $this->preSeparator;
    }

    /**
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }

    /**
     * @return string
     */
    public function getPostSeparator()
    {
        return $this->postSeparator;
    }

    /**
     * @return array
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->preSeparator . implode($this->separator, $this->parts) . $this->postSeparator;
    }
}