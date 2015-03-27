<div>

hahahah
</div>
<div class"row" id="row4">
				<div id="blogMain" class="col-md-6 ">
					<?php
			  // 		foreach ($query->result() as $row) 
			  // 		{
					// 	echo "<div class=\"blog-post well\"><p>".$row->Nama."

					// 	<button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->Nama."\" onclick=\"fui(".$row->Budget.",'".$row->Nama."')\"".$row->Nama."\">".$row->Budget."</button></p></div>";
					// }
					echo "<table class='table' >";
					foreach ($query->result() as $row) {
						# code...
						echo "<tr><td>".$row->Nama."</td></tr>";
					}
					echo "</table>";
			  		?>

				</div>
	 		 	<div class="col-md-6" id="googleMap" style="height:380px;">
	 		 		
	 		 	</div>
	 		 	
			</div>