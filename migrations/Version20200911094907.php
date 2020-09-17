<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200911094907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taiso_cours (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeurs (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, role VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, grade VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_natio (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_natio_image (id INT AUTO_INCREMENT NOT NULL, post_natio_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5A92B596CCBB028C (post_natio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_natio_document (id INT AUTO_INCREMENT NOT NULL, post_natio_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_FDA006A6CCBB028C (post_natio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_club (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_club_image (id INT AUTO_INCREMENT NOT NULL, post_club_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_462B272C5CF1BD01 (post_club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_club_document (id INT AUTO_INCREMENT NOT NULL, post_club_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C4A39ECC5CF1BD01 (post_club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos_passages_grades (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE palmares (id INT AUTO_INCREMENT NOT NULL, annee INT NOT NULL, texte LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ne_waza_cours (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE judo_cours (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ju_jitsu_cours (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_pendant_texte (id INT AUTO_INCREMENT NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_pendant_photo (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_pendant_document (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_pendant_categorie (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_avant_texte (id INT AUTO_INCREMENT NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_avant_photo (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_avant_document (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_avant_categorie (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_apres_texte (id INT AUTO_INCREMENT NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_apres_photo (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_apres_document (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_apres_categorie (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_presidents (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, annee INT NOT NULL, texte LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_personnalites (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_enseignement (id INT AUTO_INCREMENT NOT NULL, texte LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_club (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, annee INT NOT NULL, texte LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery_image (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_21A0D47C4E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_inscription (id INT AUTO_INCREMENT NOT NULL, fiche VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_document (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, fiche VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, description LONGTEXT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dojo (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, annee VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documents_utiles (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, fiche VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, ordre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, sport VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, date DATE NOT NULL, enabled TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition_inscrit (id INT AUTO_INCREMENT NOT NULL, competition_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, poids INT NOT NULL, date_naissance DATE NOT NULL, prenom VARCHAR(255) NOT NULL, INDEX IDX_8DCA63CB7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition_document (id INT AUTO_INCREMENT NOT NULL, competition_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E918B1597B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bureau (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, ordre INT NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boutique_fiche (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, fiche VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boutique (id INT AUTO_INCREMENT NOT NULL, objet VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_natio_image ADD CONSTRAINT FK_5A92B596CCBB028C FOREIGN KEY (post_natio_id) REFERENCES post_natio (id)');
        $this->addSql('ALTER TABLE post_natio_document ADD CONSTRAINT FK_FDA006A6CCBB028C FOREIGN KEY (post_natio_id) REFERENCES post_natio (id)');
        $this->addSql('ALTER TABLE post_club_image ADD CONSTRAINT FK_462B272C5CF1BD01 FOREIGN KEY (post_club_id) REFERENCES post_club (id)');
        $this->addSql('ALTER TABLE post_club_document ADD CONSTRAINT FK_C4A39ECC5CF1BD01 FOREIGN KEY (post_club_id) REFERENCES post_club (id)');
        $this->addSql('ALTER TABLE gallery_image ADD CONSTRAINT FK_21A0D47C4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('ALTER TABLE competition_inscrit ADD CONSTRAINT FK_8DCA63CB7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE competition_document ADD CONSTRAINT FK_E918B1597B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition_document DROP FOREIGN KEY FK_E918B1597B39D312');
        $this->addSql('ALTER TABLE competition_inscrit DROP FOREIGN KEY FK_8DCA63CB7B39D312');
        $this->addSql('ALTER TABLE gallery_image DROP FOREIGN KEY FK_21A0D47C4E7AF8F');
        $this->addSql('ALTER TABLE post_club_document DROP FOREIGN KEY FK_C4A39ECC5CF1BD01');
        $this->addSql('ALTER TABLE post_club_image DROP FOREIGN KEY FK_462B272C5CF1BD01');
        $this->addSql('ALTER TABLE post_natio_document DROP FOREIGN KEY FK_FDA006A6CCBB028C');
        $this->addSql('ALTER TABLE post_natio_image DROP FOREIGN KEY FK_5A92B596CCBB028C');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('DROP TABLE boutique_fiche');
        $this->addSql('DROP TABLE bureau');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE competition_document');
        $this->addSql('DROP TABLE competition_inscrit');
        $this->addSql('DROP TABLE documents_utiles');
        $this->addSql('DROP TABLE dojo');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE evenement_document');
        $this->addSql('DROP TABLE fiche_inscription');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE gallery_image');
        $this->addSql('DROP TABLE historique_club');
        $this->addSql('DROP TABLE historique_enseignement');
        $this->addSql('DROP TABLE historique_personnalites');
        $this->addSql('DROP TABLE historique_presidents');
        $this->addSql('DROP TABLE inscription_apres_categorie');
        $this->addSql('DROP TABLE inscription_apres_document');
        $this->addSql('DROP TABLE inscription_apres_photo');
        $this->addSql('DROP TABLE inscription_apres_texte');
        $this->addSql('DROP TABLE inscription_avant_categorie');
        $this->addSql('DROP TABLE inscription_avant_document');
        $this->addSql('DROP TABLE inscription_avant_photo');
        $this->addSql('DROP TABLE inscription_avant_texte');
        $this->addSql('DROP TABLE inscription_pendant_categorie');
        $this->addSql('DROP TABLE inscription_pendant_document');
        $this->addSql('DROP TABLE inscription_pendant_photo');
        $this->addSql('DROP TABLE inscription_pendant_texte');
        $this->addSql('DROP TABLE ju_jitsu_cours');
        $this->addSql('DROP TABLE judo_cours');
        $this->addSql('DROP TABLE ne_waza_cours');
        $this->addSql('DROP TABLE palmares');
        $this->addSql('DROP TABLE photos_passages_grades');
        $this->addSql('DROP TABLE post_club');
        $this->addSql('DROP TABLE post_club_document');
        $this->addSql('DROP TABLE post_club_image');
        $this->addSql('DROP TABLE post_natio');
        $this->addSql('DROP TABLE post_natio_document');
        $this->addSql('DROP TABLE post_natio_image');
        $this->addSql('DROP TABLE professeurs');
        $this->addSql('DROP TABLE taiso_cours');
        $this->addSql('DROP TABLE user');
    }
}
