<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $poster
 * @property string $title
 * @property string $body
 * @property string $slug
 * @property integer $is_lts
 * @property string $keyword
 * @property string $description
 * @property string $published_at
 * @property string $indexed_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CategoryHasPost[] $categoryHasPosts
 * @property Category[] $categories
 * @property Comment[] $comments
 * @property User $user
 * @property PostHasTag[] $postHasTags
 * @property Tag[] $tags
 * @property SeriesHasPost[] $seriesHasPosts
 * @property Series[] $series
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
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
            [['poster', 'title', 'slug', 'keyword'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 160]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'poster' => 'Poster',
            'title' => 'Title',
            'body' => 'Body',
            'slug' => 'Slug',
            'is_lts' => 'Is Lts',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'published_at' => 'Published At',
            'indexed_at' => 'Indexed At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryHasPosts()
    {
        return $this->hasMany(CategoryHasPost::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('category_has_post', ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostHasTags()
    {
        return $this->hasMany(PostHasTag::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('post_has_tag', ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeriesHasPosts()
    {
        return $this->hasMany(SeriesHasPost::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeries()
    {
        return $this->hasMany(Series::className(), ['id' => 'series_id'])->viaTable('series_has_post', ['post_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
