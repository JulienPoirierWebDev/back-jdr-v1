<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119062612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adventure_card (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, content VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avatar_icon (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteristic (id INT AUTO_INCREMENT NOT NULL, player_character_id INT NOT NULL, caracteristic_type_id INT NOT NULL, value INT NOT NULL, INDEX IDX_9B958344910BEE57 (player_character_id), INDEX IDX_9B9583444E50C067 (caracteristic_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteristic_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, zone_id INT NOT NULL, user_who_create_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_5373C9669F2C3FAB (zone_id), INDEX IDX_5373C9668B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice (id INT AUTO_INCREMENT NOT NULL, dicename VARCHAR(100) NOT NULL, min INT NOT NULL, max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice_throw (id INT AUTO_INCREMENT NOT NULL, dice_id INT NOT NULL, adventure_id INT NOT NULL, cararcteristic_type_id INT DEFAULT NULL, target_npc_id INT DEFAULT NULL, target_player_character_id INT DEFAULT NULL, score INT NOT NULL, throw_date_time DATETIME NOT NULL, INDEX IDX_38C533918604FF94 (dice_id), INDEX IDX_38C5339155CF40F9 (adventure_id), INDEX IDX_38C5339134E7303 (cararcteristic_type_id), INDEX IDX_38C53391C3778C39 (target_npc_id), INDEX IDX_38C5339114AFBF46 (target_player_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, adventure_id INT NOT NULL, name VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_D8698A7655CF40F9 (adventure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, player_character_id INT NOT NULL, equipment_type_id INT NOT NULL, item_in_bag_id INT NOT NULL, INDEX IDX_D338D583910BEE57 (player_character_id), INDEX IDX_D338D583B337437C (equipment_type_id), INDEX IDX_D338D583D4703D42 (item_in_bag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frontier_between_places (id INT AUTO_INCREMENT NOT NULL, place_connected1_id INT NOT NULL, place_connected2_id INT NOT NULL, connection_type VARCHAR(100) NOT NULL, INDEX IDX_3F9069DC2CC06F25 (place_connected1_id), INDEX IDX_3F9069DC3E75C0CB (place_connected2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goal (id INT AUTO_INCREMENT NOT NULL, goal_type_id INT NOT NULL, quest_id INT NOT NULL, target_npc_id INT DEFAULT NULL, target_place_id INT DEFAULT NULL, user_who_create_id INT DEFAULT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_FCDCEB2EB4678E6F (goal_type_id), INDEX IDX_FCDCEB2E209E9EF4 (quest_id), INDEX IDX_FCDCEB2EC3778C39 (target_npc_id), INDEX IDX_FCDCEB2ED70D7270 (target_place_id), INDEX IDX_FCDCEB2E8B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goal_in_adventure (id INT AUTO_INCREMENT NOT NULL, goal_id INT NOT NULL, quest_in_adventure_id INT NOT NULL, date_time_finish DATETIME DEFAULT NULL, INDEX IDX_D9EEFECD667D1AFE (goal_id), INDEX IDX_D9EEFECD4656434E (quest_in_adventure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goal_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, caracteristic_type_id INT DEFAULT NULL, user_who_create_id INT DEFAULT NULL, equipment_type_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, generic_value INT DEFAULT NULL, description VARCHAR(1000) NOT NULL, usable TINYINT(1) NOT NULL, equipable TINYINT(1) NOT NULL, modifier INT DEFAULT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_1F1B251E4E50C067 (caracteristic_type_id), INDEX IDX_1F1B251E8B07FDEE (user_who_create_id), INDEX IDX_1F1B251EB337437C (equipment_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_in_action (id INT AUTO_INCREMENT NOT NULL, item_in_bag_id INT NOT NULL, target_player_character_id INT DEFAULT NULL, target_npc_id INT DEFAULT NULL, date_time_creation DATETIME NOT NULL, date_time_update DATETIME NOT NULL, game_master_waiting TINYINT(1) NOT NULL, game_master_validation TINYINT(1) NOT NULL, INDEX IDX_FCE13347D4703D42 (item_in_bag_id), INDEX IDX_FCE1334714AFBF46 (target_player_character_id), INDEX IDX_FCE13347C3778C39 (target_npc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_in_bag (id INT AUTO_INCREMENT NOT NULL, player_character_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_49CFED75910BEE57 (player_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE last_update_item (id INT AUTO_INCREMENT NOT NULL, last_update_type_id INT NOT NULL, adventure_id INT NOT NULL, INDEX IDX_8B410D8DECFA9CEE (last_update_type_id), INDEX IDX_8B410D8D55CF40F9 (adventure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE last_update_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_in_chat (id INT AUTO_INCREMENT NOT NULL, adventure_id INT NOT NULL, user_id INT NOT NULL, content VARCHAR(500) NOT NULL, is_player_message TINYINT(1) NOT NULL, date_time_create DATETIME NOT NULL, game_master_only TINYINT(1) NOT NULL, INDEX IDX_DFAEF7C255CF40F9 (adventure_id), INDEX IDX_DFAEF7C2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE npc (id INT AUTO_INCREMENT NOT NULL, npc_strength_id INT NOT NULL, npc_job_id INT NOT NULL, user_who_create_id INT DEFAULT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, xp_reward INT NOT NULL, description LONGTEXT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_468C762C14A347DE (npc_strength_id), INDEX IDX_468C762CEDDC4E6C (npc_job_id), INDEX IDX_468C762C8B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE npc_job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE npc_on_adventure (id INT AUTO_INCREMENT NOT NULL, adventure_id INT NOT NULL, npc_id INT NOT NULL, description LONGTEXT NOT NULL, present_on_scene TINYINT(1) NOT NULL, INDEX IDX_4595AB4055CF40F9 (adventure_id), INDEX IDX_4595AB40CA7D6B89 (npc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE npc_strength (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, place_type_id INT NOT NULL, user_who_create_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_741D53CD98260155 (region_id), INDEX IDX_741D53CDF1809B68 (place_type_id), INDEX IDX_741D53CD8B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_character (id INT AUTO_INCREMENT NOT NULL, adventure_id INT NOT NULL, user_id INT NOT NULL, avatar_icon_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_3376850D55CF40F9 (adventure_id), INDEX IDX_3376850DA76ED395 (user_id), INDEX IDX_3376850D82D7D8EC (avatar_icon_id), INDEX IDX_3376850D6E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, carecteristic_type_id INT DEFAULT NULL, user_who_create_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(1000) NOT NULL, modifier INT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_AB8A01A045F81761 (carecteristic_type_id), INDEX IDX_AB8A01A08B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power_developed (id INT AUTO_INCREMENT NOT NULL, power_id INT NOT NULL, player_character_id INT NOT NULL, INDEX IDX_E5C79FC2AB4FC384 (power_id), INDEX IDX_E5C79FC2910BEE57 (player_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power_in_action (id INT AUTO_INCREMENT NOT NULL, power_developed_id INT NOT NULL, target_player_character_id INT DEFAULT NULL, targer_npc_id INT DEFAULT NULL, date_time_create DATETIME NOT NULL, date_time_update DATETIME NOT NULL, game_master_validation TINYINT(1) NOT NULL, game_master_waiting TINYINT(1) NOT NULL, INDEX IDX_84D384BE7B3463D (power_developed_id), INDEX IDX_84D384BE14AFBF46 (target_player_character_id), INDEX IDX_84D384BE51885BE (targer_npc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, goal_type_id INT NOT NULL, use_who_create_id INT DEFAULT NULL, description LONGTEXT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_4317F817B4678E6F (goal_type_id), INDEX IDX_4317F817C5804696 (use_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest_in_adventure (id INT AUTO_INCREMENT NOT NULL, quest_id INT NOT NULL, description LONGTEXT NOT NULL, date_time_create DATETIME NOT NULL, date_time_update DATETIME NOT NULL, focus TINYINT(1) NOT NULL, INDEX IDX_DFF15D86209E9EF4 (quest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, caracteristic_type_id INT NOT NULL, name VARCHAR(100) NOT NULL, modifier INT NOT NULL, INDEX IDX_DA6FBBAF4E50C067 (caracteristic_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, user_who_create_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_F62F176F92F3E70 (country_id), INDEX IDX_F62F1768B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(1000) NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_developed (id INT AUTO_INCREMENT NOT NULL, skill_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C2DE05965585C142 (skill_id), INDEX IDX_C2DE0596A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_in_action (id INT AUTO_INCREMENT NOT NULL, target_npc_id INT DEFAULT NULL, target_player_character_id INT DEFAULT NULL, skill_developed_id INT NOT NULL, game_master_validation TINYINT(1) NOT NULL, game_master_waiting TINYINT(1) NOT NULL, date_time_create DATETIME NOT NULL, date_time_update DATETIME NOT NULL, INDEX IDX_A3CA1EEAC3778C39 (target_npc_id), INDEX IDX_A3CA1EEA14AFBF46 (target_player_character_id), INDEX IDX_A3CA1EEA83C30A26 (skill_developed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, caracteristic_type_id INT DEFAULT NULL, user_who_create_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(1000) NOT NULL, modifier INT NOT NULL, user_creation TINYINT(1) NOT NULL, INDEX IDX_D03FCD8D4E50C067 (caracteristic_type_id), INDEX IDX_D03FCD8D8B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell_in_action (id INT AUTO_INCREMENT NOT NULL, spell_id INT NOT NULL, target_npc_id INT DEFAULT NULL, target_player_character_id INT DEFAULT NULL, game_master_waiting TINYINT(1) NOT NULL, game_master_validation TINYINT(1) NOT NULL, date_time_create DATETIME NOT NULL, date_time_update DATETIME NOT NULL, INDEX IDX_10FAA090479EC90D (spell_id), INDEX IDX_10FAA090C3778C39 (target_npc_id), INDEX IDX_10FAA09014AFBF46 (target_player_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visited_place (id INT AUTO_INCREMENT NOT NULL, place_id INT NOT NULL, description LONGTEXT NOT NULL, actual_place TINYINT(1) NOT NULL, INDEX IDX_EFF6E208DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, user_who_create_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, user_creation TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_A0EBC0078B07FDEE (user_who_create_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracteristic ADD CONSTRAINT FK_9B958344910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE caracteristic ADD CONSTRAINT FK_9B9583444E50C067 FOREIGN KEY (caracteristic_type_id) REFERENCES caracteristic_type (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C9669F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C9668B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dice_throw ADD CONSTRAINT FK_38C533918604FF94 FOREIGN KEY (dice_id) REFERENCES dice (id)');
        $this->addSql('ALTER TABLE dice_throw ADD CONSTRAINT FK_38C5339155CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('ALTER TABLE dice_throw ADD CONSTRAINT FK_38C5339134E7303 FOREIGN KEY (cararcteristic_type_id) REFERENCES caracteristic_type (id)');
        $this->addSql('ALTER TABLE dice_throw ADD CONSTRAINT FK_38C53391C3778C39 FOREIGN KEY (target_npc_id) REFERENCES npc_on_adventure (id)');
        $this->addSql('ALTER TABLE dice_throw ADD CONSTRAINT FK_38C5339114AFBF46 FOREIGN KEY (target_player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7655CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583B337437C FOREIGN KEY (equipment_type_id) REFERENCES equipment_type (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583D4703D42 FOREIGN KEY (item_in_bag_id) REFERENCES item_in_bag (id)');
        $this->addSql('ALTER TABLE frontier_between_places ADD CONSTRAINT FK_3F9069DC2CC06F25 FOREIGN KEY (place_connected1_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE frontier_between_places ADD CONSTRAINT FK_3F9069DC3E75C0CB FOREIGN KEY (place_connected2_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2EB4678E6F FOREIGN KEY (goal_type_id) REFERENCES goal_type (id)');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2E209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id)');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2EC3778C39 FOREIGN KEY (target_npc_id) REFERENCES npc (id)');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2ED70D7270 FOREIGN KEY (target_place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2E8B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE goal_in_adventure ADD CONSTRAINT FK_D9EEFECD667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id)');
        $this->addSql('ALTER TABLE goal_in_adventure ADD CONSTRAINT FK_D9EEFECD4656434E FOREIGN KEY (quest_in_adventure_id) REFERENCES quest_in_adventure (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E4E50C067 FOREIGN KEY (caracteristic_type_id) REFERENCES caracteristic_type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E8B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EB337437C FOREIGN KEY (equipment_type_id) REFERENCES equipment_type (id)');
        $this->addSql('ALTER TABLE item_in_action ADD CONSTRAINT FK_FCE13347D4703D42 FOREIGN KEY (item_in_bag_id) REFERENCES item_in_bag (id)');
        $this->addSql('ALTER TABLE item_in_action ADD CONSTRAINT FK_FCE1334714AFBF46 FOREIGN KEY (target_player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE item_in_action ADD CONSTRAINT FK_FCE13347C3778C39 FOREIGN KEY (target_npc_id) REFERENCES npc (id)');
        $this->addSql('ALTER TABLE item_in_bag ADD CONSTRAINT FK_49CFED75910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE last_update_item ADD CONSTRAINT FK_8B410D8DECFA9CEE FOREIGN KEY (last_update_type_id) REFERENCES last_update_type (id)');
        $this->addSql('ALTER TABLE last_update_item ADD CONSTRAINT FK_8B410D8D55CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('ALTER TABLE message_in_chat ADD CONSTRAINT FK_DFAEF7C255CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('ALTER TABLE message_in_chat ADD CONSTRAINT FK_DFAEF7C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE npc ADD CONSTRAINT FK_468C762C14A347DE FOREIGN KEY (npc_strength_id) REFERENCES npc_strength (id)');
        $this->addSql('ALTER TABLE npc ADD CONSTRAINT FK_468C762CEDDC4E6C FOREIGN KEY (npc_job_id) REFERENCES npc_job (id)');
        $this->addSql('ALTER TABLE npc ADD CONSTRAINT FK_468C762C8B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE npc_on_adventure ADD CONSTRAINT FK_4595AB4055CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('ALTER TABLE npc_on_adventure ADD CONSTRAINT FK_4595AB40CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDF1809B68 FOREIGN KEY (place_type_id) REFERENCES place_type (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD8B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE player_character ADD CONSTRAINT FK_3376850D55CF40F9 FOREIGN KEY (adventure_id) REFERENCES adventure (id)');
        $this->addSql('ALTER TABLE player_character ADD CONSTRAINT FK_3376850DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE player_character ADD CONSTRAINT FK_3376850D82D7D8EC FOREIGN KEY (avatar_icon_id) REFERENCES avatar_icon (id)');
        $this->addSql('ALTER TABLE player_character ADD CONSTRAINT FK_3376850D6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE power ADD CONSTRAINT FK_AB8A01A045F81761 FOREIGN KEY (carecteristic_type_id) REFERENCES caracteristic_type (id)');
        $this->addSql('ALTER TABLE power ADD CONSTRAINT FK_AB8A01A08B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE power_developed ADD CONSTRAINT FK_E5C79FC2AB4FC384 FOREIGN KEY (power_id) REFERENCES power (id)');
        $this->addSql('ALTER TABLE power_developed ADD CONSTRAINT FK_E5C79FC2910BEE57 FOREIGN KEY (player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE power_in_action ADD CONSTRAINT FK_84D384BE7B3463D FOREIGN KEY (power_developed_id) REFERENCES power_developed (id)');
        $this->addSql('ALTER TABLE power_in_action ADD CONSTRAINT FK_84D384BE14AFBF46 FOREIGN KEY (target_player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE power_in_action ADD CONSTRAINT FK_84D384BE51885BE FOREIGN KEY (targer_npc_id) REFERENCES npc_on_adventure (id)');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817B4678E6F FOREIGN KEY (goal_type_id) REFERENCES goal_type (id)');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817C5804696 FOREIGN KEY (use_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE quest_in_adventure ADD CONSTRAINT FK_DFF15D86209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF4E50C067 FOREIGN KEY (caracteristic_type_id) REFERENCES caracteristic_type (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1768B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE skill_developed ADD CONSTRAINT FK_C2DE05965585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill_developed ADD CONSTRAINT FK_C2DE0596A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE skill_in_action ADD CONSTRAINT FK_A3CA1EEAC3778C39 FOREIGN KEY (target_npc_id) REFERENCES npc_on_adventure (id)');
        $this->addSql('ALTER TABLE skill_in_action ADD CONSTRAINT FK_A3CA1EEA14AFBF46 FOREIGN KEY (target_player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE skill_in_action ADD CONSTRAINT FK_A3CA1EEA83C30A26 FOREIGN KEY (skill_developed_id) REFERENCES skill_developed (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D4E50C067 FOREIGN KEY (caracteristic_type_id) REFERENCES caracteristic_type (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D8B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE spell_in_action ADD CONSTRAINT FK_10FAA090479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
        $this->addSql('ALTER TABLE spell_in_action ADD CONSTRAINT FK_10FAA090C3778C39 FOREIGN KEY (target_npc_id) REFERENCES npc_on_adventure (id)');
        $this->addSql('ALTER TABLE spell_in_action ADD CONSTRAINT FK_10FAA09014AFBF46 FOREIGN KEY (target_player_character_id) REFERENCES player_character (id)');
        $this->addSql('ALTER TABLE visited_place ADD CONSTRAINT FK_EFF6E208DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC0078B07FDEE FOREIGN KEY (user_who_create_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_character DROP FOREIGN KEY FK_3376850D82D7D8EC');
        $this->addSql('ALTER TABLE caracteristic DROP FOREIGN KEY FK_9B9583444E50C067');
        $this->addSql('ALTER TABLE dice_throw DROP FOREIGN KEY FK_38C5339134E7303');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E4E50C067');
        $this->addSql('ALTER TABLE power DROP FOREIGN KEY FK_AB8A01A045F81761');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF4E50C067');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D4E50C067');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176F92F3E70');
        $this->addSql('ALTER TABLE dice_throw DROP FOREIGN KEY FK_38C533918604FF94');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583B337437C');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EB337437C');
        $this->addSql('ALTER TABLE goal_in_adventure DROP FOREIGN KEY FK_D9EEFECD667D1AFE');
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2EB4678E6F');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F817B4678E6F');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583D4703D42');
        $this->addSql('ALTER TABLE item_in_action DROP FOREIGN KEY FK_FCE13347D4703D42');
        $this->addSql('ALTER TABLE last_update_item DROP FOREIGN KEY FK_8B410D8DECFA9CEE');
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2EC3778C39');
        $this->addSql('ALTER TABLE item_in_action DROP FOREIGN KEY FK_FCE13347C3778C39');
        $this->addSql('ALTER TABLE npc_on_adventure DROP FOREIGN KEY FK_4595AB40CA7D6B89');
        $this->addSql('ALTER TABLE npc DROP FOREIGN KEY FK_468C762CEDDC4E6C');
        $this->addSql('ALTER TABLE dice_throw DROP FOREIGN KEY FK_38C53391C3778C39');
        $this->addSql('ALTER TABLE power_in_action DROP FOREIGN KEY FK_84D384BE51885BE');
        $this->addSql('ALTER TABLE skill_in_action DROP FOREIGN KEY FK_A3CA1EEAC3778C39');
        $this->addSql('ALTER TABLE spell_in_action DROP FOREIGN KEY FK_10FAA090C3778C39');
        $this->addSql('ALTER TABLE npc DROP FOREIGN KEY FK_468C762C14A347DE');
        $this->addSql('ALTER TABLE frontier_between_places DROP FOREIGN KEY FK_3F9069DC2CC06F25');
        $this->addSql('ALTER TABLE frontier_between_places DROP FOREIGN KEY FK_3F9069DC3E75C0CB');
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2ED70D7270');
        $this->addSql('ALTER TABLE visited_place DROP FOREIGN KEY FK_EFF6E208DA6A219');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDF1809B68');
        $this->addSql('ALTER TABLE caracteristic DROP FOREIGN KEY FK_9B958344910BEE57');
        $this->addSql('ALTER TABLE dice_throw DROP FOREIGN KEY FK_38C5339114AFBF46');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583910BEE57');
        $this->addSql('ALTER TABLE item_in_action DROP FOREIGN KEY FK_FCE1334714AFBF46');
        $this->addSql('ALTER TABLE item_in_bag DROP FOREIGN KEY FK_49CFED75910BEE57');
        $this->addSql('ALTER TABLE power_developed DROP FOREIGN KEY FK_E5C79FC2910BEE57');
        $this->addSql('ALTER TABLE power_in_action DROP FOREIGN KEY FK_84D384BE14AFBF46');
        $this->addSql('ALTER TABLE skill_in_action DROP FOREIGN KEY FK_A3CA1EEA14AFBF46');
        $this->addSql('ALTER TABLE spell_in_action DROP FOREIGN KEY FK_10FAA09014AFBF46');
        $this->addSql('ALTER TABLE power_developed DROP FOREIGN KEY FK_E5C79FC2AB4FC384');
        $this->addSql('ALTER TABLE power_in_action DROP FOREIGN KEY FK_84D384BE7B3463D');
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2E209E9EF4');
        $this->addSql('ALTER TABLE quest_in_adventure DROP FOREIGN KEY FK_DFF15D86209E9EF4');
        $this->addSql('ALTER TABLE goal_in_adventure DROP FOREIGN KEY FK_D9EEFECD4656434E');
        $this->addSql('ALTER TABLE player_character DROP FOREIGN KEY FK_3376850D6E59D40D');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD98260155');
        $this->addSql('ALTER TABLE skill_developed DROP FOREIGN KEY FK_C2DE05965585C142');
        $this->addSql('ALTER TABLE skill_in_action DROP FOREIGN KEY FK_A3CA1EEA83C30A26');
        $this->addSql('ALTER TABLE spell_in_action DROP FOREIGN KEY FK_10FAA090479EC90D');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C9669F2C3FAB');
        $this->addSql('DROP TABLE adventure_card');
        $this->addSql('DROP TABLE avatar_icon');
        $this->addSql('DROP TABLE caracteristic');
        $this->addSql('DROP TABLE caracteristic_type');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE dice');
        $this->addSql('DROP TABLE dice_throw');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_type');
        $this->addSql('DROP TABLE frontier_between_places');
        $this->addSql('DROP TABLE goal');
        $this->addSql('DROP TABLE goal_in_adventure');
        $this->addSql('DROP TABLE goal_type');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_in_action');
        $this->addSql('DROP TABLE item_in_bag');
        $this->addSql('DROP TABLE last_update_item');
        $this->addSql('DROP TABLE last_update_type');
        $this->addSql('DROP TABLE message_in_chat');
        $this->addSql('DROP TABLE npc');
        $this->addSql('DROP TABLE npc_job');
        $this->addSql('DROP TABLE npc_on_adventure');
        $this->addSql('DROP TABLE npc_strength');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE place_type');
        $this->addSql('DROP TABLE player_character');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE power_developed');
        $this->addSql('DROP TABLE power_in_action');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE quest_in_adventure');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_developed');
        $this->addSql('DROP TABLE skill_in_action');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE spell_in_action');
        $this->addSql('DROP TABLE visited_place');
        $this->addSql('DROP TABLE zone');
    }
}
