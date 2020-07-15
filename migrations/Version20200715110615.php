<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200715110615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participates ADD person_id INT DEFAULT NULL, ADD meet_up_id INT NOT NULL, ADD booking_places INT NOT NULL, ADD available_places INT NOT NULL');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_33017524217BBB47 FOREIGN KEY (person_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_330175246F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id)');
        $this->addSql('CREATE INDEX IDX_33017524217BBB47 ON participates (person_id)');
        $this->addSql('CREATE INDEX IDX_330175246F9E1099 ON participates (meet_up_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_33017524217BBB47');
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_330175246F9E1099');
        $this->addSql('DROP INDEX IDX_33017524217BBB47 ON participates');
        $this->addSql('DROP INDEX IDX_330175246F9E1099 ON participates');
        $this->addSql('ALTER TABLE participates DROP person_id, DROP meet_up_id, DROP booking_places, DROP available_places');
    }
}
