<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Maincontroller extends CI_Controller
{
    public function index()
    {
        // $this->load->library('mongo_db', array('activate' => 'default', 'mongo_db'))->row_array();
        // $result = $this->mongo_db->get('persons');
        // echo "<pre>";
        // print_r($result);
        // echo "demo";
        if ($this->session->userdata('id')) {
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('error', 'Please Login First');
            redirect('MainController/login');
        }
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function loginadmin()
    {
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        // print_r($data);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            // print_r($data);
            $user = $this->Modschool->logadmin($data);
            if (count($user) == 1) {
                $forsession = array(
                    'id' => $user[0]['id'],
                    'email' => $user[0]['email'],
                    'name' => $user[0]['name']
                );
                $this->session->set_userdata($forsession);
                if ($this->session->userdata('id')) {
                    redirect('MainController/index');
                    // print_r($data);
                } else {
                    echo "Session is not created";
                }
            } else {
                $this->session->set_flashdata('error', 'email & password doesnot match');
                redirect('MainController/login');
            }
        }
    }
    public function logout()
    {
        if ($this->session->userdata('id')) {
            $this->session->unset_userdata('id');
            $this->session->sess_destroy();
            redirect('MainController/login');
        }
    }
    public function category()
    {
        if ($this->session->userdata('id')) {
            // $data = array();
            // $data['user'] = $this->Modschool->viewdata();
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            // $this->load->view('category', $data);
            $this->load->library('pagination');

            $config['base_url'] = base_url('Maincontroller/category/');
            $config['total_rows'] = $this->Modschool->getTotalRows();
            // print_r();
            // die;
            $config['per_page'] = 3;


            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
            $config['cur_tag_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            // echo $this->pagination->create_links();
            $data = array();
            $data['user'] = $this->Modschool->getAlldetails($config['per_page'], $this->uri->segment(3));
            $this->load->view("category", $data);

            $this->load->view('admin/footer');
        }
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        // echo $keyword;
        // die;

        // Load your model to interact with the database
        $this->load->model('Modschool');
        $data = array();
        // Perform the search
        $data['results'] = $this->Modschool->search($keyword);

        // Load the view with search results
        $this->load->view('result_view', $data);
        // print_r($data);
    }



    public function categoryinsert()
    {
        $this->form_validation->set_rules('name', 'Enter Category Name', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data['name'] = $this->input->post('name');
            // print_r($data);
            $insert = $this->Modschool->insertcategory($data);
            echo json_encode($insert);
        }
    }
    public function deletecategory($id)
    {
        $this->Modschool->deletedata($id);
        return redirect('MainController/category');
    }

    public function editcategory($id)
    {
        $data = array();
        $data['users'] = $this->Modschool->edit($id);
        $this->form_validation->set_rules('name', 'Edit Category Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('editcategory', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array();
            $data['name'] = $this->input->post('name');
            // print_r($data);
            $this->Modschool->update($id, $data);
            return redirect('MainController/category');
        }
    }

    ///For Class Section

    public function class()
    {
        if ($this->session->userdata('id')) {
            // $data = array();
            // $data['user'] = $this->Modschool->viewdata();
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            // $this->load->view('category', $data);
            $this->load->library('pagination');

            $config['base_url'] = base_url('Maincontroller/class/');
            $config['total_rows'] = $this->Modschool->getTotalRowsclass();
            // print_r();
            // die;
            $config['per_page'] = 3;

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
            $config['cur_tag_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            // echo $this->pagination->create_links();
            $data = array();
            // $data['classes'] = $this->Modschool->getallclass();
            $data['category'] = $this->Modschool->viewcat();
            $data['classes'] = $this->Modschool->getAlldetailsclass($config['per_page'], $this->uri->segment(3));
            $this->load->view("class", $data);

            $this->load->view('admin/footer');
        }
    }

    public function classinsert()
    {
        $this->form_validation->set_rules('name', 'Enter class Name', 'required');
        $this->form_validation->set_rules('catname', 'Enter Category Name', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data['classname'] = $this->input->post('name');
            $data['catname'] = $this->input->post('catname');
            // print_r($data);
            $insert = $this->Modschool->insertclass($data);
            echo json_encode($insert);
        }
    }

    public function deleteclass($id)
    {
        $this->Modschool->deleteclass($id);
        return redirect('MainController/class');
    }

    public function editclass($id)
    {
        $data = array();
        $data['users'] = $this->Modschool->editclass($id);

        $data['category'] = $this->Modschool->viewcat();
        $this->form_validation->set_rules('name', 'Enter Class Name', 'required');
        $this->form_validation->set_rules('catname', 'Enter category Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('editclass', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array();

            $data['classname'] = $this->input->post('name');
            $data['catname'] = $this->input->post('catname');
            // print_r($data);
            $this->Modschool->updateclass($id, $data);
            return redirect('MainController/class');
        }
    }

    public function searchclass()
    {
        $keyword = $this->input->post('keyword');
        // echo $keyword;
        // die;

        // Load your model to interact with the database
        $this->load->model('Modschool');
        $data = array();

        // Perform the search
        $data['results'] = $this->Modschool->searchclass($keyword);

        // Load the view with search results
        $this->load->view('resultclass_view', $data);
        // print_r($data);
    }

    public function course()
    {
        if ($this->session->userdata('id')) {
            $data = array();
            // $data['users'] = $this->Modschool->viewdata();
            $data['course'] = $this->Modschool->getcoursedata();
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('course', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('error', 'Please fill all the fields');
            redirect('MainController/login');
        }
    }

    public function courseinsert()
    {
        $this->form_validation->set_rules('name', 'Enter Course Name', 'required');
        $this->form_validation->set_rules('duration', 'Enter Course Duration', 'required');
        $this->form_validation->set_rules('coursefees', 'Enter Course Fees', 'required');
        $this->form_validation->set_rules('coursestarted', 'Enter Course Started Date', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data['coursename'] = $this->input->post('name');
            $data['duration'] = $this->input->post('duration');
            $data['coursefees'] = $this->input->post('coursefees');
            $data['coursestarted'] = $this->input->post('coursestarted');
            // print_r($data);
            $insert = $this->Modschool->insertcourse($data);
            echo json_encode($insert);
        }
    }

    public function deletecourse($id)
    {
        $this->Modschool->deletecourse($id);
        return redirect('MainController/course');
    }

    public function editcourse($id)
    {
        $data = array();
        $data['users'] = $this->Modschool->editcourse($id);
        $this->form_validation->set_rules('name', 'Enter Course Name', 'required');
        $this->form_validation->set_rules('duration', 'Enter Course Duration', 'required');
        $this->form_validation->set_rules('coursefees', 'Enter Course Fees', 'required');
        $this->form_validation->set_rules('coursestarted', 'Enter Course Started Date', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('editcourse', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array();
            $data['coursename'] = $this->input->post('name');
            $data['duration'] = $this->input->post('duration');
            $data['coursefees'] = $this->input->post('coursefees');
            $data['coursestarted'] = $this->input->post('coursestarted');
            
            // print_r($data);
            $this->Modschool->updatecourse($id, $data);
            return redirect('MainController/course');
        }
    }


    // public function info()
    // {
    //     phpinfo();
    // }
}
