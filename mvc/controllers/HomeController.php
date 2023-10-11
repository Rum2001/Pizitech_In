<?php
require_once('mvc/core/Controller.php');
require_once('mvc/helpers/session_helper.php');
require_once('config.php');
require_once('mvc/models/photography.php');
class HomeController extends Controller
{

    function index()
    {
        $photogaphy = new Photography();
        $photogaphyAll = $photogaphy->getTopPhotoSubmission();
        
        $data = ['home'];
        $data['photography'] = $photogaphyAll;
        
        $this->render('pages/index', $data);
    }
}
