<?php

/**
 * Class YiiFotoramaWidget
 *
 * @author Constantin Chuprik <constantinchuprik@gmail.com>
 *
 * @link https://github.com/kotchuprik/yii-fotorama-widget
 * @link https://github.com/artpolikarpov/fotorama/
 */
class YiiFotoramaWidget extends CWidget
{
    const PACKAGE_ID = 'fotorama';
    const FOTORAMA_CSS_CLASS = 'fotorama';

    /**
     * @var array {@link http://fotorama.io/customize/ Fotorama options}
     */
    public $options = array();

    /**
     * @var string
     */
    public $tagName = 'div';

    /**
     * @var string Fotorama version
     */
    public $version;

    /**
     * @var array
     */
    public $htmlOptions = array();

    private $package = array();

    public function init()
    {
        if (empty($this->version)) {
            throw new YiiFotoramaWidgetException('You must set fotorama version.');
        }

        parent::init();

        if (!empty($this->htmlOptions['class'])) {
            $classes = explode(' ', $this->htmlOptions['class']);
            if (!in_array(self::FOTORAMA_CSS_CLASS, $classes)) {
                $this->htmlOptions['class'] .= ' ' . self::FOTORAMA_CSS_CLASS;
            }
        } else {
            $this->htmlOptions['class'] = self::FOTORAMA_CSS_CLASS;
        }

        foreach ($this->options as $option => $value) {
            $this->htmlOptions['data-' . $option] = $value;
        }

        $this->registerClientScript();
        echo CHtml::openTag($this->tagName, $this->htmlOptions);
    }

    public function run()
    {
        parent::run();

        echo CHtml::closeTag($this->tagName);
    }

    protected function registerClientScript()
    {
        $this->package = array(
            'baseUrl' => '//cdnjs.cloudflare.com/ajax/libs/fotorama/' . $this->version . '/',
            'css' => array('fotorama.css'),
            'js' => array('fotorama.js'),
            'depends' => array('jquery'),
        );

        Yii::app()->getClientScript()->addPackage(self::PACKAGE_ID, $this->package);
        Yii::app()->getClientScript()->registerPackage(self::PACKAGE_ID);
    }
}

class YiiFotoramaWidgetException extends Exception
{

}
