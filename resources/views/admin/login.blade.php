<!DOCTYPE html>
<html lang="en" dir="ltr" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script>
</head>

<body class="authentication-page">
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" class="w-full max-w-md mx-auto p-6">
        <div class="mt-7 bg-white rounded-sm shadow-sm dark:bg-bgdark">
            <div class="p-4 sm:p-7">
                <!-- Form -->
                <form action="{{ route('admin-login') }}" method="POST">
                    @csrf
                    <div>
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                        required />
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                    {{-- <a class="text-sm text-primary decoration-2 hover:underline font-medium"
                                        href="#">Forgot password?</a> --}}
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                        required />
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="flex items-center">
                                <div class="flex">
                                    <input id="remember-me" name="remember-me" type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-primary pointer-events-none focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:checked:bg-primary dark:checked:border-primary dark:focus:ring-offset-white/10" />
                                </div>
                                <div class="ltr:ml-3 rtl:mr-3">
                                    <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <input style="cursor:pointer;" type="submit"
                                class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border border-transparent font-semibold bg-primary text-white over:bg-primary focus:outline-none focus:ring-0 focus:ring-primary focus:ring-offset-0 transition-all text-sm dark:focus:ring-offset-white/10"
                                value="Sign in">
                        </div>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        </div>
    </main>
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Login Failed!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</body>

</html>
