<?php
require_once('config.php');
require_once('mvc/core/Controller.php');
require_once('mvc/models/photography.php');
require_once('mvc/helpers/session_helper.php');

class PhotographyController extends Controller
{

    public function __construct()
    {
        $this->photography = new Photography;
    }

    public function edit($id) {
        $this->issetUserAdmin();

        $data = ['admin'];
        $data['photography'] = $this->photography->getItemPhotography($id);

        if($data['photography']) {
        return $this->render(ROUTE_ADMIN_PHOTOGRAPHY_VIEW_EDIT, $data);
        }
        else {
            popupSuccess("modal_success", "Không tìm thấy bộ ảnh !", "text-white bg-danger");
            redirect("/" . ROUTE_ADMIN_ALL_PHOTOGRAPHY);
        }
    }

    public function store()
    {
        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // filter and validate mutiple value request

        $data = [
            'avatar'             => $_FILES['avatar'],
            'detail_image'       => $_FILES['detail_image'],
            'image_name'         => trim($_POST['image_name']),
            'photography_name'   => trim($_POST['photography_name']),
            'credit_team'        => htmlspecialchars($_POST['credit_team']),
            'description'        => htmlspecialchars($_POST['description'])
        ];

        // Validate empty
        if (empty($data['avatar']) || empty($data['detail_image']) || empty($data['image_name']) || empty($data['photography_name'])) {
            flash("import_error", "Please fill out all inputs", "", "message-error mt-5");
            redirect("/" . ROUTE_ADMIN_IMPORT);
        }

        // Validate file
        if(!$this->photography->isFileValid($_FILES['detail_image']) || !$this->photography->isFileValid($_FILES['avatar'])) {
            flash("import_error", "File không hợp lệ.", "", "message-error mt-2 pb-2");
            redirect("/" . ROUTE_ADMIN_IMPORT);
        }

        // Validate similar 
        if ($data['photography_name'] == $this->photography->checkPhotographyByName($data['photography_name'])) {
            flash("import_error", "Tên thí sinh đã tồn tại.", "", "message-error mt-2 pb-2");
            redirect("/" . ROUTE_ADMIN_IMPORT);
        }

        if ($this->photography->store($data)) {
            popupSuccess("modal_success", "Successfully entered information.");
            redirect("/" . ROUTE_ADMIN_IMPORT);
        } else {
            flash("import_error", "ERROR", "", "message-error mt-5");
            redirect("/" . ROUTE_ADMIN_IMPORT);
        }
    }

    public function update($id) {
        $this->issetUserAdmin();
        
        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // var_dump(htmlspecialchars($_POST['credit_team']));die;

        $data = [
            'id'                 => $id,
            'image_name'         => trim($_POST['image_name']),
            'photography_name'   => trim($_POST['photography_name']),
            'credit_team'        => htmlspecialchars($_POST['credit_team']),
            'description'        => htmlspecialchars($_POST['description']), 
        ];        
        
        if ($this->photography->updateData($data)) {
            popupSuccess("modal_success", "Cập nhật thành công !", "text-success");
            redirect("/" . ROUTE_ADMIN_ALL_PHOTOGRAPHY);
        } else {
            redirect("/" . ROUTE_ADMIN_ALL_PHOTOGRAPHY);
        }
    }

    public function delete($id = [])
    {        
        if ($this->photography->deletePhoto($id)) {
            popupSuccess("modal_success", "Photography has been deleted !", "text-success");
            redirect("/" . ROUTE_ADMIN_ALL_PHOTOGRAPHY);
        } else {
            redirect("/" . ROUTE_ADMIN_ALL_PHOTOGRAPHY);
        }
    }
}
