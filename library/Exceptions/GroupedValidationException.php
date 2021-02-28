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

use function count;

/**
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class GroupedValidationException extends NestedValidationException
{
    public const NONE = 'none';
    public const SOME = 'some';

    /**
     * {@inheritDoc}
     */
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => '所有必需的規則都必須傳遞給 {{name}}',
            self::SOME => '這些規則必須傳遞給 {{name}}',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => '所有規則都不能傳遞給 {{name}}',
            self::SOME => '這些規則不能傳遞給 {{name}}',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        $numRules = $this->getParam('passed');
        $numFailed = count($this->getChildren());

        return $numRules === $numFailed ? self::NONE : self::SOME;
    }
}
