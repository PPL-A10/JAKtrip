
			<div class="col-lg-9">
					
				<div class="tuffyh2a admintitle">All Promo</div>

				<span class="input-group col-lg-7" style="margin-left: 150px;">
				    <input id="name_select" class="fieldsml form-control" type="text" placeholder="Promo search" style="background-color: #f0f0f0 !important;">
				    <span onclick="" class="input-group-btn">
				      <button class="fieldsml btn btn-default" type="button" style="width:40%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
				    </span>
			    </span><br>

			    <div class="searchmember col-lg-12">
			    	<ul class="letters">
			    		<li><a href="javascript:">A</a></li>
			    		<li><a href="javascript:">B</a></li>
			    		<li><a href="javascript:">C</a></li>
			    		<li><a href="javascript:">D</a></li>
			    		<li><a href="javascript:">E</a></li>
			    		<li><a href="javascript:">F</a></li>
			    		<li><a href="javascript:">G</a></li>
			    		<li><a href="javascript:">H</a></li>
			    		<li><a href="javascript:">I</a></li>
			    		<li><a href="javascript:">J</a></li>
			    		<li><a href="javascript:">K</a></li>
			    		<li><a href="javascript:">L</a></li>
			    		<li><a href="javascript:">M</a></li>
			    		<li><a href="javascript:">N</a></li>
			    		<li><a href="javascript:">O</a></li>
			    		<li><a href="javascript:">P</a></li>
			    		<li><a href="javascript:">Q</a></li>
			    		<li><a href="javascript:">R</a></li>
			    		<li><a href="javascript:">S</a></li>
			    		<li><a href="javascript:">T</a></li>
			    		<li><a href="javascript:">U</a></li>
			    		<li><a href="javascript:">V</a></li>
			    		<li><a href="javascript:">W</a></li>
			    		<li><a href="javascript:">X</a></li>
			    		<li><a href="javascript:">Y</a></li>
			    		<li><a href="javascript:">Z</a></li>
			    	</ul>			    	
			    </div>
			    <br><br><br>

				
				<!-- <span id="openLogin" class="newpost"><a href=""><span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href=""><span class="fa fa-eye"></span>&nbsp;&nbsp;View</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href=""><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete</a></span><br><br> -->

				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead style="text-align: center !important;">
				    <tr>
				      <!-- th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th -->
				      <th>Place Name</th>
				      <th>Promo Title</th>
				      <th>Type</th>
				      <th>Status</th>
				      <th colspan="3">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				   	<?php
							foreach($query as $row)
							{
							echo "<tr>";
							//echo"<td><input type='checkbox' value=''></td>";
							echo "<td>".$row->place_name."</td>";
							echo "<td>".$row->title."</td>";
							echo "<td>".$row->type_promo."</td>";
							echo "<td>On going / Expired</td>";
							echo "<td>";
							$onclick = array('onclick'=>"return confirm('Are you sure to delete ".$row->title."?')");
							echo anchor('admin/promos/delete'.$row->title,'<span class="fa fa-trash-o"></span>&nbsp;&nbsp;Delete', $onclick)."</td>";
							echo "<td>". anchor('admin/promo/edit' .$row->title, '<span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit') ."</td>";
							echo "<td><a href='".base_url('promo')."/".$row->title."'><span class='fa fa-eye'></span>&nbsp;&nbsp;View</a></td>";
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

			<div class="col-lg-3">
				<div style="margin-top: 20px; margin-left: -50px">
				<input type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url('admin/addnewpromo');?>'" value="Add New Promo">
				</div>
			</div>
			
		</div>
	</div>

