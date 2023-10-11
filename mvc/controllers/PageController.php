<?php
require_once('mvc/core/Controller.php');
require_once('mvc/helpers/session_helper.php');
require_once('config.php');
require_once('mvc/models/photography.php');

class PageController extends Controller
{

    public function login()
    {
        // if (isset($_SESSION['usersId'])) {
        //     popupSuccess('modal_success', 'Bạn đã đăng nhập rồi');
        //     redirect('/admin/dashboad');
        // } else {
        //     $data = ['login'];
        //     $this->render('pages/login', $data);
        // }
        $data = ['login'];
        $this->render('pages/login', $data);
    }
    public function verify()
    {
        $data = ['verify'];
        $this->render('pages/verify', $data);
    }
    public function submission() {
        $photogaphy = new Photography();
        $photogaphyAll = $photogaphy->getLatestPhotography();
        $data = ['home'];
        $data['photography'] = $photogaphyAll;

        $this->render('pages/submission', $data);
    }

    public function submissionDetail($id) {
        $photogaphy = new Photography();
        $photogaphyItem = $photogaphy->getItemPhotography($id);
        
        $data = ['home'];
        $data['photography'] = $photogaphyItem;

        if($data['photography']) {
            $this->render('pages/submission-detail', $data);
        } else {
            popupSuccess("modal_success", "Không tìm thấy bộ ảnh !", "text-white bg-danger");
            redirect("/");
        }
    }
}
