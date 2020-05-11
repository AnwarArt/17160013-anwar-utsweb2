<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function index()
  {        

    $data['title'] = 'Halaman Home';
        $data['name']="Welcome";
        // echo "tes";
         $this->template->load('theme','home',$data);
  }
  
  public function form_user($confirm='')
  {
    $data['title']="Form User";
    
    $data['confirm']=$confirm;

        $this->load->model('Moduser');
        $data['read_user']=$this->Moduser->read();  
        $this->template->load('theme','form/form_user',$data);
  }

  public function tes()
    {        
        $this->load->view('form/form_user.php');
    }
    public function save_form_user(){
      $data['title']="Form User";
    //   $data['confirm']='<div class="alert btn-success" role="alert">
    //   <a href="#" class="alert-link">Success</a>
    // </div>';

      $this->load->model('Moduser');

        $name         = $this->input->post('name');
        $previledge   = $this->input->post('previledge');
        $username     = $this->input->post('username');
        $password     = $this->input->post('password');
        $form_date    = $this->input->post('tgl_lahir');

        $data=[
            'name'=>$name,
            'previledge'=>$previledge,
            'username'=>$username,
            'password'=>$password,
            'tgl_lahir'=>$form_date
        ];

    $this->Moduser->save($data);


    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation!</div>');

    redirect('user/form_user');
  }

}
