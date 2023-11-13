<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<form action="mail.php" enctype="multipart/form-data" method="POST">
  <input type="text" class="form-control" name="email" placeholder="Email">
  <input type="text" class="form-control" name="tieude" placeholder="ten">
  <textarea name="content" id="editor" class="form-control"></textarea>
  <input type="file" class="form-control" name="file">
  <button type="submit" class="btn btn-primary">Gửi</button>
  <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });
  </script>