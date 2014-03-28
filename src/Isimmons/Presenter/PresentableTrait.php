<?php namespace Isimmons\Presenter;

use Isimmons\Presenter\Exceptions\PresenterException;

trait PresentableTrait {

    protected $presenterInstance;

    /**
    * Returns an instance of a presenter
    *
    * @return mixed
    * @throws Exceptions\PresenterException
    */
    public function present()
    {
        if( ! $this->presenter or ! class_exists($this->presenter))
            throw new PresenterException('Please set the protected $presenter property to your presenter path.');

        if( ! isset($this->presenterInstance))
            $this->presenterInstance = new $this->presenter($this);

        return $this->presenterInstance;
    }
}
