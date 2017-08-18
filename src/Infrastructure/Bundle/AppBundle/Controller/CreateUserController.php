<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 14:40
 */

namespace Infrastructure\Bundle\AppBundle\Controller;

class CreateUserController extends AbstractUserController
{
    public static function getRoutePrefix()
    {
        return 'app.user.create';
    }
}