<x-layout.default>

    <script src="{{ asset('/assets/js/simple-datatables.js') }}"></script>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Users</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Detail</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-5 mb-5">
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Profile</h5>
                        <a href="/users/user-account-settings"
                            class="ltr:ml-auto rtl:mr-auto btn btn-primary p-2 rounded-full">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="" class="w-5 h-5">
                                <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path
                                    d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-col justify-center items-center">
                            <img src="{{ asset('/storage/user/' . $profile->user->id . '/profile/' . $profile->profile_pic) }}"
                                alt="image" class="w-24 h-24 rounded-full object-cover  mb-5" />
                            <p class="font-semibold text-primary text-xl">
                                {{ !empty($profile->user->name) ? ucfirst($profile->user->name) : '' }}</p>
                        </div>
                        <ul class="mt-5 flex flex-col max-w-[160px] m-auto space-y-4 font-semibold text-white-dark">
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns=""
                                    class="w-5 h-5 shrink-0">
                                    <path opacity="0.5"
                                        d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span
                                    class="whitespace-nowrap">{{ !empty($profile->user->email) ? $profile->user->email : '' }}</span>
                            </li>
                            <li class="flex items-center gap-2">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns=""
                                    class="w-5 h-5 shrink-0">
                                    <path
                                        d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5894L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651M4.00289 5.74561C3.96765 5.12559 4.25823 4.56668 4.69185 4.13552L6.26145 2.57483C7.13596 1.70529 8.61028 1.83992 9.37326 2.85908L10.6342 4.54348C11.2507 5.36691 11.1841 6.49484 10.4775 7.19738L10.1907 7.48257"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M18.6763 18.9651C17.0469 19.117 13.0622 18.9492 8.8154 14.7266C4.81076 10.7447 4.09308 7.33182 4.00293 5.74561"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M16.1007 13.3589C16.1007 13.3589 15.0181 14.4353 12.0631 11.4971C9.10807 8.55886 10.1907 7.48242 10.1907 7.48242"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span class="whitespace-nowrap"
                                    dir="ltr">{{ !empty($profile->user->phone) ? $profile->user->phone : '' }}</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M13.9868 5L12 12.4149L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span
                                    class="whitespace-nowrap">{{ !empty($profile->user->refferal_code) ? $profile->user->refferal_code : '' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel lg:col-span-2 xl:col-span-3">
                    <div x-data="task">
                            <h5
                                class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">
                                Task
                            </h5>
                            <table id="taskTable" class="whitespace-nowrap">
                            </table>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="panel">
                    {{-- <div class="mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Summary</h5>
                    </div> --}}
                    <div class="space-y-4">
                        <div class="border border-[#ebedf2] rounded dark:bg-[#1b2e4b] dark:border-0">
                            <div class="flex items-center justify-between p-4 py-2">
                                <div
                                    class="grid place-content-center w-9 h-9 rounded-md bg-secondary-light dark:bg-secondary text-secondary dark:text-secondary-light">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="" class="w-5 h-5 shrink-0">
                                        <path
                                            d="M3.79424 12.0291C4.33141 9.34329 4.59999 8.00036 5.48746 7.13543C5.65149 6.97557 5.82894 6.8301 6.01786 6.70061C7.04004 6 8.40956 6 11.1486 6H12.8515C15.5906 6 16.9601 6 17.9823 6.70061C18.1712 6.8301 18.3486 6.97557 18.5127 7.13543C19.4001 8.00036 19.6687 9.34329 20.2059 12.0291C20.9771 15.8851 21.3627 17.8131 20.475 19.1793C20.3143 19.4267 20.1267 19.6555 19.9157 19.8616C18.7501 21 16.7839 21 12.8515 21H11.1486C7.21622 21 5.25004 21 4.08447 19.8616C3.87342 19.6555 3.68582 19.4267 3.5251 19.1793C2.63744 17.8131 3.02304 15.8851 3.79424 12.0291Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5"
                                            d="M9.1709 15C9.58273 16.1652 10.694 17 12.0002 17C13.3064 17 14.4177 16.1652 14.8295 15"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div
                                    class="ltr:ml-4 rtl:mr-4 flex items-start justify-between flex-auto font-semibold">
                                    <h6 class="text-white-dark text-[13px] dark:text-white-dark">Income <span
                                            class="block text-base text-[#515365] dark:text-white-light">$92,600</span>
                                    </h6>
                                    <p class="ltr:ml-auto rtl:mr-auto text-secondary">90%</p>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#ebedf2] rounded dark:bg-[#1b2e4b] dark:border-0">
                            <div class="flex items-center justify-between p-4 py-2">
                                <div
                                    class="grid place-content-center w-9 h-9 rounded-md bg-warning-light dark:bg-warning text-warning dark:text-warning-light">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                        <path
                                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5" d="M10 16H6" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5" d="M14 16H12.5" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M2 10L22 10" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div
                                    class="ltr:ml-4 rtl:mr-4 flex items-start justify-between flex-auto font-semibold">
                                    <h6 class="text-white-dark text-[13px] dark:text-white-dark">Expenses <span
                                            class="block text-base text-[#515365] dark:text-white-light">$55,085</span>
                                    </h6>
                                    <p class="ltr:ml-auto rtl:mr-auto text-warning">80%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="flex items-center justify-between mb-10">
                        <h5 class="font-semibold text-lg dark:text-white-light">Pro Plan</h5>
                        <a href="javascript:;" class="btn btn-primary">Renew Now</a>
                    </div>
                    <div class="group">
                        <ul class="list-inside list-disc text-white-dark font-semibold mb-7 space-y-2">
                            <li>10,000 Monthly Visitors</li>
                            <li>Unlimited Reports</li>
                            <li>2 Years Data Storage</li>
                        </ul>
                        <div class="flex items-center justify-between mb-4 font-semibold">
                            <p
                                class="flex items-center rounded-full bg-dark px-2 py-1 text-xs text-white-light font-semibold">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ltr:mr-1 rtl:ml-1">
                                    <circle opacity="0.5" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path d="M12 8V12L14.5 14.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                5 Days Left
                            </p>
                            <p class="text-info">$25 / month</p>
                        </div>
                        <div class="rounded-full h-2.5 p-0.5 bg-dark-light overflow-hidden mb-5 dark:bg-dark-light/10">
                            <div class="bg-gradient-to-r from-[#f67062] to-[#fc5296] w-full h-full rounded-full relative"
                                style="width: 65%;"></div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Payment History</h5>
                    </div>
                    <div>
                        <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                            <div class="flex items-center justify-between py-2">
                                <h6 class="text-[#515365] font-semibold dark:text-white-dark">March<span
                                        class="block text-white-dark dark:text-white-light">Pro Membership</span></h6>
                                <div class="flex items-start justify-between ltr:ml-auto rtl:mr-auto">
                                    <p class="font-semibold">90%</p>
                                    <div x-data="dropdown" @click.outside="open = false"
                                        class="dropdown ltr:ml-4 rtl:mr-4">
                                        <a href="javascript:;" @click="toggle">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5 opacity-80 hover:opacity-100">
                                                <circle cx="5" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                            class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                            <li><a href="javascript:;" @click="toggle">View Invoice</a></li>
                                            <li><a href="javascript:;" @click="toggle">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                            <div class="flex items-center justify-between py-2">
                                <h6 class="text-[#515365] font-semibold dark:text-white-dark">February <span
                                        class="block text-white-dark dark:text-white-light">Pro Membership</span></h6>
                                <div class="flex items-start justify-between ltr:ml-auto rtl:mr-auto">
                                    <p class="font-semibold">90%</p>
                                    <div x-data="dropdown" @click.outside="open = false"
                                        class="dropdown ltr:ml-4 rtl:mr-4">
                                        <a href="javascript:;" @click="toggle">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5 opacity-80 hover:opacity-100">
                                                <circle cx="5" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                            class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                            <li><a href="javascript:;" @click="toggle">View Invoice</a></li>
                                            <li><a href="javascript:;" @click="toggle">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between py-2">
                                <h6 class="text-[#515365] font-semibold dark:text-white-dark">January<span
                                        class="block text-white-dark dark:text-white-light">Pro Membership</span></h6>
                                <div class="flex items-start justify-between ltr:ml-auto rtl:mr-auto">
                                    <p class="font-semibold">90%</p>
                                    <div x-data="dropdown" @click.outside="open = false"
                                        class="dropdown ltr:ml-4 rtl:mr-4">
                                        <a href="javascript:;" @click="toggle">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5 opacity-80 hover:opacity-100">
                                                <circle cx="5" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                            class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                            <li><a href="javascript:;" @click="toggle">View Invoice</a></li>
                                            <li><a href="javascript:;" @click="toggle">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Card Details</h5>
                    </div>
                    <div>
                        <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                            <div class="flex items-center justify-between py-2">
                                <div class="flex-none">
                                    <img src="/assets/images/card-americanexpress.svg" alt="image" />
                                </div>
                                <div class="flex items-center justify-between flex-auto ltr:ml-4 rtl:mr-4">
                                    <h6 class="text-[#515365] font-semibold dark:text-white-dark">American Express
                                        <span class="block text-white-dark dark:text-white-light">Expires on
                                            12/2025</span>
                                    </h6>
                                    <span class="badge bg-success ltr:ml-auto rtl:mr-auto">Primary</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                            <div class="flex items-center justify-between py-2">
                                <div class="flex-none">
                                    <img src="/assets/images/card-mastercard.svg" alt="image" />
                                </div>
                                <div class="flex items-center justify-between flex-auto ltr:ml-4 rtl:mr-4">
                                    <h6 class="text-[#515365] font-semibold dark:text-white-dark">Mastercard <span
                                            class="block text-white-dark dark:text-white-light">Expires on
                                            03/2025</span></h6>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between py-2">
                                <div class="flex-none">
                                    <img src="/assets/images/card-visa.svg" alt="image" />
                                </div>
                                <div class="flex items-center justify-between flex-auto ltr:ml-4 rtl:mr-4">
                                    <h6 class="text-[#515365] font-semibold dark:text-white-dark">Visa <span
                                            class="block text-white-dark dark:text-white-light">Expires on
                                            10/2025</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("task", () => ({
                datatable1: null,
                init() {
                    this.datatable1 = new simpleDatatables.DataTable('#taskTable', {
                        data: {
                            headings: ['Name', 'Task Summary', 'Start date', 'End Date'],
                            data: [
                                @foreach ($tasks as $task)
                                    ['{{ $task->task_name }}',
                                        '{{ $task->task_summary }}',
                                        '{{ date('d M Y', strtotime($task->task_start_date)) }}',
                                        '{{ date('d M Y', strtotime($task->task_end_date)) }}',
                                    ],
                                @endforeach
                            ]
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center w-max"><a href="">${data}</a></div>`;
                                },
                                sort: "asc"
                            },
                            // {
                            //     select: 3,
                            //     render: (data, cell, row) => {
                            //         return this.formatDate(data);
                            //     },
                            // },
                            // {
                            //     select: 6,
                            //     render: (data, cell, row) => {
                            //         return '<span class="badge bg-' + this
                            //         .randomColor() + '">' + this.randomStatus() +
                            //             '</span>';
                            //     },
                            // },
                        ],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    });
                },

                // formatDate(date) {
                //     if (date) {
                //         const dt = new Date(date);
                //         const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt
                //         .getMonth() + 1;
                //         const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                //         return day + '/' + month + '/' + dt.getFullYear();
                //     }
                //     return '';
                // },

                // randomColor() {
                //     const color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                //     const random = Math.floor(Math.random() * color.length);
                //     return color[random];
                // },

                // randomStatus() {
                //     const status = ['PAID', 'APPROVED', 'FAILED', 'CANCEL', 'SUCCESS', 'PENDING','COMPLETE'
                //     ];
                //     const random = Math.floor(Math.random() * status.length);
                //     return status[random];
                // }
            }));
        });
    </script>
</x-layout.default>
