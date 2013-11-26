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
        <div class="login">
            <div class="row"></div>
            <!--Menu--> 
            <div class="menubar">
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
                                        <li><a href="<?php echo base_url(); ?>/index.php/Home" >หน้าแรก</a></li>
                                        <li> <a href="#" >จัดการหมวดหมู่สมาชิก</a></li>
                                        <li> <a href="List_member">จัดการข้อมูลสมาชิก</a></li>
                                        <li><a href="#"><font color="#FF6B45">ยินดีต้อนรับ &nbsp;<span class="glyphicon glyphicon-user">&nbsp;<?php echo $username; ?></span></font></a></li>
                                        <li><a href="#">|</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/home/logout"> <font color="#FF6B45"><span class="glyphicon glyphicon-share">&nbsp;Logout</span></font></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--เนื้อหา-->
                        <div class="clear"/></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="thumbnail">
                                    <img src="http://27.254.44.50/~tolovesci/Themes/default/images/tolovesci-cover.jpg"/>
                                </a>
                            </div>
                        </div>
                    </div>
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
                                    <div class="col-md-9">
                                        <button name="edit_member" href="">แก้ไขข้อมูลสมาชิก</button>
                                        <button name="deleted_member" href="">ลบสมาชิก</button>
                                        <br/>
                                        <br/>
                                        <div class="list_member">



                                            <div class="table">
                                                <div class="tr">
                                                    <div class="th">ลำดับที่</div>
                                                    <div class="th">ชื่อ - นามสกุล</div>
                                                    <div class="th">หมวดหมู่</div>
                                                    <div class="th">สถานะ</div>
                                                    <div class="th">เปลี่ยนหมวดหมู่</div>
                                                </div>

                                                <?php
                                                $i = $this->uri->segment(3); // เอามานับว่า อยุ่ ลำดับที่เท่าไหร่
                                                $no = empty($i) ? 1 : $i;
                                                ?>
                                                <form method="post" action="<?php echo base_url(); ?>index.php/List_member/update_member">

                                                    <?php foreach ($list as $row) : ?>
                                                        <div class="tr">
                                                            <div class="td"><?php echo $no; ?> </div>
                                                            <div class="td"><?php echo $row['user_name'] . "  " . $row['user_surname']; ?></div>
                                                            <input type="hidden" name="user_id[]" value="<?php echo $row['user_id'];?>">
                                                            <div class="td"><?php echo $row['group_name']; ?></div>
                                                            <div class="td"><?php echo $row['user_status_name']; ?></div>

                                                            <div class="td">
                                                                <select name="group_id[]">
                                                                    <option value="<?php echo $row['group_id']; ?>"><?php echo $row['group_name']; ?></option>
                                                                    <?php foreach ($groups as $row2) : ?>
                                                                        <option value="<?php echo $row2['group_id']; ?>"><?php echo $row2['group_name']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select> 

                                                            </div>
                                                            
                                                        </div>
                                                        <?php $no++; ?>
                                                    <?php endforeach; ?>
                                                    <br/>
                                                    <br/>
                                            </div>
                                            <p>หน้า <?php echo $this->pagination->create_links(); // เป็น ตัว generate pagination ให้เราเองอัตโนมัติ                   ?></p>

                                            <input name="sumbit" type="submit" value="บันทึกค่า" />
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--footer--> 
                    </div>
                    <div class="footer">
                        สนับสนุนโดย Indesclooh.net
                    </div>
                </div>

            </div>


    </body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

