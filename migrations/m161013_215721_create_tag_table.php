<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tag`.
 */
class m161013_215721_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(),
        ]);
        
        $this->createTable('tag_software', [
            'software_id' => $this->integer()->notNull(),
            'tag_id'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tag');
        $this->dropTable('tag_software');
    }
}
