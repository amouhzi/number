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

    private function __construct()
    {
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
     * Sets decimal point
     *
     * @param string $decimalPoint
     */
    public static function setDecimalPoint($decimalPoint)
    {
        self::$decimalPoint = $decimalPoint;
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
     * Sets number of decimals
     *
     * @param int $decimals
     */
    public static function setDecimals($decimals)
    {
        self::$decimals = $decimals;
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
     * Sets the thousands separator
     *
     * @param string $thousandsSeparator
     */
    public static function setThousandsSeparator($thousandsSeparator)
    {
        self::$thousandsSeparator = $thousandsSeparator;
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
     * Get float value of a variable
     *
     * @param mixed $var
     * @return float
     */
    public function float($var)
    {
        return floatval($var);
    }

    /**
     * Get the integer value of a variable
     *
     * @param mixed $var
     * @param int $base
     * @return int
     */
    public function int($var, $base = 10)
    {
        return intval($var, $base);
    }

}