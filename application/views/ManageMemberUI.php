


			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">All Member Accounts</div>
				
				
				
				<span class="input-group col-lg-7" style="margin-left: 150px;">
				    <input id="name_select" class="fieldsml form-control" type="text" placeholder="Member search" style="background-color: #e8e8e8 !important;">
				    <span onclick="filterFunctionFinalMember()" class="input-group-btn">
				      <button class="fieldsml btn btn-default" type="button" style="width:40%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
				    </span>
			    </span><br>

			    <div class="searchmember col-lg-12">
			    	<ul class="letters">
			    		<li><a href="javascript:filterFunctionFinal2('a')">A</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('b')">B</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('c')">C</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('d')">D</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('e')">E</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('f')">F</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('g')">G</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('h')">H</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('i')">I</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('j')">J</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('k')">K</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('l')">L</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('m')">M</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('n')">N</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('o')">O</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('p')">P</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('q')">Q</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('r')">R</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('s')">S</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('t')">T</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('u')">U</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('v')">V</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('w')">W</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('x')">X</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('y')">Y</a></li>
			    		<li><a href="javascript:filterFunctionFinal2('z')">Z</a></li>
			    	</ul>			    	
			    </div>
			    <br><br><br>

				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th>
				      <th>Name</th>
				      <th>E-mail</th>
				      <th>Status</th>
				      <th>Joined Date</th>
				      <th>Reviews</th>
				      <th>Last Active</th>
				       <th>Action</th>
				    </tr>
				  </thead>
				  
				  <tbody id="output_field">
				    
					  	<?php
							//echo "<table border='1'>";
							foreach($query as $row)
							{
							echo "<tr>";
							echo"<td><input type='checkbox' value=''></td>";
							echo "<td>".$row->username."</td>";
							echo "<td>".$row->email	."</td>";
							echo "<td></td>";
							echo "<td>".$row->join_date."</td>";
							echo "<td></td>";
							echo "<td>".$row->last_active."</td>";
							echo "<td>";
							$onclick = array('onclick'=>"return confirm('Are you sure to delete ".$row->username."?')");
							echo anchor('manageMemberCtr/del/'.$row->username,'<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete', $onclick)."</td>";
							echo "</tr>";
							}
							//echo "</table>";
	
						?>
				  </tbody>
				</table><br>

				<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>
			</div>


			
		</div>
	</div>
