<?php

namespace CastingBundle\Controller;

use CastingBundle\Entity\Casting;
use CastingBundle\Form\CastingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Casting/Default/index.html.twig');
    }







public function signinAction(){
    return $this->render('@Casting/Default/signin.html.twig');

}
public function signupAction(){
    return $this->render('@Casting/Default/signup.html.twig');
}







}
