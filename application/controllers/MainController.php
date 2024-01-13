<?php

defined('BASEPATH') OR exit('No direct script access allowed');


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
            redirect('login');
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
                    redirect('index');
                    // print_r($data);
                } else {
                    echo "Session is not created";
                }
            } else {
                $this->session->set_flashdata('error', 'email & password doesnot match');
                redirect('login');
            }
        }
    }
    public function logout()
    {
        if ($this->session->userdata('id')) {
            $this->session->unset_userdata('id');
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    public function category($page=1)
    {
        if ($this->session->userdata('id')) {
            // $data = array();
            // $data['user'] = $this->Modschool->viewdata();
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            // $this->load->view('category', $data);
            $this->load->library('pagination');

            $config['base_url'] = base_url('category/');
            $config['total_rows'] = $this->Modschool->getTotalRows();
            // print_r();
            // die;
            $config['per_page'] = 3;
            // $this->uri->segment(3)

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
            $data['user'] = $this->Modschool->getAlldetails($config['per_page'], $page);
            $this->load->view("category", $data);

            $this->load->view('admin/footer');
        }
        else
        {
            $this->session->set_flashdata('error', 'Please fill all the fields');
            redirect('login');
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
            // print_r($data);die;
            $insert = $this->Modschool->insertcategory($data);
            echo json_encode($insert);
        }
    }
    public function deletecategory($id)
    {
        $this->Modschool->deletedata($id);
        return redirect('category');
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
            return redirect('category');
        }
    }

    ///For Class Section

    public function class($page=1)
    {
        if ($this->session->userdata('id')) {
            // $data = array();
            // $data['user'] = $this->Modschool->viewdata();
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            // $this->load->view('category', $data);
            $this->load->library('pagination');

            $config['base_url'] = base_url('class/');
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
            $data['category'] = $this->Modschool->viewcat();
            $data['classes'] = $this->Modschool->getAlldetailsclass($config['per_page'], $page);
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
        return redirect('class');
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
            return redirect('class');
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

    //course start
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
            redirect('login');
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
        return redirect('course');
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
            return redirect('course');
        }
    }
    public function student($page=1)
    {
        if ($this->session->userdata('id')) {
            // $data = array();
            // $data['user'] = $this->Modschool->viewstudentdata();
            

            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');

            $this->load->library('pagination');

            $config['base_url'] = base_url('student/');
            $config['total_rows'] = $this->Modschool->getTotalRowsstudent();
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

            $data = array();
            $data['category'] = $this->Modschool->viewcat();
            $data['class'] = $this->Modschool->viewclass();
            
            $data['user'] = $this->Modschool->getAlldetailsstudent($config['per_page'], $page);
            $this->load->view("student", $data);
            // $this->load->view('student', $data);
            $this->load->view('admin/footer');

        } else {
            $this->session->set_flashdata('error', 'Please fill all the fields');
            redirect('login');
        }
    }

    public function searchstudent()
    {
        $keyword = $this->input->post('keyword');
        // echo $keyword;
        // die;

        // Load your model to interact with the database
        $this->load->model('Modschool');
        $data = array();

        // Perform the search
        $data['results'] = $this->Modschool->searchstudent($keyword);

        // Load the view with search results
        $this->load->view('resultstudent_view', $data);
        // print_r($data);
    }

    public function studentinsert()
    {
        $this->form_validation->set_rules('name', 'Enter Student Name', 'required');
        $this->form_validation->set_rules('fname', 'Enter Father Name', 'required');
        $this->form_validation->set_rules('email', 'Enter Email id', 'required');
        $this->form_validation->set_rules('password', 'Enter Password', 'required');
        $this->form_validation->set_rules('catname', 'Enter Category Name', 'required');
        $this->form_validation->set_rules('classname', 'Enter Class Name', 'required');
        $this->form_validation->set_rules('dob', 'Enter Date of Birth', 'required');
        $this->form_validation->set_rules('pendingfees', 'Pending Fees', 'required');
        $this->form_validation->set_rules('joindate', 'Enter Join Date', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data['name'] = $this->input->post('name');
            $data['fname'] = $this->input->post('fname');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['category'] = $this->input->post('catname');
            $data['class'] = $this->input->post('classname');
            $data['dob'] = $this->input->post('dob');
            $data['pendingfees'] = $this->input->post('pendingfees');
            $data['joindate'] = $this->input->post('joindate');
            // print_r($data);
            $insert = $this->Modschool->insertstudent($data);
            echo json_encode($insert);
        }
        
    }

    public function deletestudent($id)
    {
        $this->Modschool->deletestudent($id);
        return redirect('student');
    }

    public function editstudent($id)
    {
        $data = array();
        $data['category'] = $this->Modschool->viewcat();
        $data['class'] = $this->Modschool->viewclass();
        $data['users'] = $this->Modschool->editstudent($id);
        $this->form_validation->set_rules('name', 'Edit Student Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('editstudent', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array();
            $data['name'] = $this->input->post('name');
            $data['fname'] = $this->input->post('fname');
            $data['email'] = $this->input->post('email');

            $data['category'] = $this->input->post('catname');
            $data['class'] = $this->input->post('classname');
            $data['dob'] = $this->input->post('dob');
            $data['pendingfees'] = $this->input->post('pendingfees');
            $data['joindate'] = $this->input->post('joindate');
            // print_r($data);
            $this->Modschool->updatestudent($id, $data);
            return redirect('student');
        }
    }

    public function staff()
    {
        if ($this->session->userdata('id')) {
            $data = array();
            // $data['users'] = $this->Modschool->viewdata();
            $data['staff'] = $this->Modschool->getstaffdata();
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('staff/staff', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('error', 'Please fill all the fields');
            redirect('login');
        }
    }

    public function do_upload()
        {
            $this->form_validation->set_rules('name', 'Enter Student Name', 'required');
            $this->form_validation->set_rules('email', 'Enter Email id', 'required');
            $this->form_validation->set_rules('address', 'Enter Address', 'required');
            $this->form_validation->set_rules('dob', 'Enter Date of Birth', 'required');
            $this->form_validation->set_rules('phone', 'Enter Phone No.', 'required');
            $this->form_validation->set_rules('doj', 'Enter Date of Joining', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path']          = './assets/staffimages/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        // echo "<pre>";
                        // print_r($data);die;
                        $this->load->view('test', $error);
                }
                else
                {
                        // $data = array('upload_data' => $this->upload->data());
                        $post_image = $_FILES['userfile']['name'];
                        // echo "<pre>";
                        // print_r($data);die;
                        $insert = $this->Modschool->staffinsert($post_image);
                        // echo json_encode($insert);
                        return redirect('staff');
                }
            }
        }

        public function deletestaff($id)
        {
            $this->Modschool->deletestaff($id);
            return redirect('staff');
        }

        public function editstaff($id)
    {
        $data = array();
        $data['users'] = $this->Modschool->editstaff($id);
        $this->form_validation->set_rules('name', 'Edit Staff Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/navtop');
            $this->load->view('admin/navleft');
            $this->load->view('staff/editstaff', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array();
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['address'] = $this->input->post('address');

            $data['dob'] = $this->input->post('dob');
            $data['phone'] = $this->input->post('phone');
            $data['doj'] = $this->input->post('doj');
            $data['image'] = $this->input->post('image');
            // print_r($data);
            $this->Modschool->updatestaff($id, $data);
            return redirect('staff');
        }
    }


        // public function attendance()
        // {
        //     if ($this->session->userdata('id')) {
        //         $this->load->view('admin/header');
        //         $this->load->view('admin/navtop');
        //         $this->load->view('admin/navleft');
        //         $this->load->view('admin/attendance');
        //         $this->load->view('admin/footer');
        //     } else {
        //         $this->session->set_flashdata('error', 'Please Login First');
        //         redirect('login');
        //     }
        // }



    // public function info()
    // {
    //     phpinfo();
    // }
}
