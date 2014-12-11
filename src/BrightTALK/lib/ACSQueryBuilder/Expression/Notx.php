<?php
namespace BrightTALK\lib\ACSQueryBuilder\Expression;

class Notx extends Composite
{
    /**
     * @var string
     */
    protected $preSeparator = '(not ';

    /**
     * @param ExpressionInterface|array $part
     */
    public function __construct($part)
    {
        $parentArgs = array();

        if($part instanceof ExpressionInterface)
        {
            $parentArgs[] = $part;
        }elseif(is_array($part))
        {
            $parentArgs = $part;
        }

        parent::__construct($parentArgs);
    }
}

