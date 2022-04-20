<?php
include("../database/config.php");
include("../database/opendb.php");

if (isset($_GET["details"])) { 
    $details = $_GET["details"]; 
} else { 
    $details=1; 
}; 

$query = "SELECT * FROM products "; 
$query .= "WHERE product_id = $details";
$result = $dbaselink->query($query); $row = $result->fetch_assoc(); 

?>

<div class="cd-full-width">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content centerTable">
                    <div class="center">
                        <table  border="1" cellpadding="3">
                            <tr>
                                <td><strong>Titel</strong></td>
                                <td><strong>Categorie</strong></td>
                                <td><strong>Prijs</strong></td>
                                <td><strong>Details</strong></td>
                                <td><strong>Thumbnail</strong></td>
                                <td><strong>Beschrijving</strong></td>
                            </tr>

                            <tr>
                                <td><?php echo $row['product_title']; ?></td>
                                <td><?php echo $row['product_categorie']; ?></td>
                                <td><?php echo $row['product_price']; ?></td>
                                <td><?php echo $row['product_details']; ?></td>
                                <td><?php echo $row['product_thumbnail']; ?></td>
                                <td><?php echo $row['product_description']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("../database/closedb.php");
?>