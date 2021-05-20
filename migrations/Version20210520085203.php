<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520085203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rmensuel (id INT AUTO_INCREMENT NOT NULL, nomprojet_id INT NOT NULL, brochure_file_name VARCHAR(255) DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_6833243CBB4B029B (nomprojet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rmensuel ADD CONSTRAINT FK_6833243CBB4B029B FOREIGN KEY (nomprojet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rmensuel');
    }
}
