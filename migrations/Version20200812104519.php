<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812104519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4D60322AC');
        $this->addSql('DROP TABLE bureau_role');
        $this->addSql('DROP INDEX UNIQ_166FDEC4D60322AC ON bureau');
        $this->addSql('ALTER TABLE bureau DROP role_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bureau_role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bureau ADD role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4D60322AC FOREIGN KEY (role_id) REFERENCES bureau_role (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_166FDEC4D60322AC ON bureau (role_id)');
    }
}
