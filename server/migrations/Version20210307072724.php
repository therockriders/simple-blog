<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307072724 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nb_entries INT NOT NULL, nb_media INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(1000) NOT NULL, cover_path VARCHAR(1000) DEFAULT NULL, cover_www_path VARCHAR(1000) DEFAULT NULL, nb_media INT NOT NULL, pub_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry_category (entry_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_680BF989BA364942 (entry_id), INDEX IDX_680BF98912469DE2 (category_id), PRIMARY KEY(entry_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medium (id INT AUTO_INCREMENT NOT NULL, entry_id INT NOT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(1000) NOT NULL, type VARCHAR(255) NOT NULL, ext VARCHAR(255) NOT NULL, www_path VARCHAR(1000) NOT NULL, thumb_path VARCHAR(1000) DEFAULT NULL, www_thumb_path VARCHAR(1000) DEFAULT NULL, UNIQUE INDEX UNIQ_C67345B7BA364942 (entry_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entry_category ADD CONSTRAINT FK_680BF989BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entry_category ADD CONSTRAINT FK_680BF98912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medium ADD CONSTRAINT FK_C67345B7BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entry_category DROP FOREIGN KEY FK_680BF98912469DE2');
        $this->addSql('ALTER TABLE entry_category DROP FOREIGN KEY FK_680BF989BA364942');
        $this->addSql('ALTER TABLE medium DROP FOREIGN KEY FK_C67345B7BA364942');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE entry');
        $this->addSql('DROP TABLE entry_category');
        $this->addSql('DROP TABLE medium');
    }
}
