<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\PageController_Command_Abstract;
use Quwius\Framework\View;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\SessionClass;

class SignUpController extends PageController_Command_Abstract{
	protected $errors = [];
	protected function makeModel(): Observable_Model{
		return new \SignUpModel();
	}

	protected function makeView(): View{
		$view = new View();
		$view->setTemplate(TPL_DIR . '/signup.tpl.php');
		return $view;
	}

	public function run(){
		$this->model= $this->makeModel();
		$this->view= $this->makeView();
		$this->model->attach($this->view);

	}
	
	public function execute(CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}