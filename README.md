# yii-fotorama-widget

`YiiFotoramaWidget` is a wrapper for the [Fotorama](http://fotorama.io/).

## Usage

Call the widget:

```php
<?php $this->beginWidget('ext.yii-fotorama-widget.YiiFotoramaWidget', array(
    // you must specify the version (available versions http://cdnjs.com/libraries/fotorama)
    'version' => '4.5.1',
)); ?>
    <img src="/img/1.jpg"/>
    <img src="/img/2.jpg"/>
    <img src="/img/3.jpg"/>
<?php $this->endWidget(); ?>
```

Or call the widget with Fotorama [options](http://fotorama.io/customize/):

```php
<?php $this->beginWidget('ext.yii-fotorama-widget.YiiFotoramaWidget', array(
    'version' => '4.5.1',
    'options' => array(
        'nav' => 'thumbs',
    ),
    'htmlOptions' => array(
        'class' => 'anotherCssClass',
    ),
)); ?>
    <img src="/img/1.jpg"/>
    <img src="/img/2.jpg"/>
    <img src="/img/3.jpg"/>
<?php $this->endWidget(); ?>
```
