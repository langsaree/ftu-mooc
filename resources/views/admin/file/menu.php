<aside id="sidebar">

        <!--| MAIN MENU |-->
        <ul class="side-menu">
            <li class="sm-sub sms-profile">
                <a class="clearfix" href="">
                    <img src="<?php echo base_url('upload/img/rmumooc.jpg')?>" alt="">

                    <span class="f-11">
                        <span class="d-block"><?php echo $this->session->admin_name?></span>
                        <small class="text-lowercase">@<?php echo $this->session->admin_username?></small>
                    </span>
                </a>

                <ul>
                    <li><a href="<?php echo site_url('admin/Profile')?>">View Profile</a></li>
                    
                    <li><a href="<?php echo site_url('admin/signout')?>">Logout</a></li>
                </ul>
            </li>

            <li id="Dashboard">
                <a href="<?php echo site_url('admin/Dashboard')?>">
                    <i class="zmdi zmdi-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li id="curriculum">
                <a href="<?php echo site_url('admin/ViewCourseAll')?>">
                    <i class="zmdi zmdi-format-underlined"></i>
                    <span>หลักสูตร<span class="label label-danger">New</span></span>
                </a>
            </li>
            
            
           
            <li id="MNexpert">
                <a href="<?php echo site_url('admin/MNexpert')?>">
                    <i class="zmdi zmdi-male-female zmdi-hc-fw"></i>
                    <span>จัดการข้อมูลผู้เชียวชาญ</span>
                </a>
            </li>
            <li id="Profiles">
                <a href="<?php echo site_url('admin/Profile')?>">
                    <i class="zmdi zmdi-account zmdi-hc-fw"></i>
                    <span>จัดการข้อมูลส่วนตัว</span>
                </a>
            </li>
            
            <li id="ResetPassword">
                <a href="<?php echo site_url('admin/ResetPassword')?>">
                    <i class="zmdi zmdi-refresh zmdi-hc-fw"></i>
                    <span>เปลี่ยนรหัสผ่าน</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/signout')?>">
                    <i class="zmdi zmdi-power-setting zmdi-hc-fw"></i>
                    <span>ออกจากระบบ</span>
                </a>
            </li>
            
        </ul>
    </aside>