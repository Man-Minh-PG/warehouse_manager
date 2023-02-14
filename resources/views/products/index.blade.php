@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
@endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <!--Show Card Table-->
        <div class="col-lg-12 grid-margin stretch-card form_default">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Product Table</h4>
              <p class="card-description add_inline_block">
                <code>(*)</code>Bấm vào <b class="text_red">Chi tiết</b> để xem chi tiết sản phẩm | <code>(*)</code>Bấm vào đây để thêm sản phẩm
                <a href="{{Route("admin.product.create")}}" class="btn btn-light custom_small_radius_button">Thêm</a>
                <div class="dropdown add_inline">
                  <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc sản phẩm
                  </button>
                  <button type="button" class="btn btn-outline-info btn-icon-text print_excel">
                    Nhập file
                    <i class="ti-import btn-icon-append"></i>
                  </button> 
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                    <h6 class="dropdown-header">Tiêu chí</h6>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
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
                      <th>Loại sản phẩm </th>
                      <th>Sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Trạng thái</th>
                      <th>Ngày tạo</th>
                      <th>Lần cập nhật gần nhất</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Text1</td>
                      <td>Text SP</td>
                      <td>100 / Text3</td>
                      <td><label class="badge badge-danger">Pending</label></td>
                      <td>dd-mm-yyyy</br> h-m-s</td>
                      <td>dd-mm-yyyy</br> h-m-s</td>
                      <td>    
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-pencil-alt"></i></button>
                          <button onclick ="delete_row_in_table($(this))" type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-trash"></i></button>
                          <button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-eye"></i></button>
                        </div>                  
                      </td>
                      <!--Link icon themify {class ti-xx}: https://themify.me/themify-icons-->
                    </tr>  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
      </div>
      <!--End show-->

    </div>
    <!-- content-wrapper ends -->
  </div>
</div>
@stop()
@section('js')
  <script src="{{asset("../asset_admin/vendors/js/vendor.bundle.base.js")}}"></script>  
  <script src="{{asset("../asset_admin/js/custom/custom_script.js")}}"></script>
@endsection