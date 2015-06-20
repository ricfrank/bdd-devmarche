<?php

interface ConferencePlanner
{
    public function planConference(Conference $conference);

    public function scheduleTalkForConference(Talk $talk, Slot $slot, Track $track, Conference $conference);
}