<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <p> Hi {{$cart->user_name}} </p>
    <p> Your order has been succesfully placed </p>
        <div class="cart-container">

            <table>
                <thread>
                    <tr>
                        <th>Product Name </th>
                        <th>Product Quantity</th>
                        <th>Product Price </th>
                        
                    </tr>
                </thread>
                <tbody>
                    <?php $totalprice=0; ?>
                    <tr>
                        <?php $t_price=0; ?>
                        <td>{{$cart->item_name}}</td>
                        <td>{{$cart->item_quantity}}</td>
                        <?php $t_price=$t_price+(($cart->item_price)*($cart->item_quantity)) ?>
                        <td>{{$t_price}}</td>

                    </tr>    
                    
                    <tr>
                        <td colspan='3'></td>
                        <?php $totalprice=$totalprice + (($cart->item_price)*($cart->item_quantity)) ?>
                    </tr>
                    
                </tbody> 
            </table>
        </div>
            <table class="t_sumcontainer">
                <tr>   
                    <td><strong>Subtotal:</strong></td>
                    <td id="subtotal">{{$totalprice}} $</td>
                    
                </tr>   
            </table>
        </div>






    
</body>
</html>