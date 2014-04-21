# yii-fotorama-widget

The `YiiFotoramaWidget` is the wrapper for the [Fotorama](http://fotorama.io/).

## Usage

To call the widget you should use:

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

To call the widget with the Fotorama [options](http://fotorama.io/customize/) you should use:

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
