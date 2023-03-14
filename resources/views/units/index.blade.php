@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
 <style>
  .item2 {
    border-radius: 15px;
    background-color: #4747A1;
  }
  span.menu-title.title2{
    color: white !important;
  } 
</style>
 @endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      <!--Show Card Table-->
      <div class="col-lg-12 grid-margin stretch-card form_default">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bảng đơn vị hàng hóa</h4>
            <p class="card-description add_inline_block">
              {{-- <code>(*)</code>Bấm vào <b class="text_red">Chi tiết</b> để xem chi tiết sản phẩm | <code>(*)</code>Bấm vào đây để thêm sản phẩm --}}
              <button type="button" class="btn btn-light custom_small_radius_button">Thêm</button>
              <div class="dropdown add_inline">
                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Lọc đơn vị hàng hóa
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                  <h6 class="dropdown-header">Tiêu chí</h6>
                  <a class="dropdown-item" href="#">Được thêm gần nhất</a>
                  <a class="dropdown-item" href="#">Được thêm lâu nhất</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
            </p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#Mã đơn vị </th>
                    <th>Tên đơn vị</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($unit_codes as $item)       
                  <tr>
                    <td>#{{$item->id}}</td>
                    <td id="nameType1">{{$item->name}}</td>
                    <td>{{$item->created_date->format('d-m-Y')}}</td>
                    <td>{{$item->updated_date->format('d-m-Y')}}</td>
                    <td>    
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick='get_value_in_form($("#nameType1").text())' data-toggle="modal" data-target="#exampleModalCenter" type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-pencil-alt"></i></button>
                        <form action="{{route('admin.unit.destroy', $item->id)}}" method="POST"><button onclick ="delete_row_in_table($(this))" type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-trash"></i></button></form>
                        <button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-eye"></i></button>
                      </div>                  
                    </td> 
                    <!--Link icon themify {class ti-xx}: https://themify.me/themify-icons-->
                  </tr> 
                  @endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div></div></div>
      <!--End show-->

      <!--Show Modal-->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật thông tin đơn vị</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{Route('admin.unit.update')}}" method="POST"> @csrf @method('PATCH')
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên đơn vị</label>
                <input type="text" name="name" class="form-control" id="modalInput1" aria-describedby="desHelp">
                <small id="desHelp" class="form-text text-muted">Vd: 1 Thùng, 1 Hộp,...vv.</small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">Lưu hoàn tất</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!--End Show Modal -->
      
      <!--Hide -->
      <div class="col-md-12 grid-margin stretch-card form_hidden">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm đơn vị hàng hóa</h4>
            <p class="card-description">
              Biễu mẫu thêm đơn vị
            </p>
            
            <form action="{{Route('admin.unit.store')}}" class="forms-sample" method="POST">
              @csrf
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên đơn vị</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="productName" placeholder="Email">
                </div>
              </div>        
           
              <button class="btn btn-primary mr-2" id="add_value">Thêm</button>
              <button class="btn btn-light clear">Clear</button>
            </form>

          </div>
        </div>
      </div>
    <!--End Hide-->

    </div>
    <!-- content-wrapper ends -->
  </div>
</div>
@stop()
@section('js')
  <script src="{{asset("../asset_admin/vendors/js/vendor.bundle.base.js")}}"></script>  
  <script src="{{asset("../asset_admin/js/custom/custom_script.js")}}"></script>
  
  <script>
    function get_value_in_form(value) {
      $('#modalInput1').val(value);
    }
  </script>
@endsection