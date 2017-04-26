<?php

    /*
        IMPORTANT NOTES!!
        Before using this helper, first user MUST enable or add gmp extension
        inside the php.ini or php configuration file
        then restart the server to apply the configuration change(s)
    */
    function factorial($factorialNumber)
    {
        return gmp_fact($factorialNumber);
    }

    function mathCombination($n, $r)
    {
        $combinationResult = 0;

        if($n >= $r)
        {
            $c_nfactorial = factorial($n);
            $c_rfactorial = factorial($r);
            $c_nrFactorial = factorial(($n - $r));
            $c_rnrFactorial = $c_rfactorial * $c_nrFactorial;

            $combinationResult = $c_nfactorial / $c_rnrFactorial;
        }
        else
        {
            $combinationResult = 0;
        }

        return $combinationResult;
    }

    function permutation($n, $r)
    {
        $permutaionResult = 0;

        if ($n >= $r)
        {
            $p_nFactorial = factorial($n);
            $p_nrFactorial = factorial(($n - $r));

            $permutaionResult = $p_nFactorial / $p_nrFactorial;
        }
        else
        {
            $permutaionResult = 0;
        }

        return $permutaionResult;
    }

    function series()
    {

    }

?>
