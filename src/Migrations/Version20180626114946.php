<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180626114946 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361016678C77');
        $this->addSql('CREATE TABLE User (status_id INT DEFAULT NULL, avatar INT DEFAULT NULL, User_id INT AUTO_INCREMENT NOT NULL, User_mail VARCHAR(100) NOT NULL, User_password VARCHAR(255) NOT NULL, User_name VARCHAR(100) NOT NULL, User_firstname VARCHAR(100) NOT NULL, User_birthday DATE NOT NULL, User_subscription_birthday DATE NOT NULL, UNIQUE INDEX UNIQ_2DA17977A9566222 (User_mail), INDEX IDX_2DA179776BF700BD (status_id), INDEX IDX_2DA179771677722F (avatar), PRIMARY KEY(User_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE User ADD CONSTRAINT FK_2DA179776BF700BD FOREIGN KEY (status_id) REFERENCES user_status (userStatus_id)');
        $this->addSql('ALTER TABLE User ADD CONSTRAINT FK_2DA179771677722F FOREIGN KEY (avatar) REFERENCES file (File_id)');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361016678C77');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361016678C77 FOREIGN KEY (uploader_id) REFERENCES User (User_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361016678C77');
        $this->addSql('CREATE TABLE users (status_id INT DEFAULT NULL, avatar INT DEFAULT NULL, User_id INT AUTO_INCREMENT NOT NULL, User_mail VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, User_password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, User_name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, User_firstname VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, User_birthday DATE NOT NULL, User_subscription_birthday DATE NOT NULL, UNIQUE INDEX UNIQ_D5428AEDA9566222 (User_mail), INDEX IDX_D5428AED6BF700BD (status_id), INDEX IDX_D5428AED1677722F (avatar), PRIMARY KEY(User_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_D5428AED1677722F FOREIGN KEY (avatar) REFERENCES file (File_id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_D5428AED6BF700BD FOREIGN KEY (status_id) REFERENCES user_status (userStatus_id)');
        $this->addSql('DROP TABLE User');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361016678C77');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361016678C77 FOREIGN KEY (uploader_id) REFERENCES users (User_id)');
    }
}
