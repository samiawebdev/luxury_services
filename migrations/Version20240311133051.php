<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240311133051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE catogory (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, job_title VARCHAR(255) NOT NULL, job_location VARCHAR(255) NOT NULL, closing_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', salary INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E1BCDC34A');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE job_category');
        $this->addSql('DROP TABLE contract_type');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E444AF29A35');
        $this->addSql('DROP INDEX UNIQ_C8B28E444AF29A35 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD nationality VARCHAR(255) NOT NULL, ADD is_passport_valid TINYINT(1) NOT NULL, ADD birth_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD is_available TINYINT(1) NOT NULL, ADD notes VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD deleted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP phone_number, DROP date_of_birth, DROP availability_date, CHANGE short_description short_description LONGTEXT NOT NULL, CHANGE curriculum_vitae_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E44A76ED395 ON candidate (user_id)');
        $this->addSql('ALTER TABLE client ADD compagny_name VARCHAR(255) NOT NULL, ADD type_of_activity VARCHAR(255) NOT NULL, ADD contact_number VARCHAR(255) NOT NULL, ADD notes LONGTEXT NOT NULL, DROP society_name, DROP contact_phone, DROP created_at, DROP note');
        $this->addSql('ALTER TABLE experience CHANGE experience_duration name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gender CHANGE sex name VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, employment_type_id INT NOT NULL, offer_title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, reference_number INT NOT NULL, salary INT NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', closing_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', start_date_employment DATETIME NOT NULL, profession VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_288A3A4E1BCDC34A (employment_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE job_category (id INT AUTO_INCREMENT NOT NULL, field_of_activity VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contract_type (id INT AUTO_INCREMENT NOT NULL, employment_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E1BCDC34A FOREIGN KEY (employment_type_id) REFERENCES contract_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE catogory');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE type');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('DROP INDEX UNIQ_C8B28E44A76ED395 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD phone_number VARCHAR(255) DEFAULT NULL, ADD date_of_birth DATETIME NOT NULL, ADD availability_date DATETIME NOT NULL, DROP nationality, DROP is_passport_valid, DROP birth_at, DROP is_available, DROP notes, DROP created_at, DROP updated_at, DROP deleted_at, CHANGE short_description short_description VARCHAR(255) NOT NULL, CHANGE user_id curriculum_vitae_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E444AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E444AF29A35 ON candidate (curriculum_vitae_id)');
        $this->addSql('ALTER TABLE gender CHANGE name sex VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD society_name VARCHAR(255) NOT NULL, ADD contact_phone INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD note VARCHAR(255) NOT NULL, DROP compagny_name, DROP type_of_activity, DROP contact_number, DROP notes');
        $this->addSql('ALTER TABLE experience CHANGE name experience_duration VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }
}
