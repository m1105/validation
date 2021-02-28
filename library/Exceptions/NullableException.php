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
 * @author Jens Segers <segers.jens@gmail.com>
 */
final class NullableException extends ValidationException
{
    public const NAMED = 'named';

    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '值必須為nullable',
            self::NAMED => '{{name}} 必須為nullable',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '值不能為null',
            self::NAMED => '{{name}} 不能為null',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        if ($this->getParam('input') || $this->getParam('name')) {
            return self::NAMED;
        }

        return self::STANDARD;
    }
}
