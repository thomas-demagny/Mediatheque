<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200717123027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE product_creator');
        $this->addSql('ALTER TABLE cd CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE cd ADD CONSTRAINT FK_45D68FDABF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dvd DROP FOREIGN KEY dvd_ibfk_1');
        $this->addSql('ALTER TABLE dvd CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE dvd ADD CONSTRAINT FK_8325C1DFBF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ebook DROP FOREIGN KEY ebook_ibfk_1');
        $this->addSql('ALTER TABLE ebook CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE ebook ADD CONSTRAINT FK_7D51730DBF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE journal DROP FOREIGN KEY journal_ibfk_1');
        $this->addSql('ALTER TABLE journal CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE journal ADD CONSTRAINT FK_C1A7E74DBF396750 FOREIGN KEY (id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_creator (product_id INT NOT NULL, creator_id INT NOT NULL, INDEX IDX_6DDFF1D34584665A (product_id), INDEX IDX_6DDFF1D361220EA6 (creator_id), PRIMARY KEY(product_id, creator_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, pages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product_creator ADD CONSTRAINT FK_6DDFF1D34584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_creator ADD CONSTRAINT FK_6DDFF1D361220EA6 FOREIGN KEY (creator_id) REFERENCES creator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cd DROP FOREIGN KEY FK_45D68FDABF396750');
        $this->addSql('ALTER TABLE cd CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE dvd DROP FOREIGN KEY FK_8325C1DFBF396750');
        $this->addSql('ALTER TABLE dvd CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE dvd ADD CONSTRAINT dvd_ibfk_1 FOREIGN KEY (id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE ebook DROP FOREIGN KEY FK_7D51730DBF396750');
        $this->addSql('ALTER TABLE ebook CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ebook ADD CONSTRAINT ebook_ibfk_1 FOREIGN KEY (id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE journal DROP FOREIGN KEY FK_C1A7E74DBF396750');
        $this->addSql('ALTER TABLE journal CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE journal ADD CONSTRAINT journal_ibfk_1 FOREIGN KEY (id) REFERENCES product (id)');
    }
}
