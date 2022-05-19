<?php

namespace App\Infrastructure\Validator\Email;

use App\Infrastructure\Repository\UsuarioRepository;
use App\Infrastructure\Validator\Constraint\Email\ConstraintEmailExistente;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class EmailExistenteValidator extends ConstraintValidator
{
    public UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ConstraintEmailExistente) {
            throw new UnexpectedTypeException($constraint, ConstraintEmailExistente::class);
        }

        if (!is_null($this->usuarioRepository->existeEmailCadastrado($value))) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}