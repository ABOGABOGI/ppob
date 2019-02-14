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

#### INQUIRY
#### PAYMENT

## GOPAY

#### INQUIRY
#### PAYMENT

## GRAB OVO

#### INQUIRY
#### PAYMENT

## KAI

#### STATION
#### SCHEDULE
#### SEATMAP
#### SEATMAP SUB

## MULTIFINANCE

#### PRODUCT CODE
#### INQUIRY
#### PAYMENT

## PDAM

#### PRODUCT CODE
#### INQUIRY
#### PAYMENT
#### LOG

## PGN

#### INQUIRY
#### PAYMENT
#### LOG

## PLN

#### PRODUCT CODE
#### INQUIRY
#### PAYMENT

## PULSA

#### INQUIRY
#### PAYMENT

## TELKOM

#### INQUIRY
#### PAYMENT

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

#### INQUIRY
#### PAYMENT
#### STATUS