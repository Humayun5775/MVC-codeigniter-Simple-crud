<?php
class User extends CI_Controller
{
    function index()
    {
        $this->load->model('User_model');
        $Users = $this->User_model->all();
        $data = array();
        $data['Users'] = $Users;
        $this->load->view('list', $data);
    }

    function create()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('User_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('create');
        } else {
            // Upload the files then pass data to your model
            $config['upload_path'] = 'assets/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
           
            if (!$this->upload->do_upload('img')) {
                // If the upload fails
                echo $this->upload->display_errors('<p>', '</p>');
            } else {
                // Pass the full path and post data to the createimg
                
                $this->User_model->createimg($this->upload->data('file_name'),$this->input->post());
                $this->session->set_flashdata('success', 'Record added successfully!');
                redirect(base_url() . 'index.php/user/index');
            }
        }
    }


    function edit($userid)
    {
        $this->load->model('User_model');
        $User = $this->User_model->getUser($userid);
        $data = array();
        $data['User'] = $User;
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('edit', $data);
        } else {
            //save in db
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $this->User_model->updateuser($userid, $formArray);
            $this->session->set_flashdata('success', 'Record update successfully!');
            redirect(base_url() . 'index.php/user/index');
        }
    }


    function delete($userid)
    {
        $this->load->model('User_model');
        $User = $this->User_model->getUser($userid);
        if (empty($User)) {

            $this->session->set_flashdata('failure', 'Record not found!');
            redirect(base_url() . 'index.php/user/index');
        }
        $this->User_model->deleteUser($userid);
        $this->session->set_flashdata('success', 'Record delete successfully!');
        redirect(base_url() . 'index.php/user/index');
    }
}
