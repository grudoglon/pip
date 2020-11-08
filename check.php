<?php

    $start = microtime(true);
	if (!valuesPresented()) {
		include 'templates/empty-result.html';
		return;
	 }

    $X = str_replace(",", "." , $_POST["X"]);
    $Y = str_replace(",", "." , $_POST["Y"]);
    $R = str_replace(",", "." , $_POST["R"]);



    $uniqid = $_POST['uniqid'];

    $R_VALUES = [1, 1.5, 2, 2.5, 3];

	if (!(checkX($X) && checkY($Y) && checkR($R, $R_VALUES))) {
		include_once 'templates/empty-result.html';
		return;
	}
	$hit;

        	if (
        	( ($X>=0) && ($Y>=0) && (pow($X,2)+pow($Y,2)-pow($R,2)<=0))||
            ( ($X<0) && ($Y>=0) && ((2*$Y-X-$R/2)<=0))||
            ( ($X>=0) && ($Y<0) && ($X<=$R) && ($Y>=-1*($R/2)))
        		) {
        			$hit = "Да";

        		} else {

        			$hit = "Нет";

        		}


	if(count($_POST) == 4){

	//----------------------------------------------------------------------------------------------------------------------
		echo "<table id=\"result-table\" class=\"centered\"><thead><th>Переменная</th><th>Значение</th></thead><tbody>";
	    echo "<tr><td>X</td><td id=\"result-x\">$X</td></tr>
	          <tr><td>Y</td><td id=\"result-y\">$Y</td></tr>
	          <tr><td>R</td><td id=\"result-r\">$R</td></tr>";

	    $result = "Попадание: " . $hit;
	    echo "<tr><td>Результат</td>
	    		  <td>" . $result . "</td>
	    	  </tr>";

              	    echo "<tr><td>Текущее Время: </td><td colspan=\"2\" id=\"current-time\"></td></tr>";
	    echo "</tbody></table>";
	//----------------------------------------------------------------------------------------------------------------------

		global $results;
		$results = [];

		$res = isset($_SESSION['results']) && is_array($_SESSION['results']) ? $_SESSION['results'] : [];

	   	if (!isset($res[0]) || $res[0]['uniqid'] !== $uniqid||(($res[0]['r'] !== $R)||($res[0]['x'] !== $X)||($res[0]['y']!== $Y))) {
	        array_unshift($res, [
	            'x' => $X,
	            'y' => $Y,
	            'r' => $R,
	            'result' => $result,
	            'uniqid' => $uniqid
	        ]);
	    }

		$_SESSION['results'] = $res;

	    echo "<table class=\"centered\">
		        <caption>История запросов</caption>
		        <thead>
		        	<th>X</th>
		        	<th>Y</th>
		        	<th>R</th>
		        	<th>Результат</th>
		        </thead><tbody>";
		foreach ($res as $val):
			echo "<tr>
	        		<td>{$val['x']}</td>
	        		<td>{$val['y']}</td>
				<td>{$val['r']}</td>
	        		<td>{$val['result']}</td>
	        	</tr>";
	    endforeach;
		echo "</tbody></table>";

	}

	function valuesPresented() {
		return (isset($_POST["X"]) && isset($_POST["Y"]) && isset($_POST["R"]));
	}

	function checkX($X) {
		return (is_numeric($X) && strlen($X) <= 10 && $X > -5 && $X < 3);
	}

	function checkY($Y) {
		return (is_numeric($Y) && strlen($Y) <=10 && $Y > -3 && $Y < 3);
	}

	function checkR($R, $R_VALUES) {
		return (is_numeric($R) && strlen($R) <=10 && in_array($R, $R_VALUES));
	}
echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
?>




