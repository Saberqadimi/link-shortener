# Laravel Link Shortener

![img.png](img.png)

[![Latest Stable Version](http://poser.pugx.org/saberqadimi/link-shortener/v)](https://packagist.org/packages/saberqadimi/link-shortener) 
[![Total Downloads](http://poser.pugx.org/saberqadimi/link-shortener/downloads)](https://packagist.org/packages/saberqadimi/link-shortener) 
[![Latest Unstable Version](http://poser.pugx.org/saberqadimi/link-shortener/v/unstable)](https://packagist.org/packages/saberqadimi/link-shortener) 
[![License](http://poser.pugx.org/saberqadimi/link-shortener/license)](https://packagist.org/packages/saberqadimi/link-shortener) 
[![PHP Version Require](http://poser.pugx.org/saberqadimi/link-shortener/require/php)](https://packagist.org/packages/saberqadimi/link-shortener)



A Laravel package for shortening URLs with analytics support. 🚀

## Demo 
[![Demo](https://github.com/user-attachments/assets/2cdafdd1-7373-4181-90f6-021976b5ef5f)](https://github.com/user-attachments/assets/f6d86725-0237-49f1-a8ef-21a1c1c93547)
## 📥 Installation

You can install this package via Composer:

```bash
composer require saberqadimi/link-shortener
```

## ⚙️ Configuration

### 1️⃣ Publish the Service Provider
After installation, publish the package's service provider:

```bash
php artisan vendor:publish --provider="Laravel\LinkShortener\LinkShortenerServiceProvider"
```

### 2️⃣ Publish Assets (CSS & JS)
To use the front-end assets, run:

```bash
php artisan vendor:publish --tag=laravel/link-shortener
```

### 3️⃣ Run Migrations
The package comes with necessary database migrations. Run:

```bash
php artisan migrate
```

## 🚀 Usage

Once installed and configured, you can access the link shortener page at:

```
https://your-domain.com/link/shorten
```

⚠️ **Note:** The user must be logged in to access this page.

## 📄 License
This package is open-source and available under the MIT License.

---

### **💡 Quick Commands:**
1️⃣ **Install Package** → `composer require saberqadimi/link-shortener`  
2️⃣ **Publish Service Provider** → `php artisan vendor:publish --provider="Laravel\LinkShortener\LinkShortenerServiceProvider"`  
3️⃣ **Publish Assets** → `php artisan vendor:publish --tag=laravel/link-shortener`  
4️⃣ **Run Migrations** → `php artisan migrate`  
5️⃣ **Access Shortener Page** → `/link/shorten` (User must be logged in)  

