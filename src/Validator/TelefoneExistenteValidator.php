<?php

namespace App\Validator;

use App\Repository\UsuarioRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TelefoneExistenteValidator extends ConstraintValidator
{
    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        if ($this->usuarioRepository->existeTelefoneCadastrado($value)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}