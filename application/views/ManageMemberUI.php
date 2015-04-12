


			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">All Member Accounts</div>
				
				
				
				<span class="input-group col-lg-7" style="margin-left: 150px;">
				    <input class="fieldsml form-control" type="text" placeholder="Member search">
				    <span class="input-group-btn">
				      <button class="fieldsml btn btn-default" type="button" style="width:40%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
				    </span>
			    </span><br>

			    <div class="searchmember col-lg-12">
			    	<ul class="letters">
			    		<li><a href="">A</a></li>
			    		<li><a href="">B</a></li>
			    		<li><a href="">C</a></li>
			    		<li><a href="">D</a></li>
			    		<li><a href="">E</a></li>
			    		<li><a href="">F</a></li>
			    		<li><a href="">G</a></li>
			    		<li><a href="">H</a></li>
			    		<li><a href="">I</a></li>
			    		<li><a href="">J</a></li>
			    		<li><a href="">K</a></li>
			    		<li><a href="">L</a></li>
			    		<li><a href="">M</a></li>
			    		<li><a href="">N</a></li>
			    		<li><a href="">O</a></li>
			    		<li><a href="">P</a></li>
			    		<li><a href="">Q</a></li>
			    		<li><a href="">R</a></li>
			    		<li><a href="">S</a></li>
			    		<li><a href="">T</a></li>
			    		<li><a href="">U</a></li>
			    		<li><a href="">V</a></li>
			    		<li><a href="">W</a></li>
			    		<li><a href="">X</a></li>
			    		<li><a href="">Y</a></li>
			    		<li><a href="">Z</a></li>
			    	</ul>			    	
			    </div>
			    <br><br>
			    <span id="openLogin" class="newpost"><br>
				
				
				

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
				  
				  <tbody>
				    <tr class="active">
					  	<?php
							//echo "<table border='1'>";
							foreach($query as $row)
							{
							//echo "<tr>";
							echo"<td><input type='checkbox' value=''></td>";
							echo "<td>".$row->username."</td>";
							echo "<td>".$row->email	."</td>";
							echo "<td></td>";
							echo "<td>".$row->join_date."</td>";
							echo "<td></td>";
							echo "<td>".$row->last_active."</td>";
							echo "<td>". anchor('ManageMemberCtr/del/' .$row->username, '<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete') ."</td>";
							echo "</tr>";
							}
							//echo "</table>";
	
						?>
				      <!--td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				    </tr>
				    <tr>
				      <td><input type="checkbox" value=""/></td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				    </tr-->
				  </tbody>
				</table><br>

				<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>
			</div>


			
		</div>
	</div>
