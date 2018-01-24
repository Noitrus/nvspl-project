<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180110090329 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE duomenys DROP FOREIGN KEY fk_Data_Users');
        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(60) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_C2502824F85E0677 (username), UNIQUE INDEX UNIQ_C2502824E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE duomenys');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE duomenys (tyr_nr VARCHAR(45) NOT NULL COLLATE utf8_general_ci, prot BLOB DEFAULT NULL, Users_imones_kodas INT NOT NULL, atlikimo_data DATETIME NOT NULL, perskaityta DATETIME DEFAULT NULL, INDEX fk_Data_Users_idx (Users_imones_kodas), PRIMARY KEY(tyr_nr)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (imones_kodas INT NOT NULL, username VARCHAR(45) NOT NULL COLLATE utf8_general_ci, password VARCHAR(45) NOT NULL COLLATE utf8_general_ci, email VARCHAR(100) DEFAULT NULL COLLATE utf8_general_ci, roles VARCHAR(200) NOT NULL COLLATE utf8_general_ci, salt VARCHAR(200) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(imones_kodas)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE duomenys ADD CONSTRAINT fk_Data_Users FOREIGN KEY (Users_imones_kodas) REFERENCES users (imones_kodas) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE app_users');
    }
}
