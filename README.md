# Amazon Cloud Search Query Builder

[![Build Status](https://travis-ci.org/BrightTALK/acs-query-builder.png)](https://travis-ci.org/BrightTALK/acs-query-builder)

## Description

This library provides an object oriented way to programmatically build queries for the Amazon Cloud Search service. It's inspired by Doctrine's query builder.
A query's __toString method will return a decoded string, as provided by the http_build_query function

##Installation

Add to your composer.json:

    "require": {
        ...
        "brighttalk/acs-query-builder": "dev-master"
    }

## Working with the Query Builder

```php
$query = $qb->searchByFieldValue("fieldName", "'fieldValue'")
    ->setSize(20)
    ->setStart(0)
    ->setRank('-fieldName')
    ->getQuery();

echo $query;
```
would output bq=fieldName:'fieldValue'&start=0&size=20&rank=-fieldName
(the "-" in the rank expression means it is in descending order - see the [Amazon docs](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/sortingresults.html) )

## The ExpressionBuilder

The supported expressions are: andX, orX, notX, eq

Example:

```php
$query = $qb->setSearchExpression($qb->expr()->andx(
        $qb->expr()->eq("aFieldName", "'aFieldValue'"),
        $qb->expr()->notx($qb->expr()->eq("anotherFieldName", "'anotherFieldValue'"))
    ))
    ->setSize(20)
    ->setStart(0)
    ->getQuery();

echo $query;
```
would output bq=(and afieldName:'afieldValue' (not anotherFieldName:'anotherFieldValue'))&start=0&size=20
