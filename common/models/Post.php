<?php
namespace common\models;

use creocoder\taggable\TaggableBehavior;
use common\models\base\Post as PostBase;

class Post extends PostBase
{
    public function behaviors()
    {
        return [
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagValuesAsArray' => false,
                'tagRelation' => 'tags',
                'tagValueAttribute' => 'title',
                'tagFrequencyAttribute' => 'frequency',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'body'], 'required'],
            [['user_id', 'is_lts'], 'integer'],
            [['body'], 'string'],
            [['published_at', 'indexed_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'keyword'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 160],
            [['tagValues'], 'safe'],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new \common\models\base\PostQuery(get_called_class());
    }
}