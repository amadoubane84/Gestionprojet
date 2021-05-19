<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421131033 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9F6BD1646');
        $this->addSql('DROP INDEX UNIQ_50159CA9F6BD1646 ON projet');
        $this->addSql('ALTER TABLE projet ADD site INT NOT NULL, DROP site_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD site_id INT DEFAULT NULL, DROP site');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9F6BD1646 FOREIGN KEY (site_id) REFERENCES projet (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50159CA9F6BD1646 ON projet (site_id)');
    }
}
