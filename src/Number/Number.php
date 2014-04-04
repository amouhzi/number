<?php
/**
 * Number class
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2014 Hassan Amouhzi
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Number;

class Number
{
    /**
     * @var int|float
     */
    private $number;

    /**
     * @var int
     */
    private static $decimals = 0;

    /**
     * @var string
     */
    private static $decimalPoint = '.';

    /**
     * @var string
     */
    private static $thousandsSeparator = ',';

    /**
     * Contructor
     *
     * @param $number
     * @throws \InvalidArgumentException
     */
    public function __construct($number)
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException("Value in not numeric");
        }
        $this->number = $number;
    }

    /**
     * Sets decimal point
     *
     * @param string $decimalPoint
     */
    public static function setDecimalPoint($decimalPoint)
    {
        self::$decimalPoint = $decimalPoint;
    }

    /**
     * Gets decimal point
     *
     * @return string
     */
    public static function getDecimalPoint()
    {
        return self::$decimalPoint;
    }

    /**
     * Sets number of decimals
     *
     * @param int $decimals
     */
    public static function setDecimals($decimals)
    {
        self::$decimals = $decimals;
    }

    /**
     * Gets number of decimals
     *
     * @return int
     */
    public static function getDecimals()
    {
        return self::$decimals;
    }

    /**
     * Sets the number value
     *
     * @param float|int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Gets the number value
     *
     * @return float|int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the thousands separator
     *
     * @param string $thousandsSeparator
     */
    public static function setThousandsSeparator($thousandsSeparator)
    {
        self::$thousandsSeparator = $thousandsSeparator;
    }

    /**
     * Gets the thousand separator
     *
     * @return string
     */
    public static function getThousandsSeparator()
    {
        return self::$thousandsSeparator;
    }

    /**
     * Gets the integer part of the number
     *
     * @return int
     */
    public function getInt()
    {
        return (int)$this->number;
    }

    /**
     * Gets the number as float
     *
     * @return float
     */
    public function getFloat()
    {
        return (float)$this->number;
    }

    /**
     * Format a number with grouped thousands
     *
     * @param $number
     * @param null $decimals
     * @param null $decimalPoint
     * @param string $thousandsSeparator
     * @return string
     */
    public static function format($number, $decimals = null, $decimalPoint = null,
                                  $thousandsSeparator = null)
    {
        if (is_null($decimals)) {
            $decimals = self::$decimals;
        }
        if (is_null($decimalPoint)) {
            $decimalPoint = self::$decimalPoint;
        }
        if (is_null($thousandsSeparator)) {
            $thousandsSeparator = self::$thousandsSeparator;
        }
        return number_format($number, $decimals, $decimalPoint, $thousandsSeparator);
    }

    /**
     * Magic function: toString
     *
     * @return string
     */
    public function __toString()
    {
        return self::format($this->number);
    }
}