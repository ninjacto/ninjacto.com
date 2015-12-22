<?php
namespace common\models;

use creocoder\taggable\TaggableBehavior;
use yii\behaviors\SluggableBehavior;
use common\models\base\Post as PostBase;

class Post extends PostBase
{
    public $tagValues;

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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'body', 'slug'], 'required'],
            [['user_id', 'is_lts'], 'integer'],
            [['body'], 'string'],
            [['published_at', 'indexed_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'keyword'], 'string', 'max' => 255],
            [['poster'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => ['create']],
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

    public function upload()
    {
        if ($this->validate()) {
            if(file_exists(\Yii::getAlias('@frontend/web/uploads/posters/') . $this->id . '.' . $this->poster->extension))
                unlink(\Yii::getAlias('@frontend/web/uploads/posters/') . $this->id . '.' . $this->poster->extension);
            $this->poster->saveAs(\Yii::getAlias('@frontend/web/uploads/posters/') . $this->id . '.' . $this->poster->extension);
            $this->poster = $this->id . '.' . $this->poster->extension;
            $this->save(false);
            return true;
        } else {
            return false;
        }
    }

    public function getCategoriesName()
    {
        $names = [];
        foreach($this->categories as $category)
            $names[] = $category->title;
        return $names;
    }

    public static function find()
    {
        return new \common\models\base\PostQuery(get_called_class());
    }
}