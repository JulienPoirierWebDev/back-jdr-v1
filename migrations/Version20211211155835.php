<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211211155835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracteristic_type ADD for_creation TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE dice_throw ADD score_target INT NOT NULL, ADD action VARCHAR(255) NOT NULL, ADD by_npc TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE goal ADD target_item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2ED907EB35 FOREIGN KEY (target_item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_FCDCEB2ED907EB35 ON goal (target_item_id)');
        $this->addSql('ALTER TABLE message_in_chat ADD target_npc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message_in_chat ADD CONSTRAINT FK_DFAEF7C2C3778C39 FOREIGN KEY (target_npc_id) REFERENCES npc_on_adventure (id)');
        $this->addSql('CREATE INDEX IDX_DFAEF7C2C3778C39 ON message_in_chat (target_npc_id)');
        $this->addSql('ALTER TABLE npc_on_adventure ADD health INT NOT NULL');
        $this->addSql('ALTER TABLE player_character ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skill_developed DROP FOREIGN KEY FK_C2DE0596A76ED395');
        $this->addSql('DROP INDEX IDX_C2DE0596A76ED395 ON skill_developed');
        $this->addSql('ALTER TABLE skill_developed DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracteristic_type DROP for_creation');
        $this->addSql('ALTER TABLE dice_throw DROP score_target, DROP action, DROP by_npc');
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2ED907EB35');
        $this->addSql('DROP INDEX IDX_FCDCEB2ED907EB35 ON goal');
        $this->addSql('ALTER TABLE goal DROP target_item_id');
        $this->addSql('ALTER TABLE message_in_chat DROP FOREIGN KEY FK_DFAEF7C2C3778C39');
        $this->addSql('DROP INDEX IDX_DFAEF7C2C3778C39 ON message_in_chat');
        $this->addSql('ALTER TABLE message_in_chat DROP target_npc_id');
        $this->addSql('ALTER TABLE npc_on_adventure DROP health');
        $this->addSql('ALTER TABLE player_character DROP name');
        $this->addSql('ALTER TABLE skill_developed ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE skill_developed ADD CONSTRAINT FK_C2DE0596A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C2DE0596A76ED395 ON skill_developed (user_id)');
    }
}
