@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                    <div class="panel-heading">
                        Ranking
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $ranking=1;
                                @endphp
                                @foreach(ranking5besar() as $siswa)

                                <tr>
                                    <td>{{$ranking}}</td>
                                    <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_lengkap()}}</a></td>

                                    <td>{{$siswa->RataRataNilai()}}</td>

                                </tr>
                                @php
                                $ranking++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div></div>
            </div>
        </div>
    </div>
</div>
@stop