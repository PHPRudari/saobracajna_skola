<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Author: Programeri BGD
 * Description: Admin controller class
 * Ovo mogu da vide samo ulogovani korisnici
 */

class admin extends CI_Controller {

    public $controller;

    public function __construct() {
        parent::__construct();
        $this->check_isvalidated();
// $this->load->helper('url');
        $this->load->model('model_admin');
        $this->controller = "admin";
    }

    public function index() {
        $this->loadView("index.php");
    }

    //RAZNE FUNKCIJE

    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect(site_url('/admin/index'));
        }
    }

    public function loadView($glavniDeo, $korisnici = NULL) {
        $korisnici['controller'] = $this->controller;

        $this->load->view('sabloni/header');
        $this->load->view('admin/admin_menu');
        $this->load->view($glavniDeo, $korisnici);
        $this->load->view('sabloni/footer');
    }

    public function do_logout() {
        $this->session->sess_destroy();
        redirect(site_url('/login/index'));
    }

    public function ubij_sesiju() {
        unset($_SESSION['prof']);
        $this->profesor();
    }

    public function ubij_sesiju_ucenik() {
        unset($_SESSION['ucenik']);
        $this->ucenik();
    }

    public function select_box() {
        $idpodrucje = $this->input->post('idpodrucje_rada');
//$idpodrucje="2"; 
        $result = $this->model_admin->dohvati_profil_smer($idpodrucje);

        echo '<option  selected  hidden>Образовни профил</option>';
        foreach ($result as $row) {
            echo '<option  value="' . $row['idobrazovni_profil'] . '">' . $row['naziv'] . '</option>';
        }
    }

//FUNKCIJE ZA RAD SA UČENIKOM

    public function ucenik() {
        $result = $this->model_admin->dohvati_podrucje();
        $result1 = $this->model_admin->dohvati_profil();
        $data['podrucje'] = $result;
        $data['profil'] = $result1;
        $result = $this->model_admin->dohvati_skolska_godina();
        $data['godina_obrazovanja'] = $result;
        $result = $this->model_admin->dohvati_tip_ucenik();
        $data['tip_ucenik'] = $result;
     
        if (isset($_SESSION['ucenik'])) {
            $_POST = $_SESSION['ucenik'];
        }

        $this->loadView("ucenik.php", $data);
    }

    public function unesi_ucenika() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // $_POST = $_SESSION['ucenik'];
        $this->form_validation->set_rules('jedinstveni_broj', 'Jedinstveni_broj', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('delovodni', 'Delovodni_broj', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('ugovor', 'Broj_ugovora', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('registar_broj', 'Registarski_broj', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('ime', 'Ime_ucenika', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('prezime', 'Prezime_ucenika', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('jmbg', 'Jmbg', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('ime_oca', 'Ime_oca', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('ime_majke', 'Ime_majke', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('prezime_majke', 'Prezime_majke', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('datum', 'Datum', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('mesto_rodj', 'Mesto_rodjenja', 'required', array('required' => 'Ово поље је обавезно.'));
        // $this->form_validation->set_rules('opstina_rodj', 'Opstina_rodjenja', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('drzava_rodj', 'Drzava_rodjenja', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('adresa_stan', 'Adresa_stanovanja', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('mesto_stan', 'Mesto_stanovanja', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('broj_tel', 'Broj_telefona', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('mobilni', 'Mobilni', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'Ово поље је обавезно.'));

        if ($this->form_validation->run() === FALSE) {
            $this->ucenik();
        } else {

            if (isset($_SESSION['ucenik'])) {
//  uradi update
                $_POST['iducenik'] = $_SESSION['ucenik']['iducenik'];

                $iducenik = $_POST['iducenik'];

                $this->model_admin->izmeni_ucenika($iducenik);

                $data['poruka'] = "Подаци о ученику су успешно измењени.";
                $this->session->set_flashdata($data);

                //unset($_SESSION['prof']);
                redirect(site_url("/$this->controller/ucenik"));

                // redirect(site_url("/$this->controller/profesor")); 
                //  $this->loadView("profesor.php");
            } else {


                $this->model_admin->unesi_ucenika();
                $data = array(
                    'poruka' => "Ученик је успешно додат у базу.");
                $this->session->set_flashdata($data);
                unset($_SESSION['ucenik']);
                redirect(site_url("/$this->controller/ucenik"));
            }
        }
    }

    public function trazi_ucenika() {
// load model
//$this->load->model('model_admin');

        $search_data = $this->input->post('search_data');

        $result = $this->model_admin->trazi_ucenika($search_data);

        if (!empty($result)) {
            foreach ($result as $row) {
// echo "<li><a href='".$row->idprofesor."'>" . $row->ime ." ".$row->prezime. "</a></li>";        

                echo "<li><a href='" . base_url("index.php/$this->controller/trazi_ucenika_id/") . $row->iducenik . "'>" . $row->ime . " " . $row->prezime . "</a></li>";
            }
        } else {
            echo "<li> <em>Нема резултата</em> </li>";
        }
    }

    public function trazi_ucenika_id($iducenik) {
        $result = $this->model_admin->dohvati_ucenika($iducenik);
        $_SESSION['ucenik'] = $result;
        $this->ucenik($result);
//print_r($result);
    }
    
    public function dohvati_rok() {
        $result = $this->model_admin->dohvati_rok();
        $_SESSION['rok']=$result;
    }

    public function dokumentacija() {
        $this->loadView("dokumentacija.php");
    }

    public function priznati_ispiti() {
//dodao
        //$result = $this->model_admin->dohvati_podrucje();
        $result1 = $this->model_admin->dohvati_profil();
        //$data['podrucje'] = $result;
        $data['profil'] = $result1;
        $result = $this->model_admin->dohvati_skolska_godina();
        $data['godina_obrazovanja'] = $result;
        $result = $this->model_admin->dohvati_predmet_ucenik();
        $data['predmet_ucenik'] = $result;
        if (isset($_SESSION['ucenik'])) {
            $_POST = $_SESSION['ucenik'];
        }

        
        $this->loadView("priznati_ispiti.php", $data);
    }

//FUNKCIJE ZA RAD SA profesorom


    public function profesor($result = NULL) {
        $result = $this->model_admin->dohvati_predmet();
        $data['predmet'] = $result;
       
        $result1 = $this->model_admin->profesor_predaje();
        $data['predmeti'] = $result1;


        if (isset($_SESSION['prof'])) {
            $_POST = $_SESSION['prof'];
        }

        $this->loadView("profesor.php", $data);
    }

    public function unesi_profesora($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

//$this->form_validation->set_data($data);
        //unset($_SESSION['prof']);


        $this->form_validation->set_rules('ime', 'Ime_profesora', 'required|min_length[3]|max_length[20]', array('required' => 'Ово поље је обавезно.',
            'min_length' => 'Име мора да садржи најмање 3 алфанумеричка карактера.',
            'max_length' => 'Име мора да садржи највише 20 алфанумеричких карактера.'));
        $this->form_validation->set_rules('prezime', 'Prezime_profesora', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('adresa', 'Adresa_stanovanja', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('broj_telefon', 'Broj_telefona', 'required', array('required' => 'Ово поље је обавезно.'));
        $this->form_validation->set_rules('e-mail', 'Email', 'required', array('required' => 'Ово поље је обавезно.'));
        //$this->form_validation->set_rules('status', 'Status', 'required', array('required' => 'Ово поље је обавезно.'));
        // $this->form_validation->set_rules('predmet', 'Predmet', 'required', array('required' => 'Ово поље је обавезно.'));


        if ($this->form_validation->run() === FALSE) {
//$this->form_validation->set_message($data, '{field} nije u ispravnom obliku!');
            //$this->loadView("profesor.php");
            $this->profesor();
        } else {

            if (isset($_SESSION['prof'])) {
//  uradi update
                $_POST['idprofesor'] = $_SESSION['prof']['idprofesor'];

                $id = $_POST['idprofesor'];

                $this->model_admin->izmeni_profesora($id);

                $data['poruka'] = "Подаци о професору су успешно измењени.";
                $this->session->set_flashdata($data);

                //unset($_SESSION['prof']);
                redirect(site_url("/$this->controller/profesor"));

                // redirect(site_url("/$this->controller/profesor")); 
                //  $this->loadView("profesor.php");
            } else {


                $this->model_admin->unesi_profesora();
                $data = array(
                    'poruka' => "Професор је успешно додат у базу.");
                $this->session->set_flashdata($data);
                unset($_SESSION['prof']);
                redirect(site_url("/$this->controller/profesor"));
            }
        }
    }

    public function trazi_profesora() {
// load model
//$this->load->model('model_admin');

        $search_data = $this->input->post('search_data');

        $result = $this->model_admin->trazi_profesora($search_data);

        if (!empty($result)) {
            foreach ($result as $row) {
// echo "<li><a href='".$row->idprofesor."'>" . $row->ime ." ".$row->prezime. "</a></li>";        

                echo "<li><a href='" . base_url("index.php/$this->controller/trazi_profesora_id/") . $row->idprofesor . "'>" . $row->ime . " " . $row->prezime . "</a></li>";
            }
        } else {
            echo "<li> <em> Nema rezultata... </em> </li>";
        }
    }

    public function trazi_profesora_id($id) {
        $result = $this->model_admin->dohvati_profesora($id);
        $_SESSION['prof'] = $result;
        $this->profesor($result);
//print_r($result);
    }

    public function profesor_predaje() {
        $result = $this->model_admin->profesor_predaje();
        $data['predmeti'] = $result;
        $this->loadView("admin/profesor.php", $data);
    }

    public function predmet() {
        $result = $this->model_admin->dohvati_podrucje();
        $result1 = $this->model_admin->dohvati_profil();
        $data['podrucje'] = $result;
        $data['profil'] = $result1;
        $result = $this->model_admin->dohvati_skolska_godina();
        $data['godina_obrazovanja'] = $result;
        $result=$this->model_admin->dohvati_predmet();
        $data['predmet']=$result;
        $this->loadView("predmet.php",$data);
    }

    public function trazi() {
//$result=$this->model_admin->pretraga();
        $trazi = $this->input->post('pretraga');

        $this->db->like("ime", $trazi);
        $this->db->or_like("prezime", $trazi);
        $this->db->from("profesor");
        $this->db->select("*");

        $query = $this->db->get();

        $result = $query->result_array();

        $data['pretraga'] = $result;
        $this->loadview("pretraga.php", $data);
    }

    public function prijava_ispita() {
         if (isset($_SESSION['ucenik'])) {
            $this->dohvati_rok();
            $result=$this->model_admin->nepolozeni_ispiti();
            $_SESSION['nepolozeni_ispiti']=$result;
         }
        $this->loadView("prijava_ispita.php");
    }

    public function raspored() {
        $this->loadView("raspored.php");
    }

    public function statistika() {
        
        $this->dohvati_rok();
        $this->loadView("statistika.php");
    }

    public function obrisi_predmet($idpredmet) {
        $this->model_admin->obrisi_predmet($idpredmet);
        $data = array(
            'poruka' => "Предмет је успешно обрисан.");
        $this->session->set_flashdata($data);
        redirect(site_url("/$this->controller/profesor"));
    }

    public function unesi_podrucje() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // $_POST = $_SESSION['ucenik'];
        $this->form_validation->set_rules('podrucje_rada', 'Podrucje_rada', 'required', array('required' => 'Ово поље је обавезно.'));

        if ($this->form_validation->run() === FALSE) {
            $this->predmet();
        } else {
            $this->model_admin->unesi_podrucje();
            $data['poruka'] = "Подручје рада је успешно додато у базу."; //TODO
            redirect(site_url("/$this->controller/predmet"));
        }
    }
    
    public function unesi_obrazovni_profil() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // $_POST = $_SESSION['ucenik'];
        $this->form_validation->set_rules('obrazovni_profil', 'Obrazovni_profil', 'required', array('required' => 'Ово поље је обавезно.'));

        if ($this->form_validation->run() === FALSE) {
            $this->predmet();
        } else {
            $this->model_admin->unesi_obrazovni_profil();
            $data['poruka'] = "Образовни профил је успешно додат у базу."; //TODO
            redirect(site_url("/$this->controller/predmet"));
        }
    }
    
    public function unesi_novi_predmet() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // $_POST = $_SESSION['ucenik'];
        $this->form_validation->set_rules('ime_predmeta', 'Ime_predmeta', 'required', array('required' => 'Ово поље је обавезно.'));

        if ($this->form_validation->run() === FALSE) {
            $this->predmet();
        } else {
            $this->model_admin->unesi_novi_predmet();
            $data['poruka'] = "Образовни профил је успешно додат у базу."; //TODO
            redirect(site_url("/$this->controller/predmet"));
        }
    }
    
    public function obrisi_profil($idprofil) {
        $this->model_admin->obrisi_profil($idprofil);
        $data = array(
            'poruka' => "Образовни профил је успешно обрисан.");
        $this->session->set_flashdata($data);
        redirect(site_url("/$this->controller/predmet"));
    }

    public function obrisi_podrucje($idpodrucje) {
        $this->model_admin->obrisi_podrucje($idpodrucje);
       
        
        
        $data['poruka'] = "Подручје рада је успешно обрисано.";
        $this->session->set_flashdata($data);
        redirect(site_url("/$this->controller/predmet"));
    }
/*DRAGAN*/
    public function obrisi_novi_predmet($idpredmet) {
        $this->model_admin->obrisi_novi_predmet($idpredmet);
        $data = array(
            'poruka' => "Предмет је успешно обрисан.");
        $this->session->set_flashdata($data);
        redirect(site_url("/$this->controller/predmet"));
    }
    
    function do_upload() {

        $id = $_SESSION['ucenik']['iducenik'];

        if (!is_dir("./uploads/$id")) {
            mkdir("./uploads/$id", 0700);
        }


        $config['upload_path'] = "./uploads/$id";

        $config['allowed_types'] = 'txt|gif|jpg|png|pdf|doc|docx|bmp|xls|xlsx';

        $config['max_size'] = '0';

        $config['max_width'] = '10240';

        $config['max_height'] = '7680';

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());

            $this->loadView('dokumentacija', $error);
        } else {

            $data = array('upload_data' => $this->upload->data());
           $data ['poruka'] = "<h3 style='color:red'>Документ је успешно сачуван.</h3>";
//            $this->load->view('upload_success', $data);
            $this->loadView('dokumentacija', $data);
            //redirect(site_url("/$this->controller/dokumentacija"));
        }
    }

    public function priznaj_ispite() {

        $this->model_admin->priznaj_ispite();
        //var_dump($_POST['predmet']);
        //var_dump($_POST['ocena']);
        redirect(site_url("/$this->controller/priznati_ispiti"));
    }

    public function stampa($ime) {
        $data['prijavljeni']=$this->model_admin->prijavljeni_ispiti();
        $this->load->library('pdfgenerator');
        $data['users'] = array(
            array('firstname' => 'I am', 'lastname' => 'Programmer', 'email' => 'iam@programmer.com'),
            array('firstname' => 'I am', 'lastname' => 'Designer', 'email' => 'iam@designer.com'),
            array('firstname' => 'I am', 'lastname' => 'User', 'email' => 'iam@user.com'),
            array('firstname' => 'I am', 'lastname' => 'Quality Assurance', 'email' => 'iam@qualityassurance.com')
        );
        //print_r($_SESSION['prijavljeni']);
        $html = $this->load->view("izvestaji/$ime", $data, true);
        $filename = 'report_' . time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }
    
    public function prijavi_ispite() {
         $this->model_admin->prijavi_ispite();
         redirect(site_url("/$this->controller/prijava_ispita"));
    }

    public function prijavljeni_ispiti() {
        $result=$this->model_admin->prijavljeni_ispiti();
        $_SESSION['prijavljeni']=$result; 
       // var_dump($_SESSION['prijavljeni']);
        
        $this->loadView("izvestaji/prijavljeni.php");
    }
    
    public function obrisi_prijavljeni_ispit($idpredmet) {
         $this->model_admin->obrisi_prijavljeni_ispit($idpredmet);
        
        redirect(site_url("/$this->controller/ucenik_prijava"));
        
    }
    
    
    public function pregled_priznatih() {
        $result=$this->model_admin->pregled_priznatih();
        $_SESSION['priznati']=$result; 
       // var_dump($_SESSION['prijavljeni']);
        
        $this->loadView("pregled_priznatih.php");
    }
    
    public function obrisi_priznati_ispit($idpredmet) {
         $this->model_admin->obrisi_priznati_ispit($idpredmet);
        
        redirect(site_url("/$this->controller/pregled_priznatih"));
        
    }
    
    
    
    
    public function ucenik_prijava() {
        $result= $this->model_admin->ucenik_prijava();
        $_SESSION['prijava_ucenik']=$result;
         $this->loadView("izvestaji/ucenik_prijavljeni.php");
    }
    
    


public function pregled_prijava_stampa() {
    
    
    $result= $this->model_admin->pregled_prijava_stampa($this->uri->segment(3), $this->uri->segment(4));
   
    $_SESSION['pregled_prijava_stampa']=$result;
    //print_r($result);
    //$this->loadView("izvestaji/pregled_prijava.php");
    $this->stampa('stampa_prijava.php');
    
}

public function dohvati_pregled_prijava() {
    redirect(site_url("/$this->controller/pregled_prijava/".$this->input->post('godina_prijave')."/".$this->input->post('rok_prijave')));
}

    
    public function pregled_prijava() {
       
        $this->load->helper("url");
        $this->load->library('pagination');
        
        $config = array();
        $config["base_url"] = site_url() . "/$this->controller/pregled_prijava/". $this->uri->segment(3) ."/". $this->uri->segment(4);
        $config["total_rows"] = $this->model_admin->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 5;
       // $config["first_link"] = "Прва";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data["results"] = $this->model_admin->pregled_prijava($config["per_page"], $page, $this->uri->segment(3), $this->uri->segment(4));
        $data["links"] = $this->pagination->create_links();
        $data["rok"] = $this->uri->segment(4);
        $data["godina"] = $this->uri->segment(3);
        // $this->pregled_prijava_stampa();
        $this->loadview("izvestaji/pregled_prijava_paginacija.php", $data);
    }




}



//https://arjunphp.com/generating-a-pdf-in-codeigniter-using-mpdf/
?>
