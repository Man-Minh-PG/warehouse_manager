@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
 <style>
  .item5 {
    border-radius: 15px;
    background-color: #4747A1;
  }
  span.menu-title.title5{
    color: white !important;
  } 
  
  .solution_cards_box.card1 .solution_card.card1 {
    background: #a7b1e9;
    color: #fff;
    transform: scale(1.1);
    z-index: 9;
  }
</style>
 @endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      <!--Show Card Table-->

       <!--Kho-->
       <div class="col-md-4 grid-margin stretch-card">
        <div class="card solution_cards_box">
          <div class="card-body solution_card">
            <h4 class="card-title">Kho</h4>
            <div class="media">
              <i class="ti-world icon-md text-info d-flex align-self-start mr-3"></i>
              <div class="media-body">
                <p class="card-text">Quản lý các tác vụ liên quan đến nhập sản phẩm vào kho hàng.</p>
                <p class="card-text"><i class="ti-arrow-circle-right"></i><a class="a_custom" href="{{Route('admin.warehouse')}}"> Đến trang quản lý</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Kho--> 

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card solution_cards_box card1">
          <div class="card-body solution_card card1">
            <h4 class="card-title">Nhập Kho</h4>
            <div class="media">
              <i class="ti-world icon-md text-info d-flex align-self-start mr-3"></i>
              <div class="media-body">
                <p class="card-text">Quản lý các tác vụ liên quan đến nhập sản phẩm vào kho hàng.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card solution_cards_box">
          <div class="card-body solution_card">
            <h4 class="card-title">Xuất Kho</h4>
            <div class="media">
              <i class="ti-world icon-md text-info d-flex align-self-start mr-3"></i>
              <div class="media-body">
                <p class="card-text">Quản lý các tác vụ liên quan đến nhập sản phẩm vào kho hàng.</p>
                <p class="card-text"><i class="ti-arrow-circle-right"></i><a class="a_custom" href="{{Route("admin.warehouse.export_product")}}"> Đến trang quản lý</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      
      <!--Table-->
      <div class="col-lg-12 grid-margin stretch-card form_default">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách hoạt động nhập hàng</h4>
            <p class="card-description add_inline_block">
                {{-- <code>(*)</code>Bấm vào <b class="text_red">Chi tiết</b> để xem chi tiết sản phẩm | <code>(*)</code>Bấm vào đây để thêm sản phẩm --}}
                {{-- <a href="{{Route("admin.product.create")}}" class="btn btn-light custom_small_radius_button">Thêm</a> --}}
                <div class="dropdown add_inline">
                  <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc sản phẩm
                  </button>
                  <button class="btn btn-green-400 btn-sm" type="button">
                    Tạo đơn nhập hàng
                  </button>
                  <button type="button" class="btn btn-outline-info btn-icon-text print_excel">
                    Nhập file
                    <i class="ti-upload btn-icon-append"></i>
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
                    <th>Thời gian nhập hàng gần nhất</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Text1</td>
                    <td>Text SP</td>
                    <td>100 / Text3</td>
                    <td><label class="badge badge-danger">Pending</label></td>
                    <td>dd-mm-yyyy h-m-s</td>
                    <td>    
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-secondary btn-icon"><i class="ti-import"></i></button>
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
      <!--End Table-->
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