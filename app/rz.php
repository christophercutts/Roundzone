<?php
/**
 * Created by PhpStorm.
 * User: Clutz
 * Date: 20/02/2015
 * Time: 21:51
 */

function __autoload($class_name) {
    $class_name = 'app' . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $class_name) . '.php';
    if(file_exists($class_name)) {
        include $class_name;
    }
}

class RoundZone {

    static private $_registry = array();

    static function run() {
        if(!$route = (new UrlRoutes)->findRoute(trim($_SERVER['REQUEST_URI'], '/'))) {
             $route = trim($_SERVER['REQUEST_URI'], '/');
        }

        $route = explode('/', $route);
        RoundZone::route($route);

    }

    static function route($route) {

        if(count($route) > 1) {
            $controller = ucwords($route[0]) . "_Controller_" . ucwords($route[0]);
            $action = $route[1] . "Action";

            RoundZone::register('view', $route[0] . "/" . $route[1]);
            if (isset($route[2])) {
                $actionId = $route[2];
            } else {
                $actionId = null;
            }

            if (RoundZone::canAutoload($controller)) {
                (new $controller)->$action($actionId);
            } else {
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
                echo "404";
            }
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
            echo "404";
        }
    }

    static function canAutoload($className) {
        if(class_exists($className)) {
            return true;
        } else {
            return false;
        }
    }

    static function loadLayout($id=false) {
        $blockClass=implode('_Block_',array_map(function($word) { return ucfirst($word); }, explode('/', RoundZone::registry('view'))));
        (new $blockClass)->toHtml($id);
    }

    static function getModel($modelName) {
        if(!strpos($modelName, '/')) {
            $modelName = $modelName . '/' . $modelName;
        }
        $modelClass=implode('_Model_',array_map(function($word) { return ucfirst($word); }, explode('/', $modelName)));

        return new $modelClass;
    }

    /**
     * Register a new variable
      *
      * @param string $key
      * @param mixed $value
      * @param bool $graceful
      */
     public static function register($key, $value, $graceful = false)
     {
         if(isset(self::$_registry[$key])) {
             if ($graceful) {
                return;
             }
         }
         self::$_registry[$key] = $value;
     }

     public static function unregister($key)
     {
         if (isset(self::$_registry[$key])) {
             if (is_object(self::$_registry[$key]) && (method_exists(self::$_registry[$key],'__destruct'))) {
                self::$_registry[$key]->__destruct();
             }
             unset(self::$_registry[$key]);
         }
     }

     /**
      * Retrieve a value from registry by a key
      *
      * @param string $key
      * @return mixed
      */
     public static function registry($key)
     {
         if (isset(self::$_registry[$key])) {
             return self::$_registry[$key];
         }
         return null;
     }

}
class UrlRoutes
{

    public function findRoute($uri)
    {

        $db = new mysqli('localhost', 'roundzone', 'bneVEyqmBudCDYx3', 'roundzone');
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
        $statement = $db->prepare("SELECT `target_uri` FROM `url_route` WHERE `request_uri`= ?");
        $statement->bind_param('s', $uri);
        $statement->execute();
        $statement->bind_result($target_uri);
        $statement->store_result();
        if($statement->fetch()){
            return $target_uri;
        } else {
            return false;
        }
    }
}