<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class RegisterModel extends CI_Model
{
    protected $useTimestamps = TRUE;
    protected $dateFormat = 'datetime';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required',
            ],
            [
                'field' => 'asal_sekolah',
                'label' => 'Asal Sekolah',
                'rules' => 'required',
            ], [
                'field' => 'nisn',
                'label' => 'NISN',
                'rules' => 'required|numeric',
            ], [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required',
            ], [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required',
            ], [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
            ], [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
            ], [
                'field' => 'nama_ortu',
                'label' => 'Nama Orang Tua',
                'rules' => 'required',
            ], [
                'field' => 'no_telp_ortu',
                'label' => 'No Telp Orang Tua',
                'rules' => 'required|numeric',
            ], [
                'field' => 'pekerjaan_ortu',
                'label' => 'Pekerjaan Orang Tua',
                'rules' => 'required',
            ],

        ];
    }
    public function random($length = 8)
    {
        // Load the helper in your controller or model
        $this->load->helper('string');

        // Generate a random string of 8 characters
        $random_text = random_string('alnum', $length);

        // Display or use the generated random text
        return $random_text;
    }
    public function RegisterAccount($data)
    {
        $this->db->trans_start();
        $random = $this->random(10);
        $dataUsers = [
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => 0,
            'is_admin' => 0,
            'password' => password_hash($random, PASSWORD_DEFAULT),
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('users', $dataUsers);
        $user_id =  $this->db->insert_id();
        $detail = [
            'user_id' => $user_id,
            'nik' => $data['nik'],
            'no_kk' => $data['no_kk'],
            'nama_orang_tua' => $data['nama_orang_tua'],
            'no_handphone_orang_tua' => $data['no_handphone_orang_tua'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('user_detail', $detail);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Rollback jika ada kesalahan
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Commit transaksi
            $body = '
        <p>Dear,' . $data['name'] . '</p>
        <p>Successfully to Regsiter,</p>
        <p>Informasi Login</p>
        <p>Email       : ' . $data['email'] . '</p>
        <p>Password    : ' . $random . '</p>
        ';
            $this->mailer($data['email'], $data['name'], $body);
            $this->db->trans_commit();
            return true;
        }
    }
    public function RegisterSiswa($data)
    {
        $this->db->insert('formulir', $data);
        return true;
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
        $mail->Subject = "Subject Text";
        $mail->Body = $body;
        $mail->AltBody = "This is the plain text version of the email content";
        $mail->send();
    }
}
