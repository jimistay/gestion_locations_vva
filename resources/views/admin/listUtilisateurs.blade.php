<link rel="stylesheet" href="../../css/list_user.css">
@extends('menu')
<div class="main">
    <h1>Voici tous les utilisateurs</h1>
    <div class="users">
        <h2>Voici tous les vacanciers</h2>
        @foreach($users as $vac)
            @if($vac->TYPECOMPTE == 'vac')
                <table>
                    <tr>
                        <td>{{$vac->email}}</td>
                        <td>{{$vac->password}}</td>
                        <td>{{$vac->name}}</td>
                    </tr>
                </table>
            @endif
        @endforeach
    </div>
    <div class="gestionnaires">
        <h2>Voici tous gestionnaires</h2>
        @foreach($users as $ges)
            @if($ges->TYPECOMPTE == 'ges')
                <table>
                    <tr>
                        <td>{{$ges->email}}</td>
                        <td>{{$ges->password}}</td>
                        <td>{{$ges->name}}</td>
                    </tr>
                </table>
            @endif
        @endforeach
    </div>

</div>

