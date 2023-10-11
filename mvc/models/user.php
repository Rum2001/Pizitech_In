<?php
require_once('mvc/core/DB.php');
require_once('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class User
{

    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    //Find user by email or username
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // $this->db->bind(':username', $username); // gắn giá trị cho :username = $username (:username đại diện cho biến)
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function findUserActive($email, $otp)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email AND otp = :otp');
        // $this->db->bind(':username', $username); // gắn giá trị cho :username = $username (:username đại diện cho biến)
        $this->db->bind(':email', $email);
        $this->db->bind(':otp', $otp);
        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }


    //Login user
    public function login($email, $password)
    {

        $row = $this->findUserByEmail($email);

        if ($row == false) return false;

        $hashedPassword = $row->password;

        // if (password_verify($password, $hashedPassword)) {
        if (md5($password) === $hashedPassword) {
            return $row;
        } else {
            return false;
        }
    }


    // Add Information
    public function addInformation($data)
    {

        $row = $this->checkUserExist($data['email']);

        if (!$row) {
            $otp = mt_rand(100000, 999999);
            $this->db->query('INSERT INTO users (username, email, password, otp)
            VALUES (:username, :email, :password, :otp)');

            //Bind values
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email',  $data['email']);
            $this->db->bind(':password',  md5($data['password']));
            $this->db->bind(':otp', $otp);
            if ($this->db->execute()) {
                $this->sendMailAccess($data['email'], $otp);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function activeAccount($data)
    {
        // Kiểm tra nếu otp_status = 1
        $row = $this->findUserActive($data['email'], $data['otp']);
        if ($row) {
            if ($row->otp_status == 1) {
                $this->db->query('UPDATE users SET active = 1 WHERE email = :email AND otp = :otp');
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':otp', $data['otp']);
                if ($this->db->execute()) {
                    return true; // Active thành công
                } else {
                    return false; // Lỗi khi active
                }
            }
            // Tiến hành active tài khoản
            else {
                return 'OTP_EXPIRED'; // Thông báo mã hết hạn hoặc không hợp lệ
            }
        }
    }

    public function resetOtp($data)
    {
        $row = $this->findUserByEmail($data['email']);
        if ($row) {
            $otp = mt_rand(100000, 999999);
            $this->db->query('UPDATE users SET otp = :otp, otp_status = 1 WHERE email = :email');
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':otp', $otp);
            if ($this->db->execute()) {
                $this->sendMailAccess($data['email'], $otp);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function sendMailAccess($recipientEmail, $otp)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USERNAME;
            $mail->Password   = SMTP_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = SMTP_PORT;

            // Recipients
            $mail->setFrom(SENDER_EMAIL, SENDER_NAME);
            $mail->addAddress($recipientEmail);

            // Content
            $template = file_get_contents(__DIR__ . '/mail.php');

            // Replace placeholders with actual values
            $template = str_replace('{{otp}}', $otp, $template);
            $mail->isHTML(true);
            $mail->Subject = 'Account Verification Code';
            $mail->Body = $template;
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function checkUserExist($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email'); // Named Placeholder :email
        $this->db->bind(':email', $email); // gắn giá trị :email = $email

        $row = $this->db->single();


        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function submission($data)
    {
        $this->db->query('INSERT INTO submission (user_id, photography_id, date)
        VALUES (:user_id, :photography_id, :date)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':photography_id',  $data['photography_id']);
        $this->db->bind(':date',  date('Y-m-d H:i:s', time()));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkVoted($userId, $photography_id)
    {
        $this->db->query('SELECT * FROM submission WHERE user_id = :user_id AND photography_id =:photography_id');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':photography_id', $photography_id);

        $vote = $this->db->single();

        return $vote;
    }
}
