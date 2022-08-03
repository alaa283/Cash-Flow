@extends('layouts.general')

@section('special-header')
@endsection

@section('main-body')
    <style>
        .task:hover
        {
            background-color: #f7f7f7;
        }
    </style>

    <div class="container">


        <form action="{{route('income.store')}}" method="POST">
        @csrf
        @foreach ($data as $object)
            <h1 class="text-center">  {{ $object->profession }} </h1>
            <input type="hidden" name="id_people" class="form-control" value="{{ $object->id }}">
        @endforeach
        
        <div class="row">
            <div class="row col-lg-6">
                <h3 class="text-center col-lg-12"> Income </h3>

                <div class="form-group col-lg-12">
                    <label for="exampleInputSalary">Salary</label>
                    <input type="number" name="salary" id="salary1" class="form-control">
                </div>

                <div class="form-group col-lg-12">
                    <label for="exampleInputInterest/Dividends">Interest/Dividends</label>
                    <input type="text" name="interest_dividends" class="form-control">
                </div>

                <div class="row col-lg-12">
                    <div class="form-group col-lg-8">
                        <label for="exampleInputRealEstateBusiness">Real Estate/Business</label>
                        <input type="number" name="real_estate_business" id="real_estate_business1" class="form-control sum">
                    </div>

                    <div class="form-group col-lg-4" style="margin-top: 2rem">
                        <button type="button" class="btn btn-primary add">Add Report</button>
                    </div>

                    <div class="form-group col-lg-12 tasks"></div>
                </div>

            </div>

            <div class="row col-lg-6">
                <h3 class="text-center col-lg-12"> Expenses </h3>

                <div class="form-group col-lg-6">
                    <label for="exampleInputTaxes">Taxes</label>
                    <input type="number" name="taxes" id="taxes" class="form-control">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputHomeMortgagePayment">Home Mortgage Payment</label>
                    <input type="number" name="home_mortgage_payment" id="home_mortgage_payment" class="form-control">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputSchoolLoanPayment">School Loan Payment</label>
                    <input type="number" name="School_loan_payment" id="School_loan_payment" class="form-control">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputCarLoanPayment">Car Loan Payment</label>
                    <input type="number" name="car_loan_payment" id="car_loan_payment" class="form-control">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputCreditCardPayment">Credit Card Payment</label>
                    <input type="number" name="credit_card_payment" id="credit_card_payment" class="form-control">
                </div>

                <div class="form-group col-lg-6">
                    <label for="exampleInputOtherExpenses">Other Expenses</label>
                    <input type="number" name="other_expenses" id="other_expenses" class="form-control">
                </div>

                <div class="form-group col-lg-12">
                    <label for="exampleInputBankLoanPayment">Bank Loan Payment</label>
                    <input type="number" name="bank_loan_payment" id="bank_loan_payment" class="form-control">
                </div>

                <div class="form-group col-lg-5">
                    <label for="exampleInputPerChildExpense">Per Child Expense</label>
                    <input type="number" name="per_child_expense" id="per_child_expense" class="form-control">
                </div>

                <div class="form-group col-lg-2">
                    <h4 class="text-center mt-4">  x </h4>
                </div>

                <div class="form-group col-lg-5">
                    <label for="exampleInputChildren">Children</label>
                    <input type="number" name="children" id="children" class="form-control">
                </div>


            </div>
        </div>

        <div class="dd">
            <div class="d-flex justify-content-center">
                <div class="form-group col-lg-4">
                    <p for="exampleInputSalary" class="text-center">Salary</p>
                    <input type="number" id="salary2" class="form-control" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h3 class="text-center"> + </h3>
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-group col-lg-4">
                    <p class="text-center">Real Estate/Business</p>
                    <input type="number" id="real_estate_business2" class="form-control" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h3 class="text-center"> = </h3>
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-group col-lg-4">
                    <p class="text-center">Total Income</p>
                    <input type="number" name="total_income" id="total_income" class="form-control" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h3 class="text-center"> - </h3>
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-group col-lg-4">
                    <p class="text-center">Total Expenses</p>
                    <input type="number" name="total_expenses" id="total_expenses" class="form-control" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-group col-lg-4">
                    <p class="text-center">Monthly Cash Flow</p>
                    <input type="number" name="monthly_cash_flow" id="monthly_cash_flow" class="form-control" disabled>
                    <!-- <button type="button" class="btn btn-primary" id="calc">Next</button> -->
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-group col-lg-4">
                    <button type="button" class="btn btn-primary" id="calc">calculation</button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
        <div class="row col-lg-6">
            <h3 class="text-center col-lg-12"> Assets </h3>

            <div class="form-group col-lg-12">
                <label for="exampleInputSavings">Savings (Assets)</label>
                <input type="number" name="savings" id="savings" class="form-control">
            </div>

        </div>
        <!-- </div> -->
           
        </form>
    </div>
@endsection

@section('special-end-page')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        let sum = document.querySelector(".sum");
        let submit = document.querySelector(".add");
        let tasksDiv = document.querySelector(".tasks");

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
                    // check of array empty
                    if( i == 0 && arrOfTasks.length == 0)
                    {
                        addTaskToArray(sum.value);  // Add Task to array of tasks.
                        // console.log(addTaskToArray(sum));
                    }

                    // check of array not empty
                    else if(i == 0 && arrOfTasks.length != 0)
                    {
                        sum.value = parseInt(sum.value) + parseInt(arrOfTasks[arrOfTasks.length - 1 ].title);
                        addTaskToArray(sum.value);  // Add Task to array of tasks.
                        // console.log(addTaskToArray());
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

    <script>
        var salary, real_estate_business, total_income, monthly_cash_flow;

        $('.add').click(
            function () 
            {
                real_estate_business = parseInt($("#real_estate_business1").val());
                $("#real_estate_business2").val((isNaN(real_estate_business) ? '' : real_estate_business));
                
                console.log(real_estate_business);

                total_income = salary + real_estate_business;
                $("#total_income").val((isNaN(total_income) ? '' : total_income));
                
                // console.log(total_income);
            }
        );

        $('#salary1, #real_estate_business1').on("paste keyup",
            function () 
            {
                salary =  parseInt($("#salary1").val());
                $("#salary2").val((isNaN(salary) ? '' : salary));

                console.log(salary);

                real_estate_business =  parseInt($("#real_estate_business1").val());
                $("#real_estate_business2").val((isNaN(real_estate_business) ? '' : real_estate_business));

                total_income = salary + real_estate_business;
                $("#total_income").val((isNaN(total_income) ? '' : total_income));
                
                // console.log(total_income);
            }
        );

        $('#taxes, #home_mortgage_payment, #School_loan_payment, #car_loan_payment, #credit_card_payment, #other_expenses, #bank_loan_payment, #per_child_expense, #children').on("paste keyup",
            function () 
            {
                total_child_expense = parseInt($("#per_child_expense").val()) * parseInt($("#children").val());
                $("#total_child_expense").val((isNaN(total_child_expense) ? '' : total_child_expense));

                total_expenses = parseInt($("#taxes").val()) + parseInt($("#home_mortgage_payment").val()) +
                                parseInt($("#School_loan_payment").val()) + parseInt($("#car_loan_payment").val()) +

                                parseInt($("#credit_card_payment").val()) + parseInt($("#other_expenses").val()) +
                                parseInt($("#bank_loan_payment").val()) + total_child_expense;
                $("#total_expenses").val((isNaN(total_expenses) ? '' : total_expenses));

                monthly_cash_flow = total_income - total_expenses;
                $("#monthly_cash_flow").val((isNaN(monthly_cash_flow) ? '' : monthly_cash_flow));

                // console.log(monthly_cash_flow);
            }
        );

        $('#calc').click(
            function () 
            {
                monthly_cash_flow = total_income - total_expenses;
                $("#monthly_cash_flow").val((isNaN(monthly_cash_flow) ? '' : monthly_cash_flow));
            }
        );

    </script>
@endsection
