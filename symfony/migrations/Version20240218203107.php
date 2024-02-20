<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240218203107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE todo ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE todo ALTER done SET NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE todo_id_seq');
        $this->addSql('SELECT setval(\'todo_id_seq\', (SELECT MAX(id) FROM todo))');
        $this->addSql('ALTER TABLE todo ALTER id SET DEFAULT nextval(\'todo_id_seq\')');
        $this->addSql('ALTER TABLE todo ALTER done DROP NOT NULL');
    }
}
