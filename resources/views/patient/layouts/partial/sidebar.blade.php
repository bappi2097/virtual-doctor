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
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('patient.users.doctor.index') }}" class="sidebar-link">
                        <i class="fas fa-user-circle"></i>
                        <span class="hide-menu"> Doctor </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.doctor-category.index') }}" aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">Doctor Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.appointments.index') }}" aria-expanded="false">
                        <i class="mdi mdi-calendar-check"></i>
                        <span class="hide-menu">Appointments</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.healths.index') }}" aria-expanded="false">
                        <i class="mdi mdi-heart-pulse"></i>
                        <span class="hide-menu">Health</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.reports.index') }}" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i>
                        <span class="hide-menu">Report</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.prescriptions.index') }}" aria-expanded="false">
                        <i class="mdi mdi-medical-bag"></i>
                        <span class="hide-menu">Prescription</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('patient.infos.index') }}" aria-expanded="false">
                        <i class="mdi mdi-ambulance"></i>
                        <span class="hide-menu">Information</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
