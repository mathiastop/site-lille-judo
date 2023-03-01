<?php

namespace App\EventSubscriber;

use App\Repository\EvenementRepository;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    private $evenementRepository;
    private $urlGenerator;

    public function __construct(EvenementRepository $evenementRepository, UrlGeneratorInterface $urlGenerator)
    {
        $this->evenementRepository = $evenementRepository;
        $this->urlGenerator = $urlGenerator;
    }

    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData'
        ];
    }

    public function onCalendarSetData(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();
        $evenements = $this->evenementRepository
            ->createQueryBuilder('evenement')
            ->where('evenement.enabled = true and evenement.beginAt BETWEEN :start and :end OR evenement.endAt BETWEEN :start and :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult();

        foreach ($evenements as $evenement) {
            $calendarEvent = new Event(
                $evenement->getTitre(),
                $evenement->getBeginAt(),
                $evenement->getEndAt()
            );
            $calendarEvent->setOptions([
                'backgroundColor' => '#533791',
                'borderColor' => '#000000',
            ]);
            $calendarEvent->addOption('url', $this->urlGenerator->generate('evenements_show', [
                'id' => $evenement->getId(),
            ]));

            $calendar->addEvent($calendarEvent);
        }
    }
}
