<?php 
namespace Core;
use Exception;
class Container {
    protected $bindings = [];

    public function bind($key, $resolver) {
        $this->bindings[$key]=$resolver;
    }
    public function resolve($key) {
        if(array_key_exists($key, $this->bindings)) {
            $resolver = $this->bindings[$key];
            return call_user_func($resolver);
        }else throw new Exception("Binding $key does'nt exist");
        
    }
}

?>