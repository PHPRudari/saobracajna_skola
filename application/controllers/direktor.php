<?php

require_once APPPATH . 'controllers/admin.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of direktor
 *
 * @author Korisnik
 */
class direktor extends admin {

    public function __construct() {
        parent::__construct();
        $tip = $this->session->userdata('tip');
        if ($tip == 1) {
            echo 'Niste autorizovani da pristupite stranici!!!';
            //dodati link ka indexu
            exit;
        }
       
         $this->controller = "direktor";
    }

    public function loadView($glavniDeo, $korisnici = NULL) {
        $korisnici['controller'] = $this->controller;
         
        $this->load->view('sabloni/header');
      $this->load->view('direktor/direktor_menu');
        $this->load->view($glavniDeo, $korisnici);
        $this->load->view('sabloni/footer');
    }

    public function administracija() {
        $result = $this->model_admin->dohvati_operatera();
        $data['korisnici'] = $result;
        $this->loadView("direktor/administracija.php", $data);
    }

    public function unos_operatera() {

        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('ime', 'Име', 'required');
        $this->form_validation->set_rules('prezime', 'Презиме', 'required');
        $this->form_validation->set_rules('kor_ime', 'Корисничко име', 'required');
        $this->form_validation->set_rules('lozinka', 'Лозинка', 'required');
        $this->form_validation->set_rules('lozinka2', 'Поновљена лозинка', 'required|matches[lozinka]');
        $this->form_validation->set_rules('email', 'Адреса е-поште', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->administracija();
        } else {
            $pass = $this->input->post('lozinka');
            $pass2 = $this->input->post('lozinka2');

            if ($pass != $pass2) {
                
                $data['poruka_sifra']='lozinke nisu iste';
                $this->administracija();
                  $this->session->set_userdata($data);
            } else {


                $this->model_admin->unos_operatera();
                $data = array(
                    'poruka' => "Оператер је успешно додат у базу.");
                $this->session->set_flashdata($data);
                redirect(site_url('direktor/administracija'));
            }
        }
    }
       
    public function obrisi_operatera($idkorisnik) {
            $this->model_admin->obrisi_operatera($idkorisnik);
            $data = array(
                    'poruka' => "Оператер је успешно обрисан.");
                $this->session->set_flashdata($data);
            redirect(site_url('/direktor/administracija'));
        }
        
        
    
        
        
      public function autocomplete()
{
     // load model
     $this->load->model('model_admin');

     $search_data = $this->input->post('search_data');

     $result = $this->model_admin->get_autocomplete($search_data);

     if (!empty($result))
     {
          foreach ($result as $row):
               echo "<li><a href='".$row->idkorisnik."'>" . $row->ime ." ".$row->prezime. "</a></li>";
          endforeach;
     }
     else
     {
           echo "<li> <em> Нема резултата </em> </li>";
     }
 }
 
}

//https://itsolutionstuff.com/post/codeigniter-3-generate-pdf-from-view-using-dompdf-library-with-exampleexample.html
    