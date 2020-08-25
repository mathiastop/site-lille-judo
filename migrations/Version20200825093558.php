<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200825093558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_club_document (id INT AUTO_INCREMENT NOT NULL, post_club_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C4A39ECC5CF1BD01 (post_club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_natio_document (id INT AUTO_INCREMENT NOT NULL, post_natio_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_FDA006A6CCBB028C (post_natio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_club_document ADD CONSTRAINT FK_C4A39ECC5CF1BD01 FOREIGN KEY (post_club_id) REFERENCES post_club (id)');
        $this->addSql('ALTER TABLE post_natio_document ADD CONSTRAINT FK_FDA006A6CCBB028C FOREIGN KEY (post_natio_id) REFERENCES post_natio (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE post_club_document');
        $this->addSql('DROP TABLE post_natio_document');
    }
}
