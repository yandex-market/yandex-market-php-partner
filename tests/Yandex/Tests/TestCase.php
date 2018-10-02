<?php
/**
 * @namespace
 */
namespace Yandex\Tests;

use Yandex;
use ReflectionClass;
use PHPUnit\Framework\TestCase as PHPUnitFrameworkTestCase;

/**
 * ControllerTestCase
 *
 * @category Yandex
 * @package  Tests
 *
 * @author   Anton Shevchuk
 * @created  07.08.13 12:01
 */
class TestCase extends PHPUnitFrameworkTestCase
{
    /**
     * @param string|object $classNameOrObject
     * @param string $name
     * @return \ReflectionMethod
     */
    protected static function getNotAccessibleMethod($classNameOrObject, $name) {
        $class = new ReflectionClass($classNameOrObject);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
