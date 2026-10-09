
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش محصول | گیلاتو</title>
</head>
<body>

    <h1>✏️ ویرایش محصول</h1>

    <form action="/products/1" method="POST">
        @csrf
        @method('PUT')

        <label>نام محصول:</label>
        <br>
        <input type="text" name="name" value="بستنی وانیل">

        <br><br>

        <label>قیمت:</label>
        <br>
        <input type="number" name="price" value="50">

        <br><br>

        <label>توضیحات:</label>
        <br>
        <textarea name="description">بستنی وانیل تازه و خوشمزه</textarea>

        <br><br>

        <button type="submit">ذخیره تغییرات</button>
    </form>

    <br>

    <a href="/products">برگشت به لیست محصولات</a>

</body>
</html>
