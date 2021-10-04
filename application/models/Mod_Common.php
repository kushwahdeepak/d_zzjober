<?php
class Mod_Common extends CI_Model{

    public function select_all_data($tableName)
    {
    	$this->db->select('*');
    	$this->db->from($tableName);
    	$query = $this->db->get();

    	return $query->result();
    }
    public function update_data($tableName, $condition, $updateData)
    {
    	$this->db->where($condition);
    	$this->db->update($tableName, $updateData);
       return true;
    }
    public function delete_data($tableName, $condition)
    {
    	$this->db->where($condition);
    	$this->db->delete($tableName);

    	return true;
    }
    public function insert_data($tableName, $data)
    {
        $this->db->insert($tableName, $data);

        return $this->db->insert_id();
    }
    public function select_specific_data($tableName, $condition)
    {
        $this->db->select('*');
        $this->db->where($condition);
        $this->db->from($tableName);
        $query = $this->db->get();

        return $query->result();
    }
    public function select_specific_data_desc($tableName, $condition,$desc)
    {
        $this->db->select('*');
        $this->db->where($condition);
        $this->db->from($tableName);
        $this->db->order_by($desc, 'DESC');
        $query = $this->db->get();

        return $query->result();
    }
     public function custom_query($query)
    {
        $query = $this->db->query($query);
        if(gettype($query)=='boolean'){
         return true;
        }else{
          return $query->result();
        }
       
       
    }
    public function settingManage($meta,$value,$status)
    {
        $query = $this->db->query('INSERT INTO settings (meta_key, value, status) VALUES("'.$meta.'", "'.$value.'", "'.$status.'") ON DUPLICATE KEY UPDATE  value="'.$value.'"');
        return $query;
    }

}
?>