<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240312090615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application_candidate (application_id INT NOT NULL, candidate_id INT NOT NULL, INDEX IDX_4CB3F4453E030ACD (application_id), INDEX IDX_4CB3F44591BD8781 (candidate_id), PRIMARY KEY(application_id, candidate_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application_candidate ADD CONSTRAINT FK_4CB3F4453E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application_candidate ADD CONSTRAINT FK_4CB3F44591BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application ADD offer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A45BDDC153C674EE ON application (offer_id)');
        $this->addSql('ALTER TABLE candidate ADD gender_id INT NOT NULL, ADD experience_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL, ADD passport_file_id INT DEFAULT NULL, ADD curriculum_vitae_id INT DEFAULT NULL, ADD profil_picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44631C839D FOREIGN KEY (passport_file_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E444AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44D583E641 FOREIGN KEY (profil_picture_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44708A0E0 ON candidate (gender_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4446E90E27 ON candidate (experience_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4412469DE2 ON candidate (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E44631C839D ON candidate (passport_file_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E444AF29A35 ON candidate (curriculum_vitae_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E44D583E641 ON candidate (profil_picture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application_candidate DROP FOREIGN KEY FK_4CB3F4453E030ACD');
        $this->addSql('ALTER TABLE application_candidate DROP FOREIGN KEY FK_4CB3F44591BD8781');
        $this->addSql('DROP TABLE application_candidate');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC153C674EE');
        $this->addSql('DROP INDEX UNIQ_A45BDDC153C674EE ON application');
        $this->addSql('ALTER TABLE application DROP offer_id');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44708A0E0');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4412469DE2');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44631C839D');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E444AF29A35');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44D583E641');
        $this->addSql('DROP INDEX IDX_C8B28E44708A0E0 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4446E90E27 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4412469DE2 ON candidate');
        $this->addSql('DROP INDEX UNIQ_C8B28E44631C839D ON candidate');
        $this->addSql('DROP INDEX UNIQ_C8B28E444AF29A35 ON candidate');
        $this->addSql('DROP INDEX UNIQ_C8B28E44D583E641 ON candidate');
        $this->addSql('ALTER TABLE candidate DROP gender_id, DROP experience_id, DROP category_id, DROP passport_file_id, DROP curriculum_vitae_id, DROP profil_picture_id');
    }
}
