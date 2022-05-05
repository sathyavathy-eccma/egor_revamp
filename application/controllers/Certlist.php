<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Certlist extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('Certlist_Model', 'cert_list', true);
        $this->load->library('Ajax_pagination');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->load->library('mpdf/Mpdf');
    }

    public function mdqm()
    {
        if ($this->session->userdata('username'))
        {
            $data['type']='mdqm';
            $this->layout->view('cert_type_list',$data);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function qdp()
    {
        if ($this->session->userdata('username'))
        {
            $data['type']='qdp';
            $this->layout->view('cert_type_list',$data);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function search()
    {
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 

        $this->perPage = $this->input->post('limit'); 
        $data1['start'] = $offset; 
        $data1['cert_type']=$this->input->post('cert_type');
        $data1['limit']=$this->input->post('limit');
        $data1['srchvalue']=$this->input->post('srchvalue');
        $data1['srchtype']=$this->input->post('srchtype');

        $data = array(); 

        // Get record count 
        $conditions1[] = $data1; 

        $totalRec =  $this->cert_list->srch_count($conditions1); 

        $config['target']      = '#result'; 
        $config['base_url']    = base_url('Certlist/search'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
        
        $data['posts'] = $this->cert_list->tblsrch($conditions1); 

        $this->load->view('ajax_certlist', $data, false); 
        
    }

    public function texteditor($id)
    {
        $mail_type=$this->uri->segment('3');
        $indid=base64_decode($this->uri->segment('4'));
        $this->ckeditor->basePath = base_url().'assets/ckeditor/';
        // $this->ckeditor->config['toolbar'] = array(
        //                 array( 'Source', '-','Save', 'NewPage', 'ExportPdf', 'Preview', 'Print', '-', 'Templates', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
        //                                                     );
        $this->ckeditor->config['language'] = 'us';
        $this->ckeditor->config['width'] = '960px';
        $this->ckeditor->config['height'] = '300px';            

        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/'); 
        if($mail_type=='1')
        {
            $dataarray=array();
            $content="";
            $data['sel_ind'] = $this->cert_list->get_list('individual_master', array('IndividualId' => base64_decode($indid)));
            $arr=json_decode(json_encode($data), true);
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $dataarray['username']=$val['Username'];
                    $dataarray['password']=$val['Password'];
                    $dataarray['LegalName']=$val['LegalName'];
                    $dataarray['EmailAddress']=$val['EmailAddress'];
                }
            }
            $dataarray['subject']="ISO 8000 MDQM Certification Login Details (".$dataarray['LegalName'].")";
            $dataarray['content']="<p>Hello ".$dataarray['LegalName'].",<br /><br />Thank you for registering for ECCMA&rsquo;s Master Data Quality Manager Certification.<br /><br />To access the online training material and certification test, please go to <a href='https://eccmatraining.com/'>www.eccmatraining.com</a> and select the &ldquo;<strong>ISO 8000 Master Data Quality Manager</strong>&rdquo; course under the 'Available courses'. Use the credentials below to login.<br /><br />User Name: ".$dataarray['username']."<br />Password: ".$dataarray['password']."<br /><br />The first time you try to access the ISO 8000 Master Data Quality Manager Course an enrollment key will be requested,&nbsp;use <strong>MDQM201804</strong><br /><br />Once in the course we recommend you review the documents &ldquo;<strong>Policy</strong>&rdquo; and &ldquo;<strong>How to use</strong>&rdquo; to ensure you are familiar with how to proceed with the process.<br /><br />Please do not hesitate to contact me if you have any questions or clarifications with regard to the process. We look forward to seeing you become a certified Master Data Quality Manager.<br /><br /><br />Regards,</p>
            <p><strong>Grace Peninal</strong> | <strong>ECCMA Certification Supervisor</strong><br /><strong>ECCMA </strong>| <a href='https://eccma.org/'><strong>www.eccma.org</strong></a> | <strong>ISO 8000 ALEI:</strong> [<a href='https://ealei.org/aleidetails/VVMtREUuQkVSOjMwMzE2NTc='><strong>US-DE.BER:3031657</strong></a>]<br /><em>ISO 8000 Data Quality Solutions for the Smart Supply Chain</em><br /><a href='mailto:grace.p@eccma.org'><strong>grace.p@eccma.org</strong></a><br /><br /><br /><img src='assets/images/mdqm_logo.png'></p>";
            
        }
        if($mail_type=='2')
        {
            $dataarray=array();
            $content="";
            $data['sel_ind'] = $this->cert_list->get_list('iso', array('IndividualId' => $indid));
            $arr=json_decode(json_encode($data), true);
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $dataarray['CertificateNumber']=$val['CertificateNumber'];
                }
            }
            $data['sel_ind'] = $this->cert_list->get_list('individual_master', array('IndividualId' => $indid));
            $arr1=json_decode(json_encode($data), true);
            foreach($arr1 as $val1)
            {
                foreach($val1 as $val)
                {
                    $dataarray['LegalName']=$val['LegalName'];
                    $dataarray['EmailAddress']=$val['EmailAddress'];
                }
            }
            $dataarray['subject']="ISO 8000 MDQM Certification - (".$dataarray['LegalName'].")";
            $dataarray['content']="<p>Dear ".$dataarray['LegalName'].",<br /><br />Congratulations! You have completed the ISO 8000 MDQM Certification, you are certified as&nbsp;Master Data Quality Manager.<br />&nbsp;<br />Follow the next steps to improve your experience as MDQM:</p>
                <ul>
                <li>Download the attached MDQM e-Certificate.</li>
                <li>Download the attached MDQM logo; you can use it on your email signature. See my email signature below as an example.</li>
                <li>Add the ALEI record for your company in your email signature; if you don't know the ALEI record for your company find it at <a href='https://ealei.org/'>eALEI.org</a>.</li>
                <li>If you sell products or services, register your ISO 8000-115 prefix at&nbsp;<a href='https://smartprefix.org/'>SmartPrefix</a>.</li>
                <li>Join our community on LinkedIn <a href='https://www.linkedin.com/company/eccma/mycompany/'>here</a>.</li>
                <li>Join the ECCMA certified ISO 8000 Master Data Quality Managers (MDQM) LinkedIn Group <a href='https://www.linkedin.com/groups/1667647/'>here</a>.</li>
                <li>You can connect with ECCMA consultants on LinkedIn:</li>
                </ul>
                <p><br /><a href='https://www.linkedin.com/in/peterrichardbenson/'>Peter Benson</a>, ECCMA Executive Director<br /><br /><a href='https://www.linkedin.com/in/hayley-thompson-55b2a762/'>Hayley Thompson</a>, ECCMA&nbsp;Administrative Director and Corporate Secretary</p>
                <p><br /><br />If you need assistance or have any comments, please contact the ECCMA Membership Relationship Manager, Ruth Hinojosa at&nbsp;<a href='mailto:ruth.hinojosa@eccma.org'>ruth.hinojosa@eccma.org</a>.<br /><br /><br />Regards,</p>
                <p><strong>Grace Peninal</strong> | <strong>ECCMA Certification Supervisor</strong><br /><strong>ECCMA </strong>| <a href='https://eccma.org/'><strong>www.eccma.org</strong></a> | <strong>ISO 8000 ALEI:</strong> [<a href='https://ealei.org/aleidetails/VVMtREUuQkVSOjMwMzE2NTc='><strong>US-DE.BER:3031657</strong></a>]<br /><em>ISO 8000 Data Quality Solutions for the Smart Supply Chain</em><br /><a href='mailto:grace.p@eccma.org'><strong>grace.p@eccma.org</strong></a><br /><br /><br /><br /><img src='assets/images/mdqm_logo.png'></p>";

            //Certificate Generation part
                // include("mpdf/mpdf.php");
                $data1['iso'] = $this->cert_list->get_list('iso', array('IndividualId' => $indid));
                $arr2=json_decode(json_encode($data1), true);
                foreach($arr2 as $val1)
                {
                    foreach($val1 as $val)
                    {
                        $dataarray['IndividualId']=$val['IndividualId'];
                        $dataarray['Email']=$val['Email'];
                        $dataarray['LegalName']=$val['LegalName'];
                        $dataarray['CertifiedDate']=$val['CertifiedDate'];
                        $dataarray['RenewalDate']=$val['RenewalDate'];
                        $dataarray['ExpiredDate']=$val['ExpiredDate'];
                        $dataarray['CertificateNumber']=$val['CertificateNumber'];
                    }
                }

                $data2['individual_master'] = $this->cert_list->get_list('individual_master', array('IndividualId' => $indid));
                $arr3=json_decode(json_encode($data2), true);
                foreach($arr3 as $val1)
                {
                    foreach($val1 as $val)
                    {
                        $dataarray['IndividualId']=$val['IndividualId'];
                        $dataarray['LegalName']=$val['LegalName'];
                    }
                }

                $data3['individual_value'] = $this->cert_list->get_list('individual_value', array('IndividualId' => $indid));
                $arr4=json_decode(json_encode($data3), true);
                foreach($arr4 as $val1)
                {
                    foreach($val1 as $val)
                    {
                        $dataarray['IndividualId']=$val['IndividualId'];
                        $dataarray['Property']=$val['Property'];
                        $dataarray['Value']=$val['Value'];
                        if($dataarray['Property']=='0161-1#02-159219#1')
                        {
                            $add1=$val['Value'];
                        }
                        if($dataarray['Property']=='0161-1#02-160683#1')
                        {
                            $add2=$val['Value'];
                        }
                        if($dataarray['Property']=='0161-1#02-102127#1')
                        {
                            $City=$val['Value'];
                        }
                        if($dataarray['Property']=='0161-1#02-153697#1')
                        {
                            $state=$val['Value'];
                        }
                        if($dataarray['Property']=='0161-1#02-091098#1')
                        {
                            $country=$val['Value'];
                        }
                        if($dataarray['Property']=='0161-1#02-000029#1')
                        {
                            $zipcode=$val['Value'];
                        }
                        
                    }
                }
                $this->mpdf->mPDF();
                // $html="test";
                    $html .= "
                    <html>
                    <head>
                    <style>
                    </style>
                    </head>
                    <!--mpdf                                                                          
                    <sethtmlpageheader name='myheader' value='on' show-this-page='1' />
                    <sethtmlpagefooter name='myfooter' value='on' />
                    mpdf-->

                    <body>
                      <div>
                        <div>
                          <div  style='float: left;width: 24%;background: rgb(13,53,134);background: linear-gradient(-90deg, rgba(13,53,134,1) 1%, rgba(22,134,203,1) 31%, rgba(115,202,233,1) 49%, rgba(255,255,255,1) 67%);'><br>
                            <img src='mdqmlogo.png' style='width:140px;margin-left: 45px;padding-top: 868x;'>
                          </div>
                          <div style='background-color:white;float: left;width: 75%;'>
                            <div style='padding: 5px;'>
                              <table style='width: 100%;padding-top: 20px'>
                                <tr>
                                  <td><img src='logo.png' style='width:130px;padding-top:20px;padding-left:15px'></td> 
                                  <td style='padding-right: 30px;padding-top:120px;text-align:right;font-size:18px;font-family: Sabon LT Regular'>Certificate: ECCMA.MDQM:".$dataarray['CertificateNumber']."<br>Original Certification Date: ".date('Y-m-d')."</td> 
                                </tr>     
                              </table><br><br>
                              <table style='width: 100%;font-size:18px;padding-top:10px;'>
                                <tr>
                                    <td style='text-align:center;font-family:Sabon LT Regular'>
                                        This is to certify that                   
                                    </td>
                                </tr>  
                              </table>
                              <table style='padding-top: 55px;width:100%;'>            
                                <tr>
                                  <td style='text-align:right;font-family: Sabon LT Bold;font-size:26px;width: 40%;' >
                                   <b>".$dataarray['LegalName']."</b>
                                  </td>
                                  <td style='text-align:center;width: 10%;font-size:18px;padding:50px;'>
                                    of
                                  </td>
                                  <td style='text-align:left;width: 50%;line-height:1.3;font-family:Sabon LT Regular;font-size:20px; padding-right:10px;'>
                                    ".$add1."<br>".$add2.", ".$state." ".$zipcode.",<br>".$country."</td>
                                </tr>
                              </table>
                              <table style='padding-top:35px;padding-left:15px;width: 100% ; text-align: center;font-size:18px;line-height:0.3;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>has been assessed by the<td>
                                  </td>
                                <tr>
                                  <td>Electronic Commerce Code Management Association (ECCMA)</td>
                                  </tr>
                                <tr>
                                  <td>
                                  and found to be in conformance with the requirements set forth in
                                  </td>
                                </tr>
                              </table>
                              <table style='padding-top:8px;width: 100% ; text-align: center;font-size:32px;font-weight:bold;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>ISO 8000
                                  </td>     
                                </tr>
                              </table>
                              <table style='padding-top:6px;width: 100% ; text-align: center;font-size:18px;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>in respect of proficiency as a
                                  </td>     
                                </tr>
                              </table>
                              <table style='padding-top:10px;width: 100% ; text-align: center;font-weight:bold;font-size:32px;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>Master Data Quality Manager
                                  </td>     
                                </tr>
                              </table>
                              <table style='padding-top:20px;width: 100% ; text-align: center;font-size:18px;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>This certificate is valid from</td>
                                </tr>
                                <tr>
                                  <td>".$dataarray['CertifiedDate']." until ".$dataarray['ExpiredDate']."</td>
                                </tr>
                              </table>
                              <table style='padding-top:20px;width: 100% ; text-align: center;font-size:18px;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>Certified by
                                  </td>           
                                </tr>
                              </table>
                              <table style='width: 100% ; text-align: center;'>
                                <tr>
                                  <td><img src='hts.png' style='width:180px;height: 68px;'>
                                  </td>     
                                </tr>
                              </table>
                              <table style='width: 100% ; text-align: center;font-family:Sabon LT Regular'>
                                <tr>
                                  <td style='font-size:18px;' ><b>Hayley Thompson</b></td>
                                </tr>
                                <tr>
                                  <td style='font-size:15px;'>Administrative Director
                                </td>     
                                </tr>
                              </table><br>
                              <table style='padding-top:20px;width: 100% ; text-align: center;font-size:16px;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>Validity of this certificate can be verified at www.eccma.org
                                  </td>     
                                </tr>
                              </table>
                              <table style='padding-top:3px;width: 100% ; text-align: center;font-size:16px;font-family:Sabon LT Regular'>
                                <tr>
                                  <td>ECCMA | P.O. Box J, Bath, PA 18014<br>t: +1 610 851 4290 | e: info@eccma.org
                                  </td>     
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    </body>

                    </html>
                    ";

                $mpdf=new mPDF();
                $mpdf->WriteHTML($html);
                $mpdf->SetDisplayMode('fullpage');

                // To Auto download generated mPDF file
                // $mpdf->Output('MyPDF.pdf', 'D');
                $pdf_res=$mpdf->Output('MDQM Certificate'.$dataarray['CertificateNumber'].'_'.$dataarray['LegalName'].'', 'D');
                // And a path where the file will be created
                $path = $mpdf->Output($_SERVER["DOCUMENT_ROOT"].'/egor_revamp/assets/cert/MDQM Certificate'.$dataarray['CertificateNumber'].'_'.$dataarray['LegalName'].'.pdf');

                // Then just save it like this
                file_put_contents( $path, $pdf_res );

        }
        if($mail_type=='3')
        {
            $dataarray=array();
            $content="";
            $data['sel_ind'] = $this->cert_list->get_list('individual_master', array('IndividualId' => $indid));
            $arr=json_decode(json_encode($data), true);
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $dataarray['username']=$val['Username'];
                    $dataarray['password']=$val['Password'];
                    $dataarray['LegalName']=$val['LegalName'];
                    $dataarray['EmailAddress']=$val['EmailAddress'];
                }
            }
            $dataarray['subject']="ISO 8000 MDQM Certification Login Details (".$dataarray['LegalName'].")";
            $dataarray['content']="<html><body><p>Hi ".$dataarray['LegalName'].",<br /><br />I have extended your enrollment date to till <span id='some_date'>4th May 2022</span>, so please try to complete the process before due date. <br /><br />Please do not hesitate to contact me if you have any questions or clarifications with regard to the process.<br /><br /><br />Regards,</p>
                <p><strong>Grace Peninal</strong> | <strong>ECCMA Certification Supervisor</strong><br /><strong>ECCMA </strong>| <a href='https://eccma.org/'><strong>www.eccma.org</strong></a> | <strong>ISO 8000 ALEI:</strong> [<a href='https://ealei.org/aleidetails/VVMtREUuQkVSOjMwMzE2NTc='><strong>US-DE.BER:3031657</strong></a>]<br /><em>ISO 8000 Data Quality Solutions for the Smart Supply Chain</em><br /><a href='mailto:grace.p@eccma.org'><strong>grace.p@eccma.org</strong></a><br /><br /><br /><img src='assets/images/mdqm_logo.png'></p></body></html>";
        }
        $this->load->view('text_editor',$dataarray);
        
    }

    public function sendmail()
    {
        if(isset($_POST))
        {
            $name=$_POST['name'];
            $subject=$_POST['subject'];
            $content=$_POST['email_template'];
            // $to_email=$_POST['tomail'];
            $to_email="sathyavathy.s@eccma.org";
            $from_email="sathyavathy.s@eccma.org";
            $this->load->library('email');
            $this->email->from($from_email, 'Your Name'); 
            $this->email->to($to_email);
            $this->email->subject($subject); 
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_mailtype("html"); 
            $this->email->message($content); 
            // if ( $_FILES['upload_file']['name']!='' && $_FILES['upload_file']['size'] > 0 )
            // {
            //     $attach_path = $_FILES['upload_file']['tmp_name'];
            //     $attach_name = $_FILES['upload_file']['name'];
            // $this->email->attach($_SERVER["DOCUMENT_ROOT"]."assets/cert/MyPDF.pdf",'attachment',$attach_name);
            // }

            //to attach file from server
            $attched_file= $_SERVER["DOCUMENT_ROOT"].'/egor_revamp/assets/cert/MyPDF.pdf';
            $this->email->attach($attched_file);
       
             //Send mail 
            if($this->email->send()) 
            {
                redirect(base_url("certlist/mdqm"));
            }
            else 
            {
                echo "Error in sending mail";
                exit;
            }
        }
    }
}
?>