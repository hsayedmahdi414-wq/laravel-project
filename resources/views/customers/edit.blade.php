<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش مشتری | گیلاتو</title>
</head>
<body>

    <h1>✏️ ویرایش مشخصات مشتری</h1>
    <hr>

    <form action="/customers/1" method="POST">
        @csrf
        @method('PUT')

        <label for="name">نام کامل مشتری:</label><br>
        <input
            type="text"
            id="name"
            name="name"
            value="احمد محمدی"
        >

        <br><br>

        <label for="email">ایمیل:</label><br>
        <input
            type="email"
            id="email"
            name="email"
            value="ahmad@example.com"
        >

        <br><br>

        <label for="phone">شماره تلفن:</label><br>
        <input
            type="tel"
            id="phone"
            name="phone"
            value="0700123456"
        >

        <br><br>

        <button type="submit">💾 ذخیره تغییرات</button>
    </form>

    <br>

    <a href="/customers">← برگشت به لیست مشتریان</a>

</body>
</html>