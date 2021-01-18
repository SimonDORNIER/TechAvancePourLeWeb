<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118081740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Création de la tablle Cake et Ingredient';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cake (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, is_sweet BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cake_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, is_allergene BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_6BAF78709F8008B6 ON ingredient (cake_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cake');
        $this->addSql('DROP TABLE ingredient');
    }
}
