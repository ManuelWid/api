<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCom</title>
    <?php require_once 'boot.php'?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }
        
        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
        
        td {
            text-align: center;
            vertical-align: middle;
        }
        
        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <p class='h2'>Products</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="content">
            </tbody>
        </table>
    </div>

    <script>
        let url = "webservice.php";
        let xml = new XMLHttpRequest();
        xml.open("GET", url);
        xml.onload = function(){
            let result = JSON.parse(xml.response).data;
            let content = document.getElementById("content");
            content.innerHTML = "";
            result.forEach(func);
        }
        xml.send();

        function func(val){
            content.innerHTML += `
            <tr>
                <td><img class='img-thumbnail' src='${val.picture}'</td>
                <td>${val.name}</td>
                <td>${val.price}</td>
            </tr>`;
            
        }
    </script>
</body>

</html>