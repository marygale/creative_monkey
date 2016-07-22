<?php

class Talent_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertTalent($arData)
    {
        return $this->db->insert('talent', $arData);
    }

    function sendEmail($to_email)
    {
        $from_email = 'ladyemjay043@gmail.com';
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://dev.ci.com/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = '_Marygale1234'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        //send mail
        $this->email->from($from_email, 'creativemonkey.com');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}