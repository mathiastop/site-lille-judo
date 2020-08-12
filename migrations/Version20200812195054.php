<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812195054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ju_jitsu_cours ADD ordre INT NOT NULL');
        $this->addSql('ALTER TABLE judo_cours ADD ordre INT NOT NULL');
        $this->addSql('ALTER TABLE ne_waza_cours ADD ordre INT NOT NULL');
        $this->addSql('ALTER TABLE taiso_cours ADD ordre INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ju_jitsu_cours DROP ordre');
        $this->addSql('ALTER TABLE judo_cours DROP ordre');
        $this->addSql('ALTER TABLE ne_waza_cours DROP ordre');
        $this->addSql('ALTER TABLE taiso_cours DROP ordre');
    }
}
