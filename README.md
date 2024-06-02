# TC Kimlik Doğrulama Web Uygulaması

Bu proje, kullanıcıların TC Kimlik Numarası ve kişisel bilgilerini doğrulamak için bir PHP web uygulamasıdır.

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

Proje Açıklaması

Bu proje, Türkiye Cumhuriyeti Kimlik Numarası ve ilgili kişisel bilgilerin doğrulanması için bir PHP web uygulamasıdır. Kullanıcılar, TC Kimlik Numarası, ad, soyad ve doğum yılı bilgilerini girerek kimlik doğrulaması yapabilirler. Doğrulama işlemi, Nüfus ve Vatandaşlık İşleri Genel Müdürlüğü'nün SOAP web servisi kullanılarak gerçekleştirilir.

Kullanılan Teknolojiler

PHP: Sunucu taraflı programlama dili.
HTML: Form ve sayfa yapısı için kullanılır.
SOAP: NVI Kimlik doğrulama hizmeti için kullanılır.
Session: Kullanıcı bilgilerini oturum süresince saklamak için kullanılır.
Çalışma Mekanizması
Oturum Başlatma: Kullanıcı bilgilerini saklamak için session_start() ile PHP oturumu başlatılır.
Karakter Dönüştürme: karakterDuzelt fonksiyonu, Türkçe karakterleri büyük harflere dönüştürür ve girişi büyük harfe çevirir.
Çıkış Yapma: Kullanıcı Çıkış Yap butonuna bastığında oturum verileri temizlenir ve sayfa yeniden yüklenir.
Form Girişi: Kullanıcı kimlik bilgilerini form aracılığıyla girer.
Veri Doğrulama: Kullanıcı tarafından girilen veriler, düzenli ifadeler ile doğrulanır.
Kimlik Doğrulama: Doğrulanan veriler, SOAP istemcisi aracılığıyla NVI web servisine gönderilir. Kimlik doğrulama başarılı olursa oturum bilgileri kaydedilir ve sayfa yeniden yüklenir. Aksi halde hata mesajı gösterilir.
Hoş Geldin Mesajı: Doğrulama başarılı olursa kullanıcı adı gösterilir ve çıkış butonu sunulur.
