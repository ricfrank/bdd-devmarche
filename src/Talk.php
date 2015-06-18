<?php

/**
 * Class Talk
 */
class Talk
{
    private $title;

    private $scheduledAt;

    /**
     * @param $title
     *
     * @return Talk
     */
    public static function titled($title)
    {
        $talk = new self();

        $talk->title = $title;

        return $talk;


    }

    public function scheduledAt()
    {
        return $this->scheduledAt;
    }

    public function schedule(Slot $slot)
    {
        $this->scheduledAt = $slot->schedule();
    }

    public function scheduledAtConference(Conference $conference)
    {
        return $conference->findTalk($this);
    }

    public function title()
    {
        return $this->title;
    }
}
