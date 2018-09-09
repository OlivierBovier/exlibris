<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180909134025 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteurs (id INT AUTO_INCREMENT NOT NULL, prenom_auteur VARCHAR(255) NOT NULL, nom_auteur VARCHAR(255) NOT NULL, biographie_auteur LONGTEXT DEFAULT NULL, photo_auteur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, livre_id INT NOT NULL, user_id INT NOT NULL, commentaire LONGTEXT NOT NULL, note INT DEFAULT NULL, date_avis DATETIME NOT NULL, INDEX IDX_8F91ABF037D925CB (livre_id), INDEX IDX_8F91ABF0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_cde DATETIME NOT NULL, total_ht_cde DOUBLE PRECISION NOT NULL, tva_cde DOUBLE PRECISION NOT NULL, total_ttc_cde DOUBLE PRECISION NOT NULL, INDEX IDX_35D4282CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeurs (id INT AUTO_INCREMENT NOT NULL, nom_editeur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lignes_cde (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, livre_id INT NOT NULL, qte_ligne_cde INT NOT NULL, INDEX IDX_DACB706282EA2E54 (commande_id), INDEX IDX_DACB706237D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livres (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, editeur_id INT NOT NULL, isbn VARCHAR(17) NOT NULL, titre VARCHAR(255) NOT NULL, nb_pages INT NOT NULL, date_parution DATE NOT NULL, prix_ht DOUBLE PRECISION NOT NULL, est_conseil TINYINT(1) NOT NULL, resume LONGTEXT NOT NULL, jaquette VARCHAR(255) DEFAULT NULL, INDEX IDX_927187A460BB6FE6 (auteur_id), INDEX IDX_927187A43375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livres_categories (livres_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_96B809B8EBF07F38 (livres_id), INDEX IDX_96B809B8A21214B7 (categories_id), PRIMARY KEY(livres_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mouv_stock (id INT AUTO_INCREMENT NOT NULL, livre_id INT NOT NULL, qte_mouv INT NOT NULL, date_mouv DATETIME NOT NULL, INDEX IDX_5F8DC87937D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF037D925CB FOREIGN KEY (livre_id) REFERENCES livres (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lignes_cde ADD CONSTRAINT FK_DACB706282EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE lignes_cde ADD CONSTRAINT FK_DACB706237D925CB FOREIGN KEY (livre_id) REFERENCES livres (id)');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A460BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteurs (id)');
        $this->addSql('ALTER TABLE livres ADD CONSTRAINT FK_927187A43375BD21 FOREIGN KEY (editeur_id) REFERENCES editeurs (id)');
        $this->addSql('ALTER TABLE livres_categories ADD CONSTRAINT FK_96B809B8EBF07F38 FOREIGN KEY (livres_id) REFERENCES livres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livres_categories ADD CONSTRAINT FK_96B809B8A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mouv_stock ADD CONSTRAINT FK_5F8DC87937D925CB FOREIGN KEY (livre_id) REFERENCES livres (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A460BB6FE6');
        $this->addSql('ALTER TABLE livres_categories DROP FOREIGN KEY FK_96B809B8A21214B7');
        $this->addSql('ALTER TABLE lignes_cde DROP FOREIGN KEY FK_DACB706282EA2E54');
        $this->addSql('ALTER TABLE livres DROP FOREIGN KEY FK_927187A43375BD21');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF037D925CB');
        $this->addSql('ALTER TABLE lignes_cde DROP FOREIGN KEY FK_DACB706237D925CB');
        $this->addSql('ALTER TABLE livres_categories DROP FOREIGN KEY FK_96B809B8EBF07F38');
        $this->addSql('ALTER TABLE mouv_stock DROP FOREIGN KEY FK_5F8DC87937D925CB');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A76ED395');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CA76ED395');
        $this->addSql('DROP TABLE auteurs');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE editeurs');
        $this->addSql('DROP TABLE lignes_cde');
        $this->addSql('DROP TABLE livres');
        $this->addSql('DROP TABLE livres_categories');
        $this->addSql('DROP TABLE mouv_stock');
        $this->addSql('DROP TABLE user');
    }
}
