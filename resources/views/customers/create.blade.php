
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن مشتری | گیلاتو</title>
</head>
<body>

    <h1>➕ افزودن مشتری جدید</h1>

    <form action="/customers" method="POST">
        @csrf

        <label for="name">نام کامل مشتری:</label>
        <br>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="مثلاً احمد محمدی"
        >

        <br><br>

        <label for="email">ایمیل:</label>
        <br>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="ahmad@example.com"
        >

        <br><br>

        <label for="phone">شماره تلفن:</label>
        <br>
        <input
            type="tel"
            id="phone"
            name="phone"
            placeholder="0700123456"
        >

        <br><br>

        <button type="submit">💾 ذخیره مشتری</button>
    </form>

    <br>

    <a href="/customers">← برگشت به لیست مشتریان</a>

</body>
</html>
