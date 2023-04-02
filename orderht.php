<?php
    //Start The Session
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location: login.php');
    }
    $user = $_SESSION['user'];
    $lastOrderID = include('database/orders/select-last-order-id.php');
    $productLable =include('database/orders/get-product.php');
    //$quantity =include('database/orders/get-quantity.php');
    $errorMassege = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>IMS Login - Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/IMS.css"/>
        
        
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="dashboard">
        <div id="dashboardMainContainer">
            <?php include('partitials/app-sidebar.php') ?>
            <div id="dashboardContentContainer"> 
                <?php include('partitials/topnav.php') ?>
                <div class="dashboardContent">
                    <div class="dashboardContentMain"> 
                        <div class="row">
                            <div class="column column-5">
                                <h1 class="sectionHeader"><i class="fa fa-plus"></i> New Product</h1>
                                <div class="prodAddFormContainer">
                                    <form action="database/orders/set-orders.php"  id="formSubmit" method="post" class="appForm" id="userAddForm">
                                        
                                        <!-- hidden inputs-->

                                        <input type="text" name="idOrder" id="idOrder" hidden="true"  required/>
                                        <input type="text" name="descripeOrder"  id="descripeOrder" hidden="true" required/>

                                        <!-- select product-->

                                        <div class="appFormInputContainer">
                                            <label for="lableProduct">Lable Product</label>
                                            <select type="text" id="lableProduct" name="lableProduct" class="appFormInput">
                                                <?php
                                                foreach ($productLable as $singleProduct){?>
                                                    <option>
                                                    <?= $singleProduct['lab_prod'] ?>
                                                    <div hidden="true" >|
                                                    <?= $singleProduct['id'] ?></div>
                                                    </option>
                                                   
                                                    
                                                <?php }?>
                                            </select>        
                                        </div>
                                        <!-- price-->
                                        <div class="appFormInputContainer">
                                            <label for="price">Price</label>
                                            <input type="text" id="price" name="price" class="appFormInput" required/>
                                        </div>
                                        <div class="appFormInputContainer">
                                            <label for="qty">quantity</label>
                                            <input type="text" id="qty" name="qty" class="appFormInput" required/>
                                        </div>
                                        <button type="submit" class="appBtn"><i class="fa fa-plus"></i> Add Product</button>
                                        

                                    </form>
                                    <br>
                                    <button id="saveBtn" class="appBtn"><i class="fa fa-save"></i> save </button>
                                    <br>
                                    <br>
                                            <php
                                                if(isset($_SESSION['response'])){
                                                    $responseM$productLable =include('database/orders/get-product.php');essage = $_SESSION['response']['message'];
                                                    $responseMessageSuccess = $_SESSION['response']['success'];
                                                
                                            ?>
                                                <div class="responseMessage">
                                                    <p class="responseMessage <= $responseMessageSuccess ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                                        <?= $errorMassege; ?>
                                                    </p>
                                                </div>
                                            <php }
                                            unset($_SESSION['response']);
                                            ?>
                                </div>
                            </div>
                            <div class="column column-7">     
                            <h1 class="sectionHeader"><i class="fa fa-list"></i> Product</h1>                           
                                <div class="col7div">
                                    
                                    <div class="orders">
                                        <div class="appFormInputContainer">
                                            <label for="imageProduct">ID Order : </label> 
                                            <p class="appFormInput" id="orderId"><?= $lastOrderID[0][0] ?></p>
                                        </div>
                                        <div class="appFormInputContainer">
                                            <label for="imageProduct">Descripe Order</label>
                                            <input type="text" id="descripeOrder1"  class="appFormInput"/>
                                        </div>
                                    </div>                                   
                                </div>
                                
                                <h1 class="sectionHeader"><i class="fa fa-list"></i> Product</h1>
                                <div class="sectionContent">
                                    <div class="users" id="userDiv"> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    </div>                   
                </div>
            </div>
        </div>
    </body>
    <script src="scripts/script.js"></script>
    <script>
        
let checkFlag = true;
let prce = document.getElementById('price');
let qty = document.getElementById('qty');
let ag = document.getElementById('lableProduct');
prce.onkeyup = function(e){
    //console.log('das');
    let num = /[^0-9]/gi;
    //var keyCode = (e.keyCode ? e.keyCode : e.which);
   prce.value =  prce.value.replace(num,'');
}
qty.onkeyup = function(e){
    //console.log('das');
    let num = /[^0-9]/gi;
    //var keyCode = (e.keyCode ? e.keyCode : e.which);
    qty.value =  qty.value.replace(num,'');
}
ag.onchange = function(){
    let qte = qty.value;
    let id = document.getElementById('lableProduct').value.split("|");
    console.log(id[1]);
    let array = "array="+ qte + "/" + id[1];
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){ 
        if(this.readyState === 4 && this.status === 200){
            arrayResponseText = xhr.responseText.split("/");
            qty.value = arrayResponseText[0];
            prce.value = arrayResponseText[1];
            
        }
    }
    xhr.open('post', 'database/orders/get-quantity.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(array);}
qty.onchange = function(){let qte = qty.value;
    let id = document.getElementById('lableProduct').value.split("|");
    console.log(id[1]);
    let array = "array="+ qte + "/" + id[1];
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){ 
        if(this.readyState === 4 && this.status === 200){
            arrayResponseText = xhr.responseText.split("/");
            if (qty.value > arrayResponseText[0])
            {
                qty.value = "";
                window.alert("There Is No Enough Quantity");}
           
        }
    }
    xhr.open('post', 'database/orders/get-quantity.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(array);}

descripeOrder1.oninput = function(){
    myInputText = document.getElementById('orderId');
    descripeOrder.value = descripeOrder1.value
    idOrder.value = myInputText.innerHTML;  
}


    function createTableBody(){
        if(checkFlag == true){
            let Table = document.createElement("table");
            let Thead = document.createElement("thead");
            let myTr    = document.createElement("tr");
            let tBody   = document.createElement('tbody');
            tBody.setAttribute("id", "tBody");
            let tr = document.createElement('tr');

            // Header contentا
            let headers = ["Price", "Quantity", "product", "operation" ];
            // Header
            headers.forEach(headerText =>{
                    let header = document.createElement("th");
                    let textNode = document.createTextNode(headerText);
                    header.appendChild(textNode);
                    myTr.appendChild(header);
                    
            });
            Thead.appendChild(myTr);
            Table.appendChild(Thead);
            Table.appendChild(tBody);
            document.getElementById('userDiv').appendChild(Table);
            checkFlag = false;
    } }
        
        
    function onAddWebsite(e){
            let tbodyEl = document.getElementById("tBody");

            e.preventDefault();
            //console.log(tbodyEl);
            price = document.getElementById('price').value;
            quantity = document.getElementById('qty').value;
            product = document.getElementById('lableProduct').value;
            console.log(product);
            selectedId =  product.split("|");
            tbodyEl.innerHTML += "<tr><td class='priceCells'>"+price+"</td><td class='qtyCells'>"+quantity+"</td><td class='productCells' hidden='true'>"+selectedId[1]+"</td><td>"+selectedId[0]+"</td><td><button>sad</button></td></tr>";
    }
   
    addEventListener('submit', createTableBody);
    addEventListener('submit', onAddWebsite);
    //addEventListener('submit', addTableOnArray);
    saveBtn.onclick = function(){
        let priceCells = document.getElementsByClassName('priceCells');
        let qtyCells = document.getElementsByClassName('qtyCells');
        let productCells = document.getElementsByClassName('productCells');
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){ 
                if(this.readyState === 4 && this.status === 200){
                    console.log(this.responseText);
                }
            }
            let priceText = "";
            let qtyText = "";
            let productText = "";
            for(let i = 0; i < priceCells.length; i++){    
              priceText += priceCells[i].innerHTML +"|"; 
              qtyText += qtyCells[i].innerHTML +"|";   
              productText += productCells[i].innerHTML +"|";
            }

            let array = "array=" + priceText + "/" + qtyText + "/" + descripeOrder.value + "/" + idOrder.value + "/" + productText;
            //let arrayQte = "qte=" + qtyText;

            xhr.open('post', 'database/orders/set-orders.php');
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //console.log(priceText);
            //console.log(qtyText);
            
            xhr.send(array);
            window.alert(xhr.response);
            //console.log(xhr.response);
               
            ////
            //xhr.open('post', 'database/orders/set-orders.php');
            //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //console.log(qtyText);
            //xhr.send(arrayQte);
           
       

    }
   


    </script>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</html>