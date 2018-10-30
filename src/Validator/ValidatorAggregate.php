<?php

declare(strict_types=1);

namespace App\Validator;

class ValidatorAggregate implements Validator
{

    private $validators;

    public function __construct(Validator ...$validators)
    {
        $this->validators = $validators;
    }

    /**
     * @param string $value
     * @throws \LogicException
     */
    public function validate(string $value): void
    {
        foreach ($this->validators as $validator) {
            $validator->validate($value);
        }
    }
}