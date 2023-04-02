 <div class="dashboardSidebar" id="dashboardSidebar">
    <h3 class="dashboardLogo" id="dashboardLogo">IMS</h3>
    <div class="dashboardSidebarUser">
        <img alt="User Image." src="Images/Users/will.jpg" id="userImage"/>
        <span><?= $user['first_name'].' '.$user['last_name'] ?></span>
    </div>
    <div class="dashboardSidebarMenus">
        <ul class="dashboardMenuLists">
            <li >
                <a href="./dashboard.php" ><i class="fa fa-dashboard menuIcons"></i><span class="menuText">  Dashboard</span></a>
            </li>
            <li >
                <a href="./user-add.php" ><i class="fa fa-user-plus menuIcons"></i><span class="menuText">  Add Users</span></a>
            </li>
            <li >
                <a href="./Inventory.php" ><i class="fa fa-bookmark menuIcons"></i><span class="menuText">  Inventory</span></a>
            </li>
            <li >
                <a href="./add-prodht.php" ><i class="fa fa-meetup menuIcons"></i><span class="menuText">  Add Product</span></a>
            </li>
            <li >
                <a href="./orderht.php" ><i class="fa fa-cart-arrow-down menuIcons"></i><span class="menuText">  New Order</span></a>
            </li>
            <li >
                <a href="./order-selectht.php" ><i class="fa fa-braille menuIcons"></i><span class="menuText">  Orders</span></a>
            </li>
        </ul>
    </div>
</div>