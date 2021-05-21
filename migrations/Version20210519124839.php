<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519124839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE suivi (id INT AUTO_INCREMENT NOT NULL, reunion_de_demarrage VARCHAR(255) NOT NULL, contrat_de_travaux VARCHAR(255) DEFAULT NULL, ordre_de_service VARCHAR(255) DEFAULT NULL, implantation VARCHAR(255) DEFAULT NULL, dossiers_execution VARCHAR(255) DEFAULT NULL, pv_reception_provisoire VARCHAR(255) DEFAULT NULL, pv_levee_de_reserves VARCHAR(255) DEFAULT NULL, pv_reception_definitive VARCHAR(255) DEFAULT NULL, rapport_annuel VARCHAR(255) DEFAULT NULL, rapport_final VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE suivi');
    }
}
