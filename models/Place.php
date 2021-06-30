<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property int $id
 * @property string $place_id
 * @property string $lat
 * @property string $lang
 * @property string $country_code
 * @property int $is_country
 *
 * @property PlaceLang[] $FromplaceLangs
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place_id', 'lat', 'lang', 'country_code', 'is_country'], 'required'],
            [['is_country'], 'integer'],
            [['place_id', 'lat', 'lang'], 'string', 'max' => 45],
            [['country_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'lat' => Yii::t('app', 'Lat'),
            'lang' => Yii::t('app', 'Lang'),
            'country_code' => Yii::t('app', 'Country Code'),
            'is_country' => Yii::t('app', 'Is Country'),
        ];
    }

    /**
     * Gets query for [[PlaceLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFromPlaceLangs()
    {
        return $this->hasMany(PlaceLang::className(), ['place_id' => 'id']);
    }
}
