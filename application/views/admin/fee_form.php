
<!-- start page -->
<div id="wrapper">
<div id="page">

	<!-- start content -->
	<div id="content_fee">
		<div class="post">
			<h2 class="title" style="margin-left:-155px;"><a href="#"> Add fee details</a></h2>

			<div class="entry">
			<?php echo form_open('admin/admin/enterfeedetails');?>
			<table class="tab_fee" class="alt_fee_details">
			
	<tr> 
	<td class="alt_fee_details">Student Name</td>
	 <?php echo form_error('studentname'); ?>
	<td width="150px"><input type="text" size="50" name="studentname"/></td>
   </tr>
   
   	<tr> 
	<td class="alt_fee_details">Student ID</td>
	 <?php echo form_error('studentid'); ?>
	<td><input type="text" size="50" name="studentid" /></td>
   </tr>
   
   	<tr> 
	<td class="alt_fee_details">Program</td>
	
	<td>
<select name="progrm" style="width:100px" name="proram">
<option value="Btech(ICT)">Btech(ICT)</option>
<option value="Mtech(ICT)">Mtech(ICT)</option>
<option value="MSc(IT)">MSc(IT)</option>
<option value="Msc(IT-ARD)">Msc(IT-ARD)</option>
<option value="Mdes">Mdes</option>
<option value="Phd">Phd</option>
</select>
</td>
	
	<tr> 
	<td class="alt_fee_details">Batch</td>
	<?php echo form_error('batch'); ?>
	<td><input type="text" size="50" name="batch"/></td>
   </tr>
   
   <tr> 
	<td class="alt_fee_details">Semester</td>
	<?php echo form_error('semester'); ?>
	<td>
<select name="Semster" name="semester">
<option value="sem1">Semester I</option>
<option value="sem2">Semester II</option>
<option value="summer1">Summer I</option>
<option value="sem3">Semester III</option>
<option value="sem4">Semester IV</option>
<option value="summer2">Summer II</option>
<option value="sem5">Semester V</option>
<option value="sem6">Semester VI</option>
<option value="summer3">Summer III</option>
<option value="semester7">Semester VII</option>
<option value="semester8">Semester VIII</option>
</select>
	</td>
	
   </tr>
   
   <tr> 
	<td class="alt_fee_details">Receipt No.</td>
	<?php echo form_error('receiptno'); ?>
	<td><input type="text" size="50" name="receiptno" /></td>
   </tr>
   
   <tr> 
	<td class="alt_fee_details">Approved Date</td>
	<?php echo form_error('approveddate'); ?>
	<td><input type="text" size="50" name="approveddate" /></td>
   </tr>
</table>


<br></br>


<table class="tab_fee">

                <tr>
				<th>Fee/Charge(s)</th>
				<th>Amount in Rs.</th>
				</tr>
				
				<tr>
				<td>Tution Fee</td>
				<td width="150px"><input type="text" size="50" name="tutionfee"/></td>
				</tr>
				
				<tr>
				<td>Registration Fee</td>
				<td><input type="text" size="50" name="registrationfee" /></td>
				</tr>
		
				
				<tr>
				<td>Medical Insurance</td>
				<td><input type="text" size="50" name="medialinsurance" /></td>
				</tr>
				
				
				<tr>
				<td> Hostel Fee</td>
				<td><input type="text" size="50" name="hostelfee" /></td>
				</tr>
				
				<tr>
				<td>Electricity Charges(Hostel)</td>
				<td><input type="text" size="50" name="electricitycharges" /></td>
				</tr>
				
				<tr>
				<td>Excess Payment</td>
				<td><input type="text" size="50"  name="excesspayment" /></td>
				</tr>
				
				<tr>
				<td>Late Fee</td>
				<td><input type="text" size="50" name="latefee" /></td>
				</tr>
				
				<tr>
				<td>Total</td>
				<td><input type="text" size="50" name="total" /></td>
				</tr>
				
		
				
				
</table>

<br></br>


<table class="tab_fee">

                <tr>
				<th>Payment(s)</th>
				<th>Detail(s)</th>
				</tr>
				
				<tr>
				<td>Cash Amount</td>
				<td width="150px"><input type="text" size="50" name="cashamount" /></td>
				</tr>
				
				<tr>
				<td>DD/Cheque Amount</td>
				<td><input type="text" size="50" name="dd/chequeamount" /></td>
				</tr>
				
				
				<tr>
				<td>DD/Cheque No.</td>
				<td><input type="text" size="50" name="dd/chequeno." /></td>
				</tr>
				
				
				<tr>
				<td>DD/Cheque Date</td>
				<td><input type="text" size="50" name="dd/chqquedate" /></td>
				</tr>
				
				<tr>
				<td>DD/Cheque Issuing Bank</td>
				<td><input type="text" size="50" name="dd/chequebank" /></td>
				</tr>
		
				
</table>

<p align="center">
<input type="submit" value="Submit" style="height:25px;width:130px;color:#fff;font-weight:bold;background:#3E83C9">
</p>
</form>
 
</body>

			</div>
			
		</div>
		
	</div>
	<!-- end content -->

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
</div>

</body>
</html>
