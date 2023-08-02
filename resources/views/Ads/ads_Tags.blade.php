@extends('layouts.master')
@section('title')
الاعلانات - قائمة الاعلانات
@stop

@section('css')
<!-- Internal Data table css -->
<!-- Internal Data tables -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

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
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعلانات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الاعلانات</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
			<!-- Container closed -->
		<!-- main-content closed -->
@endsection
@section('content')

<div class="row row-sm">

    <!--div-->
    <div class="col-xl-12">
        <div class="card ">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Bordered Table</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table center-aligned-table mb-0 table-hover"
                        style="text-align:center">
                        <thead>
                            <tr class="text-dark">
                                <th>ID</th>
                                <th>عنوان الاعلان</th>
                                <th>القسم</th>
                                <th>الحالة </th>
                                <th>المستخدم</th>
                                <th>الاشارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($ads as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $x->id }}</td>
                                    <td>{{ $x->title }}</td>
                                    <td>{{ $x->category->category_name }}</td>
                                    @if ($x->type == 'free')
                                        <td><span
                                                class="badge badge-pill badge-danger">{{ $x->type }}</span>
                                        </td>
                                    @else
                                        <td><span
                                                class="badge badge-pill badge-success">{{ $x->type }}</span>
                                        </td>
                                    @endif
                                    <td>{{ $x->user->name }}</td>
                                    <td>
                                        @foreach ($tags as $tg)
                                            <span class="badge badge-pill badge-success">
                                                {{ $tg->tags_name }}
                                            </span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <form action="{{ route('add/adstags') }}" method="post" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            @foreach ($ads as $x)
                            <input type="hidden" name="id"  value="{{ $x->id }}">
                            <label for="recipient-name"  class="col-form-label"> عنوان الاعلان:</label>
                                <input class="form-control"readonly placeholder="{{ $x->title }}" id="title" type="text">
                            @endforeach
                        </div>
                        <div class="form-group">
                        <div class="col">
                            <label for="inputName" class="control-label">الاشارات</label>
                            <select multiple="multiple" class="testselect2" name="tags_id[]">
                                @foreach ($tag as $ta)
                                    <option value="{{ $ta->id }}"> {{ $ta->tags_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

</div>
<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

        <!-- Internal Select2 js-->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <!--Internal Fileuploads js-->
        <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
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


@endsection
