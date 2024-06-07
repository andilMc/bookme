<?php

namespace src\controllers;

use core\sql\QueryBuilder;
use core\sql\SqlRequest;
use core\template\View;
use core\tools\Crypto;
use src\models\Client;
use src\models\User;
use WpOrg\Requests\Requests;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use src\models\Car;
use src\models\CarAgency;
use src\models\Hotel;
use src\models\Request;
use src\models\Room;

class AccessController
{

    /**
     * @Methode("GET")
     */
    function cltLogin($msg = null)
    {
        $css = [
            "clt-login"
        ];
        $crypt = new Crypto();

        if ($msg != null) {
            $msg = $crypt->string_decrypt($msg);
        }

        View::render("login-front", ["style" => $css, "accessMsg" => $msg]);
    }

    /**
     * @Methode('GET')
     */
    function cltLogup($msg = null)
    {
        $css = [
            "clt-login"
        ];
        View::render("logup-front", ["style" => $css, "msg" => $msg]);
    }


    /**
     * @Methode('POST')
     */
    function cltRegister($fullname, $phone, $email, $password1, $password2)
    {

        if (strlen($password1) >= 6) {
            if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
                $q = new QueryBuilder();
                $p_hash = password_hash($password1, PASSWORD_DEFAULT);
                $codeClt = $this->Code("CLT");
                $rep = $q->table("user")->insert([
                    "fullName" => $fullname,
                    "phoneNumber" => $phone,
                    "email" => $email,
                    "password" => $p_hash,
                    "codeUser" => $codeClt
                ]);
                if ($rep) {
                    $last_id = $rep;
                    try {
                        $this->sendMail($fullname, $codeClt, $email);
                        $drills = [
                            "style" => "clt-login",
                            "email" => $email
                        ];
                        View::render("registerInfo", $drills);
                    } catch (\Throwable $th) {
                        $q->table("user")->where("idUser=$last_id")->delete();
                        echo "Somting went wrong";
                    }
                }
            } else {
                $crypt = new Crypto();
                $msg = $crypt->string_crypt("This is not email, It should be like \"example@exmaple.example\"");
                header("Location:/logup?msg=$msg");
            }
        } else {
            $crypt = new Crypto();
            $msg = $crypt->string_crypt("The Password must have 6 or more charcter");
            header("Location:/logup?msg=$msg");
        }
    }


    public function generateRandomPart()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomPart = '';
        $length = 6;

        for ($i = 0; $i < $length; $i++) {
            $randomPart .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $randomPart;
    }


    function codeExistsInDatabase($code, $forWho)
    {
        $q = new SqlRequest();
        switch ($forWho) {
            case 'CR':
                $instances = $q->selectAll(new Car());
                foreach ($instances as $instance) {
                    $c = $instance->getCodeCar();
                    if ($c === $code) {
                        return true;
                    }
                }
                break;
            case 'CLT':
                $instances = $q->selectAll(new User());
                foreach ($instances as $instance) {
                    $c = $instance->getCodeUser();
                    if ($c === $code) {
                        return true;
                    }
                }
                break;
            case 'rm':
                $instances = $q->selectAll(new Room());
                foreach ($instances as $instance) {
                    $c = $instance->getCodeRoom();
                    if ($c === $code) {
                        return true;
                    }
                }
                break;
            case 'HTL':
                $instances = $q->selectAll(new Hotel());
                foreach ($instances as $instance) {
                    $c = $instance->getCodeHotel();
                    if ($c === $code) {
                        return true;
                    }
                }
                break;
            case 'CRA':
                $instances = $q->selectAll(new CarAgency());
                foreach ($instances as $instance) {
                    $c = $instance->getCodeCarAgency();
                    if ($c === $code) {
                        return true;
                    }
                }
                break;
            case 'RQST':
                $instances = $q->selectAll(new Request());
                foreach ($instances as $instance) {
                    $c = $instance->getCodeRequest();
                    if ($c === $code) {
                        return true;
                    }
                }
                break;

            default:
                return false;
                break;
        }
    }

    function Code($forWho)
    {
        $randomPart = $this->generateRandomPart();
        $uniqueCode = $forWho . $randomPart;

        while ($this->codeExistsInDatabase($uniqueCode, $forWho)) {
            $randomPart = $this->generateRandomPart();
            $uniqueCode = $forWho . $randomPart;
        }
        return $uniqueCode;
    }



    public function sendMail($fullname, $id, $email)
    {

        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = mail["Host"];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   =  mail["Username"];                     //SMTP username
        $mail->Password   =  mail["Password"];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mcdev98@gmail.com', 'Bookme');
        $mail->addAddress($email, $fullname);     //Add a recipient


        //Content
        $logo = '<svg width="50px" viewBox="0 0 431 440" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M222 -0.000244141C150.203 -0.000244141 92 58.2027 92 130V260H222C293.797 260 352 201.797 352 130C352 58.2027 293.797 -0.000244141 222 -0.000244141ZM222 79.9998C194.386 79.9998 172 102.386 172 130V180H222C249.614 180 272 157.614 272 130C272 102.386 249.614 79.9998 222 79.9998Z" fill="#23A1DB"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M431 310C431 238.203 372.797 180 301 180H171V310C171 381.797 229.203 440 301 440C372.797 440 431 381.797 431 310ZM351 310C351 282.386 328.614 260 301 260H251V310C251 337.614 273.386 360 301 360C328.614 360 351 337.614 351 310Z" fill="#2B638E"/>
            <path d="M156.077 317.984C158.069 309.484 156.812 300.547 152.553 292.926C148.295 285.306 141.342 279.552 133.059 276.793C124.777 274.035 115.762 274.471 107.785 278.017C99.8075 281.562 93.4431 287.961 89.9406 295.957C86.438 303.954 86.0502 312.97 88.8533 321.238C91.6563 329.506 97.4478 336.427 105.091 340.645C112.735 344.862 121.678 346.071 130.167 344.034C138.656 341.997 146.077 336.861 150.974 329.634L134.715 318.616C132.566 321.787 129.309 324.041 125.584 324.935C121.859 325.829 117.934 325.298 114.58 323.448C111.226 321.597 108.684 318.56 107.454 314.932C106.224 311.304 106.394 307.347 107.931 303.838C109.469 300.329 112.261 297.521 115.762 295.965C119.263 294.409 123.218 294.218 126.853 295.428C130.488 296.638 133.539 299.164 135.407 302.508C135.679 302.994 135.923 303.492 136.139 304H120C120 311.732 126.268 318 134 318H156V317.966L156.077 317.984Z" fill="#23A1DB"/>
            <path d="M58 322C58 334.703 68.2975 345 81 345L81 298C81 285.297 70.7025 275 58 275L58 322Z" fill="#23A1DB"/>
            <path d="M52 345C39.2974 345 29 334.703 29 322L29 275C41.7026 275 52 285.297 52 298L52 345Z" fill="#23A1DB"/>
            <path d="M0 322C-2.01072e-06 334.703 10.2974 345 23 345L23 298C23 285.297 12.7026 275 4.10887e-06 275L0 322Z" fill="#23A1DB"/>
            <circle cx="301" cy="310" r="35" fill="#A5D1B0"/>
            </svg>';
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmation Mail from Bookme';
        $mail->Body    = "
            <div style='padding:30px'>
            $logo
            <h2> Confirmation </h2>
            <p>
               🥳😇 Hello Mr $fullname !<br>
                You account is created , just click the link bellow to confirm your registration.
                <br>
                <br>
                <a style=\"
                text-decoration:none;
                font-weight:bold;
                background-color:#23A1DB;
                color:white;
                padding:20px;
                border-radius: 10px;
                 \" href=\"" . base_url . "/verify/$id\"> Confirmation </a>
            </p>
            </div>
            ";
        $mail->send();
    }

    /**
     * @Methode('GET')
     */
    public function verify($vfy)
    {
        $id = $vfy;
        $sql = new SqlRequest();
        $usr = $sql->selectBy(new User(), "codeUser='$id'");
        $usr[0]->setVerified(1);
        if ($sql->update($usr[0], "codeUser='$id'")) {
            $drills = [
                "style" => "clt-login",
                "js" => "Controllers/stopwatch"
            ];
            View::render("logupValid", $drills);
        } else {
            echo "<h2> ⚠ ⚠ ⚠ An error occured before your account is verified </h2>";
        }
    }


    /**
     * @Methode("POST")
     */
    function cltSignIn($email, $password)
    {
        session_start();
        $q = new QueryBuilder();
        $users = $q->select("*")->table("user")->where("email='$email'")->get();
        if (count($users)) {
            foreach ($users as $user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["auth_usr"] = $user;
                    $_SESSION["authenticated"] = 1;
                    if ($user["admin"] == 1 || $user["carRentalAgent"] == 1 || $user["hotelMnger"] == 1) {
                        header("Location:" . base_url . "/dashboard");
                    } else {
                        header("Location:" . base_url . "/");
                    }
                } else {
                    $crypt = new Crypto();
                    $msg = $crypt->string_crypt("Wrong Password ");
                    header("Location:" . base_url . "/login?msg=$msg");
                }
            }
        } else {
            $crypt = new Crypto();
            $msg = $crypt->string_crypt("Unknown Email ");
            header("Location:" . base_url . "/login?msg=$msg");
        }
    }


    public function cltLogout()
    {
        if (session_start()) {
            session_destroy();
            header("Location:" . base_url . "/login");
        }
    }
}
