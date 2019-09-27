<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use yii;
use app\models\CategoryForm;
use yii\web\Controller;



class CategoryController extends Controller
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $category = Category::getAll();
        return $this->render('index',[
            'category'=>$category,
        ]);
    }

    public function actionEdit($id)
    {
        $request = yii::$app->request;
        $model = new CategoryForm();
        $category = Category::find()->where(['id'=>$id])->limit(1)->one();
        $model->model = $category;
        if($request->isPost){
            $model->attributes=$_POST['Category'];
            if($model->load(Yii::$app->request->post(),"") && $model->edit()){

                return $this->redirect('/admin/category/index');
            }

        }
        return $this->render('edit',[
            'model'=>$category,
        ]);
    }

    public function actionCreate()
    {
        $request = yii::$app->request;
        $model = new CategoryForm();
        if($request->isPost && $model->load(Yii::$app->request->post()) && $model->create()){
            return $this->redirect('/admin/category/index');
        }
        return $this->render('create',[
            'model'=>$model,
        ]);


    }

    public function actionRemove($id)
    {
        $id = $id ?: $_GET['id'];
        Category::removeById($id);
        return $this->redirect('/admin/category/index');
    }

}
