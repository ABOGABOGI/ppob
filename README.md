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

**Endpoint** `GET`/api/v1/kai

#### STATION

**Params**

| Key    | Type   | Require | Note                    |
| ------ | ------ | :-----: | ----------------------- |
| action | String |    ✔    | Value must: **station** |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "code": "BD",
                "name": "BANDUNG",
                "group": "BANDUNG"
            },
            {
                "code": "RH",
                "name": "RENDEH",
                "group": "BANDUNG"
            },
            {
                "code": "RCK",
                "name": "RANCAEKEK",
                "group": "BANDUNG"
            },
            ...
         ]
     }
 }
```



#### SCHEDULE

**Params**

| Key         | Type   | Require | Note                     |
| ----------- | ------ | :-----: | ------------------------ |
| action      | String |    ✔    | Value must: **schedule** |
| origin      | String |    ✔    |                          |
| destination | String |    ✔    |                          |
| date        | Date   |    ✔    | Date format: Y-m-d       |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "errCode": "0",
                "schedule": [
                    {
                        "trainNumber": "33",
                        "trainName": "ARGO GIANT",
                        "departTime": "07:00",
                        "departDate": "2019-03-10",
                        "arriveTime": "10:00",
                        "arriveDate": "2019-03-10",
                        "class": "EKSEKUTIF",
                        "codeClass": "E",
                        "subClass": "A",
                        "adult": 340000,
                        "child": 0,
                        "seat": 300
                    }
                ]
            }
        ]
    }
 }
```

#### SEATMAP

**Params**

| Key         | Type    | Require | Note                    |
| ----------- | ------- | :-----: | ----------------------- |
| action      | String  |    ✔    | Value must: **seatmap** |
| origin      | String  |    ✔    |                         |
| destination | String  |    ✔    |                         |
| date        | Date    |    ✔    | Date format: Y-m-d      |
| trainNo     | Numeric |    ✔    |                         |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "err_code": 0,
                "org": "BD",
                "des": "TSM",
                "train_no": "33",
                "dep_date": "20190310",
                "seat_map": [
                    [
                        "EKS",
                        1,
                        [
                            [
                                1,
                                1,
                                1,
                                "A",
                                "A",
                                0
                            ],
                            [
                                1,
                                2,
                                1,
                                "B",
                                "A",
                                0
                            ],
                            [
                                1,
                                3,
                                1,
                                "",
                                "",
                                0
                            ],
                            [
                                1,
                                4,
                                1,
                                "C",
                                "A",
                                0
                            ],
                            [
                                1,
                                5,
                                1,
                                "D",
                                "",
                                0
                            ],
                            [
                                2,
                                1,
                                2,
                                "A",
                                "A",
                                0
                            ],
                            [
                                2,
                                2,
                                2,
                                "B",
                                "A",
                                0
                            ],
                            [
                                2,
                                3,
                                2,
                                "",
                                "",
                                0
                            ],
                            [
                                2,
                                4,
                                2,
                                "C",
                                "A",
                                0
                            ],
                            [
                                2,
                                5,
                                2,
                                "D",
                                "A",
                                0
                            ],
                            [
                                3,
                                1,
                                3,
                                "A",
                                "A",
                                0
                            ],
                            [
                                3,
                                2,
                                3,
                                "B",
                                "A",
                                0
                            ],
                            [
                                3,
                                3,
                                3,
                                "",
                                "",
                                0
                            ],
                            [
                                3,
                                4,
                                3,
                                "C",
                                "A",
                                0
                            ],
                            [
                                3,
                                5,
                                3,
                                "D",
                                "A",
                                0
                            ],
                            [
                                4,
                                1,
                                4,
                                "A",
                                "A",
                                0
                            ],
                            [
                                4,
                                2,
                                4,
                                "B",
                                "A",
                                0
                            ],
                            [
                                4,
                                3,
                                4,
                                "",
                                "",
                                0
                            ],
                            [
                                4,
                                4,
                                4,
                                "C",
                                "A",
                                0
                            ],
                            [
                                4,
                                5,
                                4,
                                "D",
                                "A",
                                0
                            ],
                            [
                                5,
                                1,
                                5,
                                "A",
                                "A",
                                0
                            ],
                            [
                                5,
                                2,
                                5,
                                "B",
                                "A",
                                0
                            ],
                            [
                                5,
                                3,
                                5,
                                "",
                                "",
                                0
                            ],
                            [
                                5,
                                4,
                                5,
                                "C",
                                "A",
                                0
                            ],
                            [
                                5,
                                5,
                                5,
                                "D",
                                "A",
                                0
                            ],
                            [
                                6,
                                1,
                                6,
                                "A",
                                "A",
                                0
                            ],
                            [
                                6,
                                2,
                                6,
                                "B",
                                "A",
                                0
                            ],
                            [
                                6,
                                3,
                                6,
                                "",
                                "",
                                0
                            ],
                            [
                                6,
                                4,
                                6,
                                "C",
                                "A",
                                0
                            ],
                            [
                                6,
                                5,
                                6,
                                "D",
                                "A",
                                0
                            ],
                            [
                                7,
                                1,
                                7,
                                "A",
                                "A",
                                0
                            ],
                            [
                                7,
                                2,
                                7,
                                "B",
                                "A",
                                0
                            ],
                            [
                                7,
                                3,
                                7,
                                "",
                                "",
                                0
                            ],
                            [
                                7,
                                4,
                                7,
                                "C",
                                "A",
                                0
                            ],
                            [
                                7,
                                5,
                                7,
                                "D",
                                "A",
                                0
                            ],
                            [
                                8,
                                1,
                                8,
                                "A",
                                "A",
                                0
                            ],
                            [
                                8,
                                2,
                                8,
                                "B",
                                "A",
                                0
                            ],
                            [
                                8,
                                3,
                                8,
                                "",
                                "",
                                0
                            ],
                            [
                                8,
                                4,
                                8,
                                "C",
                                "A",
                                0
                            ],
                            [
                                8,
                                5,
                                8,
                                "D",
                                "A",
                                0
                            ],
                            [
                                9,
                                1,
                                9,
                                "A",
                                "A",
                                0
                            ],
                            [
                                9,
                                2,
                                9,
                                "B",
                                "A",
                                0
                            ],
                            [
                                9,
                                3,
                                9,
                                "",
                                "",
                                0
                            ],
                            [
                                9,
                                4,
                                9,
                                "C",
                                "A",
                                0
                            ],
                            [
                                9,
                                5,
                                9,
                                "D",
                                "A",
                                0
                            ],
                            [
                                10,
                                1,
                                10,
                                "A",
                                "A",
                                0
                            ],
                            [
                                10,
                                2,
                                10,
                                "B",
                                "A",
                                0
                            ],
                            [
                                10,
                                3,
                                10,
                                "",
                                "",
                                0
                            ],
                            [
                                10,
                                4,
                                10,
                                "C",
                                "A",
                                0
                            ],
                            [
                                10,
                                5,
                                10,
                                "D",
                                "A",
                                0
                            ],
                            [
                                11,
                                1,
                                11,
                                "A",
                                "A",
                                0
                            ],
                            [
                                11,
                                2,
                                11,
                                "B",
                                "A",
                                0
                            ],
                            [
                                11,
                                3,
                                11,
                                "",
                                "",
                                0
                            ],
                            [
                                11,
                                4,
                                11,
                                "C",
                                "A",
                                0
                            ],
                            [
                                11,
                                5,
                                11,
                                "D",
                                "A",
                                0
                            ],
                            [
                                12,
                                1,
                                12,
                                "A",
                                "A",
                                0
                            ],
                            [
                                12,
                                2,
                                12,
                                "B",
                                "A",
                                0
                            ],
                            [
                                12,
                                3,
                                12,
                                "",
                                "",
                                0
                            ],
                            [
                                12,
                                4,
                                12,
                                "C",
                                "A",
                                0
                            ],
                            [
                                12,
                                5,
                                12,
                                "D",
                                "A",
                                0
                            ],
                            [
                                13,
                                1,
                                13,
                                "A",
                                "",
                                0
                            ],
                            [
                                13,
                                2,
                                13,
                                "B",
                                "A",
                                0
                            ],
                            [
                                13,
                                3,
                                13,
                                "",
                                "",
                                0
                            ],
                            [
                                13,
                                4,
                                13,
                                "C",
                                "A",
                                0
                            ],
                            [
                                13,
                                5,
                                13,
                                "D",
                                "A",
                                0
                            ],
                            [
                                14,
                                1,
                                14,
                                "A",
                                "",
                                0
                            ],
                            [
                                14,
                                2,
                                14,
                                "B",
                                "",
                                0
                            ],
                            [
                                14,
                                3,
                                14,
                                "",
                                "",
                                0
                            ],
                            [
                                14,
                                4,
                                14,
                                "C",
                                "",
                                0
                            ],
                            [
                                14,
                                5,
                                14,
                                "D",
                                "",
                                0
                            ]
                        ]
                    ],
                 }
              }
           }
      }
```



#### SEATMAP SUB

**Params**

| Key         | Type    | Require | Note                       |
| ----------- | ------- | :-----: | -------------------------- |
| action      | String  |    ✔    | Value must: **seatmapsub** |
| origin      | String  |    ✔    |                            |
| destination | String  |    ✔    |                            |
| date        | Date    |    ✔    | Date format: Y-m-d         |
| trainNo     | Numeric |    ✔    |                            |
| subClass    | String  |    ✔    |                            |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "org": "BD",
                "des": "TSM",
                "date": "2019-03-10",
                "trainNo": "33",
                "seatMap": [
                    [
                        "EKS",
                        1,
                        [
                            [
                                1,
                                1,
                                1,
                                "A",
                                "A",
                                0
                            ],
                            [
                                1,
                                2,
                                1,
                                "B",
                                "A",
                                0
                            ],
                            [
                                1,
                                4,
                                1,
                                "C",
                                "A",
                                0
                            ],
                            [
                                2,
                                1,
                                2,
                                "A",
                                "A",
                                0
                            ],
                            [
                                2,
                                2,
                                2,
                                "B",
                                "A",
                                0
                            ],
                            [
                                2,
                                4,
                                2,
                                "C",
                                "A",
                                0
                            ],
                            [
                                2,
                                5,
                                2,
                                "D",
                                "A",
                                0
                            ],
                            [
                                3,
                                1,
                                3,
                                "A",
                                "A",
                                0
                            ],
                            [
                                3,
                                2,
                                3,
                                "B",
                                "A",
                                0
                            ],
                            [
                                3,
                                4,
                                3,
                                "C",
                                "A",
                                0
                            ],
                            [
                                3,
                                5,
                                3,
                                "D",
                                "A",
                                0
                            ],
                            [
                                4,
                                1,
                                4,
                                "A",
                                "A",
                                0
                            ],
                            [
                                4,
                                2,
                                4,
                                "B",
                                "A",
                                0
                            ],
                            [
                                4,
                                4,
                                4,
                                "C",
                                "A",
                                0
                            ],
                            [
                                4,
                                5,
                                4,
                                "D",
                                "A",
                                0
                            ],
                            [
                                5,
                                1,
                                5,
                                "A",
                                "A",
                                0
                            ],
                            [
                                5,
                                2,
                                5,
                                "B",
                                "A",
                                0
                            ],
                            [
                                5,
                                4,
                                5,
                                "C",
                                "A",
                                0
                            ],
                            [
                                5,
                                5,
                                5,
                                "D",
                                "A",
                                0
                            ],
                            [
                                6,
                                1,
                                6,
                                "A",
                                "A",
                                0
                            ],
                            [
                                6,
                                2,
                                6,
                                "B",
                                "A",
                                0
                            ],
                            [
                                6,
                                4,
                                6,
                                "C",
                                "A",
                                0
                            ],
                            [
                                6,
                                5,
                                6,
                                "D",
                                "A",
                                0
                            ],
                            [
                                7,
                                1,
                                7,
                                "A",
                                "A",
                                0
                            ],
                            [
                                7,
                                2,
                                7,
                                "B",
                                "A",
                                0
                            ],
                            [
                                7,
                                4,
                                7,
                                "C",
                                "A",
                                0
                            ],
                            [
                                7,
                                5,
                                7,
                                "D",
                                "A",
                                0
                            ],
                            [
                                8,
                                1,
                                8,
                                "A",
                                "A",
                                0
                            ],
                            [
                                8,
                                2,
                                8,
                                "B",
                                "A",
                                0
                            ],
                            [
                                8,
                                4,
                                8,
                                "C",
                                "A",
                                0
                            ],
                            [
                                8,
                                5,
                                8,
                                "D",
                                "A",
                                0
                            ],
                            [
                                9,
                                1,
                                9,
                                "A",
                                "A",
                                0
                            ],
                            [
                                9,
                                2,
                                9,
                                "B",
                                "A",
                                0
                            ],
                            [
                                9,
                                4,
                                9,
                                "C",
                                "A",
                                0
                            ],
                            [
                                9,
                                5,
                                9,
                                "D",
                                "A",
                                0
                            ],
                            [
                                10,
                                1,
                                10,
                                "A",
                                "A",
                                0
                            ],
                            [
                                10,
                                2,
                                10,
                                "B",
                                "A",
                                0
                            ],
                            [
                                10,
                                4,
                                10,
                                "C",
                                "A",
                                0
                            ],
                            [
                                10,
                                5,
                                10,
                                "D",
                                "A",
                                0
                            ],
                            [
                                11,
                                1,
                                11,
                                "A",
                                "A",
                                0
                            ],
                            [
                                11,
                                2,
                                11,
                                "B",
                                "A",
                                0
                            ],
                            [
                                11,
                                4,
                                11,
                                "C",
                                "A",
                                0
                            ],
                            [
                                11,
                                5,
                                11,
                                "D",
                                "A",
                                0
                            ],
                            [
                                12,
                                1,
                                12,
                                "A",
                                "A",
                                0
                            ],
                            [
                                12,
                                2,
                                12,
                                "B",
                                "A",
                                0
                            ],
                            [
                                12,
                                4,
                                12,
                                "C",
                                "A",
                                0
                            ],
                            [
                                12,
                                5,
                                12,
                                "D",
                                "A",
                                0
                            ],
                            [
                                13,
                                2,
                                13,
                                "B",
                                "A",
                                0
                            ],
                            [
                                13,
                                4,
                                13,
                                "C",
                                "A",
                                0
                            ],
                            [
                                13,
                                5,
                                13,
                                "D",
                                "A",
                                0
                            ]
                        ]
                    ],
                ]
             }
          ]
       }
   }
```

#### BOOKING

**Headers**

| Key          | Value              |
| ------------ | ------------------ |
| Content-Type | `application/json` |

**Params**

| Key         | Type    | Require | Note                                                         |
| ----------- | ------- | :-----: | ------------------------------------------------------------ |
| action      | String  |    ✔    | Value must: **booking**                                      |
| origin      | String  |    ✔    |                                                              |
| destination | String  |    ✔    |                                                              |
| date        | Date    |    ✔    | Date format: Y-m-d                                           |
| trainNo     | Numeric |    ✔    |                                                              |
| subClass    | String  |    ✔    |                                                              |
| adult       | Numeric |    ✔    |                                                              |
| child       | Numeric |         |                                                              |
| infant      | Numeric |         |                                                              |
| traveller   | Object  |    ✔    | This object contain: (array) adult , (array) child, (array) infant. check table below. |
| seatSelect  | Enum    |    ✔    | Enum value: manual                                           |
| wagonCode   | String  |    ✔    |                                                              |
| wagonNumber | Numeric |    ✔    |                                                              |
| seats       | String  |    ✔    |                                                              |

**Traveller**

| Key    | Type  | Require | Note |
| ------ | ----- | ------- | ---- |
| adult  | Array | ✔       |      |
| child  | Array |         |      |
| infant | Array |         |      |

**Adult Params**

| Key         | Type    | Require | Note |
| ----------- | ------- | :-----: | ---- |
| adult_name  | String  |    ✔    |      |
| adult_id    | Numeric |    ✔    |      |
| adult_date  | Date    |    ✔    |      |
| adult_phone | Numeric |    ✔    |      |

**Child Params**

The child params is still mysterious.

**Infant Params**

The infant params is still mysterious.

**Example Request**

```
{
	"action":"booking",
	"origin":"BD",
	"destination":"TSM",
	"date":"2019-03-10",
	"trainNo":33,
	"subClass":"A",
	"adult":1,
	"travellers":{
		"adult":[
			{
				"adult_name":"Doni",
				"adult_id":"331234897887283674",
				"adult_date_of_birth":"1945-08-17",
				"adult_phone":"081234567890"
			}
		]
	},
	"seatSelect":"manual",
	"wagonCode":"EKS",
	"wagonNumber":1,
	"seats":"1A"
	
}
```

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "errCode": 0,
                "org": "BD",
                "des": "TSM",
                "bookingCode": "Q9JJA3",
                "bookTime": "18-FEB-2019 11:33:00",
                "timeLimit": "2019-02-18 11:47:01",
                "bookingDate": "2019-02-18 11:33:01",
                "TrainNo": "33",
                "class": "E",
                "subClass": "A",
                "className": "EKSEKUTIF",
                "TrainName": "ARGO GIANT",
                "TrainNumber": "33",
                "numCode": 9981736671605,
                "depart": "BD (BANDUNG)",
                "departTime": "07:00",
                "departDate": "10-MAR-19",
                "arrive": "TSM (TASIKMALAYA)",
                "arriveTime": "10:00",
                "arriveDate": "10-MAR-19",
                "passenger": [
                    [
                        "DONI",
                        "331234897887283674",
                        "A",
                        "",
                        0,
                        "",
                        0,
                        "EKS-1",
                        "1C"
                    ]
                ],
                "contact": [
                    [
                        "DONI",
                        "081234567890"
                    ]
                ],
                "adult": 1,
                "child": 0,
                "infant": 0,
                "adultPrice": "340000",
                "childPrice": "0",
                "infantPrice": "0",
                "ticketPrice": 340000,
                "discount": 0,
                "admin": 7500,
                "fee": 5000,
                "totalPrice": 347500
            }
        ]
    }
}
```

#### ISSUE

**Params**

| Key         | Type    | Require | Note                  |
| ----------- | ------- | :-----: | --------------------- |
| action      | String  |    ✔    | Value must: **issue** |
| bookingCode | String  |    ✔    |                       |
| totalPrice  | Numeric |    ✔    |                       |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "errCode": "0",
                "msg": "Issued Kode Booking Q9JJA3 Sukses"
            }
        ]
    }
}
```

#### STATUS ####

**Params**

| Key         | Type   | Require | Note                   |
| ----------- | ------ | :-----: | ---------------------- |
| action      | String |    ✔    | Value must: **status** |
| bookingCode | String |    ✔    |                        |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "errCode": "0",
                "bookingStatus": "ISSUED",
                "issuedDate": "2019-02-18 11:59:32",
                "bookingCode": "39HRTU",
                "bookingDate": "2019-02-06 15:19:36",
                "bookTime": "06-FEB-2019 15:19:35",
                "timeLimit": "2019-02-06 15:33:36",
                "numCode": 9989268481508,
                "TrainName": "ARGO GIANT",
                "TrainNumber": "33",
                "class": "E",
                "depart": "BD (BANDUNG)",
                "departTime": "07:00",
                "departDate": "10-FEB-19",
                "arrive": "TSM (TASIKMALAYA)",
                "arriveTime": "10:00",
                "arriveDate": "10-FEB-19",
                "passenger": [
                    [
                        "DONI",
                        "331234897887283674",
                        "A",
                        "",
                        0,
                        "",
                        0,
                        "EKS-1",
                        "1A"
                    ]
                ],
                "contact": [
                    [
                        "DONI",
                        "081234567890"
                    ]
                ],
                "adult": "1",
                "child": "0",
                "infant": "0",
                "adultPrice": "340000",
                "childPrice": "0",
                "infantPrice": "0",
                "ticketPrice": 340000,
                "discount": 0,
                "admin": 7500,
                "fee": 5000,
                "totalPrice": "347500",
                "tiketPdf": "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"
            }
        ]
    }
}
```



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

**Endpoint** `GET`/api/v1/travel

#### AGENT

**Params**

| Key    | Type   | Require | Note                  |
| ------ | ------ | :-----: | --------------------- |
| action | String |    ✔    | Value must: **agent** |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "errCode": "00",
                "msg": "Sukses",
                "agen": [
                    {
                        "kode": "DTR",
                        "nama": "Day Trans"
                    },
                    {
                        "kode": "XTR",
                        "nama": "Xtrans"
                    }
                ]
            }
        ]
    }
}
```

#### DEPARTURE

**Params**

| Key       | Type   | Require | Note                      |
| --------- | ------ | :-----: | ------------------------- |
| action    | String |    ✔    | Value must: **departure** |
| agentCode | String |    ✔    |                           |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": [
            {
                "errCode": "00",
                "msg": "Sukses",
                "result": [
                    {
                        "asal": "Bandung",
                        "keberangkatan": [
                            {
                                "cabangAsal": "Cihampelas",
                                "id": "eb3c054955dff2748ad27ef46e279cab782d2407"
                            },
                            {
                                "cabangAsal": "Dipatiukur",
                                "id": "8c9435d2b1741fe080e477248583d40f1da40995"
                            },
                            {
                                "cabangAsal": "Pasteur",
                                "id": "b048eecb88ea60741b2f63caf9313093997c423f"
                            }
                        ]
                    },
                    {
                        "asal": "Jakarta",
                        "keberangkatan": [
                            {
                                "cabangAsal": "Tang City",
                                "id": "7d62039058be70536b1675040e45ef183cab7ffa"
                            },
                            {
                                "cabangAsal": "Tebet",
                                "id": "ca7ef2a3a5dcab60843ae6917ef657fe65c83341"
                            },
                            {
                                "cabangAsal": "Thamrin City",
                                "id": "e6a5f06b324a816727caa014c73eb260e5716bb2"
                            }
                        ]
                    }
                ]
            }
        ]
    },
    "request": {
        "get": {
            "action": "departure",
            "agentCode": "DTR"
        }
    },
    "debug": true
}
```

#### ARRIVAL

**Endpoint** `GET`/api/v1/vcgame

#### INQUIRY

**Params**

| Key         | Type   | Require | Note                    |
| ----------- | ------ | :-----: | ----------------------- |
| action      | String |    ✔    | Value must: **arrival** |
| agentCode   | String |    ✔    |                         |
| departureId | String |    ✔    |                         |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "msg": "Sukses",
            "result": [
                {
                    "tujuan": "Jakarta",
                    "kedatangan": [
                        {
                            "cabangTujuan": "Grogol",
                            "id": "9a72ac15cc21726a6b8d3a327c6054c6b66df6fa"
                        },
                        {
                            "cabangTujuan": "Karet",
                            "id": "5dd364fa58128ef02698a39ff10847bfe65d4430"
                        },
                        {
                            "cabangTujuan": "Lippo Mall Puri",
                            "id": "1fe1a8e4e4a26f402c8016f3124fc1816d4d69ae"
                        },
                        {
                            "cabangTujuan": "Tang City",
                            "id": "7d62039058be70536b1675040e45ef183cab7ffa"
                        },
                        {
                            "cabangTujuan": "Tebet",
                            "id": "ca7ef2a3a5dcab60843ae6917ef657fe65c83341"
                        }
                    ]
                }
            ]
        }
    }
}
```

#### DEPARTURE SCHEDULE

**Params**

| Key            | Type    | Require | Note                               |
| -------------- | ------- | :-----: | ---------------------------------- |
| action         | String  |    ✔    | Value must: **departure-schedule** |
| agentCode      | String  |    ✔    |                                    |
| departureId    | String  |    ✔    |                                    |
| arrivalId      | String  |    ✔    |                                    |
| date           | Date    |    ✔    |                                    |
| travellerCount | Numeric |    ✔    |                                    |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "msg": "Sukses",
            "idJadwal": 25,
            "result": [
                {
                    "kode": "CHP-GRG05",
                    "jam_berangkat": "05:30",
                    "kursi_tersedia": 10,
                    "layout_kursi": "10",
                    "hargaTiket": 120000,
                    "id_layout": "10",
                    "promo": [
                        {
                            "kode": "PR00018TTX",
                            "nama": "Promo Kuota",
                            "tipe": 3,
                            "ispp": 0,
                            "kursi": "",
                            "kuota_id": "27873",
                            "kuota": 2,
                            "prioritas": 10,
                            "potongan": 50000
                        }
                    ]
                },
                {
                    "kode": "CHP-GRG07",
                    "jam_berangkat": "07:30",
                    "kursi_tersedia": 10,
                    "layout_kursi": "10",
                    "hargaTiket": 120000,
                    "id_layout": "10",
                    "promo": [
                        {
                            "kode": "PR00018TTX",
                            "nama": "Promo Kuota",
                            "tipe": 3,
                            "ispp": 0,
                            "kursi": "",
                            "kuota_id": "27874",
                            "kuota": 2,
                            "prioritas": 10,
                            "potongan": 50000
                        }
                    ]
                },
                {
                    "kode": "CHP-GRG08",
                    "jam_berangkat": "08:30",
                    "kursi_tersedia": 10,
                    "layout_kursi": "10",
                    "hargaTiket": 120000,
                    "id_layout": "10",
                    "promo": [
                        {
                            "kode": "PR00018TTX",
                            "nama": "Promo Kuota",
                            "tipe": 3,
                            "ispp": 0,
                            "kursi": "",
                            "kuota_id": "27875",
                            "kuota": 2,
                            "prioritas": 10,
                            "potongan": 50000
                        }
                    ]
                },
            ]
        }
    }
}
```



#### SEATMAP

**Params**

| Key          | Type    | Require | Note                    |
| ------------ | ------- | :-----: | ----------------------- |
| action       | String  |    ✔    | Value must: **seatmap** |
| agentCode    | String  |    ✔    |                         |
| scheduleCode | String  |    ✔    |                         |
| date         | Date    |    ✔    |                         |
| scheduleId   | Numeric |    ✔    |                         |
| seatLayout   | Numeric |    ✔    |                         |


##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "msg": "Sukses",
            "result": {
                "layout_rows": 5,
                "layout_cols": 3,
                "seat_type_code": "P = Penumpang, K = Kosong, S = Sopir",
                "seat": [
                    {
                        "seat_row": 1,
                        "seat_col": 1,
                        "seat_no": "1",
                        "seat_type": "P",
                        "seat_available": "yes",
                        "seat_is_promo": "no",
                        "seat_promo_kode": "",
                        "seat_promo_potongan": ""
                    },
                    {
                        "seat_row": 1,
                        "seat_col": 2,
                        "seat_no": "",
                        "seat_type": "K",
                        "seat_available": "no",
                        "seat_is_promo": "no",
                        "seat_promo_kode": null,
                        "seat_promo_potongan": null
                    },
                    {
                        "seat_row": 1,
                        "seat_col": 3,
                        "seat_no": "",
                        "seat_type": "S",
                        "seat_available": "no",
                        "seat_is_promo": "no",
                        "seat_promo_kode": null,
                        "seat_promo_potongan": null
                    }
                ]
            }
        }
    }
}
```

#### BOOKING

**Params**

| Key             | Type    | Require | Note                    |
| --------------- | ------- | :-----: | ----------------------- |
| action          | String  |    ✔    | Value must: **booking** |
| agentCode       | String  |    ✔    |                         |
| scheduleCode    | String  |    ✔    |                         |
| date            | Date    |    ✔    |                         |
| customerName    | String  |    ✔    |                         |
| customerAddress | String  |    ✔    |                         |
| customerPhone   | Numeric |    ✔    |                         |
| customerEmail   | String  |    ✔    |                         |
| customerCount   | Numeric |    ✔    |                         |
| seatNo          | Numeric |    ✔    |                         |
| passangerName   | String  |    ✔    |                         |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "message": "Sukses",
            "status": "BOOK",
            "kodeBooking": "BQYXXYXV",
            "agen": "Day Trans",
            "hargaTiket": 65000,
            "totalHarga": 130000,
            "fee": 9000,
            "cabangAsal": "Thamrin City",
            "cabangTujuan": "Dipatiukur",
            "kotaAsal": "Jakarta",
            "kotaTujuan": "Bandung",
            "tanggalBerangkat": "2016-02-09",
            "jamBerangkat": "07:00",
            "waktuPesan": "2019-02-07 13:31:31",
            "timeLimit": "2019-02-07 15:31:31",
            "namaPemesan": "Nama Pemesan",
            "alamatPemesan": "Jogja",
            "emailPemesan": "email@email.com",
            "telpPemesan": "0274485636",
            "penumpang": [
                {
                    "nama": "Penumpang 1",
                    "nomorKursi": "2",
                    "nomorTiket": "TMB91B0F0TTX"
                },
                {
                    "nama": "Penumpang 2",
                    "nomorKursi": "3",
                    "nomorTiket": "TMB22C14BTTX"
                }
            ]
        }
    }
}
```

#### PAYMENT

**Params**

| Key         | Type    | Require | Note                    |
| ----------- | ------- | :-----: | ----------------------- |
| action      | String  |    ✔    | Value must: **payment** |
| bookingCode | String  |    ✔    |                         |
| totalPrice  | Numeric |    ✔    |                         |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "message": "Sukses",
            "status": "ISSUED",
            "kodeBooking": "BQYXXYXV",
            "agen": "Day Trans",
            "hargaTiket": 65000,
            "totalHarga": "130000",
            "biayaAdmin": 0,
            "fee": 9000,
            "cabangAsal": "Thamrin City",
            "cabangTujuan": "Dipatiukur",
            "kotaAsal": "Jakarta",
            "kotaTujuan": "Bandung",
            "tanggalBerangkat": "2016-02-09",
            "jamBerangkat": "07:00",
            "waktuPesan": "2019-02-07 13:31:31",
            "timeLimit": "2019-02-07 15:31:31",
            "namaPemesan": "Nama Pemesan",
            "alamatPemesan": "Jogja",
            "emailPemesan": "email@email.com",
            "telpPemesan": "0274485636",
            "penumpang": [
                {
                    "nama": "Penumpang 1",
                    "nomorKursi": "2",
                    "nomorTiket": "TMB91B0F0TTX"
                },
                {
                    "nama": "Penumpang 2",
                    "nomorKursi": "3",
                    "nomorTiket": "TMB22C14BTTX"
                }
            ],
            "otp": "293598",
            "noreff": "90b9407e2fd59fa5d306b2056609633f562f9a99",
            "tiketPdf": "JVBERi0xLjMKMyAwIG9iago8PC9UeXBlIC9QYWdlCi9QYXJlbnQgMSAwIFIKL1Jlc291cmNlcyAyIDAgUgovQ29udGVudHMgNCAwIFI+PgplbmRvYmoKNCAwIG9iago8PC9GaWx0ZXIgL0ZsYXRlRGVjb2RlIC9MZW5ndGggMTAzOT4+CnN0cmVhbQp4nK1X33ObRhB+11+xj+1Mc73fx/EUKZFbW4nsOKS1H3FNVGxLqARNJ/9990AyJxMwgs54sM2x33773d7eLoeLCSXKwL/4i1IKq4lghAVgNCeKAyfcwhseEKEgT+DrREii2WEVv5RHq5ISIdpXBTGqfTXoslXU89tgpbRn21y1xOhWZC09W0GkOF4NiKWtqwbfmFa/Rnu2Db8B82wbyEGnGhbV4K1+rSRUtSIzSrtoMSoIs63YjGrPdROcsU5rJj3rpm9mPesmONdeYE1r97ds942JbdoFZ0J71k1wEXRJzqTstJam07fincwxvW178jN8r9szmGlDeMd+a0tk+3mnJNAG/Ge+mswi+PWMAeNYMiD6CvNo8g+uCqqPnvkK8EuORcHi8bMoIH59Dz9F54t5BPMP80V0fbk8X/wM0QNiwKcDsK1xKyomUC4GhZugAniDWcRMyQ/a/YoqE40ikpVu3ydFnD7BVbJOvsWbeNNwG/QJZw/LGQlUCbvI7hOYZdljulmF8AKUN0Qqi6wHhOcJ5XdAs0+3Nze3N380IHrx4pQRjjIrQaioZI43q1X8dOA2LFxuOGHChw2BGjhL7vJdnKfOrQUmQsHwZxxzyYi2pYtlvI7H0a2xQnBoh10fx1DgS12iTp8QtBjHsUYL4SJbPbwM+URyWDspr+TLIEqetuPY1XC44dxIGSgt9DiK1BBd5fp8jUdxHMEaLITEwb0tn+SvbD2KpbblRfB8tC+jq1FEPbwQuBXKBq8XPG2MKwsDCp7Gcr9P/eeCt9mtt3GjAvSUZQ+L7RmrCh4jNVC7mVQuuz2zq/nyy8er6fI3YH3s927xVg6q8s1PcVub1W55D9mZIVYNkp0G7ltP9kVyl+So+mNcDK07Lgpkg5efqXb0couQRZYPS0jX4uA/Hl4I76e3EF1Pl58HMsTrCxsKD/L51jkEP/CateUYcsSV2qN7Z2Ax2otqJJH7xMzSTdG5XSfqW0OHEP0dr/N0A+/S4vs4iWvUi3j9f8nrU6UmRMs/z2ejdNU4PjBP12j3sBsraI2JCZtu4yLdPe5eHoIT5awxl9k6y2Gxy7+l48T0afJfxOvlRuHUwAeVG4VzuDwqN7/H+WpgB7GHdJ2q9RSJ0sek6FNzmQqIkU2AF5J2EMB95oEPUEbTnwE2J+6q9QA+7+4gyop4YJOxlwRHZVMdj+jjzLIZPaNRdHOKJjUC76UEDkuG+WbXWwJaubGhnxCcSDncvopbBvYwNGHcnL9jcnZa3B6COCFuz2xQ3K/Yn3QorHV9lNSamP085dLph+esZ1JJbOrsEaQjyQQdz1LhlFsN17M0/h7D9H6dDiy6inJ3J3iQjuVIfljoqPZUnCHJgV3MQcUa8ocq/gd9PZ1CCmVuZHN0cmVhbQplbmRvYmoKMSAwIG9iago8PC9UeXBlIC9QYWdlcwovS2lkcyBbMyAwIFIgXQovQ291bnQgMQovTWVkaWFCb3ggWzAgMCA1OTUuMjggODQxLjg5XQo+PgplbmRvYmoKNSAwIG9iago8PC9UeXBlIC9Gb250Ci9CYXNlRm9udCAvSGVsdmV0aWNhCi9TdWJ0eXBlIC9UeXBlMQovRW5jb2RpbmcgL1dpbkFuc2lFbmNvZGluZwo+PgplbmRvYmoKNiAwIG9iago8PC9UeXBlIC9Gb250Ci9CYXNlRm9udCAvSGVsdmV0aWNhLUJvbGQKL1N1YnR5cGUgL1R5cGUxCi9FbmNvZGluZyAvV2luQW5zaUVuY29kaW5nCj4+CmVuZG9iagoyIDAgb2JqCjw8Ci9Qcm9jU2V0IFsvUERGIC9UZXh0IC9JbWFnZUIgL0ltYWdlQyAvSW1hZ2VJXQovRm9udCA8PAovRjEgNSAwIFIKL0YyIDYgMCBSCj4+Ci9YT2JqZWN0IDw8Cj4+Cj4+CmVuZG9iago3IDAgb2JqCjw8Ci9Qcm9kdWNlciAoRlBERiAxLjcpCi9DcmVhdGlvbkRhdGUgKEQ6MjAxOTAyMDcxMzM0MTgpCj4+CmVuZG9iago4IDAgb2JqCjw8Ci9UeXBlIC9DYXRhbG9nCi9QYWdlcyAxIDAgUgo+PgplbmRvYmoKeHJlZgowIDkKMDAwMDAwMDAwMCA2NTUzNSBmIAowMDAwMDAxMTk3IDAwMDAwIG4gCjAwMDAwMDE0ODEgMDAwMDAgbiAKMDAwMDAwMDAwOSAwMDAwMCBuIAowMDAwMDAwMDg3IDAwMDAwIG4gCjAwMDAwMDEyODQgMDAwMDAgbiAKMDAwMDAwMTM4MCAwMDAwMCBuIAowMDAwMDAxNTk1IDAwMDAwIG4gCjAwMDAwMDE2NzAgMDAwMDAgbiAKdHJhaWxlcgo8PAovU2l6ZSA5Ci9Sb290IDggMCBSCi9JbmZvIDcgMCBSCj4+CnN0YXJ0eHJlZgoxNzE5CiUlRU9GCg=="
        }
    }
}
```

#### CHECK

**Params**

| Key         | Type   | Require | Note                  |
| ----------- | ------ | :-----: | --------------------- |
| action      | String |    ✔    | Value must: **check** |
| bookingCode | String |    ✔    |                       |

##### Success Response

Code: `200`

```
{
    "code": 200,
    "description": "Ok",
    "response": {
        "results": {
            "errCode": "00",
            "message": "Sukses",
            "status": "ISSUED",
            "kodeBooking": "QYBGBXGF",
            "agen": "Day Trans",
            "hargaTiket": 65000,
            "totalHarga": "130000",
            "biayaAdmin": 0,
            "fee": 9000,
            "cabangAsal": "Thamrin City",
            "cabangTujuan": "Dipatiukur",
            "kotaAsal": "Jakarta",
            "kotaTujuan": "Bandung",
            "tanggalBerangkat": "2016-02-09",
            "jamBerangkat": "07:00",
            "waktuPesan": "2019-02-06 16:11:10",
            "timeLimit": "2019-02-06 18:11:10",
            "namaPemesan": "Nama Pemesan",
            "alamatPemesan": "Jogja",
            "emailPemesan": "email@email.com",
            "telpPemesan": "0274485636",
            "penumpang": [
                {
                    "nama": "Penumpang 1",
                    "nomorKursi": "2",
                    "nomorTiket": "TMB91B0F0TTX"
                },
                {
                    "nama": "Penumpang 2",
                    "nomorKursi": "3",
                    "nomorTiket": "TMB22C14BTTX"
                }
            ],
            "otp": "293598",
            "noreff": "90b9407e2fd59fa5d306b2056609633f562f9a99",
            "tiketPdf": "JVBERi0xLjMKMyAwIG9iago8PC9UeXBlIC9QYWdlCi9QYXJlbnQgMSAwIFIKL1Jlc291cmNlcyAyIDAgUgovQ29udGVudHMgNCAwIFI+PgplbmRvYmoKNCAwIG9iago8PC9GaWx0ZXIgL0ZsYXRlRGVjb2RlIC9MZW5ndGggMTA0NT4+CnN0cmVhbQp4nK1YTXPbNhC961fg2M40KBbf4KliIru2Etlx2GlypGtGpW2JLiNNJ/++C1IyITOUKbIXeszlvn37sLsAxMnlhFFlyL/4hzFGlhMBFCwxmlPFCafckTfcUqFImZGvEyGphr0Vv5QHVsmoEN1WQY3qRJYmiNvyVUCN3lsFleLQqoO4Latm1LHOuFoe46xt4NuyGoxluq0q4NyKayHwbVvlsbjWHYvrJGWq22qp5p1WYEfFAqYD75bSAPiqexEBjioC4Ci4bjPnR5lzE3i3zVjXplszEFhCsju25Mc0BSkDb+kb6sCseGBueytsqu4SBKxuB93U8L3uLn7QhvLuSgLtghVrgTNqtSHhs1xO4oT8egYEUBJGkq9klkz+Qatg+uBZLgl+yXEmOFxzX3b49R35KbmYzxIyez+bJzdXi4v5zyS5RwzycQ/sGtyairHK56CEpcqSNyApmIof6Y7rxxhWA/aghCrsu2yT5o/kOltl39J1um6FtX3S2cFyoFZVsPPiLiNxUTzk62VEXoDylkjVjA2AsJ9Qfg/08Ut8Hn8+P2tB9OLFGVCOMitBmahlTtfLZfq45zYsXW44BRHCRgSNZ9ltuU3L3Id1BHQEEAEbx1wC1a4KsUhX6Ti6DVZEPNp+1ccxFPhSV6jTRwTdjOPYoEXksljev0z5RHI4Oxmv5StIkj0+jWPXwOGCcyOlVVrocRSZobqu9dkKW3EcwQYsIpmH+6160r+K1SiW2lUbwXNrXyXXo4gGeBHhTihnXx942hg/FgYMPI3jflf6zwNvvV09pa0J0FOWHay0FOqBB7QB6naTyld34HY9W/zx4Xq6OCfQx38XFndlW49vfkrYxq0Jy3vIDoY6NUh2Zv23gezz7DYrUfWHdDN07vgskA1ufqZe0asnhNwU5bCC9Ecc/CfAi8i76ReS3EwXnwYyxO0LDxQB5POus09+4DbrqlvIAVfmDvadgcNoJ6qRVO4Ks8jXm6PLdaK+DXREkr/TVZmvydt8832cxA3qZbr6v+QNqTIToeefF/EoXbWgAIGuyfZ+O1bQBhMLNn9KN/n2YfuyCU6Us8FcFKuiJPNt+S0fJ2ZIk/8iXh83Cm8NfNC4UXgNlwfj5ve0XA48Qewg/UnVBYok+UO26TNzQVlqZBvghaRHCOA6cxsCVNn0Z4CHE7/VBgCftrckKTbpwEPGThK8C5u6PZIPsYOYnbEk+XyKJg0C76UEXpYMhG43T5Ro5a8N/YTgVMrh/nXe0v+8APu8OX8LMj4t7wBBnJB34DYo71f8T2oK5/w5SmpNze4+5cvph33Ws6gkHurcAaQnCYKNZ6nwlltfruM8/Z6S6d0qHzh0FeN+TwggPcuR/HDQMR2oGCPJgaeYvYoN5A9V/A8ljpzGCmVuZHN0cmVhbQplbmRvYmoKMSAwIG9iago8PC9UeXBlIC9QYWdlcwovS2lkcyBbMyAwIFIgXQovQ291bnQgMQovTWVkaWFCb3ggWzAgMCA1OTUuMjggODQxLjg5XQo+PgplbmRvYmoKNSAwIG9iago8PC9UeXBlIC9Gb250Ci9CYXNlRm9udCAvSGVsdmV0aWNhCi9TdWJ0eXBlIC9UeXBlMQovRW5jb2RpbmcgL1dpbkFuc2lFbmNvZGluZwo+PgplbmRvYmoKNiAwIG9iago8PC9UeXBlIC9Gb250Ci9CYXNlRm9udCAvSGVsdmV0aWNhLUJvbGQKL1N1YnR5cGUgL1R5cGUxCi9FbmNvZGluZyAvV2luQW5zaUVuY29kaW5nCj4+CmVuZG9iagoyIDAgb2JqCjw8Ci9Qcm9jU2V0IFsvUERGIC9UZXh0IC9JbWFnZUIgL0ltYWdlQyAvSW1hZ2VJXQovRm9udCA8PAovRjEgNSAwIFIKL0YyIDYgMCBSCj4+Ci9YT2JqZWN0IDw8Cj4+Cj4+CmVuZG9iago3IDAgb2JqCjw8Ci9Qcm9kdWNlciAoRlBERiAxLjcpCi9DcmVhdGlvbkRhdGUgKEQ6MjAxOTAyMDcxMzM1MzUpCj4+CmVuZG9iago4IDAgb2JqCjw8Ci9UeXBlIC9DYXRhbG9nCi9QYWdlcyAxIDAgUgo+PgplbmRvYmoKeHJlZgowIDkKMDAwMDAwMDAwMCA2NTUzNSBmIAowMDAwMDAxMjAzIDAwMDAwIG4gCjAwMDAwMDE0ODcgMDAwMDAgbiAKMDAwMDAwMDAwOSAwMDAwMCBuIAowMDAwMDAwMDg3IDAwMDAwIG4gCjAwMDAwMDEyOTAgMDAwMDAgbiAKMDAwMDAwMTM4NiAwMDAwMCBuIAowMDAwMDAxNjAxIDAwMDAwIG4gCjAwMDAwMDE2NzYgMDAwMDAgbiAKdHJhaWxlcgo8PAovU2l6ZSA5Ci9Sb290IDggMCBSCi9JbmZvIDcgMCBSCj4+CnN0YXJ0eHJlZgoxNzI1CiUlRU9GCg=="
        }
    }
}
```



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