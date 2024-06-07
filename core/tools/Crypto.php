<?php
namespace core\tools;
class Crypto
{
    function string_crypt(string $text, $encryption_iv = '1234567891011121', $encryption_key = "mc405nas407insoim406cse")
    {
        $ciphering = "AES-256-CBC";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $encryption = openssl_encrypt($text, $ciphering, $encryption_key, $options, $encryption_iv, $iv_length);

        return $encryption;
    }


    function string_decrypt(string $encryptied_text, $decryption_iv = '1234567891011121', $decryption_key = "mc405nas407insoim406cse")
    {
        $encryptied_text = (strrchr($encryptied_text, " ")) ? str_replace(" ", "+", $encryptied_text) : $encryptied_text;;
        $ciphering = "AES-256-CBC";
        $options = 0;


        // Using openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt($encryptied_text, $ciphering, $decryption_key, $options, $decryption_iv);

        // Displaying the decrypted string
        return $decryption;
    }
}
