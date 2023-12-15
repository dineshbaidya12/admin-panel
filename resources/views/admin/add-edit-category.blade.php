@extends('admin.layouts.app')
@php
    $res = $isEdit ? 'Modify' : 'Add New';
@endphp
@section('title', $res . ' Category')
@section('pagename', $res . ' Category')
@section('custom-styles')
    <style>
        #form-div {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .profile-picture {
            height: 150px;
            width: 150px;
            margin: auto;
            border-radius: 50%;
            background: transparent;
            position: relative;
            /* overflow: hidden; */
        }

        .profile-picture img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .edit-icon {
            position: absolute;
            top: -10px;
            font-size: 26px;
            right: -8px;
            cursor: pointer;
            padding: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="box">
        <form action="{{ route('category-action') }}" method="POST" enctype="multipart/form-data" name="category_form">
            @csrf
            <input type="hidden" value="{{ $category->id ?? 0 }}" id="isEdit" name="isEdit">
            <div id="form-div">
                <div class="w-full p-4">
                    <div class="profile-picture">
                        @if ($isEdit)
                            <img src="{{ asset('admin/uploads/categories/' . $category->image) }}" alt="Category Image"
                                id="show-profile-picture">
                        @else
                            <img src="{{ asset('admin/images/leebaron/default-image.jpg') }}" alt="Category Image"
                                id="show-profile-picture">
                        @endif

                        <i class="ti ti-pencil edit-icon" id="edit-profile-picture"></i>
                    </div>
                    <input type="file" name="profile_picture" id="profile-picture" onchange="profileChange(this);"
                        accept=".png, .jpg, .jpeg" hidden>
                </div>

                <div class="w-full p-4">
                    <label for="category_name" class="ti-form-label">Category Name:</label>
                    <div class="relative">
                        <input type="text" class="ti-form-input" name="category_name" id="category_name"
                            value="{{ $category->category_name ?? '' }}" required>
                    </div>
                </div>

                <div class="w-full p-4">
                    <label for="category_desc" class="ti-form-label">Category Description:</label>
                    <div class="relative cat_desc">
                        <textarea name="category_desc" class="ti-form-input category_desc" id="category_desc" rows="3" required>{{ $category->category_description ?? '' }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full p-4">
                        <label for="site-title" class="ti-form-label">Status:</label>
                        <div class="grid sm:grid-cols-2 gap-2">
                            <label
                                class="flex p-3 w-full bg-white border border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70">
                                <input type="radio" name="status" class="ti-form-radio" id="hs-radio-in-form"
                                    checked="" value="active" required
                                    @if ($isEdit) {{ $category->status == 'active' ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                                <span class="text-sm text-gray-500 ltr:ml-2 rtl:mr-2 dark:text-white/70">Active</span>
                            </label>
                            <label
                                class="flex p-3 w-full bg-white border border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70">
                                <input type="radio" name="status" class="ti-form-radio" id="hs-radio-checked-in-form"
                                    value="inactive" required
                                    @if ($isEdit) {{ $category->status == 'inactive' ? 'checked' : '' }} @endif>
                                <span class="text-sm text-gray-500 ltr:ml-2 rtl:mr-2 dark:text-white/70">Inactive</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-full p-4">
                        <label for="order_by" class="ti-form-label">Order By:</label>
                        <input type="number" class="ti-form-input" name="order_by" id="order_by"
                            value="{{ $category->order ?? '' }}" required>
                    </div>
                </div>
                <div class="w-full p-4">
                    <input type="button" id="submit-btn" class="ti-btn ti-btn-primary" value="Submit">
                </div>

            </div>
        </form>
    </div>
@endsection

@section('custom-scripts')
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            //ckeditor
            CKEDITOR.replace('category_desc');




        });
        document.getElementById('edit-profile-picture').addEventListener('click', function() {
            document.getElementById('profile-picture').click();
        });
        document.getElementById('show-profile-picture').addEventListener('click', function() {
            document.getElementById('profile-picture').click();
        });

        function profileChange(input) {
            const profilePicImg = document.getElementById('show-profile-picture');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    profilePicImg.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    @if ($isEdit)
        <script>
            $('#submit-btn').on('click', function() {
                var invalidInputs = $('input[required], textarea[required]').filter(function() {
                    return !$(this).val();
                });

                $('input[required], textarea[required]').removeClass('err');

                var data = CKEDITOR.instances.category_desc.getData();
                if (data == '') {
                    $('.cat_desc').css('border', '1px solid red');
                } else {
                    $('.cat_desc').css('border', '');
                }

                if (invalidInputs.length > 0) {
                    event.preventDefault();
                    invalidInputs.addClass('err');
                } else {
                    $('input[required], textarea[required]').removeClass('err');
                    if (data == '') {
                        $('.cat_desc').css('border', '1px solid red');
                    } else {
                        $('.cat_desc').css('border', '');
                        $('form[name="category_form"]').submit();
                    }
                }
            });
        </script>
    @else
        <script>
            $('#submit-btn').on('click', function() {
                var invalidInputs = $('input[required], textarea[required]').filter(function() {
                    return !$(this).val();
                });

                $('input[required], textarea[required]').removeClass('err');

                var data = CKEDITOR.instances.category_desc.getData();
                if (data == '') {
                    $('.cat_desc').css('border', '1px solid red');
                } else {
                    $('.cat_desc').css('border', '');
                }

                if (invalidInputs.length > 0) {
                    event.preventDefault();
                    invalidInputs.addClass('err');
                } else if ($('#profile-picture').val() == '') {
                    $('#show-profile-picture').css('border', '1px solid red');
                } else {
                    $('#show-profile-picture').css('border', '');
                    $('input[required], textarea[required]').removeClass('err');
                    if (data == '') {
                        $('.cat_desc').css('border', '1px solid red');
                    } else {
                        $('.cat_desc').css('border', '');
                        $('form[name="category_form"]').submit();
                    }
                }
            });
        </script>
    @endif

@endsection
