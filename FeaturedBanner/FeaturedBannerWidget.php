<?php
/**
 * ActiveRecord $model required
 * Array $attributes required; format ['image' => 'img', 'header' => 'name', 'content' => 'description']
 */
namespace frontend\widgets\FeaturedBanner;

use yii\base\Widget;

class FeaturedBannerWidget extends Widget
{
    public $model;
    public $default_attributes = ['image' => '', 'header' => '', 'content' => ''];
    public $attributes;
    private $banners = [];

    public function init()
    {
        FeaturedBannerAsset::register($this->getView());
        $attributes = array_intersect_key($this->attributes, $this->default_attributes);

        foreach ($this->model as $model) {
            $this->banners[]= $this->getData($model, $attributes);
        }

        parent::init();
    }

    public function run()
    {
        return $this->render('index', [
            'banners' => $this->banners
        ]);
    }

    /**
     * Change data for our needs
     *
     * @param $item
     * @return array
     */
    private function getData($item, $attributes)
    {
        $result = [];
        foreach ($attributes as $attr => $value) {
            $result[$attr] = '';
            if (is_string($value)) {
                if (!empty($item->$value)) {
                    $result[$attr] = $item->$value;
                }
            } elseif (is_callable($value)) {
                $result[$attr] = $value($item);
            }
        }
        return $result;
    }
}