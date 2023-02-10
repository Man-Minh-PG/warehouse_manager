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

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Top aligned media</h4>
            <div class="media">
              <i class="ti-world icon-md text-info d-flex align-self-start mr-3"></i>
              <div class="media-body">
                <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Center aligned media</h4>
            <div class="media">
              <i class="ti-world icon-md text-info d-flex align-self-center mr-3"></i>
              <div class="media-body">
                <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bottom aligned media</h4>
            <div class="media">
              <i class="ti-world icon-md text-info d-flex align-self-end mr-3"></i>
              <div class="media-body">
                <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Table-->
      <div class="col-lg-12 grid-margin stretch-card form_default">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sản phẩm trong kho</h4>
            <p class="card-description add_inline_block">
              <code>(*)</code>Tổng sản phẩm hiện tại trong kho là  <b class="text_red">xxx</b> - sản phẩm 
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
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Text1</td>
                    <td>Text SP</td>
                    <td>100 / Text3</td>
                    <td><label class="badge badge-danger">Pending</label></td>
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