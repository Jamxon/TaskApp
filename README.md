# Vazifalar Boshqaruv Tizimi

Bu loyiha Laravel asosida yaratilgan vazifalarni boshqarish tizimi. Ushbu tizim foydalanuvchilarga vazifalarni yaratish, tahrirlash, o'chirish va ularning holatini boshqarish imkonini beradi.
## Foydalanuvchi xususiyatlari

- **Ro'yxatdan o'tish va kirish:** Foydalanuvchilar o'z akkauntlarini yaratishi va tizimga kirishi mumkin.
- **Vazifalarni boshqarish:** Foydalanuvchilar vazifalarini yaratish, tahrirlash va o'chirish imkoniyatiga ega.
- **Vazifa holati:** Foydalanuvchilar vazifalarini "tugallangan" yoki "tugallanmagan" deb belgilashi mumkin.
- **Qidirish va filtrlar:** Foydalanuvchilar vazifalarni sarlavha yoki tavsif bo'yicha qidirishi va holati bo'yicha filtrlay olishadi.
## O'rnatish

Ushbu loyihani o'z kompyuteringizda o'rnatish uchun quyidagi qadamlarni bajaring:
### Talablar

- PHP 8.0 yoki yuqoriroq
- Composer
- Laravel 9.x
- MySQL yoki boshqa ma'lumotlar bazasi
### Qadam 1: Qaramliklarni o'rnating


composer install

### Qadam 2: .env faylini yaratish

`.env.example` faylidan nusxa oling va `.env` faylini yarating:

```bash
cp .env.example .env
```
### Qadam 3: Ma'lumotlar bazasi konfiguratsiyasi

`.env` faylini oching va ma'lumotlar bazasi sozlamalarini to'g'rilang:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Qadam 4: Ma'lumotlar bazasini yaratish

Ma'lumotlar bazasini yaratish va migratsiyalarni bajarish uchun:

```bash
php artisan migrate
```

### Qadam 5: Loyihani ishga tushirish

Serverni ishga tushirish uchun:

```bash

php artisan serve
```

## Foydalanish

1. Tizimga kirish yoki ro'yxatdan o'tish.
2. Vazifalarni yaratish, tahrirlash va o'chirish.
3. Vazifalar ro'yxatidan holatlarini boshqarish va qidirish.

## Muammolarni Hal Qilish

Agar siz quyidagi muammolarga duch kelsangiz, quyidagi yechimlar foydali bo'lishi mumkin:

- **Ma'lumotlar bazasi ulanishi xatolari:** `.env` faylida ma'lumotlar bazasi ulanish ma'lumotlarini tekshiring.
- **Composer xatolari:** Agar Composer xatolari bo'lsa, `composer install` buyrug'ini qaytadan ishga tushirishni sinab ko'ring.


## Hamma uchun muhim

Ushbu loyiha dasturchilar uchun o'rganish va rivojlanish imkoniyatidir. 

## Muallif

- Ism: [Jamshidbek]
- Email: aliyevjamkhan499@gmail.com
- GitHub: Jamxon





