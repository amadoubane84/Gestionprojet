<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506093315 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aps ADD titreprojet_id INT NOT NULL');
        $this->addSql('ALTER TABLE aps ADD CONSTRAINT FK_50672175FB1A9D7E FOREIGN KEY (titreprojet_id) REFERENCES projet (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50672175FB1A9D7E ON aps (titreprojet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aps DROP FOREIGN KEY FK_50672175FB1A9D7E');
        $this->addSql('DROP INDEX UNIQ_50672175FB1A9D7E ON aps');
        $this->addSql('ALTER TABLE aps DROP titreprojet_id');
    }
}
