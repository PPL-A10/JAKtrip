

			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">Review Spam</div>
				
				<span id="openLogin" class="newpost" >
				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th>
				      <th>Tourist Attraction</th>
				      <th>Review</th>
				      <th>Reasons</th>
				      <th>Reports</th>
				      <th>Last Reported</th>
				    </tr>
				  </thead>
				  <tbody>
				  	  	<?php
							//echo "<table border='1'>";
							foreach($query as $row)
							{
							$a = (int)$row->is_nudity;
							$b = (int)$row->is_spam;
							$c = (int)$row->is_falsestatement;
							$d = (int)$row->is_unrelatedcontent;
							$e = (int)$row->is_profanity;
							$f = $b +$a +$c+$d+$e ;
							//echo "<tr>";
							echo"<td><input type='checkbox' id='check_list[]' value='".$row->id_rate."'></td>";
							echo "<td>".$row->place_name."</td>";
							echo "<td>".$row->review	."</td>";
							echo "<td>";
							if ($row->is_nudity > 0)
							{echo "Nudity, ";}
							if ($row->is_spam > 0)
							{echo "Spam, ";}	
							if ($row->is_falsestatement > 0)
							{echo "False Statement, ";}
							if ($row->is_unrelatedcontent > 0)
							{echo "Unrelated Content, ";}
							if ($row->is_profanity > 0)
							{echo "Profanity, ";}
							echo "</td>";
							echo "<td>".$f."</td>";
							echo "<td>";
							$onclick = array('onclick'=>"return confirm('Are you sure to delete this review?')");
							echo anchor('SpamCtr/del/'.$row->id_rate,'<span class="fa fa-trash-o">&nbsp;&nbsp;Delete</span>', $onclick)."</td>";
							echo "</tr>";
							}
							
							//echo "</table>";


						?>
				  </tbody>
				</table><br>

			<!--	<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>-->
				<div style="height: 200px"></div>
			</div>


			
		</div>
	</div>