<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Department Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/department/add')}}">Add Department</a>
                    </li>
                    <li>
                        <a href="{{url('/department/manage')}}">Manage Department</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Notification Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/notification/add')}}">Add Notification</a>
                    </li>
                    <li>
                        <a href="{{url('/notification/manage')}}">Manage Notification</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Teacher Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/teacher/add')}}">Add Teacher</a>
                    </li>
                    <li>
                        <a href="{{url('/teacher/manage')}}">Manage Teacher</a>
                    </li>                   
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Student Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/student/add')}}">Add Student</a>
                    </li>
                    <li>
                        <a href="{{url('/student/manage')}}">Manage Student</a>
                    </li>                   
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Semester Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/semester/add')}}">Add Semester</a>
                    </li>
                    <li>
                        <a href="{{url('/semester/manage')}}">Manage Semester</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Course Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach($publishedDepartments as $publishedDepartment )
                    <li>
                        <a href="{{url('/departmentView/'.$publishedDepartment->id)}}" class="dropdown-toggle menu__link" >
                                    {{$publishedDepartment->deptName}}<!--<span class="caret"></span>--></a>
                    </li>
                     @endforeach
                    <li>
                        <a href="{{url('/course/manage')}}">Manage Course</a>
                    </li>                   
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Result Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach($publishedDepartments as $publishedDepartment )
                    <li>
                        <a href="{{url('/departmentViewResult/'.$publishedDepartment->id)}}" class="dropdown-toggle menu__link" >
                                    {{$publishedDepartment->deptName}}<!--<span class="caret"></span>--></a>
                    </li>
                     @endforeach
                    <li>
                        <a href="{{url('/result/manage')}}">Manage Result</a>
                    </li>                   
                </ul>
                <!-- /.nav-second-level -->
            </li>
           
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>