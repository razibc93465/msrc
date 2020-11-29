
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
  <script src="{{asset('public/rco/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('public/rco/bootstrap.min.css')}}" />
  <script src="{{asset('public/rco/dataTables.min.js')}}"></script>
  <script src="{{asset('public/rco/dataTables.bootstrap.min.js')}}"></script>  
  <link rel="stylesheet" href="{{asset('public/rco/dataTables.bootstrap.min.css')}}" />
  <script src="{{asset('public/rco/bootstrap.min.js')}}"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 - Custom Search in Datatables using Ajax</h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_department" id="filter_department" class="form-control" required>
                            <option value="">Select Department</option>
                            @foreach($semester_name as $department)

                            <option value="{{ $department->deptId }}">{{ $department->deptId }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="filter_semester" id="filter_semester" class="form-control" required>
                            <option value="">Select Country</option>
                            @foreach($semester_name as $semester)

                            <option value="{{ $semester->semId }}">{{ $semester->semId }}</option>

                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
   <div class="table-responsive">
    <table id="course_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Teacher</th>
                            <th>Semester</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Course Credit</th>
                            <th>Publication Status</th>
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
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_department = '', filter_semester = '')
    {
        var dataTable = $('#course_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('customsearch.index') }}",
                data:{filter_department:filter_department, filter_semester:filter_semester}
            },
            columns: [
                {
                    data:'deptId',
                    name:'deptId'
                },
                {
                    data:'tId',
                    name:'tId'
                },
                {
                    data:'semId',
                    name:'semId'
                },
                {
                    data:'courseCode',
                    name:'courseCode'
                },
                {
                    data:'courseTitle',
                    name:'courseTitle'
                },
                {
                    data:'courseCredit',
                    name:'courseCredit'
                },
                {
                    data:'publicationStatus',
                    name:'publicationStatus'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_department = $('#filter_department').val();
        var filter_semester = $('#filter_semester').val();

        if(filter_department != '' &&  filter_department != '')
        {
            $('#course_data').DataTable().destroy();
            fill_datatable(filter_department, filter_semester);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_department').val('');
        $('#filter_semester').val('');
        $('#course_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>

