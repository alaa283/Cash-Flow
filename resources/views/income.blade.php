@extends('layouts.general')

@section('special-header')
@endsection

@section('main-body')
    <div class="container">
        @foreach ($data as $object)
            <h1 class="text-center">  {{ $object->profession }} </h1>
        @endforeach
        <form action="{{route('income.store')}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="exampleInputSalary">Salary</label>
                <input type="number" name="salary" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputInterest/Dividends">Interest/Dividends</label>
                <input type="text" name="interest_dividends" class="form-control">
            </div>

            <!-- <div class="form-group">
                <label for="exampleInputRealEstate/Business">Real Estate/Business</label>
                <input type="text" name="real_estate_business" class="form-control">
            </div> -->

            <div class="form-group">
                @foreach ($data as $object)
                    <input type="hidden" name="id_people" class="form-control" value="{{ $object->id }}">
                @endforeach
            </div>
            <!-- <input type="submit" value="Next" class="btn btn-primary" /> -->
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
@endsection

@section('special-end-page')
@endsection
