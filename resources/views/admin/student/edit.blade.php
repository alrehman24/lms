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
                            <li class="breadcrumb-item active">Fee Head</li>
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
                                <h3 class="card-title">Add Fee Structure</h3>
                            </div>

                            <form action="{{ route((Auth::user()->role=='admin') ? 'student.update':'profile.update', (Auth::user()->role=='admin') ? $student->id:'') }}" method="post">
                                <input type="hidden" name='id' value='{{ $student->id }}' />
                                @csrf
                                @if(Auth::user()->role=='admin')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Class</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option @if ($class->id == $student->class_id) selected @endif
                                                    value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <select name="academic_year_id" id="academic_year_id" class="form-control">
                                            <option value="">Select Academic Year</option>
                                            @foreach ($academicYears as $academicYear)
                                                <option @if ($academicYear->id == $student->academic_year_id) selected @endif
                                                    value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
@endif

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ $student->name }}" name="name"
                                            class="form-control" id="name" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Father Name</label>
                                        <input type="text" value="{{ $student->father_name }}" name="father_name"
                                            class="form-control" id="father_name" placeholder="Enter Father Name">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Mother Name</label>
                                        <input type="text" value="{{ $student->mother_name }}" name="mother_name"
                                            class="form-control" id="mother_name" placeholder="Enter Mother Name">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="text" value="{{ $student->email }}" name="email"
                                            class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Mobile Number</label>
                                        <input type="text" value="{{ $student->mobile_no }}" name="mobile_no"
                                            class="form-control" id="mobile_no" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Admission Date</label>
                                        <input type="date" value="{{ $student->admission_date }}" name="admission_date"
                                            class="form-control" id="admission_date" placeholder="Enter Admission Date">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Date of Birth</label>
                                        <input type="date" value="{{ $student->dob }}" name="dob"
                                            class="form-control" id="dob" placeholder="Enter Date of Birth">
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
