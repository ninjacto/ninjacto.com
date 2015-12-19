<?php

namespace common\models\base;

/**
 * This is the ActiveQuery class for [[CategoryHasPost]].
 *
 * @see CategoryHasPost
 */
class CategoryHasPostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CategoryHasPost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryHasPost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}