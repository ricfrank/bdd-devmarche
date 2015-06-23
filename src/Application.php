<?php

use Silex\Application as Silex;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

class Application extends Silex
{
    public function __construct()
    {
        parent::__construct();

        $this->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__.'/../views',
        ));

        $this->registerDoctrine($this);

        $this->defineControllers($this);
    }

    /**
     *
     */
    private function defineControllers(Silex $app)
    {
        $app->get(
            '/conferences/{name}', function ($name) use ($app) {

                $conferencePlanner = new ConferencePlanner($app['db']);
                $conference = $conferencePlanner->findNamed(urldecode($name));

                return $app['twig']->render(
                    'conference.html.twig',
                    array(
                        'conference' => $conference
                    )
                );
            }
        );

    }

    private function registerDoctrine(Application $app)
    {
        $app->register(
            new DoctrineServiceProvider(),
            array(
                'db.options' => array(
                    'driver' => 'pdo_mysql',
                    'user' => 'root',
                    'password' => '',
                    'dbname' => 'bdd',
                ),
            )
        );
    }
}