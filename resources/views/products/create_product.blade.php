@extends('layouts/layout_web')
@section('css')
 <!--Add icon dropdown-->
 <link rel="stylesheet" href="{{asset("../asset_admin/vendors/ti-icons/css/themify-icons.css")}}">
@endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        {{-- <div class="alert alert-success">
          <strong>Success!</strong> Indicates a successful or positive action.
        </div>  --}}
         <!--Hide -->
         <div class="col-md-12 grid-margin stretch-card form_hidden">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Horizontal Form</h4>
                <p class="card-description">
                  Horizontal form layout
                </p>
                <form class="forms-sample">
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Loại sản phẩm</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Giá</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Số lượng</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Đơn vị</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                    </div>
                  </div>
                  {{-- <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input">
                      Remember me
                    </label>
                  </div> --}}
                  <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                  <button class="btn btn-light">Clear</button>
                </form>
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