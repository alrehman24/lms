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
                                <input type="hidden" name='id' value='{{ $feeStructure->id }}'/>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Class</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option @if ($class->id == $feeStructure->class_id) selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
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
                                                <option @if($academicYear->id == $feeStructure->academic_year_id) selected @endif value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
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
                                                <option @if ($feeHead->id == $feeStructure->fee_head_id) selected @endif value="{{ $feeHead->id }}">{{ $feeHead->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">April</label>
                                        <input type="number" value="{{ $feeStructure->april }}" name="april" class="form-control" id="april"
                                            placeholder="Enter April Amount">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">May</label>
                                        <input type="number" value="{{ $feeStructure->may }}" name="may" class="form-control" id="may"
                                            placeholder="Enter May Amount">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">June</label>
                                        <input type="number" value="{{ $feeStructure->june }}" name="june" class="form-control" id="june"
                                            placeholder="Enter June Amount">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">July</label>
                                        <input type="number" value="{{ $feeStructure->july }}" name="july" class="form-control" id="july"
                                            placeholder="Enter July Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">August</label>
                                        <input type="number" value="{{ $feeStructure->august }}" name="august" class="form-control" id="august"
                                            placeholder="Enter August Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">September</label>
                                        <input type="number" value="{{ $feeStructure->september }}" name="september" class="form-control" id="september"
                                            placeholder="Enter September Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">October</label>
                                        <input type="number" value="{{ $feeStructure->october }}" name="october" class="form-control" id="october"
                                            placeholder="Enter October Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">November</label>
                                        <input type="number" value="{{ $feeStructure->november }}" name="november" class="form-control" id="november"
                                            placeholder="Enter November Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">December</label>
                                        <input type="number" value="{{ $feeStructure->december }}" name="december" class="form-control" id="december"
                                            placeholder="Enter December Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">January</label>
                                        <input type="number" value="{{ $feeStructure->january }}" name="january" class="form-control" id="january"
                                            placeholder="Enter January Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">February</label>
                                        <input type="number" value="{{ $feeStructure->february }}" name="february" class="form-control" id="february"
                                            placeholder="Enter February Amount">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">March</label>
                                        <input type="number" value="{{ $feeStructure->march }}" name="march" class="form-control" id="march"
                                            placeholder="Enter March Amount">
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
