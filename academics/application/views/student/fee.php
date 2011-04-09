
<div id="wrapper">
<div id="page">

	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title"><a href="#"> Fee Details</a></h2>

			<div class="entry">
			<table class="tab_fee" class="alt_fee_details" table style="margin-left:120px">
			
	<tr> 
	<td class="alt_fee_details">Student Name</td>
  <td><?php echo $fee['0']['candidate_name']; ?></td>
   </tr>
   
   	<tr> 
	<td class="alt_fee_details">Student ID</td>
	 <td><?php echo $fee['0']['user_id']; ?></td>
</tr>
   
   	<tr> 
	<td class="alt_fee_details">Program</td>
   <td><?php echo $fee['0']['program']; ?></td>

	
	<tr> 
	<td class="alt_fee_details">Batch</td>
 <td><?php echo $fee['0']['batch_year']; ?></td>

   </tr> 
   <tr> 
	<td class="alt_fee_details">Semester</td>
	 <td><?php echo $fee['0']['semester']; ?></td>
  </tr>
   
   <tr> 
	<td class="alt_fee_details">Receipt No.</td>
	 <td><?php echo $fee['0']['reciept_number']; ?></td>
</tr>
   
   <tr> 
	<td class="alt_fee_details">Approved Date</td>
	 <td><?php echo $fee['0']['approved_date']; ?></td>
   </tr>
</table>

<br></br>

<table class="tab_fee" table style="margin-left:120px">

                <tr>
				<th>Fee/Charge(s)</th>
				<th>Amount in Rs.</th>
				</tr>
				
				<tr>
				<td>Tution Fee</td>
	      <td><?php echo $fee['0']['tution_fee']; ?></td>
   </tr>
				</tr>
				
				<tr class="alt_fee">
				<td>Registration Fee</td>
				 <td><?php echo $fee['0']['registration_fee']; ?></td>

				</tr>
				
				
				<tr>
				<td>Medical Insurance</td>
				 <td><?php echo $fee['0']['medical_insurance']; ?></td>

				</tr>
				
				
				<tr class="alt_fee">
				<td> Hostel Fee</td>
				 <td><?php echo $fee['0']['hostel_fee']; ?></td>

				</tr>
				
				<tr>
				<td>Electricity Charges(Hostel)</td>
				 <td><?php echo $fee['0']['Electricity_charges']; ?></td>

				</tr>
				
				<tr class="alt_fee">
				<td>Excess Payment</td>
				 <td><?php echo $fee['0']['excess_payment']; ?></td>

				</tr>
				
				<tr>
				<td>Late Fee</td>
				<td><?php echo $fee['0']['late_fee']; ?></td>

				</tr>
				
				<tr class="alt_fee">
				<td>Total</td>
				 <td><?php echo $fee['0']['total']; ?></td>

				</tr>
				
		
				
				
</table>

<br></br>

<table class="tab_fee" table style="margin-left:120px">

                <tr>
				<th>Payment(s)</th>
				<th>Detail(s)</th>
				</tr>
				
				<tr>
				<td>Cash Amount</td>
				<td>41,500.00</td>
				</tr>
				
				<tr class="alt">
				<td>DD/Check Amount</td>
				<td></td>
				</tr>
				
				
				<tr>
				<td>DD/Check Amount No.</td>
				<td></td>
				</tr>
				
				
				<tr class="alt">
				<td>DD/Check Date</td>
				<td></td>
				</tr>
				
				<tr>
				<td>DD/Check Issuing Bank</td>
				<td></td>
				</tr>
		
				
</table>

			</div>
			
		</div>
		
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	
	<!-- end sidebar -->

	<div style="clear: both;">&nbsp;</div>
</div>
</div><!-- end page -->
