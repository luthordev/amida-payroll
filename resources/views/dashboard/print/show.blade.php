<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Slip Gaji {{$salary->name}} - {{$salary->bulan}} {{$salary->tahun}}</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <style>
    body {
        font: message-box;
        font-size: 24pt;
    }

    hr.line {
        border: 1px solid rgb(92, 92, 92);
    }

    table {
        border-collapse: separate;
        border-spacing: 0 5px;
    }

    @page {
        size: auto;
        margin: 2mm 10mm 0 10mm;
    }

    .list-group-item {
        border: 0;
        padding: .10rem 1.25rem;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <img src="{{ asset('image/logo.png') }}" class="mr-3" height="124" width="124" />
        <p class="mt-2 font-weight-bold">
            Kantor Pusat :</br>
            JL. Ahmad Yani No.66 Pagaden</br>
            Tlp/Fax : 0260 - 7609034</br>
            Email : amidakaryasejahtera@gmail.com
        </p>

        <hr class="line" />
        <div class="text-center">
            <b>SLIP GAJI KARYAWAN</b><br />
            <p class="text-danger">BULAN {{strtoupper($salary->bulan)}} {{$salary->tahun}}</p>
        </div>
        </br>
        <div class="row justify-content-center mb-3">
            <div class="col-6">
                <div class="container ml-1">
                    <table>
                        <tr>
                            <td>NIK</td>
                            <td><span class="ml-5">{{$salary->nik}}</span></td>
                        </tr>
                        <tr>
                            <td>NAMA</td>
                            <td><span class="ml-5">{{strtoupper($salary->name)}}</span></td>
                        </tr>
                        <tr>
                            <td>STATUS</td>
                            <td><span class="ml-5">{{strtoupper($salary->status)}}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="container ml-1">
                    <table>
                        <tr>
                            <td>DIVISI</td>
                            <td><span class="ml-5">{{strtoupper($salary->division)}}</span></td>
                        </tr>
                        <tr>
                            <td>JABATAN</td>
                            <td><span class="ml-5">{{strtoupper($salary->position)}}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item"><b>PENGHASILAN</b></li>
                    @foreach($penghasilan as $name => $value)
                    <li class="list-group-item d-flex justify-content-between">
                        {{$name}}
                        <span>{{$value}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item"><b>POTONGAN</b></li>
                    @foreach($potongan as $name => $value)
                    <li class="list-group-item d-flex justify-content-between">
                        {{$name}}
                        <span>{{$value}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row justify-content-center mb-3 mt-3 mb-3">
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        Total
                        <span class="font-weight-bold">@money($total_penghasilan)</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        Diteirma
                        <span class="font-weight-bold text-danger">@money($penghasilan_bersih)</span>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <li class="list-group-item d-flex justify-content-between">
                    Total
                    <span class="font-weight-bold">@money($total_potongan)</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    Transfer Ke Bank
                    <span class="font-weight-bold">{{$salary->bank}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    No Rekening
                    <span>{{$salary->no_bank_account}}</span>
                </li>
            </div>
        </div>
        </br>
        <div class="row justify-content-center mb-3 mt-5">
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3 float-right">
                <li class="list-group-item d-flex">
                    Manager,
                </li>
                <li class="list-group-item d-flex">
                    <img src="{{ asset('image/signature.png') }}" class="mr-3" height="72" width="auto" />
                </li>
                <li class="list-group-item d-flex">
                    Ida Siti Chodijah,SKM
                </li>
            </div>
        </div>


    </div>
</body>

</html>