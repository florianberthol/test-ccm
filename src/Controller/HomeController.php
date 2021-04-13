<?php

namespace App\Controller;

use App\Entity\Department;
use App\Repository\CityRepository;
use App\Repository\DepartmentRepository;
use App\Repository\Exception\DepartmentNotFound;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\String\Slugger\SluggerInterface;

final class HomeController extends AbstractController
{
    public function indexAction(): Response
    {
        return $this->render('home.html.twig');
    }
}
