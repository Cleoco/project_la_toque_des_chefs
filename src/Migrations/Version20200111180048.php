<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200111180048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C8D566613');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B1378D566613');
        $this->addSql('DROP TABLE connexion');
        $this->addSql('DROP INDEX IDX_9474526C8D566613 ON comment');
        $this->addSql('ALTER TABLE comment DROP connexion_id');
        $this->addSql('DROP INDEX IDX_DA88B1378D566613 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP connexion_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE connexion (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pseudo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE comment ADD connexion_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C8D566613 FOREIGN KEY (connexion_id) REFERENCES connexion (id)');
        $this->addSql('CREATE INDEX IDX_9474526C8D566613 ON comment (connexion_id)');
        $this->addSql('ALTER TABLE recipe ADD connexion_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1378D566613 FOREIGN KEY (connexion_id) REFERENCES connexion (id)');
        $this->addSql('CREATE INDEX IDX_DA88B1378D566613 ON recipe (connexion_id)');
    }
}
