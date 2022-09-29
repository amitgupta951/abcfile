<?php
namespace Drupal\welcome\Controller;
use Drupal\Core\Controller\ControllerBase;

class WelcomeController extends ControllerBase
{
    public function welcome()
    {
        $element = array('#markup'=>'Welcome Amit in Your  Drupal Page',);
        date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-y h:i:s');
         echo $date;
        return $element;
    }
}

?>