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
 * Exception class for Size rule.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class SizeException extends NestedValidationException
{
    public const BOTH = 'both';
    public const LOWER = 'lower';
    public const GREATER = 'greater';

    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::BOTH => '{{name}} 必須介於 {{minSize}} 和 {{maxSize}} 之間',
            self::LOWER => '{{name}} 必須大於 {{minSize}}',
            self::GREATER => '{{name}} 必須小於 {{maxSize}}',
        ],
        self::MODE_NEGATIVE => [
            self::BOTH => '{{name}} 不能介於 {{minSize}} 和 {{maxSize}} 之間',
            self::LOWER => '{{name}} 不能大於 {{minSize}}',
            self::GREATER => '{{name}} 不能小於 {{maxSize}}',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        if (!$this->getParam('minValue')) {
            return self::GREATER;
        }

        if (!$this->getParam('maxValue')) {
            return self::LOWER;
        }

        return self::BOTH;
    }
}
