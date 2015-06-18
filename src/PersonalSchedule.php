<?php

/**
 * Class PersonalSchedule
 */
class PersonalSchedule
{

    /**
     * @var Conference
     */
    private $conference;

    /**
     * @var array
     */
    private $talks = [];

    /**
     * @param Conference $conference
     * @return PersonalSchedule
     */
    public static function ofConference(Conference $conference)
    {
        $schedule = new self();
        $schedule->conference = $conference;

        return $schedule;
    }

    /**
     * @param Talk $talk
     */
    public function chooseTalk(Talk $talk)
    {
        $this->talks[] = $talk;
    }
}