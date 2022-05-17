<?php

namespace App\Validator\Email;

use App\Repository\UsuarioRepository;
use App\Validator\Constraint\Email\ConstraintEmailExistente;
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