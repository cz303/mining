<?php



define('JAMALANG', 'EN');





$Vyrkodvljby0 = array();



define('PolymorphicArgumentException', -1);
$Vyrkodvljby0['EN'][PolymorphicArgumentException] = "Invalid argument pattern for polymorphic function.";
$Vyrkodvljby0['FR'][PolymorphicArgumentException] = "Modèle inadmissible d'argument pour la fonction polymorphe.".
$Vyrkodvljby0['DE'][PolymorphicArgumentException] = "Unzulässiges Argumentmuster für polymorphe Funktion.";

define('ArgumentTypeException', -2);
$Vyrkodvljby0['EN'][ArgumentTypeException] = "Invalid argument type.";
$Vyrkodvljby0['FR'][ArgumentTypeException] = "Type inadmissible d'argument.";
$Vyrkodvljby0['DE'][ArgumentTypeException] = "Unzulässige Argumentart.";

define('ArgumentBoundsException', -3);
$Vyrkodvljby0['EN'][ArgumentBoundsException] = "Invalid argument range.";
$Vyrkodvljby0['FR'][ArgumentBoundsException] = "Gamme inadmissible d'argument.";
$Vyrkodvljby0['DE'][ArgumentBoundsException] = "Unzulässige Argumentstrecke.";

define('MatrixDimensionException', -4);
$Vyrkodvljby0['EN'][MatrixDimensionException] = "Matrix dimensions are not equal.";
$Vyrkodvljby0['FR'][MatrixDimensionException] = "Les dimensions de Matrix ne sont pas égales.";
$Vyrkodvljby0['DE'][MatrixDimensionException] = "Matrixmaße sind nicht gleich.";

define('PrecisionLossException', -5);
$Vyrkodvljby0['EN'][PrecisionLossException] = "Significant precision loss detected.";
$Vyrkodvljby0['FR'][PrecisionLossException] = "Perte significative de précision détectée.";
$Vyrkodvljby0['DE'][PrecisionLossException] = "Bedeutender Präzision Verlust ermittelte.";

define('MatrixSPDException', -6);
$Vyrkodvljby0['EN'][MatrixSPDException] = "Can only perform operation on symmetric positive definite matrix.";
$Vyrkodvljby0['FR'][MatrixSPDException] = "Perte significative de précision détectée.";
$Vyrkodvljby0['DE'][MatrixSPDException] = "Bedeutender Präzision Verlust ermittelte.";

define('MatrixSingularException', -7);
$Vyrkodvljby0['EN'][MatrixSingularException] = "Can only perform operation on singular matrix.";

define('MatrixRankException', -8);
$Vyrkodvljby0['EN'][MatrixRankException] = "Can only perform operation on full-rank matrix.";

define('ArrayLengthException', -9);
$Vyrkodvljby0['EN'][ArrayLengthException] = "Array length must be a multiple of m.";

define('RowLengthException', -10);
$Vyrkodvljby0['EN'][RowLengthException] = "All rows must have the same length.";


function JAMAError($Vyrkodvljby0Number = null) {
	global $Vyrkodvljby0;

	if (isset($Vyrkodvljby0Number)) {
		if (isset($Vyrkodvljby0[JAMALANG][$Vyrkodvljby0Number])) {
			return $Vyrkodvljby0[JAMALANG][$Vyrkodvljby0Number];
		} else {
			return $Vyrkodvljby0['EN'][$Vyrkodvljby0Number];
		}
	} else {
		return ("Invalid argument to JAMAError()");
	}
}
