<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Loans */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="loans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'id' => [
                'label' => 'Номер платежа',
                'value' => function ($model) {
                    return $model->id;
                },
            ],
            'curent_date',
            'nextDatPaid' => [
                'label' => 'Дату платежа',
                'value' => function ($model) {
                    return $model->getNextDataPaid();
                },
            ],
            'repayedSumma' => [
                'format'=> ['decimal',2],
                'label' => 'Общую сумма платежа',
                'value' => function ($model) {
                    return $model->getRepayedSumma();
                },
            ],
            'repayedPercent' => [
                'format'=> ['decimal',2],
                'label' => 'Сумму погашаемых процентов',
                'value' => function ($model) {
                    return $model->getRepayedPercent();
                },
            ],
            'repayedMain' => [
                'format'=> ['decimal',2],
                'label' => 'Сумму погашаемого основного долга',
                'value' => function ($model) {
                    return $model->getRepayedMain();
                },
            ],
            'restLoan' => [
                'format'=> ['decimal',2],
                'label' => 'Остаток основного долга по займу на текущую дату (дату платежа)',
                'value' => function ($model) {
                    return $model->getRestLoan();
                },
            ],
            'summa',
            'duration',
            'projent_year',
            'created_at',
        ],
    ]) ?>

</div>
