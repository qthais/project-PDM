<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<form>
    <label for="name">Name:</label>
    <input type="text" id="name">
    <br>
    <label for="comment">Comment:</label>
    <input type="text" id="comment">
    <br>
    <input type="button" value="Post" id="submit">
</form>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            let name=$("#name").val();
            let comment=$("#comment").val();
            if(name==''||comment==''){
                return false;
            }
            $.ajax({
                type:"POST",
                url:"post.php",
                data: {
                    name:name,
                    comment:comment
                },
                cache:false,
                success:function(data){
                    alert(data)
                },
                error:function(xhr,status){
                    console.error(xhr);
                }
            })
        })
    })
</script>
</body>
</html>