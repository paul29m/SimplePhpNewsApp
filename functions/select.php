<?php  
 $connect = mysqli_connect("localhost", "root", "", "newsdb");  
 $output = '';  
 $sql = "SELECT * FROM news ORDER BY id";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                    <th width="3%">Id</th>  
                    <th width="10%">Title</th>  
                    <th width="70%">Text</th>  
                    <th width="5%">Producer</th>
					<th width="5%">Date</th>
					<th width="5%">Category</th>
					<th width="5%">Delete</th> 					
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                    <td>'.$row["id"].'</td>  
                    <td class="title_news" data-id1="'.$row["id"].'" contenteditable>'.$row["title"].'</td>  
                    <td class="text_news" data-id2="'.$row["id"].'" contenteditable>'.$row["text"].'</td>
					<td class="producer" data-id3="'.$row["id"].'" contenteditable>'.$row["producer"].'</td>
                    <td class="date_news" data-id5="'.$row["id"].'" contenteditable>'.$row["date"].'</td>  
                    <td class="category_news" data-id6="'.$row["id"].'" contenteditable>'.$row["category"].'</td>  
					<td><button type="button" name="delete_btn" data-id7="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>