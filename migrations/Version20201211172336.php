<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211172336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, poster VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_5373C96698260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travel (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, theme_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, description VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, price SMALLINT NOT NULL, days SMALLINT NOT NULL, INDEX IDX_2D0B6BCEF92F3E70 (country_id), INDEX IDX_2D0B6BCE59027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C96698260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCEF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCE59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCEF92F3E70');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C96698260155');
        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCE59027487');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE travel');
    }
}
