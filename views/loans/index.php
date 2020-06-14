<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loans-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Loans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id' => [
                'label' => 'Номер платежа',
                'value' => function ($data) {
                    return $data->id;
                },
            ],
            'curent_date',
            'nextDatPaid' => [
                'label' => 'Дату платежа',
                'value' => function ($data) {
                    return $data->getNextDataPaid();
                },
            ],
            'repayedSumma' => [
                'format'=> ['decimal',2],
                'label' => 'Общую сумма платежа',
                'value' => function ($data) {
                    return $data->getRepayedSumma();
                },
            ],
            'repayedPercent' => [
                'format'=> ['decimal',2],
                'label' => 'Сумму погашаемых процентов',
                'value' => function ($data) {
                    return $data->getRepayedPercent();
                },
            ],
            'repayedMain' => [
                'format'=> ['decimal',2],
                'label' => 'Сумму погашаемого основного долга',
                'value' => function ($data) {
                    return $data->getRepayedMain();
                },
            ],
            'restLoan' => [
                'format'=> ['decimal',2],
                'label' => 'Остаток основного долга по займу на текущую дату (дату платежа)',
                'value' => function ($data) {
                    return $data->getRestLoan();
                },
            ],
            'summa',
            'duration',
            'projent_year',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
