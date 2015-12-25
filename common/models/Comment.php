<?php
namespace common\models;

use common\models\base\Comment as CommentBase;

class Comment extends CommentBase
{
    public $captcha;

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
            [
                'captcha',
                'Zelenin\yii\widgets\Recaptcha\validators\RecaptchaValidator',
                'secret' => '6LfU0xMTAAAAAJV4-wSxZGTW-zb_hHkV0LPcMgLN'
            ]
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
}