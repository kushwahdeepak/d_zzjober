<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    Class Geo_helper extends CI_Model
    {
        /**
         * Function for getting a list of all countries
         *
         * @return mixed
         */
        public function getCountryList()
        {
            $country = "COUNTRY";
            $this->db->select('*');
            $this->db->from('geo');
            $this->db->where('geo_type_id', $country);
            $this->db->order_by('geo_name');
            return $this->db->get()->result();
        }

        /**
         * Function for getting a country info with country id
         *
         * @param $geo_id
         * @return mixed
         */
        public function getCountry($geo_id)
        {
            $this->db->select('*');
            $this->db->from('geo');
            $this->db->where('geo_id', $geo_id);
            return $this->db->get()->row();
        }


        /**
         * Function for getting value of state on the basis of geo id
         *
         * @param $geo_id
         * @return mixed
         */
        public function getState($geo_id)
        {
            $this->db->select('*');
            $this->db->from('geo');
            $this->db->where('geo_id', $geo_id);
            return $this->db->get()->row();
        }


        /**
         * Function for getting states of a country
         *
         * @param $country_id
         * @return mixed
         */
        public function getCountryStates($country_id)
        {
            $this->db->select('geo.geo_id, geo.geo_name');
            $this->db->from('geo_assoc');
            $this->db->join('geo', 'geo_assoc.geo_id_to=geo.geo_id');
            $this->db->where('geo_assoc.geo_id', $country_id);
            $this->db->order_by('geo_name');
            $states = $this->db->get()->result();
            return $states;
        }
    }

?>