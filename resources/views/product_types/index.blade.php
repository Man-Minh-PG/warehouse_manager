@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
 <style>
  .item3 {
    border-radius: 15px;
    background-color: #4747A1;
  }
  span.menu-title.title3{
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
            <h4 class="card-title">Product Type Table</h4>
            <p class="card-description add_inline_block">
              {{-- <code>(*)</code>Bấm vào <b class="text_red">Chi tiết</b> để xem chi tiết sản phẩm | <code>(*)</code>Bấm vào đây để thêm sản phẩm --}}
              <button type="button" class="btn btn-light custom_small_radius_button">Thêm</button>
              <div class="dropdown add_inline">
                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Lọc loại sản phẩm
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                  <h6 class="dropdown-header">Tiêu chí lọc</h6>
                  <a class="dropdown-item" href="#">Theo ngày tạo (mới nhất)↓</a>
                  <a class="dropdown-item" href="#">Theo Tên (A-Z) ↓</a>
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
                    <th>#Mã loại </th>
                    <th>Tên loại</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($product_types as $item)
                  <tr>
                    <td id="id{{$item->id}}">#1</td>
                    <td id="nameType{{$item->name}}">Text SP</td>
                    <td>dd-mm-yyyy</td>
                    <td>dd-mm-yyyy</td>
                    <td>    
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick ='get_value_in_form($("#nameType{{$item->name}}").text(), $("#id{{$item->id}}").text())' data-toggle="modal" data-target="#exampleModalCenter" type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-pencil-alt"></i></button>
                        <button onclick ="delete_row_in_table($(this))" type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-trash"></i></button>
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
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="edit_form" action="{{Route('admin.product_type.update')}}" method="POST"> @csrf  @method('PATCH')
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="mail" class="form-control" id="modalInput1" aria-describedby="desHelp">
                <small id="desHelp" class="form-text text-muted">Nhập tên loại sản phẩm .</small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="saveChange" class="btn btn-primary">Save changes</button>
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
            <h4 class="card-title">Thêm loại sản phẩm</h4>
            <p class="card-description">
              Biểu mẫu thêm thông tin cho loại sản phẩm
            </p>
            
            <form action="{{Route('admin.product_type.store')}}" method="POST" class="forms-sample"> @csrf
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loại sản phẩm</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="productType0" placeholder="Điện gia dụng">
                </div>
              </div>
              <button class="btn btn-primary mr-2" type="submit" id="add_value">Thêm</button>
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
  {{-- This is a single line comment. --}}
  <script>
    function get_value_in_form(value, id) {
      $('#modalInput1').val(value);

      $('#saveChange').click(id) {
        addHiddenField(id);
      }  
    }

    // tạo một trường ẩn khi submit form 
    function addHiddenField(id) {
    var form = document.getElementById("edit_form");

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "id");
    hiddenField.setAttribute("value", id);

    form.appendChild(hiddenField);
}
  </script>
@endsection