<header class="page-header sticky-top">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <a class="me-4 d-lg-inline-flex d-none menu-toggle" href="#" title="Sidebar Toggle">
                <svg width="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill="var(--accent-color)"
                        d="M14.7071 7.29289C15.0976 7.68342 15.0976 8.31658 14.7071 8.70711L12.4142 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H12.4142L14.7071 15.2929C15.0976 15.6834 15.0976 16.3166 14.7071 16.7071C14.3166 17.0976 13.6834 17.0976 13.2929 16.7071L9.29289 12.7071C8.90237 12.3166 8.90237 11.6834 9.29289 11.2929L13.2929 7.29289C13.6834 6.90237 14.3166 6.90237 14.7071 7.29289Z" />
                    <path fill="var(--accent-color)" fill-opacity="0.3"
                        d="M4 3C4.55228 3 5 3.44772 5 4V20C5 20.5523 4.55228 21 4 21C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3Z" />
                </svg>
            </a>
            <a class="me-4 d-lg-none d-inline-flex text-decoration-none text-accent align-items-center"
                href="{{ route('home') }}">
                <span class="fs-4 ps-2 d-none d-sm-inline-flex">Consultify</span>
            </a>
            <!-- Example single danger button -->
            <ul class="header-menu flex-grow-1">
                <li class="dropdown d-none d-lg-inline-block">
                    <a class="dropdown-toggle text-white fullscreen" href="javascript:void(0);"
                        onclick="toggleFullScreen()">
                        <svg width="20" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-opacity="0.4"
                                d="M10 0.5C10 0.367392 10.0527 0.240215 10.1464 0.146447C10.2402 0.0526784 10.3674 0 10.5 0L14.5 0C14.8978 0 15.2794 0.158035 15.5607 0.43934C15.842 0.720644 16 1.10218 16 1.5V5.5C16 5.63261 15.9473 5.75979 15.8536 5.85355C15.7598 5.94732 15.6326 6 15.5 6C15.3674 6 15.2402 5.94732 15.1464 5.85355C15.0527 5.75979 15 5.63261 15 5.5V1.5C15 1.36739 14.9473 1.24021 14.8536 1.14645C14.7598 1.05268 14.6326 1 14.5 1H10.5C10.3674 1 10.2402 0.947322 10.1464 0.853553C10.0527 0.759785 10 0.632608 10 0.5ZM0.5 10C0.632608 10 0.759785 10.0527 0.853553 10.1464C0.947322 10.2402 1 10.3674 1 10.5V14.5C1 14.6326 1.05268 14.7598 1.14645 14.8536C1.24021 14.9473 1.36739 15 1.5 15H5.5C5.63261 15 5.75979 15.0527 5.85355 15.1464C5.94732 15.2402 6 15.3674 6 15.5C6 15.6326 5.94732 15.7598 5.85355 15.8536C5.75979 15.9473 5.63261 16 5.5 16H1.5C1.10218 16 0.720644 15.842 0.43934 15.5607C0.158035 15.2794 0 14.8978 0 14.5L0 10.5C0 10.3674 0.0526784 10.2402 0.146447 10.1464C0.240215 10.0527 0.367392 10 0.5 10ZM15.5 10C15.6326 10 15.7598 10.0527 15.8536 10.1464C15.9473 10.2402 16 10.3674 16 10.5V14.5C16 14.8978 15.842 15.2794 15.5607 15.5607C15.2794 15.842 14.8978 16 14.5 16H10.5C10.3674 16 10.2402 15.9473 10.1464 15.8536C10.0527 15.7598 10 15.6326 10 15.5C10 15.3674 10.0527 15.2402 10.1464 15.1464C10.2402 15.0527 10.3674 15 10.5 15H14.5C14.6326 15 14.7598 14.9473 14.8536 14.8536C14.9473 14.7598 15 14.6326 15 14.5V10.5C15 10.3674 15.0527 10.2402 15.1464 10.1464C15.2402 10.0527 15.3674 10 15.5 10Z" />
                            <path fill-opacity="0.9"
                                d="M1.14645 1.14645C1.24021 1.05268 1.36739 1 1.5 1H5.5C5.63261 1 5.75979 0.947322 5.85355 0.853553C5.94732 0.759785 6 0.632608 6 0.5C6 0.367392 5.94732 0.240215 5.85355 0.146447C5.75979 0.0526784 5.63261 0 5.5 0H1.5C1.10218 0 0.720644 0.158035 0.43934 0.43934C0.158035 0.720644 0 1.10218 0 1.5V5.5C0 5.63261 0.0526784 5.75979 0.146447 5.85355C0.240215 5.94732 0.367392 6 0.5 6C0.632608 6 0.759785 5.94732 0.853553 5.85355C0.947322 5.75979 1 5.63261 1 5.5V1.5C1 1.36739 1.05268 1.24021 1.14645 1.14645Z" />
                            <rect fill-opacity="0.9" x="3" y="5" width="11" height="6"
                                rx="1" />
                        </svg>
                    </a>
                </li>
                <!--[ Start:: notification ]-->
                <li class="dropdown">
                    <a class="dropdown-toggle text-white" href="#NotificationsDiv" onclick="Livewire.emit('showNotifications')" role="button"
                        data-bs-toggle="offcanvas" aria-expanded="false">
                        <span class="notification-blink bullet-dot bg-accent animation-blink" style="display: none;"></span>
                        <svg width="20" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            {{-- <circle opacity="0.3" cx="11" cy="11" r="4" /> --}}
                            <path
                                d="M9 18C9.59674 18 10.169 17.7629 10.591 17.341C11.0129 16.919 11.25 16.3467 11.25 15.75H6.75C6.75 16.3467 6.98705 16.919 7.40901 17.341C7.83097 17.7629 8.40326 18 9 18ZM9 2.15775L8.10337 2.33888C7.08633 2.5461 6.17212 3.09837 5.51548 3.9022C4.85884 4.70603 4.50011 5.71206 4.5 6.75C4.5 7.4565 4.34925 9.22162 3.98362 10.9597C3.80362 11.8226 3.56063 12.7215 3.23775 13.5H14.7622C14.4394 12.7215 14.1975 11.8237 14.0164 10.9597C13.6507 9.22162 13.5 7.4565 13.5 6.75C13.4996 5.71225 13.1408 4.70649 12.4842 3.90289C11.8275 3.09929 10.9135 2.54719 9.89662 2.34L9 2.15663V2.15775ZM15.9975 13.5C16.2484 14.0029 16.5386 14.4011 16.875 14.625H1.125C1.46137 14.4011 1.75162 14.0029 2.0025 13.5C3.015 11.475 3.375 7.74 3.375 6.75C3.375 4.0275 5.31 1.755 7.88063 1.23637C7.86492 1.07995 7.88218 0.921967 7.93129 0.77262C7.98039 0.623273 8.06026 0.485876 8.16573 0.36929C8.27119 0.252705 8.39993 0.159519 8.54362 0.0957427C8.68732 0.0319665 8.84279 -0.000984192 9 -0.000984192C9.15721 -0.000984192 9.31268 0.0319665 9.45638 0.0957427C9.60007 0.159519 9.72881 0.252705 9.83428 0.36929C9.93974 0.485876 10.0196 0.623273 10.0687 0.77262C10.1178 0.921967 10.1351 1.07995 10.1194 1.23637C11.3909 1.49501 12.534 2.18516 13.3551 3.18994C14.1762 4.19472 14.6248 5.4524 14.625 6.75C14.625 7.74 14.985 11.475 15.9975 13.5Z" />
                        </svg>
                    </a>
                </li>
                <!--[ Start:: user detail ]-->
                <!--[ Start:: user detail ]-->
                <li class="dropdown user">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" title="User">
                        <img class="avatar sm rounded-circle shadow border border-2"
                            src="{{ asset('assets/img/profile_av.png') }}" alt="avatar">
                        <span class="ps-1 fs-6 text-white d-none d-lg-inline-block">{{ $authUser->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-4 rounded-4">
                        <li class="mb-3">
                            <a class="h5" href="/" title="">{{ $authUser->name }}</a>
                            <p>{{ $authUser->email }}</p>
                            <a class="btn bg-dark text-white w-100" href="{{ route('logout') }}"
                                role="button">Logout</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        @auth('web')
                            @if ($authUser->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.profileUpdate') }}">Update Profile</a></li>
                            @endif
                        @endauth
                    </ul>
                </li>
                <li class="dropdown d-block d-lg-none">
                    <button class="btn btn-sm btn-white sidebar-toggle ms-3" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</header>
@livewire('dashboard.booking.notification')
