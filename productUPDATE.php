<?php
include "mysqli_connect_MAGAPON.php";
$FOOD_ID = $_GET['id'];

if(isset($_POST['update']))
{
    $F_NAME = $_POST['F_NAME'];
    $F_PRICE = $_POST['F_PRICE'];
    $F_DESCRIPTION = $_POST['F_DESCRIPTION'];

    $sql = "UPDATE foodstalls SET F_NAME='$F_NAME',F_PRICE='$F_PRICE',F_DESCRIPTION='$F_DESCRIPTION' WHERE FS_ID= '$FOOD_ID'";

    $result = mysqli_query($conn , $sql);

    $ppic=$_FILES["image"]["name"];
    $oldppic=$_POST['oldpic'];
    $oldprofilepic="imagesupload"."/".$oldppic;

    // get the image extension
    $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));

    // allowed extensions
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else
    {
    //rename the image file
    $imgnewfile=md5($imgfile).time().$extension;
    // Code for move image into directory
    move_uploaded_file($_FILES["image"]["tmp_name"],"imagesupload/".$imgnewfile);
    // Query for data insertion
        $query=mysqli_query($conn, "update foodstalls set images='$imgnewfile' where FOOD_ID='$FOOD_ID' ");
        if ($query) {
            //Old pic
            unlink($oldprofilepic);
        echo "<script>alert('Profile pic updated successfully');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else
        {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }

    if($result)
    {
        header("Location: productsNEWADMIN.php?msg=New record created successfully");
    }
    else
    {
        echo "Failed: " .mysqli_error($conn);
    }
} 

elseif(isset($_POST['cancel']))
{
    header("Location: productsNEWADMIN.php");
}


$sql = "SELECT * FROM foodstalls WHERE FS_ID = $FOOD_ID LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form id="contact" action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <input name="F_NAME" type="text" id="F_NAME" required="" value="<?php echo $row['F_NAME']?>">
            </fieldset>
        </div>
        <div class="col-sm-12">
            <fieldset>
                <input name="F_PRICE" type="text" id="F_PRICE" placeholder="Food Price*" required=""
                    value="<?php echo $row['F_PRICE']?>">
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <textarea name="F_DESCRIPTION" rows="6" id="F_DESCRIPTION" placeholder="Description*"
                    required=""><?php echo $row['F_DESCRIPTION']?></textarea>
            </fieldset>
        </div>
        <div class="col-sm-12">
            <fieldset>
                <input type="file" name="image">
                <input type="hidden" name="oldpic" value="<?php  echo $row['images'];?>">
                <img src="imagesupload/<?php  echo $row['images'];?>" width="120" height="120">
            </fieldset>
        </div>
        <div>
            <input type="hidden" name="size" value="1000000">
        </div>
        <div class="col-lg-12">
            <input type="hidden" name="FOOD_ID" value="<?php echo $FOOD_ID; ?>">
            <fieldset>
                <button type="submit" id="form-submit" class="main-button" name="update">Update</button>
                <button type="submit" id="form-submit" class="main-button" name="cancel">Cancel</button>
            </fieldset>
        </div>
    </div>
</form>


<?php

?>