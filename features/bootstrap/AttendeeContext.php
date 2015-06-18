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
     * @var Conference
     */
    private $conference;

    /**
     * @var PersonalSchedule
     */
    private $mySchedule;

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
     * @When I choose the :talk talk for my personal schedule of this conference
     */
    public function iChooseTheTalkForMyPersonalScheduleOfThisConference($talk)
    {
        $talk = $this->conference->findTitled($talk);
        $this->mySchedule = PersonalSchedule::ofConference($this->conference);
        $this->mySchedule->chooseTalk($talk);
    }

    /**
     * @Then the chosen talk for :slot slot of my schedule should be the :talk
     */
    public function theChosenTalkForSlotOfMyScheduleShouldBeThe($slot, $talk)
    {
        $talk = Talk::titled($talk);
        $slot = Slot::fromSchedule($slot);
        assertTrue($this->mySchedule->isTalkChoosenForSlot($talk, $slot));
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
