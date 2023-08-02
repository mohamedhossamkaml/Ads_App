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
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Bordered Table</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">عنوان الاعلان</th>
                                <th class="border-bottom-0">القسم</th>
                                <th class="border-bottom-0">المنتج</th>
                                <th class="border-bottom-0">تاريخ بداية الاعلان</th>
                                <th class="border-bottom-0">نوع الاعلان</th>
                                <th class="border-bottom-0">المعلن</th>
                                <th class="border-bottom-0">الملاحظات</th>
                                <th class="border-bottom-0">اضافة اشارات</th>
                                <th class="border-bottom-0">عمليات  </th>
                                <th class="border-bottom-0">id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0
                            @endphp
                            @foreach ($adsed as $ad)
                            @php
                                $i++
                            @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $ad->title}}</td>
                                        <td>{{ $ad->category->category_name }}</td>
                                        <td>{{ $ad->products }}</td>
                                        <td>{{ $ad->start_date }}</td>
                                        <td>
                                            @if ($ad->type == 'free')
                                            <samp class=" badge badge-pill badge-danger">{{ $ad->type }}</samp>
                                            @else
                                            <samp class=" badge badge-pill badge-success">{{ $ad->type }}</samp>
                                            @endif
                                        </td>
                                        <td>{{ $ad->advertiser->advertiser_name }}</td>
                                        <td>{{ $ad->description }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-success" data-effect="effect-scale"
                                                href="{{ route('ads.tags', $ad->id) }}" title="add_tags">add tags</a>
                                        </td>
                                        <td>

                                            <a class="modal-effect btn btn-sm btn-info"
                                                href="{{ url('edit_ads') }}/{{ $ad->id }}" title="تعديل"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $ad->id }}" data-title="{{ $ad->title }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                    </td>
                                        <td>{{ $ad->id }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

</div>
<!-- /row -->
    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="ads/destroy" method="post">
                    {{ method_field('delete') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="title" id="title" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
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


<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var title = button.data('title')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #title').val(title);
    })
</script>


{{-- <script>
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            'processing':true,
            'serverSide':true,
            'ajax':"{{ route('get.ads') }}",
            'columns':[

            ]
        })

    })
</script> --}}
@endsection
