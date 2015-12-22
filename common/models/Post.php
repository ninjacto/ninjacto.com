<?php
namespace common\models;

use creocoder\taggable\TaggableBehavior;
use yii\behaviors\SluggableBehavior;
use common\models\base\Post as PostBase;
use yii\imagine\Image;
use Imagine\Image\Box;

class Post extends PostBase
{
    public $tagValues;

    public function behaviors()
    {
        return [
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagValuesAsArray' => false,
                'tagRelation' => 'tags',
                'tagValueAttribute' => 'title',
                'tagFrequencyAttribute' => 'frequency',
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'body', 'slug'], 'required'],
            [['user_id', 'is_lts'], 'integer'],
            [['body'], 'string'],
            [['published_at', 'indexed_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'keyword'], 'string', 'max' => 255],
            [['poster'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => ['create']],
            [['description'], 'string', 'max' => 160],
            [['tagValues'], 'safe'],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = \Yii::getAlias('@frontend/web/uploads/posters/') . $this->id . '.' . $this->poster->extension;
            if(file_exists($path))
                unlink($path);
            $this->poster->saveAs($path);
            $this->createPoster($path);
            $this->poster = $this->id . '.' . $this->poster->extension;
            $this->save();
            return true;
        } else {
            return false;
        }
    }

    public function getCategoriesName()
    {
        $names = [];
        foreach($this->categories as $category)
            $names[] = $category->title;
        return $names;
    }

    public static function getLatest($limit)
    {
        return self::find()->orderBy('created_at DESC')->limit($limit)->all();
    }

    public static function find()
    {
        return new \common\models\base\PostQuery(get_called_class());
    }

    function createPoster($imageName)
    {
        $newWidth=1980;
        $newHeight=562;

        $mime = getimagesize($imageName);

        if($mime['mime']=='image/png'){ $src_img = imagecreatefrompng($imageName); }
        if($mime['mime']=='image/jpg'){ $src_img = imagecreatefromjpeg($imageName); }
        if($mime['mime']=='image/jpeg'){ $src_img = imagecreatefromjpeg($imageName); }
        if($mime['mime']=='image/pjpeg'){ $src_img = imagecreatefromjpeg($imageName); }

        $old_x = imageSX($src_img);
        $old_y = imageSY($src_img);

        if($old_x > $old_y)
        {
            $thumb_w    =   $newWidth;
            $thumb_h    =   $old_y/$old_x*$newWidth;
        }

        if($old_x < $old_y)
        {
            $thumb_w    =   $old_x/$old_y*$newHeight;
            $thumb_h    =   $newHeight;
        }

        if($old_x == $old_y)
        {
            $thumb_w    =   $newWidth;
            $thumb_h    =   $newHeight;
        }

        $dst_img        =   ImageCreateTrueColor($thumb_w,$thumb_h);

        imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

        if($mime['mime']=='image/png'){ $result = imagepng($dst_img,$imageName,8); }
        if($mime['mime']=='image/jpg'){ $result = imagejpeg($dst_img,$imageName,80); }
        if($mime['mime']=='image/jpeg'){ $result = imagejpeg($dst_img,$imageName,80); }
        if($mime['mime']=='image/pjpeg'){ $result = imagejpeg($dst_img,$imageName,80); }

        imagedestroy($dst_img);
        imagedestroy($src_img);

        if($thumb_w != $newWidth)
            Image::crop($imageName,$newWidth,$newHeight,[(($thumb_w-$newWidth)/2),0])->save($imageName, ['quality' => 80]);
        if($thumb_h != $newHeight)
            Image::crop($imageName,$newWidth,$newHeight,[0,(($thumb_h-$newHeight)/2)])->save($imageName, ['quality' => 80]);
    }
}