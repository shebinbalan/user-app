<!DOCTYPE html>
<html>
<head>
<title>User Data</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
</head>
<body style="background-color:#ccd3e0;">
<div class="container">
<br> <br>
<div class="pull-right">
                <a class="btn btn-success" href="add-user"> Create New User</a>
            </div>
            <br>
    <div class="row">
   
    <div class="col-12">
       <h4> Search</h4>
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search name / designation /department" />
        </div>
        <br>
        <div class="col-12">
            <table class="table table-striped table-bordered">
            <thead>
            
                
               
            </thead>
            <tbody></tbody>
            </table>
        </div>
    </div>    
    </div>
</div>
<script src="http://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
$(document).ready(function(){
 
    fetch_customer_data();
 
    function fetch_customer_data(query = '')
    {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{ route('search') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            
            success:function(data)
            {
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }
 
    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
</script>
</body>
</html>