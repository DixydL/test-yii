<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\datetime\DateTimePicker;
 
// Usage with model and Active Form (with no default initial value)
/* @var $this yii\web\View */
/* @var $model app\models\Loans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'curent_date')->widget(DateTimePicker::class, [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>
    
    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'projent_year')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
