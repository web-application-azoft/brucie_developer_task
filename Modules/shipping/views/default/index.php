<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
            'id' => 'shipping-form',
            'options' => ['class' => 'form-horizontal'],
        ])
?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= $form->field($model, 'package')->textInput(['autofocus' => true, 'placeholder' => "Enter ordered bananas count separated by comma(',' symbol). Example:'1,250,251,501,12000' "]) ?>
    </div>
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Get packages', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<table border="1">
    <tr>
        <TH rowspan="2">Ordered bananas count</TH>
        <TH colspan="<?= ($results ? count($results[0]['banknotes']) : 1) ?>">Package weight</TH>
        <TH rowspan="2">Sended bananas count</TH>
        <TH rowspan="2">Sended packages count</TH>
    </tr>
    <tr>
        <?php
        if ($results && $results[0]) {
            foreach ($results[0]['banknotes'] as $v) {
                echo '<TH>' . $v . '</TH>';
            }
        }
        ?>
    </tr>
    <?php
    if ($results) {
        foreach ($results as $r) {
            ?>
            <?php
            echo '<TR>';
            echo '<TD>' . $r['orderedCount'] . '</TD>';
            foreach ($r['vector'] as $v) {
                echo '<TD>' . $v . '</TD>';
            }
            echo '<TD>' . $r['bananasToSend'] . '</TD>';
            echo '<TD>' . $r['packageCount'] . '</TD>';
            echo '</TR>';
            ?>
            <?php
        }
    }
    ?>
</table>
<?php ActiveForm::end() ?>
