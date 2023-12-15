@extends('admin.layouts.app')
@section('title', 'Change Profile')
@section('pagename', 'Profile')
@section('custom-styles')
    <style>
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

        .p-eye {
            position: absolute;
            cursor: pointer;
            top: 1px;
            right: 1px;
            font-size: 21px;
            padding: 12px;
        }
    </style>
@endsection
@section('content')
    <div class="box">
        <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mx-auto" style="width: 50%;">
                <div class="box-body">
                    <div class="profile-picture">
                        @if ($user->profile_pic == '')
                            <img src="{{ asset('admin/images/leebaron/default-user.png') }}" alt="Admin Profile Picture"
                                id="show-profile-picture">
                        @else
                            <img src="{{ asset('admin/uploads/profile_pictures/' . $user->profile_pic) }}"
                                alt="Admin Profile Picture" id="show-profile-picture">
                        @endif

                        <i class="ti ti-pencil edit-icon" id="edit-profile-picture"></i>
                    </div>
                    <input type="file" name="profile_picture" id="profile-picture" onchange="profileChange(this);"
                        accept=".png, .jpg, .jpeg" hidden>
                </div>

                <div class="flex space-x-4">
                    <div class="w-1/2 p-4">
                        <label for="first-name" class="ti-form-label">First name:</label>
                        <div class="relative">
                            <input type="text" id="first-name" name="first_name"
                                class="ti-form-input ltr:pl-5 rtl:pr-11 focus:z-10" value="{{ $user->first_name ?? '' }}"
                                required>
                        </div>
                    </div>
                    <div class="w-1/2 p-4">
                        <label for="last-name" class="ti-form-label">Last Name:</label>
                        <div class="relative">
                            <input type="text" id="last-name" name="last_name"
                                class="ti-form-input ltr:pl-5 rtl:pr-11 focus:z-10" value="{{ $user->last_name ?? '' }}"
                                required>
                        </div>
                    </div>
                </div>

                <div class="w-full p-4">
                    <label for="site-title" class="ti-form-label">Email:</label>
                    <div class="relative">
                        <input type="email" name="email" class="ti-form-input" id="email"
                            value="{{ $user->email ?? '' }}" required>
                    </div>
                </div>

                <div class="w-full p-4">
                    <label for="site-title" class="ti-form-label">Password:</label>
                    <div class="relative">
                        <input type="password" name="password" class="ti-form-input" id="password"
                            style="padding-right:42px;" value="{{ $user->plain_pass ?? '' }}" required>
                        <i class="ti ti-eye-off password-eye-close p-eye" onclick="passShow()"></i>
                        <i class="ti ti-eye password-eye p-eye hidden" onclick="passShow()"></i>
                    </div>
                </div>
                <div class="w-full p-4">
                    <input type="submit" class="ti-btn ti-btn-primary" value="Save">
                </div>



            </div>
        </form>
    </div>

@endsection

@section('custom-scripts')
    <script>
        function passShow() {
            let password = document.getElementById("password");
            let eye1 = document.querySelector('.password-eye-close');
            let eye2 = document.querySelector('.password-eye');
            if (password.type === "text") {
                password.type = "password";
                eye2.classList.add('hidden');
                eye1.classList.remove('hidden');
            } else {
                password.type = "text";
                eye1.classList.add('hidden');
                eye2.classList.remove('hidden');
            }
        }

        document.getElementById('edit-profile-picture').addEventListener('click', function() {
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

        // document.querySelector('#show-profile-picture').addEventListener('click', function() {
        //     notifier.success('This Is An Example Of Success')
        // })
    </script>

@endsection
