<?php

use Silex\Application as Silex;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;

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

        $app->post(
            '/my-schedule', function (Request $request) use ($app) {
            $conferenceName = $request->get('conference');
            $talkTitle = $request->get('talk');

            $conferencePlanner = new ConferencePlanner($app['db']);
            $conference = $conferencePlanner->findNamed($conferenceName);

            $mySchedule = PersonalSchedule::ofConference($conference);
            $mySchedule->chooseTalk($conference->findTitled($talkTitle));

            return $app['twig']->render('my-schedule.html.twig', array('mySchedule' => $mySchedule));
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