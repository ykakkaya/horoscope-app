@extends('admin.layout.admin_layout')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Burçlar</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorum Düzenleme</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Yorum Düzenleme</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('comment.update')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control"  name="id" value="{{$comment->id}}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Adı</label>
                      <input type="text" class="form-control"  name="name" value="{{$comment->name}}">
                    </div>
                    <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                           Yorum İçeriği
                          </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                          <div class="mb-3">
                            <textarea class="textarea" name="comment"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                      {{$comment->comment}}</textarea>
                          </div>

                        </div>
                      </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control select2" name="is_active" style="width: 100%;">

                        <option  value="0" {{$comment->is_active == 0 ? 'selected' : ''}}>Onay Bekliyor</option>
                        <option  value="1" {{$comment->is_active == 1 ? 'selected' : ''}}>Onaylandı</option>
                        </select>
                      </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>  <!-- /.card -->
          </div>
        </div>
    <!-- /.content -->
  </div>
@endsection
