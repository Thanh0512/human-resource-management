        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <?php
                $id = $this->session->userdata('user_login_id');
                $basicinfo = $this->employee_model->GetBasic($id);
                ?>
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </div>

                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?php echo $basicinfo->first_name . ' ' . $basicinfo->last_name; ?></h5>
                        <a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="<?php echo base_url(); ?>"><i class="mdi mdi-gauge"></i><span class="hide-menu">Trang chủ </span></a></li>
                        <?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
                            <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Nhân Viên </span></a>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Xin Nghỉ Phép </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>leave/Holidays"> Ngày lễ </a></li>
                                    <li><a href="<?php echo base_url(); ?>leave/EmApplication"> Đơn Xin Nghỉ </a></li>
                                    <li><a href="<?php echo base_url(); ?>leave/EmLeavesheet"> Bảng Nghỉ Phép </a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Dự án </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>Projects/All_Projects">Dự án </a></li>
                                    <li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Danh Sách Nhiệm Vụ </a></li>
                                    <!--<li><a href="<?php #echo base_url(); 
                                                        ?>Projects/All_Tasks"> Field Visit</a></li>-->
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Tổ chức </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>organization/Department">Phòng Ban </a></li>
                                    <li><a href="<?php echo base_url(); ?>organization/Designation">Chức Vụ</a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Nhân Viên </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>employee/Employees">Nhân Viên </a></li>
                                    <li><a href="<?php echo base_url(); ?>employee/Disciplinary">Kỷ Luật </a></li>
                                    <li><a href="<?php echo base_url(); ?>employee/Inactive_Employee">Người dùng không hoạt động</a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Chấm Công </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>attendance/Attendance">Danh Sách Chấm Công </a></li>
                                    <li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Thêm Chấm Công </a></li>
                                    <li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Báo Cáo Chấm Công </a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-off"></i><span class="hide-menu">Xin Nghỉ Phép </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>leave/Holidays"> Ngày Lễ </a></li>
                                    <li><a href="<?php echo base_url(); ?>leave/leavetypes">Loại nghỉ phép</a></li>
                                    <li><a href="<?php echo base_url(); ?>leave/Application"> </a></li>
                                    <li><a href="<?php echo base_url(); ?>leave/Earnedleave"> Ngày Nghỉ Có Lương </a></li>
                                    <li><a href="<?php echo base_url(); ?>leave/Leave_report"> Báo Cáo </a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Dự án </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>Projects/All_Projects">Dự Án </a></li>
                                    <li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Danh Sách Nhiệm Vụ </a></li>
                                    <li><a href="<?php echo base_url(); ?>Projects/Field_visit"> Công Tác</a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Lương </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <!--<li><a href="<?php #echo base_url(); 
                                                        ?>Payroll/Salary_Type"> Payroll Type </a></li>-->
                                    <li><a href="<?php echo base_url(); ?>Payroll/Salary_List"> Danh Sách Bảng Lương </a></li>
                                    <li><a href="<?php echo base_url(); ?>Payroll/Generate_salary"> Tạo Phiếu Lương</a></li>
                                    <li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report"> Báo Cáo Phiếu Lương</a></li>
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Khoản Vay </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>Loan/View"> Cấp Khoản Vay </a></li>
                                    <li><a href="<?php echo base_url(); ?>Loan/installment"> Trả Góp</a></li>
                                </ul>
                            </li>

                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-grid"></i><span class="hide-menu">Vật Dụng </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>Logistice/Assets_Category"> Loại Vật Dụng </a></li>
                                    <li><a href="<?php echo base_url(); ?>Logistice/All_Assets"> Danh Sách Vật Dụng </a></li>
                                    <!--<li><a href="<?php #echo base_url(); 
                                                        ?>Logistice/View"> Logistic Support List </a></li>-->
                                    <li><a href="<?php echo base_url(); ?>Logistice/logistic_support"> Hỗ Trợ Hậu Cần </a></li>
                                </ul>
                            </li>

                            <li> <a href="<?php echo base_url() ?>notice/All_notice"><i class="mdi mdi-clipboard"></i><span class="hide-menu">Thông Báo <span class="hide-menu"></a></li>
                            <li> <a href="<?php echo base_url(); ?>settings/Settings"><i class="mdi mdi-settings"></i><span class="hide-menu">Cài Đặt <span class="hide-menu"></a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>