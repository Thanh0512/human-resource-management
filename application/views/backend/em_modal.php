                        <!-- sample modal content -->
                        <div class="modal fade" id="EduModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Thông báo kỷ luật</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Education" id="educationmodal" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Tên Bằng Cấp</label>
                                                <input type="text" name="name" class="form-control form-control-line" placeholder=" Degree Name" minlength="2" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên Trường Đại Học</label>
                                                <input type="text" name="institute" class="form-control form-control-line" placeholder=" Institute name" minlength="7" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kết Quả</label>
                                                <input type="text" name="result" class="form-control form-control-line" placeholder=" Result" minlength="2" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Năm Tốt Nghiệp</label>
                                                <input type="text" name="year" class="form-control form-control-line" placeholder="Passing Year">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="emid" value="">
                                            <input type="hidden" name="id" value="">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-success">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="ExpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Biểu Mẫu Kinh Nghiệm</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Experience" id="experiencemodal" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label> Tên Công Ty</label>
                                                <input type="text" name="company_name" class="form-control form-control-line company_name" placeholder="Company Name" minlength="2" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Vị Trí</label>
                                                <input type="text" name="position_name" class="form-control form-control-line position_name" placeholder="Position" minlength="3" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa Chỉ</label>
                                                <input type="text" name="address" class="form-control form-control-line duty" placeholder=" Address" minlength="7" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Thời Gian Làm Việc</label>
                                                <input type="text" name="work_duration" class="form-control form-control-line working_period" placeholder="Working Duration" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="emid" value="">
                                            <input type="hidden" name="id" value="">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng </button>
                                            <button type="submit" class="btn btn-success">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>