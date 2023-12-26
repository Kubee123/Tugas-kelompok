<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class UserModel extends CI_Model
{
    public function editUser($where, $data, $table)
    {
        $data['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getAllUsers($where)
    {
        // Assuming you have a table named 'users'
        $query = $this->db->where($where)->get('users');
        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result set as an array of objects
            return $query->result();
        } else {
            // No users found
            return array();
        }
    }
    public function getAllForm()
    {
        // Set up the join condition before executing the query
        $this->db->select(['formulir.email', 'pembayaran.bukti', 'formulir.formulir_id', 'formulir.name', 'formulir.status_formulir', 'pembayaran.status']);
        $this->db->from('formulir');
        $this->db->join('pembayaran', 'formulir.formulir_id = pembayaran.formulir_id', 'LEFT');

        // Perform the main query on the 'formulir' table
        $query = $this->db->get();

        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result set as an array of objects
            return $query->result();
        } else {
            // No rows found
            return array();
        }
    }
    public function sumByStatus($where)
    {
        $this->db->where($where);

        // Get the count of users with the specified status
        $query = $this->db->get('formulir');
        return $query->num_rows();
    }
    public function getUser($where)
    {
        $this->db->where($where);
        $this->db->join('user_detail', 'users.id = user_detail.user_id');
        $query = $this->db->get('users');
        return $query->row();
    }
    public function getForm($where, $table, $return = 0)
    {
        $this->db->where($where);
        if (!$return == 0) {
            # code...
            $this->db->join('pembayaran', 'formulir.formulir_id = pembayaran.formulir_id', 'LEFT');
        }

        $query = $this->db->get($table);
        return $return == 0 ? $query->row() : $query->result();
    }

    public function mailer($to, $name, $body)
    {
        $mail = new PHPMailer();
        //Enable SMTP debugging.
        $mail->SMTPDebug  = SMTP::DEBUG_OFF;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name                      
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "Andhikaarnes62@gmail.com";
        $mail->Password = "eyzsersicrnbjmvv";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;
        $mail->From = "Andhikaarnes62@gmail.com";
        $mail->FromName = "Administrator";
        $mail->addAddress($to, $name);
        $mail->isHTML(true);
        $mail->Subject = "Docona School";
        $mail->Body = $body;
        $mail->AltBody = "This is the plain text version of the email content";
        $mail->send();
    }
}
