<?php

namespace backend\controllers;

use common\models\Category;
use Yii;
use yii\filters\AccessControl;
use common\models\Post;
use common\models\PostSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'delete', 'create', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post('Post');
            if(!empty($postData['categories'])) {
                foreach($postData['categories'] as $categoryId) {
                    $category = Category::find()->where(['id'=>$categoryId])->one();
                    $model->link('categories', $category);
                }
            }
            $model->setScenario('create');
            $model->poster = \yii\web\UploadedFile::getInstance($model, 'poster');
            if ($model->save() && $model->upload()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post('Post');
            if(!empty($postData['categories'])) {
                $categories = \common\models\Category::find()->select(['category.id'])->joinWith('posts')->where(['post.id'=>$model->id])->asArray()->all();
                foreach($categories as $oldCategory) {
                    foreach($postData['categories'] as $key=>$categoryId) {
                        if($oldCategory['id'] == $categoryId)
                            unset($postData['categories'][$key]);
                    }
                }

                foreach($postData['categories'] as $categoryId) {
                    $category = Category::find()->where(['id'=>$categoryId])->one();
                    $model->link('categories', $category);
                }
            }
            if ($model->save()) {
                $model->poster = \yii\web\UploadedFile::getInstance($model, 'poster');
                $changes = $model->getDirtyAttributes(['poster']);
                if(!empty($changes['poster'])) {
                    if ($model->upload()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $model->addError('poster','Could Not upload poster!');
                    }
                } else {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionList($query) {
        $models = \common\models\Tag::findAllByName($query);
        $items = [];
        foreach ($models as $model) {
            $items[] = ['name' => $model->name];
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $items;
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
