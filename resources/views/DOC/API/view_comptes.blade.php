    @extends('layouts.public')

    @section('content')
        <div class="container">
            <br>
            <div class="font-weight-bold">Comptes</div>

            <br>
            <table class="table" style="font-size:12px;">
                <thead>
                    <tr>
                        <th scope="col">function</th>
                        <th scope="col">POST</th>
                    </tr>
                    <tr>
                        <th scope="col">method</th>
                        <th scope="col">register</th>
                    </tr>
                </thead>
            </table>



            <br>
            <br>
            <div>Paramêtres</div>

            <table class="table" style="font-size:12px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Type</th>
                        <th scope="col">Obligatoire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">x</th>
                        <td>name</td>
                        <td>String</td>
                        <td>.</td>
                    </tr>
                    <tr>
                        <th scope="row">x</th>
                        <td>email</td>
                        <td>String</td>
                        <td>.</td>
                    </tr>
                    <tr>
                        <th scope="row">x</th>
                        <td>password</td>
                        <td>String</td>
                        <td>.</td>
                    </tr>
                    <tr>
                        <th scope="row">x</th>
                        <td>c_password</td>
                        <td>String</td>
                        <td>.</td>
                    </tr>
                </tbody>
            </table>

            

        </div>
    </div>
    @endsection