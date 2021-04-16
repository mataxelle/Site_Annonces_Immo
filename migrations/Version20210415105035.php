<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415105035 extends AbstractMigration
{
    public function getDescription() : string  // description de la migration
    {
        return 'Create properties table';
    }

    public function up(Schema $schema) : void    // méthode exécutée lorsque l'on fait une migration
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE properties (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price INT NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void   // méthode exécutée lorsque l'on annule une migration
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE properties');
    }
}
