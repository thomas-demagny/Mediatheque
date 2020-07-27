<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200716105507 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nick_name VARCHAR(255) NOT NULL, passwd VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resources (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(150) NOT NULL, stock INT NOT NULL, title VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, product_code INT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, membership_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meet_up (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participates (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, meet_up_id INT NOT NULL, booking_places INT NOT NULL, available_places INT NOT NULL, INDEX IDX_33017524217BBB47 (person_id), INDEX IDX_330175246F9E1099 (meet_up_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meet_up_product (meet_up_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_9CA898D86F9E1099 (meet_up_id), INDEX IDX_9CA898D84584665A (product_id), PRIMARY KEY(meet_up_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, periodicity VARCHAR(255) NOT NULL, subscription_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, organizes_id INT DEFAULT NULL, INDEX IDX_5D9F75A13FD02ABF (organizes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, maintainer_id INT DEFAULT NULL, product_id INT DEFAULT NULL, status VARCHAR(70) NOT NULL, maintenance_date DATETIME NOT NULL, INDEX IDX_2F84F8E985D19953 (maintainer_id), INDEX IDX_2F84F8E94584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ebook (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dvd (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creator (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(40) NOT NULL, last_name VARCHAR(50) NOT NULL, birth_date DATE NOT NULL, death_date DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meet_up_creator (id INT AUTO_INCREMENT NOT NULL, guest_id INT NOT NULL, meet_up_id INT DEFAULT NULL, INDEX IDX_F3E476169A4AA658 (guest_id), INDEX IDX_F3E476166F9E1099 (meet_up_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cd (id INT AUTO_INCREMENT NOT NULL, plages INT NOT NULL, duration TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrowing (id INT AUTO_INCREMENT NOT NULL, borrower_id INT NOT NULL, document_id INT NOT NULL, start_date DATETIME NOT NULL, expected_return_date DATETIME NOT NULL, effective_return_date DATETIME NOT NULL, INDEX IDX_226E589711CE312B (borrower_id), INDEX IDX_226E5897C33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, pages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audio_book (id INT AUTO_INCREMENT NOT NULL, duration TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_33017524217BBB47 FOREIGN KEY (person_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participates ADD CONSTRAINT FK_330175246F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id)');
        $this->addSql('ALTER TABLE meet_up_product ADD CONSTRAINT FK_9CA898D86F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meet_up_product ADD CONSTRAINT FK_9CA898D84584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A13FD02ABF FOREIGN KEY (organizes_id) REFERENCES meet_up (id)');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E985D19953 FOREIGN KEY (maintainer_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E94584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476169A4AA658 FOREIGN KEY (guest_id) REFERENCES creator (id)');
        $this->addSql('ALTER TABLE meet_up_creator ADD CONSTRAINT FK_F3E476166F9E1099 FOREIGN KEY (meet_up_id) REFERENCES meet_up (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E589711CE312B FOREIGN KEY (borrower_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE borrowing ADD CONSTRAINT FK_226E5897C33F7837 FOREIGN KEY (document_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E476169A4AA658');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E985D19953');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A13FD02ABF');
        $this->addSql('ALTER TABLE meet_up_product DROP FOREIGN KEY FK_9CA898D86F9E1099');
        $this->addSql('ALTER TABLE meet_up_creator DROP FOREIGN KEY FK_F3E476166F9E1099');
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_330175246F9E1099');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E589711CE312B');
        $this->addSql('ALTER TABLE borrowing DROP FOREIGN KEY FK_226E5897C33F7837');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E94584665A');
        $this->addSql('ALTER TABLE meet_up_product DROP FOREIGN KEY FK_9CA898D84584665A');
        $this->addSql('ALTER TABLE participates DROP FOREIGN KEY FK_33017524217BBB47');
        $this->addSql('DROP TABLE audio_book');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE borrowing');
        $this->addSql('DROP TABLE cd');
        $this->addSql('DROP TABLE creator');
        $this->addSql('DROP TABLE dvd');
        $this->addSql('DROP TABLE ebook');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('DROP TABLE meet_up');
        $this->addSql('DROP TABLE meet_up_product');
        $this->addSql('DROP TABLE meet_up_creator');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE participates');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE resources');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
    }
}
