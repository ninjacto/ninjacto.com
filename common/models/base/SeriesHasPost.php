<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "series_has_post".
 *
 * @property integer $series_id
 * @property integer $post_id
 *
 * @property Post $post
 * @property Series $series
 */
class SeriesHasPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'series_has_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series_id', 'post_id'], 'required'],
            [['series_id', 'post_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'series_id' => 'Series ID',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeries()
    {
        return $this->hasOne(Series::className(), ['id' => 'series_id']);
    }

    /**
     * @inheritdoc
     * @return SeriesHasPostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeriesHasPostQuery(get_called_class());
    }
}
