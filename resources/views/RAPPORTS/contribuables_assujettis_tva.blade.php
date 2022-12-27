    @extends('layouts.public2')


    @section('content')
    <?php
        $months = array("janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");

    ?>
        <div class="container">
            <br/>
            <div>CONTRIBUABLE ASSUJETTIS</div>

            <br/> 
            <table style="width: 100%; font-size:11px;">
                <tr>
                    <td height="25" class="bt br">LIBELLE</td>
                    <?php
                        for($i=0; $i< sizeof($months); $i++){
    
                        ?>
                        <td class="bt br center"><?php echo $months[$i]; ?></td>
                        <?php
                        }
        
    
                    ?>
                    
                </tr>
                <tr>
                    <td class="bt br" height="25"> </td>
                    <?php
                        for($i=0; $i< sizeof($months); $i++){ ?>
                        <td class="bt br">{{ $response[$i+1]  }}</td>
                    <?php
                        }
                    ?>
                </tr>
            </table>

            <br/>
            <br/>

        </div>
    </div>
    @endsection