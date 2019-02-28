<?php 
// Interpreta uma string XML e a transforma em um objeto (sites)
//simplexml_load_string()

// Interpreta uma string XML e a transforma em um objeto - XML de um arquivo
//$xml = simplexml_load_file('ddd');

function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
        	if( is_numeric($key) ){
                $key = 'item'.$key;
            }
            $xml_data->addChild($key, htmlspecialchars($value));
        }
     }
}

$data = array(
	"nome" => "Bonieky",
	"sobrenome" => "Lacerda",
	"idade" => 90,
	"caracteristicas" => array(
		"amigo",
		"fiel",
		"companheiro",
		"legal"
	)
);

// SimpleXMLElement - Representa um elemento em um documento XML. (Cria um novo objeto SimpleXMLElement)
$xml_data = new SimpleXMLElement('<data/>');

array_to_xml($data, $xml_data);

$result = $xml_data->asXML();
echo $result;