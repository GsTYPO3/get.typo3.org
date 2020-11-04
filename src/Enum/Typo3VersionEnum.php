<?php

declare(strict_types=1);

/*
 * This file is part of the package t3o/gettypo3org.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace App\Enum;

final class Typo3VersionEnum extends AbstractEnum
{
    public const OPTION_8_7 = 8007000;
    public const OPTION_9_5 = 9005000;
    public const OPTION_10_4 = 10004000;
    //public const OPTION_11_0 = 11000000;

    protected static array $optionNames = [
        self::OPTION_10_4 => '10.4 LTS',
        self::OPTION_9_5 => '9.5 LTS',
        self::OPTION_8_7 => '8.7 ELTS',
        //self::OPTION_11_0 => '11.0',
    ];
}
