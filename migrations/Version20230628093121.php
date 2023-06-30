<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628093121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C6A99F74A');
        $this->addSql('DROP INDEX IDX_9474526C6A99F74A ON comment');
        $this->addSql('ALTER TABLE comment ADD categorie VARCHAR(50) DEFAULT NULL, DROP membre_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD membre_id INT DEFAULT NULL, DROP categorie');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9474526C6A99F74A ON comment (membre_id)');
    }
}
