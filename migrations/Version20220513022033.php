<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513022033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, endereco_id INTEGER DEFAULT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(120) NOT NULL, email VARCHAR(50) NOT NULL, telefone VARCHAR(12) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F41C9B25E7927C74 ON cliente (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F41C9B252132E361 ON cliente (telefone)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F41C9B251BB76823 ON cliente (endereco_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F41C9B254854653A ON cliente (pedido_id)');
        $this->addSql('CREATE TABLE endereco (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER DEFAULT NULL, cep VARCHAR(9) NOT NULL, numero VARCHAR(5) NOT NULL, rua VARCHAR(180) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F8E0D60EDE734E51 ON endereco (cliente_id)');
        $this->addSql('CREATE TABLE pedido (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, status_pedido VARCHAR(255) NOT NULL, data_criacao DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(125) NOT NULL, preco DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5CAC49D74854653A ON produto (pedido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE endereco');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE produto');
    }
}
