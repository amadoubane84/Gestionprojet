<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525153204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi ADD brochure_file_name VARCHAR(255) DEFAULT NULL, ADD brochure_file_name1 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name2 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name3 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name4 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name5 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name6 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name7 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name8 VARCHAR(255) DEFAULT NULL, ADD brochure_file_name9 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi DROP brochure_file_name, DROP brochure_file_name1, DROP brochure_file_name2, DROP brochure_file_name3, DROP brochure_file_name4, DROP brochure_file_name5, DROP brochure_file_name6, DROP brochure_file_name7, DROP brochure_file_name8, DROP brochure_file_name9');
    }
}
