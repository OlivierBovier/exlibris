<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181013085439 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE FULLTEXT INDEX IDX_6DD7D42A85952E172929F9F8 ON auteurs (nom_auteur, biographie_auteur)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_927187A4FF7747B460C1D0A0 ON livres (titre, resume)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX IDX_6DD7D42A85952E172929F9F8 ON auteurs');
        $this->addSql('DROP INDEX IDX_927187A4FF7747B460C1D0A0 ON livres');
    }
}
