<?php
require_once('mvc/core/DB.php');
// require_once('mvc/models/lotery.php');

class Pagination
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function paginatePhotography($data = [])
    {
        $offset = ($data['current_page'] - 1) * $data['per_page'];
        

        $this->db->query('SELECT * FROM photography ORDER BY id DESC LIMIT ' . $data['per_page'] . ' OFFSET ' . $offset);

        $tickets = $this->db->resultSet();

        return $tickets;
    }

    public function paginateTickets($data = [])
    {
        $offset = ($data['current_page'] - 1) * $data['per_page'];
        

        $this->db->query('SELECT * FROM tickets ORDER BY id DESC LIMIT ' . $data['per_page'] . ' OFFSET ' . $offset);

        $tickets = $this->db->resultSet();

        return $tickets;
    }

    public function paginateUserTickets($data = [])
    {
        $offset = ($data['current_page'] - 1) * $data['per_page'];
        
        $this->db->query('SELECT * FROM users INNER JOIN user_tickets ON users.id = user_tickets.user_id 
        WHERE users.permission != 1 ORDER BY user_tickets.id DESC LIMIT ' . $data['per_page'] . ' OFFSET ' . $offset);

        $tickets = $this->db->resultSet();

        return $tickets;
    }
}
