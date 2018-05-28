<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_admin
 *
 * @author Korisnik
 */
class model_admin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //FUNKCIJE ZA RAD SA UČENIKOM 

    public function unesi_ucenika() {
        
        if (isset($_POST['oslobodjen'])) {
            $oslobodjen = 1;
        } else {
            $oslobodjen = 0;
        }
        $data = array(
            'jedinstveni_broj_ucenik' => $this->input->post("jedinstveni_broj"),
            'delovodni_broj' => $this->input->post("delovodni"),
            'broj_ugovor' => $this->input->post("ugovor"),
            'registar_broj' => $this->input->post("registar_broj"),
            'ime' => $this->input->post("ime"),
            'prezime' => $this->input->post("prezime"),
            'jmbg' => $this->input->post("jmbg"),
            'ime_otac' => $this->input->post("ime_oca"),
            'ime_majka' => $this->input->post("ime_majke"),
            'prezime_majka' => $this->input->post("prezime_majke"),
            'datum_rodjenje' => $this->input->post("datum", mdate("%Y-%m-%d")),
            'mesto_rodjenje' => $this->input->post("mesto_rodj"),
            //'opstina_rodjenje' => $this->input->post("opstina_rodj"),
            'drzava_rodjenje' => $this->input->post("drzava_rodj"),
            'adresa_stanovanje' => $this->input->post("adresa_stan"),
            'mesto_stanovanje' => $this->input->post("mesto_stan"),
            'broj_telefon' => $this->input->post("broj_tel"),
            'telefon_mobilni' => $this->input->post("mobilni"),
            'e-mail' => $this->input->post("email"),
            'datum_upis' => $this->input->post("datum_upis", mdate("%Y-%m-%d")),
            'oslobodjen_placanje' => $oslobodjen,
            'godina_obrazovanja_idgodina_obrazovanja' => $this->input->post("godina_obrazovanja"),
            'obrazovni_profil_idobrazovni_profil' => $this->input->post("profil"),
            'tip_ucenik_idtip_ucenik' => $this->input->post("tip_ucenik")
        );

        $this->db->insert("ucenik", $data);
        
        $iducenik = $this->db->insert_id();

        // var_dump($id);

    }
    
    public function dohvati_ucenika($iducenik) {
        $this->db->where("iducenik", $iducenik);
        $query = $this->db->get('ucenik');
        $result = $query->row_array(); //vraca jednu vest
        return $result;
    }
    
    public function izmeni_ucenika($iducenik) {

        $data = array(
            'jedinstveni_broj_ucenik' => $this->input->post("jedinstveni_broj"),
            'delovodni_broj' => $this->input->post("delovodni"),
            'broj_ugovor' => $this->input->post("ugovor"),
            'registar_broj' => $this->input->post("registar_broj"),
            'ime' => $this->input->post("ime"),
            'prezime' => $this->input->post("prezime"),
            'jmbg' => $this->input->post("jmbg"),
            'ime_otac' => $this->input->post("ime_oca"),
            'ime_majka' => $this->input->post("ime_majke"),
            'prezime_majka' => $this->input->post("prezime_majke"),
            'datum_rodjenje' => $this->input->post("datum", mdate("%Y-%m-%d")),
            'mesto_rodjenje' => $this->input->post("mesto_rodj"),
            //'opstina_rodjenje' => $this->input->post("opstina_rodj"),
            'drzava_rodjenje' => $this->input->post("drzava_rodj"),
            'adresa_stanovanje' => $this->input->post("adresa_stan"),
            'mesto_stanovanje' => $this->input->post("mesto_stan"),
            'broj_telefon' => $this->input->post("broj_tel"),
            'telefon_mobilni' => $this->input->post("mobilni"),
            'e-mail' => $this->input->post("email"),
            'datum_upis' => $this->input->post("datum_upis", mdate("%Y-%m-%d")),
            'oslobodjen_placanje' => $oslobodjen,
            'godina_obrazovanja_idgodina_obrazovanja' => $this->input->post("godina_obrazovanja"),
            'obrazovni_profil_idobrazovni_profil' => $this->input->post("profil"),
            'tip_ucenik_idtip_ucenik' => $this->input->post("tip_ucenik")
        );



        $this->db->where('iducenik', $iducenik);

        $this->db->update('ucenik', $data);

    }

    public function trazi_ucenika($search_data) {
        $this->db->select('ime, prezime, iducenik');
        $this->db->like('ime', $search_data);
        $this->db->or_like('prezime', $search_data);
        $this->db->or_like('jmbg', $search_data);
        return $this->db->get('ucenik', 10)->result();
    }

    public function dohvati_skolska_godina() {
        $query = $this->db->get('godina_obrazovanja');
        $result = $query->result_array();
        return $result;
    }

    public function dohvati_tip_ucenik() {
        $query = $this->db->get('tip_ucenik');
        $result = $query->result_array();
        return $result;
    }

//}
    //FUNKCIJE ZA RAD SA profesorom  

    public function unesi_profesora() {

        $data = array(
            'ime' => $this->input->post("ime"),
            'prezime' => $this->input->post("prezime"),
            'adresa' => $this->input->post("adresa"),
            'broj_telefon' => $this->input->post("broj_telefon"),
            'e-mail' => $this->input->post("e-mail"),
            'angazovan_sa_strane' => $this->input->post("angazovan"),
            'status' => $this->input->post("status"),
                // 'predmet' => $this->input->post("predmet")
        );

        $this->db->insert("profesor", $data);

        $id = $this->db->insert_id();

        // var_dump($id);

        foreach ($_POST['predmet'] as $item) {
            //  var_dump($item);

            $data = array(
                'profesor_idprofesor' => $id,
                'predmet_idpredmet' => $item);
            $this->db->query("insert into profesor_has_predmet values ('$id','$item')");
        }
    }

    public function dohvati_profesora($idprofesor) {
        $this->db->where("idprofesor", $idprofesor);
        $query = $this->db->get('profesor');
        $result = $query->row_array(); //vraca jednu vest
        return $result;
    }

    public function izmeni_profesora($id) {

        // var_dump($id);

        $data = array(
            'ime' => $this->input->post("ime"),
            // 'idprofesor' => $this->input->post("idprofesor"),
            'prezime' => $this->input->post("prezime"),
            'adresa' => $this->input->post("adresa"),
            'broj_telefon' => $this->input->post("broj_telefon"),
            'e-mail' => $this->input->post("e-mail"),
            'angazovan_sa_strane' => $this->input->post("angazovan"),
            'status' => $this->input->post("status"),
                //'predmet' => $this->input->post("predmet")
        );



        $this->db->where('idprofesor', $id);

        $this->db->update('profesor', $data);




        foreach ($_POST['predmet'] as $item) {




            $query = $this->db->query("select * from profesor_has_predmet where profesor_idprofesor='$id' and predmet_idpredmet='$item'");

            $count_row = $query->num_rows();

            if ($count_row > 0) {

                $this->session->set_flashdata($data);
                $data = array(
                    'poruka1' => "Професор је већ ангажован на предмету.");
                $this->session->set_flashdata($data);
                //  var_dump($data);
                //  exit;
            } else {
                $this->db->query("insert into profesor_has_predmet values ('$id','$item')");
            }




            //  var_dump($item);


            /*      $data = array(
              'profesor_idprofesor' => $id,
              'predmet_idpredmet' => $item);
              if (!$this->db->query("insert into profesor_has_predmet values ('$id','$item')"))
              echo 'Profesor je već angažovan na ovom predmetu ' . $item; {
              //there was an error on insert, do something
              } */
        }
    }

    public function profesor_predaje() {


        if (isset($_SESSION['prof'])) {
            $id = $_SESSION['prof']['idprofesor'];

            $query = $this->db->query("select naziv_predmet, idpredmet from predmet p, profesor_has_predmet prof where p.idpredmet=prof.predmet_idpredmet and profesor_idprofesor='$id';");
            $result = $query->result_array();


            return $result;
        } else
            return $result = NULL;
    }

    public function trazi_profesora($search_data) {
        $this->db->select('ime,prezime,idprofesor');
        $this->db->like('ime', $search_data);
        $this->db->or_like('prezime', $search_data);
        return $this->db->get('profesor', 10)->result();
    }

    public function pretraga() {
        $trazi = $this->input->post('pretraga');


        $this->db->like("ime", $trazi);
        $this->db->or_like("prezime", $trazi);
        $this->db->from("profesor");
        $this->db->select("ime, prezime");

        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }

//FUNKCIJE ZA RAD SA OPERATERIMA

    public function unos_operatera() {
        $ime = $this->input->post("ime");
        $prezime = $this->input->post("prezime");
        $username = $this->input->post("kor_ime");
        $password = $this->input->post("lozinka");
        $email = $this->input->post("email");
        $tip = $this->input->post("tip");

        $this->db->set("ime", $ime);
        $this->db->set("prezime", $prezime);
        $this->db->set("korisnicko_ime", $username);
        $this->db->set("lozinka", $password);
        $this->db->set("email", $email);
        $this->db->set("guid", $tip);

        $this->db->insert("korisnik");
    }

    public function dohvati_operatera() {

        $query = $this->db->query('select * from korisnik where guid="1"');
        $result = $query->result_array();
        return $result;
    }

    public function obrisi_operatera($idkorisnik) {
        $query = $this->db->query("delete  from korisnik where idkorisnik='$idkorisnik'");
        //to do Ime i prezime korisnika
    }

    public function get_autocomplete($search_data) {
        $this->db->select('ime,prezime,idkorisnik');
        $this->db->like('ime', $search_data);
        $this->db->or_like('prezime', $search_data);

        return $this->db->get('korisnik', 10)->result();
    }

    //RAZNE FUNKCIJE

    public function dohvati_podrucje() {

        $this->db->from("podrucje_rada");
        $this->db->select("*");

        $query = $this->db->get();

        $result = $query->result_array();
        //$result="pera";
        return $result;
    }

    public function dohvati_predmet($god="%") {
        //$this->db->distinct("");
        $this->db->from("predmet");
     //   $this->db->like("godina_obrazovanja_idgodina_obrazovanja", $god);
        $this->db->select("idpredmet, naziv_predmet");
        $this->db->group_by('naziv_predmet');
        $query = $this->db->get();




        $result = $query->result_array();
        //$result="pera";
        return $result;
    }

    public function obrisi_predmet($idpredmet) {

        $idprofesor = $_SESSION['prof']['idprofesor'];
        $this->db->query("delete from profesor_has_predmet where profesor_idprofesor='$idprofesor' and predmet_idpredmet='$idpredmet'");
    }

    public function dohvati_profil() {

        $this->db->from("obrazovni_profil");
        $this->db->select("*");

        $query = $this->db->get();

        $result1 = $query->result_array();
        //$result="pera";
        return $result1;
    }

    public function dohvati_profil_smer($idpodrucje) {

        //  var_dump($idpodrucje);
//$id=$idpodrucje;
        //$idpodrucje= $this->input->post('idpodrucje_rada');
        $query = $this->db->query("select * from obrazovni_profil where podrucje_rada_idpodrucje_rada='$idpodrucje';");
        $result = $query->result_array();
        return $result;
    }

    /* public function get_autocomplete($search_data) 
      {
      $this->db-> select('ime, idkorisnik');
      $this->like('ime', $search_data);
      return $this->db->get('korisnik',10)->result();
      } */
}
