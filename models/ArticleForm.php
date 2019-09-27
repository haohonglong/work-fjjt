<?php


namespace app\models;


use yii\base\Model;

class ArticleForm extends Model
{

    public $pid
    ,$title
    ,$template
    ,$model
    ,$sort
    ,$sub_title
    ,$summary
    ,$thumb
    ,$cdn
    ,$images
    ,$content
    ,$flag_slide_show
    ,$flag_special_recommend
    ,$flag_roll
    ,$flag_bold
    ,$flag_picture
    ,$seo_title
    ,$seo_keywords
    ,$seo_description
    ,$status
    ,$can_comment
    ,$visibility
    ,$password
    ,$tag
    ,$flag_headline
    ,$flag_recommend;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'title','template'], 'required'],
            [['pid', 'type', 'status', 'sort', 'author_id', 'scan_count', 'comment_count', 'can_comment', 'visibility', 'flag_headline', 'flag_recommend', 'flag_slide_show', 'flag_special_recommend', 'flag_roll', 'flag_bold', 'flag_picture', 'created_at', 'updated_at'], 'integer'],
            [['template'], 'string'],
            [['title', 'sub_title', 'summary', 'thumb', 'seo_title', 'seo_keywords', 'seo_description', 'author_name', 'password'], 'string', 'max' => 255],
        ];
    }
    public function create()
    {
        if ($this->validate()) {
            $model = new Article();
            $model->pid =$this->pid;
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
            $model->pid = $this->pid;
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




}