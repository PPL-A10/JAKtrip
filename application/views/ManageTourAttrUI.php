

			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">All Posts</div>
				
				<!-- <span id="openLogin" class="newpost"><a href=""><span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href=""><span class="fa fa-eye"></span>&nbsp;&nbsp;View</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href=""><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete</a></span><br><br> -->
				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th>
				      <th>Title</th>
				      <th>Author</th>
				      <th>Categories</th>
				      <th>Last Modified</th>
				      <th>Visitors</th>
				      <th colspan="2">Action</th>
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
							echo "<td>". anchor('manageTourAttrCtr/del/' .$row->place_name, '<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete') ."</td>";
							echo "<td>". anchor('manageTourAttrCtr/edit/' .$row->place_name, '<span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit') ."</td>";
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
