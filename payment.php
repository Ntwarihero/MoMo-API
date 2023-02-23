
 <form method="POST" action="momo.php">
 	<input type="hidden" name="id" value="<?=$id?>">
 	<label>Amount</label>
 <input type="text" name="amount" readonly="" class="form-control" value="100" required="">
 <br>
 <label>Phone Number</label>
 <input type="text" maxlength="10" minlength="10" name="phone" class="form-control" required=""> <br>
 <center><input type="submit" name="pay" value="Generate Payment" class="btn btn-primary"></center>
 </form>