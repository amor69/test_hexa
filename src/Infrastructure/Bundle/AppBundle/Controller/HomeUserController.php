<?php

namespace Infrastructure\Bundle\AppBundle\Controller;

class HomeUserController extends AbstractUserController
{
    public static function getRoutePrefix()
    {
        return 'app.user.home';
    }
}
