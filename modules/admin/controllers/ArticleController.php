<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use app\models\ArticleForm;
use app\models\Category;
use yii;
use yii\web\Controller;



class ArticleController extends Controller
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $category = Article::getAll();
        return $this->render('index',[
            'category'=>$category,
        ]);
    }

    public function actionEdit($id)
    {
        $request = yii::$app->request;
        $model = new ArticleForm();
        $article = Article::find()->where(['id'=>$id])->limit(1)->one();
        $model->model = $article;
        if($request->isPost){
            $model->attributes=$_POST['Article'];
            if($model->load(Yii::$app->request->post(),"") && $model->edit()){

                return $this->redirect('/admin/article/index');
            }

        }
        return $this->render('edit',[
            'model'=>$article,
        ]);
    }

    public function actionCreate()
    {
        $request = yii::$app->request;
        $model = new ArticleForm();
        if($request->isPost && $model->load(Yii::$app->request->post()) && $model->create()){
            return $this->redirect('/admin/article/index');
        }
        return $this->render('create',[
            'model'=>$model,
        ]);


    }

    public function actionRemove($id)
    {
        $id = $id ?: $_GET['id'];
        Category::removeById($id);
        return $this->redirect('/admin/article/index');
    }

}
