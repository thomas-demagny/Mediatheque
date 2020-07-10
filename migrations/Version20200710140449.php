<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710140449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meet_up (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meet_up_creator (id INT AUTO_INCREMENT NOT NULL, guest_id INT NOT NULL, meet_up_id INT DEFAULT NULL, INDEX IDX_F3E476169A4AA658 (guest_id), INDEX IDX_F3E476166F9E1099 (meet_up_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meet_up_product (meet_up_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_9CA898D86F9E1099 (meet_up_id), INDEX IDX_9CA898D84584665A (product_id), PRIMARY KEY(meet_up_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476169A4AA658 FOREIGN KEY (guest_id) REFERENCES creator (id)');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476166F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id)');
        $this->addSql('ALTER TABLE meet_up_product ADD CONSTRAINT FK_9CA898D86F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meet_up_product ADD CONSTRAINT FK_9CA898D84584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE artist');
        $this->addSql('ALTER TABLE creator CHANGE birthdate birth_date DATE NOT NULL, CHANGE deat_date death_date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meet_up_product DROP FOREIGN KEY FK_9CA898D86F9E1099');
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E476166F9E1099');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, designation VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE meet_up');
        $this->addSql('DROP TABLE meet_up_product');
        $this->addSql('DROP TABLE meet_up_creator');
        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE creator CHANGE birth_date birthdate DATE NOT NULL, CHANGE death_date deat_date DATETIME DEFAULT NULL');
    }
}
