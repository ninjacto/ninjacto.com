<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "poster".
 *
 * @property integer $id
 * @property string $filename
 * @property string $filesize
 * @property string $mime
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Post[] $posts
 */
class Poster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'filesize'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['filename', 'filesize', 'mime'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'filesize' => 'Filesize',
            'mime' => 'Mime',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['poster_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PosterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PosterQuery(get_called_class());
    }
}
