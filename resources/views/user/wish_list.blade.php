@section('title', 'WishList | Pritom Drug Store')

<x-guest-layout>

    <head>
        <title>WishList | Pritom Drug Store</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

    
            header {
                background-color: #333;
                color: white;
                text-align: center;
                padding: 1em;
            }
            h3{
                
                color: black;
                text-align: center;
                padding: 0.5em;
                

            }
    
            .cart-container {
                max-width: 800px;
                margin: 20px auto;
                background-color: rgb(255, 255, 255);
                padding: 20px;
                border-radius: 20px;
                box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
            }
    
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
    
            th, td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            
            .header_cont{
                background-color: #333;
                

            }
    
          
    
            .quantity-input {
                width: 40px;
            }
    
            .action-btn {
                background-color: #FF0000;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-align: center;
            }
            
    
            .action-btn:hover {
                background-color: #8B0000;
            }
            .action-btnApply{
                background-color: orange;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-align: center;

            }
            .action-btnApply:hover{
                background-color: orangered;


            }

            .checkout-btn{
                background-color:#008000;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .checkout-btn:hover{
                background-color:#013220;

            }
            .payment{
                text-align: center;
               
            }
            .t_sum{
                
                text-align: center;
               
            }
            .t_sumcontainer{
                max-width: 300px;
                margin: 20px auto;
                text-align: center;
               
            }
            .action-btncart {
                background-color: orange;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-align: center;
            }
            
    
            .action-btncart:hover {
                background-color: orangered;
            }

           
        </style>
    </head>
    
    <body>
        <header>
            <h1>Your Wishlists</h1>
        </header>
    
        <!-- CART DETAILS SECTION -->
        <div class="cart-container">
            <table>
                <thead>
                    <tr class="header-cont">
                        <th>Product Name</th>
                        <th>Price</th>
                       
                        <th>Action</th>
                        <th>Cart</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Product Row  -->
                    @foreach ($wishlist as $wishlist)
                        
                        <!--======================================================-->
                        <!-- to acces the item cart using wishlist item id -->
                        <?php $item = \App\Models\Item::find($wishlist->item_id); ?>
                        <!--======================================================-->


                        <tr>
                            <td>{{$wishlist->item_name}}</td>
                            
                            <td>{{$wishlist->item_price}}</td>
                            <td>
                                <a class="btn action-btn" href="{{url('/remove_wishlist',['id' => $wishlist->id, 'item_id '=> $wishlist->item_id] )}}">Discard</a>
                            </td>
                            <td>
                                    @if ($item->item_stock < 1)
                                        <a class="btn btn-warning btn-sm" disabled>Stock Out</a>



                                    @else

                                        <form method="Post" action="{{ url('wish_order',['$item_id'=>$wishlist->item_id]) }}">
                                            @csrf
                                            

                                            <label for="quantity">Quantity:</label>
                                            <input type="number" value="1" min="1" max="5" class="quantity-input" name="wish_quantity">

                                            <!-- submit button -->
                                            <button type="submit">Submit</button>
                                        </form>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                  
                </tbody>
                
            </table>
        </div>
    
          
        
        
    </body>
    <!------------------------- CART DETAILS EDITING  --------------------------------------------------->
    
</x-guest-layout>                
            


