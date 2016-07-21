<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('email'));
        $this->load->model('talent_model');
    }

    public function register()
    {

        /* set rules for validation */
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('last_name', 'last name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[talent.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');

        $arData = ['title' => 'Home | Creative Monkey'];

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('home', $arData);
        }
        else
        {
            $data = [
              'first_name' => $this->input->post('first_name'),
              'last_name'  => $this->input->post('last_name'),
              'email'      => $this->input->post('email'),
              'password'   => md5($this->input->post('password'))
            ];
            // insert form data into database
            if ($this->talent_model->insertTalent($data))
            {
                // send email
                if ($this->talent_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('user/register');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect('user/register');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('user/register');
            }
        }
    }
}