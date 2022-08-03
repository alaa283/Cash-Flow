@extends('layouts.general')

@section('special-header')
@endsection

@section('main-body')


    <div class="container">
        <form action="{{route('asset.store')}}" method="POST">
            
        @csrf
        <div class="row">
            @foreach ($data as $object)
                <div class="form-group col-lg-6">
                    <lable for="exampleInputMonthlyCashFlow">Monthly Cash Flow</lable>
                    <input type="number" name="monthly_cash_flow" id="monthly_cash_flow" class="form-control" value="{{ $object->monthly_cash_flow }}" disabled>
                </div>

                <input type="hidden" name="id_realestates" class="form-control" value="{{ $object->id }}">

            @endforeach

            <div class="form-group col-lg-6">
                <lable for="exampleInputMonthlyCashFlow"> Assets </lable>
                <input type="number" name="savings" id="assets" class="form-control">
            </div>
        </div>
            
            <div class="form-group col-lg-12">
                <label for="exampleInputSum"> +/- </label>
                <div class="row">
                    <input type="number" name="sum" id="changing" class="form-control sum col-lg-7 ml-3">
                    <button type="button" class="btn btn-primary add col-lg-4 ml-4">Add Report</button>
                </div>   
            </div>

        <div class="form-group table-hover col-lg-12 tasks"></div>

        <div class="d-flex justify-content-center">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
<style>
    .task:hover
    {
        background-color: #f7f7f7;
    }
</style>

            <!-- <input type="submit" value="Next" class="btn btn-primary" /> -->
            <!-- <button type="submit" class="btn btn-primary">Next</button> -->
        </div>
        </form>
    </div>
@endsection

@section('special-end-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
     var total;

    $('#monthly_cash_flow, #assets').on("paste keyup",
        function () 
        {

            total =  parseInt($("#monthly_cash_flow").val()) + parseInt($("#assets").val());
            
            $("#changing").val((isNaN(total) ? '' : total));
        }
    );

</script>

<script>
    let sum = document.querySelector(".sum");
    let submit = document.querySelector(".add");
    let tasksDiv = document.querySelector(".tasks");

    // let total1 = document.querySelector(".total");

    // Empty array to store the tasks : 
    let arrOfTasks = [];
    // Add Task : 

    
    submit.onclick = function ()
    {
        if(sum.value !== "")
        {
            // lopping on arrOfTasks to adding numbers
            for(let i = 0 ; i <= arrOfTasks.length ; i++)
            {
                console.log(total);
                // check of array empty
                if( i == 0 && arrOfTasks.length == 0)
                {
                    addTaskToArray(sum.value);  // Add Task to array of tasks.
                }

                // check of array not empty
                else if(i == 0 && arrOfTasks.length != 0)
                {
                    sum.value = parseInt(sum.value) + parseInt(arrOfTasks[arrOfTasks.length - 1 ].title);
                    addTaskToArray(sum.value);  // Add Task to array of tasks.
                }
            }
        }
    }

    function addTaskToArray(taskText)
    {
        // Task data : 
        const task = 
        {
            id        : Date.now(),
            title     : taskText,
            completed : false
        };

        // Push Task to the array of tasks : 
        arrOfTasks.push(task);

        // Add tasks to page : 
        addElementsToPageFrom(arrOfTasks);

    }

    function addElementsToPageFrom(arrOfTasks)
    {
        // Empty Tasks div : 
        tasksDiv.innerHTML = "";
        // Looping on arrOfTasks : 
        arrOfTasks.forEach(task => 
        {
            // create main div : 
            let div = document.createElement("div");
            div.className = "task form-control mb-2 col-lg-12";

            // div.value = number + arrOfTasks[arrOfTasks.length - 1];
            // check if task is done : 
            if(task.completed)
            {
                div.className = "task done";
            }
            div.setAttribute("data-id", task.id);
            div.appendChild(document.createTextNode(task.title));
            // Show task div to page : 
            tasksDiv.appendChild(div);
        });
    }
</script>
@endsection
