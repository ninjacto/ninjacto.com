<?php

namespace common\models\base;

/**
 * This is the ActiveQuery class for [[PostHasTag]].
 *
 * @see PostHasTag
 */
class PostHasTagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PostHasTag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PostHasTag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}