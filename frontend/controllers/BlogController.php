<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Comment;
use common\models\Post;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

class BlogController extends Controller
{
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create-comment' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'foreColor' => 0xe54242,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list',['dataProvider'=>$dataProvider]);
    }

    public function actionCategory($url)
    {
        $category = Category::findOne(['url'=>$url]);
        if(empty($category))
            throw new BadRequestHttpException('Category Not Found!',404);

        $posts = Post::find()->where(['category_id'=>$category['id']])->with('category')->all();
        return $this->render('list',['posts'=>$posts]);
    }

    public function actionTag($tag)
    {
        $posts = Post::find()->anyTagValues(explode(',',$tag))->with('category')->all();
        return $this->render('list',['posts'=>$posts]);
    }

    public function actionView($slug)
    {
        $post = Post::findOne(['slug'=>$slug]);
        $comment = new Comment();
        $comment->name='';
        $comment->email='';
        $comment->body='';
        if($comment->load(Yii::$app->request->post())) {
            $comment->status = 0;
            if ($comment->save()) {
                Yii::$app->session->setFlash('success', [
                    'type' => 'success',
                    'duration' => 12000,
                    'icon' => 'fa fa-chat',
                    'message' => 'You\'re comment successfully stored and will shown after approval.',
                    'title' => 'Saving Comment',
                ]);
            } else {
                Yii::$app->session->setFlash('error', [
                    'type' => 'danger',
                    'duration' => 12000,
                    'icon' => 'fa fa-chat',
                    'message' => 'Sorry but we couldn\'t store your comment.',
                    'title' => 'Saving Comment',
                ]);
            }
        }
        return $this->render('view',['post'=>$post,'comment'=>$comment]);
    }
}
