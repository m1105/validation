<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Mazen Touati <mazen_touati@hotmail.com>
 */
final class LengthException extends ValidationException
{
    public const BOTH = 'both';
    public const LOWER = 'lower';
    public const LOWER_INCLUSIVE = 'lower_inclusive';
    public const GREATER = 'greater';
    public const GREATER_INCLUSIVE = 'greater_inclusive';
    public const EXACT = 'exact';

    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::BOTH => '{{name}} 長度必須在 {{minValue}} 與 {{maxValue}} 之間',
            self::LOWER => '{{name}} 長度必須大於 {{minValue}}',
            self::LOWER_INCLUSIVE => '{{name}} 的長度必須大於或等於 {{minValue}}',
            self::GREATER => '{{name}} 長度必須小於 {{maxValue}}',
            self::GREATER_INCLUSIVE => '{{name}} 長度必須小於或等於 {{maxValue}}',
            self::EXACT => '{{name}} 長度必須是 {{maxValue}}',
        ],
        self::MODE_NEGATIVE => [
            self::BOTH => '{{name}} 的長度不能介於 {{minValue}} 和 {{maxValue}} 之間',
            self::LOWER => '{{name}} 長度不能大於 {{minValue}}',
            self::LOWER_INCLUSIVE => '{{name}} 長度不能大於或等於 {{minValue}}',
            self::GREATER => '{{name}} 長度不得小於 {{maxValue}}',
            self::GREATER_INCLUSIVE => '{{name}} 長度不能小於或等於 {{maxValue}}',
            self::EXACT => '{{name}} 長度不能是 {{maxValue}}',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        $isInclusive = $this->getParam('inclusive');

        if (!$this->getParam('minValue')) {
            return $isInclusive === true ? self::GREATER_INCLUSIVE : self::GREATER;
        }

        if (!$this->getParam('maxValue')) {
            return $isInclusive === true ? self::LOWER_INCLUSIVE : self::LOWER;
        }

        if ($this->getParam('minValue') == $this->getParam('maxValue')) {
            return self::EXACT;
        }

        return self::BOTH;
    }
}
