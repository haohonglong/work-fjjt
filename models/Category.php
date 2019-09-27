<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $pid
 * @property string $name
 * @property int $sort
 * @property int $created_at
 * @property int $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */

    public static function getAll()
    {
        return self::find()->orderBy("sort asc,pid asc")->asArray()->all();
    }

    public static function getAllMap($data=[])
    {
        $data = $data ?: self::getAll();
        return ArrayHelper::map($data, 'id', 'name');
    }



    public static function getCategoriesName()
    {
        $sql = <<<SQL
            select id,pid,name from category;
SQL;

        $posts = Yii::$app->db->createCommand($sql)
            ->queryAll();

    }

    public static function removeById($id)
    {
        $category = Category::find()->where(['id'=>$id])->limit(1)->one();
        if($category->delete()){
            return true;
        }
        return false;
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'name' => 'Name',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
