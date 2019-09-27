<?php


namespace app\models;


use yii\base\Model;

class CategoryForm extends Model
{

    public $name;
    public $pid;
    public $sort;
    public $model;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort'], 'integer'],
            ['pid','default','value'=>0],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    public function create()
    {
        if ($this->validate()) {
            $model = new Category();
            $model->name =$this->name;
            $model->pid =$this->pid ?: 0;
            $model->sort =$this->sort ?: 0;
            $model->created_at = time();
            $model->updated_at = $model->created_at;
            if($model->save()){
                return true;
            }else{
                $this->addError($model->getErrors());
            }

        }
        return false;
    }

    public function edit()
    {
        if ($this->validate()) {
            $model = $this->model;
            $model->name =$this->name;
            $model->pid = $this->pid ?: 0;
            $model->sort =$this->sort;
            $model->updated_at = time();
            if($model->save(false)){
                return true;
            }else{
                $this->addError($model->getErrors());
            }

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