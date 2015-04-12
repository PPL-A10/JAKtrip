

			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">Review Spam</div>
				
				<span id="openLogin" class="newpost">
				<a href=""><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Remove Spam</a></span><br><br>
				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th>
				      <th>Tourist Attraction</th>
				      <th>Review</th>
				      <th>Reason</th>
				      <th>Reports</th>
				      <th>Last Reported</th>
				    </tr>
				  </thead>
				  <tbody>
				  	  <?php for($i=0; $i<count($tourattr); $i++){
							$row = $tourattr[$i];
							echo "<tr>";
							echo "<td><input type='checkbox' value=''/></td>";
							echo "<td>". $row->place_name ."</td>";
							echo "<td>". $row->author ."</td>";
							echo "<td>". $cat[$i]."</td>";
							echo "<td>". $row->last_modified ."</td>";
							echo "<td>". $row->hits ."</td>";
							echo "<td>". anchor('manageTourAttrCtr/del/' .$row->place_name, 'Delete') ."</td>";
							echo "<td>". anchor('manageTourAttrCtr/edit/' .$row->place_name, 'Edit') ."</td>";
							echo "</tr>";
						}
					  ?>
				    <?php
					
							//echo "<table border='1'>";
							foreach($query as $row)
							{
							echo "<tr>";
							echo"<td><input type='checkbox' id='check_list[]' value='".$row->id_rate."'></td>";
							echo "<td>".$row->username."</td>";
							echo "<td>".$row->review	."</td>";
							if ($row->is_nudity == 1)
							{echo "<td> Content mengandung nudity </td>";}
							if ($row->is_spam == 1)
							{echo "<td> Content berisi spam </td>";}	
							if ($row->is_falsestatement == 1)
							{echo "<td> Content berisi pernyataan tidak valid </td>";}
							if ($row->is_unrelatedcontent == 1)
							{echo "<td> Content tidak berhubungan dengan konteks </td>";}
							if ($row->is_profanity == 1)
							{echo "<td> Content berisi kata-kata tidak pantas </td>";}
							echo "<td>". anchor('SpamCtr/del/'.$row->id_rate, 'Delete') ."</td>";						
							echo "</tr>";
							}
							

						?>
				  </tbody>
				</table><br>

			<!--	<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>-->
			</div>


			
		</div>
	</div>