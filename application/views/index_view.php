<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>สมาคมศิษย์เก่า คณะวิทยาศาสตร์ มหาวิทยาลัยนเรศวร</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/dist/css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/self.css"/>
        <script type='text/javascript' src='<?php echo base_url(); ?>css/bootstrap/dist/js/bootstrap.js'></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>js/self.js'></script>

    </head>
    <body>
    <div class="row"></div>
    <!--Menu--> 
		<div class="menubar"
        	<div class="container">
     <div class="navbar" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         Project name
        </div>
         <div class="collapse navbar-collapse">
                                <div class="navbar-form navbar-right">
                                <ul class="nav nav-tabs"> 
                                             <li><a href="#">หน้าแรก </a></li>
                                             <li> <a href="#">รูปภาพ</a></li>
                                          	 <li> <a href="#">ห้องสนทนา</a></li>
                                             <li> <a href="#">จิปาทะ</a></li> 
                                             <li><a href="#">เกี่ยวกับเรา </a></li>
                                          	 <li> <a href="#">ติดต่อเรา </a></li>
                                           	<li><a href="#">|</a></li>
                                           <li> <a href="#login-box" class="login-window"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;เข้าสู่ระบบ</a></li>
                                            <li><a href="#regis-box" class="login-window"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;สมัครสมาชิก</a></li>
                            </ul>
                            </div>
                </div>
        </div>
            <div id="login-box" class="login-popup">
           		
                <a href="#" class="close"><img src="<?php echo base_url(); ?>images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>				
           		Login Me
                <div class="input-group">
                <?php echo form_open('verify_login'); ?>
                <span class="glyphicon glyphicon-user"></span> &nbsp;
                <input  type="text" size="20" id="username" name="username" value="<?php echo set_value('username'); ?>"/>
                <?php echo form_error('username'); ?>
                <br/>
                <label for="password"><span class="glyphicon glyphicon-lock"></span> &nbsp;</label>
                <input type="password" size="20" id="passowrd" name="password" value="<?php echo set_value('password'); ?>"/>
                <?php echo form_error('password'); ?>
                <br/>
                <input type="submit" value="Login" />
                </form>
            </div>
            </div>
            <div id="regis-box" class="login-popup">
                <a href="#" class="close"><img src="<?php echo base_url(); ?>images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                สมัครสมาชิก

                <?php echo form_open('verify_regis'); ?>
               <table width="400" border="0">
  <tr>
    <td><label >ชื่อผู้ใช้ :</label></td>
    <td><input type="text" size="20" id="username" name="username" value="<?php echo set_value('username'); ?>"/>
                <?php echo form_error('username'); ?></td>
  </tr>
  <tr>
    <td><label >รหัสผ่าน:</label></td>
    <td><input type="password" size="20" id="passowrd" name="password" value="<?php echo set_value('password'); ?>"/>
                <?php echo form_error('password'); ?></td>
  </tr>
  <tr>
    <td><label >ยืนยันรหัสผ่าน :</label></td>
    <td><input type="text" size="20" id="repassword" name="repassword" value="<?php echo set_value('repassword'); ?>"/>
                <?php echo form_error('repassword'); ?></td>
  </tr>
  <tr>
    <td><label >ชื่อ:</label></td>
    <td><input type="text" size="20" id="name" name="name" value="<?php echo set_value('name'); ?>"/>
                <?php echo form_error('name'); ?></td>
  </tr>
  <tr>
    <td><label >นามสกุล:</label></td>
    <td><input type="text" size="20" id="surname" name="surname" value="<?php echo set_value('surname'); ?>"/>
                <?php echo form_error('surname'); ?></td>
  </tr>
  <tr>
    <td><label >วันเกิด:</label></td>
    <td><input type="date" size="20" id="birthday" name="birthday" value="<?php echo set_value('birthday'); ?>"/>
                <?php echo form_error('birthday'); ?></td>
  </tr>
  <tr>
    <td><label >อีเมล์:</label></td>
    <td><input type="email" size="20" id="email" name="email" value="<?php echo set_value('email'); ?>"/>
                <?php echo form_error('email'); ?></td>
  </tr>
  <tr>
    <td><label >โทรศัพท์:</label></td>
    <td><input type="text" size="20" id="tel" name="tel" value="<?php echo set_value('tel'); ?>"/>
                <?php echo form_error('tel'); ?></td>
  </tr>
  <tr>
    <td><label >ที่อยู่:</label></td>
    <td><input type="text" size="20" id="address" name="address" value="<?php echo set_value('address'); ?>"/>
                <?php echo form_error('address'); ?></td>
  </tr>
  <tr>
    <td><label >Fackbook URL :</label></td>
    <td><input type="fackbook" size="20" id="fackbook" name="fackbook" value="<?php echo set_value('fackbook'); ?>"/>
                <?php echo form_error('fackbook'); ?></td>
  </tr>
  <tr>
  	<td> <label >รูปโปรไฟล์:</label></td>
    <td><input type="file" size="20" id="avatar" name="avatar" value="<?php echo set_value('avatar'); ?>"/>
                <?php echo form_error('avatar'); ?></td>
   </tr> 
</table>
<input type="submit" value="Login"/>
                </form>

            </div>

        </div>


        <div class="clear"/>
        <div class="container">
             <div class="row">
             	<div class="col-md-12">
                  <a href="#" class="thumbnail">
                      <img src="<?php echo base_url(); ?>images/tolovesci-cover.jpg" alt="...">
                    </a>
  			</div>
            </div>
            </div>
                              <!--เนื้อหา-->
             <div class="container">
            <div class="panel panel-body">
            <div class="row">
               <div class="row">
        <div class="col-md-3">
        	<div class="list-group">
                  <a href="#" class="list-group-item active">
                    สมาคมศิษท์เก่า
                  </a>
                  <a href="#" class="list-group-item">_______</a>
                  <a href="#" class="list-group-item">_______</a>
                  <a href="#" class="list-group-item">_______</a>
                  <a href="#" class="list-group-item">_______</a> 
                  <a href="#" class="list-group-item">_______</a>
                  <a href="#" class="list-group-item">_______</a>
                  <a href="#" class="list-group-item">_______</a>
                </div></div>
        <div class="col-md-6">.col-md-6</div>
        <div class="col-md-3">.col-md-3</div>
      </div>
      </div>
      </div>
            <!--footer-->
        </div>
        <div class="footer">
          <div class="container">
          	<div class="text-right">
          	สนับสนุนโดย Indesclooh.net
           </div>
            </div>
            </div>
        
        </div>


    </body>
</html>