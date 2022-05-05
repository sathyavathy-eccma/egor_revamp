<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_new extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Login_model', 'login', true);
        $this->load->library('session');
    }



    public function index() {
        if ($this->session->userdata('username')) 
        {
            $this->layout->view('search');
        }
        else
        {
            $this->load->view('login_new');
        }
    }

    public function signin()
    {
        if($_POST) 
        {
            $data['username'] = $this->input->post('username');
            
            $option = $this->input->post('login_opt');
            
            $login = $this->login->get_list('individual_master', $data);
           
            if($option=='individual')
            {
                $data['password'] = $this->input->post('password');
                $where = "password='".$this->input->post('password')."' AND username='".$this->input->post('username')."' OR EmailAddress='".$this->input->post('username')."'";
                if (count($login) > 0) 
                {
                    $usr_count = $this->login->get_list('individual_master', $where);
                    if(count($usr_count) > 0)
                    {
                        $data['UserStatus']='0';
                        $usr_sts_count = $this->login->get_list('individual_master', $where);

                        if(count($usr_sts_count) > 0)
                        {
                            foreach($usr_sts_count as $sts_res1)
                            {
                                $arr=json_decode(json_encode($sts_res1), true);
                                $this->session->set_userdata('username', $data['username']);
                                $this->session->set_userdata('loginuser_id', $arr['IndividualId']);
                                $this->session->set_userdata('loginorgid', $arr['OrganizationId']);
                                $this->session->set_userdata('checkuser_opt', $option);
                                $this->session->set_userdata('level', $arr['Level']);
                                $this->session->set_flashdata('success','login_success');
                                redirect('search');
                            }
                        }
                        else
                        {
                            $this->session->set_flashdata('error','Your Account has been Expired!');
                            redirect('login_new');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('error',"The password that you've entered is incorrect.");
                        redirect('login_new');
                    }
                } 
                else 
                {
                    $this->session->set_flashdata('error','Given username is not available in our database or Invalid Username');
                    redirect('login_new');
                }
            }
            else
            {
                $org_count = $this->login->get_list('organization_master', $data);
                if(count($org_count) > 0)
                {
                    foreach($org_count as $sts_res1)
                    {
                        $arr1=json_decode(json_encode($sts_res1), true);
                            $this->session->set_userdata('username', $data['username']);
                            $this->session->set_userdata('loginuser_id', $arr1['OrganizationId']);
                            $this->session->set_userdata('checkuser_opt', $option);
                            redirect('search');
                    }
                }
                else
                {
                    $this->session->set_flashdata('error','Given username is not available in our database or Invalid Username');
                    redirect('login_new');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('login_new');
        exit;
    }

    public function reset()
    {
        $data['Username'] = $this->input->post('useremail');
        if($data['Username']=='')
        {
            $this->session->set_flashdata('error','Please fill the email address to reset password');
            $this->load->view('login_new');
        }
        else
        {
            // $to_email= $this->input->post('useremail');;
            $option = $this->input->post('login_opt1');
            if($option=='individual')
            {
                $where = "username='".$this->input->post('useremail')."' OR EmailAddress='".$this->input->post('useremail')."'";
                $usr_count = $this->login->get_list('individual_master', $where);
                if(count($usr_count) > 0)
                {
                    //Load email library 
                    foreach($usr_count as $sts_res1)
                    {
                        $arr=json_decode(json_encode($sts_res1), true);
                        $username=$arr['Username'];
                        $password=$arr['Password'];
                        $EmailAddress=$arr['EmailAddress'];
                    }
                    $this->load->library('email'); 
               
                    $this->email->from('sathyavathy.s@eccma.org', 'sathya'); 
                    $this->email->to($EmailAddress);
                    $this->email->subject('eGOR Reset Password'); 
                    $this->email->set_newline("\r\n");
                    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                    $this->email->set_mailtype("html"); 
                    $message='<html><body><p>Please click on below link to reset your Password<br><a href="'.base_url().'/Login/forgotpwd/base64_encode('.$EmailAddress.')>Click Here</a></p></body></html>';
                    // $this->email->message('Your username: '.$username.' and password: '.$password.'');
                    $this->email->message($message); 
               
                     //Send mail 
                    if($this->email->send()) 
                    {
                        echo $this->email->print_debugger();
                    
                    // $this->session->set_flashdata("success","Email sent successfully."); 
                        echo "<div class='alert alert-success text-center mb-4' role='alert'> Email sent successfully.<span class='remove'>X</span></div>";
                    }
                    else
                    { 
                    // $this->session->set_flashdata("success","Error in sending Email.");
                        echo "<div class='alert alert-danger text-center mb-4' role='alert'> Error in sending Email.<span class='remove'>X</span></div>"; 
                    }
                }
                else
                {
                    // $this->session->set_flashdata('error','Given email address is not available in our database or Invalid email address');
                    echo "<div class='alert alert-danger text-center mb-4' role='alert'> Given email address is not available in our database or Invalid email address.<span class='remove'>X</span></div>";
                }
            }
            else
            {
                $org_count = $this->login->get_list('organization_master', $data);
                if(count($org_count) > 0)
                {

                    //Load email library 
                    foreach($org_count as $sts_res2)
                    {
                        $arr=json_decode(json_encode($sts_res2), true);
                        $username=$arr['Username'];
                        $password=$arr['Password'];
                    }
                    $this->load->library('email'); 
                    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                    $this->email->set_header('Content-type', 'text/html');
                    $this->email->set_mailtype("html"); 
                    $this->email->from('sathyavathy.s@eccma.org', 'sathya'); 
                    $this->email->to($to_email);
                    $this->email->subject('eGOR Reset Password'); 
                    
                    $message='<html><body><p>Please click on below link to reset your Password<br><a href="'.base_url().'/Login/forgotpwd/base64_encode('.$to_email.')>Click Here</a></p></body></html>';
                    // $this->email->message('Your username: '.$username.' and password: '.$password.'');
                    $this->email->message($message); 
               
                     //Send mail 
                    if($this->email->send()) 
                    // $this->session->set_flashdata("success","Email sent successfully."); 
                        echo "<div class='alert alert-success text-center mb-4' role='alert'> Email sent successfully.<span class='remove'>X</span></div>";
                    else 
                    // $this->session->set_flashdata("error","Error in sending Email."); 
                        echo "<div class='alert alert-danger text-center mb-4' role='alert'> Error in sending Email.<span class='remove'>X</span></div>";
                }
                else
                {
                    // $this->session->set_flashdata('error','Given email address is not available in our database or Invalid email address');
                    echo "<div class='alert alert-danger text-center mb-4' role='alert'> Given email address is not available in our database or Invalid email address.<span class='remove'>X</span></div>";
                }
            }
            
            // $this->load->view('login_new');
        }
        
    }

    public function forgotpwd($emailid)
    {
        $data['EmailAddress']=base64_decode($emailid);
        // pre($data);
        // $where = "EmailAddress='".base64_decode($emailid)."'";
        // $usr_count = $this->login->get_list('individual_master', $where);
        // pre($usr_count);
        // if(count($usr_count) > 0)
        // {
            $this->load->view('reset',$data);
        // }
        // else
        // {
        //     $this->session->set_flashdata('error','Given username or emailAddress is not available in our database or Invalid Username');
        //     redirect('login_new');
        // }
        
    }

    public function resetpwd()
    {
        $mailid=$this->input->post('useremail');
        $pwd1=$this->input->post('pwd1');
        $pwd2=$this->input->post('pwd2');
        if($pwd1==$pwd2)
        {
            $val_array1['Password']=$pwd1;
            $update_pwd = $this->login->update('individual_master',$val_array1 ,array('EmailAddress' => $mailid));
            $this->session->set_flashdata('success','Your Password has been Updated!');
            redirect('login_new');
        }
        else
        {
            $this->session->set_flashdata('error','Password and Confirm Password not matches');
            redirect('login_new/forgotpwd/'.base64_encode($mailid));
        }
    }
}