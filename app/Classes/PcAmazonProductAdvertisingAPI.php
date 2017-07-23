<?php

namespace App\Classes;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PcAmazonProductAdvertisingAPI {
    public function getInfo($asin) {
        $re = $this->getInfoHelper($asin);
        if(isset($re['error']) && $re['error'] === 1) {
            for($i = 0; $i < 3; $i++) {
                usleep(500000 * ($i+1));
                $re = $this->getInfoHelper($asin);
                if(!isset($re['error'])) break;
            }
        }
        return $re;
    }

    private function getInfoHelper($asin) {
        try {
            $aws_access_key_id = env('AWS_ACCESS_KEY_ID', '');
            $aws_secret_key = env('AWS_SECRET_KEY', '');
            $endpoint = env('AWS_ENDPOINT', '');
            $uri = "/onca/xml";
            $associateTag = env('AWS_ASSOCIATE_TAG', '');

            $params = array(
                "Service" => "AWSECommerceService",
                "Operation" => "ItemLookup",
                "AWSAccessKeyId" => $aws_access_key_id,
                "AssociateTag" => $associateTag,
                "ItemId" => $asin,
                "IdType" => "ASIN",
                "ResponseGroup" => "Images,ItemAttributes"
            );

            if (!isset($params["Timestamp"])) {
                $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
            }

            ksort($params);

            $pairs = array();

            foreach ($params as $key => $value) {
                array_push($pairs, rawurlencode($key) . "=" . rawurlencode($value));
            }

            $canonical_query_string = join("&", $pairs);

            $string_to_sign = "GET\n" . $endpoint . "\n" . $uri . "\n" . $canonical_query_string;

            $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));

            $request_url = 'https://' . $endpoint . $uri . '?' . $canonical_query_string . '&Signature=' . rawurlencode($signature);

            $httpClient = new Client();
            usleep(500000);
            $re = $httpClient->get($request_url);
            $re = simplexml_load_string($re->getBody());
            //print_r($re);exit();
            if($re->Items->Request->Errors) {
                throw new \Exception($re->Items->Request->Errors->Error->Message);
            }
            $imageUrl = (string) $re->Items->Item->MediumImage->URL;
            $productName = (string) $re->Items->Item->ItemAttributes->Title[0];
            return [
                'image_url' => $imageUrl,
                'product_name' => $productName
            ];
        } catch (\Exception $e) {
            $code = 1; // server 503 error
            if(str_contains($e->getMessage(), "is not a valid value for ItemId")) {
                $code = 2; // invalid asin number
            }
            return [
                'error' => $code
            ];
        }
    }
}
