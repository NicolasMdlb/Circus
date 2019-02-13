<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190213214907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE performance ADD performer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE performance ADD CONSTRAINT FK_82D796816C6B33F3 FOREIGN KEY (performer_id) REFERENCES performer (id)');
        $this->addSql('CREATE INDEX IDX_82D796816C6B33F3 ON performance (performer_id)');
        $this->addSql('ALTER TABLE performer CHANGE birthdate birthday DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE performance DROP FOREIGN KEY FK_82D796816C6B33F3');
        $this->addSql('DROP INDEX IDX_82D796816C6B33F3 ON performance');
        $this->addSql('ALTER TABLE performance DROP performer_id');
        $this->addSql('ALTER TABLE performer CHANGE birthday birthdate DATE DEFAULT NULL');
    }
}
