<!DOCTYPE html>
<html lang="en">

<style>
    .question-section {
        margin-bottom: 20px;
    }

    .hidden {
        display: none;
    }

    .section {
        margin-bottom: 30px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        position: relative;
    }

    .remove-section-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background-color: transparent;
        border: none;
        color: #dc3545;
        cursor: pointer;
    }
</style>

@include('Admin.components.head', ['title' => 'Skill Assessment'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'SkillAssessment'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle'=> 'Skill Assessment', 'pagetitle' => 'Admin'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 m-2">

                <button data-bs-toggle="modal" data-bs-target="#createskillassessment" class="btn bgp-gradient ms-4 text-white">Create Skill Assessment</button>

            <div class="row">
                <div class="container-fluid text-center">
                    <div style="margin: 0 auto;">

                        <img src="{{ asset('img/nodata.png') }}" alt="No Data Available" style="max-width: 100%; height: auto; margin-bottom: 20px;">

                        <h5 style="font-size: 1.25rem;">No Skill Assessments Found</h5>
                        <p style="font-size: 1.1rem;">It seems there are currently no skill assessment surveys created. Why not create one now to get started?</p>
                    </div>
                </div>
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.modals.skillassessmentmodals')
    @include('Admin.components.skillassessmentscripts')

</body>

</html>
