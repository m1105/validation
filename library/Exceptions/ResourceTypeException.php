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
 * Exception class for ResourceType.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class ResourceTypeException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必須是資源',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能是資源',
        ],
    ];
}
