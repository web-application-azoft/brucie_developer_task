<?php

namespace app\Modules\shipping\controllers;

use app\Modules\shipping\models\ShippingForm;
use yii\web\Controller;

/**
 * Default controller for the `shipping` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new ShippingForm();
        
        $results=null;
        
        if ($model->load(\Yii::$app->request->post())) {
            $results=$model->calculate();
        }
        
        return $this->render('index', [
            'model' => $model,
            'results' => $results,
        ]);
        
    }
}
