<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250628094414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D619EB6921
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5E90F6D619EB6921 ON inscription
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE inscription ADD user_id INT DEFAULT NULL, DROP client_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5E90F6D6A76ED395 ON inscription (user_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5E90F6D6A76ED395 ON inscription
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE inscription ADD client_id INT NOT NULL, DROP user_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D619EB6921 FOREIGN KEY (client_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5E90F6D619EB6921 ON inscription (client_id)
        SQL);
    }
}
