@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Thêm biến thể của thuộc tính {{ $attr->name }}</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form action="{{ Route('attr.addValue') }}" method="POST">
                <input type="hidden" name="id" value="{{$attr->id}}">
                @csrf
                <div class="hung">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá trị</label>
                        @if($type==1)
                        <input type="number" class="form-control" id="exampleInputEmail1" name="name[]">

                        @elseif($type == 2)
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[]">

                        @elseif($type == 3)
                        <input type="color" class="form-control" id="exampleInputEmail1" name="name[]">
                        @endif
                    </div>
                </div>
                <button class="add-input btn btn-success" type="button"><i class="fa fa-fw fa-plus"></i></button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@section('src')
<script>
    $('.add-input').click(function (){
      $('.hung').append(`
                    <div class="form-group">
                        @if($type==1)
                        <input type="number" class="form-control" id="exampleInputEmail1" name="name[]">

                        @elseif($type == 2)
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[]">

                        @elseif($type == 3)
                        <input type="color" class="form-control" id="exampleInputEmail1" name="name[]">
                        @endif
                    </div>
                `)
   })

</script>

@endsection

@stop
