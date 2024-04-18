# VibeChat - Secure Your Vibes

Welcome to VibeChat, an open-source, end-to-end encrypted chat application that's revolutionizing the way you connect and communicate. Designed for the modern web and mobile era, VibeChat offers seamless messaging experiences across Web, iOS, and Android platforms. With privacy at its heart and cutting-edge features at your fingertips, VibeChat is not just an app, it's a haven for secure communication.

## Features

- **End-to-End Encryption**: Every message is secured with state-of-the-art encryption technology, ensuring that your conversations stay private.
- **Cross-Platform Availability**: Whether you're on the go with your smartphone or at your desk browsing the web, VibeChat has you covered.
- **Latest Tech**: Powered by Laravel and leveraging the speed of WebAssembly, VibeChat offers unparalleled performance and a smooth user experience.
- **User-Friendly Interface**: With a focus on user experience, VibeChat boasts an intuitive design that makes secure messaging accessible to everyone.
- **Open Source**: Dive into the code, contribute, or customize. VibeChat's open-source nature puts you in control.

## Powered by Laravel

Built on the robust Laravel framework, VibeChat benefits from high security, elegant syntax, and a wealth of features that make it a powerhouse in the realm of app development.

## Why VibeChat?

In an era where digital privacy is paramount, VibeChat stands out with its commitment to user security without compromising on functionality. Connect with friends, family, and colleagues, share moments, and join communities—all with the peace of mind that your data remains yours alone.

## Contributing or building your own VibeChat

To get started with VibeChat:

1. Clone the repository:

```
git clone https://github.com/vibechatorg/vibechat.git
```
2. Install the dependencies:
   (VibeChat is created using the javascript runtime bun for fast and efficient web applications)

```
bun install
composer install
```
3. Generate database and encryption keys:

```
php artisan key:generate
php artisan migrate
php artisan app:generate-encryption-key
```

4. Run the development server:

```
bun run build
php artisan serve
```
