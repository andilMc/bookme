<?php
namespace src\models\utils;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\CustomerAddressType;
use net\authorize\api\contract\v1\CustomerDataType;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\contract\v1\OrderType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\contract\v1\SettingType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\contract\v1\UserFieldType;
use net\authorize\api\controller\CreateTransactionController;
class Transaction 
{
    static function transaction($userCode,$email,$numCard, $clientAddress , $clientCity ,$clientState ,$clientZip, $cardHolderName,$exp,$cvc,$description="Transaction in bookme app"){
        try {
            error_reporting(E_ALL & ~E_DEPRECATED);
            $merchantAuthentication = new MerchantAuthenticationType();
            $merchantAuthentication->setName(LOGIN_ID);
            $merchantAuthentication->setTransactionKey(TRANSACTION_KEY);
    
            // define("AUTHORIZENET_LOG_FILE", "phplog");
            // Set the transaction's refId
            $refId = 'ref' . time();
    
            $creditCard = new CreditCardType();
            $creditCard->setCardNumber($numCard);
            // $creditCard->setExpirationDate("12/38");
            $creditCard->setExpirationDate($exp);
            $creditCard->setCardCode($cvc);
    
            // Add the payment data to a paymentType object
            $paymentOne = new PaymentType();
            $paymentOne->setCreditCard($creditCard);
    
            // Create order information
            $order = new OrderType();
            $order->setInvoiceNumber("10101");
            $order->setDescription($description);
    
            // Set the customer's Bill To address
            $customerAddress = new CustomerAddressType();
            $customerAddress->setFirstName($cardHolderName);
            $customerAddress->setAddress($clientAddress);
            $customerAddress->setCity($clientCity);
            $customerAddress->setState($clientState);
            $customerAddress->setZip($clientZip);
    
            // Set the customer's identifying information
            $customerData = new CustomerDataType();
            $customerData->setType("individual");
            $customerData->setId($userCode);
            $customerData->setEmail($email);
    
            // Add values for transaction settings
            $duplicateWindowSetting = new SettingType();
            $duplicateWindowSetting->setSettingName("duplicateWindow");
            $duplicateWindowSetting->setSettingValue("60");
    
            // Add some merchant defined fields. These fields won't be stored with the transaction,
            // but will be echoed back in the response.
            $merchantDefinedField1 = new UserFieldType();
            $merchantDefinedField1->setName("customerLoyaltyNum");
            $merchantDefinedField1->setValue("1128836273");
    
            $merchantDefinedField2 = new UserFieldType();
            $merchantDefinedField2->setName("favoriteColor");
            $merchantDefinedField2->setValue("blue");
    
            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new TransactionRequestType();
            $transactionRequestType->setTransactionType("authOnlyTransaction");
            $transactionRequestType->setAmount(23.4);
            $transactionRequestType->setOrder($order);
            $transactionRequestType->setPayment($paymentOne);
            $transactionRequestType->setBillTo($customerAddress);
            $transactionRequestType->setCustomer($customerData);
            $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
            $transactionRequestType->addToUserFields($merchantDefinedField1);
            $transactionRequestType->addToUserFields($merchantDefinedField2);
    
            // Assemble the complete transaction request
            $request = new CreateTransactionRequest();
            $request->setMerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);
    
            // Create the controller and get the response
            $controller = new CreateTransactionController($request);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
            if ($response != null) {
                // Check to see if the API request was successfully received and acted upon
                if ($response->getMessages()->getResultCode() == "Ok") {
                    // Since the API request was successful, look for a transaction response
                    // and parse it to display the results of authorizing the card
                    $tresponse = $response->getTransactionResponse();
                    if ($tresponse != null && $tresponse->getMessages() != null) {
                        // echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                        // echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                        // echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                        // echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                        // echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                        error_reporting(E_ALL);
                        return true;
                    } else {
                        error_reporting(E_ALL);
                       return false;
                    }
                    // Or, print errors if the API request wasn't successful
                } else {
                    error_reporting(E_ALL);
                    return false;
                }
            } else {
                error_reporting(E_ALL);
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
       
        
    }
}
