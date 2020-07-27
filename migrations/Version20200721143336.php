<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721143336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331BF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dvd ADD duration TIME NOT NULL');
        $this->addSql('ALTER TABLE ebook ADD pages INT NOT NULL');
        $this->addSql('ALTER TABLE member DROP membership_date');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331BF396750');
        $this->addSql('ALTER TABLE book CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE dvd DROP duration');
        $this->addSql('ALTER TABLE ebook DROP pages');
        $this->addSql('ALTER TABLE member ADD membership_date DATETIME NOT NULL');
    }
}
