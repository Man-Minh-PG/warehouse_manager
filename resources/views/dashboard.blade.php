@extends('layouts/layout_web')
@section('css')
<style src="{{asset("../asset_admin/bootstrap.min.css")}}"></style>
@endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome Aamir</h3>
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div>
                <div>
                    <div class="d-flex">
                    <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                    </div>
                    <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                    </div>
                    </div>  
                </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-12 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">SẢN PHẨM CÒN ÍT</p>
                  <p class="fs-30 mb-2">4006</p>
                  <p>/ Sản phẩm</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">TỔNG SẢN PHẨM Ở KHO</p>
                  <p class="fs-30 mb-2">61344</p>
                  <p>/ Sản phẩm</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">TỔNG SỐ LOẠI SẢN PHẨM</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>/ Sản phẩm</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">XUẤT HÀNG HÔM NAY</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>/ Sản phẩm</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
     
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Advanced Table</p>
             <!-- Example split danger button -->
             <div class="btn-group">
              <button type="button" class="btn btn-danger">Lọc</button>
              <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Sản phẩm còn ít</a>
                <a class="dropdown-item" href="#">Sản phẩm trong kho</a>
                <a class="dropdown-item" href="#">Đã xuất hôm nay</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">..</a>
              </div>
            </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="example" class="display expandable-table" style="width:100%">
                      <thead>
                        <tr>
                          <th>Quote#</th>
                          <th>Product</th>
                          <th>Business type</th>
                          <th>Policy holder</th>
                          <th>Premium</th>
                          <th>Status</th>
                          <th>Updated at</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                      </tr>
                  </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
@endsection()
@section('js')
<script src="{{asset("../asset_admin/jquery-3.2.1.slim.min.js")}}"></script>
<script src="{{asset("../asset_admin/jquery-3.5.1.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
@endsection