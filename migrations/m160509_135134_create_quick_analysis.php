<?php

use yii\db\Migration;

/**
 * Handles the creation for table `quick_analysis`.
 */
class m160509_135134_create_quick_analysis extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quick_analysis', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'software_id' => $this->integer()->notNull(),
            'goals' => $this->text(),
            'main_features' => $this->text(),
            'helpful_tool' => $this->text(),
            'value_added' => $this->text(),
            'date_update'=>$this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quick_analysis');
    }
}
