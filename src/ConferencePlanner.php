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

    public function scheduleTalkForConference(Talk $talk, Slot $slot, Track $track, Conference $conference)
    {
        $conference->scheduleTalk($talk, $slot, $track);

        $this->dbal
            ->executeQuery('INSERT INTO talk (title, scheduledAt) VALUES ("' . $talk->title() . '", "' . $slot->schedule() . '")');

        $talkId = $this->dbal
            ->lastInsertId();

        $conferenceRow = $this->dbal
            ->fetchAssoc('SELECT * FROM conference WHERE name = ?', [$conference->name()]);

        $this->dbal
            ->executeQuery('INSERT INTO conference_talks (id_conference, id_talk, track)
                            VALUES (' . $conferenceRow['id'] . ',  ' . $talkId . ', ' . $track->number() . ')'
            );
    }


    /**
     * @param $conferenceName
     *
     * @return Conference
     */
    public function findNamed($conferenceName)
    {
        $conferenceRow = $this->dbal
            ->fetchAssoc('SELECT * FROM conference WHERE name = ?', [$conferenceName]);

        $conferenceTalks = $this->dbal
            ->fetchAll(
                'SELECT * FROM conference_talks JOIN talk ON talk.id = id_talk WHERE id_conference = ?',
                [$conferenceRow['id']]
            );

        $conference = Conference::namedWithTracks($conferenceName, $conferenceRow['tracks']);

        foreach ($conferenceTalks as $conferenceTalk) {
            $talk = Talk::titled($conferenceTalk['title']);
            $slot = Slot::fromSchedule($conferenceTalk['scheduledAt']);
            $track = Track::numbered($conferenceTalk['track']);
            $conference->scheduleTalk($talk, $slot, $track);
        }

        return $conference;
    }

}