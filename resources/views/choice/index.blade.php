@extends('layouts.master')

@section('css')


@endsection

@section('page-name')
    صفحة الأسئلة
@endsection


@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <!--end::Header-->
        <!--begin::Body-->

        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">

                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">احصائيات الأسئلة</span>
                            <span class="text-muted mt-1 fw-bold fs-7">{{\App\Models\Choice::where('questionId' , $question->id)->count()}} عدد الخيارات الكلي </span>
                        </h3>

                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="أضف سؤال جديد">
                            <a class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_hotel">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                                <!--end::Svg Icon-->أضف خيار جديد </a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

                                <!--begin::Actions-->
                                <div class="d-flex mb-4">
                                    <div id="kt_content_container" class="container-xxl">
                                        <!--begin::Modal - New Target-->
                                        <div class="modal fade" id="kt_modal_new_hotel" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content rounded">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                                        <!--begin::Close-->
                                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--begin::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                        <!--begin:Form-->
                                                        <div class="form-group">
                                                            <form id="kt_modal_new_hotel_form" class="form" enctype="multipart/form-data" action="{{ route('choice.store') }}" method="POST">
                                                                @csrf
                                                                <!--begin::Heading-->

                                                                <div class="mb-13 text-center">
                                                                    <!--begin::Title-->
                                                                    <h1 class="mb-3">أضف خيار جديد</h1>
                                                                    <!--end::Title-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                {{--                                                                //TODO: Store image--}}

                                                                <div>
                                                                    <div class="mb-13 text-center">
                                                                        <!--begin::Title-->
                                                                        <h1 class="mb-3">أضف صورة الاختيار</h1>
                                                                        <!--end::Title-->
                                                                    </div>
                                                                    <!--begin::Input group-->
                                                                    <div class="d-flex flex-column mb-8 fv-row">
                                                                        <!--begin::Label-->
                                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                            <span class="required">صورة الاختيار</span>
                                                                        </label>
                                                                        <!--end::Label-->

                                                                        <label>
                                                                            <input required class="form-control-file" type="file" id="img" name="img">
                                                                        </label>
                                                                    </div>
                                                                    <!--end::Input group-->

                                                                    <!--begin::Input group-->
                                                                    <div class="d-flex flex-column mb-8 fv-row">
                                                                        <!--begin::Label-->
                                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                            <span class="required">نص الاختيار</span>
                                                                        </label>
                                                                        <!--end::Label-->

                                                                        <label>
                                                                            <input type="text" class="form-control form-control-solid" placeholder="ادخل نص الاختيار" name="description">
                                                                        </label>
                                                                    </div>
                                                                    <!--end::Input group-->

                                                                    <!--begin::Input group-->
                                                                    <div class="row g-9 mb-8">
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="required fs-6 fw-bold mb-2">هل هو الجواب الصحيح؟</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="أختر قسم السؤال" name="typeId">

                                                                                    <option value=0>لا</option>
                                                                                    <option value=1>نعم</option>
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Col-->

                                                                        <input type="hidden" value="{{$question->id}}" name="questionId">
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Actions-->
                                                                    <div class="text-center">
                                                                        {{--  <button type="reset" href="/hotel" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>--}}
                                                                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                                                            <span class="indicator-label">Submit</span>
                                                                            <span class="indicator-progress">Please wait...
															            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                        </button>
                                                                    </div>
                                                                    <!--end::Actions-->
                                                            </form>
                                                        </div>
                                                        <!--end:Form-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Head-->
                        </div>
                        <!--end::Wrapper-->
                    </div>

                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 min-w-100px rounded-start">#</th>
                        <th class="ps-4 min-w-auto me-auto">صورة</th>
                        <th class="ps-4 min-w-100px rounded-start">نص الاختباربة</th>
                        <th class="ps-4 min-w-auto me-auto">جواب صحيح؟</th>
                        <th class="ps-4 min-w-auto me-auto">الأوامر</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    @foreach($chocies as $choice)

                        <tbody>
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <output class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$loop->iteration}}</output>
                                </div>
                            </td>

                            {{--                            //TODO: add Image question--}}
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <output class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$choice->desciption}}</output>
                                    {{--                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>--}}
                                </div>
                            </td>
                            <td>
                                <output class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$question->istrue}}</OUTPUT>
                                {{--                        <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>--}}
                            </td>
                            <td class="text-end">
                                <div class="form-group">
                                    <form method="POST" action="{{route('choice.destroy' , $choice->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <div class = "form-group">
                                            <input type ="submit"  class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-14" value="الحذف">
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
    </div>

@endsection

@section('scripts')

@endsection
