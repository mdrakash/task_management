<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Task</a></li>
          <li class="breadcrumb-item"><a href="#">All Task</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Product Development
          </li>
        </ol>
        <!-- page title -->
        <div class="page-title">
          <h2>Product Development</h2>
          <div class="d-flex align-items-center gap-5">
            <span>Create Date: 25 September 2024</span>
            <span>Due Date: 15 October 2024</span>
          </div>
        </div>
        <!-- page title -->
        <div class="member-board d-flex align-items-center justify-content-between">
          <div>
            <p>Member on Board</p>
            <div class="ms-member">
              <ul>
                <li>
                  <img src="/assets/images/members/member-1.png" alt="member" />
                </li>
                <li>
                  <img src="/assets/images/members/member-1.png" alt="member" />
                </li>
                <li>
                  <img src="/assets/images/members/member-1.png" alt="member" />
                </li>
                <li>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M14 14.252V16.342C13.0949 16.022 12.1263 15.9239 11.1754 16.0558C10.2245 16.1877 9.3192 16.5459 8.53543 17.1002C7.75166 17.6545 7.11234 18.3888 6.67116 19.2414C6.22998 20.094 5.99982 21.04 6 22L4 21.999C3.99969 20.7779 4.27892 19.5729 4.8163 18.4764C5.35368 17.3799 6.13494 16.4209 7.10022 15.673C8.0655 14.9251 9.18918 14.4081 10.3852 14.1616C11.5811 13.9152 12.8177 13.9457 14 14.251V14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"
                      fill="white" />
                  </svg>
                </li>
              </ul>
            </div>
          </div>
          <div class="share d-flex gap-5 align-items-center">
            <a href="#">
              Share
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_4_3033)">
                  <path
                    d="M13 14H11C9.3596 13.9994 7.75023 14.4471 6.34588 15.2949C4.94152 16.1427 3.7956 17.3582 3.032 18.81C3.01054 18.5405 2.99986 18.2703 3 18C3 12.477 7.477 8 13 8V3L23 11L13 19V14Z"
                    fill="#25272B" />
                </g>
                <defs>
                  <clipPath id="clip0_4_3033">
                    <rect width="24" height="24" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
            <button type="button" class="btn btn-danger">
              New Board
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.7" clip-path="url(#clip0_4_3614)">
                  <path
                    d="M9.16675 9.16663V4.16663H10.8334V9.16663H15.8334V10.8333H10.8334V15.8333H9.16675V10.8333H4.16675V9.16663H9.16675Z"
                    fill="white" />
                </g>
                <defs>
                  <clipPath id="clip0_4_3614">
                    <rect width="20" height="20" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </button>
          </div>
        </div>
    </nav>
</template>