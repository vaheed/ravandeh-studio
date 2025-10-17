# راهنمای مالک سایت (استودیو رَوَنده)

این سایت کاملاً استاتیک است. برای اضافه‌کردن مجموعه‌ها و هنرمندان، کافی‌ست تصویر و متن را در ریپو آپلود کنید و فایل‌های داده را ویرایش کنید.

## پوشه‌ها
- `assets/images/artworks/<collection-slug>/` تصاویر آثار هر مجموعه
- `assets/images/artists/` تصویر پرتره هنرمندان (اختیاری)
- `data/collections.json` فهرست مجموعه‌ها و آثار
- `data/artists.json` فهرست هنرمندان رَوَنده

## اضافه‌کردن یک مجموعه جدید
1) یک فولدر برای مجموعه بسازید: `assets/images/artworks/my-collection/`
2) چند عکس اثر داخلش آپلود کنید (jpg/png/webp).
3) در `data/collections.json` یک آبجکت جدید اضافه کنید:

```json
{
  "slug": "my-collection",
  "title": {"fa": "نام مجموعه", "en": "Collection Name"},
  "description": {"fa": "توضیح کوتاه...", "en": "Short description..."},
  "items": [
    {
      "image": "assets/images/artworks/my-collection/work-01.jpg",
      "title": {"fa": "عنوان اثر ۱", "en": "Artwork 1"},
      "caption": {"fa": "متن/شعر/توضیح", "en": "Text/poem/description"}
    }
  ]
}
```

4) پوش کنید؛ با CI منتشر می‌شود.

## اضافه‌کردن هنرمند جدید
در `data/artists.json` یک آیتم اضافه کنید:

```json
{
  "name": "Faezeh Darvish",
  "role": {"fa": "هنرمند", "en": "Artist"},
  "avatar": "assets/images/artists/faezeh.jpg",
  "bio": {
    "fa": "بیوی کوتاه فارسی...",
    "en": "Short English bio..."
  },
  "links": [{"label":"Instagram","href":"https://instagram.com/..."}]
}
```

## ترجمه‌ها
تمام متن‌های ثابت در `assets/js/i18n.js` قرار دارند. اگر عبارت جدیدی می‌خواهید، آنجا اضافه کنید.

## نشانه‌گذاری UTM
برای رصد ورودی از سایت، لینک‌ها به شکل زیر هستند (نمونه):
```
https://instagram.com/ravandeh.std?utm_source=ravandeh.studio&utm_medium=website&utm_campaign=header
```

## GitHub Pages
- CI آماده است: `.github/workflows/pages.yml`
- دامنه سفارشی: فایل `CNAME` را با دامنه خود تنظیم کنید و DNS را به GitHub Pages اشاره دهید.