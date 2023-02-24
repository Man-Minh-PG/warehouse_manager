@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
 <style>
  .item6 {
    border-radius: 15px;
    background-color: #4747A1;
  }
  span.menu-title.title6{
    color: white !important;
  } 
</style>
@endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      <!--Show Card Table-->
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">History table</h4>
            <p class="card-description add_inline_block">
              <code>(*)</code>Lịch sử hoạt động   
              <button type="button" class="btn btn-outline-info btn-icon-text print_excel">
                Xuất file
                <i class="ti-printer btn-icon-append"></i>
              </button> 
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                  <h6 class="dropdown-header">Sắp xếp</h6>
                  <a class="dropdown-item" href="#">Ngày cập nhật gần đây nhất ↑</a>
                  <a class="dropdown-item" href="#">Ngày cập nhật xa nhất ↓</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
            </p>  
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> Mã thao tác </th>
                    <th> Tài khoản </th>
                    <th> Nội dung </th>
                    <th> Chức năng </th>
                    <th> Ngày cập nhật </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="py-1"> #1212 </td>
                    <td> Herman Beck </td>
                    <td> May 15, 2015!123456789 </td>
                    <td> QL San Pham </td>
                    <td> dd-mm-yyyy </td> 
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--End show-->

    </div>
    <!-- content-wrapper ends -->
  </div>
</div>
<!-- Div dư fix tràn màn hình do cắt layout sai -->
</div>
@stop()
@section('js')
  <script src="{{asset("../asset_admin/vendors/js/vendor.bundle.base.js")}}"></script>  
@endsection