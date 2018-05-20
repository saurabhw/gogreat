<?php 
	/*Editor: Willy Shih
	 *started 10/5/14
	 *last updated 10/5/14
	 *
	 *This module is for the Login and registration for VP or Customers
	 */
	
	if (!defined('_PS_VERSION_')) 
		exit; 
			
	class greatmoodslogin extends Module { //class = name of file with capital letters
		
		public function __construct() { 

			$this->name = 'greatmoodslogin'; //name of file
			$this->tab = 'front_office_features';
			$this->version = '1.0'; 
			$this->author = 'Willy Shih'; 
			$this->need_instance = 0; 
			$this->ps_versions_compliancy = array('min' => '1.5.6.1', 'max' => '1.6.0.8'); //presta shop version in use
			//$this->dependencies = array('blockcart');  //not sure what this line does/ if it is important or not
			parent::__construct(); 

			$this->displayName = $this->l('Account Setup'); //This line indicates how the name of the module shall be displayed
			$this->description = $this->l('This module will be used to log in and registration'); //describe what the module does
			$this->confirmUninstall = $this->l('Are you sure you want to uninstall?'); //echo the message the user will recieve when they try to uninstall this module.
			if (!Configuration::get('MYMODULE_NAME')) 
				$this->warning = $this->l('No name provided'); 
		} 
		
		//Code mostly supplied from repository
		public function install() {                
            if (Shop::isFeatureActive())
                Shop::setContext(Shop::CONTEXT_ALL);
            
            return parent::install() &&
                $this->registerHook('leftColumn') &&
                $this->registerHook('header') &&
                Configuration::updateValue('MYMODULE_NAME', 'greadmoodslogin'); //name of file
		}
		
		//Code from prestashop's website
		public function uninstall() {
			return parent::uninstall() && Configuration::deleteByName('MYMODULE_NAME');
		}
		
		//Code from prestashop's website
		public function hookDisplayLeftColumn($params)
		{			
		    $this->context->smarty->assign(
				array(
				  'user_name' => $this->context->customer->firstname,
				  //'my_module_link' => $this->context->link->getModuleLink('createnewvp', 'display'),
				  'current_user_id' => $this->context->customer->id_customer
				)
			);
		  return $this->display(__FILE__, 'greatmoodslogin.tpl');
		}
		
		public function hookDisplayHeader()
		{
			$this->context->controller->addCSS($this->_path.'css/gms_vp_form_styles.css', 'all');
			$this->context->controller->addCSS($this->_path.'css/gms_vp_styles.css', 'all');
			$this->context->controller->addJS($this->_path.'js/simpletabs_1.3.js', 'all');
		} 
		
		
		
	} 
	
                
?> 