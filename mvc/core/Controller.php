<?php
class Controller
{

    public function model($model)
    {
        require_once "./mvc/models/" . $model . ".php";
        return new $model;
    }

    public function view($view, $data = [])
    {
        require_once "./mvc/views/" . $view . ".php";
    }

    public function render($file, $data = array())
    {
        // Kiểm tra file gọi đến có tồn tại hay không? THAY DOMAIN O DAY
        $view_file = 'mvc/views/' . $file . '.php';

        if (is_file($view_file)) {
            // Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
            extract($data);
            // Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();
            // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
            // THAY DOMAIN O DAY
            require_once('mvc/views/layouts/application.php');
        } else {
            // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
            header('Location: /');
        }
    }

    public function error()
    {
        $this->render('error');
    }

    public function isAdmin()
    {
        if (isset($_SESSION['usersId']) && (int)$_SESSION['usersId'] === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function issetUserAdmin()
    {
        if (isset($_SESSION['usersId'])) {
            if ((int)$_SESSION['usersId'] !== 1) {
                redirect("/");
            }
        } else {
            $data = ['login'];
            redirect("/page/login");
        }
    }

    public function issetUser()
    {
        if (isset($_SESSION['usersId'])) {
            return true;
        } else {
            return false;
        }
    }

    public function userSession()
    {
        $user = new stdClass();
        $user->id = $_SESSION['usersId'];
        $user->usersName = $_SESSION['usersName'];
        $user->usersEmail = $_SESSION['usersEmail'];
        return $user;
    }
}
