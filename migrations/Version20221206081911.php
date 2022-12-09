<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206081911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Make contribution relations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contribution ADD projet_id INT DEFAULT NULL, ADD technologie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contribution ADD CONSTRAINT FK_EA351E15C18272 FOREIGN KEY (projet_id) REFERENCES `projet` (id)');
        $this->addSql('ALTER TABLE contribution ADD CONSTRAINT FK_EA351E15261A27D2 FOREIGN KEY (technologie_id) REFERENCES `technologie` (id)');
        $this->addSql('CREATE INDEX IDX_EA351E15C18272 ON contribution (projet_id)');
        $this->addSql('CREATE INDEX IDX_EA351E15261A27D2 ON contribution (technologie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `contribution` DROP FOREIGN KEY FK_EA351E15C18272');
        $this->addSql('ALTER TABLE `contribution` DROP FOREIGN KEY FK_EA351E15261A27D2');
        $this->addSql('DROP INDEX IDX_EA351E15C18272 ON `contribution`');
        $this->addSql('DROP INDEX IDX_EA351E15261A27D2 ON `contribution`');
        $this->addSql('ALTER TABLE `contribution` DROP projet_id, DROP technologie_id');
    }
}
