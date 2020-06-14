<?php

namespace app\models;

use yii\db\ActiveRecord;
use DateTime;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "loans".
 *
 * @property int $id
 * @property string|null $curent_date
 * @property float|null $summa
 * @property int|null $duration
 * @property float|null $projent_year
 * @property string|null $created_at
 */
class Loans extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curent_date', 'created_at'], 'safe'],
            [['summa', 'projent_year'], 'number'],
            [['duration'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curent_date' => 'Начальная дата',
            'summa' => 'Cума',
            'duration' => 'Срок займа (в месяцах)',
            'projent_year' => 'Годовая процентная ставка',
            'created_at' => 'Создание',
        ];
    }

    public function getDifMouth(): int
    {
        $dateCurrent = new DateTime();
        $dateCreated = new DateTime($this->curent_date);
        $interval = $dateCurrent->diff($dateCreated);

        return (int)$interval->format('%m');
    }

    public function getNextDataPaid()
    {
        $dateCreated = new DateTime($this->curent_date);
        $intervalMoth = $this->getDifMouth() + 1;
        $dateCreated->modify("+ $intervalMoth month");
        return $dateCreated->format('Y-m-d');
    }

    public function getRepayedSumma()
    {
        return $this->getRepayedMain() + $this->getRepayedPercent();
    }

    public function getRepayedPercent()
    {
        return ($this->summa/100) * ($this->projent_year/12);
    }

    public function getRepayedMain()
    {
        return $this->summa/$this->duration;
    }

    public function getRestLoan()
    {
        return $this->summa - ($this->getDifMouth() * $this->getRepayedSumma());
    }
}
