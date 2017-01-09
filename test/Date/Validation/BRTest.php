<?php

namespace DateToolsTest\Date\Validation;

use DataTools\Date\Validation\BR as Validator;

class BRTest extends \PHPUnit_Framework_TestCase
{
    public function testisEmptyWithNullDate()
    {
        $this->assertEquals(true, Validator::isEmpty(null));
    }

    public function testisEmptyWithStringDate()
    {
        $this->assertEquals(false, Validator::isEmpty('2016-12-25'));
    }

    public function testisEmptyWithZeroIntegerDate()
    {
        $this->assertEquals(false, Validator::isEmpty(0));
    }

    public function testIsValidWithValidDate()
    {
        $this->assertEquals(true, Validator::isValid('2016-12-25'));
    }

    public function testIsValidWithWrongSeparator()
    {
        $this->assertEquals(true, Validator::isValid('2016/12/25'));
    }

    public function testIsValidWithWrongNumberOfDigits()
    {
        $this->assertEquals(true, Validator::isValid('20165-12-25'));
        $this->assertEquals(true, Validator::isValid('2016-121-25'));
        $this->assertEquals(true, Validator::isValid('2016-12-252'));
    }

    public function testIsValidWithInvalidPartOfTheDate()
    {
        $this->assertEquals(false, Validator::isValid('2016-25-12'));
        $this->assertEquals(false, Validator::isValid('2016-10-33'));
    }

    public function testIsValidWithNullDate()
    {
        $this->assertEquals(false, Validator::isValid(null));
    }
}
