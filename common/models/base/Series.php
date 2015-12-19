<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "series".
 *
 * @property integer $id
 * @property string $title
 * @property integer $number_of_post
 * @property string $created_at
 * @property string $updated_at
 *
 * @property SeriesHasPost[] $seriesHasPosts
 * @property Post[] $posts
 */
class Series extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['number_of_post'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'number_of_post' => 'Number Of Post',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeriesHasPosts()
    {
        return $this->hasMany(SeriesHasPost::className(), ['series_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('series_has_post', ['series_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SeriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeriesQuery(get_called_class());
    }
}
