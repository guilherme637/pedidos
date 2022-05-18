<?php

namespace App\DataFixtures;

use App\Domain\Entity\Endereco;
use App\Domain\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsuarioFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $usuario = new Usuario();
        $endereco = new Endereco();
        $endereco
            ->setRua('Teste')
            ->setCep(11111111)
            ->setNumero(111);
        $usuario
            ->setNome('guilherme')
            ->setEmail('teste@teste.com')
            ->setEndereco($endereco)
            ->setPassword('teste123')
            ->setRole('ROLE_CLIENTE')
            ->setIsAtivo(true)
            ->setTelefone('109999999999')
        ;

        $manager->persist($usuario);
        $manager->flush();
    }
}