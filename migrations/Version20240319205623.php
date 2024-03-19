<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240319205623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE income_type (id INT AUTO_INCREMENT NOT NULL, income_type_user_id INT NOT NULL, income_type_name VARCHAR(255) NOT NULL, INDEX IDX_469441076ADBBC80 (income_type_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE income_type ADD CONSTRAINT FK_469441076ADBBC80 FOREIGN KEY (income_type_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE income_type DROP FOREIGN KEY FK_469441076ADBBC80');
        $this->addSql('DROP TABLE income_type');
    }
}
