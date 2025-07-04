<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-fighter-jet" style="color:#1976d2"></i> Loại Nghỉ Phép</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Nghỉ Phép</li>
            </ol>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#leavemodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Thêm Loại Nghỉ Phép</a></button>
                <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>leave/Application" class="text-white"><i class="" aria-hidden="true"></i> Đơn Xin Nghỉ Phép</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"> Danh Sách Ngày Nghỉ </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Mã Số </th>
                                        <th>Loại Nghỉ Phép</th>
                                        <th>Số Ngày Nghỉ Phép</th>
                                        <th>Hoạt Động</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                <tr>
                                        <th>ID </th>
                                        <th>Leave Type</th>
                                        <th>Number Of Days</th>
                                        <th>Action</th>
                                </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php foreach ($leavetypes as $value): ?>
                                        <tr>
                                            <td><?php echo $value->type_id; ?></td>
                                            <td><?php echo $value->name ?></td>
                                            <td><?php echo $value->leave_day ?></td>
                                            <td class="jsgrid-align-center ">
                                                <a href="" title="Edit" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> hidden <?php } ?> class="btn btn-sm btn-primary waves-effect waves-light leavetype" data-id="<?php echo $value->type_id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                <a onclick="confirm('Are you sure, you want to delete this?')" href="LeavetypeDelet?D=<?php echo $value->type_id; ?>" title="Delete" <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?> hidden <?php } ?> class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="leavemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Nghỉ Phép</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="Add_leaves_Type" id="leaveform" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label">Tên Nghỉ Phép</label>
                                <input type="text" name="leavename" class="form-control" id="recipient-name1" minlength="1" maxlength="35" value="" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số Ngày</label>
                                <input type="text" name="leaveday" class="form-control" id="recipient-name1" value="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Trạng Thái Nghỉ Phép</label>
                                <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="status" required>
                                    <option value="">Chọn</option>
                                    <option value="1">Hoạt Động</option>
                                    <option value="0">Ngưng Hoạt Động</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-success">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".leavetype").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute
                    var iid = $(this).attr('data-id');
                    $('#leaveform').trigger("reset");
                    $('#leavemodel').modal('show');
                    $.ajax({
                        url: 'LeaveTypebYID?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
                        $('#leaveform').find('[name="id"]').val(response.leavetypevalue.type_id).end();
                        $('#leaveform').find('[name="leavename"]').val(response.leavetypevalue.name).end();
                        $('#leaveform').find('[name="leaveday"]').val(response.leavetypevalue.leave_day).end();
                        $('#leaveform').find('[name="status"]').val(response.leavetypevalue.status).end();
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".holidelet").click(function(e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute
                    var iid = $(this).attr('data-id');
                    $.ajax({
                        url: 'HOLIvalueDelet?id=' + iid,
                        method: 'GET',
                        data: 'data',
                    }).done(function(response) {
                        console.log(response);
                        $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                        window.setTimeout(function() {
                            location.reload()
                        }, 2000)
                        // Populate the form fields with the data returned from server
                    });
                });
            });
        </script>
        <?php $this->load->view('backend/footer'); ?>