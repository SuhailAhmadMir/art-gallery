<?php
//$connect = mysqli_connect("localhost", "root", "", "artgalleryimgdb");
include "connection.php";
if(isset($_POST["insert"]))
{
    $artname = $_POST['artname'];
    $description = $_POST['description'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO tbl_images(`name`,`artname`,`des`) VALUES ('$file','$artname','$description')";
    if(mysqli_query($connect, $query))
    {
        echo '<script>alert("Data Inserted into Database")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ART - GALLERY</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" />
</head>
<body>

<div class="container" style="width:500px;">
    <h3 align="center">Insert and Display Images Here</h3>
    <br />
    <form method="post" enctype="multipart/form-data">
        <label>Artist Name</label>
        <input type="text" name="artname" class="form-control">
        <label>Description</label>
        <input type="text" name="description" class="form-control"><br/>

        <input type="file" name="image" id="image" />
        <br />
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
        <a href="display.php"><button type="button" class="btn btn-success">Display</button> </a>
    </form>
    <br />
    <br />
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
        </tr>
        <?php
        include "connection.php";
        $query = "SELECT * FROM tbl_images ORDER BY id DESC";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo '  
                          <tr>  
                           
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';
        }
        ?>
    </table>
</div>
</body>
</html>
<!---------------------------for image data-->
<script>
    $(document).ready(function(){
        $('#insert').click(function(){
            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>
