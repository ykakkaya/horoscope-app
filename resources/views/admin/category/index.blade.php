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
              <li class="breadcrumb-item active">Burçlar</li>
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
              <h3 class="card-title">Burçlar ve Genel Özellikleri</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Burç Adı</th>
                  <th>Tarih Aralığı</th>
                  <th>Kısa Açıklama</th>
                  <th>Resim</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item )
<tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->date}}</td>
                  <td>{{$item->shortDescription}}</td>
                  <td><img src="{{$item->image}}" style="width: 20%"></td>
                  <td><a href="{{route('category.edit',$item->id)}}" class="btn btn-block btn-warning">Düzenle</a>
                    <button type="button" class="btn btn-block btn-danger">Sil</button></td>
                </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Burç Adı</th>
                        <th>Tarih Aralığı</th>
                        <th>Kısa Açıklama</th>
                        <th>Resim</th>
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
