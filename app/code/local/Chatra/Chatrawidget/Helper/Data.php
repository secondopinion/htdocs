    <?php

class Chatra_Chatrawidget_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getConfig($field, $section = 'option', $default = null){
		$value = Mage::getStoreConfig('chatrawidget/' .$section .  '/' . $field);
		if(!isset($value) or trim($value) == ''){
			return $default;
		}else{
			return $value;
		}
	}

	public function log($data){
		if(!$this->getConfig('enable_log')){
			return;
		}
		if(is_array($data) || is_object($data)){
			$data = print_r($data, true);
		}
		Mage::log($data, null, 'chatrawidget.log');
	}

	public function getWidgetCode(){
		$widget_code=$this->getConfig('widget_code');
		return $widget_code;
	}
}
