@extends('layouts.general')

@section('special-header')
@endsection

@section('main-body')
    <div class="container">
        <h1 class="text-center">Cash Flow</h1>
        <form action="{{route('people.store')}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="exampleInputProfession">Profession</label>
                <input type="text" name="profession" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputDream">Dream</label>
                <input type="text" name="dream" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputAuditor">Auditor</label>
                <input type="text" name="auditor" class="form-control">
            </div>
            <!-- <input type="submit" value="Next" class="btn btn-primary" /> -->
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
@endsection

@section('special-end-page')
@endsection
