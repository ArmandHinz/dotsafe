<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207082704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation between technologies and projets';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE technologies_projets (technologie_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_EF173F24261A27D2 (technologie_id), INDEX IDX_EF173F24C18272 (projet_id), PRIMARY KEY(technologie_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE technologies_projets ADD CONSTRAINT FK_EF173F24261A27D2 FOREIGN KEY (technologie_id) REFERENCES `technologie` (id)');
        $this->addSql('ALTER TABLE technologies_projets ADD CONSTRAINT FK_EF173F24C18272 FOREIGN KEY (projet_id) REFERENCES `projet` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technologies_projets DROP FOREIGN KEY FK_EF173F24261A27D2');
        $this->addSql('ALTER TABLE technologies_projets DROP FOREIGN KEY FK_EF173F24C18272');
        $this->addSql('DROP TABLE technologies_projets');
    }
}
