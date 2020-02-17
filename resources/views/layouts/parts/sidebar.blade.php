<aside class="left-sidebar " data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ url('/') }}" aria-expanded="false"><i class="mdi mdi-home"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <hr>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-developer-board"></i><span
                            class="hide-menu">Attendance</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if (Hr::isAdmin())
                        <li class="sidebar-item"><a href="{{ url('/admin/attendance/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Attendance
                                </span></a></li>
                        @endif
                        <li class="sidebar-item"><a href="{{ url('/admin/attendance') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Attendance List
                                </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-developer-board"></i><span
                            class="hide-menu">Leave</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if (Hr::isUser())
                        <li class="sidebar-item"><a href="{{ url('/admin/leave/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Leave
                                </span></a></li>
                        @endif
                        <li class="sidebar-item"><a href="{{ url('/admin/leave') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Leave List
                                </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-folder"></i><span
                            class="hide-menu">Schedule</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if (Hr::isAdmin())
                        <li class="sidebar-item"><a href="{{ url('/admin/schedule/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Schedule
                                </span></a></li>
                        @endif
                        <li class="sidebar-item"><a href="{{ url('/admin/schedule') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Schedule List
                                </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-flip-to-back"></i><span
                            class="hide-menu">Salary</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if (Hr::isAdmin())
                        <li class="sidebar-item"><a href="{{ url('/admin/salary/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Salary
                                </span></a></li>
                        @endif
                        <li class="sidebar-item"><a href="{{ url('/admin/salary') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Salary List
                                </span></a></li>
                    </ul>
                </li>
                @if (Hr::isAdmin())
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span
                            class="hide-menu">Bank</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/bank/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Bank
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/bank') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Bank List
                                </span></a></li>
                    </ul>
                </li>
                <hr>
                @endif
                @if (Hr::isAdmin())
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span
                            class="hide-menu">Reports</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/report/monthly') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Monthly Reports
                                </span></a></li>

                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-equal-box"></i><span
                            class="hide-menu">Expense</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/expense/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Expense
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/expense') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Expense List
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/expanse-category/create') }}"
                                class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">
                                    Add Expense Category
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/expanse-category') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Expense Category List
                                </span></a></li>
                    </ul>
                </li>

                @endif

                <hr>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Employee</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if (Hr::isAdmin())
                        <li class="sidebar-item"><a href="{{ url('/admin/employee/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Employee
                                </span></a></li>
                        @endif
                        <li class="sidebar-item"><a href="{{ url('/admin/employee') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Employee List
                                </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Employee Info</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if (Hr::isAdmin())
                        <li class="sidebar-item"><a href="{{ url('/admin/employee-personal-info/create') }}"
                                class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">
                                    Add Employee Info
                                </span></a></li>
                        @endif
                        <li class="sidebar-item"><a href="{{ url('/admin/employee-personal-info') }}"
                                class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Employee
                                    Info List
                                </span></a></li>
                    </ul>
                </li>

                @if (Hr::isAdmin())
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Department</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/department/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Department
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/department') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Department List
                                </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Position</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/position/create') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Add Position
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/position') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Position List
                                </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Company Info</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/company/1/edit') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Company
                                </span></a></li>

                    </ul>
                </li>
                @endif

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
