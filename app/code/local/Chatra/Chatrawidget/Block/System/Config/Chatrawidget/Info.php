<?php

class Chatra_Chatrawidget_Block_System_Config_Chatrawidget_Info
		extends Mage_Adminhtml_Block_Abstract
		implements Varien_Data_Form_Element_Renderer_Interface
{

	public function render(Varien_Data_Form_Element_Abstract $element)
	{
		$widget_code = Mage::getStoreConfig('chatrawidget/' . 'option' .  '/' . 'widget_code');
		if(!isset($widget_code) or trim($widget_code) == ''){
			$html = '<p>
						Signup for a free Chatra account at <a href="http://app.chatra.io/?utm_source=magento" target="_blank">app.chatra.io</a>,<br>
						then copy and paste Widget code from Setup & Customize into the form below:
					</p>';
		}else{
			$html = '<p>
						Seems like everything is OK!<br>
						Check your <a href="/" target="_blank">website</a> to see if the live chat widget is present.<br>
						Log in to your <a href="http://app.chatra.io/?utm_source=magento" target="_blank">Chatra dashboard</a> to chat with your website visitors and manage preferences.
					</p>';
		}
		return $html;
	}
}
