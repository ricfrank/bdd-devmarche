<?php

/**
 * Class Talk
 */
class Talk
{
    private $title;

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
}
