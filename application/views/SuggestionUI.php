	<div class="col-lg-12" style="background-color: #fff;">
		<div class="tuffyh2a admintitle">Suggestions</div>
		
		<div class="col-lg-2"></div>

		<div class="col-lg-8">
			<ul class="nav nav-pills fak">
				<li id="liplac"><a href="#places">Places</a></li>
				<li id="liphot"><a href="#photos">Photos</a></li>
			</ul>			
			<br><br>
			<div id="places" style="margin: 0px 150px 100px -200px;" >
				<table class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				      <th>Place Name</th>
				      <th>Description</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
							foreach($query as $row)
							{
							$place=$row->place_name;
							$check=mysql_query("SELECT place_name FROM tourist_attraction as ta WHERE ta.place_name='$place'");
							echo "<tr>";
							echo "<td>".$row->place_name."</td>";
							echo "<td>".$row->description."</td>";
							if(mysql_num_rows($check)>0){
								echo "<td>Added</td>";
							}
							else{
								echo "<td><a href=".base_url('admin/addnewplace')." target='_blank'>Add New Place?</a></td>";
							}
							
							echo "</tr>";
							}
							//echo "</table>";
	
						?>
				  </tbody>
				</table>
			</div>

			<div id="photos" style="margin: 0px 150px 100px -200px;" >
				<table class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				      <th>Place Name</th>
				      <th>Link</th>
				      <th>Name</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody id="output_field123" >
				  <?php 
				  foreach($query2 as $row)
				  {
					echo "<tr>";
					echo "<td>".$row->place_name ."</td>";
					echo "<td>".$row->pic ."</td>";
					echo "<td>ahmadibrahim</td>";
					if($row->is_publish == 0)
				  	{echo"<td><a href='javascript:setphotopublish(".$row->id_pic .")'>&nbsp;&nbsp;Publish?</a></td>";}
					else
					{echo "<td>Published</td>";}
				  }
				  ?>
				  	<!--tr>
				  		<td>Taman Bermain</td>
				  		<td><a href="#">http://frontroll.com/foto_berita/46kebun-binatang.jpg<a></td>
				  		<td>ahmadibrahim</td>
				  		<td><a href="#">&nbsp;&nbsp;Publish?</a></td>
				  	</tr>
				  	<tr>
				  		<td>Kebun Tetangga</td>
				  		<td><a href="#">http://frontroll.com/foto_berita/46kebun-binatang.jpg</a></td>
				  		<td>ahmadibrahim</td>
				  		<td><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Published</td>
				  	</tr-->
				  </tbody>
				</table>
			</div>

		
		</div>

		<div class="col-lg-2"></div>

	</div>
		
		</div>
</div>
