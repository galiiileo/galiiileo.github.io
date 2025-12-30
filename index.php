<?php
//connect to database
$db = mysqli_connect('localhost', 'galileo', 'galileo1234', 'piza');
//checkconnection
if (!$db) {
    echo "Connection error:" . mysqli_connect_error();
}
//write query for all pizzas
$sql = 'SELECT * FROM pizzas ORDER BY created_at';
//make query and get result
$data = mysqli_query($db, $sql);
//fetch the result rows in array
$pizzas = mysqli_fetch_all($data, MYSQLI_ASSOC);
//free result from memory
mysqli_free_result($data);
//close the connection
mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('templetes/header.php'); ?>
<h4>Pizzas!</h4>
<div class='container'>
    <?php foreach ($pizzas as $pizza) { ?>
        <div class="col s6 md3 ">
            <div class="card z-depth-0">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                    <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
                    <h6><?php echo htmlspecialchars($pizza['email']); ?></h6>
                </div>
                <div class="card-action right-align">
                    <a href="#" class="brand-text">more info</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include('templetes/footer.php'); ?>

</html>