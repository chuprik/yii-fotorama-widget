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
	/**
	 * Assets package ID
	 */
	const PACKAGE_ID = 'fotorama';

	const FOTORAMA_VERSION = '4.3.0';

	/**
	 * @var string
	 */
	public $tagName = 'div';

	/** @var string */
	public $selector = null;

	/**
	 * @var array {@link http://fotorama.io/customize/ fotorama options}
	 */
	public $options = array();

	/**
	 * @var array
	 */
	public $htmlOptions = array();

	/**
	 * @var bool
	 */
	public $useCdn = false;

	private $_defaultHtmlOptions = array(
		'class' => 'fotorama',
	);

	private $_package = array();

	public function init()
	{
		parent::init();

		if ($this->selector !== null) {
			unset($this->_defaultHtmlOptions['class']);
		}

		if ($this->selector === null) {
			foreach ($this->options as $option => $value) {
				$option = 'data-' . $option;
			}
			$this->htmlOptions = CMap::mergeArray($this->_defaultHtmlOptions, $this->htmlOptions, $this->options);
		} else {
			$this->htmlOptions = CMap::mergeArray($this->_defaultHtmlOptions, $this->htmlOptions);
		}

		$this->_registerClientScript();
		echo CHtml::openTag($this->tagName, $this->htmlOptions);
	}

	public function run()
	{
		parent::run();

		echo CHtml::closeTag($this->tagName);
	}

	protected function _registerClientScript()
	{
		$this->_fillPackage();

		Yii::app()->getClientScript()->registerPackage(self::PACKAGE_ID);

		if ($this->selector !== null) {
			Yii::app()->getClientScript()->registerScript($this->id,
					'$(\'' . $this->selector . '\').fotorama(' . CJSON::encode($this->options) . ');');
		}
	}

	protected function _fillPackage()
	{
		$this->_package = array(
			'css' => array('fotorama.css'),
			'js' => array('fotorama.js'),
			'depends' => array('jquery'),
		);

		if ($this->useCdn) {
			$this->_package['baseUrl'] = 'http://fotorama.s3.amazonaws.com/' . self::FOTORAMA_VERSION . '/';
		} else {
			$this->_package['baseUrl'] = $this->_getAssetsUrl();
		}

		Yii::app()->getClientScript()->addPackage(self::PACKAGE_ID, $this->_package);
	}

	protected function _getAssetsUrl()
	{
		return Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets');
	}
}
