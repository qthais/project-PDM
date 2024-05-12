<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        const postBtn = document.querySelector('#submit');
        postBtn.addEventListener('click', () => {
            let name = document.querySelector('#name').value
            let comment = document.querySelector("#comment").value
            var temp = {
                name: name,
                comment: comment
            }
            const option = {
                "method": 'POST',
                "headers": {
                    "Content-Type": "application/json; charset=utf-8"
                },
                "body": JSON.stringify(temp)
            }
            fetch('./pos2.php', option).then((res) => res.json()).then(data => console.log(data))
        })
    </script>
</body>

</html>