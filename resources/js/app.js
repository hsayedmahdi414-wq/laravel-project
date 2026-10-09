import './bootstrap';
// ============================================================
//  GELATO RESTAURANT — JavaScript
//  1. Form Validation
//  2. Local Storage
//  3. Dynamic Sections using Array of Objects
//  4. Dynamic Section using API
//                              (TheMealDB)
//

// ============================================================

// ============================================================

function switchTab(tabName) {
    // Hide all tab pages
    document.querySelectorAll(".tab-page").forEach(function (page) {
      page.classList.remove("active");
    });
  
    // Remove active from all nav links
    document.querySelectorAll(".nav-link").forEach(function (link) {
      link.classList.remove("active");
    });
  
    // Show selected tab
    let targetPage = document.getElementById("tab-" + tabName);
    if (targetPage) {
      targetPage.classList.add("active");
    }
  
    // Set active nav link
    let targetLink = document.querySelector(
      '.nav-link[data-tab="' + tabName + '"]',
    );
    if (targetLink) {
      targetLink.classList.add("active");
    }
  
    // Scroll to top
    window.scrollTo({ top: 0, behavior: "smooth" });
  
    // Load API if switching to desserts tab
    if (tabName === "desserts") {
      loadDessertsFromAPI();
    }
  }
  
  // Initialize tab click listeners
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".nav-link").forEach(function (link) {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        let tab = this.getAttribute("data-tab");
        switchTab(tab);
      });
    });
  });
  
  // ============================================================
  // FEATURE 3 — Array of Objects
  // ============================================================
  // یک دانه ارایه گرفتیم که دارای چند دنه ابجیکت استه
  let features = [
    {
      id: 1,
      icon: "🍦",
      title: "بستنی تازه",
      desc: "هر روز با مواد طبیعی تهیه می‌شود",
    },
    {
      id: 2,
      icon: "🚚",
      title: "تحویل سریع",
      desc: "سفارش شما سریع به درب منزل می‌رسد",
    },
    {
      id: 3,
      icon: "🍕",
      title: "غذاهای خوشمزه",
      desc: "منوی متنوع برای همه سلیقه‌ها",
    },
    { id: 4, icon: "💯", title: "کیفیت تضمینی", desc: "رضایت شما اولویت ماست" },
  ];
  // یک دنه ارایه بلده منوی غذا ساخت کدوم
  let menuItems = [
    {
      id: 1,
      emoji: "🍦",
      name: "بستنی وانیل",
      price: "50 افغانی",
      desc: "با شیر تازه و وانیل اصل",
    },
    {
      id: 2,
      emoji: "🍫",
      name: "بستنی شکلات",
      price: "55 افغانی",
      desc: "شکلات تلخ درجه یک",
    },
    {
      id: 3,
      emoji: "🍓",
      name: "بستنی توت فرنگی",
      price: "60 افغانی",
      desc: "با توت فرنگی تازه فصل",
    },
    {
      id: 4,
      emoji: "🌿",
      name: "بستنی پسته",
      price: "70 افغانی",
      desc: "پسته اصل ایرانی",
    },
    {
      id: 5,
      emoji: "🍕",
      name: "پیتزا مارگریتا",
      price: "120 افغانی",
      desc: "با پنیر موزارلا تازه",
    },
    {
      id: 6,
      emoji: "🍔",
      name: "برگر مرغ",
      price: "90 افغانی",
      desc: "مرغ تازه با سس مخصوص",
    },
  ];
  
  function renderFeatures() {
    let container = document.getElementById("featuresContainer");
    if (!container) return;
    container.innerHTML = "";
    features.forEach(function (item) {
      let card = document.createElement("div");
      card.className = "feature-card";
      card.innerHTML =
        '<div class="icon">' +
        item.icon +
        "</div>" +
        "<h3>" +
        item.title +
        "</h3>" +
        "<p>" +
        item.desc +
        "</p>";
      container.appendChild(card); // ده اینجه کارت داخل صفحه مو میه
    });
  }
  //ای کی استه تابع پگ مینو ره نشو میده
  function renderMenu() {
    let container = document.getElementById("menuContainer");
    if (!container) return;
    container.innerHTML = "";
    menuItems.forEach(function (item) {
      let card = document.createElement("div");
      card.className = "menu-card";
      card.innerHTML =
        '<div class="emoji">' +
        item.emoji +
        "</div>" +
        "<div>" +
        "<h3>" +
        item.name +
        "</h3>" +
        "<p>" +
        item.desc +
        "</p>" +
        '<span class="price-tag">' +
        item.price +
        "</span>" +
        "</div>";
      container.appendChild(card);
    });
  }
  // الی ای کی استه چند دنه غذایی اوله نشو میده ده تب خانه
  function renderHomeMenuPreview() {
    let container = document.getElementById("homeMenuPreview");
    if (!container) return;
    container.innerHTML = "";
    // Show first 3 items as preview on home tab
    menuItems.slice(0, 3).forEach(function (item) {
      let card = document.createElement("div");
      card.className = "menu-card";
      card.innerHTML =
        '<div class="emoji">' +
        item.emoji +
        "</div>" +
        "<div>" +
        "<h3>" +
        item.name +
        "</h3>" +
        "<p>" +
        item.desc +
        "</p>" +
        '<span class="price-tag">' +
        item.price +
        "</span>" +
        "</div>";
      container.appendChild(card);
    });
  }
  
  // ============================================================
  // STATS COUNTER ANIMATION  //// in this part i add a section
  // ============================================================
  
  let statsAnimated = false;
  
  function animateCounters() {
    if (statsAnimated) return;
    let counters = document.querySelectorAll(".stat-number");
    if (!counters.length) return;
  
    statsAnimated = true;
    counters.forEach(function (el) {
      let target = parseInt(el.getAttribute("data-target"), 10);
      let duration = 1800;
      let startTime = null;
  
      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        let progress = Math.min((timestamp - startTime) / duration, 1);
        // Ease out cubic
        let eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.floor(eased * target).toLocaleString("fa-AF");
        if (progress < 1) {
          requestAnimationFrame(step);
        } else {
          el.textContent = target.toLocaleString("fa-AF");
        }
      }
      requestAnimationFrame(step);
    });
  }
  
  // Trigger counter when stats section scrolls into view
  function initStatsObserver() {
    let statsSection = document.querySelector(".stats-section");
    if (!statsSection) return;
  
    if ("IntersectionObserver" in window) {
      let observer = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              animateCounters();
              observer.disconnect();
            }
          });
        },
        { threshold: 0.3 },
      );
      observer.observe(statsSection);
    } else {
      // Fallback: animate immediately
      animateCounters();
    }
  }
  
  // ============================================================
  // FEATURE 4 — Dynamic Section Using API (TheMealDB)
  // ============================================================
  //اگر یک پیره لود شوود بسه اجرا نشوه
  let dessertsLoaded = false;
  
  function loadDessertsFromAPI() {
    if (dessertsLoaded) return;
  
    let container = document.getElementById("apiContainer"); // غذا نشو دده موشه
    let loadingBox = document.getElementById("apiLoading"); // لود موشه
    let errorBox = document.getElementById("apiError"); //   خطا ره نشو میده
  
    if (!container) return;
  
    loadingBox.classList.remove("hidden");
    errorBox.classList.add("hidden");
    container.innerHTML = ""; // غذایی قبلی ره پاک مونه
  
    fetch("https://www.themealdb.com/api/json/v1/1/filter.php?c=Dessert")
      .then(function (response) {
        return response.json(); // دیتای انترنت ره قابل استفاذه مونه
      })
      .then(function (data) {
        loadingBox.classList.add("hidden");
        dessertsLoaded = true;
        let meals = data.meals.slice(0, 6);
        meals.forEach(function (meal) {
          let card = document.createElement("div"); // بلده غذاهای خو کارت جور مونیم
          card.className = "api-card";
          card.innerHTML =
            '<img src="' +
            meal.strMealThumb +
            '" alt="' +
            meal.strMeal +
            '" loading="lazy" />' +
            '<div class="api-card-body">' +
            "<h3>" +
            meal.strMeal +
            "</h3>" +
            "</div>";
          container.appendChild(card); // کارت ده سایت نشو دده موشه
        });
      })
      .catch(function (error) {
        loadingBox.classList.add("hidden");
        errorBox.classList.remove("hidden");
        errorBox.textContent = "⚠ خطا در بارگذاری از API: " + error.message;
      });
  }
  
  // ============================================================
  // FEATURE 2 — Local Storage (Login / Logout)
  // ============================================================
  
  function loadUserFromStorage() {
    let savedName = localStorage.getItem("gelatoUser");
    if (savedName) {
      document.getElementById("greeting").textContent =
        "سلام، " + savedName + " 👋";
      document.getElementById("greeting").classList.remove("hidden");
      document.getElementById("logoutBtn").classList.remove("hidden");
      document.getElementById("loginBtn").classList.add("hidden");
    }
  }
  
  function saveUser(name) {
    localStorage.setItem("gelatoUser", name);
    loadUserFromStorage();
  }
  
  function logout() {
    localStorage.removeItem("gelatoUser");
    document.getElementById("greeting").classList.add("hidden");
    document.getElementById("logoutBtn").classList.add("hidden");
    document.getElementById("loginBtn").classList.remove("hidden");
  }
  
  // ============================================================
  // MODAL HELPERS///// in this section you can clik login to form
  // ============================================================
  
  function openModal(id) {
    document.getElementById(id).classList.add("open");
    document.body.style.overflow = "hidden";
  }
  
  function closeModal(id) {
    document.getElementById(id).classList.remove("open");
    document.body.style.overflow = "";
  }
  
  function openLoginModal() {
    openModal("loginModal");
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".modal-overlay").forEach(function (overlay) {
      overlay.addEventListener("click", function (e) {
        if (e.target === overlay) closeModal(overlay.id);
      });
    });
  });
  
  // ============================================================
  // FEATURE 1 — Form Validation Helpers ////// i add in contact form
  // ============================================================
  
  function $(id) {
    return document.getElementById(id);
  }
  function isValidName(v) {
    return /^[A-Za-z\u0600-\u06FF\s]+$/.test(v.trim());
  }
  function isValidEmail(v) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
  }
  
  function isValidPhone(v) {
    return /^[0-9+\-\s]{7,15}$/.test(v.trim());
  }
  
  function showError(inputEl, errorId, successId) {
    inputEl.classList.add("error");
    inputEl.classList.remove("success");
    $(errorId).classList.add("show");
    if (successId) $(successId).classList.remove("show");
  }
  
  function showSuccess(inputEl, errorId, successId) {
    inputEl.classList.remove("error");
    inputEl.classList.add("success");
    $(errorId).classList.remove("show");
    if (successId) $(successId).classList.add("show");
  }
  
  function clearState(inputEl, errorId, successId) {
    inputEl.classList.remove("error", "success");
    $(errorId).classList.remove("show");
    if (successId) $(successId).classList.remove("show");
  }
  
  function togglePassword(inputId, btn) {
    let input = $(inputId);
    let icon = btn.querySelector("i");
    if (input.type === "password") {
      input.type = "text";
      icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.replace("fa-eye-slash", "fa-eye");
    }
  }
  
  function checkStrength(val) {
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
  
    let fill = $("strengthFill");
    let label = $("strengthLabel");
    let levels = [
      { pct: "0%", color: "#ddd", text: "قدرت رمز عبور" },
      { pct: "25%", color: "#e53e3e", text: "ضعیف" },
      { pct: "50%", color: "#dd6b20", text: "متوسط" },
      { pct: "75%", color: "#d69e2e", text: "خوب" },
      { pct: "100%", color: "#38a169", text: "عالی" },
    ];
    let lvl = levels[score];
    fill.style.width = lvl.pct;
    fill.style.background = lvl.color;
    label.textContent = lvl.text;
    label.style.color = lvl.color;
  }
  
  function handleNewsletter(event) {
    event.preventDefault();
    let emailInput = document.getElementById("emailInput");
    let emailError = document.getElementById("emailError");
    let emailSuccess = document.getElementById("emailSuccess");
    let email = emailInput.value.trim();
  
    emailError.classList.add("hidden");
    emailSuccess.classList.add("hidden");
    emailInput.classList.remove("input-error");
  
    if (email === "") {
      emailError.textContent = "⚠ لطفاً ایمیل خود را وارد کنید";
      emailError.classList.remove("hidden");
      emailInput.classList.add("input-error");
      return;
    }
  
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      emailError.textContent = "⚠ فرمت ایمیل صحیح نیست، مثال: name@gmail.com";
      emailError.classList.remove("hidden");
      emailInput.classList.add("input-error");
      return;
    }
  
    let subscribers = JSON.parse(
      localStorage.getItem("gelatoSubscribers") || "[]",
    );
    if (subscribers.includes(email)) {
      emailError.textContent = "⚠ شما قبلاً با این ایمیل عضو شده‌اید";
      emailError.classList.remove("hidden");
      emailInput.classList.add("input-error");
      return;
    }
  
    subscribers.push(email);
    localStorage.setItem("gelatoSubscribers", JSON.stringify(subscribers));
    emailSuccess.textContent = "✔ با موفقیت عضو خبرنامه شدید!";
    emailSuccess.classList.remove("hidden");
    emailInput.value = "";
  }


  // ============================================================
// LOGIN + REGISTER FORM
// ============================================================

document.addEventListener("DOMContentLoaded", function () {

    // ========================================================
    // LOGIN FORM
    // ========================================================

    const loginForm = document.getElementById("loginForm");

    if (loginForm) {

        loginForm.addEventListener("submit", function (e) {

            e.preventDefault();

            const email = document.getElementById("loginEmail").value.trim();
            const password = document.getElementById("loginPassword").value.trim();

            // بررسی ایمیل
            if (!isValidEmail(email)) {
                alert("ایمیل درست نیست");
                return;
            }

            // بررسی رمز عبور
            if (password.length < 6) {
                alert("رمز عبور باید حداقل ۶ کاراکتر باشد");
                return;
            }

            // ذخیره کاربر در Local Storage
            localStorage.setItem("gelatoUser", email);

            alert("ورود موفق شد ✅");

            // بستن پنجره ورود
            closeModal("loginModal");

            // نمایش نام کاربر
            loadUserFromStorage();
        });
    }


    // ========================================================
    // REGISTER FORM
    // ========================================================

    const registerForm = document.getElementById("registerForm");

    if (registerForm) {

        registerForm.addEventListener("submit", function (e) {

            e.preventDefault();

            const name = document.getElementById("regName").value.trim();
            const email = document.getElementById("regEmail").value.trim();
            const password = document.getElementById("regPassword").value.trim();
            const confirm = document.getElementById("regConfirm").value.trim();

            // بررسی نام
            if (name.length < 3) {
                alert("نام باید حداقل ۳ حرف باشد");
                return;
            }

            if (!isValidName(name)) {
                alert("نام فقط باید شامل حروف باشد");
                return;
            }

            // بررسی ایمیل
            if (!isValidEmail(email)) {
                alert("ایمیل درست نیست");
                return;
            }

            // بررسی رمز
            if (password.length < 8) {
                alert("رمز عبور باید حداقل ۸ کاراکتر باشد");
                return;
            }

            // بررسی تکرار رمز
            if (password !== confirm) {
                alert("رمزهای عبور یکسان نیستند");
                return;
            }

            // ذخیره نام کاربر
            localStorage.setItem("gelatoUser", name);

            alert("ثبت نام موفق شد ✅");

            // بستن پنجره ثبت نام
            closeModal("registerModal");

            // نمایش نام کاربر
            loadUserFromStorage();
        });
    }

});

// خیلی مهم: بعد از این کد باید قسمت بعدی کدت همچنان باقی بماند:

// ============================================================
// INIT — Run on page load
// ============================================================

// یعنی آن قسمت را پاک نکن.
  
  // ============================================================
//   // LOGIN FORM
//   // ============================================================
  
//   document.getElementById("loginForm").addEventListener("submit", function (e) {
//     e.preventDefault();
  
//     let email = document.getElementById("loginEmail").value.trim();
//     let password = document.getElementById("loginPassword").value.trim();
  
//     if (!isValidEmail(email)) {
//       alert("ایمیل درست نیست");
//       return;
//     }
  
//     if (password.length < 6) {
//       alert("رمز عبور حداقل 6 حرف باشد");
//       return;
//     }
  
//     localStorage.setItem("gelatoUser", email);
  
//     alert("ورود موفق شد");
  
//     closeModal("loginModal");
  
//     loadUserFromStorage();
//   });
  
//   // ============================================================
//   // REGISTER FORM
//   // ============================================================
  
//   document
//     .getElementById("registerForm")
//     .addEventListener("submit", function (e) {
//       e.preventDefault();
  
//       let name = document.getElementById("regName").value.trim();
//       let email = document.getElementById("regEmail").value.trim();
//       let password = document.getElementById("regPassword").value.trim();
//       let confirm = document.getElementById("regConfirm").value.trim();
  
//       if (!isValidName(name)) {
//         alert("نام فقط حروف باشد");
//         return;
//       }
  
//       if (!isValidEmail(email)) {
//         alert("ایمیل درست نیست");
//         return;
//       }
  
//       if (password.length < 8) {
//         alert("رمز عبور ضعیف است");
//         return;
//       }
  
//       if (password !== confirm) {
//         alert("رمزها یکسان نیست");
//         return;
//       }
  
//       localStorage.setItem("gelatoUser", name);
  
//       alert("ثبت نام موفق شد");
  
//       closeModal("registerModal");
  
//       loadUserFromStorage();
//     });
  
  // ============================================================
  // INIT — Run on page load
  // ============================================================
  
  document.addEventListener("DOMContentLoaded", function () {
    renderFeatures();
    renderMenu();
    renderHomeMenuPreview();
    loadUserFromStorage();
    initStatsObserver();
  });

  
