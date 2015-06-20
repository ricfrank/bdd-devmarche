<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class WebAttendeeContext implements Context, SnippetAcceptingContext
{
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
     * @Given the :arg1 talk is scheduled for :arg2 slot on the conference track :arg3
     */
    public function theTalkIsScheduledForSlotOnTheConferenceTrack($arg1, $arg2, $arg3)
    {
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
