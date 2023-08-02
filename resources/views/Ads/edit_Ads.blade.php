@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل اعلان
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اعلانات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                تعديل اعلان </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('ads/update') }}" method="post" enctype="multipart/form-data"  autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">عنوان الاعلان</label>
                                <input type="hidden" name="id" id="id" value="{{ $ads->id }}">
                                <input type="text" class="form-control" id="inputName" name="title"
                                    value="{{ $ads->title }}" title="يرجي ادخال عنوان الاعلان " required>
                            </div>

                            <div class="col">
                                <label>تاريخ بداية الاعلان</label>
                                <input class="form-control fc-datepicker" name="start_date" placeholder="YYYY-MM-DD"
                                value="{{ $ads->start_date }}" type="text" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الحالة</label>
                                <select name="type" class="form-control SlectBox">
                                    <option value="{{ $ads->type }}" selected  disabled> {{ $ads->type }} </option>
                                    <option value="free">free</option>
                                    <option value="paid"> paid</option>
                                </select>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">القسم</label>
                                <select name="category_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="{{ $ads->category->id }}" selected disabled>
                                        {{ $ads->category->category_name }}
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">المنتج</label>
                                <select id="products" name="products" class="form-control">
                                    <option value="{{ $ads->products }}">
                                        {{ $ads->products }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">المعلن</label>
                                <select class="form-control SlectBox" name="advertiser_id">
                                    <!--placeholder-->
                                    <option value="{{ $ads->advertiser->advertiser_id }}" selected disabled>
                                        {{ $ads->advertiser->advertiser_name }}
                                    </option>
                                    @foreach ($advertiser as $x)
                                        <option value="{{ $x->id }}"> {{ $x->advertiser_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="description" rows="3">{{ $ads->description }}</textarea>
                            </div>
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>

    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var CategoryId = $(this).val();
                if (CategoryId) {
                    $.ajax({
                        url: "{{ URL::to('categorys') }}/" + CategoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="products"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="products"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>
@endsection
