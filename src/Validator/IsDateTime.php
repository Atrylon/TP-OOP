<?php

declare(strict_types=1);

namespace App\Validator;

class IsDateTime implements Validator
{
    public function validate(string $value): void
    {
        if (\DateTime::createFromFormat('d/m/Y G:i:s', $value) === $value) {
            throw new \LogicException('DateTime provided');
        }
    }
}