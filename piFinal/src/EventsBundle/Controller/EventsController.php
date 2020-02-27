<?php

namespace EventsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EventsBundle\Entity\Events;
use EventsBundle\Entity\Reservation;	//A MODIFIER SELON TRAVAIL
use EventsBundle\Form\EventsType;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;


class EventsController extends Controller
{
    /**
     * @Route("/add")
     */
    public function addAction(Request $request)
    {

        $events =new Events();
        $formEvent = $this->createForm('EventsBundle\Form\EventsType',$events);
        $formEvent->handleRequest($request);
        if($formEvent->isSubmitted() && $formEvent->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($events);
            $em->flush();
            return $this->redirectToRoute('Display_event');

        }



        return $this->render('@Events/EventViews/back/addEvent.html.twig', array(
            'formEvent' => $formEvent->createView()
        ));
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction($id)
    {
        $events =new Event();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository(  'EventsBundle:Events');
        $events = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($events);
        $em->flush();

        return $this->forward('EventsBundle:Events:display');



    }

    /**
     * @Route("/display")
     */
    public function displayAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('EventsBundle:Events');
        $events = $repository->findAll();

        return $this->render('@Events/EventViews/back/DisplayEvent.html.twig', array(
            'events'=>$events,

            //
        ));
    }

    /**
     * @Route("/modify")
     */
    public function modifyAction(Request $request , Events $events)
    {
        $editFormevent = $this->createForm('EventsBundle\Form\EventsType',$events);
        $editFormevent->handleRequest($request);
        if ($editFormevent->isSubmitted() && $editFormevent->isValid())
        {
            //$events->setDateUpdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('Display_event');
        }

        return $this->render('@Events/EventViews/back/modifyEvent.html.twig', array(
            'events'    => $events,
            'formevents'    => $editFormevent->createView(),

        ));
    }
    public function rejeterAction(Reservation $reservation)
    {
        $reservation->setEtat("Rejeté");
            //$events->setDateUpdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('toutlesreservation');



    }
    public function ConfirmerAction(Reservation $reservation)
    {


        $reservation->setEtat("Confirmé");
        $events=$reservation->getEvent();
        $events->setNbrPlacesEvent($events->getNbrPlacesEvent() - $reservation->getNbplaceReserv());
        //$events->setDateUpdate(new \DateTime('now'));
        $this->getDoctrine()->getManager()->flush();


        return $this->redirectToRoute('toutlesreservation');


    }

    public function signinAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('EventsBundle:Events');
        $events = $repository->findAll();

        return $this->render('@Events/EventViews/front/signin.html.twig', array(
            'events'=>$events,

            //
        ));
    }
    public function EventsAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('EventsBundle:Events');
        $events = $repository->findAll();

        $openWeather = $this->get('dwr_open_weather');
        $weather = $openWeather->setType('Weather')->getByCityName('Gouvernorat de Tunis');




        return $this->render('@Events/EventViews/front/Events.html.twig', array(
            'events'=>$events,
            'weather'=>$weather,
            //
        ));
    }
    public function DisplayReservationsAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('EventsBundle:Reservation');
        $reservations = $repository->gettoutlesreservation();

        return $this->render('@Events/EventViews/back/DisplayReservation.html.twig', array(
            'reservations'=>$reservations,

            //
        ));
    }

    public function MesReservationsAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('EventsBundle:Reservation');
        $reservations = $repository->getmesreservation();

        return $this->render('@Events/EventViews/front/MesReservations.html.twig', array(
            'reservations'=>$reservations,

            //
        ));
    }

    public function DeleteReservationsAction($id)
    {
        $reservation =new Reservation();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository(  'EventsBundle:Reservation');
        $reservation = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($reservation);
        $em->flush();

        return $this->forward('EventsBundle:Events:MesReservations');
    }
    public function  ReserverEventAction(Request $request ,Events $event){

        $reservation =new Reservation();
        $reservationForm = $this->createForm('EventsBundle\Form\ReservationType',$reservation);
        $reservationForm->handleRequest($request);
        /*var_dump($salle);
        die();*/
        if ($reservationForm->isSubmitted() && $reservationForm->isValid())
        {
            $user=$this->getUser();
            $reservation->setUser($user);
            $reservation->setDatereservation(new \DateTime('now'));
            $reservation->setEvent($event);
            $reservation->setEtat('en cours');
            $em = $this->getDoctrine()->getManager();
            if($event->getNbrPlacesEvent()>$reservation->getNbplaceReserv()) {

            }
                else {
                        $this->addFlash(
                            'info',
                            'Event is full :('
                        );
                    return $this->redirectToRoute('Display_event_front');
                }
            $em->persist($reservation);
            $em->flush();
            return $this->forward('EventsBundle:Events:MesReservations');
        }
        $reservation =new Reservation();
        $reservationForm = $this->createForm('EventsBundle\Form\ReservationType',$reservation);

        return $this->render('@Events/EventViews/front/ReserverEvent.html.twig',
            array(
                'reservationform'=>$reservationForm->createView(),
            ));


    }

}
