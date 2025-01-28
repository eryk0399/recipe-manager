<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250128121922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredients (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, recipe_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, amount VARCHAR(255) NOT NULL, CONSTRAINT FK_4B60114F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipes (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_4B60114F59D8A214 ON ingredients (recipe_id)');
        $this->addSql('CREATE TABLE recipes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, instructions CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('DROP TABLE recipe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE "BINARY", instructions CLOB DEFAULT NULL COLLATE "BINARY" --(DC2Type:array)
        )');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE recipes');
    }
}
