<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Chấm Công</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Chấm Công</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Save_Attendance" class="text-white"><i class="" aria-hidden="true"></i> Thêm Chấm Công </a></button>
                <button type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>attendance/Attendance_Report" class="text-white"><i class="" aria-hidden="true"></i> Báo Cáo Chấm Công </a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Báo Cáo Chấm Công</h4>
                        <form method="post" action="Get_attendance_data_for_report" class="form-material row">
                            <div class="form-group col-md-3">
                                <input type="text" name="date_from" id="date_from" class="form-control mydatetimepickerFull" placeholder="from">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" name="date_to" id="date_to" class="form-control mydatetimepickerFull" placeholder="to">
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control custom-select" tabindex="1" name="emid" id="employee_id" required>
                                    <option>Nhân Viên</option>
                                    <?php foreach ($employee as $value): ?>
                                        <option value="<?php echo $value->em_id; ?>">
                                            <?php echo $value->first_name ?>
                                            <?php echo $value->last_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="submit" class="btn btn-success" value="Submit" name="submit" id="getAtdReport">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body EmployeeInfo">
                        <h3 class="employee_name">Nhân Viên</h3>
                        làm việc <span class="hours"></span> giờ trong <span class="days"></span> ngày
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chấm Công Đủ</h4>
                        <div class="table-responsive ">
                            <table id="example234" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Mã Nhân Viên</th>
                                        <th>Tên</th>
                                        <th>Ngày</th>
                                        <th>Vào</th>
                                        <th>Ra</th>
                                        <th>Số Giờ</th>
                                        <th>Nơi Làm Việc</th>
                                    </tr>
                                </thead>

                                <tbody class="leave">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('backend/footer'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#getAtdReport").click(function(e) {
                        e.preventDefault(e);
                        // Get the record's ID via attribute
                        var date_from = $('#date_from').val();
                        var date_to = $('#date_to').val();
                        var employee_id = $('#employee_id').val();

                        $.ajax({
                            url: 'Get_attendance_data_for_report',
                            method: 'POST',
                            data: {
                                date_from: date_from,
                                date_to: date_to,
                                employee_id: employee_id
                            }
                        }).done(function(response) {

                            var data = JSON.parse(response);

                            //console.log(data);

                            var infoContainer = $('.EmployeeInfo'),
                                name = $('.EmployeeInfo .employee_name'),
                                hours = $('.EmployeeInfo .hours'),
                                days = $('.EmployeeInfo .days');

                            name.text(data.name);
                            hours.text(Math.abs(data.hours[0].Hours));
                            days.text(data.days);

                            var tableData = data.attendance;
                            //console.log(tableData);
                            $('#example234').dataTable({
                                "bDestroy": true,
                                "aaData": tableData,
                                "columns": [{
                                        "data": "em_code"
                                    },
                                    {
                                        "data": "name"
                                    },
                                    {
                                        "data": "atten_date"
                                    },
                                    {
                                        "data": "signin_time"
                                    },
                                    {
                                        "data": "signout_time"
                                    },
                                    {
                                        "data": "Hours"
                                    },
                                    {
                                        "data": "place"
                                    }
                                ]
                            });
                        });
                    });
                });
            </script>