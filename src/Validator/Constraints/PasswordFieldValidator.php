<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class PasswordFieldValidator extends  ConstraintValidator
{
    private const PASSWORD_PATTERN = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@\-_]).{8,}$/';

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof PasswordField) {
            throw new UnexpectedTypeException($constraint, PasswordField::class);
        }

        // if the value of $value is null or empty, just do nothing. You must use NotNull and NotBlank.
        if (null === $value || '' === $value) {
            return;
        }

        // passwords can only be strings
        if (!\is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (\preg_match(self::PASSWORD_PATTERN, $value) === 1) { // passowrd valid
            return;
        }

        // add a constraint violation to the list
        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}
