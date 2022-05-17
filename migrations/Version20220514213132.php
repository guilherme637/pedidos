<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514213132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_F8E0D60EDB38439E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__endereco AS SELECT id, usuario_id, cep, numero, rua FROM endereco');
        $this->addSql('DROP TABLE endereco');
        $this->addSql('CREATE TABLE endereco (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, usuario_id INTEGER DEFAULT NULL, cep VARCHAR(9) NOT NULL, numero VARCHAR(5) NOT NULL, rua VARCHAR(180) NOT NULL, CONSTRAINT FK_F8E0D60EDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO endereco (id, usuario_id, cep, numero, rua) SELECT id, usuario_id, cep, numero, rua FROM __temp__endereco');
        $this->addSql('DROP TABLE __temp__endereco');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F8E0D60EDB38439E ON endereco (usuario_id)');
        $this->addSql('DROP INDEX IDX_5CAC49D74854653A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__produto AS SELECT id, pedido_id, nome, preco FROM produto');
        $this->addSql('DROP TABLE produto');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(125) NOT NULL, preco DOUBLE PRECISION NOT NULL, CONSTRAINT FK_5CAC49D74854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO produto (id, pedido_id, nome, preco) SELECT id, pedido_id, nome, preco FROM __temp__produto');
        $this->addSql('DROP TABLE __temp__produto');
        $this->addSql('CREATE INDEX IDX_5CAC49D74854653A ON produto (pedido_id)');
        $this->addSql('DROP INDEX UNIQ_2265B05D4854653A');
        $this->addSql('DROP INDEX UNIQ_2265B05D1BB76823');
        $this->addSql('DROP INDEX UNIQ_2265B05D2132E361');
        $this->addSql('DROP INDEX UNIQ_2265B05DE7927C74');
        $this->addSql('CREATE TEMPORARY TABLE __temp__usuario AS SELECT id, endereco_id, pedido_id, nome, email, telefone, role, is_ativo, password FROM usuario');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('CREATE TABLE usuario (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, endereco_id INTEGER DEFAULT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(120) NOT NULL, email VARCHAR(180) NOT NULL, telefone VARCHAR(12) NOT NULL, role CLOB NOT NULL --(DC2Type:json)
        , is_ativo BOOLEAN NOT NULL, password VARCHAR(255) NOT NULL, CONSTRAINT FK_2265B05D1BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2265B05D4854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO usuario (id, endereco_id, pedido_id, nome, email, telefone, role, is_ativo, password) SELECT id, endereco_id, pedido_id, nome, email, telefone, role, is_ativo, password FROM __temp__usuario');
        $this->addSql('DROP TABLE __temp__usuario');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D4854653A ON usuario (pedido_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D1BB76823 ON usuario (endereco_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D2132E361 ON usuario (telefone)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON usuario (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_F8E0D60EDB38439E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__endereco AS SELECT id, usuario_id, cep, numero, rua FROM endereco');
        $this->addSql('DROP TABLE endereco');
        $this->addSql('CREATE TABLE endereco (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, usuario_id INTEGER DEFAULT NULL, cep VARCHAR(9) NOT NULL, numero VARCHAR(5) NOT NULL, rua VARCHAR(180) NOT NULL)');
        $this->addSql('INSERT INTO endereco (id, usuario_id, cep, numero, rua) SELECT id, usuario_id, cep, numero, rua FROM __temp__endereco');
        $this->addSql('DROP TABLE __temp__endereco');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F8E0D60EDB38439E ON endereco (usuario_id)');
        $this->addSql('DROP INDEX IDX_5CAC49D74854653A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__produto AS SELECT id, pedido_id, nome, preco FROM produto');
        $this->addSql('DROP TABLE produto');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(125) NOT NULL, preco DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO produto (id, pedido_id, nome, preco) SELECT id, pedido_id, nome, preco FROM __temp__produto');
        $this->addSql('DROP TABLE __temp__produto');
        $this->addSql('CREATE INDEX IDX_5CAC49D74854653A ON produto (pedido_id)');
        $this->addSql('DROP INDEX UNIQ_2265B05DE7927C74');
        $this->addSql('DROP INDEX UNIQ_2265B05D2132E361');
        $this->addSql('DROP INDEX UNIQ_2265B05D1BB76823');
        $this->addSql('DROP INDEX UNIQ_2265B05D4854653A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__usuario AS SELECT id, endereco_id, pedido_id, nome, email, telefone, role, is_ativo, password FROM usuario');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('CREATE TABLE usuario (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, endereco_id INTEGER DEFAULT NULL, pedido_id INTEGER DEFAULT NULL, nome VARCHAR(120) NOT NULL, email VARCHAR(180) NOT NULL, telefone VARCHAR(12) NOT NULL, role CLOB NOT NULL --(DC2Type:json)
        , is_ativo BOOLEAN NOT NULL, password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO usuario (id, endereco_id, pedido_id, nome, email, telefone, role, is_ativo, password) SELECT id, endereco_id, pedido_id, nome, email, telefone, role, is_ativo, password FROM __temp__usuario');
        $this->addSql('DROP TABLE __temp__usuario');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON usuario (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D2132E361 ON usuario (telefone)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D1BB76823 ON usuario (endereco_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D4854653A ON usuario (pedido_id)');
    }
}
