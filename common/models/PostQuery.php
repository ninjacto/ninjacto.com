<?php

namespace common\models;

use common\models\base\PostQuery as PostQueryBase;
use creocoder\taggable\TaggableQueryBehavior;

/**
 * This is the ActiveQuery class for [[Post]].
 *
 * @see Post
 */
class PostQuery extends PostQueryBase
{
    public function behaviors()
    {
        return [
            TaggableQueryBehavior::className(),
        ];
    }

    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }
}