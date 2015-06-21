<?php

class ConferencePlanner
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $dbal;

    public function __construct(Doctrine\DBAL\Connection $dbal)
    {
        $this->dbal = $dbal;
    }

    public function planConference(Conference $conference)
    {
        $conferenceName = $conference->name();
        $conferenceTracks = $conference->tracks();

        $this->dbal
            ->executeQuery("INSERT INTO conference (name, tracks) VALUES ('$conferenceName', '$conferenceTracks')");
    }
