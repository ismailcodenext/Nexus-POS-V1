<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('back-end/assets/icons/favicon.png') }}" type="image/x-icon" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('back-end/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />

    <!-- Fontawesome link -->
    <link href="{{ asset('back-end/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- CSS Link-->
    <link href="{{ asset('back-end/assets/css/pos.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-end/assets/css/create-payment-modal.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-end/assets/css/progress.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-end/assets/css/animate.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/config.js') }}"></script>


    <style>
        /* CSS for low stock and out of stock products */
        .low-stock {
            background-color: #ffcccc;
            /* Light red background for low stock */
        }

        .out-of-stock {
            background-color: #f8d7da;
            /* Light red background for out-of-stock */
            color: #721c24;
            /* Dark red text for out-of-stock */
        }

        .out-of-stock span {
            color: #721c24;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <section id="pos-main">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-7">
                <!-- Navbar Start -->
                <nav id="navbar">
                    <div class="nav-wrapper">
                        <div class="nav_back_btn">
                            <a href="{{ url('admin-dashboard') }}"><i
                                    class="fa-solid fa-arrow-left nevbar-back-icon"></i><span class="nav_back_text">Back
                                    to
                                    Dashboard</span></a>
                        </div>
                        <div class="nav-logo">
                            <svg width="235" height="66" viewBox="0 0 235 66" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M31.5043 12.1989L29.4361 13.0606C28.5744 -3.48481 17.5441 -1.76133 14.2695 16.8523L12.0289 17.714C14.5942 2.57869 22.887 -3.58358 27.885 2.06889C33.3347 -0.886685 38.2258 2.71972 39.0876 11.1648C38.1921 9.92557 37.6239 9.39999 36.5024 8.75191C35.6406 2.06889 31.7839 1.97627 28.974 3.58146C30.1587 5.57882 31.0592 8.43328 31.5043 12.1989Z"
                                    fill="#004F88" />
                                <path
                                    d="M25.5325 4.10095C22.172 9.36544 20.8071 13.1579 19.4399 19.9924L21.5081 20.8541C22.3037 13.7959 23.6308 10.264 26.5907 5.54405C26.752 5.28676 26.7848 4.96132 26.6385 4.6952C26.4224 4.3024 26.205 4.09083 25.8442 3.9768C25.7257 3.93935 25.5993 3.99621 25.5325 4.10095Z"
                                    fill="#004F88" />
                                <path
                                    d="M14.0971 57.5264L2.28029 55.163C1.6562 55.0382 1.23594 54.4506 1.31945 53.8197L5.72735 20.5155C5.78692 20.0654 6.0938 19.6867 6.52178 19.5352L14.0971 16.8522L17.027 18.5757L23.5763 35.6382H26.3339L26.8309 14.5943C26.8429 14.0872 27.1703 13.6416 27.6506 13.4786L36.5024 10.4753L34.0979 61.1421C34.0935 61.2346 34.0076 61.3014 33.9169 61.2829L23.921 59.2498L16.51 40.981H14.0971V57.5264Z"
                                    fill="url(#paint0_linear_217_2180)" />
                                <path
                                    d="M40.6387 14.267L36.5024 10.5132L34.0895 61.1835L42.8792 58.2158L50.9261 57.3217C51.6119 57.2455 52.0948 56.6113 51.9857 55.9299L45.4611 15.1508C45.3646 14.5478 44.8335 14.1116 44.2233 14.1342L40.6387 14.267Z"
                                    fill="#008AEE" />
                                <path d="M24.5337 22.2695L17.027 18.6136L23.64 35.8485H26.6785V26.9699L24.5337 22.2695Z"
                                    fill="#008AEE" />
                                <path d="M16.5099 40.981H14.097V57.5642L22.5421 55.6305L16.5099 40.981Z"
                                    fill="#008AEE" />
                                <path
                                    d="M41.8452 51.322L34.6066 60.6288L42.7042 56.6362L51.3243 56.8371L43.224 50.9773L41.3281 14.6118H40.6388L41.8452 51.322Z"
                                    fill="#004F88" />
                                <path
                                    d="M34.1001 64.0056L0.478583 56.8647C0.290694 56.8248 0.11377 56.9681 0.11377 57.1602V58.506C0.11377 58.6486 0.21355 58.7718 0.353076 58.8014L34.1722 65.9843C34.221 65.9946 34.2715 65.9928 34.3194 65.9788L54.2668 60.1732C54.3958 60.1357 54.4845 60.0175 54.4845 59.8832V58.6972C54.4845 58.4967 54.2928 58.3519 54.1 58.4066L34.3904 63.9958C34.2959 64.0226 34.1963 64.026 34.1001 64.0056Z"
                                    fill="url(#paint1_linear_217_2180)" />
                                <path class="nexus_text_color"
                                    d="M77.4098 48.6865H71.8781L62.6261 34.6791V48.6865H57.0943V25.9771H62.6261L71.8781 40.0492V25.9771H77.4098V48.6865ZM86.9515 30.409V35.0026H94.3595V39.2728H86.9515V44.2546H95.33V48.6865H81.4197V25.9771H95.33V30.409H86.9515ZM112.832 48.6865L108.206 41.7314L104.13 48.6865H97.8538L105.132 37.1377L97.692 25.9771H104.13L108.691 32.8352L112.702 25.9771H118.978L111.764 37.4289L119.269 48.6865H112.832ZM127.481 25.9771V39.5639C127.481 40.9226 127.815 41.9686 128.484 42.7018C129.152 43.4351 130.134 43.8017 131.428 43.8017C132.722 43.8017 133.714 43.4351 134.404 42.7018C135.094 41.9686 135.439 40.9226 135.439 39.5639V25.9771H140.971V39.5316C140.971 41.5588 140.539 43.2734 139.677 44.6752C138.814 46.077 137.65 47.1337 136.183 47.8454C134.738 48.5571 133.121 48.913 131.331 48.913C129.541 48.913 127.934 48.5679 126.51 47.8778C125.109 47.1661 123.998 46.1093 123.178 44.7075C122.359 43.2841 121.949 41.5588 121.949 39.5316V25.9771H127.481ZM153.072 48.913C151.411 48.913 149.923 48.6434 148.608 48.1042C147.292 47.5651 146.235 46.7671 145.438 45.7104C144.661 44.6536 144.251 43.3812 144.208 41.8931H150.096C150.182 42.7342 150.473 43.3812 150.969 43.8341C151.465 44.2654 152.112 44.4811 152.91 44.4811C153.73 44.4811 154.377 44.2978 154.851 43.9311C155.326 43.5429 155.563 43.0146 155.563 42.346C155.563 41.7853 155.369 41.3216 154.981 40.955C154.614 40.5883 154.15 40.2864 153.59 40.0492C153.05 39.8119 152.274 39.5424 151.26 39.2404C149.794 38.7875 148.597 38.3347 147.67 37.8818C146.742 37.4289 145.944 36.7603 145.276 35.8761C144.607 34.9919 144.273 33.8381 144.273 32.4147C144.273 30.3012 145.039 28.6513 146.57 27.4652C148.101 26.2575 150.096 25.6536 152.554 25.6536C155.056 25.6536 157.073 26.2575 158.604 27.4652C160.135 28.6513 160.955 30.312 161.062 32.447H155.078C155.035 31.7138 154.765 31.1423 154.269 30.7325C153.773 30.3012 153.137 30.0855 152.36 30.0855C151.692 30.0855 151.153 30.2688 150.743 30.6354C150.333 30.9805 150.128 31.4873 150.128 32.1559C150.128 32.8891 150.473 33.4606 151.163 33.8704C151.854 34.2802 152.932 34.7223 154.398 35.1967C155.865 35.6928 157.051 36.1672 157.957 36.6201C158.884 37.073 159.682 37.7308 160.351 38.5934C161.019 39.4561 161.354 40.5668 161.354 41.9255C161.354 43.2194 161.019 44.3948 160.351 45.4516C159.704 46.5083 158.755 47.3494 157.504 47.9748C156.253 48.6003 154.776 48.913 153.072 48.913Z"
                                    fill="black" />
                                <path class="pos_text_color"
                                    d="M188.142 32.7382C188.142 34.6144 187.496 36.178 186.202 37.4289C184.929 38.6581 182.977 39.2728 180.346 39.2728H176.011V48.6865H173.068V26.1389H180.346C182.891 26.1389 184.821 26.7535 186.137 27.9828C187.474 29.2121 188.142 30.7972 188.142 32.7382ZM180.346 36.8466C181.985 36.8466 183.193 36.4907 183.969 35.779C184.746 35.0673 185.134 34.0537 185.134 32.7382C185.134 29.9561 183.538 28.5651 180.346 28.5651H176.011V36.8466H180.346ZM202.024 48.913C199.932 48.913 198.023 48.4277 196.298 47.4572C194.573 46.4652 193.203 45.0957 192.189 43.3488C191.197 41.5804 190.701 39.5963 190.701 37.3965C190.701 35.1967 191.197 33.2234 192.189 31.4765C193.203 29.7081 194.573 28.3386 196.298 27.3681C198.023 26.3761 199.932 25.8801 202.024 25.8801C204.137 25.8801 206.057 26.3761 207.782 27.3681C209.507 28.3386 210.866 29.6973 211.858 31.4442C212.85 33.1911 213.346 35.1752 213.346 37.3965C213.346 39.6179 212.85 41.602 211.858 43.3488C210.866 45.0957 209.507 46.4652 207.782 47.4572C206.057 48.4277 204.137 48.913 202.024 48.913ZM202.024 46.3574C203.598 46.3574 205.011 45.9907 206.262 45.2575C207.534 44.5242 208.526 43.4782 209.238 42.1196C209.971 40.7609 210.338 39.1865 210.338 37.3965C210.338 35.5849 209.971 34.0106 209.238 32.6735C208.526 31.3148 207.545 30.2688 206.294 29.5356C205.043 28.8023 203.62 28.4357 202.024 28.4357C200.428 28.4357 199.004 28.8023 197.754 29.5356C196.503 30.2688 195.511 31.3148 194.777 32.6735C194.066 34.0106 193.71 35.5849 193.71 37.3965C193.71 39.1865 194.066 40.7609 194.777 42.1196C195.511 43.4782 196.503 44.5242 197.754 45.2575C199.026 45.9907 200.449 46.3574 202.024 46.3574ZM224.382 48.913C222.894 48.913 221.556 48.6542 220.37 48.1366C219.206 47.5974 218.289 46.8642 217.621 45.9368C216.952 44.9879 216.607 43.8988 216.585 42.6695H219.723C219.831 43.7263 220.262 44.6213 221.017 45.3545C221.794 46.0662 222.915 46.4221 224.382 46.4221C225.783 46.4221 226.883 46.077 227.681 45.3869C228.501 44.6752 228.911 43.7694 228.911 42.6695C228.911 41.8068 228.673 41.1059 228.199 40.5668C227.724 40.0276 227.131 39.6179 226.42 39.3375C225.708 39.0571 224.748 38.7552 223.541 38.4317C222.052 38.0435 220.856 37.6553 219.95 37.2671C219.066 36.8789 218.3 36.2751 217.653 35.4555C217.027 34.6144 216.715 33.493 216.715 32.0912C216.715 30.8619 217.027 29.7728 217.653 28.8239C218.278 27.8749 219.152 27.1417 220.273 26.6241C221.416 26.1065 222.721 25.8477 224.188 25.8477C226.301 25.8477 228.026 26.3761 229.363 27.4328C230.722 28.4896 231.488 29.8914 231.66 31.6383H228.425C228.317 30.7756 227.865 30.0208 227.067 29.3738C226.269 28.7053 225.212 28.371 223.896 28.371C222.667 28.371 221.664 28.6945 220.888 29.3415C220.111 29.9669 219.723 30.8511 219.723 31.9941C219.723 32.8137 219.95 33.4822 220.403 33.9998C220.877 34.5174 221.449 34.9164 222.117 35.1967C222.807 35.4555 223.767 35.7575 224.996 36.1025C226.484 36.5123 227.681 36.9221 228.587 37.3318C229.493 37.72 230.269 38.3347 230.916 39.1757C231.563 39.9953 231.887 41.1167 231.887 42.5401C231.887 43.64 231.596 44.6752 231.013 45.6457C230.431 46.6161 229.568 47.4033 228.425 48.0072C227.282 48.611 225.934 48.913 224.382 48.913Z"
                                    fill="#008AEE" />
                                <defs>
                                    <linearGradient id="paint0_linear_217_2180" x1="1.17102" y1="10.3408"
                                        x2="36.6747" y2="61.3559" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#008AEE" />
                                        <stop offset="1" stop-color="#004F88" />
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_217_2180" x1="0.11377" y1="62.1488"
                                        x2="54.4845" y2="62.1488" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#008AEE" />
                                        <stop offset="1" stop-color="#004F88" />
                                    </linearGradient>
                                </defs>
                            </svg>

                        </div>
                        <div class="profile">
                            <button class="light-mode-button" aria-label="Toggle Light Mode"
                                onclick="toggle_light_mode()">
                                <span></span>
                                <span></span>
                            </button>
                            <div class="fullscreen">
                                <button class="js-toggle-fullscreen-btn toggle-fullscreen-btn"
                                    aria-label="Enter fullscreen mode" hidden>
                                    <svg width="27" height="27" class="toggle-fullscreen-svg" viewBox="0 0 30 30"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g class="icon-fullscreen-enter">
                                            <path
                                                d="M2 7.5H0V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H7.5V2H2V7.5Z"
                                                fill="#192045" />
                                            <path
                                                d="M30 7.5H28V2H22.5V0H27C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V7.5Z"
                                                fill="#192045" />
                                            <path
                                                d="M7.5 30H3C2.20435 30 1.44129 29.6839 0.87868 29.1213C0.31607 28.5587 0 27.7956 0 27V22.5H2V28H7.5V30Z"
                                                fill="#192045" />
                                            <path
                                                d="M27 30H22.5V28H28V22.5H30V27C30 27.7956 29.6839 28.5587 29.1213 29.1213C28.5587 29.6839 27.7956 30 27 30Z"
                                                fill="#192045" />
                                            <path
                                                d="M9.00052 10.5C8.80311 10.5011 8.60742 10.4633 8.42466 10.3887C8.24191 10.314 8.07568 10.204 7.93552 10.065L6.43552 8.565C6.15307 8.28255 5.99438 7.89946 5.99438 7.5C5.99438 7.10055 6.15307 6.71746 6.43552 6.435C6.71798 6.15255 7.10107 5.99387 7.50052 5.99387C7.89998 5.99387 8.28307 6.15255 8.56552 6.435L10.0655 7.935C10.2061 8.07445 10.3177 8.24035 10.3939 8.42314C10.47 8.60593 10.5092 8.80199 10.5092 9C10.5092 9.19802 10.47 9.39408 10.3939 9.57687C10.3177 9.75966 10.2061 9.92556 10.0655 10.065C9.92536 10.204 9.75914 10.314 9.57638 10.3887C9.39363 10.4633 9.19793 10.5011 9.00052 10.5Z"
                                                fill="#192045" />
                                            <path
                                                d="M20.9995 10.5C20.8021 10.5011 20.6064 10.4633 20.4237 10.3887C20.2409 10.314 20.0747 10.204 19.9345 10.065C19.7939 9.92556 19.6824 9.75966 19.6062 9.57687C19.5301 9.39408 19.4908 9.19802 19.4908 9C19.4908 8.80199 19.5301 8.60593 19.6062 8.42314C19.6824 8.24035 19.7939 8.07445 19.9345 7.935L21.4345 6.435C21.717 6.15255 22.1001 5.99387 22.4995 5.99387C22.899 5.99387 23.2821 6.15255 23.5645 6.435C23.847 6.71746 24.0057 7.10055 24.0057 7.5C24.0057 7.89946 23.847 8.28255 23.5645 8.565L22.0645 10.065C21.9244 10.204 21.7582 10.314 21.5754 10.3887C21.3926 10.4633 21.197 10.5011 20.9995 10.5Z"
                                                fill="#192045" />
                                            <path
                                                d="M7.49991 24C7.3025 24.0011 7.10681 23.9633 6.92405 23.8887C6.74129 23.814 6.57507 23.704 6.43491 23.565C6.29432 23.4256 6.18272 23.2597 6.10657 23.0769C6.03042 22.8941 5.99121 22.698 5.99121 22.5C5.99121 22.302 6.03042 22.1059 6.10657 21.9231C6.18272 21.7403 6.29432 21.5744 6.43491 21.435L7.93491 19.935C8.21736 19.6525 8.60046 19.4939 8.99991 19.4939C9.39936 19.4939 9.78245 19.6525 10.0649 19.935C10.3474 20.2175 10.506 20.6006 10.506 21C10.506 21.3995 10.3474 21.7825 10.0649 22.065L8.56491 23.565C8.42475 23.704 8.25852 23.814 8.07577 23.8887C7.89301 23.9633 7.69732 24.0011 7.49991 24Z"
                                                fill="#192045" />
                                            <path
                                                d="M22.5 24C22.3026 24.0011 22.1069 23.9633 21.9242 23.8887C21.7414 23.814 21.5752 23.704 21.435 23.565L19.935 22.065C19.6526 21.7825 19.4939 21.3995 19.4939 21C19.4939 20.8022 19.5329 20.6064 19.6085 20.4236C19.6842 20.2409 19.7952 20.0749 19.935 19.935C20.0749 19.7951 20.2409 19.6842 20.4237 19.6085C20.6064 19.5328 20.8022 19.4939 21 19.4939C21.3995 19.4939 21.7826 19.6525 22.065 19.935L23.565 21.435C23.7056 21.5744 23.8172 21.7403 23.8934 21.9231C23.9695 22.1059 24.0087 22.302 24.0087 22.5C24.0087 22.698 23.9695 22.8941 23.8934 23.0769C23.8172 23.2597 23.7056 23.4256 23.565 23.565C23.4249 23.704 23.2587 23.814 23.0759 23.8887C22.8931 23.9633 22.6974 24.0011 22.5 24Z"
                                                fill="#192045" />
                                        </g>
                                        <g class="icon-fullscreen-leave">
                                            <path
                                                d="M9.00052 10.5C8.80311 10.5011 8.60742 10.4633 8.42466 10.3887C8.24191 10.314 8.07568 10.204 7.93552 10.065L6.43552 8.565C6.15307 8.28255 5.99438 7.89946 5.99438 7.5C5.99438 7.10055 6.15307 6.71746 6.43552 6.435C6.71798 6.15255 7.10107 5.99387 7.50052 5.99387C7.89998 5.99387 8.28307 6.15255 8.56552 6.435L10.0655 7.935C10.2061 8.07445 10.3177 8.24035 10.3939 8.42314C10.47 8.60593 10.5092 8.80199 10.5092 9C10.5092 9.19802 10.47 9.39408 10.3939 9.57687C10.3177 9.75966 10.2061 9.92556 10.0655 10.065C9.92536 10.204 9.75914 10.314 9.57638 10.3887C9.39363 10.4633 9.19793 10.5011 9.00052 10.5Z"
                                                fill="#192045" />
                                            <path
                                                d="M20.9995 10.5C20.8021 10.5011 20.6064 10.4633 20.4237 10.3887C20.2409 10.314 20.0747 10.204 19.9345 10.065C19.7939 9.92556 19.6824 9.75966 19.6062 9.57687C19.5301 9.39408 19.4908 9.19802 19.4908 9C19.4908 8.80199 19.5301 8.60593 19.6062 8.42314C19.6824 8.24035 19.7939 8.07445 19.9345 7.935L21.4345 6.435C21.717 6.15255 22.1001 5.99387 22.4995 5.99387C22.899 5.99387 23.2821 6.15255 23.5645 6.435C23.847 6.71746 24.0057 7.10055 24.0057 7.5C24.0057 7.89946 23.847 8.28255 23.5645 8.565L22.0645 10.065C21.9244 10.204 21.7582 10.314 21.5754 10.3887C21.3926 10.4633 21.197 10.5011 20.9995 10.5Z"
                                                fill="#192045" />
                                            <path
                                                d="M7.49991 24C7.3025 24.0011 7.10681 23.9633 6.92405 23.8887C6.74129 23.814 6.57507 23.704 6.43491 23.565C6.29432 23.4256 6.18272 23.2597 6.10657 23.0769C6.03042 22.8941 5.99121 22.698 5.99121 22.5C5.99121 22.302 6.03042 22.1059 6.10657 21.9231C6.18272 21.7403 6.29432 21.5744 6.43491 21.435L7.93491 19.935C8.21736 19.6525 8.60046 19.4939 8.99991 19.4939C9.39936 19.4939 9.78245 19.6525 10.0649 19.935C10.3474 20.2175 10.506 20.6006 10.506 21C10.506 21.3995 10.3474 21.7825 10.0649 22.065L8.56491 23.565C8.42475 23.704 8.25852 23.814 8.07577 23.8887C7.89301 23.9633 7.69732 24.0011 7.49991 24Z"
                                                fill="#192045" />
                                            <path
                                                d="M22.5 24C22.3026 24.0011 22.1069 23.9633 21.9242 23.8887C21.7414 23.814 21.5752 23.704 21.435 23.565L19.935 22.065C19.6526 21.7825 19.4939 21.3995 19.4939 21C19.4939 20.8022 19.5329 20.6064 19.6085 20.4236C19.6842 20.2409 19.7952 20.0749 19.935 19.935C20.0749 19.7951 20.2409 19.6842 20.4237 19.6085C20.6064 19.5328 20.8022 19.4939 21 19.4939C21.3995 19.4939 21.7826 19.6525 22.065 19.935L23.565 21.435C23.7056 21.5744 23.8172 21.7403 23.8934 21.9231C23.9695 22.1059 24.0087 22.302 24.0087 22.5C24.0087 22.698 23.9695 22.8941 23.8934 23.0769C23.8172 23.2597 23.7056 23.4256 23.565 23.565C23.4249 23.704 23.2587 23.814 23.0759 23.8887C22.8931 23.9633 22.6974 24.0011 22.5 24Z"
                                                fill="#192045" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="profile-wrapper">
                                <button type="button"
                                    class="btn header-item user text-start d-flex align-items-center"
                                    id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('back-end/assets/img/profile-img.png') }}"
                                        alt="Header Avatar" />
                                </button>
                                <div class="dropdown-menu dropdown-menu-end pt-0 profile-dropdown">
                                    <div class="p-3 border-bottom">
                                        <h6 class="mb-0">Martin Gurley</h6>
                                        <a href="# " class="mb-0 font-size-11 text-muted">
                                            martin.gurley@email.com
                                        </a>
                                    </div>
                                    <a class="dropdown-item" href="contacts-profile.html"><i
                                            class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i>
                                        <span class="align-middle">Profile</span></a>
                                    <a class="dropdown-item" href="apps-chat.html"><i
                                            class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"></i>
                                        <span class="align-middle">Messages</span></a>
                                    <a class="dropdown-item" href="pages-faqs.html"><i
                                            class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"></i>
                                        <span class="align-middle">Help</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"><i
                                            class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i>
                                        <span class="align-middle me-3">Settings</span><span
                                            class="badge badge-soft-success ms-auto">New</span></a>
                                    <a class="dropdown-item" href="auth-lock-screen.html"><i
                                            class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i>
                                        <span class="align-middle">Lock screen</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="auth-logout.html"><i
                                            class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i>
                                        <span class="align-middle">Logout</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->

                <!-- Catgaroies Search Start -->
                <div class="catagories-search-wrapper">
                    <div class="headding">
                        <h1>Categories</h1>
                        <p>Select From Below Categories</p>
                    </div>
                    <!-- Search bar -->
                    <div class="searchbar">
                        <label for="text">
                            <input type="text" id="searchInput" placeholder="Search product code or name..."
                                onkeyup="searchProducts()" />
                            <a href="#" class="search-icon">
                                <svg width="23" height="24" viewBox="0 0 27 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2967 16.9811H18.0695L17.6449 16.5566C19.1578 14.8045 20.0686 12.5274 20.0686 10.0343C20.0686 4.49228 15.5763 0 10.0343 0C4.49228 0 0 4.49228 0 10.0343C0 15.5763 4.49228 20.0686 10.0343 20.0686C12.5274 20.0686 14.8045 19.1578 16.5566 17.6527L16.9811 18.0772V19.2967L24.6998 27L27 24.6998L19.2967 16.9811ZM10.0343 16.9811C6.19811 16.9811 3.08748 13.8705 3.08748 10.0343C3.08748 6.19811 6.19811 3.08748 10.0343 3.08748C13.8705 3.08748 16.9811 6.19811 16.9811 10.0343C16.9811 13.8705 13.8705 16.9811 10.0343 16.9811Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </label>
                    </div>




                </div>
                <!-- Catgaroies Search End -->

                <!-- Pos Product Category Slider Start -->
                <section id="product-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" id="ProductCategoryData">
                            <!-- Dynamic Data will be added here -->
                        </div>
                    </div>

                    <div class="swiper-button-next">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                </section>
                <!-- Pos Product Category Slider End -->

                <!-- Category Wish Pos Product Card Start -->
                <section id="product-card">
                    <div class="row" id="ProductCategoryWishDataItem">
                        <!-- Dynamic Product Data will be added here -->
                    </div>

                </section>
                <!-- Category Wish Pos Product Card End -->

            </div>
            <!-- Pos Catagories -->

            <!-- Pos Order List Start -->
            <div class="col-lg-5">
                <!-- Navbar Start -->
                <nav id="navbar">
                    <div class="nav-wrapper">
                        <div class="nav-logo">
                            <img src="./assets/img/pos-nav-logo.svg" alt="" />
                        </div>
                        <div class="profile">
                            <div class="fullscreen">
                                <img src="./assets/icons/pos-navbar-full-screen.svg" alt="" />
                            </div>
                            <div class="profile-wrapper">
                                <img src="{{ asset('back-end/assets/img/profile-img.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->




                <div class="Order-list-wrapper">
                    <h1 class="title">Order List</h1>
                    <p>Customer Information</p>
                </div>

                <div class="select-box-wrapper">
                    <label>
                        <select class="form-select input-style" id="ADDWareShop" aria-label="Default select example">
                            <option value="none">Select Wareshop</option>
                            <!-- Populate options dynamically -->
                        </select>
                    </label>

                    <button type="button" class="add-customer-btn" data-bs-toggle="modal"
                        data-bs-target="#addWarehouseModal">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.8066 6.6C18.8066 3 15.8066 0 12.0566 0C8.30664 0 5.30664 3 5.30664 6.6C5.30664 10.2 8.30664 13.2 12.0566 13.2C15.8066 13.2 18.8066 10.2 18.8066 6.6ZM8.30664 6.6C8.30664 4.65 9.95664 3 12.0566 3C14.1566 3 15.8066 4.65 15.8066 6.6C15.8066 8.55 14.1566 10.2 12.0566 10.2C9.95664 10.2 8.30664 8.55 8.30664 6.6Z"
                                fill="white" />
                            <path
                                d="M0.956744 21.15L0.206744 24C-0.243256 25.35 0.056744 26.85 0.956744 28.05C1.85674 29.1 3.05674 29.7 4.55674 29.7H19.5567C20.9067 29.7 22.2567 29.1 23.0067 27.9C23.9067 26.7 24.2067 25.2 23.7567 23.85L23.0067 21C22.1067 17.25 18.8067 14.7 15.0567 14.7H9.05674C5.30674 14.7 2.00674 17.25 0.956744 21.15ZM3.05674 24.75L3.80674 21.9C4.55674 19.35 6.65674 17.7 9.05674 17.7H15.0567C17.4567 17.7 19.5567 19.35 20.3067 21.9L21.0567 24.75C21.2067 25.2 21.0567 25.8 20.7567 26.25C20.6067 26.4 20.1567 26.7 19.5567 26.7H4.55674C3.95674 26.7 3.65674 26.4 3.50674 26.1C3.05674 25.8 2.90674 25.2 3.05674 24.75Z"
                                fill="white" />
                            <path
                                d="M30.2054 11.086H27.0734V14.29H24.1574V11.086H21.0254V8.33199H24.1574V5.10999H27.0734V8.33199H30.2054V11.086Z"
                                fill="white" />
                        </svg>
                        ADD Warehouse
                    </button>
                </div>


                <div class="select-box-wrapper">
                    <label>
                        <select class="form-select input-style" id="ADDCustomer" aria-label="Default select example">
                            <option value="none">Select Customer</option>
                            <!-- Populate options dynamically -->
                        </select>
                    </label>

                    <button type="button" class="add-customer-btn" data-bs-toggle="modal"
                        data-bs-target="#addCustomerModal">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.8066 6.6C18.8066 3 15.8066 0 12.0566 0C8.30664 0 5.30664 3 5.30664 6.6C5.30664 10.2 8.30664 13.2 12.0566 13.2C15.8066 13.2 18.8066 10.2 18.8066 6.6ZM8.30664 6.6C8.30664 4.65 9.95664 3 12.0566 3C14.1566 3 15.8066 4.65 15.8066 6.6C15.8066 8.55 14.1566 10.2 12.0566 10.2C9.95664 10.2 8.30664 8.55 8.30664 6.6Z"
                                fill="white" />
                            <path
                                d="M0.956744 21.15L0.206744 24C-0.243256 25.35 0.056744 26.85 0.956744 28.05C1.85674 29.1 3.05674 29.7 4.55674 29.7H19.5567C20.9067 29.7 22.2567 29.1 23.0067 27.9C23.9067 26.7 24.2067 25.2 23.7567 23.85L23.0067 21C22.1067 17.25 18.8067 14.7 15.0567 14.7H9.05674C5.30674 14.7 2.00674 17.25 0.956744 21.15ZM3.05674 24.75L3.80674 21.9C4.55674 19.35 6.65674 17.7 9.05674 17.7H15.0567C17.4567 17.7 19.5567 19.35 20.3067 21.9L21.0567 24.75C21.2067 25.2 21.0567 25.8 20.7567 26.25C20.6067 26.4 20.1567 26.7 19.5567 26.7H4.55674C3.95674 26.7 3.65674 26.4 3.50674 26.1C3.05674 25.8 2.90674 25.2 3.05674 24.75Z"
                                fill="white" />
                            <path
                                d="M30.2054 11.086H27.0734V14.29H24.1574V11.086H21.0254V8.33199H24.1574V5.10999H27.0734V8.33199H30.2054V11.086Z"
                                fill="white" />
                        </svg>
                        ADD CUSTOMER
                    </button>
                </div>



                {{-- Add Customer And Add Warehouse Modal Start  --}}

                <form id="signup" onsubmit="return Save(event)">



                    <div class="modal fade" id="addWarehouseModal" tabindex="-1"
                        aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modal-content-popap">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addWarehouseModalLabel">Add New Warehouse</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <form id="warehouseForm" onsubmit="return false;">

                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="warehouse_name"
                                                        placeholder="Enter your WareHouse name"
                                                        id="WarehouseName" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="number"
                                                        placeholder="Enter your number name"
                                                        id="WarehouseNumber" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="email"
                                                        placeholder="Enter your email name"
                                                        id="WarehouseEmail" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="address"
                                                        placeholder="Enter your Address name"
                                                        id="WarehouseAddress" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="country">
                                                    <select name="status" class="form-control"
                                                        id="WarehouseSelectStatus">
                                                        <option value="">Select Status</option>
                                                        <option value="Active">Active</option>
                                                        <option value="InActive">InActive</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a onclick="WarehouseSave(event)" id="save-btn" class="btn btn-primary"
                                                type="button" style="width: auto;">
                                                Save Warehouse</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="addCustomerModal" tabindex="-1"
                        aria-labelledby="addCustomerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modal-content-popap">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="CustomerForm" onsubmit="return false;">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="seller_person_name"
                                                        placeholder="Seller name" id="SellerName" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="name"
                                                        placeholder="Enter Customer name" id="CustomerName" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="mobile" placeholder="Enter number"
                                                        id="CustomerMobile" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="email" placeholder="Enter email"
                                                        id="CustomerEmail" /><br />
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="data">
                                                    <input type="text" name="address" placeholder="Enter Address"
                                                        id="CustomerAddress" /><br />
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button onclick="CustomerDataSave(event)" class="btn btn-primary"
                                            style="width: auto;">Save Customer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    {{-- Add Customer And Add Warehouse Modal End  --}}





                    <!-- Order list table Start -->
                    <div class="table-wrapper">
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>



                        <form id="orderForm">
                            <div class="order-wrapper">
                                <div class="input-group" style="display: none">
                                    <label for="orderTax" class="input-group-text">Order Tax</label>
                                    <div class="input-wrapper">
                                        <input type="number" id="orderTax" name="orderTax" placeholder="00"
                                            required oninput="calculateSubtotal()" />
                                        <span>%</span>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="shipping" class="input-group-text">Shipping</label>
                                    <div class="input-wrapper">
                                        <input type="number" id="shipping" name="shipping" placeholder="0"
                                            required oninput="calculateSubtotal()" />
                                        <span>$</span>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="discount" class="input-group-text">Discount</label>
                                    <div class="input-wrapper">
                                        <input type="number" id="discount" name="discount" placeholder="0"
                                            required oninput="calculateSubtotal()" />
                                        <span>$</span>
                                    </div>
                                </div>
                            </div>

                            <div class="totals">
                                <div class="subtotal">
                                    <span>Sub-Total</span>
                                    <span id="subtotal">$0.00</span>
                                </div>
                                <div class="total">
                                    <span>Total</span>
                                    <span id="total">$0.00</span>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="button" class="reset" onclick="resetForm()">Reset</button>
                                <!-- <button id="openModalBtn" type="button" class="pay-now" onclick="showPayModal()">Pay</button> -->
                                <button id="payButton" class="pay-now" type="button"
                                    onclick="showPayModal()">Pay</button>

                                <button id="draftModal" type="button" class="draft" onclick="showdraftModal()">

                                    Draft
                                </button>
                                <button id="recent-draftModal" type="button" class="recent-draft">
                                    Recent Draft
                                    <div class="badge">
                                        <span>23</span>
                                    </div>
                                </button>
                            </div>
                        </form>



                    </div>
            </div>
            <!-- Pos Order List End -->
        </div>



        <!-- Draft Modal Start -->


        <!-- Draft Modal Start -->
        <div id="draftModal" class="draftmodal-wrapper">
            <div class="container">
                <form id="DraftForm">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="draft-heading">Recent Draft</h2>

                            <!-- Search Section -->
                            <div class="search">
                                <button type="button" class="order-btn">Order</button>
                                <input type="text" placeholder="Order Number" id="DraftOrderNumber" />
                            </div>

                            <!-- Order Details Table -->
                            <div class="order-details-table">
                                <div class="parent">
                                    <h2 class="heading">Product Details</h2>
                                    <div class="wrapper">

                                        <p id="customer-name">
                                            <strong>Customer Name:</strong><span id="draftCustomerName"></span>
                                        </p>
                                        <p class="d-flex">
                                            <strong>Date:</strong>
                                            <input type="text" id="draftDate" class="form-control"
                                                placeholder="Select a date" />
                                        </p>
                                    </div>
                                    <table class="table table-fixed table-lock-height border-0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="draftTableBody">
                                            <!-- Draft items will be injected here -->
                                        </tbody>
                                    </table>

                                    <!-- Summary Section -->
                                    <div class="summary">
                                        <div class="draft-summary">
                                            <p><strong>Sub-Total:</strong> <span id="draftSubtotal">$0.00</span></p>
                                            <p style="display: none"><strong>Tax (0.0%):</strong> <span
                                                    id="draftTax">$0.00</span></p>
                                            <p><strong>Discount:</strong> <span id="draftDiscount">$0.00</span></p>
                                            <p><strong>Shipping Cost:</strong> <span id="draftShipping">$0.00</span>
                                            </p>
                                            <p><strong>Total:</strong> <span id="draftTotal">$0.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="buttons m-4">
                                <button class="save-draft-btn" onclick="saveDraft(event)">Save Draft</button>
                                <button type="button" class="close-btn" onclick="closeDraftModal()">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Draft Modal End -->



        <!-- Recent Draft Modal Start -->
        <div class="recent-draft-modal-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Order List -->
                    <div class="col-lg-4 mb-4">
                        <div class="order-no">
                            <h2 class="heading">Recent Draft</h2>
                            <div class="search">
                                <input type="text" id="DraftSearch"
                                    placeholder="Search by order number or customer name..." />
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>

                            <div class="order-list" id="RecentDataShow">
                                <!-- Recent drafts will be populated dynamically -->
                            </div>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="col-lg-8">
                        <div class="order-details-table">
                            <div class="parent">
                                <h2 class="heading">Product Details</h2>
                                <div class="wrapper">
                                    <p>
                                        <strong>Customer Name:</strong>
                                        <span id="RcecntDraftCustomerName">N/A</span>
                                    </p>
                                    <p>
                                        <strong>Date:</strong>
                                        <span id="RcecntDraftDate">N/A</span>
                                    </p>
                                </div>
                                <table class="table table-fixed table-lock-height order-details">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="DraftProductInfo">
                                        <!-- Product rows will be populated dynamically -->
                                    </tbody>
                                </table>

                                <!-- Order Summary -->
                                <div class="summary">
                                    <div class="order-summary">
                                        <p><strong>Sub-Total:</strong><span id="OrderSubTotal">$0.00</span></p>
                                        {{-- <p><strong>Tax (0.0%):</strong></p> --}}
                                        <p><strong>Discount: </strong><span id="OrderDiscount">$0.00</span></p>
                                        <p><strong>Shipping Cost:</strong><span id="OrderShipping">$0.00</span></p>
                                        <p><strong>Total: </strong><span id="OrderTotal">$0.00</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="btn-edit" data-draft-id="${draft.id}">Edit Order</button>
                            <button class="button-close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Recent Draft Modal End -->





    </section>

    <!-- Create Payment Pop Up Modal Start -->
    <section id="myModal" class="create-payment-modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn close" onclick="closeModal()">
                <i class="fa-solid fa-xmark"></i>
            </span>

            <div id="popup-modal">
                <div class="modal-wrapper">
                    <div class="row">
                        <!-- Product Details Start -->
                        <div class="col-lg-6">
                            <div class="modal-title">
                                <h1>Create Payment</h1>
                            </div>
                            <div class="table-wrapper">
                                <div class="product-details">
                                    <h1>Product Details</h1>
                                </div>
                                <div class="table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">
                                            <!-- Product rows will be dynamically inserted here -->
                                        </tbody>
                                    </table>
                                </div>
                                <form id="orderForm">
                                    <div class="totals">
                                        <div class="subtotal">
                                            <span>Sub-Total</span>
                                            <span id="PDetailsubtotal">$0.00</span>
                                        </div>
                                        <div class="tax" style="display: none">
                                            <span>Tax</span>
                                            <span id="tax">$0.00</span>
                                        </div>
                                        <div class="discount">
                                            <span>Discount</span>
                                            <span id="PDetaildiscount">$0.00</span>
                                        </div>
                                        <div class="shipping-cost">
                                            <span>Shipping Cost</span>
                                            <span id="PDetailshipping">$0.00</span>
                                        </div>
                                    </div>
                                    <button type="button" class="pay-btn">
                                        Total Payable: <span id="payableAmount"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Product Details End -->

                        <!-- Payment Start -->
                        <div class="col-lg-6">
                            <input type="hidden" id="WareHouseID">
                            <input type="hidden" id="CustomerID">
                            <div id="payment">
                                <div class="totals">
                                    <div class="paid-amount">
                                        <span>Paid Amount</span>
                                        <input type="number" id="paidAmountInput" oninput="calculateDuePayment()" />
                                    </div>
                                    <div class="due-amount">
                                        <span>Due Amount</span>
                                        <span id="totalDuePayable">$0.00</span>
                                    </div>
                                    <div class="status">
                                        <span>Status</span>
                                        <span id="paymentStatusDisplay" class="partial-payment-status">Partial
                                            Paid</span>
                                    </div>
                                </div>

                                <div class="payments">
                                    <div class="heading">
                                        <h2>Payment Method</h2>
                                    </div>
                                    <form action="#">
                                        <input type="radio" name="payment" id="cash" />
                                        <input type="radio" name="payment" id="bkash" />
                                        <input type="radio" name="payment" id="nagad" />
                                        <input type="radio" name="payment" id="rocket" />
                                        <input type="radio" name="payment" id="bank" />
                                        <input type="radio" name="payment" id="mastercard" />

                                        <div class="category-wrapper">
                                            <div class="category">
                                                <label for="cash" class="cashMethod">
                                                    <input type="radio" name="payment" id="cash" />
                                                    <div class="imgName">
                                                        <div class="imgContainer cash">
                                                            <img src="{{ asset('back-end/assets/img/payment-cash.png') }}"
                                                                alt="" />
                                                        </div>
                                                        <h1>Cash</h1>
                                                    </div>
                                                    <span class="check"><i
                                                            class="fa-solid fa-circle-check"></i></span>
                                                </label>

                                                <label for="bkash" class="bkashMethod">
                                                    <div class="imgName">
                                                        <div class="imgContainer bkash">
                                                            <img src="{{ asset('back-end/assets/img/payment-bkash.png') }}"
                                                                alt="" />
                                                        </div>
                                                        <h1>bKash</h1>
                                                    </div>
                                                    <span class="check"><i
                                                            class="fa-solid fa-circle-check"></i></span>
                                                </label>

                                                <label for="nagad" class="nagadMethod">
                                                    <div class="imgName">
                                                        <div class="imgContainer nagad">
                                                            <img src="
                                  {{ asset('back-end/assets/img/payment-nagad.png') }}
                                  "
                                                                alt="" />
                                                        </div>
                                                        <h1>Nagad</h1>
                                                    </div>
                                                    <span class="check"><i
                                                            class="fa-solid fa-circle-check"></i></span>
                                                </label>

                                                <label for="rocket" class="rocketMethod">
                                                    <div class="imgName">
                                                        <div class="imgContainer rocket">
                                                            <img src="{{ asset('back-end/assets/img/payment-rocket.png') }}"
                                                                alt="" />
                                                        </div>
                                                        <h1>Rocket</h1>
                                                    </div>
                                                    <span class="check"><i
                                                            class="fa-solid fa-circle-check"></i></span>
                                                </label>

                                                <label for="bank" class="bankMethod">
                                                    <div class="imgName">
                                                        <div class="imgContainer bank">
                                                            <img src="{{ asset('back-end/assets/img/payment-bank.png') }}"
                                                                alt="" />
                                                        </div>
                                                        <h1>Bank</h1>
                                                    </div>
                                                    <span class="check"><i
                                                            class="fa-solid fa-circle-check"></i></span>
                                                </label>

                                                <label for="mastercard" class="mastercardMethod">
                                                    <div class="imgName">
                                                        <div class="imgContainer mastercard">
                                                            <img src="{{ asset('back-end/assets/img/payment-card.png') }}"
                                                                alt="" />
                                                        </div>
                                                        <h1>Card</h1>
                                                    </div>
                                                    <span class="check"><i
                                                            class="fa-solid fa-circle-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="transaction">
                                    <input type="text" id="transactionInput" placeholder="Enter Transaction ID" />
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" onclick="SavePaymentInfo(event)"
                                        class="submit">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                        <!-- Payment End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create Payment Pop Up Modal End -->

    <!-- Link Swiper's JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


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



    <!-- JAVASCRIPT -->

    <script src="{{ asset('back-end/assets/js/fontawesome.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/pos-product-slider.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/orderlist-table-qty.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/finance-popup-modal.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/full-screen-toggle.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/app.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/pos-model-category-click.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/draft-modal.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Include jQuery from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    {{-- Warehose Crud Wor Start  --}}

    <script>
        // Function to close the modal
        function closeModal() {
            const modal = document.getElementById('myModal');
            modal.style.display = 'none'; // Hide the modal
        }

        async function WarehouseSave(event) {
            event.preventDefault(); // Stop form from submitting and reloading the page

            try {
                let WarehouseName = document.getElementById('WarehouseName').value;
                let WarehouseNumber = document.getElementById('WarehouseNumber').value;
                let WarehouseEmail = document.getElementById('WarehouseEmail').value;
                let WarehouseAddress = document.getElementById('WarehouseAddress').value;
                let WarehouseSelectStatus = document.getElementById('WarehouseSelectStatus').value;

                // Validation
                if (WarehouseName.length === 0) {
                    errorToast("Warehouse Name Required!");
                    return false;
                } else if (WarehouseNumber.length === 0) {
                    errorToast("Warehouse Number Required!");
                    return false;
                } else if (WarehouseEmail.length === 0) {
                    errorToast("Warehouse Email Required!");
                    return false;
                } else if (WarehouseAddress.length === 0) {
                    errorToast("Warehouse Address Required!");
                    return false;
                } else if (WarehouseSelectStatus === 0) {
                    errorToast("Select Status Required!");
                    return false;
                }

                // Form Data
                let formData = new FormData();
                formData.append('warehouse_name', WarehouseName);
                formData.append('number', WarehouseNumber);
                formData.append('email', WarehouseEmail);
                formData.append('address', WarehouseAddress);
                formData.append('status', WarehouseSelectStatus);

                // Config for Axios
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Assuming this adds necessary auth headers
                    }
                };

                // Sending POST request to the server
                let res = await axios.post("/api/create-warehouse", formData, config);

                // Handling response
                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset(); // Reset form after success

                    // Close modal
                    const modal = document.getElementById('addWarehouseModal');
                    const modalInstance = bootstrap.Modal.getInstance(modal);
                    modalInstance.hide();

                    // Refresh the Warehouse list dynamically without reloading
                    await refreshWarehouseList(); // Assuming this function refreshes the list

                } else {
                    // Handle unsuccessful response
                    errorToast(res.data['message']);
                }

            } catch (e) {
                // Handle unauthorized or other errors
                if (e.response && e.response.status === 401) {
                    unauthorized(e.response.status);
                } else {
                    errorToast("An error occurred. Please try again.");
                }
            }

            return false;
        }


        // Close Modal Function
        function closeModal() {
            const modal = document.getElementById('addCustomerModal');
            const modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();
        }

        // Save Customer Data
        async function CustomerDataSave(event) {
            event.preventDefault();

            let CustomerName = document.getElementById('CustomerName').value;
            let CustomerMobile = document.getElementById('CustomerMobile').value;
            let CustomerEmail = document.getElementById('CustomerEmail').value;
            let CustomerAddress = document.getElementById('CustomerAddress').value;
            let SellerName = document.getElementById('SellerName').value;

            // Validation
            if (!CustomerName) {
                errorToast("Customer Name Required!");
                return;
            } else if (!CustomerMobile) {
                errorToast("Customer Number Required!");
                return;
            } else if (!CustomerAddress) {
                errorToast("Customer Address Required!");
                return;
            } else if (!SellerName) {
                errorToast("Seller Name Required!");
                return;
            }

            // Form Data
            let formData = new FormData();
            formData.append('name', CustomerName);
            formData.append('mobile', CustomerMobile);
            formData.append('email', CustomerEmail);
            formData.append('address', CustomerAddress);
            formData.append('seller_person_name', SellerName);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            try {
                let res = await axios.post("/api/create-customer", formData, config);

                if (res.data.status === "success") {
                    successToast(res.data.message);
                    document.getElementById("CustomerForm").reset();

                    closeModal();

                    await refreshCustomerList();
                } else {
                    errorToast(res.data.message);
                }
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    unauthorized(error.response.status);
                } else {
                    errorToast("An error occurred. Please try again.");
                }
            }
        }
    </script>




    <script>
        // Add Warehouse
        function addWarehouse() {
            let WarehouseName = document.getElementById('newWarehouseName').value;
            if (WarehouseName) {
                let selectWarehouse = document.getElementById('ADDWareShop');
                let newOption = document.createElement('option');
                newOption.value = WarehouseName;
                newOption.text = WarehouseName;
                selectWarehouse.appendChild(newOption);

                document.getElementById('newWarehouseName').value = '';
                let WarehouseModal = new bootstrap.Modal(document.getElementById('addWarehouseModal'));
                WarehouseModal.hide();
            }
        }
        // Add Customer
        function addCustomer() {
            let WarehouseName = document.getElementById('newCustomerName').value;
            if (WarehouseName) {
                let selectWarehouse = document.getElementById('ADDCustomer');
                let newOption = document.createElement('option');
                newOption.value = WarehouseName;
                newOption.text = WarehouseName;
                selectWarehouse.appendChild(newOption);

                document.getElementById('newCustomerName').value = '';
                let WarehouseModal = new bootstrap.Modal(document.getElementById('addCustomerModal'));
                WarehouseModal.hide();
            }
        }






        refreshWarehouseList();
        refreshCustomerList();

        async function refreshWarehouseList() {
            try {
                // Make a GET request to fetch the Warehouse list
                const res = await axios.get("/api/warehouse-list", HeaderToken());

                // Extract the Warehouse data
                const Warehouse = res.data.WarehouseData;

                // Generate the HTML options dynamically
                const optionsHtmlWarehouse = Warehouse.map(warehouse =>
                    `<option value="${warehouse.id}">${warehouse.warehouse_name}</option>`
                ).join('');

                // Add the default "Select Warehouse" option at the top
                const dropdownHtml = `<option value="none" selected>Select Warehouse</option>` + optionsHtmlWarehouse;

                // Update the dropdown options
                const warehouseDropdown = document.getElementById("ADDWareShop");
                warehouseDropdown.innerHTML = dropdownHtml;

                // Event listener to update hidden input on selection
                warehouseDropdown.addEventListener("change", () => {
                    const selectedWarehouseId = warehouseDropdown.value;
                    document.getElementById("WareHouseID").value = selectedWarehouseId !== "none" ?
                        selectedWarehouseId : "";
                });
            } catch (error) {
                console.error("Error occurred while fetching Warehouses:", error);
            }
        }



        async function refreshCustomerList() {
            try {
                // Make a GET request to fetch the Customer list
                const res = await axios.get("/api/customer-list", HeaderToken());

                // Extract the Customer data
                const Customer = res.data.CustomerData;

                // Generate the HTML options dynamically
                const optionsHtmlCustomer = Customer.map(customer =>
                    `<option value="${customer.id}">${customer.name}</option>`
                ).join('');

                // Add the default "Select Customer" option at the top
                const dropdownHtml = `<option value="none" selected>Select Customer</option>` + optionsHtmlCustomer;

                // Update the dropdown options
                const customerDropdown = document.getElementById("ADDCustomer");
                customerDropdown.innerHTML = dropdownHtml;

                // Event listener to update hidden input on selection
                customerDropdown.addEventListener("change", () => {
                    const selectedCustomerId = customerDropdown.value;
                    document.getElementById("CustomerID").value = selectedCustomerId !== "none" ?
                        selectedCustomerId : "";
                });
            } catch (error) {
                console.error("Error occurred while fetching Customers:", error);
            }
        }

        // Listen for changes on the customer dropdown
        document.getElementById("ADDCustomer").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];

            // Update the draft customer name display
            const draftCustomerName = document.getElementById("draftCustomerName");
            if (selectedOption.value === "none") {
                draftCustomerName.textContent = "None"; // Default message when no customer is selected
            } else {
                draftCustomerName.textContent = selectedOption.textContent;
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#draftDate", {
                dateFormat: "Y-m-d", // Format as Year-Month-Day
                altInput: true, // Show a user-friendly input field
                altFormat: "F j, Y", // e.g., November 21, 2024
                defaultDate: new Date(), // Preselect today's date
                minDate: "today", // Disable past dates
                enableTime: false, // Disable time selection (optional)
                weekNumbers: true, // Show week numbers
                locale: {
                    firstDayOfWeek: 1 // Set Monday as the first day of the week
                },
            });
        });
    </script>

    <!-- Warehose Crud Wor End   -->



    <script>
        // Load Product Category Data
        ProductCategoryData();

        async function ProductCategoryData() {
            try {
                let res = await axios.get("/api/product-category-data-show", HeaderToken());
                $("#ProductCategoryData").empty();

                if (res.data['GetCategoryData'].length === 0) {
                    console.warn("No Product Category Data found");
                    return;
                }

                let allCategory = `
                    <div class="swiper-slide" data-id="0" onclick="loadProductsByCategory(0)" id="allCategory">
                        <a href="#">
                            <div class="slider-item">
                                <div class="product-img">
                                    <img src="{{ asset('back-end/assets/img/all-category-img.png') }}" alt="All" />
                                </div>
                                <div class="shadow"></div>
                            </div>
                        </a>
                        <div class="title">
                            <h1>All</h1>
                        </div>
                    </div>
                `;
                $("#ProductCategoryData").append(allCategory);

                res.data['GetCategoryData'].forEach((item) => {
                    let EachItem = `
                        <div class="swiper-slide" data-id="${item['id']}" onclick="loadProductsByCategory(${item['id']})" id="category-${item['id']}">
                            <a href="#">
                                <div class="slider-item">
                                    <div class="product-img">
                                        <img src="${item['img_url']}" alt="${item['category_name']}" />
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </a>
                            <div class="title">
                                <h1>${item['category_name']}</h1>
                            </div>
                        </div>
                    `;
                    $("#ProductCategoryData").append(EachItem);
                });

                loadProductsByCategory(0); // Default load all products
            } catch (error) {
                console.error("Error fetching Product Category:", error);
            }
        }

        function sanitizeSelector(name) {
            return name.replace(/\W/g, '_');
        }


        let allProducts = []; // Store all products here to filter locally

        // Function to handle the search
        function searchProducts() {
            const searchQuery = document.getElementById("searchInput").value.toLowerCase();

            // Filter products by name or code
            const filteredProducts = allProducts.filter(item => {
                return item['name'].toLowerCase().includes(searchQuery) ||
                    item['code'].toLowerCase().includes(searchQuery);
            });

            // Call the function to render the filtered products
            renderProducts(filteredProducts);
        }

        // Function to load products by category (with search integration)
        async function loadProductsByCategory(categoryId) {
            try {
                $(".swiper-slide").removeClass("active");
                if (categoryId === 0) {
                    $("#allCategory").addClass("active");
                } else {
                    $(`#category-${categoryId}`).addClass("active");
                }

                let res = await axios.get("/api/category-wish-product-data-show", {
                    ...HeaderToken(),
                    params: {
                        category_id: categoryId
                    }
                });

                $("#ProductCategoryWishDataItem").empty();
                allProducts = res.data['ProductFrontData']; // Save products to filter

                if (allProducts.length === 0) {
                    $("#ProductCategoryWishDataItem").html('<p>No products available in this category.</p>');
                    return;
                }

                renderProducts(allProducts); // Render all products by default
            } catch (error) {
                console.error("Error fetching products:", error);
            }
        }

        // Function to render products (filtered or all)
        function renderProducts(products) {
            $("#ProductCategoryWishDataItem").empty();

            if (products.length === 0) {
                $("#ProductCategoryWishDataItem").html('<p>No products found.</p>');
                return;
            }

            products.forEach((item) => {
                // Determine the product's quantity status
                let quantityClass = '';
                let quantityText = `${item['quantity']} pcs`;

                if (item['quantity'] <= 0) {
                    quantityClass = 'out-of-stock';
                    quantityText = 'Out of stock';
                } else if (item['quantity'] < 10) {
                    quantityClass = 'low-stock';
                }

                let productCard = `
           <div class="col-xl-2 col-md-4 col-4 d-flex align-items-stretch" style="background-color: ${quantityClass === 'out-of-stock' ? '#f8d7da' : (quantityClass === 'low-stock' ? '#ffcccc' : '')};">
                <a href="#" onclick="addProductToCart(${item['id']}, '${item['name']}', ${item['price']})" class="card-wrapper">
                    <div class="product-price">
                        <h1>$${item['price']}</h1>
                        <span id="product-quantity-${sanitizeSelector(item['name'])}">${quantityText}</span>
                    </div>
                    <div class="product">
                        <img src="${item['img_url']}" alt="" />
                    </div>
                    <div class="drescription">
                        <h1 class="product-id">${item['code']}</h1>
                        <h2 class="name">${item['name']}</h2>
                    </div>
                </a>
            </div>
        `;

                $("#ProductCategoryWishDataItem").append(productCard);
            });
        }



        let cartItems = [];

        // Modified function to update quantity display with any changes made to the cart
        function updateProductQuantityDisplay() {
            cartItems.forEach(cartItem => {
                const sanitizedProductName = sanitizeSelector(cartItem.name);
                let productElem = document.querySelector(`#product-quantity-${sanitizedProductName}`);
                if (productElem) {
                    let remainingQty = cartItem.originalQuantity - cartItem.quantity;
                    productElem.textContent = `${remainingQty} pcs`;

                    // Check for low stock warning
                    checkProductQuantityWarning(sanitizedProductName);
                }
            });
        }


        //Order Pay model all function start

        function showPayModal() {
            document.getElementById('myModal').style.display = 'block';
            const paymentTableBody = document.getElementById("productTableBody");
            paymentTableBody.innerHTML = "";

            cartItems.forEach((item, index) => {
                const row = `
                <tr data-product-id="${item.id}">
                  <td>${index + 1}</td>
                <td>${item.name}</td>
                <td class="quantity">${item.quantity}</td>
                <td class="price">$${item.price.toFixed(2)}</td>
                </tr>
            `;
                paymentTableBody.insertAdjacentHTML("beforeend", row);
            });

            updatePaymentModalTotals();
        }

        function updatePaymentModalTotals() {
            const PDetailsubtotal = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
            const PDetailshipping = parseFloat(document.getElementById('PDetailshipping').value) || 0;
            const PDetaildiscount = parseFloat(document.getElementById('PDetaildiscount').value) || 0;
            const orderTax = parseFloat(document.getElementById('orderTax').value) || 0;

            const taxAmount = (orderTax / 100) * PDetailsubtotal;
            const totalPayable = PDetailsubtotal + taxAmount + PDetailshipping - PDetaildiscount;
            const totalDuePayable = PDetailsubtotal + taxAmount + PDetailshipping - PDetaildiscount;

            document.getElementById("PDetailsubtotal").textContent = `$${PDetailsubtotal.toFixed(2)}`;
            document.getElementById("tax").textContent = `$${taxAmount.toFixed(2)}`;
            document.getElementById("PDetaildiscount").textContent = `$${PDetaildiscount.toFixed(2)}`;
            document.getElementById("PDetailshipping").textContent = `$${PDetailshipping.toFixed(2)}`;
            document.getElementById("payableAmount").textContent = `$${totalPayable.toFixed(2)}`;
            document.getElementById("totalDuePayable").textContent = `$${totalDuePayable.toFixed(2)}`;
        }

        function calculateDuePayment() {
            const totalPayable = parseFloat(document.getElementById("payableAmount").textContent.replace('$', '')) || 0;
            const paidAmount = parseFloat(document.getElementById("paidAmountInput").value) || 0;

            // Calculate due amount
            const dueAmount = totalPayable - paidAmount;

            // Update due amount in the DOM
            document.getElementById("totalDuePayable").textContent = `$${dueAmount.toFixed(2)}`;

            // Update payment status based on the due amount
            const statusElement = document.getElementById("paymentStatusDisplay");
            if (dueAmount === 0) {
                statusElement.textContent = "Paid in Full";
                statusElement.className = "paid-in-full-status"; // Add a unique class for styling
            } else if (dueAmount > 0) {
                statusElement.textContent = "Partial Paid";
                statusElement.className = "partial-payment-status";
            } else if (dueAmount < 0) {
                statusElement.textContent = "Overpaid";
                statusElement.className = "overpaid-status";
            }
        }

        function updateShippingAndDiscount() {
            const shippingValue = parseFloat(document.getElementById('shipping').value) || 0;
            const discountValue = parseFloat(document.getElementById('discount').value) || 0;

            document.getElementById('PDetailshipping').value = shippingValue.toFixed(2);
            document.getElementById('PDetaildiscount').value = discountValue.toFixed(2);
            document.getElementById('PDetailshipping').textContent = `$${shippingValue.toFixed(2)}`;
            document.getElementById('PDetaildiscount').textContent = `$${discountValue.toFixed(2)}`;

            calculateSubtotal();
        }

        // Modified calculateSubtotal function to consider shipping and discount
        function calculateSubtotal() {
            const subtotalValue = cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);

            updateShippingAndDiscount();

            const shipping = parseFloat(document.getElementById('PDetailshipping').value) || 0;
            const discount = parseFloat(document.getElementById('PDetaildiscount').value) || 0;
            const orderTax = parseFloat(document.getElementById('orderTax').value) || 0;

            const taxAmount = (orderTax / 100) * subtotalValue;
            const totalAmount = subtotalValue + taxAmount + shipping - discount;

            document.getElementById("subtotal").textContent = `$${subtotalValue.toFixed(2)}`;
            document.getElementById("tax").textContent = `$${taxAmount.toFixed(2)}`;
            document.getElementById("total").textContent = `$${totalAmount.toFixed(2)}`;
        }

        document.getElementById('shipping').addEventListener('input', updateShippingAndDiscount);
        document.getElementById('discount').addEventListener('input', updateShippingAndDiscount);

        window.onload = function() {
            calculateSubtotal();
        };

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
        // Pay model all function end


        function showdraftModal() {
            document.getElementById('draftModal').style.display = 'block';
            const DraftTableBody = document.getElementById("draftTableBody");
            DraftTableBody.innerHTML = ""; // Clear previous entries

            // Loop through cartItems and create rows for each item
            cartItems.forEach((item, index) => {
                const row = `
            <tr data-product-id="${item.id}">
                <td>${index + 1}</td>
                <td>${item.name}</td>
                <td class="quantity">${item.quantity}</td>
                <td class="price">$${item.price.toFixed(2)}</td>
            </tr>
        `;
                DraftTableBody.insertAdjacentHTML("beforeend", row);
            });

            updateDraftModalTotals(); // Update totals (you should define this function if needed)
        }







        function updateDraftModalTotals() {
            // Calculate draft subtotal
            const draftSubtotal = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);

            // Get values from the DOM or default to 0
            const draftShipping = parseFloat(document.getElementById('draftShipping').value) || 0;
            const draftDiscount = parseFloat(document.getElementById('draftDiscount').value) || 0;
            const draftTaxRate = parseFloat(document.getElementById('draftTax').value) || 0;

            // Calculate tax amount based on the subtotal and tax rate
            const draftTaxAmount = (draftTaxRate / 100) * draftSubtotal;

            // Calculate total payable
            const draftTotal = draftSubtotal + draftTaxAmount + draftShipping - draftDiscount;

            // Update the modal with the calculated values
            document.getElementById("draftSubtotal").textContent = `$${draftSubtotal.toFixed(2)}`;
            document.getElementById("draftTax").textContent = `$${draftTaxAmount.toFixed(2)} (${draftTaxRate}%)`;
            document.getElementById("draftDiscount").textContent = `$${draftDiscount.toFixed(2)}`;
            document.getElementById("draftShipping").textContent = `$${draftShipping.toFixed(2)}`;
            document.getElementById("draftTotal").textContent = `$${draftTotal.toFixed(2)}`;
        }



        function updateDraftShippingAndDiscount() {
            const shippingDraftValue = parseFloat(document.getElementById('shipping').value) || 0;
            const discountDraftValue = parseFloat(document.getElementById('discount').value) || 0;

            document.getElementById('draftShipping').value = shippingDraftValue.toFixed(2);
            document.getElementById('draftDiscount').value = discountDraftValue.toFixed(2);
            document.getElementById('draftShipping').textContent = `$${shippingDraftValue.toFixed(2)}`;
            document.getElementById('draftDiscount').textContent = `$${discountDraftValue.toFixed(2)}`;

            calculateSubtotal();
        }

        // Modified calculateSubtotal function to consider shipping and discount
        function calculateSubtotal() {
            const subtotalValue = cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);

            updateDraftShippingAndDiscount();

            const shipping = parseFloat(document.getElementById('draftShipping').value) || 0;
            const discount = parseFloat(document.getElementById('draftDiscount').value) || 0;
            const draftTax = parseFloat(document.getElementById('draftTax').value) || 0;

            const DrafttaxAmount = (draftTax / 100) * subtotalValue;
            const DradttotalAmount = subtotalValue + DrafttaxAmount + shipping - discount;

            document.getElementById("subtotal").textContent = `$${subtotalValue.toFixed(2)}`;
            document.getElementById("tax").textContent = `$${DrafttaxAmount.toFixed(2)}`;
            document.getElementById("total").textContent = `$${DradttotalAmount.toFixed(2)}`;
        }

        document.getElementById('shipping').addEventListener('input', updateDraftShippingAndDiscount);
        document.getElementById('discount').addEventListener('input', updateDraftShippingAndDiscount);

        function calculateDuePayment() {
            const totalPayable = parseFloat(document.getElementById("payableAmount").textContent.replace('$', '')) || 0;
            const paidAmount = parseFloat(document.getElementById("paidAmountInput").value) || 0;

            // Calculate due amount
            const dueAmount = totalPayable - paidAmount;

            // Update due amount in the DOM
            document.getElementById("totalDuePayable").textContent = `$${dueAmount.toFixed(2)}`;

            // Update payment status based on the due amount
            const statusElement = document.getElementById("paymentStatusDisplay");
            if (dueAmount === 0) {
                statusElement.textContent = "Paid in Full";
                statusElement.className = "paid-in-full-status"; // Add a unique class for styling
            } else if (dueAmount > 0) {
                statusElement.textContent = "Partial Paid";
                statusElement.className = "partial-payment-status";
            } else if (dueAmount < 0) {
                statusElement.textContent = "Overpaid";
                statusElement.className = "overpaid-status";
            }
        }

        // Draft model js code end


        function addProductToCart(productId, productName, productPrice) {
            const sanitizedProductName = sanitizeSelector(productName);

            // Check if the product already exists in the cart
            const existingItem = cartItems.find(item => item.id === productId);
            if (existingItem) {
                existingItem.quantity += 1; // Increment the quantity
            } else {
                const productQuantityElem = document.querySelector(`#product-quantity-${sanitizedProductName}`);
                const originalQuantity = parseInt(productQuantityElem.textContent) || 0;

                // Add the new product to the cart
                cartItems.push({
                    id: productId, // Include the product_id
                    name: productName,
                    price: productPrice,
                    quantity: 1,
                    originalQuantity: originalQuantity
                });
            }

            // Update the UI and calculations
            updateProductQuantityDisplay();
            calculateSubtotal();
            renderCart();

            // Check product warnings
            checkProductQuantityWarning(sanitizedProductName);
            checkOutOfStock(sanitizedProductName);
        }


        // Function to check product quantity and show SMS alert if less than 10
        function checkProductQuantityWarning(sanitizedProductName) {
            const product = cartItems.find(item => sanitizeSelector(item.name) === sanitizedProductName);
            if (product && product.originalQuantity <= 10 && product.quantity >= product.originalQuantity) {
                // Show SMS alert
                alert(
                    `SMS: The product ${product.name} is running low on stock. Only ${product.originalQuantity} pcs left.`
                );
            }
        }

        // Function to check if the product is out of stock
        function checkOutOfStock(sanitizedProductName) {
            const product = cartItems.find(item => sanitizeSelector(item.name) === sanitizedProductName);
            if (product && product.quantity >= product.originalQuantity) {
                // Show popup for out of stock
                alert(`Out of Stock: ${product.name} is out of stock!`);
                // Optionally remove the item from the cart
                removeFromCart(cartItems.indexOf(product));
            }
        }

        // Modified renderCart to reflect the updated cart behavior
        function renderCart() {
            const cartTableBody = document.querySelector("table tbody");
            cartTableBody.innerHTML = "";

            cartItems.forEach((item, index) => {
                const row = document.createElement("tr");
                row.innerHTML = `
            <td><div class="product"><h2>${item.name}</h2></div></td>
            <td><h1 class="price">$${item.price}</h1></td>
            <td>
                <div class="quantity-controls">
                    <button onclick="decreaseQuantity(${index})">-</button>
                    <span class="quantity">${item.quantity}</span>
                    <button onclick="increaseQuantity(${index})">+</button>
                </div>
            </td>
            <td><h1 class="price">$${(item.price * item.quantity).toFixed(2)}</h1></td>
            <td><a href="#" onclick="removeFromCart(${index})">Remove</a></td>
        `;
                cartTableBody.appendChild(row);
            });

            calculateSubtotal();
            updateProductQuantityDisplay();
        }


        function calculateSubtotal() {
            const subtotalValue = cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);
            document.getElementById("subtotal").textContent = `$${subtotalValue.toFixed(2)}`;
            calculateTotal(subtotalValue);
        }

        function calculateTotal(subtotalValue) {
            const orderTax = parseFloat(document.getElementById('orderTax').value) || 0;
            const shipping = parseFloat(document.getElementById('shipping').value) || 0;
            const discountValue = parseFloat(document.getElementById("discount").value) || 0;

            const taxAmount = (orderTax / 100) * subtotalValue;
            const totalAmount = subtotalValue + taxAmount + shipping - discountValue;

            document.getElementById("total").textContent = `$${totalAmount.toFixed(2)}`;
        }

        function increaseQuantity(index) {
            cartItems[index].quantity += 1;
            renderCart();
        }

        function decreaseQuantity(index) {
            if (cartItems[index].quantity > 1) {
                cartItems[index].quantity -= 1;
            } else {
                cartItems.splice(index, 1);
            }
            renderCart();
        }

        function removeFromCart(index) {
            cartItems.splice(index, 1);
            renderCart();
        }

        function resetForm() {
            // Show a confirmation alert
            const userConfirmed = confirm(
                "Are you sure you want to reset the cart? This will remove all items and restore product quantities.");

            if (userConfirmed) {
                // Reset form fields
                document.getElementById('orderForm').reset();

                // Reset all product quantities to their original values
                cartItems.forEach(cartItem => {
                    const sanitizedProductName = sanitizeSelector(cartItem.name);
                    const productElem = document.querySelector(`#product-quantity-${sanitizedProductName}`);
                    if (productElem) {
                        productElem.textContent = `${cartItem.originalQuantity} pcs`;
                    }
                });

                // Clear the cart
                cartItems = [];

                // Update cart UI
                renderCart();

                // Reset total
                document.getElementById("total").textContent = `$0.00`;

                // alert("Cart has been reset!");
            } else {
                // If the user cancels, do nothing
                // alert("Reset canceled!");
            }
        }
    </script>


    <!-- Draft Data js Function Start  -->
    <script>
        async function saveDraft(event) {
            if (event) event.preventDefault(); // Prevent form submission

            // Fetch input values
            const draftOrderNumber = document.getElementById('DraftOrderNumber');
            const draftCustomerName = document.getElementById('draftCustomerName'); // Use textContent, not value
            const draftDate = document.getElementById('draftDate');
            const draftSubtotal = document.getElementById('draftSubtotal');
            const draftDiscount = document.getElementById('draftDiscount');
            const draftShipping = document.getElementById('draftShipping');
            const draftTotal = document.getElementById('draftTotal');

            // Validate inputs
            if (!draftCustomerName || !draftCustomerName.textContent.trim()) {
                return alert("Draft Customer Name is required!");
            }
            if (!draftDate || !draftDate.value.trim()) {
                return alert("Draft Date is required!");
            }

            // Prepare product data from the table rows
            const products = [];
            const rows = document.querySelectorAll('#draftTableBody tr');

            rows.forEach(row => {
                const productId = row.getAttribute('data-product-id'); // Get product ID from the data attribute
                const quantityElement = row.querySelector('.quantity'); // Fetch the quantity cell
                const priceElement = row.querySelector('.price'); // Fetch the price cell

                const quantity = quantityElement ? parseInt(quantityElement.textContent.trim()) :
                    0; // Get quantity from textContent
                const price = priceElement ? parseFloat(priceElement.textContent.replace('$', '').trim()) :
                    0; // Get price from textContent

                // Only push products with valid quantity and product_id
                if (quantity > 0 && productId) {
                    products.push({
                        product_id: productId,
                        quantity,
                        price
                    });
                }
            });

            // Ensure at least one product is added
            if (products.length === 0) {
                return alert("At least one product with a valid quantity must be added!");
            }

            // Prepare the form data to be sent to the backend
            const formData = new FormData();
            formData.append('order_no', draftOrderNumber.value || ''); // Handle empty input
            formData.append('customer_name', draftCustomerName.textContent.trim()); // Use textContent
            formData.append('date', draftDate.value);
            formData.append('sub_total', parseFloat(draftSubtotal.textContent.replace('$', '').trim()).toFixed(
                2)); // Correct handling of currency
            formData.append('totalamount', parseFloat(draftTotal.textContent.replace('$', '').trim()).toFixed(
                2)); // Fix this
            formData.append('discount', parseFloat(draftDiscount.textContent.replace('$', '').trim()).toFixed(2));
            formData.append('shipping_cost', parseFloat(draftShipping.textContent.replace('$', '').trim()).toFixed(2));
            formData.append('products', JSON.stringify(products)); // Send the products as a JSON string

            try {
                // Send the form data to the backend via an API call
                const res = await axios.post('/api/create-draft', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken().headers, // Add headers as needed (like CSRF token)
                    },
                });

                if (res.data.status === "success") {
                    successToast(res.data.message); // Show success message
                    document.getElementById("DraftForm").reset();
                    RecentDataShow(); // Refresh the draft list
                    closeDraftModal();
                } else {
                    errorToast(res.data.message); // Show error message
                }
            } catch (error) {
                console.error("Error draft create:", error);
                if (error.response?.status === 401) {
                    unauthorized(error.response?.status); // Handle unauthorized error
                }
            }
        }
    </script>


    <script>
        // Fetch and render recent drafts
        async function RecentDataShow(searchQuery = '') {
            try {
                // Fetch draft data
                const response = await axios.get(`/api/draft-data-list?search=${searchQuery}`, HeaderToken());
                const drafts = response.data.DraftData || [];
                const container = document.getElementById("RecentDataShow");
                container.innerHTML = ''; // Clear previous data

                if (drafts.length === 0) {
                    container.innerHTML = '<p>No Drafts found</p>';
                    return;
                }

                // Filter drafts based on search query
                const filteredDrafts = drafts.filter(draft => {
                    const orderNo = draft.order_no.toString().toLowerCase();
                    const customerName = (draft.customer_name || '').toLowerCase();
                    return orderNo.includes(searchQuery.toLowerCase()) || customerName.includes(searchQuery
                        .toLowerCase());
                });

                // Sort drafts to prioritize matching `order_no`
                filteredDrafts.sort((a, b) => {
                    const query = searchQuery.toLowerCase();
                    const orderNoA = a.order_no.toString().toLowerCase();
                    const orderNoB = b.order_no.toString().toLowerCase();

                    // Bring drafts with matching `order_no` to the top
                    if (orderNoA.includes(query) && !orderNoB.includes(query)) return -1;
                    if (!orderNoA.includes(query) && orderNoB.includes(query)) return 1;
                    return 0;
                });

                // Render filtered drafts
                filteredDrafts.forEach((draft) => {
                    const orderItem = `
                    <div class="order-item" data-draft-id="${draft.id}">
                        <div class="number">
                            <i class="fa-solid fa-arrow-right"></i>
                            <p>Order No. ${draft.order_no}</p>
                        </div>
                        <button class="dlt-btn" data-draft-id="${draft.id}">
                            <svg
                        width="44"
                        height="44"
                        viewBox="0 0 44 44"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <rect
                          y="0.00012207"
                          width="44"
                          height="44"
                          rx="4"
                          fill="#FFD5D5"
                        ></rect>
                        <path
                          d="M29.4643 37.0001H14.5358C13.2262 37.0001 12.3096 35.9335 12.3096 34.7335V14.7335H31.6905V34.6001C31.6905 35.9335 30.6429 37.0001 29.4643 37.0001Z"
                          stroke="#FF0000"
                          stroke-width="2"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></path>
                        <path
                          d="M33 13.9335V11.5335C33 10.6001 32.2143 9.80012 31.2976 9.80012H26.4524L25.9286 7.80012C25.6667 7.26679 25.2738 7.00012 24.619 7.00012H19.381C18.8571 7.00012 18.3333 7.26679 18.0714 7.80012L17.5476 9.66679H12.7024C11.7857 9.66679 11 10.4668 11 11.4001V13.9335C11 14.3335 11.3929 14.7335 11.7857 14.7335H32.2143C32.7381 14.7335 33 14.3335 33 13.9335Z"
                          stroke="#FF0000"
                          stroke-width="2"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></path>
                        <path
                          d="M17.8096 19.5334V32.2001"
                          stroke="#FF0000"
                          stroke-width="2"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></path>
                        <path
                          d="M22 19.5334V32.2001"
                          stroke="#FF0000"
                          stroke-width="2"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></path>
                        <path
                          d="M26.1904 19.5334V32.2001"
                          stroke="#FF0000"
                          stroke-width="2"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></path>
                      </svg>
                        </button>
                    </div>
                `;
                    container.innerHTML += orderItem;
                });

                // Attach events for draft actions
                $(".dlt-btn").off("click").on("click", function(event) {
                    event.stopPropagation();
                    const draftId = $(this).data("draft-id");
                    if (confirm("Are you sure you want to delete this draft?")) {
                        itemDelete(draftId);
                    }
                });

                $(".order-item").off("click").on("click", function() {
                    const draftId = $(this).data("draft-id");
                    const selectedDraft = drafts.find((d) => d.id === draftId);
                    if (selectedDraft) displayDraftDetails(selectedDraft);
                });
            } catch (error) {
                console.error("Error fetching drafts:", error);
            }
        }

        // Display draft details and update order summary
        function displayDraftDetails(draft) {
            $("#RcecntDraftCustomerName").html(draft.customer_name || 'N/A');
            $("#RcecntDraftDate").html(draft.date || 'N/A');

            const products = draft.products || [];
            const productRows = products.map((p, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${p.name || 'N/A'}</td>
                <td>${p.quantity || 0}</td>
                <td>$${parseFloat(p.price || 0).toFixed(2)}</td>
            </tr>
        `).join('');
            $("#DraftProductInfo").html(productRows);

            // Update order summary
            const subTotal = parseFloat(draft.sub_total || 0);
            const tax = parseFloat(draft.tax || 0);
            const discount = parseFloat(draft.discount || 0);
            const shippingCost = parseFloat(draft.shipping_cost || 0);
            const total = subTotal + tax + shippingCost - discount;

            $("#OrderSubTotal").text(`$${subTotal.toFixed(2)}`);
            $("#OrderTax").text(`$${tax.toFixed(2)}`);
            $("#OrderShipping").text(`$${shippingCost.toFixed(2)}`);
            $("#OrderDiscount").text(`$${discount.toFixed(2)}`);
            $("#OrderTotal").text(`$${total.toFixed(2)}`);
        }

        // Delete draft
        async function itemDelete(draftId) {
            try {
                const res = await axios.post("/api/delete-draft", {
                    id: draftId
                }, HeaderToken());
                if (res.data.status === "success") {
                    alert(res.data.message); // Replace with a toast if needed
                    RecentDataShow();
                } else {
                    alert(res.data.message);
                }
            } catch (error) {
                console.error("Error deleting draft:", error);
            }
        }

        // Handle search input
        $("#DraftSearch").on("input", function() {
            const query = $(this).val().trim();
            RecentDataShow(query); // Fetch and filter data based on query
        });

        // Initialize the draft list
        RecentDataShow();

        document.addEventListener("DOMContentLoaded", () => {
            const paymentMethods = document.querySelectorAll('input[name="payment"]');
            const transactionInput = document.getElementById("transactionInput");

            // Highlight selected payment method
            paymentMethods.forEach(method => {
                method.addEventListener("change", (event) => {
                    const selectedMethod = event.target.id;

                    // Clear previous highlights
                    document.querySelectorAll(".category label").forEach(label => {
                        label.classList.remove("selected");
                    });

                    // Highlight current selection
                    const selectedLabel = document.querySelector(`label[for="${selectedMethod}"]`);
                    if (selectedLabel) {
                        selectedLabel.classList.add("selected");
                    }

                    // Toggle transaction input visibility for non-cash methods
                    if (selectedMethod === "cash") {
                        transactionInput.style.display = "none";
                        transactionInput.value = ""; // Clear any existing value
                    } else {
                        transactionInput.style.display = "block";
                        transactionInput.placeholder =
                            `Enter ${selectedMethod.charAt(0).toUpperCase() + selectedMethod.slice(1)} Transaction ID`;
                    }
                });
            });

            // Validate form submission
            const form = document.querySelector("form");
            form.addEventListener("submit", (event) => {
                event.preventDefault(); // Prevent default form submission

                const selectedMethod = document.querySelector('input[name="payment"]:checked');
                if (!selectedMethod) {
                    alert("Please select a payment method!");
                    return;
                }

                if (selectedMethod.id !== "cash" && !transactionInput.value.trim()) {
                    alert("Please enter a valid transaction ID!");
                    transactionInput.focus();
                    return;
                }

                // Process payment
                alert(
                    `Payment method: ${selectedMethod.id}\nTransaction ID: ${transactionInput.value.trim() || "N/A"}`
                );
                form.reset(); // Clear the form
                document.querySelectorAll(".category label").forEach(label => label.classList.remove(
                    "selected")); // Clear selection
                transactionInput.style.display = "none"; // Hide transaction input
            });
        });
    </script>



    <!-- Draft Data js Function end  -->





    {{-- Payment Details Insert DaTa Functionaity Stat  --}}
    {{-- <script>
        async function SavePaymentInfo(event) {
            if (event) event.preventDefault(); // Prevent form submission

            // Fetch input values
            const warehouseId = document.getElementById('WareHouseID').value.trim();
            const customerId = document.getElementById('CustomerID').value.trim();
            const paidAmount = parseFloat(document.getElementById('paidAmountInput').value) || 0;
            const dueAmount = parseFloat(document.getElementById('totalDuePayable').textContent.replace('$', '')) || 0;
            const discountAmount = parseFloat(document.getElementById('PDetaildiscount').textContent.replace('$', '')) || 0;
            const shippingCost = parseFloat(document.getElementById('PDetailshipping').textContent.replace('$', '')) || 0;
            const subTotal = parseFloat(document.getElementById('PDetailsubtotal').textContent.replace('$', '')) || 0;
            const totalAmount = subTotal + shippingCost - discountAmount;
            const transactionId = document.getElementById('transactionInput').value.trim();
            const paymentMethod = document.querySelector('input[name="payment"]:checked')?.id;

            // Prepare product data from the table rows
            const products = [];
            const rows = document.querySelectorAll('#productTableBody tr');

            rows.forEach(row => {
                const productId = row.getAttribute('data-product-id'); // Get product ID from the data attribute
                const quantityElement = row.querySelector('.quantity'); // Fetch the quantity cell
                const priceElement = row.querySelector('.price'); // Fetch the price cell

                const quantity = quantityElement ? parseInt(quantityElement.textContent.trim()) : 0;
                const price = priceElement ? parseFloat(priceElement.textContent.replace('$', '').trim()) : 0;

                // Only push products with valid quantity and product_id
                if (quantity > 0 && productId) {
                    products.push({ product_id: productId, quantity, price });
                }
            });

            // Ensure all required fields are filled
            if (!warehouseId) return alert("Warehouse is required!");
            if (!customerId) return alert("Customer is required!");
            if (products.length === 0) return alert("At least one product with a valid quantity must be added!");
            if (!paymentMethod) return alert("Please select a payment method!");
            if (!transactionId) return alert("Transaction ID is required!");

            // Prepare the form data to be sent to the backend
            const formData = new FormData();
            formData.append('warehouse_id', warehouseId);
            formData.append('customer_id', customerId);
            formData.append('paid_amount', paidAmount);
            formData.append('due_amount', dueAmount);
            formData.append('discount_amount', discountAmount);
            formData.append('shipping_cost', shippingCost);
            formData.append('sub_total', subTotal);
            formData.append('total_amount', totalAmount);
            formData.append('transaction_id', transactionId);
            formData.append('payment_method', paymentMethod);
            formData.append('products', JSON.stringify(products)); // Send the products as a JSON string

            try {
                // Send the form data to the backend via an API call
                const res = await axios.post('/api/create-order', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken().headers, // Add headers as needed (like CSRF token)
                    },
                });

                if (res.data.status === "success") {
                    successToast(res.data.message); // Show success message
                    resetFormInputs(); // Reset form inputs
                    RecentDataShow(); // Refresh the draft list
                    closeModal(); // Close the modal
                } else {
                    errorToast(res.data.message); // Show error message
                }
            } catch (error) {
                console.error("Error in creating order:", error);
                if (error.response?.status === 401) {
                    unauthorized(error.response?.status); // Handle unauthorized error
                } else {
                    errorToast("Something went wrong. Please try again later.");
                }
            }
        }

        // Helper function to reset form inputs
        function resetFormInputs() {
            document.getElementById('paidAmountInput').value = '';
            document.getElementById('transactionInput').value = '';
            document.querySelectorAll('input[name="payment"]').forEach(input => input.checked = false);
            document.getElementById('productTableBody').innerHTML = ''; // Clear product table
            document.getElementById('PDetailsubtotal').textContent = '$0.00';
            document.getElementById('PDetaildiscount').textContent = '$0.00';
            document.getElementById('PDetailshipping').textContent = '$0.00';
            document.getElementById('payableAmount').textContent = '$0.00';
            document.getElementById('totalDuePayable').textContent = '$0.00';
            document.getElementById('paymentStatusDisplay').textContent = 'Partial Paid';
            document.getElementById('paymentStatusDisplay').className = 'partial-payment-status';
        }

        // Close modal function
        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script> --}}


<script>
    async function SavePaymentInfo(event) {
    if (event) event.preventDefault(); // Prevent form submission

    // Fetch input values
    const warehouseId = document.getElementById('WareHouseID')?.value.trim();
    const customerId = document.getElementById('CustomerID')?.value.trim();
    const paidAmount = parseFloat(document.getElementById('paidAmountInput')?.value) || 0;
    const dueAmount = parseFloat(document.getElementById('totalDuePayable')?.textContent.replace('$', '')) || 0;
    const discountAmount = parseFloat(document.getElementById('PDetaildiscount')?.textContent.replace('$', '')) || 0;
    const shippingCost = parseFloat(document.getElementById('PDetailshipping')?.textContent.replace('$', '')) || 0;
    const subTotal = parseFloat(document.getElementById('PDetailsubtotal')?.textContent.replace('$', '')) || 0;
    const totalAmount = (subTotal + shippingCost - discountAmount).toFixed(2);
    const transactionId = document.getElementById('transactionInput')?.value.trim();
    const paymentMethod = document.querySelector('input[name="payment"]:checked')?.id;

    // Prepare product data from the table rows
    const products = [];
    const rows = document.querySelectorAll('#productTableBody tr');

    rows.forEach(row => {
        const productId = row.getAttribute('data-product-id'); // Get product ID
        const quantityElement = row.querySelector('.quantity');
        const priceElement = row.querySelector('.price');

        const quantity = quantityElement ? parseInt(quantityElement.textContent.trim()) : 0;
        const price = priceElement ? parseFloat(priceElement.textContent.replace('$', '').trim()) : 0;

        if (quantity > 0 && productId) {
            products.push({ product_id: productId, quantity, price });
        }
    });

    // Validations
    if (!warehouseId) return alert("Warehouse is required!");
    if (!customerId) return alert("Customer is required!");
    if (products.length === 0) return alert("At least one product with valid quantity is required!");
    if (!paymentMethod) return alert("Please select a payment method!");
    if (!transactionId) return alert("Transaction ID is required!");

    // Prepare form data
    const formData = new FormData();
    formData.append('warehouse_id', warehouseId);
    formData.append('customer_id', customerId);
    formData.append('paid_amount', paidAmount);
    formData.append('due_amount', dueAmount);
    formData.append('discount_amount', discountAmount);
    formData.append('shipping_cost', shippingCost);
    formData.append('sub_total', subTotal);
    formData.append('totalamount', totalAmount);
    formData.append('transaction_id', transactionId);
    formData.append('payment_method', paymentMethod);
    formData.append('products', JSON.stringify(products));

    try {
        const res = await axios.post('/api/create-order', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                ...HeaderToken()?.headers,
            },
        });

        if (res.data.status === "success") {
            successToast(res.data.message); // Display success
            resetFormInputs(); // Reset form
            RecentDataShow(); // Refresh the data
            closeModal(); // Close modal
        } else {
            errorToast(res.data.message); // Display error
        }
    } catch (error) {
        console.error("Error in creating order:", error);
        errorToast("An error occurred. Please try again.");
    }
}

// Reset form
function resetFormInputs() {
    document.getElementById('orderForm').reset();
    document.getElementById('productTableBody').innerHTML = ''; // Clear table rows
    // Reset other UI fields
}

</script>


    {{-- Payment Details Insert DaTa Functionaity End  --}}




    <style>
        .paid-in-full-status {
            color: green;
            font-weight: bold;
        }

        .partial-payment-status {
            color: orange;
            font-weight: bold;
        }

        .overpaid-status {
            color: red;
            font-weight: bold;
        }
    </style>







</body>

</html>
