<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_book}}".
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 *
 * @property TblAuthor $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_book}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'author_id'], 'required'],
            [['id', 'author_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function getAuthorName()
    {
        $author = $this->author;
        return $author ? $author->name : '';
    }
}
