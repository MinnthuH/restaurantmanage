<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                        <span> Home </span>
                    </a>
                </li>



                <li class="menu-title mt-2">Apps</li>


                    <li class="my-1">
                        <a href="#category" data-bs-toggle="collapse">
                            <i class="fas fa-users"></i>
                            <span> အမျိုးအစား စီမံခန့်ခွဲခြင်း</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="category">
                            <ul class="nav-second-level">

                                    <li>
                                        <a href="{{ route('all.category') }}">အမျိုးအစားစာရင်းများ စာရင်းများ</a>
                                    </li>

                            </ul>
                        </div>
                    </li>



                    <li class="my-1">
                        <a href="#menu" data-bs-toggle="collapse">
                            <i class="fas fa-truck"></i>
                            <span> မီနူး စီမံခန့်ခွဲခြင်း </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menu">
                            <ul class="nav-second-level">

                                <li>
                                    <a href="{{ route('all.menu') }}">မီနူး စာရင်းများ</a>
                                </li>
                                <li>
                                    <a href="{{ route('add.menu') }}">မီနူး အသစ်ထည့်ရန်</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="my-1">
                        <a href="#table" data-bs-toggle="collapse">
                            <i class="fas fa-truck"></i>
                            <span> Table စီမံခန့်ခွဲခြင်း </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="table">
                            <ul class="nav-second-level">

                                <li>
                                    <a href="{{ route('all.tables') }}">Table စာရင်းများ</a>
                                </li>

                            </ul>
                        </div>
                    </li>


                <li class="menu-title mt-2">Custom</li>

                <li class="my-1">
                    <a href="#addexpense" data-bs-toggle="collapse">
                        <i class="fas fa-coins"></i>
                        <span> အသုံးစာရင်း </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="addexpense">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">အသုံးစာရင်း ထည့်သွင်းခြင်း</a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- @if (Auth::user()->can('admin.manage'))
                    <li class="my-1">
                        <a href="#backup" data-bs-toggle="collapse">
                            <i class="fas fa-cloud-download-alt"></i>
                            <span>Database Backup </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="backup">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('backup#database') }}">Database Backup</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif --}}


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
