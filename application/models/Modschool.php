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

    //view student data
    public function viewstudentdata()
    {
        return $this->db->get('student')->result_array();
    }

    //To get the category list of values
    public function viewclass()
    {
        return $this->db->get('class')->result_Array();
    }

    //<pagination purpose>
    public function getTotalRowsstudent()
    {
        $query = $this->db->get("student");
        return $query->num_rows();
    }
    public function getAlldetailsstudent($limit, $offset)
    {
        $query = $this->db->limit($limit, $offset);
        $query = $this->db->get("student");
        if ($query) {
            return $query->result_Array();
        }
    }
    //<!pagination purpose>

    //<search purpose>
    public function searchstudent($keyword)
    {
        $this->db->like('name', $keyword);
        $this->db->or_like('fname', $keyword);
        $this->db->or_like('email', $keyword);

        $query = $this->db->get('student');

        return $query->result_Array();
    }
    //<!search purpose>

    public function insertstudent($data)
    {
        $this->db->insert('student', $data);
    }

    public function deletestudent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('student');
        return $this->db->get('student')->result_Array();
    }

    public function editstudent($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('student')->row_array();
    }

    public function updatestudent($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('student', $data);
    }

    public function getstaffdata()
    {
        return $this->db->get('staff')->result_array();
    }
    public function insertstaff($data)
    {
        $this->db->insert('staff', $data);
    }
    public function staffinsert($post_image)
    {
        
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
            'phone' => $this->input->post('phone'),
            'doj' => $this->input->post('doj'),
            'image' => str_replace(' ', '', $post_image)
        );
        return $this->db->insert('staff', $data);
    }
    public function deletestaff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('staff');
        return $this->db->get('staff')->result_Array();
    }
    public function editstaff($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('staff')->row_array();
    }

    public function updatestaff($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('staff', $data);
    }
}
