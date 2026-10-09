
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن دسته‌بندی | گیلاتو</title>
</head>
<body>

    <h1>➕ افزودن دسته‌بندی جدید</h1>

    <form action="/categories" method="POST">
        @csrf

        <label for="name">نام دسته‌بندی:</label>
        <br>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="مثلاً بستنی‌ها"
        >

        <br><br>

        <label for="description">توضیحات:</label>
        <br>
        <textarea
            id="description"
            name="description"
            placeholder="توضیحات دسته‌بندی"
        ></textarea>

        <br><br>

        <button type="submit">💾 ذخیره دسته‌بندی</button>
    </form>

    <br>

    <a href="/categories">← برگشت به دسته‌بندی‌ها</a>

</body>
</html>
