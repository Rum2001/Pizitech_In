<?php
require_once('mvc/core/DB.php');

class Photography
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    /**
     * Store photography
     */
    public function store($data)
    {
        $this->db->query('INSERT INTO photography (name, image_name, credit_team, description, upload_date) VALUE (:name, :image_name, :credit_team, :description, :upload_date)');
        // $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':name', $data['photography_name']);
        $this->db->bind(':image_name', $data['image_name']);
        $this->db->bind(':credit_team', $data['credit_team']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':upload_date', date('Y-m-d H:i:s', time()));


        if ($this->db->execute()) {

            $last_id = $this->db->lastInsertId();
            $avatar = (string)$last_id . '_' . $data['avatar']['name'][0];

            $this->db->query('UPDATE photography SET avatar = :avatar WHERE id = :last_id');

            if (move_uploaded_file(
                $data['avatar']['tmp_name'][0],
                $this->filePath($avatar, 'avatar')
            )) {
                $this->db->bind(':avatar', $avatar);
            }
            $this->db->bind(':last_id', (int)$last_id);
            $this->db->execute();

            // Loop all files
            // Count total files
            $countfiles = count($data['detail_image']['name']);
            $success = true;
            for ($i = 0; $i < $countfiles; $i++) {
                // File name
                $filename = $last_id . '_' . $data['detail_image']['name'][$i];

                // Location
                $target_path = $this->filePath($filename);

                // Upload file
                if (move_uploaded_file(
                    $data['detail_image']['tmp_name'][$i],
                    $target_path
                )) {

                    $this->db->query('INSERT INTO images (name, photography_id)
                    VALUES (:name, ' . $last_id . ')');

                    $this->db->bind(':name', $filename);
                    $this->db->execute();
                } else {
                    $success = false;
                    return;
                }
            }

            if ($success) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateData($data)
    {
        $this->db->query('UPDATE photography SET image_name=:image_name, name =:photography_name, credit_team = :credit_team, description = :description WHERE id=:id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':image_name', $data['image_name']);
        $this->db->bind(':photography_name', $data['photography_name']);
        $this->db->bind(':credit_team', $data['credit_team']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }

    public function checkPhotographyByName($name)
    {
        $this->db->query('SELECT name FROM photography WHERE name = :name');
        $this->db->bind(':name', $name);

        $row = $this->db->single();


        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * File path location
     */
    public function filePath($filename, $type = 'file')
    {
        $destination_path = getcwd() . DIRECTORY_SEPARATOR . MEDIA_PATH;
        if ($type === 'avatar') {
            $destination_path = getcwd() . DIRECTORY_SEPARATOR . MEDIA_PATH_AVATAR;
        }

        $target_path = $destination_path . basename($filename);
        return $target_path;
    }

    /**
     * Check file upload invalid
     */
    public function isFileValid($file)
    {
        if (is_array($file)) {
            $countfiles = count($file['name']);
            for ($i = 0; $i < $countfiles; $i++) {
                // File name
                $filename = $file['name'][$i];

                // file extension
                $file_extension = pathinfo(
                    $filename,
                    PATHINFO_EXTENSION
                );

                $file_extension = strtolower($file_extension);
                // Valid image extension
                $valid_extension = array("png", "jpeg", "jpg");

                if (!in_array($file_extension, $valid_extension)) {
                    return false;
                }
            }
            return true;
        } else {
            // file extension
            $file_extension = pathinfo(
                $file,
                PATHINFO_EXTENSION
            );

            $file_extension = strtolower($file_extension);
            // Valid image extension
            $valid_extension = array("png", "jpeg", "jpg");

            if (!in_array($file_extension, $valid_extension)) {
                return false;
            }
            return true;
        }
    }

    /**
     * Get all data photography
     */
    public function getAll()
    {
        // $this->db->query('SELECT * FROM photography ORDER BY id DESC');
        $this->db->query('SELECT *,(SELECT COUNT(photography_id) FROM submission WHERE submission.photography_id = photography.id )AS vote,
        (SELECT GROUP_CONCAT(images.name SEPARATOR ",,")FROM images WHERE images.photography_id = photography.id) AS detail_image 
        FROM photography
        ORDER BY photography.id DESC');

        $photography = $this->db->resultSet();

        return $photography;
    }

    /**
     * Get all data photography
     */
    public function getItemPhotography($id)
    {
        $this->db->query('SELECT *,(SELECT COUNT(:id) FROM submission WHERE submission.photography_id = :id )AS vote,
        (SELECT GROUP_CONCAT(images.name SEPARATOR ",,")FROM images WHERE images.photography_id = :id) AS detail_image 
        FROM photography WHERE id =:id');
        $this->db->bind(':id', $id);
        $item = $this->db->single();

        return $item;
    }
    /**
     * Get detail image data by photography id
     */
    public function getDetailImage($id)
    {
        $this->db->query('SELECT name FROM images WHERE photography_id=:id');
        $this->db->bind(':id', $id);
        $detailImage = $this->db->resultSet();

        return $detailImage;
    }

    /**
     * Delete photography
     */
    public function deletePhoto($id)
    {
        $this->db->query('SELECT avatar FROM photography WHERE id=:id');
        $this->db->bind(':id', $id);
        $avatar = $this->db->resultSet();

        // Remove image avatar
        $avatarPath = MEDIA_PATH_AVATAR . $avatar[0]->avatar;
        if (is_file($avatarPath)) {
            unlink($avatarPath);
        }

        $this->db->query('DELETE FROM photography WHERE id=:id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        $this->db->query('SELECT name FROM images WHERE photography_id=:photography_id');
        $this->db->bind(':photography_id', $id);
        $files = $this->db->resultSet();

        // Remove files
        if (!empty($files)) {
            foreach ($files as $file) {
                $filePath = MEDIA_PATH . $file->name;
                if (is_file($filePath)) {
                    unlink($filePath);
                }
            }
        }
        // var_dump($files);die;

        $this->db->query('DELETE FROM images WHERE photography_id=:photography_id');
        $this->db->bind(':photography_id', $id);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTopPhotoSubmission()
    {
        $this->db->query('SELECT *,(SELECT COUNT(photography_id) FROM submission WHERE submission.photography_id = photography.id )AS vote,
        (SELECT GROUP_CONCAT(images.name SEPARATOR ",,")FROM images WHERE images.photography_id = photography.id) AS detail_image 
        FROM photography ORDER BY (SELECT COUNT(photography_id) FROM submission WHERE submission.photography_id = photography.id ) DESC');

        $photography = $this->db->resultSet();

        return $photography;
    }

    public function getLatestPhotography()
    {
        $this->db->query('SELECT *,(SELECT COUNT(photography_id) FROM submission WHERE submission.photography_id = photography.id )AS vote,
        (SELECT GROUP_CONCAT(images.name SEPARATOR ",,")FROM images WHERE images.photography_id = photography.id) AS detail_image 
        FROM photography ORDER BY photography.id DESC');

        $photography = $this->db->resultSet();

        return $photography;
    }
}
