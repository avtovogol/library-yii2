<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_author}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property TblBook[] $tblBooks
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_author}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBooks()
    {
        return $this->hasMany(TblBook::className(), ['author_id' => 'id']);
    }
}
