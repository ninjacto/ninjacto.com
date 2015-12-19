<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "category_has_post".
 *
 * @property integer $category_id
 * @property integer $post_id
 *
 * @property Category $category
 * @property Post $post
 */
class CategoryHasPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_has_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'post_id'], 'required'],
            [['category_id', 'post_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @inheritdoc
     * @return CategoryHasPostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryHasPostQuery(get_called_class());
    }
}
