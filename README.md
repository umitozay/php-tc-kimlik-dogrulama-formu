# TC Kimlik Doğrulama Web Uygulaması

Bu proje, Türkiye Cumhuriyeti Kimlik Numarası ve ilgili kişisel bilgilerin doğrulanması için bir PHP web uygulamasıdır. Kullanıcılar, TC Kimlik Numarası, ad, soyad ve doğum yılı bilgilerini girerek kimlik doğrulaması yapabilirler. Doğrulama işlemi, Nüfus ve Vatandaşlık İşleri Genel Müdürlüğü'nün SOAP web servisi kullanılarak gerçekleştirilir.

## Kullanılan Teknolojiler

- PHP
- HTML
- SOAP
- Session

## Çalışma Mekanizması

1. **Oturum Başlatma**: `session_start()` ile oturum başlatılır.
2. **Karakter Dönüştürme**: `karakterDuzelt` fonksiyonu ile Türkçe karakterler büyük harflere dönüştürülür.
3. **Çıkış Yapma**: Kullanıcı `Çıkış Yap` butonuna bastığında oturum verileri temizlenir.
4. **Form Girişi**: Kullanıcı kimlik bilgilerini form aracılığıyla girer.
5. **Veri Doğrulama**: Girilen veriler düzenli ifadeler ile doğrulanır.
6. **Kimlik Doğrulama**: SOAP istemcisi ile NVI web servisine doğrulama isteği gönderilir.
7. **Hoş Geldin Mesajı**: Doğrulama başarılı olursa kullanıcı adı gösterilir.
