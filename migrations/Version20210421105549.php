<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421105549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aps (id INT AUTO_INCREMENT NOT NULL, nomprojet_id INT NOT NULL, dateaps DATE DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, fileaps VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_50672175BB4B029B (nomprojet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aps ADD CONSTRAINT FK_50672175BB4B029B FOREIGN KEY (nomprojet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE aps');
    }
}
