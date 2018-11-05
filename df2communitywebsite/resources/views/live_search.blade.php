@extends('layouts.app')

@section('content')
<div class="container box">
    <h3 align="center" style="margin-top: 20px;">Search</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">Search blog</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Type to search blog" />
            </div>
            <div class="table-responsive">
                <h3 align="center">Search result</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th colspan="2">Title</th>
                        <th colspan="1"></th>
                        <th colspan="1">Content</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('live_search.action') }}",
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
@endsection