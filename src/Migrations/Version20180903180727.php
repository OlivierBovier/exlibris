<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180903180727 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users ADD password VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL, DROP prenom_user, DROP nom_user, DROP email_user, DROP ville_user, DROP date_crea_user, CHANGE adresse_user adresse VARCHAR(255) DEFAULT NULL, CHANGE cp_user code_postal VARCHAR(5) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users ADD prenom_user VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, ADD nom_user VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, ADD email_user VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, ADD adresse_user VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD ville_user VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD date_crea_user DATE NOT NULL, DROP password, DROP prenom, DROP nom, DROP email, DROP adresse, DROP ville, DROP created_at, CHANGE code_postal cp_user VARCHAR(5) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
