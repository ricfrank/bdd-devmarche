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
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given a conference named :arg1 with :arg2 track
     */
    public function aConferenceNamedWithTrack($arg1, $arg2)
    {

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

    /**
     * @Given a conference named :arg1 with :arg2 tracks
     */
    public function aConferenceNamedWithTracks($arg1, $arg2)
    {
    }

    /**
     * @When I try to choose the :arg1 talk for my personal schedule of this conference
     */
    public function iTryToChooseTheTalkForMyPersonalScheduleOfThisConference($arg1)
    {
    }

    /**
     * @Then I should be told that slot is already taken by another talk  Scenarios in ubiquitous language
     */
    public function iShouldBeToldThatSlotIsAlreadyTakenByAnotherTalkScenariosInUbiquitousLanguage()
    {
    }
}
