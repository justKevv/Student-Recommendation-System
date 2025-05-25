@extends('layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="flex items-start justify-between gap-[60px]">
        <div class="space-y-6">
            <div class="w-[1000px] h-64 relative">
                <div
                    class="w-[1000px] h-64 left-0 top-0 absolute bg-dashboard2 rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]">
                </div>
                <img class="w-[711px] h-64 right-0 top-0 absolute"
                    src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashbard_assest_37641278.png" />
                <div class="w-36 h-12 left-[27px] top-[175px] absolute bg-main rounded-[30px]"></div>
                <div
                    class="left-[27px] top-[23px] absolute justify-center text-main text-xs font-medium font-['Poppins']">
                    FIND INTERNSHIP</div>
                <div
                    class="left-[27px] top-[54px] absolute justify-center text-main text-3xl font-semibold font-['Poppins']">
                    Kickstart Your Career with</div>
                <div
                    class="left-[27px] top-[97px] absolute justify-center text-main text-3xl font-semibold font-['Poppins']">
                    Top Internship Opportunities</div>
                <div class="size- left-[44px] top-[184px] absolute inline-flex justify-start items-center gap-5">
                    <div class="justify-center text-white text-xs font-medium font-['Poppins']">Apply Now</div>
                    <div data-svg-wrapper>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 0C12.8355 0 9.74207 0.938384 7.11088 2.69649C4.4797 4.45459 2.42894 6.95345 1.21793 9.87706C0.00693244 12.8007 -0.309921 16.0177 0.307443 19.1214C0.924806 22.2251 2.44866 25.0761 4.6863 27.3137C6.92394 29.5513 9.77486 31.0752 12.8786 31.6926C15.9823 32.3099 19.1993 31.9931 22.1229 30.7821C25.0466 29.5711 27.5454 27.5203 29.3035 24.8891C31.0616 22.2579 32 19.1645 32 16C31.9955 11.7579 30.3084 7.69085 27.3088 4.69124C24.3092 1.69163 20.2421 0.00447972 16 0ZM20.5631 16.8708L14.4092 23.0246C14.2949 23.139 14.1591 23.2297 14.0097 23.2916C13.8603 23.3534 13.7002 23.3853 13.5385 23.3853C13.3767 23.3853 13.2166 23.3534 13.0672 23.2916C12.9178 23.2297 12.782 23.139 12.6677 23.0246C12.5533 22.9103 12.4626 22.7745 12.4008 22.6251C12.3389 22.4757 12.307 22.3156 12.307 22.1538C12.307 21.9921 12.3389 21.832 12.4008 21.6826C12.4626 21.5332 12.5533 21.3974 12.6677 21.2831L17.9523 16L12.6677 10.7169C12.4368 10.486 12.307 10.1728 12.307 9.84615C12.307 9.51955 12.4368 9.20632 12.6677 8.97538C12.8986 8.74444 13.2119 8.6147 13.5385 8.6147C13.8651 8.6147 14.1783 8.74444 14.4092 8.97538L20.5631 15.1292C20.6775 15.2435 20.7683 15.3793 20.8302 15.5287C20.8922 15.6781 20.924 15.8383 20.924 16C20.924 16.1617 20.8922 16.3219 20.8302 16.4713C20.7683 16.6207 20.6775 16.7565 20.5631 16.8708Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-[1000px] h-64 relative rounded-[30px]">
                <div class="left-[4px] top-0 absolute justify-center text-main text-xl font-medium font-['Poppins']">
                    Your Internship</div>
                <div
                    class="w-[1000px] h-52 left-0 top-[45px] absolute opacity-80 bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.05)]">
                </div>
            </div>
            <div class="w-[1000px] h-96 relative">
                <div class="left-0 top-0 absolute justify-center text-main text-xl font-medium font-['Poppins']">
                    Continue Looking</div>
                <div class="size- right-0 top-0 absolute inline-flex justify-start items-center gap-3.5">
                    <div class="size-7 px-5 py-[5px] bg-main rounded-[20px] flex justify-center items-center gap-[5px]">
                        <div data-svg-wrapper class="relative">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.36861 1.43148C9.53264 1.59557 9.62479 1.81809 9.62479 2.05011C9.62479 2.28212 9.53264 2.50464 9.36861 2.66873L5.03736 6.99998L9.36861 11.3312C9.52799 11.4963 9.61619 11.7173 9.6142 11.9467C9.6122 12.1761 9.52018 12.3956 9.35795 12.5578C9.19572 12.7201 8.97625 12.8121 8.74683 12.8141C8.51741 12.8161 8.29638 12.7279 8.13136 12.5685L3.18148 7.61861C3.01744 7.45452 2.92529 7.232 2.92529 6.99998C2.92529 6.76796 3.01744 6.54544 3.18148 6.38136L8.13136 1.43148C8.29544 1.26744 8.51796 1.17529 8.74998 1.17529C8.982 1.17529 9.20452 1.26744 9.36861 1.43148Z"
                                    fill="#F5F2ED" fill-opacity="0.7" />
                            </svg>
                        </div>
                    </div>
                    <div
                        class="size-7 px-5 py-[5px] rounded-[20px] outline outline-1 outline-offset-[-1px] outline-stone-300 flex justify-center items-center gap-[5px]">
                        <div data-svg-wrapper class="relative">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.63139 1.43148C4.46736 1.59557 4.37521 1.81809 4.37521 2.05011C4.37521 2.28212 4.46736 2.50464 4.63139 2.66873L8.96264 6.99998L4.63139 11.3312C4.47201 11.4963 4.38381 11.7173 4.3858 11.9467C4.3878 12.1761 4.47982 12.3956 4.64205 12.5578C4.80428 12.7201 5.02375 12.8121 5.25317 12.8141C5.48259 12.8161 5.70362 12.7279 5.86864 12.5685L10.8185 7.61861C10.9826 7.45452 11.0747 7.232 11.0747 6.99998C11.0747 6.76796 10.9826 6.54544 10.8185 6.38136L5.86864 1.43148C5.70456 1.26744 5.48204 1.17529 5.25002 1.17529C5.018 1.17529 4.79548 1.26744 4.63139 1.43148Z"
                                    fill="#757575" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="w-[1000px] h-80 left-0 top-[45px] absolute bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]">
                </div>
            </div>
        </div>
        <div
            class="flex-shrink-0 w-[396px] h-[925px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]">

        </div>
    </div>
@endsection
