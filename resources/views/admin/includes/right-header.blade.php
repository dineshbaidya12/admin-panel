<div class="header-right">
    <div class="responsive-headernav">
        <div class="header-nav-right">
            {{-- <div class="header-search">
                <button aria-label="button" type="button" data-hs-overlay="#search-modal"
                    class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                    <i class="ri-search-2-line header-icon"></i>
                </button>
            </div> --}}
            <div class="header-theme-mode hidden sm:block">
                <a aria-label="anchor"
                    class="hs-dark-mode-active:hidden flex hs-dark-mode group flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                    href="javascript:;" data-hs-theme-click-value="dark">
                    <i class="ri-moon-line header-icon"></i>
                </a>
                <a aria-label="anchor"
                    class="hs-dark-mode-active:flex hidden hs-dark-mode group flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                    href="javascript:;" data-hs-theme-click-value="light">
                    <i class="ri-sun-line header-icon"></i>
                </a>
            </div>
            {{-- <div class="header-fullscreen hidden lg:block">
                <a aria-label="anchor" href="javascript:void(0);" onclick="openFullscreen();"
                    class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                    <i class="ri-fullscreen-line header-icon full-screen-open"></i>
                    <i class="ri-fullscreen-line header-icon fullscreen-exit-line full-screen-close hidden"></i>
                </a>
            </div> --}}

            <div class="header-notification hs-dropdown ti-dropdown hidden sm:block"
                data-hs-dropdown-placement="bottom-right">
                <button id="dropdown-notification" type="button"
                    class="hs-dropdown-toggle ti-dropdown-toggle p-0 border-0 flex-shrink-0 h-[2.375rem] w-[2.375rem] rounded-full shadow-none focus:ring-gray-400 text-xs dark:focus:ring-white/10">
                    <i class="ri-notification-2-line header-icon animate-bell"></i>
                    <span class="flex absolute h-5 w-5 top-0 ltr:right-0 rtl:left-0 -mt-1 ltr:-mr-1 rtl:-ml-1">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success/80 opacity-75"></span>
                        <span
                            class="relative inline-flex rounded-full h-5 w-5 bg-success text-white justify-center items-center"
                            id="notify-data">4</span>
                    </span>
                </button>
                <div class="hs-dropdown-menu ti-dropdown-menu w-[20rem] border-0"
                    aria-labelledby="dropdown-notification">
                    <div
                        class="ti-dropdown-header !bg-primary border-b dark:border-white/10 flex justify-between items-center">
                        <p class="ti-dropdown-header-title !text-white font-semibold">
                            Notifications
                        </p>
                        <a href="javascript:void(0)" class="badge bg-black/20 text-white rounded-sm">Mark All Read</a>
                    </div>
                    <div class="ti-dropdown-divider divide-y divide-gray-200 dark:divide-white/10">
                        <div class="py-2 first:pt-0 last:pb-0" id="allNotifyContainer">
                            <div class="ti-dropdown-item relative header-box">
                                <a href="mail-inbox.html" class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="ltr:mr-2 rtl:ml-2 avatar rounded-full ring-0">
                                        <img src="{{ asset('admin/images/users/20.jpg') }}" alt="img"
                                            class="rounded-sm" />
                                    </div>
                                    <div class="relative w-full">
                                        <h5 class="text-sm text-gray-800 dark:text-white font-semibold mb-1">
                                            Elon Isk
                                        </h5>
                                        <p class="text-xs mb-1 max-w-[200px] truncate">
                                            Hello there! How are you doing? Call me
                                            when...
                                        </p>
                                        <p class="text-xs text-gray-400 dark:text-white/70">
                                            2 min
                                        </p>
                                    </div>
                                </a>
                                <a aria-label="anchor" href="javascript:void(0);"
                                    class="header-remove-btn ltr:ml-auto rtl:mr-auto text-lg text-gray-500/20 dark:text-white/20 hover:text-gray-800 dark:hover:text-white">
                                    <i class="ri-close-circle-line"></i>
                                </a>
                            </div>
                            <div class="ti-dropdown-item relative header-box">
                                <a href="mail-inbox.html" class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <div class="ltr:mr-2 rtl:ml-2 avatar rounded-full ring-0">
                                        <img src="{{ asset('admin/images/users/20.jpg') }}" alt="img"
                                            class="rounded-sm" />
                                    </div>
                                    <div class="relative w-full">
                                        <h5 class="text-sm text-gray-800 dark:text-white font-semibold mb-1">
                                            Shakira Sen
                                        </h5>
                                        <p class="text-xs mb-1 max-w-[200px] truncate">
                                            I would like to discuss about that assets...
                                        </p>
                                        <p class="text-xs text-gray-400 dark:text-white/70">
                                            09:43
                                        </p>
                                    </div>
                                </a>
                                <a aria-label="anchor" href="javascript:void(0);"
                                    class="header-remove-btn ltr:ml-auto rtl:mr-auto text-lg text-gray-500/20 dark:text-white/20 hover:text-gray-800 dark:hover:text-white">
                                    <i class="ri-close-circle-line"></i>
                                </a>
                            </div>
                            <div class="ti-dropdown-item relative header-box">
                                <a href="mail-inbox.html" class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <div class="ltr:mr-2 rtl:ml-2 avatar rounded-full ring-0">
                                        <img src="{{ asset('admin/images/users/20.jpg') }}" alt="img"
                                            class="rounded-sm" />
                                    </div>
                                    <div class="relative w-full">
                                        <h5 class="text-sm text-gray-800 dark:text-white font-semibold mb-1">
                                            Sebastian
                                        </h5>
                                        <p class="text-xs mb-1 max-w-[200px] truncate">
                                            Shall we go to the cafe at downtown...
                                        </p>
                                        <p class="text-xs text-gray-400 dark:text-white/70">
                                            yesterday
                                        </p>
                                    </div>
                                </a>
                                <a aria-label="anchor" href="javascript:void(0);"
                                    class="header-remove-btn ltr:ml-auto rtl:mr-auto text-lg text-gray-500/20 dark:text-white/20 hover:text-gray-800 dark:hover:text-white">
                                    <i class="ri-close-circle-line"></i>
                                </a>
                            </div>
                            <div class="ti-dropdown-item relative header-box">
                                <a href="mail-inbox.html" class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <div class="ltr:mr-2 rtl:ml-2 avatar rounded-full ring-0">
                                        <img src="{{ asset('admin/images/users/20.jpg') }}" alt="img"
                                            class="rounded-sm" />
                                    </div>
                                    <div class="relative w-full">
                                        <h5 class="text-sm text-gray-800 dark:text-white font-semibold mb-1">
                                            Charlie Davieson
                                        </h5>
                                        <p class="text-xs mb-1 max-w-[200px] truncate">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </p>
                                        <p class="text-xs text-gray-400 dark:text-white/70">
                                            yesterday
                                        </p>
                                    </div>
                                </a>
                                <a aria-label="anchor" href="javascript:void(0);"
                                    class="header-remove-btn ltr:ml-auto rtl:mr-auto text-lg text-gray-500/20 dark:text-white/20 hover:text-gray-800 dark:hover:text-white">
                                    <i class="ri-close-circle-line"></i>
                                </a>
                            </div>
                        </div>
                        <div class="py-2 first:pt-0 px-5">
                            <a class="w-full ti-btn ti-btn-primary p-2" href="mail-inbox.html">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (auth()->check())
                @php
                    $user = auth()->user();
                @endphp
            @endif

            <div class="header-profile hs-dropdown ti-dropdown" data-hs-dropdown-placement="bottom-right">
                <button id="dropdown-profile" type="button"
                    class="hs-dropdown-toggle ti-dropdown-toggle gap-2 p-0 flex-shrink-0 h-8 w-8 rounded-full shadow-none focus:ring-gray-400 text-xs dark:focus:ring-white/10">
                    <img class="inline-block rounded-full ring-2 ring-white dark:ring-white/10"
                        src="{{ $user->profile_pic == '' ? asset('admin/images/leebaron/default-user.png') : asset('admin/uploads/profile_pictures/' . $user->profile_pic) }}"
                        alt="Image Description" />
                </button>

                <div class="hs-dropdown-menu ti-dropdown-menu border-0 w-[20rem]" aria-labelledby="dropdown-profile">
                    <div class="ti-dropdown-header !bg-primary flex">
                        <div class="ltr:mr-3 rtl:ml-3">
                            <img class="avatar shadow-none rounded-full !ring-transparent"
                                src="{{ $user->profile_pic == '' ? asset('admin/images/leebaron/default-user.png') : asset('admin/uploads/profile_pictures/' . $user->profile_pic) }}"
                                alt="profile-img" />
                        </div>
                        <div>
                            <p class="ti-dropdown-header-title !text-white">
                                {{ $user->name }}
                            </p>
                            <p class="ti-dropdown-header-content !text-white/50">
                                {{ ucfirst($user->type) }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 ti-dropdown-divider">
                        <a href="{{ route('profile') }}" class="ti-dropdown-item">
                            <i class="ti ti-user-circle text-lg"></i>
                            Profile
                        </a>

                        <a href="{{ route('logout') }}" class="ti-dropdown-item">
                            <i class="ti ti-logout text-lg"></i>
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
            <div class="switcher-icon">
                <button aria-label="button" type="button"
                    class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus-visible:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                    data-hs-overlay="#hs-overlay-switcher">
                    <i class="ri-settings-5-line header-icon animate-spin"></i>
                </button>
            </div>
        </div>
    </div>
</div>
