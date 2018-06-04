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
    public function promeni_lozinku() {
       
        $user=$_SESSION['korisnicko_ime'];
        $pass=$this->input->post("tren_lozinka");
        //var_dump($pass,$user);
        
        $this->db->where('korisnicko_ime',$user );
        $this->db->where('lozinka',$pass);

//Pokrece upit

        $query = $this->db->get('korisnik');
        $user=$query->row_array(); 
        
        if ($user==NULL){ 
            echo "Pogrešna lozinka!";
        }
        else {
            $pass1=$this->input->post('nova_lozinka1');
            $pass2=$this->input->post('nova_lozinka2');
            
            if ($pass1!=$pass2) {
                echo "Lozinke nisu iste!";
            }
 else {
                $data=array(
                   
                    'lozinka'=>$pass1
                );
                $user=$_SESSION['korisnicko_ime'];
                $this->db->where('korisnicko_ime', $user);
                $this->db->update('korisnik',$data);
 }
            
        }
        
    }
}

