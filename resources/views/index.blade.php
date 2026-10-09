<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>رستورانت گیلاتو 🍨</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <!-- ===== HEADER ===== -->
    <header class="header">
      <div class="logo">🍦 گیلاتو</div>
      <nav>
        <ul class="nav-links">
          <li><a href="#" class="nav-link active" data-tab="home">خانه</a></li>
          <li><a href="#" class="nav-link" data-tab="menu">منو</a></li>
          <li><a href="#" class="nav-link" data-tab="features">ویژگی‌ها</a></li>
          <li><a href="#" class="nav-link" data-tab="desserts">دسرها</a></li>
          <li><a href="#" class="nav-link" data-tab="contact">تماس</a></li>
        </ul>
      </nav>
      <div class="header-btns">
        <span id="greeting" class="greeting hidden"></span>
        <button id="logoutBtn" class="btn-outline hidden" onclick="logout()">
          خروج
        </button>
        <button id="loginBtn" class="btn-gold" onclick="openLoginModal()">
          ورود
        </button>
        <button class="btn-outline" onclick="openModal('registerModal')">
          ثبت نام
        </button>
      </div>
    </header>

    <!-- ===== LOGIN MODAL ===== -->
    <div id="loginModal" class="modal-overlay">
      <div class="modal-box">
        <button class="modal-close" onclick="closeModal('loginModal')">
          &times;
        </button>
        <h2>ورود به گیلاتو</h2>
        <p class="modal-note">
          نام شما در <strong>Local Storage</strong> مرورگر ذخیره می‌شود
        </p>
        <form id="loginForm" novalidate>
          <div class="form-group">
            <label for="loginEmail"
              >ایمیل <span style="color: #e53e3e">*</span></label
            >
            <input
              type="email"
              id="loginEmail"
              placeholder="ایمیل شما"
              dir="ltr"
              style="text-align: right"
            />
            <div class="error-msg" id="loginEmailError">
              آدرس ایمیل معتبر نیست
            </div>
          </div>
          <div class="form-group">
            <label for="loginPassword"
              >رمز عبور <span style="color: #e53e3e">*</span></label
            >
            <div class="password-wrapper">
              <input
                type="password"
                id="loginPassword"
                placeholder="رمز عبور"
                dir="ltr"
                style="text-align: right; padding-left: 40px"
              />
              <button
                type="button"
                class="toggle-password"
                onclick="togglePassword('loginPassword', this)"
              >
                <i class="fa fa-eye"></i>
              </button>
            </div>
            <div class="error-msg" id="loginPasswordError">
              رمز عبور الزامی است (حداقل ۶ کاراکتر)
            </div>
          </div>
          <div class="modal-btns">
            <button type="submit" class="btn-red">ورود</button>
            <button
              type="button"
              class="btn-gray"
              onclick="closeModal('loginModal')"
            >
              انصراف
            </button>
          </div>
          <div class="form-success-banner" id="loginSuccess">
            ✓ ورود موفقیت‌آمیز!
          </div>
        </form>
      </div>
    </div>

    <!-- ===== REGISTER MODAL ===== -->
    <div id="registerModal" class="modal-overlay">
      <div class="modal-box">
        <button class="modal-close" onclick="closeModal('registerModal')">
          &times;
        </button>
        <h2>ثبت نام در گیلاتو</h2>
        <form id="registerForm" novalidate>
          <div class="form-group">
            <label for="regName"
              >نام کامل <span style="color: #e53e3e">*</span></label
            >
            <input type="text" id="regName" placeholder="نام و نام خانوادگی" />
            <div class="error-msg" id="regNameError">
              نام الزامی است (حداقل ۳ حرف)
            </div>
          </div>
          <div class="form-group">
            <label for="regEmail"
              >ایمیل <span style="color: #e53e3e">*</span></label
            >
            <input
              type="email"
              id="regEmail"
              placeholder="ایمیل شما"
              dir="ltr"
              style="text-align: right"
            />
            <div class="error-msg" id="regEmailError">
              آدرس ایمیل معتبر نیست
            </div>
          </div>
          <div class="form-group">
            <label for="regPassword"
              >رمز عبور <span style="color: #e53e3e">*</span></label
            >
            <div class="password-wrapper">
              <input
                type="password"
                id="regPassword"
                placeholder="رمز عبور قوی انتخاب کنید"
                dir="ltr"
                style="text-align: right; padding-left: 40px"
                oninput="checkStrength(this.value)"
              />
              <button
                type="button"
                class="toggle-password"
                onclick="togglePassword('regPassword', this)"
              >
                <i class="fa fa-eye"></i>
              </button>
            </div>
            <div class="strength-bar">
              <div class="strength-fill" id="strengthFill"></div>
            </div>
            <div class="strength-label" id="strengthLabel">قدرت رمز عبور</div>
            <div class="error-msg" id="regPasswordError">
              رمز عبور باید حداقل ۸ کاراکتر باشد
            </div>
          </div>
          <div class="form-group">
            <label for="regConfirm"
              >تأیید رمز عبور <span style="color: #e53e3e">*</span></label
            >
            <div class="password-wrapper">
              <input
                type="password"
                id="regConfirm"
                placeholder="رمز عبور را تکرار کنید"
                dir="ltr"
                style="text-align: right; padding-left: 40px"
              />
              <button
                type="button"
                class="toggle-password"
                onclick="togglePassword('regConfirm', this)"
              >
                <i class="fa fa-eye"></i>
              </button>
            </div>
            <div class="error-msg" id="regConfirmError">
              رمزهای عبور مطابقت ندارند
            </div>
          </div>
          <div class="modal-btns">
            <button type="submit" class="btn-red">ثبت نام</button>
            <button
              type="button"
              class="btn-gray"
              onclick="closeModal('registerModal')"
            >
              انصراف
            </button>
          </div>
          <div class="form-success-banner" id="registerSuccess">
            ✓ ثبت نام با موفقیت انجام شد!
          </div>
        </form>
      </div>
    </div>

    <!-- ===== MAIN CONTENT AREA ===== -->
    <main class="main-content">
      <!-- ========== TAB: خانه (HOME) ========== -->
      <div class="tab-page active" id="tab-home">
        <!-- HERO -->
        <section class="hero">
          <div class="hero-text">
            <h1>غذاهای خوشمزه و بستنی تازه 🍨</h1>
            <p>از بهترین بستنی‌ها و غذاهای تازه آنلاین لذت ببرید</p>
            <button class="btn-gold-lg" onclick="switchTab('contact')">
              همین حال سفارش دهید
            </button>
          </div>
        </section>

        <!-- Quick Features Preview -->
        <section class="section bg-light">
          <div class="section-header">
            <h2>چرا گیلاتو؟</h2>
            <p>بهترین تجربه غذایی در هرات</p>
          </div>
          <div class="grid-4">
            <div class="feature-card">
              <div class="icon">🍦</div>
              <h3>بستنی تازه</h3>
              <p>هر روز با مواد طبیعی تهیه می‌شود</p>
            </div>
            <div class="feature-card">
              <div class="icon">🚚</div>
              <h3>تحویل سریع</h3>
              <p>سفارش شما سریع به درب منزل می‌رسد</p>
            </div>
            <div class="feature-card">
              <div class="icon">🍕</div>
              <h3>غذاهای خوشمزه</h3>
              <p>منوی متنوع برای همه سلیقه‌ها</p>
            </div>
            <div class="feature-card">
              <div class="icon">💯</div>
              <h3>کیفیت تضمینی</h3>
              <p>رضایت شما اولویت ماست</p>
            </div>
          </div>
        </section>

        <!-- Quick Menu Preview -->
        <section class="section bg-white">
          <div class="section-header">
            <h2>پرفروش‌ترین‌ها</h2>
            <p>محبوب‌ترین آیتم‌های منو ما</p>
          </div>
          <div class="grid-3" id="homeMenuPreview"></div>
          <div style="text-align: center; margin-top: 32px">
          
          </div>
        </section>

        <!-- ===== NEW SECTION 1: آمار و دستاوردها ===== -->
        <section class="section stats-section">
          <div class="section-header">
            <h2>دستاوردهای ما</h2>
            <p>اعدادی که به آن‌ها افتخار می‌کنیم</p>
          </div>
          <div class="stats-grid">
            <div class="stat-card">
              <div class="stat-icon">😊</div>
              <div class="stat-number" data-target="12000">0</div>
              <div class="stat-label">مشتری راضی</div>
            </div>
            <div class="stat-card">
              <div class="stat-icon">🍦</div>
              <div class="stat-number" data-target="35">0</div>
              <div class="stat-label">طعم بستنی</div>
            </div>
            <div class="stat-card">
              <div class="stat-icon">🏆</div>
              <div class="stat-number" data-target="8">0</div>
              <div class="stat-label">جایزه برتر</div>
            </div>
            <div class="stat-card">
              <div class="stat-icon">📅</div>
              <div class="stat-number" data-target="6">0</div>
              <div class="stat-label">سال تجربه</div>
            </div>
          </div>
        </section>

        <!-- ===== NEW SECTION 2: نظرات مشتریان ===== -->
        <section class="section bg-white">
          <div class="section-header">
            <h2>نظرات مشتریان</h2>
            <p>آن‌چه مشتریان ما می‌گویند</p>
          </div>
          <div class="reviews-grid">
            <div class="review-card">
              <div class="review-stars">★★★★★</div>
              <p class="review-text">
                «بستنی پسته گیلاتو واقعاً بی‌نظیر است! هر هفته می‌آیم و هر بار
                کیفیت یکسانی دارد. بهترین بستنی هرات بدون شک.»
              </p>
              <div class="review-author">
                <div class="review-avatar">ا</div>
                <div>
                  <div class="review-name">احمد رضایی</div>
                  <div class="review-date">ثور ۱۴۰۳</div>
                </div>
              </div>
            </div>
            <div class="review-card review-card--featured">
              <div class="review-stars">★★★★★</div>
              <p class="review-text">
                «سفارش آنلاین خیلی راحت بود و پیتزا داغ و تازه رسید. تیم تحویل
                هم خیلی مودب بودند. حتماً دوباره سفارش می‌دهم!»
              </p>
              <div class="review-author">
                <div
                  class="review-avatar"
                  style="background: #ffd700; color: #8b0000"
                >
                  ز
                </div>
                <div>
                  <div class="review-name">خان محمدی</div>
                  <div class="review-date">جوزا ۱۴۰۳</div>
                </div>
              </div>
            </div>
            <div class="review-card">
              <div class="review-stars">★★★★☆</div>
              <p class="review-text">
                «برگر مرغ گیلاتو با سس مخصوصش فوق‌العاده‌ست. محیط رستوران هم
                تمیز و دلپذیر. یک رستورانت واقعاً خانوادگی.»
              </p>
              <div class="review-author">
                <div class="review-avatar" style="background: #8b0000">م</div>
                <div>
                  <div class="review-name">محمد کریمی</div>
                  <div class="review-date">حمل ۱۴۰۲</div>
                </div>
              </div>
            </div>
          </div>
        </section> 

        <section class="demo-section">
          <h1 class="demo-title">دیمو</h1>

          <p class="demo-text">بیننده کیفیت و دستاورد های ما باشید تشکر</p>

          <div class="video-wrapper">
            <video controls>
              <source src="./New folder/video.mp4" type="video/mp4" />
            </video>
          </div>
           <br><br>


        <!-- FAQ -->
        <section class="section bg-light">
          <div class="section-header">
            <h2>سوال‌های متداول</h2>
          </div>
          <div class="faq-list">
            <div class="faq-item">
              <div class="faq-q">❓ آیا دیدن منو رایگان است؟</div>
              <div class="faq-a">✔ بله، دیدن منو بطور کامل رایگان است.</div>
            </div>
            <div class="faq-item">
              <div class="faq-q">❓ آیا اطلاعات من امن است؟</div>
              <div class="faq-a">✔ بله، اطلاعات با رمزگذاری محافظت می‌شود.</div>
            </div>
            <div class="faq-item">
              <div class="faq-q">❓ آیا می‌توانم سفارش را لغو کنم؟</div>
              <div class="faq-a">
                ✔ بله، قبل از پردازش سفارش امکان‌پذیر است.
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- END TAB HOME -->

      <!-- ========== TAB: منو (MENU) ========== -->
      <div class="tab-page" id="tab-menu">
        <section class="section bg-white" id="menu">
          <div class="section-header">
            <span class="badge badge-gold">منوی رستورانت</span>
            <h2>منوی ما</h2>
            <p>
              آیتم‌های منو از یک <code>menuItems[]</code> آرایه رندر می‌شوند
            </p>
          </div>
          <div id="menuContainer" class="grid-3"></div>
        </section>
      </div>
      <!-- END TAB MENU -->

      <!-- ========== TAB: ویژگی‌ها (FEATURES) ========== -->
      <div class="tab-page" id="tab-features">
        <section class="section bg-light" id="features">
          <div class="section-header">
            <span class="badge badge-gold">ویژگی‌های ما</span>
            <h2>چرا ما را انتخاب کنید؟</h2>
            <p>این بخش از یک آرایه از اشیاء در جاوااسکریپت رندر می‌شود</p>
          </div>
          <div id="featuresContainer" class="grid-4"></div>
        </section>

        <section class="section bg-white">
          <div class="section-header">
            <h2>مزایای بیشتر</h2>
            <p>تجربه‌ای فراتر از یک رستورانت معمولی</p>
          </div>
          <div class="grid-4">
            <div class="feature-card">
              <div class="icon">🌱</div>
              <h3>مواد طبیعی</h3>
              <p>همه مواد اولیه ما تازه و طبیعی هستند</p>
            </div>
            <div class="feature-card">
              <div class="icon">🏆</div>
              <h3>جایزه بهترین رستورانت</h3>
              <p>برنده جایزه بهترین رستورانت هرات ۱۴۰۲</p>
            </div>
            <div class="feature-card">
              <div class="icon">📱</div>
              <h3>سفارش آنلاین</h3>
              <p>از هر جایی به راحتی سفارش دهید</p>
            </div>
            <div class="feature-card">
              <div class="icon">❤️</div>
              <h3>با عشق تهیه شده</h3>
              <p>هر غذا با محبت برای شما آماده می‌شود</p>
            </div>
          </div>
        </section>
      </div>
      <!-- END TAB FEATURES -->

      <!-- ========== TAB: دسرها (DESSERTS/API) ========== -->
      <div class="tab-page" id="tab-desserts">
        <section class="section bg-light" id="api-section">
          <div class="section-header">
            <span class="badge badge-red">دسرهای پیشنهادی از API</span>
            <h2>دسرهای پیشنهادی</h2>
            <p>
              این داده‌ها از <strong>themealdb.com</strong> با
              <code>fetch()</code> گرفته می‌شود
            </p>
          </div>
          <div id="apiLoading" class="loading-box">
            ⏳ در حال بارگذاری از API...
          </div>
          <div id="apiError" class="error-box hidden"></div>
          <div id="apiContainer" class="grid-3"></div>
        </section>
      </div>
      <!-- END TAB DESSERTS -->

      <!-- ========== TAB: تماس (CONTACT) ========== -->
      <div class="tab-page" id="tab-contact">
        <section class="section bg-light contact-section" id="contact-section">
          <div class="section-header">
            <span class="badge badge-gold">فرم سفارش / تماس</span>
            <h2>فرم سفارش</h2>
            <p>لطفاً اطلاعات خود را وارد کنید — همه فیلدها اجباری هستند</p>
          </div>

          <form class="contact-form" id="contactForm" novalidate>
            <div class="form-group">
              <label for="fullName"
                >نام کامل <span style="color: #e53e3e">*</span></label
              >
              <input
                type="text"
                id="fullName"
                placeholder="مثال: احمد محمدی"
                maxlength="60"
              />
              <div class="char-counter"><span id="nameCount">0</span> / 60</div>
              <div class="error-msg" id="fullNameError">
                نام کامل الزامی است (حداقل ۳ حرف)
              </div>
              <div class="success-msg" id="fullNameSuccess">✓ نام وارد شد</div>
            </div>

            <div class="form-group">
              <label for="phone"
                >شماره تلفن <span style="color: #e53e3e">*</span></label
              >
              <input
                type="tel"
                id="phone"
                placeholder="مثال: 0700123456"
                maxlength="15"
                dir="ltr"
                style="text-align: right"
              />
              <div class="error-msg" id="phoneError">
                شماره تلفن معتبر نیست (۷ تا ۱۵ رقم)
              </div>
              <div class="success-msg" id="phoneSuccess">
                ✓ شماره تلفن معتبر است
              </div>
            </div>

            <div class="form-group">
              <label for="contactEmail"
                >ایمیل <span style="color: #e53e3e">*</span></label
              >
              <input
                type="email"
                id="contactEmail"
                placeholder="مثال: you@example.com"
                dir="ltr"
                style="text-align: right"
              />
              <div class="error-msg" id="contactEmailError">
                آدرس ایمیل معتبر نیست
              </div>
              <div class="success-msg" id="contactEmailSuccess">
                ✓ ایمیل معتبر است
              </div>
            </div>

            <div class="form-group">
              <label for="orderType"
                >نوع سفارش <span style="color: #e53e3e">*</span></label
              >
              <select id="orderType">
                <option value="">-- انتخاب کنید --</option>
                <option value="icecream">بستنی</option>
                <option value="food">غذا</option>
                <option value="both">بستنی + غذا</option>
                <option value="other">سایر</option>
              </select>
              <div class="error-msg" id="orderTypeError">
                لطفاً نوع سفارش را انتخاب کنید
              </div>
              <div class="success-msg" id="orderTypeSuccess">
                ✓ نوع سفارش انتخاب شد
              </div>
            </div>

            <div class="form-group">
              <label for="address"
                >آدرس تحویل <span style="color: #e53e3e">*</span></label
              >
              <input
                type="text"
                id="address"
                placeholder="مثال: هرات، سرک ۱۴ متر، خانه شماره ۱۲"
                maxlength="120"
              />
              <div class="error-msg" id="addressError">
                آدرس الزامی است (حداقل ۱۰ حرف)
              </div>
              <div class="success-msg" id="addressSuccess">✓ آدرس وارد شد</div>
            </div>

            <div class="form-group">
              <label for="message">پیام یا توضیحات اضافه</label>
              <textarea
                id="message"
                placeholder="هر توضیحی که می‌خواهید اضافه کنید..."
                maxlength="300"
              ></textarea>
              <div class="char-counter"><span id="msgCount">0</span> / 300</div>
            </div>

            <div
              class="form-group"
              style="display: flex; align-items: center; gap: 10px"
            >
              <input
                type="checkbox"
                id="terms"
                style="
                  width: 18px;
                  height: 18px;
                  cursor: pointer;
                  accent-color: #8b0000;
                "
              />
              <label
                for="terms"
                style="margin-bottom: 0; font-weight: normal; cursor: pointer"
              >
                با
                <a href="#" style="color: #8b0000; font-weight: bold"
                  >شرایط استفاده</a
                >
                موافقم
              </label>
            </div>
            <div class="error-msg" id="termsError">پذیرش شرایط الزامی است</div>

            <button type="submit" class="submit-btn">ثبت سفارش ✓</button>

            <div class="form-success-banner" id="formSuccessBanner">
              🎉 سفارش شما با موفقیت ثبت شد! به زودی با شما تماس می‌گیریم.
            </div>
          </form>
        </section>

        <!-- Contact Info -->
        <section class="section bg-white">
          <div class="section-header">
            <h2>اطلاعات تماس</h2>
            <p>می‌توانید مستقیماً با ما در تماس باشید</p>
          </div>
          <div class="grid-4">
            <div class="feature-card">
              <div class="icon">📍</div>
              <h3>آدرس</h3>
              <p>هرات، سرک ۱۴ متر بالا</p>
            </div>
            <div class="feature-card">
              <div class="icon">📞</div>
              <h3>تلفن</h3>
              <p>+93 700 123 456</p>
            </div>
            <div class="feature-card">
              <div class="icon">📧</div>
              <h3>ایمیل</h3>
              <p>info@gelato.af</p>
            </div>
            <div class="feature-card">
              <div class="icon">🕐</div>
              <h3>ساعت کاری</h3>
              <p>شنبه تا پنجشنبه: ۹ صبح تا ۱۰ شب</p>
            </div>
          </div>
        </section>
      </div>
      <!-- END TAB CONTACT -->
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer" id="footer">
      <div class="footer-grid">
        <div>
          <h3>اطلاعات تماس</h3>
          <p>رستورانت گیلاتو</p>
          <p>هرات، سرک ۱۴ متر بالا</p>
          <p>📞 +93 700 123 456</p>
          <p>📧 info@gelato.af</p>
        </div>
        <div>
          <h3>ما را دنبال کنید</h3>
          <p><a href="#">📘 فیسبوک</a></p>
          <p><a href="#">📷 اینستاگرام</a></p>
          <p><a href="#">🐦 توییتر</a></p>
        </div>
        <div>
          <h3>قوانین</h3>
          <p><a href="#">حریم خصوصی</a></p>
          <p><a href="#">شرایط استفاده</a></p>
          <p><a href="#">سیاست کوکی</a></p>
        </div>
       
      </div>
      <div class="footer-bottom">
        &copy; همه حقوق این سایت متعلق به گیلاتو می‌باشد
      </div>
    </footer>

    
  </body>
</html>
