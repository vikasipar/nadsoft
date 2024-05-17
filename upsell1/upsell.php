<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./upsell1.css">
    <title>Upsell1 Page</title>
</head>
<body>
    <section>
        <div class="card">
            <div>
                <img src="../static/camera.webp" alt="">
                <span id="product-name">Camera</span>
                <span>₹ <span id="product-price">56,670</span></span>
            </div>
            <div>
                <button id="add-to-order">Add to my Order</button>
                <a href="../upsell2/upsell.php">No Thank You</a>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("add-to-order").addEventListener('click', function(){
            var productName = document.getElementById('product-name').innerText;
            var productPrice = document.getElementById('product-price').innerText;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'submitOrder.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function(){
                if(xhr.readyState === 4 && xhr.status === 200){
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if(response.status === 'success'){
                            window.location.href = response.redirect;
                        } else {
                            alert(response.message);
                        }
                    } catch (e) {
                        alert('Error parsing response: ' + xhr.responseText);
                    }
                }
            };
            xhr.send('product_name=' + encodeURIComponent(productName) + '&product_price=' + encodeURIComponent(productPrice));
        });
    </script>
</body>
</html>
