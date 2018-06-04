<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Autor:Dragoljub Djordjevic
 * Opis:metod za logovanje korisnika
 */

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validate() {
           $username= $this->security->xss_clean($this->input->post('username'));
           $password= $this->security->xss_clean($this->input->post('password'));
      //  $username = $this->input->post('username');
       // $password = $this->input->post('password');
          // $password=hash("sha256",$password);

//Priprema upit:

        $this->db->where('korisnicko_ime', $username);
        $this->db->where('lozinka', $password);

//Pokrece upit

        $query = $this->db->get('korisnik');
        $user=$query->row_array();



        if ($user!=NULL) {
            //Ako imamo korisnika, pravimo podatke za sesiju
            $row = $query->row();
            $data = array(
                'idkorisnik' => $row->idkorisnik,
                'ime'=>$row->ime,
                'prezime'=>$row->prezime,
                'korisnicko_ime' => $row->korisnicko_ime,
                'lozinka'=>$row->lozinka,
                'tip'=>$row->guid,
                'email'=>$row->email,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        } else
//ako validacija nije uspela, vrati false
            return false;
    }
   }

