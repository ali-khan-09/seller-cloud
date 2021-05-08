<html>
<head>
<body>
<h2>Forget password</h2>
<form action="{{route('test')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="file">FIle:</label>
    <input type="file" name="file"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</head>
</html>
