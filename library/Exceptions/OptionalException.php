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
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class OptionalException extends ValidationException
{
    public const NAMED = 'named';

    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '該值必須是可選的',
            self::NAMED => '{{name}} 必須是可選的',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '該值不能是可選的',
            self::NAMED => '{{name}} 不能是可選的',
        ],
    ];

    protected function chooseTemplate(): string
    {
        return $this->getParam('name') ? self::NAMED : self::STANDARD;
    }
}
