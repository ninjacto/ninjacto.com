<?php

namespace common\models\base;

/**
 * This is the ActiveQuery class for [[Poster]].
 *
 * @see Poster
 */
class PosterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Poster[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Poster|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}