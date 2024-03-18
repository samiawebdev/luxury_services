<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306102348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract_type DROP FOREIGN KEY FK_E4AB19411BCDC34A');
        $this->addSql('DROP INDEX IDX_E4AB19411BCDC34A ON contract_type');
        $this->addSql('ALTER TABLE contract_type DROP employment_type_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract_type ADD employment_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE contract_type ADD CONSTRAINT FK_E4AB19411BCDC34A FOREIGN KEY (employment_type_id) REFERENCES candidate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E4AB19411BCDC34A ON contract_type (employment_type_id)');
    }
}
