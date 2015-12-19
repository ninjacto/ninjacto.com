<?php

namespace common\models\base;

/**
 * This is the ActiveQuery class for [[SeriesHasPost]].
 *
 * @see SeriesHasPost
 */
class SeriesHasPostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SeriesHasPost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SeriesHasPost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}