<?php

namespace spec\Isimmons\Presenter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Mockery;

class PresentableTraitSpec extends ObjectBehavior
{

    function let()
    {
        $this->beAnInstanceOf('spec\Isimmons\Presenter\Foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('spec\Isimmons\Presenter\Foo');
    }

    function it_fetches_a_valid_presenter()
    {
        Mockery::mock('FooPresenter');

        $this->present()->shouldBeAnInstanceOf('FooPresenter');
    }

    function it_throws_up_if_invalid_presenter_is_provided()
    {
        $this->presenter = "Invalid";

        $this->shouldThrow('Isimmons\Presenter\Exceptions\PresenterException')->duringPresent();
    }

    function it_caches_the_presenter_for_future_use()
    {
        Mockery::mock('FooPresenter');

        $one = $this->present();
        $two = $this->present();

        $one->shouldBe($two);
    }
}

class Foo {
    use \Isimmons\Presenter\PresentableTrait;

    public $presenter = 'FooPresenter';
}
