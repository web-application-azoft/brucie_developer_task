<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Modules\shipping\models\PossibleWeights */

$this->title = 'Update Possible Weights: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Possible Weights', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="possible-weights-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
