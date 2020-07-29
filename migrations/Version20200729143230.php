<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200729143230 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1CEDAAFD6');
        $this->addSql('DROP INDEX IDX_B50A2CB1CEDAAFD6 ON competition');
        $this->addSql('ALTER TABLE competition DROP competition_inscrit_id');
        $this->addSql('ALTER TABLE competition_inscrit ADD competition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competition_inscrit ADD CONSTRAINT FK_8DCA63CB7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_8DCA63CB7B39D312 ON competition_inscrit (competition_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition ADD competition_inscrit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1CEDAAFD6 FOREIGN KEY (competition_inscrit_id) REFERENCES competition_inscrit (id)');
        $this->addSql('CREATE INDEX IDX_B50A2CB1CEDAAFD6 ON competition (competition_inscrit_id)');
        $this->addSql('ALTER TABLE competition_inscrit DROP FOREIGN KEY FK_8DCA63CB7B39D312');
        $this->addSql('DROP INDEX IDX_8DCA63CB7B39D312 ON competition_inscrit');
        $this->addSql('ALTER TABLE competition_inscrit DROP competition_id');
    }
}
