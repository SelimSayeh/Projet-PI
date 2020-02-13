<?php

namespace CastingBundle\Controller;

use CastingBundle\Entity\Casting;
use CastingBundle\Entity\Participation;
use CastingBundle\Form\CastingType;
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

    public function AfficheCastingFrontAction() {
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


            $user=$this->getUser();
        $participation->setUser($user);

        $participation->setCasting($casting);
        $participation->setResultatCasting('en cours');
            $em = $this->getDoctrine()->getManager();

            $em->persist($participation);
            $em->flush();
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

}
