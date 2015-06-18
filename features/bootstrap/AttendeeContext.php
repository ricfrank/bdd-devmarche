<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class AttendeeContext implements Context, SnippetAcceptingContext
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
     * @Given a conference named :name with :count track
     */
    public function aConferenceNamedWithTrack($name, $count)
    {
        $conference = Conference::namedWithTracks($name, $count);
    }

    /**
     * @Given the :arg1 talk is scheduled for :arg2 slot on the conference track :arg3
     */
    public function theTalkIsScheduledForSlotOnTheConferenceTrack($arg1, $arg2, $arg3)
    {
        throw new PendingException();
    }

    /**
     * @When I choose the :arg1 talk for my personal schedule of this conference
     */
    public function iChooseTheTalkForMyPersonalScheduleOfThisConference($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the chosen talk for :arg1 slot of my schedule should be the :arg2
     */
    public function theChosenTalkForSlotOfMyScheduleShouldBeThe($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given a conference named :arg1 with :arg2 tracks
     */
    public function aConferenceNamedWithTracks($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When I try to choose the :arg1 talk for my personal schedule of this conference
     */
    public function iTryToChooseTheTalkForMyPersonalScheduleOfThisConference($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be told that slot is already taken by another talk  Scenarios in ubiquitous language
     */
    public function iShouldBeToldThatSlotIsAlreadyTakenByAnotherTalkScenariosInUbiquitousLanguage()
    {
        throw new PendingException();
    }
}