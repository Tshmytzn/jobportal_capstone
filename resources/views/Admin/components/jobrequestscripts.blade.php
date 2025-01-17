<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<!-- Print button script -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<!-- Other export buttons (optional) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- pdfmake for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Buttons for HTML5 exports (Excel, PDF) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        $('#JobRequests_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getJobRequests') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            order: [
                [0, 'asc']
            ],
            scrollY: '400px',
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            columns: [{
                    data: null,
                    name: 'index',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    },
                    orderable: false
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'agency_name',
                    name: 'agency_name'
                },
                {
                    data: 'job_title',
                    name: 'job_title'
                },
                {
                    data: 'job_location',
                    name: 'job_location'
                },
                {
                    data: 'created_at',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toLocaleString();
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#reviewjob' data-id="${row.id}">Review</button>
                    `;
                    }
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                'colvis',
                {
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    },
                    customize: function(win) {

                        $(win.document.body)
                            .prepend(
                                `<div class="print-header">
                                    <img src="{{ asset('assets/img/PESOLOGO.png') }}" style="width: 100px; height: auto;">
                                    <h1>Public Employment Service Office Victorias City</h1>
                                </div>
                                <div class="print-header-date">
                                    Public Employment Service Office Victorias City
                                </div>`
                            );


                        $(win.document.body).find('h1').remove();

                        var style = `
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    table, th, td {
                        border: 1px solid #ddd;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    tr:nth-child(odd) {
                        background-color: #ffffff;
                    }
                    .print-header, .print-header-date {
                        position: fixed;
                        top: 140px;
                        left: 0;
                        width: 100%;
                        text-align: center;
                        z-index: 9999;
                        background: #fff;
                    }
                    .print-header-date {
                        font-size: 22px;
                        color: #666;
                        margin-top: 100px;
                        margin-bottom: 20px;

                    }
                    body {
                        margin-top: 150px; 
                    }
                    @media print {
                        .print-header, .print-header-date {
                            position: fixed;
                            top: 10px;
                            left: 0;
                            width: 100%;
                            text-align: center;
                            z-index: 9999;
                            background: #fff;
                        }
                        body {
                            margin-top: 150px;
                        }
                        .page-break {
                        page-break-before: always;
                    }
                            
                    }
                </style>
            `;

                        // Add the style to the printed window
                        $(win.document.head).append(style);

                      var rowsPerPage = 25;
                        var rows = $(win.document.body).find('table tr');
                        for (var i = rowsPerPage; i < rows.length; i += rowsPerPage) {
                            $(rows[i]).before(
                                '<tr class="page-break"><td colspan="100%"></td></tr>');
                        }

                        // Adjust page margins for the print view
                        $(win.document.body).css('margin-top', '150px');
                    }
                }

            ],
            initComplete: function() {

                $('.dt-button').attr(
                    'style',
                    'background: linear-gradient(to right, #FADCD9, #d8bfd8 ); color: #444; border: 1px solid #DDD; padding: 8px 12px; border-radius: 4px; font-size: 14px; cursor: pointer; margin: 4px; transition: all 0.3s ease; box-shadow: none;'
                );
            },
            fixedHeader: true,
        });


        $('#reviewjob').on('show.bs.modal', function(e) {
            var jobId = $(e.relatedTarget).data(
                'id');


            $('#approveBtn').data('id', jobId);
            $('#rejectBtn').data('id', jobId);

            $.ajax({
                url: '/job-details/' + jobId,
                method: 'GET',
                success: function(response) {
                    $('#jobId').val(response.id);

                    $('#job_title').val(response.job_title);
                    $('#category_name').val(response.category_name);
                    $('#agency_name').val(response.agency_name);
                    $('#job_location').val(response.job_location);
                    $('#job_type').val(response.job_type);
                    $('#skills_required').val(response.skills_required);
                    $('#job_salary').val(response.job_salary);
                    $('#job_description').html(response.job_description);
                    $('#job_status').val(response.job_status);

                    if (response.job_image) {
                        var imageUrl = "{{ asset('agencyfiles/job_image/') }}/" + response
                            .job_image;
                        $('#job_image').attr('src', imageUrl);
                    }
                },
                error: function() {
                    alert('Failed to fetch job details');
                }
            });
        });

        $('#approveBtn').on('click', function() {
            let jobId = $(this).data('id');

            if (jobId) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to approve this job post.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '/update-job-status',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            data: {
                                job_id: jobId,
                                status: 'approved',
                            },
                            success: function(response) {

                                $('#JobRequests_tbl').DataTable().ajax.reload();

                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Job status updated to approved',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK'
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Error updating job status',
                                        confirmButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                    });
                                }
                                $('#reviewjob').modal('hide');
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Request Failed',
                                    text: 'Error processing your request',
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }
        });



        $('#rejectBtn').on('click', function() {
            let jobId = $(this).data('id');

            if (jobId) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to reject this job post.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, reject it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '/update-job-status',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            data: {
                                job_id: jobId,
                                status: 'rejected',
                            },
                            success: function(response) {
                                $('#JobRequests_tbl').DataTable().ajax.reload();

                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Job status updated to rejected',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        $('#reviewjob').modal('hide');
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Error updating job status',
                                        confirmButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                    });
                                }
                                $('#reviewjob').modal('hide');
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Request Failed',
                                    text: 'Error processing your request',
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }
        });


    });
</script>
