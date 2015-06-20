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
     * @beforeScenario
     */
    public function initMink()
    {
        $app = new Application();
        $app['debug'] = true;
        unset($app['exception_handler']);

        $this->mink = new Mink(array(
            'silex' => new Session(new BrowserKitDriver(new Client($app))),
        ));

        $this->mink->setDefaultSessionName('silex');
    }

    /**
     * @var Conference
     */
    private $conference;

    /**
     * @Given a conference named :name with :count track
     */
    public function aConferenceNamedWithTrack($name, $count)
    {
        $this->conference = Conference::namedWithTracks($name, $count);
    }

    /**
     * @Given the :talk talk is scheduled for :slot slot on the conference track :track
     */
    public function theTalkIsScheduledForSlotOnTheConferenceTrack($talk, $slot, $track)
    {
        $talk = Talk::titled($talk);
        $slot = Slot::fromSchedule($slot);
        $track = Track::numbered($track);

        $this->conference->scheduleTalk($talk, $slot, $track);
    }

    /**
     * @When I choose the :arg1 talk for my personal schedule of this conference
     */
    public function iChooseTheTalkForMyPersonalScheduleOfThisConference($arg1)
    {
    }

    /**
     * @Then the chosen talk for :arg1 slot of my schedule should be the :arg2
     */
    public function theChosenTalkForSlotOfMyScheduleShouldBeThe($arg1, $arg2)
    {
    }
}
