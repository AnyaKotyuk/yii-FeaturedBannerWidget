# yii-FeaturedBannerWidget
Put widget to directory /frontend/widgets or change namespaces for widget and asset and change sourcepath for assets </br>
Call widget like: </br>
```php
\frontend\widgets\FeaturedBanner\FeaturedBannerWidget::widget([ 
 		'model' => \common\models\Cats::find()->all(), 
                'attributes' => [ 
                    'header' => 'name', 
                    'image' => function($model) { 
                        return Yii::$app->thumbnail->get($model->picture, [400, 300]); 
                    }, 
                    'content' => 'description' 
                ] 
            ]);
            
And you'll get <a href="#">demo</a>