<?php

class Task extends Controller {

    public function index() {
        $data['judul'] = 'List-task || mvc-php';
        $data['tasks'] = $this->model('Task_model')->getAllTask();
        $this->view('templates/header', $data);
        $this->view('task/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id ) {
        $data['judul'] = 'detail-task || mvc-php';
        $data['tasks'] = $this->model('Task_model')->getTaskByid($id);
        $this->view('templates/header', $data);
        $this->view('task/detail', $data);
        $this->view('templates/footer');
    }

    public function add() {

        if(!empty($_POST['name_task']) && !empty($_POST['category']) && !empty($_POST['notes'])) {
            if($this->model('Task_model')->addTask($_POST) > 0) {
                Flasher::setFlash('success', 'added', 'success');
                header('Location: ' . BASEURL . 'task');
                exit; 
            } else {
                Flasher::setFlash('failed', 'added', 'danger');
                header('Location: ' . BASEURL . 'task');
                exit; 
            }

        } else {
            Flasher::setFlash('Failed!','Data cannot blank!','danger');
            header('Location: ' . BASEURL . 'task');
                exit; 
        }
        
    }

    public function delete($id) {
        if($this->model('Task_model')->delete($id) > 0) {
            Flasher::setFlash('success', 'deleted', 'success');
            header('Location: ' . BASEURL . '/task');
            exit; 
        } else {
            Flasher::setFlash('failed', 'deleted', 'danger');
            header('Location: ' . BASEURL . '/task');
            exit; 
        }
    }

    public function getUpdate() {
        echo json_encode($this->model('Task_model')->getTaskByid($_POST['id']));
    }

    public function update() {
        if($this->model('Task_model')->updateTask($_POST) > 0 ) {
            Flasher::setFlash('success', 'updated', 'success');
            header('Location: ' . BASEURL . 'task');
            exit;
        } else {
            Flasher::setFlash('failed', 'updated', 'danger');
            header('Location: ' . BASEURL . 'task');
            exit;
        }
    }

    public function editStatus() {


            if($this->model('Task_model')->updateStatus($_POST) > 0 ) {
                Flasher::setFlash('status has been', 'changed', 'success');
                header('Location: ' . BASEURL . 'task');
                exit;
            } else {
                Flasher::setFlash('status failed to ', 'changed!', 'danger');
                header('Location: ' . BASEURL . 'task');
                exit;
            }
        
    }



    public function search() {
        $data['judul'] = 'List tasks';
        $data['tasks'] = $this->model('Task_model')->searchTask();
        $this->view('templates/header', $data);
        $this->view('task/index', $data);
        $this->view('templates/footer');
    }

}