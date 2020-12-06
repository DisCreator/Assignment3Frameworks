<?php
namespace Quwius\Framework;
class FrontController extends FrontController_Abstract{
	
	public static function run(){
		$controller = new FrontController();
 		$controller->init();
 		$controller->handleReq();
	}

	//Method to initialize helper objects
	protected function init(){
		SessionClass::create();

	}

	protected function handleReq(){
		$context = new CommandContext();

		$handler = RequestHandlerFactory::getRequestHandler($_SERVER['REQUEST_URI']);
		
		if($handler->execute($context)===false){
			//response handles here
		}
	}
}
