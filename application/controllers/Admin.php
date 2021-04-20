<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('AdminModel');
        $this->load->model('AdvertiseModel');
        $this->load->model('ClinicModel');
        $this->load->model('BookingModel');
        $this->load->model('StatModel');
        $this->load->model('MembersModel');
        $this->load->model('CloseModel');
        $this->load->model('YoutubeModel');
        $this->load->model('InfoModel');
        $this->load->model('BlogModel');
        $this->load->model('BlogCategoryModel');
        $this->load->library('pagination');
        $this->load->library('S3_upload');
        $this->load->library('S3');
    }

    private function logged_in()
    {
        if (!$this->session->userdata('authenticated')) {
            redirect(base_url('login'));
        }
    }

    public function dashboard()
    {
        $countClinic =  count($this->ClinicModel->getAll());
        $countPatient =  count($this->MembersModel->getData());
        $countBooking =  count($this->BookingModel->getAll());
        $countBookingChecked =  count($this->BookingModel->getAllChecked());
        $countQueueToday =  count($this->BookingModel->getAllQueueToday());
        $countQueueTomorrow =  count($this->BookingModel->getAllQueueTomorrow());
        $stat = $this->StatModel->statByAdmin();
        $statData = [];
        for ($i = 1; $i <= 12; $i++) {
            $num = 0;
            foreach ($stat as $item) {
                if (intval($item->MONTH) == $i) {
                    $num = intval($item->NUM);
                }
            }
            array_push($statData, $num);
        }
        $data = [
            'countClinic' => $countClinic,
            'countPatient' => $countPatient,
            'countBooking' => $countBooking,
            'countBookingChecked' => $countBookingChecked,
            'countQueueToday' => $countQueueToday,
            'countQueueTomorrow' => $countQueueTomorrow,
            'statData' => $statData
        ];

        $js = [
            base_url() . 'assets/physician/js/admin-charts.js?v=' . time()
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer_admin', ['js' => $js]);
    }

    public function clinic()
    {
        $clinic = $this->ClinicModel->getAll();

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/clinic', $data);
        $this->load->view('template/footer_admin');
    }

    public function clinicDetail()
    {
        $idClinic = $this->uri->segment('4');
        $clinic = $this->ClinicModel->detailById($idClinic);

        $data = [
            'clinic' => $clinic
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/clinic/form', $data);
        $this->load->view('template/footer_admin');
    }

    public function clinicUpdate()
    {
        $clnicId = $this->input->post('clinic_id');

        $service = '';
        if (count($this->input->post('service')) > 0) {
            $service = implode(",", $this->input->post('service'));
        }

        $degree = '';
        if (count($this->input->post('degree')) > 0) {
            $degree = implode(",", $this->input->post('degree'));
        }

        $workplace = '';
        if (count($this->input->post('workplace')) > 0) {
            $workplace = implode(",", $this->input->post('workplace'));
        }

        $image = $this->input->post('old_image');

        if (!empty($_FILES["file"]) && $_FILES["file"]["name"] !='') {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
            $this->session->set_userdata('image', $image);

            //remove old image S3
            if ($this->input->post('old_image') != '') {
                $this->s3_upload->deleteFile(basename($this->input->post('old_image')));
            }
        }


        $data = [
          'CLINICNAME' => $this->input->post('clinic_name'),
          'LINE' => $this->input->post('line'),
          'PHONE' => $this->input->post('phone'),
          'LONG' => $this->input->post('long'),
          'ADDRESS' => $this->input->post('address'),
          'DOCTORNAME' => $this->input->post('doctor_name'),
          'PROFICIENT' => $this->input->post('proficient'),
          'DIPLOMA' => $this->input->post('diploma'),
          'DEGREE' => $degree,
          'WORKPLACE' => $workplace,
          'SERVICE' => $service,
          'SEO_TITLE' => $this->input->post('seo_title'),
          'SEO_META' => $this->input->post('seo_meta'),
          'GOLD_MEMBER_STATUS' => $this->input->post('gold_member_status'),
          'image' => $image
        ];

        $this->ClinicModel->updateById($data, $clnicId);
        redirect(base_url('admin/clinic'));
    }

    public function confirmDelete()
    {
        $clinic = $this->ClinicModel->detailById($_POST['id']);

        $date = strtotime(date('Y-m-d'));
        $deleteDate = date("Y-m-d", strtotime("+3 month", $date));
        $data = [
          'DELETE_STATE' => 2,
          'DELETE_DATE' => $deleteDate
        ];
        $this->ClinicModel->updateById($data, $clinic->IDCLINIC);

        // $subject = "ยืนยันการยกเลิกบริการคลินิก ".$clinic->CLINICNAME;
        // $message = "ยืนยันการยกเลิกบริการคลินิก ".$clinic->CLINICNAME . " \r\n
        // ข้อมูลของคลินิก\r\n
        // เบอร์โทรศัพท์ : " . $clinic->PHONE . "\r\n
        // Line : " . $clinic->LINE . "\r\n
        // ";
        // $this->sendMail('wanwancsyy@gmail.com', $subject, $message);

        echo "true";
    }


    public function patient()
    {
        $patient = $this->MembersModel->getData();

        $data = [
            'patient' => $patient
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/patient', $data);
        $this->load->view('template/footer_admin');
    }

    public function patientData()
    {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
        $results = $this->MembersModel->find_with_page($param);
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function advertise()
    {
        $this->load->view('template/header_admin');
        $this->load->view('admin/advertise');
        $this->load->view('template/footer_admin');
    }

    public function advertiseData()
    {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
        $results = $this->AdvertiseModel->find_with_page($param);
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function advertiseAdd()
    {
        $this->load->view('template/header_admin');
        $this->load->view('admin/advertise/form-insert');
        $this->load->view('template/footer_admin');
    }

    public function advertiseInsert()
    {
        $image = "";

        if (!empty($_FILES["file"]) && dirname($_FILES["file"]["tmp_name"]) !='') {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
        }

        $dateNow = new DateTime();
        $currentTime = $dateNow->getTimestamp();

        $data = [
          'ADVERTISEID' => $currentTime,
          'ADVERTISESUBJECT' => $this->input->post('subject'),
          'ADVERTISEDETAIL' => $this->input->post('desc'),
          'ADVERTISEIMAGE' => $image,
          'ADVERTISELINK' => $this->input->post('link'),
      ];

        $this->AdvertiseModel->insert($data);

        redirect(base_url('admin/advertise'));
    }

    public function advertiseEdit()
    {
        $id = $_GET['id'];

        $advertise = $this->AdvertiseModel->detail($id);

        $data = [
          'advertise' => $advertise
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/advertise/form-update', $data);
        $this->load->view('template/footer_admin');
    }

    public function advertiseUpdate()
    {
        $id = $this->input->post('advertise_id');
        $image = $this->input->post('old_image');

        if (!empty($_FILES["file"]) && dirname($_FILES["file"]["tmp_name"]) !='') {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);

            //remove old image S3
            if ($this->input->post('old_image') != '') {
                $this->s3_upload->deleteFile(basename($this->input->post('old_image')));
            }
        }

        $data = [
          'ADVERTISESUBJECT' => $this->input->post('subject'),
          'ADVERTISEDETAIL' => $this->input->post('desc'),
          'ADVERTISEIMAGE' => $image,
          'ADVERTISELINK' => $this->input->post('link'),
      ];

        $this->AdvertiseModel->updateById($data, $id);

        $this->session->set_flashdata('msg', 'บันทึกเรียบร้อย');

        redirect(base_url('admin/advertise-edit?id='.$id));
    }

    public function advertiseDelete()
    {
        $id = $this->input->post('id');

        $advertise = $this->AdvertiseModel->detail($id);
        if ($advertise->ADVERTISEIMAGE != '') {
            $this->s3_upload->deleteFile(basename($advertise->ADVERTISEIMAGE));
        }

        $this->AdvertiseModel->delete($id);

        echo true;
    }

    public function setting()
    {
        $title = "";
        $meta = "";

        $info = $this->InfoModel->listData();

        foreach ($info as $key => $value) {
            if ($value->info_name == 'title') {
                $title = $value->detail;
            }
            if ($value->info_name == 'meta_description') {
                $meta = $value->detail;
            }
        }

        $data = [
          'title' => $title,
          'metaDesc' => $meta
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/setting', $data);
        $this->load->view('template/footer_admin');
    }

    public function settingUpdate()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');

        $data = [
          'detail' => $title
        ];
        $this->InfoModel->update($data, 'title');

        $data = [
          'detail' => $desc
        ];
        $this->InfoModel->update($data, 'meta_description');

        $this->setting();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }

    public function blog()
    {
        $this->load->view('template/header_admin');
        $this->load->view('admin/blog/index');
        $this->load->view('template/footer_admin');
    }

    public function blogData()
    {
        $order_index = $this->input->get('order[0][column]');
        $param['page_size'] = $this->input->get('length');
        $param['start'] = $this->input->get('start');
        $param['draw'] = $this->input->get('draw');
        $param['keyword'] = trim($this->input->get('search[value]'));
        $param['column'] = $this->input->get("columns[{$order_index}][data]");
        $param['dir'] = $this->input->get('order[0][dir]');
        $results = $this->BlogModel->find_with_page($param);
        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function blogAdd()
    {
        $category = $this->BlogCategoryModel->listData();

        $data = [
          'category' => $category
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/blog/form-insert', $data);
        $this->load->view('template/footer_admin');
    }

    public function blogInsert()
    {
        $image = "";

        if (!empty($_FILES["file"]) && dirname($_FILES["file"]["tmp_name"]) !='') {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);
        }

        $data = [
          'title' => $this->input->post('subject'),
          'description' => $this->input->post('desc'),
          'image_path' => $image,
          'category_id' => $this->input->post('category'),
          'created_at' => date('Y-m-d H:i:s'),
          'created_by' => $this->session->userdata('id')
      ];

        $this->BlogModel->insert($data);

        redirect(base_url('admin/blog'));
    }

    public function blogEdit()
    {
        $id = $_GET['id'];

        $blog = $this->BlogModel->detail($id);
        $category = $this->BlogCategoryModel->listData();

        $data = [
          'blog' => $blog,
          'category' => $category
        ];

        $this->load->view('template/header_admin');
        $this->load->view('admin/blog/form-update', $data);
        $this->load->view('template/footer_admin');
    }

    public function blogUpdate()
    {
        $id = $this->input->post('blog_id');
        $image = $this->input->post('old_image');

        if (!empty($_FILES["file"]) && dirname($_FILES["file"]["tmp_name"]) !='') {
            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
            rename($_FILES["file"]["tmp_name"], $destination);
            $image = $this->s3_upload->upload_file($destination);

            //remove old image S3
            if ($this->input->post('old_image') != '') {
                $this->s3_upload->deleteFile(basename($this->input->post('old_image')));
            }
        }

        $data = [
          'title' => $this->input->post('subject'),
          'description' => $this->input->post('desc'),
          'image_path' => $image,
          'category_id' => $this->input->post('category'),
        ];

        $this->BlogModel->update($data, $id);

        $this->session->set_flashdata('msg', 'บันทึกเรียบร้อย');

        redirect(base_url('admin/blog-edit?id='.$id));
    }

    public function blogDelete()
    {
        $id = $this->input->post('id');

        $blog = $this->BlogModel->detail($id);
        if ($blog->image_path != '') {
            $this->s3_upload->deleteFile(basename($blog->image_path));
        }

        $this->BlogModel->delete($id);

        echo true;
    }


    public function getBlogCategory()
    {
        $category = $this->BlogCategoryModel->listData();

        foreach ($category as $key => $value) {
            echo "<tr><td><input type='text' class='form-control' value='".$value->name."' name='".$value->id."' id='cate".$value->id."'></td><td><button class='btn btn-info' onclick='updateBlogCategory(".$value->id.")'><i class='fa fa-floppy-o'></i></button><button class='btn btn-danger' onclick='deleteBlogCategory(".$value->id.")'><i class='fa fa-trash'></i></button></td></tr>";
        }
    }

    public function insertBlogCategory()
    {
        $data = [
        'name' => $this->input->post('name')
      ];

        $this->BlogCategoryModel->insert($data);
    }

    public function updateBlogCategory()
    {
        $data = [
          'name' => $this->input->post('name')
        ];

        $this->BlogCategoryModel->update($data, $this->input->post('id'));
    }

    public function deleteBlogCategory()
    {
        $this->BlogCategoryModel->delete($this->input->post('id'));
    }
}
