<?php

namespace BrightTALK\lib\ACSQueryBuilder;

class Query
{
    /**
     * @var string $bq
     */
    private $bq;

    /**
     * @var integer $start
     */
    private $start;

    /**
     * @var integer $size
     */
    private $size;

    /**
     * @var string
     */
    private $rank;


    /**
     * @var null|array
     */
    private $facets;

    /**
     * @return string
     */
    public function getBq()
    {
        return $this->bq;
    }

    /**
     * @param string $bq
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\Query
     */
    public function setBq($bq)
    {
        $this->bq = $bq;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param integer $start
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\Query
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param integer $size
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\Query
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param string $rank
     *
     * @return \BrightTALK\lib\ACSQueryBuilder\Query
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    public function addFacet($facet)
    {
        if (null === $this->facets) {
            $this->facets = array();
        }

        if (!in_array($facet, $this->facets)) {
            $this->facets []= $facet;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $asArray = $this->asArray();
        $asArray['facet'] = is_array($this->facets)? implode(',', $asArray['facet']): $asArray['facet'];

        return urldecode(http_build_query($asArray));
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return array(
            'bq'    => $this->bq,
            'start' => $this->start,
            'size'  => $this->size,
            'rank'  => $this->rank,
            'facet' => $this->facets
        );
    }
}
