<?php

use Silex\Application as Silex;
use Silex\Provider\TwigServiceProvider;

class Application extends Silex
{
    public function __construct()
    {
        parent::__construct();

        $this->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__.'/../views',
        ));

        $this->defineControllers($this);
    }

    /**
     *
     */
    private function defineControllers(Silex $app)
    {
        $app->get(
            '/conferences/{name}', function ($name) use ($app) {
                return $app['twig']->render(
                    'conference.html.twig',
                    array(
                        'name' => $name,
                    )
                );
            }
        );

    }
}