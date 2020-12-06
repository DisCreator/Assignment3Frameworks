<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\PageController_Command_Abstract;
use Quwius\Framework\Registry;
use Quwius\Framework\View;

class LogoutController extends PageController_Command_Abstract{
	private $data = null;

	protected function makeModel () :Observable_Model{
		return new Observable_Model();
	}
	protected function makeView() : View{
		return new View();
	}

	public function run(){
		$reg = Registry::instance();
		$session = $reg->getSession();
		$session->destroy();
		header('Location: index.php');
	}

	public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}
