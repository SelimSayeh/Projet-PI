<?php

namespace CastingBundle\Controller;

use CastingBundle\Entity\Casting;
use CastingBundle\Entity\NotificationParticipation;
use CastingBundle\Entity\Participation;
use CastingBundle\Form\CastingType;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CastingController extends Controller
{
    /**
     * @Route("/AddCasting")
     */
    public function AddAction(Request $request)
    {
        $Casting=new Casting();
        $form=$this->createForm(CastingType::class,$Casting);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $m=$this->getDoctrine()->getManager();
            $m->persist($Casting);
            $m->flush();
            return $this->redirect($this->generateUrl('afficher_casting'));
        }

        $formview=$form->createView();

        return $this->render('@Casting/Default/Ajouter_casting.html.twig', array('form' => $formview));

    }

    public function AfficheCastingAction() {
        $mod = $this->getDoctrine()
            ->getRepository('CastingBundle:Casting')
            ->findAll();
        return $this->render('@Casting/Default/Afficher_Casting.html.twig', array('data' => $mod));
    }

    public function AfficheParticipationAction() {
        $mod = $this->getDoctrine()
            ->getRepository('CastingBundle:Participation')
            ->gettoutlesparticipation();
        return $this->render('@Casting/Default/Afficher_Participation.html.twig', array('data' => $mod));
    }

    public function AfficheCastingFrontAction() {
        $mod = $this->getDoctrine()
            ->getRepository('CastingBundle:Casting')
            ->findAll();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('CastingBundle:Participation');
        $participations = $repository->gettoutlesparticipation($this);
        return $this->render('@Casting/Castingview/front/DisplayCastingFront.html.twig', array('data' => $mod,'participation' => $participations));
    }

    public function notifFrontAction() {


        $mod = $this->getDoctrine()
            ->getRepository('CastingBundle:Casting')
            ->findAll();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('CastingBundle:Participation');
        $participations = $repository->gettoutlesparticipation();
        return $this->render('@Casting/Castingview/front/DisplayCastingFront.html.twig', array('data' => $mod,'participation' => $participations));
    }


    public function SupprimerCastingAction($id) {
        $m=$this->getDoctrine()->getManager();
        $mod = $this->getDoctrine()
            ->getRepository('CastingBundle:Casting')
            ->find($id);

        $m->remove($mod);
        $m->flush();

        return $this->redirect($this->generateUrl('afficher_casting'));
    }
    public function modifierCastingAction(Request $request,$id)
    {
        $m=$this->getDoctrine()->getManager();
        $classe=$m->getRepository("CastingBundle:Casting")->find($id);
        $form=$this->createForm('CastingBundle\Form\CastingType',$classe);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $m->persist($classe);
            $m->flush();
            return $this->redirect($this->generateUrl('afficher_casting'));
        }
        $formview = $form->createView();

        return $this->render('@Casting/Default/Ajouter_casting.html.twig', array('form' => $formview));
    }

    public function  ParticiperAction(Request $request ,Casting $casting){




        $participation =new Participation();

        $data = array(
            'my-message' => "My custom message",
        );
        $pusher = $this->get('mrad.pusher.notificaitons');
        $channel = 'messages';
        $pusher->trigger($data, $channel);

// or you can keep the channel pram empty and will be broadcasted on "notifications" channel by default
        $pusher->trigger($data);


        $user=$this->getUser();
        $participation->setUser($user);

        $participation->setCasting($casting);
        $participation->setResultatCasting('en cours');
        $em = $this->getDoctrine()->getManager();

            $em->persist($participation);
            $em->flush();

        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Notif');
        $notif->setMessage('a Participé au Casting');
        $notif->setLink($this->generateUrl("afficher_Participation"));
        $notif->setUsername($this->getUser()->getUsername());
        $notif->setCastingname($casting->getNomCasting());
        // or the one-line method :
        // $manager->createNotification('Notification subject', 'Some random text', 'https://google.fr/');

        // you can add a notification to a list of entities
        // the third parameter `$flush` allows you to directly flush the entities
        try {
            $manager->addNotification(array($this->getUser()), $notif, true);
        } catch (OptimisticLockException $e) {
        }


            return $this->forward('CastingBundle\Controller\CastingController::MesParticipationsAction');




    }
    public function DeleteParticipationsAction($id)
    {
        $participation =new Participation();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('CastingBundle:Participation');
        $participation = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($participation);
        $em->flush();

        return $this->forward('CastingBundle:Casting:MesParticipations');
    }
    public function MesParticipationsAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('CastingBundle:Participation');
        $participations = $repository->gettoutlesparticipation();

        return $this->render('@Casting/Castingview/front/MesParticipations.html.twig', array(
            'participations'=>$participations,

            //
        ));
    }

    public function GererParticipationAction(Participation $participation,$token)
    {

        if($token=='Admis')
        {
            $participation->setResultatCasting('Admis');
        }
        else
        {
            $participation->setResultatCasting('Refusé');
        }
        $em = $this->getDoctrine()->getManager();

        $em->persist($participation);
        $em->flush();
        return $this->redirectToRoute('afficher_Participation');
    }


}
