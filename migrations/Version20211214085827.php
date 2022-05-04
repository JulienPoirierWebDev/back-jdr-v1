<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214085827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dice_throw ADD player_character_who_throw_id INT DEFAULT NULL, ADD is_attack TINYINT(1) NOT NULL, ADD damage INT DEFAULT NULL, ADD game_master_validation TINYINT(1) NOT NULL, ADD game_master_waiting TINYINT(1) NOT NULL, ADD date_time_update DATETIME NOT NULL');
        $this->addSql('ALTER TABLE dice_throw ADD CONSTRAINT FK_38C533919E74E626 FOREIGN KEY (player_character_who_throw_id) REFERENCES player_character (id)');
        $this->addSql('CREATE INDEX IDX_38C533919E74E626 ON dice_throw (player_character_who_throw_id)');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583B337437C');
        $this->addSql('DROP INDEX IDX_D338D583B337437C ON equipment');
        $this->addSql('ALTER TABLE equipment DROP equipment_type_id');
        $this->addSql('ALTER TABLE item_in_bag ADD item_id INT NOT NULL');
        $this->addSql('ALTER TABLE item_in_bag ADD CONSTRAINT FK_49CFED75126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_49CFED75126F525E ON item_in_bag (item_id)');
        $this->addSql('ALTER TABLE message_in_chat ADD target_player_character_id INT DEFAULT NULL, ADD player_character_id INT DEFAULT NULL, ADD name_of_speaker VARCHAR(255) DEFAULT NULL, ADD is_system_message TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE message_in_chat ADD CONSTRAINT FK_DFAEF7C214AFBF46 FOREIGN KEY (target_player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE message_in_chat ADD CONSTRAINT FK_DFAEF7C2910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id)');
        $this->addSql('CREATE INDEX IDX_DFAEF7C214AFBF46 ON message_in_chat (target_player_character_id)');
        $this->addSql('CREATE INDEX IDX_DFAEF7C2910BEE57 ON message_in_chat (player_character_id)');
        $this->addSql('ALTER TABLE quest ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE quest_in_adventure ADD adventure_id INT NOT NULL');
        $this->addSql('ALTER TABLE quest_in_adventure ADD CONSTRAINT FK_DFF15D8655CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('CREATE INDEX IDX_DFF15D8655CF40F9 ON quest_in_adventure (adventure_id)');
        $this->addSql('ALTER TABLE skill_developed ADD player_character_id INT NOT NULL');
        $this->addSql('ALTER TABLE skill_developed ADD CONSTRAINT FK_C2DE0596910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id)');
        $this->addSql('CREATE INDEX IDX_C2DE0596910BEE57 ON skill_developed (player_character_id)');
        $this->addSql('ALTER TABLE visited_place ADD adventure_id INT NOT NULL');
        $this->addSql('ALTER TABLE visited_place ADD CONSTRAINT FK_EFF6E20855CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('CREATE INDEX IDX_EFF6E20855CF40F9 ON visited_place (adventure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dice_throw DROP FOREIGN KEY FK_38C533919E74E626');
        $this->addSql('DROP INDEX IDX_38C533919E74E626 ON dice_throw');
        $this->addSql('ALTER TABLE dice_throw DROP player_character_who_throw_id, DROP is_attack, DROP damage, DROP game_master_validation, DROP game_master_waiting, DROP date_time_update');
        $this->addSql('ALTER TABLE equipment ADD equipment_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583B337437C FOREIGN KEY (equipment_type_id) REFERENCES equipment_type (id)');
        $this->addSql('CREATE INDEX IDX_D338D583B337437C ON equipment (equipment_type_id)');
        $this->addSql('ALTER TABLE item_in_bag DROP FOREIGN KEY FK_49CFED75126F525E');
        $this->addSql('DROP INDEX IDX_49CFED75126F525E ON item_in_bag');
        $this->addSql('ALTER TABLE item_in_bag DROP item_id');
        $this->addSql('ALTER TABLE message_in_chat DROP FOREIGN KEY FK_DFAEF7C214AFBF46');
        $this->addSql('ALTER TABLE message_in_chat DROP FOREIGN KEY FK_DFAEF7C2910BEE57');
        $this->addSql('DROP INDEX IDX_DFAEF7C214AFBF46 ON message_in_chat');
        $this->addSql('DROP INDEX IDX_DFAEF7C2910BEE57 ON message_in_chat');
        $this->addSql('ALTER TABLE message_in_chat DROP target_player_character_id, DROP player_character_id, DROP name_of_speaker, DROP is_system_message');
        $this->addSql('ALTER TABLE quest DROP name');
        $this->addSql('ALTER TABLE quest_in_adventure DROP FOREIGN KEY FK_DFF15D8655CF40F9');
        $this->addSql('DROP INDEX IDX_DFF15D8655CF40F9 ON quest_in_adventure');
        $this->addSql('ALTER TABLE quest_in_adventure DROP adventure_id');
        $this->addSql('ALTER TABLE skill_developed DROP FOREIGN KEY FK_C2DE0596910BEE57');
        $this->addSql('DROP INDEX IDX_C2DE0596910BEE57 ON skill_developed');
        $this->addSql('ALTER TABLE skill_developed DROP player_character_id');
        $this->addSql('ALTER TABLE visited_place DROP FOREIGN KEY FK_EFF6E20855CF40F9');
        $this->addSql('DROP INDEX IDX_EFF6E20855CF40F9 ON visited_place');
        $this->addSql('ALTER TABLE visited_place DROP adventure_id');
    }
}
