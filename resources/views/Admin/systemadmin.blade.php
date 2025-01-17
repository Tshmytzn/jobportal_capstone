<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'System Administrators'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.loading')

    @include('Admin.components.aside', ['active' => 'SystemAdministrators'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Admin.components.navbar',
            ['headtitle' => 'Administrators'],
            ['pagetitle' => 'System']
        )
        <!-- End Navbar -->

        <div class="container-fluid py-0 m-2">
            <div class="row m-2" id="tabletag">
                <a href="" data-bs-toggle="modal" data-bs-target="#addNewAdminModal">
                    <button class="btn bgp-gradient text-white">Add System Administrator</button>
                </a>

                <table id="Admin_tbl" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.modals.adminmodals2')
    @include('Admin.components.scripts')
    @include('Admin.components.manageadminscripts2')


</body>

</html>
