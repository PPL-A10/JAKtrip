

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
				  	  <?php for($i=0; $i<count($spam); $i++){
							$row = $spam[$i];
							echo "<tr>";
							echo "<td><input type='checkbox' value=''/></td>";
							echo "<td>". $row->place_name ."</td>";
							echo "<td>".$row->review	."</td>";
							if ($row->is_nudity == 1)
							{echo "<td>Nudity</td>";}
							if ($row->is_spam == 1)
							{echo "<td>Spam</td>";}	
							if ($row->is_falsestatement == 1)
							{echo "<td>False statement</td>";}
							if ($row->is_unrelatedcontent == 1)
							{echo "<td>Unrelated content</td>";}
							if ($row->is_profanity == 1)
							{echo "<td>Profanity</td>";}
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