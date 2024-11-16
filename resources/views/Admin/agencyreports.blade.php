<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Agency Reports'])
@include('admin.components.loading')
<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'agencyreports'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Compliance'], ['pagetitle' => 'Agency'])        
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">
                <table id="Reports_tbl" class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Agency</th>
                            <th>Job Category</th>
                            <th>Job Posted</th>
                            <th>Vacancies Available</th>
                            <th>Applicants</th>
                            <th>Hired Applicants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
                
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.reportscripts')

</body>

</html>
