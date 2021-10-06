<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dependent Select Box</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Dynamic Dependent Select Box</h1>
        </div>
        <div id="content">
            <form>
                <label>Country:</label>
                <select  id="country">
                    <option value="">Select Country</option>
                </select>
                <br><br>
                <label>State:</label>
                <select  id="state">
                    <option value=""></option>
                </select>
            </form>
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            function loaddata(type,category_id){
            $.ajax({
                url:"load-cs.php",
                type:"POST",
                data:{type:type,id:category_id},
                success:function(data){
                    if(type == "stateData"){
                        $("#state").html(data);
                    }else{
                        $("#country").append(data);
                    }
                }
            });
        }
        loaddata();

        //State Data
        $("#country").on("change",function(){
            var country = $("#country").val();

            loaddata("stateData",country);
        });
        });
    </script>
</body>
</html>