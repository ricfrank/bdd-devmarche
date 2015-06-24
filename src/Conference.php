<?php

/**
 * Class Conference
 */
class Conference
{
    private $name;

    private $tracks;

    private $schedule = [];

    /**
     * @param $name
     * @param $tracks
     *
     * @return Conference
     */
    public static function namedWithTracks($name, $tracks)
    {
        $conference = new self();

        $conference->name = $name;
        $conference->tracks = $tracks;

        return $conference;
    }

    public function scheduleTalk(Talk $talk, Slot $slot, Track $track)
    {
        $talk->schedule($slot);
        $this->schedule[$talk->title()] = $talk;
    }

    public function findTitled($talkTitle)
    {
        return $this->schedule[$talkTitle];
    }

    public function name()
    {
        return $this->name;
    }
}
