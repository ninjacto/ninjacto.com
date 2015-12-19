<?php

namespace common\models\base;

/**
 * This is the ActiveQuery class for [[Series]].
 *
 * @see Series
 */
class SeriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Series[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Series|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}