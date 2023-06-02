<html>
<style>
    span a:hover{
        background: white;
        color: white;
    }

    nav a:hover{
        background: #3F3F3F;
        color: white;
    }

    .dashboard{
        background: #1C2052;
        margin-top: 97px;
        width: 300px;
        height: 100%;
        position: fixed;
    }

    .account{
        color: red;
        display:flex;
        justify-content: center;
        padding-top: 10px;
        padding-bottom: 10px;
        border-bottom: 3px outset white;
        margin-bottom: 0;
    }
    .Customer
    {
        color: coral;
        display:flex;
        justify-content: center;
        padding-top: 5px;
        padding-bottom: 1px;
        border-bottom: 1px outset white;
        margin-bottom: 0;
    }
    .Restaurant
    {
        color: coral;
        display:flex;
        justify-content: center;
        padding-top: 1px;
        padding-bottom: 1px;
        border-bottom: 1px outset white;
        margin-bottom: 0;
    }
    .Food
    {
        color: coral;
        display:flex;
        justify-content: center;
        padding-top: 1px;
        padding-bottom: 1px;
        border-bottom: 1px outset white;
        margin-bottom: 0;
    }
    nav {
        margin:0;
    }

    nav a{
        color: white;
        font-size: 20px;
        display:flex;
        justify-content: center;
        align-items: center;
        padding-top: 25px;
        padding-bottom: 25px;
        margin: 0;
    }
</style>

<body style=" margin:0;">
    <div style="display:flex; justify-content: space-between; align-items: center; width: 100%; position: fixed; background: #5662F6; padding: 20px 0; top: 0;">
        <span class=home style="font-size: 40px; font-family: Sans-serif; font-weight: bold; padding-left: 50px">
            Vojon<span style="color:BF0A0A">Bilash
        </span>
            <span style="font-size: 25px; font-family: Sans-serif; font-weight: bold;">
            <a href="adminDashboard.php" style="color: black; text-decoration: none; padding: 15px; margin-right: 10px;">Home</a>
            <a href="login.php" style="color: black; text-decoration: none; padding: 15px; margin-right: 10px;">Logout</a>
        </span>
    </div>

    <div class = "dashboard">
        <h1 class="account">ADMIN PANEL</h1>
        <nav>
            <h3 class="Customer">Customer</h3>
            <a style="text-decoration: none;" href="showCustomerData.php">Show Customer Data</a>
            <a style="text-decoration: none;" href="DeleteCustomer.php">Delete Customer Data</a>
            <a style="text-decoration: none;" href="editCustomerData.php">Edit Customer Data</a>
            <h3 class="Restaurant">Restaurant</h3>
            <a style="text-decoration: none;" href="showRestaurantData.php">Show Restaurant Data</a>
            <a style="text-decoration: none;" href="editRestaurant1.php">Edit Restaurant Data</a>
            <a style="text-decoration: none;" href="insertRestaurant.php">Insert Restaurant</a>
            <h3 class="Food">Food</h3>
            <a style="text-decoration: none;" href="showFood.php">Show Food</a>
            <a style="text-decoration: none;" href="editFoodMenu.php">Edit Food Menu</a>
            <a style="text-decoration: none;" href="insertFood.php">Insert Food</a>
        </nav>
    </div>

    <div style="color:white; width: 100%; position: fixed; background: black; padding: 5px 0; bottom: 0; font-family: Sans-serif; font-weight: bold;">
        <div style="display:flex; justify-content: center; align-items: center;">Copyright &copy; 2022 Khabar<span style="color:red;">Dabar</span></div>        
    </div>
</body>
</html>