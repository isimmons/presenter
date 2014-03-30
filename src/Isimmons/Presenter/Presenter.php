<?php namespace Isimmons\Presenter;

abstract class Presenter {

    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }


    public function __get($property)
    {
        if(method_exists($this, $property))
            return $this->{$property}();

        return $this->entity->{$property};
    }

    public function __call($method, $args)
    {
        if(method_exists($method))
        {
            call_user_func_array($method, [$args]);
        }
    }
}
