<?php

/**
 * Class Conference
 */
class Conference
{
    private $name;

    private $tracks;

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
}
