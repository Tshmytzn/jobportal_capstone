<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> --}}
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/PESOLOGO.png') }}">
    <title>{{ $title }}</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('../assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('../assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- jQuery (necessary for DataTable) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<!-- Load jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet" defer>

    <style>
        .bgp-gradient {
            background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);
            display: flex;
            align-items: center;
            color: white;
        }

        .bgp-table {
            background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgb(146, 43, 153) 50%, rgb(184, 114, 182) 100%);
            align-items: center;
            text-align: center;
            color: white;
        }

        .bgp-danger {
            background: linear-gradient(90deg, rgb(206, 150, 150) 0%, rgb(207, 74, 74) 50%, rgba(139, 0, 0, 1) 100%);
            align-items: center;
            text-align: center;
            color: white;
        }

        .bgp-add {
            background-color: rgb(182, 24, 127);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .bgp-remove {
            background-color: #FF4136;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .bgp-remove:hover {
            background-color: #C0392B;
        }
    </style>

</head>
