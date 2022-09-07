<!DOCTYPE html>
<html>

<head>
    <title> </title>
</head>

<body>
    <main margin= 0 auto, display="flex", flex-direction="column">
        <div  width="150px", padding="5px 5px">
                <img src="{{url('storage/public/logo-email.png')}}" width="150px", padding="5px 5px">
        </div>

        <div class="w3-panel w3-border">
            <h2>Olá, {{$client->name}}!</h2>
            <p> Aqui está um resumo da sua compra!</p>
            <?php $products = $sale->products?>
            <p> Produtos:</p>
            <ul>
             <?php foreach ($products as $product) {?>
                 <li> <?php echo 'Item: ', $product['name'], ' - Quantidade: ', $product['quantity']?></li>
             <?php } ?></p>
            </ul>
            <p> Valor total: R${{$sale->total}} </p>
        </div>
    </main>
</body>

</html>
