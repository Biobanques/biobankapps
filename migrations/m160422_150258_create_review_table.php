<?php

use yii\db\Migration;

class m160422_150258_create_review_table extends Migration
{
    public function up()
    {
        
        $this->createTable('review', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'software_id' => $this->integer()->notNull(),
            'rating' => $this->integer()->notNull(),
            'title'=> $this->string(),
            'comment' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('review');
    }
}
