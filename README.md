# Reflection

[![Build Status](https://travis-ci.org/mirko-pagliai/reflection.svg?branch=master)](https://travis-ci.org/mirko-pagliai/reflection)
[![Coverage Status](https://img.shields.io/codecov/c/github/mirko-pagliai/reflection.svg?style=flat-square)](https://codecov.io/github/mirko-pagliai/reflection)
    
This package contains the `ReflectionTrait`, a trait that works as a wrapper for
the `Reflection` classes provided by PHP, and allows you to easily:
- invoke protected or private methods;
- set/get protected or private properties.

This trait comes to test protected and private methods and properties with
PHPUnit.

[See tests](https://github.com/mirko-pagliai/reflection/tree/master/tests/src)
for examples.  
In the code we can access (and test) faster to the protected and private methods
and properties that are declared in the `Example` class.

Available methods are:

    invokeMethod(&$object, $methodName, array $parameters = [])

    getProperty(&$object, $propertyName)

    setProperty(&$object, $propertyName, $propertyValue)

## Versioning
For transparency and insight into our release cycle and to maintain backward
compatibility, Reflection will be maintained under the
[Semantic Versioning guidelines](http://semver.org).
