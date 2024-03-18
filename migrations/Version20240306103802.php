<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306103802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract_type ADD employment_type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE job_offer ADD employment_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E1BCDC34A FOREIGN KEY (employment_type_id) REFERENCES contract_type (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E1BCDC34A ON job_offer (employment_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E1BCDC34A');
        $this->addSql('DROP INDEX IDX_288A3A4E1BCDC34A ON job_offer');
        $this->addSql('ALTER TABLE job_offer DROP employment_type_id');
        $this->addSql('ALTER TABLE contract_type DROP employment_type');
    }
}
