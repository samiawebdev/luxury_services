<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240314084312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL, CHANGE current_location current_location VARCHAR(255) NOT NULL, CHANGE place_of_birth place_of_birth VARCHAR(255) NOT NULL, CHANGE short_description short_description LONGTEXT NOT NULL, CHANGE nationality nationality VARCHAR(255) NOT NULL, CHANGE is_passport_valid is_passport_valid TINYINT(1) NOT NULL, CHANGE birth_at birth_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE is_available is_available TINYINT(1) NOT NULL, CHANGE notes notes VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE nationality nationality VARCHAR(255) DEFAULT NULL, CHANGE is_passport_valid is_passport_valid TINYINT(1) DEFAULT NULL, CHANGE current_location current_location VARCHAR(255) DEFAULT NULL, CHANGE birth_at birth_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE place_of_birth place_of_birth VARCHAR(255) DEFAULT NULL, CHANGE is_available is_available TINYINT(1) DEFAULT NULL, CHANGE short_description short_description LONGTEXT DEFAULT NULL, CHANGE notes notes VARCHAR(255) DEFAULT NULL');
    }
}
