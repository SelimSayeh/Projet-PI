<?php

namespace EventsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Events/Default/index.html.twig');
    }
    public function backIndexAction()
    {
        return $this->render('@Events/Default/backIndex.html.twig');
    }
    public function DisplayAction()
    {
        return $this->render('@Events/EventViews/back/DisplayEvent.html.twig');
    }
}
