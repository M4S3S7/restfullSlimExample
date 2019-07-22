# Restfull JWT Example
php kullanarak slim freamwork ile Restfull api yapımı JWT ile apinin korunmasına yönelik örnek çalışma
<details>
<summary><b>21.07.2019 Sadece İşlemleri Ekledim </b></summary>
##Endpoint Kullanımı

###Post-/api/v1/
Örnek URL => api/v1/PostMetodu/Ekle


**Form İçeriği**

| Tablo Adı | Veri Tipi    |
|-----------|--------------|
| adı       | varchar(250) |
| soyadı    | varchar(250) |

Geri Döndürülen Json Çıktısı

```json
{
    "Sonuc": "Başarılı Post işlemi"
}
```


###GET-/api/v1/
Örnek URL => api/v1/getMetodu

```json
[
  {

  "id": "1",
  "adı": "mustafa",
  "soyadı": "sevindi"
  }
]
```
###PUT-/api/v1/
Örnek URL => /api/v1//PutMetodu/update/{id}
**Güncelleme İçeriği**
| Tablo Adı | Veri Tipi    |
|-----------|--------------|
| id        | int(11)      |
| adı       | varchar(250) |
| soyadı    | varchar(250) |
Geri dönen Json Verisi
```json
{
    "Başarılı": "Başarılı bir güncelleme"
}
```
