<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200717130810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, pages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE audio_book CHANGE duration duration TIME NOT NULL');
        $this->addSql('ALTER TABLE borrowing CHANGE start_date start_date DATE NOT NULL, CHANGE expected_return_date expected_return_date DATE NOT NULL, CHANGE effective_return_date effective_return_date DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book');
        $this->addSql('ALTER TABLE audio_book CHANGE duration duration DATETIME NOT NULL');
        $this->addSql('ALTER TABLE borrowing CHANGE start_date start_date DATETIME NOT NULL, CHANGE expected_return_date expected_return_date DATETIME NOT NULL, CHANGE effective_return_date effective_return_date DATETIME NOT NULL');
    }
}
