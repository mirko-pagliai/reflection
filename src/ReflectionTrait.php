<?php
/**
 * This file is part of Reflection.
 *
 * Reflection is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * Reflection is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Reflection.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author      Mirko Pagliai <mirko.pagliai@gmail.com>
 * @copyright   Copyright (c) 2016, Mirko Pagliai for Nova Atlantis Ltd
 * @license     http://www.gnu.org/licenses/agpl.txt AGPL License
 * @link        http://git.novatlantis.it Nova Atlantis Ltd
 */
namespace Reflection;

use ReflectionMethod;
use ReflectionProperty;

/**
 * A Reflection trait
 */
trait ReflectionTrait
{
    /**
     * Internal method to get the `ReflectionMethod` instance
     * @param object $object Instantiated object that we will run method on
     * @param string $methodName Method name
     * @return ReflectionMethod
     */
    protected function getMethodInstance(&$object, $methodName)
    {
        return new ReflectionMethod(get_class($object), $methodName);
    }

    /**
     * Internal method to get the `ReflectionProperty` instance
     * @param object $object Instantiated object that has the property
     * @param string $propertyName Property name
     * @return ReflectionProperty
     */
    protected function getPropertyInstance(&$object, $propertyName)
    {
        return new ReflectionProperty(get_class($object), $propertyName);
    }

    /**
     * Gets a property value
     * @param object $object Instantiated object that has the property
     * @param string $propertyName Property name
     * @return mixed Property value
     * @uses getPropertyInstance()
     */
    public function getProperty(&$object, $propertyName)
    {
        $property = $this->getPropertyInstance($object, $propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * Invokes a method
     * @param object $object Instantiated object that we will run method on
     * @param string $methodName Method name
     * @param array $parameters Array of parameters to pass into method
     * @return mixed Method return
     * @uses getMethodInstance()
     */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $method = $this->getMethodInstance($object, $methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Sets a property value
     * @param object $object Instantiated object that has the property
     * @param string $propertyName Property name
     * @param mixed $propertyValue Property value you want to set
     * @return void
     * @uses getPropertyInstance()
     */
    public function setProperty(&$object, $propertyName, $propertyValue)
    {
        $property = $this->getPropertyInstance($object, $propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $propertyValue);
    }
}
