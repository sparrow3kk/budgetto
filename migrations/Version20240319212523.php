<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240319212523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense_type (id INT AUTO_INCREMENT NOT NULL, expense_type_user_id INT NOT NULL, expense_type_name VARCHAR(255) NOT NULL, INDEX IDX_3879194BE8EB9A00 (expense_type_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense_type ADD CONSTRAINT FK_3879194BE8EB9A00 FOREIGN KEY (expense_type_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_type DROP FOREIGN KEY FK_3879194BE8EB9A00');
        $this->addSql('DROP TABLE expense_type');
    }
}
