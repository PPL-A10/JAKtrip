<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
   
 
    <h4>Display Records From Database Using Codeigniter</h4>
    <table>
     <tr>
      <td><strong>Place Name</strong></td>
      <td><strong>Weekday Price</strong></td>
	  <td><strong>Weekend Price</strong></td>
	  <td><strong>Longitude</strong></td>
	  <td><strong>Lattitude</strong></td>
	  <td><strong>City</strong></td>
	  <td><strong>Rate Average</strong></td>
	  <td><strong>Description</strong></td>
	  <td><strong>Place Info</strong></td>
	  <td><strong>Halte Code</strong></td>
	  <td><strong>Transport Info</strong></td>
	  <td><strong>Transport Price</strong></td>
	  <td><strong>Author</strong></td>
    </tr> 
     <?php foreach($posts as $post){?>
     <tr>
         <td><?php echo $post->place_name;?></td>
         <td><?php echo $post->weekday_price;?></td>
		 <td><?php echo $post->weekend_price;?></td>
		 <td><?php echo $post->longitude;?></td>
		 <td><?php echo $post->lattitude;?></td>
		 <td><?php echo $post->city;?></td>
		 <td><?php echo $post->rate_avg;?></td>
		 <td><?php echo $post->description;?></td>
		 <td><?php echo $post->place_info;?></td>
		 <td><?php echo $post->halte_code;?></td>
		 <td><?php echo $post->transport_info;?></td>
		 <td><?php echo $post->transport_price;?></td>
		 <td><?php echo $post->author;?></td>
      </tr>     
     <?php }?>  
   </table>
 
 
  </body>
</html>