@extends('admin.home');

@section('content')
    <main class="container-fluid">
        <h3>Danh sách môn học</h3>
        <div class="row">
            @foreach($subjects as $s)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{PUBLIC_URL. $s->logo}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$s->name}}</h5>
                        <a href="{{BASE_URL . 'admin/subject/detail?id=' . $s->id}}" class="btn btn-primary">Xem chi tiết</a>
                        <a href="{{BASE_URL . 'admin/subject/delete?id=' . $s->id}}" class="btn btn-danger" style="width: 135px;">Xóa</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Thêm môn học</a>
    </main>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm môn học</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{BASE_URL}}admin/subject/add-subject" enctype="multipart/form-data">
                        <div>
                            <span>Tên môn học: </span>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div>
                            <span>Ảnh: </span>
                            <input type="file" name="fileUpload" id="" class="form-control">
                        </div><br>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Thêm</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
