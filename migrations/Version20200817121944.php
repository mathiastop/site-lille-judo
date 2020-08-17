<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200817121944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bureau ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE competition ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE documents_utiles ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE dojo ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE gallery ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE historique_club ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE historique_enseignement ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE historique_personnalites ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE historique_presidents ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE ju_jitsu_cours ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE judo_cours ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE ne_waza_cours ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE photos_passages_grades ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE post_club ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE post_natio ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE professeurs ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE taiso_cours ADD enabled TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bureau DROP enabled');
        $this->addSql('ALTER TABLE competition DROP enabled');
        $this->addSql('ALTER TABLE documents_utiles DROP enabled');
        $this->addSql('ALTER TABLE dojo DROP enabled');
        $this->addSql('ALTER TABLE evenement DROP enabled');
        $this->addSql('ALTER TABLE gallery DROP enabled');
        $this->addSql('ALTER TABLE historique_club DROP enabled');
        $this->addSql('ALTER TABLE historique_enseignement DROP enabled');
        $this->addSql('ALTER TABLE historique_personnalites DROP enabled');
        $this->addSql('ALTER TABLE historique_presidents DROP enabled');
        $this->addSql('ALTER TABLE ju_jitsu_cours DROP enabled');
        $this->addSql('ALTER TABLE judo_cours DROP enabled');
        $this->addSql('ALTER TABLE ne_waza_cours DROP enabled');
        $this->addSql('ALTER TABLE photos_passages_grades DROP enabled');
        $this->addSql('ALTER TABLE post_club DROP enabled');
        $this->addSql('ALTER TABLE post_natio DROP enabled');
        $this->addSql('ALTER TABLE professeurs DROP enabled');
        $this->addSql('ALTER TABLE taiso_cours DROP enabled');
    }
}
