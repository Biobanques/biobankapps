<?php

use yii\db\Migration;

/**
 * add a column to manage usage rights into a software 
 * Values are integer : 
 * 0 : not set
 * 1 : open source & free to use
 * 2 : free to use
 * 3 : freemium
 * 4 : commercial
 */
class m160928_134928_add_usage_rights extends Migration
{
    public function up()
    {
        $this->addColumn('software', 'usage_rights', 'INT DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('software', 'usage_rights');
        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
