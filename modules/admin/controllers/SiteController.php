<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class SiteController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->renderPartial('index');
    }

    public function actionMain()
    {
        return $this->render('main');
    }
}
