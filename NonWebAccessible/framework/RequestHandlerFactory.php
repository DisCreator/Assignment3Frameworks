<?php
namespace Quwius\Framework;
class RequestHandlerFactory implements RequestHandlerFactory_Interface{
	public static function getRequestHandler( $request='index') : PageController_Command_Abstract{

		$parse_url = parse_url($request);

		if(empty($parse_url['query'])){
			$parse_url['query'] = 'index';
		}

		$class = "Apps\\handlers\\" . UCFirst(strtolower($parse_url['query'])) . 'Controller';

		$cmd = new $class();
		return $cmd;
	}

}