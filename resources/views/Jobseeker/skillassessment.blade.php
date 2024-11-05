<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Skill Assessment'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'skills'])

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- Assessment Title and Description -->

        @php
        $skillassessment = \App\Models\Assessment::with('sections.questions.options')->first();
    @endphp

    @if ($skillassessment)
        <div class="container text-center py-1" style="max-width: 900px;">
            <h3 class="h1 mb-1 wow fadeInDown" data-wow-delay="0.1s">{{ $skillassessment->title }}</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">{{ $skillassessment->description }}</a></li>
            </ol>
        </div>

        <div class="container my-5">
            @foreach ($skillassessment->sections as $section)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $section->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $section->description }}</p>

                        @foreach ($section->questions as $question)
                            <div class="mb-3">
                                <h6 class="font-weight-bold">{{ $question->question_text }}</h6>
                                @foreach ($question->options as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q{{ $question->id }}" id="q{{ $question->id }}_{{ $option->id }}">
                                        <label class="form-check-label" for="q{{ $question->id }}_{{ $option->id }}">{{ $option->option_text }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button id="submitAssessment" class="btn bgp-gradient">Submit Assessment</button>
        </div>
    @else
        <div class="container text-center my-5">
            <h5>No assessment available at this time.</h5>
            <p>Please check back later or contact support for assistance.</p>
        </div>
    @endif


<script>
    document.getElementById('submitAssessment').addEventListener('click', function () {
        let formData = new FormData(document.getElementById('assessmentForm'));

        fetch('{{ route("assessment.submit") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Assessment submitted successfully!');
            } else {
                alert('There was an error submitting your assessment.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
    </script>



    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.takeskillassessmentmodal')
    @include('Jobseeker.components.skillassessmentscripts')


</body>

</html>