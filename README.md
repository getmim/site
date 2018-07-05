# site

Module yang menyediakan standar halaman depan site.

## instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install site
```

Module ini mendefinisikan class `Site\Controller` untuk digunakan
oleh semua module yang menggunakan gate `site`. Untuk dukungan output,
perlu juga menginstall module `lib-view`.

Untuk dukungan output cache, perlu juga memasang module `lib-cache-output`.

Module ini membuat satu gate dengan nama `site` dengan `host` adalah `HOST`, 
dan `path` adalah `/`.