<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230827031343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category_trick (category_id INT NOT NULL, trick_id INT NOT NULL, PRIMARY KEY(category_id, trick_id))');
        $this->addSql('CREATE INDEX IDX_30C3E65712469DE2 ON category_trick (category_id)');
        $this->addSql('CREATE INDEX IDX_30C3E657B281BE2E ON category_trick (trick_id)');
        $this->addSql('ALTER TABLE category_trick ADD CONSTRAINT FK_30C3E65712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_trick ADD CONSTRAINT FK_30C3E657B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('ALTER TABLE category_trick DROP CONSTRAINT FK_30C3E65712469DE2');
        $this->addSql('ALTER TABLE category_trick DROP CONSTRAINT FK_30C3E657B281BE2E');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_trick');
    }
}
