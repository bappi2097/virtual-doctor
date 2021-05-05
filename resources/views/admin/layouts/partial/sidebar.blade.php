<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block  m-t-20">
                        <div class="user-pic">
                            <img src="{{ asset(auth()->user()->image ?: 'assets/images/users/male_avatar.svg') }}"
                                alt="users" class="rounded-circle" width="40" />
                        </div>
                        <div class="user-content hide-menu m-l-10">
                            <a class="" id="Userdd">
                                <h5 class="m-b-0 user-name font-medium">
                                    {{ auth()->user()->name ?: 'No Name' }}
                                </h5>
                                <span
                                    class="op-5 user-email">{{ auth()->user()->email ?: 'no.email@mail.com' }}</span>
                            </a>

                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.dashboard') }}"
                        aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="hide-menu"> Users</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        @role('super')
                        <li class="sidebar-item">
                            <a href="{{ route('admin.users.admin.index') }}" class="sidebar-link">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu"> Admin </span>
                            </a>
                        </li>
                        @endrole
                        <li class="sidebar-item">
                            <a href="{{ route('admin.users.doctor.index') }}" class="sidebar-link">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu"> Doctor </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.users.patient.index') }}" class="sidebar-link">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu"> Patient
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.doctor-category.index') }}" aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">Doctor Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.appointments.index') }}" aria-expanded="false">
                        <i class="mdi mdi-calendar-check"></i>
                        <span class="hide-menu">Appointments</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.healths.index') }}" aria-expanded="false">
                        <i class="mdi mdi-heart-pulse"></i>
                        <span class="hide-menu">Health</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.reports.index') }}" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                </li>
                @role('super')
                <li class="sidebar-item">
                    <a href="{{ url('admin/user-activity') }}" class="sidebar-link" target="_blank">
                        <i class="fas fa-user-circle"></i>
                        <span class="hide-menu"> Activity Log </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('admin/logs') }}" class="sidebar-link" target="_blank">
                        <i class="fas fa-bomb"></i>
                        <span class="hide-menu"> Error Log </span>
                    </a>
                </li>
                @endrole
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
