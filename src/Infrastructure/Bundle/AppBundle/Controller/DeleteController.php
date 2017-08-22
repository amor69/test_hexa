<?php

namespace Infrastructure\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeleteController extends Controller
{
    public static function getRoutePrefix()
    {
        return 'app.user.delete';
    }
}
