@extends('admin.layout.admin_layout')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Burçlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kullanıcı Yorumları</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kullanıcı Yorumları</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Yorum Yapan</th>
                  <th>Yorum Yapılan Burç</th>
                  <th>Yorum</th>
                  <th>Durumu</th>
                  <th>Yayınlanma Zamanı</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $item )
<tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->horoscope->name}}</td>
                  <td>{{$item->comment}}</td>
                  <td>{{$item->is_active == 1 ? 'Yayınlandı' : 'Onay Bekliyor'}}</td>
                  <td>{{$item->created_at}}</td>

                  <td><a href="{{route('comment.edit',$item->id)}}" class="btn btn-block btn-warning">Düzenle</a>
                    <a href="{{route('comment.destroy',$item->id)}}" id="delete" class="btn btn-block btn-danger">Sil</a></td>
                </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Yorum Yapan</th>
                        <th>Yorum Yapılan Burç</th>
                        <th>Yorum</th>
                        <th>Durumu</th>
                        <th>Yayınlanma Zamanı</th>
                        <th></th>
                      </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
