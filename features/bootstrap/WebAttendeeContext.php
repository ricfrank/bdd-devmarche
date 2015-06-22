<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Mink\Driver\BrowserKitDriver;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use Symfony\Component\HttpKernel\Client;

/**
 * Defines application features from the specific context.
 */
class WebAttendeeContext implements Context, SnippetAcceptingContext
{
    /**
     * @var Mink
     */
    private $mink;

    /**
     * @var ConferencePlanner
     */
    private $conferencePlanner;

    /**
     * @var Conference
     */
    private $conference;

    /**
     * @beforeScenario
     */
    public function setup()
    {
        $app = new Application();
        $app['debug'] = true;
        unset($app['exception_handler']);

        $this->mink = new Mink(array(
            'silex' => new Session(new BrowserKitDriver(new Client($app))),
        ));

        $this->mink->setDefaultSessionName('silex');

        $app['db']->executeQuery('TRUNCATE conference');
        $app['db']->executeQuery('TRUNCATE talk');
        $app['db']->executeQuery('TRUNCATE conference_talks');
        $this->conferencePlanner = new ConferencePlanner($app['db']);
    }

    /**
     * @Given a conference named :name with :count track was planned
     */
    public function aConferenceNamedWithTrack($name, $count)
    {
        $this->conference = Conference::namedWithTracks($name, $count);
        $this->conferencePlanner->planConference($this->conference);
    }

    /**
     * @Given the :talk talk is scheduled for :slot slot on the conference track :track
     */
    public function theTalkIsScheduledForSlotOnTheConferenceTrack($talk, $slot, $track)
    {
        $talk = Talk::titled($talk);
        $slot = Slot::fromSchedule($slot);
        $track = Track::numbered($track);

        $this->conferencePlanner->scheduleTalkForConference($talk, $slot, $track, $this->conference);
    }

    /**
     * @When I choose the :talk talk for my personal schedule of this conference
     */
    public function iChooseTheTalkForMyPersonalScheduleOfThisConference($talk)
    {
        $this->mink
            ->getSession()
            ->visit('/conferences/' . urlencode($this->conference->name()));

        assertEquals(200, $this->mink->getSession()->getStatusCode());

        $this->mink
            ->getSession()
            ->getPage()
            ->pressButton('Add to my schedule');
    }

    /**
     * @Then the chosen talk for :arg1 slot of my schedule should be the :arg2
     */
    public function theChosenTalkForSlotOfMyScheduleShouldBeThe($slot, $talk)
    {
        $talkElement = $this->mink
            ->getSession()
            ->getPage()
            ->find('css', '.my-schedule .talk:contains("' . $talk . '")');

        assertContains($talk, $talkElement->getText());
        assertContains($slot, $talkElement->getText());
    }
}
