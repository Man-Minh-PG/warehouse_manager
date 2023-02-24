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
      <div class="row">
         <!--Hide -->
         <div class="col-md-12 grid-margin stretch-card form_hidden">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Form</h4>
                <p class="card-description">
                  Edit form layout
                </p>
                
                {{-- <form action="#" class="forms-sample"> --}}
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loại sản phẩm</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="productType" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="productName" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Giá</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="price" placeholder="Mobile number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Số lượng</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="amount" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Đơn vị</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="unit" placeholder="Password">
                    </div>
                  </div>
                  {{-- <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input">
                      Remember me
                    </label>
                  </div> --}}
                  
                  <button class="btn btn-primary mr-2"  id="add_value">Cập nhật</button>
                  <button class="btn btn-light clear">Clear</button>
                {{-- </form> --}}
              </div>
            </div>
          </div>
        <!--End Hide-->
    
    </div>
    <!-- content-wrapper ends -->
  </div>
</div>
</div>
@stop()
@section('js')
  <script src="{{asset("../asset_admin/vendors/js/vendor.bundle.base.js")}}"></script>  
@endsection