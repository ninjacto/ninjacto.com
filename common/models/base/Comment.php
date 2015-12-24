<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $parent_comment_id
 * @property string $name
 * @property string $email
 * @property string $body
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Comment $parentComment
 * @property Comment[] $comments
 * @property Post $post
 */
class Comment extends \yii\db\ActiveRecord
{

    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'email', 'body'], 'required'],
            [['post_id', 'parent_comment_id', 'status'], 'integer'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'parent_comment_id' => 'Parent Comment ID',
            'name' => 'Name',
            'email' => 'Email',
            'body' => 'Body',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verifyCode' => 'CAPTCHA',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'parent_comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['parent_comment_id' => 'id']);
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
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }
}
