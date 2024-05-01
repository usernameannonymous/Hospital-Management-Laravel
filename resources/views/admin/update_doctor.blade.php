<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            height: 50px;
        }
    </style>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">

            <h1 style="height: 100px;">Add Doctor</h1>
            <div class="container">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Doctor Name</label>
                        <input type="text" value="{{$data->name}}" name="name" id="" style="color:blue;margin-left:50px">
                    </div>

                    <div>
                        <label>Phone No</label>
                        <input type="number" value="{{$data->phone}}" name="phone" id="" placeholder="9999988888" style="color:blue;margin-left:50px">
                    </div>

                    <div>
                        <label>Specality</label>
                        <select name="specality" id="" style="margin-left:50px">
                            <option>{{$data->specality}}</option>
                            <option value="Heart">Heart</option>
                            <option value="Skin">Skin</option>
                            <option value="Eye">Eye</option>
                            <option value="Kidney">Kidney</option>
                            <option value="Brain">Brain</option>
                        </select>
                    </div>

                    <div>
                        <label>Room No</label>
                        <input type="text" value="{{$data->room}}" name="room" id="" placeholder="Room No" style="color:blue;margin-left:50px">
                    </div>

                    <div>
                        <label>Doctor Images</label>
                        <img height="150px" width="150px" src="/doctorimage/{{$data->image}}" alt="">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <!-- main-panel ends -->

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>