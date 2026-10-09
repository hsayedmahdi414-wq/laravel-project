<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>افزودن محصول | گیلاتو</title>
</head>

<body>

    <h1>➕ افزودن محصول جدید</h1>

    <form action="/products" method="POST">

        @csrf

        <div>
            <label>نام محصول:</label>
            <br>
            <input type="text" name="name" placeholder="مثلاً بستنی وانیل">
        </div>

        <br>

        <div>
            <label>قیمت:</label>
            <br>
            <input type="number" name="price" placeholder="مثلاً 50">
        </div>

        <br>

        <div>
            <label>توضیحات:</label>
            <br>
            <textarea name="description"
                placeholder="توضیحات محصول"></textarea>
        </div>

        <br>

        <button type="submit">
            💾 ذخیره محصول
        </button>

    </form>

    <br>

    <a href="/products">
        ← برگشت به محصولات
    </a>

</body>

</html>