<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217094218 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, thekey VARCHAR(255) DEFAULT NULL, place_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, alt_names VARCHAR(255) DEFAULT NULL, pop VARCHAR(255) DEFAULT NULL, area VARCHAR(255) DEFAULT NULL, continent_id INT DEFAULT NULL, country_id INT DEFAULT NULL, net VARCHAR(255) DEFAULT NULL, wikipedia VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, thekey VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, born_at DATETIME DEFAULT NULL, city_id INT DEFAULT NULL, region_id INT DEFAULT NULL, country_id INT DEFAULT NULL, nationality_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, thekey VARCHAR(10) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, title2 VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, country_id INT DEFAULT NULL, city_id INT DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE team MODIFY thekey VARCHAR(255)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE team');
    }
}
