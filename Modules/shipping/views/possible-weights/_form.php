<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Modules\shipping\models\PossibleWeights */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="possible-weights-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
