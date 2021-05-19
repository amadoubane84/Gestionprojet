<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421121313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, nomprojet_id INT NOT NULL, nomsite VARCHAR(255) NOT NULL, lieusite VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, contact INT DEFAULT NULL, UNIQUE INDEX UNIQ_694309E4BB4B029B (nomprojet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4BB4B029B FOREIGN KEY (nomprojet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE site');
    }
}
