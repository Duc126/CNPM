<?php
include('db.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVATION SUNRISE HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                    
					</ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVATION <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            THÔNG TIN CÁ NHÂN
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <!-- <div class="form-group">
                                            <label>Title*</label>
                                            <select name="title" class="form-control" required >
												<option value selected ></option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
												<option value="Prof.">Prof.</option>
												<option value="Rev .">Rev .</option>
												<option value="Rev . Fr">Rev . Fr .</option>
                                            </select>
                              </div> -->
							  <div class="form-group">
                                            <label>Tên Chú Rể</label>
                                            <input name="fname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Tên Cô Dâu</label>
                                            <input name="lname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							   
								
								<div class="form-group">
                                            <label>Số Điện Thoại</label>
                                            <input name="phone" type ="text" class="form-control" required>
                                            
                               </div>
							   
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            THÔNG TIN ĐẶT CHỖ
                        </div>
                        <div class="panel-body">
								<div class="form-group">
                                            <label>Loại Hội Trường *</label>
                                            <select name="troom"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Hall A">Hall A</option>
                                                <option value="Hall B">Hall B</option>
												<option value="Hall C">Hall C</option>
												<option value="Hall D">Hall D</option>
                                            </select>
                              </div>
							  
							  
							 
							 
							  <div class="form-group">
                                            <label>Số Bàn Đặt</label>
                                            <select name="meal" class="form-control"required>
												<option value selected ></option>
                                                <option value="Room only">100</option>
                                                <option value="Breakfast">300</option>
												<option value="Half Board">500</option>
												<option value="Full Board">700</option>
												
                                                
                                             
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Đăng Ký Ngày</label>
                                            <input name="cin" type ="date" class="form-control">
                                            
                               </div>
							   <div class="form-group">
                                            <label>Kết Thúc Ngày</label>
                                            <input name="cout" type ="date" class="form-control">
                                            
                               </div>
                       </div>
                        
                    </div>
                </div>
				
				
                <div class="col-md-12 col-sm-12">
                    <div class="well">
                        <h4>Xác Thực</h4>
                        <p>Nhập bên dưới mã này <?php $Random_code=rand(); echo$Random_code; ?> </p><br />
						<p>Nhập mã trên<br /></p>
							<input  type="text" name="code1" title="random code" />
							<input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
						<input type="submit" name="submit" class="btn btn-primary">
						<?php
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
							if($code1!="$code")
							{
							$msg="Invalide code"; 
							}
							else
							{
							
									// $con=mysqli_connect("localhost","root","","hotel");
									$check="SELECT * FROM roombook WHERE email = '$_POST[email]'";
									$rs = mysqli_query($con,$check);
									$data = mysqli_fetch_array($rs, MYSQLI_NUM);
									if($data[0] > 1) {
										echo "<script type='text/javascript'> alert('Người Dùng Đã Tồn Tại')</script>";
										
									}

									else
									{
										$new ="Not Conform";
										$newUser="INSERT INTO `roombook`(`Title`, `FName`, `LName`, `Email`, `Phone`, `TRoom`,  `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[phone]','$_POST[troom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
										if (mysqli_query($con,$newUser))
										{
											echo "<script type='text/javascript'> alert('Đơn đăng ký Đặt phòng của bạn đã được gửi đi')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Lỗi Khi Thêm Người Dùng Trong Cơ Sở Dữ Liệu')</script>";
											
										}
									}

							$msg="Mã Của Bạn Đã Đúng";
							}
							}
							?>
						</form>
							
                    </div>
                </div>
            </div>
           
                
                </div>
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
