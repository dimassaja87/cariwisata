@extends('admin.main')
@section('content')
    <!doctype html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
        data-sidebar-image="none" data-preloader="disable">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- Text Editor --}}
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/quill/quill.core.css') }}"
            rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/quill/quill.bubble.css') }}"
            rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/quill/quill.snow.css') }}"
            rel="stylesheet" type="text/css" />

        <!-- Layout config Js -->
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/css/bootstrap.min.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/css/icons.min.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/css/app.min.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- custom Css-->
        <link href="{{ asset('admin/themesbrand.com/velzon/html/default/assets/css/custom.min.css') }}" rel="stylesheet"
            type="text/css" />

        <!-- include libraries(jQuery, bootstrap) -->

        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- removeNotificationModal -->
            <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="NotificationModalbtn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                    It!</button>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- ========== App Menu ========== -->

            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Detail Wisata</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Wisata</a>
                                            </li>
                                            <li class="breadcrumb-item active">Tambah Detail Wisata</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <section>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Tambah Detail Wisata</h5>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="card-body">
                                                <form action="/insertdetailwisata" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Nama
                                                            Kota</label>
                                                        <select class="form-select form-control" aria-label="Default select example"
                                                            name="id_kota" required>
                                                            <option selected>Tidak ada yang dipilih</option>
                                                            @foreach ($kotadetail as $hm)
                                                                <option value="{{ $hm->id }}">{{ $hm->nama_kota }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">Masukkan nama kota.</div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date-field" class="form-label">Nama Wisata</label>
                                                        <input type="text" id="date-field" name="wisata"
                                                            class="form-control" placeholder="Masukkan nama wisata"
                                                            required />
                                                        <div class="invalid-feedback">Nama wisata</div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date-field" class="form-label">Foto</label>
                                                        <input type="file" id="date-field" name="foto"
                                                            class="form-control" accept="image/*"
                                                            placeholder="Select Photo" required />
                                                        <div class="invalid-feedback">Pilih Foto.</div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Deskripsi
                                                            Wisata</label>
                                                        <textarea id="summernote" name="detail_wisata" class="summernote form-control" height=""
                                                            placeholder="Masukkan detail wisata" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="/detailwisata" type="button"
                                                                class="btn btn-light">Close</a>
                                                            <button type="submit" class="btn btn-success"
                                                                id="edit-btn">Tambah
                                                                Detail Wisata</button>
                                                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        </form>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        </div>
        <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->

        <!-- JAVASCRIPT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <!-- DataTablesScript -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
        <!-- JAVASCRIPT -->
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
        </script>
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/feather-icons/feather.min.js') }}">
        </script>
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/js/pages/plugins/lord-icon-2.1.0.js') }}">
        </script>
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/js/plugins.js') }}"></script>

        <!-- ckeditor -->
        <script
            src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}">
        </script>

        <!-- quill js -->
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/libs/quill/quill.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/js/pages/form-editor.init.js') }}"></script>

        <script src="{{ asset('admin/themesbrand.com/velzon/html/default/assets/js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    </body>


    <!-- Mirrored from wrappixel.com/demos/admin-templates/materialart/html/ltr/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Jan 2023 14:20:10 GMT -->

    </html>
@endsection
