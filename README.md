## BPJS KES

**Endpoint** `GET`/api/v1/bpjskes

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| idPel  | Numeric |    ✔    |                         |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Success",
            "noVA": "0000001436861946",
            "nama": "KETUT AGUNG LUHUR SUCIPTO",
            "namaCabang": "DENPASAR",
            "jumlahPeriode": "01",
            "jumlahPeserta": "3",
            "detailPeserta": [
                {
                    "noPeserta": "0000001436861946",
                    "nama": "KETUT AGUNG LUHUR SUCIPTO",
                    "premi": "51000",
                    "saldo": "0"
                },
                {
                    "noPeserta": "0000001436869282",
                    "nama": "WAYAN MAHYUNI",
                    "premi": "51000",
                    "saldo": "0"
                },
                {
                    "noPeserta": "0000001436870766",
                    "nama": "PUTU DIMAS PRAMUDITA",
                    "premi": "51000",
                    "saldo": "0"
                }
            ],
            "tagihan": "153000",
            "admin": "2500",
            "total": "155500",
            "customerData": null,
            "productCode": "BPJSKES",
            "refID": "17375569"
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| refId   | Numeric |    ✔    | Get Ref ID from Inquiry -> refID |
| nominal | Numeric |    ✔    | Get Ref ID from Inquiry -> total |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Success",
            "noVA": "0000001436861946",
            "nama": "KETUT AGUNG LUHUR SUCIPTO",
            "noReferensi": "4FE0C3745FA240D795E093D7F3D26774",
            "jumlahPeriode": "01",
            "jumlahPeserta": "3",
            "tagihan": "153000",
            "admin": "2500",
            "total": "155500",
            "info": "",
            "customerData": null
        }
    }
}
```

#### LOG

**Params**

| Key    | Type    | Require | Note                             |
| ------ | ------- | :-----: | -------------------------------- |
| action | String  |    ✔    | Value must: **payment**          |
| refId  | Numeric |    ✔    | Get Ref ID from Inquiry -> refID |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Success",
            "noVA": "0000001436861946",
            "nama": "KETUT AGUNG LUHUR SUCIPTO",
            "noReferensi": "4FE0C3745FA240D795E093D7F3D26774",
            "jumlahPeriode": "01",
            "jumlahPeserta": "3",
            "tagihan": "153000",
            "admin": "2500",
            "total": "155500",
            "info": "",
            "customerData": null
        }
    }
}
```

## BPJS TK

**Endpoint** `GET`/api/v1/bpjstk

#### VERIFY KTP

**Params**

| Key       | Type    | Require | Note                       |
| --------- | ------- | :-----: | -------------------------- |
| action    | String  |    ✔    | Value must: **verify-ktp** |
| nik       | Numeric |    ✔    |                            |
| birthDate | Date    |    ✔    | Date format: Y-m-d         |
| phone     | Numeric |    ✔    |                            |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "status": "00",
            "msg": "verifikasi e KTP Berhasil",
            "nik": "3206270804970004",
            "namaKtp": "HASAN PRAYOGA",
            "tgLahir": "08-04-1997",
            "tempatLahir": "BANDUNG",
            "noPonsel": "081319404409",
            "kotaDomisili": "TASIKMALAYA",
            "alamat": "KP BABAKAN",
            "kecamatan": "CIGALONTANG",
            "kelurahan": "NANGGERANG",
            "kodepos": "46463"
        }
    }
}
```

#### JOB LOCATION

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **job-location** |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
       "results": [
            {
                "kode": "1105",
                "nama": "ACEH BARAT"
            },
            {
                "kode": "1112",
                "nama": "ACEH BARAT DAYA"
            },
            {
                "kode": "1106",
                "nama": "ACEH BESAR"
            },
            {
                "kode": "1114",
                "nama": "ACEH JAYA"
            },
            ......
        }
    }
}
```

#### CALCULATE DUES

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **calculate-dues** |
| income | Numeric |    ✔    |  |
| JHT | Enum |    ✔    | Enum value: Y,N                |
| JKK | Enum |    ✔    | Enum value: Y |
| JKM | Enum |    ✔    | Enum value: Y |
| jobPlaceCode | Numeric |    ✔    |  |
| periodeSelect | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
       "results": {
            "JHT": "120000",
            "JKK": "60000",
            "JKM": "40800",
            "BIAYA_TRANSAKSI": "3500",
            "BIAYA_REGISTRASI": "2500",
            "TOTAL": 226800,
            "status": "00",
            "msg": "Sukses"
        }
    }
}
```

#### PROVINCE

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **provinces** |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
       "results": [
            {
                "kode": "51",
                "provinsi": "BALI"
            },
            {
                "kode": "19",
                "provinsi": "BANGKA BELITUNG"
            },
            {
                "kode": "36",
                "provinsi": "BANTEN"
            },
            {
                "kode": "17",
                "provinsi": "BENGKULU"
            },
            .......
       ]
    }
}
```

#### DISTRICT

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **provinces** |
| provinceCode | Numeric | ✔ |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
       "results": [
            {
                "kode": "3216",
                "kabupaten": "BEKASI"
            },
            {
                "kode": "3201",
                "kabupaten": "BOGOR"
            },
            {
                "kode": "3203",
                "kabupaten": "CIANJUR"
            },
            {
                "kode": "3215",
                "kabupaten": "KARAWANG"
            },
            .......
       ]
    }
}
```

#### BRANCH OFFICE

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **branch-offices** |
| districtCode | Numeric | ✔ |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "kode": "K23",
                "kantorCabang": "GARUT KARACAK(KCP)#,"
            },
            {
                "kode": "K38",
                "kantorCabang": "KOTA BANJAR(KCP)#,"
            },
            {
                "kode": "K07",
                "kantorCabang": "TASIKMALAYA#JL. IR. H. JUANDA KM. 1, TASIKMALAYA 46123, TELP: 327987, FAKS: 331346"
            }
        ]
    }
}
```

#### REGISTRATION

| Key               | Type    | Require | Note                           |
| ----------------- | ------- | :-----: | ------------------------------ |
| action            | String  |    ✔    | Value must: **registraation** |
| nik               | Numeric |    ✔    |                                |
| ktpName           | String  |    ✔    |                                |
| expNik            | Date    |    ✔    | Date format:Y-m-d              |
| birthPlace        | String  |    ✔    |                                |
| birthDate         | Date    |    ✔    | Date format:Y-m-d              |
| city              | String  |    ✔    |                                |
| address           | String  |    ✔    |                                |
| subDistrict       | String  |    ✔    |                                |
| village           | String  |    ✔    |                                |
| postCode          | Numeric |    ✔    |                                |
| phone             | String  |    ✔    |                                |
| email             | String  |    ✔    |                                |
| JHT               | Enum    |    ✔    | Enum value:Y,N                 |
| JKK               | Enum    |         | Enum value:Y                   |
| JKM               | Enum    |         | Enum value:Y                   |
| periodeSelect     | Numeric |    ✔    |                                |
| income            | Numeric |    ✔    |                                |
| jobLocationCode   | Numeric |    ✔    |                                |
| workType          | String  |    ✔    |                                |
| startWorkingHours | Date    |    ✔    | Date format:H:i                |
| endWorkingHours   | Date    |    ✔    | Date format:H:i                |
| notifySMS         | String  |    ✔    |                                |
| provinceCode      | Numeric |    ✔    |                                |
| districtCode      | Numeric |    ✔    |                                |
| branchOfficeCode  | Numeric |    ✔    |                                |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            "status": "00",
            "msg": "Pendaftaran berhasil, segera lakukan pembayaran iuran untuk menjadi peserta BPJS Ketenagakerjaan.",
            "kodeIuran": "919020079548",
            "kodeProgram": "JHT,JKK,JKM",
            "jumlahBayar": "3766800",
            "biayaRegistrasi": "0",
            "biayaAdmin": "0",
            "totalPembayaran": "3766800"
        ]
    }
}
```

#### INQUIRY DUES CODE

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **inquiry-dues-code** |
| duesCode | Numeric | ✔ |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            "nik": "3206270804970004",
            "kodeIuran": "919020079547",
            "nama": "HASAN PRAYOGA",
            "kodeProgram": "JHT,JKK,JKM",
            "jumlahBayar": 3766800,
            "biayaRegistrasi": "0",
            "biayaAdmin": "0",
            "totalPembayaran": "3766800",
            "statusBayar": "Y",
            "msg": "Sukses",
            "status": "00"
        ]
    }
}
```

#### PAY DUES

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **pay-dues** |
| duesCode | Numeric | ✔ |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            "status": "00",
            "msg": "Pembayaran Berhasil",
            "kodeIuran": "919020079548",
            "nik": "3206270804970004",
            "biayaAdmin": "0",
            "biayaRegistrasi": "0",
            "totalBayar": "3766800",
            "apiDebet": 3764300,
            "sisaDeposit": null,
            "namaKacab": "TASIKMALAYA",
            "alamatKacab": "JL. IR. H. JUANDA BY PASS TASIKMALAYA - TASIKMALAYA, TASIKMALAYA 46123, TELP: 0265-327987, FAKS: 0265-331346"
        ]
    }
}
```

#### INQUIRY REPRINT

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **inquiry-reprint** |
| duesCode | Numeric | ✔ |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            "status": "00",
            "msg": "Sukses",
            "kodeIuran": "919020079547",
            "noRegistrasi": "",
            "noKepesertaan": "3206270804970004",
            "nama": "HASAN PRAYOGA",
            "program": "JHT,JKK,JKM",
            "jumlahBayar": 3766800,
            "biayaRegistrasi": "0",
            "biayaAdmin": "0",
            "totalPembayaran": "3766800",
            "tglEfektif": "08-02-2019",
            "tglExpired": "07-08-2019",
            "JHTjmlIuran": "2484000",
            "JKKjmlIuran": "1242000",
            "JKMjmlIuran": "40800",
            "statusBayar": "Y"
        ]
    }
}
```

#### INQUIRY IURAN BY NIK

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action | String |    ✔    | Value must: **inquiry-dues-by-nik** |
| numeric | Numeric | ✔ |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            "status": "00",
            "msg": "Sukses",
            "pilihProgram": "Y",
            "daftarPeserta": "T",
            "data": [
                {
                    "kodeIuran": "919020079548",
                    "statusBayar": "Y"
                }
            ]
        ]
    }
}
```

#### PROGRAM SELECT

**Params**

| Key    | Type   | Require | Note                         |
| ------ | ------ | :-----: | ---------------------------- |
| action            | String  |    ✔    | Value must: **program-select** |
| nik               | Numeric |    ✔    |                                |
| JHT               | Enum    |    ✔    | Enum value:Y,N                 |
| JKK               | Enum    |         | Enum value:Y                   |
| JKM               | Enum    |         | Enum value:Y                   |
| periodeSelect     | Numeric |    ✔    |                                |
| income            | Numeric |    ✔    |                                |
| jobLocationCode   | Numeric |    ✔    |                                |
| workType          | String  |    ✔    |                                |
| startWorkingHours | Date    |    ✔    | Date format:H:i                |
| endWorkingHours   | Date    |    ✔    | Date format:H:i                |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
           "nik": "3206270804970004",
            "kodeIuran": "919020079549",
            "status": "00",
            "msg": "Sukses"
        ]
    }
}
```

## ETOLL

**Endpoint** `GET`/api/v1/etoll

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "category": "ETOLL",
            "dataCount": 13,
            "productList": [
                {
                    "productCode": "TOLBN10",
                    "productDesc": "SALDO ETOLL BNI 10K",
                    "productDenom": "10000",
                    "productPrice": 11450
                },
                {
                    "productCode": "TOLBN100",
                    "productDesc": "SALDO ETOLL BNI 100K",
                    "productDenom": "100000",
                    "productPrice": 101550
                },
                {
                    "productCode": "TOLBN20",
                    "productDesc": "SALDO ETOLL BNI 20K",
                    "productDenom": "20000",
                    "productPrice": 21450
                },
                ........
            }
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productCode   | String |    ✔    | Get Product Code from Inquiry -> productList -> productCode |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "BERHASIL",
            "idpel": "101000114217",
            "voucher": "",
            "ref": "952236503",
            "trxID": "10107029"
        }
    }
}
```

## GOPAY

**Endpoint** `GET`/api/v1/gopay

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "category": "GOJEK",
            "dataCount": 29,
            "productList": [
                {
                    "productCode": "HGD100",
                    "productDesc": "TopUp Driver Gojek 100.000",
                    "productDenom": "100.000",
                    "productPrice": 101800
                },
                {
                    "productCode": "HGD150",
                    "productDesc": "TopUp Driver Gojek 150.000",
                    "productDenom": "150.000",
                    "productPrice": 151800
                },
                {
                    "productCode": "HGD20",
                    "productDesc": "TopUp Driver Gojek 20.000",
                    "productDenom": "20.000",
                    "productPrice": 21800
                },
                ........
            ]
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productCode   | String |    ✔    | Get Product Code from Inquiry -> productList -> productCode |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "SUKSES - TEDDIE DIAN PATRIA 381521166274327",
            "idpel": "101000114217",
            "ref": "381521166274327",
            "trxID": "10107120"
        }
    }
}
```

## GRAB OVO

**Endpoint** `GET`/api/v1/grabovo

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "category": "GRAB",
            "dataCount": 8,
            "productList": [
                {
                    "productCode": "GRAB100",
                    "productDesc": "SALDO GRAB-OVO 100K",
                    "productDenom": "",
                    "productPrice": 101225
                },
                {
                    "productCode": "GRAB150",
                    "productDesc": "SALDO GRAB-OVO 150K",
                    "productDenom": "",
                    "productPrice": 151225
                },
                {
                    "productCode": "GRAB20",
                    "productDesc": "SALDO GRAB-OVO 20K",
                    "productDenom": "",
                    "productPrice": 20850
                },
                ........
            ]
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productCode   | String |    ✔    | Get Product Code from Inquiry -> productList -> productCode |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "BERHASIL",
            "idpel": "08123456789",
            "voucher": "Voucher Code =24768271, Voucher Password=49678-00905-86487-19636-76298",
            "ref": "505264128",
            "trxID": "10107195"
        }
    }
}
```

## KAI

#### STATION
#### SCHEDULE
#### SEATMAP
#### SEATMAP SUB

## MULTIFINANCE

**Endpoint** `GET`/api/v1/multifinance

#### PRODUCT CODE

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **product-codes**          |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "code": "FNFIF",
                "name": "FIF Finance"
            },
            {
                "code": "FNWOMD",
                "name": "Wahana Ottomitra Multiartha Finance"
            },
            {
                "code": "MEGAFIND",
                "name": "Mega Finance"
            },
            {
                "code": "FNCOLUMD",
                "name": "Columbia Finance"
            },
            {
                "code": "FNBAFD",
                "name": "Bussan Auto Finance"
            }
        ]
    }
}
```

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| productCode | String  |    ✔    | Get productCode from Product Code -> code |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
        	"responseCode": "00",
            "message": "",
            "nomorKontrak": "101000114217",
            "nama": "SURYANI NANI",
            "angsuranKe": "005",
            "totalAngsuran": "011",
            "jatuhTempo": "02/07/2017",
            "platform": "K",
            "angsuran": "4025905",
            "denda": "75000",
            "biayaTagih": "0",
            "admin": "2000",
            "totalBayar": "4102905",
            "fee": 2100,
            "productCode": "FNFIF",
            "refID": "17388233"
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productCode | String |    ✔    |  Get productCode from Inquiry-> productCode |
| refId | Numeric |    ✔    |  Get refId from Inquiry -> refID |
| nominal | Numeric | ✔ |  Get nominal from Inquiry -> totalBayar |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "",
            "nomorKontrak": "101000114217",
            "nama": "SURYANI NANI",
            "angsuranKe": "005",
            "totalAngsuran": "011",
            "jatuhTempo": "02/07/2017",
            "platform": "K",
            "noReferensi": "001394",
            "angsuran": "4025905",
            "denda": "75000",
            "biayaTagih": "0",
            "admin": "2000",
            "totalBayar": "4102905",
            "fee": 2100
        }
    }
}
```

## PDAM

**Endpoint** `GET`/api/v1/pdam

#### PRODUCT CODE

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **product-codes**          |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "code": "PDAM400011",
                "name": "PDAM KAB Banyumas"
            },
            {
                "code": "PDAM400021",
                "name": "PDAM Kabupaten Kebumen"
            },
            {
                "code": "PDAM400051",
                "name": "PDAM Kabupaten Cilacap"
            },
            .....
        ]
    }
}
```

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| productCode | String  |    ✔    | Get productCode from Product Code -> code |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "",
            "idpel": "0100031",
            "nama": "SUKIMAN",
            "jumlahTagihan": "1",
            "reff": "",
            "tagihan": [
                {
                    "periode": "JUL 2018",
                    "pemakaian": 0,
                    "meterAwal": 0,
                    "meterAkhir": 0,
                    "nilaiTagihan": 46500,
                    "penalty": 0,
                    "tagihanLain": 0,
                    "admin": 2000,
                    "total": 48500,
                    "tarif": "",
                    "alamat": "",
                    "fee": 1100
                }
            ],
            "totalTagihan": 48500,
            "productCode": "PDAM400011",
            "refID": "17388522"
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productCode | String |    ✔    |  Get productCode from Inquiry-> productCode |
| refId | Numeric |    ✔    |  Get refId from Inquiry -> refID |
| nominal | Numeric | ✔ |  Get nominal from Inquiry -> totalTagihan |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "",
            "idpel": "0100031             ",
            "nama": "SUKIMAN",
            "jumlahTagihan": "1",
            "reff": "",
            "tagihan": [
                {
                    "periode": "JUL 2018",
                    "pemakaian": 14,
                    "meterAwal": 1588,
                    "meterAkhir": 1602,
                    "nilaiTagihan": 46500,
                    "penalty": 0,
                    "tagihanLain": 0,
                    "admin": 2000,
                    "total": 48500,
                    "tarif": "RUMAH TANGGA B1",
                    "alamat": "JL. KOBER NO.25A PWT."
                }
            ],
            "totalTagihan": 48500
        }
    }
}
```

#### LOG

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **log**          |
| refId | Numeric |    ✔    |  Get refId from Inquiry -> refID |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "",
            "idpel": "0100031             ",
            "nama": "SUKIMAN",
            "jumlahTagihan": "1",
            "reff": "",
            "tagihan": [
                {
                    "periode": "JUL 2018",
                    "pemakaian": 14,
                    "meterAwal": 1588,
                    "meterAkhir": 1602,
                    "nilaiTagihan": 46500,
                    "penalty": 0,
                    "tagihanLain": 0,
                    "admin": 2000,
                    "total": 48500,
                    "tarif": "RUMAH TANGGA B1",
                    "alamat": "JL. KOBER NO.25A PWT."
                }
            ],
            "totalTagihan": 48500
        }
    }
}
```

## PGN

**Endpoint** `GET`/api/v1/pgn

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "sukses",
            "idPel": "0110014679",
            "nama": "NGATIMUN",
            "alamat": "-",
            "periode": "0917-1017",
            "standAwal": "006538",
            "standAkhir": "006573",
            "pemakaian": "0000000035",
            "ref": "55599-70237",
            "tagihan": "322002",
            "admin": "2500",
            "totalTagihan": 324502,
            "productCode": "PGN",
            "refID": "17388821"
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| refId | Numeric |    ✔    |  Get refId from Inquiry -> refID |
| nominal | Numeric | ✔ |  Get nominal from Inquiry -> totalTagihan |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "sukses",
            "idPel": "0110014679",
            "nama": "NGATIMUN",
            "alamat": "-",
            "periode": "0917-1017",
            "standAwal": "006538",
            "standAkhir": "006573",
            "pemakaian": "0000000035",
            "tagihan": "322002",
            "admin": "2500",
            "totalTagihan": 324502,
            "ref": null,
            "tglBayar": null
        }
    }
}
```

#### LOG

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **log**          |
| refId | Numeric |    ✔    |  Get refId from Inquiry -> refID |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "sukses",
            "idPel": "0110014679",
            "nama": "NGATIMUN",
            "alamat": "-",
            "periode": "0917-1017",
            "standAwal": "006538",
            "standAkhir": "006573",
            "pemakaian": "0000000035",
            "tagihan": "322002",
            "admin": "2500",
            "totalTagihan": 324502,
            "ref": null,
            "tglBayar": null
        }
    }
}
```

## PLN

**Endpoint** `GET`/api/v1/pln

#### PRODUCT CODE

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **product-codes**          |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "code": "PLNNONTAGLISB",
                "name": "PLN NON Tagihan Listrik"
            },
            {
                "code": "PLNPOSTPAIDB",
                "name": "Pasca Bayar"
            },
            {
                "code": "PLNPREPAIDB",
                "name": "Token"
            }
        ]
    }
}
```

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| productCode | String  |    ✔    | Get productCode from Product Code -> code |
| idPel | Numeric |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Successful",
            "subscriberID": "530000000001",
            "nama": "SUBCRIBER NAME",
            "tarif": "R1",
            "daya": "1300",
            "lembarTagihanTotal": 1,
            "lembarTagihan": "1",
            "detilTagihan": [
                {
                    "periode": "201608",
                    "nilaiTagihan": "300000",
                    "denda": 0,
                    "admin": 2500,
                    "total": 302500
                }
            ],
            "totalTagihan": 302500,
            "productCode": "PLNPOSTPAIDB",
            "refID": "17389175"
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productCode | String |    ✔    | Get productCode from Inquiry-> productCode |
| refId | Numeric |    ✔    | Get refId from Inquiry -> refID |
| nominal | Numeric | ✔ | Get nominal from Inquiry: -> totalTagihan (nontalgis & postpaid), -> powerPurchaseDenom + -> data->admin (prepaid) |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Successful",
            "subscriberID": "530000000001",
            "nama": "SUBCRIBER NAME",
            "tarif": "R1",
            "daya": "1300",
            "lembarTagihanSisa": 0,
            "lembarTagihan": "1",
            "detilTagihan": [
                {
                    "meterAwal": "00080000",
                    "meterAkhir": "00080000",
                    "periode": "201608",
                    "nilaiTagihan": "300000",
                    "denda": 0,
                    "admin": 2500,
                    "total": 302500,
                    "fee": 2400
                }
            ],
            "totalTagihan": 302500,
            "refnumber": "004212C9245F1BA43A77CEBD5CD5DA39",
            "infoText": "RINCIAN TAGIHAN DAPAT DIAKSES DI www.pln.co.id ATAU PLN TERDEKAT"
        }
    }
}
```


## PULSA

**Endpoint** `GET`/api/v1/pulsa

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| phone | Numeric  |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
                {
                    "product_id": "P732287",
                    "voucher": "SIMPATI",
                    "nominal": "5.000",
                    "price": 5475
                },
                {
                    "product_id": "P612697",
                    "voucher": "SIMPATI",
                    "nominal": "10.000",
                    "price": 10150
                },
                {
                    "product_id": "P212980",
                    "voucher": "SIMPATI",
                    "nominal": "20.000",
                    "price": 20000
                },
                ........
            ]
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| phone   | Numeric |    ✔    |  |
| product_id | String |    ✔    | Get product_id from Inquiry->product_id |
| price | Numeric | ✔ | Get product_id from Inquiry->price |
##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "status": "00",
            "msg": "Sukses",
            "msisdn": "081319404409",
            "trxID": "DEVEL1550127600",
            "price": 5475,
            "VoucherSN": "1234567890987654321"
        }
    }
}
```

## TELKOM

**Endpoint** `GET`/api/v1/telkom

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |
| idPel | Numeric  |    ✔    |  |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Approved",
            "idpel": "0313282370",
            "kodeArea": "0031",
            "divre": "03",
            "datel": "0002",
            "nama": "KANTOR PELAYANAN BEA&CUKAI TIP",
            "jumlahTagihan": "1",
            "tagihan": [
                {
                    "periode": "NOV 2015",
                    "nilaiTagihan": "68360",
                    "admin": "2500",
                    "total": 70860,
                    "fee": 1700
                }
            ],
            "totalTagihan": 70860,
            "productCode": "TELKOMPSTN",
            "refID": "17387531"
        }
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| ref_id   | Numeric |    ✔    |  Get noniml from Inquiry -> refId |
| nominal | Numeric |    ✔    |  Get noniml from Inquiry -> totalTagihan |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "responseCode": "00",
            "message": "Approved",
            "idpel": "0313282370",
            "kodeArea": "0031",
            "divre": "03",
            "datel": "0002",
            "nama": "KANTOR PELAYANAN BEA&CUKAI TIP",
            "jumlahTagihan": "1",
            "tagihan": [
                {
                    "periode": "NOV 2015",
                    "nilaiTagihan": "68360",
                    "admin": "2500",
                    "total": 70860
                }
            ],
            "totalTagihan": 70860
        }
    }
}
```

## TRAVEL

#### AGENT
#### DEPARTURE
#### ARRIVAL
#### DEPARTURE SCHEDULE
#### SEATMAP
#### BOOKING
#### PAYMENT
#### CHECK

## VOUCHER GAME

**Endpoint** `GET`/api/v1/vcgame

#### INQUIRY

**Params**

| Key    | Type    | Require | Note                    |
| ------ | ------- | :-----: | ----------------------- |
| action | String  |    ✔    | Value must: **inquiry** |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "productID": "G502579",
                "voucher": "AERIAPOINTS",
                "nominal": "510 Points",
                "harga": 65800
            },
            {
                "productID": "G425387",
                "voucher": "AERIAPOINTS",
                "nominal": "2.100 Points",
                "harga": 260800
            },
            {
                "productID": "G874292",
                "voucher": "AERIAPOINTS",
                "nominal": "3.240 Points",
                "harga": 386300
            },
            .....
        ]
    }
}
```

#### PAYMENT

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **payment**          |
| productId   | String |    ✔    |  Get noniml from Inquiry -> productId |
| amount | Numeric |    ✔    |  Get noniml from Inquiry -> harga |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "status": "00",
            "errCode": "00",
            "msg": "Sukses",
            "uniqueID": "5c651454b8d17",
            "msisdn": "0089527295650",
            "price": 65800,
            "trxID": "20120712816768",
            "voucherCode": "Voucher Code=QV8TP-BDUQY-VGUOO-EZADS-36T4F,Serial Number=6114582131,"
        }
    }
}
```

#### STATUS

**Params**

| Key     | Type    | Require | Note                             |
| ------- | ------- | :-----: | -------------------------------- |
| action  | String  |    ✔    | Value must: **status**          |
| msisdn   | Numeric |    ✔    |  Get noniml from Payment -> msisdn |
| trxId | Numeric |    ✔    |  Get noniml from Payment -> trxID |

##### Success Response

Code: `200`

```json
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "status": "00",
            "errCode": "00",
            "transactionStatus": "SUCCESS",
            "voucherCode": "Voucher Code=QV8TP-BDUQY-VGUOO-EZADS-36T4F,Serial Number=6114582131,"
        }
    }
}
```