<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//echo "<PRE>";
//var_dump($results[0]);
//echo "</PRE>";
//die();
$form = ActiveForm::begin([
    'id' => 'shipping-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'package')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Get packages', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <table border="1">
        <tr>
            <TH rowspan="2">Ordered bananas count<TH>
            <TH colspan="<?= count($results[0]['banknotes']) ?>">Package weight<TH>
            <TH rowspan="2">Sended bananas count<TH>
            <TH rowspan="2">Sended packages count<TH>
        </tr>
        <tr>
            <?php
            if ($results) {
                foreach ($results[0]['banknotes'] as $v) {
                    echo '<TH>' . $v . '</TH>';
                }
            }
            ?>
        </tr>

    </table>
<?php ActiveForm::end() ?>
