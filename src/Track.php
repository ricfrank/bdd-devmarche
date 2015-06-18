<?php

/**
 * Class Track
 */
class Track
{
    private $number;

    /**
     * @param $number
     *
     * @return Track
     */
    public static function numbered($number)
    {
        $track = new self();

        $track->number = $number;

        return $track;
    }

    public function number()
    {
        return $this->number;
    }
}
