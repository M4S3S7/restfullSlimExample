# Restfull JWT Example

php kullanarak slim freamwork ile Restfull api yapımı JWT ile apinin korunmasına yönelik örnek çalışma

<details>
<summary><b>21.07.2019 Sadece İşlemleri Ekledim </b></summary>

## Endpoint Kullanımı

###  Post-/api/v1/

Örnek URL => api/v1/postMetodu/Ekle


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


### GET-/api/v1/ (Çoklu Sorgu)

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

### GET-/api/v1/ (Tekli Sorgu)

Örnek URL => api/v1/getMetodu/{id}

```json
[
  {

  "id": "1",
  "adi": "mustafa",
  "soyadı": "sevindi"
  }
]
```
### PUT-/api/v1/###

Örnek URL => /api/v1/putMetodu/update/{id}

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

### PUT-/api/v1/###

Örnek URL => /api/v1/deleteMetodu/{id}

**Silme İçeriği**

| Tablo Adı | Veri Tipi    |
|-----------|--------------|
| id        | int(11)      |
| adı       | varchar(250) |
| soyadı    | varchar(250) |

Geri dönen Json Verisi

```json
{
    "queryString": "DELETE FROM isimler Where id = 1"
}
```
