<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id 文章自增id
 * @property int $pid 文章分类id
 * @property int $type 类型.0文章,1单页
 * @property string $title 文章标题
 * @property string $sub_title 用户名
 * @property string $summary 文章概要
 * @property string $thumb 缩略图
 * @property string $seo_title seo标题
 * @property string $seo_keywords seo关键字
 * @property string $seo_description seo描述
 * @property int $status 状态.0草稿,1发布
 * @property int $sort 排序
 * @property int $author_id 发布文章管理员id
 * @property string $author_name 发布文章管理员用户名
 * @property int $scan_count 浏览次数
 * @property int $comment_count 评论次数
 * @property int $can_comment 是否可评论.0否,1是
 * @property int $visibility 文章可见性.1.公开,2.评论可见,3.加密文章,4.登录可见
 * @property string $password 文章明文密码
 * @property int $flag_headline 头条.0否,1.是
 * @property int $flag_recommend 推荐.0否,1.是
 * @property int $flag_slide_show 幻灯.0否,1.是
 * @property int $flag_special_recommend 特别推荐.0否,1.是
 * @property int $flag_roll 滚动.0否,1.是
 * @property int $flag_bold 加粗.0否,1.是
 * @property int $flag_picture 图片.0否,1.是
 * @property string $template 文章模板
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'title', 'created_at'], 'required'],
            [['pid', 'type', 'status', 'sort', 'author_id', 'scan_count', 'comment_count', 'can_comment', 'visibility', 'flag_headline', 'flag_recommend', 'flag_slide_show', 'flag_special_recommend', 'flag_roll', 'flag_bold', 'flag_picture', 'created_at', 'updated_at'], 'integer'],
            [['template'], 'string'],
            [['title', 'sub_title', 'summary', 'thumb', 'seo_title', 'seo_keywords', 'seo_description', 'author_name', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */

    public static function getAll()
    {
        return self::find()->orderBy("sort asc,pid asc")->asArray()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app', 'Category Id'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'sub_title' => Yii::t('app', 'Sub Title'),
            'summary' => Yii::t('app', 'Summary'),
            'content' => Yii::t('app', 'Content'),
            'thumb' => Yii::t('app', 'Thumb'),
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_keywords' => Yii::t('app', 'Seo Keyword'),
            'seo_description' => Yii::t('app', 'Seo Description'),
            'status' => Yii::t('app', 'Status'),
            'can_comment' => Yii::t('app', 'Can Comment'),
            'visibility' => Yii::t('app', 'Visibility'),
            'sort' => Yii::t('app', 'Sort'),
            'tag' => Yii::t('app', 'Tag'),
            'author_id' => Yii::t('app', 'Author Id'),
            'author_name' => Yii::t('app', 'Author'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'flag_headline' => Yii::t('app', 'Is Headline'),
            'flag_recommend' => Yii::t('app', 'Is Recommend'),
            'flag_special_recommend' => Yii::t('app', 'Is Special Recommend'),
            'flag_slide_show' => Yii::t('app', 'Is Slide Show'),
            'flag_roll' => Yii::t('app', 'Is Roll'),
            'flag_bold' => Yii::t('app', 'Is Bold'),
            'flag_picture' => Yii::t('app', 'Is Picture'),
            'template' => Yii::t('app', 'Article Template'),
            'password' => Yii::t('app', 'Password'),
            'scan_count' => Yii::t('app', 'Scan Count'),
            'comment_count' => Yii::t('app', 'Comment Count'),
            'category' => Yii::t('app', 'Category'),
            'images' => Yii::t('app', 'Article Images'),
        ];
    }
}
