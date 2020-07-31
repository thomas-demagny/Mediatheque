<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731125050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE meet_up_product');
        $this->addSql('ALTER TABLE meet_up ADD organizer_id INT NOT NULL, ADD title VARCHAR(255) NOT NULL, ADD max_places INT NOT NULL, ADD booked_places INT NOT NULL');
        $this->addSql('ALTER TABLE meet_up ADD CONSTRAINT FK_FF163646876C4DDA FOREIGN KEY (organizer_id) REFERENCES employee (id)');
        $this->addSql('CREATE INDEX IDX_FF163646876C4DDA ON meet_up (organizer_id)');
        $this->addSql('ALTER TABLE meet_up_creator MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E476169A4AA658');
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E476166F9E1099');
        $this->addSql('DROP INDEX IDX_F3E476169A4AA658 ON meet_up_creator');
        $this->addSql('ALTER TABLE meet_up_creator DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE meet_up_creator DROP id, CHANGE meet_up_id meet_up_id INT NOT NULL, CHANGE guest_id creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E4761661220EA6 FOREIGN KEY (creator_id) REFERENCES creator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476166F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_F3E4761661220EA6 ON meet_up_creator (creator_id)');
        $this->addSql('ALTER TABLE meet_up_creator ADD PRIMARY KEY (meet_up_id, creator_id)');
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_33017524BF396750');
        $this->addSql('ALTER TABLE participates DROP booking_places, DROP available_places, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE meet_up_id meet_up_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD label VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE meet_up_product (meet_up_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_9CA898D84584665A (product_id), INDEX IDX_9CA898D86F9E1099 (meet_up_id), PRIMARY KEY(meet_up_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE meet_up_product ADD CONSTRAINT FK_9CA898D84584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meet_up_product ADD CONSTRAINT FK_9CA898D86F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meet_up DROP FOREIGN KEY FK_FF163646876C4DDA');
        $this->addSql('DROP INDEX IDX_FF163646876C4DDA ON meet_up');
        $this->addSql('ALTER TABLE meet_up DROP organizer_id, DROP title, DROP max_places, DROP booked_places');
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E4761661220EA6');
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E476166F9E1099');
        $this->addSql('DROP INDEX IDX_F3E4761661220EA6 ON meet_up_creator');
        $this->addSql('ALTER TABLE meet_up_creator ADD id INT AUTO_INCREMENT NOT NULL, CHANGE meet_up_id meet_up_id INT DEFAULT NULL, CHANGE creator_id guest_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476169A4AA658 FOREIGN KEY (guest_id) REFERENCES creator (id)');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476166F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id)');
        $this->addSql('CREATE INDEX IDX_F3E476169A4AA658 ON meet_up_creator (guest_id)');
        $this->addSql('ALTER TABLE participates ADD booking_places INT NOT NULL, ADD available_places INT NOT NULL, CHANGE id id INT NOT NULL, CHANGE meet_up_id meet_up_id INT NOT NULL');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_33017524BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role DROP label');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
    }
}
