<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Copyright (c)2017, Jenmar "Maco" Cortes
 * Copyright TechDepot PH
 * All Rights Reserved
 * 
 * This license is a legal agreement between you and the Maco Cortes
 * for the use of STI Online Voting Systen referred to as the "Software"
 * By obtaining the Software you agree to comply with the terms and conditions of this license.
 *
 * PERMITTED USE
 * With approval from Maco Cortes, You are permitted to use the program for educational purposes only.
 * 
 * MODIFICATION AND REDISTRIBUTION 
 * Unless with written approval obtained from Maco Cortes, 
 * You are NOT allowed to modify, copy, redistribute, and sell the Software.
 *
 * For any concerns, you may reach Maco Cortes via:
 * maco.techdepot@gmail.com
 * facebook.com/Maaacoooo
 * maco@techdepot-ph.com
 * TechDepot-PH.com
 */

Class User_model extends CI_Model
{

/**
 * This model controls all VOTE  related functionalties
 */

     function check_user($user, $pass) {

             $this->db->select('*');        
             $this->db->where('username', $user);          
             $this->db->limit(1);

             $query = $this->db->get('users');

             if($query->num_rows() == 1)   { //checks if username exists

                $result = $query->row_array(); //fetch the row array

                if(password_verify($pass, $result['password'])) {
                    return $result;
                } else {
                    return FALSE;
                }
                
               
             }   else   {

                return FALSE;

             }

    }

    function userdetails($user) {

             $this->db->select('*');        
             $this->db->where('username', $user);          
             $this->db->limit(1);

             $query = $this->db->get('users');

             return $query->row_array();
    }



}