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
 * Exceptions to be thrown by the Attribute Rule.
 *
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Emmerson Siqueira <emmersonsiqueira@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class AttributeException extends NestedValidationException implements NonOmissibleException
{
    public const NOT_PRESENT = 'not_present';
    public const INVALID = 'invalid';

    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NOT_PRESENT => '屬性 {{name}} 必須存在',
            self::INVALID => '屬性 {{name}} 必須有效',
        ],
        self::MODE_NEGATIVE => [
            self::NOT_PRESENT => '屬性 {{name}} 不能存在',
            self::INVALID => '屬性 {{name}} 必須無效',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        return $this->getParam('hasReference') ? self::INVALID : self::NOT_PRESENT;
    }
}
