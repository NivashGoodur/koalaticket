<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222103451 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE config (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, staff_name VARCHAR(255) DEFAULT NULL, is_set TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, staff_id INT NOT NULL, ticket_id INT NOT NULL, owner_id INT NOT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_8A8E26E9D4D57CD (staff_id), UNIQUE INDEX UNIQ_8A8E26E9700047D2 (ticket_id), INDEX IDX_8A8E26E97E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, ticket_target_id INT NOT NULL, author_id INT NOT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_B6BD307F8FB4D12C (ticket_target_id), INDEX IDX_B6BD307FF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, title VARCHAR(50) NOT NULL, content LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, update_time DATETIME NOT NULL, statement VARCHAR(50) NOT NULL, level VARCHAR(10) NOT NULL, department VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_97A0ADA3989D9B62 (slug), INDEX IDX_97A0ADA37E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, last_connexion DATETIME NOT NULL, suspended TINYINT(1) NOT NULL, picture LONGTEXT DEFAULT NULL, nightmode VARCHAR(100) DEFAULT NULL, address LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9D4D57CD FOREIGN KEY (staff_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E97E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8FB4D12C FOREIGN KEY (ticket_target_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA37E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9700047D2');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8FB4D12C');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9D4D57CD');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E97E3C61F9');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF675F31B');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA37E3C61F9');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE config');
        $this->addSql('DROP TABLE conversation');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE `user`');
    }
}
