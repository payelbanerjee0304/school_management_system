<?php

class Modschool extends CI_Model
{
    public function logadmin($data)
    {
        return $this->db->get_where('adminschool', $data)->result_Array();
    }

    //<pagination purpose>
    public function getTotalRows()
    {
        $query = $this->db->get("category");
        return $query->num_rows();
    }
    public function getAlldetails($limit, $offset)
    {
        $query = $this->db->limit($limit, $offset);
        $query = $this->db->get("category");
        if ($query) {
            return $query->result_Array();
        }
    }
    //<!pagination purpose>

    //<search purpose>
    public function search($keyword)
    {
        $this->db->like('name', $keyword);

        $query = $this->db->get('category');

        return $query->result_Array();
    }
    //<!search purpose>


    public function insertcategory($data)
    {
        $this->db->insert('category', $data);
    }


    public function deletedata($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
        return $this->db->get('category')->result_Array();
    }
    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('category')->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('category', $data);
    }

    //To get the category list of values
    public function viewcat()
    {
        return $this->db->get('category')->result_Array();
    }

    //<pagination purpose>
    public function getTotalRowsclass()
    {
        $query = $this->db->get("class");
        return $query->num_rows();
    }
    public function getAlldetailsclass($limit, $offset)
    {
        $query = $this->db->limit($limit, $offset);
        $query = $this->db->get("class");
        if ($query) {
            return $query->result_Array();
        }
    }
    //<!pagination purpose>

    public function insertclass($data)
    {
        $this->db->insert('class', $data);
    }
    public function getallclass()
    {
        return $this->db->get('class')->result_Array();
    }
    //<!pagination purpose>

    public function deleteclass($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('class');
        return $this->db->get('class')->result_Array();
    }

    public function editclass($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('class')->row_array();
    }

    public function updateclass($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('class', $data);
    }

    //<search purpose>
    public function searchclass($keyword)
    {
        $this->db->like('classname', $keyword);
        // $this->db->like('catname', $keyword);

        $query = $this->db->get('class');

        return $query->result_Array();
    }
    //<!search purpose>

    //course started
    public function getcoursedata()
    {
        return $this->db->get('course')->result_array();
    }

    public function insertcourse($data)
    {
        $this->db->insert('course', $data);
    }

    public function deletecourse($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('course');
        return $this->db->get('course')->result_Array();
    }

    public function editcourse($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('course')->row_array();
    }

    public function updatecourse($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('course', $data);
    }
}
