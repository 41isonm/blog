<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
</head>

<body>
  <form id="registration-form" action="/register" method="post">
    <label> Title </label>
    @csrf
    <input name="title" type="text" placeholder="title" />

    <label>Content</label>
    @csrf
    <textarea name="content" placeholder="content"></textarea>
    <button type="submit">Create Post</button>
  </form>
</body>

</html>