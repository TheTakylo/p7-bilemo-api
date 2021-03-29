<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329134144 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE p7_bilemo_apicustomer (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE p7_bilemo_apicustomer_user (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_20DB72E89395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE p7_bilemo_apiproduct (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, release_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE p7_bilemo_apicustomer_user ADD CONSTRAINT FK_20DB72E89395C3F3 FOREIGN KEY (customer_id) REFERENCES p7_bilemo_apicustomer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE p7_bilemo_apicustomer_user DROP FOREIGN KEY FK_20DB72E89395C3F3');
        $this->addSql('DROP TABLE p7_bilemo_apicustomer');
        $this->addSql('DROP TABLE p7_bilemo_apicustomer_user');
        $this->addSql('DROP TABLE p7_bilemo_apiproduct');
    }
}
