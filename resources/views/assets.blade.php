@extends('layouts.general')

@section('special-header')
@endsection

@section('main-body')


    <div class="container">
        <form action="{{route('expenses.store')}}" method="POST">
            
        @csrf
        <div class="row">
        
            @php
                $ex = DB::table('incomes')
                ->join('expenses', 'expenses.id_incomes', '=', 'incomes.id')
                ->select('incomes.id' , 'incomes.salary')
                ->get();



                $ex2 = DB::table('realestates')
                ->join('expenses', 'realestates.id_expenses', '=', 'expenses.id')
                ->select('realestates.real_estate_business)')
                ->sum('realestates.real_estate_business');

            @endphp
            
            <div class="form-group col-lg-6">
                <label for="exampleInputRealEstateBusiness">Real Estate/Business</label>
                <input type="number" name="real_estate_business" id="real_estate_business" class="form-control">
                @foreach ($ex as $object)
                <input type="hidden" name="salary" id="salary" value="{{$object->salary}}" class="form-control">
                @endforeach
                <input type="hidden" name="sum_total" id="sum_total" value="{{$ex2}}" class="form-control">
            </div>
            
            <div class="form-group col-lg-6">
                <label for="exampleInputTotalIncomes">Total Incomes</label>
                <input type="number" name="total_income" id="total_income" class="form-control" disabled>
            </div>

            @foreach ($data as $object)
                <div class="form-group col-lg-4">
                    <label for="exampleInputPerChildExpense">Per Child Expense</label>
                    <input type="number" id="per_child_expense" class="form-control" value="{{$object->per_child_expense}}" disabled>
                </div>

                <div class="form-group col-lg-4">
                    <label for="exampleInputChildren">Children</label>
                    <input type="number" name="children" id="children" class="form-control">
                </div>

                <input type="hidden" id="taxes" value="{{$object->taxes}}" class="form-control">
                <input type="hidden" id="home_mortgage_payment" value="{{$object->home_mortgage_payment}}" class="form-control">
                <input type="hidden" id="School_loan_payment" value="{{$object->School_loan_payment}}" class="form-control">
                <input type="hidden" id="car_loan_payment" value="{{$object->car_loan_payment}}" class="form-control">

                <input type="hidden" id="credit_card_payment" value="{{$object->credit_card_payment}}" class="form-control">
                <input type="hidden" id="other_expenses" value="{{$object->other_expenses}}" class="form-control">
                <input type="hidden" id="bank_loan_payment" value="{{$object->bank_loan_payment}}" class="form-control">
            @endforeach

            <div class="form-group col-lg-4">
                <label for="exampleInputChildren">Total Expenses</label>
                <input type="number" name="total_expenses" id="total_expenses" class="form-control" disabled>
            </div>

            <div class="form-group col-lg-4">
                <label for="exampleInputMonthlyCashFlow">Monthly Cash Flow</label>
                <input type="number" name="monthly_cash_flow" id="monthly_cash_flow" class="form-control" disabled>
            </div>

            <div class="form-group col-lg-4">
                <label for="exampleInputSavings">Savings (Assets)</label>
                <input type="number" name="savings" id="savings" class="form-control">
            </div>

            <div class="form-group col-lg-4">
                <label for="exampleInputTotal">Total</label>
                <input type="number" name="total" id="total" class="total1 form-control" disabled>
            </div>

            <div class="form-group col-lg-12">
                <label for="exampleInputSum"> +/- </label>
                <div class="row">
                    <input type="number" name="sum" id="sum" class="form-control sum col-lg-7 ml-3">
                    <button type="button" class="btn btn-primary add col-lg-4 ml-4">Add Report</button>
                </div>   
            </div>

            <div class="form-group table-hover col-lg-12 tasks"></div>

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
     var total_income , total_child_expense , total_expenses , monthly_cash_flow , total;

    $('#salary, #real_estate_business,#sum_total').on("paste keyup",
        function () 
        {

            total_income =  parseInt($("#salary").val()) +
                            parseInt($("#real_estate_business").val()) +
                            parseInt($("#sum_total").val());
            
            $("#total_income").val((isNaN(total_income) ? '' : total_income));
            // console.log(total_income);
        }
    );

    $('#taxes, #home_mortgage_payment, #School_loan_payment, #car_loan_payment, #credit_card_payment, #other_expenses, #bank_loan_payment, #per_child_expense, #children').on("paste keyup",
        function () 
        {

            total_child_expense = parseInt($("#per_child_expense").val()) * parseInt($("#children").val());
            // $("#total_child_expense").val((isNaN(total_child_expense) ? '' : total_child_expense));

            total_expenses = parseInt($("#taxes").val()) + parseInt($("#home_mortgage_payment").val()) +
                             parseInt($("#School_loan_payment").val()) + parseInt($("#car_loan_payment").val()) +

                             parseInt($("#credit_card_payment").val()) + parseInt($("#other_expenses").val()) +
                             parseInt($("#bank_loan_payment").val()) + total_child_expense;
            $("#total_expenses").val((isNaN(total_expenses) ? '' : total_expenses));

            monthly_cash_flow = total_income - total_expenses;
            $("#monthly_cash_flow").val((isNaN(monthly_cash_flow) ? '' : monthly_cash_flow));

            // console.log(total_expenses);
        }
    );

    $('#monthly_cash_flow, #savings').on("paste keyup",
        function () 
        {

            total =  parseInt($("#monthly_cash_flow").val()) +
                            parseInt($("#savings").val());
            
            $("#total").val((isNaN(total) ? '' : total));
            // console.log(total);
        }
    );

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
                    sum.value = parseInt(sum.value) + parseInt(total);
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
