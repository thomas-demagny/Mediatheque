<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722151449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE is_involved_in (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, creator_id INT NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_D90AEDB74584665A (product_id), INDEX IDX_D90AEDB761220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE is_involved_in ADD CONSTRAINT FK_D90AEDB74584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE is_involved_in ADD CONSTRAINT FK_D90AEDB761220EA6 FOREIGN KEY (creator_id) REFERENCES creator (id)');
        $this->addSql('ALTER TABLE book CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331BF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE borrowing CHANGE start_date start_date DATE NOT NULL, CHANGE expected_return_date expected_return_date DATE NOT NULL, CHANGE effective_return_date effective_return_date DATE NOT NULL');
        $this->addSql('ALTER TABLE dvd ADD duration TIME NOT NULL');
        $this->addSql('ALTER TABLE ebook ADD pages INT NOT NULL');
        $this->addSql('ALTER TABLE employee CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member DROP membership_date, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE is_involved_in');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331BF396750');
        $this->addSql('ALTER TABLE book CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE borrowing CHANGE start_date start_date DATETIME NOT NULL, CHANGE expected_return_date expected_return_date DATETIME NOT NULL, CHANGE effective_return_date effective_return_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE dvd DROP duration');
        $this->addSql('ALTER TABLE ebook DROP pages');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1BF396750');
        $this->addSql('ALTER TABLE employee CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78BF396750');
        $this->addSql('ALTER TABLE member ADD membership_date DATETIME NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
