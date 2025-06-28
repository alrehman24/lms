@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Fee Head</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        @if (@Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (@Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Student</h3>
                            </div>

                            <form action="{{ route('student.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Class</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option {{ old('class_id') == $class->id ? 'selected' : '' }}
                                                    value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Academic Year</label>
                                        <select name="academic_year_id" id="academic_year_id" class="form-control">
                                            <option value="">Select Academic Year</option>
                                            @foreach ($academicYears as $academicYear)
                                                <option {{ old('academic_year_id') == $academicYear->id ? 'selected' : '' }}
                                                    }} value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Student Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Name" value="{{ old('name') }}">
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Enter Email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Father Name</label>
                                        <input type="text" name="father_name" class="form-control" id="father_name"
                                            placeholder="Enter Father Name" value="{{ old('father_name') }}">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Mother Name</label>
                                        <input type="text" name="mother_name" class="form-control" id="mother_name"
                                            placeholder="Enter Mother Name" value="{{ old('mother_name') }}">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Mobile Number</label>
                                        <input type="text" name="mobile_no" class="form-control" id="mobile_no"
                                            placeholder="Enter Mobile Number" value="{{ old('mobile_no') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control" id="admission_date"
                                            placeholder="Enter Admission Date" value="{{ old('admission_date') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="dob"
                                            placeholder="Enter Date of Birth" value="{{ old('dob') }}">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>




                    </div>

                </div>
        </section>

    </div>
@endsection
