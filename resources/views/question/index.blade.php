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
                            <span class="text-muted mt-1 fw-bold fs-7">{{\App\Models\Question::count()}} عدد الأسئلة الكلي </span>
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
                                <!--end::Svg Icon-->أضف سؤال جديد </a>
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
                                                            <form id="kt_modal_new_hotel_form" class="form" action="{{ route('question.store') }}" method="POST">

                                                                @csrf
                                                                <!--begin::Heading-->

                                                                <div class="mb-13 text-center">
                                                                    <!--begin::Title-->
                                                                    <h1 class="mb-3">أضف سؤال جديد</h1>
                                                                    <!--end::Title-->
                                                                </div>
                                                                <!--end::Heading-->
{{--                                                                //TODO: Store image--}}
                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-8 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                        <span class="required">نص السؤال</span>
                                                                    </label>
                                                                    <!--end::Label-->

                                                                    <label>
                                                                        <input type="text" class="form-control form-control-solid" placeholder="ادخل نص السؤال" name="title">
                                                                    </label>
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Input group-->
                                                                <div class="row g-9 mb-8">
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6 fv-row">
                                                                        <label class="required fs-6 fw-bold mb-2">فسم</label>
                                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="أختر قسم السؤال" name="typeId">

                                                                            @foreach(\App\Models\Type::all() as $type)
                                                                                <option value={{$type->id}}>{{$type->name}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                    <!--end::Col-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-md-6 fv-row">
                                                                        <label class="required fs-6 fw-bold mb-2">صنف السؤال</label>
                                                                        <!--begin::Input-->
                                                                        <div class="position-relative d-flex align-items-center">
                                                                            <!--begin::Icon-->
                                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
																		<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
																		<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
																	</svg>
																</span>
                                                                            <!--Begin::Input-->
                                                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="أختر صنف السؤال" name="category">
                                                                                <option value="">هذا السؤال غير تابع لاي صنف</option>
                                                                                <option value="أ">أ</option>
                                                                                <option value="أب">أب</option>
                                                                                <option value="أب">ب</option>
                                                                            </select>

                                                                            <!--end::Input-->
                                                                        </div>

                                                                    </div>
                                                                    <!--end::Col-->
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
                        <th class="ps-4 min-w-100px rounded-start">نص السؤال</th>
                        <th class="ps-4 min-w-auto me-auto">الصنف</th>
                        <th class="ps-4 min-w-auto me-auto">القسم</th>
                        <th class="ps-4 min-w-auto me-auto">الأوامر</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    @foreach($questions as $question)

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
                                    <output class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$question->title}}</output>
                                    {{--                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>--}}
                                </div>
                            </td>
                            <td>
                                <output class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$question->category}}</OUTPUT>
                                {{--                        <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>--}}
                            </td>
                            <td>
                                <output class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$question->getRelation('type')->name}}</OUTPUT>
                                {{--                        <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>--}}
                            </td>
                            <td class="text-end">
                                <div class="form-group">
                                    <form method="POST" action="{{route('question.destroy' , $question->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <div class = "form-group">
                                            <input type ="submit"  class="btn btn-bg-light btn-color-muted btn-active-color-danger btn-sm px-4 me-14" value="الحذف">
                                        </div>
                                    </form>
                                    <a href="{{route('question.edit' , $question->id)}}" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-19 btn-edit">التعديل</a>
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
