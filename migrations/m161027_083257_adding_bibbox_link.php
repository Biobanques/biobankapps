<?php

use yii\db\Migration;

/**
 * migration script to add a column to store a link to the bibbok page for each software
 * @author malservet nicolas
 * @since 2.0.12
 */
class m161027_083257_adding_bibbox_link extends Migration
{
    public function up()
    {
        //Type text, because type string limits to 255 characters when yii generate the field in db
        $this->addColumn('software', 'bibbox_link_url', $this->text());
    }

    public function down()
    {
        $this->dropColumn('software', 'bibbox_link_url');
        return true;
    }
}
