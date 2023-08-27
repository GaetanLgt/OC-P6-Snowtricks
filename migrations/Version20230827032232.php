<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230827032232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C460BB6FE6 FOREIGN KEY (auteur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D9BEC0C460BB6FE6 ON commentaires (auteur_id)');
        $this->addSql('ALTER TABLE "user" ADD alias VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD image_profil VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE commentaires DROP CONSTRAINT FK_D9BEC0C460BB6FE6');
        $this->addSql('DROP INDEX IDX_D9BEC0C460BB6FE6');
        $this->addSql('ALTER TABLE commentaires DROP auteur_id');
        $this->addSql('ALTER TABLE "user" DROP alias');
        $this->addSql('ALTER TABLE "user" DROP image_profil');
    }
}
