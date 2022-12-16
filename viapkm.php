<?php
    $url = "https://www.canalti.com.br/api/pokemons.json";
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    $pokemon = json_decode(curl_exec($ch));

    if(count($pokemon->pokemon)) {
        $i = 0;
        foreach($pokemon->pokemon as $pokemon) { 
            
            echo "
            <link rel=\"stylesheet\" href=\"styles.css\">
            <center>
            <font>
            <div class=\"content6\">    
            
            <div class=\"card\">
              <div class=\"card-image has-text-centered\">
                <figure class=\"image is-1024x1024\">
                  <img src=\"$pokemon->img\" alt=\"=$pokemon->name\" class=\"\" data-target=\"modal-image2\">
                </figure>
            </div>
             
            $pokemon->name (Nº $pokemon->num)<br><br>

            Height: $pokemon->height <br>
            Weigth: $pokemon->weight <br><br>

            ";

            if (property_exists($pokemon, "type")) {
              $deps = $pokemon->type;
              echo "Tipo: <br/>";
              foreach ( $deps as $d ) echo "- $d<br/>";
            };

            echo "
            </div>
            </center>
            <br>
            
            ";
        }
    }
?>