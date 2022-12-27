    @extends('layouts.public2')


    @section('content')

        <div class="container">
            <br/>
            <div>IMPOTS</div>
            <br/>
            <table style="width:100%; font-size: 12px; font-size: 12px;">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Dénomination</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <?php
            
                for($i=0; $i<sizeof($response);$i++){
                    $ob1 = $response[$i];
                    ?>
                    <tr>
                        <td>{{ $ob1->id }}</td>
                        <td>{{ $ob1->denomination }}</td>
                        <td>{{ $ob1->description }}</td>
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