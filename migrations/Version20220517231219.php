<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517231219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE endereco (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, usuario_id INTEGER DEFAULT NULL, cep VARCHAR(9) NOT NULL, numero VARCHAR(5) NOT NULL, rua VARCHAR(180) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F8E0D60EDB38439E ON endereco (usuario_id)');
        $this->addSql('CREATE TABLE pedido (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, status_pedido VARCHAR(255) NOT NULL, data_criacao DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(125) NOT NULL, preco DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5CAC49D74854653A ON produto (pedido_id)');
        $this->addSql('CREATE TABLE usuario (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, endereco_id INTEGER DEFAULT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(120) NOT NULL, email VARCHAR(180) NOT NULL, telefone VARCHAR(12) NOT NULL, role CLOB NOT NULL --(DC2Type:json)
        , is_ativo BOOLEAN NOT NULL, password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON usuario (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D2132E361 ON usuario (telefone)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D1BB76823 ON usuario (endereco_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D4854653A ON usuario (pedido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE endereco');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE usuario');
    }
}
