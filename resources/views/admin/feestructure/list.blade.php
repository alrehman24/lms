@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Head</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fee Head</li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif

                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('fee-structure.read') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-2">
                                            <label for="name">Class -</label>
                                            <select name="class_id" id="class_id" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option {{  request('class_id') == $class->id ? 'selected' :  '' }}
                                                        value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="name">Academic Year</label>
                                            <select name="academicYear_id" id="academicYear_id" class="form-control">
                                                <option value="">Select Academic Year </option>
                                                @foreach ($academicYears as $academicYear)
                                                    <option {{ request('academicYear_id') == $academicYear->id ? 'selected' : '' }}
                                                        value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="name">Fee Head</label>
                                            <select name="feeHead_id" id="feeHead_id" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($feeHeads as $feeHead)
                                                    <option {{ request('feeHead_id') == $feeHead->id ? 'selected' : '' }}
                                                        value="{{ $feeHead->id }}">{{ $feeHead->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Class</th>
                                            <th>Academic Year</th>
                                            <th>Fee Head</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>Created Time</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feeStructures as $fee)
                                            <tr>
                                                <td>{{ $fee->id }}</td>
                                                <td>{{ $fee->class->name }}</td>
                                                <td>{{ $fee->academicYear->name }}</td>
                                                <td>{{ $fee->feeHead->name }}</td>
                                                <td>{{ $fee->april }}</td>
                                                <td>{{ $fee->may }}</td>
                                                <td>{{ $fee->june }}</td>
                                                <td>{{ $fee->july }}</td>
                                                <td>{{ $fee->august }}</td>
                                                <td>{{ $fee->september }}</td>
                                                <td>{{ $fee->october }}</td>
                                                <td>{{ $fee->november }}</td>
                                                <td>{{ $fee->december }}</td>
                                                <td>{{ $fee->january }}</td>
                                                <td>{{ $fee->february }}</td>
                                                <td>{{ $fee->march }}</td>
                                                <td>{{ $fee->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('fee-structure.edit', $fee->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('fee-structure.delete', $fee->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this class?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>

                        </div>



                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection
@section('customJs')
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

    <script src="dist/js/demo.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
@section('customCss')
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
