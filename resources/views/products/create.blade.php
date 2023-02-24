@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
 <style>
  .item4 {
    border-radius: 15px;
    background-color: #4747A1;
  }
  span.menu-title.title4{
    color: white !important;
  } 
</style>
 @endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <a class="btn btn-primary mr-1 btn-sm" href="{{Route("admin.product")}}"> < Quay lại</a>
      <div class="row">
         <!--Hide -->
         <div class="col-md-12 grid-margin stretch-card form_hidden">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Danh sách đơn nhập hàng</h4>
                <p class="card-description">
                  Biểu mẫu nhập sản phẩm vào danh sách đơn hàng
                </p>
                
                {{-- <form action="#" class="forms-sample"> --}}
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loại sản phẩm</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="productType" placeholder="LoaiSP">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="productName" placeholder="TenSp">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Giá</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="price" placeholder="Gia">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Số lượng</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="amount" placeholder="SoLuong">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Đơn vị</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="unit" placeholder="DonVi">
                    </div>
                  </div>
                  {{-- <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input">
                      Remember me
                    </label>
                  </div> --}}
                 
                  <button class="btn btn-primary mr-2"  id="add_value">Thêm</button>
                  <button class="btn btn-light clear">Clear</button>
                {{-- </form> --}}
              </div>
            </div>
          </div>
        <!--End Hide-->
       
        <!--table-->
        <!--Show Card Table-->
        <div class="col-lg-12 grid-margin stretch-card form_default">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Review Table</h4>
              <p class="card-description add_inline_block">
                <code>(*)</code>Bấm vào <b class="text_red">Chi tiết</b> để xem chi tiết sản phẩm | <code>(*)</code>Bấm vào đây để thêm sản phẩm
              </p>
              <div class="table-responsive">
                <table class="table table-hover" id="table">
                  <thead>
                    <tr>
                      <th>Loại sản phẩm </th>
                      <th>Sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn vị</th>
                      <th> </th>
                    </tr>
                  </thead>
                  <tbody id="show_value">
                    <tr>
                      <td>Text1</td>
                      <td>Text SP</td>
                      <td>100 / Text3</td>
                      <td><label class="badge badge-danger">Pending</label></td>
                      <td>    
                        <div class="btn-group" role="group" aria-label="Basic example">
                          {{-- <button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-pencil-alt"></i></button> --}}
                          <button type="button" class="btn btn-outline-secondary btn-icon" onclick ="delete_row_in_table($(this))"><i class="ti-trash"></i></button>
                          {{-- <button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-eye"></i></button> --}}
                        </div>                  
                      </td>
                      <!--Link icon themify {class ti-xx}: https://themify.me/themify-icons-->
                    </tr>  
                  </tbody>
                  <button type="button" class="btn btn-primary mr-2"> Hoàn Tất </button> 
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--end table-->
    </div>
    <!-- content-wrapper ends -->
  </div>
</div>
</div>
@stop()
@section('js')
  <script src="{{asset("../asset_admin/vendors/js/vendor.bundle.base.js")}}"></script>  
  <script src="{{asset("../asset_admin/js/custom/custom_script.js")}}"></script> 
@endsection