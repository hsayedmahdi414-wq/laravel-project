
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش دسته‌بندی | گیلاتو</title>
</head>
<body>

    <h1>✏️ ویرایش دسته‌بندی</h1>

    <form action="/categories/1" method="POST">
        @csrf
        @method('PUT')

        <label for="name">نام دسته‌بندی:</label>
        <br>
        <input
            type="text"
            id="name"
            name="name"
            value="بستنی‌ها"
        >

        <br><br>

        <label for="description">توضیحات:</label>
        <br>
        <textarea id="description" name="description">این دسته‌بندی شامل انواع بستنی‌های گیلاتو است.</textarea>

        <br><br>

        <button type="submit">💾 ذخیره تغییرات</button>
    </form>

    <br>

    <a href="/categories">← برگشت به دسته‌بندی‌ها</a>

</body>
</html>
