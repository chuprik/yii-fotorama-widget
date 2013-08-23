# yii-fotorama-widget

`YiiFotoramaWidget` is a wrapper for [Fotorama](http://fotorama.io/), a simple, stunning, powerful jQuery gallery.

## Usage

Call the widget:

```php
<?php $this->beginWidget('ext.yii-fotorama-widget.YiiFotoramaWidget'); ?>
    <img src="/img/1.jpg"/>
    <img src="/img/2.jpg"/>
    <img src="/img/3.jpg"/>
<?php $this->endWidget(); ?>
```

Or call the widget with Fotorama [options](http://fotorama.io/customize/):

```php
<?php $this->beginWidget('ext.yii-fotorama-widget.YiiFotoramaWidget', array(
    'selector' => '#fotorama',
    'options' => array(
        'nav' => 'thumbs',
    ),
    'htmlOptions' => array(
        'id' => '#fotorama',
        'class' => 'myFotoramaCssClass',
    ),
)); ?>
    <img src="/img/1.jpg"/>
    <img src="/img/2.jpg"/>
    <img src="/img/3.jpg"/>
<?php $this->endWidget(); ?>
```
