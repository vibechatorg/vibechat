<p align="center"><a href="https://vibechat.nl" target="_blank"><img src="https://cdn.discordapp.com/attachments/1230609534297571598/1230619097562353714/vibebanner.png?ex=6633fa58&is=66218558&hm=4347ed1662fb5fde16b3e85dec9b327616cd8275ba6975bfcf2bd88c8e1c7d67&" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/vibechatorg/vibechat/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
</p>


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

## Our Story: Why We Created VibeChat
In a world where digital communication has become as essential as the air we breathe, it's troubling to realize that our private conversations are not really private. With major chat applications, it often feels like trading privacy for convenience—a choice no one should ever have to make. That's why we created VibeChat.

We started VibeChat out of a shared frustration over the constant news of data breaches, intrusive advertising based on eavesdropped conversations, and a stark realization: most popular chat apps simply do not prioritize user privacy. Every "free" service was costing users something far more valuable—their personal privacy.

The idea was simple yet ambitious: create a chat application where privacy isn't just an option, it's the foundation. We envisioned a platform that would empower users by securing their communications end-to-end and safeguarding their data from unwanted eyes. However, we didn’t stop there. We knew that for VibeChat to be a real solution, it needed to be as user-friendly and accessible as the less secure options. It had to be robust, reliable, and packed with all the features users love: multimedia sharing, group chats, voice and video calls—all secured with top-notch encryption.

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
