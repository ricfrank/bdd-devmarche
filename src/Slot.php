<?php

/**
 * Class Slot
 */
class Slot
{
    private $schedule;

    public static function fromSchedule($schedule)
    {
        $slot = new self();

        $slot->schedule  = $schedule;

        return $slot;
    }

    public function schedule()
    {
        return $this->schedule;
    }
}
