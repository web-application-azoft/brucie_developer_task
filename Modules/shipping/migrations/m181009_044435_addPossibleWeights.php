<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181009_044435_addPossibleWeights
 */
class m181009_044435_addPossibleWeights extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('possible_weights', [
            'id' => Schema::TYPE_PK,
            'weight' => $this->integer()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('possible_weights');
    }

}
