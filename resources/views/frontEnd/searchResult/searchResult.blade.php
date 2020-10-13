
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
        <script src="{{asset('public/search/jquery.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('public/search/bootstrap.min.css')}}" />
        <script src="{{asset('public/search/dataTables.min.js')}}"></script>
        <script src="{{asset('public/search/dataTables.bootstrap.min.js')}}"></script>  
        <link rel="stylesheet" href="{{asset('public/search/dataTables.bootstrap.min.css')}}" />
        <script src="{{asset('public/search/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="container">    
            <br />
            <h3 align="center">Laravel 7.x - Course Result in Datatables using Semester & Student Roll</h3>
            <br />
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_semester" id="filter_semester" class="form-control" required>
                            <option value="">Select Semester</option>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                            <option value="3rd Semester">3rd Semester</option>                          
                            <option value="4th Semester">4th Semester</option>
                            <option value="5th Semester">5th Semester</option>
                            <option value="6th Semester">6th Semester</option>
                            <option value="7th Semester">7th Semester</option>
                            <option value="8th Semester">8th Semester</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="filter_department" id="filter_department" class="form-control" required>
                            <option value="">Select Department</option>
                            @foreach($department_name as $department)
                            <option value="{{ $department->sExamRoll}}">{{ $department->sExamRoll }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                        <button type="button" name="home" id="reset" class="btn btn-default"><a href="{{url('/')}}"> Go Back Home</a></button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
            <div class="table-responsive">
                <table id="course_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                             <th>Roll</th>
                             <th>Name</th>
                            <th>Department</th>
                            <th>Subject</th>
                            <th>Semester</th>
                           
                            <th>Attendance</th>
                            <th>Tutorial</th>                           
                            <th>Midterm</th>                           
                            <th>Final</th>                           
                        </tr>
                    </thead>
                </table>
            </div>
            <br />
            <br />
        </div>
    </body>
</html>

<script>
$(document).ready(function () {

    fill_datatable();

    function fill_datatable(filter_semester = '', filter_department = '')
    {
        var dataTable = $('#course_data').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('searchResult.index') }}",
                data: {filter_semester: filter_semester, filter_department: filter_department}
            },
            columns: [
                 {
                    data: 'sExamRoll',
                    name: 'sExamRoll'
                },
                 {
                    data: 'sName',
                    name: 'sName'
                },
                {
                    data: 'deptName',
                    name: 'deptName'
                },
                {
                    data: 'courseTitle',
                    name: 'courseTitle'
                },
                {
                    data: 'semTitle',
                    name: 'semTitle'
                },
               
                {
                    data: 'attendance',
                    name: 'attendance'
                },
                {
                    data: 'tutorial',
                    name: 'tutorial'
                },
                {
                    data: 'midterm',
                    name: 'midterm'
                },
                {
                    data: 'final',
                    name: 'final'
                }               
            ]
        });
    }

    $('#filter').click(function () {
        var filter_semester = $('#filter_semester').val();
        var filter_department = $('#filter_department').val();

        if (filter_semester != '' && filter_department != '')
        {
            $('#course_data').DataTable().destroy();
            fill_datatable(filter_semester, filter_department);
        } else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function () {
        $('#filter_semester').val('');
        $('#filter_department').val('');
        $('#course_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>

