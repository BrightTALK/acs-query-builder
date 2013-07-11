# Amazon Cloud Search Query Builder

[![Build Status](https://travis-ci.org/billybigpotatoes/acs-query-builder.png)](https://travis-ci.org/billybigpotatoes/acs-query-builder)

## Description

This library provides an object oriented way to programmatically build queries for the Amazon Cloud Search service. It's inspired by doctrine's query builder.
A query's __toString method will return a url encoded string, as provided by the http_build_query function

## Working with the Query Builder

```php
$query = $qb->searchByFieldValue("fieldName", "'fieldValue'")
    ->setSize(20)
    ->setStart(0)
    ->setRank('-fieldName')
    ->getQuery();

echo urldecode($query);
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

echo urldecode($query);
```
would output bq=(and afieldName:'afieldValue' (not anotherFieldName:'anotherFieldValue'))&start=0&size=20