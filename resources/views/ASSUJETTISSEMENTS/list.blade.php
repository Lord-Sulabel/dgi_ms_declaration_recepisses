    @extends('layouts.public2')


    @section('content')
    
        <div class="container">
            <br/>
            <div>ASSUJETTISSEMENTS</div>
            <table style="width:100%; font-size: 12px; font-size: 12px;">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Nif</td>
                        <td>Impot</td>
                    </tr>
                </thead>
                <?php
            
                for($i=0; $i<sizeof($response);$i++){
                    $ob1 = $response[$i];
                    ?>
                    <tr>
                        <td>{{ $ob1->id }}</td>
                        <td>{{ $ob1->nif }}</td>
                        <td>{{ $ob1->fk_impot }}</td>
                    </tr>
                    <?php
                        
                }
                ?>
            </table>

            <br/>
            <br/>
            
        </div>
    </div>
    @endsection