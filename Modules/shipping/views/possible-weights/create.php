<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Modules\shipping\models\PossibleWeights */

$this->title = 'Create Possible Weights';
$this->params['breadcrumbs'][] = ['label' => 'Possible Weights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="possible-weights-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
