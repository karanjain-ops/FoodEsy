<h1 style="margin-top:98px">Welcome back <b><?php echo $_SESSION['adminusername']; ?></b></h1>
<br><br>
<div class="form-row">
    <div class="form-group col-md-3 text-center mb-0">

        <?php
        //Sql Query 
        $sql = "SELECT * FROM categories";
        //Execute Query
        $res = mysqli_query($conn, $sql);
        //Count Rows
        $count = mysqli_num_rows($res);
        ?>

        <h1><?php echo $count; ?></h1>
        Categories
    </div>

    <div class="form-group col-md-3 text-center mb-0">

        <?php
        //Sql Query 
        $sql2 = "SELECT * FROM food";
        //Execute Query
        $res2 = mysqli_query($conn, $sql2);
        //Count Rows
        $count2 = mysqli_num_rows($res2);
        ?>

        <h1><?php echo $count2; ?></h1>
        Dishes
    </div>

    <div class="form-group col-md-3 text-center mb-0">

        <?php
        //Sql Query 
        $sql3 = "SELECT * FROM orders";
        //Execute Query
        $res3 = mysqli_query($conn, $sql3);
        //Count Rows
        $count3 = mysqli_num_rows($res3);
        ?>

        <h1><?php echo $count3; ?></h1>
        Total Orders
    </div>

    <div class="form-group col-md-3 text-center mb-0">

        <?php
        //Creat SQL Query to Get Total Revenue Generated
        //Aggregate Function in SQL
        $sql4 = "SELECT SUM(amount) AS Total FROM orders WHERE orderStatus=4 ";

        //Execute the Query
        $res4 = mysqli_query($conn, $sql4);

        //Get the VAlue
        $row4 = mysqli_fetch_assoc($res4);

        //GEt the Total REvenue
        $total_revenue = $row4['Total'];

        ?>

        <h1>Rs. <?php echo $total_revenue; ?></h1>
        Revenue Generated
    </div>
</div>