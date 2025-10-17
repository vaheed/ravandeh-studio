# Ravandeh Studio — Static Site

سایت استاتیک دوزبانه برای «استودیو رَوَنده» (کارت پستال). وسط‌چین، ریسپانسیو، ساده و زیبا. روی **GitHub Pages** منتشر می‌شود.

## شروع سریع
1) این ریپو را به GitHub خود پوش کنید.
2) در **Settings → Pages**، منبع را روی `GitHub Actions` بگذارید (این ریپو فایل CI دارد).
3) اگر دامنه دارید، رکورد **CNAME** را به `YOUR-USER.github.io` اشاره دهید. فایل `CNAME` نیز اینجا هست (نام دامنه را در آن تنظیم کنید).
4) برای اضافه کردن مجموعه‌ها و هنرمندان:
   - تصاویر را در `assets/images/...` بگذارید.
   - فایل‌های داده را در `data/collections.json` و `data/artists.json` به‌روزرسانی کنید (نمونه داخلش هست).
5) سایت دوزبانه است؛ از دکمه EN/FA در هدر استفاده کنید.

## محتوا
- `data/collections.json`: تعریف مجموعه‌ها (هر مجموعه شامل آثار با تصویر، عنوان و متن).
- `data/artists.json`: اطلاعات هنرمندان رَوَنده.

## لینک‌ها با UTM
- اینستاگرام، فروشگاه و یوتیوب با UTM مشخص می‌کنند که ورودی از سایت بوده است.

## ساختار
- HTML/CSS/JS ساده، بدون Build. آماده‌ی GitHub Pages.

---

A clean, bilingual static site for **Ravandeh Studio**. Responsive, centered, minimal. Deploys via **GitHub Pages** using Actions.