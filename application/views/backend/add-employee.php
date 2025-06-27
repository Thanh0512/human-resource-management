<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Nhân Viên</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Nhân Viên</li>
            </ol>
        </div>
    </div>
    <div class="message"></div>
    <?php $degvalue = $this->employee_model->getdesignation(); ?>
    <?php $depvalue = $this->employee_model->getdepartment(); ?>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class="" aria-hidden="true"></i> Danh Sách Nhân Viên</a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Disciplinary" class="text-white"><i class="" aria-hidden="true"></i> Danh Sách Kỷ Luật</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Thêm Nhân Viên Mới<span class="pull-right "></span></h4>
                    </div>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->upload->display_errors(); ?>

                    <?php echo $this->session->flashdata('formdata'); ?>
                    <?php echo $this->session->flashdata('feedback'); ?>
                    <div class="card-body">

                        <form class="row" method="post" action="Save" enctype="multipart/form-data">
                            <div class="form-group col-md-3 m-t-20">
                                <label>Tên</label>
                                <input type="text" name="fname" class="form-control form-control-line" placeholder="Tên Nhân Viên" minlength="2" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Họ </label>
                                <input type="text" id="" name="lname" class="form-control form-control-line" value="" placeholder="Họ Nhân Viên" minlength="2" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Mã Nhân Viên </label>
                                <input type="text" name="eid" class="form-control form-control-line" placeholder="Ví dụ: 8820">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Phòng Ban</label>
                                <select name="dept" value="" class="form-control custom-select" required>
                                    <option>Chọn Phòng Ban</option>
                                    <?Php foreach ($depvalue as $value): ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->dep_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Chức Vụ </label>
                                <select name="deg" class="form-control custom-select" required>
                                    <option>Chọn Chức Vụ</option>
                                    <?Php foreach ($degvalue as $value): ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->des_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Chức năng </label>
                                <select name="role" class="form-control custom-select" required>
                                    <option>Chọn Chức Năng</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="EMPLOYEE">Employee</option>
                                    <option value="SUPER ADMIN">Super Admin</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Giới tính </label>
                                <select name="gender" class="form-control custom-select" required>
                                    <option>Chọn Giới Tính</option>
                                    <option value="MALE">Nam</option>
                                    <option value="FEMALE">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Nhóm máu </label>
                                <select name="blood" class="form-control custom-select">
                                    <option>Chọn Nhóm Máu</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>CCCD</label>
                                <input type="text" name="nid" class="form-control" value="" placeholder="(Max. 10)" minlength="10" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Số điện thoại </label>
                                <input type="text" name="contact" class="form-control" value="" placeholder="1234567890" minlength="10" maxlength="15" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Ngày sinh </label>
                                <input type="date" name="dob" id="example-email2" name="example-email" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Ngày Vào Công Ty </label>
                                <input type="date" name="joindate" id="example-email2" name="example-email" class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Ngày Rời Công Ty </label>
                                <input type="date" name="leavedate" id="example-email2" name="example-email" class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Tên Đăng Nhập </label>
                                <input type="text" name="username" class="form-control form-control-line" value="" placeholder="Tên Đăng Nhập">
                            </div>
                            <div class="form-group col-md-3 m-t-20">
                                <label>Email </label>
                                <input type="email" id="example-email2" name="email" class="form-control" placeholder="email@mail.com" minlength="7" required>
                            </div><!--
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Password </label>
                                        <input type="text" name="password" class="form-control" value="" placeholder="**********"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-20">
                                        <label>Confirm Password </label>
                                        <input type="text" name="confirm" class="form-control" value="" placeholder="**********"> 
                                    </div>-->
                            <div class="form-group col-md-3 m-t-20">
                                <label>Ảnh </label>
                                <input type="file" name="image_url" class="form-control" value="">
                            </div>
                            <div class="form-actions col-md-12">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Lưu</button>
                                <button type="button" class="btn btn-danger">Huỷ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('backend/footer'); ?>