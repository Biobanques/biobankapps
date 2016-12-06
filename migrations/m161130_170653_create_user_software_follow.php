<?php

use yii\db\Migration;

class m161130_170653_create_user_software_follow extends Migration
{
    public function up()
    {
        if($this->getDb()->getTableSchema('user_software_follow')==null)
$this->createTable('user_software_follow', [
   'id'=> $this->primaryKey(),
    'user_id'=> $this->integer()->notNull(),
    'software_id'=>$this->integer()->notNull(),

]);
    
    return true;
    }

    public function down()
    {
        echo "m161130_170653_create_user_software_follow cannot be reverted.\n";

        return false;
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
