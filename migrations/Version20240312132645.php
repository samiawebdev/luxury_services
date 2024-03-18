<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240312132645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer ADD job_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E5FA33B08 FOREIGN KEY (job_type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E5FA33B08 ON offer (job_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E5FA33B08');
        $this->addSql('DROP INDEX IDX_29D6873E5FA33B08 ON offer');
        $this->addSql('ALTER TABLE offer DROP job_type_id');
    }
}
