<?php
error_reporting(0);
require_once("./rc4.php"); // Verifica que rc4.php esté en el mismo directorio y funcionando
$ciphertext = "CU01h+7UmzsFXA+LAscdtQRrcxssJhs=";
$decodedCiphertext = base64_decode($ciphertext);
$fp = fopen("/usr/share/wordlists/rockyou.txt", "r");

if (!$fp) {
    die("No se pudo abrir el archivo rockyou.txt\n");
}

while (!feof($fp)) {
    $key = trim(fgets($fp));
    if (empty($key)) continue; // Omite claves vacías
    
    // Descifra con RC4
    $decryptedText = rc4($key, $decodedCiphertext);

    // Imprime la clave y el resultado (para depuración)
    echo "Probando clave: $key\n";

    // Verifica si contiene "flag"
    if (strpos($decryptedText, "flag") !== false) {
        echo "Clave encontrada: " . $key . "\n";
        echo "Texto descifrado: " . $decryptedText . "\n";
        break;
    }
}

fclose($fp);
?>


