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
    <input type="number" class="form-control" id="base_salary" placeholder="Enter Base Salary" required>
  </div>
  <div class="form-group m-4">
    <label for="meal_allowance">Meal Allowance</label>
    <select class="form-control" name="meal_allowance" id="meal_allowance" required>
      <option value="no_allowance">No meal allowance</option>
      <option value="card">Meal Card</option>
      <option value="money">Money</option>
    </select>
  </div>
  <div class="form-group m-4">
    <label for="meal_allowance_amount">Meal Allowance Amount</label>
    <input
      required
      type="number"
      class="form-control"
      id="meal_allowance_amount"
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
      id="meal_days"
      placeholder="Enter Meal Days"
      value="0"
      disabled
    >
  </div>
</form>
    </div>
    <div class="col-sm-2"></div>

    <div class="col-sm-4 m-4">
    <p><strong>Your gross salary is: </strong><span id="gross_salary"></span></p>
    <p><strong>The taxes you pay are:</strong> <span id="taxes"></span></p>
    <p><strong>The ammout you receive as meal allowance: </strong><span id="meal_allowance_value"></span></p>
    <p><strong>Meal allowance that is taxed:</strong> <span id="meal_allowance_taxed"></span></p>
    <p> <strong>IRS tax:</strong> <span id="descontos_irs"></span></p>
    <p><strong>SS tax:</strong> <span id="descontos_ss"></span></p>
    <p><strong>Your net salary is:</strong> <span id="net_salary"></span></p>
    </div>
<div class="col-sm-1"></div>
</div>
<div class="mx-auto" style="width: 200px;">
<button class="btn btn-primary mt-5 btn-lg" id="calculate">Calculate</button>
</div>
<script src="script.js"></script>
</body>
</html>