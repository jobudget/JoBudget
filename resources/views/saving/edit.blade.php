<x-app-layout>

    {{-- =====================================================
         MOBILE HAMBURGER
    ====================================================== --}}

    <button
        type="button"
        id="mobileMenuToggle"
        class="jb-mobile-menu"
        aria-label="Open navigation menu"
    >
        ☰
    </button>


    {{-- =====================================================
         MOBILE SIDEBAR OVERLAY
    ====================================================== --}}

    <div
        id="mobileSidebarOverlay"
        class="jb-sidebar-overlay"
    ></div>


    {{-- =====================================================
         HAMBURGER + SIDEBAR CSS
    ====================================================== --}}

    <style>

        /* ==============================================
           MOBILE HAMBURGER
        ============================================== */

        .jb-mobile-menu {
            display: none;

            position: fixed;

            top: 15px;
            left: 15px;

            width: 45px;
            height: 45px;

            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 10px;

            background: #7aa35a;
            color: #ffffff;

            font-size: 24px;

            cursor: pointer;

            z-index: 3000;

            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.15);
        }


        .jb-mobile-menu:hover {
            background: #668b49;
        }


        /* ==============================================
           MOBILE OVERLAY
        ============================================== */

        .jb-sidebar-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(0, 0, 0, 0.4);

            z-index: 1999;
        }


        .jb-sidebar-overlay.mobile-open {
            display: block;
        }


        /* ==============================================
           MOBILE SIDEBAR
        ============================================== */

        @media (max-width: 900px) {

            .jb-mobile-menu {
                display: flex;
            }


            .jb-sidebar {
                position: fixed !important;

                top: 0;
                left: -270px;

                width: 250px !important;
                height: 100vh;

                z-index: 2000;

                overflow-y: auto;

                transition: left 0.25s ease;
            }


            .jb-sidebar.mobile-open {
                left: 0;
            }


            .jb-main {
                margin-left: 0 !important;
                width: 100% !important;
            }

        }


        /* ==============================================
           SMALL MOBILE
        ============================================== */

        @media (max-width: 600px) {

            .jb-mobile-menu {
                width: 43px;
                height: 43px;

                top: 12px;
                left: 12px;

                font-size: 22px;
            }


            .jb-sidebar {
                width: 250px !important;

                left: -270px;
            }


            .jb-sidebar.mobile-open {
                left: 0;
            }

        }


        /* ==============================================
           VERY SMALL MOBILE
        ============================================== */

        @media (max-width: 400px) {

            .jb-mobile-menu {
                width: 40px;
                height: 40px;

                top: 10px;
                left: 10px;
            }

        }

    </style>


    {{-- =====================================================
         EXISTING EDIT SAVINGS PAGE
    ====================================================== --}}

    <div class="py-6">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- HEADER --}}

            <div class="mb-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    Edit Savings
                </h2>

                <p class="text-sm text-gray-500">
                    Update your savings record
                </p>

            </div>


            {{-- FORM CARD --}}

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">


                <form
                    action="{{ route('saving.update', $saving) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    {{-- Description --}}

                    <div class="mb-5">

                        <label
                            for="description"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Description
                        </label>


                        <input
                            type="text"
                            name="name"
                            id="description"
                            value="{{ old('description', $saving->description) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                        >


                        @error('description')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Amount --}}

                    <div class="mb-5">

                        <label
                            for="amount"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Amount
                        </label>


                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            value="{{ old('amount', $saving->amount) }}"
                            step="0.01"
                            min="0.01"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                        >


                        @error('amount')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Buttons --}}

                    <div class="flex justify-end gap-3">


                        <a
                            href="{{ route('saving.index') }}"
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="px-5 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700"
                        >
                            Update Savings
                        </button>


                    </div>


                </form>


            </div>


        </div>

    </div>


    {{-- =====================================================
         MOBILE HAMBURGER JAVASCRIPT
    ====================================================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const menuButton =
                document.getElementById('mobileMenuToggle');

            const sidebar =
                document.querySelector('.jb-sidebar');

            const overlay =
                document.getElementById('mobileSidebarOverlay');


            /* Stop if elements don't exist */

            if (!menuButton || !sidebar || !overlay) {
                return;
            }


            /* ==============================================
               OPEN SIDEBAR
            ============================================== */

            function openSidebar() {

                sidebar.classList.add('mobile-open');

                overlay.classList.add('mobile-open');

                menuButton.textContent = '✕';

                menuButton.setAttribute(
                    'aria-label',
                    'Close navigation menu'
                );

            }


            /* ==============================================
               CLOSE SIDEBAR
            ============================================== */

            function closeSidebar() {

                sidebar.classList.remove('mobile-open');

                overlay.classList.remove('mobile-open');

                menuButton.textContent = '☰';

                menuButton.setAttribute(
                    'aria-label',
                    'Open navigation menu'
                );

            }


            /* ==============================================
               HAMBURGER CLICK
            ============================================== */

            menuButton.addEventListener(
                'click',
                function () {

                    if (
                        sidebar.classList.contains(
                            'mobile-open'
                        )
                    ) {

                        closeSidebar();

                    } else {

                        openSidebar();

                    }

                }
            );


            /* ==============================================
               OVERLAY CLICK
            ============================================== */

            overlay.addEventListener(
                'click',
                function () {

                    closeSidebar();

                }
            );


            /* ==============================================
               CLOSE WHEN NAV LINK IS CLICKED
            ============================================== */

            sidebar
                .querySelectorAll('.jb-nav a')
                .forEach(function (link) {

                    link.addEventListener(
                        'click',
                        function () {

                            closeSidebar();

                        }
                    );

                });


            /* ==============================================
               ESC KEY
            ============================================== */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (event.key === 'Escape') {

                        closeSidebar();

                    }

                }
            );

        });

    </script>

</x-app-layout>