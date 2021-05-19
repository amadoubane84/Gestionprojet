<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422125921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aps DROP INDEX UNIQ_50672175BB4B029B, ADD INDEX IDX_50672175BB4B029B (nomprojet_id)');
        $this->addSql('ALTER TABLE aps CHANGE nomprojet_id nomprojet_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aps DROP INDEX IDX_50672175BB4B029B, ADD UNIQUE INDEX UNIQ_50672175BB4B029B (nomprojet_id)');
        $this->addSql('ALTER TABLE aps CHANGE nomprojet_id nomprojet_id INT NOT NULL');
    }
}
