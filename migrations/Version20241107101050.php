<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241107101050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chat ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cheval ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chien ADD description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chat DROP description');
        $this->addSql('ALTER TABLE cheval DROP description');
        $this->addSql('ALTER TABLE chien DROP description');
    }
}
