<?php
/**
 * This file is part of Reflection
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright (c) Mirko Pagliai
 * @link        https://github.com/mirko-pagliai/reflection
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Reflection;

/**
 * A Reflection trait
 */
trait ReflectionTrait
{
    /**
     * Internal method to get the `ReflectionMethod` instance
     * @param object $object Instantiated object that we will run method on
     * @param string $methodName Method name
     * @return \ReflectionMethod
     */
    protected function _getMethodInstance(&$object, $methodName)
    {
        return new \ReflectionMethod(get_class($object), $methodName);
    }

    /**
     * Internal method to get the `ReflectionProperty` instance
     * @param object $object Instantiated object that has the property
     * @param string $propertyName Property name
     * @return \ReflectionProperty
     */
    protected function _getPropertyInstance(&$object, $propertyName)
    {
        return new \ReflectionProperty(get_class($object), $propertyName);
    }

    /**
     * Gets a property value
     * @param object $object Instantiated object that has the property
     * @param string $propertyName Property name
     * @return mixed Property value
     * @uses _getPropertyInstance()
     */
    public function getProperty(&$object, $propertyName)
    {
        $property = $this->_getPropertyInstance($object, $propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * Invokes a method
     * @param object $object Instantiated object that we will run method on
     * @param string $methodName Method name
     * @param array $parameters Array of parameters to pass into method
     * @return mixed Method return
     * @uses _getMethodInstance()
     */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $method = $this->_getMethodInstance($object, $methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Sets a property value
     * @param object $object Instantiated object that has the property
     * @param string $propertyName Property name
     * @param mixed $propertyValue Property value you want to set
     * @return void
     * @uses _getPropertyInstance()
     */
    public function setProperty(&$object, $propertyName, $propertyValue)
    {
        $property = $this->_getPropertyInstance($object, $propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $propertyValue);
    }
}
