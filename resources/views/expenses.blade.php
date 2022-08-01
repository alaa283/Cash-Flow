@extends('layouts.general')

@section('special-header')
@endsection

@section('main-body')


    <div class="container">
        <form action="{{route('expenses.store')}}" method="POST">
            
        @csrf
        <div class="row">
            @foreach ($data as $object)        
                <div class="form-group col-lg-6">
                    <label for="exampleInputSalary">Salary</label>
                    <input type="number" name="salary" id="salary" value="{{ $object->salary }}" class="form-control" disabled>

                    <input type="hidden" name="id_incomes" id="id_incomes" value="{{ $object->id }}" class="form-control">
                </div>
            @endforeach
            <div class="form-group col-lg-6">
                <label for="exampleInputRealEstateBusiness">Real Estate/Business</label>
                <input type="number" name="real_estate_business" id="real_estate_business" class="form-control">
            </div>

            <div class="form-group col-lg-12">
                <label for="exampleInputTotalIncome">Total Income</label>
                <input type="number" name="total_income" id="total_income" class="form-control" disabled>
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

            <div class="form-group col-lg-12">
                <label for="exampleInputTotalChildExpenses">Total Child Expenses</label>
                <input type="number" name="total_child_expense" id="total_child_expense" class="form-control" disabled>
            </div>



            <div class="form-group col-lg-12">
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

            <div class="form-group col-lg-6">
                <label for="exampleInputBankLoanPayment">Bank Loan Payment</label>
                <input type="number" name="bank_loan_payment" id="bank_loan_payment" class="form-control">
            </div>

            <div class="form-group col-lg-6">
                <label for="exampleInputTotalExpenses">Total Expenses</label>
                <input type="number" name="total_expenses" id="total_expenses" class="form-control" disabled>
            </div>

            <div class="form-group col-lg-6">
                <label for="exampleInputMonthlyCashFlow">Monthly Cash Flow</label>
                <input type="number" name="monthly_cash_flow" id="monthly_cash_flow" class="form-control" disabled>
            </div>


            <!-- <input type="submit" value="Next" class="btn btn-primary" /> -->
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
        </form>
    </div>
@endsection

@section('special-end-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
     var total_income , total_child_expense , total_expenses , monthly_cash_flow;

    $('#salary, #real_estate_business').on("paste keyup",
        function () 
        {

            total_income = parseInt($("#salary").val()) + parseInt($("#real_estate_business").val());
            
            $("#total_income").val((isNaN(total_income) ? '' : total_income));
            console.log(total_income);
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

            console.log(total_expenses);
        }
    );
</script>
<script>
    var total_income, salary, real_estate_business, taxes, home_mortgage_payment,
        School_loan_payment, car_loan_payment, credit_card_payment, other_expenses,
        bank_loan_payment, per_child_expense , children , total_child_expense ,
        total_expenses;

    // salary = document.getElementById('salary');
    // real_estate_business = document.getElementById('real_estate_business');

    // total_income = salray + real_estate_business;

    taxes = document.getElementById('taxes');
    home_mortgage_payment = document.getElementById('home_mortgage_payment');
    School_loan_payment = document.getElementById('School_loan_payment');
    car_loan_payment = document.getElementById('car_loan_payment');

    credit_card_payment = document.getElementById('credit_card_payment');
    other_expenses = document.getElementById('other_expenses');
    bank_loan_payment = document.getElementById('bank_loan_payment');

    per_child_expense = document.getElementById('per_child_expense');
    children = document.getElementById('children');

    total_child_expense = per_child_expense * children ;

    total_expenses = taxes + home_mortgage_payment + School_loan_payment + 
                     car_loan_payment + credit_card_payment + other_expenses +
                     bank_loan_payment + total_child_expense;

    if(real_estate_business > total_expenses)
    {
        console.log("you’re out of the Rat Race");
    }

    function add_number(e) 
    {
        if (isNumberKey(e)) 
        {
            setTimeout(() => 
            {
                salary = document.getElementById("salary").value !== "" ? parseInt(document.getElementById("salary").value) : 0;
                real_estate_business = document.getElementById("real_estate_business").value !== "" ? parseInt(document.getElementById("real_estate_business").value) : 0;
                total_income = salray + real_estate_business;
            document.getElementById("total_income").value = total_income;
            }, 50)
            return true;
        } 
        else 
        {
            return false;
        }
    }

function isNumberKey(evt) 
{
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57)) 
  {
    return false;
  }
  return true;
}


</script>
@endsection
