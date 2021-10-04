<?php

Class Homemodel extends CI_Model
{
    /**
     * Function for getting about us
     *
     * @return mixed
     */
    public function getAboutUs()
    {
        $this->db->select('*');
        $this->db->from('about_us');
        return $this->db->get()->row();
    }


    /**
     * Function for getting terms and conditions
     *
     * @return mixed
     */
    public function getTermCondition()
    {
        $this->db->select('*');
        $this->db->from('term_condition');
        return $this->db->get()->row();
    }


    /**
     * Function for getting privacy policy
     *
     * @return mixed
     */
    public function getPrivacyPolicy()
    {
        $this->db->select('*');
        $this->db->from('privacy_policy');
        return $this->db->get()->row();
    }


    /**
     * Function for getting list of FAQ(s)
     *
     * @return mixed
     */
    public function getfaqsList()
    {
        $this->db->select('*');
        $this->db->from('faqs');
        return $this->db->get()->result();
    }


    /**
     * Function for getting a FAQ
     *
     * @param $model_data
     * @return mixed
     */
    public function getFaqEditInfo($model_data)
    {
        $faq_id = $model_data['faq_id'];

        $this->db->select('*');
        $this->db->from('faqs');
        $this->db->where('faq_id', $faq_id);
        return $this->db->get()->row();
    }


    /**
     * Function for getting how it works
     *
     * @return mixed
     */
    public function getWorking()
    {
        $this->db->select('*');
        $this->db->from('how_it_works');
        return  $this->db->get()->row();
    }


    /**
     * Function for getting a feature
     *
     * @param $model_data
     * @return mixed
     */
    public function getFeatureData($model_data)
    {
        $feature_id = $model_data['feature_id'];

        $this->db->select('*');
        $this->db->from('features');
        $this->db->where('feature_id', $feature_id);
        return $this->db->get()->row();
    }


    /**
     * Function for getting features
     *
     * @return mixed
     */
    public function getFeatures()
    {
        $this->db->select('*');
        $this->db->from('features');
        return $this->db->get()->result();
    }
   
     
}