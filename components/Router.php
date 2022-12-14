<?php
/**
 * 
 */
class Router
{
	
	private $routes;

	public function __construct()
	{
		$routesPath=ROOT.'/config/routes.php';
		$this->routes=include($routesPath);
	}

	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI'])){
			RETURN trim($_SERVER['REQUEST_URI'],'/');
		}

	}
	public function run()
	{
		 $uri = $this->getURI();

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, action, параметры

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
              
                //echo $controllerName;
                $controllerName = ucfirst($controllerName);
               // var_dump($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
               // echo $actionName;
                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';
//var_dump($controllerFile);
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;

                /* Вызываем необходимый метод ($actionName) у определенного 
                 * класса ($controllerObject) с заданными ($parameters) параметрами
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;

             }
            }
        }
    }

}