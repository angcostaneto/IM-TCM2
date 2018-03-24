@extends('layouts.app')

@section('content')                      

<section class="form-elegant">

    <!--Form without header-->
    <div class="card">

        <div class="card-body mx-4">

            <!--Header-->
            <div class="text-center">
                <h3 class="dark-grey-text mb-5"><strong>Logar</strong></h3>
            </div>

            <!--Body-->
            <form  method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="md-form">
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                    <label for="email">E-mail</label>
                </div>

                <div class="md-form pb-3">
                    <input type="password" id="password" name="password" class="form-control">
                    <label for="password">Senha</label>
                    <p class="font-small blue-text d-flex justify-content-end">Esquece sua <a href="{{ route('password.request') }}" class="blue-text ml-1"> Senha?</a></p>
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
                </div>
            </form>
        </div>

        <!--Footer-->
        <div class="modal-footer mx-5 pt-3 mb-1">
            <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#" class="blue-text ml-1"> Sign Up</a></p>
        </div>

    </div>
    <!--/Form without header-->

</section>
            
@endsection
