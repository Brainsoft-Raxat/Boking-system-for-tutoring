
  <?php require "header.php" ?>
<div class="container">
  <h3>Контактная форма</h3>
  <form action="check.php" method="post">
    <input type="email" required name="email" placeholder="Введите Email" class="form-control mb-2">
    <textarea name="message" required class="form-control mb-2" placeholder="Введите ваше сообщение"></textarea>
    <button type="submit" name="send" class="btn btn-success">Отправить</button>
  </form>
</div>
  <?php require "footer.php" ?>
