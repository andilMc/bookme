<?php

namespace src\models\cars;

use NlpTools\Similarity\CosineSimilarity;
use NlpTools\Tokenizers\WhitespaceTokenizer;
use src\models\Car;

class recommandationCar
{
    function norm_description(Car $car)
    {

        $desc = $car->getMake() . " "
            . $car->getModel() . " "
            . $car->getTypeCar() . " "
            . $car->getYearIssue() . " "
            . $car->getColor() . " "
            . $car->getFuelType() . " "
            . $car->getTransmission() . " "
            . $car->getDescription() . " ";
        $clean_desc = $this->cleaning($desc);
        return ["car" => $car, "norm_desc" => $clean_desc];
    }

    function cleaning($text)
    {
        $text = mb_strtolower($text, 'UTF-8');
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);
        $stopwords = array('a', 'an', 'and', 'the', 'is', 'in', 'on', 'at', 'with', 'to', 'of', 'for', 'by', 'as');
        $text = preg_replace('/\b(' . implode('|', $stopwords) . ')\b/', '', $text);
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        return $text;
    }



    function recommand($target, $dataset)
    {
        $samples = array_column($dataset, 'norm_desc');

        $tokenizer = new WhitespaceTokenizer();
        $sim = new CosineSimilarity();
        $samplesVectorized = [];

        foreach ($samples as $desc) {
            $samplesVectorized[] = $tokenizer->tokenize($desc);
        }
        $targetVectorized = $tokenizer->tokenize($target);

        // Calcul de la similarité cosinus
        $similarities = [];
        foreach ($samplesVectorized as $vector) {
            $similarities[] = $sim->similarity($vector, $targetVectorized);
        }

        $indices = [];
        foreach ($similarities as $key => $similarity) {
            if ($similarity > 0) {
                $indices[] = $key;
            }
        }

        return $indices;
    }

    function findCarByCode(array $cars, string $codeCar)
    {
        foreach ($cars as $car) {
            if ($car->getCodeCar() === $codeCar) {
                return $car;
            }
        }
        return null; // Return null if no car with the given code is found
    }


    function calculateCodeFrequencies(array $data): array {
        $frequency = [];
    
        // Compter les occurrences de chaque code
        foreach ($data as $item) {
            if (isset($frequency[$item['idCar']])) {
                $frequency[$item['idCar']]++;
            } else {
                $frequency[$item['idCar']] = 1;
            }
        }
    
        // Transformer en un tableau de paires clé-valeur
        $result = [];
        foreach ($frequency as $idCar => $count) {
            $result[] = ["idCar" => $idCar, "count" => $count];
        }
    
        // Trier par fréquence en ordre décroissant
        usort($result, function ($a, $b) {
            return $b['count'] - $a['count'];
        });
    
        return $result;
    }
    
   
    
    function popularCars($rent_car)
    {
        $rent_car_f = $this->calculateCodeFrequencies($rent_car);
        return  array_slice($rent_car_f,0,3);
    }

    function personalRecommandarion($target, $dataset)
    {
        $samples = array_column($dataset, 'norm_desc');
        $tg = $target['norm_desc'];

        $tokenizer = new WhitespaceTokenizer();
        $sim = new CosineSimilarity();

        $samplesVectorized = [];
        foreach ($samples as $desc) {
            $samplesVectorized[] = $tokenizer->tokenize($desc);
        }

        $targetVectorized = $tokenizer->tokenize($tg);
        $similarities = [];

        foreach ($samplesVectorized as $key => $vector) {
            $similarities[] = ["key" => $key, "sim" => $sim->similarity($vector, $targetVectorized)];
        }

        $length = count($similarities);
        for ($i = 0; $i < $length - 1; $i++) {
            $maxIndex = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($similarities[$j]['sim'] > $similarities[$maxIndex]['sim']) {
                    $maxIndex = $j;
                }
            }
            // switch element
            $temp = $similarities[$i];
            $similarities[$i] = $similarities[$maxIndex];
            $similarities[$maxIndex] = $temp;
        }

        $similarities = array_filter($similarities,function($el){
            return $el["sim"]<1;
        });
        $better_matches = array_slice($similarities,0,3);
        $indices = [];
        foreach ($better_matches as $better_match) {
                $indices[] = $better_match["key"];
        }

        return $indices;
    }
}
