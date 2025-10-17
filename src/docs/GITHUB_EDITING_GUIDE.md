# GitHub Editing Guide — Ravandeh Studio
# راهنمای ویرایش از گیت‌هاب — استودیو رَوَنده

This guide shows you how to edit your website content directly on GitHub without any coding knowledge.

این راهنما به شما نشان می‌دهد چگونه محتوای وب‌سایت خود را مستقیماً از گیت‌هاب بدون هیچ دانش برنامه‌نویسی ویرایش کنید.

---

## 📝 Quick Edit Files / فایل‌های قابل ویرایش سریع

### 1. Site Configuration / پیکربندی سایت
**File:** `/data/config.ts`

This is the MAIN file to edit your site's text content.
این فایل اصلی برای ویرایش محتوای متنی سایت شماست.

**What you can change:**
- Site name / نام سایت
- Tagline / شعار
- Hero section text / متن بخش صفحه اصلی
- Section titles and descriptions / عناوین و توضیحات بخش‌ها
- Contact information / اطلاعات تماس

**How to edit on GitHub:**

1. Go to: `https://github.com/YOUR-USERNAME/ravandeh-studio/blob/main/data/config.ts`
2. Click the **pencil icon** (✏️) to edit
3. Make your changes
4. Scroll down and click **"Commit changes"**
5. Wait 2-5 minutes for site to update

**Example edit:**
```typescript
siteName: {
  en: "Your Studio Name",
  fa: "نام استودیو شما"
}
```

### 2. Collections / مجموعه‌ها
**File:** `/data/config.ts` (in the `collectionsData` array)

Add, edit, or remove art collections.
افزودن، ویرایش یا حذف مجموعه‌های هنری.

**How to add a new collection:**

1. Open: `https://github.com/YOUR-USERNAME/ravandeh-studio/blob/main/data/config.ts`
2. Click pencil icon (✏️)
3. Find the `collectionsData` array
4. Copy an existing collection block (everything between `{` and `}`)
5. Paste it at the end
6. **IMPORTANT:** Add a comma `,` after the previous collection
7. Edit the values
8. Commit changes

**Example:**
```typescript
export const collectionsData = [
  {
    id: "existing-collection",
    ...
  },   // <-- Don't forget this comma!
  {
    id: "new-collection",
    title: {
      en: "New Collection",
      fa: "مجموعه جدید"
    },
    description: {
      en: "Description in English",
      fa: "توضیحات به فارسی"
    },
    year: 2025,
    pieces: 10,
    imageQuery: "abstract art"
  }
];
```

### 3. Artists / هنرمندان
**File:** `/data/config.ts` (in the `artistsData` array)

Same process as collections.
روند مشابه مجموعه‌ها.

**How to edit:**

1. Open: `https://github.com/YOUR-USERNAME/ravandeh-studio/blob/main/data/config.ts`
2. Click pencil icon (✏️)
3. Find the `artistsData` array
4. Edit artist information
5. Commit changes

### 4. Theme Colors / رنگ‌های قالب
**File:** `/styles/globals.css`

**Warning:** This requires basic CSS knowledge!
هشدار: این نیاز به دانش پایه CSS دارد!

To change gradient colors, search for:
- `from-blue-500` → Change to your color
- `to-purple-500` → Change to your color

---

## 🎨 File Structure / ساختار فایل

```
/data/
  ├── config.ts            ← MAIN FILE TO EDIT (all content here)
  ├── collections.json     ← (legacy - use config.ts instead)
  ├── artists.json         ← (legacy - use config.ts instead)
  └── site-config.json     ← (legacy - use config.ts instead)

/components/
  ├── Hero.tsx            ← Homepage hero section
  ├── Collections.tsx     ← Collections display
  ├── Artists.tsx         ← Artists display
  └── ...                 ← Other components

/styles/
  └── globals.css         ← Colors and styles
```

---

## 📋 Step-by-Step: Edit Site Name / مرحله به مرحله: ویرایش نام سایت

### English:

1. **Go to GitHub repository**
   - Visit: `https://github.com/YOUR-USERNAME/ravandeh-studio`

2. **Navigate to config file**
   - Click on: `data` folder
   - Click on: `config.ts`

3. **Edit the file**
   - Click the pencil icon (✏️) in the top right
   - Find the `siteName` section
   - Change the text:
     ```typescript
     siteName: {
       en: "Your New Name",
       fa: "نام جدید شما"
     }
     ```

4. **Save changes**
   - Scroll down to "Commit changes"
   - Add a message like: "Updated site name"
   - Click **"Commit changes"**

5. **Wait for deployment**
   - GitHub Actions will automatically deploy your site
   - Check the **Actions** tab to see progress
   - Site will update in 2-5 minutes

### فارسی:

1. **به مخزن گیت‌هاب بروید**
   - آدرس: `https://github.com/YOUR-USERNAME/ravandeh-studio`

2. **به فایل پیکربندی بروید**
   - روی پوشه `data` کلیک کنید
   - روی فایل `site-config.json` کلیک کنید

3. **فایل را ویرایش کنید**
   - روی آیکون مداد (✏️) در بالا راست کلیک کنید
   - بخش `"siteName"` را پیدا کنید
   - متن را تغییر دهید:
     ```json
     "siteName": {
       "en": "Your New Name",
       "fa": "نام جدید شما"
     }
     ```

4. **تغییرات را ذخیره کنید**
   - به پایین صفحه بروید و "Commit changes" را پیدا کنید
   - یک پیام مانند "Updated site name" بنویسید
   - روی **"Commit changes"** کلیک کنید

5. **منتظر اعمال تغییرات بمانید**
   - GitHub Actions به‌طور خودکار سایت را منتشر می‌کند
   - برای دیدن پیشرفت به تب **Actions** بروید
   - سایت در 2-5 دقیقه به‌روز می‌شود

---

## ✅ JSON Syntax Rules / قوانین نگارش JSON

**IMPORTANT / مهم:**

1. **Always use double quotes** for text: `"text"`
   همیشه از گیومه دوتایی برای متن استفاده کنید

2. **Don't forget commas** between items (but NOT after the last item)
   کاما بین آیتم‌ها را فراموش نکنید (اما بعد از آخرین آیتم نه)

3. **Match curly braces:** Every `{` needs a `}`
   هر `{` نیاز به یک `}` دارد

4. **Match square brackets:** Every `[` needs a `]`
   هر `[` نیاز به یک `]` دارد

**Example of CORRECT syntax:**
```json
{
  "name": "Value",
  "description": "Another value"
}
```

**Example of WRONG syntax:**
```json
{
  "name": "Value"   <-- Missing comma
  "description": "Another value",   <-- Extra comma after last item (wrong!)
}
```

---

## 🔧 Validate Your JSON / اعتبارسنجی JSON

Before committing, validate your JSON:
قبل از ذخیره، JSON خود را اعتبارسنجی کنید:

1. Copy your edited JSON
2. Go to: https://jsonlint.com/
3. Paste and click **"Validate JSON"**
4. Fix any errors shown
5. Then commit to GitHub

---

## 🚀 Check Deployment Status / بررسی وضعیت انتشار

After committing changes:
بعد از ذخیره تغییرات:

1. Go to your repository
2. Click **"Actions"** tab at the top
3. See the latest workflow run
4. Green checkmark ✅ = Success!
5. Red X ❌ = Failed (check error logs)

---

## 📱 What Can You Edit Without Coding? / چه چیزهایی را می‌توانید بدون کد ویرایش کنید؟

### ✅ EASY (No coding needed):
- Site name and tagline
- Hero section text
- Section titles and descriptions
- Collection information (title, description, year, pieces)
- Artist information (name, bio, specialty)
- Contact information (email, social media)

### ⚠️ MEDIUM (Basic understanding needed):
- Adding/removing collections or artists
- Changing navigation menu items
- Updating colors in CSS

### ❌ ADVANCED (Developer needed):
- Changing layout or structure
- Adding new sections
- Modifying animations
- Uploading custom images
- Advanced styling changes

---

## 💡 Tips / نکات

1. **Always commit with a message**
   همیشه با پیام ذخیره کنید
   
   Good: "Updated artist bio for Sara Mohebi"
   Bad: "update"

2. **Make small changes**
   تغییرات کوچک بدهید
   
   Edit one thing at a time, test it, then move to the next.

3. **Keep backups**
   پشتیبان نگه دارید
   
   Before major edits, copy the file content to a text file.

4. **Use GitHub's preview**
   از پیش‌نمایش گیت‌هاب استفاده کنید
   
   After editing, click "Preview" tab to see formatting.

5. **Test on your phone**
   روی موبایل تست کنید
   
   After changes go live, check how it looks on mobile.

---

## 🆘 Common Errors / خطاهای رایج

### Error: "JSON parse error"
**Problem:** Invalid JSON syntax
**Solution:** Use jsonlint.com to find the error

### Error: "Missing comma"
**Problem:** Forgot comma between items
**Solution:** Add comma after each item except the last

### Error: "Unexpected token"
**Problem:** Extra comma or missing quote
**Solution:** Check all quotes and commas

### Site not updating?
**Problem:** Deployment may be pending
**Solution:** 
1. Check Actions tab
2. Wait 5-10 minutes
3. Clear browser cache (Ctrl+Shift+R)

---

## 📞 Need Help? / نیاز به کمک؟

If you encounter issues:
اگر با مشکل مواجه شدید:

1. Check the **Actions** tab for error messages
2. Validate your JSON at jsonlint.com
3. Revert to a previous version (click "History" on file)
4. Ask for help in repository Issues

---

**Happy Editing! / ویرایش خوشایندی داشته باشید! 🎨**
