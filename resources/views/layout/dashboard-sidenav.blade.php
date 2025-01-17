<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dashboard | Nexus Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- App favicon -->
    <link
      rel="shortcut icon"
      href="{{asset('back-end/assets/icons/favicon.svg')}}"
      type="image/x-icon"
    />

    <!-- Bootstrap Css -->
    <link
      href="{{asset('back-end/assets/css/bootstrap.min.css')}}"
      id="bootstrap-style"
      rel="stylesheet"
      type="text/css"
    />

    <!-- Fontawesome link -->
    <link href="{{asset('back-end/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- CSS Link-->
    <link
      href="{{asset('back-end/assets/css/navbar-sidebar.css')}}"
      id="app-style"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{asset('back-end/assets/css/style.css')}}"
      id="app-style"
      rel="stylesheet"
      type="text/css"
    />
    <link href="{{asset('back-end/assets/css/modals.css')}}" rel="stylesheet" />
    <link href="{{asset('back-end/assets/css/finance-popup-modal.css')}}" rel="stylesheet" />
    {{-- <link rel="stylesheet" type="text/css" href="print.css" media="print" /> --}}
    <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-end/assets/css/progress.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-end/assets/css/animate.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/config.js') }}"></script>
  </head>

  <body>
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>


 <!-- Navbar Start -->
 <nav id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
          <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
              <img
                src="{{asset('back-end/assets/icons/nexus-pos-logo.svg')}}"
                alt=""
                width="38"
                height="38"
              />
            </span>
          </a>
        </div>

        <button
          type="button"
          class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
        >
          <i class="fa-solid fa-bars-staggered"></i>
        </button>

        <!-- navbar searchbar -->
        <div class="search-bar-box d-flex align-items-center">
          <input type="text" placeholder="Search..." />
          <button class="nav-src-btn">
            <svg
              width="22"
              height="22"
              viewBox="0 0 27 27"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M19.2967 16.9811H18.0695L17.6449 16.5566C19.1578 14.8045 20.0686 12.5274 20.0686 10.0343C20.0686 4.49228 15.5763 0 10.0343 0C4.49228 0 0 4.49228 0 10.0343C0 15.5763 4.49228 20.0686 10.0343 20.0686C12.5274 20.0686 14.8045 19.1578 16.5566 17.6527L16.9811 18.0772V19.2967L24.6998 27L27 24.6998L19.2967 16.9811ZM10.0343 16.9811C6.19811 16.9811 3.08748 13.8705 3.08748 10.0343C3.08748 6.19811 6.19811 3.08748 10.0343 3.08748C13.8705 3.08748 16.9811 6.19811 16.9811 10.0343C16.9811 13.8705 13.8705 16.9811 10.0343 16.9811Z"
                fill="#192045"
              />
            </svg>
          </button>
        </div>
        <!-- end navbar searchbar -->
      </div>

      <div class="d-flex align-items-center">
        <button
          class="light-mode-button"
          aria-label="Toggle Light Mode"
          onclick="toggle_light_mode()"
        >
          <span></span>
          <span></span>
        </button>

        <div class="dropdown d-inline-block">
          <button
            type="button"
            class="btn header-item search-icon"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <svg
              width="25"
              height="25"
              viewBox="0 0 27 27"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M19.2967 16.9811H18.0695L17.6449 16.5566C19.1578 14.8045 20.0686 12.5274 20.0686 10.0343C20.0686 4.49228 15.5763 0 10.0343 0C4.49228 0 0 4.49228 0 10.0343C0 15.5763 4.49228 20.0686 10.0343 20.0686C12.5274 20.0686 14.8045 19.1578 16.5566 17.6527L16.9811 18.0772V19.2967L24.6998 27L27 24.6998L19.2967 16.9811ZM10.0343 16.9811C6.19811 16.9811 3.08748 13.8705 3.08748 10.0343C3.08748 6.19811 6.19811 3.08748 10.0343 3.08748C13.8705 3.08748 16.9811 6.19811 16.9811 10.0343C16.9811 13.8705 13.8705 16.9811 10.0343 16.9811Z"
                fill="#192045"
              />
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
            <form class="p-2">
              <div class="search-box">
                <div class="position-relative">
                  <input
                    type="text"
                    class="form-control rounded border-0"
                    placeholder="Search..."
                  />
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex align-items-center toggle-full-screen">
          <button
            class="js-toggle-fullscreen-btn toggle-fullscreen-btn"
            aria-label="Enter fullscreen mode"
            hidden
          >
            <svg
              width="27"
              height="27"
              class="toggle-fullscreen-svg"
              viewBox="0 0 30 30"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g class="icon-fullscreen-enter">
                <path
                  d="M2 7.5H0V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H7.5V2H2V7.5Z"
                  fill="#192045"
                />
                <path
                  d="M30 7.5H28V2H22.5V0H27C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V7.5Z"
                  fill="#192045"
                />
                <path
                  d="M7.5 30H3C2.20435 30 1.44129 29.6839 0.87868 29.1213C0.31607 28.5587 0 27.7956 0 27V22.5H2V28H7.5V30Z"
                  fill="#192045"
                />
                <path
                  d="M27 30H22.5V28H28V22.5H30V27C30 27.7956 29.6839 28.5587 29.1213 29.1213C28.5587 29.6839 27.7956 30 27 30Z"
                  fill="#192045"
                />
                <path
                  d="M9.00052 10.5C8.80311 10.5011 8.60742 10.4633 8.42466 10.3887C8.24191 10.314 8.07568 10.204 7.93552 10.065L6.43552 8.565C6.15307 8.28255 5.99438 7.89946 5.99438 7.5C5.99438 7.10055 6.15307 6.71746 6.43552 6.435C6.71798 6.15255 7.10107 5.99387 7.50052 5.99387C7.89998 5.99387 8.28307 6.15255 8.56552 6.435L10.0655 7.935C10.2061 8.07445 10.3177 8.24035 10.3939 8.42314C10.47 8.60593 10.5092 8.80199 10.5092 9C10.5092 9.19802 10.47 9.39408 10.3939 9.57687C10.3177 9.75966 10.2061 9.92556 10.0655 10.065C9.92536 10.204 9.75914 10.314 9.57638 10.3887C9.39363 10.4633 9.19793 10.5011 9.00052 10.5Z"
                  fill="#192045"
                />
                <path
                  d="M20.9995 10.5C20.8021 10.5011 20.6064 10.4633 20.4237 10.3887C20.2409 10.314 20.0747 10.204 19.9345 10.065C19.7939 9.92556 19.6824 9.75966 19.6062 9.57687C19.5301 9.39408 19.4908 9.19802 19.4908 9C19.4908 8.80199 19.5301 8.60593 19.6062 8.42314C19.6824 8.24035 19.7939 8.07445 19.9345 7.935L21.4345 6.435C21.717 6.15255 22.1001 5.99387 22.4995 5.99387C22.899 5.99387 23.2821 6.15255 23.5645 6.435C23.847 6.71746 24.0057 7.10055 24.0057 7.5C24.0057 7.89946 23.847 8.28255 23.5645 8.565L22.0645 10.065C21.9244 10.204 21.7582 10.314 21.5754 10.3887C21.3926 10.4633 21.197 10.5011 20.9995 10.5Z"
                  fill="#192045"
                />
                <path
                  d="M7.49991 24C7.3025 24.0011 7.10681 23.9633 6.92405 23.8887C6.74129 23.814 6.57507 23.704 6.43491 23.565C6.29432 23.4256 6.18272 23.2597 6.10657 23.0769C6.03042 22.8941 5.99121 22.698 5.99121 22.5C5.99121 22.302 6.03042 22.1059 6.10657 21.9231C6.18272 21.7403 6.29432 21.5744 6.43491 21.435L7.93491 19.935C8.21736 19.6525 8.60046 19.4939 8.99991 19.4939C9.39936 19.4939 9.78245 19.6525 10.0649 19.935C10.3474 20.2175 10.506 20.6006 10.506 21C10.506 21.3995 10.3474 21.7825 10.0649 22.065L8.56491 23.565C8.42475 23.704 8.25852 23.814 8.07577 23.8887C7.89301 23.9633 7.69732 24.0011 7.49991 24Z"
                  fill="#192045"
                />
                <path
                  d="M22.5 24C22.3026 24.0011 22.1069 23.9633 21.9242 23.8887C21.7414 23.814 21.5752 23.704 21.435 23.565L19.935 22.065C19.6526 21.7825 19.4939 21.3995 19.4939 21C19.4939 20.8022 19.5329 20.6064 19.6085 20.4236C19.6842 20.2409 19.7952 20.0749 19.935 19.935C20.0749 19.7951 20.2409 19.6842 20.4237 19.6085C20.6064 19.5328 20.8022 19.4939 21 19.4939C21.3995 19.4939 21.7826 19.6525 22.065 19.935L23.565 21.435C23.7056 21.5744 23.8172 21.7403 23.8934 21.9231C23.9695 22.1059 24.0087 22.302 24.0087 22.5C24.0087 22.698 23.9695 22.8941 23.8934 23.0769C23.8172 23.2597 23.7056 23.4256 23.565 23.565C23.4249 23.704 23.2587 23.814 23.0759 23.8887C22.8931 23.9633 22.6974 24.0011 22.5 24Z"
                  fill="#192045"
                />
              </g>
              <g class="icon-fullscreen-leave">
                <path
                  d="M9.00052 10.5C8.80311 10.5011 8.60742 10.4633 8.42466 10.3887C8.24191 10.314 8.07568 10.204 7.93552 10.065L6.43552 8.565C6.15307 8.28255 5.99438 7.89946 5.99438 7.5C5.99438 7.10055 6.15307 6.71746 6.43552 6.435C6.71798 6.15255 7.10107 5.99387 7.50052 5.99387C7.89998 5.99387 8.28307 6.15255 8.56552 6.435L10.0655 7.935C10.2061 8.07445 10.3177 8.24035 10.3939 8.42314C10.47 8.60593 10.5092 8.80199 10.5092 9C10.5092 9.19802 10.47 9.39408 10.3939 9.57687C10.3177 9.75966 10.2061 9.92556 10.0655 10.065C9.92536 10.204 9.75914 10.314 9.57638 10.3887C9.39363 10.4633 9.19793 10.5011 9.00052 10.5Z"
                  fill="#192045"
                />
                <path
                  d="M20.9995 10.5C20.8021 10.5011 20.6064 10.4633 20.4237 10.3887C20.2409 10.314 20.0747 10.204 19.9345 10.065C19.7939 9.92556 19.6824 9.75966 19.6062 9.57687C19.5301 9.39408 19.4908 9.19802 19.4908 9C19.4908 8.80199 19.5301 8.60593 19.6062 8.42314C19.6824 8.24035 19.7939 8.07445 19.9345 7.935L21.4345 6.435C21.717 6.15255 22.1001 5.99387 22.4995 5.99387C22.899 5.99387 23.2821 6.15255 23.5645 6.435C23.847 6.71746 24.0057 7.10055 24.0057 7.5C24.0057 7.89946 23.847 8.28255 23.5645 8.565L22.0645 10.065C21.9244 10.204 21.7582 10.314 21.5754 10.3887C21.3926 10.4633 21.197 10.5011 20.9995 10.5Z"
                  fill="#192045"
                />
                <path
                  d="M7.49991 24C7.3025 24.0011 7.10681 23.9633 6.92405 23.8887C6.74129 23.814 6.57507 23.704 6.43491 23.565C6.29432 23.4256 6.18272 23.2597 6.10657 23.0769C6.03042 22.8941 5.99121 22.698 5.99121 22.5C5.99121 22.302 6.03042 22.1059 6.10657 21.9231C6.18272 21.7403 6.29432 21.5744 6.43491 21.435L7.93491 19.935C8.21736 19.6525 8.60046 19.4939 8.99991 19.4939C9.39936 19.4939 9.78245 19.6525 10.0649 19.935C10.3474 20.2175 10.506 20.6006 10.506 21C10.506 21.3995 10.3474 21.7825 10.0649 22.065L8.56491 23.565C8.42475 23.704 8.25852 23.814 8.07577 23.8887C7.89301 23.9633 7.69732 24.0011 7.49991 24Z"
                  fill="#192045"
                />
                <path
                  d="M22.5 24C22.3026 24.0011 22.1069 23.9633 21.9242 23.8887C21.7414 23.814 21.5752 23.704 21.435 23.565L19.935 22.065C19.6526 21.7825 19.4939 21.3995 19.4939 21C19.4939 20.8022 19.5329 20.6064 19.6085 20.4236C19.6842 20.2409 19.7952 20.0749 19.935 19.935C20.0749 19.7951 20.2409 19.6842 20.4237 19.6085C20.6064 19.5328 20.8022 19.4939 21 19.4939C21.3995 19.4939 21.7826 19.6525 22.065 19.935L23.565 21.435C23.7056 21.5744 23.8172 21.7403 23.8934 21.9231C23.9695 22.1059 24.0087 22.302 24.0087 22.5C24.0087 22.698 23.9695 22.8941 23.8934 23.0769C23.8172 23.2597 23.7056 23.4256 23.565 23.565C23.4249 23.704 23.2587 23.814 23.0759 23.8887C22.8931 23.9633 22.6974 24.0011 22.5 24Z"
                  fill="#192045"
                />
              </g>
            </svg>
          </button>
        </div>

        <div class="dropdown d-inline-block">
          <button
            type="button"
            class="btn header-item noti-icon right-bar-toggle notification-icon"
            id="right-bar-toggle-v"
          >
            <svg
              class="topbar-setting"
              width="30"
              height="30"
              viewBox="0 0 32 32"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M15.9998 20.6154C18.7551 20.6154 20.9888 18.549 20.9888 16C20.9888 13.451 18.7551 11.3846 15.9998 11.3846C13.2444 11.3846 11.0108 13.451 11.0108 16C11.0108 18.549 13.2444 20.6154 15.9998 20.6154Z"
                stroke="#192045"
                stroke-width="1.5"
                stroke-miterlimit="10"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M30.6649 9.49923L29.4176 7.50077C28.7291 6.39654 27.2037 6.01923 26.0101 6.65615L25.3541 7.00692C22.8596 8.33846 19.7415 6.67346 19.7415 4.00923V3.30769C19.7415 2.03269 18.6252 1 17.247 1H14.7525C13.3743 1 12.258 2.03269 12.258 3.30769V4.00923C12.258 6.67346 9.13986 8.33962 6.64537 7.00692L5.98931 6.65615C4.7957 6.01923 3.27031 6.39654 2.58183 7.50077L1.33459 9.49923C0.646106 10.6035 1.05396 12.0146 2.24757 12.6515L2.90362 13.0023C5.39812 14.335 5.39812 17.665 2.90362 18.9977L2.24757 19.3485C1.05396 19.9854 0.646106 21.3965 1.33459 22.5008L2.58183 24.4992C3.27031 25.6035 4.7957 25.9808 5.98931 25.3438L6.64537 24.9931C9.13986 23.6604 12.258 25.3265 12.258 27.9908V28.6923C12.258 29.9673 13.3743 31 14.7525 31H17.247C18.6252 31 19.7415 29.9673 19.7415 28.6923V27.9908C19.7415 25.3265 22.8596 23.6604 25.3541 24.9931L26.0101 25.3438C27.2037 25.9808 28.7291 25.6035 29.4176 24.4992L30.6649 22.5008C31.3533 21.3965 30.9455 19.9854 29.7519 19.3485L29.0958 18.9977C26.6013 17.665 26.6013 14.335 29.0958 13.0023L29.7519 12.6515C30.9455 12.0146 31.3546 10.6035 30.6649 9.49923Z"
                stroke="#192045"
                stroke-width="1.5"
                stroke-miterlimit="10"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>

        <div class="dropdown d-inline-block language-switch">
          <button
            type="button"
            class="btn header-item language-switch-icon"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <svg
              width="30"
              height="30"
              viewBox="0 0 30 30"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M15 0C6.72937 0 0 6.72937 0 15C0 23.2706 6.72937 30 15 30C23.2706 30 30 23.2706 30 15C30 6.72937 23.2706 0 15 0ZM16.25 1.30938V2.86625L14.1163 5H13.3837L10.4206 2.03687C11.8538 1.52875 13.3944 1.25 15 1.25C15.4219 1.25 15.8381 1.27188 16.25 1.30938ZM1.25 15C1.25 11.9625 2.24187 9.15312 3.91625 6.875H9.11625L10.625 8.38375V10.9913L8.49125 13.125L10.3663 15L9.11625 16.25H4.7025L6.4525 20.625H11.875V24.1162L8.75 27.2412C4.3025 24.9612 1.25 20.3319 1.25 15ZM15 28.75C13.2238 28.75 11.5269 28.4075 9.96688 27.7919L13.125 24.6338V19.375H7.29813L6.54813 17.5H9.63438L12.1344 15L10.2594 13.125L11.8756 11.5087V7.86625L9.63375 5.625H4.95438C6.14437 4.35063 7.5725 3.3025 9.16813 2.55188L12.8663 6.25H14.6337L17.5 3.38375V1.48188C19.1644 1.78875 20.7256 2.39313 22.1231 3.2425L17.5 7.86625V13.125H20.625V20.2588L24.8969 24.5306C22.3944 27.1287 18.8838 28.75 15 28.75ZM25.7244 23.5906L21.875 19.7412V11.875H18.75V8.38375L23.1787 3.955C26.5569 6.4625 28.75 10.4794 28.75 15C28.75 18.2488 27.615 21.235 25.7244 23.5906Z"
                fill="#192045"
              />
            </svg>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <a
              href="javascript:void(0);"
              class="dropdown-item notify-item language"
              data-lang="eng"
            >
              <img
                src="{{asset('back-end/assets/img/flags/us.jpg')}}"
                alt="user-image"
                class="me-1"
                height="12"
              />
              <span class="align-middle">English</span>
            </a>

            <!-- item-->
            <a
              href="javascript:void(0);"
              class="dropdown-item notify-item language"
              data-lang="sp"
            >
              <img
                src="{{asset('back-end/assets/img/flags/spain.jpg')}}"
                alt="user-image"
                class="me-1"
                height="12"
              />
              <span class="align-middle">Spanish</span>
            </a>

            <!-- item-->
            <a
              href="javascript:void(0);"
              class="dropdown-item notify-item language"
              data-lang="gr"
            >
              <img
                src="{{asset('back-end/assets/img/flags/germany.jpg')}}"
                alt="user-image"
                class="me-1"
                height="12"
              />
              <span class="align-middle">German</span>
            </a>

            <!-- item-->
            <a
              href="javascript:void(0);"
              class="dropdown-item notify-item language"
              data-lang="it"
            >
              <img
                src="{{asset('back-end/assets/img/flags/italy.jpg')}}"
                alt="user-image"
                class="me-1"
                height="12"
              />
              <span class="align-middle">Italian</span>
            </a>

            <!-- item-->
            <a
              href="javascript:void(0);"
              class="dropdown-item notify-item language"
              data-lang="ru"
            >
              <img
                src="{{asset('back-end/assets/img/flags/russia.jpg')}}"
                alt="user-image"
                class="me-1"
                height="12"
              />
              <span class="align-middle">Russian</span>
            </a>
          </div>
        </div>

        <div class="dropdown d-inline-block">
          <button
            type="button"
            class="btn header-item noti-icon"
            id="page-header-notifications-dropdown-v"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <svg
              width="26"
              height="26"
              viewBox="0 0 26 26"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M9.45455 3.4881C6.04947 4.61889 3.63669 7.33014 3.63653 10.5164V16.7253L0.375499 19.3629C0.144442 19.5409 0 19.7945 0 20.0759V20.2035C0 21.2802 1.05824 22.153 2.36364 22.153H8.30287C8.56913 24.0982 10.5705 25.6098 13 25.6098C15.4295 25.6098 17.4309 24.0982 17.6971 22.153H23.6364C24.9418 22.153 26 21.2802 26 20.2035V20.0761C26.0001 19.7947 25.8557 19.541 25.6245 19.3629L22.3638 16.7256V10.5167C22.3637 7.33036 19.9507 4.61872 16.5455 3.48799V2.43688C16.5455 1.16681 15.3593 0.540947 14.8932 0.348687C14.2864 0.0983808 13.6138 0 13 0C12.3862 0 11.7136 0.0983808 11.1068 0.348687C10.6407 0.540947 9.45455 1.16681 9.45455 2.43688V3.4881ZM14.0955 2.92425C14.0894 2.94107 14.083 2.95765 14.0764 2.97398C13.723 2.94113 13.364 2.92425 13.0001 2.92425C12.6362 2.92425 12.2771 2.94114 11.9237 2.97401C11.917 2.95767 11.9106 2.94108 11.9045 2.92425H11.8182V2.43688C11.8182 2.16773 12.3468 1.9495 13 1.9495C13.6532 1.9495 14.1818 2.16773 14.1818 2.43688V2.92425H14.0955ZM15.3025 22.153H10.6975C10.9403 23.0167 11.879 23.6603 13 23.6603C14.121 23.6603 15.0597 23.0167 15.3025 22.153ZM6.00016 10.5164C6.00035 7.41792 9.11241 4.87375 13.0001 4.87375C16.8879 4.87375 20 7.41792 20.0001 10.5164H6.00016ZM6.00016 10.5164H20.0001V16.7256C20.0001 17.2493 20.2555 17.7509 20.7089 18.1175L23.288 20.2035H2.71208L5.6376 17.8373C5.86065 17.6605 6.00016 17.4119 6.00016 17.1347V10.5164Z"
                fill="#192045"
              />
            </svg>

            <span class="noti-dot"></span>
          </button>
          <div
            class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 page-header-notifications-dropdown-v"
            aria-labelledby="page-header-notifications-dropdown-v"
          >
            <div class="p-3">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="m-0 font-size-15">Notifications</h5>
                </div>
                <div class="col-auto">
                  <a
                    href="#!"
                    class="small fw-semibold text-decoration-underline"
                  >
                    Mark all as read</a
                  >
                </div>
              </div>
            </div>
            <div data-simplebar style="max-height: 250px">
              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <img
                      src="{{asset('back-end/assets/img/navbar-profile-logo.png')}}"
                      class="rounded-circle avatar-sm"
                      alt="user-pic"
                    />
                  </div>
                  <div class="flex-grow-1">
                    <p class="text-muted font-size-13 mb-0 float-end">
                      1 hour ago
                    </p>
                    <h6 class="mb-1">James Lemire</h6>
                    <div>
                      <p class="mb-0">
                        It will seem like simplified English.
                      </p>
                    </div>
                  </div>
                </div>
              </a>
              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 avatar-sm me-3">
                    <span
                      class="avatar-title bg-primary rounded-circle font-size-18"
                    >
                      <i class="fa-regular fa-user"></i>
                    </span>
                  </div>
                  <div class="flex-grow-1">
                    <p class="text-muted font-size-13 mb-0 float-end">
                      3 min ago
                    </p>
                    <h6 class="mb-1">Your order is placed</h6>
                    <div>
                      <p class="mb-0">
                        If several languages coalesce the grammar
                      </p>
                    </div>
                  </div>
                </div>
              </a>
              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 avatar-sm me-3">
                    <span
                      class="avatar-title bg-success rounded-circle font-size-18"
                    >
                      <i class="fa-regular fa-user"></i>
                    </span>
                  </div>
                  <div class="flex-grow-1">
                    <p class="text-muted font-size-13 mb-0 float-end">
                      8 min ago
                    </p>
                    <h6 class="mb-1">Your item is shipped</h6>
                    <div>
                      <p class="mb-0">
                        If several languages coalesce the grammar
                      </p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <img
                      src="{{asset('back-end/assets/img/navbar-profile-logo.png')}}"
                      class="rounded-circle avatar-sm"
                      alt="user-pic"
                    />
                  </div>
                  <div class="flex-grow-1">
                    <p class="text-muted font-size-13 mb-0 float-end">
                      1 hour ago
                    </p>
                    <h6 class="mb-1">Salena Layfield</h6>
                    <div>
                      <p class="mb-1">
                        As a skeptical Cambridge friend of mine occidental.
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="p-2 border-top d-grid">
              <a
                class="btn btn-sm btn-link font-size-14 btn-block text-center"
                href="javascript:void(0)"
              >
                <i class="uil-arrow-circle-right me-1"></i>
                <span>View More..</span>
              </a>
            </div>
          </div>
        </div>

        <div class="dropdown d-inline-block">
          <button
            type="button"
            class="btn header-item user text-start d-flex align-items-center"
            id="page-header-user-dropdown-v"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <img
              class="rounded-circle header-profile-user"
              src="{{asset('back-end/assets/img/navbar-profile-logo.png')}}"
              alt="Header Avatar"
            />
          </button>
          <div class="dropdown-menu dropdown-menu-end pt-0 profile-dropdown">
            <div class="p-3 border-bottom">
              <h6 class="mb-0">Martin Gurley</h6>
              <a href="# " class="mb-0 font-size-11 text-muted">
                martin.gurley@email.com
              </a>
            </div>
            <a class="dropdown-item" href="contacts-profile.html"
              ><i
                class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"
              ></i>
              <span class="align-middle">Profile</span></a
            >
            <a class="dropdown-item" href="apps-chat.html"
              ><i
                class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"
              ></i>
              <span class="align-middle">Messages</span></a
            >
            <a class="dropdown-item" href="pages-faqs.html"
              ><i
                class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"
              ></i>
              <span class="align-middle">Help</span></a
            >
            <a class="dropdown-item d-flex align-items-center" href="#"
              ><i
                class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"
              ></i>
              <span class="align-middle me-3">Settings</span
              ><span class="badge badge-soft-success ms-auto">New</span></a
            >
            <a class="dropdown-item" href="auth-lock-screen.html"
              ><i
                class="mdi mdi-lock text-muted font-size-16 align-middle me-2"
              ></i>
              <span class="align-middle">Lock screen</span></a
            >
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" onclick="userlogout(event)">
                <i class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i>
                <span class="align-middle">Logout</span>
            </a>


          </div>
        </div>
      </div>
    </div>
  </nav>

  <nav class="ishorizontal-topbar topnav"></nav>
  <!-- Navbar End -->

  <!-- Right Sidebar setting Start -->
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <div class="rightbar-title d-flex align-items-center bg-dark p-3">
        <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

        <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
          <i class="mdi mdi-close noti-icon"></i>
        </a>
      </div>
      <!-- Settings -->
      <hr class="m-0" />

      <div class="p-4">
        <h6 class="mt-4 mb-3">Layout Mode</h6>

        <div class="form-check form-check-inline">
          <input
            class="form-check-input"
            type="radio"
            name="layout-mode"
            id="layout-mode-light"
            value="light"
          />
          <label class="form-check-label" for="layout-mode-light"
            >Light</label
          >
        </div>

        <div class="form-check form-check-inline">
          <input
            class="form-check-input"
            type="radio"
            name="layout-mode"
            id="layout-mode-dark"
            value="dark"
          />
          <label class="form-check-label" for="layout-mode-dark">Dark</label>
        </div>

        <h6 class="mt-4 mb-3">Topbar Type</h6>

        <div class="form-check form-check-inline">
          <input
            class="form-check-input"
            type="radio"
            name="topbar-color"
            id="topbar-color-light"
            value="light"
            onchange="document.body.setAttribute('data-topbar', 'light')"
          />
          <label class="form-check-label" for="topbar-color-light"
            >Light</label
          >
        </div>
        <div class="form-check form-check-inline">
          <input
            class="form-check-input"
            type="radio"
            name="topbar-color"
            id="topbar-color-dark"
            value="dark"
            onchange="document.body.setAttribute('data-topbar', 'dark')"
          />
          <label class="form-check-label" for="topbar-color-dark">Dark</label>
        </div>

        <div id="sidebar-setting">
          <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Size</h6>

          <div class="form-check sidebar-setting mt-2">
            <input
              class="form-check-input"
              type="radio"
              name="sidebar-size"
              id="sidebar-size-default"
              value="default"
              onchange="document.body.setAttribute('data-sidebar-size', 'lg')"
            />
            <label class="form-check-label" for="sidebar-size-default"
              >Default</label
            >
          </div>
          <div class="form-check sidebar-setting mt-2">
            <input
              class="form-check-input"
              type="radio"
              name="sidebar-size"
              id="sidebar-size-compact"
              value="compact"
              onchange="document.body.setAttribute('data-sidebar-size', 'md')"
            />
            <label class="form-check-label" for="sidebar-size-compact"
              >Compact</label
            >
          </div>
          <div class="form-check sidebar-setting mt-2">
            <input
              class="form-check-input"
              type="radio"
              name="sidebar-size"
              id="sidebar-size-small"
              value="small"
              onchange="document.body.setAttribute('data-sidebar-size', 'sm')"
            />
            <label class="form-check-label" for="sidebar-size-small"
              >Small (Icon View)</label
            >
          </div>

          <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Color</h6>

          <div class="form-check sidebar-setting mt-2">
            <input
              class="form-check-input"
              type="radio"
              name="sidebar-color"
              id="sidebar-color-light"
              value="light"
              onchange="document.body.setAttribute('data-sidebar', 'light')"
            />
            <label class="form-check-label" for="sidebar-color-light"
              >Light</label
            >
          </div>
          <div class="form-check sidebar-setting mt-2">
            <input
              class="form-check-input"
              type="radio"
              name="sidebar-color"
              id="sidebar-color-dark"
              value="dark"
              onchange="document.body.setAttribute('data-sidebar', 'dark')"
            />
            <label class="form-check-label" for="sidebar-color-dark"
              >Dark</label
            >
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Right Sidebar setting End  -->

  <!-- Right Sidebar bar overlay-->
  <div class="rightbar-overlay"></div>
  <!-- Navbar End -->

  <!-- Left Sidebar Start -->
  <div class="vertical-menu">
    <button
      type="button"
      class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn vertical-menu-btn2"
    >
      <i class="fa-solid fa-angles-right"></i>
    </button>
    <!-- LOGO Box -->
    <div class="navbar-brand-box">
      <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
          <img
            src="{{asset('back-end/assets/icons/nexus-pos-logo.svg')}}"
            alt=""
            width="38"
            height="38"
          />
        </span>
        <span class="logo-sm2">
          <img src="{{asset('back-end/assets/icons/nexus-pos-logo.svg')}}" alt="" />
        </span>
        <span class="logo-lg">
          <img src="{{asset('back-end/assets/icons/nexus-pos-logo.svg')}}" alt="" />
          <span class="brand-name">NEXUS <span>POS</span></span>
        </span>
      </a>
    </div>
    <!-- Logo Box End -->

    <!--- Sidemenu -->
    <div data-simplebar class="sidebar-menu-scroll">
      <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
          <li>
            <a href="{{url('admin-dashboard')}}">
              <svg
                width="25"
                height="25"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M3.17391 26L23.8261 26C25.0267 26 26 25.0267 26 23.8261L26 3.17391C26 1.9733 25.0267 1 23.8261 1L3.17391 1C1.9733 1 1 1.9733 1 3.17391L1 23.8261C1 25.0267 1.9733 26 3.17391 26Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linejoin="round"
                />
                <path
                  d="M7.43472 11.4131H3.63037V23.3696H7.43472V11.4131Z"
                  stroke="#008AEE"
                  stroke-width="0.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M12.739 14.6739H8.93469V23.3695H12.739V14.6739Z"
                  stroke="#008AEE"
                  stroke-width="0.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18.0434 9.78262H14.239V23.3696H18.0434V9.78262Z"
                  stroke="#008AEE"
                  stroke-width="0.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M23.3477 11.9565H19.5433V23.3696H23.3477V11.9565Z"
                  stroke="#008AEE"
                  stroke-width="0.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M4.26085 8.15215C4.86116 8.15215 5.3478 7.66551 5.3478 7.0652C5.3478 6.46489 4.86116 5.97824 4.26085 5.97824C3.66054 5.97824 3.17389 6.46489 3.17389 7.0652C3.17389 7.66551 3.66054 8.15215 4.26085 8.15215Z"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M10.7826 11.413C11.3829 11.413 11.8696 10.9264 11.8696 10.3261C11.8696 9.72578 11.3829 9.23914 10.7826 9.23914C10.1823 9.23914 9.69568 9.72578 9.69568 10.3261C9.69568 10.9264 10.1823 11.413 10.7826 11.413Z"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16.7608 6.52175C17.3612 6.52175 17.8478 6.03511 17.8478 5.4348C17.8478 4.83449 17.3612 4.34784 16.7608 4.34784C16.1605 4.34784 15.6739 4.83449 15.6739 5.4348C15.6739 6.03511 16.1605 6.52175 16.7608 6.52175Z"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M22.7392 8.69567C23.3395 8.69567 23.8261 8.20903 23.8261 7.60872C23.8261 7.00841 23.3395 6.52176 22.7392 6.52176C22.1389 6.52176 21.6522 7.00841 21.6522 7.60872C21.6522 8.20903 22.1389 8.69567 22.7392 8.69567Z"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M5.34778 7.60867L9.6956 9.78259"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M11.8696 9.78259L15.674 5.97824"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M17.8478 5.97824L21.6521 7.0652"
                  stroke="#008AEE"
                  stroke-width="0.815217"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>

              <span class="menu-item" data-key="t-dashboard">Dashboard</span>
            </a>
          </li>

          <li>
            <a href="{{url('admin-dashboard-pos')}}">
              <svg
                width="25"
                height="25"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M13.5 26C20.4036 26 26 20.4036 26 13.5C26 6.59644 20.4036 1 13.5 1C6.59644 1 1 6.59644 1 13.5C1 20.4036 6.59644 26 13.5 26Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M13.5 17.6667C16.3765 17.6667 18.7084 15.3348 18.7084 12.4583C18.7084 9.58185 16.3765 7.25 13.5 7.25C10.6235 7.25 8.29169 9.58185 8.29169 12.4583C8.29169 15.3348 10.6235 17.6667 13.5 17.6667Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M5.14062 22.7969C5.92436 21.2531 7.12026 19.9566 8.59576 19.0509C10.0713 18.1453 11.7687 17.6659 13.5 17.6659C15.2313 17.6659 16.9287 18.1453 18.4042 19.0509C19.8797 19.9566 21.0756 21.2531 21.8594 22.7969"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>

              <span class="menu-item" data-key="t-horizontal">POS</span>
            </a>
          </li>

          <li>
            <a href="layouts-horizontal.html">
              <svg
                width="25"
                height="25"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9.65384 19.75H1.72115C1.52989 19.75 1.34646 19.6677 1.21122 19.5212C1.07598 19.3747 1 19.1759 1 18.9687V10.375C1 7.88859 1.91174 5.50403 3.53465 3.74587C5.15756 1.98772 7.3587 1 9.65384 1C11.949 1 14.1501 1.98772 15.773 3.74587C17.3959 5.50403 18.3077 7.88859 18.3077 10.375C18.3077 12.8614 17.3959 15.246 15.773 17.0041C14.1501 18.7623 11.949 19.75 9.65384 19.75Z"
                  stroke="#008AEE"
                  stroke-width="1.44471"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M9.18506 19.75C9.7817 21.5782 10.887 23.161 12.3486 24.2803C13.8102 25.3997 15.5562 26.0005 17.3461 26H25.2788C25.4701 26 25.6535 25.9177 25.7887 25.7712C25.924 25.6247 26 25.426 26 25.2188V16.625C26.0031 14.2255 25.1555 11.9162 23.6324 10.1741C22.1092 8.43191 20.0267 7.38985 17.8149 7.26303"
                  stroke="#008AEE"
                  stroke-width="1.44471"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <rect x="5" y="9" width="2" height="2" fill="#008AEE" />
                <rect x="9" y="9" width="2" height="2" fill="#008AEE" />
                <rect x="13" y="9" width="2" height="2" fill="#008AEE" />
              </svg>

              <span class="menu-item" data-key="t-horizontal">Chat</span>
            </a>
          </li>

          <li>
            <a href="javascript: void(0);" class="has-arrow">
              <svg
                width="25"
                height="25"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M13.5 6.20833V8.29166"
                  stroke="#008AEE"
                  stroke-width="1.54688"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M13.5 18.7083V20.7917"
                  stroke="#008AEE"
                  stroke-width="1.54688"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M13.5 26C20.4036 26 26 20.4036 26 13.5C26 6.59644 20.4036 1 13.5 1C6.59644 1 1 6.59644 1 13.5C1 20.4036 6.59644 26 13.5 26Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M10.375 18.7083H15.0625C15.7531 18.7083 16.4155 18.434 16.9039 17.9456C17.3923 17.4572 17.6666 16.7948 17.6666 16.1042C17.6666 15.4135 17.3923 14.7511 16.9039 14.2627C16.4155 13.7744 15.7531 13.5 15.0625 13.5H11.9375C11.2468 13.5 10.5844 13.2256 10.0961 12.7373C9.60768 12.2489 9.33331 11.5865 9.33331 10.8958C9.33331 10.2052 9.60768 9.54279 10.0961 9.05441C10.5844 8.56604 11.2468 8.29167 11.9375 8.29167H16.625"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>

              <span class="menu-item" data-key="t-apps">Product Managment</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li>
                <a href="{{url('admin-dashboard-brand')}}">
                  <i class="fa-solid fa-circle"></i
                  ><span data-key="t-calendar">Brand List</span>
                </a>

              </li>
              <li>

                <a href="{{url('admin-dashboard-category')}}">
                  <i class="fa-solid fa-circle"></i
                  ><span data-key="t-calendar">Category List</span>
                </a>
              </li>
              <li>
                <a href="{{url('admin-dashboard-unit')}}">
                  <i class="fa-solid fa-circle"></i
                  ><span data-key="t-calendar">Unit List</span>
                </a>
              </li>
              <li>
                <a href="{{url('admin-dashboard-supriler')}}">
                  <i class="fa-solid fa-circle"></i
                  ><span data-key="t-calendar">Supriler List</span>
                </a>
              </li>
              <li>
                <a href="{{url('admin-dashboard-product')}}">
                  <i class="fa-solid fa-circle"></i
                  ><span data-key="t-calendar">Product List</span>
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript: void(0);" class="has-arrow">
              <svg
                width="25"
                height="25"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M13.5 6.20833V8.29166"
                  stroke="#008AEE"
                  stroke-width="1.54688"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M13.5 18.7083V20.7917"
                  stroke="#008AEE"
                  stroke-width="1.54688"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M13.5 26C20.4036 26 26 20.4036 26 13.5C26 6.59644 20.4036 1 13.5 1C6.59644 1 1 6.59644 1 13.5C1 20.4036 6.59644 26 13.5 26Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M10.375 18.7083H15.0625C15.7531 18.7083 16.4155 18.434 16.9039 17.9456C17.3923 17.4572 17.6666 16.7948 17.6666 16.1042C17.6666 15.4135 17.3923 14.7511 16.9039 14.2627C16.4155 13.7744 15.7531 13.5 15.0625 13.5H11.9375C11.2468 13.5 10.5844 13.2256 10.0961 12.7373C9.60768 12.2489 9.33331 11.5865 9.33331 10.8958C9.33331 10.2052 9.60768 9.54279 10.0961 9.05441C10.5844 8.56604 11.2468 8.29167 11.9375 8.29167H16.625"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>

              <span class="menu-item" data-key="t-apps">Purchase Managment</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li>
                <a href="{{url('admin-dashboard-purchase')}}">
                  <i class="fa-solid fa-circle"></i
                  ><span data-key="t-calendar">Purchase List</span>
                </a>

              </li>

            </ul>
          </li>



          <li>
            <a href="layouts-horizontal.html">
              <svg
                width="27"
                height="27"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M13.4997 17.3461C15.7958 17.3461 17.6572 15.6242 17.6572 13.5C17.6572 11.3758 15.7958 9.65384 13.4997 9.65384C11.2036 9.65384 9.34222 11.3758 9.34222 13.5C9.34222 15.6242 11.2036 17.3461 13.4997 17.3461Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-miterlimit="10"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M25.7207 8.08269L24.6813 6.41731C24.1076 5.49712 22.8365 5.18269 21.8418 5.71346L21.2951 6.00577C19.2163 7.11538 16.6179 5.72788 16.6179 3.50769V2.92308C16.6179 1.86058 15.6876 1 14.5391 1H12.4604C11.3119 1 10.3817 1.86058 10.3817 2.92308V3.50769C10.3817 5.72788 7.78322 7.11635 5.70447 6.00577L5.15776 5.71346C4.16308 5.18269 2.89193 5.49712 2.3182 6.41731L1.27882 8.08269C0.705088 9.00288 1.04496 10.1788 2.03964 10.7096L2.58635 11.0019C4.6651 12.1125 4.6651 14.8875 2.58635 15.9981L2.03964 16.2904C1.04496 16.8212 0.705088 17.9971 1.27882 18.9173L2.3182 20.5827C2.89193 21.5029 4.16308 21.8173 5.15776 21.2865L5.70447 20.9942C7.78322 19.8837 10.3817 21.2721 10.3817 23.4923V24.0769C10.3817 25.1394 11.3119 26 12.4604 26H14.5391C15.6876 26 16.6179 25.1394 16.6179 24.0769V23.4923C16.6179 21.2721 19.2163 19.8837 21.2951 20.9942L21.8418 21.2865C22.8365 21.8173 24.1076 21.5029 24.6813 20.5827L25.7207 18.9173C26.2944 17.9971 25.9546 16.8212 24.9599 16.2904L24.4132 15.9981C22.3344 14.8875 22.3344 12.1125 24.4132 11.0019L24.9599 10.7096C25.9546 10.1788 26.2955 9.00288 25.7207 8.08269Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-miterlimit="10"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span class="menu-item" data-key="t-horizontal">Setting</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                  <a href="{{url('admin-dashboard-warehouse')}}">
                    <i class="fa-solid fa-circle"></i
                    ><span data-key="t-calendar">Warehouse List</span>
                  </a>

                </li>
              </ul>
          </li>



          <li>
            <a href="layouts-horizontal.html">
              <svg
                width="27"
                height="27"
                viewBox="0 0 27 27"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M19.0556 2.76261H23.2222C24.7564 2.76261 26 3.96443 26 5.44695V6.78912M19.0556 24.2374H23.2222C24.7564 24.2374 26 23.0356 26 21.553V20.2108M2.97958 23.4691L11.3129 25.885C13.0951 26.4018 14.8889 25.1121 14.8889 23.3138V3.6861C14.8889 1.88797 13.0951 0.598274 11.3129 1.11497L2.97958 3.53088C1.80464 3.87151 1 4.91658 1 6.10201V20.8979C1 22.0834 1.80464 23.1285 2.97958 23.4691Z"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M9.33431 13.5H9.33331"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M19.0555 13.5H26M26 13.5L23.2222 10.8156M26 13.5L23.2222 16.1843"
                  stroke="#008AEE"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>

              <span class="menu-item" data-key="t-horizontal">Log Out</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <!-- Left Sidebar End -->


  @yield('content')


  <script>
    async function userlogout(event) {
        event.preventDefault(); // Prevent the default link behavior

        try {
            // Make sure HeaderToken() returns a valid authorization header
            let res = await axios.get("/naxus-pos-logout", HeaderToken());

            // Clear localStorage and sessionStorage
            localStorage.clear();
            sessionStorage.clear();

            // Redirect the user to the login page after successful logout
            window.location.href = "/nexus-login-page";
        } catch (e) {
            // Handle error and show error message using errorToast
            console.error("Logout error:", e);
            errorToast(e.response ? e.response.data.message : "Something went wrong");
        }
    }
    </script>





    <!-- jQuery library for DOM manipulation and event handling -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js for tooltips and popovers in Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <!-- XLSX.js for reading and writing Excel files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <!-- jsPDF for generating PDF documents -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- jsPDF-AutoTable for adding tables to PDFs created with jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.26/jspdf.plugin.autotable.min.js"></script>




        <!-- JAVASCRIPT -->
        <script src="{{asset('back-end/assets/js/finance-popup-modal.js')}}"></script>
        <script src="{{asset('back-end/assets/js/table.js')}}"></script>
        <script src="{{asset('back-end/assets/js/fontawesome.js')}}"></script>
<script src="{{asset('back-end/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('back-end/assets/js/simplebar.min.js')}}"></script>
        <script src="{{asset('back-end/assets/js/feather.min.js')}}"></script>
        <script src="{{asset('back-end/assets/js/full-screen-toggle.js')}}"></script>
        <script src="{{asset('back-end/assets/js/app.js')}}"></script>


    <!-- Deathpicker js -->
    <script
      src="{{asset('back-end/assets/js/bootstrap-datepicker.js')}}"
      type="text/javascript"
    ></script>
    <script src="{{asset('back-end/assets/js/datepicker.js')}}" type="text/javascript"></script>


  </body>
</html>
