<?php
require_once('mvc/core/Controller.php');
require_once('mvc/models/user.php');
require_once('mvc/models/pagination.php');
require_once ('mvc/helpers/session_helper.php');
require_once ('mvc/helpers/common.php');
require_once ('mvc/models/photography.php');

class AdminController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['usersId'])) 
        {
            if($_SESSION['usersId'] == 1) {
                redirect("/" . ROUTE_ADMIN_DASHBOARD);
            } else {
                redirect("/");
            }
        } else {
            $data = ['login'];
            $this->render(ROUTE_PAGES_LOGIN_VIEW, $data);
        }
    }

    public function dashboard()
    {

        $this->issetUserAdmin();

        $userModel = new User();
        $paginate = new Pagination();
        $photography = new Photography();
        
        $data = [];

        $topPhotoSubmission = $photography->getTopPhotoSubmission();

        array_push($data, 'admin', 'dashboard');
        
        $data['topPhotoSubmission'] = $topPhotoSubmission;
        // $data['per_page'] = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        // $data['current_page'] = !empty($_GET['page']) ? $_GET['page'] : 1;
        // $data['total_page'] = ceil(count($userTickets) / $data['per_page']);
        // $ticketPaginate = $paginate->paginateUserTickets($data);
        // $data['lottery'] = $ticketPaginate;

        $this->render(ROUTE_ADMIN_DASHBOARD, $data);
    }

    // Import view
    public function import()
    {
        // check user logged
        $this->issetUserAdmin();
        $data = ['admin', 'import'];
        $this->render(ROUTE_ADMIN_IMPORT, $data);
    }

    public function photographyAll()
    {
        $this->issetUserAdmin();
        $photography = new Photography();
        $paginate = new Pagination();

        $photographyAll = $photography->getAll();

        $data = ['admin'];
        $data['per_page'] = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $data['current_page'] = !empty($_GET['page']) ? $_GET['page'] : 1;
        $data['total_page'] = ceil(count($photographyAll) / $data['per_page']);

        // var_dump($photographyAll);die;
        $photoPaginate = $paginate->paginatePhotography($data);
        $data['photography'] = $photoPaginate;

        $this->render(ROUTE_ADMIN_PHOTOGRAPHY_VIEW_ALL, $data);
    }

}
