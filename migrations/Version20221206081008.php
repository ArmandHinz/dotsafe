<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206081008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create many to one relation between membre and contribution';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contribution ADD membre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contribution ADD CONSTRAINT FK_EA351E156A99F74A FOREIGN KEY (membre_id) REFERENCES `membre` (id)');
        $this->addSql('CREATE INDEX IDX_EA351E156A99F74A ON contribution (membre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `contribution` DROP FOREIGN KEY FK_EA351E156A99F74A');
        $this->addSql('DROP INDEX IDX_EA351E156A99F74A ON `contribution`');
        $this->addSql('ALTER TABLE `contribution` DROP membre_id');
    }
}
