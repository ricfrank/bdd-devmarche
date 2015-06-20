<?php

class DoctrineConferencePlanner implements ConferencePlanner
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function planConference(Conference $conference)
    {
        $this->em->persist($conference);
        $this->em->flush();
    }

    public function scheduleTalkForConference(Talk $talk, Slot $slot, Track $track, Conference $conference)
    {
        $conference->scheduleTalk($this, $slot, $track);
        $this->em->persist($talk);

        $this->em->flush();
    }
}