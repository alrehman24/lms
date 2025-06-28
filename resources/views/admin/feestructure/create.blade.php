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

                            <form action="{{ route('fee-structure.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Class</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option {{ old('class_id') == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
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
                                                <option {{ old('academic_year_id') == $academicYear->id ? 'selected' : '' }} }} value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Fee Heads</label>
                                        <select name="fee_head_id" id="fee_head_id" class="form-control">
                                            <option value="">Select Fee Head</option>
                                            @foreach ($feeHeads as $feeHead)
                                                <option {{ old('fee_head_id') == $feeHead->id ? 'selected' : '' }} value="{{ $feeHead->id }}">{{ $feeHead->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">April</label>
                                        <input type="number" name="april" class="form-control" id="april"
                                            placeholder="Enter April Amount" value="{{ old('april') }}">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">May</label>
                                        <input type="number" name="may" class="form-control" id="may"
                                            placeholder="Enter May Amount" value="{{ old('may') }}">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">June</label>
                                        <input type="number" name="june" class="form-control" id="june"
                                            placeholder="Enter June Amount" value="{{ old('june') }}">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">July</label>
                                        <input type="number" name="july" class="form-control" id="july"
                                            placeholder="Enter July Amount" value="{{ old('july') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">August</label>
                                        <input type="number" name="august" class="form-control" id="august"
                                            placeholder="Enter August Amount" value="{{ old('august') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">September</label>
                                        <input type="number" name="september" class="form-control" id="september"
                                            placeholder="Enter September Amount" value="{{ old('september') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">October</label>
                                        <input type="number" name="october" class="form-control" id="october"
                                            placeholder="Enter October Amount" value="{{ old('october') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">November</label>
                                        <input type="number" name="november" class="form-control" id="november"
                                            placeholder="Enter November Amount" value="{{ old('november') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">December</label>
                                        <input type="number" name="december" class="form-control" id="december"
                                            placeholder="Enter December Amount" value="{{ old('december') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">January</label>
                                        <input type="number" name="january" class="form-control" id="january"
                                            placeholder="Enter January Amount" value="{{ old('january') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">February</label>
                                        <input type="number" name="february" class="form-control" id="february"
                                            placeholder="Enter February Amount" value="{{ old('february') }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">March</label>
                                        <input type="number" name="march" class="form-control" id="march"
                                            placeholder="Enter March Amount" value="{{ old('march') }}"">
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
