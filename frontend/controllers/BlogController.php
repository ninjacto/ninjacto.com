<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Post;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;

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

    public function actionIndex()
    {
        $posts = Post::find()->all();
        return $this->render('list',['posts'=>$posts]);
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
        return $this->render('view',['model'=>$post]);
    }

}
