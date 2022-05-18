<?php

namespace App\Tests\Usuario;

use App\Build\UsuarioBuilder;
use App\Exception\ValidatorException;
use App\Service\UsuarioService;
use App\VO\UsuarioVO;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsuarioTest extends WebTestCase
{
    private UsuarioVO $usuarioVO;
    private UsuarioService $usuarioService;

    protected function setUp(): void
    {
        $this->usuarioVO = $this->createMock(UsuarioVO::class);
        $this->usuarioService = $this->createMock(UsuarioService::class);
    }

    /** @dataProvider  */
    public function testSalvarUsuario()
    {
        $usuarioVO = $this->createMock(UsuarioVO::class);
        $usuarioBuild = new UsuarioBuilder();
        $em = $this->getMockBuilder(EntityManager::class)
            ->onlyMethods(['persist', 'flush'])
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $usuario = $usuarioBuild
            ->setUsuarioVO($usuarioVO)
            ->getUsuario()
            ->addEndereco()
            ->build()
        ;

        $em->expects($this->once())
            ->method('persist')
            ->with($usuario)
        ;
        $em->expects($this->once())
            ->method('flush')
        ;

        $em->persist($usuario);
        $em->flush();
    }

    /** @dataProvider getMockJson */
    public function testEmailCadastrado(string $request)
    {
        $validator = self::getContainer()->get('App\Adapter\Validator');

        $serializer = self::getContainer()->get('App\Adapter\Serializer');

        $usuarioVO = $serializer->deserialize($request, UsuarioVO::class, 'json');

        try {
            $validator->validate($usuarioVO);
        } catch (ValidatorException $exception) {
            $this->assertEquals('Email já cadastrado - email', $exception->getMessage());
        }
    }

    public function getMockJsonEmailCadastrado(): array
    {
        return [
            [
                json_encode([
                    "nome" => "guilherme",
                    "email" => "teste@teste.com",
                    "password"=> "teste123",
                    "telefone" => "109999999999",
                    "endereco"=> [
                        "rua"=> "Teste",
                        "numero"=> 37,
                        "cep"=> 11111111
                    ],
                    "role"=> "ROLE_CLIENTE"
                ])
            ]
        ];
    }

    public function getMockJsonTelefoneCadastrado(): array
    {
        return [
            [
                json_encode([
                    "nome" => "guilherme",
                    "email" => "teste@teste.com",
                    "password"=> "teste123",
                    "telefone" => "109999999999",
                    "endereco"=> [
                        "rua"=> "Teste",
                        "numero"=> 37,
                        "cep"=> 11111111
                    ],
                    "role"=> "ROLE_CLIENTE"
                ])
            ]
        ];
    }
}