<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "post_has_tag".
 *
 * @property integer $post_id
 * @property integer $tag_id
 *
 * @property Post $post
 * @property Tag $tag
 */
class PostHasTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_has_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'required'],
            [['post_id', 'tag_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'tag_id' => 'Tag ID',
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
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @inheritdoc
     * @return PostHasTagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostHasTagQuery(get_called_class());
    }
}
