<?php 
    session_start();
    $username = $_SESSION["username"];
    $role = $_SESSION["role"];
?>
    <!DOCTYPE html>
<html>
<body>

<?php 
if($role == 1)
require_once "../../navbars/navbaradmin.php";
else
require_once "../../navbars/navbaruser.php";
?>
<div class="row">
    <div class="col-10">
    <div class="hello mt-5">
    <h1> Hello <?php echo $username ?></h1>
    </div>
    </div>
    <div class="col-2">
    <button class="btn btn-primary mt-5 btn-lg" onclick="window.location.href = '../../auth/logout.php';">Logout</button>
    </div>
</div>

<div class="salary mt-5 mb-5">
    <h2>Do you Want to Calculate your salary?</h2>
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
    <form>
  <div class="form-group m-4">
    <label for="base_salary">Base Salary</label>
    <input type="number" class="form-control" id="SalaryBase" placeholder="Enter Base Salary" required>
  </div>
  <div class="form-group m-4">
    <label for="meal_allowance">Meal Allowance</label>
    <select class="form-control" name="meal_allowance" id="SubRefType" required>
      <option value="no_allowance">No meal allowance</option>
      <option value="card">Meal Card</option>
      <option value="money">Money</option>
    </select>
  </div>
  <div class="form-group m-4">
    <label for="meal_allowance_amount">Meal Allowance Amount per day</label>
    <input
      required
      type="number"
      class="form-control"
      id="SubRefValue"
      placeholder="Enter Meal Allowance Amount"
      value="0"
      disabled
    >
  </div>
  <div class="form-group m-4">
    <label for="meal_days">How many days did you work?</label>
    <input
      required
      type="number"
      class="form-control"
      id="days"
      placeholder="Enter Meal Days"
      value="0"
      disabled
    >
  </div>
</form>
    </div>
    <div class="col-sm-2"></div>

    <div class="col-sm-4 m-4">
    <p><strong>Your gross salary is: </strong><span id="GrossSalary"></span></p>
    <p><strong>Meal allowance ammount received: </strong><span id="SubRefValue"></span></p>
    <p> <strong>IRS tax:</strong> <span id="resultirs"></span></p>
    <p><strong>SS tax:</strong> <span id="resultss"></span></p>
    <p><strong>Your finaly salary is:</strong> <span id="LiquidSalary"></span></p>
    </div>
<div class="col-sm-1"></div>
</div>
<div class="mx-auto" style="width: 200px;">
<button class="btn btn-primary mt-5 btn-lg" id="Calculate">Calculate</button>
</div>
<script src="script.js"></script>
</body>
</html>