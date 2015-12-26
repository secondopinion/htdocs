<?php   
$installer = $this; $installer->startSetup();  
 $installer->
 addAttribute('customer', 'qualification', 
 array( 'label' => 'Qualification', 
 'type' => 'int',
  'input' => 'text',
   'visible' => true, 
  'required' => false, 
  'position' => 9999, ));   $installer->endSetup();

