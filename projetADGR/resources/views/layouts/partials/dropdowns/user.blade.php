<?php

//dd(Auth::user());
$user = "";
if(\Illuminate\Support\Facades\Auth::guard("benevole")->check()){
    $user = "benevole";
}else{
    $user = "donneur";
}
//dd(auth()->user());
?>
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
</a>
<ul class="dropdown-menu dropdown-user">
    <li><strong><i class="fa fa-user fa-fw"></i> {{Auth::user()->nom. " ". Auth::user()->prenom}}</strong></li>
    <li><a href="/{{$user}}/show/{{\Illuminate\Support\Facades\Auth::user()->id }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
    </li>
    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
    </li>
    <li class="divider"></li>
    <li><a href="{{route($user.".logout")}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
    </li>
</ul>