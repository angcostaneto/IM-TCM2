@extends ('cliente.template')

@section('content')

    <div class="row">

        <form>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary" type="button">COMPRAR</button>
                    <button class="btn btn-outline-secondary" type="button">ALUGAR</button>
                </div>
                <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="CIDADE">

                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

        </form>

    </div>

@endsection